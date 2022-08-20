<?php

namespace App\Model\CollectionAgency;

class DebtCollectionService
{
    public function collectDebt(DebtCollector $collector)
    {
        $ownedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($ownedAmount);

        echo 'Collected $' . $collectedAmount . ' out of $' . $ownedAmount . PHP_EOL;
    }
}