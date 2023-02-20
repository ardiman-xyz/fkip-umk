<br>

<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Data pendaftar ujian
		</div>
        <?= $this->session->flashdata('sukses') ?>
    <h4 class="widget-title lighter">
      <!-- <i class="ace-icon glyphicon glyphicon-ok green"></i>
      Surat Izin Penelitian -->
    </h4>
		<div class="row" style="margin-top: 10px">
          <form action="<?= base_url('tendik/filter_pendaftar') ?>" method="post" id="formFilter">
            <div class="col-md-2">
              <div>
                  <label for="form-field-select-3"><i class="fa fa-filter blue"></i> Filter Data</label>
                  <br />
                  <select name="jenis_ujian" class="form-control" required>
                    <option value="">--Pilih Filter data-- </option>
                    <?php foreach ($jenis_ujian as $js): ?>
                       <option value="<?= $js->id_ujian ?>"><?= $js->nama_ujian ?></option>
                     <?php endforeach ?> 
                  </select>
                </div>
            </div>
            <div class="col-md-2">
              <div style="margin-top: 5px">
                  <br />
                  <select name="filter" class="form-control" id="filter" required>
                    <option value="">Filter Berdasarkan</option>
                    <option value="0">Tampil semua</option>
                    <option value="1">Per Tanggal</option>
                    <option value="2">Per Bulan</option>
                    <option value="3">Per Tahun</option>
                    <option value="4">Sudah ujian</option>
                    <option value="5">Belum ujian</option>  
                  </select>
                </div>
            </div>
            <div id="result"></div>
              <button style="margin-top: 26px;" class="btn btn-sm btn-primary" type="submit" id="submit"><i class="fa fa-filter"></i> filter</button>
           </form>
          </div>
        
          <hr>
          <div id="result" class="table-responsive">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Tgl</th>
                  <th class="text-center">Jenis Ujian</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Nim</th>
                  <th class="text-center">No. Hp</th>
                  <th class="text-center">Smt</th>
                  <th class="text-center">Judul</th>
                  <th class="text-center">Pemb.1</th>
                  <th class="text-center">Pemb.2</th>
                  <th class="text-center">Status Ujian</th>
                  <th class="text-center">Aksi</th>
                </tr> 
              </thead>
              <tbody>
                <?php $no = 1; foreach ($pendaftar as $key => $dt): 
                  $jenis_ujian = $this->daftar_ujian->nama_jenis_ujian($dt->id_jenis_ujian);
                  $pembimbing1 = $this->daftar_ujian->get_pembimbing1($dt->nim);
                  $pembimbing2 = $this->daftar_ujian->get_pembimbing2($dt->nim);
                ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= pengaturan_tgl($dt->created) ?></td>
                    <td><?= $jenis_ujian ?></td>
                    <td>
                      <?php if ($dt->status_pengajuan === 'Proses'): ?>
                       <?= $dt->nama ?> <i class="fa fa-refresh orange"></i>
                      <?php elseif($dt->status_pengajuan === 'Cair'): ?>
                        <?= $dt->nama ?> <i class="fa fa-check green"></i>
                      <?php else: ?>
                        <?= $dt->nama ?> <i class="fa fa-refresh red"></i>
                      <?php endif ?>                        
                      </td>
                    <td><?= $dt->nim ?></td>
                    <td><?= $dt->no_hp ?></td>
                    <td class="text-center"><?= $dt->semester ?></td>
                    <td width="350px">
                      <?= $dt->judul ?>
                    </td>
                    <td><?= $pembimbing1 ?></td>
                    <td><?= $pembimbing2 ?></td>
                    <td>
                      <select name="status" id="status<?= $key+1 ?>" onchange="update_status(<?= $dt->id ?>,<?= $key+1 ?>)">
                        <option value="">Pilih</option>
                        <option value="1" <?= ($dt->status === '1' ? 'selected' : "") ?>>Sudah</option>
                        <option value="0"  <?= ($dt->status === '0' ? 'selected' : "") ?>>Belum</option>
                      </select>
                    </td>
                    <td class="text-center">
                       <div class="hidden-sm action-buttons">
                          <a class="blue" href="<?= base_url('tendik/detail_daftar_ujian/'.$dt->nim.'/'.$dt->id_jenis_ujian) ?>">
                              <i class="ace-icon fa fa-eye bigger-130"></i>
                            </a>
                          <a class="red" href="<?= base_url('tendik/delete_pendaftar_ujian/'.$dt->id) ?>">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                          </a>
                        </div>
                    </td> 
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
         </div>
  </div>
</div>

<script>
   $(document).ready(function(){ 

         $('#filter').change(function(){ 

            if($(this).val() == '1'){ 
               $('#result').html(add_tgl());
            }else if($(this).val() == '2'){ 
                 $('#result').html(add_bln());
            }else if($(this).val() == '3'){ 
               $('#result').html(add_thn());
            }else if($(this).val() == '4'){ 
               $('#result').html(add_thn());
            }else if($(this).val() == '5'){ 
               $('#result').html(add_thn());
            }else{
              $('#result').html('');
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });

    })



   function add_tgl() {
     return `
       <div class="col-md-2">
            <div  style="margin-top: 26px" id="form-tanggal">
              <input type="date" name="tgl" class="form-control" value="" required>
            </div>
        </div>
     `
   }

   function add_bln() {
     return `
        <div class="col-md-2">
                <div  style="margin-top: 26px" id="form-bulan">
                 <select name="bulan" class="form-control" required>
                     <option value="">--Pilih Bulan--</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>                 
                  </select>                  
                </div>
            </div>
             <div class="col-md-2">
                <div  style="margin-top: 26px" id="form-tahun">
                  <select name="tahun" class="form-control" required>
                    <option value="">--Pilih Tahun--</option>
                    <?php foreach ($tahun as $thn): ?>
                      <option value="<?= $thn->tahun ?>"><?= $thn->tahun ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
            </div>
     `
   }

   function add_thn() {
     return `
      <div class="col-md-2">
          <div  style="margin-top: 26px" id="form-tahun">
            <select name="tahun" class="form-control" required>
              <option value="">--Pilih Tahun--</option>
              <?php foreach ($tahun as $thn): ?>
                <option value="<?= $thn->tahun ?>"><?= $thn->tahun ?></option>
              <?php endforeach ?>
            </select>
          </div>
      </div>
     `
   }

   function update_status(id, key)
   {
      const value = $('#status'+key).val();

      $.ajax({
        url: "<?= base_url('tendik/update_status_ujian') ?>",
        type: "post",
        data: {
          id: id,
          value: value
        },
        dataType: 'json',
        success: callback =>{
          if (callback.message == 'success') {
            iziToast.success({
              timeout: 5000,
              icon: 'fa fa-check',
              title: 'Sukses',
              message: 'Status berhasil di ubah!',
              position: 'topRight'
            });
          }
        },
        error: xhr =>{
           iziToast.error({
              timeout: 5000,
              icon: 'fa fa-time',
              title: 'Message',
              message: 'Something Wrong On your network!',
              position: 'topCenter'
            });
        }
      })
   }

</script>