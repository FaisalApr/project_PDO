<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PDO Dashboard</title>

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">

</head>
<body>
  <input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>">
  <?php $this->load->view('header/header_users'); ?>
  <?php $this->load->view('header/sidebar_users'); ?>
 
  <div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div class="title">
        <h4>Direct Labor</h4>
        <br>
      </div>
       
      <div class="row">

       <!-- kolom pertama -->
        <div class="col-md-3 col-sm-12">
          
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
            <div class="pull-left">
              <h5 class="text-black" style="font-size: 20px; margin-left: 5px">A.</h5>

            </div>
            <div class="project-info-right" style="margin-top: -10px">
              <a  id="btn_trig_edita" href='#' class="btn btn-success btn-sm" data-to><i class="fa fa-cog" aria-hidden="true"></i>  Edit</a> 
            </div>
            <br> 
            <!-- Table AAAAAAAAAAAA Start -->
            <table class="table table-bordered table-striped" style="margin-top: 10px" id="tbody_a"> 
                 
            </table> 
          </div>



          <!-- TABEL BBBBBBB START -->
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="pull-left">
              <h5 class="text-black" style="font-size: 20px; margin-left: 5px">B.</h5>
              <br>
            </div>

            <!-- Table Start -->
              <table class="table table-striped table-bordered"> 
                <tbody id="tbody_b">
                  
                </tbody>
              </table>
          </div>
        </div>

       <!-- kolom kedua -->
        <div class="col-md-4 col-sm-12">

          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
              <div class="pull-left">
                <h5 class="text-black" style="font-size: 20px; margin-left: 5px">C. NON OPERATING HOURS</h5><br>
              </div>
            
              <div class="pull-right">
                <div class="row clearfix">  
                <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_absen-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
                </div>
              </div>
            

              <!-- Table Start -->
                <table class="table table-bordered table-striped">
                
                <thead>
                  <tr>
                      <th style="text-align: center; vertical-align: middle;" width="20%">ITEM</th>
                      <th style="text-align: center; vertical-align: middle;" width="20%">QTY MP</th>
                      <th style="text-align: center; vertical-align: middle;" width="20%">Jam</th>
                      <th style="text-align: center; vertical-align: middle;" colspan="2" width="35%">Total (Qty MP x Jam)</th> 
                      <th style="text-align: center; vertical-align: middle;" width="20%">Action</th>
                    </tr>
                </thead>
                    
                    <tbody id="tbl_body">
                    <tr>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th colspan="2">0 </th>  
                    </tr>
                    

                    </tbody>

                </table>
          </div>

          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            
                <div class="pull-left">
                  <h5 class="text-black" style="font-size: 20px; margin-left: 5px">E. INDIRECT ACTIVITY</h5> <br>
                </div>
              
                <div class="pull-right">  
                  <div class="row clearfix">  
                    <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_absen-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
                  </div>
                </div>

                <!-- Table Start -->
                  <table class="table table-striped table-bordered">
                    <tr>
                        <th style="text-align: center" width="5%">ITEM</th>
                        <th style="text-align: center" width="20%">Qty MP</th>
                        <th style="text-align: center" width="10%">Jam</th>
                        <th style="text-align: center" width="10%" colspan="2">Total (Qty MP x Jam)</th>
                      </tr>
                      
                      <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th colspan="2">0</th>
                        
                      </tr>
                      <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th colspan="2">0</th>
                        
                      </tr>
                      <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th colspan="2">0</th>
                        
                      </tr>

                      <tr>
                        <th width="20%"> </th>
                        <th width="30%"> </th>
                        <th width="20%">Total</th>
                        <th width="15%">0</th>
                        <th width="15%" style="text-align: right;">MH</th>
                      </tr>

                  </table>
          </div>
        </div>

       <!-- kolom ketiga -->
       
        <div class="col-md-5 col-sm-12">
          <!-- row atas -->
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
              <div class="pull-left">
                <h5 class="text-black" style="font-size: 20px; margin-left: 5px">D. MP BANTUAN (IN)</h5>
                <br>
              </div>
          
              <div class="pull-right">
                <div class="row clearfix">  
                  <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_reg_in-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
                </div>
              </div>

              <!-- Table Start -->
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%" style=" vertical-align: middle; text-align: center;">Jam ke</th>
                      <th width="20%" style=" vertical-align: middle; text-align: center;">Posisi</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Qty IN</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Jam IN</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">IN (Qty X Jam)</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Action</th>

                    </tr>
                  </thead>
                  <tbody id="regin_tbody">

                  </tbody>
                </table>
          </div>

          <!-- row bawah -->
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
              <div class="pull-left">
                <h5 class="text-black" style="font-size: 20px; margin-left: 5px">D. MP BANTUAN (OUT)</h5>
                <br>
              </div>
          
              <div class="pull-right">
                <div class="row clearfix">  
                  <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_reg_out-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah </a>
                </div>
              </div>

             <!-- Table Start -->
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%" style=" vertical-align: middle; text-align: center;">Jam ke</th>
                      <th width="20%" style=" vertical-align: middle; text-align: center;">Posisi</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Qty Out</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Jam Out</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Out (Qty X Jam)</th>
                      <th width="10%" style=" vertical-align: middle; text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="regout_tbody">

                  </tbody>
                </table>
          </div>

        </div>
      </div>
 
    </div>
  </div>


<!-- ALL modal -->
<div>
    <!-- absen modal -->
     <!-- modal input -->
      <div class="modal fade" id="i_absen-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Absen Pegawai</h2>
              <!-- form start -->
              <form id="form_absen_pegawai">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="ITEM" id="i_item">
                  
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="QTY MP" id="i_qty">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="JAM" id="i_jam">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                
                <!-- button submit -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="input-group">
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit">Submit</a>
                      </div>
                  </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>

     <!-- modal update -->
      <div class="modal fade" id="updt_absen_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Absen Pegawai</h2>
              <!-- form start -->
              <form id="form_updt_absen_pegawai">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="ITEM" id="item_update" name="item_updt">
                  <input type="hidden" class="form-control" placeholder="ID" name="id_updt" id="id_update">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="QTY MP" id="qty_update" name="qty_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="JAM" id="jam_update" name="jam_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                
                <!-- button submit -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="input-group">
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_absen">Update</a>
                      </div>
                  </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>
     <!-- Confirmation modal -->
      <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body text-center font-18">
              <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
              <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                <input type="hidden" name="id_dc_delete" id="id_dc_delete" class="form-control">
                <br>
                <div class="col-6">
                  <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                  NO
                </div>
                <div class="col-6">
                  <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del" data-dismiss="modal"><i class="fa fa-check"></i></button>
                  YES
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <!-- regulasi in modal -->
      <!-- modal input -->
      <div class="modal fade" id="i_reg_in-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">MP IN</h2>
              <!-- form start -->
              <form id="form_regulasi_in">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <select class="custom-select col-12" name="in_jam_ke" id="i_jam_ke">
                    <option disabled selected> Pilih Jam ke</option>
                    <?php foreach ($data_oc as $key) { ?>
                    <option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
                    <?php }  ?>
                  </select> 
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="Posisi" id="i_posisi">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="QTY MP" id="i_regin_qty">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="JAM" id="i_regin_jam">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                
                <!-- button submit -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="input-group">
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit_regin">Submit</a>
                      </div>
                  </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>

     <!-- modal update -->
      <div class="modal fade" id="updt_regin_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Absen Leader</h2>
              <!-- form start -->
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  
                  <select class="custom-select col-12" name="jamke_regin_updt" id="jamke_regin_update">
                    <option disabled selected> Pilih Jam ke</option>
                      <?php foreach ($data_oc as $key) { ?>
                    <option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
                      <?php }  ?>
                  </select> 
                 </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="POSISI" id="posisi_update" name="posisi_updt">
                  <input type="hidden" class="form-control" placeholder="ID" name="id_regin_updt" id="id_regin_update">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="QTY MP" id="qty_regin_update" name="qty_regin_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="JAM" id="jam_regin_update" name="jam_regin_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                
                <!-- button submit -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="input-group">
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_regin">Submit</a>
                      </div>
                  </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>
     
     <!-- Confirmation modal -->
      <div class="modal fade" id="conf_regin-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body text-center font-18">
                      <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                      <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <input type="hidden" name="id_regin_delete" id="id_regin_delete" class="form-control">
                        <br>
                        <div class="col-6">
                          <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                          NO
                        </div>
                        <div class="col-6">
                          <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_regin" data-dismiss="modal"><i class="fa fa-check"></i></button>
                          YES
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      </div>       
    
    <!-- regulasi out modal -->
      <!-- modal input -->
      <div class="modal fade" id="i_reg_out-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">MP IN</h2>
                <!-- form start -->
                <form id="form_regulasi_out">
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <select class="custom-select col-12" name="jam_ke_in" id="jam_ke_i">
                      <option disabled selected> Pilih Jam ke</option>
                      <?php foreach ($data_oc as $key) { ?>
                      <option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
                      <?php }  ?>
                    </select> 
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="Posisi" id="posisi_i">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="QTY MP" id="regin_qty_i">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="JAM" id="regin_jam_i">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  
                  <!-- button submit -->
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                          <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit_regout">Submit</a>
                        </div>
                    </div>
                  </div>
                </form>
                <!-- form end -->
              </div>
            </div>
          </div>
      </div>

      <!-- modal update -->
      <div class="modal fade" id="updt_regout_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">MP OUT</h2>
              <!-- form start -->
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  
                  <select class="custom-select col-12" name="jamke_regout_updt" id="jamke_regout_update">
                    <option disabled selected> Pilih Jam ke</option>
                      <?php foreach ($data_oc as $key) { ?>
                    <option value="<?php  echo $key->id ?>"> <?php  echo $key->jam_ke ?> </option>
                      <?php }  ?>
                  </select> 
                 </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="POSISI" id="posisi_regout_update" name="posisi_regout_updt">
                  <input type="hidden" class="form-control" placeholder="ID" name="id_regout_updt" id="id_regout_update">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="QTY MP" id="qty_regout_update" name="qty_regout_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="JAM" id="jam_regout_update" name="jam_regout_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-qrcode" aria-hidden="true"></i></span>
                  </div>
                </div>
                
                <!-- button submit -->
                <div class="row">
                  <div class="col-sm-12">
                      <div class="input-group">
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_regout">Update</a>
                      </div>
                  </div>
                </div>
              </form>
              <!-- form end -->
            </div>
          </div>
        </div>
      </div>
     
      <!-- Confirmation modal -->
      <div class="modal fade" id="conf_regout-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                  <input type="hidden" name="id_regout_delete" id="id_regout_delete" class="form-control">
                  <br>
                  <div class="col-6">
                    <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    NO
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_del_regout" data-dismiss="modal"><i class="fa fa-check"></i></button>
                    YES
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>       
    <!-- indirect act modal -->

      <!-- Modal Edit Direct LABOR -->
      <div class="modal fade" id="modal_editdl">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
              <!-- Modal Header -->
            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
              <h2 class="text-center mb-30">Buat Panning Bulan Ini</h2>
            </div>

            <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Standart DL :</label>
                      <input class="form-control" type="number" id="et_std_dl" >
                      <input type="hidden" id="tmp_std_dl" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Reg DL :</label>
                      <input class="form-control" type="number" id="et_reg_dl">
                      <input type="hidden" id="tmp_reg_dl">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jam Overtime :</label>
                      <input class="form-control" type="number" id="et_jam_ot">
                      <input type="hidden" id="tmp_jam_ot">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>DL Overtime :</label>
                      <input class="form-control" type="number" id="et_dl_ot">
                      <input type="hidden" id="tmp_dl_ot">
                    </div>
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="btn_submit_edit_dl" type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </div>

</div>
<!-- END ALL modal -->

  <script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
  <script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
  <script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

  <!-- add sweet alert js & css in footer -->
  <script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>

<script>
    $('document').ready(function(){
      // alert($('#id_pdo').val());
    
      // absen ajax
      // fitur show
      show();    
      showDl();
        
      function show(){
        $.ajax({
          async :false,
          type  : 'POST',
          url   : '<?php echo base_url();?>index.php/DirectLabor/getAbsenPegawai',
          dataType : 'JSON',
          data : {id_pdo:$('#id_pdo').val()},
          success : function(data){
          var html = '';
          var i;
          var a=0;
          for(i=0; i<data.length; i++){
            html += 

            '<tr>'+
              '<th style=" vertical-align: middle; text-align: center;">'+data[i].item+'</th>'+
              '<th style=" vertical-align: middle; text-align: center;">'+data[i].qty+'</th>'+
              '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam+'</th>'+
              '<th style=" vertical-align: middle; text-align: center;" colspan="2">'+data[i].total+'</th>'+
              '<th>'+
                '<div class="dropdown">'+
                    '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
                      '<i class="fa fa-ellipsis-h"></i>'+
                    '</a>'+                     
                    '<div class="dropdown-menu dropdown-menu-right">'+
                      '<a class="dropdown-item item_edit_absen" href="#" data-id="'+data[i].id+'" data-item="'+data[i].item+'" data-qty="'+data[i].qty+'" data-jam="'+data[i].jam+'" data-total="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
                      '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
                    '</div>'+
                  '</div>'+
              '</th>'+
            '</tr>';

            a+=Number(data[i].total);
          }
          html+=
          '<tr>'+
          '<th width="40%" colspan="3" style=" vertical-align: middle; text-align: center;"> Total Non Operating Hours </th>'+
          '<th colspan="2" width="20%" style=" vertical-align: middle; text-align: center;">'+ a +'</th>'+
          '<th width="20%" style=" vertical-align: middle; text-align: center;"> MH </th>'+
          '</tr>'
          
          $('#tbl_body').html(html);    
          }
        });
      }
    
      function showDl() {
         
         $.ajax({
            async: false,
            type: "POST",
            url: '<?php echo site_url('DirectLabor/getDirectLabor')?>',
            dataType: "JSON",
            data: {
                id_pdo:$('#id_pdo').val()
            },
            success: function(response){
                var html = '';
                var html_b ='';

                html +=
                      '<tr>'+
                        '<th>STD DL</th>'+
                        '<th colspan="3" style="text-align: center">'+response.std_dl+'</th>'+
                      '</tr>'+

                      '<tr>'+
                        '<th>REG DL</th>'+
                        '<th colspan="3" style="text-align: center">'+response.reg_dl+'</th>'+
                      '</tr>'+

                      '<tr>'+
                        '<th>JAM REG</th>'+
                        '<th colspan="3" style="text-align: center">'+response.jam_reg+'</th>'+
                      '</tr>'+

                      '<tr>'+
                        '<th width="50%">JAM OT</th>'+
                        '<th style="text-align: center" width="25%">'+response.jam_ot+'</th>'+
                      '</tr>'+

                      '<tr>'+
                        '<th>DL OT</th>'+
                        '<th style="text-align: center">'+response.dl_ot+'</th>'+
                      '</tr>';


                  html_b +=
                        '<tr>'+
                          '<th style="text-align: center">MH REG (Act MP x Jam Reg)</th>'+
                          '<th colspan="3" style="text-align: center">'+response.mh_reg+'</th>'+
                          '<th colspan="3" style="text-align: center">MH</th>'+
                        '</tr>'+

                        '<tr>'+
                          '<th style="text-align: center">MH OT (Act MP x Jam OT)</th>'+
                          '<th colspan="3" style="text-align: center">'+response.mh_ot+'</th>'+
                          '<th colspan="3" style="text-align: center">MH</th>'+
                        '</tr>'+

                        '<tr>'+
                          '<th style="text-align: center">Total</th>'+
                          '<th colspan="3" style="text-align: center">'+response.total+'</th>'+
                          '<th colspan="3" style="text-align: center">MH</th>'+
                        '</tr>';

                $('#tbody_a').html(html); 
                $('#tbody_b').html(html_b); 
                //  END 
                // isi temp
                $('#tmp_std_dl').val(response.std_dl); 
                $('#tmp_reg_dl').val(response.reg_dl);

                $('#tmp_jam_ot').val(response.jam_ot);
                $('#tmp_dl_ot').val(response.dl_ot);
            }


         }); 
      }

      // btn triger Edit
      $('#btn_trig_edita').on('click',function(){
          // isi data di modal  

          $('#et_std_dl').val($('#tmp_std_dl').val()); 
          $('#et_reg_dl').val($('#tmp_reg_dl').val());
          $('#et_jam_ot').val($('#tmp_jam_ot').val());
          $('#et_dl_ot').val($('#tmp_dl_ot').val());

          $('#modal_editdl').modal('show');
      });
      $('#btn_submit_edit_dl').on('click',function(){ 
          var std_dl = $('#et_std_dl').val();
          var reg_dl = $('#et_reg_dl').val();
          var jam_ot = $('#et_jam_ot').val();
          var dl_ot = $('#et_dl_ot').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url(); ?>/DirectLabor/editDl",
            dataType : "JSON", 
            data : { 
              id_pdo:$('#id_pdo').val(),
              std_dl:std_dl,
              reg_dl:reg_dl,
              jam_ot:jam_ot,
              dl_ot:dl_ot
            },
            success: function(data){
                
                if (!data) {
                  Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan',
                    type: 'error',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                  })
                } 
                showDl()
                $('#modal_editdl').modal('hide');
              }
          });

      });

      
      // ===================   Submit Record ===============================================
        $('#btn_submit').click(function(){


          var absen_item = document.getElementById("i_item").value;
          var absen_qty_mp = document.getElementById("i_qty").value;
          var absen_jam = document.getElementById("i_jam").value;
          $.ajax({
            async : false,
            type : "POST",
            url : "<?php echo base_url() ?>index.php/DirectLabor/newAbsenPegawai",
            dataType : "JSON",
            data : {
              // model:controller
              id_pdo:$('#id_pdo').val(),
              item:absen_item,
              qty:absen_qty_mp,
              jam:absen_jam,

            },
            success : function(response){
                  $('#i_absen-modal').modal('hide');
              if(response.error){
                // alert('error');
              }else{
                // alert(response.status);
              }
              document.getElementById("form_absen_pegawai").reset();
            }
          });
          show();

        });

      // ===================   Delete Record ===============================================
        
        //get data for delete record show prompt
        $('#tbl_body').on('click','.item_delete',function(){
          // alert($(this).data('id'))
          var id = $(this).data('id');
          // var tanggal = $(this).data('tanggal');
          // var judul = $(this).data('judul');
          // var pengumuman = $(this).data('isi');
               
          $('[name="id_dc_delete"]').val(id);  
          $('#confirmation-modal').modal('show');
          // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";                
          // alert('oke');
        });

        //delete record to database

            $('#btn_del').on('click',function(){
                var id_dc_delete = $('#id_dc_delete').val();
                // alert(id_dc_delete)
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/DirectLabor/delAbsenPegawai",
                    dataType : "JSON",
                    data : {id:id_dc_delete},
                    success: function(){
                        $('[name="id_dc_delete"]').val("");
                        $('#confirmation-modal').modal('hide');
                        // refresh()
                        
                show();
                    }
                });
                return false;

            });

       //   ========================  END DELETE RECORD ====================================

      //  ===================  START UPDATE Record ===============================================
          //get data for UPDATE record show prompt
            $('#tbl_body').on('click','.item_edit_absen',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
              var id = $(this).data('id');
              var item = $(this).data('item');
              var qty = $(this).data('qty');
              var jam = $(this).data('jam');

              // memasukkan data ke form updatean
              
              $('[name="id_updt"]').val(id);
              $('[name="item_updt"]').val(item);
              $('[name="qty_updt"]').val(qty);
              $('[name="jam_updt"]').val(jam);

              $('#updt_absen_modal').modal('show');        
            });
                
          //UPDATE record to database (submit button)

            $('#btn_update_absen').on('click',function(){
              var idup = $('[name="id_updt"]').val();
              var itemup = $('[name="item_updt"]').val();
              var qtyup = $('[name="qty_updt"]').val();
              var jamup = $('[name="jam_updt"]').val();
              

              // alert(umhup);
              $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/DirectLabor/updateAbsenPegawai",
                dataType : "JSON",
                data : { 
                  id:idup,
                  item:itemup,
                  qty:qtyup,
                  jam:jamup
                },
                success: function(data){
                  $('#updt_absen_modal').modal('hide'); 
                    // refresh();
                    show();
                  }
              });
            });
      //   ========================  END UPDATE RECORD ====================================

    // regulasi in ajax

      // fitur show
      show_regin();    
        function show_regin(){
          $.ajax({
            async :false,
            type  : 'POST',
            url   : '<?php echo base_url();?>index.php/DirectLabor/getRegIn',
            dataType : 'JSON',
            data : {id_pdo:$('#id_pdo').val()},
            success : function(data){
            var html = '';
            var i;
            var a=0;
            for(i=0; i<data.length; i++){
              html += 

              '<tr>'+
                '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam_ke+'</th>'+
                '<th style=" vertical-align: middle; text-align: center;">'+data[i].posisi+'</th>'+
                '<th style=" vertical-align: middle; text-align: center;">'+data[i].qty+'</th>'+
                '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam+'</th>'+
                '<th style=" vertical-align: middle; text-align: center;">'+data[i].total+'</th>'+
                '<th>'+
                  '<div style=" vertical-align: middle; text-align: center;" class="dropdown">'+
                      '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
                        '<i class="fa fa-ellipsis-h"></i>'+
                      '</a>'+                     
                      '<div class="dropdown-menu dropdown-menu-right">'+
                        '<a  class="dropdown-item item_edit_regin" href="#" data-id_oc_regin="'+data[i].id_oc+'" data-id_regin="'+data[i].id+'" data-posisi="'+data[i].posisi+'" data-qty_regin="'+data[i].qty+'" data-jam_regin="'+data[i].jam+'" data-total_regin="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
                        '<a class="dropdown-item item_delete_regin" href="#" data-id_regin="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
                      '</div>'+
                    '</div>'+
                '</th>'+
              '</tr>';

              a+=Number(data[i].total);
            }
            html+=
            '<tr>'+
            '<th width="40%" colspan="4" style=" vertical-align: middle; text-align: center;"> Total </th>'+
            '<th width="20%" style=" vertical-align: middle; text-align: center;">'+ a +'</th>'+
            '<th width="20%" style=" vertical-align: middle; text-align: center;"> MH </th>'+
            '</tr>'
            
            $('#regin_tbody').html(html);    
            }
          });
        }


      // --------------------------- submit - insert-----------------------------
        $('#btn_submit_regin').click(function(){


          var regin_jam_ke= $('select[name=in_jam_ke]').val()
          var regin_posisi = document.getElementById("i_posisi").value;
          var regin_qty_mp = document.getElementById("i_regin_qty").value;
          var regin_jam = document.getElementById("i_regin_jam").value;

          $.ajax({
            async : false,
            type : "POST",
            url : "<?php echo base_url() ?>index.php/DirectLabor/newRegIn",
            dataType : "JSON",
            data : {
              // controller:data view
              id_pdo:$('#id_pdo').val(),
              id_jenisreg:1,
              id_oc:regin_jam_ke,
              posisi:regin_posisi,
              qty:regin_qty_mp,
              jam:regin_jam

            },
            success : function(response){
                  $('#i_reg_in-modal').modal('hide');
              if(response.error){
                // alert('error');
              }else{
                // alert(response.status);
              }
              document.getElementById("form_absen_pegawai").reset();
            }
          });
          show_regin();

        });


      // ===================   Delete Record ===============================================
        
        //get data for delete record show prompt
        $('#regin_tbody').on('click','.item_delete_regin',function(){
          // alert($(this).data('id_regin'));
          var id = $(this).data('id_regin');
          // var tanggal = $(this).data('tanggal');
          // var judul = $(this).data('judul');
          // var pengumuman = $(this).data('isi');
               
          $('[name="id_regin_delete"]').val(id);  
          $('#conf_regin-modal').modal('show');
          // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";                
          // alert('oke');
        });

        //delete record to database

            $('#btn_del_regin').on('click',function(){
                var id_regin_delete = $('#id_regin_delete').val();
                // alert(id_dc_delete)
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/DirectLabor/delRegIn",
                    dataType : "JSON",
                    data : {id:id_regin_delete},
                    success: function(){
                        $('[name="id_regin_delete"]').val("");
                        $('#conf_regin-modal').modal('hide');
                        // refresh()
                    show_regin();
                    }
                });

                return false;

            });

       //   ========================  END DELETE RECORD ====================================

      // ===================  START UPDATE Record =========================================
          //get data for UPDATE record show prompt
            $('#regin_tbody').on('click','.item_edit_regin',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
              var id = $(this).data('id_regin');
              var id_oc = $(this).data('data-id_oc_regin');
              var posisi = $(this).data('posisi');
              var qty = $(this).data('qty_regin');
              var jam = $(this).data('jam_regin');

              // memasukkan data ke form updatean
              
              $('[name="id_regin_updt"]').val(id);
              $('[name="jamke_regin_updt"]').val(id_oc);
              $('[name="posisi_updt"]').val(posisi);
              $('[name="qty_regin_updt"]').val(qty);
              $('[name="jam_regin_updt"]').val(jam);              

              $('#updt_regin_modal').modal('show');        

            });
                
          //UPDATE record to database (submit button)

            $('#btn_update_regin').on('click',function(){
             
              var idup = $('[name="id_regin_updt"]').val();
              var idoc_up = $('[name="jamke_regin_updt"]').val();
              var posisiup = $('[name="posisi_updt"]').val();
              var qtyup = $('[name="qty_regin_updt"]').val();
              var jamup = $('[name="jam_regin_updt"]').val();
              

              // alert(umhup);
              $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/DirectLabor/updateRegIn",
                dataType : "JSON",
                data : { 
                  id:idup,
                  id_oc:idoc_up,
                  posisi:posisiup,
                  qty:qtyup,
                  jam:jamup
                },
                success: function(data){
                  $('#updt_regin_modal').modal('hide'); 
                    // refresh();
                    show_regin();
                  }
              });
            });
      //   ========================  END UPDATE RECORD ====================================

    // regulasi out ajax
        
        // fitur show
            show_regout();    
              function show_regout(){
                $.ajax({
                  async :false,
                  type  : 'POST',
                  url   : '<?php echo base_url();?>index.php/DirectLabor/getRegOut',
                  dataType : 'JSON',
                  data : {id_pdo:$('#id_pdo').val()},
                  success : function(data){
                  var html = '';
                  var i;
                  var a=0;
                  for(i=0; i<data.length; i++){
                    html += 

                    '<tr>'+
                      '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam_ke+'</th>'+
                      '<th style=" vertical-align: middle; text-align: center;">'+data[i].posisi+'</th>'+
                      '<th style=" vertical-align: middle; text-align: center;">'+data[i].qty+'</th>'+
                      '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam+'</th>'+
                      '<th style=" vertical-align: middle; text-align: center;">'+data[i].total+'</th>'+
                      '<th>'+
                        '<div style=" vertical-align: middle; text-align: center;" class="dropdown">'+
                            '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
                              '<i class="fa fa-ellipsis-h"></i>'+
                            '</a>'+                     
                            '<div class="dropdown-menu dropdown-menu-right">'+
                              '<a  class="dropdown-item item_edit_regout" href="#" data-id_oc_regout="'+data[i].id_oc+'" data-id_regout="'+data[i].id+'" data-posisi_out="'+data[i].posisi+'" data-qty_regout="'+data[i].qty+'" data-jam_regout="'+data[i].jam+'" data-total_regout="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
                              '<a class="dropdown-item item_delete_regout" href="#" data-id_regout="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
                            '</div>'+
                          '</div>'+
                      '</th>'+
                    '</tr>';

                    a+=Number(data[i].total);
                  }
                  html+=
                  '<tr>'+
                  '<th width="40%" colspan="4" style=" vertical-align: middle; text-align: center;"> Total </th>'+
                  '<th width="20%" style=" vertical-align: middle; text-align: center;">'+ a +'</th>'+
                  '<th width="20%" style=" vertical-align: middle; text-align: center;"> MH </th>'+
                  '</tr>'
                  
                  $('#regout_tbody').html(html);    
                  }
                });
              }
        // end fitur show    

        // --------------------------- submit - insert-----------------------------
            $('#btn_submit_regout').click(function(){
               var regout_jam_ke= $('select[name=jam_ke_in]').val()
               var regout_posisi = document.getElementById("posisi_i").value;
               var regout_qty_mp = document.getElementById("regin_qty_i").value;
               var regout_jam = document.getElementById("regin_jam_i").value;
                $.ajax({
                  async : false,
                  type : "POST",
                  url : "<?php echo base_url() ?>index.php/DirectLabor/newRegOut",
                  dataType : "JSON",
                  data : {
                    // controller:data view
                    id_pdo:$('#id_pdo').val(),
                    id_jenisreg:2,
                    id_oc:regout_jam_ke,
                    posisi:regout_posisi,
                    qty:regout_qty_mp,
                    jam:regout_jam

                  },
                  success : function(response){
                        $('#i_reg_out-modal').modal('hide');
                    if(response.error){
                      // alert('error');
                    }else{
                      // alert(response.status);
                    }
                    document.getElementById("form__regulasi_out").reset();
                  }
                });
                show_regout();
            });
        // --------------------------- end submit - insert-----------------------------

        // ===================   Delete Record =========================================
          //get data for delete record show prompt
            $('#regout_tbody').on('click','.item_delete_regout',function(){
              // alert($(this).data('id_regin'));
              var id = $(this).data('id_regout');
              // var tanggal = $(this).data('tanggal');
              // var judul = $(this).data('judul');
              // var pengumuman = $(this).data('isi');
                   
              $('[name="id_regout_delete"]').val(id);  
              $('#conf_regout-modal').modal('show');
              // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";                
              // alert('oke');
            });

            //delete record to database

                $('#btn_del_regout').on('click',function(){
                    var id_regout_delete = $('#id_regout_delete').val();
                    // alert(id_dc_delete)
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo site_url(); ?>/DirectLabor/delRegOut",
                        dataType : "JSON",
                        data : {id:id_regout_delete},
                        success: function(){
                            $('[name="id_regout_delete"]').val("");
                            $('#conf_regout-modal').modal('hide');
                            // refresh()
                        show_regout();
                        }
                    });

                    return false;

                });
        // ========================  END DELETE RECORD ====================================
        
        // ===================  START UPDATE Record ====================================
          //get data for UPDATE record show prompt
            $('#regout_tbody').on('click','.item_edit_regout',function(){
              // memasukkan data yang dipilih dari tbl list agenda updatean ke variabel 
              var id = $(this).data('id_regout');
              var id_oc = $(this).data('id_oc_regout');
              var posisi = $(this).data('posisi_out');
              var qty = $(this).data('qty_regout');
              var jam = $(this).data('jam_regout');

              // memasukkan data ke form updatean
              
              $('[name="id_regout_updt"]').val(id);
              $('[name="jamke_regout_updt"]').val(id_oc);
              $('[name="posisi_regout_updt"]').val(posisi);
              $('[name="qty_regout_updt"]').val(qty);
              $('[name="jam_regout_updt"]').val(jam);              

              $('#updt_regout_modal').modal('show');        

            });
                
          //UPDATE record to database (submit button)

            $('#btn_update_regout').on('click',function(){
             
              var idup = $('[name="id_regout_updt"]').val();
              var idoc_up = $('[name="jamke_regout_updt"]').val();
              var posisiup = $('[name="posisi_regout_updt"]').val();
              var qtyup = $('[name="qty_regout_updt"]').val();
              var jamup = $('[name="jam_regout_updt"]').val();
              

              // alert(umhup);
              $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/DirectLabor/updateRegOut",
                dataType : "JSON",
                data : { 
                  id:idup,
                  id_oc:idoc_up,
                  posisi:posisiup,
                  qty:qtyup,
                  jam:jamup
                },
                success: function(data){
                  $('#updt_regout_modal').modal('hide'); 
                    // refresh();
                    show_regout();
                  }
              });
            });
        //   ========================  END UPDATE RECORD ====================================

    // indirect act ajax

    });

</script>

</body>
</html>