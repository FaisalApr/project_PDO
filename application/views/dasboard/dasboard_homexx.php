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

	<!-- Google Font -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">

</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
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
			<table class="table table-striped table-bordered">
				<thead id="thead_outputt"> 
					<tr> 
						<th colspan="4" style="text-align: center;">Assy</th>  
						<th>58831</th>  
						<th style="border: none;">
							<button href="#" class="btn" data-toggle="modal" data-target="#modalnewassy"  type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Assy <i class="icon-copy fa fa-plus" ></i></button>
						</th>
					</tr>
					<tr> 
						<th colspan="4" style="width: 45%; text-align: center;">UMH</th>  
						<th>3.5583275</th> 
					</tr>
					<tr> 
						<th scope="col" colspan="2" style="width: 5%; text-align: center;">Jam Ke-</th>
						<th scope="col" style="width: 5%;">Plan</th> 
						<th scope="col" style="width: 5%;">Act</th> 
						<th scope="col" align="center" >A</th> 
						<th style="width: 5%; border: none;"></th>
						<th style="width: 100%; border: none;"></th>
					</tr>
				</thead>
				<tbody id="tbody_outputt">
					<tr>
						<th scope="row" colspan="2" style="text-align: center;">1</th>
						<td>10</td> 
						<td>11</td>  
						<td>11</td> 
					</tr> 
					<tr>
						<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn" data-toggle="modal" data-target="#modalnewact" type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Jam <i class="icon-copy fa fa-plus" ></i></button></td>
						<th scope="row">Total</th>
						<th scope="row">10</th>
						<th scope="row">11</th>
						<th scope="row">11</th>
					</tr> 
					<tr>  
						<th scope="row" colspan="3">MH Out</th> 
						<th scope="row">64.7147</th>
					</tr> 
					
				</tbody>
			</table>
			<br>
		</div>

	</div>
</div>
 

<!-- Modall -->

<!-- Modal Add Jam -->
<div class="modal fade" id="modalnewact">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Jam Baru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
			</div>
			<div class="modal-body">
				<div class="input-group custom input-group-lg">
					<label>Kam Ke- :</label>
					<input id="nameAct" type="number" class="form-control" style="text-align: left;" placeholder="Jam Ke-"> 
				</div>
				<div class="form-group">
					<label>Planning :</label>
					<input id="nameAct" type="number" class="form-control" style="text-align: left;" placeholder="Jumlah Planning">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Add Assy -->
<div class="modal fade" id="modalnewassy">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Assy</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
			</div>
			<div class="modal-body">
				<div class="input-group custom input-group-lg">
					<label>Kam Ke- :</label>
					<input id="nameAct" type="number" class="form-control" style="text-align: left;" placeholder="Jam Ke-"> 
				</div>
				<div class="form-group">
					<label>Planning :</label>
					<input id="nameAct" type="number" class="form-control" style="text-align: left;" placeholder="Jumlah Planning">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 

	<script> 
		$('document').ready(function(){
			// auto load
			showdata();


			function showdata() { 
				$.ajax({
                    async : false,
                    type  : 'ajax',
                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataOutputControl',
                    dataType : 'JSON',
                    success : function(data){
                        var html = '';
                        var t_plan=0;
                        var t_act=0;


                        for(var i=0; i<data.length; i++){

                        	$.ajax({
			                    async : false,
			                    type  : 'ajax',
			                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataBuildAssy',
			                    dataType : 'JSON',
			                    success : function(data){

			                    	
			                    }
			                });

                            html +=  
                            '<tr>'+
								'<th scope="row" colspan="2" style="text-align: center;">'+data[i].jam_ke+'</th>'+
								'<td>'+data[i].plan+'</td>'+
								'<td>'+data[i].actual+'</td>'+
								'<td>'+data[i].actual+'</td>'+
							'</tr>';

  							// total
  							t_plan += Number(data[i].plan);
  							t_act += Number(data[i].actual);
                        }

                        html +=
                        	'<tr>'+
								'<td rowspan="2" style="border: none;" align="center"><button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalnewact" type="button" data-bgcolor="#4CAF50" data-color="#ffffff">Tambah Jam <i class="icon-copy fa fa-plus" ></i></button></td>'+
								'<th scope="row">Total</th>'+
								'<th scope="row">'+t_plan+'</th>'+
								'<th scope="row">'+t_act+'</th>'+
								'<th scope="row">11</th>'+
							'</tr>'+
							'<tr>'+
								'<th scope="row" colspan="3">MH Out</th>'+
								'<th scope="row">64.7147</th>'+
							'</tr>';

                        $('#tbody_outputt').html(html);            
                    }
                }); 

			}



		});
	</script>
</html>