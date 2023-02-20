<br>
<style type="text/css">
    .clrG{
        color: green;
        font-style: italic;
    }
    .clrR{
        color: red;
        font-style: italic;
    }
    .clrO{
        color: orange;
        font-style: italic;
    }
</style>
<div class="overlay loading" style="display: none">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-check green"></i>
			Welcome to Mahasiswa page, please select a <strong>mentor II</strong>, for student concerned!!
		</div>
        <?= $this->session->flashdata('sukses') ?>
    <h4 class="widget-title lighter">
    </h4>
	<div class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Tgl Insert</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Nim</th>
            <th class="text-center" width="300px">Judul Penelitian</th>
            <th class="text-center">Pembimbing I</th>
            <th class="text-center">Pembimbing II</th>
            <th class="text-center">Status</th>
            <th width="200px" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php $no =1; foreach ($mahasiswa as $dt): 
            $pembimbing1 = $this->registrasi->nama_pembimbing1($dt->id_pembimbing1);
            $pembimbing2 = $this->registrasi->nama_pembimbing2($dt->id_pembimbing2);

            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->tgl_insert ?></td>
                    <td><?= $dt->nama_mhs ?></td>
                    <td><?= $dt->nim ?></td>
                    <td><?= $dt->judul ?></td>
                    <td><?= $pembimbing1 ?></td>
                    <?php if (empty($dt->id_pembimbing2)): ?>
                        <td class="text-center">
                            <a href="<?= base_url('tendik/pilih_pembimbing/'.$dt->nim) ?>" class="btn btn-xs btn-primary">Pilih pemb II</a>        
                        </td>
                        <td align="center">
                            <?php if ($dt->status === 'Diterima'): ?>
                                <span class="clrG">Diterima</span>
                            <?php elseif($dt->status === 'Pending'): ?>
                                <span class="clrO">Proses</span>
                            <?php else: ?>
                                <span class="clrR">Ditolak</span>
                            <?php endif ?>
                        </td>
                        <td class="text-center">
                            <select name="status" class="form-control" onchange="update_status($(this).val(), <?= $dt->id ?>)">
                                <option value="">--pilih status--</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </td>
                    <?php else: ?>
                        <td><?= $pembimbing2 ?></td>
                         <td align="center">
                           <?php if ($dt->status === 'Diterima'): ?>
                                <span class="clrG">Diterima</span>
                            <?php elseif($dt->status === 'Pending'): ?>
                                <span class="clrO">Proses</span>
                            <?php else: ?>
                                <span class="clrR">Ditolak</span>
                            <?php endif ?>
                        </td>
                        <td align="center">
                            <a target="_blank" title="download surat pembimbing" href="<?= base_url('tendik/surat_pembimbing_skripsi/'.$dt->id) ?>" class="btn btn-xs btn-primary"><i class="fa fa-download"></i> Unduh sk</a> 
                            <a href="<?= base_url('tendik/edit_mhs/'.$dt->id) ?>" title="edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a>           
                        </td>
                    <?php endif ?>
                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
</div>

<?php if ($this->session->flashdata('msg') == 'success'): ?>
    <script type="text/javascript">
        iziToast.success({
            timeout: 7000,
            icon: 'fa fa-check',
            title: 'Sukses',
            message: 'Mentor II selected!!',
        });
    </script>
<?php endif ?>

<?php if ($this->session->flashdata('msg') == 'danger'): ?>
    <script type="text/javascript">
        iziToast.error({
            timeout: 7000,
            icon: 'fa fa-times',
            title: 'gagal',
            message: 'Silahkan update status terlebih dahulu!!',
        });
    </script>
<?php endif ?>

<script>

function update_status(value, id) {
    $.ajax({
      url: '<?= base_url("tendik/update_pengajuan_judul") ?>',
      method: 'post',
      data: {id:id, value: value},
      dataType: 'json',
      beforeSend: () =>{
        show_loading()
      },
      success: callback =>{
        if (callback.status === true) {
             iziToast.success({
                timeout: 7000,
                icon: 'fa fa-check',
                title: 'Sukses',
                message: `${callback.pesan}`,
            });
          hide_loading();
        }else{
          iziToast.error({
            timeout: 7000,
            icon: 'fa fa-times',
            title: 'Gagal',
            message: `${callback.pesan}`,
        });
          hide_loading();
        }
      },
      error: xhr =>{
        iziToast.error({
          timeout: 10000,
          icon: 'fa fa-times',
          title: 'Gagal',
          message: 'Silahkan perikas koneksi anda!',
        });
      }

  });
}


let target = document.querySelector('.loading');

function show_loading() {
  target.style.display = "block";
}

function hide_loading(){
  let fadeEffect = setInterval(() => {
      clearInterval(fadeEffect);
      target.style.display = "none"
  }, 200)
}

</script>