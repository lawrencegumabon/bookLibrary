<?php

use Core\Validator;
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

$errors = [];

$book = $db->query('SELECT * FROM books WHERE title = :title AND author = :author AND category = :category', [
    'title' => $bookName,
    'author' => $authorName,
    'category' => $category,
])->find();

$myBook = $db->query('SELECT * FROM books WHERE id = :id', [
    'id' => $bookID
])->find();


// dd($myBook);

// if ($category === 'None') {
//     $errors['category'] = "Please select a category";
// }

if ($book) {
    $errors['book'] = "This book already exist";
    return require 'src\views\admin\books\editBook\edit-books.view.php';
}

// if (!empty($errors)) {
//     require 'src\views\user\books\editBook\edit-books.view.php';
// } {
// if (!$myBook || $myBook['id'] != $bookID) {
//     abort(404);
// } else if (!$myBook || $myBook['user_id'] != $userID) {
//     abort(403);
// }

// $db->query("INSERT INTO books (`title`, `author`, `category`, `status`, `user_id`) VALUES ('$bookName', '$authorName', '$category', 'Unread', '$userID')");

$db->query('UPDATE books SET title = :title, author = :author, category = :category WHERE id = :id', [
    'title' => $bookName,
    'author' => $authorName,
    'category' => $category,
    'id' => $bookID
]);

header("Location: /myBooks");
exit();
// }






// require 'src\views\user\books\mybooks.view.php';
