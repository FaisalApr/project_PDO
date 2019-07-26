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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">

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
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- BODY CONTAINER --> 
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_1"> 
					<div class="pull-left">
						<h5 class="text-blue" style="font-size: 46px">Supervisor List</h5> 	
					</div>
					<div class="pull-right">
						<div class="row clearfix">	
							<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_line-modal" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
						</div>
					</div>
					<br><br><br>

					<!-- TABEL -->
					<table class="data-table stripe hover nowrap" id="t_user">
						<thead>
							<tr>
								<th style="vertical-align: middle; text-align: center;" class="table-plus datatable-nosort">No</th>
								
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">NIK</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Nama</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Passcode</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Line</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="tbl_body">
							
						</tbody>
					</table>
				</div>

		<!-- BODY CONTAINER 2--> 
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_2" style="display: none;"> 
					<div class="row">
					<div class="col-md-3 col-sm-12">
						<a href="#" class="btn btn-danger" id="btn_back" data-backdrop="static" style="margin-left: : 20px; width: 100px"><span class="fa fa-arrow-left"></span>  </a>
					</div>

					<div class="col-md-6 col-sm-12">
						<center>
						<h4 class="text-blue" style="font-size: 46px" id="v_nama">Line Data Table</h4> 
						</center>	
					</div>
					<div class="col-md-3 col-sm-12">
						
						<div class="pull-right">
							<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_line2-modal" style="margin-right: 10px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
						</div>
					</div>
				</div>
				
				<br>

					<!-- TABEL -->
					<table class="data-table stripe hover nowrap" id="ta_user">
						<thead>
							<tr>
								<th style="vertical-align: middle; text-align: center;" class="table-plus datatable-nosort">No</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Carline</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Line</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="tbl_body2">
							
						</tbody>
					</table>
				</div>

		<!-- ==================================================================================== -->
		<!-- kumpulan modal -->
			<!-- modal input -->
		        <div class="modal fade" id="i_line-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		          <div class="modal-dialog modal-dialog-centered">
		            <div class="modal-content">
		              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h2 class="text-center mb-30">Supervisor</h2>
		                <!-- form start -->
		                <form id="form_input_carline">
		                  
		                  <!-- input -->
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="NIK" id="i_nik">
								<div class="valid-feedback"></div>
	    						
							</div>
							<!-- input -->
							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="NAMA" id="i_nama" required>
								<div class="valid-feedback"></div>
	    						
							</div>
		                  <!-- input -->
							<div class="input-group custom input-group-lg">
								<input type=number class="form-control" placeholder="passcode" id="i_passcode" required>
								<div class="valid-feedback"></div>
							</div>
		
		                  
		                  <!-- button submit -->
		                  <div class="row">
								<div class="col-sm-12">
									<div class="input-group">	
										<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_line_submit">Submit</a>
									</div>
								</div>
							</div>

		                </form>
		                <!-- form end -->
		              </div>
		            </div>
		          </div>
		        </div>
	     	<!-- modal update -->
			      <div class="modal fade" id="CLModalUpdt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			        <div class="modal-dialog modal-dialog-centered">
			          <div class="modal-content">
			            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			              <h2 class="text-center mb-30">Update Supervisor</h2>
			              <!-- form start -->
			              <form id="formUpdtCarline">
			              	<!-- input -->
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="NIK" name="nik_updt" id="nik_update">
								<div class="valid-feedback"></div>
	    						
							</div>
							<!-- input -->
							<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="NAMA" name="nama_updt" id="nama_update">
								<div class="valid-feedback"></div>
	    						
							</div>
		                  <!-- input -->
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="passcode" name="passcode_updt" id="passcode_update">
								<div class="valid-feedback"></div>
							</div>
			               <!-- input -->
		                 	<div class="input-group custom input-group-lg">
								<input type="hidden" class="form-control" placeholder="Line" name="id_updt" id="id_update">
								<div class="valid-feedback"></div>
							</div>
							
			                
			                <!-- button submit -->
			                <div class="row">
			                  <div class="col-sm-12">
			                      <div class="input-group">
			                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_line">Update</a>
			                      </div>
			                  </div>
			                </div>
			              </form>
			              <!-- form end -->
			            </div>
			          </div>
			        </div>
			      </div>
	     	<!-- Confirmation modal -->
	              <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="modal-dialog modal-dialog-centered" role="document">
	                  <div class="modal-content">
	                    <div class="modal-body text-center font-18">
	                      <h4 class="padding-top-30 mb-30 weight-500">Apa anda yakin ingin menghapus?</h4>
	                      <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
	                        <input type="hidden" name="id_dc_delete" id="id_dc_delete" class="form-control">
	                        <br>
	                        <div class="col-6">
	                          <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
	                          TIDAK
	                        </div>
	                        <div class="col-6">
	                          <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_line" data-dismiss="modal"><i class="fa fa-check"></i></button>
	                          YA
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	    <!-- ==================================================================================== -->
		<!-- kumpulan modal -->
			<!-- modal input -->

		        <div class="modal fade" id="i_line2-modal">
		          <div class="modal-dialog-lg modal-dialog">
		            <div class="modal-content">
		              <div class="bg-white box-shadow pd-ltr-20 border-radius-5" style="width: 1080px; margin-left: -300px;">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h2 class="text-center mb-30">Line</h2>
		                <!-- form start -->
		                <form id="form_input_line2">
		                 <!-- input -->
		                  	<div class="row">
								<div class="col-md-6">
									<div class="form-group required">
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

								<div class="col-md-12">
									<div class="form-group">
										<label>Job Line :</label>
										<select class="select2 js-states form-control" id="selectlinee" name="states[]" multiple="multiple" style="width: 100%;height: 300px;">
  
										</select>
									</div>
								</div> 

							</div>


									                  
		                  <!-- button submit -->
		                  <div class="row">
								<div class="col-sm-12">
									<div class="input-group">	
										<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_sub_promoteline">Submit</a>
									</div>
								</div>
							</div>

		                </form>
		                <!-- form end -->
		              </div>
		            </div>
		          </div>
		        </div>
	     	<!-- modal update -->
			      <div class="modal fade" id="updt_line_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			        <div class="modal-dialog modal-dialog-centered">
			          <div class="modal-content">
			            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			              <h2 class="text-center mb-30">Update Line</h2>
			              <!-- form start -->
			              <form id="formUpdtline">
			               <!-- input -->
		                 	<div class="input-group custom input-group-lg">
								<input type="text" class="form-control" placeholder="Nama Line " id="nama_update" name="nama_updt">
								<div class="valid-feedback"></div>	
								<input type="hidden" class="form-control" placeholder="Line" name="id_updt" id="id_update">
							</div>
							
			                
			                <!-- button submit -->
			                <div class="row">
			                  <div class="col-sm-12">
			                      <div class="input-group">
			                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_line">Update</a>
			                      </div>
			                  </div>
			                </div>
			              </form>
			              <!-- form end -->
			            </div>
			          </div>
			        </div>
			      </div>
	     	<!-- Confirmation modal -->
	              <div class="modal fade" id="confirmation2-modal" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="modal-dialog modal-dialog-centered" role="document">
	                  <div class="modal-content">
	                    <div class="modal-body text-center font-18">
	                      <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
	                      <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
	                        <input type="hidden" name="id_dc_delete2" id="id_dc_delete2" class="form-control">
	                        <br>
	                        <div class="col-6">
	                          <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
	                          NO
	                        </div>
	                        <div class="col-6">
	                          <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_line2" data-dismiss="modal"><i class="fa fa-check"></i></button>
	                          YES
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	    <!-- ==================================================================================== -->

	</div>
</div>
<!-- grup script -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

	<!-- SELECT2 -->
	<script src="<?php echo base_url() ?>assets/src/plugins/select2/dist/js/select2.min.js"></script>

<!-- ajax -->
	<script>
		$('document').ready(function(){
			// VAR CORE
				var id_line = $('#id_line').val();
				var id_shift = $('#id_shift').val();
				var id_tgl = $('#id_tgl').val();
				var id_pdo = 0;
				var balance_awal=0;
				var id_target =0;
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

			//  GLOBAL
				var dist=0;
				var id_spv;
				
			// INIT
				$('#selectlinee').select2({ 
	 				placeholder: 'Pilih Line ',
	 				allowClear: true, 
	 				closeOnSelect: false,
	 				tags: true,  
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



				// datatable
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

			// crud view 1
				// create
					$('#btn_line_submit').click(function(){
						var nik = document.getElementById("i_nik").value;
						var nama = document.getElementById("i_nama").value;
						var passcode = document.getElementById("i_passcode").value;
						
						$.ajax({
							async : false,
							type : "POST",
							url : "<?php echo base_url() ?>index.php/Supervisor/newSpv",
							dataType : "JSON",
							data : {
								nik:nik,
								nama:nama,
								passcode,passcode
							},
							beforeSend: function(){
								Swal.showLoading();
							},
							success : function(response){
							  	Swal.close();
							  	$('#i_line-modal').modal('hide');
								if(response.error){
									// alert('error');
								}else{
									// alert(response.status);
								}
								document.getElementById("form_input_carline").reset();
								}
							});
						show();
					});
				// read
					show();    
            		function show(){
		          	$.ajax({
		            async :false,
		            type  : 'ajax',
		            url   : '<?php echo base_url();?>index.php/Supervisor/getSpv',
		            dataType : 'JSON',
		            success : function(data){  

		            var html = '';
		            var i;
		            var a=0;
		            // var data = data_lm.data_lm;
		            for(i=0; i<data.length; i++){

		              html += 
		              '<tr>'+
		                '<th style="vertical-align: middle; text-align: center;">'+(i+1)+'</th>'+
		                '<th style="vertical-align: middle; text-align: center;">'+data[i].nik+'</th>'+
		                '<th style="vertical-align: middle; text-align: center;">'+data[i].nama+'</th>'+
		                '<th style="vertical-align: middle; text-align: center;">'+data[i].passcode+'</th>'+
		                '<th style="vertical-align: middle; text-align: center;">';
		                	// limit max view
		                	var limit=0; 
		                	if(data[i].isi.length>5){
		            			limit = 5;
		            		}else{
		            			limit = data[i].isi.length;
		            		}

		            		// Perulangan isi 
			            		for(var j=0;j<limit; j++){
			            			html +=
			            			data[i].isi[j].nama_line+',';
			            		}
			            	html+=
			            		' ('+data[i].isi.length+')';

		                html +='</th>'+
		                '<th>'+
		                  '<div class="dropdown" style="vertical-align: middle; text-align: center;">'+
		                      '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
		                        '<i class="fa fa-ellipsis-h"></i>'+
		                      '</a>'+                     
		                      '<div class="dropdown-menu dropdown-menu-right">'+
		                        '<a class="dropdown-item item_edit" href="#" data-id="'+data[i].id+'" data-nik="'+data[i].nik+'" data-nama="'+data[i].nama+'" data-passcode="'+data[i].passcode+'"><i class="fa fa-pencil"></i> Edit </a>'+
		                        '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
		                        '<a class="dropdown-item item_view" href="#" data-id="'+data[i].id+'" data-nama="'+data[i].nama+'" ><i class="fa fa-eye"></i> Detail </a>'+
		                      
		                      '</div>'+
		                    '</div>'+
		                '</th>'+
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
		            }
		          });
		        	}
				// update
					//get data for UPDATE record show prompt
			            $('#tbl_body').on('click','.item_edit',function(){
			            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
			                var id = $(this).data('id');
			                var nik = $(this).data('nik');
			                var nama = $(this).data('nama');
			                var passcode = $(this).data('passcode');

			                // memasukkan data ke form updatean
							$('[name="id_updt"]').val(id);
							$('[name="nik_updt"]').val(nik);
							$('[name="nama_updt"]').val(nama);
							$('[name="passcode_updt"]').val(passcode);

			                $('#CLModalUpdt').modal('show');
			                
			            });
			            
			            //UPDATE record to database (submit button)

			            $('#btn_update_line').on('click',function(){
			                var idup = $('[name="id_updt"]').val();
							var namaup = $('[name="nama_updt"]').val();
							var nik = $('[name="nik_updt"]').val();
							var passcode = $('[name="passcode_updt"]').val();
							// alert(umhup);
			                $.ajax({
			                    type : "POST",
			                    url  : "<?php echo site_url(); ?>/Supervisor/updateSpv",
			                    dataType : "JSON",
			                    data : { 
			                    		id:idup,
			                    		nama:namaup,
			                    		nik:nik,
			                    		passcode:passcode
			                    		},
			                    	beforeSend: function(){
										Swal.showLoading();
									},
			                    success: function(data){
			                    	Swal.close();
			                    	$('#CLModalUpdt').modal('hide'); 
			                        // refresh();
			                        show();
			                    }
			                });
			            });
				// delete
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

			            $('#btn_del_line').on('click',function(){
			                var id_dc_delete = $('#id_dc_delete').val();
			                // alert(id_dc_delete)
			                $.ajax({
			                    type : "POST",
			                    url  : "<?php echo site_url(); ?>/Supervisor/delSpv",
			                    dataType : "JSON",
			                    data : {id:id_dc_delete},
			                    beforeSend: function(){
									Swal.showLoading();
								},
			                    success: function(){
			                        Swal.close();
			                        $('[name="id_dc_delete"]').val("");
			                        $('#confirmation-modal').modal('hide');
			                        // refresh()
			                        
			                show();
			                    }
			                });
			                return false;
			            });

			// crud view 2
				// view 
					 $('#tbl_body').on('click','.item_view',function(){
					 	var nama = $(this).data('nama');
					 	id_spv = $(this).data('id');
					 	// alert(id_spv);
					 	document.getElementById('v_nama').innerHTML = ' Supervisor ' + nama;
					 	document.getElementById('cont_1').style.display="none";
					 	document.getElementById('cont_2').style.display="block";
					 	sv();
					 });
				// button back
					$('#btn_back').click(function(){
						document.getElementById('cont_1').style.display="block";
						 document.getElementById('cont_2').style.display="none";
						 show();
					});
				// create
					$('#btn_sub_promoteline').click(function(){

					// 	var id_carline = id_spv;
						var id_line = $('#selectlinee').val()
						
						console.log(id_line);
						console.log(id_spv);
						// return;
						$.ajax({
							async : false,
							type : "POST",
							url : "<?php echo base_url() ?>index.php/Supervisor/newJobLine", 
							dataType : "JSON",
							data : { 
								id_spv:id_spv,
								linemgr: id_line 
							},
							beforeSend: function(){
								Swal.showLoading();
							},
							success : function(response){
								Swal.close();
								$('#i_line2-modal').modal('hide');
								console.log('sukses:');
								console.log(response);
								document.getElementById("form_input_line2").reset();
							}
						});
						sv();
					});
				// read
					function sv(){
							// alert(id_spv);
					 		var dataline ;
							$.ajax({
							    async :false,
						        type  : 'post',
					            url   : '<?php echo base_url();?>index.php/Supervisor/getListById',
					            dataType : 'JSON',
					            data : {id:id_spv},
					            success : function(data){
					            	console.log(data);
					            // dataline = data;
					            var html = '';
					            var i;
					            var a=0;
					            // var data = data_lm.data_lm;
					            for(i=0; i<data.length; i++){ 
					              html += 
						            '<tr>'+
					                '<th style="vertical-align: middle; text-align: center;">'+(i+1)+'</th>'+  
							         '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_carline+'</th>'+
							         '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_line+'</th>'+
							        '<th>'+
							        '<div class="dropdown" style="vertical-align: middle; text-align: center;">'+
							          '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
							            '<i class="fa fa-ellipsis-h"></i>'+
							          '</a>'+                     
							          '<div class="dropdown-menu dropdown-menu-right">'+
							          '<a class="dropdown-item item_delete2" href="#" data-id2="'+data[i].id_man+'"><i class="fa fa-trash"></i> Hapus </a>'+
							                      
							          '</div>'+
							        '</div>'+
							        '</th>'+
						            '</tr>';

							            }		  
							            $('#ta_user').DataTable().destroy();          
							            $('#tbl_body2').html(html);  
							            $('#ta_user').DataTable({
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
				// delete
					//get data for delete record show prompt
			            $('#tbl_body2').on('click','.item_delete2',function(){
			                // alert($(this).data('id'))
			                var id = $(this).data('id2');
			                // alert(id);
			                // var tanggal = $(this).data('tanggal');
			                // var judul = $(this).data('judul');
			                // var pengumuman = $(this).data('isi');
			               
			                $('[name="id_dc_delete2"]').val(id);  
			                $('#confirmation2-modal').modal('show');
			                // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";
			                
			                
			               
			                // alert('oke');
			            });

			            //delete record to database

			            $('#btn_del_line2').on('click',function(){
			                var id_dc_delete = $('#id_dc_delete2').val();
			                // alert(id_dc_delete);
			                $.ajax({
			                    type : "POST",
			                    url  : "<?php echo site_url(); ?>/Supervisor/delSM",
			                    dataType : "JSON",
			                    data : {id:id_dc_delete},
			                    beforeSend: function(){
									Swal.showLoading();
								},
			                    success: function(){
			                        Swal.close();
			                        $('[name="id_dc_delete2"]').val("");
			                        $('#confirmation2-modal').modal('hide');
			                        // refresh()
			                        
			                sv();
			                    }
			                });
			                return false;

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
			                beforeSend: function(){
								Swal.showLoading();
							},
			                success : function(res){   
								Swal.close();
								console.log(res);
			                }

			            });
					}

		}); 
	</script>

</body>

</html>