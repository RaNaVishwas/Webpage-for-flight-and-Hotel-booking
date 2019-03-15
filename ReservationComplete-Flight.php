<?php
session_start();
include './auth.php';
$re = mysqli_query($dbhandle,"select * from register where email = '".$_SESSION['email']."'  AND password = '".$_SESSION['password']."' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{
	
	include './auth.php';
	if(!isset($_SESSION['flight_id'])){
						
						$_SESSION['flight_id'] = array();
						
						$_SESSION['flightname'] = array();
						
						$_SESSION['flightqty'] = array();
						$_SESSION['ind_rate'] = array();
						$_SESSION['total_amount'] = 0;
						$_SESSION['deposit'] = 0;
						}
	
				$result = mysqli_query($dbhandle,"select * from flight");