<?php
require 'functions.php';
require 'Database.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

/**
 * 
 * Посмотреть пострение роутов через method exists или function exists
 * 
 */

$routes = [
  '/upload' => 'controllers/upload.php',
  '/send' => 'controllers/send.php' 
];

if (array_key_exists($uri, $routes)){
  require $routes[$uri];
}

// require "index.view.php";