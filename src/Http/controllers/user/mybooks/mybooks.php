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

$categoriesJson = file_get_contents('src\views\categories\categories.json');
$categories = json_decode($categoriesJson, true)['categories'];

require 'src\views\user\books\mybooks.view.php';
