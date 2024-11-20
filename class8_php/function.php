<?php

function functionName()
{
    // code to execute
}

//Calling a Function
function greet()
{
    echo "Hello, world!";
}
greet();  // Output: Hello, world!


//Functions with Parameters
function functionNameWithParamenter($name)
{
    echo "Hello, $name!";
}
functionNameWithParamenter("Alice");  // Output: Hello, Alice!


// Functions with Return Values
function add($a, $b)
{
    return $a + $b;
}
$result = add(3, 5);  // $result will be 8
echo $result;  // Output: 8

//Default Parameter Values
function greetDefaultParamenter($name = "Guest") {
    echo "Hello, $name!";
}

greetDefaultParamenter();        // Output: Hello, Guest!
greetDefaultParamenter("Alice"); // Output: Hello, Alice!


//Passing Arguments by Reference
function addFive(&$num) {
    $num += 5;
}
$number = 10;
addFive($number);
echo $number;  // Output: 15


//Variable-Length Argument Lists
function sum(...$numbers) {
    return array_sum($numbers);
}
echo sum(1, 2, 3, 4);  // Output: 10

//Anonymous Functions (Closures)
$greet = function($name) {
    return "Hello, $name!";
};
echo $greet("Bob");  // Output: Hello, Bob!

//Arrow Functions (PHP 7.4+)
$add = fn($a, $b) => $a + $b;
echo $add(2, 3);  // Output: 5


