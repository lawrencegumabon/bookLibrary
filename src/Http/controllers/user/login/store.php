<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password field must be atleast 8 characters length!";
}

// if (!empty($errors)) {
//     return require 'src\views\user\login\login.view.php';
// }

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'fullName' => $user['fullName']
        ];

        redirect('/myBooks');
    } else if ($password === $user['password']) {
        dd('Welcome ADMIN!');
    }
}

$errors['email'] = 'Account not found!';

// TO RETAIN THE EMAIL TYPED BY THE USER
$_SESSION['_flash']['old'] = $_POST['email'];

return require 'src\views\user\login\login.view.php';
