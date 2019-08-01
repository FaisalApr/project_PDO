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
	<!-- JQUERY STEP -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">
	
	<!-- HTML CANVAS  -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/src/plugins/html2canvas-master/dist/html2canvas.js"></script>

	<!-- SELEct 2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.min.css">
	<!-- DATE PICKERS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.css">

	<!-- jQuery (required) & jQuery UI + theme (optional) --> 
	<!-- keyboard extensions (optional) -->
	<link href="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/css/jquery-ui.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/css/keyboard.css" rel="stylesheet"> 


<body>
<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?> 
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<div>
			<input id="in_scan" type="text" class="form-control" placeholder="Scan">

		</div>

	</div>
</div>

	<!-- Script Main -->
		<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
		<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  
		<!-- Spedometer charts -->
		<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
		<!-- TOuch SPIN -->
		<script src="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script> 
		<!-- you load jquery somewhere before jSignature ... -->
		<script src="<?php echo base_url() ?>assets/src/plugins/jsignature-pad/js/signature_pad.umd.js"></script>
		<!-- JQuery Steps -->
		<script src="<?php echo base_url() ?>assets/src/plugins/jquery-steps/build/jquery.steps.js"></script>
		<!-- jQuery (required) & jQuery UI + theme (optional) -->  
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery-ui-custom.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery.keyboard.js"></script> 
		<script src="<?php echo base_url() ?>assets/src/plugins/Keyboard-master/js/jquery.keyboard.extension-typing.js"></script>
	 	<!-- SELECT 2 -->
		<script src="<?php echo base_url() ?>assets/src/plugins/select2/dist/js/select2.min.js"></script>
		<!-- DATE PICKER -->
		<script src="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
		
		<script>
			
		</script>
</body>
</html>