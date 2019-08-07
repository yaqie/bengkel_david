<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $dt_contact->nama ?></title>
    <meta name="description"
        content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
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
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/landing/fonts/') ?>font-awesome-4.1.0/css/font-awesome.min.css">
    <!-- Elegant Icons -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/fonts/') ?>eleganticons/et-icons.css">
    <!-- Main style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/landing/css/') ?>cardio.css">
	<style>
	.hero-text {
		text-align: center;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: white;
	}
</style>
</head>

<body>
    <div class="preloader">
        <img src="<?= base_url('assets/landing/img/') ?>loader.gif" alt="Preloader image">
    </div>
    <nav class="navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
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
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li><a href="<?= base_url('suku_cadang') ?>">Persediaan Suku Cadang</a></li>
                    <li><a href="<?= base_url('booking') ?>">Booking Service</a></li>
                    <li><a href="<?= base_url('list_antrian') ?>">List Antrian</a></li>
                    <li><a href="<?= base_url('login') ?>" class="btn btn-blue">Login</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <header id="intro" style="background-image:url('<?= base_url('assets/') ?>bg.jpg');-webkit-filter: brightness(35%);filter:brightness(35%);">
        <div class="container">
            <div class="table">
                <div class="header-text">
                    <div class="row">
                        <div class="col-md-12 text-center hero-text">
                            <!-- <h3 class="light white">Selamat Datang di</h3>
                            <h1 class="white typed"><?= $dt_contact->nama ?></h1>
                            <span class="typed-cursor">|</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<div class="hero-text">
		<h3 class="light white">Selamat Datang di</h3>
		<h1 class="white typed"><?= $dt_contact->nama ?></h1>
	</div>