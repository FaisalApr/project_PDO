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

	
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- Isi -->
		<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Regulasi Code Table</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Setting Kode</a></li>
									<li class="breadcrumb-item active" aria-current="page">Regulasi</li>
								</ol>
							</nav>
						</div>
					</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue" style="font-size: 50px">Regulasi Data Table</h5>
							
						</div>
					</div>

					<!-- start row -->
					<div class="row">
						<div class="card-body">
						<div class="pull-right">
							<!-- Button Tambah -->
							<div class="row clearfix">	
								<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" style="margin-right: 25px; width: 193px">
								<span class="fa fa-plus"></span> Tambah </a>
							</div>
								<!-- start modal -->
								<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h2 class="text-center mb-30">Kode Regulasi </h2>
												
												<form>
													
													<div class="input-group custom input-group-lg">
														<input type="text" class="form-control" placeholder="Kode Regulasi" id="i_regulasi_code">
														<div class="input-group-append custom">
															<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
														</div>
													</div>
										
													
													
													<div class="row">
														<div class="col-sm-12">
															<div class="input-group">
																<!--
																	use code for form submit
																	<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
																-->
																<a class="btn btn-primary btn-lg btn-block " id="btn_submit" href="index.php">Submit</a>
															</div>
														</div>
													</div>
												
												</form>
											
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>	
						
						<!-- simple data table start -->
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort" width="33%">No</th>
									<th width="33%">Ket Regulasi</th>
									<th width="33%" class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td class="table-plus">1</td>
									
									<td>aries</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="fa fa-eye"></i> Lihat</a>
												<a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Hapus</a>
											</div>
										</div>
									</td>
								</tr>
								
							</tbody>
						</table>

	</div>
</div>

<!-- Script Start -->
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
			
			// show();    
   //          function show(){

   //                  $.ajax({
   //                      async :false,
   //                      type  : 'ajax',
   //                      url   : '<?php echo base_url();?>index.php/DefectCode/getDefectCode',
   //                      dataType : 'json',
   //                      success : function(data){
   //                          var html = '';
   //                          var i;

   //                          for(i=0; i<data.length; i++){
   //                              html += 

   //                              '<tr>'+
			// 						'<td class="table-plus">'+(i+1)+'</td>'+
			// 						'<td>'+ data[i].code+'</td>'+
			// 						'<td>'+data[i].keterangan+'</td>'+
			// 						'<td>'+
			// 							'<div class="dropdown">'+
			// 								'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
			// 									'<i class="fa fa-ellipsis-h"></i>'+
			// 								'</a>'+											
			// 								'<div class="dropdown-menu dropdown-menu-right">'+
			// 									'<a class="dropdown-item item_edit" href="#"><i class="fa fa-pencil"></i> Edit </a>'+
			// 									'<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
			// 								'</div>'+
			// 							'</div>'+
			// 						'</td>'+
			// 					'</tr>';    
   //                          }
   //                          $('#tbl_body').html(html);    
   //                          // $(".table").DataTable({
   //                          //     "lengthMenu": [[5,10,15,25,-1],[5,10,15,25,"Semua"]]
   //                          // });             
   //                      }
   //                  });

                $('#btn_submit').click(function(){
					var regulasi_code = document.getElementById("i_code").value;
					
					// alert(def_code+","+def_ket);

					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/DefectCode/newDefectCode",
						dataType : "JSON",
						data : {
							def_code:def_code,
							def_ket:def_ket
						},
						success : function(response){
								  $('#login-modal').modal('hide');
							if(response.error){
								// alert('error');
							}else{
								// alert(response.status);
							}

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

            }


		});
	</script>



</body>

</html>