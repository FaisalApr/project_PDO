<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users Dashboard</title> 
	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">c
	 <!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/
	jquery.steps.css"> 
	<!-- SELEct 2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.min.css">
 
	<style type="text/css">
 		.select2-selection__rendered {
		    line-height: 55px !important;
		}
		.select2-container .select2-selection--single {
		    height: 50px !important;
		}
		.select2-selection__arrow {
		    height: 50px !important;
		}
 	</style>
 	
</head>
<body>  

	<?php 
		$ses = $this->session->userdata('pdo_logged'); 
		$opt = $this->session->userdata('pdo_opt'); 
	 ?>
	<input type="hidden" id="id_user" value="<?php echo $ses['id_user'] ?>">
	<input type="hidden" value="<?php echo $opt['id_shift'] ?>" id="id_shift">
	<!-- opt -->
	<input type="hidden" value="<?php echo $opt['tgl'] ?>" id="id_tgl">
	<input type="hidden" value="<?php echo $opt['id_line'] ?>" id="id_line">

<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?>


<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-5-p height-100-p xs-pd-5-10">
		
		<!-- HOME Container -->
		<div id="container_home" >
			<!-- Top Widget -->
			<div class="row clearfix progress-box">
				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: -10px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="icon-copy fa fa-address-card-o"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-blue weight-500 font-24" id="u_tot"></span>
								<p class="weight-400 font-18">Users Total</p>
							</div>
						</div> 
					</div>
				 </div>

				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: 0px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="icon-copy fa fa-font" aria-hidden="true"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-light-orange weight-500 font-24" id="tot_a"></span>
								<p class="weight-400 font-18">Shift A Total</p>

							</div>
						</div> 
					</div>
				 </div>

				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: 0px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-dark text-white">
									<i class="icon-copy fa fa-bold" aria-hidden="true"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-light-dark weight-500 font-24" id="tot_b"></span>
								<p class="weight-400 font-18">Shift B Total</p>
							</div>
						</div> 
					</div>
				 </div>
	  			
				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: 0px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="icon-copy fa fa-user" aria-hidden="true"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-light-dark weight-500 font-24" id="tot_ll"></span>
								<p class="weight-400 font-18">Line Leader</p>
							</div>
						</div> 
					</div>
				 </div>

				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: 0px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="icon-copy fa fa-users" aria-hidden="true"></i>
								</div>
							</div>
							<div class="project-info-right">
								<span class="no text-light-dark weight-500 font-24" id="tot_gl"></span>
								<p class="weight-400 font-18">Group Leader</p>
							</div>
						</div> 
					</div>
				 </div>

				 <div class="col-md-3 col-sm-12 mb-30" style="margin-left: 0px; margin-right: -19px">
					<div id="chart_userab" style="height: 200px;padding: -25px;">
							
					</div>
				 </div>

			</div>
			<!-- Tabel -->
			<!-- Simple Datatable start -->
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-10">
					<div class="pull-left">
						<h5 class="text-blue">Data Users</h5>
						<p class="font-14">Daftar data seluruh user</p>
					</div>
					<div class="pull-right">
						<a href="#" class="btn btn-success" id="btn_addusr" style="width: 150px"><span class="fa fa-plus"></span> Tambah </a>
					</div>
				</div> 
				<div class="row">
					<table class="data-table stripe hover nowrap" id="t_user">
						<thead>
							<tr> 
								<th>NIK</th>
								<th>Nama</th>
								<th class="table-plus datatable-nosort">Username</th>
								<th class="table-plus datatable-nosort">Password</th>
								<th>Jabatan</th>
								<th>Shift</th>
								<th>District</th>
								<th>Job Line</th> 
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="body_user"> 
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
		</div>

		<!-- NEW USERS WIZARD --> 
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="container_newuser" style="display: none;">
			<div class="clearfix">
				<h4 class="text-blue">Step User Baru</h4>
				<p class="mb-30 font-14">Langkah membuat user baru</p>
			</div>
			<div class="pull-right" style="margin-top: -80px;">
				<a href="#" id="btn_closenewusr" class="btn btn-danger"><i class="icon-copy fa fa-close" aria-hidden="true"></i>  Close</a>
			</div>
			<div class="wizard-content">
				<form id="fom_newusr">
					<div class="tab-wizard wizard-circle wizard vertical" >
						<h5>Personal Info</h5>
						<section> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="in_nama" >Nama :</label>
										<input id="in_nama" name="in_nama" type="text" class="form-control" minlength="4">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="in_nik" >NIK :</label>
										<input id="in_nik" name="in_nik" type="Number" class=" form-control" minlength="1">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="in_username">Username :</label>
										<input id="in_username" name="in_username" type="text" class=" form-control" minlength="4">
										<div id="tipsss" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="in_pass">Password :</label>
										<input id="in_pass" name="in_pass" type="Password" class="form-control" minlength="4">
									</div>
								</div>
							</div> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Pilih District :</label>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" id="customRadio1" name="rad_district" value="1" class="custom-control-input">
											<label class="custom-control-label" for="customRadio1">SAI T</label>
										</div>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" id="customRadio2" name="rad_district" value="2" class="custom-control-input">
											<label class="custom-control-label" for="customRadio2">SAI B</label>
										</div> 
									</div>
								</div> 
							</div>
						</section>
						<!-- Step 2 -->
						<h5>Job Status</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<label>Pilih Shift :</label>
									<div class="custom-control custom-radio mb-5">
										<input type="radio" id="customRadio6" name="rad_shift" value="1" class="custom-control-input">
										<label class="custom-control-label" for="customRadio6">A</label>
									</div>
									<div class="custom-control custom-radio mb-5">
										<input type="radio" id="customRadio7" name="rad_shift" value="2" class="custom-control-input">
										<label class="custom-control-label" for="customRadio7">B</label>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Jabatan :</label>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" id="customRadio3" name="rad_jabatan" value="4" class="custom-control-input">
											<label class="custom-control-label" for="customRadio3">Group Line Assy</label>
										</div>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" id="customRadio4" name="rad_jabatan" value="3" class="custom-control-input">
											<label class="custom-control-label" for="customRadio4">Group Line Inspect</label>
										</div>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" id="customRadio5" name="rad_jabatan" value="2" class="custom-control-input">
											<label class="custom-control-label" for="customRadio5">Line Leader</label>
										</div>
									</div>
								</div>
								 
								<div class="col-md-12">
									<div class="form-group">
										<label>Job Line :</label>
										<select class="select2 js-states form-control" id="selectlinee" name="selectlinee" multiple="multiple" style="width: 100%;height: 300px;">
  
										</select>
									</div>
								</div> 
								<br><br>
								<hr>
							</div>
						</section>
						<!-- Step 3 -->
						<h5>Finish</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label id="viw_nik">NIK :</label> 
									</div>
									<div class="form-group">
										<label id="viw_nama">Nama :</label> 
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label id="viw_uname">Username :</label> 
									</div>
									<div class="form-group">
										<label id="viw_pass">Password :</label> 
									</div>
								</div>
							</div>
						</section> 
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<!-- START KUMPULAN MODAL --> 
<div> 

	<!-- START MODAL EDIT USER -->
		<div class="modal fade bs-example-modal-md" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100">EDIT USER</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form id="fom_editusr">  
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-control-label">NIK</label>
										<input id="ie_nik" name="ie_nik" type="Number" class="form-control" min="0"> 
									</div>
									<div class="form-group">
										<label class="form-control-label">Nama</label>
										<input id="ie_nama" name="ie_nama" type="text" class="form-control" minlength="4"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="fom_iusername1">
										<label class="form-control-label">Username</label>
										<input id="ie_user" name="ie_user" type="text" class="form-control">
										<div id="tipsss1" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
									</div>

									<div class="form-group">
										<label class="form-control-label">Password</label>
										<input id="ie_pass" name="ie_pass" type="Password" class="form-control" minlength="4"> 
									</div> 
								</div>
							</div> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Pilih District :</label>
										<div class="row" style="margin-left: 100px">
											<div class="custom-control custom-radio mb-5">
												<input type="radio" id="customRadio8" name="edt_rad_district" value="1" class="custom-control-input">
												<label class="custom-control-label" for="customRadio8">SAI T</label>
											</div>
											<div class="custom-control custom-radio mb-5" style="margin-left: 20px;">
												<input type="radio" id="customRadio9" name="edt_rad_district" value="2" class="custom-control-input">
												<label class="custom-control-label" for="customRadio9">SAI B</label>
											</div> 
										</div>
									</div>
								</div>
								<div class="col-md-6"></div>
								<div class="form-group col-md-6">
									<label class="form-control-label">Shift :</label>
									<select class="selectpicker_sf form-control" id="ie_shift" name="ie_shift" data-style="btn-outline-secondary">
										<option disabled selected>Pilih Shift</option>
										<option value="1">A</option>
										<option value="2">B</option> 
									</select> 
								</div>

								<div class="form-group col-md-6">
									<label class="form-control-label">Jabatan :</label>
									<select class="selectpicker_j form-control" id="ie_jabatan" name="ie_jabatan" data-style="btn-outline-secondary">
										<option disabled selected>Pilih Jabatan</option>
										<option value="4">Group Line Assy</option>
										<option value="3">Group Line Inspect</option> 
										<option value="2">Line Leader</option> 
									</select>
									<input type="hidden" id="iet_shift">
								</div>
							</div> 

							<div class="form-group ">
								<label class="form-control-label">Line</label>
								<select class="select2 js-states form-control" id="ie_line" name="ie_line" multiple="multiple" style="width: 100%;height: 300px;">
								 	
								</select> 
							</div>

							<input type="hidden" id="id_u">
							<br>
							<center>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" id="btn_submit_updateusr">Update</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- END MODAL EDIT USER -->

	<!-- START MODAL DELETE -->
		<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body text-center font-18">
						<h4 class="padding-top-30 mb-30 weight-500" id="info_del"></h4>
						<input type="hidden" id="id_u_delete">
						<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
							<div class="col-6">
								<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
								NO
							</div>
							<div class="col-6">
								<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="bn_sub_delete"><i class="fa fa-check"></i></button>
								YES
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- END MODAL DELETE -->
</div>
<!-- END KUMPULAN MODAL -->

</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
	<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>   
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<!-- SELECT 2 -->
	<script src="<?php echo base_url() ?>assets/src/plugins/select2/dist/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>

	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 

	<script> 
		$('document').ready(function(){ 
			// confG
				// VAR CORE
					var id_line = $('#id_line').val();
					var id_shift = $('#id_shift').val();
					var id_tgl = $('#id_tgl').val();
					var id_pdo = 0;
					var balance_awal=0;
					var id_target =0;
					var ieditt;
					var totA ;
					var totB ;

				// variabel global	
					// deklarasi nama bulan
		 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

		 			var today = new Date(id_tgl);
					var currentMonth = today.getMonth();
					var currentYear = today.getFullYear();
					var currDate = today.getDate();
					// Set this month
					var daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();
					var awalDay =1;

				// aditional PICKER DATE  
					// SETTING DEFAULT DATE
		 			var datetimeNow = currentYear+'-'+(currentMonth+1)+'-'+currDate;
		            document.getElementById('slect_date').value= daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;


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
				    		// cekHariini(); 
					    }
					});
				// TRIGGEr line Change
					$('#select_line').on('select2:select',function(e){
						var data = e.params.data;
						
						id_line = data.id ;
						// update opt to server
						updateOpt();  
						// cekHariini();
						// console.log(data); 
						// console.log('ln:'+id_line+'|sf:'+id_shift); 
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
					});
			
			// ====  AUTOLOAD =====  
			loadDropdown();
			show();

			// Variabel Wizard
		 		var data_line;
		 		var dist;
		 		var level;
		 		var shift;

 			// Additional
 				// form wizz 
 				var form = $("#fom_newusr");
				// form. 
				form.validate({
				    errorPlacement: function errorPlacement(error, element) { element.before(error); },
				    rules: {
				        in_nama: { 
				        	required: true
				        },
				        in_nik:{
				        	required: true
				        },
				        in_username:{
				        	required: true
				        },
				        in_pass:{
				        	required: true
				        },
				        rad_district:{
				        	required: true
				        },
				        rad_shift:{
				        	required: true
				        },
				        rad_jabatan:{
				        	required: true
				        },
				        selectlinee:{
				        	required: true
				        }
				    }
				});	
				form.children("div").steps({ 
					headerTag: "h5",
					bodyTag: "section",
					transitionEffect: "fade",
					titleTemplate: '<span class="step">#index#</span> #title#',
					labels: {
						finish: "Submit"
					},
					 onStepChanging: function (event, currentIndex, newIndex)
				    {
				    	if (newIndex==2) {
				    		console.log('ENDDDD');  
				    		document.getElementById('viw_nik').innerHTML = 'NIK    : '+$('#in_nik').val();
				    		document.getElementById('viw_nama').innerHTML = 'Nama    : '+$('#in_nama').val();
				    		document.getElementById('viw_uname').innerHTML = 'Username    : '+$('#in_username').val();
				    		document.getElementById('viw_pass').innerHTML = 'Password    : '+$('#in_pass').val();
				    	}

				        form.validate().settings.ignore = ":disabled,:hidden";
        				return form.valid();
				    },
				    onFinishing: function (event, currentIndex)
				    {
				        form.validate().settings.ignore = ":disabled";
				        return form.valid();
				    },
				    onFinished: function (event, currentIndex)
				    {
				    	$.ajax({ 
				    		async: false,
							type : 'POST',
							url: '<?php  echo site_url('Users/addUser') ?>',
							dataType: "JSON",
							data:{ 
								nama:$('#in_nama').val(),
								nik:$('#in_nik').val(),
								uname:$('#in_username').val(),
								pass:$('#in_pass').val(),
								dist:dist,
								level: level,
								shift: shift,
								linemgr:$('#selectlinee').val()

							},
							success: function(response){
								// console.log(response);
								if (response) {
									Swal.fire({ 
									  type: 'success',
									  title: 'Berhasil Menambah Users', 
									}).then(function(){
										location.reload(true);
									});
								}else {
									Swal.fire({
									  type: 'error',
									  title: 'Oops...',
									  text: 'Something went wrong!'
									}).then(function(){
										location.reload(true);
									});
								} 
							}
						});

				    }
				});

				// init
					$('#selectlinee').select2({ 
		 				placeholder: 'Pilih Line ',
		 				allowClear: true, 
		 				closeOnSelect: false,
		 				tags: true,  
		 			});

				// SHift
					$('input[type=radio][name=rad_shift]').change(function() {  
					    shift=this.value;
					});

	 			// Jabatan
		 			$('input[type=radio][name=rad_jabatan]').change(function() {
					    if (this.value==4) { 
					        $('#selectlinee').val(null).trigger("change");
					        $("#selectlinee").select2({
					        	placeholder: 'Pilih Line ',  
							    maximumSelectionLength: 2
							}); 
					    }
					    else if (this.value==3) {
					        $('#selectlinee').val(null).trigger("change");
					        $("#selectlinee").select2({
					        	placeholder: 'Pilih Line ',
				 				allowClear: true, 
				 				closeOnSelect: false,
				 				tags: true
							});
					    }
					    else if (this.value==2) {
					        $('#selectlinee').val(null).trigger("change");
					        $("#selectlinee").select2({
					        	placeholder: 'Pilih Line ',
				 				allowClear: true, 
				 				closeOnSelect: false,
				 				tags: true
							});
					    }

					    level=this.value;
					});

	 			// DIstrict
					$('input[type=radio][name=rad_district]').change(function() {

					    if (this.value==1) {
					        $.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON",
								data:{ dist:this.value},
								success: function(response){
									data_line = response;

									$('#selectlinee').empty();
									$('#selectlinee').select2({ 
						 				placeholder: 'Pilih Line ',
						 				allowClear: true, 
						 				closeOnSelect: false,
						 				tags: true, 
						 				data: response 
						 			});
								}
							});

					    }
					    else{
					    	$.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON",
								data:{ dist:this.value},
								success: function(response){ 
									data_line = response;

									$('#selectlinee').empty();
									$('#selectlinee').select2({ 
						 				placeholder: 'Pilih Line ',
						 				allowClear: true, 
						 				closeOnSelect: false,
						 				tags: true, 
						 				data: response 
						 			});
								}
							});

					    }
					    // insert data district selct
	  					dist = this.value;
					});

				$('#bbb').click(function(){
					// $('#selectlinee').select2('destroy');
					$('#selectlinee').empty();
					// $('#selectlinee').select2('data', {text: null, children: null});
					console.log('clear');
				});
 
 
			function show() { 
				$("#t_user").DataTable().destroy(); 
				$('#body_user').html('');

				$.ajax({
					async: true,
					type : 'ajax',
					url: '<?php  echo site_url('Users/showUser') ?>',
					dataType: "JSON",
					success: function(response){   
						// console.log(response); 
						var data = response['all'];
						var aa = response['aa'];
						var bb = response['bb'];
						var ll = response['ll'];
						var gl = response['gl'];

						//  
						totA = aa.length;
						totB = bb.length;
						// Show Chart
						showChart();

						document.getElementById('u_tot').innerHTML = data.length;
						document.getElementById('tot_a').innerHTML = aa.length;
						document.getElementById('tot_b').innerHTML = bb.length;
						document.getElementById('tot_ll').innerHTML = ll.length;
						document.getElementById('tot_gl').innerHTML = gl.length;

						// user tabel update proses
						for (var i = 0; i < data.length; i++) { 
							var tr = $('<tr>').append(
										$('<td>').text(data[i].nik),
										$('<td>').text(data[i].nama),
										$('<td>').text(data[i].username),
										$('<td>').text(data[i].password),
										$('<td>').text(data[i].jabatan),
										$('<td>').text(data[i].keterangan),
										$('<td>').text(data[i].dis),
										$('<td>').html('total ('+data[i].job.length+')'),
										$('<td>').html(
											`<div class="dropdown" style="vertical-align: middle; text-align: center;">`+
                      							`<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">`+
                        						`<i class="fa fa-ellipsis-h"></i></a>`+
                        						`<div class="dropdown-menu dropdown-menu-right">`+
                        							`<a class="dropdown-item item_view" href="#" ><i class="fa fa-eye"></i> Detail </a>`+
							                        `<a class="dropdown-item item_edit" href="#" data-idu="`+data[i].id+`" data-id_dis="`+data[i].id_dis+`" data-nik="`+data[i].nik+`" data-nama="`+data[i].nama+`" data-uname="`+data[i].username+`" data-pass="`+data[i].password+`" data-id_sf="`+data[i].id_sf+`"  data-level="`+data[i].level+`" data-job='`+JSON.stringify(data[i].job)+`'><i class="fa fa-pencil"></i> Edit </a>`+
							                        `<a class="dropdown-item item_delete" href="#" data-uname="`+data[i].nama+`" data-idu="`+data[i].id+`"><i class="fa fa-trash"></i> Hapus </a>`+ 
							                    `</div>`+
							                `</div>`
                        					)
									);
							tr.appendTo('#body_user');
						}    
						$('#t_user').DataTable({
							scrollCollapse: true,
							autoWidth: false,
							responsive: true,
							columnDefs: [{
								targets: "datatable-nosort",
								orderable: false,
							}],
							"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							"language": {
								"info": "_START_-_END_ of _TOTAL_ entries",
								searchPlaceholder: "Search"
							},
						});
					}
				});

				
			}


			// =====   START NEW USER  ==============
	 			// evnt btn new modal user
	 			$('#btn_addusr').click(function(){
	 				// $('#modal_new_user').modal('show');
	 				document.getElementById('container_home').style.display = 'none';
	 				document.getElementById('container_newuser').style.display = 'block';
	 			}); 
	 			// btn SUbmit 
	 			$('#btn_submit_newusr').click(function(){
	 				var uname = $('#i_user').val();
	 				var pass = $('#i_pass').val();
	 				var sif = $('select[name=i_shift]').val();
	 				var ln = $('select[name=i_line]').val();

	 				if (ln == null) {
	 					alert("isi");
	 					return;	
	 				}

	 				$.ajax({
	 					async: false,
	 					type: 'POST',
	 					url: '<?php echo site_url("Users/addUser") ?>',
	 					dataType: "JSON",
	 					data:{
	 						uname: uname,
	 						pass: pass,
	 						sif: sif,
	 						ln: ln
	 					},
	 					success: function(data){
	 						if (data) {
	 							document.getElementById('fom_addusr').reset();
	 							show();
	 						}else{
	 							alert("Errr");
	 						}
	 					}

	 				});
	 				$('#modal_new_user').modal('hide');
	 			});

	 			// btn CLOSE BATAL
	 			$('#btn_closenewusr').click(function(){
	 				document.getElementById('container_home').style.display = 'block';
	 				document.getElementById('container_newuser').style.display = 'none';
	 			});
 			// =====    END  NEW USER  ==============

 			// username checked availabe
	 			document.getElementById("in_username").onchange = function() {myFunction()};
				function myFunction() {
					var uname = $('#in_username').val();
					$.ajax({ 
	 					type: 'POST',
	 					url: '<?php echo site_url("Users/searchUsername") ?>',
	 					dataType: "JSON",
	 					data:{
	 						uname: uname
	 					},
	 					success: function(data){
	 						if (data.length==0) { 
	 							document.getElementById("fom_iusername").classList.remove("has-danger");
	 							document.getElementById("in_username").classList.remove("form-control-danger");
	 							document.getElementById("in_username").classList.add("form-control-success"); 
	 							document.getElementById("tipsss").style.display= 'none';
	 						}else{
	 							document.getElementById("in_username").classList.remove("form-control-success");
	 							document.getElementById("in_username").classList.add("form-control-danger");
	 							document.getElementById("fom_iusername").classList.add("has-danger");
	 							document.getElementById("tipsss").style.display= 'block';
	 						}
	 					}

	 				});
				}
				// edit
				document.getElementById("ie_user").onchange = function() {myFunction()};
				function myFunction() {
					var uname = $('#ie_user').val();
					$.ajax({ 
	 					type: 'POST',
	 					url: '<?php echo site_url("Users/searchUsername") ?>',
	 					dataType: "JSON",
	 					data:{
	 						uname: uname
	 					},
	 					success: function(data){
	 						console.log(data);
	 						if (data.length==0) { 
	 							document.getElementById("fom_iusername1").classList.remove("has-danger");
	 							document.getElementById("ie_user").classList.remove("form-control-danger");
	 							document.getElementById("ie_user").classList.add("form-control-success"); 
	 							document.getElementById("tipsss1").style.display= 'none';
	 						}else{
	 							if (data[0].id!=ieditt) {
	 								document.getElementById("ie_user").classList.remove("form-control-success");
		 							document.getElementById("ie_user").classList.add("form-control-danger");
		 							document.getElementById("fom_iusername1").classList.add("has-danger");
		 							document.getElementById("tipsss1").style.display= 'block';
	 							}else{
	 								document.getElementById("ie_user").classList.add("form-control-success");
	 							}
	 						}
	 					}

	 				});
				}
 			
			// =====   START EDIT USER  ==============
				$('#t_user').on('click','.item_edit',function(){
					// memasukkan data dari row terpilih kedalam id inputa di modal
					ieditt = $(this).data('idu');
					$('#id_u').val( $(this).data('idu') );
					$('#ie_nik').val( $(this).data('nik') );
					$('#ie_nama').val( $(this).data('nama') );

					$('#ie_user').val( $(this).data('uname') );
	 				$('#ie_pass').val( $(this).data('pass') );
	 				$('#ie_jabatan').val( $(this).data('level'));
	 				$('#ie_shift').val( $(this).data('id_sf'));
	 				// list job sekarang
	 				var jobline = $(this).data('job');  
	 				var jabatan = $(this).data('level'); 

	 				var iddis = $(this).data('id_dis');
		 			// isi Value
		 				if (iddis==1) {
		 					$("#customRadio8").prop("checked", true);
					        $.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON", 
								data:{ dist:iddis},
								success: function(response){ 
									
									var dat = response;
									// mencari data terpilih
									for (var i = 0; i < jobline.length; i++) {
										for (var ii = 0; ii < dat.length; ii++) {
											
											// jika carline sama
											if (jobline[i].carline==dat[ii].text) {

												for (var z = 0; z < dat[ii].children.length; z++) {
													// jika nama line sama
													if (dat[ii].children[z].text==jobline[i].nama_line) {
														dat[ii].children[z]['selected'] = true;
														// console.log(dat[ii].children[z]);
													}
												}
											}
											
										}
									}

									$('#ie_line').empty();
									if (jabatan==4) {
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				maximumSelectionLength: 2,
							 				tags: true, 
							 				data: dat 
							 			});	 
									}else{
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				closeOnSelect: false,
							 				tags: true, 
							 				data: dat 
							 			});	
									}									
								}
							}); 
					    }
					    else{
					    	$("#customRadio9").prop("checked", true);
					    	$.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON", 
								data:{ dist:iddis},
								success: function(response){ 

									var dat = response;
									// mencari data terpilih
									for (var i = 0; i < jobline.length; i++) {
										for (var ii = 0; ii < dat.length; ii++) {
											
											// jika carline sama
											if (jobline[i].carline==dat[ii].text) {

												for (var z = 0; z < dat[ii].children.length; z++) {
													// jika nama line sama
													if (dat[ii].children[z].text==jobline[i].nama_line) {
														dat[ii].children[z]['selected'] = true;
														// console.log(dat[ii].children[z]);
													}
												}
											}
											
										}
									}  

									$('#ie_line').empty();
									if (jabatan==4) {
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				maximumSelectionLength: 2, 
							 				data: dat 
							 			});	 
									}else{
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				closeOnSelect: false,
							 				tags: true, 
							 				data: dat 
							 			});	
									}
								}
							}); 
					    }

					document.getElementById("fom_iusername1").classList.remove("has-danger");
	 				$('#modal_edit_user').modal('show');
				}); 
				// validasi
				$( "#fom_editusr" ).validate({
				  rules: {
				  	ie_nik: {
				      required: true
				    },
				    ie_nama: {
				      required: true
				    },
				    ie_user:{
				    	required: true
				    },
				    ie_pass:{
				    	required: true
				    },
				    ie_shift:{
				    	required: true
				    },
				    ie_jabatan:{
				    	required: true
				    },
				    ie_line:{
				    	required: true
				    }			    
				  }
				});
				$('#btn_submit_updateusr').click(function(){
					// check is valid or not
	   				if (!$('#fom_editusr').valid()) { 
	   					return;
	   				}
					// get data from modal update
					var idu = $('#id_u').val();
					var nik = $('#ie_nik').val();
					var nama = $('#ie_nama').val();
					var uname = $('#ie_user').val();
					var pass = $('#ie_pass').val();
					// old dropdown
					var i_dis = $("input[name=edt_rad_district]:checked").val();
					var i_sf = $('#ie_shift').val();
					var i_lv = $('#ie_jabatan').val();
					var i_ln = $('#ie_line').val();  

					// var isi = 'nik:'+nik+'|nam:'+nama+'|uname:'+uname+'|pass:'+pass+'|sif:'+i_sf+'|level:'+i_lv+'|Line: '+i_ln;
					// console.log(isi);

					// return;
						$.ajax({ 
				    		async: false,
							type : 'POST',
							url: '<?php  echo site_url('Users/updateUser') ?>',
							dataType: "JSON",
							data:{ 
								idu:idu,
								nama:nama,
								nik:nik,
								uname:uname,
								pass:pass,
								dist:i_dis,
								level: i_lv,
								shift: i_sf,
								linemgr:i_ln
							},
							success: function(response){ 

								if (!response.error) {
									Swal.fire({ 
									  type: 'success',
									  title: 'Berhasil Memperbarui Data `'+nama+'`', 
									}); 
								}else {
									Swal.fire({
									  type: 'error',
									  title: 'Oops...',
									  text: 'Something went wrong!'
									})
								}
								// console.log(response.message);
								show();
								$('#modal_edit_user').modal('hide');
							}
						});

				});
				//======= ALL ABOUT  TRIGGERRED di EDIT = =========
					// jabatan on change
					$('#ie_jabatan').on('change', function() {
					    if (this.value==4) { 
					        $('#ie_line').val(null).trigger("change");
					        $("#ie_line").select2({
					        	placeholder: 'Pilih Line ',  
							    maximumSelectionLength: 2
							}); 
					    }
					    else if (this.value==3) {
					        $('#ie_line').val(null).trigger("change");
					        $("#ie_line").select2({
					        	placeholder: 'Pilih Line ',
				 				allowClear: true, 
				 				closeOnSelect: false,
				 				tags: true
							});
					    }
					    else if (this.value==2) {
					        $('#ie_line').val(null).trigger("change");
					        $("#ie_line").select2({
					        	placeholder: 'Pilih Line ',
				 				allowClear: true, 
				 				closeOnSelect: false,
				 				tags: true
							});
					    } 
					});
					// district on change
					$('input[type=radio][name=edt_rad_district]').change(function() {
						var i_lv = $('#ie_jabatan').val();

					    if (this.value==1) {
					        $.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON",
								data:{ dist:this.value},
								success: function(response){
									data_line = response;

									$('#ie_line').empty();
									if (i_lv==4) { 
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true,  
							 				maximumSelectionLength: 2,
							 				data: response 
							 			});
									}else{ 
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				closeOnSelect: false, 
							 				data: response 
							 			});
									} 
								}
							});

					    }
					    else{
					    	$.ajax({ 
								type : 'POST',
								url: '<?php  echo site_url('Users/getListByDistrict') ?>',
								dataType: "JSON",
								data:{ dist:this.value},
								success: function(response){ 
									data_line = response;

									$('#ie_line').empty();
									if (i_lv==4) { 
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true,  
							 				maximumSelectionLength: 2,
							 				data: response 
							 			});
									}else{ 
										$('#ie_line').select2({ 
							 				placeholder: 'Pilih Line ',
							 				allowClear: true, 
							 				closeOnSelect: false, 
							 				data: response 
							 			});
									} 
								}
							});

					    }
					    // insert data district selct
	  					dist = this.value;
					});
			// =====   END EDIT USER  ==============

			// ===== START DELETE USERS ======
				$('#t_user').on('click','.item_delete',function(){
					var unam = $(this).data('uname');
					$('#id_u_delete').val( $(this).data('idu') );
					document.getElementById('info_del').innerHTML = "Anda akan menghapus Akun: '"+unam+"' ?";

					$('#confirmation-modal').modal('show');
				});		
				$('#bn_sub_delete').click(function(){
					// get data from modal update
					var idu = $('#id_u_delete').val(); 
					 
					$.ajax({
	 					async: false,
	 					type: 'POST',
	 					url: '<?php echo site_url("Users/deleteUser") ?>',
	 					dataType: "JSON",
	 					data:{
	 						idu: idu
	 					},
	 					success: function(data){ 
	 						show(); 

	 						if (data) { 
	 							Swal.fire({ 
								  type: 'success',
								  title: 'Berhasil Delete Akun',
								  timer: 1000 
								}) 
	 							$('#confirmation-modal').modal('hide');
	 							
	 						}else{
	 							Swal.fire({
								  type: 'error',
								  title: 'Oops...',
								  text: 'Something went wrong!'
								})
	 						}
	 					}

	 				});

				});	
			// ===== END DELETE  USERS  ======


			// SHOW CHART
			function showChart() {

				var opt_indef = {
							title: {
						        text: 'Shift A & B'
						    }, 
						    chart: {
						        renderTo: 'chart_userab',
						        type: 'column'
						    },
						    xAxis: {
						        type: 'category'
						    },
						    yAxis: {
						        title: {
						            text: 'Man Power'
						        } 
						    },
						    legend: {
						        enabled: false
						    }, 
						    plotOptions: {
						        series: {
						            borderWidth: 0,
						            dataLabels: {
						                enabled: true,
						                format: '{point.y}'
						            }
						        }
						    }, 
						    tooltip: {
						        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
						        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
						    }, 
						    series: [
						        {
						            name: "Users",
						            data: (function(){
									        	var da = [{
						                    				name: 'Shift A',
						                    				y: totA,
						                    				color: '#F46867'
					                    				},
					                    				{
						                    				name: 'Shift B',
						                    				y: totB,
						                    				color: '#343A40'
					                    				}
					                    				]; 

									        	return da;
								        	}()
								        )  
						        }
						    ],
		            	}; 

				var chart_user = new Highcharts.Chart(opt_indef); 
			}
 			
			// FUnc OPT
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

		});
	</script>
</html>