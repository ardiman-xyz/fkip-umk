 	<br>
<div class="row justy-content-center">
	<div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
		<!-- PAGE CONTENT BEGINS -->
		
		<div class="alert alert-block alert-warning">
			<i class="ace-icon fa fa-warning"></i>
			<b>Penting</b> Hanya file yang berekstensi <b>.xlsx => excel</b>
		</div>

		<i class="fa fa-download"></i> <a href="<?= base_url('./excel/data.xlsx') ?>" title="format excel">download format excel</a>
		<div class="space-10"></div>
	       
        <form action="<?= base_url('tendik/form') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <fieldset>
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="file" class="form-control" placeholder="Masukkan Nama Lengkap..." name="file" required/>
                    </span>
                </label>

                <div class="space-10"></div>

                <div class="clearfix">
                    <input type="submit" name="preview" value="preview" class="btn-block btn btn-sm btn-success">
                </div>
            </fieldset>
        </form>


    </div>
</div>

<div class="space-24"></div>

<div class="container">
	
<?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("tendik/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='8' class='table table-bordered' id='TableServerSide'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>No</th>
      <th>nim</th>
      <th>Nama lengkap</th>
      <th>Jenis Kelamin</th>
      <th>NO WA</th>
    </tr>";
    
    $numrow = 1;
    $no = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $nim = $row['A']; // Ambil data NIS
      $nama_lengkap = $row['B']; // Ambil data nama
      $no_wa = $row['C']; // Ambil data alamat
      $jenis_kelamin = $row['D']; // Ambil data jenis kelamin

      // var_dump($no_wa);
      
      // Cek jika semua data tidak diisi
      if($nim == "" && $nama_lengkap == "" && $jenis_kelamin == "" && $no_wa == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_lengkap_td = ( ! empty($nama_lengkap))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $no_wa_td = ( ! empty($no_wa))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if($nim == "" or $nama_lengkap == "" or $jenis_kelamin == "" or $no_wa == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td>".$no++."</td>";
        echo "<td".$nim_td.">".$nim."</td>";
        echo "<td".$nama_lengkap_td.">".$nama_lengkap."</td>";
        echo "<td".$jk_td.">".$jenis_kelamin."</td>";
        echo "<td".$no_wa_td.">".$no_wa."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<a href='".base_url("tendik/mhs")."' class='btn btn-default'>Cancel</a> &nbsp;";
      echo "<button type='submit' name='import' class='btn btn-primary'>Import</button>";
    }
    
    echo "</form>";
  }
  ?>

</div>

