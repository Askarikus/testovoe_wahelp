<?php

require 'functions.php';
require 'database.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
  '/upload' => 'controllers/upload.php',
  '/send' => 'controllers/send.php' 
];

if (array_key_exists($uri, $routes)){
  require $routes[$uri];
}

// require "index.view.php";