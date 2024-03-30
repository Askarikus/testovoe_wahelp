<?php

require 'functions.php';
require 'Database.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

/**
 * Посмотреть построение роутов через method exists или function exists.
 */
$routes = [
  '/generate' => 'controllers/generate.php',
  '/retrieve' => 'controllers/retrieve.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}
