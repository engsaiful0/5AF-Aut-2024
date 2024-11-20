<?php

$connection = mysqli_connect("localhost", username: "root", "", "5af_aut_2024");
//echo '<pre>';
//print_r($connection);
//print_r($_POST);
$studentName = $_POST['studentName'];
$roll = $_POST['roll'];
$mobile = $_POST['mobile'];

mysqli_query($connection, "INSERT INTO students (studentName,roll,mobile) values('$studentName','$roll','$mobile')");

//echo $studentName;
