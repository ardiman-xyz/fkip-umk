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
<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<b>Selamat datang di halaman pengajuan judul</b>
            <ul>
                <li>Silahkan anda mengajukan judul dengan mengklik tombol <strong>Ajukan Judul</strong></li>
                <li>Pembimbing II akan di masukkan oleh prodi, sebaiknya konfirmasi pembimbing II ke prodi  </li>
                <li>Jika status telah di terima, maka judul tidak dapat di ubah lagi. Silahkan hubungi prodi untuk mengubah judul anda</li>
            </ul>
		</div>

		<a href="<?= base_url('mahasiswa/registrasi/registrasi')  ?>" class="btn btn-primary btn-sm" style="border-radius: 1px; margin-bottom: 7px;"> Ajukan Judul</a>
    <h4 class="widget-title lighter">
    </h4>
	<div class="table-responsive">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Nim</th>
            <th class="text-center">Judul Penelitian</th>
            <th class="text-center">Pembimbing I</th>
            <th class="text-center">Pembimbing II</th>
            <th class="text-center">Status</th>
            <th width="180px" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php $no =1; foreach ($data as $dt): 
                    $pembimbing1 = $this->registrasi->nama_pembimbing1($dt->id_pembimbing1);
                    $pembimbing2 = $this->registrasi->nama_pembimbing2($dt->id_pembimbing2);

                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $dt->nama_mhs ?></td>
                            <td><?= $dt->nim ?></td>
                            <td><?= $dt->judul ?></td>
                            <td><?= $pembimbing1 ?></td>
                            <?php if (empty($dt->id_pembimbing2)): ?>
                                <td> --belum ada pembibing II--</td>
                            <?php else: ?>
                                <td><?= $pembimbing2 ?></td>
                            <?php endif ?>
                            <td align="center">
                                <?php if ($dt->status === 'Diterima'): ?>
                                    <span class="clrG">Diterima</span>
                                <?php elseif($dt->status === 'Pending') : ?>
                                    <span class="clrO">Proses</span>
                                <?php else: ?>
                                     <span class="clrR">Ditolak</span>
                                <?php endif ?>
                            </td>
                             <td align="center">
                                <?php if ($dt->status === 'Diterima'): ?>
                                    --
                                <?php else: ?>
                                <a href="<?= base_url('mahasiswa/registrasi/edit/'.$dt->id) ?>" title="edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Ubah</a> 
                                 <a onclick="return confirm('apakah anda yakin ?')" href="<?= base_url('mahasiswa/registrasi/hapus/'.$dt->id) ?>" title="edit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>    
                                <?php endif ?>         
                            </td>
                        </tr>
                    <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    </div>
</div>
</div>
