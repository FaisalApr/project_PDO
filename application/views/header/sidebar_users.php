<style>
	.aktip{
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
	.aktip:hover {
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
	.hidenn{
	  display: none;
	} 
</style>
<?php 
	$sesi = $this->session->userdata('pdo_logged'); 
?>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo site_url('Dasboard') ?>">
				<img src="<?php echo base_url() ?>assets/vendors/images/SAI.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<!-- start LI -->
					<li class="dropdown <?php echo $this->uri->segment(1) == 'Dasboard' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Dasboard" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">DASHBOARD</span>
						</a> 
					</li>
					
					<li class=" <?php echo $this->uri->segment(1) == 'losstime' ? 'aktip': '' ?>">
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

					<li class="dropdown <?php echo $this->uri->segment(1) == 'directlabor' ? 'aktip': '' ?> <?php echo $this->uri->segment(1) == 'indirectlabor' ? 'aktip': '' ?>">
						<a href="javascript:;" class="dropdown-toggle">
							<i class="icon-copy fa fa-group" aria-hidden="true"></i><span class="mtext">MAN POWER</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url() ?>/directlabor">Direct</a></li>
							<li><a href="<?php echo site_url() ?>/indirectlabor">Indirect</a></li>
						</ul>
					</li>
					
					<li class=" <?php echo $this->uri->segment(1) == 'Export' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/Export" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-file-archive-o" aria-hidden="true"></i><span class="mtext">Export</span>
						</a>
					</li> 

					<!-- FITUR EXTRA ADMIN -->
					<hr class="<?php echo $sesi['level']!=1 ? 'hidenn': '' ?>"> 
					
					<li class=" <?php echo $this->uri->segment(1) == 'supervisor' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/supervisor" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-id-badge" aria-hidden="true"></i><span class="mtext">Supervisor</span>
						</a>
					</li>
					
					<li class=" <?php echo $this->uri->segment(1) == 'Users' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/Users" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-id-card-o" aria-hidden="true"></i><span class="mtext">Users</span>
						</a>
					</li> 

					<li class=" <?php echo $this->uri->segment(1) == 'carline' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/carline" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-car" aria-hidden="true"></i><span class="mtext">Carline</span>
						</a>
					</li> 

					<li class=" <?php echo $this->uri->segment(1) == 'line' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/line" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-code-fork" aria-hidden="true"></i><span class="mtext">Line Manager</span>
						</a>
					</li> 

					<li class=" <?php echo $this->uri->segment(1) == 'assycode' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/assycode" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-briefcase" aria-hidden="true"></i><span class="mtext">Assy Manager</span>
						</a>
					</li> 
					
					<li class=" <?php echo $this->uri->segment(1) == 'errcode' ? 'aktip': '' ?>  <?php echo $sesi['level']!=1 ? 'hidenn': '' ?>">
						<a href="<?php echo site_url() ?>/errcode" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-arrow-circle-down" aria-hidden="true"></i><span class="mtext">Downtime Manager</span>
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>