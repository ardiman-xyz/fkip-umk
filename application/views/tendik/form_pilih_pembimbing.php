<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="alert alert-block alert-success">
            <i class="ace-icon fa fa-check green"></i>
            Welcome to Mahasiswa page, please select a <strong>mentor II</strong>, for <strong><?= $mahasiswa->nama_mhs ?></strong>!!
        </div>
      <a href="<?= base_url('tendik/mahasiswa') ?>" class="btn btn-sm btn-danger" style="border-radius: 1px;">&larr; Kembali</a>
      <div class="widget-box">
        <div class="widget-header widget-header-flat">
          <h4 class="widget-title smaller">Daftar Ujian</h4>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <form class="form-horizontal form-label-left" method="post" action="<?= base_url('tendik/pilih_pembimbing_action/'. $mahasiswa->nim) ?>" id="myCutiForm">

                   <table class="table">
                     <tr>
                       <td>Nama Pembimbing II </td><td> 
                       <select name="pembimbing2" id="pembimbing2" class="chosen-select col-md-6 col-xs-8" required>
                       <option value="">--Pilih Dosen--</option>
                        <?php foreach($dosen as $ds) : ?>
                            <option value="<?= $ds->NIDN ?>"><?= $ds->nama_dosen ?></option>
                        <?php endforeach ?>
                       </select>
                       </td>
                     </tr>
                     
                   </table>

                  <p class="mb-0"><button style="border-radius: 1px" class="btn btn-primary btn-sm" name="submit" type="submit">Simpan <span class="ion-ios-arrow-round-forward"></span></button></p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

