<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.min.css" />
</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<div class="container">
			<form method="post" id="import_form" enctype="multipart/form-data">
				<p><label>Select Excel File</label>
				<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
				<br />
				<input type="submit" name="import" value="Import" class="btn btn-info" />
			</form>
		</div>

	</div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
<script>
$(document).ready(function(){

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			async: false,
			url:"<?php echo site_url(); ?>/Excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				// load_data();
				// alert(data);
				console.log(data);
			}
		})
	});

});
</script>

</body>
</html>