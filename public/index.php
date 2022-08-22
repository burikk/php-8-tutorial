<?php

use App\Controller\HomeController;
use App\Router;

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require_once __DIR__ . '/../vendor/autoload.php';
const VIEW_PATH = __DIR__ . '/../views';

$router = new Router();

$router->get('/', [HomeController::class, 'index'])
    ->get('/about', function () {
        echo 'This is PHP8 tutorial';
    })
    ->get('/section1', function () {
        require __DIR__ . '/../src/section1.php';
    })
    ->get('/section2', function() {
        require __DIR__ . '/../src/section2.php';
    });

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
