<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require('src\config.php');
    return new Database($config['database']);
});


$db = $container->resolve('Core\Database');

// $container->resolve('asdsadad');

App::setContainer($container);
