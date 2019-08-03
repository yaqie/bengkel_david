<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $dt_contact->nama ?></title>
	<meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="manifest" href="<?= base_url('assets/landing/img/') ?>favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="<?= base_url('assets/landing/img/') ?>favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/fonts/') ?>font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/fonts/') ?>eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>cardio.css">
</head>

<body>
	<div class="preloader">
		<img src="<?= base_url('assets/landing/img/') ?>loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand" href="#"><img src="<?= base_url('assets/landing/img/') ?>logo.png" data-active-url="<?= base_url('assets/landing/img/') ?>logo-active.png" alt=""></a> -->
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Intro</a></li>
					<li><a href="#services">Persediaan Suku Cadang</a></li>
					<li><a href="#team">Booking Service</a></li>
					<li><a href="<?= base_url('login') ?>" class="btn btn-blue">Login</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Selamat Datang di</h3>
							<h1 class="white typed"><?= $dt_contact->nama ?></h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Persediaan Suku Cadang</h2>
				<h4 class="light muted">Stok Persediaan Sparepart</h4>
			</div>
			<div class="row services">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Sparepart</th>
              <th>Nama Suku Cadang</th>
              <th>Jumlah Barang</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $no=1;
              if(isset($persediaan_suku_cadang)){
              foreach($persediaan_suku_cadang as $row){
              ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->kd_part; ?></td>
                      <td><?php echo $row->nm_part; ?></td>
                      <td><?php echo $row->stok; ?></td>
                      <td><?php echo currency_format($row->harga); ?></td>
                  </tr>
                <?php }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="row text-center title">
				<h2><?= $antrian ?></h2>
				<h4 class="light muted">Sedang Dalam Antrian</h4>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>
	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Booking Antrian</h2>
			</div>
			<div class="row">
        <form action="<?= base_url('booking/simpan') ?>" method="post">
          <label for="">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" required>
          <label for="">Nomor Hanphone</label>
          <input type="text" name="nohp" class="form-control" required>
          <label for="">Nomor Kendaraan</label>
          <input type="text" name="nokendaraan" class="form-control" required>
          <label for="">Booking Untuk Tanggal</label>
          <input type="date" name="date" class="form-control" required>
          <label for="">Jam Booking</label>
          <input type="time" name="jam" class="form-control" required>
          <br>
          <button type="submit" class="btn btn-blue ripple trial-button">Booking</button>
        </form>

        <br>
        <br>
        <br>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jam Booking</th>
              <th>Untuk Tanggal</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $no=1;
              if(isset($data_booking)){
              foreach($data_booking as $row){
              ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $row->jam; ?></td>
                      <td><?php echo $row->tanggal; ?></td>
                  </tr>
                <?php }
            }
            ?>
          </tbody>
        </table>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white"><?= $dt_contact->nama ?></h3>
					<h5 class="light regular light-white"><?= $dt_contact->desc ?></h5>
				</div>
				<div class="col-sm-6 text-center-mobile">
          <div class="col-sm-12 text-center-mobile">
            <h5 class="light-white light">Email</h5>
            <h3 class="regular white"><?= $dt_contact->email ?></h3>
          </div>
          <div class="col-sm-12 text-center-mobile">
            <h5 class="light-white light">Telp</h5>
            <h3 class="regular white"><?= $dt_contact->telp ?></h3>
          </div>
          <div class="col-sm-12 text-center-mobile">
            <h5 class="light-white light">Alamat</h5>
            <h3 class="regular white"><?= $dt_contact->alamat ?></h3>
          </div>
          <div class="col-sm-12 text-center-mobile">
            <h5 class="light-white light">Jam Buka</h5>
            <h3 class="regular white"><?= $jamoperasional->text1 ?></h3>
            <h3 class="regular white"><?= $jamoperasional->text2 ?></h3>
          </div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2019 All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="<?= base_url('assets/landing/js/') ?>jquery-1.11.1.min.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>bootstrap.min.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>wow.min.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>typewriter.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>jquery.onepagenav.js"></script>
	<script src="<?= base_url('assets/landing/js/') ?>main.js"></script>
</body>

</html>
