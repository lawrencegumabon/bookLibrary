<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$adminID = $_SESSION['admin']['id'];

$admin = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $adminID
])->find();

$books = $db->query('SELECT * FROM books ORDER BY title ASC')->get();

$categoriesJson = file_get_contents('src/views/categories/categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

$bookID = $_GET['bookID'];

$myBook = $db->query('SELECT * FROM books WHERE id = :id', [
    'id' => $bookID
])->find();

if (!$myBook || $myBook['id'] != $bookID) {
    abort(404);
}

echo '<embed src="' . $myBook['file'] . '" type="application/pdf" width="100%" height="100%" />';
