<?php

declare(strict_types=1);

namespace App\Model\AnotherTransaction;

class Transaction
{
    public static int $count = 0;
    public function __construct()
    {
        self::$count++;
        // adding "\" to get the global namespace instead of local
        new \DateTime();
    }

    public static function getCount(): int
    {
        return self::$count;
    }
}