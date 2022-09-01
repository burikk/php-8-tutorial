<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Exception\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    public function testItRegisterARoute(): void
    {
        $this->router->register('get', '/users', ['Users', 'index']);
        $expected = [
            'get' => [
                '/users'  => ['Users', 'index'],
            ]
        ];
        $this->assertSame($expected, $this->router->routes());
    }

    public function testItRegistersAGetRoute(): void
    {
        $this->router->get( '/users', ['Users', 'index']);
        $expected = [
            'GET' => [
                '/users'  => ['Users', 'index'],
            ]
        ];
        $this->assertSame($expected, $this->router->routes());
    }

    public function testItRegistersAPostRoute(): void
    {
        $this->router->post( '/users', ['Users', 'index']);
        $expected = [
            'POST' => [
                '/users'  => ['Users', 'index'],
            ]
        ];
        $this->assertSame($expected, $this->router->routes());
    }

    public function testThereAreNoRoutesWhenRouterIsCreated(): void
    {
        $this->router = new Router();
        $this->assertEmpty($this->router->routes());
    }

    /**
     * @dataProvider \Tests\DataProvider\RouterDataProvider::routeNotFoundCases
     */
    public function testItThrowsRouteNotFoundException(string $requestUri, string $requestMethod): void
    {
        $users = new class() {
            public function delete(): bool
            {
                return true;
            }
        };
        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    public function testItResolvesRouteFromAClosure(): void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);

        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'GET')
        );
    }

    public function testItResolvesRoute(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);
        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'GET')
        );
    }
}