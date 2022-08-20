<?php

namespace App\Model\CoffeeMaker;

trait CappuccionTrait
{
    public function makeCappuccion()
    {
        echo static::class . ' is making cappuccino' . PHP_EOL;
    }
}