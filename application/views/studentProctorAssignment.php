<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "2" || $this->session->userdata('user') != "head proctor") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Home | Head Proctor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		.containerMain {
			padding-left: 15px;
			width: 60%;
		}
		body {
			font-family: sans-serif;
		}
	</style>
</head>
<body class="blue-grey lighten-5">
	<input type="hidden" id="year" name="year" value="<?= $year?>">
	<div class="container containerMain">
		<div class="card-panel z-depth-2" style="margin-top: 60px;">
			<div class="row">
				<div class="col s6" style="padding-left: 10%;">
					<h5>Student List</h5>
				</div>
				<div class="col s6 center">
					<h5>Faculty List</h5>
				</div>
			</div>
			<form id="proctorAssignForm" method="post">
				<div class="row">
					<div class="col s6 studentList"></div>
					<div class="col s6 facultyList"></div>
				</div>
				<div class="row">
					<button id="submitButton" class="btn waves-effect waves-light" style="margin-left: 10px;" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>

	<!-- jQuery Library -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/ajax.jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
	<!--materialize js-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js" async></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".button-collapse").sideNav();
		});

		$(document).ready(function() {

			$.ajax({
				url: '<?php echo base_url("headProctorController/getStudents");?>',
				type: 'POST',
				data: {
					year: $("#year").val()
				},
				success:function(data) {
					$(".studentList").html(data);
				}
			});

			$.ajax({
				url: '<?php echo base_url("headProctorController/getFaculties");?>',
				type: 'POST',
				data: {
					year: $("#year").val()
				},
				success:function(data) {
					$(".facultyList").html(data);
				}
			});
		});
	</script>
</body>
</html>