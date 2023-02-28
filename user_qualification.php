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
				<div class="col-md-4" style="background-color: ;">
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
							if($_SESSION['user_type'] == "Arbeitnehmer")
							{

					?>
								<div class="row" id="profile_detail_row" style="background-color: #4caf50; color: white;" onclick="location.href='user_qualification.php'">
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
								<div class="row" id="profile_detail_row" style="background-color: #4caf50; color: white;" onclick="location.href='user_edit_delete_jobs.php'">
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
					?>
					<div class="row" id="profile_detail_row" style="" onclick="location.href='user_changepassword.php'">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-pencil" aria-hidden="true" id="user_icons"></i>Ändere das Passwort</h5>
						</div>
					</div>
				</div>
				<div class="col-md-8" style="background-color: ; padding: 40px;">
					<form method="POST" action="user_qualification_php.php" enctype="multipart/form-data">
						<?php

							$email = $_SESSION['user_email'];

							$select_user_qualification = "SELECT * FROM user_qualification WHERE email='".$email."'";
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
						?>
						<div class="row" style="margin-bottom: .9rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="user_education-name" id="user_education" placeholder="Bildung" value="<?php echo($education); ?>">
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: .5rem;">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-prepend">
										<button type="button" class="form-control btn btn-light" name="" id="user_experience_minus" >
											<h4 style="margin-top: -5px;">-</h4> 
										</button>
									</div>
									<input type="text" class="form-control btn btn-light" name="" id="user_experience" placeholder="Berufserfahrung" value="Berufserfahrung" disabled>
									<div class="input-group-append">
										<button type="button" class="form-control btn btn-light" name="" id="user_experience_plus" >
											<h4 style="margin-top: -5px;">+</h4> 
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-2"></div>
						</div>
						<div class="row" style="margin-bottom: 2rem;">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="user_firma" id="user_firma" placeholder="Firma Name" style="display: none;">
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

										$select_user_qualification = "SELECT * FROM user_qualification WHERE email='".$email."' ORDER BY job_id DESC";
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
										<th scope="row" class="experience_delete_icon" id="<?php echo($row['job_id']); ?>" style="display: none; text-align: center; cursor: pointer;">
											<label style="color: red; cursor: pointer;"><b><i class="fa fa-trash" aria-hidden="true"></i></b></label>
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
						<div class="row">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button type="button" class="btn btn-info btn-block" id="qualification_save" onclick="qualification();">Speichern</button>
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
						
						$("#user_experience_plus").click(function(){

							$("#user_firma").css("display","block");
							$("#user_dauer").css("display","block");

							$(".experience_id").css("display","block");
							$(".experience_delete_icon").css("display","none");

						});
						$("#user_experience_minus").click(function(){

							$("#user_firma").css("display","none");
							$("#user_dauer").css("display","none");

							$(".experience_id").css("display","none");
							$(".experience_delete_icon").css("display","block");

						});

						//var check = $(".experience_delete_icon").attr("id");
						//alert(check);
						//$("#user_experience_minus").css("display","block");


					//Save Qualification --------------------------------------------------------------------------------------	
						function qualification()
						{
							var firma_name=$('#user_firma').val();
							var dauer=$('#user_dauer').val();
							var education=$('#user_education').val();
							var add_or_delete = "add_qualification";
								//alert("true");

							

							if((firma_name=='' && dauer=='') || (firma_name!='' && dauer!=''))
							{
								$.ajax({
									url:'user_qualification_php.php',
									type:'post',
									data:'user_firma='+firma_name+'&user_dauer='+dauer+'&user_education='+education+'&add_or_delete='+add_or_delete,
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){
											
											window.location.href="user_qualification.php";
									}
								});
							}
							else
							{
								if(firma_name=='' || dauer!='')
								{
									$('#user_firma').addClass("valdation_error_border");
									$('#user_firma').focus();
								}
								else
								{
									$('#user_dauer').addClass("valdation_error_border");
									$('#user_dauer').focus();
								}
							}

							
						}

						//Delete Experience --------------------------------------------------------------------------------------

						$(".experience_delete_icon").click(function(){

							var selected_row_id = this.id;
							var add_or_delete = "delete_job_experience";

							$.ajax({
								url:'user_qualification_php.php',
								type:'post',
								data:'job_id='+selected_row_id+'&add_or_delete='+add_or_delete,
								beforeSend: function(){
		                        	$('#overlay').fadeIn(100);
		                        	$('.navbar').removeClass("sticky-top");
		                        },
		                        complete: function(){
		                        	$('#overlay').fadeOut(1000);
		                        	$('.navbar').addClass("sticky-top");
		                        },
								success:function(result){

									if(result == "Experience_deleted")
									{
										window.location.href="user_qualification.php";
									}	
									else
									{
										alert(result);
									}
								}
							});

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