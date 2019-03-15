<?php
session_start();
if(isset($_POST["departure"]) && !empty($_POST["departure"]) ){
	$_SESSION['checkin_date'] = date('d-m-y', strtotime($_POST['departure'])); 
	$_SESSION['departure'] = $_POST['flight_from']; 
	$_SESSION['arrive'] = $_POST['flight_to']; 
	//$_SESSION['checkout_date'] = date('d-m-y', strtotime($_POST['checkout']));
	//$_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['checkin'])); 
	//$_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['checkout']));
	//$_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
	//$_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
	//$_SESSION['checkin_unformat'] = $_POST["checkin"]; 
	//$_SESSION['checkout_unformat'] = $_POST["checkout"];
	//$_SESSION['interval'] = $_SESSION['datetime1']->diff($_SESSION['datetime2']);
}
if(isset( $_POST["totaladults"] ) ){
$_SESSION['adults'] = $_POST["totaladults"];
}
if(isset( $_POST["totalchildrens"] ) ){
$_SESSION['childrens'] = $_POST["totalchildrens"];
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<meta name="reservation hotel for malaysia" >
<meta name="zulkarnain" content="gambohnetwork.com.my">
<meta name="copyright" content="Hotel Malaysia, inc. Copyright (c) 2014">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody">
<div class="row foo" style="margin:30px auto 30px auto;">
<div class="large-12 columns">
		<div class="large-4 columns centerdiv">
			<a href="sessiondestroy.php" class="button round blackblur fontslabo" >1</a>
			<p class="fontgrey">Please select Date</p>
		</div>
		<div class="large-4 columns centerdiv">
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">2</a>
			<p class="fontgrey">Select Flight</p>
		</div
		<div class="large-4 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo" >3</a>
			<p class="fontgrey">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form action="sessiondestroy.php" method="post">
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
