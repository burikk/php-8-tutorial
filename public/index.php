<?php

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require __DIR__ . '/../vendor/autoload.php';

use App\Model\Toaster;
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

//Inheritance
$toaster = new Toaster\Toaster();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread'); //reg toaster can toast only 2 slices
$toaster->toast();

$toasterPro = new Toaster\ToasterPro();
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread');
$toasterPro->addSlice('bread'); //won't be toasted
$toasterPro->toast();
$toasterPro->toastBagel(); //toasterpro could also toast bagel
