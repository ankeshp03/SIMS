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
	<meta http-equiv="Content-Language" content="en">

	<link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/favicon/apple-icon-152x152.png">
	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
	@media screen and (min-width: 992px) {
		.container {
			margin-right: 12%;
		}
	}
	@media screen and (max-width: 381px) {
		.modal {
			width: 85%;
		}
	}	
	.card-panel {
		padding: 0;
	}
	.header {
		background-color: #7986cb;
		padding: 15px;
	}
	div#student, div#faculty {
		position: relative;
	}
	.set-min-height {
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
	p.loading, p.error, p.not-found {
		font-size: 45px;
		width: 100%;
		text-align: center;
		margin: 0;
	}
	.navbar-fixed .button-collapse {
		margin: 0 !important;
	}
	.user-img {
		max-width: 100%;
		height: 200px;
		width: 200px;
		border-radius: 50%;
		box-shadow: 0px 1px 50px #666 !important;
		transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
	}
	@media screen and (min-width: 500px) {
		.user-img:hover {
			width: 270px;
			height: 270px;
			transition: width 0.4s ease-in-out, height 0.4s ease-in-out;
		}
	}
	div.modal-row > div.row {
		padding: 15px 0 0;
		margin: auto;
	}
	.sec, .navbar-fixed, .side-nav {
		-webkit-filter: blur(0px);
		-moz-filter: blur(0px);
		-ms-filter: blur(0px);
		-o-filter: blur(0px);
		filter: blur(0px);
		-webkit-transition: 0.3s -webkit-filter linear;
		-moz-transition: 0.3s -moz-filter linear;
		-ms-transition: 0.3s -ms-filter linear;
		-o-transition: 0.3s -o-filter linear;
		transition: 0.3s filter linear;
	}
	.body-blur {
		display: block;
		-webkit-filter: blur(15px);
		-moz-filter: blur(15px);
		-ms-filter: blur(15px);
		-o-filter: blur(15px);
		filter: blur(15px);
		-webkit-transition: 0.3s -webkit-filter linear;
		-moz-transition: 0.3s -moz-filter linear;
		-ms-transition: 0.3s -ms-filter linear;
		-o-transition: 0.3s -o-filter linear;
		transition: 0.3s filter linear;
	}
	.modal1-header {
		z-index: 1005;
		position:  fixed;
		width: 100%;
		height: 50px;
		top: 0;
		left: 0;
		border-bottom: 1px solid rgba(0, 0, 0, 0.1);
		color: #fff;
		box-shadow: 0 4px 20px #999;
		/*margin-left: -24px ;*/
		margin-bottom: 10px;
		background-color: #7986cb;
	}
	.modal1-content {
		width: 100%;
	}
	.modal-content {

		height: calc(100% - 106px) !important;
		margin-top: 50px !important;

	}
	.modal-row > div.row > div.s12 {
		background-color: steelblue;
		opacity: 0.8;
		padding: 5px 5%;
		font-size: x-large;
		letter-spacing: 1.2px;
		font-weight: 100;
		color: white;
		border-radius: 5px;
		margin-top:20px;
	}
	.modal-row > div.row > div.s5 {
		color: #333;
		opacity: 0.9;
		font-weight: bold;
		overflow-wrap:break-word;
		padding: 5px 5%;
		background-color: #eee;
		border-radius: 5px;
	}
	.modal-row > div.row > div.s7 {
		overflow-wrap:break-word;
		padding: 5px 5%;
		background-color: #ddd;
		border-radius: 5px;
	}
	.modal {
		border-radius: 9px;
	}
	.modal2-content {
		height: 100% !important;
		padding: 0 !important;
	}
	.modal2 {
		height: 80% !important;
		width: 70% !important;
	}
	iframe {
		width: 100%;
		height: 100%;
	}
	.editModal {
		/*width: 85% !important;*/
		max-height: 100% !important;
		height: 78% !important;
	}
	.editModalContent {
		padding: 0 !important;
		padding-bottom: 3px !important;
		height: calc(100% - 56px) !important;
	}
	.editModal1Header {
		margin-left: 0;
	}
	.editModal1Content {
		height: 100%;
	}
</style>
</head>
<body class="blue-grey lighten-5">
	<div id="cover"></div>

	<?= $top ?>
	<?= $sideLarge ?>
	<?= $sideSmall ?>

	<!--main-->
	<section class="sec">
		<div class="container main">
			<div class="card-panel z-depth-2" style="margin-top: 30px;">
				<!-- Modal Structure -->
				<div class="header z-depth-1">
					<span class="collHead">Recent Student Admissions</span>
				</div>
				<div id="student">
					<div class='noData'>
						<span>Loading...</span>
					</div>
				</div>
				<div class="header z-depth-1">
					<span class="collHead">Recent Faculty Registrations</span>
				</div>
				<div id="faculty">
					<div class='noData'>
						<span>Loading...</span>
					</div>
				</div>
			</div>
		</div>
		<div class="hide-on-med-and-down" style="position: fixed; left: 10px; bottom: 10px;">
			<img src="<?php echo base_url()?>assets/images/acharya_wm.png" class="responsive-img" width="160px;" style="opacity: 0.4">
		</div>
	</section>

	<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
		</div>
	</div>

	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js" async></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$('.navbar-fixed').show();
			$('aside').show();
			$('#slide-out').show();
			$("#student").addClass("set-min-height");
			$("#faculty").addClass("set-min-height");
			$('#cover').hide();
		});

		$(".button-collapse").sideNav();

		$(document).ready(function() {
			$(".modal").modal();
			$("<li><a class='waves-effect <?= $color3?>-text text-darken-3' href='<?php echo base_url($link3)?>'>Recent Registrations</a></li>").insertAfter("#facReg");
			loadStudents();
			loadFaculties();
		});

		function loadStudents() {
			$.ajax({
				url:'<?php echo base_url("adminController/getRecentStudentList")?>',
				success: function(data) {
					if(data == 'No Recent Admissions!') {
						$("#student").addClass("set-min-height");
						$("#student").html("<div class='noData'><span>" + data + "</span></div>");
					}
					else {
						$("#student").removeClass("set-min-height");
						$("#student").html(data);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#student").addClass("set-min-height");
					$("#student").html("<div class='noData'><span>" + errorThrown + "</span></div>");
				}
			});
		}

		function loadFaculties() {
			$.ajax({
				url: '<?php echo base_url("adminController/getRecentFacultyList")?>',
				success: function(data) {
					if(data == 'No Recent Registrations!') {
						$("#student").addClass("set-min-height");
						$("#faculty").html("<div class='noData'><span>" + data + "</span></div>");
					}
					else {
						$("#student").removeClass("set-min-height");
						$("#faculty").html(data);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#student").addClass("set-min-height");
					$("#faculty").html("<div class='noData'><span>" + errorThrown + "</span></div>");
				}
			});
		}

		var count = 0;

		$(document).click(function() {
			if(!$('#modal1').hasClass('open')) {
				$('.side-nav, .sec, .navbar-fixed').removeClass('body-blur');
			}
			if($('.modal-content').hasClass('modal11-content') && !$('#modal1').hasClass('open')) {
				$('.modal-content').removeClass('modal11-content');
			}
			if(count == 1) {
				$('div.dialogue-display').removeClass('dialogue-display');
			}
			else {
				count--;
			}
		});

		$('.modal-close').click(function() {
			$('.side-nav, .sec, .navbar-fixed').removeClass('body-blur');
			$('.modal-content').removeClass('modal1-content');
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
			$('.modal-footer').show();
			$('.modal-content').addClass('valign-wrapper');
			$('.side-nav, .sec, .navbar-fixed').addClass('body-blur');
			$('div.modal-content').html("<div class='modal1-header'><h5>" + name + "</h5></div>");
			$('div.modal-content').append("<div class='modal1-content'><p class='loading'>Loading...</p></div>");		
			$.ajax({
				url:'<?php echo base_url("adminController/getDetails")?>',
				type: "POST",
				data: {
					id: id,
					user: usr
				},
				success: function(data) {
					$('.modal-content').removeClass('valign-wrapper');
					$('div.modal1-content').html(data);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('div.modal1-content').html("<p class='error'>" + errorThrown + "</p>");
				}
			});
		}

		function editDetails(id, name, usr) {

			$('#modal1').modal('open');
			$('.modal-footer').show();
			// $('.modal-content').addClass('valign-wrapper');
			$('.side-nav, .sec, .navbar-fixed').addClass('body-blur');
			$('div.modal-content').html("<div class='modal1-header'><h5>" + name + "</h5></div>");

			$('div.modal-content').append("<div class='modal1-content'><p class='loading'>Loading...</p></div>");		
			// $.ajax({
			// 	url:'<?php echo base_url("adminController/editDetails")?>',
			// 	type: "POST",
			// 	data: {
			// 		id: id,
			// 		user: usr
			// 	},
			// 	success: function(data) {
			// 		$('.modal-content').removeClass('valign-wrapper');
			// 		$('div.modal1-content').html(data);
			// 	},
			// 	error: function(jqXHR, textStatus, errorThrown) {
			// 		$('div.modal1-content').html("<p class='error'>" + errorThrown + "</p>");
			// 	}
			// });

			$('div.modal').addClass('editModal');
			$('div.modal-content').addClass('editModalContent');
			$('div.modal1-header').addClass('editModal1Header');
			$('div.modal1-content').addClass('editModal1Content');
			$('.modal-footer').hide();
			$('div.modal1-content').html('<iframe src="<?php echo base_url()?>adminController/editDetails/' + usr + '/' + id + '"></iframe>');
		}

		function removeDetails(id, name, usr) {

			$.ajax({
				url:'<?php echo base_url("adminController/removeUser")?>',
				type: "POST",
				data: {
					id: id,
					name: name,
					user: usr
				},
				success: function(data) {
					if(data == "Not Done") {
						$('#modal1').modal('open');
						$('.modal-content').addClass('valign-wrapper');
						$('.side-nav, .sec, .navbar-fixed').addClass('body-blur');
						$('div.modal-content').html("<p class='not-found'>" + data + "</p>");
					}
					else if(data == "Done") {
						if(usr == 'student') {
							loadStudents();
						}
						else if(usr == 'faculty') {
							loadFaculties();
						}
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('div.modal-content').html("<p class='error'>" + errorThrown + "</p>");
				}
			});
		}
	</script>
</body>
</html>