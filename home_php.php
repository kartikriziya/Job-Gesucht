<?php


include 'connection.php';



if(isset($_SESSION['user_email']))
{
	$email = $_SESSION['user_email'];

	if(isset($_POST['reset_home']))
	{

		$select_user_city = "SELECT * FROM user_profile WHERE email='".$email."' ";
		$selected_user_city = mysqli_query($conn,$select_user_city);

		if($row2=mysqli_fetch_array($selected_user_city))
		{
				$_SESSION['city'] = $row2['city'];
				$_SESSION['type'] = "Alle";
		}
	}
	else
	{
		$city_pincode = $_POST['city_pincode'];
		$type_of_job = $_POST['type_of_job'];

		if($type_of_job != 'Alle')
		{
			$select_job = "SELECT * FROM job_post WHERE (postleitzahl='".$city_pincode."' OR stadt='".$city_pincode."') AND job_typen='".$type_of_job."' ";
			$selected_job = mysqli_query($conn,$select_job);
		}
		else
		{
			$select_job = "SELECT * FROM job_post WHERE postleitzahl='".$city_pincode."' OR stadt='".$city_pincode."' ";
			$selected_job = mysqli_query($conn,$select_job);
		}

		

		$selected_job_count = mysqli_num_rows($selected_job);

		if($selected_job_count > 0)
		{
			$_SESSION['city'] = $city_pincode;
			$_SESSION['type'] = $type_of_job;
			echo("Session_created");
		}
		else
		{
			$_SESSION['city'] = $city_pincode;
			unset($_SESSION['type']);
			$_SESSION['temp-type'] = $_POST['type_of_job'];
			echo("Es sind keine Jobs verfügbar !!!");
		}
	}

}
else
{
		$city_pincode = $_POST['city_pincode'];
		$type_of_job = $_POST['type_of_job'];

		if($type_of_job != 'Alle')
		{
			$select_job = "SELECT * FROM job_post WHERE (postleitzahl='".$city_pincode."' OR stadt='".$city_pincode."') AND job_typen='".$type_of_job."' ";
			$selected_job = mysqli_query($conn,$select_job);
		}
		else
		{
			$select_job = "SELECT * FROM job_post WHERE postleitzahl='".$city_pincode."' OR stadt='".$city_pincode."' ";
			$selected_job = mysqli_query($conn,$select_job);
		}

		

		$selected_job_count = mysqli_num_rows($selected_job);

		if($selected_job_count > 0)
		{
			$_SESSION['city'] = $city_pincode;
			$_SESSION['type'] = $type_of_job;
			echo("Session_created");
		}
		else
		{
			$_SESSION['city'] = $city_pincode;
			unset($_SESSION['type']);
			$_SESSION['temp-type'] = $_POST['type_of_job'];
			echo("Es sind keine Jobs verfügbar !!!");
		}
}





?>