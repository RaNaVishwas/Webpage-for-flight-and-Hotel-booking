<?php
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] =  $_POST['password'];
include './auth.php';
$re = mysqli_query($dbhandle,"select * from register where email = '".$_SESSION['email']."'  AND password = '".$_SESSION['password']."' " );
mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{
header('Refresh: 0;url=index.php');
} 
else
{
session_destroy();
echo '<script> alert("email or Password is invalid"); </script>';
header('Refresh: 0;url=signin.php');
}
?>
