<?php
$username = "hotel";
$password = "hotel@123";
$hostname = "localhost"; 
//connection to the database
$dbhandle = mysqli_connect($hostname, $username, $password) 
 or die(mysqli_error());
//select a database to work 
$db = "hotel";
$selected = mysqli_select_db($dbhandle,$db) 
  or die(mysqli_error());
?>