<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;

class App
{
    private static DB $db;
    public function __construct(protected Router $router, protected string $uri, protected string $method)
    {
        static::$db = new DB();
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->uri, $this->method);
        } catch (RouteNotFoundException $e) {
            http_response_code(404);

            echo View::make('errors/route-not-found.php');
        }
    }
}