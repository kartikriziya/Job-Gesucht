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


							<!-------------------- Content ---------------->

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
						?>
									<div class="col-12" style="display: block; text-align: center;">
										<img src="User_Profile_img/<?php echo($row['user_img']); ?>" class="rounded"
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
					<div class="row" id="profile_detail_row" style="background-color: #4caf50; color: white;" onclick="location.href='user_activity_applied.php'">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-id-card" aria-hidden="true" id="user_icons"></i>Bewerbungen</h5>
						</div>
					</div>
				</div>
				<div class="col-md-8" style="background-color: ; padding: 40px;">
					<form>
						<div class="row table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" style="margin-bottom: 3rem; max-height: 300px; overflow-y: auto;">
							<table class="table table-hover">
								<thead id="thead">
									<tr>
										<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9; text-align: center;">Id</th>
										<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9;">Arbeitnehmer</th>
										<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9;">Job_Image</th>
										<th scope="col" style="position: sticky; top: 0; background-color: #c8e6c9;">Firma_name</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<?php

										$arbeitgeber_email = $_SESSION['user_email'];

										$select_user_total_jobs = "SELECT * FROM job_application WHERE arbeitgeber_email='".$arbeitgeber_email."' ORDER BY job_application_id DESC";
										$selected_user_total_jobs = mysqli_query($conn,$select_user_total_jobs);

										$temp_application_id=mysqli_num_rows($selected_user_total_jobs);

											while($row=mysqli_fetch_assoc($selected_user_total_jobs))
											{
												$select_job_img = "SELECT * FROM job_post WHERE job_post_id='".$row['job_post_id']."' ";
												$selected_job_img = mysqli_query($conn,$select_job_img);
												if($row2=mysqli_fetch_assoc($selected_job_img))
												{
													$firma_name = $row2['firma_name'];
													$job_img = $row2['job_post_image'];
												}

												$select_arbeitnehmer = "SELECT * FROM user_profile WHERE email='".$row['arbeitnehmer_email']."' ";
												$selected_arbeitnehmer = mysqli_query($conn,$select_arbeitnehmer);
												if($row3=mysqli_fetch_assoc($selected_arbeitnehmer))
												{
													$arbeitnehmer_name = $row3['first_name'];
												}
									?>
													<tr class="each_applied" id="<?php echo($row['arbeitnehmer_email']); echo(" "); echo($row['job_post_id']); ?>" style="cursor: pointer;">
														<th scope="row" class="job_post_id" style=" text-align: center;">
															<?php echo($temp_application_id); ?>	
														</th>
														<td><?php echo($arbeitnehmer_name); ?></td>
														<td> 
															<img src="Job_Post_img/<?php echo($job_img); ?>" class=" z-depth-0"
								            					alt="Job_img" height="35">
								            			</td>
														<td><?php echo($firma_name); ?></td>
													</tr>
									<?php
												$temp_application_id = $temp_application_id - "1";
											}	
									?>
								</tbody>
							</table>
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

						$(".each_applied").click(function(){

							//alert($(this).attr('id'));
							var str = $(this).attr('id');

							var job_selected_arbeitnehmer = str.split(" ")[0];
							var job_post_id = str.split(" ")[1];

							$.ajax({
									url:'arbeitnehmer_personal_details_php.php',
									type:'post',
									data:'job_post_id='+job_post_id+'&job_selected_arbeitnehmer='+job_selected_arbeitnehmer,
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){
										
											if(result == "Please Login or Signup.")
											{
												const swalWithBootstrapButtons = Swal.mixin({
												  customClass: {
												    confirmButton: 'btn btn-success mr-3 mb-2',
												    cancelButton: 'btn btn-warning mb-2'
												  },
												  buttonsStyling: false
												})

												swalWithBootstrapButtons.fire({
												  title: 'To apply or to see the Details',
												  text: result,
												  icon: 'warning',
												  showConfirmButton: true,
												  showCancelButton: true,
												  showCloseButton: true,
												  confirmButtonText: 'Login',
												  cancelButtonText: 'Sign Up',
												}).then((result) => {
												  if (result.value) {
												    window.location.href="login.php";
												  } 
												  else if (result.dismiss === Swal.DismissReason.cancel) {
												    window.location.href="signup.php";
												  }
												})
											}
											else
											{
												window.location.href=result;
												
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
