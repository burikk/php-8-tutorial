<?php

namespace App\Model\CollectionAgency;

interface DebtCollector
{
    public function collect(float $ownedAmount):float;
}