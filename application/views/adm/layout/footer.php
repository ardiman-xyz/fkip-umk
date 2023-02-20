<?php
$konfigurasi    = $this->konfigurasi->getKonfigurasi();
?>


<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text"><?= $konfigurasi->alamat ?></span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?= $konfigurasi->telepon ?></span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?= $konfigurasi->email ?></span></a></li>
                </ul>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?= base_url() ?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="<?= base_url('mahasiswa/login') ?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Mahasiswa</a></li>
                <li><a href="<?= base_url('tendik') ?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Tendik</a></li>
                <li><a href="<?= base_url('home/dosen') ?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Dosen</a></li>
              </ul>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Google Map!</h2>
              <style type="text/css">
              iframe{
                  width: 100%;
                  height: 300px;
                }
              </style>
              <?= $konfigurasi->google_map; ?>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; 2020 All rights reserved | <?= $konfigurasi->namaweb ?> <br>
  <p>developed by <a href="https://bit.ly/381On33" style="color: salmon" target="_blank">Ardiman</a></p>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?= base_url('assets/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/aos.js"></script>
  <script src="<?= base_url('assets/') ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/scrollax.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/google-map.js"></script>
  <script src="<?= base_url('assets/') ?>js/main.js"></script>
  <script src="<?= base_url('assets/') ?>chosen/chosen.jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>z

  <script>
   $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
 $('#dynamic-table').DataTable();
 </script>


  <script type="text/javascript">

      $(document).ready(function(){
          $( "#title" ).autocomplete({
            source: "<?php echo site_url('site/adm/get_autocomplete/?');?>",
           select: function (event, ui) {
                  $(this).val(ui.item.label);
                  $("#form_search").submit(); 
              }
          });

          const base_url = '<?= base_url('assets/adm/file_upload/') ?>'

          $('#form_search').submit(function(e){

            e.preventDefault();
            const me = $(this),
                  url = me.attr('action'),
                  data = me.serialize();

            $.ajax({
              url: url,
              method: 'post',
              data: data,
              dataType: 'json',
              success: callback =>{
                console.log(callback);
                $.each(callback, function( index, value ) {
                 $('#result').html(`

                   <table>
                     <tr>
                       <td>Nama file</td> <td> ${value.nama_file}</td>
                     </tr>
                     <tr><td>Standar</td> <td> ${value.type}</td></tr>
                     <tr>
                       <td>file </td> <td> <a target="_blank" href="${base_url+'/'+value.file}" title="">${value.nama_file}</a></td>
                     </tr>
                   </table>
                  `);
                 $('#btn-refresh').html(` <button type="button" class="btn btn-sm btn-info" style="border-radius: 2px"><i class="fa fa-refresh" onclick="reload()"></i></button>`)
                });
              }
            });

          });
      });

      function reload() {
        location.reload();
      }
  </script>

  </body>
</html>