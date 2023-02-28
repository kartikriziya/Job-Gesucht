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


							<!-------------------- Job Post ---------------->


	<main id="content" class="k-masthead" role="main">
		<div class="container" id="">
			<form method="POST" action="job_post_php.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-5 col-md-4 col-lg-3" style="padding: 30px;">
						<div class="job_post">
							<img src="images/choose_img.png" alt="Mountains" id="job_post_img">
							<div class="job_img_choose">
								<div class="job_file">
									<input type="file" class="form-control" name="job_img_file" id="job_img_file" onchange="readJobPostImg(this);">
									<button type="button" class="btn btn-light" name="" id="upload_job_img">Bild auswählen</button> 
								</div>
							</div>
						</div>
						<script type="text/javascript">
							
							$("#upload_job_img").click(function () {
							    $("#job_img_file").click();
							});

							function readJobPostImg(input) {
						        if (input.files && input.files[0]) {
						            var reader = new FileReader();

						            reader.onload = function (e) {
						                $('#job_post_img')
						                    .attr('src', e.target.result);
						            };

						            reader.readAsDataURL(input.files[0]);
						        }
						    }

						</script>
					</div>
					<div class="col-lg-1" id="job_selected_extra-div"></div>
					<?php

						$arbeitgeber_email = $_SESSION['user_email'];

						$select_arbeitgeber_info = "SELECT * FROM user_profile WHERE email='".$arbeitgeber_email."' ";
						$selected_arbeitgeber_info = mysqli_query($conn,$select_arbeitgeber_info);

						if($row=mysqli_fetch_assoc($selected_arbeitgeber_info))
						{
							$arbeitgeber = $row['first_name'];
							$post_countrycode = $row['country_code'];
							$arbeitgeber_phone = $row['phone_number'];
						}

					?>
					<div class="col-sm-7 col-md-8 col-lg-8">
						<div class="row" style="padding-top: 10px; max-height: 65px;">
							<div class="col-sm-6 col-md-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="firma_name" placeholder="Firma Name">
								</div>
							</div>
							<div class="col-sm-6 col-md-8"></div>
						</div>
						<div style="height: 0; margin: .3rem 0; overflow: hidden; border-top: 2px solid #1b5e20;"></div>
						<div class="row" style="margin-top: 20px; margin-bottom: 20px; padding-left: 20px; max-height: 40px;">
							<div class="col-sm-8 col-md-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="arbeitgeber" style="cursor: not-allowed; font-weight: bold;" placeholder="Arbeitgeber" value="<?php echo($arbeitgeber); ?>" disabled>
								</div>
							</div>
							<div class="col-sm-4 col-md-6 col-lg-8"></div>
						</div>
						<div class="row" style="background-color: ; margin-top: 20px; margin-bottom: 20px; padding-left: 20px; max-height: 40px;">
							<div class="col-sm-8 col-md-6 col-lg-4">
								<div class="form-group text-center">
								    <select class="form-control custom-select" id="post_typeofjob">
								      <option hidden>Typ des JOB</option>
								      <option value="Mini">Mini</option>
								      <option value="Teil">Teil</option>
								      <option value="Voll">Voll</option>
								    </select>
								</div>
							</div>
							<div class="col-sm-4 col-md-6 col-lg-8"></div>
						</div>
						<div class="row" style="margin-top: 20px; padding-left: 20px;">
							<div class="col-md-8 col-lg-6">
								<div class="input-group">
								    <select class="form-control custom-select" id="post_countrycode" value="<?php echo($post_countrycode); ?>" style="max-width: 80px; cursor: not-allowed; font-weight: bold;" disabled>
								      <option hidden>+49</option>
								    </select>
									<input type="text" class="form-control" name="" id="arbeitgeber_phone" value="<?php echo($arbeitgeber_phone); ?>" style="cursor: not-allowed; font-weight: bold;" placeholder="telefonnummer" disabled>
								</div>
							</div>
							<div class="col-md-4 col-lg-6"></div>
						</div>
						<div class="row" style="margin-top: 20px; padding-left: 20px;">
							<div class="col-md-8 col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="arbeitgeber_email" style="cursor: not-allowed; font-weight: bold;" placeholder="Email" value="<?php echo($arbeitgeber_email); ?>" disabled>
								</div>
							</div>
							<div class="col-md-4 col-lg-6">
							</div>
						</div>
						<div class="row" style="padding-left: 20px;">
							<div class="col-sm-8 col-md-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="strasse" placeholder="Straße">
								</div>
							</div>
							<div class="col-sm-4 col-md-6 col-lg-8"></div>
						</div>
						<div class="row" style="padding-left: 20px;">
							<div class="col-sm-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="geschaft_nummer" placeholder="Hausnummer">
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="postleitzahl" placeholder="Postleitzahl">
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
						<div class="row" style="padding-left: 20px;">
							<div class="col-sm-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="stadt" placeholder="Stadt">
								</div>
							</div>
							<div class="col-sm-6 col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" name="" id="land" value="Germany" placeholder="Land">
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
						<div class="row" style="background-color: ; padding-left: 20px;">
							<div class="col-12">
								<p id="job_post_error"></p>
							</div>
						</div>
						<div class="row" style="background-color: ; padding-left: 20px; margin-top: 25px; margin-bottom: 25px;">
							<div class="col-sm-4"></div>
							<div class="col-sm-4">
								<button type="button" class="btn btn-info btn-block" id="save_application" onclick="job_post();">Posten</button>
							</div>
							<div class="col-sm-4"></div>
						</div>
					</div>
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
				
				//Job Post --------------------------------------------------------------------------------------	


				function job_post()
				{

					var profile_validation = "Check whether Profile Info is empty or not.";
					$.ajax({
						url:'user_profile_validation_php.php',
						type:'post',
						data:'profile_validation='+profile_validation,
						beforeSend: function(){
                        	$('#overlay').fadeIn(100);
                        	$('.navbar').removeClass("sticky-top");
                        },
                        complete: function(){
                        	$('#overlay').fadeOut(1000);
                        	$('.navbar').addClass("sticky-top");
                        },
						success:function(result){

							if(result == "Profilinformationen sind nicht leer")
							{
								var job_image = $("#job_img_file").val();
								

								var firma_name = $("#firma_name").val();
								var post_typeofjob = $("#post_typeofjob").val();
								var strasse = $("#strasse").val();
								var geschaft_nummer = $("#geschaft_nummer").val();
								var postleitzahl = $("#postleitzahl").val();
								var stadt = $("#stadt").val();
								var land = $("#land").val();

								if(job_image!='' && firma_name!='' && post_typeofjob!='' && strasse!='' && geschaft_nummer!='' && postleitzahl!='' && stadt!='' && land!='')
								{
									if(post_typeofjob!='Typ des JOB')
									{
										


										var job_img_property = document.getElementById('job_img_file').files[0];
										var image_name = job_img_property.name;
										var form_data = new FormData();
										form_data.append("job_img_file",job_img_property);

										$.ajax({
											url:'job_post_php.php',
											type:'post',
											cache: false,
									        contentType: false,
									        processData: false,
											data:form_data,
											beforeSend: function(){
					                        	$('#overlay').fadeIn(100);
					                        	$('.navbar').removeClass("sticky-top");
					                        },
					                        complete: function(){
					                        	$('#overlay').fadeOut(1000);
					                        	$('.navbar').addClass("sticky-top");
					                        },
											success:function(result){

												$.ajax({
													url:'job_post_php.php',
													type:'post',
													data:'job_image='+job_image+'&firma_name='+firma_name+'&post_typeofjob='+post_typeofjob+'&strasse='+strasse+'&geschaft_nummer='+geschaft_nummer+'&postleitzahl='+postleitzahl+'&stadt='+stadt+'&land='+land,
														beforeSend: function(){
								                        	$('#overlay').fadeIn(100);
								                        	$('.navbar').removeClass("sticky-top");
								                        },
								                        complete: function(){
								                        	$('#overlay').fadeOut(1000);
								                        	$('.navbar').addClass("sticky-top");
								                        },
													success:function(result){
														if(result == 'Updated')
														{
															window.location.href = 'user_total_jobs.php';
														}
														else
														{
															window.location.href = 'user_total_jobs.php';
														}
													}
												});
											}
										});
									}
									else
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte wählen Sie der Typ des JOB!!!");
										$("#post_typeofjob").focus();
										$("#post_typeofjob").addClass("valdation_error_border");
									}
								}
								else
								{
									

									if(firma_name=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie den Firmennamen ein !!!");
										$("#firma_name").focus();
										$("#firma_name").addClass("valdation_error_border");
										$("#firma_name").attr("placeholder","Firma Name *")
									}
									else if(strasse=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie die Straße ein !!!");
										$("#strasse").focus();
										$("#strasse").addClass("valdation_error_border");
										$("#strasse").attr("placeholder","Straße *")
									}
									else if(geschaft_nummer=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie Geschaft Nummer ein !!! !!!");
										$("#geschaft_nummer").focus();
										$("#geschaft_nummer").addClass("valdation_error_border");
										$("#geschaft_nummer").attr("placeholder","Nummer *")
									}
									else if(postleitzahl=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie Postleitzahl ein !!!");
										$("#postleitzahl").focus();
										$("#postleitzahl").addClass("valdation_error_border");
										$("#postleitzahl").attr("placeholder","Postleitzahl *")
									}
									else if(stadt=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie Stadt ein !!!");
										$("#stadt").focus();
										$("#stadt").addClass("valdation_error_border");
										$("#stadt").attr("placeholder","Stadt *")
									}
									else if(land=='')
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte geben Sie Land ein !!!");
										$("#land").focus();
										$("#land").addClass("valdation_error_border");
										$("#land").attr("placeholder","land *")
									}
									else
									{
										$('#job_post_error').css("display","block");
										$('#job_post_error').text("Bitte wählen Sie ein Bild aus, um Ihren Job zu posten !!!");
										$(".job_img_choose").css("opacity","1");
										$("#upload_job_img").css("animation","job_image 1s linear infinite");
									}

								}
							}
							else
							{
								const swalWithBootstrapButtons = Swal.mixin({
								  customClass: {
								    confirmButton: 'btn btn-warning'
								  },
								  buttonsStyling: false
								})

								swalWithBootstrapButtons.fire({
								  icon: 'warning',
								  title: 'Unvollständige Profil-Info',
								  text: 'Bitte klicken Sie auf "Ausfüllen" und füllen Sie jedes einzelne Feld auf der Seite "Profil Info" aus.',
								  showCloseButton: true,
								  confirmButtonText: 'Ausfüllen',
								  confirmButton: 'btn btn-warning',
								  showConfirmButton: true,
								}).then((result) => {
								  if (result.value) {
								    window.location.href = "user_profile.php";
								  }
								})
							}
						}
					});

				}

				$("#firma_name").keyup(function(){

					$("#firma_name").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#strasse").keyup(function(){

					$("#strasse").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#geschaft_nummer").keyup(function(){

					$("#geschaft_nummer").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#postleitzahl").keyup(function(){

					$("#postleitzahl").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#stadt").keyup(function(){

					$("#stadt").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#land").keyup(function(){

					$("#land").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#post_typeofjob").click(function(){

					$("#firma_name").removeClass("valdation_error_border");
					$('#job_post_error').css("display","none");
				});
				$("#upload_job_img").click(function(){

					$("#upload_job_img").removeClass("valdation_error_border");
					$(".job_img_choose").css("opacity","0");
					$('#job_post_error').css("display","none");
				});



			</script>

		</div>
	</main>						







							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>
		
</body>
</html>