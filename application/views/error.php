<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>404 - Error</title>
  <link rel="stylesheet" href="">
  <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/fonts.googleapis.com.css" />

    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/back-end/') ?>assets/css/ace-rtl.min.css" />
    <!-- ace settings handler -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace-extra.min.js"></script>
</head>
<body style="background-color: white">

<div class="main-content" style="background-color: white">
  <div class="container">
    <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->

      <div class="error-container">
        <div class="well">
          <h1 class="grey lighter smaller">
            <span class="blue bigger-125">
              <i class="ace-icon fa fa-sitemap"></i>
              404
            </span>
            Page Not Found
          </h1>

          <hr />
          <h3 class="lighter smaller">We looked everywhere but we couldn't find it!</h3>

          <div>
            <div class="space"></div>
            <h4 class="smaller">Try one of the following:</h4>

            <ul class="list-unstyled spaced inline bigger-110 margin-15">
              <li>
                <i class="ace-icon fa fa-hand-o-right blue"></i>
                Re-check the url for typos
              </li>

              <li>
                <i class="ace-icon fa fa-hand-o-right blue"></i>
                Read the faq
              </li>

              <li>
                <i class="ace-icon fa fa-hand-o-right blue"></i>
                Tell us about it
              </li>
            </ul>
          </div>

          <hr />
          <div class="space"></div>

          <div class="center">
            <a href="javascript:history.back()" class="btn btn-grey">
              <i class="ace-icon fa fa-arrow-left"></i>
              Go Back
            </a>

            <a href="#" class="btn btn-primary">
              <i class="ace-icon fa fa-tachometer"></i>
              Dashboard
            </a>
          </div>
        </div>
      </div>

      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  </div>
</div>
  

  <!--[if !IE]> -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/bootstrap.min.js"></script>


    <!-- ace scripts -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace-elements.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace.min.js"></script>
  
</body>
</html>