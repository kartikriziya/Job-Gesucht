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

	<script src="bootstrap-4.4.1-dist/sweetalert2/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/sweetalert2/sweetalert2.min.css">

</head>
<body style="background-color: #c8e6c9;">

							<!-------------------- Header with Navbar ---------------->

							<?php
								include 'header.php';
							?>
	

<!--- Navbar ------->
	<nav class="navbar sticky-top navbar-expand-sm navbar-light" style="background-color: #1b5e20;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

			<?php
				include 'connection.php';

				if(isset($_SESSION['user_email'])) 
				{
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
						    <ul class="navbar-nav ml-auto nav-flex-icons" id="profile_dropdown_xs">
							  <li class="nav-item dropdown">
							    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							    	<img src="User_Profile_img/<?php echo($user_img); ?>" class="rounded-circle z-depth-0"
						            alt="User_img" height="35" width="35">	<?php echo($row['first_name']); ?>

							    </a>
							    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink">
							    	<?php
							    		if($_SESSION['user_type'] == "Arbeitnehmer")
										{
							    	?>
									      	<a class="dropdown-item" href="user_activity_applications.php">Aktivität</a>
									<?php
										}
										else
										{
									?>
											<a class="dropdown-item" href="job_post.php">Post Job</a>
											<a class="dropdown-item" href="user_activity_applied.php">Aktivität</a>
									<?php
										}
									?>
									      	<a class="dropdown-item" href="user_profile.php">Setting</a>
									      	<div class="dropdown-divider"></div>
									      	<a class="dropdown-item" onclick="logout();" style="cursor: pointer;">Logout</a>
							    </div>
							  </li>
						    </ul>
			<?php
						}
				}
				else 
				{
			?>
					 <ul class="navbar-nav ml-auto nav-flex-icons" id="profile_dropdown_xs">
					  <li class="nav-item active" id="nav-item">
					    <a href="signup.php" id="signup_link"><h3 id="signup_name"><i class="fa fa-user-plus" aria-hidden="true"></i>
						 Signup</h3>
		 				</a>
		 			  </li>
					</ul>
			<?php
				}
			?>

		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item active" id="nav-item">
		   		<a class="nav-link" href="#"  onclick="location.href='home.php'">Hause</a>
			  </li>
			  <li class="nav-item" id="nav-item">
			    <a class="nav-link" href="about.php">Über uns</a>
			  </li>
			  <li class="nav-item" id="nav-item">
			    <a class="nav-link" href="contact.php">Kontakt</a>
			  </li>
			</ul>
		</div>

			<?php

				if(isset($_SESSION['user_email'])) 
				{
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
						    <ul class="navbar-nav ml-auto nav-flex-icons" id="profile_dropdown_sm">
							  <li class="nav-item dropdown">
							    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							    	<img src="User_Profile_img/<?php echo($user_img); ?>" class="rounded-circle z-depth-0"
						            alt="User_img" height="35" width="35">	<?php echo($row['first_name']); ?>

							    </a>
							    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink">
							    	<?php
							    		if($_SESSION['user_type'] == "Arbeitnehmer")
										{
							    	?>
									      	<a class="dropdown-item" href="user_activity_applications.php">Aktivität</a>
									<?php
										}
										else
										{
									?>
											<a class="dropdown-item" href="job_post.php">Post Job</a>
											<a class="dropdown-item" href="user_activity_applied.php">Aktivität</a>
									<?php
										}
									?>
									      	<a class="dropdown-item" href="user_profile.php">Setting</a>
									      	<div class="dropdown-divider"></div>
									      	<a class="dropdown-item" onclick="logout();" style="cursor: pointer;">Logout</a>
							    </div>
							  </li>
						    </ul>
			<?php
						}
				}
				else 
				{
			?>
					 <ul class="navbar-nav ml-auto nav-flex-icons" id="profile_dropdown_sm">
					  <li class="nav-item active" id="nav-item">
					    <a href="signup.php" id="signup_link"><h3 id="signup_name"><i class="fa fa-user-plus" aria-hidden="true"></i>
						 Signup</h3>
		 				</a>
		 			  </li>
					</ul>
			<?php
				}
			?>
		    
		   
	</nav>


							<!-------------------- Content with crousel ---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container login_box" style="background-color: ; height: auto;">
			<form class="form-container" autocomplete="off">
				<div class="row email_pass">
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
					<div class="col-sm-8 col-md-6 col-lg-4" id="login">
							<p id="login_error"></p>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="email_icon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</span>
								</div>
								<input type="text" class="form-control" name="" id="login_email" placeholder="Email Address">
							</div>
							<div class="form-group input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="password_icon">
										<i class="fa fa-key" aria-hidden="true"></i>
									</span>
								</div>
								<input type="password" class="form-control" name="" id="login_password" placeholder="Passwort">
							</div>
							<div class="form-group pl-2" id="forget_login_password">
								<a href="forgot_password.php"><label id="forget_password">Passwort vergessen?</label></a>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-success btn-block" id="login_btn" onclick="login();">Login</button>
							</div>
					</div>
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
				</div>
			</form>
			<script type="text/javascript">

				<?php

					if(isset($_SESSION['temp_login-signup_error']))
					{
				?>
						Swal.fire({
						  position: 'top-end',
						  icon: 'info',
						  title: 'Bitte Login oder Signup',
						  showConfirmButton: false,
						  timer: 2000
						})
				<?php
						unset($_SESSION['temp_login-signup_error']);
					}
					elseif(isset($_SESSION['user_email'])) 
					{
						header("location:index.php");
					}

				?>


				//Enter key work as Login button 
					
					var login_password = document.getElementById("login_password");
						login_password.addEventListener("keyup", function(event) {
						  if (event.keyCode === 13) {
						   event.preventDefault();
						   document.getElementById("login_btn").click();
						  }
						});
				
				//Login ----------------------------------------------------------------------------------------------	

				function login()
					{
						var email=$('#login_email').val();
						var password=$('#login_password').val();
						var gmail_validation = email.endsWith("@gmail.com");

						if (email != '' && password != '') 
						{

							if(gmail_validation == true) 
							{
								$.ajax({
									url:'login_php.php',
									type:'post',
									data:'email='+email+'&password='+password, 
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){
						                    
						                    if(result == 'Logged in')
											{
												//Success 
												$('#login_error').css("display","block");
												$('#login_error').text(result);
												window.location.href="index.php";
											}
											else if(result == 'Falsches Passwort') 
											{
												//Invalid Password 
												$('#login_error').css("display","block");
												$('#login_error').text(result);
												$('#forget_login_password').css("display","block");
											}
											else if(result == 'Falsche Email oder Passwort') 
											{
												//Invalid Email or Password 
												$('#login_error').css("display","block");
												$('#login_error').text(result);
											}
										
									}
								});
							}
							else
							{
								//Red Error Icon
								$('#email_icon').addClass("valdation_error_icon");
								$('#login_email').addClass("valdation_error_border");

								//Invalid Email format 
								$('#login_error').css("display","block");
								$('#login_error').text("Ungültiges Email-Format");
							}
							
						}
						else if(email != '' && password == '') 
						{
								//Red Error Icon
								$('#password_icon').addClass("valdation_error_icon");
								$('#login_password').addClass("valdation_error_border");

								//Invalid Email format 
								$('#login_error').css("display","block");
								$('#login_error').text("Bitte Passwort eingeben");
						}
						else
							{
								//Red Error Icon
								$('#email_icon').addClass("valdation_error_icon");
								$('#login_email').addClass("valdation_error_border");
								$('#password_icon').addClass("valdation_error_icon");
								$('#login_password').addClass("valdation_error_border");

								//Invalid Email format 
								$('#login_error').css("display","block");
								$('#login_error').text("Bitte geben Sie E-Mail und Passwort ein");

							}
					}
					$('#login_email').keyup(function(){

						var email=$('#login_email').val();
						var password=$('#login_password').val();
						var gmail_validation = email.endsWith("@gmail.com");

						var login_error_text=$('#login_error').text();

						$('#email_icon').removeClass("valdation_error_icon");
						$('#login_email').removeClass("valdation_error_border");
						$('#password_icon').removeClass("valdation_error_icon");
						$('#login_password').removeClass("valdation_error_border");
						
						if (gmail_validation == true) 
						{
							
							$('#login_error').css("display","none");
						}
						else if(login_error_text != 'Ungültiges Email-Format')
						{
							$('#login_error').css("display","none");
							$('#forget_login_password').css("display","none");
						}
					});

				//Logout ----------------------------------------------------------------------------------------------	

				function logout()
				{
					$.ajax({
		                url: 'logout_php.php',
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