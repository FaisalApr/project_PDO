 <!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
 
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/styles/login_styles.css">
</head>
<body style="background-image: url(<?php echo base_url('assets/src/wp/wp.jpg') ?>);"> 
	
<div class="container" id="id_content">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3> 
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="icon-copy fa fa-user"></i></span>
						</div>
						<input id="un_input" type="text" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="icon-copy fa fa-key" aria-hidden="true"></i></span>
						</div>
						<input id="pwd_input" type="password" class="form-control" placeholder="password">
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<br>
					<div class="form-group">
						<a id="btn_login"  class="btn float-right login_btn">Login</a> 
					</div>
				</form>
			</div>
			<!-- <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
</body>
<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script> 
<!-- add sweet alert js & css in footer -->
<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  
<script type="text/javascript">
	$(document).ready(function(){


		$('#btn_login').click(function(){
			var u = $('#un_input').val();
			var pwd = $('#pwd_input').val();

			if (u.length==0 || pwd.length==0) {
				return;
			}
			Swal.fire({
			  position: 'center',
			  title: 'Mohon Tunggu..',
			  type: 'info',
			  text: 'Permintaan sedang di Proses...',  
			  showConfirmButton: false,
			  allowOutsideClick: false
			})
			// hidden contenr
			document.getElementById('id_content').style.display = 'none';
			$.ajax({
				async: false,
				type : "POST",
				url:'<?php echo site_url('Login/cekLogin') ?>',
				dataType: "JSON",
				data: {
					usr: u,
					pwd: pwd
				},
				success: function(data){ 
					// console.log(data);
					// return;
					// jika tidak error / pass benar
					if (!data.error) {
						Swal.close();
						Swal.fire({
						  position: 'center',
						  title: 'Mohon Tunggu..',
						  type: 'info',
						  text: data.message ,  
						  showConfirmButton: false,
						  allowOutsideClick: false
						})
						setTimeout(function(){
							
							setTimeout(' window.location.href = "<?php echo site_url('Dasboard'); ?>" ');
						},2000);
						console.log("pass");
					}else{
						Swal.close();
						Swal.fire({
						  title: 'Username & Password Salah !',
						  text: 'Pastikan username dan password yang anda masukkan benar.',
						  type: 'error',
						  confirmButtonText: 'Ok',
						  allowOutsideClick: false
						}).then(function(){
							// hidden contenr
							document.getElementById('id_content').style.display = 'block';
						}); 
					}
				}
			});

		});

	});
</script>
</html>