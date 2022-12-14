<?php

use App\App;
use App\Container;
use App\Controller\HomeController;
use App\Controller\UserController;
use App\Router;

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
const VIEW_PATH = __DIR__ . '/../views';

$container = new Container();
$router = new Router($container);
$router->get('/', [HomeController::class, 'index'])
    ->get('/users/create', [UserController::class, 'create'])
    ->post('/users', [UserController::class, 'register'])
    ->get('/about', function () {
        echo 'This is PHP8 tutorial';
    })
    ->get('/section1', function () {
        require __DIR__ . '/../src/section1.php';
    })
    ->get('/section2', function() {
        require __DIR__ . '/../src/section2.php';
    });

$app = new App($router, $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$app->run();

