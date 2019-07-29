x<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Line Admin</title>

	
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
		<!-- Simple Datatable start -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
			<div class="clearfix mb-20"> 
				<div class="title pull-left">
					<h3>Data All Line</h3>
					<br>
				</div>
				<div class="pull-right">
    				<div class="row clearfix">  
    					<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_line-modal" style="margin-right: 15px; width: 190px"><span class="fa fa-plus"></span> Tambah</a>
    				</div>
  				</div> 
			</div>
			<table class="data-table stripe hover nowrap" id="mtbl_line">
				<thead>
					<tr>
						<th class="table-plus datatable-nosort">No</th>
						<th>Line</th> 
						<th>Aktif</th> 
						<th style="text-align: center;" class="datatable-nosort">Action</th>
					</tr>
				</thead>
				<tbody id="tbl_body">
					
				</tbody>
			</table>
		</div> 
	</div>
</div>


<div>
	<!-- new LIne -->
		<div class="modal fade" id="i_line-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	          <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	            <h2 class="text-center mb-30">Line Baru</h2> 
	            <form id="form_input_line"> 
					<div class="input-group custom input-group-lg">
						<label for="i_nama">Nama Line :</label>
						<input type="text" class="form-control" placeholder="Nama Line " id="i_nama" name="i_nama" required>
						<div class="valid-feedback"></div>
						
					</div> 
					<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_line_submit">Buat Line</a>
					<br>
	            </form> 
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
	              <h2 class="text-center mb-30">Edit Nama Line</h2> 
	              <form id="fom_updateline"> 
	             	<div class="input-group custom input-group-lg">
						<input type="text" class="form-control" placeholder="Nama Line " id="nama_update" name="nama_update">
						<div class="valid-feedback"></div>	
						<input type="hidden" class="form-control" placeholder="Line" name="id_updt" id="id_updt">
					</div> 
	                <div class="row">
	                  <div class="col-sm-12">
	                      <div class="input-group">
	                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_line">Update</a>
	                      </div>
	                  </div>
	                </div>
	              </form> 
	            </div>
	          </div>
	        </div>
	      </div>
	<!-- Confirmation modal -->
      <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body text-center font-18">
              <h4 class="padding-top-30 mb-30 weight-500">Anda Akan Hapus line?</h4>
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

	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>

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


			// ====  AUTOLOAD =====  
			loadDropdown();	
		 	showLine();


		 	// NEW LINE
		 		// create
		 		$( "#form_input_line" ).validate({
				  rules: {
				  	i_nama: {
				      required: true
				    }
				  }
				});
				$('#btn_line_submit').click(function(){
					// check is valid or not
	   				if (!$('#form_input_line').valid()) { 
	   					return;
	   				}

					var nama = document.getElementById("i_nama").value; 

					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/Line/newLine",
						dataType : "JSON",
						data : {
							nama_line:nama
						},
						beforeSend: function(){
	                		Swal.showLoading();
	                	},
						success : function(response){
							Swal.close();
							// Swal.hideLoading();	
							$('#i_line-modal').modal('hide');
							if(response.error){
								// alert('error');
							}else{
								// alert(response.status);
							}
							document.getElementById("form_input_line").reset();
						}
					});
					showLine();
				});
			// update 
				//get data for UPDATE record show prompt
		            $('#tbl_body').on('click','.item_edit',function(){ 
		                var idd = $(this).data('id');
		                var nama = $(this).data('nama');

		                // memasukkan data ke form updatean
						$('[name="id_updt"]').val(idd);
						$('[name="nama_update"]').val(nama); 

		                $('#updt_line_modal').modal('show'); 
		            });
		            $( "#fom_updateline" ).validate({
					  rules: {
					  	nama_update: {
					      required: true
					    }
					  }
					});
		            //UPDATE record to database (submit button) 
		            $('#btn_update_line').on('click',function(){
		            	if (!$('#fom_updateline').valid()) { 
		   					return;
		   				}
		                var idup = $('[name="id_updt"]').val();
						var namaup = $('[name="nama_update"]').val();
						
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
		                        // refresh
		                        showLine();
		                    }
		                });
		            });
		    // delete
				//get data for delete record show prompt
		            $('#tbl_body').on('click','.item_delete',function(){ 
		                var id = $(this).data('id');
		                // var tanggal = $(this).data('tanggal'); 
		               
		                $('[name="id_dc_delete"]').val(id);  
		                $('#confirmation-modal').modal('show');
		                // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";
		                   
		            });

		            //delete record to database 
		            $('#btn_del_line').on('click',function(){
		                var id_dc_delete = $('#id_dc_delete').val(); 

		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Line/delLine",
		                    dataType : "JSON",
		                    data : {id:id_dc_delete},
		                    success: function(){
		                        $('[name="id_dc_delete"]').val("");
		                        $('#confirmation-modal').modal('hide'); 
		                        
		                		showLine();
		                    }
		                });
		                return false;
		            });


			// SHOW
			function showLine() { 
				$("#mtbl_line").DataTable().destroy(); 
				$('#tbl_body').html('');

				$.ajax({
					async: true,
					type : 'ajax',
					url: '<?php  echo site_url('Line/getLineBasic') ?>',
					dataType: "JSON",
					success: function(data){   

						for (var i = 0; i < data.length; i++) { 
							var tr = $('<tr>').append(
										$('<td>').text((i+1)),
										$('<td>').text(data[i].nama_line), 
										$('<td>').html('Used <span class="badge badge-primary badge-pill">2</span>'),
										$('<td>').html(
											`<div class="dropdown" style="vertical-align: middle; text-align: center;">`+
                      							`<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">`+
                        						`<i class="fa fa-ellipsis-h"></i></a>`+
                        						`<div class="dropdown-menu dropdown-menu-right">`+ 
							                        `<a class="dropdown-item item_edit" href="#" data-id="`+data[i].id+`" data-nama="`+data[i].nama_line+`" ><i class="fa fa-pencil"></i> Edit </a>`+
							                        `<a class="dropdown-item item_delete" href="#"  data-id="`+data[i].id+`"><i class="fa fa-trash"></i> Hapus </a>`+ 
							                    `</div>`+
							                `</div>`
                        					)
									);
							tr.appendTo('#tbl_body');
						}    
						$('#mtbl_line').DataTable({
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
								searchPlaceholder: "Cari Line ?"
							},
						});
					}
				});
			}

		});
	</script>

</body>

</html>