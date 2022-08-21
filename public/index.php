<?php

use App\Home;
use App\Model\Router;

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});
require __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->register('/', [Home::class, 'index'])
    ->register('/about', function () {
        echo 'This is PHP8 tutorial';
    })
    ->register('/section1', function () {
        require __DIR__ . '/../src/section1.php';
    })
    ->register('/section2', function() {
        require __DIR__ . '/../src/section2.php';
    });

$router->resolve($_SERVER['REQUEST_URI']);
