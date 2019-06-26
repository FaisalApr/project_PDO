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
	 
</head>
<body>  
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>


<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-5-p height-100-p xs-pd-5-10">
		<!-- Top Widget -->
		<div class="row clearfix progress-box">
			 <div class="col-lg-2 col-md-4 col-sm-12 mb-30">
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

			 <div class="col-lg-2 col-md-4 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-orange text-white">
								<i class="icon-copy fa fa-sun-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-orange weight-500 font-24" id="tot_a"></span>
							<p class="weight-400 font-18">Shift A Total</p>
						</div>
					</div> 
				</div>
			 </div>

			 <div class="col-lg-2 col-md-4 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-dark text-white">
								<i class="icon-copy fa fa-moon-o" aria-hidden="true"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-dark weight-500 font-24" id="tot_b"></span>
							<p class="weight-400 font-18">Shift B Total</p>
						</div>
					</div> 
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
							<th class="table-plus datatable-nosort">Username</th>
							<th>Password</th>
							<th>Shift</th>
							<th>Line</th>
							<th>Status</th> 
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
</div>

<!-- START KUMPULAN MODAL --> 
<div>
	
	<!-- START MODAL NEW USER -->
	<div class="modal fade bs-example-modal-md" id="modal_new_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100">User Baru</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="fom_addusr"> 
						<div class="form-group" id="fom_iusername">
							<label class="form-control-label">Username</label>
							<input id="i_user" type="text" class="form-control">
							<div id="tipsss" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
						</div>

						<div class="form-group">
							<label class="form-control-label">Password</label>
							<input id="i_pass" type="Password" class="form-control"> 
						</div>

						<div class="form-group ">
							<label class="form-control-label">Shift</label>
							<select class="selectpicker form-control" name="i_shift" data-style="btn-outline-secondary">
								<option value="1" selected="">A (Siang)</option>
								<option value="2">B (Malam)</option> 
							</select>
						</div>

						<div class="form-group ">
							<label class="form-control-label">Line</label>
							<select class="custom-select2 form-control" name="i_line" style="width: 100%; height: 38px;">
								<option disabled selected>Pilih Line</option>
								<?php foreach ($line as $key) { ?>
								<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama_line ?> </option>
							<?php }  ?>
							</select>
						</div>

						<br>
						<center>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" id="btn_submit_newusr">Tambahkan</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END MODAL NEW USER -->

	<!-- START MODAL EDIT USER -->
	<div class="modal fade bs-example-modal-md" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100">EDIT USER</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form id="fom_editusr"> 
						<div class="form-group" id="fom_iusername">
							<label class="form-control-label">Username</label>
							<input id="ie_user" type="text" class="form-control">
							<div id="tipsss" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
						</div>

						<div class="form-group">
							<label class="form-control-label">Password</label>
							<input id="ie_pass" type="Password" class="form-control"> 
						</div>

						<div class="form-group ">
							<label class="form-control-label">Shift</label>
							<select class="selectpicker form-control" id="ie_shift" name="ie_shift" data-style="btn-outline-secondary">
								<option disabled selected>Pilih Shift</option>
								<option value="1">A (Siang)</option>
								<option value="2">B (Malam)</option> 
							</select>
							<input type="hidden" id="iet_shift">
						</div>

						<div class="form-group ">
							<label class="form-control-label">Line</label>
							<select class="custom-select2 form-control" id="ie_line" name="ie_line" style="width: 100%; height: 38px;">
								<option disabled selected>Pilih Line</option>
								<?php foreach ($line as $key) { ?>
								<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama_line ?> </option>
							<?php }  ?>
							</select>
							<input type="hidden" id="iet_line">
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

	<script> 
		$('document').ready(function(){

 			// show autoload
 			show();
			function show() {
				$.ajax({
					async: true,
					type : 'ajax',
					url: '<?php  echo site_url('Users/showUser') ?>',
					dataType: "JSON",
					success: function(response){
						var html='';

						var data = response['all'];
						var aa = response['aa'];
						var bb = response['bb'];

						document.getElementById('u_tot').innerHTML = data.length;
						document.getElementById('tot_a').innerHTML = aa.length;
						document.getElementById('tot_b').innerHTML = bb.length;

						// user tabel update proses
						for (var i = 0; i < data.length; i++) { 
						html +=
							'<tr>'+
								'<td class="table-plus">'+data[i].username+'</td><td>';
								for (var io = 0; io < data[i].password.toString().length; io++) {
									html+='*';
								}
							html+=
								'</td><td>'+data[i].keterangan+'</td>'+
								'<td>'+data[i].nama_line+'</td>';
								if (data[i].active==1) {
									html+='<td><span class="badge badge-success">active</span></td>';
								}else{
									html+='<td><span class="badge badge-danger">Inactive</span></td>';
								}
							html+=
								'<td>'+
									'<div class="dropdown">'+
										'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
											'<i class="fa fa-ellipsis-h"></i>'+
										'</a>'+
										'<div class="dropdown-menu dropdown-menu-right">'+
											'<a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>'+
											'<a class="dropdown-item item_edit" data-idu="'+data[i].id+'" data-uname="'+data[i].username+'" data-pass="'+data[i].password+'" data-sif="'+data[i].id_shift+'" data-line="'+data[i].id_line+'" href="#"><i class="fa fa-pencil"></i> Edit</a>'+
											'<a class="dropdown-item item_delete"  data-idu="'+data[i].id+'" data-uname="'+data[i].username+'" href="#"><i class="fa fa-trash"></i> Delete</a>'+
										'</div>'+
									'</div>'+
								'</td>'+
							'</tr>';

						}
						$("#t_user").DataTable().destroy();
						$('#body_user').html(html);   
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
 				$('#modal_new_user').modal('show');
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
 			// =====   END USER  ==============

 			// username checked availabe
 			document.getElementById("i_user").onchange = function() {myFunction()};
			function myFunction() {
				var uname = $('#i_user').val();
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
 							document.getElementById("i_user").classList.remove("form-control-danger");
 							document.getElementById("i_user").classList.add("form-control-success"); 
 							document.getElementById("tipsss").style.display= 'none';
 						}else{
 							document.getElementById("i_user").classList.remove("form-control-success");
 							document.getElementById("i_user").classList.add("form-control-danger");
 							document.getElementById("fom_iusername").classList.add("has-danger");
 							document.getElementById("tipsss").style.display= 'block';
 						}
 					}

 				});
			}
 			
			// =====   START EDIT USER  ==============
			$('#t_user').on('click','.item_edit',function(){
				// memasukkan data dari row terpilih kedalam id inputa di modal
				$('#id_u').val( $(this).data('idu') );
				$('#ie_user').val( $(this).data('uname') );
 				$('#ie_pass').val( $(this).data('pass') );
 				$('#iet_shift').val( $(this).data('sif') );
 				$('#iet_line').val( $(this).data('line') );
 

 				$('#modal_edit_user').modal('show');
 
			}); 
			$('#btn_submit_updateusr').click(function(){
				// get data from modal update
				var idu = $('#id_u').val();
				var uname = $('#ie_user').val();
				var pass = $('#ie_pass').val();
				// old dropdown
				var ido_shift = $('#iet_shift').val();
				var ido_line = $('#iet_line').val(); 
				// new drop
				var sif = $('select[name=ie_shift]').val();
				var ln = $('select[name=ie_line]').val();

 				// jika dro[down berubah]
 				if (sif!=null) {
 					ido_shift = $('select[name=ie_shift]').val();
 				}
 				if (ln!=null) {
 					ido_line = $('select[name=ie_line]').val();
 				} 

					$.ajax({
	 					async: false,
	 					type: 'POST',
	 					url: '<?php echo site_url("Users/updateUser") ?>',
	 					dataType: "JSON",
	 					data:{
	 						idu: idu,
	 						uname: uname,
	 						pass: pass,
	 						sif: ido_shift,
	 						ln: ido_line
	 					},
	 					success: function(data){

	 						if (data) { 
	 							Swal.fire({ 
								  type: 'success',
								  title: 'Berhasil Update Data', 
								})
	 							document.getElementById('fom_editusr').reset();
	 							$('#modal_edit_user').modal('hide');
	 							show(); 
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
			// =====   END EDIT USER  ==============

			// ===== START DELETE ======
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

 						if (data) { 
 							Swal.fire({ 
							  type: 'success',
							  title: 'Berhasil Delete Akun',
							  timer: 1000 
							}) 
 							$('#confirmation-modal').modal('hide');
 							show(); 
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
			// ===== END DELETE ======
		});
	</script>
</html>