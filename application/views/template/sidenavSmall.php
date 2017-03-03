<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--contents of the side navbar for small screen-->
	<ul id="slide-out" class="side-nav hide-on-large-only" style="width: 308px;">
    <li style="padding-top: 5%;"><span style="padding-left: 5%; font-size: 15px;"><?= $title?></span></li>
    <li><div class="divider"></div></li>
    <li style="padding-top: 5%;"><a href="<?php echo base_url($link1)?>" class="waves-effect blue-text text-darken-3">Student Registration</a></li>
    <li><a class="waves-effect" href="#!">Faculty Registration</a></li>
  </ul>
  <!--contents of the side navbar for small screen end-->