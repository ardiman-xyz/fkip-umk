</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
</div>
<div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Fkip</span>
              Application &copy; 2020
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
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url("assets/back-end/") ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- ace scripts -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace-elements.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace.min.js"></script>
    <script src="<?= base_url('assets/'); ?>toast/jquery.toast.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/timepicker/') ?>bootstrap-clockpicker.min.js"></script>

    <script type="text/javascript">
       $('.clockpicker').clockpicker({
          autoclose: true
       });
    </script>

    <!-- inline scripts related to this page -->
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
  </body>
</html>