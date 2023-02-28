<div class="col-sm-8 col-md-6 col-lg-4" id="signup_password" style="display: none;">
	<p id="password_error"></p>
	<div class="form-group">
		<input type="password" class="form-control" name="signup_password1" id="signup_password1" placeholder="Neues Passwort">
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="signup_password2" id="signup_password2" placeholder="Passwort bestätigen">
	</div>
	<div class="form-group">
		 <input type="checkbox" aria-label="Show Password" id="show_password">
		 <label class="form-check-label" for="show_password" id="show_password_label">Passwort anzeigen</label>
	</div>
	<div class="form-group">
		<button type="button" class="btn btn-danger btn-block" id="create_passwordbtn" onclick="create_password();">Signup</button>
	</div>
</div>

<script type="text/javascript">

	//Enter key work as signup(create_password) button --------------------------------------------------------------------
					
		var signup_password = document.getElementById("signup_password2");
			signup_password.addEventListener("keyup", function(event) {
			  if (event.keyCode === 13) {
			   event.preventDefault();
			   document.getElementById("create_passwordbtn").click();
			  }
			});

	//Create Password & Sign-up  --------------------------------------------------------------------------------	

					function create_password()
					{
						var email=$('#signup_email').val();
						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();

						if($("#arbeitnehmer_buttontag").is(':checked'))
						{
							var nehmer_geber = $("#arbeitnehmer_buttontag").val();
						}
						else
						{
							var nehmer_geber = $("#arbeitgeber_buttontag").val();
						}

						if (signup_password1.length>=8 || signup_password2.length>=8) 
						{

							if (signup_password1 == signup_password2) 
							{

								$.ajax({
									url:'create_password_php.php',
									type:'post',
									data:'email='+email+'&nehmer_geber='+nehmer_geber+'&password='+signup_password1,
									beforeSend: function(){
			                        	$('#overlay').fadeIn(100);
			                        	$('.navbar').removeClass("sticky-top");
			                        },
			                        complete: function(){
			                        	$('#overlay').fadeOut(1000);
			                        	$('.navbar').addClass("sticky-top");
			                        },
									success:function(result){

										if(result == 'Benutzer_registriert')
										{
											Swal.fire({
											  icon: 'success',
											  title: 'Willkommen bei Job-Gesucht.com',
											  text: 'Wir hoffen, dass Sie den Job bekommen, nach dem Sie suchen werden.',
											  showCloseButton: true,
											  showConfirmButton: true,
											}).then((result) => {
											  if (result.value) {
													window.location.href="login.php";
											  }
											  else
											  {
											  		window.location.href="login.php";
											  }
											})
										}
										else
										{
											window.location.href='signup.php';
										}
									}
								});
							}
							else
							{
								//Red Error
								$('#signup_password1').addClass("valdation_error_border");
								$('#signup_password2').addClass("valdation_error_border");

								//Password doesn't match 
								$('#password_error').css("display","block");
								$('#password_error').text("Passwort stimmt nicht überein: Bitte geben Sie dasselbe Passwort in beide Felder ein");
								
							}
						}
						else
						{
							//Invalid Email 
							$('#password_error').css("display","block");
							$('#password_error').text("Passwort erstellen: mindestens 8 Zeichen");
							if(signup_password1.length<signup_password2.length || signup_password1=='' || signup_password2=='') 
							{
								$('#signup_password1').focus();
							}
							else
							{
								$('#signup_password2').focus();
							}

						}
					}
					$('#signup_password2').keyup(function(){

						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();
						$('#signup_password1').removeClass("valdation_error_border");
						$('#signup_password2').removeClass("valdation_error_border");
						$('#password_error').css("display","none");

							if (signup_password1 == signup_password2 && signup_password1!='' && signup_password2!='') {
							
								$('#password_error').css("display","none");
							}
					});	
					$('#signup_password1').keyup(function(){

						var signup_password1=$('#signup_password1').val();
						var signup_password2=$('#signup_password2').val();
						$('#signup_password1').removeClass("valdation_error_border");
						$('#signup_password2').removeClass("valdation_error_border");
						$('#password_error').css("display","none");

							if (signup_password1 == signup_password2 && signup_password1!='' && signup_password2!='') {
							
								$('#password_error').css("display","none");
							}
					});
					$('#show_password').change(function()
				    {
				      if ($(this).is(':checked')) {
				          $('#signup_password1').attr('type', 'text');
				          $('#signup_password2').attr('type', 'text');
				      }
				      else
				      {
				      	$('#signup_password1').attr('type', 'password');
				      	$('#signup_password2').attr('type', 'password');
				      }
				    });

</script>