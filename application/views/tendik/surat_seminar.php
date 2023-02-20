 <br>
<div class="row justy-content-center">
	<div class="col-md-12">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			Selamat datang di halaman surat seminar, silahkan klik tombol <strong>Buat SK Ujian Seminar</strong> untuk membuat SK Baru
		</div>
        <?= $this->session->flashdata('sukses') ?>
    <h4 class="widget-title lighter">
	
</h4>
<a href="<?= base_url('tendik/create')  ?>" class="btn btn-sm btn-primary" style="border-radius: 1px; margin-bottom: 7px;"> Buat SK Ujian Seminar</a>
 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th>No</th>
        <th class="text-center">#</th>
        <th>Mahasiswa</th>
        <th>Program Studi</th>
        <th>Jenis Ujian</th>
        <th>Jadwal Ujian</th>
        <th>Waktu</th>
        <th class="text-center" width="70px">No. SK</th>
        <th>Aksi</th>
      </tr>
    </thead>
   <tbody>
    	<?php 
    	$no = 1;
    	foreach ($surat_seminar as $key => $data): 
        $nama_mhs = $this->surat->getMhsSeminar($data->id_surat_seminar)->result();
        ?>
    		<tr>
              <td><?= $no++ ?></td>
              <td align="center">
                  <a target="_blank" href="<?= base_url('tendik/pdf/') . $data->id_surat_seminar  ?>"  style="border-radius: 1px"><i class="fa fa-download" title="download"></i></a>
              </td>
              <td>
                <?php foreach ($nama_mhs as $item): ?>
                  <ul>
                    <li><?= $item->nama_mhs ?></li>
                  </ul>
                <?php endforeach ?>
              </td>
              <td><?= $data->nama_prodi ?></td>
              <td><?= $data->nama_ujian ?></td>
              <td><?= pengaturan_tgl($data->jadwal_ujian) ?></td>
              <td><?= $data->waktu ?></td>
              <td class="text-center">
                <?php if ($data->no_sk !== null): ?>
                    <?= $data->no_sk ?>
                <?php else: ?>
                    <input type="number" name="no_sk" class="form-control" value="<?= $data->no_sk ?>" id="sk<?= $key ?>">
                    <span class="save" id="save<?= $key ?>"title="save" onclick="save_no_sk('<?= $data->id_surat_seminar ?>', <?= $key ?>)">save</span>
                <?php endif ?>
              </td>
              <td>
                 <a href="<?= base_url('tendik/detail/'.$data->id_surat_seminar) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Detail Surat"><i class="fa fa-eye"></i></a>
                  <a href="<?= base_url('tendik/delete/'.$data->id_surat_seminar) ?>" onclick="javascript: return confirm('Anda yakin menghaspus data ini ? ')" class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip" data-placement="top" title="Delete Surat"><i class="glyphicon glyphicon-trash"></i></a>
              </td>
            </tr>
    	<?php endforeach ?>
    </tbody>
</table>
</div>
</div>

<script type="text/javascript">
    function save_no_sk(id, key){
      const no_sk = $('#sk'+key).val();
       if(!no_sk)
        {
          Swal({
            title: "Warning",
            text: "Silahkan isi no sk",
            type: "error"
          });
          return false;
        }

        $.ajax({
          url : '<?= base_url('tendik/set_no_sk') ?>',
          method: 'post',
          dataType: 'json',
          data: {
            id: id,
            no_sk: no_sk,
          },
         beforeSend: function(){
            $('#save'+key).html('sedang mengirim...');
          },
          success: callback =>{
            if (callback.status = true) {
              $('#save'+key).html('save');
              Swal({
                title: "sukses",
                text: "No sk berhasil di input ",
                type: "success"
              });
               setTimeout(() => {
                    location.reload();
                  }, 700);
            } else {
               $('#kirim'+key).html('save');
              Swal({
                title: "gagal",
                text: "no surat gagal di input",
                type: "error"
              });
            }
          }

        })

    }
</script>

<style type="text/css"> 
    .save{
        color: blue;
        cursor: pointer;
    }
</style>
