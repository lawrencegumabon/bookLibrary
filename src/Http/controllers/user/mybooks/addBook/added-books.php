<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$books = $db->query('SELECT * FROM books WHERE user_id = :user_id', [
    'user_id' => $userID
])->get();

$categoriesJson = file_get_contents('src\views\categories\categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookName = $_POST['bookName'];
$authorName = $_POST['authorName'];
$category = $_POST['category'];

$errors = [];

$book = $db->query('SELECT * FROM books WHERE title = :title AND author = :author AND user_id = :user_id', [
    'title' => $bookName,
    'author' => $authorName,
    'user_id' => $userID
])->find();

if ($category === 'None') {
    $errors['category'] = "Please select a category";
}

if ($book) {
    $errors['book'] = "This book already exist";
}

if (!empty($errors)) {
    require 'src\views\user\books\addBook\add-books.view.php';
}

$db->query("INSERT INTO books (`title`, `author`, `category`, `status`, `user_id`) VALUES ('$bookName', '$authorName', '$category', 'Unread', '$userID')");

header("Location: /myBooks");
exit();


// require 'src\views\user\books\addBook\add-books.view.php';
