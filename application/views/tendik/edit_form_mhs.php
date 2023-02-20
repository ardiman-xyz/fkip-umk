<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-check green"></i>
            Selamat datang di edit Mahasiswa <strong><?= $data->nama_mhs ?></strong> !!
        </div>
      <a href="<?= base_url('tendik/mahasiswa') ?>" class="btn btn-sm btn-danger" style="border-radius: 1px;">&larr; Kembali</a>
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">Mahasiswa : <?= $data->nama_mhs ?></h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('tendik/update_mhs_action/'.$data->id) ?>" id="myCutiForm">

                   <table class="table">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nama" value="<?= $data->nama_mhs ?>" readonly>
                      </td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>
                        <input type="text" name="nim" value="<?= $data->nim ?>" readonly>
                      </td>
                    </tr>      
                     <tr>
                       <td>Nama Pembimbing I </td>
                       <td>:</td>
                       <td> 
                         <select name="pembimbing1" id="pembimbing1" class="chosen-select col-md-8 col-xs-8" required>
                         <option value="">--Pilih Dosen--</option>
                          <?php foreach($dosen as $ds) : ?>
                              <option value="<?= $ds->NIDN ?>" <?php if($data->id_pembimbing1 == $ds->NIDN){echo "selected";} ?>><?= $ds->nama_dosen ?></option>

                          <?php endforeach ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <td>Nama Pembimbing II </td>
                       <td>:</td>
                       <td> 
                         <select name="pembimbing2" id="pembimbing2" class="chosen-select col-md-8 col-xs-8" required>
                         <option value="">--Pilih Dosen--</option>
                          <?php foreach($dosen as $ds) : ?>
                            <option value="<?= $ds->NIDN ?>" <?php if($data->id_pembimbing2 == $ds->NIDN){echo "selected";} ?>><?= $ds->nama_dosen ?></option>
                          <?php endforeach ?>
                         </select>
                       </td>
                     </tr>
                     <tr>
                      <td>Judul Penelitian</td>
                      <td>:</td>
                      <td>
                        <textarea name="judul_penelitian" class="form-control" rows="5" required><?= $data->judul ?></textarea>
                      </td>
                    </tr>   
                   </table>

                  <p class="mb-0">
                    <button style="border-radius: 1px" class="btn btn-primary btn-sm" name="submit" type="submit">Update</button>
                  </p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

