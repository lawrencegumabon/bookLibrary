<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$books = $db->query('SELECT * FROM books WHERE user_id = :user_id ORDER BY title ASC', [
    'user_id' => $userID
])->get();

$categoriesJson = file_get_contents('src/views/categories/categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookID = $_GET['bookID'];

$myBook = $db->query('SELECT * FROM books WHERE id = :id', [
    'id' => $bookID
])->find();

$db->query('UPDATE books SET status = :status WHERE id = :id', [
    'id' => $bookID,
    'status' => 'Unread'
]);

header("Location: /myBooks");
exit();
