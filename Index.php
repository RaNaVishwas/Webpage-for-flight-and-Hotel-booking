<?php
session_start();
?>
<!DOCTYPE html>
/* Home page of reservation portal. Admin and new users can login and access their functionalities. Guest user can search for flights and hotel availability.*/
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<meta name="reservation hotel for malaysia" >
<meta name="zulkarnain" content="gambohnetwork.com.my">
<meta name="copyright" content="Hotel Malaysia, inc. Copyright (c) 2014">
<link rel="stylesheet" href="scss/normalize.css">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="scss/datepicker.css">
<link href="scss/datepicker.css" rel="stylesheet" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
<!--link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
        $("#checkout").datepicker();
        $("#checkin").datepicker({
        minDate : new Date(),
        onSelect: function (dateText, inst) {
        var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
        $("#checkout").datepicker("option", "minDate", date);
        }
        });
  });
  $(document).ready(function() {
        $("#departure").datepicker({
        minDate : new Date(),
        onSelect: function (dateText, inst) {
        var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
        $("#checkout").datepicker("option", "minDate", date);
        }
        });
  });
</script>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

<style>
nav {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.nav > li {
  position: relative;
  display: block;
}
.nav > li > a {
  position: relative;
  display: block;
  padding: 10px 15px;
  float:right;
}
.nav > li > a:hover,
.nav > li > a:focus {
  text-decoration: none;
}

.nav > li.disabled > a {
  color: #777;
}
.nav > li.disabled > a:hover,
.nav > li.disabled > a:focus {
  color: #777;
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
}
.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {
  border-color: #337ab7;
}
.nav .nav-divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.nav > li > a > img {
  max-width: none;
}
.nav-tabs {
  border-bottom: 1px solid #ddd;
}
.nav-tabs > li {
  float: left;
  margin-bottom: -1px;
}
.nav-tabs > li > a {
  margin-right: 2px;
  line-height: 1.42857143;
  border: 1px solid transparent;
  border-radius: 4px 4px 0 0;
}
.nav-tabs > li > a:hover {
  border-color: #eee #eee #ddd;
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
  color: #555;
  cursor: default;
  background-color: #fff;
  border: 1px solid #ddd;
  border-bottom-color: transparent;
}
.nav-tabs.nav-justified {
  width: 100%;
  border-bottom: 0;
}
.nav-tabs.nav-justified > li {
  float: none;
}
.nav-tabs.nav-justified > li > a {
  margin-bottom: 5px;
  text-align: center;
}
.nav-tabs.nav-justified > .dropdown .dropdown-menu {
  top: auto;
  left: auto;
}
@media (min-width: 768px) {
  .nav-tabs.nav-justified > li {
    display: table-cell;
    width: 1%;
  }
  .nav-tabs.nav-justified > li > a {
    margin-bottom: 0;
  }
}
.nav-tabs.nav-justified > li > a {
  margin-right: 0;
  border-radius: 4px;
}
.nav-tabs.nav-justified > .active > a,
.nav-tabs.nav-justified > .active > a:hover,
.nav-tabs.nav-justified > .active > a:focus {
  border: 1px solid #ddd;
}
input[type=text], input[type=password] {
   width: 80%;
     padding: 12px 43px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  margin: 0 -18px 0rem 39px;
}
.container button{
  margin: 7px 73px;
}
/* Set a style for all buttons */
</style>
<meta class="foundation-data-attribute-namespace"><meta class="foundation-mq-xxlarge"><meta class="foundation-mq-xlarge"><meta class="foundation-mq-large">
<meta class="foundation-mq-medium"><meta class="foundation-mq-small"><style></style><meta class="foundation-mq-topbar"></head>
<body class="fontbody" style="background-image : url(img/background.jpg); no-repeat center center fixed; background-size: cover;">
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid" style="background-color: #4aa3df;">
  <?php
  if(isset(($_SESSION['email']))){
       echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signout.php" style="color: #ffffff;">Sign Out</a></li>
          </ul>
        </div>';
  }
  else{
    echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signin.php" > <button type="button" style="color: #ffffff;">Sign In </button></a></li>
          </ul>
        </div>';
    echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php" > <button type="button" style="color: #ffffff;">Register </button></a></li>
          </ul>
        </div>';
    echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                <li><a href="admin/index.html" > <button type="button" style="color: #ffffff;">SuperAdmin </button></a></li>
          </ul>
          </div>';
    echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="admin/flight.php" > <button type="button" style="color: #ffffff;">Flight Admin </button></a></li>
          </ul>
          </div>';
    echo' <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="admin/hotel.php" > <button type="button" style="color: #ffffff;">Hotel Admin </button></a></li>
          </ul>
          </div>';
  }
    ?>
      </div>
    </nav>



<div class="row">
  <div class="large-4 columns blackblur fontcolor" style="padding-top:10px;">

  <div class="large-12 columns " >
  <p><b>Check Date</b></p><hr class="line">
      <form name="form" action="checkroom.php" method="post" onSubmit="return validateForm(this);">
      <div class="row">

          <div class="large-6 columns" style="max-width:100%;">
            <label class="fontcolor" for="checkin">Check In
              <input name="checkin" id="checkin" style="width:100%;"/>
            </label>
          </div>

          <div class="large-6 columns" style="max-width:100%;">
            <label class="fontcolor" for="checkout">Check Out
              <input name="checkout" id="checkout" style="width:100%;"/>
            </label>


          </div>
      </div>
      <div class="row">
          <div class="large-6 columns" style="max-width:100%;">
            <label class="fontcolor" for="location">Location
              <select  class="no_of_room" name="location" id="location">
                  <option value="" selected="selected">Select Location</option>
                <?php
                  include './auth.php';
                  $result1 = mysqli_query($dbhandle,"SELECT DISTINCT location FROM room ");
                  while( $rows = mysqli_fetch_assoc($result1) ) {
                              ?>
                  <option value="<?php echo $rows["location"]; ?>"><?php echo $rows["location"]; ?></option>
                <?php } ?>
              </select>
            </label>

          </div>
      </div>