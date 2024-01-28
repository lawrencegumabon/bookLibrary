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

$bookID = $_GET['bookID'];

$myBook = $db->query('SELECT * FROM books WHERE id = :id', [
    'id' => $bookID
])->find();

if (!$myBook || $myBook['id'] != $bookID) {
    abort(404);
}
// else if (!$myBook || $myBook['user_id'] != $userID) {
//     abort(403);
// }


require 'src\views\user\books\view-mybooks.view.php';
