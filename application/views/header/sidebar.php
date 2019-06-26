<style>
	.aktip{
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
	.aktip:hover {
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
</style>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="<?php echo base_url() ?>assets/vendors/images/SAI.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown <?php echo $this->uri->segment(1) == 'Dasboard' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Dasboard" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">DASHBOARD</span>
						</a>
						
					</li>
					
					<li class=" <?php echo $this->uri->segment(1) == 'downtime' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/losstime" class="dropdown-toggle no-arrow">
							<span class="fa fa-chevron-circle-down"></span><span class="mtext">DOWNTIME</span>
						</a>
					</li>
					<li class=" <?php echo $this->uri->segment(1) == 'defect' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/defect" class="dropdown-toggle no-arrow">
							<span class="fa fa-times"></span><span class="mtext">DEFECT</span>
						</a>
					</li>

					<li class=" <?php echo $this->uri->segment(1) == 'Summary' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Summary" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-line-chart" aria-hidden="true"></i><span class="mtext">SUMMARY</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">

							<span class="fa fa-list-ol"></span><span class="mtext">SETTING KODE</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url() ?>/assycode">Assy</a></li>
							<li><a href="<?php echo site_url() ?>/defectcode">Defect</a></li>

							<li><a href="<?php echo site_url() ?>/errcode">Error</a></li>
							<!-- <li><a href="<?php echo site_url() ?>/losstimecode">Losstime</a></li>
							<li><a href="<?php echo site_url() ?>/regulasicode">regulasi</a></li>
							<li><a href="<?php echo site_url() ?>/conveyorscode">Conveyors</a></li> -->
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-group"></span><span class="mtext">Labor</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url() ?>/directlabor">Direct</a></li>
							<li><a href="<?php echo site_url() ?>/indirectlabor">Indirect</a></li>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">

							<span class="fa fa-list-ol"></span><span class="mtext">User</span>
						</a>
						<ul class="submenu">
							<!-- <li><a href="<?php echo site_url() ?>/conveyorscode">Kelola User</a></li> -->
						</ul>
					</li>

				</ul>
			</div>
		</div>
	</div>