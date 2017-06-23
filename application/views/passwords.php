<!DOCTYPE html>
<html>
<head>
	<title>passsword</title>
</head>
<body>
 <form method="post" action="<?php echo base_url('loginController/generate')?>">
 	<input type="text" id="password" name="password">
 	<input type="submit" id="submit" name="submit">
 </form>
</body>
</html>