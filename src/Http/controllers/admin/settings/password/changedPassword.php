<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$userID = $_SESSION['user']['id'];

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $userID
])->find();

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$passwordConfirm = $_POST['passwordConfirm'];

$errors = [];

if ($_POST['password'] !== $passwordConfirm) {
    $errors['password'] = "Password did not match";
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = "Password field must be atleast 8 characters length!";
}

if (!empty($errors)) {
    return require 'src/views/user/settings/password/password.view.php';
}

// if ($names) {
//     $errors['name'] = "This email already exists!";
//     require 'src/views/user/settings/name/name.view.php';
// } 
// else {
$db->query('UPDATE users SET password = :password WHERE id = :id', [
    'id' => $userID,
    'password' => $password
]);


// header("Location: /settings");
// exit();
require 'src/views/user/settings/password/success.view.php';
// }
