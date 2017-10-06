<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "3" || $this->session->userdata('user') != "head proctor") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Home | Head Proctor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
	@media screen and (min-width: 991px) {
		.containerMain {
			padding-left: 15px;
			width: 60%;
		}
	}
	/*body {
		font-family: sans-serif;
		}*/
		.card-panel {
			padding: 0px 10px 10px 10px;
		}
		.header {
			color: #fff;
			background-color: #7986cb;
			box-shadow: 0 4px 20px #999;
		}
		.studentLi > li {
			margin: 10px 0;
		}
		.facultyLi > li {
			margin: 10px 0;
		}
		/*.studentLabel {
			color: #eee;
		}
		.facultyLabel {
			color: #;
		}*/
	</style>
</head>
<body class="blue-grey lighten-5">

	<?= $top ?>
	<?= $sideLarge ?>
	<?= $sideSmall ?>

	<input type="hidden" id="year" name="year" value="<?= $year?>">
	<div class="container containerMain">
		<div class="card-panel z-depth-2" style="margin-top: 60px;">
			<div class="row header center">
				<div class="col s6">
					<h5>Student List</h5>
				</div>
				<div class="col s6">
					<h5>Faculty List</h5>
				</div>
			</div>
			<div class="row">
				<form id="proctorAssignForm" method="post">
					<div class="row">
						<div class="col s6 studentList"></div>
						<div class="col s6 facultyList"></div>
					</div>
					<div class="row">
						<button id="submitButton" class="btn waves-effect waves-light" style="margin-left: 10px;" type="submit" name="action">Assign
							<i class="material-icons right">send</i>
						</button>
					</div>
				</form>
			</div>
			<!-- 	<div class="col s6" style="padding-left: 10%;">
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
					<button id="submitButton" class="btn waves-effect waves-light" style="margin-left: 10px;" type="submit" name="action">Assign
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div> -->
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4">
	</div>

	<!-- jQuery Library -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/ajax.jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
	<!--materialize js-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".button-collapse").sideNav();
			studentFacultyList();
		});

		function studentFacultyList() {

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
		};

		$("#proctorAssignForm").on("submit", function(value) {

			value.preventDefault();

			var checked_list = [];

			$('.check_list').each(function() {
				if($(this).is(":checked")) {
					checked_list.push($(this).val());
				}
			});
			
			$.ajax({
				url: '<?php echo base_url("headProctorController/assignProctorToStudent");?>',
				type: 'POST',
				data: {
					checked_list: checked_list,
					faculty: $('[name=facultyName]:checked').val(),
					year: $("#year").val()
				},
				success:function(data) {
					studentFacultyList();
				}
			});
		});

		$("#reassign1,#reassign2").on("click", function(value) {

			value.preventDefault();
			$.ajax({
				url: '<?php echo base_url("headProctorController/reassignProctor");?>',
				type: 'POST',
				data: {
					year: $("#year").val()
				},
				success:function(data) {
					location.reload();
				}
			});
		});
	</script>
</body>
</html>