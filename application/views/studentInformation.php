<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('level') != "4" || $this->session->userdata('user') != "proctor") {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<html>
<head>
	<title>Student Information</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		.personalInformation{
			position: absolute;
		}
		.container {
			margin-top: 200px;
		}
		.area{
			position: absolute;
			top: 40%;
			height: 80%;
			width: 100%;
			background-color: hsl(180, 100%, 50%);
		}

		@media screen and (min-width: 991px) {
			#personalInfo, #modifyBtn {
				margin-left: 10%;
			}
		}
		#modifyBtn, .modify {
			display: none;
		}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">   
	<link rel="stylesheet" href="<?php echo base_url('assets/css/materialize.min.css')?>">
	<!--  -->
</head>
<body class="blue-grey lighten-5">

	<div class="container" style="margin-top:70px;">
		<div class="row center-align hide-on-small-only">
			<div class="col m6">
				<a class="waves-effect btn-large" id="pi">Personal Information</a>
			</div>
			<div class="col m6">
				<a class="waves-effect btn-large" id="ai">Academic Information</a>
			</div>
			<!--div class="col s4">
				<button type="button" class="btn-large" id="ccaBtn">Co-Curricular Activities</button>
			</div-->
		</div>
		<div class="row center-align hide-on-med-and-up">
			<div class="col s12">
				<a type="button" class="btn" id="pi2">Personal Information</a>
			</div>
		</div>
		<div class="row center-align hide-on-med-and-up">
			<div class="col s12">
				<a type="button" class="btn" id="ai2">Academic Information</a>
			</div>
		</div>
		<div  class="row perInfoRow">
			<div class="col s12" id="personalInfo">
			</div>
		</div>
			<!--a class="col s2 waves-effect btn" id="modifyBtn" style="margin-top: 4%;">Modify</a>
		</div>
		<div class="modify card-panel container" style="margin-left: 10%;">
			<div class="row">
				<form>
					<div class="row">
						<div class="input-field col s8">
							<input type="text" name="localAddress" id="localAddress" name="localAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
							<label for="localAddress">Local Address of Applicant (if any, in Bangalore) <span class="spanRed">*</span></label>
						</div>
						<div class="input-field col center s4">
							<input id="studentLocalMobile" name="studentLocalMobile" type="number" required>
							<label for="studentLocalMobile">Student Local Mobile <span class="spanRed">*</span></label>
						</div>
					</div>
					<div class="row">
					<button id="submitButton" class="btn waves-effect waves-light" style="margin-left: 10px;" type="submit" name="action">Update
							<i class="material-icons right">send</i>
						</button>
					</div>
				</form>
			</div>
		</div-->

		<div id="academicInfo" >
			<div class="row">
				<div class="col m6 s12">
					<div>
						<canvas  class="attendance" width="200" height="200" ></canvas>
					</div>
				</div>
				<div class="col m6 s12">
					<div>
						<canvas  class="marks" width="200" height="200" ></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div id="cca" class="row">
			</div>
		</div>
	</div>

	<?php
	$var = $usn;	
	?>

	<!-- javascript -->
	<script src = "<?php echo base_url('/assets/graph/Chart.min.js') ?>"></script>
	<script src = "<?php echo base_url('/assets/graph/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('/assets/js/materialize.min.js')?>"></script>    

	<!--
	<script src="<?php echo base_url('/assets/js/materialize.min.js')?>"></script>    
	<script src = "<?php // echo base_url('/assets/graph/attendanceBarGraph.js') ?>"></script>
-->

<script type="text/javascript">

	$(".button-collapse").sideNav();

	$(document).ready(function() {

		$("#personalInfo").css("display", "none");
		$("#academicInfo").css("display", "none");
	});

	$("#pi,#pi2").on("click", function() {

		$("#personalInfo").css("display", "block");
		$("#academicInfo").css("display", "none");
		$("#modifyBtn").css("display", "block");
	});

	$("#ai,#ai2").on("click", function() {

		$("#personalInfo").css("display", "none");
		$("#academicInfo").css("display", "block");
		$("#modifyBtn").css("display", "none");
	});

	$("#modifyBtn").on("click", function() {

		$("#personalInfo").css("display", "none");
		$("#academicInfo").css("display", "none");
		$("#modifyBtn").css("display", "none");
		$(".modify").css("display", "block");
	});



	var usn = "<?php echo $usn?>" ;
		//console.log(usn);

		var methodUrl = '<?php echo base_url("proctorController/attendance/");?>';
		var attendanceMethodUrl = methodUrl.concat(usn);

		var methodUrl2 = '<?php echo base_url("proctorController/returnMarks/");?>';
		var marksMethodUrl = methodUrl2.concat(usn);

		var personalInformationMethod = '<?php echo base_url("proctorController/retrievePersonalInformation/");?>';
		var personalInformationUrl = personalInformationMethod.concat(usn);

		var subjects = [];

		$(document).ready(function() {

	/**
	url : "http://localhost/ci/proctorController/retrieve_data"
	 * call the data.php file to fetch the result from db table.
	 */
	 //$('#area').empty();
	 $("#area").css("display", "block");
	 $(".attendance").css("display", "none");
	 $(".marks").css("display", "none");
	 console.log(usn);
	 console.log("   ");

	 $.ajax({
	 	url : personalInformationUrl,
	 	type : "GET",
	 	success : function (data) {
	 		//$("#personalInfo").html(data);
	 		console.log("fetching student personal Information");
	 		console.log(data);

	 		var Sname, Susn, Sfathername, Sauid;

	 		var len = data.length;



	 		if(len == 1){

	 			for (var i = 0; i < len; i++) {

	 				Sname = data[i].student_name;
	 				Susn = data[i].usn;
	 				Sauid = data[i].auid;
	 				Semail = data[i].student_email_id;
	 				Smobile = data[i].student_local_mobile;
	 				Saddress = data[i].student_local_address;
	 				Sfathername = data[i].parent_name;
	 			}
	 			console.log("//////");
	 			console.log(Sname);
	 			console.log(Susn);
	 			console.log(Sfathername);
	 			console.log("//////");
	 			var student = document.createElement('span');
	 			student.id = "student";
	 			student.innerText ="\n Name :"+ Sname + 
	 			"\n AUID :"+ Sauid + 
	 			"\n USN :" + Susn +
	 			"\n Mobile No :" + Smobile +
	 			"\n Father Name :"+ Sfathername +
	 			"\n Email ID :" + Semail +
	 			"\n Local Address:" + Saddress;
	 			$("#personalInfo").append(student);

	 		}
	 		else 
	 		{
	 			console.log("no data found");
	 		}

	 	},
	 	error : function(data) {
	 		console.log("Error in data parsing for personalInformation");
			//console.log(data);
			//console.log("error function");
		}

	});
	});


		$("#ai,#ai2").click(function() {

			$("#area").css("display", "none");
			$(".attendance").css("display", "block");
			$(".marks").css("display", "block");
			$.ajax({
				url : attendanceMethodUrl,
				type : "GET",
				success : function(data){
					console.log(data);
			//console.log("inside successfunction");

			var days_attended, total_days;
			var percent_per_subject = [];

			var len = data.length;
			
			

			for (var i = 0; i < len; i++) {
				
					//score.TeamA.push(data[i].sub1);
					days_attended = data[i].days_attended;
					total_days = data[i].total_days;
					subjects[i] = data[i].subject_code;
					percent_per_subject[i] = (days_attended/total_days)*100;

				}
				console.log(percent_per_subject);
				console.log(subjects);		
			//get canvas
			var ctx = $(".attendance");
			/*ctx.height = "200px";
			ctx.width = "200px";
			*/

			var data = {
				labels : subjects,
				datasets : [
				{
					label : "Student Attendance",
					data : percent_per_subject,
					backgroundColor : [
					"#FF6384",
					"#4BC0C0",
					"#FFCE56",
					"#FFC852"
					],
					borderColor : [
					"#FF6384",
					"#4BC0C0",
					"#FFCE56",
					"#FFCE26"
					],
					borderWidth : 1,
				}

				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Attendance Graph",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				},
				scales : {
					yAxes : [{
						ticks : {
							min : 0
						}
					}]
				}
			};

			var chart = new Chart( ctx, {
				type : "bar",
				data : data,
				options : options
			} );

			console.log("Nice,it seem's to be Working  for attendance graph!!! :)");
			console.log();

		},
		error : function(data) {
			console.log("Error in data parsing");
			console.log();
			//console.log(data);
			//console.log("error function");
		}
	});



			$.ajax({
				url : marksMethodUrl,
				type : "GET",
				success : function(data){
			/*
			console.log(data);
			console.log("++++" + data.length);
			console.log("++++" + subjects.length);
			console.log("inside successfunction 2");
			*/
			var dataLen = data.length;
			var firstInternalMarks = [];
			var secondInternalMarks = [];
			var thirdInternalMarks = [];
			var count1 = 0, count2 = 0, count3 = 0;

			for (var i = 0; i < subjects.length; i++) {
				for (var j = 0; j < data.length; j++) {
					
					if(data[j].subject_code == subjects[i] && data[j].internal == "1"){
						firstInternalMarks.push(data[j].marks);
						count1++;
					}
					else if(data[j].subject_code == subjects[i] && data[j].internal == "2"){
						secondInternalMarks.push(data[j].marks);
						count2++;
					}
					else if(data[j].subject_code == subjects[i] && data[j].internal == "3"){
						thirdInternalMarks.push(data[j].marks);
						count2++;

					}
				};
			};
			/*
			console.log(firstInternalMarks);
			console.log(secondInternalMarks);
			console.log(thirdInternalMarks);
			*/

			//get canvas
			var ctx = $(".marks");

			var data = {
				labels : subjects,
				datasets : [
				{
					label : "Internal I",
					xaxisID : "subjects",
					data : firstInternalMarks,
					borderColor : 'red',
					borderWidth : 3,
						//lineTension : 5,
						pointHoverborderColor : 'blue',
						pointHoverRadius: 5
					},

					{
						label : "Internal II",
						xaxisID : subjects,
						data : secondInternalMarks,
						borderColor : 'green',
						borderWidth : 3,
						//lineTension : 5,
						pointHoverborderColor : 'green',
						pointHoverRadius: 5
					},

					{
						label : "Internal III",
						xaxisID : subjects,
						data : thirdInternalMarks,
						borderColor : 'yellow',
						borderWidth : 3,
						//lineTension : 5,
						pointHoverborderColor : 'yellow',
						pointHoverRadius: 5
					}
					
					]
				};

				var options = {
					title : {
						display : true,
						position : "top",
						text : "Marks Graph",
						fontSize : 18,
						fontColor : "#111"
					},
					legend : {
						display : true,
						position : "bottom"
					},
					scales : {
						yAxes : [{
							ticks : {
								min : 0
							}
						}]
					}
				};

				var chart = new Chart( ctx, {
					type : "line",
					data : data,
					options : options
				} );

				console.log("Nice,it seem's to be Working for marks graph!!! :)");
				console.log();

			},
			error : function(data) {
				console.log("Error in data parsing");
			console.log();			//console.log("error function");
		}
	});

		});


	</script>

</body>
</html>