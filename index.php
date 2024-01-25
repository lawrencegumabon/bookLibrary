<?php

session_start();

// const BASE_PATH = __DIR__ . '/../';

// require BASE_PATH  . 'Core/functions.php';
// require base_path('Core/Database.php');
// require base_path('Core/Response.php');
// require base_path('Core/Router.php');

require 'src/Core/functions.php';

spl_autoload_register(function ($class) {
    // $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $class = str_replace('\\', '/', $class);

    require 'src/' . $class . '.php';
});

// require 'src/Core/Database.php';
// require 'src/Core/Response.php';
require 'src/bootstrap.php';

// require 'src/Core/Router.php';
$router = new \Core\Router();

$routes = require 'src/routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// routeToController($uri, $routes);
// $method = isset($_POST['_method']) ? $_POST['method'] : $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// unset($_SESSION['_flash']);
