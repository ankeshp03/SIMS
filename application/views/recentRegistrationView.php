<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "1" || $this->session->userdata('user') != "admin") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Faculty Registration Form | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
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
		.card-panel {
			padding: 0;
		}
		.header {
			background-color: #7986cb;
			color: #fff;
			padding: 15px;
		}
		div#student, div#faculty {
			position: relative;
			min-height: 200px;
		}
		div#student > div, div#faculty > div {
			display: flex;
			align-items: center;
			padding: 5px 20px;
		}
		div#student > div:nth-child(even), div#faculty > div:nth-child(even) {
			background-color: #eee;
		}
		.btn-floating {
			box-shadow: none;
			background-color: transparent;
			margin: auto;
		}
		.btn-floating:hover {
			box-shadow: none;
			background-color: transparent;
		}
		.btn-floating:focus {
			box-shadow: none;
			background-color: transparent;
		}
		.btn-floating i {
			color: #777;
		}
		div.row {
			margin: 2px;
		}
		div#student > .row, div#faculty > .row {
			margin-left: auto;
			margin-right: auto;
		}
		.noData {
			position: absolute;
			width: 100%;
			height: 100%;
		}
		.noData > span {
			margin: auto;
		}
		.student-div {
			position: relative;
		}
		.dialogue-box {
			display: none;
			background-color: #fff;
			position: absolute;
			width: 100px;
			height: auto;
			right: 0px;
			padding: 10px 0px;
			border-radius: 2px;
			box-shadow: 0px 2px 6px lightslategray;
			z-index: 100;
		}
		.dialogue-box > a {
			color: darkslategray;
			display: block;
			padding-left: 10px;
			line-height: 2.2;
		}
		.dialogue-box > a:hover {
			background-color: lightgrey;
			display: block;
		}
		.dialogue-display {
			display: block;
		}
		.reverse {
			top: auto;
			bottom: 100%;
		}
		div.modal1-header > h5 {
			text-align: center;
		}
		div.modal1-content > p.loading, p.error {
			margin-top: 150px;
			text-align: center;
		}
		nav .button-collapse {
			margin: 0 !important;
		}
	</style>
</head>
<body class="blue-grey lighten-5">

	<!--main-->

	<div class="container main">
		<div class="card-panel z-depth-2" style="margin-top: 30px;">
			<!-- Modal Structure -->
			<div id="modal1" class="modal modal-fixed-footer">
				<div class="modal-content">
					<!-- <h4>Modal Header</h4>
					<p>A bunch of text</p> -->
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
				</div>
			</div>
			<div class="header z-depth-1">Recent Student Admissions</div>
			<div id="student"></div>
			<div class="header z-depth-1">Recent Faculty Registrations</div>
			<div id="faculty"></div>
		</div>
	</div>
	<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
		<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4">
	</div>
	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js" async></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.js"></script>
	<script type="text/javascript">

		$(".button-collapse").sideNav();

		$(document).ready(function() {
			$(".modal").modal();
			$("<li><a class='waves-effect <?= $color3?>-text text-darken-3' href='<?php echo base_url($link3)?>'>Recent Registrations</a></li>").insertAfter("#facReg");
		});

		$(document).ready(function() {
			
			loadStudents();
			loadFaculties();

			function loadStudents() {
				$.ajax({
					url:'<?php echo base_url("adminController/getRecentStudentList")?>',
					success: function(data) {
						$("#student").html(data);
					}
				});
			}

			function loadFaculties() {
				$.ajax({
					url: '<?php echo base_url("adminController/getRecentFacultyList")?>',
					success: function(data) {
						$("#faculty").html(data);
					}
				});
			}
		});

		var count = 0;

		$(document).click(function() {
			if(count == 1) {
				$('div.dialogue-display').removeClass('dialogue-display');
			}
			else {
				count--;
			}
		});

		function toggleDialogue($dialogue_box_id, $div_id) {
			$('div.dialogue-display').not($dialogue_box_id).removeClass('dialogue-display');
			$($dialogue_box_id).toggleClass('dialogue-display');
			if($($dialogue_box_id).hasClass('dialogue-display')){
				count = 2;
			}
			else {
				count = 0;
			}

			var topOffset = $($div_id).offset().top;
			var dialogueBox = $($dialogue_box_id).height();
			var divHeight = $($div_id).height();
			var relativeOffset = topOffset + dialogueBox + divHeight + 10;
			var windowHeight = $(window).height();

			if(relativeOffset > windowHeight){
				$($dialogue_box_id).addClass("reverse");
			}
			else{
				$($dialogue_box_id).removeClass("reverse");
			}
		}

		function viewDetails(id, name, usr) {

			$('#modal1').modal('open');
			$('div.modal-content').html("<div class='modal1-header'><h5>" + name + "</h5></div>");
			$('div.modal-content').append("<div class='divider'></div>");

			$('div.modal-content').append("<div class='modal1-content'><p class='loading'>" + "Loading..." + "</p></div>");		

			$.ajax({
				url:'<?php echo base_url("adminController/getDetails")?>',
				type: "POST",
				data: {
					id: id,
					user: usr
				},
				success: function(data) {
					$('div.modal1-content').html(data);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('div.modal1-content').html("<p class='error'>" + errorThrown + "</p>");
				}
			});
		}
	</script>
</body>
</html>