<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

// MAGCCHANGE YUNG COLOR NG DESIGN DIPENDE SA NILAGAY NA URL
function changePage($styleChange, $defaultStyle)
{
    if (in_array($_SERVER['REQUEST_URI'], [
        '/profile',
        '/editprofile',
        '/search-motor',
        '/motorcycle',
        '/bookings'
    ])) {
        return $styleChange;
    } else {
        return $defaultStyle;
    }
}

// GENERATE RANDOM MOTOR CODE
function GenerateMotorCode()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $motorCode = '/^[';

    for ($i = 0; $i < 10; $i++) {
        $motorCode .= $characters[rand(0, strlen($characters) - 1)];
    }

    $motorCode .= ']$/';

    return $motorCode;
}

function generateCode()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $verifyCode = '';

    for ($i = 0; $i < 4; $i++) {
        $verifyCode .= $characters[rand(0, strlen($characters) - 1)];
    }

    $verifyCode .= '';

    return $verifyCode;
}


// 

function abort($code = 404)
{
    http_response_code($code);

    require "src/views/errors/{$code}.php";

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

// function base_path($path)
// {
//     return BASE_PATH . $path;
// }

function view($path, $attributes = [])
{
    extract($attributes);

    require './src/views/' . $path;
}

function login($user)
{
    // $_SESSION['user'] = $user;
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    // setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain']);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
