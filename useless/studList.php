<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
</head>
<body>
<div id="container">
	<h1>Student List</h1>
	<?php 
		echo form_open('studentRegistration/regValidate');

		echo validation_errors();
		
		echo '<p>Email:<br>';
		echo form_input('email');
		echo '</p>';

		echo '<p>Password:<br>';
		echo form_password('password');
		echo '<p>';

		echo form_submit('reg_submit','submit');

		echo form_close();
	?>
</div>
</body>
</html>