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

// $db->query('delete from motors where id = :id', [
//     'id' => $_POST['id']
// ]);

$bookID = $_GET['bookID'];



require 'src/views/admin/books/deleteBook/delete-books.view.php';
