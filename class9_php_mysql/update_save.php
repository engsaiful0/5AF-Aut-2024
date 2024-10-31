<?php

include 'db_connection.php';

$id=$_POST['id'];
$studentName=$_POST['studentName'];
$roll=$_POST['roll'];
$mobile=$_POST['mobile'];
mysqli_query($connection,"UPDATE students SET studentName='$studentName', roll='$roll', mobile='$mobile' WHERE id='$id'");

header("location:index.php"); //Redirect to index.php

?>