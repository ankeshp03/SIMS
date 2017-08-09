<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--side nav for large screen-->
<aside>
	<ul class="side-nav fixed z-depth-0" style="background-color: transparent; padding-top: 80px;  width: 180px;">
		<li><a style="margin-left: -70px;" href="<?php echo base_url('headProctorController')?>" class="center waves-effect waves-light <?= $color1?>-text text-darken-3"><?= $text1?></a></li>
		<li><a id="reassign1" href="<?php echo base_url('headProctorController/reassignProctor')?>" class="center waves-effect waves-light grey-text text-darken-3"><?= $text2?></a></li>
	</ul>
</aside>
<!--side nav end-->