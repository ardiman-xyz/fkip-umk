<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
	   <div class="col-md-10">
	      <span id="message"></span>
	      <div class="alert alert-block alert-success">
	        <i class="ace-icon fa fa-warning"></i>
	          Silahkan upload persyaratan penawaran 
	      </div>


	  <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">isi form dengan data yang valid!</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
          	 <form class="form-horizontal form-label-left" method="post" action="<?= base_url('mahasiswa/penawaran/simpan_penawaran') ?>" id="penawaran_form" enctype="multipart/form-data">
                   <div class="table-responsive">
                     <table class="table">
                     	<tr>
                       <td>Tahun akademik</td>
                       <td> 
                        <input type="text" name="tahun_akademik" id="tahun_akademik" class="col-md-8  col-xs-8" required placeholder="ex. 2021/2022">
                       </td>
                     </tr>
                     <tr>
                       <td>Semester</td>
                       <td> 
                        <input type="text" name="semester" id="semester" class="col-md-8  col-xs-8" required placeholder="ex. Genap">
                       </td>
                     </tr>
                      <tr>
                         <td>Nama Dosen PA</td>
                         <td>
                         <select name="nama_dosen_pa" class="form-control chosen-select" required>
                            <option value="">--Pilih dosen PA--</option>
                            <?php foreach ($dosen as $key => $ds): ?>
                              <option value="<?= $ds->id_dosen ?>"><?= $ds->nama_dosen ?></option>
                            <?php endforeach ?>
                          </select> 
                         </td>
                       </tr>
                     <tr>
                       <td>Bukti Pembayaran (<small>semester ini</small>) </td>
                       <td> 
                        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>

                     <tr>
                       <td>KHS (<small>semester sebelumnya</small>) </td>
                       <td> 
                        <input type="file" name="khs" id="khs" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>


                     <tr>
                       <td>KRS (<small>Sejak semester I sampai sekarang</small>) </td>
                       <td> 
                        <input type="file" name="krs" id="krs" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>


                     <tr>
                       <td>Screenshoot telah mengisi kusioner</td>
                       <td> 
                        <input type="file" name="sc_kuisioner" id="sc_kuisioner" class="col-md-8  col-xs-8" required>
                       </td>
                     </tr>
                    
                   </table>

                   </div>

                 <button class="btn btn-primary pull-right" name="submit" type="submit" id="submit">Kirim</button>
                 <br>
                 <br>
            </form>
          </div>
      </div>


	  </div>

	</div>
</div>