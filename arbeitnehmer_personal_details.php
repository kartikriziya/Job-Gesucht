<!DOCTYPE html>
<html lang="de">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="Author" content="JOB-Gesucht.com"/>

	<link rel="icon" href="images/JG_tab-logo.png" type="image/png"/>	
	<title>Voll-Teil-zeit JOB Arbeitssuche JOB Suche JOB Arbeit bekommen JOB vollzeit teilzeit mini : JOB-Gesucht.com</title>
	<meta name="title" content="Voll-zeit JOB Arbeitssuche JOB Suche JOB Arbeit bekommen JOB vollzeit teilzeit mini aushilfe : JOB-Gesucht.com"/>

	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<meta name="robots" content="index, follow"/>
	<link rel="canonical" href="http://job-gesucht.com/"/>
	<meta name="Keywords" content="Jobsuche Arbeitssuche Voll-zeit Teil-zeit Minijob Mini-job Part-time Part-time-jobs Studentjobs Restaurantjob Aushilfe"/>
	<meta name="Description" content="JOB-Gesucht. Europas größtes Portal für JOB-Stelle und provisionsfreie Arbeit. 
	Kostenlos.">

	<meta property="og:image" itemprop="image" content="images/JG_main-logo.png"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Voll-zeit JOB Arbeitssuche JOB Suche JOB Arbeit bekommen JOB vollzeit teilzeit mini : JOB-Gesucht.com"/>
    <meta property="og:site_name" content="JOB-Gesucht.com"/>
    <meta property="og:url" content="https://www.job-gesucht.com"/>
    <meta property="og:description" content="JOB-Gesucht. DEUTSCHLANDS größtes Portal für JOB-Stelle und provisionsfreie Arbeit. 
	Kostenlos."/>

	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/main.css">
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	

</head>
<body>
<body style="background-color: #c8e6c9;">

							<!-------------------- Header with Navbar ---------------->

							<?php
								include 'header.php';
							?>
	

<!--- Navbar ------->
	<?php
		include 'header_navbar.php';
	?>


							<!-------------------- Content---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container" id="user_profile_container" style="">

			<div class="row">

				<?php


				//replace the $_SESSION['job_selected_id'] and $_SESSION['job_selected_arbeitnehmer'] to the actual data with the help pd personal_details_sharecode which is in th URL of this page.

				$get_personal_details_sharecode = "SELECT * FROM job_application WHERE personal_details_sharecode='".$_GET['pd']."' ";
				$got_personal_details_sharecode = mysqli_query($conn,$get_personal_details_sharecode);

				$count = mysqli_num_rows($got_personal_details_sharecode);
				if($count>0)
				{
					if($row=mysqli_fetch_array($got_personal_details_sharecode))
					{
						$job_post_id = $row['job_post_id'];
						$arbeitnehmer_email = $row['arbeitnehmer_email'];
					}
				}
				else
				{
					header("location:user_activity_applied.php");
				}


					$select_job_post_details = "SELECT * FROM job_post WHERE job_post_id='".$job_post_id."' ";
					$selected_job_post_details = mysqli_query($conn,$select_job_post_details);
					if($row=mysqli_fetch_array($selected_job_post_details))
					{
						$job_img = $row['job_post_image'];
						$arbeitgeber_name = $row['arbeitgeber_name'];
						$job_typ = $row['job_typen'];
						$arbeitgeber_phone = $row['country_code'].$row['arbeitgeber_phone'];
						$arbeitgeber_email = $row['arbeitgeber_email'];

						$strasse = $row['strasse'];
						$geschaft_nummer = $row['nummer'];
						$postleitzahl = $row['postleitzahl'];
						$stadt = $row['stadt'];
						$land = $row['land'];
					}

					$select_application_message = "SELECT * FROM job_application WHERE arbeitnehmer_email ='".$arbeitnehmer_email."' AND job_post_id='".$job_post_id."' ";
					$selected_application_message = mysqli_query($conn,$select_application_message);
					if($row=mysqli_fetch_array($selected_application_message))
					{
						$application_message = $row['application'];
					}

					$select_user_profile = "SELECT * FROM user_profile WHERE email='".$arbeitnehmer_email."'";
					$selected_user_profile = mysqli_query($conn,$select_user_profile);
					if($row=mysqli_fetch_array($selected_user_profile))
					{
						$user_img = $row['user_img'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$day = $row['day'];
						$month = $row['month'];
						$year = $row['year'];
						$code = $row['country_code'];
						$phone = $row['phone_number'];
						$street_name = $row['street_name'];
						$house_number = $row['house_number'];
						$pincode = $row['pincode'];
						$city = $row['city'];
						$country = $row['country'];
					}

					$select_user_qualification = "SELECT * FROM user_qualification WHERE email='".$arbeitnehmer_email."'";
					$selected_user_qualification = mysqli_query($conn,$select_user_qualification);
					$count=mysqli_num_rows($selected_user_qualification);
					if($count>0)
					{
						if($row=mysqli_fetch_array($selected_user_qualification))
						{
							$education = $row['education'];
						}
					}
					else
					{
						$education = "";
					}


					$select_user_aboutme = "SELECT * FROM user_aboutme WHERE email='".$arbeitnehmer_email."'";
					$selected_user_aboutme = mysqli_query($conn,$select_user_aboutme);
						if($row=mysqli_fetch_array($selected_user_aboutme))
						{
							$user_bio = $row['user_bio'];
						}
			?>

				<div class="col-md-4" style="">
					<div class="row">
						<div class="col-12" style="display: block; text-align: center;">
							<img src="User_Profile_img/<?php echo($user_img); ?>" class="rounded"
	            			salt="avatar image" id="user_img" style="">
						</div>
						<div class="col-12" style="display: block; text-align: center;">
							<h4 id="user_name" style=""><?php echo($first_name); ?></h4>
						</div>
					</div>
					<div style="height: 0; margin: .3rem 0; overflow: hidden; border-top: 2px solid #1b5e20;"></div>
					<div class="row job" id="profile_detail_row" style="" onclick="job();">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-briefcase" aria-hidden="true" id="user_icons"></i>Job</h5>
						</div>
					</div>
					<div class="row message" id="profile_detail_row" style="" onclick="message();">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-comments-o" aria-hidden="true" id="user_icons"></i>Nachricht</h5>
						</div>
					</div>
					<div class="row info" id="profile_detail_row" style="" onclick="info();">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-id-card" aria-hidden="true" id="user_icons"></i>Arbeitnehmer Info</h5>
						</div>
					</div>
					<div class="row qualification" id="profile_detail_row" style="" onclick="qualification();">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-book" aria-hidden="true" id="user_icons"></i>Qualifikation</h5>
						</div>
					</div>
					<div class="row aboutme" id="profile_detail_row" style="" onclick="aboutme();">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-info" aria-hidden="true" id="user_icons"></i>Über</h5>
						</div>
					</div>
				</div>
			<!-- Application_job_link -->
				<div class="col-md-8" id="job_link_detail" style="background-color: ; padding: 40px; display: none;">
					<div class="row" style="margin-bottom: 3rem;">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div id="job_application_img">
								<img src="Job_Post_img/<?php echo($job_img); ?>" alt="JG" class="job_img">
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row" style="margin-bottom: 3rem;">
						<div class="col-md-1"></div>
						<div class="col-md-7">
							<div class="row"id="job_selected_details">
								<div class="col-12">
									<p id="job_selected_paragraph">
										<label id="job_selected_label"><b>Arbeitgeber : </b></label> 
										<?php echo($arbeitgeber_name); ?>
									</p>
								</div>
							</div>
							<div class="row" id="job_selected_details">
								<div class="col-12">
									<p id="job_selected_paragraph">
										<label id="job_selected_label"><b>Job type : </b></label> 
										<?php echo($job_typ); ?>
									</p>
								</div>
							</div>
							<div class="row" id="job_selected_details">
								<div class="col-12">
									<p id="job_selected_paragraph">
										<label id="job_selected_label"><b><i class="fa fa-phone"  aria-hidden="true"></i> : </b></label> 
										<?php echo($arbeitgeber_phone); ?> 
									</p>
								</div>
							</div>
							<div class="row" id="job_selected_details">
								<div class="col-12">
									<p id="job_selected_paragraph">
										<label id="job_selected_label"><b><i class="fa fa-envelope" aria-hidden="true"></i> : </b></label> 
										<?php echo($arbeitgeber_email); ?>
									</p>
								</div>
							</div>
							</div>
							<div class="col-md-3">
								<div class="row" id="job_selected_details">
									<div class="col-12">
										<p id="job_selected_address" style="margin-left: 3px;">
											<label><b><i class="fa fa-map-marker" aria-hidden="true"></i></b></label>
											<?php echo($strasse); ?> <?php echo($geschaft_nummer); ?> <br> <?php echo($postleitzahl); ?> <?php echo($stadt); ?> 
											<br> <?php echo($land); ?>
										</p>
									</div>
								</div>
							</div>

						<div class="col-md-1"></div>
					</div>
				</div>
			<!-- Application_Message -->
				<div class="col-md-8" id="message_detail" style="background-color: ; padding: 40px; display: none;">
					<div class="row" style="margin-bottom: 3rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<textarea class="form-control" id="job_application" rows="10" disabled><?php echo($application_message); ?></textarea>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			<!-- Arbeitnehmer_INFO -->
				<div class="col-md-8" id="info_detail" style="background-color: ; padding: 40px; display: none;">
					<div class="row" style="margin-bottom: .9rem;">
						<div class="col-md-1"></div>
						<div class="col-sm-6 col-md-5">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b>Vorname : </b></label> 
								<?php echo($first_name); ?>
							</p>
						</div>
						<div class="col-sm-6 col-md-5 mt-1">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b>Nachname : </b></label> 
								<?php echo($last_name); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-bottom: .9rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b>Geburtsdatum : </b></label> 
								<?php echo($day); ?> - <?php echo($month); ?> - <?php echo($year); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-bottom: .9rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b><i class="fa fa-envelope" aria-hidden="true"></i> : </b></label>
								<?php echo($arbeitnehmer_email); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-bottom: 1.9rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b><i class="fa fa-phone"  aria-hidden="true"></i> : </b></label> 
								<?php echo($code); ?> <?php echo($phone); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-bottom: .9rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_address">
								<label><b><i class="fa fa-map-marker" aria-hidden="true"></i></b></label>
								<?php echo($street_name); ?> <?php echo($house_number); ?> <br> <?php echo($pincode); ?> <?php echo($city); ?> 
							<br> <?php echo($country); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			<!-- Arbeitnehmer_Qualification -->
				<div class="col-md-8" id="qualification_detail" style="background-color: ; padding: 40px; display: none;">
					<div class="row" style="margin-bottom: .9rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b>Education : </b></label> 
								<?php echo($education); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-bottom: 2rem;">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<input type="text" class="form-control ak" name="user_firma" id="user_firma" placeholder="Firma Name" style="display: none;">
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control mt-1" name="user_dauer" id="user_dauer" placeholder="Dauer" style="display: none;">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" style="margin-bottom: 3rem; max-height: 250px; overflow-y: auto;">
						<table class="table table-hover">
							<thead id="thead">
								<tr>
									<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9; text-align: center;">Id</th>
									<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9;">Firma</th>
									<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9;">Dauer</th>
								</tr>
							</thead>
							<tbody id="tbody">
								<?php

									$select_user_qualification = "SELECT * FROM user_qualification WHERE email='".$arbeitnehmer_email."' ORDER BY job_id DESC";
									$selected_user_qualification = mysqli_query($conn,$select_user_qualification);

									while($row=mysqli_fetch_assoc($selected_user_qualification))
									{
										if($row['job_id']!='')
										{
								?>
								<script type="text/javascript">
									$("#user_experience_minus").css("display","block");
								</script>
								<tr>
									<th scope="row" class="experience_id" style=" text-align: center;">
										<?php echo($row['job_id']); ?>	
									</th>
									<td><?php echo($row['firma_name']); ?></td>
									<td><?php echo($row['dauer']); ?> </td>
								</tr>
								<?php
										}
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			<!-- Arbeitnehmer_aboutme -->
				<div class="col-md-8" id="aboutme_detail" style="background-color: ; padding: 40px; display: none;">
					<div class="row" style="margin-bottom: 3rem;">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="job_selected_paragraph">
								<label id="job_selected_label"><b>Über Arbeitnehmer : </b></label> 
								<?php echo($user_bio); ?>
							</p>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
			<script type="text/javascript">

			<?php

				if(!isset($_GET['pd']) || $_GET['pd']=="") 
				{
					header("location:user_activity_applied.php");
				}

			?>
			<?php

				if(!isset($_SESSION['user_email'])) 
				{
					//header("location:login.php");
					$_SESSION['temp_login-signup_error'] = "Bitte Login oder Signup";
			?>
					window.location.href = 'login.php';
			<?php		
				}
			?>

			$(".info").css("background-color","#4caf50");
			$(".info").css("color","white");
			$("#info_detail").css("display","block");

			function job(){

					$(".job").css("background-color","#4caf50");
					$(".job").css("color","white");
					$("#job_link_detail").css("display","block");
					
					$("#message_detail").css("display","none");
					$("#info_detail").css("display","none");
					$("#qualification_detail").css("display","none");
					$("#aboutme_detail").css("display","none");

					$(".message").css("background-color","");
					$(".message").css("color","");
					$(".info").css("background-color","");
					$(".info").css("color","");
					$(".qualification").css("background-color","");
					$(".qualification").css("color","");
					$(".aboutme").css("background-color","");
					$(".aboutme").css("color","");

			}

			function message(){

					$(".message").css("background-color","#4caf50");
					$(".message").css("color","white");
					$("#message_detail").css("display","block");
					
					$("#job_link_detail").css("display","none");
					$("#info_detail").css("display","none");
					$("#qualification_detail").css("display","none");
					$("#aboutme_detail").css("display","none");

					$(".job").css("background-color","");
					$(".job").css("color","");
					$(".info").css("background-color","");
					$(".info").css("color","");
					$(".qualification").css("background-color","");
					$(".qualification").css("color","");
					$(".aboutme").css("background-color","");
					$(".aboutme").css("color","");

			}

			function info(){

					$(".info").css("background-color","#4caf50");
					$(".info").css("color","white");
					$("#info_detail").css("display","block");
					
					$("#job_link_detail").css("display","none");
					$("#message_detail").css("display","none");
					$("#qualification_detail").css("display","none");
					$("#aboutme_detail").css("display","none");

					$(".job").css("background-color","");
					$(".job").css("color","");
					$(".message").css("background-color","");
					$(".message").css("color","");
					$(".qualification").css("background-color","");
					$(".qualification").css("color","");
					$(".aboutme").css("background-color","");
					$(".aboutme").css("color","");

			}

			function qualification(){

					$(".qualification").css("background-color","#4caf50");
					$(".qualification").css("color","white");
					$("#qualification_detail").css("display","block");

					$("#job_link_detail").css("display","none");
					$("#message_detail").css("display","none");
					$("#info_detail").css("display","none");
					$("#aboutme_detail").css("display","none");

					$(".job").css("background-color","");
					$(".job").css("color","");
					$(".message").css("background-color","");
					$(".message").css("color","");
					$(".info").css("background-color","");
					$(".info").css("color","");
					$(".aboutme").css("background-color","");
					$(".aboutme").css("color","");

			}

			function aboutme(){

					$(".aboutme").css("background-color","#4caf50");
					$(".aboutme").css("color","white");
					$("#aboutme_detail").css("display","block");

					$("#job_link_detail").css("display","none");
					$("#message_detail").css("display","none");
					$("#info_detail").css("display","none");
					$("#qualification_detail").css("display","none");

					$(".job").css("background-color","");
					$(".job").css("color","");
					$(".message").css("background-color","");
					$(".message").css("color","");
					$(".info").css("background-color","");
					$(".info").css("color","");
					$(".qualification").css("background-color","");
					$(".qualification").css("color","");

			}

			</script>

		</div>
	</main>

							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>

</body>
</html>

<style type="text/css">
	


</style>