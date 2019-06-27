<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/
	jquery.steps.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">

</head>
<body id="box-bg">
	<?php $this->load->view('header/header'); ?>
	<?php $this->load->view('header/sidebar'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			 
			<div id="panel_wizard" class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="display: none;">
				<div class="clearfix">
					<h4 class="text-blue">Mulai Planning PDO</h4>
					<p class="mb-30 font-14">Step Wizard PDO</p>
				</div>
				<div class="wizard-content">
					<form class="tab-wizard wizard-circle wizard">
						<h5>Direct Labor Info</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label >Standart DL :</label>
										<input class="form-control" type="number" id="f_std_dl" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label >Reg DL :</label>
										<input class="form-control" type="number" id="f_reg_dl">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Jam Overtime :</label>
										<input class="form-control" type="number" id="f_jam_ot">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>DL Overtime :</label>
										<input class="form-control" type="number" id="f_dl_ot">
									</div>
								</div>
							</div> 
							<br>
						</section>
						<!-- Step 2 -->
						<h5>InDirect Labor Info</h5>
						<section>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label >Standart IDL :</label>
										<input class="form-control" type="number" id="f_std_idl">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label >Reg IDL :</label>
										<input class="form-control" type="number" id="f_reg_idl">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Jam Overtime :</label>
										<input class="form-control" type="number" id="f_jam_ot_idl">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>IDL Overtime :</label>
										<input class="form-control" type="number" id="f_idl_ot">
									</div>
								</div>
							</div> 
							<br>
						</section>
						<!-- Step 3 -->
						<h5>Indirect Activity</h5>
						<section>

							<div class="table-responsive">
								<h2>Activity</h2>
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Items</th>
											<th scope="col">Menit</th> 
											<th scope="col">Ubah</th>
										</tr>
									</thead>
									<tbody id="tbl_activlabor">
										 
									</tbody>
								</table>
								<br><br>
							</div>
														
						</section>
						<!-- Step 4 -->
						<h5>Finish</h5>
						<section>
							<div class="col-12 align-content-center">
								<div class="checkbox-circle" style="margin-bottom: 48px; margin-left: 50px;">
									<label>
										<input type="checkbox" id="ini_pernyataan"> Data yang saya masukkan Benar
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</section>
					</form>
				</div>
			</div>

			<div id="panel_newplann" class="login-wrap customscroll align-items-center flex-wrap justify-content-center pd-20" style="display: block;">
				<div class="login-box bg-white box-shadow pd-30 border-radius-5">
					 <h1>Ayo Buat Planning Baru</h1>
					 <br>
					 <br>
					 <center>
					 <button id="btn_newplan" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">Buat <i class="icon-copy fa fa-plus" ></i></button> 
					</center>
				</div>
			</div>
 
		 

		</div>
	</div> 
 

	<!-- modall neww -->
	<div class="modal fade" id="modalnewact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h2 class="text-center mb-30">Tambah Aktivitas</h2>
					<form id="form_addactiv">
						<div class="input-group custom input-group-lg">
							<label>Aktivitas :</label>
							<input id="nameAct" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
							 
						</div>
						<div class="form-group">
							<label>Durasi :</label>
							<input id="demo1" type="text" value="5" name="demo1">
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="input-group"> 
									<a class="btn btn-primary btn-lg btn-block" href="#" id="tambah_activ">Tambah</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- modall edit -->
	<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h2 class="text-center mb-30">Edit Aktivitas</h2>
					<form id="form_addactiv">
						<div class="input-group custom input-group-lg">
							<label>Aktivitas :</label>
							<input id="nameActedit" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
							 
						</div>
						<div class="form-group">
							<label>Durasi :</label>
							<input id="demo1edit" type="text" value="5" name="demo1">
							<input id="id_edit" type="hidden"  >
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="input-group"> 
									<a class="btn btn-primary btn-lg btn-block" href="#" id="tambah_activedit">Ubah</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
	
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
	<!-- add sweet alert js & css in footer -->
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  
	<script src="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

	<script>

		$("input[name='demo1']").TouchSpin({
			min: 0,
			max: 60,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 10,
			postfix: 'menit'
		});

		$("input[name='demo1edit']").TouchSpin({
			min: 0,
			max: 60,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 10,
			postfix: 'menit'
		});

	</script>
	<script>
		$('document').ready(function(){ 
 			// deklarasi nama bulan
 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

			let today = new Date();
			var currentMonth = today.getMonth();
			var currentYear = today.getFullYear();
			var currDate = today.getDate();

			$('#slect_date').val('  '+currDate+' '+monthName[currentMonth]+' '+currentYear);
 
			$('.date-picker').datepicker({   
			    onSelect: function(selected,evnt) {
			    	let tod = new Date(selected);
			    	alert(tod);
			    }
			});


			//new direct Activity 
			var activ = []; 
			var a1 = { item:"5S + Yoidon", menit:0 };
			var a2 = { item:"Home Position", menit:0 };
	        activ.push(a1); 
	        activ.push(a2); 

	        isi_activity();

			// init wizard
			$(".tab-wizard").steps({
				headerTag: "h5",
				bodyTag: "section",
				transitionEffect: "fade",
				titleTemplate: '<span class="step">#index#</span> #title#',
				labels: {
					finish: "Create"
				},
				onStepChanged: function (event, currentIndex, priorIndex) {
					$('.steps .current').prevAll().addClass('disabled');
				},
				onFinished: function (event, currentIndex) {
					if (document.getElementById("ini_pernyataan").checked==true) {
						// dl
						var stddl = document.getElementById("f_std_dl").value;
						var regdl = document.getElementById("f_reg_dl").value;
						var jam_otdl = document.getElementById("f_jam_ot").value;
						var dl_otdl = document.getElementById("f_dl_ot").value;
						// idk
						var stdidl = document.getElementById("f_std_idl").value;
						var regidl = document.getElementById("f_reg_idl").value;
						var jam_otidl = document.getElementById("f_jam_ot_idl").value;
						var dl_otidl = document.getElementById("f_idl_ot").value;
						// activity
						// console.log(stddl+","+regdl+","+jam_otdl+","+dl_otdl+",&idl:"+stdidl+","+regidl+","+jam_otidl+","+dl_otidl);
						 
						$.ajax({
			            	async : false,
			                type : "POST",
			                url   : '<?php echo base_url();?>index.php/Welcome/newPdo',
			                dataType : "JSON",
			                data : {
			                		stddl:stddl,
			                		regdl:regdl,
			                		jam_otdl:jam_otdl,
			                		dl_otdl:dl_otdl,

			                		stdidl:stdidl,
			                		regidl:regidl,
			                		jam_otidl:jam_otidl,
			                		dl_otidl:dl_otidl
			                	},
			                success: function(response){ 
			                	// jika terdapat error / user pass salah
								if(response.error || response.error1 || response.error2 ){  
									Swal.fire({
									  title: 'Error!',
									  text: 'Terjadi kesalahan pengiriman data',
									  type: 'error',
									  confirmButtonText: 'Ok',
									  allowOutsideClick: false
									}).then(function(){
								    	document.location.reload(true);
								    }); 

								}
								else{ 
									 
									// perulangan insert activity
									for (var ls = 0; ls < activ.length; ls++) {
 										var durasijam = (activ[ls].menit/60);
 										var to = (regdl*durasijam); 

										$.ajax({
											async: false,
											type: "POST",
											url: '<?php echo site_url('DirectLabor/anInsertActivity') ?>',
											dataType: "JSON",
											data:{
												idpdo: response.id_pdo,
												activity: activ[ls].item,
												qty: regdl,
												menit: activ[ls].menit,
												total: to
											},
											success: function(data){

											} 
										});

									}  
									Swal.fire(
								      'Berhasil !',
								      'Membuat Planning',
								      'success'
								    ).then(function(){
								    	document.location.reload(true);
								    }); 
								}

			                }
			            }); 



					}else{
						Swal.fire({
						  title: 'Error!',
						  text: 'Pastikan Anda Sudah Checked Setuju',
						  type: 'error',
						  confirmButtonText: 'Ok',
						  allowOutsideClick: false
						})
					}
					
				}
			});

			//check pdo
			 
	        function isi_activity(){
	        	var html ="";
	        	for (var i = 0; i < activ.length; i++) {
	        		html += '<tr>'+
							'<th scope="row">'+(i+1)+'</th>'+
							'<td>'+activ[i].item+'</td>'+
							'<td>'+activ[i].menit+'</td>'+
							'<td>'+
                    		'<a href="javascript:void(0);" class="item_edit" data-posisi="'+i+'" data-id_k="'+activ[i].item+'" data-duration="'+activ[i].menit+'" ><i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
                    		'</td>'+
						'</tr>'; 
	        	} 

	        	html += 
	        			'<tr>'+
							'<th scope="row"></th>'+
							'<td><button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalnewact"  type="button">Tambah <i class="icon-copy fa fa-plus" ></i></button></td>'+
							'<td></td> <td></td>'+
						'</tr>';
	        	$('#tbl_activlabor').html(html); 

	        }

	        // event button baru
	        $('#tambah_activ').click(function()
			{    
				var named_act = document.getElementById("nameAct").value;
				var durasi_act = document.getElementById("demo1").value;
				var temp = { item:named_act, menit:durasi_act };
				activ.push(temp);
				isi_activity(); 
				$('#modalnewact').modal('hide');
				document.getElementById('form_addactiv').reset(); 
			});

	        // event Edit
	        //get data for edit record show prompt modal
            $('#tbl_activlabor').on('click','.item_edit',function(){
                var namek = $(this).data('id_k'); 
                var duration = $(this).data('duration'); 
                var poss = $(this).data('posisi'); 
 				
 				document.getElementById("nameActedit").value = namek;
				document.getElementById("demo1edit").value = duration;
				document.getElementById("id_edit").value = poss;
                $('#modaledit').modal('show'); 
            });
            //event edit cliked
            $('#tambah_activedit').click(function()
			{    
				var named_act = document.getElementById("nameActedit").value;
				var durasi_act = document.getElementById("demo1edit").value;
				var posi = document.getElementById("id_edit").value;
				   
				activ[posi].item = named_act;
				activ[posi].menit = durasi_act;

				isi_activity(); 
				$('#modaledit').modal('hide');
				document.getElementById('form_addactiv').reset(); 
			});


			// tombol buat pdo plann baru 
			$('#btn_newplan').click(function()
			{   
			    document.getElementById("panel_wizard").style.display="block";
                document.getElementById("panel_newplann").style.display="none";
			});
 			
			$('#btn_test').click(function(){
				$.ajax({
					async : false,
					type : "POST",
					url: '<?php echo site_url('DirectLabor/arInsertActivity') ?>',
					dataType : "JSON",
					data:{
						aray:activ
					},
					success: function(data){
						console.log("sukses");
					}
				});
			});



		});
	</script>

</html>