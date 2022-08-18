<?php

declare(strict_types=1);

namespace App\Model\AnotherTransaction;

class Transaction
{
    public function __construct()
    {
        // adding "\" to get the global namespace instead of local
        new \DateTime();
    }
}