<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$errors = [];

$email = $_POST['email'];

$emails = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->get();



if ($emails) {
    $errors['email'] = "This email already exists!";
    require 'src\views\user\settings\email\email.view.php';
} else {
    $db->query('UPDATE users SET email = :email WHERE id = :id', [
        'id' => $userID,
        'email' => $email
    ]);


    // header("Location: /settings");
    // exit();
    require 'src\views\user\settings\email\success.view.php';
}
