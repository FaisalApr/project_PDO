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
					<div class="pull-left">
						<h5 class="text-blue" style="font-size: 50px">Error Codes Data Table</h5>
						
					</div>
				</div>
 
				<div class="pull-right" style="margin-right: 25px; margin-top: -50px;">
					<a href="#" class="btn btn-success" data-toggle="modal" data-target="#login-modal" style="width: 193px">
						<span class="fa fa-plus"></span> Tambah </a>
				</div> 	 
				<br>
				<!-- simple data table start -->
				<table class="data-table stripe hover nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort" >No</th>
							<th>Kode</th>
							<th>Keterangan Error</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody id="tbl_body"> 

					</tbody>
				</table>
			</div>
	</div>
</div>

<!-- start modal -->
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h2 class="text-center mb-30">Error Code</h2>
					
					<form id="form_errorCode">
						
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Kode" id="i_code" name="i_code">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
							</div>
						</div>

						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Keterangan Error" id="i_ket" name="i_ket">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
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
				<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<!-- <img src="vendors/images/login-img.png" alt="login" class="login-img"> -->

					<h2 class="text-center mb-30">Edit Error Code</h2>
					<form id="formupdate_err">
						<div class="input-group custom input-group-lg">
							
							<input type="text" class="form-control" placeholder="Defect Code" name="kodeupdt" id="kodeupdt">
							<input type="hidden" class="form-control" placeholder="Defect Code" name="id_k" id="id_k">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
							</div>
						</div>
						
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Keterangan" id="keterangan_name" name="keterangan_name">
							<div class="input-group-append custom"> 
								<span class="input-group-text"><i class="fa fa-info" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group"> 
									<a id="btn_update"  class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit">Update</a>
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
			
			// ====  AUTOLOAD =====  
			loadDropdown();
			show();


            function show(){
                    $.ajax({
                        async :false,
                        type  : 'ajax',
                        url   : '<?php echo base_url();?>index.php/ErrCode/getErrorCode',
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;

                            for(i=0; i<data.length; i++){
                                html += 

                                '<tr>'+
									'<td class="table-plus">'+(i+1)+'</td>'+
									'<td>'+ data[i].kode+'</td>'+
									'<td>'+data[i].keterangan+'</td>'+
									'<td>'+
										'<div class="dropdown">'+
											'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
												'<i class="fa fa-ellipsis-h"></i>'+
											'</a>'+											
											'<div class="dropdown-menu dropdown-menu-right">'+
												'<a class="dropdown-item item_edit" href="#" data-id ="'+data[i].id+'" data-kode_defect="'+data[i].kode+'" data-keterangan ="'+data[i].keterangan+'"><i class="fa fa-pencil"></i> Edit </a>'+
												'<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
											'</div>'+
										'</div>'+
									'</td>'+
								'</tr>';    
                            }
                            $(".data-table").DataTable().destroy();  
                            $('#tbl_body').html(html);
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
									searchPlaceholder: "Cari Error Code"
								},
							});
                        }
                    });

            }


            // NEW ERR
            	$( "#form_errorCode" ).validate({
				  rules: {
				  	i_code: {
				      required: true
				    },
				    i_ket: {
				    	required: true
				    }
				  }
				});
	   			$('#btn_submit').click(function(){
	   				if (!$('#form_errorCode').valid()) { 
	   					return;
	   				}
					var def_code = document.getElementById("i_code").value;
					var def_ket = document.getElementById("i_ket").value;
					// alert(def_code+","+def_ket);

					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/ErrCode/newErrorCode",
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
							document.getElementById("form_errorCode").reset();
						}
					});
					show();
				});

			//  ===================   Delete Record ===============================================
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
		                    url  : "<?php echo site_url(); ?>/ErrCode/delErrorCode",
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

				$('.data-table-export').DataTable({
					scrollCollapse: true,
					autoWidth: false,
					responsive: true,
					columnDefs: [{
						targets: "datatable-nosort",
						orderable: false,
					}],
					"lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
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

			//  ===================  START UPDATE Record ===============================================
	            //get data for UPDATE record show prompt
		            $('#tbl_body').on('click','.item_edit',function(){
		            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
		                // variabel = list datatable
		                var idd = $(this).data('id');
		                var kode = $(this).data('kode_defect'); 
		                var ket = $(this).data('keterangan');

		                // memasukkan data ke form updatean
		                // name inputan . variabel
						$('[name="id_k"]').val(idd);
						$('[name="kodeupdt"]').val(kode);
						$('[name="keterangan_name"]').val(ket); 

		                $('#Modal_upd').modal('show'); 
		            });
            	// Validate
            		$( "#formupdate_err" ).validate({
					  rules: {
					  	kodeupdt: {
					      required: true
					    },
					    keterangan_name: {
					    	required: true
					    }
					  }
					});
            	//UPDATE record to database (submit button)  
		            $('#btn_update').on('click',function(){
		            	if (!$('#formupdate_err').valid()) { 
		   					return;
		   				}
		            	// variabel = name inputan
		                var idkode = $('[name="id_k"]').val();
						var kodeup = $('[name="kodeupdt"]').val();
						var ketup = $('[name="keterangan_name"]').val();
						
						// alert(ketup);
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/ErrCode/updateErrorCode",
		                    dataType : "JSON",
		                    data : { 
		                    	//post controller : variabel
		                    		id:idkode,
		                    		code:kodeup,
		                    		keterangan:ketup},

		                    success: function(data){
		                    	$('#Modal_upd').modal('hide'); 
		                        // refresh();
		                        show();
		                    }
		                }); 
		            });
		    //   ========================  END UPDATE RECORD ====================================



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


		});
	</script>



</body>

</html>