<?php

//echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

// require '../app/controllers/Posts.php';
// require '../core/Router.php';

// $router = new Router();

// //echo get_class($router);

// Require the controller class
//require '../App/Controllers/Posts.php';
require_once dirname(__DIR__) .'/vendor/autoload.php';

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('sumbangan', ['controller' => 'sumbangan', 'action' => 'index']);
$router->add('inputdata', ['controller' => 'sumbangan', 'action' => 'inputdata']);
$router->add('jenis', ['controller' => 'jenis', 'action' => 'index']);
$router->add('filter', ['controller' => 'jenis', 'action' => 'filter']);
$router->dispatch($_SERVER['QUERY_STRING']);

// echo '<pre>';
// var_dump($router->getRoutes());
// echo '</pre>';

// // Match the requested route
// $url = $_SERVER['QUERY_STRING'];

// // Display the routing table
// echo '<pre>';
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }