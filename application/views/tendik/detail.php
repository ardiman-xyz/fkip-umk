<br>
<div class="row justy-content-center">
	<div class="col-md-8 col-md-offset-2">
		<!-- PAGE CONTENT BEGINS -->
		<div class="alert alert-block alert-success">
			<i class="ace-icon fa fa-check green"></i>
			 Detail <strong>pendaftaran Ujian seminar </strong> 
       <ul class="list-unstyled spaced">
         <li><i class="ace-icon fa fa-check green"></i> Silahkan <b>Download/Print</b> Surat dengan mengclick icon (<i class="fa fa-download"></i>) Dipojok Kanan dari tabel.</li>
       </ul>
		</div>
<a href="<?= base_url('tendik/surat_seminar') ?>" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-arrow-left"></i> kembali</a>

    <div class="widget-box">
      <div class="widget-header widget-header-flat">
        <h4 class="widget-title smaller"><i class="glyphicon glyphicon-list"></i> Detail Surat Ujian
        	<?php if ($data->id_jenis_ujian == '1'): ?>
			PROPOSAL PENELITIAN
    		<?php elseif ($data->id_jenis_ujian == '2') : ?>
    			HASIL PENELITIAN
    		<?php else: ?>
    			SKRIPSI
    		<?php endif ?>
        </h4>
        <div class="widget-toolbar">
          <label> <a target="_blank" href="<?= base_url('tendik/pdf/') . $data->id_surat_seminar  ?>"  style="border-radius: 1px"><i class="fa fa-download blue" title="download"></i></a>
          </label>
        </div>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <code class="pull-right" id="dt-list-code"></code>

          <div style="border-bottom: 1px solid orange; margin-bottom: 30px;">
             <ul class="list-unstyled spaced">
              <li>
                <i class="ace-icon fa fa-users bigger-110 green"></i>
                  <b>WAKTU & TIM PENGUJI SEMINAR
                    	<?php if ($data->id_jenis_ujian == '1'): ?>
                			PROPOSAL PENELITIAN
                		<?php elseif ($data->id_jenis_ujian == '2') : ?>
                			HASIL PENELITIAN
                		<?php else: ?>
                			SKRIPSI
                		<?php endif ?>
                  </b>
              </li>
            </ul>
            <table class="table table-stripped">
           <tr>
             <td>Program Studi</td><td> : <span style="text-transform: uppercase;"> <?= $data->nama_prodi ?></span></td>
           </tr>
           <tr>
             <td>Ketua</td><td> : <?= $data->ketua ?></td>
           </tr>
           <tr>
             <td>Sekretaris</td><td> : <?= $data->sekretaris ?></td>
           </tr>
           <?php $no = 1; foreach ($anggota as $item): ?>
           <tr>
             <td>Anggota <?= $no++ ?></td><td> : <?= $item->nama_anggota ?></td>
           </tr>
           <?php endforeach ?>
           <tr>
             <td>Jadwal Ujian</td><td> : <?= pengaturan_tgl($data->jadwal_ujian) ?></td>
           </tr>
            <tr>
             <td>Waktu</td><td> : <?= $data->waktu ?> WITA - Selesai</td>
           </tr>
          </table>
          </div>

         <div style="border-bottom: 1px solid orange; margin-bottom: 5px;">
          <ul class="list-unstyled spaced">
              <li>
                <i class="ace-icon fa fa-user bigger-110 green"></i>
                  <b>MAHASISWA YANG UJIAN</b>
              </li>
            </ul>
            <table class="table table-stripped table-hover">
            <?php $no = 1; foreach ($mhs_seminar as $dt): 
              // $nama_pembimbing1 = $this->surat->nama_pembimbing1($dt->pembimbing1);
              // $nama_pembimbing2 = $this->surat->nama_pembimbing2($dt->pembimbing2);
              ?>
              <tr>
                <td><i class="fa fa-user"></i></td>
              </tr>
             <tr>
               <td> Nama/Stambuk</td><td> : <?= $dt->nama_mhs ?>/<?= $dt->nim ?></td>
             </tr>
             <tr>
               <td>Judul Skripsi</td><td> : <?= $dt->judul_skripsi ?></td>
             </tr>
             <tr>
               <td>Pembimbing</td><td> : 
                  <ol>
                   <li><?= $dt->pembimbing1 ?></li>
                   <li><?= $dt->pembimbing2 ?></li>
                 </ol>
               </td>
             </tr>
            <?php endforeach ?>
          </table>
         </div>
          
        </div>
      </div>
    </div>
    

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
	