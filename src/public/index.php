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
echo PHP_VERSION, __FILE__; //predefined constant
