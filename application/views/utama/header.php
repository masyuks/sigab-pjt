<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Sistem Informasi Siaga Banjir</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
	CSS
	============================================= -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
</head>

<style>
/*  */
/* Absolute Center Spinner */
.loading {
	position: fixed;
	z-index: 999;
	height: 2em;
	width: 2em;
	overflow: show;
	margin: auto;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
}

/* Transparent Overlay */
.loading:before {
	content: '';
	display: block;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

	background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
	/* hide "loading..." text */
	font: 0/0 a;
	color: transparent;
	text-shadow: none;
	background-color: transparent;
	border: 0;
}

.loading:not(:required):after {
	content: '';
	display: block;
	font-size: 10px;
	width: 1em;
	height: 1em;
	margin-top: -0.5em;
	-webkit-animation: spinner 150ms infinite linear;
	-moz-animation: spinner 150ms infinite linear;
	-ms-animation: spinner 150ms infinite linear;
	-o-animation: spinner 150ms infinite linear;
	animation: spinner 150ms infinite linear;
	border-radius: 0.5em;
	-webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
	box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
	0% {
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100% {
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-moz-keyframes spinner {
	0% {
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100% {
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@-o-keyframes spinner {
	0% {
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100% {
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
@keyframes spinner {
	0% {
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		-o-transform: rotate(0deg);
		transform: rotate(0deg);
	}
	100% {
		-webkit-transform: rotate(360deg);
		-moz-transform: rotate(360deg);
		-ms-transform: rotate(360deg);
		-o-transform: rotate(360deg);
		transform: rotate(360deg);
	}
}
/*  */
i.arrow{
	border: solid black;
	border-width: 0 3px 3px 0;
	display: inline-block;
	padding: 3px;
	position: absolute;
	right: 15px;
	top: 17px;
}

.hide{
	display: none;
}

.right {
	transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
}

.left {
	transform: rotate(135deg);
	-webkit-transform: rotate(135deg);
}

.up {
	transform: rotate(-135deg);
	-webkit-transform: rotate(-135deg);
}

.down {
	transform: rotate(45deg);
	-webkit-transform: rotate(45deg);
}

.siaga-biru{
	background : #38a4ff;
}

.div-home-2{
	transition: 0.5s ease;
}

.display-inline{
	display: inline;
}

.zindex-0{
	z-index: 0;
}
.zindex-996{
	z-index: 996;
}
.zindex-999{
	z-index: 999;
}
.zindex-9999{
	z-index: 9999;
}


.display-show{
	transition: 0.5s ease;
	display: inherit;
}
.display-hide{
	transition: 0.5s ease;
	display: none;
}

.pr-15{
	padding-right: 15px;
}

.color-white{
	color:white
}
.lowercase{
	text-transform: lowercase !important;
}
marquee p
{
	white-space:nowrap;
}

.maps{
	height: 550px;
}

@media (max-width: 768px) {
	.maps{
		height: 400px;
	}
}

@media (min-width: 1441px) {
	.maps{
		height: 650px;
	}
}
.pointer{
	cursor: pointer;
}

.nav-new{
	position: absolute;
	right: 0px;
	padding-right: 15px !important;
	top: 0;
	padding-top: 18px;
	bottom: 0;
	z-index: 998;
	background: white;
	left: 0;
	width: 30%;
	height: 100%;
	overflow-y: auto;
	transition: 0.4s;
	box-shadow: 7px 0 10px -2px #ececec;
}

.navbar-second{
	display: none !important;
	transition: 0.4s;
}

.nav-special{
	display: block !important;
	transition: 0.4s;
}

@media (max-width: 442px){
	.div-rekap{
		padding-top: 28px !important;
	}
}
@media (max-width: 340px){
	.div-rekap{
		padding-top: 58px !important;
	}
}
@media (max-width: 768px){
	.navbar-second{
		display: block !important;
		transition: 0.4s;
	}
	.nav-new{
		display: none !important;
		transition: 0.4s;
	}
	.nav-special{
		display: none !important;
		transition: 0.4s;
	}
}

/* //-- */

#myImg {
	border-radius: 5px;
	cursor: pointer;
	transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 9999; /* Sit on top */
	padding-top: 100px; /* Location of the box */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
	margin: auto;
	display: block;
	width: 80%;
	max-width: 700px;
}

/* Caption of Modal Image */
#caption {
	margin: auto;
	display: block;
	width: 80%;
	max-width: 700px;
	text-align: center;
	color: #ccc;
	padding: 10px 0;
	height: 150px;
}

/* Add Animation */
.modal-content, #caption {
	-webkit-animation-name: zoom;
	-webkit-animation-duration: 0.6s;
	animation-name: zoom;
	animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
	from {-webkit-transform:scale(0)}
	to {-webkit-transform:scale(1)}
}

@keyframes zoom {
	from {transform:scale(0)}
	to {transform:scale(1)}
}

/* The Close Button */
.close {
	position: absolute;
	top: 15px;
	right: 35px;
	color: #f1f1f1;
	font-size: 40px;
	font-weight: bold;
	transition: 0.3s;
}

.close:hover,
.close:focus {
	color: #bbb;
	text-decoration: none;
	cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
	.modal-content {
		width: 100%;
	}
}



</style>

<body>

	<header id="header" id="home" class="header-scrolled zindex-9999">
		<div class="container" style="max-width:100% !important;margin-left:15px">
			<div class="row align-items-center d-flex">
				<!-- <div onclick="goHome()" class="pointer"> -->
				<div id="logo" onclick="window.location = '<?php  echo base_url('index.php/home/');?>'" class="pointer">
					<img src="<?php echo base_url();?>assets/img/logo.png" alt="jasa-tirta-logo" style="width:100%" title="" />
				</div>
				<div onclick="window.location = '<?php  echo base_url('index.php/home/');?>'" class="pointer">
					<h5 class="dspin pl-3">SIGAB</h5>
					<p class="pos-sub-header pl-3" style="margin:0">SISTEM INFORMASI SIAGA BANJIR PERUM JASA TIRTA I</p>
				</div>
				<!-- </div> -->
				<nav id="nav-menu-container" style="position:absolute;right:0px;padding-right:15px !important;">
					<ul class="nav-menu">
						<?php 	if(!empty(($this->session->userdata('email')))) { ?>
						<li class="menu-active"><a href="<?php  echo base_url('index.php/home/'); ?>">Home</a></li>
						<li ><a href="<?php  echo base_url('index.php/telemetri/'); ?>">Grid View Data</a></li>
						<li ><a href="<?php  echo base_url('index.php/harian/'); ?>">Data Harian</a></li>
						<li ><a href="<?php  echo base_url('index.php/rekap/'); ?>">Rekap Banjir</a></li>
						<li ><a href="<?php  echo base_url('index.php/bantuan/'); ?>">Bantuan</a></li>
					<?php } ?>
						<?php	if(empty(($this->session->userdata('nama')))) { ?>
							<li ><a href="<?php  echo base_url('index.php/registrasi/'); ?>">Login</a></li>
						<?php } ?>
						<?php	if(!empty(($this->session->userdata('nama')))) { ?>
							<li class="menu-has-children"><a href="#" class="sf-with-ul">Hai, <?php echo $this->session->userdata('nama') ?></a>
								<ul style="display: none;">
									<li><a href="<?php  echo base_url('index.php/home/logout'); ?>">Keluar</a></li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header><!-- #header -->
