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
					
					 
				</ul>
			</div>
		</div>
	</div>