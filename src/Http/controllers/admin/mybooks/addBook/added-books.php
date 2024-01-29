<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$adminID = $_SESSION['admin']['id'];

$admin = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $adminID
])->find();

// $books = $db->query('SELECT * FROM books WHERE user_id = :user_id', [
//     'user_id' => $userID
// ])->get();
$books = $db->query('SELECT * FROM books')->get();

$categoriesJson = file_get_contents('src\views\categories\categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$category = $_POST['category'];
// $status = $_POST['status'];

$errors = [];

$book = $db->query('SELECT * FROM books WHERE title = :title AND author = :author AND category = :category ', [
    'title' => $bookName,
    'author' => $authorName,
    'category' => $category,
])->find();

// if ($category == 'None') {
//     $errors['category'] = "Please select a category";
// }





if ($book) {
    $errors['book'] = "This book already exist";
    require 'src\views\admin\books\addBook\add-books.view.php';
} else {

    //  FOR FILE UPLOADING
    $target_dir = 'src/views/assets/uploads/';
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    $uploadOk = 1;

    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($fileType != "doc" && $fileType != "pdf") {
        $uploadOk = 0;
        $errors['file'] = "Sorry, only DOCX and PDF are allowed.";
        require 'src\views\admin\books\addBook\add-books.view.php';
        exit();
    }

    if ($uploadOk == 0) {
        $errors['file'] = "Sorry, only DOCX and PDF are allowed.";
        require 'src\views\admin\books\addBook\add-books.view.php';
        exit();
    } else {
        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
            $db->query("INSERT INTO books (`title`, `author`, `category`, `file`) VALUES ('$bookName', '$authorName', '$category', '$target_file')");
            // $newBookId = $pdo->lastInsertId();
            $newBookId = $db->getPDO()->lastInsertId();

            $readers = $db->query('SELECT * FROM users WHERE type = :type', [
                'type' => 1
            ])->get();
            // dd("Hello");
            foreach ($readers as $reader) {
                $db->query("INSERT INTO bookstatus (`userID`, `bookID`, `bookStatus`) VALUES ('$reader[id]', '$newBookId', 'Unread')");
            }
            header("Location: /myBooks");
            exit();
        } else {
            $errors['file'] =  "Sorry, there was an error uploading your file.";
            require 'src\views\admin\books\addBook\add-books.view.php';
            exit();
        }
    }
}

// if (!empty($errors)) {
//     require 'src\views\user\books\addBook\add-books.view.php';
// }




// require 'src\views\user\books\addBook\add-books.view.php';
