<!DOCTYPE html>
<html>
<head>
	<title>Check hash</title>
</head>
<body>
<form method="post" action="<?php echo base_url('secure/check')?>">
	<input type="email" name="email" placeholder="email">
	<input type="password" name="pass" placeholder="password">
	<input type="submit" class="btn">
</form>
</body>
</html>