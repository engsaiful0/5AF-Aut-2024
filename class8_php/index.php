<?php

echo 'Hello world<br>';

$data_one = 123;

echo $data_one;



$data_two = 45;

$sum = $data_one + $data_two;

echo 'Sum is=' . $sum;


?>
<img src="../images/image.png">
<?php

//Loops-for, while, do-while, foreach

for ($index = 1; $index <= 10; $index++) {
    echo $index . '<br>';
}


//$array-index array,associative array
//FIFO- First In First Out

$index_array = array(
    'Karim',
    'Rahim',
    113456,
    'ab',
    12.5
);

//debugger
echo '<pre>';
print_r($index_array);
echo "####Var Dump######<br>";
var_dump($index_array);


echo 'Print using for loop<br>';

for ($index = 0; $index < count(value: $index_array); $index++) {
    echo $index_array[$index] . '<br>';
}

echo 'Print using foreach loop<br>';
foreach ($index_array as $value) {
    echo $value . '<br>';
}

function  sum($firstNumber,$secondNumber)
{
    return $firstNumber+$secondNumber;
}
echo 'The sum of two numbers:<br>';
echo sum(10,12);

$firstNumber=100;
$secondNumber=0;
try{
    echo $firstNumber/$secondNumber;
} catch (DivisionByZeroError $e) {
    echo "got $e";
}



?>