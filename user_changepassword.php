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
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.css">

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	
	<script src="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.min.js"></script>		

	<script src="js/p5/p5.js"></script>
	<script src="js/p5/addons/p5.sound.min.js"></script>
	<script src="js/p5/sketch.js"></script>

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
				<div class="col-md-4" style="">
					<div class="row">
						<?php
							$select_user_identity = "SELECT * FROM user_profile WHERE email='".$_SESSION['user_email']."' ";
							$selected_user_identity = mysqli_query($conn,$select_user_identity);
								if($row=mysqli_fetch_assoc($selected_user_identity))
								{
									if($row['user_img'] == '')
									{
										$user_img = "user.png";
									}
									else
									{
										$user_img = $row['user_img'];
									}
						?>
									<div class="col-12" style="display: block; text-align: center;">
										<img src="User_Profile_img/<?php echo($user_img); ?>" class="rounded"
				            			salt="avatar image" id="user_img" style="">
									</div>
									<div class="col-12" style="display: block; text-align: center;">
										<h4 id="user_name" style=""><?php echo($row['first_name']); ?></h4>
									</div>
						<?php
								}
						?>
					</div>
					<div style="height: 0; margin: .3rem 0; overflow: hidden; border-top: 2px solid #1b5e20;"></div>
					<div class="row" id="profile_detail_row"  style="" onclick="location.href='user_profile.php'">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-id-card" aria-hidden="true" id="user_icons"></i>Info</h5>
						</div>
					</div>
					<?php

						$email = $_SESSION['user_email'];

						$select_user_type = "SELECT * FROM user WHERE email='".$email."'";
						$selected_user_type = mysqli_query($conn,$select_user_type);

						if($row=mysqli_fetch_array($selected_user_type))
						{
							if($row['nehmer_geber'] == "Arbeitnehmer")
							{

					?>
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_qualification.php'">
									<div class="col-sm-12" id="profile_details">
										<h5><i class="fa fa-book" aria-hidden="true" id="user_icons"></i>Qualifikation</h5>
									</div>
								</div>
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_aboutme.php'">
									<div class="col-sm-12" id="profile_details">
										<h5><i class="fa fa-info" aria-hidden="true" id="user_icons"></i>Über mich</h5>
									</div>
								</div>
					<?php
							}
							else
							{
					?>
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_edit_delete_jobs.php'">
									<div class="col-sm-12" id="profile_details">
										<h5><i class="fa fa-eraser" aria-hidden="true" id="user_icons"></i>Jobs bearbeiten oder löschen</h5>
									</div>
								</div>
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_total_jobs.php'">
									<div class="col-sm-12" id="profile_details">
										<h5><i class="fa fa-folder" aria-hidden="true" id="user_icons"></i>Gesamt-JOBS</h5>
									</div>
								</div>
					<?php

							}
						}
					?>
					<div class="row" id="profile_detail_row" style="background-color: #4caf50; color: white;" onclick="location.href='user_changepassword.php'">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-pencil" aria-hidden="true" id="user_icons"></i>Ändere das Passwort</h5>
						</div>
					</div>
				</div>
				<div class="col-md-8" style="background-color: ; padding: 40px;">
					<form>
						<div class="row" style="margin-bottom: 1rem;">
							<div class="col-md-1"></div>
							<div class="col-md-5" id="get_otp_btn">
									<button type="button" class="form-control btn btn-primary" id="get_otp" onclick="send_change_password_otp();">Erhalten Sie OTP</button>
							</div>
							<div class="col-md-5" id="given_email_label" style="padding-top: 11px;">
								<h6 id="given_email">auf angegebener E-Mail-Adresse</h6>
							</div>

							<div class="col-md-5" id="otp_time_validation" style="display: none;">
								<h6 style="" id="otp_timer">OTP ist nur gültig für <b id="changepassword_otp_timer"></b>.</h6>
								<h6 id="expired_otp_time_validation" style="display: none; color: black;">
									<label id="expired_otp"></label>
								</h6>
							</div>
							<div class="col-md-5" id="otp_error_label" style="display: none;">
								<h6 style="color: black;" id="new_otp">
									<label class="incorrect_otp_change_password">Geben Sie das richtige OTP ein</label>
									 <label id="or">oder</label>
									<b>
										<label id="change_password_send_otp_againbtn" onclick="send_again_change_password_otp();">Neues OTP erhalten?</label>
									</b>
								</h6>
							</div>
							<div class="col-md-5" id="expired_otp_error_label" style="display: none;">
								<h6 style="color: black;" id="new_otp">
									<b>
										<label id="expired_send_otp_again" onclick="expire_change_password_otp();">Neues OTP erhalten?</label>
									</b>
								</h6>
							</div>

							<div class="col-md-5" id="otp_verified" style="display: none;">
								<h6 style="" id="verified">OTP wird überprüft
									<b>
										<i class="fa fa-check-square-o" aria-hidden="true" style="color: #1b5e20;"></i>
									</b>.
								</h6>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 3rem;">
							<div class="col-md-1"></div>
							<div class="col-md-5 form-group">
								<input type="text" class="form-control" name="" id="enterotp" placeholder="Geben Sie OTP ein" style="cursor: not-allowed; opacity: 0.5;" disabled>
							</div>
							<div class="col-md-3 form-group">
								<button type="button" class="btn btn-dark btn-block" id="verifybtn" style="cursor: not-allowed; opacity: 0.5;" onclick="verify_change_password_otp();" disabled>Überprüfen</button>
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="row" style="">
							<div class="col-md-1"></div>
							<div class="col-md-5 form-group">
								<input type="Password" class="form-control" name="" id="newpassword" placeholder="Neues Passwort" style="cursor: not-allowed; opacity: 0.5;" disabled>
							</div>
							<div class="col-md-5 form-group">
								<input type="Password" class="form-control" name="" id="verifypassword" placeholder="Überprüfen Passwort" style="cursor: not-allowed; opacity: 0.5;" disabled>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 1rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<input type="checkbox" class="show_password_box-label" aria-label="Show Password" id="show_password" style="cursor: not-allowed; opacity: 0.5;" disabled>
								<label class="form-check-label show_password_box-label" for="show_password" id="show_password_label" style="cursor: not-allowed; opacity: 0.5;">Passwort anzeigen</label>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 1rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<p id="password_error"></p>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button type="button" class="btn btn-warning btn-block" id="change_passwordbtn"  style="cursor: not-allowed; opacity: 0.5;" onclick="save_new_password();" disabled>Ändern</button>
							</div>
							<div class="col-sm-4"></div>
						</div>
					</form>
					<script type="text/javascript">

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

						//Send Change_Password_OTP ---------------------------------------------------------------------------------	
						function send_change_password_otp()
						{
							var send_otp = "Change_Password_OTP";

								$.ajax({
									url:'send_otp_php.php',
									type:'post',
									data:'send_otp='+send_otp, 
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){


											$('#get_otp_btn').css("display","none");
											$('#given_email_label').css("display","none");
											$('#otp_time_validation').css("display","block");
											$('#expired_otp_error_label').css("display","block");

											otp_timer();

											$('#enterotp').removeAttr('disabled');
											$('#enterotp').css("cursor","text");
											$('#enterotp').css("opacity","1");
											$('#enterotp').focus();

											$('#verifybtn').removeAttr('disabled');
											$('#verifybtn').css("cursor","pointer");
											$('#verifybtn').css("opacity","1");
									}
								});
						}
						function expire_change_password_otp()
						{
							var send_otp = "Expire_Change_Password_OTP_Again";

								$.ajax({
									url:'send_otp_php.php',
									type:'post',
									data:'send_otp='+send_otp, 
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){


											$('#expired_otp_time_validation').css("display","none");
											$('#otp_timer').css("display","block");

											otp_timer();

											$('#enterotp').removeAttr('disabled');
											$('#enterotp').css("cursor","text");
											$('#enterotp').css("opacity","1");
											$('#enterotp').focus();

											$('#verifybtn').removeAttr('disabled');
											$('#verifybtn').css("cursor","pointer");
											$('#verifybtn').css("opacity","1");
									}
								});
						}
						
						//Verify Change_Password_OTP ----------------------------------------------------------------------	
							function verify_change_password_otp()
							{
								var verify_otp = "Verify_Change_Password_OTP";
								var user_changepassword_otp=$('#enterotp').val();
									//alert("true");
									$.ajax({
										url:'verify_otp_php.php',
										type:'post',
										data:'user_changepassword_otp='+user_changepassword_otp+'&verify_otp='+verify_otp, 
										beforeSend: function(){
				                        	$('#overlay').fadeIn(100);
				                        	$('.navbar').removeClass("sticky-top");
				                        },
				                        complete: function(){
				                        	$('#overlay').fadeOut(1000);
				                        	$('.navbar').addClass("sticky-top");
				                        },
										success:function(result){
											if(result == "Correct_OTP")
											{
												$('#otp_time_validation').css("display","none");
												$('#otp_error_label').css("display","none");
												$('#expired_otp_error_label').css("display","none");
												$('#otp_verified').css("display","block");

												$('#newpassword').removeAttr('disabled');
												$('#newpassword').css("cursor","text");
												$('#newpassword').css("opacity","1");
												$('#newpassword').focus();

												$('#verifypassword').removeAttr('disabled');
												$('#verifypassword').css("cursor","text");
												$('#verifypassword').css("opacity","1");

												$('.show_password_box-label').removeAttr('disabled');
												$('.show_password_box-label').css("cursor","pointer");
												$('.show_password_box-label').css("opacity","1");

												$('#change_passwordbtn').removeAttr('disabled');
												$('#change_passwordbtn').css("cursor","pointer");
												$('#change_passwordbtn').css("opacity","1");

												$('#enterotp').attr("disabled","disabled");
												$('#enterotp').css("cursor","not-allowed");
												$('#enterotp').css("opacity","0.5");
												$('#verifybtn').attr("disabled","disabled");
												$('#verifybtn').css("cursor","not-allowed");
												$('#verifybtn').css("opacity","0.5");
											}
											else
											{
												$('#otp_error_label').css("display","block");
												$('#expired_otp_error_label').css("display","none");

												$('#enterotp').addClass('valdation_error_border');
											}
										}
									});
							}
							$('#enterotp').keyup(function(){

								//$('#verification_error').css("display","none");
								$('#enterotp').removeClass("valdation_error_border");

							});
							
						//Send Change_Password_OTP Again ---------------------------------------------------------------------------	
							function send_again_change_password_otp()
							{
								var send_otp_again = "Change_Password_OTP_Again";

								
								$('#enterotp').val('');
								$('#enterotp').removeClass("valdation_error_border");
								$('#enterotp').focus();

									$.ajax({
										url:'send_otp_php.php',
										type:'post',
										data:'send_otp='+send_otp_again, 
										beforeSend: function(){
				                        	$('#overlay').fadeIn(100);
				                        	$('.navbar').removeClass("sticky-top");
				                        },
				                        complete: function(){
				                        	$('#overlay').fadeOut(1000);
				                        	$('.navbar').addClass("sticky-top");
				                        },
										success:function(result){

											$('#otp_error_label').css("display","none");
											$('#expired_otp_error_label').css("display","block");

											otp_timer();
										}
									});
							}

						//Save New_Password ----------------------------------------------------------------------------------------	

							function save_new_password()
							{

								var newpassword = $("#newpassword").val();
								var verifypassword = $("#verifypassword").val();

								if (newpassword.length>=8 || verifypassword.length>=8) 
								{

									if(newpassword == verifypassword)
									{
										$.ajax({
							                url: 'user_changepassword_php.php',
							                type:'post',
							                data:'new_password='+newpassword, 
											beforeSend: function(){
					                        	$('#overlay').fadeIn(100);
					                        	$('.navbar').removeClass("sticky-top");
					                        },
					                        complete: function(){
					                        	$('#overlay').fadeOut(1000);
					                        	$('.navbar').addClass("sticky-top");
					                        },
							                success: function(data){
							                    window.location.href = data;
							                }
							            });
									}
									else
									{
										//Red Error
										$('#newpassword').addClass("valdation_error_border");
										$('#verifypassword').addClass("valdation_error_border");

										//Password doesn't match 
										$('#password_error').css("display","block");
										$('#password_error').text("Passwort stimmt nicht überein: Bitte geben Sie dasselbe Passwort in beide Felder ein");
									}

								}
								else
								{
									//Invalid Email 
									$('#password_error').css("display","block");
									$('#password_error').text("Passwort erstellen: mindestens 8 Zeichen");
									if(newpassword.length<verifypassword.length || newpassword=='' || verifypassword=='') 
									{
										$('#newpassword').focus();
									}
									else
									{
										$('#verifypassword').focus();
									}
								}
								
							}

						//OTP Validation Timer ----------------------------------------------------------------------------------------------

							function converSeconds(s)
							{
								var min = floor(s/60);
								var sec = s % 60;
								return nf(min, 2) + ':' + nf(sec, 2);
							}
							function otp_timer() {
								
								//noCanvas();

								var counter='0';
								var totaltime = '180';
								var timeleft = totaltime - counter;

								var timer = select('#changepassword_otp_timer');
								timer.html(converSeconds(totaltime - counter));


								var otp_interval = setInterval(timeIt,1000);
								function timeIt()
								{
									if((totaltime - counter) != 0)
									{
										counter++;
										timeleft = totaltime - counter;
										timer.html(converSeconds(timeleft));

										$('#expired_send_otp_again').click(function(){
											clearInterval(otp_interval);
										});
										$('#change_password_send_otp_againbtn').click(function(){
											clearInterval(otp_interval);
										});

									}
									else
									{
										if($('#newpassword').is(':disabled'))
										{
											clearInterval(otp_interval);

											var verify_otp = "Expire_changepassword_OTP";
											
												$.ajax({
													url:'verify_otp_php.php',
													type:'post',
													data:'verify_otp='+verify_otp, 
													beforeSend: function(){
							                        	$('#overlay').fadeIn(100);
							                        	$('.navbar').removeClass("sticky-top");
							                        },
							                        complete: function(){
							                        	$('#overlay').fadeOut(1000);
							                        	$('.navbar').addClass("sticky-top");
							                        },
													success:function(result){
														
														if(result == "Expire_OTP_is_deleted")
														{
															$('#otp_timer').css("display","none");

															//Expired signup_OTP 
															$('#expired_otp_time_validation').css("display","block");
															$('#expired_otp').text("Das OTP ist abgelaufen ");

															$('#otp_error_label').css("display","none");
															$('#expired_otp_error_label').css("display","block");

															$('#enterotp').attr("disabled","disabled");
															$('#enterotp').css("cursor","not-allowed");
															$('#enterotp').css("opacity","0.5");
															$('#verifybtn').attr("disabled","disabled");
															$('#verifybtn').css("cursor","not-allowed");
															$('#verifybtn').css("opacity","0.5");
														}

													}
												});
										}
										else
										{
											clearInterval(otp_interval);
										}

									}
								}

							}


							$('#newpassword').keyup(function(){

								$('#password_error').css("display","none");
								$('#newpassword').removeClass("valdation_error_border");
								$('#verifypassword').removeClass("valdation_error_border");
							});
							$('#verifypassword').keyup(function(){

								$('#password_error').css("display","none");
								$('#verifypassword').removeClass("valdation_error_border");
								$('#newpassword').removeClass("valdation_error_border");
							});

							$('#show_password').change(function()
						    {
						      if ($(this).is(':checked')) {
						          $('#newpassword').attr('type', 'text');
						          $('#verifypassword').attr('type', 'text');
						      }
						      else
						      {
						      	$('#newpassword').attr('type', 'password');
						      	$('#verifypassword').attr('type', 'password');
						      }
						    });

					</script>
				</div>
			</div>
		</div>
	</main>

							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>

</body>
</html>