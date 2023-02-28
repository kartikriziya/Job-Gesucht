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


							<!-------------------- Content with crousel ---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container login_box" style="background-color: ; height: auto;">
			<form class="form-container" autocomplete="off" method="POST">
				<div class="row">
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
					<!-- Nehmer_Geber column -->
					<div class="col-sm-8 col-md-6 col-lg-4" id="arbeitnehmer_geber">
							<p id="nehmer_geber_error"></p>
						<div class="row">
							<div class="col-sm-1 col-md-2"></div>
							<div class="col-sm-10 col-md-8">
								<div class="form-group input-group form-check">
									<input class="form-check-input" type="radio" name="nehmer_geber" id="arbeitnehmer_buttontag" value="Arbeitnehmer" >
								 	<label class="form-check-label" id="arbeitnehmer_nametag" for="arbeitnehmer_buttontag">
								 		<i class="fa fa-handshake-o" id="arbeitnehmer_icon" aria-hidden="true" style="color: black;"></i>
								   		Arbeitnehmer
								  	</label>
								</div>
							</div>
							<div class="col-sm-1 col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-sm-1 col-md-2"></div>
							<div class="col-sm-10 col-md-8">
								<div class="form-group input-group form-check">
									<input class="form-check-input" type="radio" name="nehmer_geber" id="arbeitgeber_buttontag" value="Arbeitgeber" >
								 	<label class="form-check-label" id="arbeitgeber_nametag" for="arbeitgeber_buttontag">
								   		<i class="fa fa-globe" id="arbeitgeber_icon" aria-hidden="true" style="color: black;"></i>
										Arbeitgeber
								  	</label>
								</div>
							</div>
							<div class="col-sm-1 col-md-2"></div>
						</div>
						<div class="row">
							<div class="col-sm-1 col-md-2"></div>
							<div class="col-sm-10 col-md-8">
								<div class="form-group">
									<button type="button" class="btn btn-success btn-block" id="nehmer_geber" onclick="nehmer_geber();">Next</button>
								</div>
							</div>
							<div class="col-sm-1 col-md-2"></div>
						</div>
					</div>
					<!-- Signup_OTP column -->
					<?php
						include 'signup_otp.php'
					?>
					<!-- Signup_verification column -->
					<?php
						include 'signup_verification.php'
					?>
					<!-- Signup_password column -->
					<?php
						include 'signup_password.php'
					?>
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
				</div>
				<script type="text/javascript">

					<?php

						if(isset($_SESSION['user_email'])) 
						{
							header("location:index.php");
						}

					?>

					
					//Arbeitnehmer oder Arbeitgeber ----------------------------------------------------------------------------------------------	
						
						$('#nehmer_geber').click(function(){

							if($("#arbeitnehmer_buttontag").is(':checked'))
							{
								var nehmer_geber = $("#arbeitnehmer_buttontag").val();
								$('#signup').css("display","block");
								$('#arbeitnehmer_geber').css("display","none");
							}
							else if($("#arbeitgeber_buttontag").is(':checked'))
							{
								var nehmer_geber = $("#arbeitgeber_buttontag").val();
								$('#signup').css("display","block");
								$('#arbeitnehmer_geber').css("display","none");
							}
							else
							{
								//Red Error Icon
								$('#arbeitnehmer_icon').addClass("valdation_error_icon");
								$('#arbeitgeber_icon').addClass("valdation_error_icon");

								//Select Error
								$("#nehmer_geber_error").css("display","block");
								$("#nehmer_geber_error").text("Bitte wählen Sie eine der Optionen.");
							}

							
						});

						$("input[name='nehmer_geber']").click(function(){

								//Remove_Red Error Icon
								$('#arbeitnehmer_icon').removeClass("valdation_error_icon");
								$('#arbeitgeber_icon').removeClass("valdation_error_icon");

								//Remove_Select Error
								$("#nehmer_geber_error").css("display","none");
						});


					//OTP Validation Timer --------------------------------------------------------------------------------

						function converSeconds(s)
						{
							var min = floor(s/60);
							var sec = s % 60;
							return nf(min, 2) + ':' + nf(sec, 2);
						}
						function otp_timer() {
							
							//noCanvas();
							clearInterval(otp_interval);

							var counter='0';
							var totaltime = '180';
							var timeleft = totaltime - counter;


							$('#verification_otp_timer').css("display","block");
							var timer = select('#verification_otp_time');
							timer.html(converSeconds(totaltime - counter));


							var otp_interval = setInterval(timeIt,1000);
							function timeIt()
							{
								if((totaltime - counter) != 0)
								{
									counter++;
									timeleft = totaltime - counter;
									timer.html(converSeconds(timeleft));

									$("#send_otp_againbtn").click(function(){
										clearInterval(otp_interval);
									});

								}
								else
								{
									clearInterval(otp_interval);

									var verify_otp = "Expire_signup_OTP";
									var email=$('#signup_email').val();
									
									if($('#signup_verification').css("display") != "none")
									{
										$.ajax({
											url:'verify_otp_php.php',
											type:'post',
											data:'email='+email+'&verify_otp='+verify_otp,
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
													$('#verification_otp_timer').css("display","none");
													$('#verify_otpbtn').css("display","none");

													$('#send_otp_againbtn').css("display","none");
													$('.expire_send_otp_againbtn').css("display","block");
													//Expired signup_OTP 
													$('#verification_error').css("display","block");
													$('#verification_error').text("Das OTP ist abgelaufen. Klicken Sie für New_OTP auf 'OTP erneut senden'");
												}

											}
										});
									}

								}
							}

						}

				</script>
			</form>
			<?php
				include 'crousel.php'
			?>
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