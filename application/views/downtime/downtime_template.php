<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		<!-- view tabel agenda -->
	<div class="agendaview">
		<div style="background-color: #FFF; padding: 15px;">
			<div class="boddy card">
				<center><h4 class="namatitel card-header">Losstime</h4></center>
				<div class="card-body">
					<div class="pull-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah</a></div>

					<table class="table table-striped table-bordered table-responsive-md tblcus" style="width:100%" id="agendaall">
						<thead>
							<tr style="background-color: #E8E8E8;">
							   <th style="text-align: center; width: 25%;">Jam ke</th>
							   <th style="text-align: center; width: 25%;">Problem</th>
							   <th style="text-align: center; width: 25%;">NO UJUNG, CTRL, STATION, OTHER</th>
							   <th style="text-align: center; width: 45%;">Time</th>
							   <th style="text-align: center; width: 35%">Code</th>
							   
							</tr>
						</thead>
						<tbody id="tbl_agendakegiatan" style="text-align: center;">
							
						</tbody> 
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>  <!-- end container  -->	
</div>


<!--MODAL Baru-->
    <form id="formbaru">
      <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Losstime Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>			           
            </div>
            <div class="modal-body">			              
               	<!-- form inputan nama kegiatan -->
               	<div class="form-group col-lg-12">
					<label>Jam ke</label>
					<input type="text" id="jam_id" class="form-control" placeholder="" minlength="8" required>
				</div>
				<!-- form inputan keterangan kegiatan -->
				<div class="form-group col-lg-12">
					<label>problem</label>
					<input type="text" id="jam_id" class="form-control" placeholder="" minlength="8" required>
				</div>
				<div class="form-group col-lg-12">
					<label>NO UJUNG, CTRL, STATION, OTHER</label>
					<input type="text" id="jam_id" class="form-control" placeholder="" minlength="8" required>
				</div>
            	<div class="form-group col-lg-12">
					<label>Time</label>
					<input type="text" id="jam_id" class="form-control" placeholder="" minlength="8" required>
				</div>
				<div class="form-group col-lg-12">
					<label>Code</label>
					<input type="text" id="jam_id" class="form-control" placeholder="" minlength="8" required>
				</div>
            </div>

            <div class="modal-footer">
            	<!-- inputan button simpan dan batal -->
            	<button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">Batal</button>
				<button type="submit" id="btn_push" class="btn btn-primary col-md-3">Tambah</button>
            </div>
          </div>
        </div>
      </div>
    </form>
<!--END MODAL baru-->


</body>
<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
</html>