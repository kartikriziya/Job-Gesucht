<?php

include 'connection.php';

$email = $_SESSION['user_email'];

$user_bio = $_POST['user_bio'];

$update_user_bio = "UPDATE user_aboutme SET user_bio='".$user_bio."' WHERE email='".$email."' ";
$updated_user_bio = mysqli_query($conn,$update_user_bio);

if($updated_user_bio)
{
	header("location:user_aboutme.php");
}

?>