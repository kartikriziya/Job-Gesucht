<?php

include 'connection.php';

$email = $_POST['email'];
$nehmer_geber =$_POST['nehmer_geber'];
$password = $_POST['password'];

$otp_delete = "DELETE FROM otp WHERE email='$email'";

 if(mysqli_query($conn,$otp_delete))
 {
 	$user_register = "INSERT INTO user (email,nehmer_geber,password) VALUES('$email','$nehmer_geber','$password')";
 	$user_profile = "INSERT INTO user_profile (email) VALUES('".$email."')";
 	$user_aboutme = "INSERT INTO user_aboutme (email) VALUES('".$email."')";
 	if(mysqli_query($conn,$user_register) && mysqli_query($conn,$user_profile) && mysqli_query($conn,$user_aboutme))
 	{
 		echo("Benutzer_registriert");
 	}
 	else
 	{
 		echo(mysqli_error($con));
 	}
 }




?>