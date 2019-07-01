<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Dashboard</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">
	
	<!-- HTML CANVAS  -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/src/plugins/html2canvas-master/dist/html2canvas.js"></script>



	<style type="text/css">
		.signature-pad { 
		  font-size: 10px;
		  max-width: 700px;
		  max-height: 460px;
		  border: 1px solid #e8e8e8;
		  background-color: #fff;
		  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
		  border-radius: 4px;
		  padding: 16px;
		}
	</style>
</head>
<body> 
<input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>"> 
<input id="id_target" type="hidden" class="form-control" value=""> 
<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?>
 
<!--    Modall AREA    -->
<div>
	<!--  Modal Edit ASSSY  -->
		<div class="modal fade" id="modal_ubah_assy">
		    <div class="modal-dialog modal-dialog-centered modal-md">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h2 class="text-center mb-10" id="heder_assy">Edit Assy</h2>
				</div>
		        
		        <!-- Modal body -->
		        <div class="modal-body"> 
					<div class="form-group">
						<label>Ubah ke Assy Number</label>
						<select class="custom-select2 form-control" name="state" id="pilihasy1" style="width: 100%; height: 38px;">
							  
						</select>
					</div>
					<input type="hidden" name="id_assy_old">

				</div>
				<center>
					<button type="button" class="btn btn-danger" style="margin-right: 30px;" id="btn_hapus_assy">Hapus Assy</button>  
					<button type="button" class="btn btn-primary" id="btn_pindah_assy" >Pindahkan</button>
				</center>
				<br> 
		      </div>
		    </div>
		</div>
	<!--  Modal  Speed Conveyor -->
		<div class="modal fade" id="scv_modal">
		    <div class="modal-dialog modal-dialog-centered modal-md">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Ubah Kecepatan Conveyor</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		        	<div class="clearfix device-usage-chart">
						<div class="width-50-p pull-left">
							<div id="spd_cv" style="min-width: 160px; max-width: 180px; height: 200px; margin: 0 auto"></div>
						</div>
						<div class="width-50-p pull-right">
							<div class="form-group">
								<label>Speed</label>
								<input id="demo1" type="number" value="<?php echo $pdo->line_speed ?>" name="speed_edit"> 
								<input  type="hidden" value="<?php echo $pdo->line_speed ?>" name="speed_edit_temp"> 
							</div>
							<br> 
							<div class="input-group"> 
								<a class="btn btn-primary btn-lg btn-block" id="btn_update_speed" href="#">update</a>
							</div>

						</div>
					</div>

		        </div> 
		        
		      </div>
		    </div>
		</div>
	<!--  Modal  Plan -->
		<div class="modal fade" id="updtplan_modal">
		    <div class="modal-dialog modal-dialog-centered modal-sm">
		      <div class="modal-content">
			        <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Edit Plan</h2>
						<form> 
							<div class="input-group custom input-group-lg">
								<input type="number" id="plan_editfom" class="form-control">
								<input type="hidden" id="id_plan_editfom" class="form-control">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-check-square-o" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_update_plan" href="#">update</a>
									</div>
								</div>
							</div>
						</form>
					</div>
		      </div>
		    </div>
		</div>
	<!-- modal edit per items (login-modal) -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Edit Actual</h2>
						<form> 
							<div class="input-group custom input-group-lg">
								<input type="number" id="act_editfom" class="form-control">
								<input type="hidden" id="id_act_editfom" class="form-control">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-tasks" aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_update_act" href="#">update</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Add Build -->
		<div class="modal fade" id="modalnewbuild">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form id="fomaddbuild">
						<div class="modal-header">
							<h4 class="modal-title">Build Assy Baru</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<div class="modal-body"> 
							<div class="form-group">
								<label>Assy Number</label>
								<select class="custom-select2 form-control" name="state" id="pilihasy" style="width: 100%; height: 38px;">
									  
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<input id="idjamke" type="hidden" class="form-control" > 
							<button type="button" class="btn btn-primary" id="btn_newbuildassy">Tambahkan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- Modal Add new Jam ke -->
		<div class="modal fade" id="modaladdjamke">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pindah Jam </h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
					</div>
					<div class="modal-body">
						<div class="input-group custom input-group-lg" >
							<center><H3 id="id_labeljam"></H3></center>
							<input id="terus_jam_ke" type="hidden" class="form-control"> 
						</div> 
						<div class="form-group">
							<label>Jumlah Plan 🎯 :</label>
							<input id="jum_plann" type="number" class="form-control"> 
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btn_pindahjam">Pindah Jam</button>
					</div>
				</div>
			</div>
		</div>
	<!--  Modal  NEW PLAN BULANAN -->
		<div class="modal fade" id="newplanmonth_modal">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h2 class="text-center mb-30">Buat Panning Bulan Ini</h2>
				</div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		        	<br>
		        	<div class="row"> 
			        	<div class="col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="card box-shadow">
								<div class="card-header"> 
									<div class="project-info-center">
										<h5 class="text-center weight-500">MH Out</h5>
									</div> 
								</div>
								
								<div class="card-body"> 
									<div class="form-group">
										<label>Planning MH-Out</label>
										<input type="Number" name="target_mhout" class="form-control" value="0">
									</div>
								</div> 
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="card box-shadow">
								<div class="card-header"> 
									<div class="project-info-center">
										<h5 class="text-center weight-500">MH IN</h5>
									</div> 
								</div>
								<div class="card-body"> 
									<div class="form-group">
										<label>Planning MH-In</label>
										<input type="Number" name="target_mhin" class="form-control" value="0">
									</div>
								</div> 
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 mb-30">
							<div class="card box-shadow">
								<div class="card-header"> 
									<div class="project-info-center">
										<h5 class="text-center weight-500">Efficiency</h5>
									</div> 
								</div> 
								<div class="card-body"> 
									<div class="form-group">
										<label>Planning Efficiency %</label>
										<input type="Number" name="eff_new" class="form-control" value="95">
									</div>
								</div> 
							</div>
						</div>
					</div>

					<br>
					<center>
						<a href="#" id="btn_submt_newtarget" class="btn btn-block btn-success">Simpan</a>
					</center>
		        </div> 
		        
		      </div>
		    </div>
		</div>
	<!-- Modal Edit MH OUT  BULAN -->
		<div class="modal fade" id="modal_edit_mhout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Edit Panning MH-OUT</h2>
						<form> 
							<div class="modal-body"> 
								<div class="form-group">
									<label>Plan Bulan Ini</label>
									<input type="text" class="form-control" name="edit_target_mhout">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_submit_mhout" href="#">update</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Edit MH IN  BULAN-->
		<div class="modal fade" id="modal_edit_mhin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Edit Panning MH-IN</h2>
						<form> 
							<div class="modal-body"> 
								<div class="form-group">
									<label>Plan Bulan Ini</label>
									<input type="text" class="form-control" name="edit_target_mhin">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_submit_mhin" href="#">update</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Edit EFFICIENCY  BULAN-->
		<div class="modal fade" id="modal_edit_efff" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Edit Efficiency</h2>
						<form> 
							<div class="modal-body"> 
								<div class="form-group">
									<label>Plan Bulan Ini</label>
									<input type="text" class="form-control" name="edit_target_eff" value="98%">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_submit_eff" href="#">update</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- Modal Submit Hari Ini-->
	<div class="modal fade" id="modal_submit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="bg-white box-shadow pd-ltr-20 border-radius-5"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h2 class="text-center mb-30">Verifikasi Supervisor</h2> 
					<hr>
					<center>
					  <canvas id="signature-pad" class="signature-pad" width=400 height=300></canvas>
					  <button id="clearr" class="btn btn-info btn-sm">ulangi</button>
					</center>  

					<hr>
					<label >Enter Passcode :</label>
					<center>
					<div class="row">
						<div class="col-md-3"></div>
	                	<div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control pinnn" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div>
		                <div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div>
		                <div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div>
		                <div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div> 
		                <div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div> 
		                <div class="col-md-1">
		                    <div class="form-group"> 
		                      <input class="form-control" type="password" style="text-align: center;" maxlength="1"> 
		                    </div>
		                </div> 
		                <div class="col-md-3"></div>
	                </div>
	                <br>
	                </center>
					<center><button class="btn btn-primary btn-block" id="btn_submit_pdo">Submit</button></center>
					<br>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- End Modal --> 

<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll  xs-pd-20-10">
		<!-- top icon dasboard -->
		<div class="row clearfix progress-box">

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Output</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16" id="tot_plan"></span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted" id="tot_actual"></div>
							</div>
							<div class="progress" style="height: 20px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" id="id_progres_output" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">90%</div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<div class="card-header"> 
						<div class="project-info-center">
							<h5 class="text-center weight-500">MH Out</h5>
						</div>
						<div class="project-info-right" style="margin-top: -23px">
							<a href="#" id="trigger_mhout" class="text-right"><i class="fa fa-cog" aria-hidden="true"></i></a>	
						</div>
					</div>
					
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16" id="id_target_mhout"></span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted" id="id_act_mhout"></div>
							</div>
							<div class="progress" style="height: 20px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120" id="prog_mh_out"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<div class="card-header"> 
						<div class="project-info-center">
							<h5 class="text-center weight-500">MH IN</h5>
						</div>
						<div class="project-info-right" style="margin-top: -23px">
							<a href="#" class="text-right" id="triger_mhin"><i class="fa fa-cog" aria-hidden="true"></i></a>	
						</div>
					</div>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16" id="id_target_mhin">0</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted" id="id_mhinact">0</div>
							</div>
							<div class="progress" style="height: 20px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120" id="prog_mh_in"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<div class="card-header"> 
						<div class="project-info-center">
							<h5 class="text-center weight-500">Efficiency</h5>
						</div>
						<div class="project-info-right" style="margin-top: -23px">
							<a href="#" id="trigger_eff" class="text-right"><i class="fa fa-cog" aria-hidden="true"></i></a>	
						</div>
					</div> 
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16" id="id_target_eff">0%</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted" id="id_act_eff">0%</div>
							</div>
							<div class="progress" style="height: 20px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" id="id_act_eff_progres"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Productivity</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="56" id="id_prod_percent">0</font>%</span>
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
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56" id="id_mp_act">0</font></span>
							<i class="icon-copy fi-torsos-male-female"></i>
						</center>	
					</div> 
				</div>
			</div>
		</div>
			
		<!-- Tabel -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="margin-top: -10px">  
			<table class="table table-responsive table-striped table-bordered" style="padding-bottom: 25px;">
				<thead id="thead_outputt"> 
					 
				</thead>
				<tbody id="tbody_outputt">

					 
				</tbody> 

			</table>
			<br>
		</div>

	</div>
</div>
 
</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<!-- add sweet alert js & css in footer -->
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  
	<!-- Spedometer charts -->
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<!-- TOuch SPIN -->
	<script src="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script> 
	<!-- you load jquery somewhere before jSignature ... -->
	<script src="<?php echo base_url() ?>assets/src/plugins/jsignature-pad/js/signature_pad.umd.js"></script>


	<script> 
		$('document').ready(function(){ 

		// deklarasi nama bulan
 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

 		// VARIABEL GLOBAL
 			let today = new Date();
			var currentMonth = today.getMonth();
			var currentYear = today.getFullYear();
			var currDate = today.getDate();
			var jum_jam = 0;
			var output_sesuai = false;
			var loss_output = 0;
			var total_loss_detik=0;
			var tot_mhout = 0; //witget mhout actual
			var tot_mhinall = 0 ; //for widget mhin actual total
			var eff_actual = 0; //for widget eff actual
			var edittarget= false; // jika target sudah ada maka bisa diedit
			var max_jamkerja = 0; 
 
            document.getElementById('slect_date').value=currDate+' '+monthName[currentMonth]+' '+currentYear;

		// auto load
			showdata();    


			$('.date-pickerrr').datepicker({   
				language: "en",
				firstDay: 1,  
			    onSelect: function(selected, d, calendar) {
			    	let tod = new Date(selected); 
			    	document.getElementById('slect_date').value=tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
			    	calendar.hide();
			    }
			});

			// fungsi main
			function showdata() { 
				var htmlhead1 = '';
                var htmlhead2 = '';
                var htmlhead3 = '';
                var htmltotalbawah = '';
                var htmltotalbawahMhOt = '';
                var totActual=[]; 
                var db_head;

                loss_output = 0;

                // get data per pdo
				$.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo site_url("OutputControl/getDataOutputControl");?>',
                    dataType : 'JSON',
                    data:{
                    	id_pdo:$('#id_pdo').val()
                    },
                    success : function(res){  
                        var html = '';
                        var t_plan=0;
                        var t_act=0;
                        var id_jamke;
                        var jam_ke=0;

                        // isi ke variabel
                        var data = res.data;
                        total_loss_detik = res.to_lossdetik.tot_loss_detik;
                        max_jamkerja = Number(res.data_dl.jam_reg)+Number(res.data_dl.jam_ot);  

                        // header
                        htmlhead1 +=
                        	'<tr>'+
								'<th colspan="4" style="text-align: center;">Assy</th>';
						htmlhead2 +=
								'<th style="border: none;">'+
									'<button href="#" class="btn btn-success newBuildass" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Assy <i class="icon-copy fa fa-plus" ></i></button>'+
								'</th>'+
							'</tr>'+
							'<tr>'+
								'<th colspan="4" style="width: 45%; text-align: center;">UMH</th>';
						htmlhead3 +=
							'</tr>'+
							'<tr>'+
								'<th scope="col" colspan="2" style="width: 5%; text-align: center;">Jam Ke-</th>'+
								'<th scope="col" style="width: 5%;">Plan</th>'+
								'<th scope="col" style="width: 5%;">Act</th>';
 
						// membuat header tabel
						$.ajax({
		                    async : false,
			                type : "POST",
			                url   : '<?php echo base_url();?>index.php/OutputControl/getDataBuildAssyHeader',
			                dataType : "JSON",
			                data : { id:$('#id_pdo').val() },
			                success: function(response){  
			                	//isi db
			                	db_head = response;

			                	for (var a = 0; a < response.length; a++) { 
				                		htmlhead1 +=
				                			'<th><a href="#" class="btn_changeassy" data-id_assy="'+response[a].id_assy+'" data-kode="'+response[a].kode_assy+'">'+response[a].kode_assy+'</a></th>';
				                		htmlhead2 +=
				                			'<th>'+response[a].umh+'</th>';
				                		htmlhead3 +=
				                			'<th scope="col" align="center" >A</th>';
			                		} 

			                }
		                });

						// membuat data per rows / jamke-
						jum_jam = data.length; //untuk mengetahui jumlah data jam ke
                        for(var i=0; i<data.length; i++){ 

                        	html +=  
                            '<tr>'+
								'<th scope="row" colspan="2" style="text-align: center;">'+data[i].jam_ke+'</th>';
							var tm ='';

							// iff last row PLanning bisa diganti
							tm='<td><a href="#" class="plan_edit" data-idr="'+data[i].id+'" data-jum="'+data[i].plan+'">'+data[i].plan+'</a></td>';

							// jika output tidak sesuai
							if (Number(data[i].actual)<Number(data[i].plan)) {
								tm+=
								'<td scope="row" bgcolor="#FF525B">'+data[i].actual+'</td>'; 
								output_sesuai = false;
								loss_output += data[i].plan - data[i].actual; 
							}else {
								tm+=
								'<td>'+data[i].actual+'</td>'; 
								output_sesuai = true; 
							}
							html +=	tm;
								

                        	// Data detail per row 
                        	
                        	$.ajax({
			                    async : false,
				                type : "POST",
				                url   : '<?php echo base_url();?>index.php/OutputControl/getDataBuildAssy',
				                dataType : "JSON",
				                data : { id:data[i].id },
				                success: function(response){    

				                	
				                	// mengulang sebanyak head
				                	for (var ir = 0; ir < db_head.length; ir++) {  
				                		var urutan = ir;
				                		var tmphtml = '';
				                		var found = false; 

				                		for (var a = 0; a < response.length; a++) { 

				                			// menyocokkan kolom table head 
			                				if (db_head[ir].id_assy==response[a].id_assy ) {

			                					tmphtml = 
				                				'<td><a href="#" class="item_edit" data-actual="'+response[a].actual+'" data-ida="'+response[a].id+'">'+response[a].actual+'</a></td>'; 
			                					
				                				found = true; 
				                				// counter jumlah Act 
				                				// membuat & insert total setiap jenis assy 
						                		totActual.push([db_head[ir].id_assy,Number(response[a].actual)]);  

			                				} else if(db_head[ir].id_assy!=response[a].id_assy && found==false){

			                					tmphtml =  '<td><a href="#" class="item_newassy btn btn-outline-success btn-sm" data-kodeassy="'+db_head[ir].kode_assy+'" data-baris="'+(i+1)+'" data-idrow="'+data[i].id+'" data-idcol="'+db_head[ir].id+'">+</a></td>'; 	
			                					found = true;
			                				}
			                				 
				                		}

				                		// jika tidak ada data sama sekali di row Tengah"
				                		if (response.length==0 && (i+1)!=data.length) { 
				                			tmphtml =  '<td><a href="#" class="item_newassy btn btn-outline-success btn-sm" data-kodeassy="'+db_head[ir].kode_assy+'" data-baris="'+(i+1)+'" data-idrow="'+data[i].id+'" data-idcol="'+db_head[ir].id+'">+</a></td>'; 	
				                		}

				                		// html fix add dengan temphtml
				                		html += tmphtml; 
				                	}

				                	// jika last row jam & null assembly
				                	if(response.length==0 && (i+1)==data.length){
				                		for (var ir = 0; ir < db_head.length; ir++) {
				                			html += 
				                				'<td><a href="#" class="item_newassy btn btn-outline-success btn-sm" data-kodeassy="'+db_head[ir].kode_assy+'" data-baris="'+(i+1)+'" data-idrow="'+data[i].id+'" data-idcol="'+db_head[ir].id+'">+</a></td>'; 
				                		}
				                	}
				                }

			                }); 
                            
  							// TOTAL PLANNING & ACTUAL
  							t_plan += Number(data[i].plan); 
  							t_act += Number(data[i].actual); 

  							id_jamke = data[i].id;
  							jam_ke ++; 
                        }

                        // bottom Tabel 
                        html +=
                        	'</tr>'+
                        	'<tr>'; 
	                        if (max_jamkerja==jum_jam) {
	                        	html +=
	                        	'<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn btn-primary newJamVertical" type="button" data-bgcolor="#FF5E67" data-color="#ffffff"><i class="icon-copy fa fa-check-square-o"></i>   SUBMIT</button></td>';
	                        }else {
	                        	html +=
	                        	'<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn btn-success newJamVertical" type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Jam <i class="icon-copy fa fa-plus" ></i></button></td>';
	                        }
							html +=
								'<th scope="row">Total</th>'+
								'<th scope="row">'+t_plan+'</th>'+
								'<th scope="row">'+t_act+'</th>';
						
						// penggabungan counter total actual per assy
						tot_mhout= 0;
						for (var ir = 0; ir < db_head.length; ir++) {  
								var atot = 0;
								for (var i = 0; i < totActual.length; i++) {
									if (totActual[i][0]==db_head[ir].id_assy) {
										atot += Number(totActual[i][1]);
									}
								}
								// hitungan total builder assy & umh
							htmltotalbawah +=  
										'<th scope="row">'+atot+'</th>'; 
								// perkalian total perassy * umh
								var tumh= (Number(db_head[ir].umh)*atot);
								tot_mhout+=Number(tumh);
								// pembulatan 
								if (tumh!=0 && tumh.toString().split('.')[1].length>2) { 
									tumh = tumh.toFixed(2);
								}
							htmltotalbawahMhOt +=  
										'<th scope="row">'+tumh+'</th>';
						}
						

						// set tulisan WIDGET
                        document.getElementById('tot_plan').innerHTML= t_plan;
                        document.getElementById('tot_actual').innerHTML= t_act;    
                        var per_op = (t_act/t_plan)*100; 
                        document.getElementById('id_progres_output').style.width= parseFloat(per_op).toFixed(0)+'%';
                        document.getElementById('id_progres_output').innerHTML= parseFloat(per_op).toFixed(0)+'%';
                        // set widget mhin
                        tot_mhinall = parseFloat(res.mhin_tot.mhin_dlidl);
                        document.getElementById('id_mhinact').innerHTML= parseFloat(res.mhin_tot.mhin_dlidl).toFixed(1); 
						// set TULISAN WIDGET MHOUT
						document.getElementById('id_act_mhout').innerHTML= tot_mhout.toFixed(2);
						// eff actual
						var eff = (parseFloat(tot_mhout)/parseFloat(res.mhin.mhin))*100; 
						document.getElementById('id_act_eff').innerHTML= eff.toFixed(1)+"%"; 
						eff_actual = eff;
                        // productivity 
                        var prod = ((tot_mhout)/parseFloat(res.mhin_tot.mhin_dlidl))*100;
                        document.getElementById('id_prod_percent').innerHTML= prod.toFixed(1); 
                        // manpower 
                        document.getElementById('id_mp_act').innerHTML= res.mp.reg_dl; 
  
						html +=
							htmltotalbawah+
							'</tr>'+
							'<tr>'+
								'<th scope="row" colspan="3">MH Out</th>'+
								 htmltotalbawahMhOt+
							'</tr>';
						// gabungan head
						htmlhead1 += htmlhead2;
						htmlhead1 += htmlhead3;
						htmlhead1 += 
								'<th style="width: 5%; border: none;"></th>'+
								'<th style="width: 100%; border: none;"></th>'+
							'</tr>';

                        $('#tbody_outputt').html(html);
                        $('#thead_outputt').html(htmlhead1);
                        document.getElementById("idjamke").value=id_jamke;
                        document.getElementById("terus_jam_ke").value=(jam_ke+1);
                        document.getElementById("id_labeljam").innerHTML="Pindah Jam Ke- : "+(jam_ke+1); 

                        
                    }
                }); 
				
			// set dropdown assycode
				$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/Assycode/getAssyCodeDasboard',
                    dataType : 'JSON',
                    success : function(dat){ 
                    	html = '<option disabled selected> Pilih Assy </option>';
 
                    	// mengulang jika ada yang sama dengan column head 
                		for (var i = 0; i < dat.length; i++) { 
                			var skip = false;
                			for (var ii = 0; ii < db_head.length; ii++) {  
	                			// jika ada assy yang sama dengan header tidak ditampilkan
	                			if (dat[i].kode_assy==db_head[ii].kode_assy) {
	                				skip = true;
	                			}
	                		}
	                		if (skip==false) { 
                				html +='<option value="'+dat[i].id+'">'+dat[i].kode_assy+'</option>';
                			}  
                    	}  

						$('#pilihasy').html(html);
						$('#pilihasy1').html(html);
                    }
                });


				showplanning();
			}

			function showplanning() {

				$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
                    dataType : 'JSON', 
                    success : function(res){  
                    	if (res) {
                    		$('#id_target').val(res.id);
                    		// insert data in fom update
                    		$('input[name="edit_target_mhout"]').val(res.mh_out);
                    		$('input[name="edit_target_mhin"]').val(res.mh_in);
                    		$('input[name="edit_target_eff"]').val(res.efisiensi);

                    		// setting innhtml
                    		document.getElementById('id_target_mhout').innerHTML=res.mh_out;
                    		document.getElementById('id_target_mhin').innerHTML=res.mh_in;
                    		document.getElementById('id_target_eff').innerHTML=res.efisiensi+'%';

                    		// percent MHOUT
                    		var percent_mhout = (tot_mhout/Number(res.mh_out))*100; 
                        	document.getElementById('prog_mh_out').style.width= parseFloat(percent_mhout).toFixed(0)+'%'; 
                        	document.getElementById('prog_mh_out').innerHTML= parseFloat(percent_mhout).toFixed(0)+'%'; 
                        	// percent MHIN 
                        	var percent_mhin = (tot_mhinall/Number(res.mh_in))*100; 
                        	document.getElementById('prog_mh_in').style.width= parseFloat(percent_mhin).toFixed(0)+'%'; 
                        	document.getElementById('prog_mh_in').innerHTML= parseFloat(percent_mhin).toFixed(0)+'%'; 
                        	// percent Efficiency
                        	var percent_eff = (eff_actual/Number(res.efisiensi))*100; 
                        	document.getElementById('id_act_eff_progres').style.width= percent_eff.toFixed(1)+'%';
                        	document.getElementById('id_act_eff_progres').innerHTML= percent_eff.toFixed(1)+'%';

                        	edittarget=true;		
                    	}else {
                    		$('#newplanmonth_modal').modal('show');
                    		edittarget=false;		
                    	}
                    }

                }); 

			}


		// trigger change assy build
			$('#thead_outputt').on('click','.btn_changeassy',function(){
				var id_ass = $(this).data('id_assy');
				var kode = $(this).data('kode'); 
				
				$('input[name="id_assy_old"]').val(id_ass);
				document.getElementById('heder_assy').innerHTML = 'Edit Assy "'+kode+'"';

				$('#modal_ubah_assy').modal('show');
			});
		// hapuss aASYY
			$('#btn_hapus_assy').on('click',function(){
				var ids = $('input[name="id_assy_old"]').val();
				var id_pdo = $('#id_pdo').val();

				$('#modal_ubah_assy').modal('hide');
				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo site_url("OutputControl/hapusBuildAssy");?>',
	                dataType : "JSON",
	                data : {
	                		id_pdo:id_pdo, 
	                		id:ids
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							Swal.fire({
							  title: 'Berhasil',
							  text: 'Assy Telah Dihapus',
							  type: 'success',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							showdata();
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal menghapus',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							}) 
						}

	                }
	            }); 
			});
		// pindahkan ASSY
			$('#btn_pindah_assy').on('click',function(){
				var ids = $('input[name="id_assy_old"]').val();
				var id_pdo = $('#id_pdo').val();
				var new_assy  = $('#pilihasy1').val();

				if (!new_assy) return; 
				$('#modal_ubah_assy').modal('hide');

				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo site_url("OutputControl/updateColBuildAssy");?>',
	                dataType : "JSON",
	                data : {
	                		id_pdo:id_pdo, 
	                		id_old:ids,
	                		id_new:new_assy
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							Swal.fire({
							  title: 'Berhasil',
							  text: 'Assy Telah Pindah',
							  type: 'success',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							showdata();
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal menghapus',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							}) 
						}

	                }
	            }); ßßßßß
			});

		// to show new build assy modal
			$('#thead_outputt').on('click','.newBuildass',function(){
				// jika belum menambahkan assy
				if (jum_jam==0) {
					Swal.fire('Silahkan tambahkan jam kerja terlebih dahulu');
					return;
				}
				$('#modalnewbuild').modal('show'); 
			});
		// event click btn new build assy horizontal
			$('#btn_newbuildassy').click(function(){  

				var idjam  = $('#idjamke').val();
				var idassy  = $('#pilihasy').val();
				var pdo  = $('#id_pdo').val();
 
				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataBuildAssy',
	                dataType : "JSON",
	                data : {
	                		id_oc:idjam, 
	                		id_assy:idassy,
	                		pdo:pdo
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							console.log("semua Bahagia");
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Inputan benar',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
						}

	                }
	            }); 

				$('#modalnewbuild').modal('hide'); 
				showdata(); 
			});

		// to SHOW NEW JAM VERTICAL
			$('#tbody_outputt').on('click','.newJamVertical',function(){
				let spd = Number($("input[name='speed_edit']").val()); 
				var toOut = (spd*loss_output);
				// 10% dari total
				var batas = (toOut*2)/100; 

				// checking output SESUAI APA TIDAK 
				// Downtime Kurang
				if (total_loss_detik<(toOut-batas) && output_sesuai== false) {
					Swal.fire({
						type: 'error',
  						title: 'Output Actual yang dihasilkan tidak sesuai.',
						text:'"Kurang Banyak Downtime"',
						footer:'Total Downtime harus di Atas: '+(toOut-batas)+'  |&nbsp Downtime sekarang: '+total_loss_detik
					});
					return;
				}
				// Downtime kelebihan
				else if(total_loss_detik>(toOut+batas) && output_sesuai== false){
					Swal.fire({
						type: 'error',
  						title: 'Output Actual yang dihasilkan tidak sesuai.',
						text:'"Terlalu Banyak Downtime"',
						footer:'Total Downtime harus Di Bawah: '+(toOut+batas)+'  |&nbsp Downtime sekarang: '+total_loss_detik
					});
					return;
				}  
				else if ((toOut+batas)>total_loss_detik && (toOut-batas)<total_loss_detik) {
					// Swal.fire('Ooke Downtime sesuai');
				} 

				if (jum_jam == max_jamkerja) {
					$('#modal_submit').modal('show');	
				}else {
					$('#modaladdjamke').modal('show');	
				} 
				
			});
		// event click btn new jam vertical
			$('#btn_pindahjam').click(function(){   
				var pdo  = $('#id_pdo').val();
				var jumplan  = $('#jum_plann').val();
				var jamke = $('#terus_jam_ke').val();

				$.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataOutputControl',
	                dataType : "JSON",
	                data : {
	                		id_pdo:pdo, 
	                		plan:jumplan,
	                		jam_ke:jamke
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							// sukses menambahkan
							jum_jam++; 
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Inputan benar',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
						}

	                }
	            }); 
				$('#modaladdjamke').modal('hide'); 
				showdata(); 
			});

		// ========== START EVENT edit PLAN  =====================
			$('#tbody_outputt').on('click','.plan_edit',function(){
				var id = $(this).data('idr');
				var jplan = $(this).data('jum');

				$('#plan_editfom').val(jplan);
				$('#id_plan_editfom').val(id); 

				$('#updtplan_modal').modal("show");
			});
			$('#btn_update_plan').on('click',function(){
				var id = $('#id_plan_editfom').val();
				var jplan = $('#plan_editfom').val();
 
				$.ajax({
					async : false,
					type: "POST",
					url: "<?php echo site_url('OutputControl/updatePlanControl')?>",
					dataType: "JSON",
					data: {
							id:id,
							plan:jplan
						},
					success: function(data){
						// jika sukses
						if (data) {
							console.log("Berhasil update plan");
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal Update',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
						}
						showdata();  
						$('#updtplan_modal').modal("hide");
					}
				});
			});
			// ==========   END EVENT edit PLAN  =====================

		// ========== start event edit click =====================
			$('#tbody_outputt').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var id = $(this).data('ida');
                var act = $(this).data('actual');

                // memasukkan data ke form updatean
				$('#id_act_editfom').val(id);  
				$('#act_editfom').val(act);  

				// show modal edit
                $('#login-modal').modal('show'); 
            });

			// evnt click update btn
			$('#btn_update_act').click(function(){ 
				// mengambil data dari fom upadate
				var idu = $('#id_act_editfom').val();
				var actu = $('#act_editfom').val();
 				var pdo = $('#id_pdo').val();

 				// ajax upload
 				$.ajax({
                    async : false,
	                type : "POST",
	                url   : '<?php echo site_url("OutputControl/updateDataBuildAssy");?>',
	                dataType : "JSON",
	                data : { 
	                	id_a:idu,
	                	act:actu,
	                	id_pdo:pdo
	                 },
	                success: function(response){
	                	if (response) { 
							console.log("Semua senang");
	                	}else{
	                		Swal.fire({
							  title: 'Error!',
							  text: 'Gagal Update',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
	                	}
	                }
	            });

				$('#login-modal').modal('hide');
				showdata();
			});
			// ========== END event edit click =====================

		// ========== start event new assy Bottom + click ===================== 
			$('#tbody_outputt').on('click','.item_newassy',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var idr = $(this).data('idrow');
                var idcolassy = $(this).data('idcol');
                var baris = $(this).data('baris');
                var kodeassy = $(this).data('kodeassy');
                var pdo  = $('#id_pdo').val();
 				
 				// pemberitahuan new adassy
 				Swal.fire({
				  title: 'Anda Yakin?',
				  text: "anda akan menambahkan Assy("+kodeassy+") di Jam ke-"+baris,
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, Tambahkan'
				}).then((result) => {
				  if (result.value) {

				  	// jika setuju ditambahkan  post
				  	$.ajax({
	                    async : false,
		                type : "POST",
		                url   : '<?php echo base_url();?>index.php/OutputControl/newDataBuildAssy',
		                dataType : "JSON",
		                data : {
		                		id_oc:idr, 
		                		id_assy:idcolassy,
		                		pdo:pdo
		                	},
		                success: function(response){
		                	if (response) { 
		                		Swal.fire(
							      'Sukses ditambah!',
							      '',
							      'success'
							    )
								console.log("Semua senang");
		                	}else{
		                		Swal.fire({
								  title: 'Error!',
								  text: 'Pastikan Sudah Connect',
								  type: 'error',
								  confirmButtonText: 'Ok',
								  allowOutsideClick: false
								})
								console.log("Ada error");
		                	}
		                }
		            });

				    showdata();
				  }
				})

            });
			// ========== END event new assy Bottom + click ===================== 

		// gauge chart
			Highcharts.chart('spd_cv', {

				chart: {
					type: 'gauge',
					plotBackgroundColor: null,
					plotBackgroundImage: null,
					plotBorderWidth: 0,
					plotShadow: false
				},
				title: {
					text: ''
				},
				credits: {
					enabled: false
				},
				pane: {
					startAngle: -150,
					endAngle: 150,
					background: [{
						borderWidth: 0,
						outerRadius: '109%'
					}, {
						borderWidth: 0,
						outerRadius: '107%'
					}, {
					}, {
						backgroundColor: '#fff',
						borderWidth: 0,
						outerRadius: '105%',
						innerRadius: '103%'
					}]
				},

				yAxis: {
					min: 0,
					max: 200,

					minorTickInterval: 'auto',
					minorTickWidth: 1,
					minorTickLength: 10,
					minorTickPosition: 'inside',
					minorTickColor: '#666',

					tickPixelInterval: 30,
					tickWidth: 2,
					tickPosition: 'inside',
					tickLength: 10,
					tickColor: '#666',
					labels: {
						step: 2,
						rotation: 'auto'
					},
					title: {
						text: '...'
					},
					plotBands: [{
						from: 0,
						to: 120,
						color: '#55BF3B'
					}, {
						from: 120,
						to: 160,
						color: '#DDDF0D'
					}, {
						from: 160,
						to: 200,
						color: '#DF5353'
					}]
				},

				series: [{
					name: 'Speed',
					data: [1],
					tooltip: {
						valueSuffix: '  dtk/Min'
					}
				}]
			});
			
		// touch spin
			$("input[name='speed_edit']").TouchSpin({
				min: 0,
				max: 200,
				step: 1,
				decimals: 0,
				boostat: 5,
				maxboostedstep: 10,
				postfix: 'speed'
			});
			$("input[name='eff_new']").TouchSpin({
				min: 0,
				max: 200,
				step: 1,
				decimals: 1,
				boostat: 5,
				maxboostedstep: 10,
				postfix: '%'
			});
			$("input[name='edit_target_eff']").TouchSpin({
				min: 0,
				max: 200,
				step: 1,
				decimals: 1,
				boostat: 5,
				maxboostedstep: 10,
				postfix: '%'
			}); 

		// update gauge
			let spdi = Number($("input[name='speed_edit']").val());  
			$('#spd_cv').highcharts().series[0].points[0].update(spdi);

			// event on change value touchspin
			$("input[name='speed_edit']").on('touchspin.on.startspin', function () {
				// get speed data
				let spd = Number($("input[name='speed_edit']").val()); 
				// update gauge
				$('#spd_cv').highcharts().series[0].points[0].update(spd);
			});

		// btn show speed modal
			$('#btn_changesped').click(function(){  
				let spdi = Number($("input[name='speed_edit_temp']").val());  
				$("input[name='speed_edit']").val(spdi);
				$('#spd_cv').highcharts().series[0].points[0].update(spdi);
				
				$('#scv_modal').modal('show'); 
			});

		// update speed submit event 
			$('#btn_update_speed').click(function(){
				var sped = $("input[name='speed_edit']").val();
				var idp = $("#id_pdo").val();
 
				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('PDO_Controler/updateSpeed') ?>",
					dataType : "JSON",
					data : {
						id:idp,
						spd:sped
					},
					success: function(data){
						$('#scv_modal').modal('hide');
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update Speed',
						      'success'
						    ).then(function(){
						    	document.location.reload(true);
						    }); 

							console.log("berhasil Update Speed");
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal update speed',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error saat update speed");
						}
					}
				}); 

			});

		// btn new plan this month
			$('#btn_submt_newtarget').on('click',function(){

				var inn = $("input[name='target_mhin']").val();
				var out = $('input[name="target_mhout"]').val();
				var eff = $('input[name="eff_new"]').val();

				// alert('in'+inn+'|ou:'+out+'|ef:'+eff);

				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('Target/newTargetBulan') ?>",
					dataType : "JSON",
					data : {
						out:out,
						in:inn,
						eff:eff
					},
					success: function(data){
						$('#scv_modal').modal('hide');
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update Speed',
						      'success'
						    );
							showplanning();
							document.getElementById('newplanmonth_modal').modal('hide');
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal membuat target',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error saat update speed");
						}
					}
				}); 

			});

		//============ Trigger Target Edit ============
			// target mh-OUT EDIT
			$('#trigger_mhout').on('click',function(){
				// jika sudah ada target
				if (edittarget) {   
					$('#modal_edit_mhout').modal('show');
				} 
			});
			// target mhin EDIT
			$('#triger_mhin').on('click',function(){
				// jika sudah ada target
				if (edittarget) { 
					$('#modal_edit_mhin').modal('show');
				} 
			}); 
			// target EFICIENCY EDIT
			$('#trigger_eff').on('click',function(){
				// jika sudah ada target
				if (edittarget) { 
					$('#modal_edit_efff').modal('show');
				} 
			});
 			
 		// ======  EDIT POST SUBMIT  ========
 			$('#btn_submit_mhout').on('click',function(){
 				var out = $('input[name="edit_target_mhout"]').val();

 				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('Target/editMhOut') ?>",
					dataType : "JSON",
					data : {
						out:out,
						id:$('#id_target').val()
					},
					success: function(data){ 
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update MH-OUT',
						      'success'
						    );
							showplanning(); 
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal Update target',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							}) 
						}
						$('#modal_edit_mhout').modal('hide');
					}
				}); 
 			});

 			$('#btn_submit_mhin').on('click',function(){
 				var inn = $('input[name="edit_target_mhin"]').val();
 
 				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('Target/editMhIn') ?>",
					dataType : "JSON",
					data : {
						in:inn,
						id:$('#id_target').val()
					},
					success: function(data){ 
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update MH-In',
						      'success'
						    );
							showplanning(); 
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal Update target',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							}) 
						}
						$('#modal_edit_mhin').modal('hide');
					}
				}); 
 			});

 			$('#btn_submit_eff').on('click',function(){
 				var eff = $('input[name="edit_target_eff"]').val();
 
 				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('Target/editEff') ?>",
					dataType : "JSON",
					data : {
						eff:eff,
						id:$('#id_target').val()
					},
					success: function(data){ 
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update Efficiency',
						      'success'
						    );
							showplanning(); 
						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Gagal Update target',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							}) 
						}
						$('#modal_edit_efff').modal('hide');
					}
				}); 
 			});

 		//  ====== ENDING PDO HARI INI =============
 			$('#btn_submit_pdo').on('click',function(){ 
 
				html2canvas([document.getElementById('signature-pad')], {
					onrendered: function (canvas) { 

						var dataUrl = canvas.toDataURL();
           				var newDataURL = dataUrl.replace(/^data:image\/png/, "data:application/octet-stream"); //do this to clean the url.
 
						$.ajax({ 
							url : "<?php echo site_url('VerificationSupervisor/verification') ?>",
							data: { img:newDataURL },
							type: 'post',
							dataType: 'json',
							success: function (response) { 
							   console.log(response);
							   alert('Sukses'); 
							   
							},
							error: function(data){
				                console.log(data);
				            }
						});
					}
				});

 			});


 		// Signature pad
 			var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
			  // backgroundColor: 'rgba(255, 255, 255, 0)',
			  penColor: 'rgb(0, 0, 0)',
			  drawBezierCurves:true
			});

			$('#clearr').on('click',function(){
				signaturePad.clear();
			});
 

		});
	</script>
</html>