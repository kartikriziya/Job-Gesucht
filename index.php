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

	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/main.css"/>
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css"/>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.css"/>

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	
	<script src="bootstrap-4.4.1-dist/sweetalert-master/dist/sweetalert.min.js"></script>

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
		<div class="container login_box" style="background-color: ; height: auto; min-height: 500px;">
			<form class="form-container" autocomplete="off">
				<div class="row" id="search_row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-md-2 col-lg-4 search_c1"></div>
							<div class="col-md-10 col-lg-8 search_c2" id="index">
									<div class="form-group text-center">
									    <input type="text" class="form-control" name="" id="citychoose" placeholder="Enter City or Pincode" value="<?php if(isset($_SESSION['city'])){echo($_SESSION['city']);} ?>">
									</div>
									<div class="form-group text-center">
									    <select class="form-control custom-select" id="typeofjob">
									      <option hidden>Typ des JOB</option>
									      <option value="Mini">Mini</option>
									      <option value="Teil">Teil</option>
									      <option value="Voll">Voll</option>
									    </select>
									</div>
									<p id="select_job_error"></p>
									<button type="button" id="searchbtn" class="btn btn-primary btn-block" onclick="search_job();">Search</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<script type="text/javascript">
				
				function search_job()
				{

					var city_pincode = $("#citychoose").val();
					var type_of_job = $("#typeofjob").val();


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

								if(result == "Session_created")
								{
									window.location.href="home.php";	
								}
								else
								{
									$('#select_job_error').css("display","block");
									$('#select_job_error').text(result);
								}
						}
						});
					}
					else
					{
						if(city_pincode!='' && type_of_job=='Typ des JOB')
						{
							$('#select_job_error').css("display","block");
							$('#select_job_error').text("Please select Type of Job");
						}
						else if(city_pincode=='' && type_of_job!='Type of job')
						{
							$('#select_job_error').css("display","block");
							$('#select_job_error').text("Bitte geben Sie den Namen der Stadt oder die Postleitzahl eine");
						}
						else
						{
							$('#select_job_error').css("display","block");
							$('#select_job_error').text("Bitte geben Sie den Namen der Stadt oder die Postleitzahl ein und wählen Sie Typ des Job");
						}
					}

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
</body>
</html>