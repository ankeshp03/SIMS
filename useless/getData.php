<!DOCTYPE html>
<html>
<head>
	<title>getData</title>
</head>
<body>
	<ul>
		<?php foreach($value as $v) { ?>
		<li>
			Data : <?php
				if($v->value)
					echo $v->value;
				else
					echo "nothing to show!";
				} ?>
		</li>
	</ul>
</body>
</html>