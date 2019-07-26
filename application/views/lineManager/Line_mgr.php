<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Line Manager</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
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
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- BODY CONTAINER --> 
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_1"> 
			<div class="pull-left">
				<h5 class="text-blue" style="font-size: 46px">Data Line Manager</h5> 	
			</div>
			<div class="pull-right">
				<div class="row clearfix">	
					<a class="btn btn-primary" data-toggle="modal" href='#modal_importexcl' style="margin-right: 25px;">Import File .Xlsx</a>
					
					<!-- <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_line-modal" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a> -->
				</div>
			</div>
			<br><br><br> 
			<!-- TABEL -->
			<table class="data-table stripe hover nowrap" id="t_user">
				<thead>
					<tr>
						<th style="vertical-align: middle; text-align: center; width: 5%;" class="table-plus datatable-nosort">No</th>
						<!-- <th style="vertical-align: middle; text-align: center;" >Carline</th> -->
						<th style="vertical-align: middle; text-align: center; width: 25%;" >Line</th>
						<th style="vertical-align: middle; text-align: center; width: 50%;" >Assy Yang Dibuat</th>
						<th style="vertical-align: middle; text-align: center; width: 15%;" >Total Umh</th>
						<th style="vertical-align: middle; text-align: center; width: 5%;" class="datatable-nosort">Action</th>
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
			<hr>
			<!-- TABEL -->
			<table class="data-table stripe hover nowrap" id="tbl_det_assy">
				<thead>
					<tr>
						<th style="vertical-align: middle; text-align: center; width: 10%;">No</th>
						<th style="vertical-align: middle; text-align: center; width: 70%;">Kode Assy  (Umh)</th> 
						<th style="vertical-align: middle; text-align: center; width: 10%;" class="datatable-nosort">Action</th>
					</tr>
				</thead>
				<tbody id="tbl_body2" style="text-align: center;">
					
				</tbody>
			</table>
		</div>

	<!-- ==================================================================================== -->
	 
    <!-- ==================================================================================== -->
	<!-- kumpulan modal -->
		<!-- modal input -->
	        <div class="modal fade" id="i_line2-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30" id="head_assy">XXXX  Assy di Line  XXXXXX</h2>
	                <br>
	                <!-- form start -->
	                <form id="fom_pilihassyline">
	                  <!-- input -->
	                  	<div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
						  	<label>Pilih Assy :</label>
							<select class="select2 js-states form-control" id="pilihasy_2" name="pilihasy_2" multiple="multiple" style="width: 100%;height: 400px;">
  
							</select>
						  </div>
						</div>
	                  	<p id="txt_tot_ass" style="margin-top: -35px;">Total Assy: 201</p>
	                  <!-- button submit -->
	                  <div class="row">
							<div class="col-sm-12">
								<div class="input-group">	
									<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_addline_submit">Tambahkan</a>
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
		            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		              <h2 class="text-center mb-30">Update Line</h2>
		              <!-- form start -->
		              <form id="form_updt_absen_pegawai">
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
              <div class="modal fade" id="konfirmasidel_assyline" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body text-center font-18">
                      <h4 class="padding-top-30 mb-30 weight-500" id="titel_hapus_assyline">XXXXX JUDUL XXXXXX</h4>
                      <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <input type="hidden" id="id_del_assyline" class="form-control">
                        <br>
                        <div class="col-6">
                          <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                          NO
                        </div>
                        <div class="col-6">
                          <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_assyline_sub" data-dismiss="modal"><i class="fa fa-check"></i></button>
                          YES
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    <!-- ==================================================================================== -->
	
    	<!-- import file -->
			<div class="modal fade" id="modal_importexcl">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Import File EXCEL (.Xlsx)</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<div class="modal-body">
							<form method="post" id="import_form" enctype="multipart/form-data">
								<div class="alert alert-warning" role="alert">
									Pastikan Data .Xlsx Yang dimasukkan Sesuai Dengan Format.
									<img src="<?php echo base_url()?>/assets/src/images/format_assy.png">
								</div>
								<p><label>Select Excel File</label>
								<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
								<br />
								<input type="submit" name="import" value="Import" class="btn btn-info" />
							</form>

						</div> 
					</div>
				</div>
			</div>

	</div>  
</div>

<!-- grup script -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
<!-- grup end -->
	<script>
		$('document').ready(function(){
			// ConfG
				// VAR CORE
					var id_line = $('#id_line').val();
					var id_shift = $('#id_shift').val();
					var id_tgl = $('#id_tgl').val();
					var id_pdo = 0;
					var balance_awal=0;
					var id_target =0;
					var mData = null;
					var id_carline = null;

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
 
					    }
					});
				// TRIGGEr line Change
					$('#select_line').on('select2:select',function(e){
						var data = e.params.data;
						
						id_line = data.id ;
						// update opt to server
						updateOpt();   
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
 

			// =====================  CONTAINER 1  ======================== 
				// read  
            		function show(){
			          	$.ajax({
				            async :false,
				            type  : 'ajax',
				            url   : '<?php echo base_url();?>index.php/Line/getLine',
				            dataType : 'JSON',
				            success : function(data){
				            var html = '';
				            var i;
				            var a=0;
				            // var data = data_lm.data_lm;
				            console.log(data);
				            // return;
				            for(i=0; i<data.length; i++){

				              html += 
				              `<tr>`+
				                `<td style='vertical-align: middle; text-align: center;'>`+(i+1)+`</td>`+
				                // `<td style='vertical-align: middle; text-align: center;'>`+data[i].nama_carline+`</td>`+
				                `<th style='vertical-align: middle; text-align: center;'>`+data[i].nama_line+`  -  (`+data[i].nama_carline+`)</th>`+
				                `<td style='vertical-align: middle; text-align: center;'>`;
				                	var limit = 0;
				                	var isover = false;
				                	// menetukan Limit
					            		if(data[i].data_assy.length>=5){
					            			limit = 4;
					            			isover = true;
					            		}else{
					            			limit = data[i].data_assy.length;
					            		}
				            		// 
				            		for(var j=0;j<limit; j++){
				            			if (j==(limit-1)) { 
				            				// 
				            				if(isover==true){
				            					html +=
				            					data[i].data_assy[j].kode_assy+ `, ...`;
				            				}else{
				            					html +=
				            					data[i].data_assy[j].kode_assy+ ``;
				            				} 
				            			}else {
				            				html +=
				            				data[i].data_assy[j].kode_assy+ ` , `;	
				            			} 
				            		}
				            		html+=
				            		` (`+data[i].data_assy.length+`)`;

				                var to = data[i].tot_umh ;
				            	if (parseFloat(data[i].tot_umh)!=0) {
				                	to = parseFloat(data[i].tot_umh).toFixed(3);
				                }

				                html +=
				                `</td>`+ 
				                `<td>`+to+`</td>`+
				                `<td>`+
				                    `<a class='dropdown-item item_view' href='#' data-id_lstcrln='`+data[i].id_listcarline+`' data-nama_line='`+data[i].nama_line+`' data-nama_cr='`+data[i].nama_carline+`' data-lstassy='`+JSON.stringify(data[i].data_assy)+`'><i class='fa fa-eye'></i> Detail </a>`+
				                `</td>`+
				              `</tr>`;

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
									searchPlaceholder: "Cari Nama Line..?"
								},
							});  
			           	 }
			        	});
		        	}
				


			// =====================  CONTAINER 2  ======================== 
			// >>>>>>>>>>>>>>>>>>>>DETAIL LIST ASSSY<<<<<<<<<<<<<<<<<<<<<<< 
			    // ==>>>  CLICK VIEWW
					 $('#tbl_body').on('click','.item_view',function(){
					 	var id_lstcr = $(this).data('id_lstcrln'); 
					 	var nama_ln = $(this).data('nama_line');
					 	var nama_cr = $(this).data('nama_cr'); 
					 	var data = $(this).data('lstassy');
 						
 						id_carline = id_lstcr;
					 	mData = data;
					 	getDataSelectAssy(data);
 						// console.log(data);
					 	// al;
					 	document.getElementById('v_nama').innerHTML = ' Line ' + nama_ln+'  ('+nama_cr+')';
					 	document.getElementById('cont_1').style.display="none";
					 	document.getElementById('cont_2').style.display="block";
					 	document.getElementById('head_assy').innerHTML= "Tambah Assy Line - "+nama_ln;
					 	showDataAssy(data);
					 }); 
				// ------------------show view-------------------------------------
					function showDataAssy(data){
					 	// console.log('lst assy called');
					 	$("#tbl_det_assy").DataTable().destroy();
					 	$('#tbl_body2').html('');
					 	var html='';
 						for (var i = 0; i < data.length; i++) {
 							//
 							var tr = $('<tr>').append(
										$('<td>').text((i+1)),
										$('<td>').html(data[i].kode_assy+' - ('+data[i].umh+')'),
										$('<td>').html(
											`<div class="dropdown" style="vertical-align: middle; text-align: center;">`+
                      							`<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">`+
                        						`<i class="fa fa-ellipsis-h"></i></a>`+
                        						`<div class="dropdown-menu dropdown-menu-right">`+ 
							                        `<a class="dropdown-item item_deleteass" href="#" data-id="`+data[i].id_lnmgr+`" data-nama="`+data[i].kode_assy+`" data-umh="`+data[i].umh+`"><i class="fa fa-trash"></i> Hapus </a>`+ 
							                    `</div>`+
							                `</div>`
                        					)
										); 
 							tr.appendTo('#tbl_body2');
 						} 
 						$('#tbl_det_assy').DataTable({
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
								searchPlaceholder: "Cari Nama Assy"
							},
						});
					} 
					function refreshMData(id_carline) {
					 	$.ajax({
				            async :false,
				            type  : 'POST',
				            url   : '<?php echo site_url("LineManager/getAssByLine");?>',
				            dataType : 'JSON',
				            data:{
				            	id: id_carline
				            },
				            success : function(data){
				            	// console.log(data);
				            	mData = data;
				            	showDataAssy(data);
				            	getDataSelectAssy(data)
				            }
				        });
					}

				// button back
					$('#btn_back').click(function(){
						document.getElementById('cont_1').style.display="block";
						 document.getElementById('cont_2').style.display="none";
						 show();
					});

				// -----------------------------NEW LINE ASSY-------------------------------------
					// create
					// validasi
					$( "#fom_pilihassyline" ).validate({
					  rules: {
					  	pilihasy_2: {
					      required: true
					    }	    
					  }
					});
					$('#btn_addline_submit').click(function(){ 
						// check is valid or not
		   				if (!$('#fom_pilihassyline').valid()) { 
		   					return;
		   				}

						var id_assy = $('#pilihasy_2').val() 
						$.ajax({
							async : false,
							type : "POST",
							url : "<?php echo base_url() ?>index.php/LineManager/newLM", 
							dataType : "JSON",
							data : { 
								id_carline: id_carline,
								assymgr: id_assy
							},
							beforeSend: function(){
								Swal.showLoading();
							},
							success : function(response){
								Swal.close();
								// console.log(response.error); 
								$('#i_line2-modal').modal('hide');
								if(response.error){
									// alert('error');
								}else{
									// alert(response.status);
								} 
							}
						});
						refreshMData(id_carline);
					});

				// -------------------- ------DELETE LINE ASSY -----------------------------------
					//get data for delete record show prompt
			            $('#tbl_body2').on('click','.item_deleteass',function(){ 
			                var id = $(this).data('id');
			                var nama = $(this).data('nama');
			                var umh = $(this).data('umh');
			                 
			                $('#id_del_assyline').val(id);
			                document.getElementById('titel_hapus_assyline').innerHTML = 'Anda Akan menghapus Assy `'+nama+'('+umh+')`  di Line ini ?';
			                
			                $('#konfirmasidel_assyline').modal('show');  
			            }); 
			            //delete record to database 
			            $('#btn_del_assyline_sub').on('click',function(){
			                var id_dc_delete = $('#id_del_assyline').val();
			                // alert(id_dc_delete);
			                $.ajax({
			                	async: false,
			                    type : "POST",
			                    url  : "<?php echo site_url(); ?>/LineManager/delLM",
			                    dataType : "JSON",
			                    data : {id:id_dc_delete},
			                    beforeSend: function(){
									Swal.showLoading();
								},
			                    success: function(data){
			                    	Swal.close();
			                    	console.log('sukses');

			                        $('#id_del_assyline').val("");
			                        $('#konfirmasidel_assyline').modal('hide');  
			                    }
			                }); 
			                refreshMData(id_carline);
			            });

			    // CONFIG LINE SELECTOR 
			    function getDataSelectAssy(dat) {
			    	// console.log('getdata select2 called :');
			    	$.ajax({
			    		async:false,
			    		type: "POST",
			    		url  : "<?php echo site_url('Assycode/getAssyCodeLineAssy'); ?>",
	                    dataType : "JSON",
	                    data : {
	                    	data:dat
	                    },
	                    success: function(data){
	                    	// console.log('ini isi res:');
	                    	// console.log(data);
	                    	document.getElementById('txt_tot_ass').innerHTML = "Total Assy: "+data.length;
 
	                    	$('#pilihasy_2').empty();
							$('#pilihasy_2').select2({ 
				 				placeholder: 'Pilih Line ',
				 				// allowClear: true, 
				 				closeOnSelect: false,
				 				tags: true, 
				 				data: data  
				 			});
	                    }
			    	});   
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

			// Import FIle
				$('#import_form').on('submit', function(event){
					event.preventDefault();
					$.ajax({
						async: false,
						url:"<?php echo site_url(); ?>/Excel_import/importLineMgr",
						method:"POST",
						data:new FormData(this),
						contentType:false,
						cache:false,
						processData:false,
						success:function(data){
							$('#file').val('');
							console.log(data);
							$('#modal_importexcl').modal('hide');

							Swal.fire({
							  position: 'center',
							  title: 'Selesai Menambahkan',
							  type: 'success', 
							});

							show(); 
						}
					})
				});


		});
	</script>

</body>

</html>