<div class="col-sm-8 col-md-6 col-lg-4" id="signup" style="display: none;">
		<p id="send_otp_error"></p>
	<div class="form-group input-group">
		<div class="input-group-prepend">
			<span class="input-group-text" id="email_icon">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
		</div>
		<input type="text" class="form-control" name="signup_email" id="signup_email" placeholder="example@gmail.com">
	</div>
	<div class="form-group">
		<button type="button" class="btn btn-info btn-block" id="send_otpbtn" onclick="send_otp();">Erhalten Sie OTP</button>
	</div>
</div>



<script type="text/javascript">

	//Enter key work as send_otp button --------------------------------------------------------------------
					
		var signup_email = document.getElementById("signup_email");
			signup_email.addEventListener("keyup", function(event) {
			  if (event.keyCode === 13) {
			   event.preventDefault();
			   document.getElementById("send_otpbtn").click();
			  }
			});
	
	//Send OTP ----------------------------------------------------------------------------------------------	
		function send_otp()
		{
			var send_otp = "Create_OTP";
			
			var email=$('#signup_email').val();
			var gmail_validation = email.endsWith("@gmail.com");

			if (gmail_validation == true) {
				//alert("true");
				$.ajax({
					url:'send_otp_php.php',
					type:'post',
					data:'email='+email+'&send_otp='+send_otp,
					beforeSend: function(){
                    	$('#overlay').fadeIn(100);
                    	$('.navbar').removeClass("sticky-top");
                    },
                    complete: function(){
                    	$('#overlay').fadeOut(1000);
                    	$('.navbar').addClass("sticky-top");
                    },
					success:function(result){

						if (result != 'Email Already Exists!!!')
						{
							$('#signup_verification').css("display","block");
							$('#signup').css("display","none");

								otp_timer();

						}
						else
						{
							//Email Availability
							$('#send_otp_error').css("display","block");
							$('#send_otp_error').text("E-Mail ist bereits vorhanden");
						}

						
					}
				});
			}
			else
			{
				//Red Error Icon
				$('#email_icon').addClass("valdation_error_icon");
				$('#signup_email').addClass("valdation_error_border");

				//Invalid Email 
				$('#send_otp_error').css("display","block");
				$('#send_otp_error').text("Ungültige E-Mail-Adresse: example@gmail.com");

			}
		}
		$('#signup_email').keyup(function(){

			$('#email_icon').removeClass("valdation_error_icon");
			$('#signup_email').removeClass("valdation_error_border");
			
			var email=$(this).val();
			var gmail_validation = email.endsWith("@gmail.com");

			if (gmail_validation == true) 
			{
				
				$('#send_otp_error').css("display","none");
			}
		});

</script>