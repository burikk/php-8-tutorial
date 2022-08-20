<?php

namespace App\Model\CollectionAgency;

class Rocky implements DebtCollector
{
    public function collect(float $ownedAmount): float
    {
        return $ownedAmount * 0.65;
    }
}