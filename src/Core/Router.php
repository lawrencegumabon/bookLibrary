<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    // FOR AUTHENTICATION
    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes  as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // APPLY THE MIDDLEWARE
                Middleware::resolve($route['middleware']);

                // if ($route['middleware']) {
                //     // $middleware = Middleware::MAP[$route['middleware']];

                //     // (new $middleware)->handle();
                // }

                // FOR GUEST
                // if ($route['middleware'] === 'guest') {
                //     (new Guest)->handle();
                // }
                // // FOR AUTH
                // if ($route['middleware'] === 'auth') {
                //     (new Auth)->handle();
                // }

                // dd($route['controller']);
                return require($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        // require "src/views/errors/{$code}.php";

        die();
    }
}



// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require $routes[$uri];
//     } else {
//         abort();
//     }
// }

// function abort($code = 404)
// {
//     http_response_code($code);

//     require "src/views/errors/{$code}.php";

//     die();
// }

// $routes = require 'src/routes.php';
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// routeToController($uri, $routes);
