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
		 
		<!-- EFFICIENCY PLAN & RESULT -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
			<div id="container" style="height: 350px"></div>
			<br>
		</div>

		<!-- PRODUCTION PLAN & RESULT -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
			<div id="planres" style="height: 350px"></div>
			<br>
		</div>

		<!-- INTERNAL DEFFECT -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
			<div class="row">
				<div class="col-sm-12 col-md-8 col-lg-9 xs-mb-20">
					<div id="defect_container" style="min-width: 210px; height: 350px; margin: 0 auto"></div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3">
					<h5 class="mb-30 weight-500" >Top Deffect</h5>
					<!-- TOP DEFFECT -->
					<div id="topdefect_container">
						
					</div>
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
	<!-- Spedometer charts -->
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 

	<script> 
		$('document').ready(function(){

			//	var global
				const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
				const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
				let today = new Date();
				var currentYear = today.getFullYear();
				var currentMonth = today.getMonth(); 
				var currentDate = today.getDate();

			// SeT TIME Default
				//time for post data
				var datetimeNow = currentYear+'-'+(currentMonth+1)+'-'+currentDate;
				// mencari buat start &  total hari 
				var awalDay = (new Date(currentYear, currentMonth)).getDay();
		        var daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

				document.getElementById('slect_date').value=currentDate+' '+monthName[currentMonth]+' '+currentYear;
				// time Change by picker
				$('.date-pickerrr').datepicker({   
					language: "en",
					firstDay: 1,  
				    onSelect: function(selected, d, calendar) {
				    	let tod = new Date(selected); 
				    	// set on view datepicker
				    	document.getElementById('slect_date').value=tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
				    	
				    	// set default change
				    	datetimeNow = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate(); //time for post data
				    	currentYear = tod.getFullYear();
						currentMonth = tod.getMonth(); 
						currentDate = tod.getDate();

						// UPDATE VAR mencari buat start &  total hari 
						awalDay = (new Date(currentYear, currentMonth)).getDay();
				        daysInMonth = 32 - new Date(currentYear, currentMonth, 32).getDate();

				        alert(awalDay+'/'+daysInMonth);
				    	calendar.hide();
				    	show();
				    }
				});
 			

			//  AUTO LOAD
			show();

			function show() { 

				// VAR LOCAL
					var prodPlan = [];
					var plan = [];
					var bal = 0;

				// EFF &
	            	var options ={
	            		title: {
					        text: 'Efficiency Plan & Result'
					    }, 
					    chart: {
					        renderTo: 'container'
					    }, 
					    yAxis: {
					        title: {
					            text: 'Efficiency %'
					        }
					    },legend: {
							layout: 'vertical',
							align: 'left',
							verticalAlign: 'top',
							x: 70,
							y: -10,
							floating: true,
							borderWidth: 1,
							backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
						},
					    xAxis: {
					    	type: 'datetime',
							min: Date.UTC(currentYear, currentMonth, awalDay),
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
					    		name: 'Target Efficiency',
						        data: (
						        	function(){
							        	var da = [];  
							        	$.ajax({ 
							        		async : false,
						                    type  : 'POST',
						                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
						                    dataType : 'JSON', 
						                    data:{
						                    	tgl: datetimeNow
						                    },
						                    success : function(res){  
						                    	if (res) {  
						                    		var i = awalDay;
										        	for ( i ; i <= daysInMonth; i++) { 

										        		var a = [Date.UTC(currentYear, currentMonth, i), parseFloat(res.efisiensi) ];
										        		
										        		da.push(a);
										        	} 
						                    	} 
						                    }
						                });  

							        	return da;
						        	}()
						        ),
						        color: '#57BF32'
					    	},
					    	{ 	
					    		name: 'Shift A',
						        data: (
						        	function(){
							        	var da = []; 

							        	$.ajax({ 
							        		async : false,
						                    type  : 'POST',
						                    url   : '<?php echo base_url();?>index.php/Summary/getThisMonthEffA',
						                    dataType : 'JSON', 
						                    data:{
						                    	tgl: datetimeNow
						                    },
						                    success : function(res){  
						                    	for (var i = 0 ; i < res.length ; i++) { 
										        	//parsing tanggal
										        	const tgl = new Date(res[i].tanggal);

										    var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(res[i].direct_eff) ]; 
	 
										        	da.push(a);
										        }	
						                    }
						                });    
							        	return da;
						        	}()
						        ),
						        color: '#EA6639'
					    	} ,
					    	{ 	
					    		name: 'Shift B',
						        data: (
						        	function(){
							        	var da = []; 

							        	$.ajax({ 
							        		async : false,
						                    type  : 'POST',
						                    url   : '<?php echo base_url();?>index.php/Summary/getThisMonthEffB',
						                    dataType : 'JSON',
						                    data:{
						                    	tgl: datetimeNow
						                    }, 
						                    success : function(res){  
						                    	for (var i = 0 ; i < res.length ; i++) { 
										        		//parsing tanggal
										        		const tgl = new Date(res[i].tanggal);

										    var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(res[i].direct_eff) ]; 
	 
										        		da.push(a);
										        }	
						                    }
						                });    

							        	return da;
						        	}()
						        ),
						        color: '#199DBD'
					    	} 
					    ],
					    tooltip: { 
					        formatter: function() {
					        	// console.log(this.point.series.data);
					        	var gmt = new Date(this.point.x);
					        	// console.log(gmt);
					        	var tgl = days[gmt.getDay()]+','+gmt.getDate()+'-'+gmt.getMonth()+'-'+gmt.getFullYear();
						 	    return '<b>'+this.point.series.name+'</b><br/>'+
							        // 'Efficiency : '+Highcharts.numberFormat(this.point.series.data, 0)+'%<br>Tgl :'+
							        'Efficiency : '+(this.point.y).toFixed(1)+'%<br>Tgl : '+tgl;
							}
					    },
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

            	// Plan & RESULT
            		// isis data balance  
	            		$.ajax({ 
			        		async : false,
		                    type  : 'POST',
		                    url   : '<?php echo base_url();?>index.php/Summary/getProdBalance',
		                    dataType : 'JSON', 
		                    data:{
		                    	tanggal: datetimeNow
		                    },
		                    success : function(result){   

						    	for (var i =0 ; i < result.length ; i++) {   
					        		const tgl = new Date(result[i].time); 

									var pro = {
										 tanggal: (tgl.getFullYear()+'-'+tgl.getMonth()+'-'+tgl.getDate()), 
										 sisa: bal,
										 balance: Number(result[i].balance)+bal,
										 to_plan: result[i].to_plan,
										 to_act: result[i].to_actual
										 
										};
					        		bal = Number(result[i].balance)+bal;

					        		prodPlan.push(pro);
					        	} 
		                    }
		                });  
            		// config chart
        		    var panres ={
		            		title: {
						        text: 'PRODUCTION PLAN & RESULT'
						    }, 
						    chart: {
						        renderTo: 'planres'
						    }, 
						    yAxis: {
						        title: {
						            text: 'Total Units Assy'
						        }
						    },legend: {
								layout: 'horizontal',
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
								min: Date.UTC(currentYear, currentMonth, awalDay),
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
						    		name: 'Normal Target',
							        data: (
							        	function(){
								        	var da = [];  
								        	$.ajax({ 
								        		async : false,
							                    type  : 'POST',
							                    url   : '<?php echo base_url();?>index.php/Target/getThisMonth',
							                    dataType : 'JSON', 
							                    data:{
							                    	tgl: datetimeNow 
							                    },
							                    success : function(res){  
							                    	if (res) {  
							                    		var i = awalDay;
											        	for ( i ; i <= daysInMonth; i++) { 

											        		var a = [Date.UTC(currentYear, currentMonth, i), parseFloat(res.plan_assy) ];
											        		
											        		da.push(a);
											        	} 
							                    	} 
							                    }
							                });   
								        	return da;
							        	}()
							        ),
							        color: '#57BF32'
						    	},
						    	{ 	
						    		name: 'Shift A',
							        data: (
							        	function(){
								        	var da = []; 

								        	$.ajax({ 
								        		async : false,
							                    type  : 'POST',
							                    url   : '<?php echo base_url();?>index.php/Summary/getTotActPlanProductA',
							                    dataType : 'JSON', 
							                    data:{
							                    	tgl: datetimeNow 
							                    },
							                    success : function(res){  
							                    	for (var i = 0 ; i < res.length ; i++) { 
											        		//parsing tanggal
											        		const tgl = new Date(res[i].time);

													var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(res[i].actual)];
													var aa = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(res[i].plan)]; 
		 													
		 													plan.push(aa);
											        		da.push(a);
											        }	
							                    }
							                });   
							                // console.log(da) ;
								        	return da;
							        	}()
							        ),
							        dataPlan:(function(){
							        	return plan;
							        }()
							        ),
							        color: '#EA6639'
						    	} ,
						    	{ 	 
						    		name: 'Shift B',
							        data: (
							        	function(){
								        	var da = []; 

								        	$.ajax({ 
								        		async : false,
							                    type  : 'POST',
							                    url   : '<?php echo base_url();?>index.php/Summary/getTotActPlanProductB',
							                    dataType : 'JSON', 
							                    data:{
							                    	tgl: datetimeNow 
							                    },
							                    success : function(res){  

							                    	for (var i = 0 ; i < res.length ; i++) { 
											        		//parsing tanggal
											        		const tgl = new Date(res[i].time);

											    var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(res[i].actual) ]; 
		 
											        		da.push(a);
											        }	
							                    }
							                });    

								        	return da;
							        	}()
							        ),
							        color: '#199DBD'
						    	} 
						    ],
						    tooltip: { 
						        formatter: function() {
						        	var html='';
						        	// console.log(this.point.series.data);
						        	var gmt = new Date(this.point.x); 
						        	point_gmt = gmt.getFullYear()+'-'+gmt.getMonth()+'-'+gmt.getDate(); 

						        	var pointData = prodPlan.find(row => row.tanggal == point_gmt);
						        	
						        	// jika point belum ada data
						        	if (!pointData) {
						        		pointData ={
						        			balance: 'data not found',
						        			sisa:bal,
						        			to_plan: 'data not found',
						        			to_act: 'data not found'
						        		};
						        	} 
						        	// membuat format tanggal
						        	var tgl = days[gmt.getDay()]+','+gmt.getDate()+'-'+monthName[gmt.getMonth()]+'-'+gmt.getFullYear();

						        	//membedakan tooltip
						        	if (this.point.series.name=='Normal Target') {
						        		html ='<b>'+this.point.series.name+'</b><br/>'+
								        'Target : '+this.point.y+' <b>units</b><br> Total Plan : '+
								         pointData.to_plan+'<br> Total Actual : '+
								         pointData.to_act+'<br> Sisa sebelumnya : '+
								         pointData.sisa+'<br> Balance: '+
								         pointData.balance+'<br>Tgl : '+
								         tgl;
						        	}else{
						        		html ='<b>'+this.point.series.name+'</b><br/>'+
								        'Actual : '+this.point.y+' <b>units</b><br> Balance: '+pointData.balance+'<br>Tgl : '+tgl;
						        	} 

								    return html;
								}
						    },
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

			        var chart = new Highcharts.Chart(panres); 

			    // INTERNAL DEFECT
			    	// variabel local
			    		var defA = [];
			    		var defB = [];

			    	var opt_indef = {
		            		title: {
						        text: 'Internal Deffect'
						    }, 
						    chart: {
						        renderTo: 'defect_container',
						        type: 'areaspline'
						    }, 
						    yAxis: {
						        title: {
						            text: 'Total Deffect',
						            gridLineDashStyle: 'longdash'
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
								min: Date.UTC(currentYear, currentMonth, awalDay),
								max: Date.UTC(currentYear, currentMonth, daysInMonth),
								tickInterval: 24 * 3600 * 1000, // 1 day
								labels: {
									step: 1,
								    style: {
								      fontSize: '13px',
								      fontFamily: 'Arial,sans-serif'
								    }
								},plotBands: [{
									from: 4.5,
									to: 6.5,
								}],
								gridLineDashStyle: 'longdash',
				                gridLineWidth: 1,
				                crosshair: false
						    },
						    series: [
						    	{ 	 
						    		name: 'Shift A',
							        data: (
							        	function(){
								        	var da = []; 

								        	$.ajax({ 
								        		async : false,
							                    type  : 'POST',
							                    url   : '<?php echo base_url();?>index.php/Summary/getDataPerPdoA',
							                    dataType : 'JSON', 
							                    data:{
							                    	tgl: datetimeNow 
							                    },
							                    success : function(res){  

							                    	for (var i = 0 ; i < res.length ; i++) { 
											        		//parsing tanggal
											        		const tgl = new Date(res[i].tanggal);
											        		var to = 0;
											        		var isi = [];

											        		// get data total
											        		$.ajax({ 
												        		async : false,
											                    type  : 'POST',
											                    url   : '<?php echo base_url();?>index.php/Summary/getDataQCPerPdo',
											                    dataType : 'JSON', 
											                    data:{
											                    	id: res[i].id 
											                    },
											                    success : function(res){   
											                    	for (var o = 0; o < res.length; o++) { 
											                    		to = res[o].tot_this;
											                    		var is = {code: res[o].code,total: res[o].total};
											                    		isi.push(is);
											                    	} 
											                    }
											                });  
											        	// mengisi data untuk tooltip
											        	var tmp = { tgl: (tgl.getFullYear()+'-'+tgl.getMonth()+'-'+tgl.getDate()),data: isi,tot:to };
											        	defA.push(tmp);


											        	// data series
											    		var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(to) ]; 
		 
											        		da.push(a);
											        }	
							                    }
							                });
								        	console.log(defA);

								        	return da;
							        	}()
							        ),
							        color: '#f5956c'
						    	},
						    	{ 	 
						    		name: 'Shift B',
							        data: (
							        	function(){
								        	var da = []; 

								        	$.ajax({ 
								        		async : false,
							                    type  : 'POST',
							                    url   : '<?php echo base_url();?>index.php/Summary/getDataPerPdoB',
							                    dataType : 'JSON', 
							                    data:{
							                    	tgl: datetimeNow 
							                    },
							                    success : function(res){  

							                    	for (var i = 0 ; i < res.length ; i++) { 
											        		//parsing tanggal
											        		const tgl = new Date(res[i].tanggal);
											        		var to = 0;
											        		var isi = [];
											        		// get data total
											        		$.ajax({ 
												        		async : false,
											                    type  : 'POST',
											                    url   : '<?php echo base_url();?>index.php/Summary/getDataQCPerPdo',
											                    dataType : 'JSON', 
											                    data:{
											                    	id: res[i].id 
											                    },
											                    success : function(res){   
											                    	for (var o = 0; o < res.length; o++) { 
											                    		to = res[o].tot_this;
											                    		var is = {code: res[o].code,total: res[o].total};
											                    		isi.push(is);
											                    	} 
											                    }
											                });  
											        	// mengisi data untuk tooltip
											        	var tmp = { tgl: (tgl.getFullYear()+'-'+tgl.getMonth()+'-'+tgl.getDate()), data: isi, tot:to };
											        	defB.push(tmp);

											        	// data series
											    		var a = [Date.UTC(tgl.getFullYear(),tgl.getMonth(),tgl.getDate()), parseFloat(to) ]; 
		 
											        		da.push(a);
											        }	
							                    }
							                });
								        	console.log(defB);

								        	return da;
							        	}()
							        ),
							        color: '#199DBD'
						    	},
						    ],
						    tooltip: { 
						        formatter: function() {
						        	var html='';
						        	// console.log(this.point.series.data);
						        	var gmt = new Date(this.point.x); 
						        	point_gmt = gmt.getFullYear()+'-'+gmt.getMonth()+'-'+gmt.getDate(); 

						        	var pointData = defA.find(row => row.tgl == point_gmt);
						        	var pointDataB = defB.find(row => row.tgl == point_gmt);
						        	
						        	// jika point belum ada data
						        	if (!pointData) {
						        		pointData ={
						        			tot: 'data not found',
						        			data: []
						        		};
						        	} 
						        	// jika point belum ada data
						        	if (!pointDataB) {
						        		pointDataB ={
						        			tot: 'data not found',
						        			data: []
						        		};
						        	} 


						        	// membuat format tanggal
						        	var tgl = days[gmt.getDay()]+','+gmt.getDate()+'-'+monthName[gmt.getMonth()]+'-'+gmt.getFullYear();

						        	//  A
						        	html ='Tgal : '+tgl+'<br>'+
						        	'<b>Shift A</b> : '+pointData.tot+'<br>';
						        		for (var i = 0; i < pointData.data.length; i++) {
						        			html +=
						        				'🔘 '+pointData.data[i].code+' : '+pointData.data[i].total+'<br>';
						        		}

						        	//  B
						        	html +=
						        	'<b>Shift B</b> : '+pointDataB.tot+'<br>';
						        		for (var i = 0; i < pointDataB.data.length; i++) {
						        			html +=
						        				'🔘 '+pointDataB.data[i].code+' : '+pointDataB.data[i].total+'<br>';
						        		}

								    return html;
								}
						    },
						    plotOptions: {
								areaspline: {
									fillOpacity: 0.6
								}
							}
		            	}; 
			    	var chart_internalDeff = new Highcharts.Chart(opt_indef); 

			    //top global DEFECT
			    	$.ajax({ 
		        		async : false,
	                    type  : 'POST',
	                    url   : '<?php echo base_url();?>index.php/Summary/getTopDefect',
	                    dataType : 'JSON', 
	                    data:{
	                    	tgl: datetimeNow 
	                    },
	                    success : function(res){   
	                    	var html='';
	                    	var to=0;
	                    	var warna = ['bg-light-orange','bg-light-purple','bg-light-green'];
	                    	var max = 3;

	                    	if (res.length<3) { max = res.length; }

	                    	for (var z = 0 ; z < res.length ; z++) { to += Number(res[z].top); }
	                    	
	                    	for (var i = 0 ; i < max ; i++) {  
	                    		var wid = (res[i].top/to)*100; 

					        	html +=
	                    		'<div class="mb-30">'+
									'<p class="mb-5 font-18">'+res[i].keterangan+'</p>'+
									'<div class="row">'+
										'<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">'+
											'<div class="progress border-radius-0" style="height: 10px;">'+
												'<div class="progress-bar '+warna[i]+'" role="progressbar" style="width: '+wid+'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>'+ 
											'</div>'+
										'</div>'+
										'<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-left: -20px; margin-top: -7px;">'+
											res[i].top+
										'</div>'+
									'</div>'+
								'</div>';
					        }
					        $('#topdefect_container').html(html);
	                    }
	                });



			}


		});
	</script>
</html>