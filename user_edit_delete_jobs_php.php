<?php

include 'connection.php';


$arbeitgeber_email = $_SESSION['user_email'];

if($_POST['edit_or_delete'] == "delete_job")
{
	$selected_row_id = $_POST['selected_job_id'];

	$remove_job_img = "SELECT * FROM job_post WHERE arbeitgeber_email='".$arbeitgeber_email."' AND job_post_id='".$selected_row_id."' ";
	$removed_job_img = mysqli_query($conn,$remove_job_img);

	if($row=mysqli_fetch_array($removed_job_img))
	{
		$delete_path = "Job_Post_img/" . $row['job_post_image'];

		if(unlink($delete_path))
		{
			$delete_job_post = "DELETE FROM job_post WHERE arbeitgeber_email='".$arbeitgeber_email."' AND job_post_id='".$selected_row_id."' ";
			$deleted_job_post = mysqli_query($conn,$delete_job_post);
			$delete_job_action = "DELETE FROM job_action WHERE arbeitgeber_email='".$arbeitgeber_email."' AND job_post_id='".$selected_row_id."' ";
			$deleted_job_action = mysqli_query($conn,$delete_job_action);
			$delete_job_application = "DELETE FROM job_application WHERE arbeitgeber_email='".$arbeitgeber_email."' AND job_post_id='".$selected_row_id."' ";
			$deleted_job_application = mysqli_query($conn,$delete_application);

			if ($deleted_job_post) 
			{	
				echo("Job_deleted");
			}
			else
			{
				echo("Error in deleting job");
			}
		}
		else
		{
			echo("Error in removing job_img");
		}
	}
	else
	{
		echo("Error in fetching job_img");
	}

}
else
{
	$_SESSION['edit_jobs'] = $_POST['selected_job_id'];

	if(isset($_SESSION['edit_jobs']))
	{
		echo("Job_edited_session_created");
	}	
	else
	{
		echo("Error to create SESSION for Job edit");
	}
}


?>