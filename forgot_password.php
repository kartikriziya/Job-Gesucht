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
					<!-- Reset column -->
					<div class="col-sm-8 col-md-6 col-lg-4" id="reset">
						<p id="send_otp_error"></p>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="email_icon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" name="" id="forgot_password_email" placeholder="Email Please...">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-info btn-block" onclick="send_otp();" id="forgot_password_getotpbtn">Erhalten Sie OTP</button>
						</div>
					</div>
					<!-- Reset_verification column -->
					<div class="col-sm-8 col-md-6 col-lg-4" id="reset_verification" style="display: none;">
						<p id="verification_error"></p>
						<p id="verification_otp_timer">
							OTP ist nur gültig für <b id="verification_otp_time">aa</b>
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="" id="forgot_password_otp" placeholder="Geben Sie OTP ein">
						</div>
						<div class="form-group">
							<label id="send_otp_againbtn" style="display: none;"  onclick="send_again_otp();">OTP erneut senden ?</label>
							<label id="send_otp_againbtn" class="expire_send_otp_againbtn" style="display: none;"  onclick="expire_send_otp_againbtn();">OTP erneut senden ?</label>
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-warning btn-block" onclick="verify_otp();" id="forgot_password_otp_verificationbtn">Überprüfen OTP</button>
						</div>
					</div>
					<!-- Reset_password column -->
					<div class="col-sm-8 col-md-6 col-lg-4" id="reset_password" style="display: none;">
						<p id="password_error"></p>
						<div class="form-group">
							<input type="password" class="form-control" name="" id="forgot_password_password1" placeholder="New Password">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="" id="forgot_password_password2" placeholder="Verify Password">
						</div>
						<div class="form-group">
							 <input type="checkbox" aria-label="Show Password" id="show_password">
							 <label class="form-check-label" for="show_password" id="show_password_label">Passwort anzeigen</label>
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-danger btn-block" onclick="reset_password();" id="forgot_password_resetbtn">Zurücksetzen</button>
						</div>
					</div>
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
				</div>
			</form>
			<script type="text/javascript">
				$("#resetbtn").click(function() {
					$("#reset_verification").css({
						'display': 'block'
					});
					$("#reset").css({
						'display': 'none'
					});
				});
				$("#reset_verificationbtn").click(function() {
					$("#reset_password").css({
						'display': 'block'
					});
					$("#reset_verification").css({
						'display': 'none'
					});
					$("#reset").css({
						'display': 'none'
					});
				});
				$("#reset_passwordbtn").click(function() {
					window.location.href="login.php";
				});

		//Enter key work as verify_otp button --------------------------------------------------------------------
					
				var forgot_password_otp = document.getElementById("forgot_password_otp");
					forgot_password_otp.addEventListener("keyup", function(event) {
					  if (event.keyCode === 13) {
					   event.preventDefault();
					   document.getElementById("forgot_password_otp_verificationbtn").click();
					  }
					});

		//Send OTP ----------------------------------------------------------------------------------------------	
				function send_otp()
				{
					var send_otp = "Reset_OTP";
					
					var email=$('#forgot_password_email').val();
					var gmail_validation = email.endsWith("@gmail.com");

					if (gmail_validation == true) {
						//alert("true");
						$.ajax({
							url:'send_otp_php.php',
							type:'post',
							data:'email='+email+'&send_otp='+send_otp,
							beforeSend: function(){
		                    	$('#overlay').fadeIn(100);
		                    	$('.navbar').removeClass("sticky-top");
		                    },
		                    complete: function(){
		                    	$('#overlay').fadeOut(1000);
		                    	$('.navbar').addClass("sticky-top");
		                    },
							success:function(result){
										$('#reset_verification').css("display","block");
										$('#reset').css("display","none");
										otp_timer();
							}
						});
					}
					else
					{
						//Red Error Icon
						$('#email_icon').addClass("valdation_error_icon");
						$('#forgot_password_email').addClass("valdation_error_border");

						//Invalid Email 
						$('#send_otp_error').css("display","block");
						$('#send_otp_error').text("Ungültige E-Mail-Adresse: example@gmail.com");

					}
				}

		//Send OTP Again ----------------------------------------------------------------------------------------------	
				function send_again_otp()
				{
					var send_otp = "Reset_OTP";

					var email=$('#forgot_password_email').val();

					$('#verification_error').css("display","none");
					$('#forgot_password_otp').val('');
					$('#forgot_password_otp').removeClass("valdation_error_border");
					$('#forgot_password_otp').focus();

						$.ajax({
							url:'send_otp_php.php',
							type:'post',
							data:'email='+email+'&send_otp='+send_otp,
							beforeSend: function(){
		                    	$('#overlay').fadeIn(100);
		                    	$('.navbar').removeClass("sticky-top");
		                    },
		                    complete: function(){
		                    	$('#overlay').fadeOut(1000);
		                    	$('.navbar').addClass("sticky-top");
		                    },
							success:function(result){
										otp_timer();
							}
						});
				}

				function expire_send_otp_againbtn()
				{
					var send_otp = "Reset_OTP";

					var email=$('#forgot_password_email').val();

					$('#verification_error').css("display","none");
					$('#forgot_password_otp').val('');
					$('#forgot_password_otp').focus();

						$.ajax({
							url:'send_otp_php.php',
							type:'post',
							data:'email='+email+'&send_otp='+send_otp,
							beforeSend: function(){
		                    	$('#overlay').fadeIn(100);
		                    	$('.navbar').removeClass("sticky-top");
		                    },
		                    complete: function(){
		                    	$('#overlay').fadeOut(1000);
		                    	$('.navbar').addClass("sticky-top");
		                    },
							success:function(result){
										otp_timer();
							}
						});
				}

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

							var verify_otp = "Expire_reset_OTP";
							var email=$('#forgot_password_email').val();
							
							if($('#reset_verification').css("display") != "none")
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
											$('#forgot_password_resetbtn').css("display","none");

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

		//Verify OTP ----------------------------------------------------------------------------------------------	
				function verify_otp()
				{
					var verify_otp = "Verify_signup_OTP";
					var email=$('#forgot_password_email').val();
					var user_otp=$('#forgot_password_otp').val();
						//alert("true");
						$.ajax({
							url:'verify_otp_php.php',
							type:'post',
							data:'email='+email+'&user_otp='+user_otp+'&verify_otp='+verify_otp,
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
									$('#reset_password').css("display","block");
									$('#reset_verification').css("display","none");
								}
								else if(result == "No_OTP")
								{
									$('.expire_send_otp_againbtn').css("display","block");
									//Red Error Icon
									$('#forgot_password_otp').addClass("valdation_error_border");

									//Invalid signup_OTP 
									$('#verification_error').css("display","block");
									$('#verification_error').text("Bitte geben Sie Valid OTP ein oder klicken Sie auf 'OTP erneut senden'.");
								}
								else
								{
									$('.expire_send_otp_againbtn').css("display","none");
									$('#send_otp_againbtn').css("display","block");
									//Red Error Icon
									$('#forgot_password_otp').addClass("valdation_error_border");

									//Invalid signup_OTP 
									$('#verification_error').css("display","block");
									$('#verification_error').text("Bitte geben Sie Valid OTP ein oder klicken Sie auf 'OTP erneut senden'.");
								}
							}
						});
				}
				$('#forgot_password_otp').keyup(function(){

					$('#verification_error').css("display","none");
					$('#forgot_password_otp').removeClass("valdation_error_border");
					$('#send_otp_againbtn').css("display","none");

				});

		//Enter key work as signup(create_password) button --------------------------------------------------------------------
						
				var signup_password = document.getElementById("forgot_password_password2");
					signup_password.addEventListener("keyup", function(event) {
					  if (event.keyCode === 13) {
					   event.preventDefault();
					   document.getElementById("create_passwordbtn").click();
					  }
					});

		//Reset Password & Login  --------------------------------------------------------------------------------	

				function reset_password()
				{
					var email=$('#forgot_password_email').val();
					var forgot_password_password1=$('#forgot_password_password1').val();
					var forgot_password_password2=$('#forgot_password_password2').val();

					if (forgot_password_password1.length>=8 || forgot_password_password2.length>=8) 
					{

						if (forgot_password_password1 == forgot_password_password2) 
						{

							$.ajax({
								url:'user_changepassword_php.php',
								type:'post',
								data:'email='+email+'&password='+forgot_password_password1,
								beforeSend: function(){
		                        	$('#overlay').fadeIn(100);
		                        	$('.navbar').removeClass("sticky-top");
		                        },
		                        complete: function(){
		                        	$('#overlay').fadeOut(1000);
		                        	$('.navbar').addClass("sticky-top");
		                        },
								success:function(result){
										Swal.fire({
										  icon: 'success',
										  title: 'Passwort wurde geändert',
										  text: 'Loggen Sie ein auf Login Page.',
										  showCloseButton: true,
										  showConfirmButton: true,
										}).then((result) => {
										  if (result.value) {
												window.location.href="login.php";
										  }
										  else
										  {
										  		window.location.href="login.php";
										  }
										})
								}
							});
						}
						else
						{
							//Red Error
							$('#forgot_password_password1').addClass("valdation_error_border");
							$('#forgot_password_password2').addClass("valdation_error_border");

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
						if(forgot_password_password1.length<forgot_password_password2.length || forgot_password_password1=='' || forgot_password_password2=='') 
						{
							$('#forgot_password_password1').focus();
						}
						else
						{
							$('#forgot_password_password2').focus();
						}

					}
				}
				$('#forgot_password_password2').keyup(function(){

					var forgot_password_password1=$('#forgot_password_password1').val();
					var forgot_password_password2=$('#forgot_password_password2').val();
					$('#forgot_password_password1').removeClass("valdation_error_border");
					$('#forgot_password_password2').removeClass("valdation_error_border");
					$('#password_error').css("display","none");

						if (forgot_password_password1 == forgot_password_password2 && forgot_password_password1!='' && forgot_password_password2!='') {
						
							$('#password_error').css("display","none");
						}
				});	
				$('#forgot_password_password1').keyup(function(){

					var forgot_password_password1=$('#forgot_password_password1').val();
					var forgot_password_password2=$('#forgot_password_password2').val();
					$('#forgot_password_password1').removeClass("valdation_error_border");
					$('#forgot_password_password2').removeClass("valdation_error_border");
					$('#password_error').css("display","none");

						if (forgot_password_password1 == forgot_password_password2 && forgot_password_password1!='' && forgot_password_password2!='') {
						
							$('#password_error').css("display","none");
						}
				});
				$('#show_password').change(function()
			    {
			      if ($(this).is(':checked')) {
			          $('#forgot_password_password1').attr('type', 'text');
			          $('#forgot_password_password2').attr('type', 'text');
			      }
			      else
			      {
			      	$('#forgot_password_password1').attr('type', 'password');
			      	$('#forgot_password_password2').attr('type', 'password');
			      }
			    });


			</script>
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