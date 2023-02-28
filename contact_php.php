<?php

include 'connection.php';

if(isset($_SESSION['user_email']))
{
	$email = $_SESSION['user_email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	date_default_timezone_set('Europe/Berlin');
	$current_timestamp = time();
	$current_date = date("d-m-Y H:i:s",$current_timestamp);

	$send_message = "INSERT INTO contact (date_time,to_email,subject,message,from_email) VALUES('".$current_date."','jobgesucht2020@gmail.com','".$subject."','".$message."','".$email."')";
	$sended_message = mysqli_query($conn,$send_message);

	$get_sender_detail = "SELECT * FROM user_profile WHERE email='".$email."' ";
	$got_sender_detail = mysqli_query($conn,$get_sender_detail);

	if($row = mysqli_fetch_array($got_sender_detail))
	{
		$name = $row['first_name']." ".$row['last_name'];
	}

	if($sended_message)
	{
		echo("Nachricht_Gesendet");

		smtp_mailer('jobgesucht2020.com',$subject,$name,$message);
	}
	else
	{
		echo("Error in sending message");
	}

}
else
{
	echo("Bitte Login oder Signup.");
}



function smtp_mailer($to,$subject,$name,$message){
	
	$my_email = 'kartikriziya.kr@gmail.com';
	$my_password = 'akking2430';

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
	$mail->Body="<h2>$name möchte Ihnen kontaktieren. </h2><h4><pre> $message </pre></h4>";


	$mail->send();
	/*if (!$mail->send()) 
	{
		echo "Message could not be sent";
		//echo $mail->ErrorInfo;
	}
	else
	{
		echo "Message has been sent";
	}*/
}

?>