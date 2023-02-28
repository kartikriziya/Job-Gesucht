<?php

include 'connection.php';

$email = $_SESSION['user_email'];
$job_post_id = $_SESSION['job_selected_id'];

	$get_job_details = "SELECT * FROM job_post WHERE job_post_id='".$job_post_id."' ";
	$got_job_details = mysqli_query($conn,$get_job_details);

	if($row=mysqli_fetch_array($got_job_details))
	{
		$firma_name = $row['firma_name'];
		$arbeitgeber_email = $row['arbeitgeber_email'];
	}

if($_POST['job_action'] == "to_Like_job")
{

//Liked table to check 'liked' or not.

	$check_liked = "SELECT * FROM liked WHERE arbeitnehmer_email='".$email."' AND job_post_id='".$job_post_id."' ";
	$checked_liked = mysqli_query($conn,$check_liked);

	$liked_or_not = mysqli_num_rows($checked_liked);
	if($liked_or_not == 0)
	{
		$liked = "yes";
		$like_job = "INSERT INTO liked (arbeitnehmer_email,liked,job_post_id,arbeitgeber_email) VALUES('".$email."','".$liked."','".$job_post_id."','".$arbeitgeber_email."')";
		$liked_job = mysqli_query($conn,$like_job);

		if($liked_job)
		{
			//job_action table to update total Likes(+).

				$select_job_action_likes = "SELECT likes FROM job_action WHERE  job_post_id='".$job_post_id."' ";
				$selected_job_action_likes = mysqli_query($conn,$select_job_action_likes);

				if($row=mysqli_fetch_array($selected_job_action_likes))
				{
					$like = $row['likes'] + 1;
				}

				$update_like = "UPDATE job_action SET likes='".$like."' WHERE job_post_id='".$job_post_id."' ";
				$updated_like = mysqli_query($conn,$update_like);

				if($updated_like)
				{
					echo("Job_liked");
				}
				else
				{
					echo("Error in updating Like");
				}
		}
		else
		{
			echo("Error in liking Liked");
		}
	}

}
elseif($_POST['job_action'] == "to_Unike_job")
{
	$unlike_job = "DELETE FROM liked WHERE arbeitnehmer_email='".$email."' AND job_post_id='".$job_post_id."' ";
	$unliked_job = mysqli_query($conn,$unlike_job);

	if($unliked_job)
	{
		//job_action table to update total Likes(-).

			$select_job_action_likes = "SELECT likes FROM job_action WHERE  job_post_id='".$job_post_id."' ";
			$selected_job_action_likes = mysqli_query($conn,$select_job_action_likes);

			if($row=mysqli_fetch_array($selected_job_action_likes))
			{
				$like = $row['likes'] - 1;
			}

			$update_like = "UPDATE job_action SET likes='".$like."' WHERE job_post_id='".$job_post_id."' ";
			$updated_like = mysqli_query($conn,$update_like);

			if($updated_like)
			{
				echo("Job_unliked");
			}
			else
			{
				echo("Error in updating Unlike");
			}
	}
	else
	{
		echo("Error in unliking Liked");
	}

}
elseif ($_POST['job_action'] == "to_Save_job") 
{
//Saved table to check 'saved' or not.

	$check_saved = "SELECT * FROM saved WHERE arbeitnehmer_email='".$email."' AND job_post_id='".$job_post_id."' ";
	$checked_saved = mysqli_query($conn,$check_saved);

	$saved_or_not = mysqli_num_rows($checked_saved);
	if($saved_or_not == 0)
	{
		$saved = "yes";
		$application_draft = $_POST['application_draft'];
		$save_job = "INSERT INTO saved (arbeitnehmer_email,saved,application_draft,job_post_id,arbeitgeber_email) VALUES('".$email."','".$saved."','".$application_draft."','".$job_post_id."','".$arbeitgeber_email."')";
		$saved_job = mysqli_query($conn,$save_job);

		if($saved_job)
		{
			//job_action table to update total Saves(+).

				$select_job_action_saves = "SELECT saves FROM job_action WHERE  job_post_id='".$job_post_id."' ";
				$selected_job_action_saves = mysqli_query($conn,$select_job_action_saves);

				if($row=mysqli_fetch_array($selected_job_action_saves))
				{
					$save = $row['saves'] + 1;
				}

				$update_save = "UPDATE job_action SET saves='".$save."' WHERE job_post_id='".$job_post_id."' ";
				$updated_save = mysqli_query($conn,$update_save);

				if($updated_save)
				{
					echo("Job_saved");
				}
				else
				{
					echo("Error in updating Save");
				}
		}
		else
		{
			echo("Error in saving Saved");
		}
	}
}
elseif($_POST['job_action'] == "to_Unsave_job")
{
	$unsave_job = "DELETE FROM saved WHERE arbeitnehmer_email='".$email."' AND job_post_id='".$job_post_id."' ";
	$unsaved_job = mysqli_query($conn,$unsave_job);

	if($unsaved_job)
	{
		//job_action table to update total Saves(-).

			$select_job_action_saves = "SELECT saves FROM job_action WHERE  job_post_id='".$job_post_id."' ";
			$selected_job_action_saves = mysqli_query($conn,$select_job_action_saves);

			if($row=mysqli_fetch_array($selected_job_action_saves))
			{
				$save = $row['saves'] - 1;
			}

			$update_save = "UPDATE job_action SET saves='".$save."' WHERE job_post_id='".$job_post_id."' ";
			$updated_save = mysqli_query($conn,$update_save);

			if($updated_save)
			{
				echo("Job_unsaved");
			}
			else
			{
				echo("Error in updating Unsave");
			}
	}
	else
	{
		echo("Error in unsaving Saved");
	}
}

?>