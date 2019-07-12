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
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">

<body>
	<?php $this->load->view('header/header'); ?>
	<?php $this->load->view('header/sidebar'); ?>
	 
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<!-- BODY CONTAINER --> 
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_1"> 
					<div class="pull-left">
						<h5 class="text-blue" style="font-size: 46px">Car Line List</h5> 	
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
								
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Car Line</th>
								<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Company</th>
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
		              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h2 class="text-center mb-30">Carline</h2>
		                <!-- form start -->
		                <form id="form_input_carline">
		                  <!-- input -->
		                  	<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_sisi" id="pilihcom">
									<option disabled selected> Company </option>
											<?php foreach ($data_com as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
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
			      <div class="modal fade" id="CLModalUpdt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			        <div class="modal-dialog modal-dialog-centered">
			          <div class="modal-content">
			            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
			              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			              <h2 class="text-center mb-30">Update Line</h2>
			              <!-- form start -->
			              <form id="formUpdtCarline">
			              	<!-- input -->
		                  	<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="com_updt" id="com_update">
									<option disabled selected> Company </option>
											<?php foreach ($data_com as $key) { ?>
												<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama ?> </option>
											<?php }  ?>
										</select>
								</select>
							</div> 
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
		                <h2 class="text-center mb-30">Line</h2>
		                <!-- form start -->
		                <form id="form_input_line2">
		                 <!-- input -->
		                  	<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_line" id="pilihline">
									
								</select>
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
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

	<!-- ajax -->
		<script>
				
			$('document').ready(function(){
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
					$('.multiple-select-row tbody').on('click', 'tr', function (){
						$(this).toggleClass('selected');
					});

				// crud view 1
					// create
						$('#btn_line_submit').click(function(){
							var nama = document.getElementById("i_nama").value;
							var company = document.getElementById("pilihcom").value;
							// var def_umh = document.getElementById("i_umh").value;
							// alert(def_code+","+def_ket);

							$.ajax({
								async : false,
								type : "POST",
								url : "<?php echo base_url() ?>index.php/carline/newcarline",
								dataType : "JSON",
								data : {
									id_district:company,
									nama_carline:nama
								},
								success : function(response){
										  $('#i_line-modal').modal('hide');
									if(response.error){
										// alert('error');
									}else{
										// alert(response.status);
									}
									document.getElementById("form_input_carline").reset();
								}
							});
							// show();
						});
					// read
						show();    
	            		function show(){
			          	$.ajax({
			            async :false,
			            type  : 'ajax',
			            url   : '<?php echo base_url();?>index.php/carline/getCarline',
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
			                '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_carline+'</th>'+
			                '<th style="vertical-align: middle; text-align: center;">'+data[i].nama+'</th>'+
			                '<th style="vertical-align: middle; text-align: center;">';
			                $.ajax({
					            async :false,
					            type  : 'post',
					            url   : '<?php echo base_url();?>index.php/Carline/getUserById',
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
					            			respon[j].nama_line+ ' , ';
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
			                        '<a class="dropdown-item item_edit" href="#" data-id_district="'+data[i].id_district+'" data-nama_d="'+data[i].nama+'" data-id_carline="'+data[i].id_carline+'" data-nama_carline="'+data[i].nama_carline+'"><i class="fa fa-pencil"></i> Edit </a>'+
			                        '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id_carline+'"><i class="fa fa-trash"></i> Hapus </a>'+
			                        '<a class="dropdown-item item_view" href="#" data-nama="'+data[i].nama_carline+'" data-id="'+data[i].id_carline+'"><i class="fa fa-eye"></i> Detail </a>'+
			                      
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
				                var id = $(this).data('id_carline');
				                var id_district = $(this).data('id_district');
				                var nama = $(this).data('nama_carline');

				                // memasukkan data ke form updatean
								$('[name="id_updt"]').val(id);
								$('[name="nama_updt"]').val(nama);
								$('[name="com_updt"]').val(id_district);

				                $('#CLModalUpdt').modal('show');
				                
				            });
				            
				            //UPDATE record to database (submit button)

				            $('#btn_update_line').on('click',function(){
				                var idup = $('[name="id_updt"]').val();
								var namaup = $('[name="nama_updt"]').val();
								var id_D = $('[name="com_updt"]').val();
								// alert(umhup);
				                $.ajax({
				                    type : "POST",
				                    url  : "<?php echo site_url(); ?>/carline/updateCarline",
				                    dataType : "JSON",
				                    data : { 
				                    		id:idup,
				                    		nama_carline:namaup,
				                    		id_district:id_D
				                    		},

				                    success: function(data){
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
				                    url  : "<?php echo site_url(); ?>/Carline/delCarline",
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

				// crud view 2
				    // view
				    	var coba;
						 $('#tbl_body').on('click','.item_view',function(){
						 	var nama = $(this).data('nama');
						 	coba = $(this).data('id');
						 	// alert(coba);
						 	document.getElementById('v_nama').innerHTML = ' Carline ' + nama;
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
						$('#btn_line2_submit').click(function(){

							var id_carline = coba;
							var id_line = $('#pilihline').val()
							
							$.ajax({
								async : false,
								type : "POST",
								url : "<?php echo base_url() ?>index.php/Carline/newLC",
							
								dataType : "JSON",
								data : {
									
									id_carline:id_carline,
									id_line: id_line
									
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
					// read
						function sv(){
								// alert(coba);
						 		var dataline ;
								$.ajax({
								    async :false,
							        type  : 'post',
						            url   : '<?php echo base_url();?>index.php/Carline/getListById',
						            dataType : 'JSON',
						            data : {id:coba},
						            success : function(data){
						            dataline = data;
						            var html = '';
						            var i;
						            var a=0;
						            // var data = data_lm.data_lm;
						            for(i=0; i<data.length; i++){



						              html += 
							            '<tr>'+
						                '<th style="vertical-align: middle; text-align: center;">'+(i+1)+'</th>'+  
								         '<th style="vertical-align: middle; text-align: center;">'+data[i].nama_line+'</th>'+
								        '<th>'+
								        '<div class="dropdown" style="vertical-align: middle; text-align: center;">'+
								          '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
								            '<i class="fa fa-ellipsis-h"></i>'+
								          '</a>'+                     
								          '<div class="dropdown-menu dropdown-menu-right">'+
								          '<a class="dropdown-item item_delete2" href="#" data-id2="'+data[i].id_list+'"><i class="fa fa-trash"></i> Hapus </a>'+
								                      
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
					                    url   : '<?php echo base_url();?>index.php/Carline/getLine',
					                    dataType : 'JSON',
					                    success : function(dat){ 
					                    	html = '<option disabled selected> Pilih Line </option>';
					 
					                    	// mengulang jika ada yang sama dengan column head 
					                		for (var i = 0; i < dat.length; i++) { 
					                			var skip = false;
					                			for (var ii = 0; ii < dataline.length; ii++) {  
						                			// jika ada assy yang sama dengan header tidak ditampilkan
						                			if (dat[i].nama_line==dataline[ii].nama_line) {
						                				skip = true;
						                			}
						                		}
						                		if (skip==false) { 
					                				html +='<option value="'+dat[i].id+'">'+dat[i].nama_line+'</option>';
					                			}  
					                    	}  

											$('#pilihline').html(html);
											// $('#pilihasy1').html(html);
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
				                    url  : "<?php echo site_url(); ?>/Carline/delLC",
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
			});
				
				

				

		</script>

</body>

</html>