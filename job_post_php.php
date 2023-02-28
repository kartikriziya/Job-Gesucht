<?php

include 'connection.php';

$arbeitgeber_email = $_SESSION['user_email'];

	date_default_timezone_set('Europe/Berlin');
	$current_timestamp = time();
	$current_date = date("j-n-y",$current_timestamp);



if(isset($_FILES['job_img_file']['name']))
{
	$get_total_jobs = "SELECT * FROM job_post WHERE arbeitgeber_email='".$arbeitgeber_email."' ";
	$got_total_jobs = mysqli_query($conn,$get_total_jobs);
	$total_jobs_count=mysqli_num_rows($got_total_jobs);

	$total_jobs_count = $total_jobs_count + 1;

	$job_image = $_FILES['job_img_file']['name'];
	$job_img_name = $_SESSION['user_id']."_".$total_jobs_count."_".$job_image;

	$upload_path = "Job_Post_img/" . $job_img_name;
	move_uploaded_file($_FILES['job_img_file']['tmp_name'],$upload_path);

	$post_job = "INSERT INTO job_post (arbeitgeber_email,job_post_image) VALUES('".$arbeitgeber_email."','".$job_img_name."')";
	$posted_job = mysqli_query($conn,$post_job);

	$select_job = "SELECT * FROM job_post WHERE job_post_image='".$job_img_name."' ";
	$selected_job = mysqli_query($conn,$select_job);

	if($row=mysqli_fetch_assoc($selected_job))
	{
		$_SESSION['job_post_id'] = $row['job_post_id'];
	}
	else
	{
		echo("Error in fetching selected_job");
	}

}
else
{

	$firma_name = $_POST['firma_name'];
	$post_typeofjob = $_POST['post_typeofjob'];
	$strasse = $_POST['strasse'];
	$geschaft_nummer = $_POST['geschaft_nummer'];
	$postleitzahl = $_POST['postleitzahl'];
	$stadt = $_POST['stadt'];
	$land = $_POST['land'];

	$likes = 0;
	$saves = 0;
	$total_applications = 0;

	$select_arbeitsgeber_info = "SELECT * FROM user_profile WHERE email='".$arbeitgeber_email."' ";
	$selected_arbeitsgeber_info = mysqli_query($conn,$select_arbeitsgeber_info);

	if($row=mysqli_fetch_assoc($selected_arbeitsgeber_info))
	{
		$arbeitgeber_name = $row['first_name'];
		$post_countrycode = $row['country_code'];
		$arbeitsgeber_phone = $row['phone_number'];
	}
	else
	{
		echo("Error in fetching selected_arbeitsgeber_info");
	}

	if(isset($_SESSION['job_post_id']))
	{
		$date_code = str_replace("-","",$current_date);
		$job_post_sharecode = $_SESSION['job_post_id']."JG".$date_code;

		$update_job  = "UPDATE job_post SET job_post_sharecode='".$job_post_sharecode."',arbeitgeber_name='".$arbeitgeber_name."',country_code='".$post_countrycode."',arbeitgeber_phone='".$arbeitsgeber_phone."',firma_name='".$firma_name."',job_typen='".$post_typeofjob."',strasse='".$strasse."',nummer='".$geschaft_nummer."',postleitzahl='".$postleitzahl."',stadt='".$stadt."',land='".$land."' WHERE job_post_id ='".$_SESSION['job_post_id']."' ";
		$updated_job = mysqli_query($conn,$update_job);

		$insert_job_action = "INSERT INTO job_action (job_post_id,firma_name,likes,saves,total_applications,arbeitgeber_email) VALUES('".$_SESSION['job_post_id']."','".$firma_name."','".$likes."','".$saves."','".$total_applications."','".$arbeitgeber_email."') ";
		$inserted_job_action = mysqli_query($conn,$insert_job_action);

		if($updated_job && $inserted_job_action)
		{
			echo("Updated");
			unset($_SESSION['job_post_id']);
		}
		else
		{
			echo("Error in updating job");
		}
	}

	
}




?>