<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('user') != "student") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title><?php echo $this->session->userdata('usn'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
	<link href="<?php echo base_url()?>assets/css/studentViewStyle.css" type="text/css" rel="stylesheet" media="screen,projection">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		@media screen and (min-width: 991px) {
			.container {
				font-family: sans-serif;
				margin-right: 12%
			}
		}
		.collHead {
			color: white;
			font-size: 16px;
			letter-spacing: 1px;
			font-family: sans-serif;
			font-weight: lighter;
		}
		.collapsible-body {
			padding: 1%;
			padding-left: 4%;
			padding-right: 4%;

			background-color: white;
		}
		img {
			max-width: 100%;
			height: 200px !important;
			padding-bottom: 12px;
		}
		.row {
			margin-bottom: 0px !important;
		}
		th, td {
			padding: 15px 5px !important;
		}
	</style>
</head>
<body class="blue-grey lighten-5">
	<!-- Start Page Loading -->
	<div id="loader-wrapper">
		<div id="loader"></div>        
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->
	<ul id="slide-out" class="side-nav hide-on-med-and-up" style="width: 308px;">
		<li style="padding-top: 5%;"><span style="padding-left: 5%; font-size: 15px;">Profile</span></li>
		<li><div class="divider"></div></li>
		<li style="padding-top: 5%;"><a href="#" class="waves-effect blue-text text-darken-3">Profile</a></li>
		<li><a class="waves-effect grey-text text-darken-3" href="#">Time Table</a></li>
		<li class="hide-on-med-and-up"><a href="<?php echo base_url('loginController/logout')?>">Logout</a></li>
	</ul>
	<!--contents of the side navbar for small screen end-->
	<!--contents of the dropdown menu-->
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="#">Profile</a></li>
		<li><a href="#">Time Table</a></li>
		<li class="divider"></li>
		<li><a href="<?php echo base_url('loginController/logout')?>">Logout</a></li>
	</ul>
	<!--contents of the dropdown menu end-->

	<!--top navbar-->
	<div class="navbar-fixed">
		<nav class="light-blue darken-3">
			<div class="nav-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse circle hide-on-med-and-up"><i style="padding-left: 20%; font-size: 25px;" class="material-icons">menu</i></a>
				<a class="brand-logo hide-on-small-only center"><?php echo $this->session->userdata('username');?></a>
				<span style="padding-left: 5%; font-size: 20px;" class="hide-on-med-and-up"><?php echo $this->session->userdata('username');?></span>
				<ul class="right hide-on-small-only">
					<li><a class="waves-effect waves-light dropdown-button" data-activates="dropdown1" data-beloworigin="true" style="min-width: 115px;"><?php echo explode(" ", trim($this->session->userdata('username')))[0]; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
			</div>
		</nav>
	</div>
	<!--top navbar end-->
	<div class="container">
		<ul class="collapsible z-depth-2" style="letter-spacing: 0.1px;" data-collapsible="expandable">
			<li>
				<div class="collapsible-header indigo lighten-2 active">
					<span class="collHead">Personal Information</span>
				</div>
				<div class="collapsible-body">
					<div class="row">
						<div class="s12 hide-on-med-and-up center">
							<img src="<?php echo base_url()?>assets/images/students/<?php echo $this->session->userdata('usn');?>.jpg" class="responsive-img" draggable="false">
						</div>
					</div>
					<div class="row">
						<div class="input-field col m9 s12">
							<table class="striped bordered">
								<tr>
									<div class="row">
										<th class="col s4">
											Name
										</th>
										<td class="col s8">
											<?php echo $this->session->userdata('username');?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4">
											AUID
										</th>
										<td class="col s8">
											<?= $auid?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4">
											USN
										</th>
										<td class="col s8">
											<?php echo $this->session->userdata('usn');?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4">
											Mobile No
										</th>
										<td class="col s8">
											<?= $mobile?>
										</td>
									</div>
								</tr>
							</table>
						</div>
						<div class="input-field col m3 center hide-on-small-only">
							<img src="<?php echo base_url()?>assets/images/students/<?php echo $this->session->userdata('usn');?>.jpg" class="responsive-img" draggable="false">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<table class="bordered striped">
								<tr>
								<div class="row">
									<th class="col s4 m3">
										Email ID
									</th>
									<td class="col s8 m9">
										<?= $email?>
									</td>
									</div>
								</tr>
								<tr>
								<div class="row">
									<th class="col s4 m3">
										Institute
									</th>
									<td class="col s8 m9">
										<?= $institute?>
									</td>
									</div>
								</tr>
								<tr>
								<div class="row">
									<th class="col s4 m3">
										Department
									</th>
									<td class="col s8 m9">
										<?= $department?>
									</td>
									</div>
								</tr>
								<tr>
								<div class="row">
									<th class="col s4 m3">
										Permanent Address
									</th>
									<td class="col s8 m9">
										<?= $permanent_address?>
									</td>
									</div>
								</tr>
								<tr>
								<div class="row">
									<th class="col s4 m3">
										Local Address
									</th>
									<td class="col s8 m9">
										<?= $local_address?>
									</td>
									</div>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="collapsible-header indigo lighten-2">
					<span class="collHead">Attendance</span>
				</div>
				<div id="attendanceDiv" class="collapsible-body">

				</div>
			</li>
			<li>
				<div class="collapsible-header indigo lighten-2">
					<span class="collHead">Internal Marks</span>
				</div>
				<div id="marksDiv" class="collapsible-body">

				</div>
			</li>
		</ul>
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 0px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4" draggable="false">
	</div>

	<!-- jQuery Library -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/ajax.jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
	<!--materialize js-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<!--plugins.js - Some Specific JS codes for Plugin Settings-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugin.js" async></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".button-collapse").sideNav();
			$('.collapsible').collapsible();
		});

		$(document).ready(function() {
			$.ajax({
				url:'<?php echo base_url("studentController/getAttendanceFunc")?>',
				success: function(data) {
					$("#attendanceDiv").html(data);
				}
			});
			$.ajax({
				url:'<?php echo base_url("studentController/getMarksFunc")?>',
				success: function(data) {
					$("#marksDiv").html(data);
				}
			});
		});
	</script>
</body>
</html>