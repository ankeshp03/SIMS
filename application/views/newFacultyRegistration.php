<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Faculty Registration Form | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
	<style type="text/css">
		@media screen and (min-width: 991px) {
			.container {
				margin-right: 10%;
			}
		}
		.spanRed {
			color: #ef5350;
		}

	</style>
</head>
<body bgcolor="#f1f1f1">
	
	<!--contents of the dropdown menu-->
	<ul id="dropdown1" class="dropdown-content">
		<li><a href="#!">Profile</a></li>
		<li class="divider"></li>
		<li><a href="<?php echo base_url('loginController/logout')?>">Logout</a></li>
	</ul>
	<!--contents of the dropdown menu end-->
	<!--main-->
	<div class="container main" ng-app="baseModule" ng-controller="formController">
		<div class="card-panel">
			<form id="facultyRegistrationForm" class="col s12" method="post" action="<?php echo base_url('facultyRegistration/addfacultyDB')?>" name="facultyRegistrationForm" autocomplete>
				<div class="row">
					<div class="input-field col s4">
						<input id="employee_id" name="employee_id" type="text" class="active" pattern="[A-Za-z]{3}[0-9]{5}" title="Invalid id format" required>
						<label for="employee_id">Employee Id <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col s4">
						<input id="name" name="name" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" required>
						<label for="name">Name <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col s4">      
						<label for="qualification">Qualification <span class="spanRed">*</span></label>
						<input id="qualification" name="qualification" type="text" required>          
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4">      
						<label for="designation">Designation <span class="spanRed">*</span></label>
						<input id="designation" name="designation" type="text" required>          
					</div>
					<div class="input-field col s4">
						<select name="institution" id="institution">
							<option value="CET" selected>CET</option>
							<option value="COMEDK">COMEDK</option>
							<option value="Management">Management</option>
						</select>
						<label for="institution">Institution <span class="spanRed">*</span></label>
					</div>
					<div class="input-field col s4" style="padding-top: 20px;">
						<label for="department" class="active">Department <span class="spanRed">*</span></label>
						<select id="department" name="department" style="width: 100%;">
							<option value="select" disabled selected>select</option>
							<option value="44">UK (+44)</option>        
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s4">
						<label for="dob">Date of Birth <span class="spanRed">*</span></label>
						<input id="dob" name="dob" type="date" class="datepicker">
					</div>
					<div class="input-field col s4">
						<label for="doa">Date of Joining <span class="spanRed">*</span></label>
						<input id="doa" name="doa" type="date" class="datepicker">
					</div>
					<div class="input-field col s4">
						<input id="faculty_mobile_no" type="number" name="faculty_mobile_no" required>
						<label for="faculty_mobile_no">Contact No <span class="spanRed">*</span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" name="email" type="email" ng-model="email" class="validate" pattern="^[A-Za-z0-9\.]+@acharya\.ac\.in$" title="Enter valid Acharya email id" required>
						<label for="email">Email <span class="spanRed">*</span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="text" id="permanentAddress" name="permanentAddress" ng-model="permanentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
						<label for="permanentAddress">Permanent Address <span class="spanRed">*</span></label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input type="checkbox" id="copy" ng-model="copy" ng-change="copyAddress()" ng-disabled="!permanentAddress">
						<label for="copy">If current address is same as permanent address</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
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
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js" async></script>
	<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(".button-collapse").sideNav();
		$(document).ready(function() {
			$('#institution').material_select();
			$("#department").select2();
		});

    	//Calculating the date upto yesterday
    	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
    	//Disable future dates
    	$('.datepicker').pickadate({
    		max: yesterday+1,
    		selectMonths: true,
    		selectYears: 40,
    		format: 'yyyy-mm-dd'
    	});

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
    </script>
</body>
</html>