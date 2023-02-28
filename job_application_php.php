<?php

include 'connection.php';



if(isset($_SESSION['user_email']))
{
	$arbeitnehmer_email = $_SESSION['user_email'];

	date_default_timezone_set('Europe/Berlin');
	$current_timestamp = time();
	$current_date = date("d-m-Y",$current_timestamp);
	//$current_date = date("d-m-Y H:i:s",$current_timestamp); //with time

	if(isset($_POST['apply']))
	{
		$get_job_details = "SELECT * FROM job_post WHERE job_post_id='".$_SESSION['job_selected_id']."' ";
		$got_job_details = mysqli_query($conn,$get_job_details);

		if($row=mysqli_fetch_array($got_job_details))
		{
			$arbeitgeber_email = $row['arbeitgeber_email'];
		}

		$application = $_POST['application'];
		$apply_again = "No";

		$check_application_availablity = "SELECT * FROM job_application WHERE job_post_id='".$_SESSION['job_selected_id']."' AND arbeitnehmer_email ='".$arbeitnehmer_email."' ";
		$checked_application_availablity = mysqli_query($conn,$check_application_availablity);
		$count=mysqli_num_rows($checked_application_availablity);


			$get_personal_details_sharecode = "SELECT * FROM job_application WHERE job_post_id='".$_SESSION['job_selected_id']."' ";
			$got_personal_details_sharecode = mysqli_query($conn,$get_personal_details_sharecode);
			if($row=mysqli_fetch_array($got_personal_details_sharecode))
			{
				$pd = $row['personal_details_sharecode'];
			}

		if($count>0)
		{
			$send_application_again = "UPDATE job_application SET application='".$application."',date_time='".$current_date."',apply_again='".$apply_again."' WHERE job_post_id='".$_SESSION['job_selected_id']."' AND arbeitnehmer_email ='".$arbeitnehmer_email."' ";
			$sended_application_again = mysqli_query($conn,$send_application_again);

				$save_application = "INSERT INTO old_applications (personal_details_sharecode,arbeitnehmer_email,application,date_time,job_post_id,arbeitgeber_email) VALUES('".$pd."','".$arbeitnehmer_email."','".$application."','".$current_date."','".$_SESSION['job_selected_id']."','".$arbeitgeber_email."')";
				$saved_application = mysqli_query($conn,$save_application);

			if($sended_application_again && $saved_application)
			{
				$get_arbeitnehmer_detail = "SELECT * FROM user_profile WHERE  email='".$arbeitnehmer_email."' ";
				$got_arbeitnehmer_detail = mysqli_query($conn,$get_arbeitnehmer_detail);
				if($row=mysqli_fetch_array($got_arbeitnehmer_detail))
				{
					$name = $row['first_name']." ".$row['last_name'];
				}

				echo("Bewerbung_Gesendet_erneut");

				smtp_mailer($arbeitgeber_email,'Neue Bewerbung in Ihrer Aktivität auf job-gesucht.com',$name,$pd,$application);
			}
			else
			{
				echo("An Error :-> For this Job Application");
			}
		}
		else
		{

			$select_job_action_total_applications = "SELECT total_applications FROM job_action WHERE  job_post_id='".$_SESSION['job_selected_id']."' ";
			$selected_job_action_total_applications = mysqli_query($conn,$select_job_action_total_applications);
			if($row=mysqli_fetch_array($selected_job_action_total_applications))
			{
				$total_applications = $row['total_applications'] + 1;
			}

			$create_personal_details_sharecode = "SELECT * FROM user WHERE email='".$arbeitnehmer_email ."' ";
			$created_personal_details_sharecode = mysqli_query($conn,$create_personal_details_sharecode);
			if($row=mysqli_fetch_array($created_personal_details_sharecode))
			{
				$personal_details_sharecode = $_SESSION['job_selected_id']."PD".$row['id'];
			}

			$send_application = "INSERT INTO job_application (personal_details_sharecode,arbeitnehmer_email,application,date_time,apply_again,job_post_id,arbeitgeber_email) VALUES('".$personal_details_sharecode."','".$arbeitnehmer_email."','".$application."','".$current_date."','".$apply_again."','".$_SESSION['job_selected_id']."','".$arbeitgeber_email."')";
			$sended_application = mysqli_query($conn,$send_application);

				$save_application = "INSERT INTO old_applications (personal_details_sharecode,arbeitnehmer_email,application,date_time,job_post_id,arbeitgeber_email) VALUES('".$personal_details_sharecode."','".$arbeitnehmer_email."','".$application."','".$current_date."','".$_SESSION['job_selected_id']."','".$arbeitgeber_email."')";
				$saved_application = mysqli_query($conn,$save_application);

			if($sended_application && $saved_application)
			{
				$update_total_applications = "UPDATE job_action SET total_applications='".$total_applications."' WHERE job_post_id='".$_SESSION['job_selected_id']."' ";
				$updated_total_applications = mysqli_query($conn,$update_total_applications);

				$get_arbeitnehmer_detail = "SELECT * FROM user_profile WHERE  email='".$arbeitnehmer_email."' ";
				$got_arbeitnehmer_detail = mysqli_query($conn,$get_arbeitnehmer_detail);
				if($row=mysqli_fetch_array($got_arbeitnehmer_detail))
				{
					$name = $row['first_name']." ".$row['last_name'];
				}

				if($updated_total_applications)
				{
					echo("Bewerbung_Gesendet");
					
					smtp_mailer($arbeitgeber_email,'Neue Bewerbung in Ihrer Aktivität auf job-gesucht.com',$name,$personal_details_sharecode,$application);
				}
				else
				{
					echo("An Error :-> For this Job Application");
				}
			}
			else
			{
				echo("An Error :-> For this Job Application");
			}
		}
		
	}
	elseif(isset($_POST['application_availablity'])) 
	{
		$check_application_availablity = "SELECT * FROM job_application WHERE job_post_id='".$_SESSION['job_selected_id']."' AND arbeitnehmer_email ='".$arbeitnehmer_email."' ";
		$checked_application_availablity = mysqli_query($conn,$check_application_availablity);

			if($row = mysqli_fetch_array($checked_application_availablity))
			{
				if($row['apply_again'] == "No")
				{
					echo("Bereits_beworben");
				}
				else
				{
					echo("Sie können sich erneut für diesen Job bewerben.");
				}
			}
	}
	elseif(isset($_POST['next_possible_application']))
	{
		$get_application_date = "SELECT * FROM job_application WHERE job_post_id='".$_SESSION['job_selected_id']."' AND arbeitnehmer_email ='".$arbeitnehmer_email."' ";
		$got_application_date = mysqli_query($conn,$get_application_date);

		if($row = mysqli_fetch_array($got_application_date))
		{
			$diff = abs(strtotime($row['date_time']) - strtotime($current_date));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				//$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
				//$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ (60));
				//$seconds = floor($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60);

			$next_date=date_create($current_date);
			$days_to_add = 3 - $days;
			if($days_to_add > 0)
			{
				date_add($next_date,date_interval_create_from_date_string($days_to_add." days"));
				echo date_format($next_date,"d-m-Y");
				//echo date_format($next_date,"d-m-Y H:i:s"); // with time
				//echo($days_to_add);
			}
			else
			{
				$apply_again = "Yes";

				$update_application_status = "UPDATE job_application SET apply_again='".$apply_again."' WHERE job_post_id='".$_SESSION['job_selected_id']."' AND arbeitnehmer_email ='".$arbeitnehmer_email."' ";
				$updated_application_status = mysqli_query($conn,$update_application_status);

				if($updated_application_status)
				{
					echo("Sie können sich erneut für diesen Job bewerben.");
				}

			}
		}
		else
		{
			echo("Error : in receiving application date");
		}
	}
	else //in this condition when user click on any job which has being shown on home page, activates a SESSION for job_application.php page to get the details of the selected job on job_application.php.
	{
		if(isset($_POST['job_selected_id']))
		{

			$get_job_post_sharecode = "SELECT * FROM job_post WHERE job_post_id='".$_POST['job_selected_id']."' ";
			$got_job_post_sharecode = mysqli_query($conn,$get_job_post_sharecode);

			if($row=mysqli_fetch_array($got_job_post_sharecode))
			{
				$job_post_sharecode = $row['job_post_sharecode']; 

				$_SESSION['job_selected_id'] = $_POST['job_selected_id'];
				echo("job_application.php?jg=".$job_post_sharecode);
			}

		}
	}
}
else
{
	echo("Bitte Login oder Signup.");
}




function smtp_mailer($to,$subject,$name,$pd,$application){
	
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

	$mail->setFrom($my_email,'Part-Time-Job');
	$mail->addAddress($to);
	$mail->addReplyTo($my_email);

	$mail->isHTML(true);
	$mail->Subject=$subject;
	//$mail->Body="<h1>$name </h1><h2>wants to apply for this job :- </h2><h4> $pd</h4>";
	//$mail->Body="<h2>$name wants to apply for this job :- </h2><h4> $pd</h4>  <pre><h3>$application</h3></pre>";
	$mail->Body="<h2>$name möchte sich für diesen Job bewerben :- </h2><h4> www.job-gesucht.com/arbeitnehmer_personal_details.php?pd=$pd</h4>";


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