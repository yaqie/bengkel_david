<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/ci-icon.png') ?>">
    <title><?php echo $title?></title>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" >
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" >
    <style type="text/css">
    body {
    padding-top: 3.5rem;
    }
    </style>
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/select/select2.min.css"/>

  </head>
  <body>
    <?php
    if($this->session->userdata('login_status') != TRUE ){
    ?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url()?>">Informasi Bengkel <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('booking')?>">Booking Antrian<span class="sr-only">(current)</span></a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <a href="<?php echo site_url('login')?>"><font color="white">Login Admin</font></a>
        </form>
      </div>
    </nav>
    <?php
    } else {
    ?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <?php if ($this->session->userdata('LEVEL') != 'admin'){ ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('dashboard')?>">Home <span class="sr-only">(current)</span></a>
          </li>
          
          <?php } ?>

          <?php if ($this->session->userdata('LEVEL') == 'admin'){ ?>
          <li class="<?php if(isset($active_master)){echo $active_master ;}?>">
          <a class="nav-link" href="<?php echo site_url('master')?>">
          <font color="white">Master Data</font></a>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transaksi</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo site_url('penjualan/pages_tambah_penjualan')?>">Input Transaksi Penjualan</a>
              <a class="dropdown-item" href="<?php echo site_url('penjualan')?>">List Transaksi</a>
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?php echo site_url('laporan/persediaan_suku_cadang')?>">Persediaan Suku Cadang</a>
              <a class="dropdown-item" href="<?php echo site_url('laporan/pembelian_sparepart')?>">Pembelian Sparepart</a>
              <a class="dropdown-item" href="<?php echo site_url('laporan/penjualan_sparepart')?>">Penjualan Sparepart</a>
              <a class="dropdown-item" href="<?php echo site_url('laporan/jasa_servis')?>">Jasa Service</a>
			  <a class="dropdown-item" href="<?php echo site_url('laporan/pendapatan')?>">Pendapatan</a>
            </div>
          </li>
          <?php } ?>
      
          
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <a href="<?php echo site_url('login/logout')?>"><font color="white">LogOut</font></a>
        </form>
      </div>
    </nav>
    <?php
    }
    ?>