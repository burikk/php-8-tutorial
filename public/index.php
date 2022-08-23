<?php

use App\Controller\HomeController;
use App\Exception\RouteNotFoundException;
use App\Router;
use App\View;

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const VIEW_PATH = __DIR__ . '/../views';

try {
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
} catch (RouteNotFoundException $e) {
    http_response_code(404);

    echo View::make('errors/route-not-found.php');
}

