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
<link rel="stylesheet" href="build/css/intlTelInput.css">
<!--link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="icon/css/fontello.css">
<link rel="stylesheet" href="icon/css/animation.css"><!--[if IE 7]><link rel="stylesheet" href="css/fontello-ie7.css"><![endif]>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script-->
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large"><meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody">
<div class="row foo" style="margin:30px auto 30px auto;">


</div>
</div>

<div class="row">
	<div class="large-8 columns blackblur fontcolor" style="padding-top:10px;">
		<p><b> Details</b><hr class="line"></p>
		<form action="registerauth.php" method="POST"  >
		  <div class="row">

			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input name="firstname" type="text" id="firstname"  pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input name="lastname" type="text" id="lastname" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Email Address*
				<input name="email" type="email"  id="email" placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="" style="color:black !important;">Telephone Number*
				<input name="phone" type="text" id="phone"  pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  placeholder="" size="35" required/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 1*
				<input name="addressline1" type="text"   id="addressline1" placeholder="" required/>
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 2
				<input name="addressline2" type="text" id="addressline2"  placeholder=""/ />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Zip/Postcode*
				<input name="postcode" type="text"  id="postcode" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed><;" required placeholder=""/ />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Password*
				<input name="password" type="password"  id="password" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed><;" required placeholder=""/ />
			  </label>
			</div>
		  </div>



		  <div class="row">
			<div class="large-12 columns" style="text-align:right;"><button name="submit" type="submit" id="submit" class="button small fontslabo" onSubmit="return validateForm(this);" style="background-color:#2ecc71;"  >Register</button>
		  </div>

		  </div>
		</form>

	</div>

</div>
