<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--contents of the dropdown menu-->
<ul id="dropdown1" class="dropdown-content">
	<li><a href="#!">Profile</a></li>
	<li class="divider"></li>
	<li><a href="<?php echo base_url('loginController/logout')?>">Logout</a></li>
</ul>
<!--contents of the dropdown menu end-->

<!--top navbar-->
<div class="navbar-fixed">
	<nav class="light-blue darken-3">
		<div class="nav-wrapper">
			<a href="#" data-activates="slide-out" class="button-collapse circle hide-on-large-only"><i style="padding-left: 20%; font-size: 25px;" class="material-icons">menu</i></a>
			<a class="brand-logo hide-on-med-and-down center"><?= $title?></a>
			<span style="padding-left: 5%; font-size: 20px;" class="hide-on-large-only"><?= $title?></span>
			<ul class="right hide-on-small-only">
			<li><a class="waves-effect waves-light dropdown-button" data-activates="dropdown1" data-beloworigin="true" style="min-width: 115px;"><?php echo explode(" ", trim($this->session->userdata('username')))[0]; ?> <i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
		</div>
	</nav>
</div>
<!--top navbar end-->