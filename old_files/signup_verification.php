<div class="col-sm-8 col-md-6 col-lg-4" id="signup_verification" style="display: none;">
	<div class="form-group">
		<input type="text" class="form-control" name="signup_otp" id="signup_otp" placeholder="Enter OTP">
	</div>
	<div class="form-group">
		<label id="send_otp_againbtn" style="display: none;"  onclick="send_again_otp();">Send OTP Again ?</label>
	</div>
	<div class="form-group">
		<button type="button" class="btn btn-warning btn-block" id="verify_otpbtn" onclick="verify_otp();">Verify OTP</button>
	</div>
</div>