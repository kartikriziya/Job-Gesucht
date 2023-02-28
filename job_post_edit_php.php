<?php

include 'connection.php';

$arbeitgeber_email = $_SESSION['user_email'];



if(isset($_FILES['job_img_file']['name']))
{
	$job_edit_id = $_SESSION['edit_jobs'];

	$get_job_details = "SELECT * FROM job_post WHERE job_post_id='".$job_edit_id."' ";
	$got_job_details = mysqli_query($conn,$get_job_details);

	if($row=mysqli_fetch_array($got_job_details))
	{
		$delete_path = "Job_Post_img/" . $row['job_post_image'];
		unlink($delete_path);
	}
	else
	{
		echo("Error in fetching got_job_details");
	}

	$get_total_jobs = "SELECT * FROM job_post WHERE arbeitgeber_email='".$arbeitgeber_email."' ORDER BY job_post_id ASC";
	$got_total_jobs = mysqli_query($conn,$get_total_jobs);
	$total_jobs_count=0;

		while($row=mysqli_fetch_array($got_total_jobs))
		{
			if($row['job_post_id'] <=  $job_edit_id)
			{
				$total_jobs_count = $total_jobs_count + 1;
			}
		}

	$job_image = $_FILES['job_img_file']['name'];
	$job_img_name = $_SESSION['user_id']."_".$total_jobs_count."_".$job_image;

	$upload_path = "Job_Post_img/" . $job_img_name;
	move_uploaded_file($_FILES['job_img_file']['tmp_name'],$upload_path);

	$update_job = "UPDATE job_post SET job_post_image='".$job_img_name."' WHERE job_post_id='".$job_edit_id."' ";
	$updated_job = mysqli_query($conn,$update_job);

	$select_job = "SELECT * FROM job_post WHERE job_post_image='".$job_img_name."' ";
	$selected_job = mysqli_query($conn,$select_job);

	if($row=mysqli_fetch_assoc($selected_job))
	{
		$_SESSION['edit_jobs'] = $row['job_post_id'];
	}
	else
	{
		echo("Error in fetching selected_job");
	}

}
else
{

	$firma_name = $_POST['firma_name'];
	$arbeitgeber_name = $_POST['arbeitgeber'];
	$post_typeofjob = $_POST['post_typeofjob'];
	$post_countrycode = $_POST['post_countrycode'];
	$arbeitgeber_phone = $_POST['arbeitgeber_phone'];
	$strasse = $_POST['strasse'];
	$geschaft_nummer = $_POST['geschaft_nummer'];
	$postleitzahl = $_POST['postleitzahl'];
	$stadt = $_POST['stadt'];
	$land = $_POST['land'];




	if(isset($_SESSION['edit_jobs']))
	{
		$update_job  = "UPDATE job_post SET arbeitgeber_name='".$arbeitgeber_name."',country_code='".$post_countrycode."',arbeitgeber_phone='".$arbeitgeber_phone."',firma_name='".$firma_name."',job_typen='".$post_typeofjob."',strasse='".$strasse."',nummer='".$geschaft_nummer."',postleitzahl='".$postleitzahl."',stadt='".$stadt."',land='".$land."' WHERE job_post_id ='".$_SESSION['edit_jobs']."' ";
		$updated_job = mysqli_query($conn,$update_job);

		if($updated_job)
		{
			echo("Updated");
			unset($_SESSION['edit_jobs']);
		}
		else
		{
			echo("Error in updating job");
		}
	}

	
}




?>