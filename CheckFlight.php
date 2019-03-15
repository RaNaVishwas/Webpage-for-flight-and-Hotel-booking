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
						
<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Departure
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
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
						
					</div>	
				</div>
						

				
				  <div class="row">
					<div class="large-12 columns" >
						<br><button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Edit Reservation</button>
					</div>
				  </div>
				</form>
		</div>
		<div class="large-12 columns" id="flightselected" style="display:none;" >
				<hr>
							<br><label for="submit-form" class="book button small fontslabo" style="background-color:#2ecc71; width:100%; height:45px; !important;">Proceed To Book</label><!--button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Proceed Booking</button-->

		</div>
	


	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding:10px">
	 
		<div class="large-12 columns" >
			<?php
				include './auth.php';
				// check available flight
				$datestart =  date('y-m-d', strtotime($_SESSION['checkin_date']) );
				//$dateend =  date('y-m-d', strtotime($_SESSION['checkout_unformat']));
				
				$result = mysqli_query($dbhandle,"SELECT r.flight_id, (r.total_seats-br.total) as availableseats from flight as r LEFT JOIN ( 
				
										SELECT flightbook.flight_id, sum(flightbook.totalflightbook) as total from flightbook where flightbook.booking_id IN 
											(
												SELECT b.booking_id as bookingID from flight_booking as b 
												where 
												(b.checkin_date between '".$datestart."' AND '".$datestart."') 
												OR 
												(b.checkout_date between '".$datestart."' AND '".$datestart."')
												
											)
										
										group by flightbook.flight_id
										)
										as br
					 
					 ON r.flight_id = br.flight_id");
				
				if(mysqli_num_rows($result) > 0){
					echo "<p><b>Choose Your Flight</b></p><hr class=\"line\">";
					print "				<form action=\"insertandemail_flight.php\" method=\"post\">\n";
					
							
					while ($row = mysqli_fetch_array($result)) {
				
								
						if($row['availableseats'] != null && $row['availableseats'] > 0  )
						{
							
							$sub_result = mysqli_query($dbhandle,"select flight.* from flight where flight.flight_id = ".$row['flight_id']." AND flight_from='".$_SESSION['departure']."' AND flight_to='".$_SESSION['arrive']."'  ");
							
							if(mysql_num_rows($sub_result) > 0)
							{
								
								while($sub_row = mysqli_fetch_array($sub_result)){
								
								
								print "					<p><h4>".$sub_row['flight_name']."</h4></p>\n";
								print "					<div class=\"row\">\n";
								print "					\n";
								print "						<div class=\"large-4 columns\">\n";
								print "							<img src=\"".$sub_row['imgpath']."\"></img>\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p><span class=\"fontgrey\">Occupancy : </span> ".$sub_row['occupancy']."<br>\n";
								print "						<br><span class=\"fontgrey\">From : </span> ".$sub_row['flight_from']."\n";
								print "						<br><span class=\"fontgrey\">To : </span> ".$sub_row['flight_to']."</p>\n";
								print "\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p ><span class=\"fontgrey\">Rate : MYR </span><span style=\"font-size:24px;\">".$sub_row['rate']."</span><span class=\"fontgrey\">/ seat</span><br>\n";
								print "						<span style=\"text-align:right;\">".$row['availableseats']." seats available</span>\n";
								print "						</p>\n";
								print "							<div class=\"row\">\n";
								print "								<div class=\"large-11 columns\">\n";
								print "									<label class=\"fontcolor\">\n";
								print "										<select  class=\"no_of_flight\" name=\"qtyflight".$sub_row['flight_id']."\" id=\"flight".$sub_row['flight_id']."\" onChange=\"selection(".$sub_row['flight_id'].")\"  style=\"width:100%; color:black; height:45px;\" ;\">\n";
								print "											<option  value=\"0\">0</option>\n";
																				$i = 1;
																				while($i <= $row['availableseats'])
																				{
								print "											<option value=\"".$i."\">".$i."</option>\n";	
																				$i = $i+1;
																				}
								print "										</select>\n";
								print "									</label>\n";
								print "								</div>\n";
								print "								<div class=\"large-1 columns\">\n";
							    print "<input type=hidden name=\"selectedflight".$sub_row['flight_id']."\"  id=\"selectedflight".$sub_row['flight_id']."\" value=\"".$sub_row['flight_id']."\">";
								print "<input type=hidden name=\"flight_name".$sub_row['flight_id']."\" id=\"flight_name".$sub_row['flight_id']."\" value=\"".$sub_row['flight_name']."\">";
								print "								</div>\n";
								print "							</div>\n";
								print "						</div>\n";
								print "						\n";
								print "					</div>\n";
								print "					\n";
								print "				<hr>";
								}}
						}
						else if($row['availableseats'] == null ){
							$sub_result2 = mysqli_query($dbhandle,"select flight.* from flight where flight.flight_id = ".$row['flight_id']." AND flight_from='".$_SESSION['departure']."' AND flight_to='".$_SESSION['arrive']."'");
							if(mysqli_num_rows($sub_result2) > 0)
							{
								while($sub_row2 = mysqli_fetch_array($sub_result2)){
								
								print "					<p><h4>".$sub_row2['flight_name']."</h4></p>\n";
								print "					<div class=\"row\">\n";
								print "					\n";
								print "						<div class=\"large-4 columns\">\n";
								print "							<img src=\"".$sub_row2['imgpath']."\"></img>\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p><span class=\"fontgrey\">Occupancy : </span> ".$sub_row2['occupancy']."<br>\n";
								print "						<br><span class=\"fontgrey\">From : </span> ".$sub_row2['flight_from']."\n";
								print "						<br><span class=\"fontgrey\">To : </span> ".$sub_row2['flight_to']."</p>\n";
								print "\n";
								print "						</div>\n";
								print "						<div class=\"large-4 columns\">\n";
								print "						<p ><span class=\"fontgrey\">Rate : $ </span><span style=\"font-size:24px;\">".$sub_row2['rate']."</span><span class=\"fontgrey\">/ seatg</span><br>\n";
								print "						<span style=\"text-align:right;\">".$sub_row2['total_seats']." seats available</span>\n";
								print "						</p>\n";
								print "							<div class=\"row\">\n";
								print "								<div class=\"large-11 columns\">\n";
								print "									<label class=\"fontcolor\">\n";
								print "										<select  class=\"no_of_flight\" name=\"qtyflight".$sub_row2['flight_id']."\"  id=\"flight".$sub_row2['flight_id']."\" onChange=\"selection(".$sub_row2['flight_id'].")\" style=\"width:100%; color:black; height:45px;\" >\n";
								print "											<option value=\"0\">0</option>\n";
																				$i = 1;
																				while($i <= $sub_row2['total_seats'])
																				{
								print "											<option value=\"".$i."\">".$i."</option>\n";	
																				$i = $i+1;
																				}
								print "										</select>\n";
								print "									</label>\n";
								print "								</div>\n";
								print "								<div class=\"large-1 columns\">\n";
							    print "<input type=hidden name=\"selectedflight".$sub_row2['flight_id']."\" value=\"".$sub_row2['flight_id']."\">";
								print "<input type=hidden name=\"flight_name".$sub_row2['flight_id']."\" value=\"".$sub_row2['flight_name']."\">";
								//print "				<button type=\"submit\"  class=\"book button small\" style=\"background-color:#2ecc71; width:100%; height:45px; !important;\" >Book</button>\n";	
								print "								</div>\n";
								print "							</div>\n";
								print "						</div>\n";
								print "						\n";
								print "					</div>\n";
								print "					\n";
								print "				<hr>";
								}
								
							}		
						}
					}
				}		
				else{
				echo "<p><b>No flight available</b></p><hr>";
				}
					print "<button type=\"submit\" id=\"submit-form\" class=\"hidden\" style=\"display:none\">Book</button>\n";
							print "	</form>";	
			?>
		</div>
	


	</div>

</div>
<script>
function selection(id) {
	var e = document.getElementById('flightselected').style.display='block';
}
</script>
</body></html>
