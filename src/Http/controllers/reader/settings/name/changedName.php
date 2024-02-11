<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$errors = [];

$name = $_POST['name'];

$names = $db->query('SELECT * FROM users WHERE fullName = :fullName', [
    'fullName' => $name
])->get();



// if ($names) {
//     $errors['name'] = "This email already exists!";
//     require 'src/views/user/settings/name/name.view.php';
// } 
// else {
$db->query('UPDATE users SET fullName = :fullName WHERE id = :id', [
    'id' => $userID,
    'fullName' => $name
]);


// header("Location: /settings");
// exit();
require 'src/views/reader/settings/name/success.view.php';
// }
