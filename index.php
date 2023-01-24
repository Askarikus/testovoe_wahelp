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

// $books = [
//   [
//     'title' => 'Does Android',
//     'author' => 'Philip',
//     'release' => 1968,
//     'purchase' => 'example.com'
//   ],
//   [
//     'title' => 'Artemis',
//     'author' => 'Andy',
//     'release' => 2017,
//     'purchase' => 'example.com'
//   ],
//   [
//     'title' => 'Martian',
//     'author' => 'Andy',
//     'release' => 2003,
//     'purchase' => 'example.com'
//   ]
// ];
// function filt($items, $fn)
// {
//   $filtered_items = [];

//   foreach ($items as $item) {
//     if ($fn($item)) {
//       $filtered_items[] = $item;
//     }
//   }
//   return $filtered_items;
// }

// $filterByYear = array_filter($books, function ($book) {
//   return $book['author'] === 'Andy';
// });


// require "index.view.php";