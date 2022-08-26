<?php

declare(strict_types=1);

namespace App;

use App\Exception\RouteNotFoundException;
use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;

class App
{
    private static DB $db;
    public static Container $container;

    public function __construct(protected Router $router, protected string $uri, protected string $method)
    {
        static::$db = new DB();
        static::$container = new Container();

        static::$container->set(InvoiceService::class, function(Container $c) {
            return new InvoiceService(
                $c->get(SalesTaxService::class),
                $c->get(PaymentGatewayService::class),
                $c->get(EmailService::class),
            );
        });

        static::$container->set(SalesTaxService::class, fn() => new SalesTaxService());
        static::$container->set(PaymentGatewayService::class, fn() => new PaymentGatewayService());
        static::$container->set(EmailService::class, fn() => new EmailService());
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