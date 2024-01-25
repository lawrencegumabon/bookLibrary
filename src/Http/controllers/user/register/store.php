<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$name = $_POST['name'];
// $password = $_POST['password'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$passwordConfirm = $_POST['passwordConfirm'];

$errors = [];

if ($_POST['password'] !== $passwordConfirm) {
    $errors['password'] = "Password did not match";
}

if (!Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address!";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password field must be atleast 8 characters length!";
}

if (!empty($errors)) {
    return require 'src\views\user\register\register.view.php';
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors['account'] = 'This account already exist!';

    return require 'src\views\user\register\register.view.php';
} else {
    $db->query("INSERT INTO users (`email`, `fullName`, `password`) VALUES ('$email', '$name', '$password')");

    header("Location: /sign-in");
    exit();
}
