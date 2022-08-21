<?php

//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace(['\\', 'App'], ['/', 'src'], $class) . '.php';
//
//    require($path);
//});

require __DIR__ . '/../vendor/autoload.php';

use App\Model\CoffeeMaker\AllInOneCoffeeMaker;
use App\Model\CoffeeMaker\CappuccinoMaker;
use App\Model\CoffeeMaker\CoffeeMaker;
use App\Model\CoffeeMaker\LatteMaker;
use App\Model\CollectionAgency\CollectionAgency;
use App\Model\CollectionAgency\DebtCollectionService;
use App\Model\CollectionAgency\Rocky;
use App\Model\Toaster;
use App\Model\Transaction\Transaction;
use App\Model\AnotherTransaction\Transaction as AnotherTransaction;
use App\Model\DB;
use App\Model\Fields\Text;
use App\Model\Fields\Boolean;
use App\Model\Fields\Checkbox;
use App\Model\Fields\Radio;
use App\Model\Transaction\TransactionCollection;

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

//Abstract classes & methods
$fields = [
    //new Field('base field'), // abstract
    new Text('text field'),
    //new Boolean('boolean field'), //abstract
    new Checkbox('checkbox field'),
    new Radio('radio field'),
];

foreach ($fields as $field) {
    echo $field->render() . '<br />';
}

//Interfaces
$collector = new DebtCollectionService();
echo $collector->collectDebt(new CollectionAgency()) . PHP_EOL;
echo $collector->collectDebt(new Rocky()) . PHP_EOL;

//Traits
$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccion();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$aioMaker = new AllInOneCoffeeMaker();
$aioMaker->makeCoffee();
$aioMaker->makeLatte();
$aioMaker->makeCappuccion();

//DateTime
$dateTime = new DateTime();
$dateTime->setTimezone(new DateTimeZone('Europe/Warsaw'));
echo $dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('m/d/Y G:i');

//Iterator & Iterable Type
$transactionCollection = new TransactionCollection([
    new Transaction(10, 'tr1'),
    new Transaction(20, 'tr2'),
    new Transaction(30, 'tr3'),
]);
foreach ($transactionCollection as $transaction) {
    echo $transaction->amount . ' - ' . $transaction->description . PHP_EOL;
}

iterate($transactionCollection);
iterate([1, 2, 3]);

function iterate(iterable $iterable)
{
    foreach ($iterable as $i => $item) {
        echo $i . PHP_EOL;
    }
}
