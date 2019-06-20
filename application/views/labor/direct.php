<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DeskApp Dashboard</title>

  <!-- Site favicon -->
  <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

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



    <div class="title">
      <h4>Direct Labor</h4>
      <br>
    </div>
    

    
  <div class="row">

    <div class="col-md-4 col-sm-12">
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
            <th colspan="3" style="text-align: center">8 Jam</th>
          </tr>

          <tr>
            <th width="50%">JAM OT</th>
            <th style="text-align: center" width="25%">1</th>
            <th style="text-align: center" width="25%">jam</th>
          </tr>

          <tr>
            <th>DL OT</th>
            <th style="text-align: center">1</th>
            <th style="text-align: center">jam</th>
          </tr>
      
      </table> 
        </div>
      </div>

    <div class="col-md-4 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">B.</h5>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th>MH REG (Act MP x Jam Reg)</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

          <tr>
            <th>MH OT (Act MP x Jam OT)</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

          <tr>
            <th>Total</th>
            <th colspan="3" style="text-align: center">50</th>
            <th colspan="3" style="text-align: center">MH</th>
          </tr>

      </table>
      </div>
    </div>

    <div class="col-md-4 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">C. NON OPERATING HOURS</h5>
        <p class="text-black" style="font-size: 20px; margin-left: 5px">&nbsp&nbsp&nbsp Detail Non Operating Hours</p>
      </div>

      <!-- Table Start -->
      <table class="table table-bordered table-striped">
      
          <tr>
            <th width="20%">ITEM</th>
            <th width="20%">QTY MP</th>
            <th width="20%">Jam</th>
            <th colspan="2" width="35%">Total</th>
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th colspan="2"> </th>
            
          </tr>
          
          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th colspan="2"> </th>
          </tr>

          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th colspan="2"> </th>
          </tr>

          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th colspan="2"> </th>
          </tr>

          <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th colspan="2"> </th>
          </tr>

          <tr>
            <th></th>
            <th colspan="2"> Total Non Operating Hours </th>
            <th> </th>
            <th> </th>
          </tr>

      </table>
      </div>
    </div>
  </div>
  
<div class="row">
    
    <div class="col-md-7 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">A.</h5>
      </div>

      <!-- Table Start -->
      <table class="table table-striped" style="margin-left: 20px">
        <thead>
          <tr>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <th scope="row">1</th>
        </tr>
        </tbody>
      </table> 
        </div>
      </div>

    <div class="col-md-5 col-sm-12">
      <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
        <div class="pull-left">
        <h5 class="text-black" style="font-size: 20px; margin-left: 5px">A.</h5>
      </div>

      <!-- Table Start -->
      <table class="table table-striped" style="margin-left: 20px">
        <thead>
          <tr>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <th scope="row">1</th>
        </tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>






  </div>
</div>
    


  </div>
</div>

</body>
<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
</html>






