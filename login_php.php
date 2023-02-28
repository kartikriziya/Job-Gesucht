<?php

include 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$select_user = "SELECT * FROM user WHERE email='".$email."'";
$selected_user = mysqli_query($conn,$select_user);

$count=mysqli_num_rows($selected_user);
if($count>0)
{
	if($row=mysqli_fetch_array($selected_user)) 
	{
		if($row['password'] == $password) 
		{
			echo("Logged in");
			$_SESSION['user_email'] = $row['email'];
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_type'] = $row['nehmer_geber'];

			$select_user_city = "SELECT * FROM user_profile WHERE email='".$email."' ";
			$selected_user_city = mysqli_query($conn,$select_user_city);

			if($row2=mysqli_fetch_array($selected_user_city))
			{
					$_SESSION['city'] = $row2['city'];
					$_SESSION['type'] = "All";
			}
			
		}
		else 
		{
			echo("Falsches Passwort");
		}
	}
}
else
{
	echo("Falsche Email oder Passwort");
}


?>