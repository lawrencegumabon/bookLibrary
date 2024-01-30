<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$adminID = $_SESSION['admin']['id'];

$admin = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $adminID
])->find();

$books = $db->query('SELECT * FROM books')->get();

$categoriesJson = file_get_contents('src/views/categories/categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$category = $_POST['category'];
$bookID = $_POST['bookID'];

$myBook = $db->query('SELECT * FROM books WHERE id = :id', [
    'id' => $bookID
])->find();

$errors = [];

if (isset($_FILES['fileUpload'])) {
    $target_dir = 'src/views/assets/uploads/';
    $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($fileType != "docx" && $fileType != "pdf") {
        $errors['file'] = "Sorry, only DOCX and PDF are allowed.";
    } else {
        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
            // Update the file in the database
            $db->query('UPDATE books SET file = :file WHERE id = :id', [
                'file' => $target_file,
                'id' => $bookID
            ]);
        } else {
            $errors['file'] = "Sorry, there was an error uploading your file.";
        }
    }
}

// Update the book information excluding the file
$db->query('UPDATE books SET title = :title, author = :author, category = :category WHERE id = :id', [
    'title' => $bookName,
    'author' => $authorName,
    'category' => $category,
    'id' => $bookID
]);

header("Location: /myBooks");
exit();
