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
	<link rel="stylesheet" href="bootstrap-3.4.1-dist/css/bootstrap.min.css">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.css">

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	
	<script src="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.min.js"></script>

	<script src="bootstrap-4.4.1-dist/sweetalert2/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/sweetalert2/sweetalert2.min.css">

</head>
<body style="background-color: #c8e6c9;">

							<!-------------------- Header with Navbar ---------------->

							<?php
								include 'header.php';
							?>
	

<!--- Navbar ------->
	<?php
		include 'header_navbar.php';
	?>


							<!-------------------- Job Selected ---------------->


	<main id="content" class="k-masthead" role="main">
		<div class="container" id="">
			<form>
				<div class="row" id="job_search_bar" style="margin-bottom: 40px;">
					<div class="col-sm-1 col-md-1" style="margin-bottom: 10px;">
						<a href="home.php" style="display: none;">
							<i class="fa fa-arrow-left" aria-hidden="true" id="back"></i>
						</a>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="text" class="form-control" name="" id="change_city" placeholder="City or Pin-code" value="<?php if(isset($_SESSION['city'])){echo($_SESSION['city']);} ?>">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group text-center">
						    <select class="form-control custom-select" id="chnage_typeofjob" style="cursor: ;">
						      <option hidden>Typ des JOB</option>
						      <option id="Mini" class="chnageoption">Mini</option>
						      <option id="Teil" class="chnageoption">Teil</option>
						      <option id="Voll" class="chnageoption">Voll</option>
						      <option id="Alle" style="font-weight: bold;">Alle</option>
						    </select>
							<?php
								if(isset($_SESSION['type']))
									{
							?>
							<script type="text/javascript">
										$("#<?php echo($_SESSION['type']); ?>").attr("selected","selected");
							</script>
							<?php
									}
									else
									{
							?>
							<script type="text/javascript">
										$("#<?php echo($_SESSION['temp-type']); ?>").attr("selected","selected");
							</script>
							<?php
									}
							?>
						</div>
					</div>
					<div class="col-sm-3 col-md-2">
						<button type="button" id="changebtn" class="btn btn-primary btn-block" onclick="home_city_job_change();">Ändern</button>
					</div>
				</div>
				<div class="row" id="job_search_errorbar" style="margin-bottom: 40px;">
					<div class="col-sm-1 col-md-2" style="margin-bottom: 10px;">
					</div>
					<div class="col-sm-11 col-md-10">
						<p id="select_job_error"></p>
					</div>
				</div>

				<?php

						
					//replace the $_SESSION['job_selected_id'] to the actual job_post_id with the help jg job_post_sharecode which is in th URL of this page.

						$get_job_post_id = "SELECT * FROM job_post WHERE job_post_sharecode='".$_GET['jg']."' ";
						$got_job_post_id = mysqli_query($conn,$get_job_post_id);

						$count = mysqli_num_rows($got_job_post_id);
						if($count>0)
						{
							if($row=mysqli_fetch_array($got_job_post_id))
							{
								$_SESSION['job_selected_id'] = $row['job_post_id'];
							}
						}
						else
						{
							header("location:home.php");
							$_SESSION['job_selected_error'] = "Job unavailable";
						}
				// retrive the data from the database according to $_SESSION['job_selected_id'].

					$get_job_details = "SELECT * FROM job_post WHERE job_post_id='".$_SESSION['job_selected_id']."' ";
					$got_job_details = mysqli_query($conn,$get_job_details);

					if($row=mysqli_fetch_array($got_job_details))
					{
							$firma_name = $row['firma_name'];
							$selected_job_image = $row['job_post_image'];

							$arbeitgeber_name = $row['arbeitgeber_name'];

							$job_typen = $row['job_typen'];

							$country_code = $row['country_code'];
							$arbeitgeber_phone = $row['arbeitgeber_phone']; 

							$arbeitgeber_email = $row['arbeitgeber_email'];

							$strasse = $row['strasse'];
							$geschaft_nummer = $row['nummer'];
							$postleitzahl = $row['postleitzahl'];
							$stadt = $row['stadt'];
							$land = $row['land'];
					}

				?>

				<div class="row">
					<div class="col-sm-5 col-md-4 col-lg-3" style="padding: 30px;">
						<div id="job_application_img">
							<img src="Job_Post_img/<?php echo($selected_job_image); ?>" alt="Mountains" class="job_img">
						</div>
					</div>
					<div class="col-lg-1" id="job_selected_extra-div"></div>
					<div class="col-sm-7 col-md-8 col-lg-8">
						<div class="row">
							<div class="col-sm-8 col-md-8 col-lg-6 col-xl-8">
								<h1 id="job_selected_name"><?php echo($firma_name); ?></h1>
							</div>
							<?php
								if(isset($_SESSION['user_email']))
								{
							?>
							<div class="col-xs-6 col-sm-2 col-md-2 col-lg-3 col-xl-2" id="like">
								<?php

									$email = $_SESSION['user_email'];

									$check_liked = "SELECT * FROM liked WHERE  arbeitnehmer_email='".$email."' AND job_post_id='".$_SESSION['job_selected_id']."' ";
									$checked_liked = mysqli_query($conn,$check_liked);

									$liked_or_not = mysqli_num_rows($checked_liked);
									if($liked_or_not == 0)
									{
								?>
										<a onclick="like_job();" id="like_plain"><i class="fa fa-thumbs-o-up mt-5" id="like_plain_icon" aria-hidden="true"></i></a>
										<a onclick="unlike_job();" id="like_fill" style="display: none;"><i class="fa fa-thumbs-up mt-5" id="like_fill_icon" aria-hidden="true"></i></a>
								<?php
									}
									else
									{
								?>
										<a onclick="like_job();" id="like_plain" style="display: none;"><i class="fa fa-thumbs-o-up mt-5" id="like_plain_icon" aria-hidden="true"></i></a>
										<a onclick="unlike_job();" id="like_fill"><i class="fa fa-thumbs-up mt-5" id="like_fill_icon" aria-hidden="true"></i></a>
								<?php
									}
								?>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-xl-2" id="save">
								<?php


									$check_saved = "SELECT * FROM saved WHERE  arbeitnehmer_email='".$email."' AND job_post_id='".$_SESSION['job_selected_id']."' ";
									$checked_saved = mysqli_query($conn,$check_saved);

									$saved_or_not = mysqli_num_rows($checked_saved);
									if($saved_or_not == 0)
									{
								?>
										<a onclick="save_job();" id="save_plain"><i class="fa fa-bookmark-o mt-5" aria-hidden="true" id="save_plain_icon"></i></a>
										<a onclick="unsave_job();" id="save_fill" style="display: none;"><i class="fa fa-bookmark mt-5" aria-hidden="true" id="save_fill_icon"></i></a>
								<?php
									}
									else
									{
								?>
										<a onclick="save_job();" id="save_plain" style="display: none;"><i class="fa fa-bookmark-o mt-5" aria-hidden="true" id="save_plain_icon"></i></a>
										<a onclick="unsave_job();" id="save_fill"><i class="fa fa-bookmark mt-5" aria-hidden="true" id="save_fill_icon"></i></a>
								<?php
									}
								?>
							</div>
							<?php
								}
								else
								{
							?>
							<div class="col-xs-6 col-sm-2 col-md-2" id="like">
									<a id="like_plain" class="jg_like_plain"><i class="fa fa-thumbs-o-up mt-5" id="like_plain_icon" aria-hidden="true"></i></a>
									<a id="like_fill" class="jg_like_fill" style="display: none;"><i class="fa fa-thumbs-up mt-5" id="like_fill_icon" aria-hidden="true"></i></a>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-2" id="save">
									<a id="save_plain" class="jg_save_plain"><i class="fa fa-bookmark-o mt-5" aria-hidden="true" id="save_plain_icon"></i></a>
									<a id="save_fill" class="jg_save_fill" style="display: none;"><i class="fa fa-bookmark mt-5" aria-hidden="true" id="save_fill_icon"></i></a>
							</div>
							<?php		

								}
							?>
						</div>
						<div style="height: 0; margin: .3rem 0; overflow: hidden; border-top: 2px solid #1b5e20;"></div>
						<div class="row" style="margin-top: 20px;" id="job_selected_details">
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
									<?php echo($job_typen); ?>
								</p>
							</div>
						</div>
						<div class="row" id="job_selected_details">
							<div class="col-12">
								<p id="job_selected_paragraph">
									<label id="job_selected_label"><b><i class="fa fa-phone"  aria-hidden="true"></i> : </b></label> 
									<?php echo($country_code); ?> <?php echo($arbeitgeber_phone); ?> 
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
				</div>
				<div class="row" style="padding: 20px;">
					<div class="col-sm-5 col-md-4" style="background-color: ;">
						<p id="job_selected_address" style="margin-left: 3px;">
							<label><b><i class="fa fa-map-marker" aria-hidden="true"></i></b></label>
							<?php echo($strasse); ?> <?php echo($geschaft_nummer); ?> <br> <?php echo($postleitzahl); ?> <?php echo($stadt); ?> 
							<br> <?php echo($land); ?>
						</p>
					</div>
					<?php
						if(isset($_SESSION['user_email']))
						{
					?>
					<div class="col-sm-7 col-md-8">
						<?php

							$get_application = "SELECT * FROM job_application WHERE  arbeitnehmer_email='".$email."' AND job_post_id='".$_SESSION['job_selected_id']."' ";
							$got_application = mysqli_query($conn,$get_application);

							$check_application = mysqli_num_rows($got_application);
							if($check_application>0)
							{
								if($row = mysqli_fetch_array($got_application))
								{
									$job_application = $row['application'];
								}
							}
							else
							{
								$job_application = "";
							}

							if($job_application == '')
							{
						?>
								<textarea class="form-control" id="job_application" rows="5" placeholder="Write a Job Application" required></textarea>
						<?php 
							}
							else
							{
						?>
								<textarea class="form-control" id="job_application" rows="5" required><?php echo($job_application); ?></textarea>
						<?php
							}
						?>
					</div>
					<?php
						}
						else
						{
					?>
					<div class="col-sm-7 col-md-8">
								<textarea class="form-control" id="job_application" rows="5" placeholder="Write a Job Application" disabled></textarea>
					</div>
					<?php
						}
					?>
				</div>
				<div class="row" style="padding-bottom: 3rem;">
					<div class="col-sm-5 col-md-4"></div>
					<div class="col-sm-3 col-md-2">
						<button type="button" class="btn btn-success btn-block" id="send_applicationbtn" style="margin-left: 12px;" onclick="send_application();">Send</button>
					</div>
					<div class="col-sm-4 col-md-6"></div>
				</div>
				<div class="row" style="margin-bottom: ; margin-left: 3px;">
					<div class="col-sm-5 col-md-4">
					</div>
					<div class="col-sm-7 col-md-8">
						<p id="send_application_error">
							Please <a href="login.php">Login</a> or <a href="signup.php">Signup</a> to Apply For this Job.
						</p>
						<p id="application_availability_error">
							<b>Sie haben sich bereits für diese Stelle beworben.</b> Als nächstes können Sie sich am <b style="color: grey; cursor: default;"><i><u  id="next_possible_application"></u></i></b> erneut bewerben.
						</p>
						<p id="apply_again_success_status" style="color: grey; font-weight: bold;"></p>
						<p id="empty_application_error">Please Write an <b>Application.</b></p>
					</div>
				</div>

				<script type="text/javascript">

					<?php
						if(!isset($_GET['jg']) || $_GET['jg']=="") 
						{
							header("location:login.php");
							$_SESSION['temp_login-signup_error'] = "Please Login or Signup";
						}

						if(isset($_SESSION['user_email']))
						{
							if($_SESSION['user_type'] != "Arbeitnehmer")
							{
					?>
								$("#job_application").attr("disabled","disabled");
								$("#job_application").css("cursor","not-allowed");
					<?php
							}
					?>
							//Change Home_search --------------------------------------------------------------------------------

								function home_city_job_change()
								{

									var city_pincode = $("#change_city").val();
									var type_of_job = $("#chnage_typeofjob").val();


									if(city_pincode!='' && type_of_job!='Typ des JOB')
									{
										$.ajax({
											url:'home_php.php',
											type:'post',
											data:'city_pincode='+city_pincode+'&type_of_job='+type_of_job,
											beforeSend: function(){
					                        	$('#overlay').fadeIn(100);
					                        	$('.navbar').removeClass("sticky-top");
					                        },
					                        complete: function(){
					                        	$('#overlay').fadeOut(1000);
					                        	$('.navbar').addClass("sticky-top");
					                        },
											success:function(result){

													window.location.href="home.php";	
										}
										});
									}
									else
									{
										if(city_pincode!='' && type_of_job=='Typ des JOB')
										{
											$('#select_job_error').css("display","block");
											$('#select_job_error').text("Bitte wählen Sie Typ des JOB");
										}
										else if(city_pincode=='' && type_of_job!='Typ des JOB')
										{
											$('#select_job_error').css("display","block");
											$('#select_job_error').text("Bitte geben Sie den Namen der Stadt oder die Postleitzahl ein");
										}
										else
										{
											$('#select_job_error').css("display","block");
											$('#select_job_error').text("Bitte geben Sie den Namen der Stadt oder die Postleitzahl ein und wählen Sie Typ des Job");
										}
									}

								}
							//Reset Home_search --------------------------------------------------------------------------------

								function reset_home()
								{

									var reset_home = "Destroy cityname and typeofjob session";

									$.ajax({
											url:'home_php.php',
											type:'post',
											data:'reset_home='+reset_home,
											beforeSend: function(){
					                        	$('#overlay').fadeIn(100);
					                        	$('.navbar').removeClass("sticky-top");
					                        },
					                        complete: function(){
					                        	$('#overlay').fadeOut(1000);
					                        	$('.navbar').addClass("sticky-top");
					                        },
											success:function(result){

													window.location.href="home.php";	
											}
										});
								}

							//Send Application --------------------------------------------------------------------------------

								var application_availablity = "Whether applied or not";
								$.ajax({
									url:'job_application_php.php',
									type:'post',
									data:'application_availablity='+application_availablity,
									success:function(result){
										if(result == "Bereits_beworben")
										{

											var next_possible_application = "get next possible date to apply again";
											$.ajax({
												url:'job_application_php.php',
												type:'post',
												data:'next_possible_application='+next_possible_application,
												success:function(result){
													
													if(result != "Error : in receiving application date" && result != "Sie können sich erneut für diesen Job bewerben.")
													{
														$('#application_availability_error').css("display","block");
														$('#next_possible_application').text(result);

														$('#job_application').attr("disabled","disabled");
														$('#job_application').css("color","grey");
														$('#send_applicationbtn').attr("disabled","disabled");
													}
													else if(result == "Sie können sich erneut für diesen Job bewerben.")
													{
														$('#apply_again_success_status').text(result);
													}
												}
											});
											
										}
									}
								});

								function send_application()
								{
									var application = $("#job_application").val();
									var apply = "apply_for_selected_job";


									<?php

										if($_SESSION['user_type'] == "Arbeitnehmer")
										{	
									?>
											$.ajax({
												url:'job_application_php.php',
												type:'post',
												data:'application_availablity='+application_availablity,
												beforeSend: function(){
						                        	$('#overlay').fadeIn(100);
						                        	$('.navbar').removeClass("sticky-top");
						                        },
						                        complete: function(){
						                        	$('#overlay').fadeOut(1000);
						                        	$('.navbar').addClass("sticky-top");
						                        },
												success:function(result){

													if(result != "Bereits_beworben")
													{

														if(application != "")
														{
															var profile_validation = "Check whether Profile Info is empty or not.";
															$.ajax({
																url:'user_profile_validation_php.php',
																type:'post',
																data:'profile_validation='+profile_validation,
																beforeSend: function(){
										                        	$('#overlay').fadeIn(100);
										                        	$('.navbar').removeClass("sticky-top");
										                        },
										                        complete: function(){
										                        	$('#overlay').fadeOut(1000);
										                        	$('.navbar').addClass("sticky-top");
										                        },
																success:function(result){

																	if(result == "Profilinformationen sind nicht leer")
																	{
																		$.ajax({
																			url:'job_application_php.php',
																			type:'post',
																			data:'application='+application+'&apply='+apply,
																			beforeSend: function(){
													                        	$('#overlay').fadeIn(100);
													                        	$('.navbar').removeClass("sticky-top");
													                        },
													                        complete: function(){
													                        	$('#overlay').fadeOut(1000);
													                        	$('.navbar').addClass("sticky-top");
													                        },
																			success:function(result){

																					if(result == "Bewerbung_Gesendet" || result == "Bewerbung_Gesendet_erneut")
																					{	

																						Swal.fire({
																						  icon: 'success',
																						  title: result,
																						  text: 'Wir hoffen, dass Sie diesen Job erhalten.',
																						  showCloseButton: true,
																						  showConfirmButton: true,
																						}).then((result) => {
																						  if (result.value) {
																								window.location.href="user_activity_applications.php";
																						  }
																						})
																					}
																					else if(result == "Please Login or Signup.")
																					{
																						$('#send_application_error').css("display","block");
																					}
													
																				}
																		});
																	}
																	else
																	{
																		const swalWithBootstrapButtons = Swal.mixin({
																		  customClass: {
																		    confirmButton: 'btn btn-warning'
																		  },
																		  buttonsStyling: false
																		})

																		swalWithBootstrapButtons.fire({
																		  icon: 'warning',
																		  title: 'Unvollständige Profil-Info',
																		  text: 'Bitte klicken Sie auf "Ausfüllen" und füllen Sie jedes einzelne Feld auf der Seite "Profilinformationen" aus.',
																		  showCloseButton: true,
																		  confirmButtonText: 'Ausfüllen',
																		  confirmButton: 'btn btn-warning',
																		  showConfirmButton: true,
																		}).then((result) => {
																		  if (result.value) {
																		    window.location.href = "user_profile.php";
																		  }
																		})
																	}
																}
															});

															
														}
														else
														{
															$('#job_application').focus();
															$('#job_application').addClass("valdation_error_border");
															$('#empty_application_error').css("display","block");
														}
														
													}
													else
													{
														location.reload();
													}
				
												}
											});
									<?php
										}
										else
										{
									?>

											Swal.fire({
											  icon: 'error',
											  text: 'Sie können sich nicht für die Stelle bewerben, da Sie als Arbeitgeber registriert sind.',
											  showCloseButton: true,
											  showConfirmButton: true,
											}).then((result) => {
											  if (result.value) {
											    window.location.href = "home.php";
											  }
											})
									<?php
										}
									?>
								}
								$('#job_application').keyup(function(){
									$(this).removeClass("valdation_error_border");
									$('#empty_application_error').css("display","none");
								});

							//Like_job && Unlike_job --------------------------------------------------------------------------------

								$("#like_plain_icon").hover(function(){
									$(this).removeClass("fa-thumbs-o-up");
									$(this).addClass("fa-thumbs-up");
								},function(){
									$(this).removeClass("fa-thumbs-up");
									$(this).addClass("fa-thumbs-o-up");
								});

									$("#like_fill_icon").hover(function(){
										$(this).removeClass("fa-thumbs-up");
										$(this).addClass("fa-thumbs-o-up");
									},function(){
										$(this).removeClass("fa-thumbs-o-up");
										$(this).addClass("fa-thumbs-up");
									});

								function like_job()
								{	
									<?php

										if($_SESSION['user_type'] == "Arbeitnehmer")
										{	
									?>
											var job_action = "to_Like_job";

											$.ajax({
												url:'job_application_actions_php.php',
												type:'post',
												data:'job_action='+job_action,
												success:function(result){

													if(result == "Job_liked")
													{
														$("#like_plain").css("display","none");
														$("#like_fill").css("display","block");

														const Toast = Swal.mixin({
														  toast: true,
														  position: 'top-end',
														  showConfirmButton: false,
														  timer: 3000,
														  timerProgressBar: false,
														  onOpen: (toast) => {
														    toast.addEventListener('mouseenter', Swal.stopTimer)
														    toast.addEventListener('mouseleave', Swal.resumeTimer)
														  }
														})
														Toast.fire({
														  icon: 'success',
														  title: 'Mögen'
														})
													}
												}
											});

									<?php
										}
										else
										{
									?>
											Swal.fire({
											  icon: 'error',
											  text: 'Sie können diesen Job nicht Gefallen, weil Sie als Arbeitgeber registriert sind.',
											  showCloseButton: true,
											  showConfirmButton: true,
											}).then((result) => {
											  if (result.value) {
											    window.location.href = "home.php";
											  }
											})
									<?php
										}	
									?>
								}

								function unlike_job()
								{		

									var job_action = "to_Unike_job";

									$.ajax({
										url:'job_application_actions_php.php',
										type:'post',
										data:'job_action='+job_action,
										success:function(result){

											if(result == "Job_unliked")
											{
												$("#like_fill").css("display","none");
												$("#like_plain").css("display","block");

												const Toast = Swal.mixin({
												  toast: true,
												  position: 'top-end',
												  showConfirmButton: false,
												  timer: 3000,
												  timerProgressBar: false,
												  onOpen: (toast) => {
												    toast.addEventListener('mouseenter', Swal.stopTimer)
												    toast.addEventListener('mouseleave', Swal.resumeTimer)
												  }
												})

												Toast.fire({
												  icon: 'success',
												  title: 'nicht gemocht'
												})

											}

										}
									});
								}

							//Save_job && Unsave_job --------------------------------------------------------------------------------

								$("#save_plain_icon").hover(function(){
									$(this).removeClass("fa-bookmark-o");
									$(this).addClass("fa-bookmark");
								},function(){
									$(this).removeClass("fa-bookmark");
									$(this).addClass("fa-bookmark-o");
								});

									$("#save_fill_icon").hover(function(){
										$(this).removeClass("fa-bookmark");
										$(this).addClass("fa-bookmark-o");
									},function(){
										$(this).removeClass("fa-bookmark-o");
										$(this).addClass("fa-bookmark");
									});

								function save_job()
								{			
									<?php

										if($_SESSION['user_type'] == "Arbeitnehmer")
										{	
									?>

											var job_action = "to_Save_job";
											var application = $("#job_application").val();

											$.ajax({
												url:'job_application_actions_php.php',
												type:'post',
												data:'job_action='+job_action+'&application_draft='+application,
												success:function(result){

													if(result == "Job_saved")
													{
														$("#save_plain").css("display","none");
														$("#save_fill").css("display","block");

														const Toast = Swal.mixin({
														  toast: true,
														  position: 'top-end',
														  showConfirmButton: false,
														  timer: 3000,
														  timerProgressBar: false,
														  onOpen: (toast) => {
														    toast.addEventListener('mouseenter', Swal.stopTimer)
														    toast.addEventListener('mouseleave', Swal.resumeTimer)
														  }
														})

														Toast.fire({
														  icon: 'success',
														  title: 'Gespeichert'
														})

													}

												}
											});

									<?php
										}
										else
										{
									?>
											Swal.fire({
											  icon: 'error',
											  text: 'Sie können diesen Job nicht speichern, da Sie als Arbeitgeber registriert sind.',
											  showCloseButton: true,
											  showConfirmButton: true,
											}).then((result) => {
											  if (result.value) {
											    window.location.href = "home.php";
											  }
											})
									<?php
										}	
									?>
								}

								function unsave_job()
								{	

									var job_action = "to_Unsave_job";

									$.ajax({
										url:'job_application_actions_php.php',
										type:'post',
										data:'job_action='+job_action,
										success:function(result){

											if(result == "Job_unsaved")
											{
												$("#save_fill").css("display","none");
												$("#save_plain").css("display","block");

												const Toast = Swal.mixin({
												  toast: true,
												  position: 'top-end',
												  showConfirmButton: false,
												  timer: 3000,
												  timerProgressBar: false,
												  onOpen: (toast) => {
												    toast.addEventListener('mouseenter', Swal.stopTimer)
												    toast.addEventListener('mouseleave', Swal.resumeTimer)
												  }
												})

												Toast.fire({
												  icon: 'success',
												  title: 'Nicht Gespeichert'
												})

											}

										}
									});
								}
					<?php
						}
						else
						{
					?>
							$('#job_search_bar').css("display","none");
							$('#job_search_errorbar').css("display","none");
							$('#send_applicationbtn').attr("disabled","disabled");
							$('#send_application_error').css("display","block");
					<?php		
						}
					?>

						
					

					</script>

			</form>
		</div>
	</main>	
	<style type="text/css">
		
		.swal2-popup {
		  font-size: 1.6rem !important;
		}

	</style>					







							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>
		
</body>
</html>