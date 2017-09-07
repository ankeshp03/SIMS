<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--side nav for large and med screen-->
<aside>
	<ul class="side-nav fixed z-depth-0" style="background-color: transparent; padding-top: 80px;  width: 180px;">
		<li><a style="margin-left: -95px;" href="<?php echo base_url('adminController')?>" class="center waves-effect waves-light grey-text text-darken-3">Home</a></li>
		<li><a style="margin-left: -15px;" href="<?php echo base_url($link1)?>" class="center waves-effect waves-light <?= $color1?>-text text-darken-3">Student Admission</a></li>
		<li><a style="margin-left: -8px;" href="<?php echo base_url($link2)?>" class="center waves-effect waves-light <?= $color2?>-text text-darken-3">Faculty Registration</a></li>
		<li><a style="padding: 0px" href="<?php echo base_url($link3)?>" class="center waves-effect waves-light <?= $color3?>-text text-darken-3">Recent Registrations</a></li>
	</ul>
</aside>
<!--side nav end-->