<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$books = $db->query('SELECT * FROM books ORDER BY title ASC')->get();

$categoriesJson = file_get_contents('src/views/categories/categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookID = $_GET['bookID'];

$myBook = $db->query('SELECT * FROM bookStatus WHERE bookID = :bookID AND userID = :userID', [
    'bookID' => $bookID,
    'userID' => $userID
])->find();

$db->query('UPDATE bookStatus SET bookStatus = :bookStatus WHERE bookID = :bookID AND userID = :userID', [
    'bookID' => $bookID,
    'userID' => $userID,
    'bookStatus' => 'Unread'
]);

// require 'src/views/user/books/mybooks.view.php';
header("Location: /allBooks");
exit();
