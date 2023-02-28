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
	<nav class="navbar sticky-top navbar-expand-sm navbar-light" style="background-color: #1b5e20;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
			  <li class="nav-item active" id="nav-item">
			    <a class="nav-link" href="#">Home</a>
			  </li>
			  <li class="nav-item" id="nav-item">
			    <a class="nav-link" href="#">About</a>
			  </li>
			  <li class="nav-item" id="nav-item">
			    <a class="nav-link" href="#">Contact</a>
			  </li>
			</ul>
		</div>

		    <ul class="navbar-nav ml-auto nav-flex-icons" style="display: block;">
			  <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
		            alt="avatar image" height="35">	Kartik
			    </a>
			    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink">
			      <a class="dropdown-item" href="#">Saved</a>
			      <a class="dropdown-item" href="#" onclick="location.href='user_profile.php'">Setting</a>
			      	<div class="dropdown-divider"></div>
			      <a class="dropdown-item" href="#">Logout</a>
			    </div>
			  </li>
		    </ul>
		    <ul class="navbar-nav ml-auto nav-flex-icons" style="display: block;">
			  <li class="nav-item active" id="nav-item">
			    <a href="signup.php" id="signup_link"><h3 id="signup_name"><i class="fa fa-user-plus" aria-hidden="true"></i>
				 Signup</h3>
 				</a>
 			  </li>
			</ul>
	</nav>


							<!-------------------- Content with crousel ---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container login_box" style="background-color: ; height: auto;">
			<form class="form-container" autocomplete="off">
				<div class="row email_pass">
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
					<div class="col-sm-8 col-md-6 col-lg-4" id="login">
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
								<input type="password" class="form-control" name="" id="login_password" placeholder="Password">
							</div>
							<div class="form-group">
								<a href="forgot_password.php"><label id="forget_password">Forgot Password?</label></a>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-success btn-block" onclick="login();">Login</button>
							</div>
					</div>
					<div class="col-sm-2 col-md-3 col-lg-4"></div>
				</div>
			</form>
			<script type="text/javascript">
				
				//Login ----------------------------------------------------------------------------------------------	

				function login()
					{
						var email=$('#login_email').val();
						var password=$('#login_password').val();

							$.ajax({
								url:'login_php.php',
								type:'post',
								data:'email='+email+'&password='+password,
								success:function(result){

									alert(result);
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