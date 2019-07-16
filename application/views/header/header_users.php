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
						<span class="user-name"><?php echo $sesi['nama']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right"> 
						<a class="dropdown-item" href="profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
						<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="<?php echo site_url('Login/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div> 

			<!-- DATE PICKER -->
			<div class="user-notification row">
				<div style="margin-top: -22px; margin-right: 15px;"> 
	  				<img src="<?php echo base_url() ?>assets/src/images/verif.png" height="70" width="70" class="mobile-logo" id="id_verif" style="display: none;">
	  			</div> 
				<div class="dropdown">  
					<div class="input-group custom input-group-sm">
						<input id="slect_date" class="form-control date-pickerrr" type="text" style="margin-top: -5px;">
						<div class="input-group-append custom">
							<span class="input-group-text" style="margin-top: -5px"><span class="icon-copy ti-calendar"></span></span>
						</div>
					</div>
				</div>
			</div>

			<div class="brand-logo">
				<a href="<?php echo site_url('Dasboard') ?>">
					<img src="<?php echo base_url() ?>assets/vendors/images/ico.png" alt="" class="mobile-logo">
				</a>
			</div>

			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span> 
			</div>
  			
  			<div class="row">
  				<div class="dropdown">  
					<div class="input-group custom input-group-sm" style="margin-top: 10px; margin-left: 15px;">
						<div style="margin-top: -10px;"><font size="46">Line:</font> </div>
						<select class="select2 js-states form-control" id="select_line" style="width: 100px; "> 
							
						</select> 
					</div>
				</div>

	  			<div style="margin-left: 50px;">
	  				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"> 
	  					<font size="46">Shift:</font>  
						<span class="col-sm-12 align-content-center text-blue weight-800" style="margin-left: -10px;"><font size="56" id="id_sifname"><?php 
						if($opt['id_shift']=='1'){ echo 'A'; }else{ echo 'B';} ?></font></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" id="drop_shiftt">  
						<a class="dropdown-item pilih_sf <?php if($opt['id_shift']=='1') echo 'aktip' ?>" id="sf_a" href="#" data-value="1">A <?php if($sesi['keterangan']=='A') echo ' (Sekarang)' ?></a> 
						<a class="dropdown-item pilih_sf <?php if($opt['id_shift']=='2') echo 'aktip' ?>" id="sf_b" href="#" data-value="2">B <?php if($sesi['keterangan']=='B') echo ' (Sekarang)' ?></a>
					</div>
	  			</div>

	  			<div style="margin-left: 50px;" class="<?php echo $this->uri->segment(1) != 'Dasboard' ? 'hidenn': '' ?>">
	  				<font size="46">Speed:</font> 
					<span class="col-sm-12 align-content-center text-blue weight-800" style="margin-left: -10px;"><font size="56" id="id_speedline"></font><a href="#" id="btn_changesped" ><i class="fa fa-cog" aria-hidden="true"></i></a></span>
	  			</div>	
 
  			</div>
  			 
			

		</div>
	</div>
