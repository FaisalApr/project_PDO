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
	<!-- JQUERY STEP -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">
	
	<!-- HTML CANVAS  -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/src/plugins/html2canvas-master/dist/html2canvas.js"></script>

	<!-- SELEct 2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.min.css">
	<!-- DATE PICKERS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.css">

	<!-- jQuery (required) & jQuery UI + theme (optional) --> 
	<!-- keyboard extensions (optional) -->
	<link href="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/css/jquery-ui.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/css/keyboard.css" rel="stylesheet"> 


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
		.select2-selection__rendered {
		    line-height: 55px !important;
		}
		.select2-container .select2-selection--single {
		    height: 50px !important;
		}
		.select2-selection__arrow {
		    height: 50px !important;
		}

		/* REMOVE SECOND CALENDAR */
		.drp-calendar.right thead>tr:nth-child(2) {
		    display: none;
		}
		.drp-calendar.right tbody {
		    display: none;
		}
		.daterangepicker.ltr .ranges, .daterangepicker.ltr .drp-calendar {
		    float: none !important;
		}
		.daterangepicker .drp-calendar.right .daterangepicker_input {
		    position: absolute;
		    top: 45px;
		    left: 15px;
		    width: 230px;
		}
		.drp-calendar.left .drp-calendar-table {
		    margin-top: 45px;
		}

		.daterangepicker .drp-calendar.right {
		    display: none;
		    right: 0 !important;
		    top: 0 !important;
		}
		/* REMOVE SECOND CALENDAR */
	</style>
</head>
<body> 

<?php 
	$ses = $this->session->userdata('pdo_logged'); 
	$opt = $this->session->userdata('pdo_opt'); 
 ?>
<input id="id_target" type="hidden" class="form-control" value=""> 
<input type="hidden" id="id_user" value="<?php echo $ses['id_user'] ?>">
<input type="hidden" value="<?php echo $opt['id_shift'] ?>" id="id_shift">
<!-- opt -->
<input type="hidden" value="<?php echo $opt['tgl'] ?>" id="id_tgl">
<input type="hidden" value="<?php echo $opt['id_line'] ?>" id="id_line">

<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?> 

<!--    Modall AREA    -->
<div>

	<!-- MODAL TOLTIP -->
		<div class="modal fade" id="cek_downtime">
		    <div class="modal-dialog modal-dialog-centered modal-md">
		      <div class="modal-content"> 
	      		<div style="min-height: 250px; text-align: center; margin-top: 10px;">
	      			<h3>Downtime</h3>
	      			<center><hr style="width: 75%; height:2px; margin-top: 0px; border:none; background-color: #D50000;"></center> 
	      			<table class="table table-hover" id="tbl_downtimedetail">
	      				 
	      			</table>
	      		</div> 
		      </div>
		    </div>
		</div>

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

		        <div class="modal-header">
		          <h4 class="modal-title">Ubah Kecepatan Conveyor</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <div class="modal-body">
		        	<div class="clearfix device-usage-chart">
						<div class="width-50-p pull-left">
							<div id="spd_cv" style="min-width: 160px; max-width: 180px; height: 200px; margin: 0 auto"></div>
						</div>
						<div class="width-50-p pull-right">
							<div class="form-group">
								<label>Speed</label>
								<input id="demo1" type="number" value="" name="speed_edit_cv"> 
								<input  type="hidden" value="" name="speed_edit_temp"> 
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
 
							<br>
							<div style="margin-bottom: -10px"><a id="btn_buatassybaru" href="#" style="color: #AB0000;">Assy Baru</a></div> 
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
	<!--  modal New Assy Baru  -->
		<div class="modal fade" id="modalnewassyinvalid">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form id="fomaddbuild_newassy">
						<div class="modal-header">
							<h4 class="modal-title">Assy Baru</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<div class="modal-body"> 
							<div class="alert alert-danger" role="alert">
								Form ini HANYA digunakan untuk membuat assy yang belum tersedia.

							</div>
							<div class="form-group">
								<label>Nama Assy :</label>
								<input id="in_newassybaru" type="text" class="form-control" placeholder="Masukkan Nama Assy">
								<div id="tipsss" style="display: none;" class="form-control-feedback">maaf, Nama Assy ini sudah digunakan.</div> 
							</div>
 
							<br> 
						</div>
						<div class="modal-footer"> 
							<center><button type="button" class="btn btn-primary" id="btn_newassybaru" disabled="">Tambahkan</button></center>
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
						<div class="alert alert-warning" role="alert" id="info_isidowntime" style="display: none;">
							Report Downtime masih kosong.<br> Jika akan pindah Jam berikutnya, Silahkan isi ZERO downtime terlebih dahulu.
						</div>
						<div class="form-group">
							<label>Jumlah Plan 🎯 :</label>
							<input id="jum_plann" type="number" class="form-control" min="1"> 
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btn_pindahjam">Pindah Jam</button>
						<a href="<?php echo site_url('losstime') ?>" class="btn btn-primary" id="btn_pindahkedowntime" style="display: none;">Isi Zero Downtime</a>
					</div>
				</div>
			</div>
		</div>
	<!--  Modal  NEW PLAN BULANAN -->
		<div class="modal fade" id="newplanmonth_modal">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content" style="width: 1050px;margin-left: -150px;">
		      
		        <!-- Modal Header -->
		        <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h2 class="text-center mb-30" id="text_judulplan">Buat Panning Bulan Ini</h2>
				</div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		        	<br>
		        	<div class="row"> 
			        	<div class="col-lg-3 col-md-3 col-sm-12 mb-30">
							<div class="card box-shadow">
								<div class="card-header"> 
									<div class="project-info-center">
										<h5 class="text-center weight-500">Plan</h5>
									</div> 
								</div>
								
								<div class="card-body"> 
									<div class="form-group">
										<label>Target Plan</label>
										<input type="Number" name="target_plan" class="form-control" value="0">
									</div>
								</div> 
							</div>
						</div>

			        	<div class="col-lg-3 col-md-3 col-sm-12 mb-30">
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

						<div class="col-lg-3 col-md-3 col-sm-12 mb-30">
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

						<div class="col-lg-3 col-md-3 col-sm-12 mb-30">
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
						<h2 class="text-center mb-30" id="id_infoplanmhout">Edit Pan</h2>
						<form> 
							<div class="modal-body">  
								<div class="form-group">
									<label>Tanggal  :</label>
									<input class="form-control rangepick" type="text">
								</div>
								<div class="form-group">
									<label>MH-Out  :</label>
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
									<label>Tanggal  :</label>
									<input class="form-control rangepick" type="text">
								</div>
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
									<label>Tanggal  :</label>
									<input class="form-control rangepick" type="text">
								</div>

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
			<div class="modal-dialog  modal-lg">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5"> 
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Verifikasi Supervisor</h2> 
						<div class="alert alert-success" role="alert" id="info_lastupdt" style="display: none;">
							Terahir Diperbarui Pada 
						</div>
						<!-- <hr> -->
						<center>
							<div id="fom_ttd">
								<canvas id="signature_canvas" class="signature-pad" width=400 height=300></canvas>
						  		<button id="clearr" class="btn btn-info btn-sm">ulangi</button>
							</div> 
						</center>  

						<hr>
						<label >Enter Passcode :</label>
						<center>
							<form id="fom_passcode">
							<div class="row">
								<div class="col-md-2"></div> 
				                <div class="col-md-8"> 
			                      <input class="inputs" name="pass1" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1"> 
			                      <input class="inputs" name="pass2" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1"> 
			                      <input class="inputs" name="pass3" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1">
			                      <input class="inputs" name="pass4" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1"> 
			                      <input class="inputs" name="pass5" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1"> 
			                      <input class="inputs" name="pass6" type="password" style="text-align: center;margin: 8px; width: 60px; height: 40px;" maxlength="1">  
			                    </div>
				                <div class="col-md-2"></div>
			                </div>
			                </form><br>
		                	
		                </center> 
						<center><button class="btn btn-primary btn-block" id="btn_submit_pdo">verifikasi</button></center>
						<br>
					</div>
				</div>
			</div>
		</div>

	<!-- =====================  NEW PDO    ========================== -->
	<!-- modall neww AKtivitas  -->
		<div class="modal fade" id="modalnewact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Tambah Aktivitas</h2>
						<form id="form_addactiv">
							<div class="input-group custom input-group-lg">
								<label>Aktivitas :</label>
								<input id="nameAct" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
								 
							</div>
							<div class="form-group">
								<label>Durasi :</label>
								<input type="text" value="5" name="durasi_aktivitas">
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" href="#" id="tambah_activ">Tambah</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- modall edit  AKtivitas-->
		<div class="modal fade" id="modaledit_aktivitas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Edit Aktivitas</h2>
						<form id="form_editactiv">
							<div class="input-group custom input-group-lg">
								<label>Aktivitas :</label>
								<input id="nameActedit" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
								 
							</div>
							<div class="form-group">
								<label>Durasi :</label>
								<input type="text" value="5" name="durasi_aktivitas_edit">
								<input id="id_edit" type="hidden"  >
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" href="#" id="tambah_activedit">Ubah</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- End Modal --> 

<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll  xs-pd-20-10">
		  
		<!-- Dasboard  -->
		<div id="contain_dasboard" style="display: none;">
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
								<h5 class="dropdown-toggle text-center weight-500" href="#" role="button" data-toggle="dropdown">
									<a href="#" id="id_name_eff">Efficiency</a>
								</h5>
								<div class="dropdown-menu dropdown-menu-right" id="drop_eff">  
									<a class="dropdown-item pilih_eff aktip" id="itm_eff_n" href="#" data-value="1">Efficiency</a>
									<a class="dropdown-item pilih_eff" id="item_eff_ex" href="#" data-value="2">Efficiency Exclude</a>
								</div> 
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
									<div class="col-sm-6 text-right weight-500 font-14 text-muted" id="id_act_eff_excl" style="display: none;">0%</div> 
								</div>
								<div class="progress" style="height: 20px; margin-top: 10px;">
									<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" id="id_act_eff_progres"></div>
									<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" id="id_act_eff_progresexcl" style="display: none;"></div>
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
				<div id="tbud"></div>
			</div>
		</div>

		<!-- NEW PDO PlanNING -->
		<div id="panel_newplann" class="login-wrap customscroll align-items-center flex-wrap justify-content-center pd-20" style="display: none;">
			<div class="login-box bg-white box-shadow pd-30 border-radius-5">
				 <h1>Ayo Buat Planning Baru</h1>
				 <br>
				 <br>
				 <center>
				 <button id="btn_newplan" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">Buat <i class="icon-copy fa fa-plus" ></i></button> 
				</center>
			</div>
		</div>

		<!-- NEw PDO WIZARD -->
		<div id="panel_wizard" class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="display: none;">
			<div class="clearfix">
				<h4 class="text-blue">Mulai Planning PDO</h4>
				<p class="mb-30 font-14">Step Wizard PDO</p>
			</div>
			<div class="wizard-content">
				<form class="tab-wizard wizard-circle wizard">
					<h5>Direct Labor Info</h5>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Standart DL :</label>
									<input class="form-control" type="number" id="f_std_dl" value="0" min="0" max="200">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label >Reg DL :</label>
									<input class="form-control" type="number" id="f_reg_dl" value="0" min="0" max="200">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jam Overtime :</label>
									<input class="form-control" type="number" id="f_jam_ot" value="0" min="0" max="4">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>DL Overtime :</label>
									<input class="form-control" type="number" id="f_dl_ot" value="0" min="0" max="4">
								</div>
							</div>
						</div> 
						<br>
					</section>
					<!-- Step 2 -->
					<h5>InDirect Labor Info</h5>
					<section>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label >Standart IDL :</label>
									<input class="form-control" type="number" id="f_std_idl" value="0" min="0" max="50">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label >Reg IDL :</label>
									<input class="form-control" type="number" id="f_reg_idl" value="0" min="0" max="50">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Jam Overtime :</label>
									<input class="form-control" type="number" id="f_jam_ot_idl" value="0" min="0" max="4">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>IDL Overtime :</label>
									<input class="form-control" type="number" id="f_idl_ot" value="0" min="0" max="4">
								</div>
							</div>
						</div> 
						<br>
					</section>
					<!-- Step 3 -->
					<h5>Indirect Activity</h5>
					<section>

						<div class="table-responsive">
							<h2>Activity</h2>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Items</th>
										<th scope="col">Menit</th> 
										<th scope="col">Ubah</th>
									</tr>
								</thead>
								<tbody id="tbl_activlabor">
									 
								</tbody>
							</table>
							<br><br>
						</div>
													
					</section>
					<!-- Step 4 -->
					<h5>Finish</h5>
					<section>
						<div class="col-12 align-content-center"> 
							<div class="clearfix device-usage-chart">
								<div id="spd_cv_newpdo" style="min-width: 160px; max-width: 180px; height: 250px; margin: 0 auto"></div>
								<center>
								<div class="form-group col-md-6" style="margin-top: -40px;">
									<label>Kecepatan Conveyor</label>
									<input type="number" value="104" name="speed_edit_newpdo" min="0">  
								</div> 
								</center>
							</div>
							<br><br>
							<div class="checkbox-circle" style="margin-bottom: 48px; margin-left: 50px;">
								<label>
									<input type="checkbox" id="ini_pernyataan"> Data yang saya masukkan Benar
									<span class="checkmark"></span>
								</label>
							</div>

						</div>
					</section>
				</form>
			</div>
		</div>
 		

 		<!-- Verifikasi Terlebih Dahulu -->
		<div id="panel_infoverif" class="login-wrap customscroll align-items-center flex-wrap justify-content-center pd-20" style="display: none;">
			<div class="bg-white box-shadow pd-30 border-radius-5">
				 <h1 class="text-center">Verifikasi PDO</h1>
				 <br>
				 <div class="alert alert-warning" role="alert" id="info_isidowntime" >
				 	<label id="infoo_verf"></label>
				 </div>
				 <br>
				 <br>
				 <center>
				 <input type="hidden" id="tglnotverif">
				 <button id="pindah_verifikasi" type="button" class="btn" data-bgcolor="#5C92FF" data-color="#ffffff">Verifikasi Sekarang <i class="icon-copy fa fa-check-square" ></i></button> 
				</center>
			</div>
		</div>


		<!-- NO PDO DATA -->
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="no_pdodata" style="display: none;"> 
			<center>
				<div class="jumbotron">
					<H1>Tidak Ada Data PDO Perpilih</H1>
				</div>
			</center>
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
		<!-- JQuery Steps -->
		<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
		<!-- jQuery (required) & jQuery UI + theme (optional) -->  
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery-ui-custom.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery.keyboard.js"></script> 
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery.keyboard.extension-typing.js"></script>
	 	<!-- SELECT 2 -->
		<script src="<?php echo base_url() ?>assets/src/plugins/select2/dist/js/select2.min.js"></script>
		<!-- DATE PICKER -->
		<script src="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.js"></script>

	<script> 
		$('document').ready(function(){ 
		// conf
			// VAR CORE
				var id_line = $('#id_line').val();
				var id_shift = $('#id_shift').val();
				var id_tgl = $('#id_tgl').val();
				var id_pdo = 0;
				var id_listcarline = 0;

				var tgl_start =0;
				var tgl_end=0;
			// VARIABEL GLOBAL
	 			// deklarasi nama bulan
	 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

	 			var today = new Date(id_tgl);
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
				var eff_excl = 0;
				var edittarget= false; // jika target sudah ada maka bisa diedit
				var max_jamkerja = 0; 
				var status_pdo = 0 ;
				var daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

	 			// SETTING DEFAULT DATE 
	            document.getElementById('slect_date').value= daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;
				$('.rangepick').val('01/'+(currentMonth+1)+'/'+currentYear+' - '+daysInMonth+'/'+(currentMonth+1)+'/'+currentYear);
				tgl_start = currentYear+'-'+(currentMonth+1)+'-1';
				tgl_end = currentYear+'-'+(currentMonth+1)+'-'+daysInMonth;

			// DAtepickers
				$('.rangepick').daterangepicker({
				    "showWeekNumbers": false,
				    "linkedCalendars": false, 
				    // "startDate": "07/1/2019",
				    // "endDate": "07/31/2019", 
				    "minDate": "01/7/2019",
				    "maxDate": "31/7/2019",
				    locale: {
			            format: 'DD/MM/YYYY'
			        }
				}, function(start, end, label) {
				  	console.log('start :' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
				  	tgl_start = start.format('YYYY-MM-DD');
				  	tgl_end = end.format('YYYY-MM-DD');
				});

			// aditional Setting
				$(".inputs").keyup(function () {
				    if (this.value.length == this.maxLength) {
				      $(this).select();
				      $(this).next('.inputs').focus();  
				    }
				});

				$("input").click(function () {
				   $(this).select();
				}); 
	 		
	 		// TrigGER PIlih TANGGAL
				$('.date-pickerrr').datepicker({   
					language: "en",
					firstDay: 1,  
				    onSelect: function(selected, d, calendar) {   
				    	// jika yang dipilih sama 
				    	if (selected=='') { 
				    		var tod = new Date(id_tgl);  

				    		document.getElementById('slect_date').value=  daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
				    		calendar.hide();
				    		return ;
				    	}else{
				    		// post data additional
				    		id_tgl = new Date(selected);
				    		var tod = new Date(selected); 
					    	document.getElementById('slect_date').value= daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
					    	id_tgl = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate();

					    	// post new data additional
					    	updateOpt();
				    	} 
				    	calendar.hide();

				    	// refresh 
				    	// showplanning();
			    		// cariDataPdo();
			    		cekHariini();
				    }
				});
			// TRIGGEr line Change
				$('#select_line').on('select2:select',function(e){
					var data = e.params.data;
					
					id_line = data.id ;
					// update opt to server
					updateOpt(); 
					cekHariini();  
				});
			// PILIH SHIFTY 
				$('#drop_shiftt').on('click','.pilih_sf',function(){
					var ssf = $(this).data('value'); 
	 
					if (ssf==1) {
						document.getElementById('id_sifname').innerHTML= 'A';
						document.getElementById('sf_a').classList.add("aktip");
						document.getElementById('sf_b').classList.remove("aktip"); 	
					} else{
						document.getElementById('id_sifname').innerHTML= 'B';
						document.getElementById('sf_b').classList.add("aktip");	
						document.getElementById('sf_a').classList.remove("aktip");	
					}

					id_shift = ssf; 
					id_line = $('#select_line').val();

					// update opt to server
					updateOpt(); 
					cekHariini();
				});
			// PILIH Jenis EFF 
				$('#drop_eff').on('click','.pilih_eff',function(){
					var ssf = $(this).data('value');  
					if (ssf==1) {
						document.getElementById('id_name_eff').innerHTML= 'Efficiency';
						document.getElementById('itm_eff_n').classList.add("aktip");
						document.getElementById('item_eff_ex').classList.remove("aktip");
						// excl 
						document.getElementById('id_act_eff').style.display = 'block';
						document.getElementById('id_act_eff_progres').style.display = 'block';
						document.getElementById('id_act_eff_excl').style.display = 'none';
						document.getElementById('id_act_eff_progresexcl').style.display = 'none'; 

					} else{
						document.getElementById('id_name_eff').innerHTML= 'Efficiency Exclude';
						document.getElementById('itm_eff_n').classList.remove("aktip");	
						document.getElementById('item_eff_ex').classList.add("aktip");	 
						// excl
						document.getElementById('id_act_eff_progresexcl').style.display = 'block';
						document.getElementById('id_act_eff_excl').style.display = 'block';
						document.getElementById('id_act_eff_progres').style.display = 'none'; 
						document.getElementById('id_act_eff').style.display = 'none';
					} 

					// update opt to server

				});

		// AUTooOOOO LOAD 
			var name_shift = document.getElementById('id_sifname').innerHTML;
			loadDropdown();
			cekHariini();
			showplanning();


		// isi DATA DROPDOWN LINE
			function loadDropdown() {
				var idu = $('#id_user').val();
				var lv  = <?php echo $ses['level'] ?>; 

				// jika admin
				if (lv==1) {
					var id_district = <?php echo $ses['id_district'] ?>; 

					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("Users/getListLineCarlineByAdmin");?>',
						dataType: "JSON",
						data:{
							id_district: id_district
						},
						success: function(data){ 
	 						$('#select_line').empty();
	 						$('#select_line').select2({ 
				 				placeholder: 'Pilih Line ',
				 				minimumResultsForSearch: -1,
				 				data:data

				 			});
						}

					});
				}else {
					$.ajax({
						type: 'POST',
						url: '<?php echo site_url("Users/getListLineCarlineByUser");?>',
						dataType: "JSON",
						data:{
							id_user:idu
						},
						success: function(data){  
	 						
	 						$('#select_line').empty();
	 						$('#select_line').select2({ 
				 				placeholder: 'Pilih Line ',
				 				minimumResultsForSearch: -1,
				 				data:data

				 			});
						}

					});
				}  

			}

		// fungsi main
			function showdata(pdo_id) {

				console.log('ini id_pdo: '+pdo_id);
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
                    	id_pdo:pdo_id
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
                        //mencari status pdo set img 
                        //  SEt TTD IMG
                        status_pdo = res.pdo.status;

                        if ( res.pdo.waktu != '0000-00-00 00:00:00') { 
                        	document.getElementById('info_lastupdt').innerHTML = 'Terahir Diperbarui Pada '+res.pdo.waktu+' WIB'; 
                        	document.getElementById('info_lastupdt').style.display = 'block'; 
                        }

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
			                data : { id:pdo_id },
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
								'<td scope="row" rel="popover" class="not_enouge" bgcolor="#FF525B" data-id="'+data[i].id+'" >'+data[i].actual+'</td>'; 
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
				                				'<td class="item_edit" data-actual="'+response[a].actual+'" data-ida="'+response[a].id+'">'+response[a].actual+'</td>'; 
				                				// '<td class="inner">'+response[a].actual+'</td>'; 
			                					
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
                        var per_op = parseFloat(t_act);
                        if (t_act!=0) {
                        	per_op = (parseFloat(t_act)/parseFloat(t_plan))*100; 
                        }
                         
                        document.getElementById('id_progres_output').style.width= per_op+'%';
                        document.getElementById('id_progres_output').innerHTML= parseFloat(per_op).toFixed(0)+'%';
                        // set widget mhin
                        tot_mhinall = parseFloat(res.mhin_tot.mhin_dlidl);
                        document.getElementById('id_mhinact').innerHTML= parseFloat(res.mhin_tot.mhin_dlidl).toFixed(1); 
						// set TULISAN WIDGET MHOUT
						document.getElementById('id_act_mhout').innerHTML= tot_mhout.toFixed(2);
						// eff actual
						var eff = (parseFloat(tot_mhout)/parseFloat(res.mhin.mhin))*100; 
						document.getElementById('id_act_eff').innerHTML= eff.toFixed(1)+"%"; 
						// EFF EXCL
						document.getElementById('id_act_eff_excl').innerHTML= parseFloat(res.eff_exc.eff_excl).toFixed(1)+"%"; 

						eff_actual = eff;
						eff_excl = res.eff_exc.eff_excl;
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

						$('#tbud').html('');
                        $('#tbody_outputt').html(html);
                        $('#thead_outputt').html(htmlhead1);
                        document.getElementById("idjamke").value=id_jamke;
                        document.getElementById("terus_jam_ke").value=(jam_ke+1);
                        document.getElementById("id_labeljam").innerHTML="Pindah Jam Ke- : "+(jam_ke+1); 

                        
                    }
                }); 
				
				// set dropdown assycode
					// alert(id_line);
					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/Assycode/getAssyCodeDasboard',
	                    dataType : 'JSON',
	                    data:{
	                    	id_line:id_line
	                    },
	                    success : function(dat){
	                    	console.log(dat) ;
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

			function showdataBukanKamu(pdo_id) {

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
                    	id_pdo:pdo_id
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
                        //mencari status pdo set img 
                        //  SEt TTD IMG
                        status_pdo = res.pdo.status;
                        if (status_pdo==1) { 
                        	document.getElementById('info_lastupdt').innerHTML = 'Terahir Diperbarui Pada '+res.pdo.waktu; 
                        	document.getElementById('info_lastupdt').style.display = 'block'; 
                        }

                        // header
                        htmlhead1 +=
                        	'<tr>'+
								'<th colspan="4" style="text-align: center;">Assy</th>';
						htmlhead2 +=
								'<th style="border: none;">'+ 
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
			                data : { id:pdo_id },
			                success: function(response){  
			                	//isi db
			                	db_head = response;

			                	for (var a = 0; a < response.length; a++) { 
				                		htmlhead1 +=
				                			'<th>'+response[a].kode_assy+'</th>';
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
							tm='<td>'+data[i].plan+'</td>';

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
				                				'<td>'+response[a].actual+'</td>'; 
			                					
				                				found = true; 
				                				// counter jumlah Act 
				                				// membuat & insert total setiap jenis assy 
						                		totActual.push([db_head[ir].id_assy,Number(response[a].actual)]);  

			                				} else if(db_head[ir].id_assy!=response[a].id_assy && found==false){

			                					tmphtml =  '<td></td>'; 	
			                					found = true
			                				}
			                				 
				                		}

				                		// jika tidak ada data sama sekali di row Tengah"
				                		if (response.length==0 && (i+1)!=data.length) { 
				                			tmphtml =  '<td></td>'; 	
				                		}

				                		// html fix add dengan temphtml
				                		html += tmphtml; 
				                	}

				                	// jika last row jam & null assembly
				                	if(response.length==0 && (i+1)==data.length){
				                		for (var ir = 0; ir < db_head.length; ir++) {
				                			html += 
				                				'<td></td>'; 
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
                        	'<tr>'+
                        		'<td rowspan="2" style="border: none;" align="center"><div style="width: 100px;"></div></td>'+
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
						eff_actual = eff.toFixed(1);
						eff_actual = res.eff_exc.eff_excl;
						// EFF EXCl
						document.getElementById('id_act_eff_excl').innerHTML= parseFloat(res.eff_exc.eff_excl).toFixed(1)+"%"; 
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

						$('#tbud').html('');
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
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/Assycode/getAssyCodeDasboard',
	                    dataType : 'JSON',
	                    data:{
	                    	id_line:id_line
	                    },
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

			function showdataNotFound() { 

				// speed LINE 
					// document.getElementById('btn_changesped').style.display = 'none';
					// document.getElementById('id_speedline').style.display = 'none';

				// verif
				document.getElementById('id_verif').style.display = 'none';

				// set tulisan WIDGET
                document.getElementById('tot_plan').innerHTML= 'ooo';
                document.getElementById('tot_actual').innerHTML= '0';    
                document.getElementById('id_progres_output').style.width= '0%';
                document.getElementById('id_progres_output').innerHTML= '0%';
                
                // set widget mhin 
                document.getElementById('id_mhinact').innerHTML= '0'; 
				// set TULISAN WIDGET MHOUT
				document.getElementById('id_act_mhout').innerHTML= '0';
				// eff actual 
				document.getElementById('id_act_eff').innerHTML= "0%";  
                // productivity 
                document.getElementById('id_prod_percent').innerHTML= '0'; 
                // manpower 
                document.getElementById('id_mp_act').innerHTML= ''; 
                
                document.getElementById('prog_mh_in').style.width= '0%'; 
                document.getElementById('prog_mh_in').innerHTML= '0%';
                
                document.getElementById('prog_mh_out').style.width= '0%'; 
                document.getElementById('prog_mh_out').innerHTML= '0%';

                document.getElementById('id_act_eff_progres').style.width= '0%'; 
                document.getElementById('id_act_eff_progres').innerHTML= '0%';
                // exclude
                document.getElementById('id_act_eff_progresexcl').style.width= '0%'; 
                document.getElementById('id_act_eff_progresexcl').innerHTML= '0%';
                 
                $('#tbody_outputt').html('');
                $('#thead_outputt').html(''); 
                $('#tbud').html('<div class="jumbotron"><h3 class="text-center">DATA TIDAK TERSEDIA </h3></div>');
			}

		// tes TOolTiP
			$('#tbody_outputt').on('click','.not_enouge',function(){
				var id = $(this).data('id');

				$.ajax({
					async: false,
					type: "POST",
					url: "<?php echo site_url('Losstime/cariDowntimeByOC') ?>",
					dataType: "JSON",
					data:{
						id_oc:id
					},
					success: function(res){
						var htm ='';
						// console.log(res);
						// alert(res.length);
						for (var i = 0; i < res.length; i++) { 
							htm +=
							'<tr>'+
		      					'<td>'+res[i].durasi+' Menit</td>'+
		      					'<td style="text-align: left;">'+res[i].keterangan+'</td>'+
		      				'</tr>';  
						}  
						$('#tbl_downtimedetail').html(htm);
					}
				});

				$('#cek_downtime').modal('show');
			});
	 

			$("#tbody_outputt").on('dblclick','.inner',function (e) {
		        e.stopPropagation();
		        var currentEle = $(this);
		        var value = $(this).html();
		        updateVal(currentEle, value);
		    });

	    function updateVal(currentEle, value) {
		    $(currentEle).html('<input class="thVal form-control" style="width: 85px;" type="number" value="' + value + '" />');
		    $(".thVal").focus();
		    $(".thVal").select();
		    $(".thVal").keyup(function (event) {
		        if (event.keyCode == 13) {
		            $(currentEle).html($(".thVal").val().trim());
		            console.log('enter');
		        }
		    });

		    $(document).click(function () {
		            $(currentEle).html($(".thVal").val().trim());
		    });
		}

		// CEK Hari INI
			function cekHariini() {
				$.ajax({ 
	                type  : 'POST',
	                url   : '<?php echo base_url();?>index.php/Welcome/cekHariIni',
	                dataType : 'JSON', 
	                data:{
	                	id_line:id_line,
	                	id_shift:id_shift,
	                	id_tgl:id_tgl
	                } ,
	                success : function(res){   
							if (res) { 
								id_pdo = res.id;

								// Config Dispay
								document.getElementById('contain_dasboard').style.display = 'block';
								document.getElementById('panel_newplann').style.display = 'none';

								// jika admin
								var lv  = <?php echo $ses['level'] ?>; 

								// cek jika itu bukan miliknya
	                    		if ($('#id_user').val()==res.id_users || lv==1) {
	                    			showdata(res.id);
	                    			// ganti speed miliknya
	                    			document.getElementById('btn_changesped').style.display = 'contents';
	                    			$("input[name='speed_edit_temp']").val(res.line_speed);
	                    			// ganti id PDO NYA 
	                    			console.log('MILIKNYA') 

	                    		}else {
	                    			showdataBukanKamu(res.id);
	                    			// ganti speed
	                    			document.getElementById('btn_changesped').style.display = 'none';
	                    			console.log('not YOU')
	                    		} 

	                    		// speed line
	                    		document.getElementById('dis_speedpdo').style.display = 'block';
	                    		document.getElementById('id_speedline').style.display = 'contents';
	                    		document.getElementById('id_speedline').innerHTML = res.line_speed;
	                    		// non verif
	                    		document.getElementById('panel_infoverif').style.display = 'none';
	                    		// $('#speed_edit').val(res.line_speed);
	                    		$('#speed_edit_temp').val(res.line_speed);

	                    		 //  STATUS VERIFIKASI 	
	                    		 if (res.status==1) {
	                    		 	document.getElementById('id_verif').style.display = 'block';
	                    		 }else{
	                    		 	document.getElementById('id_verif').style.display = 'none';
	                    		 }

	                    		 // conf
	                    		document.getElementById('contain_dasboard').style.display = 'block';

	                    		document.getElementById('panel_infoverif').style.display = 'none';   
								document.getElementById('panel_newplann').style.display = 'none';
								document.getElementById('no_pdodata').style.display = 'none'; 

								id_listcarline = res.id_listcarline ; 
	                    		console.log(res);
							}else{
								console.log(res);
								// cekVerif(); 
								$.ajax({
					                async : false,
					                type  : 'POST',
					                url   : '<?php echo base_url();?>index.php/Welcome/cekBelumVerifikasi',
					                dataType : 'JSON',  
					                data:{
					                	id_line:id_line,
					                	id_shift:id_shift,
					                	id_tgl:id_tgl},
					                success : function(res){ 
					                		console.log('ini verif');
											if (res) {
												console.log(res);
												// membuat tgl
												$('#tglnotverif').val(res.tgl);
												var tod = new Date(res.tgl); 

												document.getElementById('infoo_verf').innerHTML= "Data Report PDO Kemarin Tanggal : <b>"+daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear()+"</b> Belum Di Verifikasi.<br><b>Silahkan Verifikasi Terlebih Dahulu.</b>";

												document.getElementById('panel_infoverif').style.display = 'block';

												document.getElementById('contain_dasboard').style.display = 'none'; 
												document.getElementById('dis_speedpdo').style.display = 'none';
												document.getElementById('panel_newplann').style.display = 'none';
												document.getElementById('no_pdodata').style.display = 'none'; 
											}else{
												console.log(res);
												var todd = new Date();
												var temptod = new Date(id_tgl);

												if (temptod>todd) {
													document.getElementById('no_pdodata').style.display = 'block'; 

													document.getElementById('contain_dasboard').style.display = 'none'; 
													document.getElementById('dis_speedpdo').style.display = 'none';
													document.getElementById('panel_newplann').style.display = 'none';
													document.getElementById('panel_infoverif').style.display = 'none';
												}else{
													// Config Dispay
													document.getElementById('panel_newplann').style.display = 'block';

													document.getElementById('contain_dasboard').style.display = 'none'; 
													document.getElementById('dis_speedpdo').style.display = 'none'; 
													document.getElementById('panel_infoverif').style.display = 'none';
													document.getElementById('no_pdodata').style.display = 'none'; 
												}
												
											}
											

					                }

					            });

								// DASBOARD
								console.log('is no data');
	                    		showdataNotFound();   

	                    		// null
	                    		eff_actual=0;
	                    		eff_excl =0;
								tot_mhinall=0;
								tot_mhout = 0;
							}
							

	                }

	            }); 
			}



		// Cek VERIFIKASI
			function cekVerif() { 
	        	$.ajax({
	                async : false,
	                type  : 'POST',
	                url   : '<?php echo base_url();?>index.php/Welcome/cekBelumVerifikasi',
	                dataType : 'JSON',  
	                data:{
	                	id_line:id_line,
	                	id_shift:id_shift,
	                	id_tgl:id_tgl},
	                success : function(res){ 
	                		console.log('ini verif');
							if (res) {
								console.log(res);
								// membuat tgl
								$('#tglnotverif').val(res.tgl);
								var tod = new Date(res.tgl); 

								document.getElementById('infoo_verf').innerHTML= "Data Report PDO Kemarin Tanggal : <b>"+daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear()+"</b> Belum Di Verifikasi.<br><b>Silahkan Verifikasi Terlebih Dahulu.</b>";

								document.getElementById('panel_infoverif').style.display = 'block';

								document.getElementById('contain_dasboard').style.display = 'none'; 
								document.getElementById('dis_speedpdo').style.display = 'none';
								document.getElementById('panel_newplann').style.display = 'none';
								document.getElementById('no_pdodata').style.display = 'none'; 
							}else{
								console.log(res);
								var tod = new Date(); 

								if (today>tod) {
									document.getElementById('no_pdodata').style.display = 'block'; 

									document.getElementById('contain_dasboard').style.display = 'none'; 
									document.getElementById('dis_speedpdo').style.display = 'none';
									document.getElementById('panel_newplann').style.display = 'none';
									document.getElementById('panel_infoverif').style.display = 'none';
								}else{
									// Config Dispay
									document.getElementById('panel_newplann').style.display = 'block';

									document.getElementById('contain_dasboard').style.display = 'none'; 
									document.getElementById('dis_speedpdo').style.display = 'none'; 
									document.getElementById('panel_infoverif').style.display = 'none';
									document.getElementById('no_pdodata').style.display = 'none'; 
								}
								
							}
							

	                }

	            });
	        }

	        $('#pindah_verifikasi').click(function(){
	        	// hidden
	        	document.getElementById('panel_infoverif').style.display = 'none';

	        	var tgl = $('#tglnotverif').val();
	        	var tod = new Date(tgl); 
	        	document.getElementById('slect_date').value= daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();

	        	id_tgl =tgl;
	        	updateOpt();
	        	cekHariini();
	        });


		// CEK PLANNING BULANAN
			function showplanning() { 

				$.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
                    dataType : 'JSON', 
                    data:{
                    	tgl: id_tgl,
                    	id_line: id_line
                    },
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
                        	// percent EFF EXCL
                        	var percent_eff_excl = (eff_excl/Number(res.efisiensi))*100; 
                        	document.getElementById('id_act_eff_progresexcl').style.width= percent_eff_excl.toFixed(1)+'%';
                        	document.getElementById('id_act_eff_progresexcl').innerHTML= percent_eff_excl.toFixed(1)+'%'; 

                        	edittarget=true;		
                    	}else {
                    		console.log('no plan');

                    		document.getElementById('text_judulplan').innerHTML = "Buat Target Planning Bulan "+monthName[today.getMonth()];
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
							// showdata($('#id_pdo').val());
							cekHariini();
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
							// showdata($('#id_pdo').val());
							cekHariini();
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
 
				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataBuildAssy',
	                dataType : "JSON",
	                data : {
	                		id_oc:idjam, 
	                		id_assy:idassy,
	                		pdo:id_pdo
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
				// showdata($('#id_pdo').val());
				cekHariini();
			});

		// to SHOW NEW JAM VERTICAL
			$('#tbody_outputt').on('click','.newJamVertical',function(){
				let spd = Number($("input[name='speed_edit_temp']").val()); 
				var toOut = (spd*loss_output);
				// 10% dari total
				var batas = (toOut*2)/100; 


				// checking output SESUAI APA TIDAK 
					// Downtime Kurang
					if (total_loss_detik<(toOut-batas) && output_sesuai== false) {
						Swal.fire({
	  						title: 'Output Actual yang dihasilkan tidak sesuai.',
							text:'"Kurang Banyak Downtime"',
							footer:'Total Downtime harus di Atas: '+(toOut-batas)+'  |&nbsp Downtime sekarang: '+total_loss_detik,
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Revisi Downtime'
						}).then((result) => {
						  if (result.value) {
						  		setTimeout(' window.location.href = "<?php echo site_url('losstime/index/1'); ?>" ');
						  }
						}); 
						return;
					}
					// Downtime kelebihan
					else if(total_loss_detik>(toOut+batas) && output_sesuai== false){
						Swal.fire({
							type: 'error',
	  						title: 'Output Actual yang dihasilkan tidak sesuai.',
							text:'"Terlalu Banyak Downtime"',
							footer:'Total Downtime harus Di Bawah: '+(toOut+batas)+'  |&nbsp Downtime sekarang: '+total_loss_detik,
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'Revisi Downtime'
						}).then((result) => {
						  if (result.value) {
						  		setTimeout(' window.location.href = "<?php echo site_url('losstime/index/1'); ?>" ');
						  }
						});
						return;
					}  
					else if ((toOut+batas)>total_loss_detik && (toOut-batas)<total_loss_detik) {
						// Swal.fire('Ooke Downtime sesuai');
					} 

				// check ZERO DOWNTIMEn JIKA mau pindah JAM
				var isireport = true;
				if (jum_jam!=0) {
					$.ajax({
		            	async : false,
		                type : "POST",
		                url   : '<?php echo base_url();?>index.php/Losstime/cariLossTime',
		                dataType : "JSON",
		                data : {
		                		id_oc: $('#idjamke').val()
		                	},
		                success: function(response){ 
		                	// jika sukses
		                	$('#jum_plann').val('');
		                	// jika sudah ada downtime
							if(response.length>0){   
								//  PASS LEWAT downtime
								document.getElementById('info_isidowntime').style.display = 'none'; 
								document.getElementById('jum_plann').disabled = false;

								isireport = false;
							}
							else{ //jika belum ada downtiime 
								document.getElementById('btn_pindahjam').style.display = 'none';
								document.getElementById('btn_pindahkedowntime').style.display = 'block';
								document.getElementById('info_isidowntime').style.display = 'block';
								document.getElementById('jum_plann').disabled = true;
								
								isireport = true;
							}

		                }
		            });
				}  

				if (jum_jam == max_jamkerja) {
					if (isireport == true) {
						Swal.fire(
							'Report Jam ke-'+(jum_jam)+' Downtime masih kosong.  Silahkan isi ZERO downtime terlebih dahulu.'
							).then(function(){
						    	setTimeout(' window.location.href = "<?php echo site_url('losstime'); ?>" ');
						    }); 
					}else {
						$('#modal_submit').modal('show'); 	
					} 
				}else {
					$('#modaladdjamke').modal('show');	
				} 
				
			});
		// event click btn new jam vertical
			$('#btn_pindahjam').click(function(){    
				var jumplan  = $('#jum_plann').val();
				var jamke = $('#terus_jam_ke').val();

				$.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataOutputControl',
	                dataType : "JSON",
	                data : {
	                		id_pdo:id_pdo, 
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
				// refresh
				cekHariini(); 
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
						// showdata($('#id_pdo').val());  
						cekHariini();
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

 				// ajax upload
 				$.ajax({
                    async : false,
	                type : "POST",
	                url   : '<?php echo site_url("OutputControl/updateDataBuildAssy");?>',
	                dataType : "JSON",
	                data : { 
	                	id_a:idu,
	                	act:actu,
	                	id_pdo:id_pdo
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
				// showdata($('#id_pdo').val());
				cekHariini();
			});
			// ========== END event edit click =====================

		// ========== start event new assy Bottom + click ===================== 
			$('#tbody_outputt').on('click','.item_newassy',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var idr = $(this).data('idrow');
                var idcolassy = $(this).data('idcol');
                var baris = $(this).data('baris');
                var kodeassy = $(this).data('kodeassy'); 
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
		                		pdo:id_pdo
		                	},
		                success: function(response){
		                	if (response) { 
		                		Swal.fire({
		                			title:'Sukses ditambah sss!', 
							      type:'success',
							      timer: 1000
							  });
							   cekHariini();
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

				    // showdata($('#id_pdo').val());
				    
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
			$("input[name='speed_edit_cv']").TouchSpin({
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
			$("input[name='durasi_aktivitas']").TouchSpin({
				min: 0,
				max: 60,
				step: 1,
				decimals: 0,
				boostat: 5,
				maxboostedstep: 10,
				postfix: 'menit'
			});

			$("input[name='durasi_aktivitas_edit']").TouchSpin({
				min: 0,
				max: 60,
				step: 1,
				decimals: 0,
				boostat: 5,
				maxboostedstep: 10,
				postfix: 'menit'
			});

		// update gauge
			let spdi = Number($("input[name='speed_edit_cv']").val());  
			$('#spd_cv').highcharts().series[0].points[0].update(spdi);

			// event on change value touchspin
			$("input[name='speed_edit_cv']").on('touchspin.on.startspin', function () {
				// get speed data
				let spd = Number($("input[name='speed_edit_cv']").val()); 
				// update gauge
				$('#spd_cv').highcharts().series[0].points[0].update(spd);
			});

		// btn show speed modal
			$('#btn_changesped').click(function(){   

				let spdi = Number($("input[name='speed_edit_temp']").val());  
				$("input[name='speed_edit_cv']").val(spdi);
				$('#spd_cv').highcharts().series[0].points[0].update(spdi);
				
				$('#scv_modal').modal('show'); 
			});

		// update speed submit event 
			$('#btn_update_speed').click(function(){
				var sped = $("input[name='speed_edit_cv']").val(); 
 
				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('PDO_Controler/updateSpeed') ?>",
					dataType : "JSON",
					data : {
						id:id_pdo,
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
						    	// document.location.reload(true);
						    	cekHariini();
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
				var plan = $('input[name="target_plan"]').val();

				// alert('in'+inn+'|ou:'+out+'|ef:'+eff); 
				var daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();
				 
				// console.log('dyinmont:'+daysInMonth);
				// console.log('bln: '+currentMonth);
				// console.log('thn: '+currentYear);

				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo site_url('Target/newTargetBulan') ?>",
					dataType : "JSON",
					data : {
						id_cline:id_line,
						out:out,
						in:inn,
						eff:eff, 
						plan:plan,
						tahun:currentYear,
						bln:(currentMonth+1),
						enddays:daysInMonth
					},
					success: function(data){
						$('#scv_modal').modal('hide');
						if (data) {
							Swal.fire(
						      'Berhasil !',
						      'Update Speed',
						      'success'
						    );
						    cekHariini();
							showplanning(); 
							$('#newplanmonth_modal').modal('hide');
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
				document.getElementById('id_infoplanmhout').innerHTML = "Plan MH OUT "+monthName[currentMonth]+' :';
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
						tgl_start:tgl_start,
						tgl_end:tgl_end
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
						tgl_start:tgl_start,
						tgl_end:tgl_end
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
						tgl_start:tgl_start,
						tgl_end:tgl_end
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
 				var p1 = $('input[name="pass1"]').val();
 				var p2 = $('input[name="pass2"]').val();
 				var p3 = $('input[name="pass3"]').val();
 				var p4 = $('input[name="pass4"]').val();
 				var p5 = $('input[name="pass5"]').val();
 				var p6 = $('input[name="pass6"]').val();

 				if (p1.length==0 || p2.length==0 ||p3.length==0 || p4.length==0 || p5.length==0 || p6.length==0) {
 					Swal.fire({
					  title: 'Passcode Belum Diisi',
					  text: 'Silahkan Isi Passcode dengan Benar',
					  type: 'error',
					  confirmButtonText: 'Ok',
					  allowOutsideClick: false
					}) ;
 					return ; 
 				}
 				
 				if (signaturePad.isEmpty()) {
 					Swal.fire({
					  title: 'Sorry',
					  text: 'Tanda tangan terlebih dahulu',
					  type: 'error',
					  confirmButtonText: 'Ok',
					  allowOutsideClick: false
					}) ;
 					return ; 
 				} 
 				// gabungan passcode
 				var passcode = p1+p2+p3+p4+p5+p6;  

 				$.ajax({ 
 					async: false,
					url : "<?php echo site_url('VerificationSupervisor/cekPassCodeSpv') ?>",
					data: { passcode:passcode,pdo:id_pdo },
					type: 'post',
					dataType: 'json',
					success: function (response) {  
					   if (response) {
					   		console.log(response);
					   		// Jika Passcode Benar 
					   		html2canvas([document.getElementById('signature_canvas')], {
								onrendered: function (canvas) { 
									var dataUrl = canvas.toDataURL('image/png'); 
 									var imgdat = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");
			 						// Proses Upload Signature
									$.ajax({ 
										async: false,
										url : "<?php echo site_url('VerificationSupervisor/verification') ?>",
										data: { img:imgdat, id_pdo:id_pdo,nik:response.nik },
										type: 'post',
										dataType: 'json',
										success: function (response) { 
										   console.log(response);
										   Swal.fire({
											  title: 'Verifikasi Sukses',
											  text: 'Data Telah Di Verifikasi',
											  type: 'success',
											  confirmButtonText: 'Ok'
											}) ; 
										   // showdata($('#id_pdo').val());
										   cekHariini();
										},
										error: function(data){
							                console.log(data);
							            }
									});
								}
							});
					   		// FInish Hide & CLEAR 			
							// document.getElementById('fom_passcode').reset();
			 				$('#modal_submit').modal('hide'); 
					   }else { 
					   		Swal.fire({
							  title: 'Passcode Tidak Valid',
							  text: 'Pastikan anda Mengisi Passcode dengan Benar',
							  type: 'error',
							  confirmButtonText: 'Ok'
							}) ;
					   } 
					},
					error: function(data){
						alert(data);
		                console.log(data);
		            }
				});
				

 			});


 		// Signature pad
 			var signaturePad = new SignaturePad(document.getElementById('signature_canvas'), {
			  // backgroundColor: 'rgba(255, 255, 255, 0)',
			  penColor: 'rgb(0, 0, 0)',
			  drawBezierCurves:true
			});

			$('#clearr').on('click',function(){
				signaturePad.clear();
			});


		//  BUAT ASSY BARU DADAKAN
			// trigger
			$('#btn_buatassybaru').click(function(){

				$('#modalnewbuild').modal('hide'); 
				$('#modalnewassyinvalid').modal('show');
			});
			// submit
			$('#btn_newassybaru').click(function(){
				var name = $('#in_newassybaru').val(); 
				var idjam  = $('#idjamke').val(); 
 				 
 				// 
				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newBuildAssyDadakan',
	                dataType : "JSON",
	                data : {
	                		id_oc:idjam, 
	                		name:name,
	                		pdo:id_pdo,
	                		lstcarline:id_listcarline
	                	}, 
	                success: function(response){  
						if(response){  
							$('#modalnewassyinvalid').modal('hide');
							loadDropdown();
							cekHariini();
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
 
			});
		// ASSY CODE checked availabe
 			$('#in_newassybaru').keyup(function(){
 				var assy = $('#in_newassybaru').val();
 				if (assy.length===0) {
 					document.getElementById("in_newassybaru").classList.remove("form-control-success");
 					document.getElementById("btn_newassybaru").disabled = true;
 					return;
 				}
				$.ajax({ 
 					type: 'POST',
 					url: '<?php echo site_url("Assycode/searchAssyName") ?>',
 					dataType: "JSON",
 					data:{
 						name: assy
 					},
 					success: function(data){
 						if (data.length==0) {  
 							document.getElementById("in_newassybaru").classList.remove("form-control-danger");
 							document.getElementById("in_newassybaru").classList.add("form-control-success"); 
 							document.getElementById("tipsss").style.display= 'none';
 							document.getElementById("btn_newassybaru").disabled = false;
 						}else{
 							document.getElementById("in_newassybaru").classList.remove("form-control-success");
 							document.getElementById("in_newassybaru").classList.add("form-control-danger"); 
 							document.getElementById("tipsss").style.display= 'block';
 							document.getElementById("btn_newassybaru").disabled = true;
 						}
 					} 
 				});
 			}); 


		// UPDATE isi Sesion
			function updateOpt() {
				$.ajax({ 
	                type  : 'POST',
	                url   : '<?php echo site_url();?>/Login/updateDataOpt',
	                dataType : 'JSON',  
	                data:{
	                	tgl: id_tgl,
	                	sif: id_shift,
	                	line: id_line
	                },
	                success : function(res){   
						console.log(res);
	                }

	            });
			}



			// ===== WIZARD PDO WEEELLLCOOMEEEE ===
			// ARRAY new direct Activity 
				var activ = []; 
				 
		        // ISI DATA Tabel
		        function isi_activity(){
		        	var html ="";
		        	for (var i = 0; i < activ.length; i++) {
		        		html += '<tr>'+
								'<th scope="row">'+(i+1)+'</th>'+
								'<td>'+activ[i].item+'</td>'+
								'<td>'+activ[i].menit+'</td>'+
								'<td>'+
	                    		'<a href="javascript:void(0);" class="item_edit_aktifitas" data-posisi="'+i+'" data-id_k="'+activ[i].item+'" data-duration="'+activ[i].menit+'" ><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
	                    		'</td>'+
							'</tr>'; 
		        	} 

		        	html += 
		        			'<tr>'+
								'<th scope="row"></th>'+
								'<td><button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalnewact"  type="button">Tambah <i class="icon-copy fa fa-plus" ></i></button></td>'+
								'<td></td> <td></td>'+
							'</tr>';
		        	$('#tbl_activlabor').html(html); 

		        }

			// init wizard
				$(".tab-wizard").steps({
					headerTag: "h5",
					bodyTag: "section",
					transitionEffect: "fade",
					titleTemplate: '<span class="step">#index#</span> #title#',
					labels: {
						finish: "Create"
					},
					onStepChanged: function (event, currentIndex, priorIndex) {
						$('.steps .current').prevAll().addClass('disabled');
					},
					onFinished: function (event, currentIndex) {
						if (document.getElementById("ini_pernyataan").checked==true) {
							// dl
							var stddl = document.getElementById("f_std_dl").value;
							var regdl = document.getElementById("f_reg_dl").value;
							var jam_otdl = document.getElementById("f_jam_ot").value;
							var dl_otdl = document.getElementById("f_dl_ot").value;
							// idk
							var stdidl = document.getElementById("f_std_idl").value;
							var regidl = document.getElementById("f_reg_idl").value;
							var jam_otidl = document.getElementById("f_jam_ot_idl").value;
							var dl_otidl = document.getElementById("f_idl_ot").value;

							var speed = $("input[name='speed_edit_newpdo']").val();
							// activity
							// console.log('stddl:'+stddl+",regdl:"+regdl+",otdl:"+jam_otdl+",dlot:"+dl_otdl+",&idl:"+stdidl+",regidl:"+regidl+",jamotidl:"+jam_otidl+",dlotidl"+dl_otidl+'|speed:'+speed);
							// console.log(activ);
							// console.log($('#select_line').val()); 

							$.ajax({
				            	async : false,
				                type : "POST",
				                url   : '<?php echo base_url();?>index.php/Welcome/newPdo',
				                dataType : "JSON",
				                data : {
				                		// core opt
				                		id_tgl:id_tgl,
				                		id_shift:id_shift,
				                		id_line: id_line,

				                		stddl:stddl,
				                		regdl:regdl,
				                		jam_otdl:jam_otdl,
				                		dl_otdl:dl_otdl,

				                		stdidl:stdidl,
				                		regidl:regidl,
				                		jam_otidl:jam_otidl,
				                		dl_otidl:dl_otidl,

				                		speed: speed,
				                		act: activ
				                	},
				                success: function(response){ 
				                	console.log('ini resp:');
				                	console.log(response);
				                	// jika terdapat error / user pass salah
									if(response.error || response.error1 || response.error2 ){  
										Swal.fire({
										  title: 'Error!',
										  text: 'Terjadi kesalahan pengiriman data',
										  type: 'error',
										  confirmButtonText: 'Ok',
										  allowOutsideClick: false
										}).then(function(){  
									    	document.getElementById('panel_wizard').style.display = 'none';
									    	cekHariini();
									    }); 

									}else{
										Swal.fire({
										  title: 'Berhasil',
										  text: 'Planning Pdo Telah dibuat',
										  type: 'success',
										  confirmButtonText: 'Ok',
										  allowOutsideClick: false
										}).then(function(){ 
											console.log('SUkses new PDO');
									    	document.getElementById('panel_wizard').style.display = 'none';
											cekHariini();
											showplanning();
									    }); 
									}
						

				                }
				            }); 



						}else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Anda Sudah Checked Setuju',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
						}
						
					}
				});
	// ======== TRIGER 
			// tombol buat pdo plann baru 
				$('#btn_newplan').click(function()
				{    
					var a1 = { item:"5S + Yoidon", menit:0 };
					var a2 = { item:"Home Position", menit:0 };
			        activ.push(a1); 
			        activ.push(a2);

			        isi_activity();

				    document.getElementById("panel_wizard").style.display="block";
	                document.getElementById("panel_newplann").style.display="none";
				});

			// Tambah Aktivitas baru
				 $('#tambah_activ').click(function()
					{    
						var named_act = document.getElementById("nameAct").value;
						var durasi_act = $('input[name="durasi_aktivitas"]').val();
						var temp = { item:named_act, menit:durasi_act };
						activ.push(temp);
						isi_activity(); 
						$('#modalnewact').modal('hide');
						document.getElementById('form_addactiv').reset(); 
					}); 
			// Edit Aktivitas terpilih
				//get data for edit record show prompt modal
	            $('#tbl_activlabor').on('click','.item_edit_aktifitas',function(){
	                var namek = $(this).data('id_k'); 
	                var duration = $(this).data('duration'); 
	                var poss = $(this).data('posisi'); 
	 				
	 				document.getElementById("nameActedit").value = namek;
					document.getElementsByName("durasi_aktivitas_edit").value = duration;
					document.getElementById("id_edit").value = poss;
	                $('#modaledit_aktivitas').modal('show'); 
	            });
            	//event edit cliked
	            $('#tambah_activedit').click(function()
				{    
					var named_act = document.getElementById("nameActedit").value;
					var durasi_act = $('input[name="durasi_aktivitas_edit"]').val();
					var posi = document.getElementById("id_edit").value;
					   
					activ[posi].item = named_act;
					activ[posi].menit = durasi_act;

					isi_activity(); 
					$('#modaledit_aktivitas').modal('hide');
					document.getElementById('form_editactiv').reset(); 
				});


	        // conf 
		        // gauge chart
					Highcharts.chart('spd_cv_newpdo', {

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
				$("input[name='speed_edit_newpdo']").TouchSpin({
					min: 0,
					max: 200,
					step: 1,
					decimals: 0,
					boostat: 5,
					maxboostedstep: 10,
					postfix: 'speed'
				}); 
			// update gauge
				var spd_newpdo = Number($("input[name='speed_edit_newpdo']").val());  
				$('#spd_cv_newpdo').highcharts().series[0].points[0].update(spd_newpdo);
			// event on change value touchspin
				$("input[name='speed_edit_newpdo']").on('touchspin.on.startspin', function () {
					// get speed data
					let spd = Number($("input[name='speed_edit_newpdo']").val()); 
					// update gauge
					$('#spd_cv_newpdo').highcharts().series[0].points[0].update(spd);
				});  
		});
	</script>
</html>