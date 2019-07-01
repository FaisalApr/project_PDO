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

			let today = new Date();
			let currentMonth = today.getMonth();
			let currentYear = today.getFullYear();

			let firstDay = (new Date(currentYear, currentMonth)).getDay();
	        let daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

			show();

			function show() { 

				// declare options
            	var options ={
            		title: {
				        text: 'Efficiency Plan & Result'
				    }, 
				    chart: {
				        renderTo: 'container'
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
				    	type: 'datetime',
						min: Date.UTC(currentYear, currentMonth, firstDay),
						max: Date.UTC(currentYear, currentMonth, daysInMonth),
						tickInterval: 24 * 3600 * 1000, // 1 day
						labels: {
							step: 1,
						    style: {
						      fontSize: '13px',
						      fontFamily: 'Arial,sans-serif'
						    }
						}
				    },
				    series: [ 
				    	{ 	
				    		name: 'Target Planing',
					        data: (
					        	function(){
						        	var da = [];  
						        	$.ajax({ 
						        		async : false,
					                    type  : 'ajax',
					                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
					                    dataType : 'JSON', 
					                    success : function(res){  
					                    	if (res) {  
					                    		var i = firstDay;
									        	for ( i ; i <= daysInMonth; i++) { 

									        		var a = [Date.UTC(currentYear, currentMonth, i), parseFloat(res.efisiensi) ];
									        		
									        		da.push(a);
									        	} 
					                    	} 
					                    }
					                });  

						        	return da;
					        	}()
					        )
				    	},
				    	{ 	
				    		name: 'Shift A',
					        data: (
					        	function(){
						        	var da = [];  
						        	$.ajax({ 
						        		async : false,
					                    type  : 'ajax',
					                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
					                    dataType : 'JSON', 
					                    success : function(res){  
					                    	if (res) {  
					                    		var i = firstDay;
									        	for ( i ; i <= daysInMonth; i++) { 

									        		var a = [Date.UTC(currentYear, currentMonth, i), i ];
									        		
									        		da.push(a);
									        	} 
					                    	} 
					                    }
					                });  

						        	return da;
					        	}()
					        )
				    	} 
				    ],
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
	</script>
</html>