<?php
$konfigurasi    = $this->konfigurasi->getKonfigurasi();
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<!-- meta tag -->
<meta charset="utf-8">
<title><?= $title ?></title>
<meta name="description" content="<?= $konfigurasi->keywords ?>">
<!-- responsive tag -->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!-- favicon -->
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?= $konfigurasi->keywords ?>">
<meta name="keywords" content="<?= $konfigurasi->keywords ?>">
<meta name="author" content="<?= $konfigurasi->description ?>">
<link rel="shortcut icon" href="<?= base_url() ?>assets/img/profil.png">
<!-- bootstrap v4 css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/bootstrap.min.css">
<!-- font-awesome css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/font-awesome.min.css">
<!-- animate css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/animate.css">
<!-- owl.carousel css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/owl.carousel.css">
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/slick.css">
<!-- magnific popup css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/magnific-popup.css">
<!-- Offcanvas CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/off-canvas.css">
<!-- flaticon css  -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>fonts/flaticon.css">
<!-- flaticon2 css  -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>fonts/fonts2/flaticon.css">
<!-- rsmenu CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/rsmenu-main.css">
<!-- rsmenu transitions CSS -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/rsmenu-transitions.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/style.css">
<!-- responsive css -->
  <!-- datatable -->
  <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- jquery UI -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front_end/') ?>css/responsive.css">
  <!-- jquery latest version -->
  <script src="<?= base_url('assets/front_end/') ?>js/jquery.min.js"></script>

  <style type="text/css" media="screen">
      .news-btn{
        display: inline-block;
        padding: 4px 16px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        background-color: #ff3115;
        color: #fff;
      }
      .news-btn a{

        color: #fff;
        transition: all 0.3s ease 0s;
        text-decoration: none !important;
        outline: none !important;
        
      }
  </style>
</head>
<body class="home1">


<div class="full-width-header">

    <!-- Toolbar Start -->
    <div class="rs-toolbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="rs-toolbar-left">
                        <div class="welcome-message">
                            <i class="fa fa-bank"></i><span>Welcome to Fkip UMKendari</span> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rs-toolbar-right">
                        <div class="toolbar-share-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <a href="<?= base_url('site/adm/login') ?>" class="apply-btn">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toolbar End -->
    
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        
        <!-- Header Top Start -->
        <div class="rs-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="header-contact">
                            <div id="info-details" class="widget-text">
                                <i class="fa fa-email"></i>
                                <div class="info-text">
                                    <a href="mailto:info@domain.com">
                                        <span>Mail Us</span>
                                        fkip@fkipumkendari.ac.id
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="logo-area text-center">
                            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/Logo_fakultas.png"  alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="header-contact pull-right">
                            <div id="phone-details" class="widget-text">
                                <i class="glyph-icon flaticon-phone-call"></i>
                                <div class="info-text">
                                    <a href="tel:4155551234">
                                        <span>Call Us</span>
                                        +1234-567-890
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <!-- Header Top End -->

       