<?php

namespace App\Model\CoffeeMaker;

class CoffeeMaker
{
    public function makeCoffee()
    {
        echo static::class . ' is making coffee' . PHP_EOL;
    }
}