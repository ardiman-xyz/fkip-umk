

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">
              Application &copy; FKIP UMKendari</span> <?= date('Y')  ?>
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
    <!-- datatable -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
   <script src="<?= base_url('assets/back-end/') ?>assets/js/jquery.dataTables.min.js"></script>
    <!-- and datatable -->
    <!-- ace scripts -->
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace-elements.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/ace.min.js"></script>
    <script src="<?= base_url('assets/back-end/') ?>assets/js/chosen.jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>tinymce/tinymce.min.js"></script>

    <script type="text/javascript"> 
        $('#dynamic-table').DataTable();
        $('#dynamic-table1').DataTable();
        $('#dynamic-table2').DataTable();
        $('.chosen-select').chosen({allow_single_deselect:true}); 

    </script>
    
    <script>
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

      var tag_input = $('#form-field-tags');
        try{
          tag_input.tag(
            {
            placeholder:tag_input.attr('placeholder'),
            //enable typeahead by specifying the source array
            source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
            /**
            //or fetch data from database, fetch those that match "query"
            source: function(query, process) {
              $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
              .done(function(result_items){
              process(result_items);
              });
            }
            */
            }
          )
      
          //programmatically add/remove a tag
          var $tag_obj = $('#form-field-tags').data('tag');
          $tag_obj.add('Programmatically Added');
          
          var index = $tag_obj.inValues('some tag');
          $tag_obj.remove(index);
        }
        catch(e) {
          //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
          tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
          //autosize($('#form-field-tags'));
        }

        
    </script>
<script type="text/javascript">
  $('.input-daterange').datepicker({autoclose:true});
</script>
      
  <?php if ($this->session->flashdata('msg') === 'show-modal') : ?>
    <script type="text/javascript">
      $('#ModalResetPassword').modal('show');
    </script>
  <?php endif ?>


    <!-- inline scripts related to this page -->
  </body>
</html>