<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
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
</script>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<style>
input[type=text], input[type=password] {
   width: 40%;
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
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
div class="row foo" style="margin:30px auto 30px auto;"><br><br>
<div id="id01" class="">
  
  <form class=" " action="loginauth.php" method="POST">
    <div class="container">
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter E-mail" name="email" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="login">Login</button>
      
    </div>

 
  </form>
</div>

 
 </div>
</div>
 </script>
</body></html>