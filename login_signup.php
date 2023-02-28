<?php

include 'connection.php';



$signup_email = $_POST['signup_email'];
$signup_password1 = $_POST['signup_password1'];
$signup_password2 = $_POST['signup_password2'];


	if (isset($signup_email,$signup_password1,$signup_password2)){

		//Insert query
		$sql = "INSERT INTO user (email,password) VALUES ('$signup_email','$signup_password1')";

		if (mysqli_query($conn, $sql)){

			header("location:home.php");
		} else{

			echo "Error : " . $sql . "<br>" . mysqli_error($conn);

		}
	}

?>