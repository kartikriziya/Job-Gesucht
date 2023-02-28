<?php

include 'connection.php';

$verify_otp = $_POST['verify_otp'];

if($verify_otp == 'Verify_signup_OTP')
{
	$email = $_POST['email'];
	$user_otp = $_POST['user_otp'];

	$select_otp = "SELECT * FROM otp WHERE email='$email'";
	$selected_otp = mysqli_query($conn,$select_otp);


	if($row=mysqli_fetch_array($selected_otp))
	{
		if($user_otp == $row['otp'])
		{
			echo("Correct_OTP");
		}
		else
		{
			echo("Incorrect_OTP");
		}
	}
	else
	{
		echo("No_OTP");
	}
}
elseif($verify_otp == 'Expire_signup_OTP')
{
	$email = $_POST['email'];
	$delete_expire_otp = "DELETE FROM otp WHERE email='$email'";
	$deleted_expire_otp = mysqli_query($conn,$delete_expire_otp);

	if($deleted_expire_otp)
	{
		echo("Expire_OTP_is_deleted");
	}
	else
	{
		echo("Expire_OTP_is_not_deleted");
	}
}
elseif($verify_otp == 'Expire_reset_OTP')
{
	$email = $_POST['email'];
	$delete_expire_otp = "DELETE FROM otp WHERE email='$email'";
	$deleted_expire_otp = mysqli_query($conn,$delete_expire_otp);

	if($deleted_expire_otp)
	{
		echo("Expire_OTP_is_deleted");
	}
	else
	{
		echo("Expire_OTP_is_not_deleted");
	}
}
elseif($verify_otp == 'Verify_reset_OTP')
{
	$email = $_POST['email'];
	$user_reset_otp = $_POST['user_reset_otp'];

	$select_otp = "SELECT * FROM otp WHERE email='$email'";
	$selected_otp = mysqli_query($conn,$select_otp);


	if($row=mysqli_fetch_array($selected_otp))
	{
		if($user_reset_otp == $row['otp'])
		{
			echo("Correct_OTP");
		}
		else
		{
			echo("Incorrect_OTP");
		}
	}
}
elseif($verify_otp == 'Expire_changepassword_OTP')
{
	$email = $_SESSION['user_email'];
	$delete_expire_otp = "DELETE FROM otp WHERE email='$email'";
	$deleted_expire_otp = mysqli_query($conn,$delete_expire_otp);

	if($deleted_expire_otp)
	{
		echo("Expire_OTP_is_deleted");
	}
	else
	{
		echo("Expire_OTP_is_not_deleted");
	}
}
elseif($verify_otp == 'Verify_Change_Password_OTP')
{
	$email = $_SESSION['user_email'];
	$user_changepassword_otp = $_POST['user_changepassword_otp'];

	$select_otp = "SELECT * FROM otp WHERE email='$email'";
	$selected_otp = mysqli_query($conn,$select_otp);


	if($row=mysqli_fetch_array($selected_otp))
	{
		if($user_changepassword_otp == $row['otp'])
		{
			echo("Correct_OTP");
		}
		else
		{
			echo("Incorrect_OTP");
		}
	}
}
else
{
	echo("ERROR : Didn't understood Verification Process");
}




/*$count=mysqli_num_rows($sql_result);
if($count>0)
{echo("yes record exist");}*/


?>