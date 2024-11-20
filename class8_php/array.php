<?php

//Declaring an Indexed Array
$fruits = array("Apple", "Banana", "Cherry");
// or using the shorthand syntax
$fruits = ["Apple", "Banana", "Cherry"];

//Accessing Elements in Indexed Arrays
echo $fruits[0];  // Output: Apple
echo $fruits[2];  // Output: Cherry

//Adding Elements to Indexed Arrays
$fruits[] = "Mango";  // Automatically adds to the end

//Looping through Indexed Arrays
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}


//Declaring an Associative Array
$ages = array("Alice" => 25, "Bob" => 30, "Charlie" => 35);
// or using shorthand syntax
$ages = ["Alice" => 25, "Bob" => 30, "Charlie" => 35];

//Accessing Elements in Associative Arrays
echo '<br>'.$ages["Alice"].'<br>';  // Output: 25

//Adding or Modifying Elements in Associative Arrays
$ages["David"] = 40;  // Adds a new key-value pair
$ages["Alice"] = 26;  // Modifies the value for "Alice"

//Looping through Associative Arrays
foreach ($ages as $key => $value) {
    echo "$key is $value years old.<br>";
}

//Declaring a Multidimensional Array
$people = array(
    array("name" => "Alice", "age" => 25, "city" => "New York"),
    array("name" => "Bob", "age" => 30, "city" => "London"),
    array("name" => "Charlie", "age" => 35, "city" => "Paris")
);
// or shorthand syntax
$people = [
    ["name" => "Alice", "age" => 25, "city" => "New York"],
    ["name" => "Bob", "age" => 30, "city" => "London"],
    ["name" => "Charlie", "age" => 35, "city" => "Paris"]
];

//Accessing Elements in Multidimensional Arrays
echo $people[0]["name"];  // Output: Alice
echo $people[2]["city"];  // Output: Paris


//Looping through Multidimensional Arrays
foreach ($people as $person) {
    echo $person["name"] . " is " . $person["age"] . " years old and lives in " . $person["city"] . ".<br>";
}

//count(): Returns the number of elements in an array.
echo count($fruits);  // Output: 4

//array_merge(): Merges two or more arrays.
$combined = array_merge($fruits, $ages);


//array_keys(): Returns all the keys of an array.
$keys = array_keys($ages);  // Output: ["Alice", "Bob", "Charlie"]


//array_values(): Returns all the values of an array.
$values = array_values($ages);  // Output: [25, 30, 35]

//in_array(): Checks if a value exists in an array.
if (in_array("Banana", $fruits)) {
    echo "Banana is in the fruits array.";
}

//array_search(): Searches for a value in an array and returns its key.
$index = array_search("Cherry", $fruits);  // Output: 2


