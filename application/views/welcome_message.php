<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/
	jquery.steps.css">
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
<body id="box-bg">
	<?php $this->load->view('header/header_users'); ?>
	<?php $this->load->view('header/sidebar_users'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			 
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
										<input class="form-control" type="number" id="f_std_dl" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label >Reg DL :</label>
										<input class="form-control" type="number" id="f_reg_dl">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Jam Overtime :</label>
										<input class="form-control" type="number" id="f_jam_ot">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>DL Overtime :</label>
										<input class="form-control" type="number" id="f_dl_ot">
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
										<input class="form-control" type="number" id="f_std_idl">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label >Reg IDL :</label>
										<input class="form-control" type="number" id="f_reg_idl">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Jam Overtime :</label>
										<input class="form-control" type="number" id="f_jam_ot_idl">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>IDL Overtime :</label>
										<input class="form-control" type="number" id="f_idl_ot">
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
									<div id="spd_cv" style="min-width: 160px; max-width: 180px; height: 250px; margin: 0 auto"></div>
									<center>
									<div class="form-group col-md-6" style="margin-top: -40px;">
										<label>Kecepatan Conveyor</label>
										<input id="demo1" type="number" value="104" name="speed_edit">  
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

			<div id="panel_infoverif" class="login-wrap customscroll align-items-center flex-wrap justify-content-center pd-20" style="display: none;">
				<div class="bg-white box-shadow pd-30 border-radius-5">
					 <h1 class="text-center">Verifikasi PDO</h1>
					 <br>
					 <div class="alert alert-warning" role="alert" id="info_isidowntime" >
						Data Report PDO Kemarin Belum Di Verifikasi.<br>
						Silahkan Verifikasi Terlebih Dahulu.
					</div>
					 <br>
					 <br>
					 <center>
					 <button id="cari_verifikasi" type="button" class="btn" data-bgcolor="#5C92FF" data-color="#ffffff">Verifikasi Sekarang <i class="icon-copy fa fa-check-square" ></i></button> 
					</center>
				</div>
			</div>
 			
 			<!-- top icon dasboard -->
 			<div id="div_verif" style="display: none;">
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

			 	<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="margin-top: -10px" id="container_verif">  
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

		</div>
	</div> 
 


<!-- Modal -->
<div>
	<!-- modall neww -->
		<div class="modal fade" id="modalnewact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Tambah Aktivitas</h2>
						<form id="form_addactiv">
							<div class="input-group custom input-group-lg">
								<label>Aktivitas :</label>
								<input id="nameAct" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
								 
							</div>
							<div class="form-group">
								<label>Durasi :</label>
								<input id="demo1" type="text" value="5" name="demo1">
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
	<!-- modall edit -->
		<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Edit Aktivitas</h2>
						<form id="form_addactiv">
							<div class="input-group custom input-group-lg">
								<label>Aktivitas :</label>
								<input id="nameActedit" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
								 
							</div>
							<div class="form-group">
								<label>Durasi :</label>
								<input id="demo1edit" type="text" value="5" name="demo1">
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
								<canvas id="signature-pad" class="signature-pad" width=400 height=300></canvas>
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
</div>

</body>
	
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
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

		$("input[name='demo1']").TouchSpin({
			min: 0,
			max: 60,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 10,
			postfix: 'menit'
		});

		$("input[name='demo1edit']").TouchSpin({
			min: 0,
			max: 60,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 10,
			postfix: 'menit'
		});

	</script>
	<script>
		$('document').ready(function(){ 
 		// Setting
 			// deklarasi nama bulan
	 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

				var today = new Date();
				var currentMonth = today.getMonth();
				var currentYear = today.getFullYear();
				var currDate = today.getDate();

				document.getElementById('slect_date').disabled = true;
				document.getElementById('slect_date').value= daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;

				var pdo_id ;
			// ADDITIONAL PICKER
				$('.date-pickerrr').datepicker({   
					language: "en",
					firstDay: 1,  
				    onSelect: function(selected, d, calendar) {   
				    	// jika yang dipilih sama 
				    	if (selected=='') {
				    		today = new Date(datetimeNow);
				    		var tod = new Date(datetimeNow);  

				    		document.getElementById('slect_date').value=  daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
				    		calendar.hide();
				    		return ;
				    	}else{
				    		today = new Date(selected);
				    		var tod = new Date(selected); 
					    	document.getElementById('slect_date').value= daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
					    	datetimeNow = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate();
				    	} 
				    	calendar.hide();

				    	// refresh 
				    }
				});
			// INPUT SETTING
				$(".inputs").keyup(function () {
				    if (this.value.length == this.maxLength) {
				      $(this).select();
				      $(this).next('.inputs').focus();  
				    }
				});

				$("input").click(function () {
				   $(this).select();
				});
			// ARRAY new direct Activity 
				var activ = []; 
				var a1 = { item:"5S + Yoidon", menit:0 };
				var a2 = { item:"Home Position", menit:0 };
		        activ.push(a1); 
		        activ.push(a2); 

		//  AUTO LOAD
	        isi_activity();
	        cekVerif();

	        // CEK JIKA ADA YANG  belumDI VERIF
	        function cekVerif() {
	        	
	        	$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/Welcome/cekBelumVerifikasi',
                    dataType : 'JSON',  
                    success : function(res){   
 						if (res) {
 							console.log(res);
 							pdo_id = res.id;
 							document.getElementById('info_isidowntime').innerHTML= "Data Report PDO Kemarin "+res.tanggal+" Belum Di Verifikasi.<br>Silahkan Verifikasi Terlebih Dahulu.";
 							document.getElementById('panel_infoverif').style.display = 'block';
 						}else{
 							console.log('pass');
 							document.getElementById('panel_newplann').style.display = 'block';
 						}
 						

                    }

                });
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

							var speed = $("input[name='speed_edit']").val();
							// activity
							// console.log(stddl+","+regdl+","+jam_otdl+","+dl_otdl+",&idl:"+stdidl+","+regidl+","+jam_otidl+","+dl_otidl);
							
							$.ajax({
				            	async : false,
				                type : "POST",
				                url   : '<?php echo base_url();?>index.php/Welcome/newPdo',
				                dataType : "JSON",
				                data : {
				                		stddl:stddl,
				                		regdl:regdl,
				                		jam_otdl:jam_otdl,
				                		dl_otdl:dl_otdl,

				                		stdidl:stdidl,
				                		regidl:regidl,
				                		jam_otidl:jam_otidl,
				                		dl_otidl:dl_otidl,

				                		speed: speed
				                	},
				                success: function(response){ 
				                	// jika terdapat error / user pass salah
									if(response.error || response.error1 || response.error2 ){  
										Swal.fire({
										  title: 'Error!',
										  text: 'Terjadi kesalahan pengiriman data',
										  type: 'error',
										  confirmButtonText: 'Ok',
										  allowOutsideClick: false
										}).then(function(){
									    	document.location.reload(true);
									    }); 

									}
									else{ 
										 
										// perulangan insert activity
										for (var ls = 0; ls < activ.length; ls++) {
	 										var durasijam = (activ[ls].menit/60);
	 										var to = (regdl*durasijam); 

											$.ajax({
												async: false,
												type: "POST",
												url: '<?php echo site_url('DirectLabor/anInsertActivity') ?>',
												dataType: "JSON",
												data:{
													idpdo: response.id_pdo,
													activity: activ[ls].item,
													qty: regdl,
													menit: activ[ls].menit,
													total: to
												},
												success: function(data){

												} 
											});

										}  
										Swal.fire(
									      'Berhasil !',
									      'Membuat Planning',
									      'success'
									    ).then(function(){
									    	document.location.reload(true);
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
			// ISI DATA Tabel
		        function isi_activity(){
		        	var html ="";
		        	for (var i = 0; i < activ.length; i++) {
		        		html += '<tr>'+
								'<th scope="row">'+(i+1)+'</th>'+
								'<td>'+activ[i].item+'</td>'+
								'<td>'+activ[i].menit+'</td>'+
								'<td>'+
	                    		'<a href="javascript:void(0);" class="item_edit" data-posisi="'+i+'" data-id_k="'+activ[i].item+'" data-duration="'+activ[i].menit+'" ><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
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

	// Trigger BUTTON
			$('#cari_verifikasi').on('click',function(){
				document.getElementById('panel_infoverif').style.display = 'none';
				showdata(pdo_id);
				document.getElementById('div_verif').style.display = 'block';
			});

			$('#tbody_outputt').on('click','.newJamVertical',function(){
				$('#modal_submit').modal('show'); 
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
					url : "<?php echo site_url('VerificationSupervisor/cekPassCodeSpv') ?>",
					data: { passcode:passcode },
					type: 'post',
					dataType: 'json',
					success: function (response) {  
					   if (response) {
					   		
					   		// Jika Passcode Benar
					   		html2canvas([document.getElementById('signature-pad')], {
								onrendered: function (canvas) { 
									var dataUrl = canvas.toDataURL();
			           				var newDataURL = dataUrl.replace(/^data:image\/png/, "data:application/octet-stream"); //do this to clean the url.
			 						// Proses Upload Signature
									$.ajax({ 
										url : "<?php echo site_url('VerificationSupervisor/verification') ?>",
										data: { img:newDataURL, id_pdo:pdo_id },
										type: 'post',
										dataType: 'json',
										success: function (response) { 
										   console.log(response);
										   Swal.fire({
											  title: 'Verifikasi Sukses',
											  text: 'Data Telah Di Verifikasi',
											  type: 'success',
											  confirmButtonText: 'Ok'
											}).then(function(){
												document.location.reload(true);
											});
										},
										error: function(data){
							                console.log(data);
							            }
									});
								}
							});
					   		// FInish Hide & CLEAR 			
							document.getElementById('fom_passcode').reset();
			 				$('#modal_submit').modal('hide'); 
					   }else { 
					   		Swal.fire({
							  title: 'Passcode Salah',
							  text: 'Pastikan anda Mengisi Passcode dengan Benar',
							  type: 'error',
							  confirmButtonText: 'Ok'
							}) ;
					   } 
					},
					error: function(data){ 
		                console.log(data);
		            }
				});
				

 			});



			function showdata(pdo_id) {
				var max_jamkerja;
				var htmlhead1 = '';
                var htmlhead2 = '';
                var htmlhead3 = '';
                var htmltotalbawah = '';
                var htmltotalbawahMhOt = '';
                var totActual=[]; 
                var db_head;
                var time ;

                loss_output = 0;

                // get data per pdo
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

                         console.log(res);

                        var tod = new Date(res.pdo.tanggal); 
                        time = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate(); 

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
                        		'<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn btn-primary newJamVertical" type="button" data-bgcolor="#FF5E67" data-color="#ffffff"><i class="icon-copy fa fa-check-square-o"></i>   Verifikasi</button></td>'+
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

						$('#tbud').html('');
                        $('#tbody_outputt').html(html);
                        $('#thead_outputt').html(htmlhead1);  
                    }
                }); 
				 
				
				$.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
                    dataType : 'JSON', 
                    data:{
                    	tgl: time
                    },
                    success : function(res){   
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
                    }

                }); 

			}
 	// ==========  EVENT ===================
 
	        // event button baru
		        $('#tambah_activ').click(function()
				{    
					var named_act = document.getElementById("nameAct").value;
					var durasi_act = document.getElementById("demo1").value;
					var temp = { item:named_act, menit:durasi_act };
					activ.push(temp);
					isi_activity(); 
					$('#modalnewact').modal('hide');
					document.getElementById('form_addactiv').reset(); 
				}); 
	        // event Edit
	        //get data for edit record show prompt modal
	            $('#tbl_activlabor').on('click','.item_edit',function(){
	                var namek = $(this).data('id_k'); 
	                var duration = $(this).data('duration'); 
	                var poss = $(this).data('posisi'); 
	 				
	 				document.getElementById("nameActedit").value = namek;
					document.getElementById("demo1edit").value = duration;
					document.getElementById("id_edit").value = poss;
	                $('#modaledit').modal('show'); 
	            });
            //event edit cliked
	            $('#tambah_activedit').click(function()
				{    
					var named_act = document.getElementById("nameActedit").value;
					var durasi_act = document.getElementById("demo1edit").value;
					var posi = document.getElementById("id_edit").value;
					   
					activ[posi].item = named_act;
					activ[posi].menit = durasi_act;

					isi_activity(); 
					$('#modaledit').modal('hide');
					document.getElementById('form_addactiv').reset(); 
				});
			// tombol buat pdo plann baru 
				$('#btn_newplan').click(function()
				{   
				    document.getElementById("panel_wizard").style.display="block";
	                document.getElementById("panel_newplann").style.display="none";
				});
	 			
				$('#btn_test').click(function(){
					$.ajax({
						async : false,
						type : "POST",
						url: '<?php echo site_url('DirectLabor/arInsertActivity') ?>',
						dataType : "JSON",
						data:{
							aray:activ
						},
						success: function(data){
							console.log("sukses");
						}
					});
				});
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


				// 
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