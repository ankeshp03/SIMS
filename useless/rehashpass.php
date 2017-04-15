<!DOCTYPE html>
<html>
<head>
	<title>Check hash</title>
</head>
<body>
<form method="post" action="<?php echo base_url('secure/recheck')?>">
	<input type="email" name="remail" placeholder="email">
	<input type="password" name="repass" placeholder="password">
	<input type="submit" class="btn">
</form>
</body>
</html>