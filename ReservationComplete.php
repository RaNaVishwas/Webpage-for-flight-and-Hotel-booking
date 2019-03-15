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
					if(mysqli_num_rows($result) > 0){
	
				
						$count = 0;
						
						while($row = mysqli_fetch_array($result)){
						
							if (isset($_POST["qtyflight".$row['flight_id'].""])   && !empty($_POST["qtyflight".$row['flight_id'].""]) )
							{
								$_SESSION['flight_id'][$count] = $_POST["selectedflight".$row['flight_id'].""];
								$_SESSION['flightqty'][$count] = $_POST["qtyflight".$row['flight_id'].""];
								$_SESSION['flightname'][$count] = $_POST["flight_name".$row['flight_id'].""];
								$_SESSION['flight_from']= $row['flight_from'];
								$_SESSION['flight_to']= $row['flight_to'];
								$_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyflight".$row[flight_id].""];
								$_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyflight".$row[flight_id].""] * $_SESSION['total_night'] ) + $_SESSION['total_amount'] ;
								$_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
								$count = $count + 1;
							}
						}
											
				
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
<link rel="stylesheet" href="icon/css/fontello.css">
<link rel="stylesheet" href="icon/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="jquery.backstretch.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody" >
<div class="row foo" style="margin:30px auto 30px auto;" >
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
</div>


<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form name="guestdetails" action="unsetroomchosen.php" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Deparchar 
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Adults
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['adults'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Childrens
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['childrens'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Flight from
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['flight_from'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Flight to
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['flight_to'];?>
								</span>				
							
							</div>
						</div>
						<div class="row"><hr>
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Flight Selected
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="fontgreysmall">Seats
								</span>				
				