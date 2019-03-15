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
