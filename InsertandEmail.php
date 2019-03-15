<?php
session_start();
include './auth.php';
$re = mysqli_query($dbhandle,"select * from register where email = '".$_SESSION['email']."'  AND password = '".$_SESSION['password']."' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{
    include './auth.php';
    if(!isset($_SESSION['room_id'])){
                        
                        $_SESSION['room_id'] = array();
                        
                        $_SESSION['roomname'] = array();
                        
                        $_SESSION['roomqty'] = array();
                        $_SESSION['ind_rate'] = array();
                        $_SESSION['total_amount'] = 0;
                        $_SESSION['deposit'] = 0;
                        }
    
                $result = mysqli_query($dbhandle,"select * from room");
                    if(mysqli_num_rows($result) > 0){
    
                
                        $count = 0;
                        
                        while($row = mysqli_fetch_array($result)){
                        
                            if (isset($_POST["qtyroom".$row['room_id'].""])   && !empty($_POST["qtyroom".$row['room_id'].""]) )
                            {
                                $_SESSION['room_id'][$count] = $_POST["selectedroom".$row['room_id'].""];
                                $_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['room_id'].""];
                                $_SESSION['roomname'][$count] = $_POST["room_name".$row['room_id'].""];
                                $_SESSION['admin_id']= $row['admin_id'];
                                $_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyroom".$row[room_id].""];
                                $_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyroom".$row[room_id].""] * $_SESSION['total_night'] ) + $_SESSION['total_amount'] ;
                                $_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
                                $count = $count + 1;
                            }
                        }
                                            
                
                    }
    
?>
<?php
include './auth.php';
session_start();
$sql=mysqli_query($dbhandle,"SELECT * FROM register WHERE email= '".$_SESSION['email']."'");
if(mysqli_num_rows($sql) > 0)
                    {