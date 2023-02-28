<?php

include 'connection.php';
	
$email = $_SESSION['user_email'];

$check_profile_info = "SELECT * FROM user_profile WHERE email='".$email."' ";
$checked_profile_info = mysqli_query($conn,$check_profile_info);

if($row = mysqli_fetch_assoc($checked_profile_info))
{
	if($row['user_img'] != "" && $row['first_name'] != "" && $row['last_name'] != "" && $row['day'] != "" && $row['month'] != "" && $row['year'] != "" && $row['country_code'] != "" && $row['phone_number'] != "" && $row['street_name'] != "" && $row['house_number'] != "" && $row['pincode'] != "" && $row['city'] != "" && $row['country'] != "")
	{
		echo("Profilinformationen sind nicht leer");
	}
	else
	{
		echo("Profilinformationen sind leer");
	}
}
else
{
	echo("Error : in checking profile info");
}


?>