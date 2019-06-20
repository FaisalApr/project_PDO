<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Site favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">

</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<!-- top icon dasboard -->
		<div class="row clearfix progress-box">

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Output</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">HM Out</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">MH IN</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Efficiency</h5>
					<div class="card-body progress-box text-center" style="margin-top: -20px;" > 
						<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="56">78%</font></span>
						</center>	 
						<span class="font-14 padding-top-10">Direct Effective <i class="fa fa-line-chart"></i></span>  
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Productivity</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="56">89%</font></span>
							</center>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Man Power</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56">56</font></span>
						</center>	
					</div> 
				</div>
			</div>
		</div>
			
		<!-- Tabel -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> 
			<table class="table table-striped table-bordered">
				<thead> 
					<tr> 
						<th colspan="5" style="text-align: center;">Assy</th>  
						<th>58831</th>  
						<th style="border: none;">
							<button href="#" class="btn" data-toggle="modal" data-target="#login-modal"  type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah <i class="icon-copy fa fa-plus" ></i></button>
						</th>
					</tr>
					<tr> 
						<th colspan="5" style="width: 45%; text-align: center;">UMH</th>  
						<th>3.5583275</th> 
					</tr>
					<tr> 
						<th scope="col" style="width: 5%;">Jam</th>
						<th scope="col" style="width: 5%;">Plan</th>
						<th scope="col" style="width: 5%;">Cum Plan</th>
						<th scope="col" style="width: 5%;">Act</th>
						<th scope="col" style="width: 5%;">Cum Act</th>
						<th scope="col" >A</th> 
						<th style="width: 5%; border: none;"></th>
						<th style="width: 100%; border: none;"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>10</td>
						<td></td>
						<td>9</td> 
						<td></td>
						<td>11</td> 
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>12</td>
						<td>22</td>
						<td>9</td> 
						<td>18</td> 
						<td>9</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>14</td>
						<td>36</td>
						<td>13</td> 
						<td>31</td>
						<td>13</td>
					</tr>
					<tr>
						<td style="border: none;" colspan="5"><button href="#" class="btn" data-toggle="modal" data-target="#login-modal"  type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah <i class="icon-copy fa fa-plus" ></i></button></td>
					</tr>
					
				</tbody>
			</table>
			
		</div>

	</div>
</div>

</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 

	<script> 
	</script>
</html>