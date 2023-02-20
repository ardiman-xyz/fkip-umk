
<div class="row">
  <div class="col-xs-12">

        <div class="clearfix">
          <div class="pull-right tableTools-container"></div>
        </div>

        <div class="table-header">
          Data Sekolah
        </div>
        <br>

        <a class="btn btn-sm btn-success" onclick="submit('tambah')" data-toggle="modal" data-target="#exampleModal">Tambah Sekolah</a>
      <hr>
         <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th width="60">No</th>                
                <th class="center">Nama Sekolah</th>
                <th class="center">Aksi</th>
              </tr> 
            </thead>
            <tbody id="target">

            </tbody>
          </table>

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div><!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="" action="" id="myForm">
          <input type="hidden" name="id_sekolah" value="" id="id_sekolah">
          <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control" placeholder="masukkan nama sekolah" required>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_add" onclick="add_sekolah()" class="btn btn-primary">Save</button>
        <button type="button" id="btn_update" onclick="update_sekolah()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    load_data();
  });

  function load_data()
  {
      $.ajax({
        url: 'post',
        url: '<?= base_url() ?>unit/load_data',
        dataType: 'json',
        success:function(data)
        {
          var no = 1;
          var baris = '';

          for(var i=0; i<data.length; i++)
          {
            baris += ` <tr>
                <td>${no++}</td>
                <td>${data[i].nama_sekolah}</td>
                <td>
                <a href="#exampleModal" onclick="submit(${data[i].id})" data-toggle="modal" class="btn btn-sm btn-primary">Edit</a>
                <a onclick="hapus(${data[i].id})" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>`;
          }

          $('#target').html(baris);


        }
      });
  }

    function add_sekolah()
  {
     var nama_sekolah = $('#nama_sekolah').val();

     $.ajax({
        type: 'post',
        data: 'nama_sekolah='+nama_sekolah,
        url: '<?= base_url() ?>unit/add_sekolah',
        dataType: 'json',
        success:function(data)
        {
          $('#exampleModal').modal('hide');
          load_data();

          if (data.pesan == true) {
            iziToast.success({
              timeout: 5000,
              icon: 'fa fa-check',
              title: 'Sukses',
              message: 'Data Berhasil di tambahkan!',
              // position: 'topCenter'
            });
          } else {
            iziToast.error({
              timeout: 5000,
              icon: 'fa fa-times',
              title: 'Gagal',
              message: 'Data Sudah Ada!',
              // position: 'topCenter'
            });
          }
          $('#nama_sekolah').val('');
        }
     });
  }

  function submit(x)
  {
    if (x == 'tambah') {
      $('#btn_add').show();
      $('#btn_update').hide();
    }else{
      $('#btn_add').hide();
      $('#btn_update').show();
      $('.modal-title').text('data sekolah');

      $.ajax({
          type: 'post',
          data: 'id='+x,
          url: '<?= base_url() ?>unit/getSekolah',
          dataType: 'json',
          success: function(data)
          {
            $('[name="id_sekolah"]').val(data[0].id);
            $('[name="nama_sekolah"]').val(data[0].nama_sekolah);
          }
      });

    }
  }

  function update_sekolah()
  {
    var id_sekolah = $('#id_sekolah').val();
    var nama_sekolah = $('#nama_sekolah').val();

    $.ajax({
      type: 'post',
      data: 'id='+id_sekolah+'&nama_sekolah='+nama_sekolah,
      dataType: 'json',
      url: '<?= base_url() ?>unit/update_sekolah',
      success:function(callback)
      {
        $('#exampleModal').modal('hide');

          if (callback.pesan == true) {
            iziToast.success({
              timeout: 5000,
              icon: 'fa fa-check',
              title: 'Sukses',
              message: 'Data Berhasil di update!',
              // position: 'topCenter'
            });
          }
          $('#myForm')[0].reset();
          load_data();

      }
    });
  }


  function hapus(id)
  {

    var ask = confirm('anda yakin akan menghapus data ini ?');

    if (ask) {
      $.ajax({
        type: 'post',
        data: 'id='+id,
        url: '<?= base_url() ?>unit/delete_sekolah',
        dataType: 'json',
        success:function(callback)
        {

          if (callback.pesan == true) {
            iziToast.success({
              timeout: 5000,
              icon: 'fa fa-check',
              title: 'Sukses',
              message: 'Data Berhasil di hapus!',
              // position: 'topCenter'
            });
          }
          $('#myForm')[0].reset();
           load_data();

        }
      });
    }

    // swal({
    //   title: 'Hapus Data ?',
    //   type: 'warning',
    //   confirmButtonColor: '#d9534f',
    //   confirmButtonClass: 'btn-danger',
    //   cancelButtonText: 'No, Cancel',
    //   showCancelButton: true,
    // }, 
    // function(isConfirm){
    //   if(isConfirm) {
    //     $.ajax({
    //     url: '<?= base_url() ?>unit/delete_sekolah/'+id,
    //     type: 'post',
    //     success:function(callback)
    //     {
    //       console.log(callback);
    //     }
    //   });
    //   }
    // });
  }

</script>