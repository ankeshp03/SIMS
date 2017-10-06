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
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
	.container {
		width: 100%;
		max-width: 100%;
	}
	.spanRed {
		color: #ef5350;
	}
	.picker__date-display {
		background: -webkit-linear-gradient(left top, #0277bd, #26a69a);
	}
	.picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected {
		background-color: #7986cb;
	}
	.select2-container--default .select2-selection--single {
		border-radius: 0;
		border: 0;
		border-bottom: 1px solid #ccc;
	}
	.select2-container--default.select2-container--focus .select2-selection--single {
		border: 0;
		border-bottom: 1px solid #333;
	}

	input::placeholder {
		color: #9e9e9e;
	}
	.file-path-wrapper {
		padding-left: 0 !important;
	}
	.input-field {
		margin: 20px 0px 30px 0px;
	}
	input {
		margin-bottom: 0px !important;
	}
	.row {
		margin-top: 0px;
		margin-bottom: 0px;
	}
	.determinate {
		position: fixed;
		background: linear-gradient(to top, #039be5 0%, #00e5ff 100%);
		width: 0%;
		height: 4px;
		z-index: 999;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.10), 0 2px 10px 0 rgba(0, 0, 0, 0.10);
		border-top-right-radius: 50px;
		border-bottom-right-radius: 50px;		
		transition: all 1s cubic-bezier(0, 0, 0, 1) !important;
	}
	.l-scr-photo {
		position: relative;
	}
	.pr-img-div {
		display: none;
		background-color: white;
		position: absolute;
		width: 91.5%;
	}
	.preview-img {
		width: 50%;	
		max-width: 100%;
		max-height: 100%;
	}
</style>
</head>
<body class="blue-grey lighten-5">
	<div id="cover"></div>

	<?= $usr?>
	<?= $id?>

	<div class="determinate"></div>

	<!--main-->

	<div class="container main" ng-app="baseModule" ng-controller="formController">
		<center>
			<div id="dbMessage" class="col s12 z-depth-2 center card-panel" style="color: #4F4F4F; word-wrap: break-word; display: none;">
			</div>
		</center>
		<div class="card-panel z-depth-2" style="margin: 0;">
			<form id="facultyRegistrationForm" class="col s12" method="post" action="<?php echo base_url('facultyRegistration/addfacultyDB')?>" name="facultyRegistrationForm" enctype="multipart/form-data" autocomplete>
				<div class="row">
					<div class="input-field col m4 s12">
						<input id="employeeId" name="employeeId" type="text" class="active" pattern="[A-Za-z]+[0-9]+" title="Invalid id format" autofocus required>
						<label for="employeeId">Employee ID <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col" style="margin-left: -53px;">
						<center>
							<div class="tickEmployeeId" style="display: none;">
								<img src="<?php echo base_url()?>assets/images/tick.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
							</div>
							<div class="crossEmployeeId" style="display: none;">
								<img src="<?php echo base_url()?>assets/images/cross.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
							</div>
						</center>
					</div>
					<div class="input-field col m4 s12">
						<input id="name" name="name" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" requirede>
						<label for="name">Name <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col m4 s12">      
						<label for="qualification">Qualification <span class="spanRed">*</span></label>
						<input id="qualification" name="qualification" type="text" required>          
					</div>
				</div>
				<div class="row">
					<div class="input-field col m4 s12">      
						<label for="designation">Designation <span class="spanRed">*</span></label>
						<input id="designation" name="designation" type="text" required>          
					</div>
					<div class="input-field col m4 s12" style="padding-top: 20px;">
						<label for="institution" class="active">Institution <span class="spanRed">*</span></label>
						<select id="institution" name="institution" style="width: 100%;">
						</select>
					</div>
					<div class="input-field col m4 s12" style="padding-top: 20px;">
						<label for="department" class="active">Department <span class="spanRed">*</span></label>
						<select id="department" name="department" style="width: 100%;" disabled>
							<option value="select" disabled selected>select</option>        
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-field col m3 s12">
						<label for="dob">Date of Birth <span class="spanRed">*</span></label>
						<input id="dob" name="dob" type="date" class="datepicker">
					</div>
					<div class="input-field col m3 s12">
						<label for="doj">Date of Joining <span class="spanRed">*</span></label>
						<input id="doj" name="doj" type="date" class="datepicker">
					</div>
					<div class="input-field col m3 s12">
						<select id="employeeLevel" name="employeeLevel">
							<option value="1">Admin</option>
							<option value="2">HoD</option>
							<option value="3">Head Proctor</option>
							<option value="4">Proctor</option>
							<option value="5" selected>Faculty</option>
						</select>
						<label>Employee Type <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col m3 s12">
						<input id="employeeMobile" type="number" name="employeeMobile" required>
						<label for="employeeMobile">Contact No <span class="spanRed">*</span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col m9 s7">
						<input id="email" name="email" type="text" ng-model="email" class="validate" pattern="^[A-Za-z0-9\.]+$" title="Enter valid Acharya email id" required>
						<label for="email">Email ID<span class="spanRed">*</span></label>
					</div>
					<div class="input-field col m3 s5" style="margin-left: -23px;">
						<input type="text" id="acharyaEmail" name="acharyaEmail" value="@acharya.ac.in" style="text-align: center; padding-right: 22px;" readonly>
						<label for="acharyaEmail" class="active"></label>
					</div>
					<div class="input-field col" style="margin-left: -40px;">
						<center>
							<div class="preloader-wrapper small active" style="display: none;">
								<div class="spinner-layer spinner-blue-only">
									<div class="circle-clipper left">
										<div class="circle"></div>
									</div>
									<div class="gap-patch">
										<div class="circle"></div>
									</div>
									<div class="circle-clipper right">
										<div class="circle"></div>
									</div>
								</div>
							</div>
							<div class="tick" style="display: none;">
								<img src="<?php echo base_url()?>assets/images/tick.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
							</div>
							<div class="cross" style="display: none;">
								<img src="<?php echo base_url()?>assets/images/cross.png" style="border-radius: 50%; width: 30px; margin-top: 10px;">
							</div>
						</center>
					</div>
				</div>
				<div class="row">
					<div class="sm-scr-photo file-field input-field col s12 hide-on-med-and-up">
						<input type="file" name="photo">
						<div class="file-path-wrapper">
							<input placeholder="Upload Pic *" class="file-path validate" type="text">
						</div>
					</div>
					<div class="input-field col m8 s12">
						<input type="text" id="permanentAddress" name="permanentAddress" ng-model="permanentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
						<label for="permanentAddress">Permanent Address <span class="spanRed">*</span></label>
					</div>
					<div class="l-scr-photo file-field input-field col m4 hide-on-small-only">
						<input type="file" id="photoL" name="photo">
						<div class="file-path-wrapper">
							<input placeholder="Upload Pic *" class="file-path validate" type="text">
						</div>
						<div class="pr-img-div center z-depth-2">
							<img id="pr-imgL" class="preview-img" src="#">
						</div>
					</div>

				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="checkbox" id="copy" ng-model="copy" ng-change="copyAddress()" ng-disabled="!permanentAddress" checked="true">
						<label for="copy">If current address is same as permanent address</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12" style="margin-top: 5px;">
						<input type="text" name="currentAddress" id="currentAddress" name="currentAddress" ng-model="currentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
						<label for="currentAddress" ng-class="{'active':activateLabel}">Current Address <span class="spanRed">*</span></label>
					</div>
				</div>
				<div class="row">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$('.navbar-fixed').show();
			$('aside').show();
			$('#slide-out').show();
			fileReq();
			$('#cover').hide();
		});

		$(window).resize(fileReq);

		function fileReq() {
			if (window.matchMedia('(max-width: 600px)').matches) {
				$(".l-scr-photo > input").removeAttr("required");
				$(".sm-scr-photo > input").attr("required", "required");
			}
			else {
				$(".sm-scr-photo > input").removeAttr("required");
				$(".l-scr-photo > input").attr("required", "required");
			}
		};

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.preview-img').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
			else {
				$('.preview-img').attr('src', '#');
			}
		}

		$("#photoL").change(function(){
			readURL(this);
		});

		$("#photoL").hover(function() {
			if($('.preview-img').attr('src') != '#') {
				$(".pr-img-div").css("z-index", "999");
				$(".pr-img-div").show("blind");
			}
		}, 
		function() {
			$(".pr-img-div").hide("blind");
		}
		);

		$(".button-collapse").sideNav();

		$(document).ready(function() {
			$('#employeeLevel').material_select();
			$("#department").select2();
			$("#institution").select2();
			$("<li><a class='waves-effect <?= $color3?>-text text-darken-3' href='<?php echo base_url($link3)?>'>Recent Registrations</a></li>").insertAfter("#facReg");
			loadInstitution();
		});

		function loadInstitution() {
			$.ajax({
				url:'<?php echo base_url("adminController/getInstitution")?>',
				success: function(data) {
					$("#institution").html(data);
				}
			});
		}

		$("#institution").change(function() {
			$.ajax({
				url: '<?php echo base_url("adminController/getDepartments")?>',
				type: 'POST',
				data: {
					institution: $(this).val()
				},
				success: function(data) {
					$("#department").html(data);
					$("#department").removeAttr("disabled");
				}
			});
		});

		$("#employeeId").keyup(function() {

			$(".tickEmployeeId").hide();
			$(".crossEmployeeId").hide();
			if(!/^[A-Za-z]+[0-9]+$/.test($("#employeeId").val())){
				$(".tickEmployeeId").hide();
				$(".crossEmployeeId").hide();
				return false;
			}

			$.ajax({
				url:'<?php echo base_url("adminController/employeeIdExists")?>',
				type: 'POST',
				data: {
					employeeId: $("#employeeId").val()
				},
				success: function(data) {
					if(data == "no") {
						$(".crossEmployeeId").hide();
						$(".tickEmployeeId").show();
						$(".tickEmployeeId").delay(5000).hide(0);
					}
					else {
						$(".tickEmployeeId").hide();
						$(".crossEmployeeId").show();
						$(".crossEmployeeId").delay(5000).hide(0);
					}
				}
			});
		});

		$("#employeeId").change(function() {
			this.value = this.value.toUpperCase();
		});

    	//Calculating the date upto yesterday
    	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
    	//Disable future dates
    	$('.datepicker').pickadate({
    		min: [1957,1,1],
    		max: yesterday+1,
    		selectMonths: true,
    		selectYears: 60,
    		format: 'yyyy-mm-dd'
    	});

    	var $input = $('#doj').pickadate();
    	var d = new Date();
    	var picker = $input.pickadate('picker');
    	picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());

    	var app = angular.module('baseModule',[]);
    	app.controller('formController', function($scope) {
    		$scope.copyAddress = function() {
    			$scope.setVal = $scope.permanentAddress;
    			if($scope.copy) {
    				$scope.activateLabel = true;
    				$scope.currentAddress = $scope.permanentAddress;
    			}
    			else if($scope.currentAddress == $scope.permanentAddress){
    				$scope.activateLabel = false;
    				$scope.currentAddress = "";
    			}
    			else {
    				$scope.activateLabel = true;
    			}
    		};
    	});

    	$("#email").focusin(function() {
    		
    		if(!$("#email").val()) {
    			if($("#email").css('box-shadow') == 'none') {
    				$("#acharyaEmail").css("border-bottom", "1px solid #26a69a");
    				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #26a69a");
    			}
    			else {
    				$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
    				$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
    			}
    		}
    		else if(/^[A-Za-z0-9\.]+$/.test($("#email").val())){
    			$("#acharyaEmail").css("border-bottom", "1px solid #4caf50");
    			$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #4caf50");
    		}
    		else if(!/^[A-Za-z0-9\.]+$/.test($("#email").val())){
    			$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
    			$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
    		}
    	});

    	$("#email").focusout(function() {

    		if(!$("#email").val()) {
    			$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
    			$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
    		}
    		else if(/^[A-Za-z0-9\.]+$/.test($("#email").val())){
    			$("#acharyaEmail").css("border-bottom", "1px solid #4caf50");
    			$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #4caf50");
    		}
    		else if(!/^[A-Za-z0-9\.]+$/.test($("#email").val())){
    			$("#acharyaEmail").css("border-bottom", "1px solid #f44336");
    			$("#acharyaEmail").css("box-shadow", "0 1px 0 0 #f44336");
    		}
    	});

    	$("#email").keyup(function() {

    		$(".tick").hide();
    		$(".cross").hide();
    		if($("#email").val()){
    			$(".preloader-wrapper").show();
    		}
    		else {
    			$(".preloader-wrapper").hide();	
    		}

    		if(!/^[A-Za-z0-9\.]+$/.test($("#email").val())){
    			return false;
    		}

    		email = $("#email").val() + "@acharya.ac.in";

    		$.ajax({
    			url:'<?php echo base_url("adminController/Emailexists")?>',
    			type: 'POST',
    			data: {
    				email: email,
    				user: "faculty"
    			},
    			success: function(data) {
    				if(data == "no") {
    					$(".preloader-wrapper").hide();
    					$(".cross").hide();
    					$(".tick").show();
    					$(".tick").delay(5000).hide(0);
    				}
    				else {
    					$(".preloader-wrapper").hide();
    					$(".tick").hide();
    					$(".cross").show();
    					$(".cross").delay(5000).hide(0);
    				}
    			}
    		});
    	});

    	$('#facultyRegistrationForm').on('submit', function(value) {

    		value.preventDefault();

    		if(!$("#institution").val()) {
    			alert("Please select the Institution");
    			return false;
    		}

    		if(!$("#department").val()) {
    			alert("Please select the Department");
    			return false;
    		}

    		if(!$("#employeeLevel").val()) {
    			alert("Please select the Employee Type");
    			return false;
    		}

    		var formData = new FormData(this);
    		$(".determinate").show();

    		$.ajax({
    			url: '<?php echo base_url("adminController/addFacultyDB");?>',
    			type: 'POST',
    			data: formData,
    			xhr: function() {
    				var xhr = $.ajaxSettings.xhr();
    				var count = 0;
    				xhr.upload.onprogress = function(e) {
    					if($("#photo").val()) {

    					}
    					complete = Math.floor(e.loaded / e.total *100);
    					console.log(complete + '%');
    					if(complete == 100) {
    						complete -= 10;
    					}
    					$(".determinate").css("width", complete + "%");
    				};
    				return xhr;
    			},
    			contentType: false,
    			cache: false,
    			processData: false,
    			success:function(data) {
    				if(data == "Added to database") {
    					$(".determinate").css("width", "100%");
    					$('#dbMessage').html(data);
    					$('html, body').animate({scrollTop : 0},800);
    					$('#facultyRegistrationForm')[0].reset();
    					$("label").removeClass("active");
    					$("label[for='institution'], label[for='department']").addClass("active");
    					var $input = $('#doj').pickadate();
    					var d = new Date();
    					var picker = $input.pickadate('picker');
    					picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());
    					$('#dbMessage').show('blind');
    					$('#dbMessage').delay(3000).hide('blind');
    					$('.determinate').delay(3000).hide('blind');
    					loadInstitution();
    					$('#department').find('option').remove().end().append('<option value="select" selected>select</option>');
    					$('#department').attr("disabled", "disabled");
    					$("#acharyaEmail").css("border-bottom", "1px solid #9e9e9e");
    					$("#acharyaEmail").css("box-shadow", "none");
    					$('#copy').attr("disabled", "disabled");
    					$('#copy').removeAttr("checked");
    					$('.preview-img').attr('src', '#');
    				}
    				else {
    					$(".determinate").css("width", "100%");
    					$('#dbMessage').html(data);
    					$('html, body').animate({scrollTop : 0},800);
    					$('#dbMessage').show('blind');
    					$('#dbMessage').delay(3000).hide('blind');
    					$('.determinate').delay(3000).hide('blind');
    				}
    			},
    			error: function(jqXHR, textStatus, errorThrown) {
    				$('html, body').animate({scrollTop : 0},800);
    				$('#dbMessage').html(errorThrown);
    				$('#dbMessage').show('blind');
    				$('#dbMessage').delay(3000).hide('blind');
    				$('.determinate').delay(3000).hide('blind');
    			}
    		});
    	});
    </script>
</body>
</html>