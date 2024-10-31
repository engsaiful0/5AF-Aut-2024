<?php
include 'db_connection.php';
$id=$_REQUEST['id'];
//die($id);

mysqli_query($connection,"DELETE FROM students WHERE id='$id'");

header("location:index.php"); //Redirect to index.php
?>