<?php
include 'connection.php';

$email = $_SESSION['user_email'];

$delete_otp_of_current_user = "DELETE from otp WHERE email='".$email."' ";
$deleted_otp_of_current_user = mysqli_query($conn,$delete_otp_of_current_user);

if($deleted_otp_of_current_user)
{
	
}


session_unset();
session_destroy();
echo("index.php"); 

?>