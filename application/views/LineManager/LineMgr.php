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

<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			

		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="title">
					<h4>Assy per Line Table</h4>
					<br>
				</div>
			</div>
		</div>
		
		<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">


						<div class="pull-right">
            				<div class="row clearfix">  
            					<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_absen-modal" style="margin-right: 15px; width: 190px"><span class="fa fa-plus"></span> Tambah</a>
            				</div>
          				</div>

						<div class="pull-left">

							<h5 class="text-blue"></h5>
						</div>
					</div>
							<div class="row">
								<table class="data-table stripe hover nowrap" id="t_user">
									<thead>
										<tr>
											<th class="table-plus datatable-nosort">No</th>
											<th>Line</th>
											<th>Kode Assy</th>
											<th class="datatable-nosort">Action</th>
										</tr>
									</thead>
									<tbody id="tbl_body">
										
									</tbody>
								</table>
							</div>
				</div>
				<!-- Simple Datatable End -->

	<!-- kumpulan modal -->
		<!-- modal input -->
	        <div class="modal fade" id="i_absen-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Absen Pegawai</h2>
	                <!-- form start -->
	                <form id="form_absen_pegawai">
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
	                    <input type="text" class="form-control" placeholder="ITEM" id="i_item">
	                    
	                    <div class="input-group-append custom">
	                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
	                    </div>
	                  </div>
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
	                    <input type="text" class="form-control" placeholder="QTY MP" id="i_qty">
	                    <div class="input-group-append custom">
	                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
	                    </div>
	                  </div>
	                  <!-- input -->
	                  <div class="input-group custom input-group-lg">
	                    <input type="text" class="form-control" placeholder="JAM" id="i_jam">
	                    <div class="input-group-append custom">
	                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
	                    </div>
	                  </div>
	                  
	                  <!-- button submit -->
	                  <div class="row">
	                    <div class="col-sm-12">
	                        <div class="input-group">
	                          <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit">Submit</a>
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
		      <div class="modal fade" id="updt_absen_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		        <div class="modal-dialog modal-dialog-centered">
		          <div class="modal-content">
		            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
		              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		              <h2 class="text-center mb-30">Absen Pegawai</h2>
		              <!-- form start -->
		              <form id="form_updt_absen_pegawai">
		                <!-- input -->
		                <div class="input-group custom input-group-lg">
		                  <input type="text" class="form-control" placeholder="ITEM" id="item_update" name="item_updt">
		                  <input type="hidden" class="form-control" placeholder="ID" name="id_updt" id="id_update">
		                  <div class="input-group-append custom">
		                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
		                  </div>
		                </div>
		                <!-- input -->
		                <div class="input-group custom input-group-lg">
		                  <input type="text" class="form-control" placeholder="QTY MP" id="qty_update" name="qty_updt">
		                  <div class="input-group-append custom">
		                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
		                  </div>
		                </div>
		                <!-- input -->
		                <div class="input-group custom input-group-lg">
		                  <input type="text" class="form-control" placeholder="JAM" id="jam_update" name="jam_updt">
		                  <div class="input-group-append custom">
		                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
		                  </div>
		                </div>
		                
		                <!-- button submit -->
		                <div class="row">
		                  <div class="col-sm-12">
		                      <div class="input-group">
		                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_absen">Update</a>
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

	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
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
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		
			show();    
		        function show(){
		          $.ajax({
		            async :false,
		            type  : 'ajax',
		            url   : '<?php echo base_url();?>index.php/LineManager/getUser',
		            dataType : 'JSON',
		            success : function(data){
		            var html = '';
		            var i;
		            var a=0;
		            // var data = data_lm.data_lm;
		            for(i=0; i<data.length; i++){
		              html += 

		              '<tr>'+
		                '<th >'+(i+1)+'</th>'+
		                '<th>'+data[i].nama_line+'</th>'+
		                '<th>'+data[i].kode_assy+'</th>'+
		                '<th>'+
		                  '<div class="dropdown">'+
		                      '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
		                        '<i class="fa fa-ellipsis-h"></i>'+
		                      '</a>'+                     
		                      '<div class="dropdown-menu dropdown-menu-right">'+
		                        '<a class="dropdown-item item_edit_absen" href="#"><i class="fa fa-pencil"></i> Edit </a>'+
		                        '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
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
			


		});
	</script>

</body>

</html>