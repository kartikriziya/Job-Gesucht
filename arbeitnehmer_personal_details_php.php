<?php


include 'connection.php';

if(isset($_SESSION['user_email']))
{
	
	if(isset($_POST['job_post_id']) && isset($_POST['job_selected_arbeitnehmer']))
	{

		//$_SESSION['job_post_id'] = $_POST['job_post_id'];
		//$_SESSION['job_selected_arbeitnehmer'] = $_POST['job_selected_arbeitnehmer'];

		$get_personal_details_sharecode = "SELECT * FROM job_application WHERE arbeitnehmer_email ='".$_POST['job_selected_arbeitnehmer']."' ";
		$got_personal_details_sharecode = mysqli_query($conn,$get_personal_details_sharecode);

		if($row=mysqli_fetch_array($got_personal_details_sharecode))
		{
			$personal_details_sharecode = $row['personal_details_sharecode']; 

			echo("arbeitnehmer_personal_details.php?pd=".$personal_details_sharecode);
		}

	}

}
else
{
	echo("Bitte Login oder Signup.");
}	

?>