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
			
		<!-- About -->
			<div class="row">
				<div class="col-sm-5" id="about_heading_div">
					<h2><i class="fa fa-share mr-2" aria-hidden="true"></i><b>Über uns</b></h2>
				</div>
				<div class="col-sm-7"></div>
			</div>
			<div class="row mt-4" id="about">
				<div class="col-12">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-5">
							<img src="images/JG_main-logo.png" id="about_logo">
						</div>
						<div class="col-sm-6">
							<p class="mt-2">
								Wir bieten <b><u><i>Teilzeitjobs</i></u></b> sowohl für Studenten als auch für Erwachsene an.
								<br><br>
								 Hier können Sie die Jobs suchen, für die Sie sich interessieren.
								 <br>
								 Befolgen Sie die unten angegebenen Schritte, um einen Job zu erhalten: -
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-11">
							<p class="mt-2">
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>1.</b> Wenn Sie ein Konto auf dieser Website haben, können Sie sich einfach <b><a href="login.php" style="color: green;">Login</a></b> oder sich <b><a href="signup.php" style="color: red;">Signup</a></b>.
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>2.</b> Bitte vervollständigen Sie Ihr Profil durch Klicken auf <b>
								  		<?php
								  			if(isset($_SESSION['user_email']))
								  			{
								  		?>
								  				<a href="user_profile.php" id="setting" style="color: black;">Setting</a>
								  		<?php
								  			}
								  			else
								  			{
								  		?>
								  				<a id="setting" style="color: black;">Setting</a>
								  		<?php 
								  			}
								  		?>

								  	</b>. Dieser Schritt ist sehr wichtig, um Ihre Bewerbung erfolgreich zu senden, und hilft Ihnen auch dabei, Ihre Bewerbung stark zu machen.   
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>3.</b> Jetzt können Sie nach Jobs suchen, indem Sie einfach den Pincode oder den Städtenamen verwenden.
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>4.</b> Sie haben dann die Möglichkeit, den Typ der Jobs auszuwählen.
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>5.</b> Nachdem Sie das Ergebnis für Ihre Suche angezeigt haben, klicken Sie auf den Job, an dem Sie interessiert sind, um die Details anzuzeigen oder eine Bewerbung zu schreiben.
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>6.</b> Die Bewerbung wird direkt an die E-Mail des Arbeitgebers gesendet.
								  </p>
								  <p class="pl-4 pt-2 pb-2" id="about_steps">
								  	<b>7.</b> Die Antwort Ihrer Bewerbung wird von der E-Mail des Arbeitgebers an Ihre registrierte E-Mail gesendet.
								  </p>
							</p>
						</div>
					</div>
				</div>
			</div>
		<!-- Terms 
			<div class="row">
				<div class="col-sm-5" id="terms_heading_div">
					<h2><i class="fa fa-share mr-2" aria-hidden="true"></i><b>AGB & rechtliche Hinweise</b></h2>
				</div>
				<div class="col-sm-7" style="background-color: ;"></div>
			</div>
			<div class="row mt-4" id="terms" style="display: none;">
				<div class="col-12">
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-11" style="background-color: red; height: 50px;"></div>
					</div>
					<div class="row">
						<div class="col-sm-1"></div>
						<div class="col-sm-1" style="background-color: green; height: 50px;"></div>
						<div class="col-sm-10" style="background-color: yellow; height: 50px;"></div>
					</div>
				</div>
			</div>-->

		</div>
	</main>

	<script type="text/javascript">
		
		$('#about_heading_div').click(function(){
			$('#about').slideToggle("slow");
		});
		$('#terms_heading_div').click(function(){
			$('#terms').slideToggle("slow");
		});

	</script>

							<!-------------------- Footer ---------------->

	<?php
		include 'footer.php';
	?>

</body>
</body>
</html>