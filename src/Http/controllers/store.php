<?php

use Core\Validator;
use Core\Database;
use Core\App;

$username = $_POST['username'];
$department = $_POST['department'];
$password = $_POST['password'];
//! BCRYPT
// $hashedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);

//! SHA512 ENCRYPT
$key = 'passKey';

// Hash-based Message Authentication Code // 'sha512' can be 'sha256'
// $base = hash_hmac('sha512', $password, $key); 
$hash = hash_hmac('sha224', $password, $key);

// Encode the HMAC using Base64
$hashedPass = base64_encode($hash);

//! DECRYPT
// $calculatedHash = hash_hmac('sha512', $password, $key);
// $calculatedBase64 = base64_encode($calculatedHash);

// if ($calculatedBase64 == $hashedPass) {
//     dd($calculatedBase64);
// } else {

//     dd($calculatedBase64);
// }

// $decodeData = base64_decode($hashedPass);
// $decodedPass = hash('sha512', $decodeData);

// dd($hashedPass . ' . ' . $decodedPass);



// VALIDATE USERNAME
$errors = [];
if (!Validator::string($username, 7, 255)) {
    $errors['username'] = "Username must have atleast 7 characters!";
}

if (!Validator::string($password, 8, 255)) {
    $errors['password'] = "Password must have atleast 8 characters!";
}

if (!empty($errors)) {
    return require "src/views/index.view.php";
}

$db = App::resolve(Database::class);

// CHECK IF THE EMAIL ALREADY EXIST
$user = $db->query('SELECT * FROM accounts where username = :username AND password = :password AND department = :department', [
    'username' => $username,
    'password' => $password,
    'department' => $department
])->find();

// IF YES, REDIRECT TO LOGIN
if ($user) {
    // dd("Its already registered");
    $errors['account'] = "This username is already taken!";
    // header('location: /');
    return require "src/views/index.view.php";
    exit();
} else {
    // ELSE, SAVE IT TO DATABASE
    $db->query("INSERT INTO accounts (`username`, `password`, `hashedPass`, `department`) VALUES ('$username', '$password', '$hashedPass', '$department')");

    header('location: /accounts');
    exit();
}

// $db->query("INSERT INTO accounts (`username`, `password`, `hashedPass`) VALUES ('$username', '$password', '$hashedPass')");

// header('location: /accounts');
// exit();
