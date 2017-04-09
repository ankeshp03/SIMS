<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "1") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Student Registration Form | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
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
		table {

		}
		collapsible-body {
			display: block !important;
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
					<div class="firstCollapsible collapsible-header indigo lighten-2 active" style="border-top-left-radius: 10px;"><!--active class-->
						<span class="collHead">Applicant’s Personal Information</span>
					</div>
					<div class="collapsible-body">
						<div class="row">
							<div class="input-field col center s6">
								<input id="fname" name="fname" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" required autofocus>
								<label for="fname">Name <span class="spanRed">*</span></label>
							</div>
							<div class="input-field col s6">
								<input id="usn" name="usn" type="text" pattern="1[Aa][Yy][1-9][1-9][Ii][Ss]([0-9][0-9][1-9]|[0-9][1-9][0-9]|[1-9][0-9][0-9])" title="Enter proper USN" class="validate" required>
								<label for="usn">USN <span class="spanRed">*</span></label>
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
								<label id="doaLabel" for="doa">Date of Admission <span class="spanRed">*</span></label>
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
								<label id="dobLabel" for="dob">Date of Birth <span class="spanRed">*</span></label>
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
							<table class="bordered highlight striped">
								<tr>
									<th>Educational Qualification</th>
									<th class="center">10th</th>
									<th></th>
									<th class="center">12th</th>
								</tr>
								<tr>
									<th>Name of Board or University</th>
									<td><input type="text" name="tenthBoard"></td><td></td>
									<td><input type="text" name="twelveBoard"></td>
								</tr>
								<tr>
									<th>Name of the College last Studied</th>
									<td><input type="text" name="tenthSchool"></td><td></td>
									<td><input type="text" name="twelveSchool"></td>
								</tr>
								<tr>
									<th>Maximum Marks</th>
									<td><input type="number" name="tenthMaxMarks"></td><td></td>
									<td><input type="number" name="twelveMaxMarks"></td>
								</tr>
								<tr>
									<th>Total Marks Scored</th>
									<td><input type="number" name="tenthMarks"></td><td></td>
									<td><input type="number" name="twelveMarks"></td>
								</tr>
								<tr>
									<th>Percentage</th>
									<td><input type="text" name="tenthPercentage"></td><td></td>
									<td><input type="text" name="twelvePercentage"></td>
								</tr>
							</table>
							<div class="row">
								<div class="input-field col s4">
									<input type="text" name="entranceExam">
									<label for="entranceExam">Entrance/Qualfifying Exam <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col s4">
									<input type="text" name="entranceState">
									<label for="entranceState">State <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col s2">
									<input type="text" name="entranceYear">
									<label for="entranceYear">Year <span class="spanRed">*</span></label>
								</div>
								<div class="input-field col s2">
									<input type="text" name="entranceScore">
									<label for="entranceScore">Score <span class="spanRed">*</span></label>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2">
							<span class="collHead">Applicable only for P G Students</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								<div class="input-field col s4">
									<input type="text" name="pgExam">
									<label for="pgExam">Name of the exam passed</label>
								</div>
								<div class="input-field col s4">
									<input type="text" name="pgUniversity">
									<label for="pgUniversity">University</label>
								</div>
								<div class="input-field col s4">
									<input type="number" name="pgPassingYear">
									<label for="pgPassingYear">Year of Passing</label>
								</div>
							</div>
							<div class="row">
								<table>
									<tr>
										<td>Subjects Studied</td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject1">
												<label for="pgSubject1">Subject 1</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject2">
												<label for="pgSubject2">Subject 2</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject3">
												<label for="pgSubject3">Subject 3</label>
											</div>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject4">
												<label for="pgSubject4">Subject 4</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject5">
												<label for="pgSubject5">Subject 5</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input type="text" name="pgSubject6">
												<label for="pgSubject6">Subject 6</label>
											</div>
										</td>
									</tr>
								</table>
							</div>
							<div class="row">
								<table>
									<tr>
										<td>Marks / Percentage</td>
										<td>
											<div class="input-field col s11">
												<input id="pgMarksYear1" type="number" name="pgMarksYear1">
												<label for="pgMarksYear1">1st Year</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input id="pgMarksYear2" type="number" name="pgMarksYear2">
												<label for="pgMarksYear2">2nd Year</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input id="pgMarksYear3" type="number" name="pgMarksYear3">
												<label for="pgMarksYear3">3rd Year</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input id="pgMarksYear4" type="number" name="pgMarksYear4">
												<label for="pgMarksYear4">4th Year</label>
											</div>
										</td>
										<td>
											<div class="input-field col s11">
												<input id="pgTotalPercentage" type="text" name="pgTotalPercentage">
												<label id="pgTotalPercentageLabel" for="pgTotalPercentage">Total %</label>
											</div>
										</td>
									</tr>
								</table>
							</div>							
						</div>
					</li>
					<li>
						<div class="collapsible-header indigo lighten-2" style="border-bottom-right-radius: 10px;">
							<span class="collHead">Enclosures</span>
						</div>
						<div class="collapsible-body">
							<div class="row">
								<div class="input-field col s8">
									<span>Details of copies of documents enclosed: Tick the relevant boxes</span>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<input id="pucCertificate" type="checkbox" name="pucCertificate" value="1">
									<label for="pucCertificate">Marks Cards of 10+2 / equivalent exam </label> 
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<input id="sslcCertificate" type="checkbox" name="sslcCertificate" value="1">
									<label for="sslcCertificate">10th Std. Certificate </label> 
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<input id="tc" type="checkbox" name="tc" value="1">
									<label for="tc">Transfer Certificate </label> 
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<input id="conductCertificate" type="checkbox" name="conductCertificate" value="1">
									<label for="conductCertificate">Conduct Certificate </label> 
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">
									<input id="migrationCertificate" type="checkbox" name="migrationCertificate" value="1">
									<label for="migrationCertificate">Migration Certificate </label> 
								</div>
							</div>
							<div class="row">
								<div class="input-field col s8">				
									<input id="entranceScorecard" type="checkbox" name="entranceScorecard" value="1">
									<label for="entranceScorecard">Entrance Exam Score Card </label> 
								</div>
							</div>
						</div>
					</li>
				</ul>
				<div class="row">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
		<!--main end-->
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
		<script scr="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(".button-collapse").sideNav();

			$(document).ready(function() {
				$('#parentType').material_select();
			});

			$(document).ready(function(){
				$(".firstCollapsible").off('click.collapse').css('pointer-events', 'none');
			});

			$(".collapsible-header").click(function() {
				$(this).off('click.collapse').css('pointer-events', 'none');
			});

			$(function () {
				if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
					$("#dob_table").click(function() {
						$("#dobLabel").addClass('active');
					});
				}
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
    	$(document).ready(function() {
    		if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
    			$("#doaLabel").addClass("active");
    		}
    	});

		//Use the picker object directly.
		var picker = $input.pickadate('picker');
		picker.set('select',d.getFullYear().toString() + "-" + (d.getMonth()+1).toString() + "-" + d.getDate().toString());

		$('#pgMarksYear1, #pgMarksYear2, #pgMarksYear3, #pgMarksYear4').on('input', function() {
			if($('#pgMarksYear1').val() != "" && $('#pgMarksYear2').val() != "" && $('#pgMarksYear3').val() != "" && $('#pgMarksYear4').val() != "")
			{
				$total = parseInt($('#pgMarksYear1').val()) + parseInt($('#pgMarksYear2').val()) + parseInt($('#pgMarksYear3').val()) + parseInt($('#pgMarksYear4').val());
				$('#pgTotalPercentageLabel').addClass('active');
				$('#pgTotalPercentage').val(($total/400)*100);
			}
			else {
				$('#pgTotalPercentage').val("");
				$('#pgTotalPercentageLabel').removeClass('active');	
			}
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