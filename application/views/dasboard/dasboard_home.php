<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">

</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
 <!-- Modall -->

 <!-- modal edit per items (login-modal) -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
				<h2 class="text-center mb-30">Edit Actual</h2>
				<form> 
					<div class="input-group custom input-group-lg">
						<input type="number" id="act_editfom" class="form-control">
						<input type="hidden" id="id_act_editfom" class="form-control">
						<div class="input-group-append custom">
							<span class="input-group-text"><i class="icon-copy fa fa-tasks" aria-hidden="true"></i></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group"> 
								<a class="btn btn-primary btn-lg btn-block" id="btn_update_act" href="#">update</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Add Build -->
<div class="modal fade" id="modalnewbuild">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="fomaddbuild">
				<div class="modal-header">
					<h4 class="modal-title">Build Assy Baru</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
				</div>
				<div class="modal-body"> 
					<div class="form-group">
						<label>Assy Number</label>
						<select class="custom-select2 form-control" name="state" id="pilihasy" style="width: 100%; height: 38px;">
							  
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input id="idjamke" type="hidden" class="form-control" > 
					<button type="button" class="btn btn-primary" id="btn_newbuildassy">Tambahkan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal Add new Jam ke -->
<div class="modal fade" id="modaladdjamke">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pindah Jam </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
			</div>
			<div class="modal-body">
				<div class="input-group custom input-group-lg" >
					<center><H3 id="id_labeljam"></H3></center>
					<input id="terus_jam_ke" type="hidden" class="form-control"> 
					<input id="id_pdo" type="text" class="form-control"> 
				</div> 
				<div class="form-group">
					<label>Jumlah Plan</label>
					<input id="jum_plann" type="number" class="form-control"> 
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="btn_pindahjam">Pindah Jam</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<!-- top icon dasboard -->
		<div class="row clearfix progress-box">

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Output</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">MH Out</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">MH IN</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">120</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">87</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="87" aria-valuemin="0" aria-valuemax="120"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Efficiency</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<div class="row clearfix">
								<div class="col-sm-6 text-muted weight-500">Plan</div> 
								<span class="col-sm-6 no text-right text-blue weight-500 font-16">98%</span>
								 
								<div class="col-sm-6 text-muted weight-500">Act</div>
								<div class="col-sm-6 text-right weight-500 font-14 text-muted">82%</div>
							</div>
							<div class="progress" style="height: 10px; margin-top: 10px;">
								<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="98" aria-valuemin="0" aria-valuemax="98"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Productivity</h5>
					<div class="card-body"> 
						<div class="project-info-progress">
							<center>
							<span class="col-sm-12 align-content-center text-blue weight-800"><font size="56">89%</font></span>
							</center>
						</div>
					</div> 
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				<div class="card box-shadow">
					<h5 class="card-header text-center weight-500">Man Power</h5>
					<div class="card-body"> 
						<center>
							<span class="col-sm-12 align-content-center text-red weight-800"><font size="56">56</font></span>
							<i class="icon-copy fi-torsos-male-female"></i>
						</center>	
					</div> 
				</div>
			</div>
		</div>
			
		<!-- Tabel -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30"> 
			<table class="table table-responsive table-striped table-bordered" style="padding-bottom: 20px;">
				<thead id="thead_outputt"> 
					 
				</thead>
				<tbody id="tbody_outputt">

					 
				</tbody> 

			</table>
			<br>
		</div>

	</div>
</div>
 
</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<!-- add sweet alert js & css in footer -->
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  

	<script> 
		$('document').ready(function(){
			// auto load
			showdata();  

			function showdata() { 
				var htmlhead1 = '';
                var htmlhead2 = '';
                var htmlhead3 = '';
                var htmltotalbawah = '';
                var htmltotalbawahMhOt = '';
                var totActual=[]; 
                var db_head;

                // get data per pdo
				$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataOutputControl',
                    dataType : 'JSON',
                    success : function(data){ 
                    	$('#id_pdo').val(data[0].id_pdo);
                        var html = '';
                        var t_plan=0;
                        var t_act=0;
                        var id_jamke;
                        var jam_ke=0;

                        // header
                        htmlhead1 +=
                        	'<tr>'+
								'<th colspan="4" style="text-align: center;">Assy</th>';
						htmlhead2 +=
								'<th style="border: none;">'+
									'<button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalnewbuild"  type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Assy <i class="icon-copy fa fa-plus" ></i></button>'+
								'</th>'+
							'</tr>'+
							'<tr>'+
								'<th colspan="4" style="width: 45%; text-align: center;">UMH</th>';
						htmlhead3 +=
							'</tr>'+
							'<tr>'+
								'<th scope="col" colspan="2" style="width: 5%; text-align: center;">Jam Ke-</th>'+
								'<th scope="col" style="width: 5%;">Plan</th>'+
								'<th scope="col" style="width: 5%;">Act</th>';
 
						// membuat header tabel
						$.ajax({
		                    async : false,
			                type : "POST",
			                url   : '<?php echo base_url();?>index.php/OutputControl/getDataBuildAssyHeader',
			                dataType : "JSON",
			                data : { id:$('#id_pdo').val() },
			                success: function(response){  
			                	//isi db
			                	db_head = response;

			                	for (var a = 0; a < response.length; a++) { 
				                		htmlhead1 +=
				                			'<th>'+response[a].kode_assy+'</th>';
				                		htmlhead2 +=
				                			'<th>'+response[a].umh+'</th>';
				                		htmlhead3 +=
				                			'<th scope="col" align="center" >A</th>';
			                		} 

			                }
		                });

						// membuat data per rows / jamke-
                        for(var i=0; i<data.length; i++){ 

                        	html +=  
                            '<tr>'+
								'<th scope="row" colspan="2" style="text-align: center;">'+data[i].jam_ke+'</th>'+
								'<td>'+data[i].plan+'</td>'+
								'<td>'+data[i].actual+'</td>'; 

                        	// Data detail per row 
                        	
                        	$.ajax({
			                    async : false,
				                type : "POST",
				                url   : '<?php echo base_url();?>index.php/OutputControl/getDataBuildAssy',
				                dataType : "JSON",
				                data : { id:data[i].id },
				                success: function(response){    

				                	// mengulang sebanyak head
				                	for (var ir = 0; ir < db_head.length; ir++) {  
				                		var urutan = ir;
				                		var tmphtml = '';
				                		var found = false; 

				                		for (var a = 0; a < response.length; a++) { 

				                			// menyocokkan kolom table head 
			                				if (db_head[ir].id_assy==response[a].id_assy ) {
			                					// edit hanya di last row
			                					if ((i+1)==data.length) {
			                						tmphtml = 
				                				'<td><a href="#" class="item_edit" data-actual="'+response[a].actual+'" data-ida="'+response[a].id+'">'+response[a].actual+'</a></td>'; 	
			                					}else{
			                						tmphtml = 
				                				'<td>'+response[a].actual+'</td>'; 	
			                					}
			                					
				                				found = true; 
				                				// counter jumlah Act 
				                				// membuat & insert total setiap jenis assy 
						                		totActual.push([db_head[ir].id_assy,Number(response[a].actual)]);  

			                				} else if(db_head[ir].id_assy!=response[a].id_assy && found==false){
			                					// jikadata berada di line terahir
			                					if ((i+1)==data.length) {
			                						tmphtml =  '<td><a href="#" class="item_newassy btn btn-outline-success btn-sm" data-kodeassy="'+db_head[ir].kode_assy+'" data-baris="'+(i+1)+'" data-idrow="'+data[i].id+'" data-idcol="'+db_head[ir].id+'">+</a></td>'; 
			                					}else{
			                						tmphtml =  '<td style="border:none"></td>'; 
			                					}   
			                					found = true;
			                				}
			                				 
				                		}
				                		// html fix add dengan temphtml
				                		html += tmphtml; 
				                	}

				                	// jika last row jam & null assembly
				                	if(response.length==0 && (i+1)==data.length){
				                		for (var ir = 0; ir < db_head.length; ir++) {
				                			html += 
				                				'<td><a href="#" class="item_newassy" data-kodeassy="'+db_head[ir].kode_assy+'" data-baris="'+(i+1)+'" data-idrow="'+data[i].id+'" data-idcol="'+db_head[ir].id+'">+</a></td>'; 
				                		}
				                	}
				                }

			                }); 
                            
  							// total
  							t_plan += Number(data[i].plan);
  							t_act += Number(data[i].actual); 
  							id_jamke = data[i].id;
  							jam_ke ++; 
                        }

                        


                        // bottom Tabel 
                        html +=
                        	'</tr>'+
                        	'<tr>'+
								'<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn btn-success" data-toggle="modal" data-target="#modaladdjamke" type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Jam <i class="icon-copy fa fa-plus" ></i></button></td>'+
								'<th scope="row">Total</th>'+
								'<th scope="row">'+t_plan+'</th>'+
								'<th scope="row">'+t_act+'</th>';
						// penggabungan counter total actual per assy
						for (var ir = 0; ir < db_head.length; ir++) {  
							var atot = 0;
							for (var i = 0; i < totActual.length; i++) {
								if (totActual[i][0]==db_head[ir].id_assy) {
									atot += Number(totActual[i][1]);
								}
							}
							// hitungan total builder assy & umh
							htmltotalbawah +=  '<th scope="row">'+atot+'</th>'; 
							var tumh= (Number(db_head[ir].umh)*atot);
							if (tumh!=0) { tumh = tumh.toFixed(3)}
							htmltotalbawahMhOt +=  '<th scope="row">'+tumh+'</th>';
						}
  
						html +=
							htmltotalbawah+
							'</tr>'+
							'<tr>'+
								'<th scope="row" colspan="3">MH Out</th>'+
								 htmltotalbawahMhOt+
							'</tr>';
						// gabungan head
						htmlhead1 += htmlhead2;
						htmlhead1 += htmlhead3;
						htmlhead1 += 
								'<th style="width: 5%; border: none;"></th>'+
								'<th style="width: 100%; border: none;"></th>'+
							'</tr>';

                        $('#tbody_outputt').html(html);
                        $('#thead_outputt').html(htmlhead1);
                        document.getElementById("idjamke").value=id_jamke;
                        document.getElementById("terus_jam_ke").value=(jam_ke+1);
                        document.getElementById("id_labeljam").innerHTML="Pindah Jam Ke- : "+(jam_ke+1); 
                    }
                }); 
				
				// set dropdown assycode
				$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/Assycode/getAssyCodeDasboard',
                    dataType : 'JSON',
                    success : function(dat){ 
                    	html = '<option disabled selected> Pilih Assy </option>';
 
                    	// mengulang jika ada yang sama dengan column head 
                		for (var i = 0; i < dat.length; i++) { 
                			var skip = false;
                			for (var ii = 0; ii < db_head.length; ii++) {  
	                			// jika ada assy yang sama dengan header tidak ditampilkan
	                			if (dat[i].kode_assy==db_head[ii].kode_assy) {
	                				skip = true;
	                			}
	                		}
	                		if (skip==false) { 
                				html +='<option value="'+dat[i].id+'">'+dat[i].kode_assy+'</option>';
                			}  
                    	}  

						$('#pilihasy').html(html);
                    }
                });


			}


			// event click btn new build assy horizontal
			$('#btn_newbuildassy').click(function(){  

				var idjam  = $('#idjamke').val();
				var idassy  = $('#pilihasy').val();
				var pdo  = $('#id_pdo').val();
 
				 $.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataBuildAssy',
	                dataType : "JSON",
	                data : {
	                		id_oc:idjam, 
	                		id_assy:idassy,
	                		pdo:pdo
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							console.log("semua Bahagia");
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Inputan benar',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
						}

	                }
	            }); 

				$('#modalnewbuild').modal('hide'); 
				showdata(); 
			});

			// event click btn new jam vertical
			$('#btn_pindahjam').click(function(){  

				var pdo  = $('#id_pdo').val();
				var jumplan  = $('#jum_plann').val();
				var jamke = $('#terus_jam_ke').val();

				$.ajax({
	            	async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/newDataOutputControl',
	                dataType : "JSON",
	                data : {
	                		id_pdo:pdo, 
	                		plan:jumplan,
	                		jam_ke:jamke
	                	},
	                success: function(response){ 
	                	// jika sukses
						if(response){  
							console.log("semua Bahagia");
						}
						else{
							Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Inputan benar',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
						}

	                }
	            }); 
				$('#modaladdjamke').modal('hide'); 
				showdata(); 
			});

			// ========== start event edit click =====================
			$('#tbody_outputt').on('click','.item_edit',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var id = $(this).data('ida');
                var act = $(this).data('actual');

                // memasukkan data ke form updatean
				$('#id_act_editfom').val(id);  
				$('#act_editfom').val(act);  

				// show modal edit
                $('#login-modal').modal('show'); 
            });

			// evnt click update btn
			$('#btn_update_act').click(function(){ 
				// mengambil data dari fom upadate
				var idu = $('#id_act_editfom').val();
				var actu = $('#act_editfom').val();
 				
 				// ajax upload
 				$.ajax({
                    async : false,
	                type : "POST",
	                url   : '<?php echo base_url();?>index.php/OutputControl/updateDataBuildAssy',
	                dataType : "JSON",
	                data : { 
	                	id_a:idu,
	                	act:actu
	                 },
	                success: function(response){
	                	if (response) { 
							console.log("Semua senang");
	                	}else{
	                		Swal.fire({
							  title: 'Error!',
							  text: 'Pastikan Inputan benar',
							  type: 'error',
							  confirmButtonText: 'Ok',
							  allowOutsideClick: false
							})
							console.log("Ada error");
	                	}
	                }
	            });

				$('#login-modal').modal('hide');
				showdata();
			});
			// ========== END event edit click =====================


			// ========== start event new assy Bottom + click ===================== 
			$('#tbody_outputt').on('click','.item_newassy',function(){
            	// memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
                var idr = $(this).data('idrow');
                var idcolassy = $(this).data('idcol');
                var baris = $(this).data('baris');
                var kodeassy = $(this).data('kodeassy');
                var pdo  = $('#id_pdo').val();
 				
 				// pemberitahuan new adassy
 				Swal.fire({
				  title: 'Anda Yakin?',
				  text: "anda akan menambahkan Assy("+kodeassy+") di Jam ke-"+baris,
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Ya, Tambahkan'
				}).then((result) => {
				  if (result.value) {

				  	// jika setuju ditambahkan  post
				  	$.ajax({
	                    async : false,
		                type : "POST",
		                url   : '<?php echo base_url();?>index.php/OutputControl/newDataBuildAssy',
		                dataType : "JSON",
		                data : {
		                		id_oc:idr, 
		                		id_assy:idcolassy,
		                		pdo:pdo
		                	},
		                success: function(response){
		                	if (response) { 
		                		Swal.fire(
							      'Sukses ditambah!',
							      '',
							      'success'
							    )
								console.log("Semua senang");
		                	}else{
		                		Swal.fire({
								  title: 'Error!',
								  text: 'Pastikan Sudah Connect',
								  type: 'error',
								  confirmButtonText: 'Ok',
								  allowOutsideClick: false
								})
								console.log("Ada error");
		                	}
		                }
		            });

				    showdata();
				  }
				})

            });
			// ========== END event new assy Bottom + click ===================== 

		});
	</script>
</html>