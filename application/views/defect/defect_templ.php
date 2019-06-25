<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Site Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
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
		
		<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Defect Table</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Defect</a></li>
									<li class="breadcrumb-item active" aria-current="page">Defect Table</li>
								</ol>
							</nav>
						</div>
						
				</div>
				
				<!-- top icon dasboard -->
		<div class="row clearfix progress-box">

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Total</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56">0</font></span>
						</center>	
					</div> 
				</div>
			</div>
			
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">DPM</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56">0</font></span>
						</center>	
					</div> 
				</div>
			</div>

		</div>	


				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue" style="font-size: 50px">Defect Data Table</h5>
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

											<h2 class="text-center mb-30">Defect</h2>
											<form>
												<div class="input-group custom input-group-lg">
												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="levelupp" id="i_jam">
														<option disabled selected> Pilih Jam ke</option>
																<?php foreach ($pdo as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
													</div>
												</div>

												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="levelup" id="i_select">
														<option disabled selected> Pilih Jenis Defect</option>
																<?php foreach ($defect as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->code .'('.$key->keterangan.')' ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>

												<div class="input-group custom input-group-lg">
													<input id="i_ket" type="text" class="form-control" placeholder="Keterangan">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
													</div>
												</div>
												
												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="Total" id="i_total">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-database" aria-hidden="true"></i></span>
													</div>
												</div>

												
												
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<!--
																use code for form submit
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
															-->
															<a id="btn_submit" class="btn btn-primary btn-lg btn-block" href="#">Submit</a>
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
									<th class="table-plus datatable-nosort">Jam ke</th>
									<th>Item</th>
									<th>Keterangan</th>
									<th>Total</th>
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_body">

								
								
							</tbody>
						</table>

					
					


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

			show();    
            function show(){
                    $.ajax({
                        async :false,
                        type  : 'ajax',
                        url   : '<?php echo base_url();?>index.php/Defect/getDefects',
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;

                            for(i=0; i<data.length; i++){
                                html += 



                                '<tr>'+
									'<td class="table-plus">'+(i+1)+'</td>'+
									'<td>'+ data[i].code+'</td>'+
									'<td>'+data[i].keterangan+'</td>'+
									'<td>'+
										'<div class="dropdown">'+
											'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
												'<i class="fa fa-ellipsis-h"></i>'+
											'</a>'+											
											'<div class="dropdown-menu dropdown-menu-right">'+
												'<a class="dropdown-item item_edit" href="#" data-id ="'+data[i].id+'" data-kode_defect="'+data[i].code+'" data-keterangan ="'+data[i].keterangan+'"><i class="fa fa-pencil"></i> Edit </a>'+
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

				var def_jam = document.getElementById("i_jam").value;
				var def_ket = document.getElementById("i_ket").value;
				var def_total = document.getElementById("i_total").value;
				var levelupp = $('select[name=levelupp]').val()
				var levelup = $('select[name=levelup]').val()
				alert(def_jam+","+def_ket+","+def_total+","+levelup+","+levelupp);

				// $.ajax({
				// 	async : false,
				// 	type : "POST",
				// 	url : "<?php echo base_url() ?>index.php/Defect/newDefect",
				
				// 	dataType : "JSON",
				// 	data : {
				// 		def_code:def_code,
				// 		def_ket:def_ket
				// 	},
				// 	success : function(response){
				// 			  $('#login-modal').modal('hide');
				// 		if(response.error){
				// 			// alert('error');
				// 		}else{
				// 			// alert(response.status);
				// 		}
				// 		document.getElementById("form_Dcode").reset();
				// 	}
				// });
				// show();
			});


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