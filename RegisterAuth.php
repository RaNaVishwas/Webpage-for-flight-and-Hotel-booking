<?php
  include './auth.php';
session_start();
$_SESSION['firstname'] = $_POST["firstname"];
$_SESSION['lastname'] = $_POST["lastname"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['phone'] = $_POST["phone"];
$_SESSION['addressline1'] = $_POST["addressline1"];
$_SESSION['addressline2'] = $_POST["addressline2"];
$_SESSION['postcode'] = $_POST["postcode"];
$_SESSION['password'] = $_POST["password"];
$reg = mysqli_query($dbhandle,"INSERT INTO register (first_name, last_name, email, telephone_no, add_line1, add_line2, postcode,password) VALUES 
            ('".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['email']."', '".$_SESSION['phone']."', '".$_SESSION['addressline1']."', '".$_SESSION['addressline2']."', '".$_SESSION['postcode']."','".$_SESSION['password']."')");
echo '<script> alert("Regestered Susscessfully"); </script>';
header('Refresh: 0;url=index.php');
			?>
