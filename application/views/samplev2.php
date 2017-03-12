<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php foreach($data as $d) { ?>
<h1>
<?php  	echo $d->name;
		echo $d->usn; 
		echo $d->dob;
		}?>
</h1> 
</body>
</html>