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

</head>
<body>
  <input id="id_pdo" type="hidden" class="form-control" value="<?php echo $pdo->id ?>">
<?php $this->load->view('header/header'); ?>
<?php $this->load->view('header/sidebar'); ?>
 
<div class="main-container">
  <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">



    <div class="title">
      <h4>Direct Labor</h4>
      <br>
    </div>
    

    
  <div class="row">

    <div class="col-md-3 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">A.</h5>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th>STD DL</th>
            <th colspan="3" style="text-align: center">50</th>
          </tr>

          <tr>
            <th>REG DL</th>
            <th colspan="3" style="text-align: center">50</th>
          </tr>

          <tr>
            <th>JAM REG</th>
            <th colspan="3" style="text-align: center">8</th>
          </tr>

          <tr>
            <th width="50%">JAM OT</th>
            <th style="text-align: center" width="25%">1</th>
          </tr>

          <tr>
            <th>DL OT</th>
            <th style="text-align: center">1</th>
          </tr>
      
      </table> 
        </div>

      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">B.</h5>
        <br>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th style="text-align: center">MH REG (Act MP x Jam Reg)</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

          <tr>
            <th style="text-align: center">MH OT (Act MP x Jam OT)</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

          <tr>
            <th style="text-align: center">Total</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

      </table>
      </div>

    </div>


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

    <div class="col-md-5 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">D. MP BANTUAN (IN)</h5>
      <br>
      </div>
      

      <div class="pull-right">
        <div class="row clearfix">  
        <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_absen-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
        </div>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th width="5%">Jam ke</th>
            <th width="20%">Posisi</th>
            <th width="10%">Qty IN</th>
            <th width="10%">Jam IN</th>
            <th width="10%">IN (Qty X Jam)</th>
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
            
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
          </tr>

          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
          </tr>
          
          <tr>
            <th colspan="3"></th>
            <th></th>
            <th></th>
          </tr>

      </table>
        </div>

        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">D. MP BANTUAN (OUT)</h5>
      <br>
      </div>
      
      
       <div class="pull-right">
        <div class="row clearfix">  
        <a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_absen-modal" style="margin-right: 25px; width: 100px"><span class="fa fa-plus"></span> Tambah</a>
        </div>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th width="5%">Jam ke</th>
            <th width="20%">Posisi</th>
            <th width="10%">Qty OUT</th>
            <th width="10%">Jam OUT</th>
            <th width="10%">OUT (Qty X Jam)</th>
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
            
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
          </tr>

          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th>0</th>
            <th>0</th>
          </tr>
          
          <tr>
            <th colspan="3"></th>
            <th></th>
            <th></th>
          </tr>

      </table>
        </div>

      </div>


  </div>
  


     <!-- modal input -->
        <div class="modal fade" id="i_absen-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="login-box bg-white box-shadow pd-ltr-20 border-radius-5">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center mb-30">Absen Leader</h2>
                <!-- form start -->
                <form id="form_absen_pegawai">
                  <!-- input -->
                  <div class="input-group custom input-group-lg">
                    <input type="text" class="form-control" placeholder="ITEM" id="i_item">
                    <input type="hidden" class="form-control" placeholder="ID" name="id_updt" id="id_update">
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
              <h2 class="text-center mb-30">Absen Leader</h2>
              <!-- form start -->
              <form id="form_absen_leader">
                <!-- input -->
                <div class="input-group custom input-group-lg">
                  <input type="text" class="form-control" placeholder="ITEM" id="item_update" name="item_updt">
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
                        <a class="btn btn-primary btn-lg btn-block" href="#" id="btn_update_absen">Submit</a>
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


  </div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>

<script>
    $('document').ready(function(){
      // alert($('#id_pdo').val());
      // fitur show
      show();    
        function show(){
          $.ajax({
            async :false,
            type  : 'ajax',
            url   : '<?php echo base_url();?>index.php/DirectLabor/getAbsenPegawai',
            dataType : 'JSON',
            success : function(data){
            var html = '';
            var i;
            var a=0;
            for(i=0; i<data.length; i++){
              html += 

              '<tr>'+
                '<th>'+data[i].item+'</th>'+
                '<th>'+data[i].qty+'</th>'+
                '<th>'+data[i].jam+'</th>'+
                '<th colspan="2">'+data[i].total+'</th>'+
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
            '<th width="40%" colspan="3"> Total Non Operating Hours </th>'+
            '<th colspan="2" width="20%" style=" vertical-align: middle; text-align: center;">'+ a +'</th>'+
            '<th width="20%" style=" vertical-align: middle; text-align: center;"> MH </th>'+
            '</tr>'
            
            $('#tbl_body').html(html);    
            }
          });
        }

        // button submit
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
          // document.getElementById("namaPengumuman_hapus").innerHTML=" '"+judul+"' ";                // alert('oke');
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


    });

</script>


</body>

</html>






