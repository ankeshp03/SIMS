<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/chosen.min.css">
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(e) {
			$(".names").chosen();
		});
	</script>
</head>
<body>

<select class="names" style="width:300px;">
	<option value="1">USA</option>
	<option value="91" selected>India</option>
	<option value="44">UK</option>
</select>

</body>
</html>