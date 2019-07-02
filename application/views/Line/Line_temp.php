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

</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- BODY CONTAINER --> 
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> 
			<div class="pull-left">
				<h5 class="text-blue" style="font-size: 46px">Line Data Table</h5> 	
			</div>
			<div class="pull-right">
				<div class="row clearfix">	
					<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
				</div>
			</div>
			<br><br><br>

			<!-- TABEL -->
			<table class="data-table stripe hover nowrap">
				<thead>
					<tr>
						<th style="vertical-align: middle; text-align: center;" class="table-plus datatable-nosort">No</th>
						
						<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">UMH</th>
						<th style="vertical-align: middle; text-align: center;" class="datatable-nosort">Action</th>
					</tr>
				</thead>
				<tbody id="tbl_body">
					
				</tbody>
			</table>
			
		</div>



	<!-- kumpulan modal -->
		<!-- modal input -->
	        <div class="modal fade" id="i_line-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Assy per Line</h2>
	                <!-- form start -->
	                <form id="form_input_line">
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="i_line" id="i_line">
								<option disabled selected> Pilih Line</option>
									<?php foreach ($data_line as $key) { ?>
										<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama_line ?> </option>
									<?php }  ?>
							</select>
						  </div>
						</div>
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="i_assy" id="i_assy">
								<option disabled selected> Pilih Assy</option>
										<?php foreach ($data_assy as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->kode_assy ?> </option>
										<?php }  ?>
							</select>
						  </div>
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
		              <h2 class="text-center mb-30">Update Line / Assy</h2>
		              <!-- form start -->
		              <form id="form_updt_absen_pegawai">
		               <!-- input -->
	                  <div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="id_line_updt" id="id_line_update">
								<option disabled selected> Pilih Line</option>
									<?php foreach ($data_line as $key) { ?>
										<option value="<?php  echo $key->id ?>"> <?php  echo $key->nama_line ?> </option>
									<?php }  ?>
							</select>
							 <input type="hidden" name="id_updt" id="id_update" class="form-control">
						  </div>
						</div>
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
						  <div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="id_assy_updt" id="id_assy_update">
								<option disabled selected> Pilih Assy</option>
										<?php foreach ($data_assy as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->kode_assy ?> </option>
										<?php }  ?>
							</select>
						  </div>
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

	</div>
</div>

<!-- grup script -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
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