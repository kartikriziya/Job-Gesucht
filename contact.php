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


							<!-------------------- Content with crousel ---------------->

	<main id="content" class="k-masthead" role="main">
		<div class="container" style="min-height: 500px;">
			
		<!-- Contact -->
			<div class="row">
				<div class="col-sm-2" id="contact_heading_div">
					<h2><i class="fa fa-share mr-2" aria-hidden="true"></i><b>Kontakt</b></h2>
				</div>
				<div class="col-sm-10"></div>
			</div>

			<div class="row mt-2" style="background-color: ;">
				<div class="col-sm-1 col-lg-2"></div>
				<div class="col-sm-7 col-lg-5  my-4" id="contact">
					<form>
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="email_icon">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>
							<input type="text" class="form-control" name="contact_to_email" id="contact_to_email" placeholder="contact@job-gesucht.com" value="contact@job-gesucht.com" disabled>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="contact_sub" id="contact_sub" placeholder="Betreff">
						</div>
						<div class="form-group">
							<textarea class="form-control" id="contact_message" placeholder="Bitte geben Sie Ihre Nachricht ein" rows="7"></textarea>
						</div>
						<div class="row">
							<div class="col-sm-7 col-lg-8"></div>
							<div class="col-sm-5 col-lg-4">
								<div class="form-group">
									<button type="button" class="btn btn-success btn-block" id="contact_btn" onclick="contact();">Senden</button>
								</div>
							</div>
						</div>
						<p id="contact_error"></p>
					</form>
				</div>
				<div class="col-sm-4 col-lg-5"></div>
			</div>

		</div>
	</main>

	<script type="text/javascript">

		function contact()
		{

			var subject = $("#contact_sub").val();
			var message = $("#contact_message").val();

			$.ajax({
				url:'contact_php.php',
				type:'post',
				data:'subject='+subject+'&message='+message,
				beforeSend: function(){
				$('#overlay').fadeIn(100);
				$('.navbar').removeClass("sticky-top");
				},
				complete: function(){
				$('#overlay').fadeOut(1000);
				$('.navbar').addClass("sticky-top");
				},
				success:function(result){

				if(result == "Nachricht_Gesendet")
				{	

					Swal.fire({
					  icon: 'success',
					  title: result,
					  text: 'Sehr bald wird sich unser Team mit Ihnen in Verbindung setzen.',
					  showCloseButton: true,
					  showConfirmButton: true,
					}).then((result) => {
					  if (result.value) {
							window.location.href="index.php";
					  }
					})
				}
				else(result == "Bitte Login oder Signup.")
				{
					$('#contact_error').css("display","block");
					$('#contact_error').text(result);
				}

				}
			});


		}

		

	</script>

	

							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>

</body>
</html>