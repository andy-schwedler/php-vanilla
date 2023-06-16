<?php

$routes = require('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort($value = 404)
{
    http_response_code($value);
    require "views/code/{$value}.php";

    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);
