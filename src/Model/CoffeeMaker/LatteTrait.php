<?php

namespace App\Model\CoffeeMaker;

trait LatteTrait
{
    public function makeLatte()
    {
        echo static::class . ' is making latte' . PHP_EOL;
    }
}