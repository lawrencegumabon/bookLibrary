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

$categoriesJson = file_get_contents('src\views\categories\categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

require 'src\views\admin\books\addBook\add-books.view.php';
