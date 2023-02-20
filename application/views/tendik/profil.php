<br>
<div class="row justy-content-center">
    <div class="container">
        <div class="alert alert-block alert-warning">
            <i class="ace-icon fa fa-check green"></i>
            Selamat datang du halaman <strong>Profil Administrasi Pendidikan</strong>
        </div>
    </div>
	<div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="list-group">
                  <a href="<?= base_url('tendik/pengumuman_berita/') ?>" class="list-group-item list-group-item-action">
                    Pengumuman & berita
                  </a>
                  <a href="<?= base_url('tendik/profil/') ?>" class="list-group-item list-group-item-action active">
                    Profil
                  </a>
                  <a href="<?= base_url('tendik/akademik/') ?>" class="list-group-item list-group-item-action">Akademik</a>
                  <a href="<?= base_url('tendik/fasilitas/') ?>" class="list-group-item list-group-item-action">Fasilitas</a>
                  <a href="<?= base_url('tendik/penelitian_pengabdian/') ?>" class="list-group-item list-group-item-action">Penelitian dan pengabdian</a>
                  <a href="<?= base_url('tendik/alumni/') ?>" class="list-group-item list-group-item-action">Alumni</a>
                  <a href="<?= base_url('tendik/gambar/') ?>" class="list-group-item list-group-item-action">Gambar</a>
                   <a href="<?= base_url('tendik/repository/') ?>" class="list-group-item list-group-item-action">Repository</a>
                </div>
            </div>
        </div>
    </div>
	<div class="col-md-9">
    <?php if ($this->session->flashdata('sukses')): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('sukses') ?>
      </div>
    <?php endif ?>
		<!-- PAGE CONTENT BEGINS -->
       <div class="card">
           <div class="card-body">
               <form action="<?= base_url('tendik/update_profil_adm/'.$profil->id) ?>" method="post" id="form_profil" enctype="multipart/form-data">
                    <div class="row mb-2 mt-2">
                        <label>Sambutan Prodi</label>
                        <textarea name="sambutan" id="basic-example" cols="30" rows="5" class="form-control" required><?= $profil->sambutan ?></textarea>
                    </div>
                     <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Visi & Misi Prodi</label>
                        <textarea name="visi_misi" id="basic-example1" cols="30" rows="5" class="form-control" required><?= $profil->visi_misi ?></textarea>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Kompetensi Lulusan</label>
                        <textarea name="kompetensi_lulusan" id="basic-example2" cols="30" rows="5" class="form-control" required><?= $profil->kompetensi_lulusan ?></textarea>
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 10px">
                        <label>Struktur Organisasi</label>
                        <input type="file" name="struktur_organisasi" class="form-control">
                    </div>
                    <div class="row mb-2 mt-2" style="margin-top: 20px;" align="center">
                       <button type="submit" class="btn btn-primary" id="update">Update</button>
                    </div>
               </form>  
           </div>
       </div>    
    </div>
</div>
</div>

<!-- <script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){

        $("#form_profil").submit(function(e){
            e.preventDefault();

            const me = $(this),
                  url = me.attr('action');
            const btn = $("#update").attr("disabled", "disabled");
            const data = new FormData(this);

            $.ajax({
                url: url,
                method: "post",
                data : data,
                processData:false,
                contentType:false,
                cache:false,
                success: (callbak) => {
                    console.log(callbak)
                }
            });

        });

    });
</script>    -->