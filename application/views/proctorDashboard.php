<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "4" || $this->session->userdata('user') != "proctor") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Home | Proctor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		@media screen and (min-width: 991px) {
			.container {
				width: 60%;
			}
		}
		body {
			font-family: sans-serif;
		}
		.card-panel {
			padding-bottom: 1px;
		}
		#reassign1, #reassign2 {
			display: none;
		}
	</style>
</head>
<body class="blue-grey lighten-5">
	<!--main-->
	<div class="container main">
		<div class="card-panel z-depth-2 center" style="margin-top: 60px;">
			<div class="row">
				<div class="col s12 m6 small">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Year 1</span>
							<p><?= $year1?> students in 1st year</p>
						</div>
						<div class="card-action">
							<center>
								<a href="<?php echo base_url('proctorController/studentInProctor/1')?>" style="width: 100%; display: block;">Assign Students</a>
							</center>
						</div>
					</div>
				</div>
				<div class="col s12 m6 small">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Year 2</span>
							<p><?= $year2?> students in 2nd year</p>
						</div>
						<div class="card-action">
							<center>
								<a href="<?php echo base_url('proctorController/studentInProctor/2')?>" style="width: 100%; display: block;">Assign Students</a>
							</center>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6 small">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Year 3</span>
							<p><?= $year3?> students in 3rd year</p>
						</div>
						<div class="card-action">
							<center>
								<a href="<?php echo base_url('proctorController/studentInProctor/3')?>" style="width: 100%; display: block;">Assign Students</a>
							</center>
						</div>
					</div>
				</div>
				<div class="col s12 m6 small">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Year 4</span>
							<p><?= $year4?> students in 4th year</p>
						</div>
						<div class="card-action">
							<center>
								<a href="<?php echo base_url('proctorController/studentInProctor/4')?>" style="width: 100%; display: block;">Assign Students</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4">
	</div>
	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>
</body>
</html>