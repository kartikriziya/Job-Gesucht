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
				<div class="col-md-4" style="">
					<div class="row">
						
						<?php

							$email = $_SESSION['user_email'];

							$select_user_profile = "SELECT * FROM user_profile WHERE email='".$email."'";
							$selected_user_profile = mysqli_query($conn,$select_user_profile);
							if($row=mysqli_fetch_array($selected_user_profile))
							{
								if($row['user_img'] == '')
								{
									$user_img = "user.png";
								}
								else
								{
									$user_img = $row['user_img'];
								}
								$first_name = $row['first_name'];
								$last_name = $row['last_name'];
								$day = $row['day'];
								$month = $row['month'];
								$year = $row['year'];
								$code = $row['country_code'];
								$phone = $row['phone_number'];
								$street_name = $row['street_name'];
								$house_number = $row['house_number'];
								$pincode = $row['pincode'];
								$city = $row['city'];
								$country = $row['country'];
							}
						?>

						<div class="col-12" style="display: block; text-align: center;">
							<img src="User_Profile_img/<?php echo($user_img); ?>" class="rounded"
	            			salt="avatar image" id="user_img" style="">
						</div>
						<div class="col-12" style="display: block; text-align: center;">
							<h4 id="user_name" style=""><?php echo($first_name); ?></h4>
						</div>
					</div>
					<div style="height: 0; margin: .3rem 0; overflow: hidden; border-top: 2px solid #1b5e20;"></div>
					<div class="row" id="profile_detail_row"  style="background-color: #4caf50; color: white;" onclick="location.href='user_profile.php'">
						<div class="col-sm-12" id="profile_details">
							<h5><i class="fa fa-id-card" aria-hidden="true" id="user_icons"></i>Info</h5>
						</div>
					</div>
					<?php
							if($_SESSION['user_type'] == "Arbeitnehmer")
							{

					?>
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_qualification.php'">
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
								<div class="row" id="profile_detail_row" style="" onclick="location.href='user_edit_delete_jobs.php'">
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
					<form method="POST" action="user_profile_php.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-1">
							</div>
							<div class="col-md-10">
								<div class="custom-file mb-3">
							      <input type="file" class="custom-file-input" id="customFile" name="user_img">
							      <label class="custom-file-label" for="customFile" id="changeprofile" style="background-color: #c8e6c9;">
							      	<?php 
							      		if($user_img != '')
							      		{
							      			echo($user_img);
							      		}
							      		else
							      		{
							      			echo("Profilbild Ändern");
							      		}
							        ?>		
							      </label>
							    </div>
							    <script>
								// Add the following code if you want the name of the file appear on select
								$(".custom-file-input").on("change", function() {
								  var fileName = $(this).val().split("\\").pop();
								  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
								});
								</script>
							</div>
							<div class="col-md-1">
							</div>
						</div>
						<div class="row" style="margin-bottom: .9rem;">
							<div class="col-md-1"></div>
							<div class="col-sm-6 col-md-5">
									<input type="text" class="form-control" name="first_name" id="user_first-name" placeholder="Vorname" value="<?php echo($first_name); ?>">
							</div>
							<div class="col-sm-6 col-md-5 mt-1">
								<input type="text" class="form-control" name="last_name" id="user_last-name" placeholder="Nachname" value="<?php echo($last_name); ?>">
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 2rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="input-group user_dob">
									<div class="input-group-prepend">
										<span class="input-group-text" id="dob_span">Geb</span>
									</div>
									<select class="form-control custom-select" name="day" id="day" data-size="5">
								      <option selected hidden>
								      	<?php 
								      		if($day != '')
								      		{
								      			echo($day);
								      		}
								      		else
								      		{
								      			echo("Tag");
								      		}
								        ?>	
								      </option>
								      <option>1</option>
								      <option>2</option>
								      <option>3</option>
								      <option>4</option>
								      <option>5</option>
								      <option>6</option>
								      <option>7</option>
								      <option>8</option>
								      <option>9</option>
								      <option>10</option>
								      <option>11</option>
								      <option>12</option>
								      <option>13</option>
								      <option>14</option>
								      <option>15</option>
								      <option>16</option>
								      <option>17</option>
								      <option>18</option>
								      <option>19</option>
								      <option>20</option>
								      <option>21</option>
								      <option>22</option>
								      <option>23</option>
								      <option>24</option>
								      <option>25</option>
								      <option>26</option>
								      <option>27</option>
								      <option>28</option>
								      <option>29</option>
								      <option>30</option>
								      <option>31</option>
								    </select>
								    <select class="form-control custom-select" name="month" id="month">
								      <option selected hidden>
								      	<?php 
								      		if($month != '')
								      		{
								      			echo($month);
								      		}
								      		else
								      		{
								      			echo("Monat");
								      		}
								        ?>	
								      </option>
								      <option>Januar</option>
								      <option>Februar</option>
								      <option>März</option>
								      <option>April</option>
								      <option>Mai</option>
								      <option>Juni</option>
								      <option>Juli</option>
								      <option>August</option>
								      <option>September</option>
								      <option>Oktober</option>
								      <option>November</option>
								      <option>Dezember</option>
								    </select>
									<input type="text" class="form-control" name="year" id="year" placeholder="Jahr" value="<?php echo($year); ?>">
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: .9rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<input type="text" class="form-control" name="email" id="user_email" placeholder="Email" value="<?php echo($_SESSION['user_email']); ?>" disabled>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 2rem;">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="phone_icon" style="background-color: #c8e6c9; color: black; font-weight: bold;">
											<i class="fa fa-phone fa-lg" aria-hidden="true"></i>
										</span>
									</div>
									<!--<select class="form-control custom-select" name="code" id="country_code">
									      <option selected hidden>
									      	<?php 
									      		if($code != '')
									      		{
									      			echo($code);
									      		}
									      		else
									      		{
									      			echo("+49");
									      		}
									        ?>	
									      </option>
									      <option>+49</option>
									      <option>+91</option>
								    </select>-->
									    <select class="form-control custom-select" name="code" id="country_code">
											<option selected hidden>
										      	<?php 
										      		if($code != '')
										      		{
										      			echo($code);
										      		}
										      		else
										      		{
										      			echo("Germany (+49)");
										      		}
										        ?>	
										      </option>
												<option class="get_country" id="Algeria" data-countryCode="DZ" value="+213">Algeria (+213)</option>
												<option class="get_country" id="Andorra" data-countryCode="AD" value="+376">Andorra (+376)</option>
												<option class="get_country" id="Angola" data-countryCode="AO" value="+244">Angola (+244)</option>
												<option class="get_country" id="Anguilla" data-countryCode="AI" value="+1264">Anguilla (+1264)</option>
												<option class="get_country" id="Antigua" data-countryCode="AG" value="+1268">Antigua &amp; Barbuda (+1268)</option>
												<option class="get_country" id="Argentina" data-countryCode="AR" value="+54">Argentina (+54)</option>
												<option class="get_country" id="Armenia" data-countryCode="AM" value="+374">Armenia (+374)</option>
												<option class="get_country" id="Aruba" data-countryCode="AW" value="+297">Aruba (+297)</option>
												<option class="get_country" id="Australia" data-countryCode="AU" value="+61">Australia (+61)</option>
												<option class="get_country" id="Austria" data-countryCode="AT" value="+43">Austria (+43)</option>
												<option class="get_country" id="Azerbaijan" data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>
												<option class="get_country" id="Bahamas" data-countryCode="BS" value="+1242">Bahamas (+1242)</option>
												<option class="get_country" id="Bangladesh" data-countryCode="BD" value="+880">Bangladesh (+880)</option>
												<option class="get_country" id="Barbados" data-countryCode="BB" value="+1246">Barbados (+1246)</option>
												<option class="get_country" id="Belarus" data-countryCode="BY" value="+375">Belarus (+375)</option>
												<option class="get_country" id="Belgium" data-countryCode="BE" value="+32">Belgium (+32)</option>
												<option class="get_country" id="Belize" data-countryCode="BZ" value="+501">Belize (+501)</option>
												<option class="get_country" id="Benin" data-countryCode="BJ" value="+229">Benin (+229)</option>
												<option class="get_country" id="Bermuda" data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
												<option class="get_country" id="Bhutan" data-countryCode="BT" value="+975">Bhutan (+975)</option>
												<option class="get_country" id="Bolivia" data-countryCode="BO" value="+591">Bolivia (+591)</option>
												<option class="get_country" id="Bosnia Herzegovina" data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>
												<option class="get_country" id="Botswana" data-countryCode="BW" value="+267">Botswana (+267)</option>
												<option class="get_country" id="Brazil" data-countryCode="BR" value="+55">Brazil (+55)</option>
												<option class="get_country" id="Brunei" data-countryCode="BN" value="+673">Brunei (+673)</option>
												<option class="get_country" id="Bulgaria" data-countryCode="BG" value="+359">Bulgaria (+359)</option>
												<option class="get_country" id="Burkina Faso" data-countryCode="BF" value="+226">Burkina Faso (+226)</option>
												<option class="get_country" id="Burundi" data-countryCode="BI" value="+257">Burundi (+257)</option>
												<option class="get_country" id="Cambodia" data-countryCode="KH" value="+855">Cambodia (+855)</option>
												<option class="get_country" id="Cameroon" data-countryCode="CM" value="+237">Cameroon (+237)</option>
												<option class="get_country" id="Canada" data-countryCode="CA" value="+1">Canada (+1)</option>
												<option class="get_country" id="Cape Verde Islands" data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
												<option class="get_country" id="Cayman Islands" data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
												<option class="get_country" id="Central African Republic" data-countryCode="CF" value="+236">Central African Republic (+236)</option>
												<option class="get_country" id="Chile" data-countryCode="CL" value="+56">Chile (+56)</option>
												<option class="get_country" id="China" data-countryCode="CN" value="+86">China (+86)</option>
												<option class="get_country" id="Colombia" data-countryCode="CO" value="+57">Colombia (+57)</option>
												<option class="get_country" id="Comoros" data-countryCode="KM" value="+269">Comoros (+269)</option>
												<option class="get_country" id="Congo" data-countryCode="CG" value="+242">Congo (+242)</option>
												<option class="get_country" id="Cook Islands" data-countryCode="CK" value="+682">Cook Islands (+682)</option>
												<option class="get_country" id="Costa Rica" data-countryCode="CR" value="+506">Costa Rica (+506)</option>
												<option class="get_country" id="Croatia" data-countryCode="HR" value="+385">Croatia (+385)</option>
												<option class="get_country" id="Cuba" data-countryCode="CU" value="+53">Cuba (+53)</option>
												<option class="get_country" id="Cyprus North" data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>
												<option class="get_country" id="Cyprus South" data-countryCode="CY" value="+357">Cyprus South (+357)</option>
												<option class="get_country" id="Czech Republic" data-countryCode="CZ" value="+42">Czech Republic (+42)</option>
												<option class="get_country" id="Denmark" data-countryCode="DK" value="+45">Denmark (+45)</option>
												<option class="get_country" id="Djibouti" data-countryCode="DJ" value="+253">Djibouti (+253)</option>
												<option class="get_country" id="Dominica" data-countryCode="DM" value="+1809">Dominica (+1809)</option>
												<option class="get_country" id="Dominican Republic" data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>
												<option class="get_country" id="Ecuador" data-countryCode="EC" value="+593">Ecuador (+593)</option>
												<option class="get_country" id="Egypt" data-countryCode="EG" value="+20">Egypt (+20)</option>
												<option class="get_country" id="El Salvador" data-countryCode="SV" value="+503">El Salvador (+503)</option>
												<option class="get_country" id="Equatorial Guinea" data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>
												<option class="get_country" id="Eritrea" data-countryCode="ER" value="+291">Eritrea (+291)</option>
												<option class="get_country" id="Estonia" data-countryCode="EE" value="+372">Estonia (+372)</option>
												<option class="get_country" id="Ethiopia" data-countryCode="ET" value="+251">Ethiopia (+251)</option>
												<option class="get_country" id="Falkland Islands" data-countryCode="FK" value="+500">Falkland Islands (+500)</option>
												<option class="get_country" id="Faroe Islands" data-countryCode="FO" value="+298">Faroe Islands (+298)</option>
												<option class="get_country" id="Fiji" data-countryCode="FJ" value="+679">Fiji (+679)</option>
												<option class="get_country" id="Finland" data-countryCode="FI" value="+358">Finland (+358)</option>
												<option class="get_country" id="France" data-countryCode="FR" value="+33">France (+33)</option>
												<option class="get_country" id="French Guiana" data-countryCode="GF" value="+594">French Guiana (+594)</option>
												<option class="get_country" id="French Polynesia" data-countryCode="PF" value="+689">French Polynesia (+689)</option>
												<option class="get_country" id="Gabon" data-countryCode="GA" value="+241">Gabon (+241)</option>
												<option class="get_country" id="Gambia" data-countryCode="GM" value="+220">Gambia (+220)</option>
												<option class="get_country" id="Georgia" data-countryCode="GE" value="+7880">Georgia (+7880)</option>
												<option class="get_country" id="Germany" data-countryCode="DE" value="+49">Germany (+49)</option>
												<option class="get_country" id="Ghana" data-countryCode="GH" value="+233">Ghana (+233)</option>
												<option class="get_country" id="Gibraltar" data-countryCode="GI" value="+350">Gibraltar (+350)</option>
												<option class="get_country" id="Greece" data-countryCode="GR" value="+30">Greece (+30)</option>
												<option class="get_country" id="Greenland" data-countryCode="GL" value="+299">Greenland (+299)</option>
												<option class="get_country" id="Grenada" data-countryCode="GD" value="+1473">Grenada (+1473)</option>
												<option class="get_country" id="Guadeloupe" data-countryCode="GP" value="+590">Guadeloupe (+590)</option>
												<option class="get_country" id="Guam" data-countryCode="GU" value="+671">Guam (+671)</option>
												<option class="get_country" id="Guatemala" data-countryCode="GT" value="+502">Guatemala (+502)</option>
												<option class="get_country" id="Guinea" data-countryCode="GN" value="+224">Guinea (+224)</option>
												<option class="get_country" id="Guinea - Bissau" data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>
												<option class="get_country" id="Guyana" data-countryCode="GY" value="+592">Guyana (+592)</option>
												<option class="get_country" id="Haiti" data-countryCode="HT" value="+509">Haiti (+509)</option>
												<option class="get_country" id="Honduras" data-countryCode="HN" value="+504">Honduras (+504)</option>
												<option class="get_country" id="Hong Kong" data-countryCode="HK" value="+852">Hong Kong (+852)</option>
												<option class="get_country" id="Hungary" data-countryCode="HU" value="+36">Hungary (+36)</option>
												<option class="get_country" id="Iceland" data-countryCode="IS" value="+354">Iceland (+354)</option>
												<option class="get_country" id="India" data-countryCode="IN" value="+91">India (+91)</option>
												<option class="get_country" id="Indonesia" data-countryCode="ID" value="+62">Indonesia (+62)</option>
												<option class="get_country" id="Iran" data-countryCode="IR" value="+98">Iran (+98)</option>
												<option class="get_country" id="Iraq" data-countryCode="IQ" value="+964">Iraq (+964)</option>
												<option class="get_country" id="Ireland" data-countryCode="IE" value="+353">Ireland (+353)</option>
												<option class="get_country" id="Israel" data-countryCode="IL" value="+972">Israel (+972)</option>
												<option class="get_country" id="Italy" data-countryCode="IT" value="+39">Italy (+39)</option>
												<option class="get_country" id="Jamaica" data-countryCode="JM" value="+1876">Jamaica (+1876)</option>
												<option class="get_country" id="Japan" data-countryCode="JP" value="+81">Japan (+81)</option>
												<option class="get_country" id="Jordan" data-countryCode="JO" value="+962">Jordan (+962)</option>
												<option class="get_country" id="Kazakhstan" data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>
												<option class="get_country" id="Kenya" data-countryCode="KE" value="+254">Kenya (+254)</option>
												<option class="get_country" id="Kiribati" data-countryCode="KI" value="+686">Kiribati (+686)</option>
												<option class="get_country" id="Korea North" data-countryCode="KP" value="+850">Korea North (+850)</option>
												<option class="get_country" id="Korea South" data-countryCode="KR" value="+82">Korea South (+82)</option>
												<option class="get_country" id="Kuwait" data-countryCode="KW" value="+965">Kuwait (+965)</option>
												<option class="get_country" id="Kyrgyzstan" data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>
												<option class="get_country" id="Laos" data-countryCode="LA" value="+856">Laos (+856)</option>
												<option class="get_country" id="Latvia" data-countryCode="LV" value="+371">Latvia (+371)</option>
												<option class="get_country" id="Lebanon" data-countryCode="LB" value="+961">Lebanon (+961)</option>
												<option class="get_country" id="Lesotho" data-countryCode="LS" value="+266">Lesotho (+266)</option>
												<option class="get_country" id="Liberia" data-countryCode="LR" value="+231">Liberia (+231)</option>
												<option class="get_country" id="Libya" data-countryCode="LY" value="+218">Libya (+218)</option>
												<option class="get_country" id="Liechtenstein" data-countryCode="LI" value="+417">Liechtenstein (+417)</option>
												<option class="get_country" id="Lithuania" data-countryCode="LT" value="+370">Lithuania (+370)</option>
												<option class="get_country" id="Luxembourg" data-countryCode="LU" value="+352">Luxembourg (+352)</option>
												<option class="get_country" id="Macao" data-countryCode="MO" value="+853">Macao (+853)</option>
												<option class="get_country" id="Macedonia" data-countryCode="MK" value="+389">Macedonia (+389)</option>
												<option class="get_country" id="Madagascar" data-countryCode="MG" value="+261">Madagascar (+261)</option>
												<option class="get_country" id="Malawi" data-countryCode="MW" value="+265">Malawi (+265)</option>
												<option class="get_country" id="Malaysia" data-countryCode="MY" value="+60">Malaysia (+60)</option>
												<option class="get_country" id="Maldives" data-countryCode="MV" value="+960">Maldives (+960)</option>
												<option class="get_country" id="Mali" data-countryCode="ML" value="+223">Mali (+223)</option>
												<option class="get_country" id="Malta" data-countryCode="MT" value="+356">Malta (+356)</option>
												<option class="get_country" id="Marshall Islands" data-countryCode="MH" value="+692">Marshall Islands (+692)</option>
												<option class="get_country" id="Martinique" data-countryCode="MQ" value="+596">Martinique (+596)</option>
												<option class="get_country" id="Mauritania" data-countryCode="MR" value="+222">Mauritania (+222)</option>
												<option class="get_country" id="Mayotte" data-countryCode="YT" value="+269">Mayotte (+269)</option>
												<option class="get_country" id="Mexico" data-countryCode="MX" value="+52">Mexico (+52)</option>
												<option class="get_country" id="Micronesia" data-countryCode="FM" value="+691">Micronesia (+691)</option>
												<option class="get_country" id="Moldova" data-countryCode="MD" value="+373">Moldova (+373)</option>
												<option class="get_country" id="Monaco" data-countryCode="MC" value="+377">Monaco (+377)</option>
												<option class="get_country" id="Mongolia" data-countryCode="MN" value="+976">Mongolia (+976)</option>
												<option class="get_country" id="Montserrat" data-countryCode="MS" value="+1664">Montserrat (+1664)</option>
												<option class="get_country" id="Morocco" data-countryCode="MA" value="+212">Morocco (+212)</option>
												<option class="get_country" id="Mozambique" data-countryCode="MZ" value="+258">Mozambique (+258)</option>
												<option class="get_country" id="Myanmar" data-countryCode="MN" value="+95">Myanmar (+95)</option>
												<option class="get_country" id="Namibia" data-countryCode="NA" value="+264">Namibia (+264)</option>
												<option class="get_country" id="Nauru" data-countryCode="NR" value="+674">Nauru (+674)</option>
												<option class="get_country" id="Nepal" data-countryCode="NP" value="+977">Nepal (+977)</option>
												<option class="get_country" id="Netherlands" data-countryCode="NL" value="+31">Netherlands (+31)</option>
												<option class="get_country" id="New Caledonia" data-countryCode="NC" value="+687">New Caledonia (+687)</option>
												<option class="get_country" id="New Zealand" data-countryCode="NZ" value="+64">New Zealand (+64)</option>
												<option class="get_country" id="Nicaragua" data-countryCode="NI" value="+505">Nicaragua (+505)</option>
												<option class="get_country" id="Niger" data-countryCode="NE" value="+227">Niger (+227)</option>
												<option class="get_country" id="Nigeria" data-countryCode="NG" value="+234">Nigeria (+234)</option>
												<option class="get_country" id="Niue" data-countryCode="NU" value="+683">Niue (+683)</option>
												<option class="get_country" id="Norfolk Islands" data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>
												<option class="get_country" id="Northern Marianas" data-countryCode="NP" value="+670">Northern Marianas (+670)</option>
												<option class="get_country" id="Norway" data-countryCode="NO" value="+47">Norway (+47)</option>
												<option class="get_country" id="Oman" data-countryCode="OM" value="+968">Oman (+968)</option>
												<option class="get_country" id="Palau" data-countryCode="PW" value="+680">Palau (+680)</option>
												<option class="get_country" id="Panama" data-countryCode="PA" value="+507">Panama (+507)</option>
												<option class="get_country" id="Papua New Guinea" data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>
												<option class="get_country" id="Paraguay" data-countryCode="PY" value="+595">Paraguay (+595)</option>
												<option class="get_country" id="Peru" data-countryCode="PE" value="+51">Peru (+51)</option>
												<option class="get_country" id="Philippines" data-countryCode="PH" value="+63">Philippines (+63)</option>
												<option class="get_country" id="Poland" data-countryCode="PL" value="+48">Poland (+48)</option>
												<option class="get_country" id="Portugal" data-countryCode="PT" value="+351">Portugal (+351)</option>
												<option class="get_country" id="Puerto Rico" data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>
												<option class="get_country" id="Qatar" data-countryCode="QA" value="+974">Qatar (+974)</option>
												<option class="get_country" id="Reunion" data-countryCode="RE" value="+262">Reunion (+262)</option>
												<option class="get_country" id="Romania" data-countryCode="RO" value="+40">Romania (+40)</option>
												<option class="get_country" id="Russia" data-countryCode="RU" value="+7">Russia (+7)</option>
												<option class="get_country" id="Rwanda" data-countryCode="RW" value="+250">Rwanda (+250)</option>
												<option class="get_country" id="San Marino" data-countryCode="SM" value="+378">San Marino (+378)</option>
												<option class="get_country" id="Sao Tome" data-countryCode="ST" value="+239">Sao Tome &amp; Principe (+239)</option>
												<option class="get_country" id="Saudi Arabia" data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
												<option class="get_country" id="Senegal" data-countryCode="SN" value="+221">Senegal (+221)</option>
												<option class="get_country" id="Serbia" data-countryCode="CS" value="+381">Serbia (+381)</option>
												<option class="get_country" id="Seychelles" data-countryCode="SC" value="+248">Seychelles (+248)</option>
												<option class="get_country" id="Sierra Leone" data-countryCode="SL" value="+232">Sierra Leone (+232)</option>
												<option class="get_country" id="Singapore" data-countryCode="SG" value="+65">Singapore (+65)</option>
												<option class="get_country" id="Slovak Republic" data-countryCode="SK" value="+421">Slovak Republic (+421)</option>
												<option class="get_country" id="Slovenia" data-countryCode="SI" value="+386">Slovenia (+386)</option>
												<option class="get_country" id="Solomon Islands" data-countryCode="SB" value="+677">Solomon Islands (+677)</option>
												<option class="get_country" id="Somalia" data-countryCode="SO" value="+252">Somalia (+252)</option>
												<option class="get_country" id="South Africa" data-countryCode="ZA" value="+27">South Africa (+27)</option>
												<option class="get_country" id="Spain" data-countryCode="ES" value="+34">Spain (+34)</option>
												<option class="get_country" id="Sri Lanka" data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
												<option class="get_country" id="St. Helena " data-countryCode="SH" value="+290">St. Helena (+290)</option>
												<option class="get_country" id="St. Kitts" data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>
												<option class="get_country" id="St. Lucia" data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>
												<option class="get_country" id="Sudan" data-countryCode="SD" value="+249">Sudan (+249)</option>
												<option class="get_country" id="Suriname" data-countryCode="SR" value="+597">Suriname (+597)</option>
												<option class="get_country" id="Swaziland" data-countryCode="SZ" value="+268">Swaziland (+268)</option>
												<option class="get_country" id="Sweden" data-countryCode="SE" value="+46">Sweden (+46)</option>
												<option class="get_country" id="Switzerland" data-countryCode="CH" value="+41">Switzerland (+41)</option>
												<option class="get_country" id="Syria" data-countryCode="SI" value="+963">Syria (+963)</option>
												<option class="get_country" id="Taiwan" data-countryCode="TW" value="+886">Taiwan (+886)</option>
												<option class="get_country" id="Tajikstan" data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
												<option class="get_country" id="Thailand" data-countryCode="TH" value="+66">Thailand (+66)</option>
												<option class="get_country" id="Togo" data-countryCode="TG" value="+228">Togo (+228)</option>
												<option class="get_country" id="Tonga" data-countryCode="TO" value="+676">Tonga (+676)</option>
												<option class="get_country" id="Trinidad" data-countryCode="TT" value="+1868">Trinidad &amp; Tobago (+1868)</option>
												<option class="get_country" id="Tunisia" data-countryCode="TN" value="+216">Tunisia (+216)</option>
												<option class="get_country" id="Turkey" data-countryCode="TR" value="+90">Turkey (+90)</option>
												<option class="get_country" id="Turkmenistan" data-countryCode="TM" value="+7">Turkmenistan (+7)</option>
												<option class="get_country" id="Turkmenistan" data-countryCode="TM" value="+993">Turkmenistan (+993)</option>
												<option class="get_country" id="Turks & Caicos Islands" data-countryCode="TC" value="+1649">Turks &amp; Caicos Islands (+1649)</option>
												<option class="get_country" id="Tuvalu" data-countryCode="TV" value="+688">Tuvalu (+688)</option>
												<option class="get_country" id="Uganda" data-countryCode="UG" value="+256">Uganda (+256)</option>
												<option class="get_country" id="UK" data-countryCode="GB" value="+44">UK (+44)</option>
												<option class="get_country" id="Ukraine" data-countryCode="UA" value="+380">Ukraine (+380)</option>
												<option class="get_country" id="United Arab Emirates" data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
												<option class="get_country" id="Uruguay" data-countryCode="UY" value="+598">Uruguay (+598)</option>
												<option class="get_country" id="USA" data-countryCode="US" value="+1">USA (+1)</option>
												<option class="get_country" id="Uzbekistan" data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
												<option class="get_country" id="Vanuatu" data-countryCode="VU" value="+678">Vanuatu (+678)</option>
												<option class="get_country" id="Vatican City" data-countryCode="VA" value="+379">Vatican City (+379)</option>
												<option class="get_country" id="Venezuela" data-countryCode="VE" value="+58">Venezuela (+58)</option>
												<option class="get_country" id="Vietnam" data-countryCode="VN" value="+84">Vietnam (+84)</option>
												<option class="get_country" id="Virgin Islands - British" data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>
												<option class="get_country" id="Virgin Islands - US" data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>
												<option class="get_country" id="Wallis & Futuna" data-countryCode="WF" value="+681">Wallis &amp; Futuna (+681)</option>
												<option class="get_country" id="Yemen (North)" data-countryCode="YE" value="+969">Yemen (North)(+969)</option>
												<option class="get_country" id="Yemen (South)" data-countryCode="YE" value="+967">Yemen (South)(+967)</option>
												<option class="get_country" id="Zambia" data-countryCode="ZM" value="+260">Zambia (+260)</option>
												<option class="get_country" id="Zimbabwe" data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
										</select>
									<input type="text" class="form-control" name="phone" id="user_phone" placeholder="Phone Number" value="<?php echo($phone); ?>">
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: .9rem;">
							<div class="col-md-1"></div>
							<div class="col-sm-8 col-md-7">
									<input type="text" class="form-control" name="street_name" id="user_street-name" placeholder="Straßenname" value="<?php echo($street_name); ?>">
							</div>
							<div class="col-sm-4 col-md-3 mt-1">
								<input type="text" class="form-control" name="house_number" id="user_house-number" placeholder="Hausnummer" value="<?php echo($house_number); ?>">
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row" style="margin-bottom: 3rem;">
							<div class="col-md-1"></div>
							<div class="col-sm-4 col-md-3">
									<input type="text" class="form-control" name="user_pincode" id="user_pincode" placeholder="Postleitzahl" value="<?php echo($pincode); ?>">
							</div>
							<div class="col-sm-4 col-md-3 mt-1">
								<input type="text" class="form-control" name="user_city" id="user_city" placeholder="Stadt" value="<?php echo($city); ?>">
							</div>
							<div class="col-sm-4 col-md-4 mt-1">
								<input type="text" class="form-control" name="user_country" id="user_country" placeholder="Land" value="<?php echo($country); ?>">
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-info btn-block" id="info_save" name="info_save">Speichern</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
					</form>
				</div>
			</div>
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

						
				$(".get_country").click(function(){

					var country_auto = $(this).attr('id');

					$("#user_country").val(country_auto);

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