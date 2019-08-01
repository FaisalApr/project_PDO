<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users Dashboard</title>  
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">c
	 <!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css"> 
 	
</head>
<body>  
 

<?php $this->load->view('header/header_users'); ?>
<?php $this->load->view('header/sidebar_users'); ?>

	
	<br><br><br><br><br><br>
	<input type="text" id="inputsss">
 

</body>
	<!-- Script Main -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>  

	<script> 
		$('document').ready(function(){ 
			
			// $('input[type="text"]').keydown(function(e){
			//    var ingnore_key_codes = [8,32,13,46, 65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,   48,49,50,51,52,53,54,55,56,57];
			//    if ($.inArray(e.keyCode, ingnore_key_codes) >= 0){
			//       e.preventDefault();
			//    }
			// });

			$("#inputsss").on("keydown keypress keyup", false);
 

			inputsss.onchange = function(event) {
			    inputsss.select();
			    alert(this.value); 

			    return false;
			};

			document.getElementById( "inputsss" ).focus();

			var alwaysFocusedInput = document.getElementById( "inputsss" );

			alwaysFocusedInput.addEventListener( "blur", function() {
			  setTimeout(() =>{
			    alwaysFocusedInput.focus();
			  }, 0);
			});

		});
	</script>
</html>