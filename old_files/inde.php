<!DOCTYPE html>
<html>
<head>
	<title>Part-time-job</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/style.css">
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="js/3.4.1/jquery.min.js"></script>
	<script src="js/3.4.1/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>	

</head>
<body>

	<div class="container-fluid" id="container">
		
		<div class="row header">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center text-sm-left text-md-left text-lg-left hc1">
				<a href="index.php" id="logolink"><h1 class="font-weight-bolder" id="logoname">Part time jobs</h1></a> 
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hc2">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4 lsc1"></div>
					<div class="col-sm-8 col-md-8 col-lg-8 lsc2">
						<div class="row">
							<div class="col-6 text-right lsl">
								<a href="login.php" id="login_link"><h3 id="login_name">Login</h3></a>
							</div>
							<div class="col-6 text-left lsr">
								<a href="#" id="signup_link"><h3 id="signup_name">Signup</h3></a>
							</div>	
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="row content">
			
			<div class="col-xs-12 col-sm-7 cc1"></div>
			<div class="col-xs-12 col-sm-5 cc2">
				<div class="row">
					<div class="col-sm-2 search_c1"></div>
					<div class="col-sm-8 search_c2">
						<form class="form-container">
							<div class="form-group text-center">
							    <select class="form-control" id="citychoose">
							      <option selected disabled>Choose city</option>
							      <option>Berlin</option>
							      <option>Munich</option>
							      <option>Hamburg</option>
							    </select>
							</div>
							<div class="form-group text-center">
							    <select class="form-control" id="typeofjob">
							      <option hidden>Type of job</option>
							      <option>Mini</option>
							      <option>Teil</option>
							      <option>Voll</option>
							    </select>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Search</button>
						</form>
					</div>
					<div class="col-sm-2 search_c3"></div>
				</div>
			</div>

		</div>

		<div class="row footer fixed-bottom" id="footer">
			
			<div class="col-md-4" style="background-color: ;">
				<div class="py-0">
                    <h3 class="my-4 text-white" style="font-size: 2vw;">About<span class="mx-2 font-italic text-warning ">Part time job</span></h3>
                    <p class="footer-links font-weight-bold" style="font-size: 1vw;">
                        <a class="text-white" href="#">Home</a>
                        |
                        <a class="text-white" href="#">Blog</a>
                        |
                        <a class="text-white" href="#">About</a>
                        |
                        <a class="text-white" href="#">Contact</a>
                    </p>
                    <p class="text-light py-4 mb-4" style="font-size: 1vw;">&copy; 2020 Copyright:<a href="index.php"> Parttimejob.com</a></p>
                </div>
			</div>
			<div class="col-md-4" style="background-color: ;">
				<div class="py-2 my-4">
                    <div>
                        <p class="text-white" style="font-size: 1vw;"> <i class="fa fa-map-marker mx-2 "></i>
                                Kiel 24116,
                            Germany.</p>
                    </div>

                    <div> 
                        <p><i class="fa fa-phone  mx-2 " style="font-size: 1vw;"></i> +49 176 4596 2197</p>
                    </div>
                    <div>
                        <p><i class="fa fa-envelope  mx-2" style="font-size: 1vw;"></i><a href="mailto:support@parttimejob.com">support@parttimejob.com</a></p>
                    </div>  
                </div>
			</div>
			<div class="col-md-4" style="background-color: ;">
				<span class=" font-weight-bold " style="font-size: 1.5vw;">About the Company</span>
					<p class="text-warning my-2"  style="font-size: 1vw;">We offer Part time job for students and for adults.</p>
                    <div class="py-2" style="font-size: 1vw;">
                        <a href="#"><i class="fa fa-facebook-official fa-2x text-info mx-3"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-2x text-danger mx-3"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x text-info mx-3"></i></a>
                        <a href="#"><i class="fa fa-youtube fa-2x text-danger mx-3"></i></a>
                    </div>
			</div>

		</div>

	</div>

</body>
</html>