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
                                $_SESSION['admin_id']= $row['admin_id'];
                                $_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyflight".$row['flight_id'].""];
                                $_SESSION['total_amount'] =  ( $row['rate']   * $_SESSION['total_seats'] ) ;
                                $_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
                                $_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyflight".$row[flight_id].""];
                                $_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyflight".$row[flight_id].""] )  ;
                                $_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
                                $count = $count + 1;
                            }
                        }
                                            
                
                    }
    
?>
<?php
session_start();
$sql=mysqli_query($dbhandle,"SELECT * FROM register WHERE email= '".$_SESSION['email']."'");
if(mysqli_num_rows($sql) > 0)
{
                        while($row = mysqli_fetch_array($sql))
                        {
                                $_SESSION['firstname'] = $row["firstname"];
                                $_SESSION['lastname'] = $row["lastname"];
                                $_SESSION['email'] = $row["email"];
                                $_SESSION['phone'] = $row["phone"];
                                $_SESSION['addressline1'] = $row["addressline1"];
                                $_SESSION['addressline2'] = $row["addressline2"];
                                $_SESSION['postcode'] = $row["postcode"];
                        }
                    }
mysqli_query($dbhandle,"INSERT INTO flight_booking (booking_id, total_adult, total_children, checkin_date, checkout_date, flight_from, flight_to, special_requirement, payment_status, total_amount, deposit, first_name, last_name, email, telephone_no, add_line1, add_line2, city, state, postcode, country, admin_id) 
VALUES (NULL, '".$_SESSION['adults']."' , '".$_SESSION['childrens']."', '".$_SESSION['checkin_db']."', '".$_SESSION['checkout_db']."', '".$_SESSION['flight_from']."', '".$_SESSION['flight_to']."', '".$_SESSION['special_requirement']."', 'pending', '".$_SESSION['total_amount']."', '".$_SESSION['deposit']."', '".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['email']."', '".$_SESSION['phone']."', '".$_SESSION['addressline1']."', '".$_SESSION['addressline2']."', '".$_SESSION['city']."', '".$_SESSION['state']."', '".$_SESSION['postcode']."', '".$_SESSION['country']."','".$_SESSION['admin_id']."')");
$_SESSION['booking_id'] = mysqli_insert_id($dbhandle);
$count = 0;
foreach ($_SESSION['flight_id'] as &$value0  ) {
mysqli_query($dbhandle,"INSERT INTO `flightbook` (`booking_id`, `flight_id`, `totalflightbook`, `id`, `admin_id`) VALUES ('".$_SESSION['booking_id']."', '".$value0."', '".$_SESSION['flightqty'][$count]."', NULL, '".$_SESSION['admin_id']."');");
$count = $count+1;
} ;
$to      = $_SESSION['email'];
$subject = "Booking Confirmation";
$message ="<html><body>";
$message .="<table class=\"body-wrap\">\n";
$message .="    <tr>\n";
$message .="        <td></td>\n";
$message .="        <td class=\"container\" width=\"600\">\n";
$message .="            <div class=\"content\">\n";
$message .="                <table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
$message .="                    <tr>\n";
$message .="                        <td class=\"content-wrap aligncenter\">\n";
$message .="                            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
$message .="                                <tr>\n";
$message .="                                    <td class=\"content-block\">\n";
$message .="                                        <h1>Room Booked!</h1>\n";
$message .="                                    </td>\n";
$message .="                                </tr>\n";
$message .="                                <tr>\n";
$message .="                                    <td class=\"content-block\">\n";
$message .="                                        <h2>Thanks for giving us opportunity to serve you.</h2>\n";
$message .="                                    </td>\n";
$message .="                                </tr>\n";
$message .="                                <tr>\n";
$message .="                                    <td class=\"content-block\">\n";
$message .="                                        <table class=\"invoice\">\n";
$message .="                                            <tr>\n";
$message .="                                                <td>Dear ".$_SESSION['firstname']." ".$_SESSION['lastname']."<br><br><b>Booking ID #".$_SESSION['booking_id']."</b><br><b>".$_SESSION['total_night']."</b> night stay(s) from <b>".$_SESSION['checkin_date']."</b> to <b>".$_SESSION['checkout_date']."</b><br>No. of Guest :<b> ".$_SESSION['adults']."</b> Adult(s) & <b>".$_SESSION['childrens']."</b> Child(s)<br><br><b>Contact Detail</b><br>".$_SESSION['addressline1'].", ".$_SESSION['addressline2']."<br>".$_SESSION['postcode']." ".$_SESSION['city'].", <br>".$_SESSION['state'].", ".$_SESSION['country']."<br>Phone <b>".$_SESSION['phone']."</b><br>Email <b>".$_SESSION['email']."</b><br><br><br></td>\n";
$message .="                                            </tr>\n";
$message .="                                            <tr>\n";
$message .="                                                <td>\n";
$message .="                                                    <table class=\"invoice-items\" cellpadding=\"0\" cellspacing=\"0\">\n";
$count = 0;
foreach ($_SESSION['flight_id'] as &$value0  ) {
$message .="                                                        <tr>\n";
$message .="                                                            <td style=\"width:200px;\"><b>".$_SESSION['flightqty'][$count]." ".$_SESSION['flightname'][$count]."</b></td>\n";
$message .="                                                            <td  style=\"width:200px;\"> <b>RM".$_SESSION['ind_rate'][$count]."</b></td>\n";
$message .="                                                        </tr>\n";
$count = $count+1;
} ;
$message .="                                                        <tr>\n";
$message .="                                                            <td style=\"width:200px;\">Total</td>\n";
$message .="                                                            <td  style=\"width:200px;\"> <b>RM".$_SESSION['total_amount']."</b></td>\n";
$message .="                                                        </tr>\n";
$message .="                                                        <tr>\n";
$message .="                                                            <td style=\"width:200px;\">15% Deposit Due</td>\n";
$message .="                                                            <td  style=\"width:200px;\"><b>RM".$_SESSION['deposit']."</b></td>\n";
$message .="                                                        </tr>\n";;
$message .="                                                        \n";
$message .="                                                    </table>\n";
$message .="                                                    <br><b>";
$message .="                     <form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">\n";
$message .="                    <input type=\"hidden\" name=\"cmd\" value=\"_s-xclick\">\n";
$message .="                    <input type=\"hidden\" name=\"hosted_button_id\" value=\"3FWZ42DLC5BJ2\">\n";
$message .="                    <input type=\"hidden\" name=\"lc\" value=\"MY\">\n";
$message .="                    <input type=\"hidden\" name=\"item_name\" value=\"15% Hotel Deposit for Booking ID #".$_SESSION['booking_id']."; \">\n";
$message .="                    <input type=\"hidden\" name=\"amount\" value=\"".$_SESSION['deposit']."\">\n";
$message .="                    <input type=\"hidden\" name=\"currency_code\" value=\"MYR\">\n";
$message .="                    <input type=\"hidden\" name=\"button_subtype\" value=\"services\">\n";
$message .="                    <input type=\"hidden\" name=\"no_note\" value=\"0\">\n";
$message .="                    <input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest\">\n";
$message .="                    <input type=\"hidden\" name=\"custom\" value=\"".$_SESSION['booking_id']."\">\n";
$message .="                    <br><button class=\"button small \" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\" style=\"background-color:#2ecc70;border:0px solid #18ab29; display:inline-block; color:#ffffff; font-size:15px; padding:5px 5px;\">Pay Deposit Via Paypal Here</button>\n";
$message .="                    <img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n";
$message .="                    </form>";
$message .="                    <br>Notes & Policy:</b>\n";

$message .="                                                            <br>\n";
$message .="                                                            <b>1. Please pay 15% deposit to confirmed your booking.</b><br>\n";
$message .="                                                            2. This hotel are not allowed etc etc<br>\n";
$message .="                                                            3. Please check in before bla bla<br>\n";
$message .="                                                            4. The hotel management has right to cancelled the booking\n";
$message .="                                                            <br>\n";
$message .="                                                            \n";
$message .="                                                </td>\n";
$message .="                                            </tr>\n";
$message .="                                        </table>\n";
$message .="                                    </td>\n";
$message .="                                </tr>\n";
$message .="                                <tr>\n";
$message .="                                </tr>\n";
$message .="                                <tr>\n";
$message .="                                    <td>\n";
$message .="                                        <br><br>Hotel Address, Street Your address, 50450 Kuala Lumpur, Malaysia\n";
$message .="                                    </td>\n";
$message .="                                </tr>\n";
$message .="                            </table>\n";
$message .="                        </td>\n";
$message .="                    </tr>\n";
$message .="                </table>\n";
$message .="                <div class=\"footer\">\n";
$message .="                    <table width=\"100%\">\n";
$message .="                        <tr>\n";
$message .="                            <td><br>Questions? Email <a href=\"mailto:\">info@hotel.com.my or Call Us at 0000000</a></td>\n";
$message .="                        </tr>\n";
$message .="                    </table>\n";
$message .="                </div></div>\n";
$message .="        </td>\n";
$message .="        <td></td>\n";
$message .="    </tr>\n";
$message .="</table>";
$message .="</body></html>";
$headers  ="From: admin@hotel.gamboh.com.my";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to, $subject, $message, $headers);
header("location: reservationcomplete_flight.php");
} 
else
{
session_destroy();
echo '<script> alert("Login to continue"); </script>';
header('Refresh: 0;url=signin.php');
}
?>
©