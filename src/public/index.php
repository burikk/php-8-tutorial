<?php

//constants
if (true) {
    define('HELLO_WORLD', 'Hello World!');
    //you can't declare const variables like this in control structures
    //const HELLO_WORLD = 'Hello World!';
}

const MY_CONST_VAR = 'Here you can declare const by the keyword const';
//this way you can check if const is defined, and echo that variables
echo defined('HELLO_WORLD'), defined('MY_CONST_VAR');
echo HELLO_WORLD, MY_CONST_VAR;
echo PHP_VERSION, __FILE__, '<pre>'; //predefined constant

//Booleans
$isTrue = true;
// 0, -0, 0.0, -0.0, '', '0', [], null = false

//Integers
$x = PHP_INT_MAX + 1; //getting float
$x = (int) true; //1
$x = (int) false; //0
$x = (int) 5.9999; //5
$x = (int) '5.999'; //5
$x = (int) '23qweqwe'; //23

//Floats
$y = 13.5e3; //13500
$y = 13.5e-3; //0.0135
$y = PHP_FLOAT_MAX + 1;//INF
is_finite($x); //false, checks if not INF
//<0.5 - floor, >0.5 - ceil to get right integers, 0.5 gives you a normal res
$y = floor((0.1 + 0.7) * 10); //7, not 8
echo $y;
$y = ceil((0.1 + 0.7) * 10);//8
echo $y;
$y = ceil((0.1 + 0.2) * 10);//4
echo $y . '<pre>';
$x = 0.23;
$y = 1 - 0.77;
//$x == $y, $x !== $y;

//NULL
$x = null;//echo nothing, '', 0, false, [], var_dump() return NULL
is_null($x);//true

//Strings
//Heredoc
$text = <<<TEXT
Line 1 $y
Line 2
TEXT;
echo $text;
//Nowdoc
$text = <<<'TEXT'
Line 1 $y
Line 2
TEXT;
echo $text . '<pre>';

//Arrays
$fruits = ['banana', 'apple', 'peach'];
var_dump(isset($fruits[1])); //true
var_dump(isset($fruits[3])); //false
var_dump(count($fruits));//3
$fruits[] = 'strawberry';// push new item to array fruits
array_push($fruits, 'kiwi', 'orange');
var_dump(count($fruits));//6
$osVersions = [
    'ios' => '15.1',
    'android' => '11.2',
]; // define array keys
echo $osVersions['ios'];
$osVersions[] = 'undefined os'; //add new array key value with not specified key
$osVersions['windows'] = '11'; //assign value to the specific key
$osVersions['windows'] = [
    'name' => '11',
    'ver' => 'lite',
    'nullValue' => null,
];
var_dump(array_key_exists($osVersions['windows']['nullValue'], $osVersions));
print_r($osVersions);
$array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd', null => 'e'];//prints [1] => d [] => e

//Loops
$i = 0;
while ($i <= 10) {
    echo $i++;
}

$i = 0;
do {
    echo $i++;
} while ($i <= 10);

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

foreach ($fruits as $key => $fruit) {
    echo $key . ': ' . $fruit . '<br/>';
}

//Switch, match
$status = 1;
switch ($status) { //switch ==
    case 1:
        echo 'status 1';
        break;
    case 2:
    case 3:
        echo 'status 3';
        break;
    default: //no errors when no default value here
        echo 'default status';
}
$match = match ($status) { //match ===
    1 => 'match 1',
    2, 3 => 'match 2',
    0 => 'match0',
    default => 'default match', //error if not specified default value
};
echo $match;

//Static variables
function getValue() {
    static $value = null;
    if ($value === null) {
        $value = processValue();
    }

    return $value;
}

function processValue()
{
    sleep(2);
    echo 'Processing';
    return 10;
}

echo getValue();
echo getValue();
echo getValue();

