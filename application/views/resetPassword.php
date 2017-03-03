<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	<form method="post" action="<?php echo base_url('loginController/setPassword')?>">
		<input type="password" name="password" placeholder="Password"> <br>
		<input type="password" name="confirmPassword" placeholder="Confirm Password"> <br>
		<input type="submit">
		<input type="hidden" name="key" value="<?= $key?>">
	</form>
</body>
</html>