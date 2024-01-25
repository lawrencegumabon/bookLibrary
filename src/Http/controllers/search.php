<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$searchUser = $_POST['searchUser'];
$searchDepartment = $_POST['searchDepartment'];

$accounts = $db->query('SELECT * FROM accounts')->get();

$searchAccounts = $db->query('SELECT * FROM accounts where username = :username', [
    'username' => $searchUser
])->get();

$searchDepartments = $db->query('SELECT * FROM accounts where department = :department', [
    'department' => $searchDepartment
])->get();

// dd($searchAccounts);

require "src/views/list.view.php";
