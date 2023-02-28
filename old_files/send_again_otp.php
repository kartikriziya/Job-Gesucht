<?php

include 'connection.php';

$email = $_POST['email'];
$again_otp = rand(11111,99999);

$sql = "UPDATE otp SET otp='$again_otp' WHERE email='$email'";
mysqli_query($conn,$sql);

smtp_mailer($email,'OTP Code',$again_otp);


function smtp_mailer($to,$subject, $msg){

	
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

	$mail->setFrom($my_email,'User');
	$mail->addAddress($to);
	$mail->addReplyTo($my_email);

	$mail->isHTML(true);
	$mail->Subject=$subject;
	$mail->Body=$msg;

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