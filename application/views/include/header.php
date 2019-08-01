
<?php 
	$sesi = $this->session->userdata('pdo_logged'); 
 ?>


	<div class="pre-loader"></div>
	<div class="header clearfix">

		<div class="header-right">


			<!-- info USer -->
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name"><?php echo $sesi['nama']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right"> 
						<a class="dropdown-item" href="profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
						<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="<?php echo site_url('Login/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div> 

			<div class="user-notification">
				<div class="dropdown">  
					<div class="input-group custom input-group-sm">
						<input id="slect_date" class="form-control date-picker arrow" placeholder="Select Date" type="text" style="margin-top: -5px;">
						<div class="input-group-append custom">
							<span class="input-group-text" style="margin-top: -5px"><span class="icon-copy ti-calendar"></span></span>
						</div>
					</div>
				</div>
			</div>

			<div class="brand-logo">
				<a href="index.php">
					<img src="<?php echo base_url() ?>assets/vendors/images/logo.png" alt="" class="mobile-logo">
				</a>
			</div>


			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span> 
			</div>
  			 
			

		</div> 
	</div>