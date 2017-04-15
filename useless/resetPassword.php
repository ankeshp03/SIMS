<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="theme-color" content="#7e57c3">
	<meta http-equiv="Cache-control" content="public">
	<title>Reset Password | SIMS</title>

	<!-- Icons -->

	<link href="<?php echo base_url()?>assets/css/icon.css" type="text/css" rel="stylesheet">

	<!-- Favicons-->

	<link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon-32x32.png" sizes="32x32">

	<!-- Favicons-->

	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/favicon/apple-touch-icon-152x152.png">

	<!-- For iPhone -->

	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/mstile-144x144.png">

	<!-- For Windows Phone -->


	<!-- CORE CSS-->

	<link href="<?php echo base_url()?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="<?php echo base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">

	<style type="text/css">
		html,
		body {
			height: 100%;
		}

		html {
			display: table;
			margin: auto;
		}

		body {
			display: table-cell;
			vertical-align: middle;
		}

	</style>

</head>

<body class="deep-purple lighten-1">
	<div id="unsuccessfulMessage" class="col s12 z-depth-1 center card-panel translucent" style="color: white; display: none; word-wrap: break-word; max-width: 303px;"></div>
	<!-- Start Page Loading -->
	<div id="loader-wrapper">
		<div id="loader"></div>        
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->

	<div id="login-page" class="row">
		<div class="col s12 z-depth-3 card-panel translucent">
			<form id="resetPasswordForm" class="login-form" method="post">
				<div class="row">
					<div class="input-field col s12 center">
						<img src="<?php echo base_url()?>assets/images/user-icon.png" alt="" class="circle responsive-img valign profile-image-login">
						<p class="center login-form-text white-text flow-text">Reset Password</p>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="material-icons prefix">lock_outline</i>
						<input id="password" name="password" type="password" class="white-text flow-text" autocomplete="off" required>
						<label for="password" class="white-text flow-text">password</label>
					</div>
				</div>
				<div class="row margin">
					<div class="input-field col s12">
						<i class="material-icons md-24 prefix">lock_outline</i>
						<input id="confirmPassword" name="confirmPassword" type="password" class="white-text flow-text" required="true" autocomplete="off">
						<label for="confirmPassword" class="white-text flow-text">confirm password</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<button type="submit" class="btn translucent waves-effect col s12">Submit</button>
						<input type="hidden" id="key" name="key" value="<?= $key?>">
					</div>
				</div>
			</form>
		</div>
	</div>

  <!-- ================================================
  Scripts
  ================================================ -->

  <!-- jQuery Library -->
  <!--script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js" ></script-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/ajax.jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js" async></script>
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins.js" async></script>

  <script type="text/javascript">

  	$(document).ready( function() {

  		$("#confirmPassword, #password").keyup(function() {
  			var password = $("#password").val();
  			var confirmPassword = $("#confirmPassword").val();
  			if (password != confirmPassword && confirmPassword) {
  				$("#confirmPassword").removeClass("valid");
  				$("#confirmPassword").addClass("invalid");
  				$("#confirmPassword").each(function() {this.setCustomValidity('')});
  			}
  			else if(!confirmPassword)
  			{
  				$("#confirmPassword").removeClass("invalid");
  				$("#confirmPassword").removeClass("valid");
  				$("#confirmPassword").each(function() {this.setCustomValidity('')});
  			}
  			else
  			{
  				$("#confirmPassword").removeClass("invalid");
  				$("#confirmPassword").addClass("valid");
  				$("#confirmPassword").each(function() {this.setCustomValidity('')});
  			}
  		});

  		$('#resetPasswordForm').on('submit', function(value) {

  			value.preventDefault();

  			if($("#confirmPassword").hasClass('invalid')) {
  				$("#confirmPassword").each(function() {this.setCustomValidity('Password mismatch')});
  			}
  			else {
  				$.ajax({
  					url: '<?php echo base_url("loginController/setPassword");?>',
  					type: 'POST',
  					data: {
  						password: $('#password').val(),
  						key: $('#key').val()
  					},
  					success:function(data) {

  						if(data == 'invalid') {
  							$('#unsuccessfulMessage').html(data);
  							$('#unsuccessfulMessage').show('blind');
  							$('#unsuccessfulMessage').delay(3000).hide('blind');     
  						}
  						else if(data == 'valid'){
  							document.location.href = '<?php echo base_url("loginController");?>';
  						}
  					}
  				});
  			}
  		});
  	});
  </script>
</body>
</html>