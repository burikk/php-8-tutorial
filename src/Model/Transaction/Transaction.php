<?php

declare(strict_types=1);

namespace App\Model\Transaction;

class Transaction
{
    //initialize with data type for strict types
//    private float $amount;
//    private string $description;
//
//    public function __construct(float $amount, string $description)
//    {
//        $this->amount = $amount;
//        $this->description = $description;
//    }
    //shorthand constructor
    public function __construct(public float $amount, public string $description)
    {
    }

    //class method
    //chaining make sense if we don't want that value
    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $discount): Transaction
    {
        $this->amount -= $this->amount * $discount / 100;
        return $this;
    }

    //getter for private prop
    public function getAmount(): float
    {
        return $this->amount;
    }

//    public function __destruct()
//    {
//        echo 'Destruct ' . $this->description;
//    }
}