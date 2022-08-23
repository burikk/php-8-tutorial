<?php

namespace App\Model\CollectionAgency;

class CollectionAgency implements DebtCollector
{
    public function collect(float $ownedAmount): float
    {
        $guaranteed = $ownedAmount * 0.5;

        return mt_rand($guaranteed, $ownedAmount);
    }
}