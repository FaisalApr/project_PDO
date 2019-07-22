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
					
					<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_line-modal" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
				</div>
			</div>
			<br><br><br> 
			<!-- TABEL -->
			<table class="data-table stripe hover nowrap" id="t_user">
				<thead>
					<tr>
						<th style="vertical-align: middle; text-align: center;" class="table-plus datatable-nosort">No</th>
						<th style="vertical-align: middle; text-align: center;" >Carline</th>
						<th style="vertical-align: middle; text-align: center;" >Line</th>
						<th style="vertical-align: middle; text-align: center;" >Kode Assy</th>
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
						
						
						<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Kode Assy</th>
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
	              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Line</h2>
	                <!-- form start -->
	                <form id="form_input_line">
	                  <!-- input -->
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Nama Line " id="i_nama" required>
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
		      <div class="modal fade" id="updt_line_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		        <div class="modal-dialog modal-dialog-centered">
		          <div class="modal-content">
		            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
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
                          <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_line" data-dismiss="modal"><i class="fa fa-check"></i></button>
                          YES
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    <!-- ==================================================================================== -->
	<!-- kumpulan modal -->
		<!-- modal input -->
	        <div class="modal fade" id="i_line2-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Assy per Line</h2>
	                <!-- form start -->
	                <form id="form_input_line2">
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="i_assy" id="pilihasy">
								
							</select>
						  </div>
						</div>
	                  
	                  <!-- button submit -->
	                  <div class="row">
							<div class="col-sm-12">
								<div class="input-group">	
									<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_line2_submit">Submit</a>
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
<!-- grup end -->
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
			show(); 

			// INIT datatable 
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
			 


			// =====================  CONTAINER 1  ========================
				// create
					$('#btn_line_submit').click(function(){
						var nama = document.getElementById("i_nama").value;
						// var def_umh = document.getElementById("i_umh").value;
						// alert(def_code+","+def_ket);

						$.ajax({
							async : false,
							type : "POST",
							url : "<?php echo base_url() ?>index.php/Line/newLine",
							dataType : "JSON",
							data : {
								nama_line:nama
							},
							success : function(response){
									  $('#i_line-modal').modal('hide');
								if(response.error){
									// alert('error');
								}else{
									// alert(response.status);
								}
								document.getElementById("form_input_line").reset();
							}
						});
						show();
					});
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
				            // console.log(data);
				            // return;
				            for(i=0; i<data.length; i++){

				              html += 
				              '<tr>'+
				                '<th style="vertical-align: middle; text-align: center;">'+(i+1)+'</th>'+
				                '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_carline+'</th>'+
				                '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_line+'</th>'+
				                '<th style="vertical-align: middle; text-align: center;">';
				                $.ajax({
						            async :false,
						            type  : 'post',
						            url   : '<?php echo base_url();?>index.php/LineManager/getAssByLine',
						            dataType : 'JSON',
						            data :{id:data[i].id_carline },
						            success : function(respon){
						            		var limit = 0;
						            		if(respon.length>5){
						            			limit = 5;
						            		}else{
						            			limit = respon.length;
						            		}
						            		for(var j=0;j<limit; j++){
						            			html +=
						            			respon[j].kode_assy+ ' , ';
						            		}
						            		html+=
						            		' ('+respon.length+')';

						            	}
						            });
				                html +='</th>'+
				                '<th>'+
				                  '<div class="dropdown" style="vertical-align: middle; text-align: center;">'+
				                      '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
				                        '<i class="fa fa-ellipsis-h"></i>'+
				                      '</a>'+                     
				                      '<div class="dropdown-menu dropdown-menu-right">'+
				                        '<a class="dropdown-item item_edit" href="#" data-id="'+data[i].id+'" data-nama_line="'+data[i].nama_line+'" data-id_line="'+data[i].id_line+'" data-id_assy="'+data[i].id_assy+'"><i class="fa fa-pencil"></i> Edit </a>'+
				                        '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
				                        '<a class="dropdown-item item_view" href="#" data-nama="'+data[i].nama_line+'" data-id="'+data[i].id+'"><i class="fa fa-eye"></i> Detail </a>'+
				                      
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
			                var idd = $(this).data('id');
			                var nama = $(this).data('nama_line');

			                // memasukkan data ke form updatean
							$('[name="id_updt"]').val(idd);
							$('[name="nama_updt"]').val(nama);


			                $('#updt_line_modal').modal('show');
			                
			            });
			            
			            //UPDATE record to database (submit button)

			            $('#btn_update_line').on('click',function(){
			                var idup = $('[name="id_updt"]').val();
							var namaup = $('[name="nama_updt"]').val();
							
							// alert(umhup);
			                $.ajax({
			                    type : "POST",
			                    url  : "<?php echo site_url(); ?>/Line/updateLine",
			                    dataType : "JSON",
			                    data : { 
			                    		id:idup,
			                    		nama_line:namaup
			                    		},

			                    success: function(data){
			                    	$('#updt_line_modal').modal('hide'); 
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
			                    url  : "<?php echo site_url(); ?>/Line/delLine",
			                    dataType : "JSON",
			                    data : {id:id_dc_delete},
			                    success: function(){
			                        $('[name="id_dc_delete"]').val("");
			                        $('#confirmation-modal').modal('hide');
			                        // refresh()
			                        
			                show();
			                    }
			                });
			                return false;
			            });


			// =====================  CONTAINER 2  ======================== 

			// spv_manager
				var coba;
			    // view
					 $('#tbl_body').on('click','.item_view',function(){
					 	var nama = $(this).data('nama');
					 	coba = $(this).data('id');
					 	// alert(coba);
					 	document.getElementById('v_nama').innerHTML = ' Line ' + nama;
					 	document.getElementById('cont_1').style.display="none";
					 	document.getElementById('cont_2').style.display="block";
					 	sv();
					 });



				// ------------------show view-------------------------------------
					 function sv(){

					 		var dataassy ;
							$.ajax({
							    async :false,
						        type  : 'post',
					            url   : '<?php echo base_url();?>index.php/LineManager/getLineManById',
					            dataType : 'JSON',
					            data : {id:coba},
					            success : function(data){
					            dataassy = data;
					            var html = '';
					            var i;
					            var a=0;
					            // var data = data_lm.data_lm;
					            for(i=0; i<data.length; i++){



					              html += 
						            '<tr>'+
					                '<th style="vertical-align: middle; text-align: center;">'+(i+1)+'</th>'+  
							         '<th style="vertical-align: middle; text-align: center;">'+data[i].kode_assy+'</th>'+
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

							$.ajax({
			                    async : false,
			                    type  : 'ajax',
			                    url   : '<?php echo base_url();?>index.php/Assycode/getAssyCode',
			                    dataType : 'JSON',
			                    success : function(dat){ 
			                    	html = '<option disabled selected> Pilih Assy </option>';
			 
			                    	// mengulang jika ada yang sama dengan column head 
			                		for (var i = 0; i < dat.length; i++) { 
			                			var skip = false;
			                			for (var ii = 0; ii < dataassy.length; ii++) {  
				                			// jika ada assy yang sama dengan header tidak ditampilkan
				                			if (dat[i].kode_assy==dataassy[ii].kode_assy) {
				                				skip = true;
				                			}
				                		}
				                		if (skip==false) { 
			                				html +='<option value="'+dat[i].id+'">'+dat[i].kode_assy+'</option>';
			                			}  
			                    	}  

									$('#pilihasy').html(html);
									// $('#pilihasy1').html(html);
			                    }
			                });
					 }

				// button back
				$('#btn_back').click(function(){
					document.getElementById('cont_1').style.display="block";
					 document.getElementById('cont_2').style.display="none";
					 show();
				});

				// ------------------------------------------------------create view-------------------------------------
					// create
					$('#btn_line2_submit').click(function(){

						var id_line = coba;
						var id_assy = $('#pilihasy').val()
						// alert(def_jam+","+def_ket+","+def_total+","+levelup);
						// alert($('#id_pdo').val());
						// alert(id_assy);
						// alert(id_line);
						$.ajax({
							async : false,
							type : "POST",
							url : "<?php echo base_url() ?>index.php/LineManager/newLM",
						
							dataType : "JSON",
							data : {
								
								id_line: id_line,
								id_assy: id_assy
							},
							success : function(response){
								$('#i_line2-modal').modal('hide');
								if(response.error){
									// alert('error');
								}else{
									// alert(response.status);
								}
								document.getElementById("form_input_line2").reset();
							}
						});
						sv();
					});

				// ------------------------------------------------------del view-------------------------------------
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
			                    url  : "<?php echo site_url(); ?>/LineManager/delLM",
			                    dataType : "JSON",
			                    data : {id:id_dc_delete},
			                    success: function(){
			                        $('[name="id_dc_delete2"]').val("");
			                        $('#confirmation2-modal').modal('hide');
			                        // refresh()
			                        
			                sv();
			                    }
			                });
			                return false;

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