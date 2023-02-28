<?php

include 'connection.php';


$send_otp = $_POST['send_otp'];

if($send_otp == 'Create_OTP')
{
	$email = $_POST['email'];
	$otp = rand(11111,99999);

	$check_email_exists = "SELECT email FROM user WHERE email='$email'";
	$checked_email_exists = mysqli_query($conn,$check_email_exists);


	$count=mysqli_num_rows($checked_email_exists);
	if($count>0)
	{
		echo("Email Already Exists!!!");
	}
	else
	{
		$select_otp = "SELECT otp FROM otp WHERE email='$email'";
		$selected_otp = mysqli_query($conn,$select_otp);

		$count_otp=mysqli_num_rows($selected_otp);
		if($count_otp>0)
		{
			$update_otp = "UPDATE otp SET otp='$otp' WHERE email='$email'";
			$updated_otp = mysqli_query($conn,$update_otp);

			if($updated_otp)
			{
				smtp_mailer($email,'OTP-Code zur Registrierung auf job-gesucht.com',$otp);	
			}
			else
			{
				echo("Error in inserting update_otp");
			}
		}
		else
		{
			$create_otp = "INSERT INTO otp (email,otp) VALUES ('$email','$otp')";
			$created_otp = mysqli_query($conn,$create_otp);

			if($created_otp)
			{
				smtp_mailer($email,'OTP-Code zur Registrierung auf job-gesucht.com',$otp);	
			}
			else
			{
				echo("Error in inserting create_otp");
			}
		}
	}
}
elseif($send_otp == 'Create_OTP_Again') 
{
	$email = $_POST['email'];
	$otp = rand(11111,99999);

	$create_otp_again = "UPDATE otp SET otp='$otp' WHERE email='$email'";
	$created_otp_again = mysqli_query($conn,$create_otp_again);

	if($created_otp_again)
	{
		smtp_mailer($email,'OTP-Code zur erneuten Registrierung auf job-gesucht.com',$otp);
	}
	else
	{
		echo("Error in inserting create_otp_again");
	}

}
elseif($send_otp == 'Expire_Create_OTP_Again') 
{
	$email = $_POST['email'];
	$otp = rand(11111,99999);

	$create_otp = "INSERT INTO otp (email,otp) VALUES ('$email','$otp')";
	$created_otp = mysqli_query($conn,$create_otp);

	if($created_otp)
	{
		smtp_mailer($email,'OTP-Code zur Registrierung auf job-gesucht.com',$otp);
	}
	else
	{
		echo("Error in inserting create_otp");
	}
}
elseif($send_otp == 'Reset_OTP')
{

	$email = $_POST['email'];
	$otp = rand(11111,99999);

		$select_otp = "SELECT otp FROM otp WHERE email='$email'";
		$selected_otp = mysqli_query($conn,$select_otp);

		$count_otp=mysqli_num_rows($selected_otp);
		if($count_otp>0)
		{
			$update_otp = "UPDATE otp SET otp='$otp' WHERE email='$email'";
			$updated_otp = mysqli_query($conn,$update_otp);

			if($updated_otp)
			{
				smtp_mailer($email,'OTP-Code um das Passwort auf job-gesucht.com zurückzusetzen',$otp);	
			}
			else
			{
				echo("Error in updating update_otp");
			}
		}
		else
		{
			$create_otp = "INSERT INTO otp (email,otp) VALUES ('$email','$otp')";
			$created_otp = mysqli_query($conn,$create_otp);

			if($created_otp)
			{
				smtp_mailer($email,'OTP-Code um das Passwort auf job-gesucht.com zurückzusetzen',$otp);	
			}
			else
			{
				echo("Error in inserting create_otp");
			}
		}

}
elseif($send_otp == 'Change_Password_OTP') 
{
	$email = $_SESSION['user_email'];
	$otp = rand(11111,99999);

	$select_otp = "SELECT otp FROM otp WHERE email='$email'";
	$selected_otp = mysqli_query($conn,$select_otp);

	$count_otp=mysqli_num_rows($selected_otp);
	if($count_otp>0)
	{
		$update_otp = "UPDATE otp SET otp='$otp' WHERE email='$email'";
		$updated_otp = mysqli_query($conn,$update_otp);

		if($updated_otp)
		{
			smtp_mailer($email,'OTP-Code zum Ändern des Passworts auf job-gesucht.com',$otp);
		}
		else
		{
			echo("Error in inserting update_otp");
		}
	}
	else
	{
		$create_otp = "INSERT INTO otp (email,otp) VALUES ('$email','$otp')";
		$created_otp = mysqli_query($conn,$create_otp);

		if($created_otp)
		{
			smtp_mailer($email,'OTP-Code zum Ändern des Passworts auf job-gesucht.com',$otp);
		}
		else
		{
			echo("Error in inserting create_otp");
		}
	}

}
elseif($send_otp == 'Change_Password_OTP_Again') 
{
	$email = $_SESSION['user_email'];
	$otp = rand(11111,99999);

	$create_otp_again = "UPDATE otp SET otp='$otp' WHERE email='$email'";
	$created_otp_again = mysqli_query($conn,$create_otp_again);

	if($created_otp_again)
	{
		smtp_mailer($email,'OTP-Code zum erneuten Ändern des Passworts auf job-gesucht.com',$otp);
	}
	else
	{
		echo("Error in inserting create_otp_again");
	}

}
elseif($send_otp == 'Expire_Change_Password_OTP_Again') 
{
	$email = $_SESSION['user_email'];
	$otp = rand(11111,99999);

	$select_otp = "SELECT otp FROM otp WHERE email='$email'";
	$selected_otp = mysqli_query($conn,$select_otp);

	$count_otp=mysqli_num_rows($selected_otp);

	if($count_otp>0)
	{
		$update_otp = "UPDATE otp SET otp='$otp' WHERE email='$email'";
		$updated_otp = mysqli_query($conn,$update_otp);

		if($updated_otp)
		{
			smtp_mailer($email,'OTP-Code zum Ändern des Passworts auf job-gesucht.com',$otp);
		}
		else
		{
			echo("Error in inserting update_otp");
		}
	}
	else
	{
		$create_otp = "INSERT INTO otp (email,otp) VALUES ('$email','$otp')";
		$created_otp = mysqli_query($conn,$create_otp);

		if($created_otp)
		{
			smtp_mailer($email,'OTP-Code zum Ändern des Passworts auf job-gesucht.com',$otp);
		}
		else
		{
			echo("Error in inserting create_otp");
		}
	}

	
}
else
{
	echo("Error");
}




function smtp_mailer($to,$subject, $otp){
	
	$my_email = 'kartikriziya.kr@gmail.com';
	$my_password = 'blwomtslqzrmunld';

	require 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug=0;

	$mail->Host='smtp.gmail.com';
	$mail->Port=465;  //or 587
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='ssl'; //or tls

	$mail->Username=$my_email;
	$mail->Password=$my_password;

	$mail->setFrom($my_email,'Job-Gesucht');
	$mail->addAddress($to);
	$mail->addReplyTo($my_email);

	$mail->isHTML(true);
	$mail->Subject=$subject;
	$mail->Body="<h1>Your one-time code is : $otp</h1><h3><pre>Dieser Code läuft aus Sicherheitsgründen in 20 Minuten ab.</pre></h3>";

	if (!$mail->send()) 
	{
		echo "Message could not be sent";
		//echo $mail->ErrorInfo;
	}
	else
	{
		echo "Message has been sent";
	}
}


?>