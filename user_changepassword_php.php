<?php

include 'connection.php';

if (isset($_SESSION['user_email']))
{
	$email = $_SESSION['user_email'];
	$newpassword = $_POST['new_password'];
}
else
{
	$email = $_POST['email'];
	$newpassword = $_POST['password'];
}




$change_password = "UPDATE user SET password='".$newpassword."' WHERE email='".$email."' ";
$changed_password = mysqli_query($conn,$change_password);

if($changed_password)
{
	$delete_otp = "DELETE FROM otp WHERE email='$email' ";
	if(mysqli_query($conn,$delete_otp))
	{
		session_unset();
		session_destroy();
		echo("login.php"); 
	}
}

?>