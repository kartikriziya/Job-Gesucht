<?php

include 'connection.php';
	


$user_img = $_FILES['user_img']['name'];
	$user_img_name = $_SESSION['user_id'] . "_" . $user_img;
	
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];

$email = $_SESSION['user_email'];

$code = $_POST['code'];
$phone = $_POST['phone'];
$street_name = $_POST['street_name'];
$house_number = $_POST['house_number'];
$user_pincode = $_POST['user_pincode'];
$user_city = $_POST['user_city'];
$user_country = $_POST['user_country'];

$select_user_profile = "SELECT * FROM user_profile WHERE email='".$email."'";
$selected_user_profile = mysqli_query($conn,$select_user_profile);
if($row=mysqli_fetch_array($selected_user_profile))
{
	$delete_path = "User_Profile_img/" . $row['user_img'];

	if($user_img != '')
	{
		if (unlink($delete_path)) 
		{
			//echo("deleted");
		}	
	}
	else
	{
		$user_img = $row['user_img'];
		$user_img_name = $user_img;
	}

}

$update_user_profile = "UPDATE user_profile SET user_img='".$user_img_name."',first_name='".$first_name."',last_name='".$last_name."',day='".$day."',month='".$month."',year='".$year."',country_code='".$code."',phone_number='".$phone."',street_name='".$street_name."',house_number='".$house_number."',pincode='".$user_pincode."',city='".$user_city."',country='".$user_country."' WHERE email='".$email."' ";
$updated_user_profile = mysqli_query($conn,$update_user_profile);

$update_job_post = "UPDATE job_post SET arbeitgeber_name='".$first_name."',country_code='".$code."',arbeitgeber_phone='".$phone."' WHERE arbeitgeber_email='".$email."' ";
$updated_job_post = mysqli_query($conn,$update_job_post);

if($updated_user_profile)
{
	//echo("updated");
	$upload_path = "User_Profile_img/" . $user_img_name;
	move_uploaded_file($_FILES['user_img']['tmp_name'],$upload_path);
	
	header("location:user_profile.php");
}
else
{
	echo("Error");
}


?>