<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDO Dashboard</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	 <!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	 
</head>
<body> 
<input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>"> 
<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?>


<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">

		<!-- DAILY SUMMARY QCD-->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 text" >  
			<H2 class="text-center">Daily Summary QCD</H2>
			<div class="pull-right" style="margin-top: -30px;">
				<button id="donload_qcd" class="btn btn-primary btn-sm"><i class="icon-copy fa fa-download" aria-hidden="true"></i> Download</button>
			</div>
			<hr>
			<h5 id="tgl_qcd">Tanggal : Rabu, 10 July 2019</h5>
			<h5 id="shift_qcd">Shift &nbsp&nbsp&nbsp&nbsp&nbsp: A</h5>
			<h5 id="line_qcd">Line &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 1B</h5>
			<h5 id="status_qcd">Status  &nbsp&nbsp: Checked</h5> 
			 <br>
			<div class="row"> 
				<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20"> 
					<table class="table table-hover table-bordered">
						<thead>
							<th>No</th>
							<th>Assy</th>
							<th>Total Output</th>
							<th>UMH</th>
							<th>Total MHOUT</th>
						</thead>
						<tbody id="tbody_qcd">
							
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3">
					<table class="table table-active table-bordered"> 
						<tbody>
							<tr>
								<th>MH OUT</th>
								<td id="id_mhout_qcd">220</td>	
							</tr>
							<tr>
								<th>MH IN DL</th>
								<td id="id_mhindl_qcd">320</td>	
							</tr>
							<tr>
								<th>MH IN IDL</th>
								<td id="id_mhinidl_qcd">40</td>	
							</tr>
							<tr>
								<th>Direct EFF</th>
								<td id="id_directeff_qcd">93%</td>	
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
		</div>

		<!-- DAILY DOWNTIME SUMMARY-->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30 text" >  
			<H2 class="text-center">Daily Summary Downtime</H2> 
			<hr>
			<h5 id="tgl_downtime">Tanggal : Rabu, 10 July 2019</h5>
			<h5 id="shift_downtime">Shift &nbsp&nbsp&nbsp&nbsp&nbsp: A</h5>
			<h5 id="line_downtime">Line &nbsp&nbsp&nbsp&nbsp&nbsp: 1B</h5>
			<h5 id="status_downtime">Status  &nbsp&nbsp: Checked</h5> 
			 <br>
			<div class="row"> 
				<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20"> 
					<table class="table table-hover table-bordered">
						<thead>
							<th>Jam Ke</th>
							<th>Kode</th>
							<th>Problem</th>
							<th>Keterangan</th>
							<th>Durasi</th>
							<th>Type</th>
						</thead>
						<tbody id="tbody_downtime">
							
						</tbody>
					</table>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3">
					<table class="table table-active table-bordered"> 
						<tbody>
							<tr>
								<th>Jam Effective</th>
								<td id="id_jameff_downtime">220</td>	
							</tr>
							<tr>
								<th>Prosentase Losstime</th>
								<td id="id_ploss">320</td>	
							</tr>
							<tr>
								<th>Total Losstime</th>
								<td id="id_tolsstime">40</td>	
							</tr>
							<tr>
								<th>Total Exclude</th>
								<td id="id_to_exc">93%</td>	
							</tr>
						</tbody>
					</table>
				</div>
			</div>
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
			// variabel global	
				// deklarasi nama bulan
	 			const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
	 			const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

	 			var today = new Date();
				var currentMonth = today.getMonth();
				var currentYear = today.getFullYear();
				var currDate = today.getDate(); 
				var pdo_id = $('#id_pdo').val();

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

				$('.date-pickerrr').datepicker({   
					language: "en",
					firstDay: 1,   
				    onSelect: function(selected, d, calendar) {   
				    	// jika yang dipilih sama 
				    	if (selected=='') {
				    		today = new Date(datetimeNow);
				    		var tod = new Date(datetimeNow);  

				    		document.getElementById('slect_date').value=  daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
				    		calendar.hide();
				    		return ;
				    	}else{
				    		today = new Date(selected);
				    		var tod = new Date(selected); 
					    	document.getElementById('slect_date').value= daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
					    	datetimeNow = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate();
				    	} 
				    	calendar.hide();

				    	// refresh 
				    	cariDataPdo()
				    }
				});
			// PILIH SHIFTY
				$('#drop_shiftt').on('click','.pilih_sf',function(){
					var ssf = $(this).data('value'); 

					document.getElementById('id_sifname').innerHTML= ssf;
					if (ssf=='A') {
						document.getElementById('sf_a').classList.add("aktip");
						document.getElementById('sf_b').classList.remove("aktip");
						document.getElementById('shift_qcd').innerHTML= "Shift &nbsp&nbsp&nbsp&nbsp&nbsp:  A";
						document.getElementById('shift_downtime').innerHTML= "Shift &nbsp&nbsp&nbsp&nbsp&nbsp:  A";
					} else{
						document.getElementById('sf_b').classList.add("aktip");	
						document.getElementById('sf_a').classList.remove("aktip");
						document.getElementById('shift_qcd').innerHTML= "Shift &nbsp&nbsp&nbsp&nbsp&nbsp: B";
						document.getElementById('shift_downtime').innerHTML= "Shift &nbsp&nbsp&nbsp&nbsp&nbsp: B"; 
					}
					name_shift = ssf;

					cariDataPdo()
				});
			// ====  AUTOLOAD =====
				var name_shift = document.getElementById('id_sifname').innerHTML;
				document.getElementById('line_qcd').innerHTML= "Line &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: "+document.getElementById('name_line').innerHTML;
				document.getElementById('line_downtime').innerHTML= "Line &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: "+document.getElementById('name_line').innerHTML;


				cariDataPdo();


			function loadData() {
				
				// hari di Tampilan
				document.getElementById('tgl_qcd').innerHTML= 'Tanggal : '+daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;
				document.getElementById('tgl_downtime').innerHTML= 'Tanggal : '+daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;
				
				$.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/Export/getDataSummaryQcd', 
                    dataType: "JSON",
                    data: {
                    	id_pdo:pdo_id
                    },
                    success : function(res){    
                    	console.log(res);
                    	// clear tabel
                    	$('#tbody_qcd').html('');

                    	for (var i = 0; i < res.length; i++) {
                    		var $tr = 
                    				$('<tr>').append(
	                    				$('<td>').text((i+1)),
							            $('<td>').text(res[i].kode_assy),
							            $('<td>').text(res[i].jumlah),
							            $('<td>').text(res[i].umh),
							            $('<td>').text(parseFloat(res[i].total).toFixed(2))
				        			); //.appendTo('#records_table');
                    		$tr.appendTo('#tbody_qcd');
                    	}
                    	 
                    } 
                });  
				showDowntims(pdo_id);
			}

			function showDowntims(pdo_id){
	            	console.log('show called'); 
                $.ajax({
                    async :false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/Losstime/getLosstimeUser',
                    dataType : 'json',
                    data : {id_pdo:pdo_id},
                    success : function(respon){ 
                    	console.log('ini downtime');
                    	console.log(respon);
                        var i;
                        var data = respon.data_downtime; 

                        $('#tbody_downtime').html(''); 
                        for(i=0; i<data.length; i++){ 
                        	x = data[i].durasi*60;
                        	menit = (x%3600)/60;
                        	detik = (x%3600)%60;
                        	var duras = Math.floor(menit)+' Menit '+Math.floor(detik)+' Detik';
                            var $tr =
                            		$('<tr>').append(
                            			$('<td>').text(data[i].jam_ke),
                            			$('<td>').text(data[i].kode),
                            			$('<td>').text(data[i].problem),
                            			$('<td>').text(data[i].keterangan),
                            			$('<td>').text( duras),
                            			$('<td>').text(data[i].jenis) 
                            			); 
                            $tr.appendTo('#tbody_downtime');
                        } 
                        // SETTTING INFO
                        document.getElementById('id_jameff_downtime').innerHTML = parseFloat(respon.widgettt.jam_iff).toFixed(1)+' Jam';
                        document.getElementById('id_ploss').innerHTML = parseFloat(respon.widgettt.losspercent).toFixed(2)+' %';
                        document.getElementById('id_tolsstime').innerHTML= ((respon.widgettt.to_loss)/60).toFixed(2)+' jam';
	                    document.getElementById('id_to_exc').innerHTML= ((respon.widgettt.to_exc)/60).toFixed(2)+' jam';
                    }
                }); 
	            }


			function cariDataPdo() { 

					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataCari',
	                    dataType : 'JSON', 
	                    data:{
	                    	name_sif: name_shift,
	                    	tgl: datetimeNow
	                    },
	                    success : function(res){   

	                    	if (res) { 
	                    		// cek jika itu bukan miliknya
	                    		if ($('#id_users').val()==res.id_users) { 
	                    			console.log('MILIKNYA') ;

	                    		}else { 
	                    			console.log('not YOU');  
	                    		}   
	                    		pdo_id = res.id_pdo; 

	                    		if (res.status==1) {
	                    			document.getElementById('status_qcd').innerHTML = 'Status  &nbsp&nbsp: <span class="badge badge-success">Checked</span>';
	                    			document.getElementById('status_downtime').innerHTML = 'Status  &nbsp&nbsp: <span class="badge badge-success">Checked</span>';	
	                    		}else {
	                    			document.getElementById('status_qcd').innerHTML = 'Status  &nbsp&nbsp: <span class="badge badge-danger">Un-Checked</span>';	
	                    			document.getElementById('status_downtime').innerHTML = 'Status  &nbsp&nbsp: <span class="badge badge-danger">Un-Checked</span>';	
	                    		}
	                    		
	                    		// setttt
	                    		document.getElementById('id_mhout_qcd').innerHTML = parseFloat(res.mh_out).toFixed(2);
	                    		document.getElementById('id_mhindl_qcd').innerHTML = parseFloat(res.mh_in_dl).toFixed(2);
	                    		document.getElementById('id_mhinidl_qcd').innerHTML = parseFloat(res.mh_in_idl).toFixed(1);
	                    		document.getElementById('id_directeff_qcd').innerHTML = parseFloat(res.direct_eff).toFixed(1)+'%';

	                    		console.log(res); 	
	                    		loadData();
	                    	}else {
	                    		console.log('is null');  
	                    	}
	                    	
	                    }
	                });	
 			}


 			// BTN DOWNLOAD
	 			$('#donload_qcd').on('click',function(){ 
					$.ajax({
	                    async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/ExcelExport/downloadqcd', 
	                    data: {
	                    	id_pdo:pdo_id
	                    },
	                    success : function(res){   
	                    	window.location.href= res;
	                    } 
	                });  
				});


		});
	</script>
</html>