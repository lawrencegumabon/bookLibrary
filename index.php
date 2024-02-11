<?php

session_start();

require 'src/Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    require 'src/' . $class . '.php';
});

require 'src/bootstrap.php';
$router = new \Core\Router();

$routes = require 'src/routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
