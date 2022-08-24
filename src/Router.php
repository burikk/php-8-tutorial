<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function register(string $requestUMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestUMethod][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('GET', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('POST', $route, $action);
    }

    public function routes():array
    {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route =  explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (! $action) {
            throw new RouteNotFoundException('404 Not Found');
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        [$class, $method] = $action;

        if (class_exists($class)) {
            $class = new $class;

            if (method_exists($class, $method)) {
                return call_user_func_array([$class, $method], []);
            }
        }

        throw new RouteNotFoundException('404 Not Found');
    }
}