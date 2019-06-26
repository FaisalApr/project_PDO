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

	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<input type="hidden" id="id_pdo" value="<?php echo $pdo->id ?>">
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- top icon dasboard -->
		<div class="row clearfix progress-box">
			
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Jam Effective</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="46" id="id_jam_efff"></font>jam</span>
							</center>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Prosentase Losstime</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="46" id="id_prcent_loss"></font>%</span>
							</center>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Total Losstime</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-10 align-content-center weight-800"><font size="56">56</font></span>
							<span class="col-sm-2 align-content-center weight-800"><font size="10">jam</font></span>
						</center>	
					</div> 
				</div>
			</div>
			
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Total Exclude</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-10 align-content-center weight-800"><font size="56">56</font></span>
							<span class="col-sm-2 align-content-center weight-800"><font size="10">jam</font></span>
						</center>	
					</div> 
				</div>
			</div>

		</div>
			<!-- end of top icon dashboard -->

		<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Downtime</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Downtime</a></li>
									<li class="breadcrumb-item active" aria-current="page">Downtime Table</li>
								</ol>
							</nav>
						</div>
				</div>

				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue" style="font-size: 40px">Downtime Data Table</h5>
						</div>
					</div>
					<div class="row">
						<div class="card-body">

							<div class="pull-right">
						<div class="row clearfix">	
								<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" style="margin-right: 25px; width: 193px">
									<span class="fa fa-plus"></span> Tambah </a>
								</div>
							
							<!-- input modal -->
							<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h2 class="text-center mb-30">Downtime</h2>
											<form id="form_losstime">
												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="levelupp" id="i_jam">
														<option disabled selected> Jam ke</option>
																<?php foreach ($data_oc as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>


												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="levelupp" id="i_problem">
														<option disabled selected> Problem</option>
																<?php foreach ($data_error as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>

												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="KETERANGAN" id="i_ket">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
													</div>
												</div>

												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="levelupp" id="i_jenis">
														<option disabled selected> Pilih Jenis Downtime</option>
																<?php foreach ($data_losttime as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>

												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="Time" id="i_time">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
													</div>
												</div>
													
												<br>
												
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<!--
																use code for form submit
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
															-->
															<a class="btn btn-primary btn-lg btn-block" id="btn_submit" href="#">Submit</a>
														</div>
													</div>
												</div>
											
											</form>
										</div>
									</div>
								</div>
							</div>
							</div></div></div>
							

							


						<table id="t_user" class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Jam ke</th>
									<th>Code</th>
									<th>problem</th>
									<th>Jenis</th>
									<th>Keterangan</th>
									<th>Time</th>
									
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody id="tbl_body">
								<tr>
									<td class="table-plus">1</td>
									<td>1A</td>
									<td>Sagittarius</td>
									<td>rusak</td>
									<td>Exclude</td>
									<td>3 menit</td>
									
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
</div></div></div></div></div>

							<!-- update modal -->
							<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h2 class="text-center mb-30">Downtime</h2>
											<form id="form_losstime_updt">
												<div class="input-group custom input-group-lg">
													<input type="hidden" class="form-control" placeholder="Assy Code" name="id_updt" id="id_update">
													<select class="custom-select col-12" name="jam_updt" id="jam_update">
														<option disabled selected> Jam ke</option>
																<?php foreach ($data_oc as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
																<?php }  ?>
															
													</select>
												</div>


												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="problem_updt" id="problem_update">
														<option disabled selected> Problem</option>
																<?php foreach ($data_error as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>

												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="KETERANGAN" name="ket_updt" id="ket_update">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
													</div>
												</div>

												<div class="input-group custom input-group-lg">
													<select class="custom-select col-12" name="jenis_updt" id="jenis_update">
														<option disabled selected> Pilih Jenis Downtime</option>
																<?php foreach ($data_losttime as $key) { ?>
																	<option value="<?php  echo $key->id ?>"> <?php  echo $key->keterangan ?> </option>
																<?php }  ?>
															</select>
													</select>
												</div>

												<div class="input-group custom input-group-lg">
													<input type="text" class="form-control" placeholder="Time" name="time_updt" id="time_update">
													<div class="input-group-append custom">
														<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
													</div>
												</div>
													
												<br>
												
												<div class="row">
													<div class="col-sm-12">
														<div class="input-group">
															<!--
																use code for form submit
																<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
															-->
															<a class="btn btn-primary btn-lg btn-block" id="btn_update" href="#">Update</a>
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
			


			// =================== Read Record ===============================================
			show();    
            function show(){
                    $.ajax({
                        async :false,
                        type  : 'POST',
                        url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
                        dataType : 'json',
                        data : {id_pdo:$('#id_pdo').val()},
                        success : function(respon){
                            var html = '';
                            var i;
                            var data = respon.data_downtime;
                            var widget = respon.widgettt;

                            for(i=0; i<data.length; i++){
                                html += 

                                '<tr>'+
									'<td class="table-plus">'+data[i].jam_ke+'</td>'+
									'<td>'+ data[i].kode+'</td>'+
									'<td>'+data[i].problem+'</td>'+
									'<td>'+data[i].jenis+'</td>'+
									'<td>'+data[i].keterangan+'</td>'+
									'<td>'+data[i].durasi+'</td>'+
									'<td>'+
										'<div class="dropdown">'+
											'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
												'<i class="fa fa-ellipsis-h"></i>'+
											'</a>'+											
											'<div class="dropdown-menu dropdown-menu-right">'+
												'<a class="dropdown-item item_edit" href="#" data-id ="'+data[i].id+'" data-id_pdo="'+data[i].id_pdo+'" data-id_error="'+data[i].id_error+'" data-id_oc="'+data[i].id_oc+'" data-id_jenisloss="'+data[i]. id_jenisloss+'" data-keterangan="'+data[i].keterangan+'" data-durasi="'+data[i].durasi+'"><i class="fa fa-pencil"></i> Edit </a>'+
												'<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
											'</div>'+
										'</div>'+
									'</td>'+
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
 
                            // setting WIdget
							document.getElementById('id_jam_efff').innerHTML= parseFloat(widget[0].jam_iff).toFixed(1);
							document.getElementById('id_prcent_loss').innerHTML= parseFloat(widget[0].losspercent).toFixed(2);
                        }
                    });


            }
            // =================== End Read Record ============================================

            

            // =================== Create Record ===============================================
   			$('#btn_submit').click(function(){



				var down_jam = document.getElementById("i_jam").value;
				var down_problem = document.getElementById("i_problem").value;
				var down_ket = document.getElementById("i_ket").value;
				var down_jenis = document.getElementById("i_jenis").value;
				var down_time = document.getElementById("i_time").value;

				// alert(down_jam+","+down_problem+","+down_ket+","+down_jenis+","+down_time);
				// alert($('#id_pdo').val());


				$.ajax({
					async : false,
					type : "POST",
					url : "<?php echo base_url() ?>index.php/Losstime/newLosstime",
				
					dataType : "JSON",
					data : {
						down_id_pdo:$('#id_pdo').val(),
						down_id_error:down_problem,
						down_id_oc:down_jam,
						down_id_jenisloss:down_jenis,
						down_ket:down_ket,
						down_durasi:down_time
					},
					success : function(response){
							  $('#login-modal').modal('hide');
						if(response.error){
							// alert('error');
						}else{
							// alert(response.status);
						}
						document.getElementById("form_losstime").reset();
					}
				});
				show();
			});
			// =================== End Create Record ===============================================

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
                    url  : "<?php echo site_url(); ?>/Losstime/delLosstime",
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
                var id = $(this).data('id');
                var id_error = $(this).data('id_error');
                var id_oc = $(this).data('id_oc');
                var id_jenisloss = $(this).data('id_jenisloss');
                var keterangan = $(this).data('keterangan');
                var durasi = $(this).data('durasi');

                // memasukkan data ke form updatean
				$('[name="id_updt"]').val(id);
				$('[name="problem_updt"]').val(id_error);
				$('[name="jam_updt"]').val(id_oc);
				$('[name="jenis_updt"]').val(id_jenisloss);
				$('[name="ket_updt"]').val(keterangan);
				$('[name="time_updt"]').val(durasi);



                $('#update_modal').modal('show');
                
            });
            
            //UPDATE record to database (submit button)

            $('#btn_update').on('click',function(){
                var idup = $('[name="id_updt"]').val();
                var iderrorup = $('[name="problem_updt"]').val();
                var idocup = $('[name="jam_updt"]').val();
                var idjenislossup = $('[name="jenis_updt"]').val();
                var ketup = $('[name="ket_updt"]').val();
                var durasiup = $('[name="time_updt"]').val();

				// alert(umhup);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/Losstime/updateLosstime",
                    dataType : "JSON",
                    data : { 

                    		id:idup,
                    		id_error:iderrorup,
                    		id_oc:idocup,
                    		id_jenisloss:idjenislossup,
                    		keterangan:ketup,
                    		durasi:durasiup
                    	},

                    success: function(data){
                    	$('#update_modal').modal('hide'); 
                        // refresh();
                        show();
                    }
                });
              });




			 // ========================  END UPDATE RECORD ====================================
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