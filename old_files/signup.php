<!DOCTYPE html>
<html>
<head>

	<title>Part-time-job</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/main.css">
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	

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
					<!-- Signup column -->
					<div class="col-sm-8 col-md-6 col-lg-4" id="signup">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="email_icon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" name="signup_email" id="signup_email" placeholder="Email Please...">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-info btn-block" id="send_otpbtn" onclick="send_otp();">Send OTP</button>
						</div>
					</div>
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
					
					
				//Send OTP ----------------------------------------------------------------------------------------------	
					function send_otp()
					{
						var email=$('#signup_email').val();
						var gmail_validation = email.endsWith("@gmail.com");

						if (gmail_validation == true) {
							//alert("true");
							$.ajax({
								url:'send_otp.php',
								type:'post',
								data:'email='+email,
								success:function(result){

									if (result != 'Email Already Exists!!!')
									{
										$('#signup_verification').css("display","block");
										$('#signup').css("display","none");
									}
									else
									{
										alert(result);
									}

									
								}
							});
						}
						else
						{
							//Red Error Icon
							$('#email_icon').addClass("valdation_error_icon");
							$('#signup_email').addClass("valdation_error_border");

							//Invalid Email Popover
							$('#signup_email').attr("data-toggle","popover");
							$('#signup_email').attr("data-trigger","focus");
							$('#signup_email').attr("title","Invalid Email");
							$('#signup_email').attr("data-content","example@gmail.com");

							$('[data-toggle="popover"]').popover();
							$('.popover-dismiss').popover({
							  trigger: 'blur'
							});
							$('#signup_email').trigger('focus');

						}
					}
					$('#signup_email').keyup(function(){

						$('#email_icon').removeClass("valdation_error_icon");
						$('#signup_email').removeClass("valdation_error_border");
						$('[data-toggle="popover"]').popover('enable');
						$('#signup_email').blur();
						$('#signup_email').trigger('focus');
						
						var email=$(this).val();
						var gmail_validation = email.endsWith("@gmail.com");

						if (gmail_validation == true) {
							
							$('[data-toggle="popover"]').popover('disable');
							$('#signup_email').blur();
						}
					});

				//Verify OTP ----------------------------------------------------------------------------------------------	
					function verify_otp()
					{
						var email=$('#signup_email').val();
						var user_otp=$('#signup_otp').val();
							//alert("true");
							$.ajax({
								url:'verify_otp.php',
								type:'post',
								data:'email='+email,
								success:function(result){
									if(user_otp == result)
									{
										$('#signup_password').css("display","block");
										$('#signup_verification').css("display","none");
									}
									else
									{
										$('#send_otp_againbtn').css("display","block");
										//Red Error Icon
										$('#signup_otp').addClass("valdation_error_border");

										//Invalid Email Popover
										$('#signup_otp').attr("data-toggle","popover");
										$('#signup_otp').attr("data-trigger","focus");
										$('#signup_otp').attr("title","Invalid OTP");
										$('#signup_otp').attr("data-content","Please enter Valid OTP or click 'Send OTP Again'");

										
										$('[data-toggle="popover"]').popover('enable');
										$('#signup_otp').blur();
										$('#signup_otp').trigger('focus');
									}
								}
							});
					}
					$('#signup_otp').keyup(function(){

						var email=$('#signup_email').val();
						var user_otp=$('#signup_otp').val();

						$.ajax({
								url:'verify_otp.php',
								type:'post',
								data:'email='+email,
								success:function(result){

										$('#signup_otp').removeClass("valdation_error_border");
										
										if(user_otp == result)
										{
											$('[data-toggle="popover"]').popover('disable');
											$('#signup_otp').blur();

											$('#send_otp_againbtn').css("display","none");
											$('#verify_otpbtn').css("display","block");
										}
									}
								});

					});
					function send_again_otp()
					{
						var email=$('#signup_email').val();
							$.ajax({
								url:'send_again_otp.php',
								type:'post',
								data:'email='+email,
								success:function(result){
									$('#send_otp_againbtn').css("display","none");
								}
							});
					}

				//Create Password & Sign-up  --------------------------------------------------------------------------------	

					function create_password()
					{
						var email=$('#signup_email').val();
						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();

						if (signup_password1 != '' && signup_password1 != '') 
						{

							if (signup_password1 == signup_password2) 
							{

								$.ajax({
									url:'create_password.php',
									type:'post',
									data:'email='+email+'&password='+signup_password1,
									success:function(result){

										if(result == 'User_registerd')
										{
											window.location.href='login.php';
										}
										else
										{
											window.location.href='signup.php';
										}
									}
								});
							}
							else
							{
								//Red Error
								$('#signup_password1').addClass("valdation_error_border");
								$('#signup_password2').addClass("valdation_error_border");

								//Invalid Password Popover
								$('#signup_password2').attr("data-toggle","popover");
								$('#signup_password2').attr("data-trigger","focus");
								$('#signup_password2').attr("title","Password doesn't match");
								$('#signup_password2').attr("data-content","Please enter same password in both field");

								$('#signup_password1').attr("data-toggle","popover");
								$('#signup_password1').attr("data-trigger","focus");
								$('#signup_password1').attr("title","Password doesn't match");
								$('#signup_password1').attr("data-content","Please enter same password in both field");

								$('[data-toggle="popover"]').popover('enable');
								$('.popover-dismiss').popover({
								  trigger: 'blur'
								});
								
								
								if(signup_password1<signup_password2) 
								{
									$('#signup_password2').removeAttr("data-toggle","popover");
									$('#signup_password2').blur();
									$('#signup_password2').trigger('focus');
									$('#signup_password1').blur();
									$('#signup_password1').trigger('focus');
								}
								else
								{
									$('#signup_password1').removeAttr("data-toggle","popover");
									$('#signup_password1').blur();
									$('#signup_password1').trigger('focus');
									$('#signup_password2').blur();
									$('#signup_password2').trigger('focus');
								}

							}
						}
						else
						{
							//Invalid Password.empty Popover
							$('#signup_password2').attr("data-toggle","popover");
							$('#signup_password2').attr("data-trigger","focus");
							$('#signup_password2').attr("title","Password");
							$('#signup_password2').attr("data-content","Please verify Password");

							$('#signup_password1').attr("data-toggle","popover");
							$('#signup_password1').attr("data-trigger","focus");
							$('#signup_password1').attr("title","Password");
							$('#signup_password1').attr("data-content","Please create Password");

							$('[data-toggle="popover"]').popover('enable');
							$('.popover-dismiss').popover({
							  trigger: 'blur'
							});
							$('#signup_password2').trigger('focus');
							$('#signup_password1').trigger('focus');

						}
					}
					$('#signup_password2').keyup(function(){

						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();
						$('#signup_password1').removeClass("valdation_error_border");
						$('#signup_password2').removeClass("valdation_error_border");
						$('#signup_password2').attr("data-content","Please enter same password in both field");
						$('[data-toggle="popover"]').popover('enable');
						$('#signup_password2').blur();
						$('#signup_password2').trigger('focus');

							if (signup_password1 == signup_password2 && signup_password1!='' && signup_password2!='') {
							
								$('[data-toggle="popover"]').popover('disable');
								$('#signup_password2').blur();
							}
							else if(signup_password2.length>=1)
							{
								$('[data-toggle="popover"]').popover('disable');
								$('#signup_password2').blur();
								$('#signup_password2').trigger('focus');
							}
					});	
					$('#signup_password1').keyup(function(){

						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();
						$('#signup_password1').removeClass("valdation_error_border");
						$('#signup_password2').removeClass("valdation_error_border");
						$('#signup_password1').attr("data-content","Please enter same password in both field");
						$('[data-toggle="popover"]').popover('enable');
						$('#signup_password1').blur();
						$('#signup_password1').trigger('focus');
						

							if (signup_password1 == signup_password2 && signup_password1!='' && signup_password2!='') {
							
								$('[data-toggle="popover"]').popover('disable');
								$('#signup_password1').blur();
							}
							else if(signup_password1.length>=1)
							{
								$('[data-toggle="popover"]').popover('disable');
								$('#signup_password1').blur();
								$('#signup_password1').trigger('focus');
								$('#signup_password2').removeAttr("data-toggle","popover");
							}
					});
					$('#show_password').change(function()
				    {
				      if ($(this).is(':checked')) {
				          $('#signup_password1').attr('type', 'text');
				          $('#signup_password2').attr('type', 'text');
				      }
				      else
				      {
				      	$('#signup_password1').attr('type', 'password');
				      	$('#signup_password2').attr('type', 'password');
				      }
				    });

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