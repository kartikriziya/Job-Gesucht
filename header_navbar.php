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
									      	<a class="dropdown-item" href="user_activity_applications.php">Activity</a>
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
									      	<a class="dropdown-item" onclick="logout();" style="cursor: pointer;">Ausloggen</a>
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
					    <a href="login.php" id="login_link"><h3 id="login_name"><i class="fa fa-sign-in" aria-hidden="true"></i>
		 				 Login</h3>
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
					    <a href="login.php" id="login_link"><h3 id="login_name"><i class="fa fa-sign-in" aria-hidden="true"></i>
		 				 Login</h3>
		 				</a>
		 			  </li>
					</ul>
			<?php
				}
			?>
		    
	</nav>

	<script type="text/javascript">
		
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