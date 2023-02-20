<section class="ftco-section bg-light" style="color: black">
  <div class="container">
    <div class="row justify-content-center" >
      <div class="col-md-12 col-lg-12 ftco-animate">
        <div class="blog-entry "  style="border: 1px skyblue solid">
          <div class="text bg-white p-4">

              <div class="row">

        <div class="col-lg-3 col-md-12 col-xs-12 ml-4">
            <div class="widgets">

              <div class="widget-latest-post single-widget">
                <h4 align="center" class="font-weight-light">Jenis Surat</h4>
                <ul class="latest-post">
                  <li class="single-latest-post">

                    <form action="" method="">
                      <select class="form-control" id="pilihan">
                      <option value="">--Pilih--</option>
                      <option value="1">Izin penelitian</option>
                      <option value="2">Cuti</option>
                      <option value="3">Aktif Kuliah</option>
                    </select>
                    </form>
                    <button class="btn btn-primary btn-xs" id="simpan" style="border-radius: 1px; margin-top: 10px"><i class="fa fa-spinner"></i> Proses</button>
                 
                  </li>
                </ul>
              </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12 col-xs-12">
            <div class="blog-post">

              <div class="post-thumb">
                <img src="assets/img/blog/blog-1-big.jpg" alt="">
              </div>
              <div class="post-content">
                <div id="form_surat">
                   <div class="alert alert-info"><i class="fa fa-bullhorn"></i> Silahkan pilih menu <strong>Jenis Surat</strong>, Untuk memilih jenis surat yang akan di ajukan!</div>
                </div>
              </div>
            </div>
           </div>
        </div>

                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
  <script>
     $(document).ready(function(){

        $('#simpan').click(function(){

          var pilihan = $('#pilihan').val();

          if (!pilihan) {
             $.toast({
                    heading: 'Info',
                    text: "Silahkan pilih jenis surat",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'top-right',
                    bgColor: '#ef5252'
                });
            $("#pilihan").focus();
            return false;
          }

        $.ajax({
          type: 'post',
          url: '<?= base_url("surat/form_surat/") ?>' + pilihan,
          cache: false,
          success: function(data){

            $('#form_surat').html(data);
          }
        });

        });

     });
  </script>