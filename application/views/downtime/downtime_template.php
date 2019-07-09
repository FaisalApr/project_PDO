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
 
</head>
<body>

	<?php 
		$ses = $this->session->userdata('pdo_logged'); 
	 ?>

	<input type="hidden" id="id_pdo" value="<?php echo $pdo->id ?>">
	<input type="hidden" id="id_users" value="<?php echo $ses['id_user'] ?>">
	<?php $this->load->view('header/header_users'); ?>
	<?php $this->load->view('header/sidebar_users'); ?>
 
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<!-- top icon dasboard -->
			<div class="row clearfix progress-box">
				
				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow">
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

				<div class="col-lg-3 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow">
						<h5 class="card-header text-center weight-500">Prosentase Losstime</h5>
						<div class="card-body"> 
							<div class="project-info-progress">
								<center>
								<span class="col-sm-12 align-content-center text-blue weight-800"><font size="46" id="id_prcent_loss">0</font>%</span>
								</center>
							</div>
						</div> 
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow">
						<h5 class="card-header text-center weight-500">Total Losstime</h5>
						<div class="card-body"> 
							<center>
								<span class="col-sm-10 align-content-center weight-800"><font size="46" id="id_tot_loss">0</font>Jam</span> 
							</center>	
						</div> 
					</div>
				</div>
				
				<div class="col-lg-2 col-md-6 col-sm-12 mb-10">
					<div class="card box-shadow">
						<h5 class="card-header text-center weight-500">Total Exclude</h5>
						<div class="card-body"> 
							<center>
								<span class="col-sm-10 align-content-center weight-800"><font size="46" id="id_tot_exc">0</font>Jam</span> 
							</center>	
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
							<input type="hidden" class="form-control" placeholder="Assy Code" name="id_updt" id="id_update">

							<div class="input-group custom input-group-lg"> 
								<select class="custom-select col-12" name="jam_updt" id="jam_update"> 
									<!-- CONTAINER -->
									<!-- JAM KEEEEEEE --> 
								</select>
							</div> 
							
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="problem_updt" id="problem_update">
									<option disabled selected> Problem</option>
										<?php foreach ($data_error as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
										<?php }  ?> 
								</select>
							</div>

							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="KETERANGAN" name="ket_updt" id="ket_update">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy fa fa-sticky-note-o" aria-hidden="true"></i></span>
								</div>
							</div>

							<div class="input-group custom input-group-lg"> 
								<select class="custom-select col-12" name="jenis_updt" id="jenis_update">
									<option disabled selected> Pilih Jenis Downtime</option>
										<?php foreach ($data_losttime as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
										<?php }  ?> 
								</select>
							</div>

							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="Time" name="time_updt" id="time_update">
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
								<select class="custom-select col-12" name="levelupp" id="i_jam">
								 
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="levelupp" id="i_problem">
									<option disabled selected> Problem</option>
											<?php foreach ($data_error as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="KETERANGAN" id="i_ket">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
								</div>
							</div> 
							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="levelupp" id="i_jenis">
									<option disabled selected> Pilih Jenis Downtime</option>
											<?php foreach ($data_losttime as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="Time" id="i_time">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
								</div>
							</div> 
							<br> 
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group"> 
										<a class="btn btn-primary btn-lg btn-block" id="btn_submit" href="#">Submit</a>
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

	<script> 
		$('document').ready(function(){
			// variabel global	
				// deklarasi nama bulan
	 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

	 			var today = new Date();
				var currentMonth = today.getMonth();
				var currentYear = today.getFullYear();
				var currDate = today.getDate();
				var submited = false;		
				var pdo_id = $('#id_pdo').val();
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
				    	cariDataPdo(); 
				    }
				});
			// PILIH SHIFTY
				$('#drop_shiftt').on('click','.pilih_sf',function(){
					var ssf = $(this).data('value'); 

					document.getElementById('id_sifname').innerHTML= ssf;
					if (ssf=='A') {
						document.getElementById('sf_a').classList.add("aktip");
						document.getElementById('sf_b').classList.remove("aktip"); 	
					} else{
						document.getElementById('sf_b').classList.add("aktip");	
						document.getElementById('sf_a').classList.remove("aktip");	
					}
					name_shift = ssf;

					// alert('sf :'+name_shift+'/tgl:'+datetimeNow);	
					cariDataPdo();
				});
			// ====  AUTOLOAD =====
				var name_shift = document.getElementById('id_sifname').innerHTML;
				cariDataPdo();

			// ======  MENCARI DATA PDO selected
			// CARI PDO DI TANGGAL YANG DIPILIH
				function cariDataPdo() { 

					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataCari',
	                    dataType : 'JSON', 
	                    data:{
	                    	name_sif: name_shift,
	                    	tgl: datetimeNow
	                    },
	                    success : function(res){   

	                    	if (res) { 
	                    		// cek jika itu bukan miliknya
	                    		if ($('#id_users').val()==res.id_users) { 
	                    			console.log('MILIKNYA') 
	                    			document.getElementById('btn_adddown').style.display = 'block';
	                    			show(res.id_pdo);  
	                    		}else { 
	                    			console.log('not YOU');
	                    			document.getElementById('btn_adddown').style.display = 'none';
	                    			show_notYou(res.id_pdo);  
	                    		}   
	                    		pdo_id = res.id_pdo;  
	                    		isi_dropdown(res.id_pdo);
	                    		console.log(res); 	
	                    	}else {
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
	            function show(pdo_id){
	            		console.log('show called');

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:pdo_id},
	                        success : function(respon){
	                            var html = '';
	                            var i;
	                            var data = respon.data_downtime;
	                            var widget = respon.widgettt;

	                            submited = respon.pdo.status; 
	                            // console.log(respon);
	                            for(i=0; i<data.length; i++){
	                            	x = data[i].durasi*60;
		                        	menit = (x%3600)/60;
		                        	detik = (x%3600)%60;
		                        	var duras = Math.floor(menit)+' Menit '+Math.floor(detik)+' Detik';
		                        	
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

	            function show_notYou(pdo_id){
	            		console.log('show show_notYou called');

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:pdo_id},
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

	                    $.ajax({
	                        async :false,
	                        type  : 'POST',
	                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
	                        dataType : 'json',
	                        data : {id_pdo:pdo_id},
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
	   			$('#btn_submit').click(function(){ 

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
							down_id_pdo:pdo_id,
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

					show(pdo_id);
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
	                    data : {id:id_dc_delete,id_pdo:pdo_id},
	                    success: function(){
	                        $('[name="id_dc_delete"]').val("");
	                        $('#confirmation-modal').modal('hide');
	                        // refresh()
	                        
	                show(pdo_id);
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
					$('input[name="id_updt"]').val(id);   

					// fix
					$("#problem_update option[value='"+id_error+"']").prop('selected', true);
					$("#jenis_update option[value='"+id_jenisloss+"']").prop('selected', true);
					$("#jam_update option[value='"+id_oc+"']").prop('selected', true);

					$('[name="ket_updt"]').val(keterangan);
					$('[name="time_updt"]').val(durasi);



	                $('#update_modal').modal('show');
	                
	            });
            
            //UPDATE record to database (submit button)
	            $('#btn_update').on('click',function(){
	                var idup = $('[name="id_updt"]').val();
	                var iderrorup = $('[name="problem_updt"]').val();
	                var idocup = $('[name="jam_updt"]').val();
	                var idjenislossup = $('[name="jenis_updt"]').val();
	                var ketup = $('[name="ket_updt"]').val();
	                var durasiup = $('[name="time_updt"]').val();

					// alert(umhup);
	                $.ajax({
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/Losstime/updateLosstime",
	                    dataType : "JSON",
	                    data : { 
	                    		id_pdo:pdo_id,
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
	                        show(pdo_id);
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
				  		document.getElementById('i_ket').value= "Zero Downtime";
				  		$('#i_jenis').val("1");
				  		document.getElementById('i_time').value= 0;
				  	}

				});


		}); 
	</script>

</body>

</html>