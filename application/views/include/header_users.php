<?php 
	$sesi = $this->session->userdata('pdo_logged'); 
	$opt = $this->session->userdata('pdo_opt'); 
 ?>
<style>
	.hidenn{
	  display: none;
	} 
	.dipilih{

	}
</style>

	<div class="pre-loader"></div>
	<div class="header clearfix">

		<div class="header-right">

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">Jhonson</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right"> 
						<a class="dropdown-item" href="#"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
						<a class="dropdown-item" href="#"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div> 


			<div class="brand-logo">
				<a href="<?php echo site_url('Dasboard') ?>">
					<img src="<?php echo base_url() ?>assets/vendors/images/ico.png" alt="" class="mobile-logo">
				</a>
			</div>

			
  			
  			
			

		</div>
	</div>
