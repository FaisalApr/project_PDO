<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Defect</title>

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
	
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="container_maindata">
		<!-- top icon dasboard -->
		<div class="row clearfix progress-box"> 
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Total</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="46" id="id_totaldeff"></font></span>
						</center>	
					</div> 
				</div>
			</div> 
			<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">DPM</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56" id="id_tot_dpm">0</font></span>
						</center>	
					</div> 
				</div>
			</div> 
		</div>	

		<!-- BODY CONTAINER --> 
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> 
			<div class="pull-left">
				<h5 class="text-blue" style="font-size: 46px">Defect Data Table</h5> 	
			</div>
			<div class="pull-right">
				<div class="row clearfix" id="btn_adddeff" style="display: none;">	
					<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#login-modal" style="margin-right: 25px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
				</div>
			</div>
			<br><br><br>

			<!-- TABEL -->
			<table class="data-table stripe hover nowrap" id="t_user">
				<thead>
					<tr>
						<th class="table-plus datatable-nosort">Jam ke</th>
						<th>Jenis</th>
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

	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="no_pdodata" style="display: none;"> 
		<center>
			<div class="jumbotron">
				<H1>Tidak Ada Data PDO Perpilih</H1>
			</div>
		</center>
	</div>


</div>

<!-- KUMPPULAN MODAL -->
<div>
	<!-- input modal -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
						<h2 class="text-center mb-30">Defect</h2>
						<form id="formDefect"> 
							<div class="input-group custom input-group-lg">
							  <div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="levelupp" id="i_jam">
									<!-- CONTINER JAM KE -->
								</select>
							  </div>
							</div>

							<div class="input-group custom input-group-lg">
								<select class="custom-select col-12" name="i_lst_defect" id="i_listdefect">
									  
								</select>
							</div> 
							<div class="input-group custom input-group-lg">
								<input id="i_ket" type="text" class="form-control" placeholder="Keterangan">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
								</div>
							</div> 
							<div class="input-group custom input-group-lg">
								<input type="number" class="form-control" placeholder="Total" id="i_total">
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

	<!-- update modal -->
	<div class="modal fade" id="modal_upd" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h2 class="text-center mb-30">Defect</h2>
					
					<form id="formDefect"> 
						<input type="hidden" name="id_updt" id="id_update">
						<div class="input-group custom input-group-lg"> 
							<label>Pilih Jam :</label>
							<select class="custom-select col-12" name="jam_updt" id="jam_update"> 
								<!-- CONTAINER JAM UPDATE -->
							</select>  
						</div>  
						<div class="input-group custom input-group-lg">
							<label>Jenis Defect :</label>
							<select class="custom-select col-12" name="jenis_updt" id="updt_listdefect"> 

										<?php foreach ($defect as $key) { ?>
											<option value="<?php  echo $key->id ?>"> <?php  echo $key->code .'('.$key->keterangan.')' ?> </option>
										<?php }  ?>
							</select>
						</div> 
						<div class="input-group custom input-group-lg">
							<input id="ket_update" name="ket_updt" type="text" class="form-control" placeholder="Keterangan">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
							</div>
						</div> 
						<div class="input-group custom input-group-lg">
							<input type="number" class="form-control" placeholder="Total" id="total_update" name="total_updt">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-database" aria-hidden="true"></i></span>
							</div>
						</div> 
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group"> 
									<a id="btn_update" class="btn btn-primary btn-lg btn-block" href="#">Update</a>
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
</div>

<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script> 

	<script>
		$('document').ready(function(){
			// VAR CORE
				var id_line = $('#id_line').val();
				var id_shift = $('#id_shift').val();
				var id_tgl = $('#id_tgl').val();
				var id_pdo = 0;

			// variabel global	
				// deklarasi nama bulan
	 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

	 			var today = new Date(id_tgl);
				var currentMonth = today.getMonth();
				var currentYear = today.getFullYear();
				var currDate = today.getDate();
				var submited = false;		 
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
			    		cekHariini();
				    }
				});
			// TRIGGEr line Change
				$('#select_line').on('select2:select',function(e){
					var data = e.params.data;
					
					id_line = data.id ;
					// update opt to server
					updateOpt(); 
					cekHariini();
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
					cekHariini();
				});
			

			// ====  AUTOLOAD =====  
				loadDropdown();
				cekHariini();
 
			// FUNC CORE LOAD
			// CEK Hari INI
				function cekHariini() {
					$.ajax({ 
		                type  : 'POST',
		                url   : '<?php echo base_url();?>index.php/Welcome/cekHariIni',
		                dataType : 'JSON', 
		                data:{
		                	id_line:id_line,
		                	id_shift:id_shift,
		                	id_tgl:id_tgl
		                } ,
		                success : function(res){   
								if (res) { 
									id_pdo = res.id;

									// admin bebas
									var lv  = <?php echo $ses['level'] ?>; 

									// cek jika itu bukan miliknya
		                    		if ($('#id_user').val()==res.id_users || lv==1) { 
		                    			console.log('MILIKNYA')  
		                    			show(res.id);  
		                    		}else { 
		                    			console.log('not YOU');  
		                    			showNotYou(res.id);
		                    		}     
		                    		// isi Dropdown jam ke
		                    		isi_dropdown(res.id);

		                    		//  STATUS VERIFIKASI 	
		                    		 if (res.status==1) {
		                    		 	document.getElementById('id_verif').style.display = 'block';
		                    		 }else{
		                    		 	document.getElementById('id_verif').style.display = 'none';
		                    		 } 	
								}else{ 
									console.log('is null'); 
									showNodata(); 
								}
								

		                }

		            }); 
				}

			// =================== Read Record =============================================== 
            function show(pdo){
            	document.getElementById('no_pdodata').style.display = 'none';
	            document.getElementById('container_maindata').style.display = 'block';
	            // btn add
	            document.getElementById('btn_adddeff').style.display = 'block';
                    $.ajax({
                        async :false,
                        type  : 'POST',
                        url   : '<?php echo base_url();?>index.php/Defect/getDefectsUser',
                        dataType : 'json',
                        data : {id_pdo:pdo},
                        success : function(response){
                            var html = '';
                            var i; 

                            console.log('isi show:');
                            console.log(response);

                            var data = response.alldefect; 

                            // isi list defect dropdown
                            isi_listDefect(response.list_defect);

                            // setting WIDGET
                            document.getElementById('id_totaldeff').innerHTML= response.total.total;
                            if (response.dpm.dpm) {
                            	document.getElementById('id_tot_dpm').innerHTML= response.dpm.dpm;	
                            }
                            

                            for(i=0; i<data.length; i++){
                                html +=  
                                '<tr>'+
									'<td class="table-plus">'+data[i].jam_ke+'</td>'+
									'<td>'+data[i].keterangan+'</td>'+
									'<td>'+data[i].item+'</td>'+
									'<td>'+data[i].total+'</td>'+
									'<td>'+
										'<div class="dropdown">'+
											'<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
												'<i class="fa fa-ellipsis-h"></i>'+
											'</a>'+											
											'<div class="dropdown-menu dropdown-menu-right">'+
												'<a class="dropdown-item item_edit" href="#" data-id="'+data[i].id+'" data-id_pdo="'+data[i].id_pdo+'" data-id_oc="'+data[i].id_oc+'" data-id_defect="'+data[i].id_defect+'" data-keterangan="'+data[i].item+'" data-total="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
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
                        }
                    });

            }
            function showNotYou(pdo){
            	document.getElementById('no_pdodata').style.display = 'none';
	            document.getElementById('container_maindata').style.display = 'block';
	            // btn add
	            document.getElementById('btn_adddeff').style.display = 'none';
                    $.ajax({
                        async :false,
                        type  : 'POST',
                        url   : '<?php echo base_url();?>index.php/Defect/getDefectsUser',
                        dataType : 'json',
                        data : {id_pdo:pdo},
                        success : function(response){
                            var html = '';
                            var i; 

                            console.log('isi show:');
                            console.log(response);

                            var data = response.alldefect; 

                            // isi list defect dropdown
                            isi_listDefect(response.list_defect);

                            // setting WIDGET
                            document.getElementById('id_totaldeff').innerHTML= response.total.total;
                            if (response.dpm.dpm) {
                            	document.getElementById('id_tot_dpm').innerHTML= response.dpm.dpm;	
                            }
                            

                            for(i=0; i<data.length; i++){
                                html +=  
                                '<tr>'+
									'<td class="table-plus">'+data[i].jam_ke+'</td>'+
									'<td>'+data[i].keterangan+'</td>'+
									'<td>'+data[i].item+'</td>'+
									'<td>'+data[i].total+'</td>'+
									'<td>-</td>'+
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
            function showNodata() {
            	document.getElementById('id_verif').style.display = 'none';
            	document.getElementById('no_pdodata').style.display = 'block';
	            document.getElementById('container_maindata').style.display = 'none';
            }

            // =================== End Read Record ===============================================
            //  ===================  START UPDATE Record ===============================================
	            //get data for UPDATE record show prompt
	            $('#tbl_body').on('click','.item_edit',function(){
	            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
	                var id = $(this).data('id');
	                var id_oc = $(this).data('id_oc');
	                var id_jenis_defect = $(this).data('id_defect');
	                var keterangan = $(this).data('keterangan');
	                var total = $(this).data('total');
	                 
	                // memasukkan data ke form updatean
					$('[name="id_updt"]').val(id);
					$('[name="jam_updt"]').val(id_oc);

					$("#jam_update option[value='"+id_oc+"']").prop('selected', true);
					$("#jenis_update option[value='"+id_jenis_defect+"']").prop('selected', true);

					$('[name="ket_updt"]').val(keterangan);
					$('[name="total_updt"]').val(total);

	                $('#modal_upd').modal('show');
	                
	            });
	            
	            //UPDATE record to database (submit button)
	            $('#btn_update').on('click',function(){
	                var idup = $('[name="id_updt"]').val();
	                var id_oc_up = $('[name="jam_updt"]').val();
	                var id_jenis_up = $('[name="jenis_updt"]').val();
	                var ketup = $('[name="ket_updt"]').val();
	                var totalup = $('[name="total_updt"]').val();

					// alert(umhup);
	                $.ajax({
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/Defect/updateDefect",
	                    dataType : "JSON",
	                    data : { 
	                    		id_pdo:id_pdo,
	                    		id:idup,
	                    		id_oc:id_oc_up,
	                    		id_jenisdeffect:id_jenis_up,
	                    		keterangan:ketup,
	                    		total:totalup
	                    	},

	                    success: function(data){
	                    	$('#modal_upd').modal('hide'); 
	                        // refresh();
	                        show(id_pdo);
	                    }
	                });
	              }); 
			 // ========================  END UPDATE RECORD ====================================




            // =================== Create Record ===============================================
	   			$('#btn_submit').click(function(){

					var def_jam = document.getElementById("i_jam").value;
					var def_ket = document.getElementById("i_ket").value;
					var def_total = document.getElementById("i_total").value;
					var i_lst_defect = $('select[name=i_lst_defect]').val();  

					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/Defect/newDefect",
					
						dataType : "JSON",
						data : {
							def_id_pdo:id_pdo,
							def_id_oc: def_jam,
							def_id_jenisdeffect:i_lst_defect,
							def_ket:def_ket,
							def_total:def_total
						},
						success : function(response){
							
							$('#login-modal').modal('hide');
							if(response.error){
								// alert('error');
							}else{
								// alert(response.status);
							}
							document.getElementById("formDefect").reset();
						}
					});
					show(id_pdo);
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

		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Defect/delDefect",
		                    dataType : "JSON",
		                    data : {id:id_dc_delete,id_pdo:id_pdo},
		                    success: function(){
		                        $('[name="id_dc_delete"]').val("");
		                        $('#confirmation-modal').modal('hide');
		                        // refresh()
		                        
		                		show(id_pdo);
		                    }
		                });
		                return false;

		            });
			 //   ========================  END DELETE RECORD ====================================


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
			// ============== dropdown TIME ===============
				function isi_dropdown(id_pdo) {
				  	
					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/Losstime/cari_jam_ocPDO',
	                    dataType : 'JSON', 
	                    data:{ 
	                    	id_pdo: id_pdo
	                    },
	                    success : function(res){    
	                    	var html = '<option disabled selected> Jam ke</option>';
	                    	// console.log(res);
	                    	for (var i = 0; i < res.length; i++) {
	                    	 	if (i==(res.length-1)) {
	                    	 		html +=
	                    	 		'<option selected value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
	                    	 	}else{
	                    	 		html +=
	                    	 		'<option value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
	                    	 	} 
	                    		
	                    	}

	                    	$('#i_jam').html(html);
	                    	$('#jam_update').html(html);
	                    }
	                });	

				} 
			// ===== isi LIST Defect 
				function isi_listDefect(data) {
					
					var html = '<option disabled selected> Jam ke</option>';

                	for (var i = 0; i < data.length; i++) {
                	 	if (i==(data.length-1)) {
                	 		html +=
                	 		'<option selected value="'+data[i].id+'">'+data[i].code+'</option>';
                	 	}else{
                	 		html +=
                	 		'<option value="'+data[i].id+'">'+data[i].code+'</option>';
                	 	} 
                		
                	}

                	$('#i_listdefect').html(html);
                	$('#updt_listdefect').html(html);
				}


		});
	</script>

</body>

</html>