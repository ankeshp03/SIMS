<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Student Registration Form | Admin</title>
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
		.collHead {
			color: white;
			font-size: 15px;
		}
		.collapsible-body {
			padding: 1rem;
			padding-left: 2rem;
			background-color: white;
		}
		.row {
			margin-bottom: 15px;
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
		
		<form id="studentRegistrationForm" class="col s12" method="post" action="<?php echo base_url('studentRegistration/addStudentDB')?>" name="studentRegistrationForm" autocomplete>
			<ul class="collapsible z-depth-2" style="border-top-left-radius: 10px; border-bottom-right-radius: 10px; margin-top: 30px;" data-collapsible="expandable">
				<li>
					<div class="collapsible-header indigo lighten-2 active" style="border-top-left-radius: 10px;">
						<span class="collHead">Applicant’s Personal Information</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col center s12">
								<input id="fname" name="fname" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" required autofocus>
								<label for="fname">Name <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col center s4">
								<input id="institution" name="institution" type="text" required>
								<label for="institution">Institution <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center s4">
								<input id="department" name="department" type="text" required>
								<label for="department">Department <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col s4">
								<label for="doa">Date of Admission <span class="spanRed">*</span></label>
								<input id="doa" name="doa" type="date" class="datepicker">
							</div>
						</div>
						<div class="row">
							<div class="input-field col s4">
								<input id="male" type="radio" name="gender" value="male" checked>
								<label for="male">Male</label>

								<input id="female" type="radio" name="gender" value="female">
								<label for="female">Female</label>

								<input id="others" type="radio" name="gender" value="others">
								<label for="others">Others</label>
							</div>
							<div class="input-field col s4">
								<input id="nationality" name="nationality" type="text" required>
								<label for="nationality">Nationality <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col s4">
								<label for="dob">Date of Birth <span class="spanRed">*</span></label>
								<input id="dob" name="dob" type="date" class="datepicker">
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
								<label for="copy">If correspondance address is same as permanent address</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" name="correspondanceAddress" id="correspondanceAddress" name="correspondanceAddress" ng-model="correspondanceAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
								<label for="correspondanceAddress" ng-class="{'active':activateLabel}">Correspondance Address <span class="spanRed">*</span></label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s8">
								<input id="studentEmail" name="studentEmail" type="email" class="validate" pattern="^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])@acharya\.ac\.in$" title="Enter valid Acharya email id" required>
								<label for="studentEmail">Email <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col center s4">
								<input id="mobile" name="mobile" type="text" required>
								<label for="mobile">Mobile <span class="spanRed">*</span></label>
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Category</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								<div class="input-field col s8">
									<label>Whether the candidate belongs to SC/ST or BC/BT </label> 
								</div>
								<div class="input-field col s4">
									<input id="cYes" type="radio" name="category" value="yes" checked>
									<label for="cYes">Yes</label>
									<input id="cNo" type="radio" name="category" value="no">
									<label for="cNo">No</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<label>Whether the candidate is NRI/Foreign National </label> 
								</div>
								<div class="input-field col s4">
									<input id="nYes" type="radio" name="nriForeign" value="yes" checked>
									<label for="nYes">Yes</label>
									<input id="nNo" type="radio" name="nriForeign" value="no">
									<label for="nNo">No</label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Parent / Guardian Information</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								<div class="input-field col s4">
									<select name="parentType" id="parentType">
										<option disabled selected>Select</option>
										<option value="Father">Father</option>
										<option value="Mother">Mother</option>
										<option value="Guardian">Guardian</option>
									</select>
									<label for="parentType">Parent <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col center s8">
									<input id="parentName" name="parentName" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" ng-model="parentName" required>
									<label id="parentNameLabel" for="parentName">Parent/Guardian Name <span class="spanRed">*</span></label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col center s6">
									<input id="parentOccupation" name="parentOccupation" type="text" required>
									<label for="parentOccupation">Occupation <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col center s6">
									<input id="parentDesignation" name="parentDesignation" type="text" required>
									<label for="parentDesignation">Designation <span class="spanRed">*</span></label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" id="officeAddress" name="officeAddress" ng-model="permanentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
									<label for="officeAddress">Office Address <span class="spanRed">*</span></label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="parentEmail" name="parentEmail" type="email" class="validate" required>
									<label for="parentEmail">Email <span class="spanRed">*</span></label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col center s6">
									<input id="parentMobile" name="parentMobile" type="text" required>
									<label for="parentMobile">Parent Mobile <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col center s6">
									<input id="pan" name="pan" type="text" required>
									<label for="pan">PAN No <span class="spanRed">*</span></label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Additional Info</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								<div class="input-field col s8">
									<input type="text" name="localAddress" id="localAddress" name="localAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
									<label for="localtAddress">Local Address of Applicant (if any, in Bangalore) <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col center s4">
									<input id="bangaloreMobile" name="bangaloreMobile" type="text" required>
									<label for="bangaloreMobile">Bangalore Mobile <span class="spanRed">*</span></label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Academic Information</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Applicable only for P G Students</span>
						</div>
						<div class="collapsible-body">

						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2" style="border-bottom-right-radius: 10px;">
							<span class="collHead">Enclosures</span>
						</div>
						<div class="collapsible-body">

						</div>
					</li>
				</ul>

				<div class="row">
					<div class="input-field col s4">
						<select name="quota" id="quota">
							<option value="CET" selected>CET</option>
							<option value="COMEDK">COMEDK</option>
							<option value="Management">Management</option>
						</select>
						<label>Quota <span class="spanRed">*</span></label>
					</div>
				</div>
				
				<div class="row">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
		<!--main end-->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js" async></script>
		<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
		<script type="text/javascript">
			$(".button-collapse").sideNav();
			$(document).ready(function() {
				$('#parentType').material_select();
			});

    	//Calculating the date upto yesterday
    	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
    	
    	//Disable future dates
    	$('.datepicker').pickadate({
    		max: yesterday+1,
    		selectMonths: true,
    		selectYears: 40,
    		format: 'yyyy-mm-dd',
    	});

    	//set current date for date of admission
    	var $input = $('#doa').pickadate();
    	var d = new Date();

		//Use the picker object directly.
		var picker = $input.pickadate('picker');
		picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());
		
		//For using select2 in country code

		$(document).ready(function() {
			$(".names").select2();
		});

		$('#parentType').on('change', function() {
			$val = this.value
			$('#parentNameLabel').html($val + " Name" + " <span class='spanRed'>*</span>");
		});

		var app = angular.module('baseModule',[]);
		app.controller('formController', function($scope) {
			$scope.copyAddress = function() {
				$scope.setVal = $scope.permanentAddress;
				if($scope.copy) {
					$scope.activateLabel = true;
					$scope.correspondanceAddress = $scope.permanentAddress;
				}
				else if($scope.correspondanceAddress == $scope.permanentAddress){
					$scope.activateLabel = false;
					$scope.correspondanceAddress = "";
				}
				else {
					$scope.activateLabel = true;
				}
			};
		});
	</script>
</body>
</html>