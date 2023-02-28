<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create Connection
	$conn = new mysqli($servername, $username, $password, "part_time_job");

// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed : " . $conn->connect_error);	
	}
	else
	{
		//echo "Connected Successfully";
		session_start();
	}

?>