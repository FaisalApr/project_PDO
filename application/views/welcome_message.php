<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<style>
		.data_:hover {
		  background-color: white;
		  color: black;
		}
		.data_{
			color: white;
		}
	</style>

<body>
<?php $this->load->view('include/header_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<center>
		<div class="row">
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
				
					<div  style="margin-top: 50px; margin-right: -50px" >
						<div class="da-card box-shadow">
							<div class="da-card-photo">
								<img src="assets/vendors/images/img3.jpg" alt="">
								<div class="da-overlay">
									<div class="da-social">
										<a href="<?php echo site_url() ?>/IData" >
											<div class="clearfix data_" style="outline: 2px solid white; vertical-align: center">
												<h3 class="data_" style="padding: 4px">&nbsp Data &nbsp</h3>
											</div>
										</a>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
				
					<div  style="margin-top: 50px; margin-right: -50px" >
						<div class="da-card box-shadow">
							<div class="da-card-photo">
								<img src="assets/vendors/images/img3.jpg" alt="">
								<div class="da-overlay">
									<div class="da-social">
										<div class="clearfix " style="outline: 2px solid white; vertical-align: center">
											<a href="<?php echo site_url() ?>/Simulasi" ><h3 style="color: white; padding: 4px" >&nbsp Simulasi &nbsp</h3></a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>
		</div>
		</center>
		

	</div>
</div>

<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
</body>
</html>