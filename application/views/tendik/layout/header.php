<?php
$konfigurasi    = $this->konfigurasi->getKonfigurasi();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <meta name="description" content="top menu &amp; navigation" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
     <link rel="shortcut icon" href="<?= base_url() ?>assets/img/profil.png">

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/back-end/assets/css/') ?>style.css">


    <!-- text fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/chosen.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/timepicker/') ?>bootstrap-clockpicker.min.css">
    <link href="<?= base_url('assets/') ?>iziToast/css/iziToast.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>toast/jquery.toast.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>select2/select2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">

    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace-extra.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/jquery-min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>iziToast/js/iziToast.min.js"></script>
    <script src="<?= base_url('assets/') ?>sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/'); ?>tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/'); ?>select2/select2.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/back-end/') ?>assets/js/jquery.ui.js"></script>

    
    <style type="text/css">
        body{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }
        .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        top: 40%;
      }
    .lds-ring div {
      box-sizing: border-box;
      display: block;
      position: absolute;
      width: 40px;
      height: 40px;
      margin: 8px;
      border: 4px solid #fff;
      border-radius: 50%;
      animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      border-color: #000 transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
      animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
      animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
      animation-delay: -0.15s;
    }
    @keyframes lds-ring {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .overlay{
      z-index: 999999;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.4);
      text-align: center; 
    }
    </style>
  </head>

<body class="no-skin">
<!-- <div class="overlay loading">
    <div class="lds-ripple"><div></div><div></div></div>
</div> -->