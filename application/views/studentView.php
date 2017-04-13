<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('username')) {
	redirect($_SERVER['HTTP_REFERER']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->session->userdata('usn'); ?></title>
</head>
<body>
<ul class="collapsible" style="margin-top: 30px; letter-spacing: 0.1px;" data-collapsible="expandable">
		<li>
			<div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
			<div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		</li>
		<li>
			<div class="collapsible-header"><i class="material-icons">place</i>Second</div>
			<div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		</li>
		<li>
			<div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
			<div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
		</li>
	</ul>
</body>
</html>