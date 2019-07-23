<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PDO Dashboard</title>

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">

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
    <!-- CONTAINER -->
    <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" id="container_maindata">
      <div class="title">
        <h4>Indirect Labor</h4>
        <br>
      </div>
      <!-- start of first row -->
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="pull-left">
              <h5 class="text-black" style="font-size: 20px; margin-left: 5px">A.</h5>
            </div>

                <div class="project-info-right" style="margin-top: -10px" id="conf_editIdl" style="display: none;">
                  <a  id="btn_trig_edita" href='#' class="btn btn-success btn-sm" data-to><i class="fa fa-cog" aria-hidden="true"></i>  Edit</a> 
                </div>
                <br> 
                <!-- Table AAAAAAAAAAAA Start -->
                <table class="table table-bordered table-striped" style="margin-top: 10px" id="tbody_a"> 
                     
                </table>  
          </div>
        </div>

        <div class="col-md-3 col-sm-12">
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

          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="pull-left">
              <h5 class="text-black" style="font-size: 20px; margin-left: 5px">MH IN IDL</h5>
            </div>

          <!-- Table Start -->
          <table class="table table-bordered table-striped">
            <tr>
                <th rowspan="2" style="vertical-align : middle; text-align: center;">MH IN</th>
                <th colspan="3" style="text-align: center">B - C</th>
              </tr>

              <tr>
                
                <th colspan="3" style="text-align: center" id="id_mh_in_idl">50</th>
              </tr>
              
          </table> 
          </div>
        </div>

        <div class="col-md-6 col-sm-12">
          <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
            <div class="pull-left">
            <h5 class="text-black" style="font-size: 20px; margin-left: 5px">C. NON OPERATING HOURS</h5>
            <br>    
          </div>
          
          <div class="pull-right">
          <div class="row clearfix" id="add_nonoprh" style="display: none;">  
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#input-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
          </div></div>

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

<!-- KUMPULAN MODAL -->
<div>
   <!-- absen LEADER  modal -->
      <!-- modal input -->
        <div class="modal fade" id="input-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">Absen Leader</h2>
                <!-- form start -->
                <form id="form_absen_leader">
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="ITEM" id="i_item" name="i_item">
                    <input type="hidden" class="form-control" placeholder="ID" name="id_updt" id="id_update">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-id-badge" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="number" class="form-control" placeholder="QTY MP" id="i_qty" name="i_qty">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-group" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="number" class="form-control" placeholder="JAM" id="i_jam" name="i_jam">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-clock-o" aria-hidden="true"></i></span>
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
        <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">Edit Absen Leader</h2>
                <!-- form start -->
                <form id="formupdate_absen_leader">
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="ITEM" id="item_update" name="item_updt">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-id-badge" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="number" class="form-control" placeholder="QTY MP" id="qty_update" name="qty_updt">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-group" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="number" class="form-control" placeholder="JAM" id="jam_update" name="jam_updt">
                    <div class="input-group-append custom">
                      <span class="input-group-text"><i class="icon-copy fa fa-clock-o" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  
                  <!-- button submit -->
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                          <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update">Submit</a>
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
    <!-- Modal Edit Indirect LABOR -->
      <div class="modal fade" id="modal_editdl">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
          <form id="fom_edit_IDL"> 
            <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
              <h2 class="text-center mb-30">Edit Data Indirect Labor</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Standart IDL :</label>
                      <input class="form-control" type="number" id="et_std_dl" name="et_std_dl">
                      <input type="hidden" id="tmp_std_dl" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Reg IDL :</label>
                      <input class="form-control" type="number" id="et_reg_dl" name="et_reg_dl" min="0" max="25">
                      <input type="hidden" id="tmp_reg_dl">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jam Overtime :</label>
                      <input class="form-control" type="number" id="et_jam_ot" name="et_jam_ot" min="0" max="4">
                      <input type="hidden" id="tmp_jam_ot">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>IDL Overtime :</label>
                      <input class="form-control" type="number" id="et_dl_ot" name="et_dl_ot" min="0" max="4">
                      <input type="hidden" id="tmp_dl_ot">
                    </div>
                  </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn_submit_edit_dl" type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
</div>



  <script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
  <!-- validate -->
  <script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>

  <script>
    $('document').ready(function(){     
      // CONFg
        // VAR CORE
          var id_line = $('#id_line').val();
          var id_shift = $('#id_shift').val();
          var id_tgl = $('#id_tgl').val();
          var id_pdo = 0;

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
          loadDropdown();
          cekHariini();


      // CEK HARI INI
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
                              console.log('MILIKNYA');
                              showIsYou();
                            }else { 
                              console.log('not YOU'); 
                              // show_notYou(res.id);  
                              showNotYou();
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
 
        function showIsYou(){
            document.getElementById('add_nonoprh').style.display = 'block';
            document.getElementById('conf_editIdl').style.display = 'block';

            // iDL
            $.ajax({
              async :false,
              type  : 'post',
              url   : '<?php echo base_url();?>index.php/IndirectLabor/getAbsenLeader',
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
                  '<th colspan="2" style=" vertical-align: middle; text-align: center;">'+data[i].total+'</th>'+
                  '<th>'+
                    '<div class="dropdown" style=" vertical-align: middle; text-align: center;">'+
                        '<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">'+
                          '<i class="fa fa-ellipsis-h"></i>'+
                        '</a>'+                     
                        '<div class="dropdown-menu dropdown-menu-right">'+
                          '<a class="dropdown-item item_edit" href="#" data-id="'+data[i].id+'" data-item="'+data[i].item+'" data-qty="'+data[i].qty+'" data-jam="'+data[i].jam+'" data-total="'+data[i].total+'"><i class="fa fa-pencil"></i> Edit </a>'+
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
            // DL
            $.ajax({
                async: false,
                type: "POST",
                url: '<?php echo site_url('IndirectLabor/getIndirectLabor')?>',
                dataType: "JSON",
                data: {
                    id_pdo:id_pdo
                },
                success: function(data){
                    console.log('ini show dl');
                    console.log(data);

                    var html = '';
                    var html_b ='';
                    var response = data.data; 
                    html +=
                          '<tr>'+
                            '<th>STD DL</th>'+
                            '<th colspan="3" style="text-align: center">'+response.std_idl+'</th>'+
                          '</tr>'+

                          '<tr>'+
                            '<th>REG DL</th>'+
                            '<th colspan="3" style="text-align: center">'+response.reg_idl+'</th>'+
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
                    $('#tmp_std_dl').val(response.std_idl); 
                    $('#tmp_reg_dl').val(response.reg_idl);

                    $('#tmp_jam_ot').val(response.jam_ot);
                    $('#tmp_dl_ot').val(response.dl_ot);
                    // alert(data.mhInIdl);
                    document.getElementById('id_mh_in_idl').innerHTML=data.mhInIdl;
                }
             }); 
        } 

        function showNotYou(){
            document.getElementById('add_nonoprh').style.display = 'none';
            document.getElementById('conf_editIdl').style.display = 'none';

            // iDL
            $.ajax({
              async :false,
              type  : 'post',
              url   : '<?php echo base_url();?>index.php/IndirectLabor/getAbsenLeader',
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
                  '<th colspan="2" style=" vertical-align: middle; text-align: center;">'+data[i].total+'</th>'+
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
            // DL
            $.ajax({
                async: false,
                type: "POST",
                url: '<?php echo site_url('IndirectLabor/getIndirectLabor')?>',
                dataType: "JSON",
                data: {
                    id_pdo:id_pdo
                },
                success: function(data){
                    console.log('ini show dl');
                    console.log(data);

                    var html = '';
                    var html_b ='';
                    var response = data.data; 
                    html +=
                          '<tr>'+
                            '<th>STD DL</th>'+
                            '<th colspan="3" style="text-align: center">'+response.std_idl+'</th>'+
                          '</tr>'+

                          '<tr>'+
                            '<th>REG DL</th>'+
                            '<th colspan="3" style="text-align: center">'+response.reg_idl+'</th>'+
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
                    $('#tmp_std_dl').val(response.std_idl); 
                    $('#tmp_reg_dl').val(response.reg_idl);

                    $('#tmp_jam_ot').val(response.jam_ot);
                    $('#tmp_dl_ot').val(response.dl_ot);
                    // alert(data.mhInIdl);
                    document.getElementById('id_mh_in_idl').innerHTML=data.mhInIdl;
                }
             }); 
        } 

        function showNodata() {
          document.getElementById('id_verif').style.display = 'none';
          document.getElementById('no_pdodata').style.display = 'block';
          document.getElementById('container_maindata').style.display = 'none';
        }


      // =========  A. EDIT IN-DIRECT LABOR ==================
        // btn triger Edit
        $('#btn_trig_edita').on('click',function(){
            // isi data di modal  

            $('#et_std_dl').val($('#tmp_std_dl').val()); 
            $('#et_reg_dl').val($('#tmp_reg_dl').val());
            $('#et_jam_ot').val($('#tmp_jam_ot').val());
            $('#et_dl_ot').val($('#tmp_dl_ot').val());


            $('#modal_editdl').modal('show');
        });
        $("#fom_edit_IDL").validate({
            rules: {
              et_std_dl: {
                required: true
              },
              et_reg_dl: {
                required: true
              },
              et_jam_ot:{
                required: true
              },
              et_dl_ot: {
                required: true
              }           
            }
          });
        $('#btn_submit_edit_dl').on('click',function(){ 
              // check is valid or not
              if (!$('#fom_edit_IDL').valid()) { 
                return;
              }  

              var std_dl = $('#et_std_dl').val();
              var reg_dl = $('#et_reg_dl').val();
              var jam_ot = $('#et_jam_ot').val();
              var dl_ot = $('#et_dl_ot').val();

              $.ajax({
                type : "POST",
                url  : "<?php echo site_url(); ?>/IndirectLabor/editIDL",
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
                    cekHariini();
                    $('#modal_editdl').modal('hide');
                  }
              });

          });


      //  ========   C.  NON OPERATING HOURs ==================
        // NEW ABSEN LEADER
          // validasi
            $("#form_absen_leader").validate({
              rules: {
                i_item: {
                  required: true
                },
                i_qty: {
                  required: true
                },
                i_jam:{
                  required: true
                }          
              }
            });
          $('#btn_submit').click(function(){ 
            // check is valid or not
              if (!$('#form_absen_leader').valid()) { 
                return;
              }  

            var absen_item = document.getElementById("i_item").value;
            var absen_qty_mp = document.getElementById("i_qty").value;
            var absen_jam = document.getElementById("i_jam").value;

            $.ajax({
              async : false,
              type : "POST",
              url : "<?php echo base_url() ?>index.php/IndirectLabor/newAbsenLeader",
              dataType : "JSON",
              data : {
                // model:controller
                id_pdo:id_pdo,
                item:absen_item,
                qty:absen_qty_mp,
                jam:absen_jam,

              },
              success : function(response){
                    $('#input-modal').modal('hide');
                if(response.error){
                  // alert('error');
                }else{
                  // alert(response.status);
                }
                document.getElementById("form_absen_leader").reset();
              }
            });
            cekHariini();
          });

        // UPDATE ABSEN LEADER
          //get data for UPDATE record show prompt
              $('#tbl_body').on('click','.item_edit',function(){
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

                $('#update_modal').modal('show');        
              });
          // Validasi
            $("#formupdate_absen_leader").validate({
              rules: {
                et_std_dl: {
                  item_updt: true
                },
                qty_updt: {
                  required: true
                },
                jam_updt:{
                  required: true
                }         
              }
            });  

          //UPDATE record to database (submit button)
              $('#btn_update').on('click',function(){
                // check is valid or not
                if (!$('#formupdate_absen_leader').valid()) { 
                  return;
                }  

                alert('is Valid');
                return;
                var idup = $('[name="id_updt"]').val();
                var itemup = $('[name="item_updt"]').val();
                var qtyup = $('[name="qty_updt"]').val();
                var jamup = $('[name="jam_updt"]').val();
                 
                $.ajax({
                  type : "POST",
                  url  : "<?php echo site_url(); ?>/IndirectLabor/updateAbsenLeader",
                  dataType : "JSON",
                  
                  data : { 
                    id_pdo:id_pdo,
                    id:idup,
                    item:itemup,
                    qty:qtyup,
                    jam:jamup
                  },
                  success: function(data){
                    $('#update_modal').modal('hide'); 
                      // refresh();
                      cekHariini();
                    }
                });
              });
        
        // DELETE
          //get data for delete record show prompt
            $('#tbl_body').on('click','.item_delete',function(){
              // alert($(this).data('id'))
              var id = $(this).data('id'); 
                   
              $('[name="id_dc_delete"]').val(id);  
              $('#confirmation-modal').modal('show'); 
            });
          //delete record to database
            $('#btn_del').on('click',function(){
                var id_dc_delete = $('#id_dc_delete').val();
                // alert(id_dc_delete)
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url(); ?>/IndirectLabor/delAbsenLeader",
                    dataType : "JSON",
                    data : {id:id_dc_delete , id_pdo:id_pdo},
                    success: function(){
                        $('[name="id_dc_delete"]').val("");
                        $('#confirmation-modal').modal('hide');
                        // refresh()
                        
                      cekHariini();
                    }
                });
                return false;
            });
      
      // ========  END C.NON OPERATING   ======================

      
        


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

    });

  </script>

</body>
</html>
