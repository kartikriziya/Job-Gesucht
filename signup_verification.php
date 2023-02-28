<div class="col-sm-8 col-md-6 col-lg-4" id="signup_verification" style="display: none;">
	<p id="verification_error"></p>
	<p id="verification_otp_timer">
		OTP ist nur gültig für <b id="verification_otp_time"></b>
	</p>
	<div class="form-group">
		<input type="text" class="form-control" name="signup_otp" id="signup_otp" placeholder="Geben Sie OTP ein">
	</div>
	<div class="form-group">
		<label id="send_otp_againbtn" style="display: none;"  onclick="send_again_otp();">OTP erneut senden ?</label>
		<label id="send_otp_againbtn" class="expire_send_otp_againbtn" style="display: none;"  onclick="expire_send_otp_againbtn();">OTP erneut senden ?</label>
	</div>
	<div class="form-group">
		<button type="button" class="btn btn-warning btn-block" id="verify_otpbtn" onclick="verify_otp();">Überprüfen OTP</button>
	</div>
</div>


<script type="text/javascript">

	//Enter key work as verify_otp button --------------------------------------------------------------------
					
		var signup_otp = document.getElementById("signup_otp");
			signup_otp.addEventListener("keyup", function(event) {
			  if (event.keyCode === 13) {
			   event.preventDefault();
			   document.getElementById("verify_otpbtn").click();
			  }
			});

	//Verify OTP ----------------------------------------------------------------------------------------------	
					function verify_otp()
					{
						var verify_otp = "Verify_signup_OTP";
						var email=$('#signup_email').val();
						var user_otp=$('#signup_otp').val();
							//alert("true");
							$.ajax({
								url:'verify_otp_php.php',
								type:'post',
								data:'email='+email+'&user_otp='+user_otp+'&verify_otp='+verify_otp,
								beforeSend: function(){
		                        	$('#overlay').fadeIn(100);
		                        	$('.navbar').removeClass("sticky-top");
		                        },
		                        complete: function(){
		                        	$('#overlay').fadeOut(1000);
		                        	$('.navbar').addClass("sticky-top");
		                        },
								success:function(result){
									if(result == "Correct_OTP")
									{
										$('#signup_password').css("display","block");
										$('#signup_verification').css("display","none");
									}
									else if(result == "No_OTP")
									{
										$('.expire_send_otp_againbtn').css("display","block");
										//Red Error Icon
										$('#signup_otp').addClass("valdation_error_border");

										//Invalid signup_OTP 
										$('#verification_error').css("display","block");
										$('#verification_error').text("Bitte geben Sie Valid OTP ein oder klicken Sie auf 'OTP erneut senden'.");
									}
									else
									{
										$('.expire_send_otp_againbtn').css("display","none");
										$('#send_otp_againbtn').css("display","block");
										//Red Error Icon
										$('#signup_otp').addClass("valdation_error_border");

										//Invalid signup_OTP 
										$('#verification_error').css("display","block");
										$('#verification_error').text("Bitte geben Sie Valid OTP ein oder klicken Sie auf 'OTP erneut senden'.");
									}
								}
							});
					}
					$('#signup_otp').keyup(function(){

						$('#verification_error').css("display","none");
						$('#signup_otp').removeClass("valdation_error_border");
						$('#send_otp_againbtn').css("display","none");

					});
	//Send OTP Again ----------------------------------------------------------------------------------------------	
					function send_again_otp()
					{
						var send_otp_again = "Create_OTP_Again";

						var email=$('#signup_email').val();

						$('#verification_error').css("display","none");
						$('#signup_otp').val('');
						$('#signup_otp').removeClass("valdation_error_border");
						$('#signup_otp').focus();

							$.ajax({
								url:'send_otp_php.php',
								type:'post',
								data:'email='+email+'&send_otp='+send_otp_again,
								beforeSend: function(){
		                        	$('#overlay').fadeIn(100);
		                        	$('.navbar').removeClass("sticky-top");
		                        },
		                        complete: function(){
		                        	$('#overlay').fadeOut(1000);
		                        	$('.navbar').addClass("sticky-top");
		                        },
								success:function(result){
									$('#send_otp_againbtn').css("display","none");
									$('#verify_otpbtn').css("display","block");

										otp_timer();
								}
							});
					}

					function expire_send_otp_againbtn()
					{
						var expire_send_otp_again = "Expire_Create_OTP_Again";

						var email=$('#signup_email').val();

						$('#verification_error').css("display","none");
						$('#signup_otp').val('');
						$('#signup_otp').focus();

							$.ajax({
								url:'send_otp_php.php',
								type:'post',
								data:'email='+email+'&send_otp='+expire_send_otp_again,
								beforeSend: function(){
		                        	$('#overlay').fadeIn(100);
		                        	$('.navbar').removeClass("sticky-top");
		                        },
		                        complete: function(){
		                        	$('#overlay').fadeOut(1000);
		                        	$('.navbar').addClass("sticky-top");
		                        },
								success:function(result){
									$('.expire_send_otp_againbtn').css("display","none");
									$('#verification_otp_timer').css("display","block");
									$('#verify_otpbtn').css("display","block");
									
										otp_timer();
								}
							});
					}

</script>