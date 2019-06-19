	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="<?php echo base_url() ?>assets/vendors/images/deskapp-logo.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">DASHBOARD</span>
						</a>
						
					</li>
					
					<li>
						<a href="<?php echo site_url() ?>/downtime" class="dropdown-toggle no-arrow">
							<span class="fa fa-chevron-circle-down"></span><span class="mtext">DOWNTIME</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url() ?>/defect" class="dropdown-toggle no-arrow">
							<span class="fa fa-times"></span><span class="mtext">DEFECT</span>
						</a>
					</li>

					<li>
						<a href="calendar.php" class="dropdown-toggle no-arrow">
							<!-- <i class="fas fa-chart-area"></i> -->
							<i class="icon-copy fa fa-line-chart" aria-hidden="true"></i><span class="mtext">SUMMARY</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">

							<span class="fa fa-list-ol"></span><span class="mtext">Code Settings</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo site_url() ?>/assycode">Assy</a></li>
							<li><a href="<?php echo site_url() ?>/defectcode">Defect</a></li>
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


					
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-desktop"></span><span class="mtext"> UI Elements </span>
						</a>
						<ul class="submenu">
							<li><a href="ui-buttons.php">Buttons</a></li>
							<li><a href="ui-cards.php">Cards</a></li>
							<li><a href="ui-cards-hover.php">Cards Hover</a></li>
							<li><a href="ui-modals.php">Modals</a></li>
							<li><a href="ui-tabs.php">Tabs</a></li>
							<li><a href="ui-tooltip-popover.php">Tooltip &amp; Popover</a></li>
							<li><a href="ui-sweet-alert.php">Sweet Alert</a></li>
							<li><a href="ui-notification.php">Notification</a></li>
							<li><a href="ui-timeline.php">Timeline</a></li>
							<li><a href="ui-progressbar.php">Progressbar</a></li>
							<li><a href="ui-typography.php">Typography</a></li>
							<li><a href="ui-list-group.php">List group</a></li>
							<li><a href="ui-range-slider.php">Range slider</a></li>
							<li><a href="ui-carousel.php">Carousel</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-paint-brush"></span><span class="mtext">Icons</span>
						</a>
						<ul class="submenu">
							<li><a href="font-awesome.php">FontAwesome Icons</a></li>
							<li><a href="foundation.php">Foundation Icons</a></li>
							<li><a href="ionicons.php">Ionicons Icons</a></li>
							<li><a href="themify.php">Themify Icons</a></li>
						</ul>
					</li> -->
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-plug"></span><span class="mtext">Additional Pages</span>
						</a>
						<ul class="submenu">
							<li><a href="video-player.php">Video Player</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="forgot-password.php">Forgot Password</a></li>
							<li><a href="reset-password.php">Reset Password</a></li>
							<li><a href="403.php">403</a></li>
							<li><a href="404.php">404</a></li>
							<li><a href="500.php">500</a></li>
						</ul>
					</li> -->
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-pie-chart"></span><span class="mtext">Charts</span>
						</a>
						<ul class="submenu">
							<li><a href="highchart.php">Highchart</a></li>
							<li><a href="knob-chart.php">jQuery Knob</a></li>
							<li><a href="jvectormap.php">jvectormap</a></li>
						</ul>
					</li> -->
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-clone"></span><span class="mtext">Extra Pages</span>
						</a>
						<ul class="submenu">
							<li><a href="blank.php">Blank</a></li>
							<li><a href="contact-directory.php">Contact Directory</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li><a href="blog-detail.php">Blog Detail</a></li>
							<li><a href="product.php">Product</a></li>
							<li><a href="product-detail.php">Product Detail</a></li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="pricing-table.php">Pricing Tables</a></li>
						</ul>
					</li> -->
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-list"></span><span class="mtext">Multi Level Menu</span>
						</a>
						<ul class="submenu">
							<li><a href="javascript:;">Level 1</a></li>
							<li><a href="javascript:;">Level 1</a></li>
							<li><a href="javascript:;">Level 1</a></li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">
									<span class="fa fa-plug"></span><span class="mtext">Level 2</span>
								</a>
								<ul class="submenu child">
									<li><a href="javascript:;">Level 2</a></li>
									<li><a href="javascript:;">Level 2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Level 1</a></li>
							<li><a href="javascript:;">Level 1</a></li>
							<li><a href="javascript:;">Level 1</a></li>
						</ul>
					</li> -->
					<!-- <li>
						<a href="sitemap.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-sitemap"></span><span class="mtext">Sitemap</span>
						</a>
					</li> -->
					<!-- <li>
						<a href="chat.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-comments-o"></span><span class="mtext">Chat <span class="fi-burst-new text-danger new"></span></span>
						</a>
					</li> -->
					<!-- <li>
						<a href="invoice.php" class="dropdown-toggle no-arrow">
							<span class="fa fa-map-o"></span><span class="mtext">Invoice</span>
						</a>
					</li> -->
				</ul>
			</div>
		</div>
	</div>