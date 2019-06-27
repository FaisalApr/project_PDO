<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
	
	
</head>
<body>
	<input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>"> 
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Assembly Code Table</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Setting Kode</a></li>
									<li class="breadcrumb-item active" aria-current="page">Assy</li>
								</ol>
							</nav>
						</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue" style="font-size: 50px">Assembly Data Table</h5>
							<!-- <p class="font-14">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
						</div>
					</div>
					<div class="row">
						<div class="card-body">

							<div class="pull-right">
						<div class="row clearfix">	
								<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" style="margin-right: 25px; width: 193px">
									<span class="fa fa-plus"></span> Tambah </a>
								</div>
							<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<!-- <img src="vendors/images/login-img.png" alt="login" class="login-img"> -->

											<h2 class="text-center mb-30">Assembly Code</h2>
											<form id="form_assy">

												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="Assy Code" id="i_code" required>
													
													<div class="valid-feedback"></div>
    												<div class="invalid-feedback"><small id="kodeHelp" class="form-text text-muted">Kode Assy Harus di isi</small></div>
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
													</div>
												</div>
												
												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="UMH" id="i_umh" required>
													<small id="kodeHelp" class="form-text text-muted">UMH Harus di isi</small>
													<div class="input-group-append custom">

														<span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<!--
																use code for form submit
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
															-->
															<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit">Submit</a>
														</div>
													</div>
												</div>
											
											</form>
										</div>
									</div>
								</div>
							</div>

							<!-- update modal -->
							

							<div class="modal fade" id="Modal_upd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<!-- <img src="vendors/images/login-img.png" alt="login" class="login-img"> -->

											<h2 class="text-center mb-30">Assembly Code</h2>
											<form id="formupdate">
												<div class="input-group custom input-group-lg">
													
													<input type="text" class="form-control" placeholder="Assy Code" name="kodeupdt" id="kodeupdt">
													<input type="hidden" class="form-control" placeholder="Assy Code" name="id_k" id="id_k">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
													</div>
												</div>
												
												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="UMH" id="umhupdt" name="umhupdt">
													<div class="input-group-append custom">

														<span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<!--
																use code for form submit
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
															-->
															<a id="btn_update" type="submit" class="btn btn-primary btn-lg btn-block" href="#" >Update</a>
														</div>
													</div>
												</div>
											
											</form>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div></div>

						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">No</th>
									<th>Assy Code</th>
									<th>UMH</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_body">
								
							</tbody>
						</table>

					
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
						</div>					


	</div>
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
			
			show();    
            function show(){
                    $.ajax({
                        async :false,
                        type  : 'ajax',
                        url   : '<?php echo base_url();?>index.php/AssyCode/getAssyCode',
                        dataType : 'JSON',
                        success : function(data){
                            var html = '';
                            var i;

                            for(i=0; i<data.length; i++){
                                html += 

                                '<tr>'+
									'<td class="table-plus">'+(i+1)+'</td>'+
									'<td>'+ data[i].kode_assy+'</td>'+
									'<td>'+data[i].umh+'</td>'+
									'<td>'+
										'<div class="dropdown">'+
											'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
												'<i class="fa fa-ellipsis-h"></i>'+
											'</a>'+											
											'<div class="dropdown-menu dropdown-menu-right">'+
												'<a class="dropdown-item item_edit" href="#" data-id="'+data[i].id+'" data-kode_assy="'+data[i].kode_assy+'" data-umh="'+data[i].umh+'" ><i class="fa fa-pencil"></i> Edit </a>'+
												'<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
											'</div>'+
										'</div>'+
									'</td>'+
								'</tr>';    
                            }
                            $('#tbl_body').html(html);    
                            
                        }
                    });

            }



			$('#btn_submit').click(function(){

				var def_code = document.getElementById("i_code").value;
				var def_umh = document.getElementById("i_umh").value;
				// alert(def_code+","+def_ket);

				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo base_url() ?>index.php/Assycode/newAssyCode",
					dataType : "JSON",
					data : {
						def_code:def_code,
						def_umh:def_umh
					},
					success : function(response){
							  $('#login-modal').modal('hide');
						if(response.error){
							// alert('error');
						}else{
							// alert(response.status);
						}
						document.getElementById("form_assy").reset();
					}
				});
				show();
			});

			


			$('.data-table').DataTable({
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
                    url  : "<?php echo site_url(); ?>/AssyCode/delAssyCode",
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
			 //   ========================  END DELETE RECORD ====================================




			 //  ===================  START UPDATE Record ===============================================
            //get data for UPDATE record show prompt
            $('#tbl_body').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var idd = $(this).data('id');
                var kode = $(this).data('kode_assy'); 
                var umh = $(this).data('umh');

                // memasukkan data ke form updatean
				$('[name="id_k"]').val(idd);
				$('[name="kodeupdt"]').val(kode);
				$('[name="umhupdt"]').val(umh);
				
				// // data dropdown
				// for(var i=0; i < document.getElementById('levelup').options.length; i++){
				//     if(document.getElementById('levelup').options[i].value == level) {
				//       document.getElementById('levelup').selectedIndex = i;
				//       break;
				//     }
				//  }
				// $('[name="level"]').val(level);

                $('#Modal_upd').modal('show');
                
            });
            
            //UPDATE record to database (submit button)

            $('#btn_update').on('click',function(){
                var idkode = $('[name="id_k"]').val();
				var kodeup = $('[name="kodeupdt"]').val();
				var umhup = $('[name="umhupdt"]').val();
				
				// alert(umhup);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Assycode/updateAssyCode",
                    dataType : "JSON",
                    data : { 
                    		id:idkode,
                    		kode_assy:kodeup,
                    		umh:umhup},

                    success: function(data){
                    	$('#Modal_upd').modal('hide'); 
                        // refresh();
                        show();
                    }
                });

                

            });
 			//   ========================  END UPDATE RECORD ====================================



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



		});
	</script>

</body>

</html>