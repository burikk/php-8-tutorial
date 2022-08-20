<?php

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Transaction\Transaction;
use App\Model\AnotherTransaction\Transaction as AnotherTransaction;
use App\Model\DB;

//Classes & Objects

$transaction = new Transaction(100, 'Transaction 1');
//$transaction->amount = 15;
$transaction->addTax(8)
    ->applyDiscount(10); //return $this (Transaction) allows to chain methods
var_dump($transaction);
var_dump($transaction->getAmount());

$transaction2 = new Transaction(200, 'Transaction 2');
$amount = $transaction2->addTax(10)
    ->applyDiscount(20)
    ->getAmount();
var_dump($amount);

//Static properties & Methods
$anotherTransaction = new AnotherTransaction();
$anotherTransaction2 = new AnotherTransaction();
$anotherTransaction3 = new AnotherTransaction();
var_dump($anotherTransaction::$count);
var_dump($anotherTransaction::getCount());

$db = DB::getInstance([]);//echo only once, because of static
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
