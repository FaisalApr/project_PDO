<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Downtime</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
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
 
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="container_maindata">
			
			<!-- top icon dasboard -->
			<div class="row clearfix progress-box">
				
				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow" style="height: 200px;">
						<h5 class="card-header text-center weight-500">Jam Effective</h5>
						<div class="card-body"> 
							<div class="project-info-progress">
								<center>
								<span class="col-sm-12 align-content-center text-blue weight-800"><font size="46" id="id_jam_efff"></font>jam</span>
								</center>
							</div>
						</div> 
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow" style="height: 200px;">
						<h5 class="card-header text-center weight-500" style="font-size: 19.1px">Prosentase Losstime</h5>
						<div class="card-body"> 
							<div class="project-info-progress">
								<center>
								<span class="col-sm-10 align-content-center text-blue weight-800"><font size="46" id="id_prcent_loss">0</font>%</span>
								</center>
							</div>
						</div> 
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow" style="height: 200px;">
						<h5 class="card-header text-center weight-500">Total Losstime</h5>
						<div class="card-body"> 
							<center>
								<span class="col-sm-10 align-content-center weight-800"><font size="46" id="id_tot_loss">0</font>Jam</span> 
							</center>	
						</div> 
					</div>
				</div>
				
				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow" style="height: 200px;"">
						<h5 class="card-header text-center weight-500">Total Exclude</h5>
						<div class="card-body"> 
							<center>
								<span class="col-sm-10 align-content-center weight-800"><font size="46" id="id_tot_exc">0</font>Jam</span> 
							</center>	
						</div> 
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow"> 
						<!-- <div class="card-body"> 
							
						</div>  -->
						<div id="chart_downtime" style="height: 200px;padding: -25px;">
							
						</div>
					</div>
				</div>
			</div>
				<!-- end of top icon dashboard -->
	 		<!-- Simple Datatable start -->
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-10">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h5 class="text-blue" style="font-size: 40px">Downtime Data Table</h5>
					</div>
					<div class="pull-right">
						<div class="row clearfix">	
								<a href="#" id="btn_adddown" class="btn btn-success" style="margin-right: 25px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
						</div> 
					</div>
				</div> 

				<table id="t_user" class="data-table stripe hover nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">Jam ke</th>
							<th>Code</th>
							<th>problem</th>
							<th>Jenis</th>
							<th>Keterangan</th>
							<th>Time(Menit)</th>
							
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody id="tbl_body"> 	
					</tbody>
				</table>
			</div>
		</div>

		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="no_pdodata" style="display: none;"> 
			<center>
				<div class="jumbotron">
					<H1>Tidak Ada Data PDO Perpilih</H1>
				</div>
			</center>
		</div>

	</div>

<!-- MODAL -->
<div>
	<!-- Confirmation modal -->
		<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body text-center font-18">
						<h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
						<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
							<input type="hidden" name="id_dc_delete" id="id_dc_delete" class="form-control">
							<br>
							<div class="col-6">
								<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
								NO
							</div>
							<div class="col-6">
								<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del" data-dismiss="modal"><i class="fa fa-check"></i></button>
								YES
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- END Confirmation modal -->

	<!-- update modal -->
		<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Downtime</h2>
						<form id="form_losstime_updt">
							<!-- id -->
							<input type="hidden" class="form-control" placeholder="Assy Code" name="id_update" id="id_update">

							<div class="input-group custom input-group-lg"> 
								<select class="custom-select col-12" name="jam_update" id="jam_update"> 
									<!-- CONTAINER -->
									<!-- JAM KEEEEEEE --> 
								</select>
							</div> 
							
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="problem_update" id="problem_update">
									<option disabled selected> Problem</option>
										<?php foreach ($data_error as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
										<?php }  ?> 
								</select>
							</div>

							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="KETERANGAN" name="ket_update" id="ket_update">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-sticky-note-o" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="input-group custom input-group-lg"> 
								<select class="custom-select col-12" name="jenis_update" id="jenis_update">
									<option disabled selected> Pilih Jenis Downtime</option>
										<?php foreach ($data_losttime as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
										<?php }  ?> 
								</select>
							</div>

							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="Durasi (Menit)" name="time_update" id="time_update">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-clock-o" aria-hidden="true"></i></span>
								</div>
							</div>
								
							<br>
							
							<div class="col-sm-12"> 
								<a class="btn btn-primary btn-lg btn-block" id="btn_update" href="#">Update</a>
							</div>
							<br>
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- END update modal -->


	<!-- input modal -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h2 class="text-center mb-30">Downtime</h2>
						<form id="form_losstime">
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_jam" id="i_jam">
								 
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_problem" id="i_problem">
									<option disabled selected> Problem</option>
											<?php foreach ($data_error as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="KETERANGAN" id="i_ket" name="i_ket">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-sticky-note-o" aria-hidden="true"></i></span>
								</div>
							</div> 
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_jenis" id="i_jenis">
									<option disabled selected> Pilih Jenis Downtime</option>
											<?php foreach ($data_losttime as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="Durasi (Menit)" id="i_time" name="i_time">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-clock-o" aria-hidden="true"></i></span>
								</div>
							</div> 
							<br> 
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a  class="btn btn-primary btn-lg btn-block" id="btn_submit" href="#">Submit</a>
									</div>
								</div>
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>
	<!-- END INPUT -->

</div>

	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
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

	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>

	<script> 
		$('document').ready(function(){
			// COnFG
				// VAR CORE
					var id_line = $('#id_line').val();
					var id_shift = $('#id_shift').val();
					var id_tgl = $('#id_tgl').val();
					var id_pdo = 0;
				// variabel global	
					// deklarasi nama bulan
		 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
		 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

		 			var today = new Date(id_tgl);
					var currentMonth = today.getMonth();
					var currentYear = today.getFullYear();
					var currDate = today.getDate();
					var submited = false;		 
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
			

			// ====  AUTOLOAD =====
				// var name_shift = document.getElementById('id_sifname').innerHTML;
				loadDropdown();
				cekHariini(); 


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

								// CEK LEVEL
								var lv  = <?php echo $ses['level'] ?>; 
								// APA SAYA GL
								if (lv==4 || lv==3) {
									console.log('Ternyata saya GL');
									// apa ini punya sif SAYA
									var sif_ori = <?php echo $ses['id_shift'] ?>;
									 
									if (sif_ori==id_shift) {  // --> INI SIFNYA DIA
										console.log('MILIKNYA') 
		                    			document.getElementById('btn_adddown').style.display = 'block';
		                    			show(res.id);  

									}else{ // ---> BUKAN PUNYA SAYA 
										document.getElementById('btn_adddown').style.display = 'none';
	                    				show_notYou(res.id);  
									} 
								}else{ //--> LL & ADMIN BEBAS MASUK 
									console.log('MILIKNYA') 
	                    			document.getElementById('btn_adddown').style.display = 'block';
	                    			show(res.id);    
								}    
	                    		isi_dropdown(res.id);  

	                    		//  STATUS VERIFIKASI 	
	                    		 if (res.status==1) {
	                    		 	document.getElementById('id_verif').style.display = 'block';
	                    		 }else{
	                    		 	document.getElementById('id_verif').style.display = 'none';
	                    		 } 	
							}else{
								console.log(res);
								console.log('is null'); 
	                    		show_nodata();
	                    		document.getElementById('btn_adddown').style.display = 'none';
							}
							

	                }

	            }); 
			} 

			// ============== dropdown TIME
				function isi_dropdown(id_pdo) {
				  	
					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/Losstime/cari_jam_ocPDO',
	                    dataType : 'JSON', 
	                    data:{ 
	                    	id_pdo: id_pdo
	                    },
	                    success : function(res){    
	                    	var html = '<option disabled selected> Jam ke</option>';
	                    	// console.log(res);
	                    	for (var i = 0; i < res.length; i++) {
	                    	 	if (i==(res.length-1)) {
	                    	 		html +=
	                    	 		'<option selected value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
	                    	 	}else{
	                    	 		html +=
	                    	 		'<option value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
	                    	 	} 
	                    		
	                    	}

	                    	$('#i_jam').html(html);
	                    	$('#jam_update').html(html); 
	                    }
	                });	

				}  
			// ==============

			// =================== Read Record =============================================== 
	            function show(id_pdo){
	            		document.getElementById('no_pdodata').style.display = 'none';
	            		document.getElementById('container_maindata').style.display = 'block';
	            		// console.log('show called');
	            		loadChart();

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:id_pdo},
	                        success : function(respon){
	                            var html = '';
	                            var i;
	                            var data = respon.data_downtime;
	                            var widget = respon.widgettt;

	                            submited = respon.pdo.status; 
	                            // console.log(respon);
	                            for(i=0; i<data.length; i++){
	                            	x = data[i].durasi*60;
		                        	jm = (x/3600);
		                        	menit = (x%3600)/60;
		                        	detik = (x%3600)%60;

		                        	if (Math.floor(jm)!=0) {
		                        		var duras = Math.floor(jm)+' Jam '+Math.floor(menit)+' Menit '+Math.floor(detik)+' Detik';	
		                        	}else{
		                        		if (Math.floor(menit)!=0) {
		                        			var duras = Math.floor(menit)+' Menit '+Math.floor(detik)+' Detik';
		                        		}else{
		                        			var duras = Math.floor(detik)+' Detik';
		                        		} 	
		                        	}
		                        	
	                                html +=  
	                                '<tr>'+
										'<td class="table-plus">'+data[i].jam_ke+'</td>'+
										'<td>'+ data[i].kode+'</td>'+
										'<td>'+data[i].problem+'</td>'+
										'<td>'+data[i].jenis+'</td>'+
										'<td>'+data[i].keterangan+'</td>'+
										'<td>'+duras+'</td>'+
										'<td>'+
											'<div class="dropdown">'+
												'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
													'<i class="fa fa-ellipsis-h"></i>'+
												'</a>'+											
												'<div class="dropdown-menu dropdown-menu-right">'+
													'<a class="dropdown-item item_edit" href="#" data-id ="'+data[i].id+'" data-id_pdo="'+data[i].id_pdo+'" data-id_error="'+data[i].id_err+'" data-id_oc="'+data[i].id_oc+'" data-id_jenisloss="'+data[i]. id_jenlos+'" data-keterangan="'+data[i].keterangan+'" data-durasi="'+data[i].durasi+'"><i class="fa fa-pencil"></i> Edit </a>'+
													'<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
												'</div>'+
											'</div>'+
										'</td>'+
									'</tr>';    
	                            }
	                            $('#t_user').DataTable().destroy();
	                            $('#tbl_body').html(html);
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
	 
	                            // setting WIdget  
	                            document.getElementById('id_jam_efff').innerHTML= parseFloat(widget.jam_iff).toFixed(1);
	                            document.getElementById('id_prcent_loss').innerHTML= parseFloat(widget.losspercent).toFixed(2);
	                            document.getElementById('id_tot_loss').innerHTML= ((widget.to_loss)/60).toFixed(2);
	                            document.getElementById('id_tot_exc').innerHTML= ((widget.to_exc)/60).toFixed(2);
								
								
	                        }
	                    });

	            }

	            function show_notYou(id_pdo){
	            		document.getElementById('no_pdodata').style.display = 'none';
	            		document.getElementById('container_maindata').style.display = 'block';

	            		console.log('show show_notYou called');
	            		loadChart();

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:id_pdo},
	                        success : function(respon){
	                            var html = '';
	                            var i;
	                            var data = respon.data_downtime;
	                            var widget = respon.widgettt;

	                            submited = respon.pdo.status; 

	                            for(i=0; i<data.length; i++){
	                                html += 

	                                '<tr>'+
										'<td class="table-plus">'+data[i].jam_ke+'</td>'+
										'<td>'+ data[i].kode+'</td>'+
										'<td>'+data[i].problem+'</td>'+
										'<td>'+data[i].jenis+'</td>'+
										'<td>'+data[i].keterangan+'</td>'+
										'<td>'+data[i].durasi+'</td>'+
										'<td class="text-center">-</td>'+
									'</tr>';    
	                            }
	                            $('#t_user').DataTable().destroy();
	                            $('#tbl_body').html(html);
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
	 
	                            // setting WIdget  
	                            document.getElementById('id_jam_efff').innerHTML= parseFloat(widget.jam_iff).toFixed(1);
	                            document.getElementById('id_prcent_loss').innerHTML= parseFloat(widget.losspercent).toFixed(2);
	                            document.getElementById('id_tot_loss').innerHTML= ((widget.to_loss)/60).toFixed(2);
	                            document.getElementById('id_tot_exc').innerHTML= ((widget.to_exc)/60).toFixed(2);
								
								
	                        }
	                    });

	            }

	           	function show_nodata(){
	            		console.log('show nodata called');

	            		document.getElementById('id_verif').style.display = 'none';
	            		document.getElementById('no_pdodata').style.display = 'block';
	            		document.getElementById('container_maindata').style.display = 'none';

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:id_pdo},
	                        success : function(respon){
	                            var html = ''; 

	                            $('#t_user').DataTable().destroy();
	                            $('#tbl_body').html(html);
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
	 
	                            // setting WIdget  
	                            document.getElementById('id_jam_efff').innerHTML= 'Null';
	                            document.getElementById('id_prcent_loss').innerHTML= 'Null';
	                            document.getElementById('id_tot_loss').innerHTML= 'Null';
	                            document.getElementById('id_tot_exc').innerHTML= 'Null';
								
								
	                        }
	                    });

	            }
            // =================== End Read Record ============================================

            // =================== Create Record ===============================================
	   			$( "#form_losstime" ).validate({
				  rules: {
				  	i_time: {
				      required: true
				    },
				    i_ket: {
				      required: true
				    },
				    i_jam:{
				    	required: true
				    }			    
				  }
				});

	   			$('#btn_submit').click(function(){ 

	   				// check is valid or not
	   				if (!$('#form_losstime').valid()) { 
	   					return;
	   				} 
					var down_jam = document.getElementById("i_jam").value;
					var down_problem = document.getElementById("i_problem").value;
					var down_ket = document.getElementById("i_ket").value;
					var down_jenis = document.getElementById("i_jenis").value;
					var down_time = document.getElementById("i_time").value;

					// alert(down_jam+","+down_problem+","+down_ket+","+down_jenis+","+down_time);
					// alert($('#id_pdo').val());


					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/Losstime/newLosstime",
					
						dataType : "JSON",
						data : {
							down_id_pdo:id_pdo,
							down_id_error:down_problem,
							down_id_oc:down_jam,
							down_id_jenisloss:down_jenis,
							down_ket:down_ket,
							down_durasi:down_time
						},
						success : function(response){
							
							$('#login-modal').modal('hide');
							 
							document.getElementById("form_losstime").reset();
						}
					});

					show(id_pdo);
				});
			// =================== End Create Record ===============================================
   			// ===================   Delete Record ===============================================
	            //get data for delete record show prompt
	            $('#tbl_body').on('click','.item_delete',function(){
	                // alert($(this).data('id'))
	                var id = $(this).data('id');
	                // var tanggal = $(this).data('tanggal');
	                // var judul = $(this).data('judul');
	                // var pengumuman = $(this).data('isi');
	               
	                $('[name="id_dc_delete"]').val(id);  
	                $('#confirmation-modal').modal('show');
	                // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";
	                
	                
	               
	                // alert('oke');
	            });

	            //delete record to database

	            $('#btn_del').on('click',function(){
	                var id_dc_delete = $('#id_dc_delete').val();
	                // alert(id_dc_delete)
	                $.ajax({
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/Losstime/delLosstime",
	                    dataType : "JSON",
	                    data : {id:id_dc_delete,id_pdo:id_pdo},
	                    success: function(){
	                        $('[name="id_dc_delete"]').val("");
	                        $('#confirmation-modal').modal('hide');
	                        // refresh()
	                        
	                show(id_pdo);
	                    }
	                });
	                return false;

	            });
			 //   ========================  END DELETE RECORD ====================================



			 //  ===================  START UPDATE Record ===============================================
           
            //get data for UPDATE record show prompt
	            $('#tbl_body').on('click','.item_edit',function(){
	            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
	                var id = $(this).data('id');
	                var id_error = $(this).data('id_error');
	                var id_oc = $(this).data('id_oc');
	                var id_jenisloss = $(this).data('id_jenisloss');
	                var keterangan = $(this).data('keterangan');
	                var durasi = $(this).data('durasi');
  					 

	                 // memasukkan data ke form updatean
					$('#id_update').val(id);   

					// fix
					$("#problem_update option[value='"+id_error+"']").prop('selected', true);
					$("#jenis_update option[value='"+id_jenisloss+"']").prop('selected', true);
					$("#jam_update option[value='"+id_oc+"']").prop('selected', true);

					$('#ket_update').val(keterangan);
					$('#time_update').val(durasi);



	                $('#update_modal').modal('show');
	                
	            });
            
            //UPDATE record to database (submit button)
            	$( "#form_losstime_updt" ).validate({
				  rules: {
				  	jam_update: {
				      required: true
				    },
				    problem_update: {
				      required: true
				    },
				    jenis_update:{
				    	required: true
				    },
				    ket_update: {
				    	required: true
				    },
				    time_update: {
				    	required: true
				    }
				  }
				}); 

	            $('#btn_update').on('click',function(){
	            	// check is valid or not
	   				if (!$('#form_losstime_updt').valid()) { 
	   					return;
	   				}  

	                var idup = $('#id_update').val();
	                var iderrorup = $('#problem_update').val();
	                var idocup = $('#jam_update').val();
	                var idjenislossup = $('#jenis_update').val();
	                var ketup = $('#ket_update').val();
	                var durasiup = $('#time_update').val();

	                // alert('id:'+idup+'|id errup:'+iderrorup+'|id_ocup:'+idocup+'|jenislossoutp:'+idjenislossup+'|ketup:'+ketup+'|durasiup:'+durasiup);
	                // return;

	                $.ajax({
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/Losstime/updateLosstime",
	                    dataType : "JSON",
	                    data : { 
	                    		id_pdo:id_pdo,
	                    		id:idup,
	                    		id_error:iderrorup,
	                    		id_oc:idocup,
	                    		id_jenisloss:idjenislossup,
	                    		keterangan:ketup,
	                    		durasi:durasiup
	                    	},

	                    success: function(data){
	                    	$('#update_modal').modal('hide'); 
	                        // refresh();
	                        show(id_pdo);
	                    }
	                });
	              });
 
			// ========================  END UPDATE RECORD ====================================
				$('.data-table-export').DataTable({
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
					dom: 'Bfrtip',
					buttons: [
					'copy', 'csv', 'pdf', 'print'
					]
				});
				var table = $('.select-row').DataTable();
				$('.select-row tbody').on('click', 'tr', function () {
					if ($(this).hasClass('selected')) {
						$(this).removeClass('selected');
					}
					else {
						table.$('tr.selected').removeClass('selected');
						$(this).addClass('selected');
					}
				});
				var multipletable = $('.multiple-select-row').DataTable();
				$('.multiple-select-row tbody').on('click', 'tr', function () {
					$(this).toggleClass('selected');
				});
			

				$('#btn_adddown').on('click',function(){
					$('#login-modal').modal('show');
				});

 			// event ON CHANGE
				$('#i_problem').on('change', function() {
				  	// jika ini zeroo
				  	if (this.value==13) {
				  		document.getElementById('i_time').disabled=true;
				  		document.getElementById('i_ket').value= "Zero Downtime";
				  		$('#i_jenis').val("1");
				  		document.getElementById('i_time').value= 0;
				  	}

				});
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

			// chart 4
			var hiColor = ['#D50000','#f57e42','#e0c216','#3ea85a','#25b84c'];

			function loadChart() {
				// console.log('load chart pdo: '); 
				// console.log(id_pdo);
				var opt_indef = {
							title: {
						        text: 'Downtime'
						    }, 
						    chart: {
						        renderTo: 'chart_downtime',
						        type: 'column'
						    },
						    xAxis: {
						        type: 'category'
						    },
						    yAxis: {
						        title: {
						            text: 'Durasi (Menit)'
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
						                format: '{point.y:.1f}menit'
						            }
						        }
						    }, 
						    tooltip: {
						        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
						        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.1f}Menit</b> of total<br/>'
						    }, 
						    series: [
						        {
						            name: "Downtime",
						            data: (function(){
									        	var da = [];  
									        	$.ajax({ 
									        		async : false,
								                    type  : 'POST',
								                    url   : "<?php echo site_url('Losstime/top5downtime');?>",
								                    dataType : 'JSON', 
								                    data:{
								                    	id_pdo:id_pdo
								                    },
								                    success : function(res){   
								                    	for (var i = 0; i < res.length; i++) { 
								                    		var tmp = {
									                    				name: res[i].keterangan,
									                    				y: parseFloat(res[i].durasi),
									                    				color: hiColor[i]
								                    				};

								                    		da.push(tmp);
								                    	}
								                    }
								                });  

									        	return da;
								        	}()
								        )  
						        }
						    ],
		            	}; 

				var chart_downtime = new Highcharts.Chart(opt_indef); 
			}



		}); 
	</script>

</body>

</html>