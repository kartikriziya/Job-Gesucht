<?php

include 'connection.php';


$email = $_SESSION['user_email'];




if($_POST['add_or_delete'] == "add_qualification")
{

	$job_id = '1';
	$firma_name = $_POST['user_firma'];
	$dauer = $_POST['user_dauer'];
	$education = $_POST['user_education'];



	$select_user_qualification = "SELECT * FROM user_qualification WHERE email='".$email."'";
	$selected_user_qualification = mysqli_query($conn,$select_user_qualification);
	$count=mysqli_num_rows($selected_user_qualification);
	if($count>0)
	{
		$row=mysqli_fetch_assoc($selected_user_qualification);
		if($row['job_id']=='')
		{
			if($firma_name != '' && $dauer != '')
			{
				$update_user_education = "UPDATE user_qualification SET job_id='".$job_id."',education='".$education."',firma_name='".$firma_name."',dauer='".$dauer."' WHERE email='".$email."' ";
				$updated_user_education = mysqli_query($conn,$update_user_education);
			}
			else
			{
				$update_user_education = "UPDATE user_qualification SET education='".$education."' WHERE email='".$email."' ";
				$updated_user_education = mysqli_query($conn,$update_user_education);
			}
		}
		else
		{
			$job_id = $count + 1;
			$update_user_education = "UPDATE user_qualification SET education='".$education."' WHERE email='".$email."' ";
			$updated_user_education = mysqli_query($conn,$update_user_education);

			if($firma_name != '' && $dauer != '')
			{
				$insert_user_education = "INSERT INTO user_qualification (job_id,education,firma_name,dauer,email) VALUES('".$job_id."','".$education."','".$firma_name."','".$dauer."','".$email."')";
				$inserted_user_education = mysqli_query($conn,$insert_user_education);
			}
		}
	}
	else
	{
		if($firma_name != '' && $dauer != '')
		{
			$insert_user_education = "INSERT INTO user_qualification (job_id,education,firma_name,dauer,email) VALUES('".$job_id."','".$education."','".$firma_name."','".$dauer."','".$email."')";
			$inserted_user_education = mysqli_query($conn,$insert_user_education);
		}
		else
		{
			$insert_user_education = "INSERT INTO user_qualification (education,email) VALUES('".$education."','".$email."') ";
			$inserted_user_education = mysqli_query($conn,$insert_user_education);
		}
	}


}




if($_POST['add_or_delete'] == "delete_job_experience")
{
	$selected_row_id = $_POST['job_id'];

	$delete_user_experience = "DELETE FROM user_qualification WHERE email='".$email."' AND job_id='".$selected_row_id."' ";
	$deleted_user_experience = mysqli_query($conn,$delete_user_experience);

	if($deleted_user_experience)
	{
		echo("Experience_deleted");
	}
	else
	{
		echo("Error in deleting Experience");
	}
}



?>