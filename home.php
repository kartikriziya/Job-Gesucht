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
	<?php
		include 'header_navbar.php';
	?>


							<!-------------------- Jobs Contents ---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container" style="background-color: ; min-height: 300px;">
			<form>
				<div class="row" style="margin-bottom: ;">
					<div class="col-sm-1 col-md-2" style="margin-bottom: 10px;">
						<i class="fa fa-refresh" aria-hidden="true" id="back" style="cursor: pointer;"  onclick="reset_home();"></i>
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
						      <option id="Mini" value="Mini" class="chnageoption">Mini</option>
						      <option id="Teil" value="Teil" class="chnageoption">Teil</option>
						      <option id="Voll" value="Voll" class="chnageoption">Voll</option>
						      <option id="Alle" value="Alle" style="font-weight: bold;">Alle</option>
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
				<div class="row" style="margin-bottom: 40px;">
					<div class="col-sm-1 col-md-2" style="margin-bottom: 10px;">
					</div>
					<div class="col-sm-11 col-md-10">
						<p id="select_job_error"></p>
					</div>
				</div>
				<div class="row" id="job_row" style="">
					<?php

						if(isset($_SESSION['city']) && isset($_SESSION['type']))
						{

							if($_SESSION['type'] != 'Alle')
							{
								$select_job_post_id = "SELECT * FROM job_post WHERE (postleitzahl='".$_SESSION['city']."' OR stadt='".$_SESSION['city']."') AND job_typen='".$_SESSION['type']."' ";
								$selected_job_post_id = mysqli_query($conn,$select_job_post_id);
							}
							else
							{
								$select_job_post_id = "SELECT * FROM job_post WHERE postleitzahl='".$_SESSION['city']."' OR stadt='".$_SESSION['city']."' ";
								$selected_job_post_id = mysqli_query($conn,$select_job_post_id);
							}

							while($row=mysqli_fetch_assoc($selected_job_post_id))
							{

					?>
								<div class="col-sm-6 col-md-4 col-lg-3" id="job">
									<div class="jobbox" id="<?php echo($row['job_post_id']); ?>">
										<img src="Job_Post_img/<?php echo($row['job_post_image']); ?>" alt="Mountains" class="job_img">
										<?php

										if(isset($_SESSION['user_email']))
										{
											$email = $_SESSION['user_email'];

											$check_applied_or_not = "SELECT * FROM job_application WHERE job_post_id='".$row['job_post_id']."' AND arbeitnehmer_email ='".$email."' ";
											$checked_applied_or_not = mysqli_query($conn,$check_applied_or_not);
											$count = mysqli_num_rows($checked_applied_or_not);
										}
										else
										{
											$count = 0;
										}
											

											if($count <= 0)
											{
										?>
												<div class="job_detail">
													<div class="job_text">Klicken Sie hier für weitere Details.</div>
												</div>
										<?php
											}
											else
											{
										?>
												<div class="job_applied">
													<div class="job_text_applied">
														<b>
															<i class="fa fa-check-square-o" aria-hidden="true" style="color: #1b5e20;"></i>
														Beworben
														</b>
													</div>
												</div>
										<?php
											}
										?>
									</div>
								</div>
					<?php
							}
						}
						else
						{
					?>
					<script type="text/javascript">

						<?php

							if(isset($_SESSION['job_selected_error']))
							{
						?>	
								Swal.fire({
								  position: 'top-end',
								  icon: 'info',
								  title: 'Job nicht verfügbar',
								  showConfirmButton: false,
								  timer: 2000
								})
						<?php
								unset($_SESSION['job_selected_error']);
								unset($_SESSION['job_selected_id']);
							}

						?>

						var city_pincode = $("#change_city").val();
						var type_of_job = $("#chnage_typeofjob").val();

						if(city_pincode=='' && type_of_job=='Typ des JOB')
						{
							$('#select_job_error').css("display","block");
							$('#select_job_error').text("Bitte geben Sie den Namen der Stadt oder die Postleitzahl ein und wählen Sie die typ des Job");
						}
						else
						{
							$('#select_job_error').css("display","block");
							$('#select_job_error').text("Es sind keine Jobs verfügbar !!!");
						}

					</script>
					<?php
						}
					?>

					<script type="text/javascript">

						//Prevent from reloading the page after unnecessary press of the enter key.

							$("form").keypress(function(e) {
							  //Enter key
							  if (e.which == 13) {
							    return false;
							  }
							});

						//Enter key work as change button to search for the jobs.
					
							var change_city_pincode = document.getElementById("change_city");
								change_city_pincode.addEventListener("keyup", function(event) {
								  if (event.keyCode === 13) {
								   event.preventDefault();
								   document.getElementById("changebtn").click();
								  }
								});
							var chnage_typeofjob = document.getElementById("chnage_typeofjob");
								chnage_typeofjob.addEventListener("keyup", function(event) {
								  if (event.keyCode === 13) {
								   event.preventDefault();
								   document.getElementById("changebtn").click();
								  }
								});


						$(".jobbox").click(function(){

							//alert($(this).attr('id'));
							var job_selected_id = $(this).attr('id');

							$.ajax({
									url:'job_application_php.php',
									type:'post',
									data:'job_selected_id='+job_selected_id,
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){
										
											if(result == "Bitte Login oder Signup.")
											{
												const swalWithBootstrapButtons = Swal.mixin({
												  customClass: {
												    confirmButton: 'btn btn-success mr-3 mb-2',
												    cancelButton: 'btn btn-warning mb-2'
												  },
												  buttonsStyling: false
												})

												swalWithBootstrapButtons.fire({
												  title: 'Um sich zu bewerben oder die Details zu sehen',
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
								else if(city_pincode=='' && type_of_job!='Type of job')
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

					</script>
					
				</div>
			</form>
		</div>
	</main>


							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>
		
</body>
</html>