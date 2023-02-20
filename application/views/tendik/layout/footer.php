</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
</div>
<div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">FKIP</span>
              UMKendari &copy; 2020
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div>

<script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url("assets/back-end/") ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?= base_url('assets/back-end/') ?>assets/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/back-end/') ?>assets/js/ace-elements.min.js"></script>
<script src="<?= base_url('assets/back-end/') ?>assets/js/ace.min.js"></script>
<script src="<?= base_url('assets/'); ?>toast/jquery.toast.min.js"></script>
<script src="<?= base_url('assets/back-end/') ?>assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/timepicker/') ?>bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/back-end/') ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/back-end/') ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/js/myScript/') ?>master_surat.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url('assets/js/myScript/') ?>loading.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
 $('.clockpicker').clockpicker({
    autoclose: true
 });
</script>
<script type="text/javascript">
  $("document").ready(function(){
    $("#datepicker").datepicker({
      inline: true,
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear:  true
    });
  })
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('.chosen-select').chosen({allow_single_deselect:true}); 
});

  $('#dynamic-table').DataTable();
  $('#dynamic-table1').DataTable();
  $('#dynamic-table2').DataTable();
</script>
<script type="text/javascript">
 $('.chosen-select').chosen({allow_single_deselect:true});
</script>
<script type="text/javascript">
jQuery(function($) {
 var $sidebar = $('.sidebar').eq(0);
 if( !$sidebar.hasClass('h-sidebar') ) return;

 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
  if( event_name !== 'sidebar_fixed' ) return;

  var sidebar = $sidebar.get(0);
  var $window = $(window);

  //return if sidebar is not fixed or in mobile view mode
  var sidebar_vars = $sidebar.ace_sidebar('vars');
  if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
    $sidebar.removeClass('lower-highlight');
    //restore original, default marginTop
    sidebar.style.marginTop = '';

    $window.off('scroll.ace.top_menu')
    return;
  }


   var done = false;
   $window.on('scroll.ace.top_menu', function(e) {

    var scroll = $window.scrollTop();
    scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
    if (scroll > 17) scroll = 17;


    if (scroll > 16) {
      if(!done) {
        $sidebar.addClass('lower-highlight');
        done = true;
      }
    }
    else {
      if(done) {
        $sidebar.removeClass('lower-highlight');
        done = false;
      }
    }

    sidebar.style['marginTop'] = (17-scroll)+'px';
   }).triggerHandler('scroll.ace.top_menu');

 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);

 $(window).on('resize.ace.top_menu', function() {
  $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
 });


});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#show').on('click', function(){
      if ($(this).is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });
</script>

<script type="text/javascript" charset="utf-8" async defer>
    tinymce.init({
      selector: 'textarea#basic-example',
      height: 200,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ]
    });
    tinymce.init({
      selector: 'textarea#basic-example1',
      height: 200,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ]
    });
    tinymce.init({
      selector: 'textarea#basic-example2',
      height: 200,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ]
    });
</script>

<?php if ($this->session->flashdata('msg') === 'show-modal') : ?>
    <script type="text/javascript">
      $('#ModalResetPassword').modal('show');
    </script>
  <?php endif ?>
</body>
</html>