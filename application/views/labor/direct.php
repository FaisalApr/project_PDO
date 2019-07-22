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
  <!-- bootstrap-touchspin css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">

  <style type="text/css">
      .select2-selection__rendered {
          line-height: 55px !important;
      }
      .select2-container .select2-selection--single {
          height: 50px !important;
      }
      .select2-selection__arrow {
          height: 50px !important;
      }
  </style>

</head>
<body>
  <?php 
    $ses = $this->session->userdata('pdo_logged'); 
    $opt = $this->session->userdata('pdo_opt'); 
   ?>
  <input type="hidden" id="id_user" value="<?php echo $ses['id_user'] ?>">
  <input type="hidden" value="<?php echo $opt['id_shift'] ?>" id="id_shift">
  <!-- opt -->
  <input type="hidden" value="<?php echo $opt['tgl'] ?>" id="id_tgl">
  <input type="hidden" value="<?php echo $opt['id_line'] ?>" id="id_line">

  <?php $this->load->view('header/header_users'); ?>
  <?php $this->load->view('header/sidebar_users'); ?>
 
  <div class="main-container">
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="container_maindata">
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
            <div class="project-info-right" style="margin-top: -10px" id="btn_editdll">
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
                <div class="row clearfix" id="add_nonopr">  
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
                  <div class="row clearfix" id="btn_add_unactiv" style="display: none;">  
                    <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#modalnewact" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
                  </div>
                </div>

                <!-- Table Start -->
                  <table class="table table-striped table-bordered">
                      
                      <tr>
                        <th style="text-align: center" width="5%" colspan="2">Aktivitas</th>
                        <th style="text-align: center" width="20%">Menit</th>
                        <th style="text-align: center" width="10%">Total Jam(Qty MP x Jam)</th>
                        <th style="text-align: center" width="10%">aksi</th>
                      </tr>
                      <tbody id="tbod_indirectactivity">
                        
                      </tbody>  
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
                <div class="row clearfix" id="add_btn_mpin" style="display: none;">  
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
                <div class="row clearfix" id="add_mpbout" style="display: none;">  
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

    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="no_pdodata" style="display: none;"> 
      <center>
        <div class="jumbotron">
          <H1>Tidak Ada Data PDO Perpilih</H1>
        </div>
      </center>
    </div>

  </div>


<!-- ALL modal -->
<div>
    <!-- absen modal -->
     <!-- modal input -->
      <div class="modal fade" id="i_absen-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class=" bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Absen Pegawai</h2>
              <!-- form start -->
              <form id="form_absen_pegawai">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="ITEM" id="i_item">
                  
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="QTY MP" id="i_qty">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-group" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="JAM" id="i_jam">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
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
            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
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
            <div class=" bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">MP IN</h2>
              <!-- form start -->
              <form id="form_regulasi_in">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <select class="custom-select col-12" name="in_jam_ke" id="i_jam_ke"> 
                      <!-- INI CONtainer JAm kE -->
                  </select> 
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="Posisi" id="i_posisi">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="QTY MP" id="i_regin_qty">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-group" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="JAM" id="i_regin_jam">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
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
            <div class=" bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Update Absen Leader</h2>
              <!-- form start -->
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  
                  <select class="custom-select col-12" name="jamke_regin_updt" id="jamke_regin_update">
                        <!-- ID CONTAINER JAM KE -->
                  </select> 
                 </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="POSISI" id="posisi_update" name="posisi_updt">
                  <input type="hidden" class="form-control" placeholder="ID" name="id_regin_updt" id="id_regin_update">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="QTY MP" id="qty_regin_update" name="qty_regin_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-group" aria-hidden="true"></i></span>
                  </div>
                </div>
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="number" class="form-control" placeholder="JAM" id="jam_regin_update" name="jam_regin_updt">
                  <div class="input-group-append custom">
                    <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
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
              <form id="form__regulasi_out">
                <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h2 class="text-center mb-30">MP OUT</h2>
                  <!-- form start -->
                  <form id="form_regulasi_out">
                    <!-- input -->
                    <div class="input-group custom input-group-lg">
                      <select class="custom-select col-12" name="jam_ke_in" id="jam_ke_i"> 

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
              </form>
            </div>
          </div>
      </div>

      <!-- modal update -->
      <div class="modal fade" id="updt_regout_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="text-center mb-30">Edit MP OUT</h2>
              <!-- form start -->
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  
                  <select class="custom-select col-12" name="jamke_regout_updt" id="jamke_regout_update"> 


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

    <!-- Modal Indirect Activity -->
      <!-- modall neww AKtivitas  -->
        <div class="modal fade" id="modalnewact" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">Tambah Aktivitas</h2>
                <form id="form_addactiv">
                  <div class="input-group custom input-group-lg">
                    <label>Aktivitas :</label>
                    <input id="nameAct" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas">
                     
                  </div>
                  <div class="form-group">
                    <label>Durasi :</label>
                    <input type="text" value="5" name="durasi_aktivitas">
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group"> 
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="tambah_activ">Tambah</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <!-- modall edit  AKtivitas-->
        <div class="modal fade" id="modaledit_aktivitas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">Edit Aktivitas</h2>
                <form id="form_editactiv">
                  <div class="input-group custom input-group-lg">
                    <label>Aktivitas :</label>
                    <input id="nameActedit" type="text" class="form-control" style="text-align: left;" placeholder="Nama Aktivitas"> 
                  </div>
                  <div class="form-group">
                    <label>Durasi :</label>
                    <input type="text" value="5" name="durasi_aktivitas_edit">
                    <input id="id_editact" type="hidden"  >
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="input-group"> 
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="submit_activedit">Ubah</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>       
      <!-- Modal Hapus Aktivitas -->
      <!-- Confirmation modal -->
        <div class="modal fade" id="conf_del_activmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body text-center font-18">
                  <h4 class="padding-top-30 mb-30 weight-500" id="info_delete">Anda akan menghapus ?</h4>
                  <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                    <input type="hidden" id="id_activ_delete">
                    <br>
                    <div class="col-6">
                      <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                      Tidak
                    </div>
                    <div class="col-6">
                      <button type="button" class="btn btn-danger border-radius-100 btn-block confirmation-btn" id="btn_delActiv" data-dismiss="modal"><i class="fa fa-check"></i></button>
                      YA
                    </div>
                  </div>
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
  <!-- TOuch SPIN -->
  <script src="<?php echo base_url() ?>assets/src/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script> 

<script>
    $('document').ready(function(){
      // VAR CORE
        var id_line = $('#id_line').val();
        var id_shift = $('#id_shift').val();
        var id_tgl = $('#id_tgl').val();
        var id_pdo = 0;
        var regDL = 0;

      // variabel global  
        // deklarasi nama bulan
        const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        const daysName = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

        var today = new Date(id_tgl);
        var currentMonth = today.getMonth();
        var currentYear = today.getFullYear();
        var currDate = today.getDate(); 
      // aditional PICKER DATE  
        // SETTING DEFAULT DATE
        var datetimeNow = currentYear+'-'+(currentMonth+1)+'-'+currDate;
              document.getElementById('slect_date').value= daysName[today.getDay()]+', '+currDate+' '+monthName[currentMonth]+' '+currentYear;


        $(".inputs").keyup(function () {
            if (this.value.length == this.maxLength) {
              $(this).select();
              $(this).next('.inputs').focus();  
            }
        });

        $("input").click(function () {
           $(this).select();
        }); 
     
      // TrigGER PIlih TANGGAL
        $('.date-pickerrr').datepicker({   
          language: "en",
          firstDay: 1,  
            onSelect: function(selected, d, calendar) {   
              // jika yang dipilih sama 
              if (selected=='') { 
                var tod = new Date(id_tgl);  

                document.getElementById('slect_date').value=  daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
                calendar.hide();
                return ;
              }else{
                // post data additional
                id_tgl = new Date(selected);
                var tod = new Date(selected); 
                document.getElementById('slect_date').value= daysName[tod.getDay()]+', '+tod.getDate()+' '+monthName[tod.getMonth()]+' '+tod.getFullYear();
                id_tgl = tod.getFullYear()+'-'+(tod.getMonth()+1)+'-'+tod.getDate();

                // post new data additional
                updateOpt();
              } 
              calendar.hide();

              // refresh 
              // showplanning();
              // cariDataPdo();
              cekHariini();
            }
        });
      // TRIGGEr line Change
        $('#select_line').on('select2:select',function(e){
          var data = e.params.data;
          
          id_line = data.id ;
          // update opt to server
          updateOpt(); 
          cekHariini();
          // console.log(data); 
          // console.log('ln:'+id_line+'|sf:'+id_shift); 
        });
      // PILIH SHIFTY 
        $('#drop_shiftt').on('click','.pilih_sf',function(){
          var ssf = $(this).data('value'); 
   
          if (ssf==1) {
            document.getElementById('id_sifname').innerHTML= 'A';
            document.getElementById('sf_a').classList.add("aktip");
            document.getElementById('sf_b').classList.remove("aktip");  
          } else{
            document.getElementById('id_sifname').innerHTML= 'B';
            document.getElementById('sf_b').classList.add("aktip"); 
            document.getElementById('sf_a').classList.remove("aktip");  
          }

          id_shift = ssf; 
          id_line = $('#select_line').val();

          // update opt to server
          updateOpt(); 
          cekHariini();
        });

      // ====  AUTOLOAD =====   
          cekHariini()
          loadDropdown();
    
      // CEK Hari INI
          function cekHariini() {
              $.ajax({ 
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/Welcome/cekHariIni',
                    dataType : 'JSON', 
                    data:{
                      id_line:id_line,
                      id_shift:id_shift,
                      id_tgl:id_tgl
                    } ,
                    success : function(res){   
                              if (res) { 
                                  id_pdo = res.id;

                                // cek jika itu bukan miliknya
                                  if ($('#id_user').val()==res.id_users) { 
                                    console.log('MILIKNYA') 
                                    isyou(id_pdo)  
                                    isi_dropdown(res.id); 
                                    show_regout();
                                  }else { 
                                    console.log('not YOU');  
                                    notyou(res.id); 
                                    show_regout();
                                  }      
                                  // show
                                  document.getElementById('no_pdodata').style.display = 'none';
                                  document.getElementById('container_maindata').style.display = 'block';

                                  //  STATUS VERIFIKASI   
                                   if (res.status==1) {
                                    document.getElementById('id_verif').style.display = 'block';
                                   }else{
                                    document.getElementById('id_verif').style.display = 'none';
                                   }  

                              }else{ 
                                  console.log('is null');  
                                  showNodata();
                              } 
                        } 
              }); 
          }

      // show
        // function show(id_pdo){
        //   $.ajax({
        //     async :false,
        //     type  : 'POST',
        //     url   : '<?php echo base_url();?>index.php/DirectLabor/getAbsenPegawai',
        //     dataType : 'JSON',
        //     data : {id_pdo:id_pdo},
        //     success : function(data){
        //     var html = '';
        //     var i;
        //     var a=0;
        //     for(i=0; i<data.length; i++){
        //       html += 

        //       '<tr>'+
        //         '<th style=" vertical-align: middle; text-align: center;">'+data[i].item+'</th>'+
        //         '<th style=" vertical-align: middle; text-align: center;">'+data[i].qty+'</th>'+
        //         '<th style=" vertical-align: middle; text-align: center;">'+data[i].jam+'</th>'+
        //         '<th style=" vertical-align: middle; text-align: center;" colspan="2">'+data[i].total+'</th>'+
        //         '<th>'+
        //           '<div class="dropdown">'+
        //               '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
        //                 '<i class="fa fa-ellipsis-h"></i>'+
        //               '</a>'+                     
        //               '<div class="dropdown-menu dropdown-menu-right">'+
        //                 '<a class="dropdown-item item_edit_absen" href="#" data-id="'+data[i].id+'" data-item="'+data[i].item+'" data-qty="'+data[i].qty+'" data-jam="'+data[i].jam+'" data-total="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
        //                 '<a class="dropdown-item item_delete" href="#" data-id="'+data[i].id+'"><i class="fa fa-trash"></i> Hapus </a>'+
        //               '</div>'+
        //             '</div>'+
        //         '</th>'+
        //       '</tr>';

        //       a+=Number(data[i].total);
        //     }
        //     html+=
        //     '<tr>'+
        //     '<th width="40%" colspan="3" style=" vertical-align: middle; text-align: center;"> Total Non Operating Hours </th>'+
        //     '<th colspan="2" width="20%" style=" vertical-align: middle; text-align: center;">'+ a +'</th>'+
        //     '<th width="20%" style=" vertical-align: middle; text-align: center;"> MH </th>'+
        //     '</tr>'
            
        //     $('#tbl_body').html(html);    
        //     }
        //   });
        // }
      
        // function showDl(id_pdo) {
           
        //    $.ajax({
        //       async: false,
        //       type: "POST",
        //       url: '<?php echo site_url('DirectLabor/getDirectLabor')?>',
        //       dataType: "JSON",
        //       data: {
        //           id_pdo:id_pdo
        //       },
        //       success: function(response){
        //           var html = '';
        //           var html_b =''; 

        //           // isi jumlah regdl
        //           regDL = response.reg_dl;

        //           html +=
        //                 '<tr>'+
        //                   '<th>STD DL</th>'+
        //                   '<th colspan="3" style="text-align: center">'+response.std_dl+'</th>'+
        //                 '</tr>'+

        //                 '<tr>'+
        //                   '<th>REG DL</th>'+
        //                   '<th colspan="3" style="text-align: center">'+response.reg_dl+'</th>'+
        //                 '</tr>'+

        //                 '<tr>'+
        //                   '<th>JAM REG</th>'+
        //                   '<th colspan="3" style="text-align: center">'+response.jam_reg+'</th>'+
        //                 '</tr>'+

        //                 '<tr>'+
        //                   '<th width="50%">JAM OT</th>'+
        //                   '<th style="text-align: center" width="25%">'+response.jam_ot+'</th>'+
        //                 '</tr>'+

        //                 '<tr>'+
        //                   '<th>DL OT</th>'+
        //                   '<th style="text-align: center">'+response.dl_ot+'</th>'+
        //                 '</tr>';


        //             html_b +=
        //                   '<tr>'+
        //                     '<th style="text-align: center">MH REG (Act MP x Jam Reg)</th>'+
        //                     '<th colspan="3" style="text-align: center">'+response.mh_reg+'</th>'+
        //                     '<th colspan="3" style="text-align: center">MH</th>'+
        //                   '</tr>'+

        //                   '<tr>'+
        //                     '<th style="text-align: center">MH OT (Act MP x Jam OT)</th>'+
        //                     '<th colspan="3" style="text-align: center">'+response.mh_ot+'</th>'+
        //                     '<th colspan="3" style="text-align: center">MH</th>'+
        //                   '</tr>'+

        //                   '<tr>'+
        //                     '<th style="text-align: center">Total</th>'+
        //                     '<th colspan="3" style="text-align: center">'+response.total+'</th>'+
        //                     '<th colspan="3" style="text-align: center">MH</th>'+
        //                   '</tr>';

        //           $('#tbody_a').html(html); 
        //           $('#tbody_b').html(html_b); 
        //           //  END 
        //           // isi temp
        //           $('#tmp_std_dl').val(response.std_dl); 
        //           $('#tmp_reg_dl').val(response.reg_dl);

        //           $('#tmp_jam_ot').val(response.jam_ot);
        //           $('#tmp_dl_ot').val(response.dl_ot);
        //       }

        //    }); 
        // }

        // function showIndirectActiv(id_pdo) {
        //     $.ajax({
        //       async: false,
        //       type: "POST",
        //       url: '<?php echo site_url('DirectLabor/getListIndirectActivity')?>',
        //       dataType: "JSON",
        //       data: {
        //           pdo:id_pdo
        //       },
        //       success: function(response){
        //           var html = ''; 
        //           var totmh=0;
        //           for (var i = 0; i < response.length; i++) { 
        //             totmh+= Number(response[i].total);
        //             html+=
        //               '<tr>'+
        //                 '<th style="width:50%" colspan="2">'+response[i].item+'</th>'+
        //                 '<th>'+response[i].menit+'</th>'+
        //                 '<th>'+parseFloat(response[i].total).toFixed(1)+'</th>'+
        //                 '<th>'+
        //                     '<div class="dropdown">'+
        //                       '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
        //                         '<i class="fa fa-ellipsis-h"></i>'+
        //                       '</a>'+                     
        //                       '<div class="dropdown-menu dropdown-menu-right">'+
        //                         '<a class="dropdown-item item_edit_activ" href="#" data-id="'+response[i].id+'" data-item="'+response[i].item+'" data-menit="'+response[i].menit+'"><i class="fa fa-pencil"></i> Edit </a>'+
        //                         '<a class="dropdown-item item_delete_activ" href="#" data-id="'+response[i].id+'" data-item="'+response[i].item+'" ><i class="fa fa-trash"></i> Hapus </a>'+
        //                       '</div>'+
        //                     '</div>'+
        //                 '</th>'+
        //               '</tr>';                   
        //           } 
        //           html+=
        //                 '<tr>'+ 
        //                   '<th style="text-align: right;" colspan="3">Total</th>'+
        //                   '<th>'+totmh.toFixed(2)+'</th>'+
        //                   '<th style="text-align: center;">MH</th>'+
        //                 '</tr>'; 
        //           $('#tbod_indirectactivity').html(html);
        //       }   

        //    }); 
        // }

        function showNodata() {
          document.getElementById('id_verif').style.display = 'none';
          document.getElementById('no_pdodata').style.display = 'block';
          document.getElementById('container_maindata').style.display = 'none';
        }

        function notyou(id_pdo) {
            document.getElementById('btn_add_unactiv').style.display = 'none';
            document.getElementById('add_nonopr').style.display = 'none';
            document.getElementById('add_btn_mpin').style.display = 'none';
            document.getElementById('add_mpbout').style.display = 'none';
            document.getElementById('btn_editdll').style.display = 'none';
            
            // showIndirectActiv
                $.ajax({
                  async: false,
                  type: "POST",
                  url: '<?php echo site_url('DirectLabor/getListIndirectActivity')?>',
                  dataType: "JSON",
                  data: {
                      pdo:id_pdo
                  },
                  success: function(response){
                      var html = ''; 
                      var totmh=0;
                      for (var i = 0; i < response.length; i++) { 
                        totmh+= Number(response[i].total);
                        html+=
                          '<tr>'+
                            '<th style="width:50%" colspan="2">'+response[i].item+'</th>'+
                            '<th>'+response[i].menit+'</th>'+
                            '<th>'+parseFloat(response[i].total).toFixed(1)+'</th>'+
                            '<th>-</th>'+
                          '</tr>';                   
                      } 
                      html+=
                            '<tr>'+ 
                              '<th style="text-align: right;" colspan="3">Total</th>'+
                              '<th>'+totmh.toFixed(2)+'</th>'+
                              '<th style="text-align: center;">MH</th>'+
                            '</tr>'; 
                      $('#tbod_indirectactivity').html(html);
                  }   

               }); 

            // showDl
             $.ajax({
                async: false,
                type: "POST",
                url: '<?php echo site_url('DirectLabor/getDirectLabor')?>',
                dataType: "JSON",
                data: {
                    id_pdo:id_pdo
                },
                success: function(response){
                    var html = '';
                    var html_b =''; 

                    // isi jumlah regdl
                    regDL = response.reg_dl;

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

            // show NON OPERATING HOURS
              $.ajax({
                  async :false,
                  type  : 'POST',
                  url   : '<?php echo base_url();?>index.php/DirectLabor/getAbsenPegawai',
                  dataType : 'JSON',
                  data : {id_pdo:id_pdo},
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
                      '<th>-</th>'+
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
        
            // SHOW getRegOut
               $.ajax({
                    async :false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/DirectLabor/getRegOut',
                    dataType : 'JSON',
                    data : {id_pdo:id_pdo},
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
                        '<th>-</th>'+
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

            // SHOW REG IN
              // SHOW REG IN
               $.ajax({
                    async :false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/DirectLabor/getRegIn',
                    dataType : 'JSON',
                    data : {id_pdo:id_pdo},
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
                        '<th>-</th>'+
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

        function isyou(id_pdo) {
            document.getElementById('btn_add_unactiv').style.display = 'block';
            document.getElementById('add_nonopr').style.display = 'block';
            document.getElementById('add_btn_mpin').style.display = 'block';
            document.getElementById('add_mpbout').style.display = 'block';
            document.getElementById('btn_editdll').style.display = 'block';
            // showIndirectActiv
                $.ajax({
                  async: false,
                  type: "POST",
                  url: '<?php echo site_url('DirectLabor/getListIndirectActivity')?>',
                  dataType: "JSON",
                  data: {
                      pdo:id_pdo
                  },
                  success: function(response){
                      var html = ''; 
                      var totmh=0;
                      for (var i = 0; i < response.length; i++) { 
                        totmh+= Number(response[i].total);
                        html+=
                          '<tr>'+
                            '<th style="width:50%" colspan="2">'+response[i].item+'</th>'+
                            '<th>'+response[i].menit+'</th>'+
                            '<th>'+parseFloat(response[i].total).toFixed(1)+'</th>'+
                            '<th>'+
                                 
                            '-</th>'+
                          '</tr>';                   
                      } 
                      html+=
                            '<tr>'+ 
                              '<th style="text-align: right;" colspan="3">Total</th>'+
                              '<th>'+totmh.toFixed(2)+'</th>'+
                              '<th style="text-align: center;">MH</th>'+
                            '</tr>'; 
                      $('#tbod_indirectactivity').html(html);
                  }   

               }); 

            // showDl
               $.ajax({
              async: false,
              type: "POST",
              url: '<?php echo site_url('DirectLabor/getDirectLabor')?>',
              dataType: "JSON",
              data: {
                  id_pdo:id_pdo
              },
              success: function(response){
                  var html = '';
                  var html_b =''; 

                  // isi jumlah regdl
                  regDL = response.reg_dl;

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

            // show
              $.ajax({
                  async :false,
                  type  : 'POST',
                  url   : '<?php echo base_url();?>index.php/DirectLabor/getAbsenPegawai',
                  dataType : 'JSON',
                  data : {id_pdo:id_pdo},
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

            // SHOW REG OUT 
               $.ajax({
                    async :false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/DirectLabor/getRegOut',
                    dataType : 'JSON',
                    data : {id_pdo:id_pdo},
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

            // SHOW REG IN
               $.ajax({
                    async :false,
                    type  : 'POST',
                    url   : '<?php echo base_url();?>index.php/DirectLabor/getRegIn',
                    dataType : 'JSON',
                    data : {id_pdo:id_pdo},
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
                id_pdo:id_pdo,
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
                  showDl(id_pdo);
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
              id_pdo:id_pdo,
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
          show(id_pdo);

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
                        
                show(id_pdo);
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
                    show(id_pdo);
                  }
              });
            });
      //   ========================  END UPDATE RECORD ====================================

    // regulasi in ajax


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
              id_pdo:id_pdo,
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
          show_regin(id_pdo);

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
                    show_regin(id_pdo);
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
                    show_regin(id_pdo);
                  }
              });
            });
      //   ========================  END UPDATE RECORD ====================================

    // regulasi out ajax      

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
                    id_pdo:id_pdo,
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
      // New Aktivitas
        $('#tambah_activ').click(function()
          {    
            var named_act = document.getElementById("nameAct").value;
            var durasi_act = $('input[name="durasi_aktivitas"]').val();
            var tot = (durasi_act*regDL)/60;
            // console.log('nae:'+named_act+'|'+durasi_act+'|pdo:'+id_pdo+'|regdl:'+regDL);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('DirectLabor/newActivity')?>",
                data: {
                    id_pdo:id_pdo,
                    item:named_act,
                    qtymp:regDL,
                    menit:durasi_act,
                    total:tot
                },
                success: function(data){ 
                    showIndirectActiv(id_pdo);
                }
            });
            $('#modalnewact').modal('hide');
            document.getElementById('form_addactiv').reset(); 
          }); 
      // edit act
        //triger
        $('#tbod_indirectactivity').on('click','.item_edit_activ',function(){
            var nama = $(this).data('item');
            var id = $(this).data('id');
            var durasi = $(this).data('menit');

            $('#id_editact').val(id);
            $('#nameActedit').val(nama);
            $('input[name="durasi_aktivitas_edit"]').val(durasi);
            $('#modaledit_aktivitas').modal('show');  
        });
        // on Submit
        $('#submit_activedit').click(function()
        {    
          var named_act = $('#nameActedit').val();
          var durasi_act = $('input[name="durasi_aktivitas_edit"]').val();
          var id = $('#id_editact').val(); 
          var tot = (durasi_act*regDL)/60;
          // console.log('id:'+id+'|n:'+named_act+'|d:'+durasi_act);

          $.ajax({
              type: "POST",
              url: "<?php echo site_url('DirectLabor/updateActivity')?>",
              data:{
                  id: id,
                  item: named_act,
                  qtymp: regDL,
                  menit: durasi_act,
                  total: tot
              },
              success: function(data){
                  showIndirectActiv(id_pdo);
              }

          });
          $('#modaledit_aktivitas').modal('hide');
          document.getElementById('form_editactiv').reset(); 
        });
      // Delete
        $('#tbod_indirectactivity').on('click','.item_delete_activ',function(){
            var nama = $(this).data('item');
            var id = $(this).data('id'); 

            $('#id_activ_delete').val(id); 
            document.getElementById('info_delete').innerHTML = "Anda Akan Menghapus '"+nama+"'  ?";
            $('#conf_del_activmodal').modal('show');  
        });
        // on Submit
        $('#btn_delActiv').click(function()
        {    
          var id = $('#id_activ_delete').val(); 
 
          $.ajax({
              type: "POST",
              url: "<?php echo site_url('DirectLabor/deleteActiv')?>",
              data:{
                  id: id
              },
              success: function(data){
                  showIndirectActiv(id_pdo);
              }

          });
          $('#modaledit_aktivitas').modal('hide');
          document.getElementById('form_editactiv').reset(); 
        });

    // COnfiG 
      // Touchspin
        $("input[name='durasi_aktivitas']").TouchSpin({
          min: 0,
          max: 60,
          step: 1,
          decimals: 0,
          boostat: 5,
          maxboostedstep: 10,
          postfix: 'menit'
        });

        $("input[name='durasi_aktivitas_edit']").TouchSpin({
          min: 0,
          max: 60,
          step: 1,
          decimals: 0,
          boostat: 5,
          maxboostedstep: 10,
          postfix: 'menit'
        });
      // FUnc OPT
      // isi DATA DROPDOWN LINE
        function loadDropdown() {
          var idu = $('#id_user').val();
          var lv  = <?php echo $ses['level'] ?>; 

          // jika admin
          if (lv==1) {
            var id_district = <?php echo $ses['id_district'] ?>; 

            $.ajax({
              type: 'POST',
              url: '<?php echo site_url("Users/getListLineCarlineByAdmin");?>',
              dataType: "JSON",
              data:{
                id_district: id_district
              },
              success: function(data){ 
                $('#select_line').empty();
                $('#select_line').select2({ 
                  placeholder: 'Pilih Line ',
                  minimumResultsForSearch: -1,
                  data:data

                });
              }

            });
          }else {
            $.ajax({
              type: 'POST',
              url: '<?php echo site_url("Users/getListLineCarlineByUser");?>',
              dataType: "JSON",
              data:{
                id_user:idu
              },
              success: function(data){  
                
                $('#select_line').empty();
                $('#select_line').select2({ 
                  placeholder: 'Pilih Line ',
                  minimumResultsForSearch: -1,
                  data:data

                });
              }

            });
          }  

        }
      // UPDATE isi Sesion
        function updateOpt() {
          $.ajax({ 
                    type  : 'POST',
                    url   : '<?php echo site_url();?>/Login/updateDataOpt',
                    dataType : 'JSON',  
                    data:{
                      tgl: id_tgl,
                      sif: id_shift,
                      line: id_line
                    },
                    success : function(res){   
              console.log(res);
                    }

                });
        }
      // ============== dropdown TIME Jam ke===============
        function isi_dropdown(id_pdo) {
          $.ajax({
                async : false,
                type  : 'POST',
                url   : '<?php echo base_url();?>index.php/Losstime/cari_jam_ocPDO',
                dataType : 'JSON', 
                data:{ 
                  id_pdo: id_pdo
                },
                success : function(res){    
                  var html = '<option disabled selected> Jam ke</option>';
                  // console.log(res);
                  for (var i = 0; i < res.length; i++) {
                    if (i==(res.length-1)) {
                      html +=
                      '<option selected value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
                    }else{
                      html +=
                      '<option value="'+res[i].id+'">'+res[i].jam_ke+'</option>';
                    } 
                    
                  }

                  $('#i_jam_ke').html(html);
                  $('#jam_ke_i').html(html);
                  $('#jamke_regin_update').html(html);
                  $('#jamke_regout_update').html(html);
                }
            });    

        } 

    });
</script>

</body>
</html>