/*User can use this page to search the room availanility by clicking on the respective date in the calendar*/
<?php
session_start();
include './auth.php';
if(isset($_POST["checkin"]) && !empty($_POST["checkin"]) && isset($_POST["checkout"]) && !empty($_POST["checkout"])){
	$_SESSION['checkin_date'] = date('d-m-y', strtotime($_POST['checkin']));
	$_SESSION['checkout_date'] = date('d-m-y', strtotime($_POST['checkout']));
	$_SESSION['location_entered'] = $_POST['location'];
	$_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['checkin']));
	$_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['checkout']));
	$_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
	$_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
	$_SESSION['checkin_unformat'] = $_POST["checkin"];
	$_SESSION['checkout_unformat'] = $_POST["checkout"];
	$_SESSION['interval'] = $_SESSION['datetime1']->diff($_SESSION['datetime2']);
	$_SESSION['total_night'] = $_SESSION['interval']->format('%d');
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
			<p class="fontgrey">Select Room</p>
		</div>

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

							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Check In
								</span>
							</div>

							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
								</span>

							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Check Out
								</span>
							</div>

							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkout_date'];?>
								</span>

							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Adults
								</span>
							</div>

							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['adults'];?>
								</span>

							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Childrens
								</span>
							</div>

							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['childrens'];?>
								</span>

							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey" style="font-size:13.2px;">No. of Night Stay(s)
								</span>
							</div>

							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo  $_SESSION['total_night'];?>
								</span>

							</div>
						</div>

					</div>
				</div>



				  <div class="row">
					<div class="large-12 columns" >
						<br><button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Edit Reservation</button>
					</div>
				  </div>
				</form>
		</div>
		<div class="large-12 columns" id="roomselected" style="display:none;" >
				<hr>
							<br><label for="submit-form" class="book button small fontslabo" style="background-color:#2ecc71; width:100%; height:45px; !important;">Proceed To Book</label><!--button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Proceed Booking</button-->

		</div>



	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding:10px">

		<div class="large-12 columns" >
			<?php
				include './auth.php';
				// check available room
				$datestart =  date('y-m-d', strtotime($_SESSION['checkin_unformat']) );
				$dateend =  date('y-m-d', strtotime($_SESSION['checkout_unformat']));
