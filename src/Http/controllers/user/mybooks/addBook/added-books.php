<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
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
$status = $_POST['status'];

$errors = [];

$book = $db->query('SELECT * FROM books WHERE title = :title AND author = :author AND category = :category ', [
    'title' => $bookName,
    'author' => $authorName,
    'category' => $category,
])->find();

// if ($category == 'None') {
//     $errors['category'] = "Please select a category";
// }

$readers = $db->query('SELECT * FROM users WHERE type = :type', [
    'type' => 1
])->get();

if ($book) {
    $errors['book'] = "This book already exist";
    require 'src\views\user\books\addBook\add-books.view.php';
} else {
    $db->query("INSERT INTO books (`title`, `author`, `category`) VALUES ('$bookName', '$authorName', '$category')");
    // $newBookId = $pdo->lastInsertId();
    $newBookId = $db->getPDO()->lastInsertId();

    // dd($newBookId);
    foreach ($readers as $reader) {
        $db->query("INSERT INTO bookstatus (`userID`, `bookID`, `bookStatus`) VALUES ('$reader[id]', '$newBookId', 'Unread')");
    }

    header("Location: /myBooks");
    exit();
}

// if (!empty($errors)) {
//     require 'src\views\user\books\addBook\add-books.view.php';
// }




// require 'src\views\user\books\addBook\add-books.view.php';
