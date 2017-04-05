<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "1") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | Admin SIMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		.header {
			height: 300px;
			position: relative;
			
		}
		.line {
			height: 300px;
			width: 65%;
			margin-left: -110px;
			-webkit-transform: skew(145deg);
			-moz-transform: skew(145deg);
			-o-transform: skew(145deg);
		}
		.helloText, .adminText {
			padding-left: 10%;
			color: rgba(255, 255, 255, 0.7);
			font-family: courier;
			text-shadow: black 10px 10px 0.2em;
			font-size: 100px;
			-ms-transform: skew(-145deg); /* IE 9 */
			-webkit-transform: skew(-145deg); /* Safari */
			transform: skew(-145deg);
		}
		.adminText {
			padding-left: 55%;
		}
		.navDiv {
			width: 50.5%;
			float: right;
			margin-top: -65px;
		}
	</style>
</head>
<body>
	<!--contents of the dropdown menu-->
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="#!">Profile</a></li>
		<li class="divider"></li>
		<li><a href="<?php echo base_url('loginController/logout')?>">Logout</a></li>
	</ul>

	<div class="header z-depth-2 teal darken-4 hide-on-med-and-down">
		<div class="line z-depth-2">
			<div class="helloText">
				HELLO
			</div>
			<div class="adminText">
				ADMIN
			</div>
		</div>
		<div class="navDiv">
			<nav class="transparent z-depth-0">
				<div class="nav-wrapper">
					<ul class="right hide-on-med-and-down">
						<li><a href="<?php echo base_url('adminController')?>">Home</a></li>
						<li><a href="<?php echo base_url('adminController/studentRegistration')?>">Student Admission</a></li>
						<li><a href="<?php echo base_url('adminController/facultyRegistration')?>">Faculty Registration</a></li>
						<li><a class="waves-effect waves-light dropdown-button" data-activates="dropdown1" data-beloworigin="true"><?php echo $this->session->userdata('username'); ?> <i class="material-icons right">arrow_drop_down</i></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<nav class="teal darken-4 hide-on-large-only">
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo" style="color: rgba(255, 255, 255, 0.9);">ADMIN PANEL</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="sass.html">Sass</a></li>
				<li><a href="badges.html">Components</a></li>
				<li><a href="collapsible.html">Javascript</a></li>
				<li><a href="mobile.html">Mobile</a></li>
			</ul>
		</div>
	</nav>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
</body>
</html>