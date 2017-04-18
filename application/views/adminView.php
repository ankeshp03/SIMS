<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title><?php echo $this->session->userdata('employeeID'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
	<link href="<?php echo base_url()?>assets/css/studentViewStyle.css" type="text/css" rel="stylesheet" media="screen,projection">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		@media screen and (min-width: 991px) {
			.container {
				margin-right: 12%;
			}
		}
		body {
			font-family: sans-serif;
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
	<div id="oader-wrapper">
		<div id="oader"></div>        
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<!-- End Page Loading -->
	<div class="container">
		<ul class="collapsible z-depth-2" style="margin-top: 30px; letter-spacing: 0.1px;" data-collapsible="expandable">
			<li>
				<div class="collapsible-header indigo lighten-2 active">
					<span class="collHead">Personal Information</span>
				</div>
				<div class="collapsible-body">
					<div class="row">
						<div class="hide-on-med-and-up input-field col s12 center">
							<img src="<?php echo base_url()?>assets/images/students/<?php echo $this->session->userdata('employeeID');?>.jpg" class="responsive-img" draggable="false">
						</div>
					</div>
					<div class="row">
						<div class="input-field col m9 s12">
							<table class="striped bordered">
								<tr>
									<div class="row">
										<th class="col s4">
											Employee ID
										</th>
										<td class="col s8">
											<?php echo $this->session->userdata('employeeID');?>
										</td>
									</div>
								</tr>
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
											Date of Birth
										</th>
										<td class="col s8">
											<?= $dob?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4">
											Mobile No.
										</th>
										<td class="col s8">
											<?= $mobile_no?>
										</td>
									</div>
								</tr>
							</table>
						</div>
						<div class="hide-on-small-only input-field col m3 center">
							<img src="<?php echo base_url()?>assets/images/students/<?php echo $this->session->userdata('employeeID');?>.jpg" class="responsive-img" draggable="false">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<table class="bordered striped">
								<tr>
									<div class="row">
										<th class="col s4 m3">
											Date of Joining
										</th>
										<td class="col s8 m9">
											<?= $doj?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4 m3">
											Email ID
										</th>
										<td class="col s8 m9">
											<?= $email_id?>
										</td>
									</div>
								</tr>
								<tr>
									<div class="row">
										<th class="col s4 m3">
											Institute
										</th>
										<td class="col s8 m9">
											<?= $institution?>
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
							</table>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 0px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4" draggable="false">
	</div>

	<!-- jQuery Library -->
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
	</script>
</body>
</html>