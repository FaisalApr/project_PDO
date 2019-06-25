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

	 <!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	 
</head>
<body> 
<input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>"> 
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>


<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		 
		<!-- Tabel -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
			<div id="container" style="height: 400px"></div>
			<br>
		</div>

	</div>
</div>
 
</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
	<!-- add sweet alert js & css in footer -->
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  
	<!-- Spedometer charts -->
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 

	<script> 
		$('document').ready(function(){

			show();

			function show() { 
				$.ajax({
                    async : false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/OutputControl/getDataOutputControl',
                    dataType : 'JSON',
                    data:{
                    	id_pdo:$('#id_pdo').val()
                    },
                    success : function(data){  

                    	// declare options
                    	var options ={
                    		title: {
						        text: 'Efficiency Plan & Result'
						    }, 
						    chart: {
						        renderTo: 'container',
						        type: 'areaspline'
						    }, 
						    yAxis: {
						        title: {
						            text: 'Jumlah Plan'
						        }
						    },legend: {
								layout: 'vertical',
								align: 'left',
								verticalAlign: 'top',
								x: 70,
								y: 20,
								floating: true,
								borderWidth: 1,
								backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
							},
						    xAxis: {
						        categories: (
						        	function(){
							        	var dat = [];
							        	for (var i = 0; i < data.length; i++) { 
							        		dat.push('Jam ke-'+data[i].jam_ke);
							        	}
							        	return dat;
						        	}()
						        	)
						        ,
								plotBands: [{
									from: 4.5,
									to: 6.5,
								}],
								gridLineDashStyle: 'longdash',
				                gridLineWidth: 1,
				                crosshair: false
						    },
						    plotOptions: {
						        series: {
						            label: {
						                connectorAllowed: false
						            }
						        }
						    }, 
						    series: [ 
						    {
						        name: 'Target Planing',
						        data: (
						        	function(){
							        	var da = [];
							        	for (var i = 0; i < data.length; i++) { 
							        		da.push(Number(data[i].plan));
							        	}
							        	return da;
						        	}()
						        	)
						    },{
						        name: 'Actual',
						        data: (
						        	function(){
							        	var da = [];
							        	for (var i = 0; i < data.length; i++) { 
							        		da.push(Number(data[i].actual));
							        	}
							        	return da;
						        	}()
						        	),
						        color: '#3C9D3E'
						    }],

						    responsive: {
						        rules: [{
						            condition: {
						                maxWidth: 500
						            },
						            chartOptions: {
						                legend: {
						                    layout: 'horizontal',
						                    align: 'center',
						                    verticalAlign: 'bottom'
						                }
						            }
						        }]
						    }
                    	};

                    	var chart = new Highcharts.Chart(options);


                    }
                });

			} 
		});
	</script>
</html>