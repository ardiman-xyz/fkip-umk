
<script>

  function add_no_surat(type, key, id)
  {
    const no_surat = $('#no_surat'+key).val();
    
     if(!no_surat)
    {
      Swal({
        title: "Warning",
        text: "Silahkan isi no surat",
        type: "error"
      });
      return false;
    }

    $.ajax({
      url : '<?= base_url('tendik/set_no_surat') ?>',
      method: 'post',
      dataType: 'json',
      data: {
        id: id,
        no_surat: no_surat,
        type: type
      },
     beforeSend: function(){
        $('#add_no_surat'+key).html('sedang mengirim...');
      },
      success: callback =>{
        if (callback.status = true) {
          $('#add_no_surat'+key).html('');
          Swal({
            title: "sukses",
            text: "No surat berhasil di input ",
            type: "success"
          });
           setTimeout(() => {
                location.reload();
              }, 700);
        } else {
           $('#kirim'+key).html('');
          Swal({
            title: "gagal",
            text: "no surat gagal di input",
            type: "error"
          });
        }
      }

    })
  }


  function kirim_pesan(type, key, id)
  {
    const isi_pesan = $('#pesan'+key).val();
    
    if(!isi_pesan)
    {
      Swal({
        title: "Warning",
        text: "Silahkan isi pesan",
        type: "error"
      });
      return false;
    }

    $.ajax({
      url : '<?= base_url('tendik/kirim_pesan') ?>',
      method: 'post',
      dataType: 'json',
      data: {
        id: id,
        isi: isi_pesan,
        type: type
      },
     beforeSend: function(){
        $('#kirim'+key).html('sedang mengirim...');
      },
      success: callback =>{
        if (callback.status = true) {
          $('#kirim'+key).html('');
          Swal({
            title: "sukses",
            text: "Berhasil mengirim ke "+callback.nama,
            type: "success"
          });
           setTimeout(() => {
                location.reload();
              }, 700);
        } else {
           $('#kirim'+key).html('');
            Swal({
              title: "gagal",
              text: "Gagagl mengirim ke "+callback.nama,
              type: "error"
            });
        }
      }

    })

  }

  function file_upload_skBeasiswa(id, key) {
     const ext = $('#fileUpload'+key).val().split('.').pop().toLowerCase(),
          property = document.getElementById('fileUpload'+key).files[0],
          nama_file = property.name;

     if (jQuery.inArray(ext, ['pdf','png','jpg','jpeg', 'docx']) == -1) {
        Swal({
          title: "gagal",
          text: "Yang anda upload bukan file!",
          type: "error"
        });

        return false;
      } 

      const size = property.size;
      if (size > 2000000) {
        Swal({
          title: "gagal",
          text: "File yang anda upload terlalu besar!",
          type: "error"
        });
        return false;
      }else{

        const form_data = new FormData();
        form_data.append('fileUpload', property);

        $.ajax({
          url: '<?= base_url('tendik/upload_file_skBeasiswa') ?>/'+id,
          method: 'post',
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('#msg'+key).html('sedang mengupload...');
          },
          success: callback =>{
              Swal({
                  title: "Berhasil",
                  text: "File berhasil di upload",
                  type: "success"
                });

               setTimeout(() => {
                location.reload();
              }, 500);
          },
          error: xhr =>{
            alert('something went wrong');
          }
        });

      } 
  }

  function file_upload_aktifKuliah(id, key) {
    const ext = $('#fileUpload'+key).val().split('.').pop().toLowerCase(),
          property = document.getElementById('fileUpload'+key).files[0],
          nama_file = property.name;

     if (jQuery.inArray(ext, ['pdf','png','jpg','jpeg', 'docx']) == -1) {
        Swal({
          title: "gagal",
          text: "Yang anda upload bukan file!",
          type: "error"
        });

        return false;
      } 

      const size = property.size;
      if (size > 2000000) {
        Swal({
          title: "gagal",
          text: "File yang anda upload terlalu besar!",
          type: "error"
        });
        return false;
      }else{

        const form_data = new FormData();
        form_data.append('fileUpload', property);

        $.ajax({
          url: '<?= base_url('tendik/upload_file_suratAktif') ?>/'+id,
          method: 'post',
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('#msg'+key).html('sedang mengupload...');
          },
          success: callback =>{
              Swal({
                  title: "Berhasil",
                  text: "File berhasil di upload",
                  type: "success"
                });

               setTimeout(() => {
                location.reload();
              }, 500);
          },
          error: xhr =>{
            alert('something went wrong');
          }
        });

      } 
  }


  function file_upload(id, key)
  {

    const ext = $('#fileUpload'+key).val().split('.').pop().toLowerCase(),
          property = document.getElementById('fileUpload'+key).files[0],
          nama_file = property.name;

     if (jQuery.inArray(ext, ['pdf','png','jpg','jpeg', 'docx']) == -1) {
        Swal({
          title: "gagal",
          text: "Yang anda upload bukan file!",
          type: "error"
        });

        return false;
      } 

      const size = property.size;
      if (size > 2000000) {
        Swal({
          title: "gagal",
          text: "File yang anda upload terlalu besar!",
          type: "error"
        });
        return false;
      }else{

        const form_data = new FormData();
        form_data.append('fileUpload', property);

        $.ajax({
          url: '<?= base_url('tendik/upload_file_surat') ?>/'+id,
          method: 'post',
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('#msg'+key).html('sedang mengupload...');
          },
          success: callback =>{
              Swal({
                  title: "Berhasil",
                  text: "File berhasil di upload",
                  type: "success"
                });

               setTimeout(() => {
                location.reload();
              }, 500);
          },
          error: xhr =>{
            alert('something went wrong');
          }
        });

      } 
  }

  function hapus_file(type, id, key) {

    Swal({
      title: "Anda yakin?",
      text: "Data akan dihapus!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus!"
    }).then(result => {
      if (result.value) {

         $.ajax({
          url: '<?= base_url('tendik/hapus_file_surat') ?>',
          type: 'post',
          dataType: 'json',
          data: {
            type: type,
            id: id
          },
          beforeSend: function(){
            $('#remove'+key).html('menghapus...');
          },
          success: callback =>{
            if(callback.status == true)
            {
              $('#remove'+key).html('');
              Swal({
                  title: "Berhasil",
                  text: "File berhasil di hapus",
                  type: "success"
                });

               setTimeout(() => {
                location.reload();
              }, 500);
            }
          },
          error: xhr => {
            alert('something went wrong!')
          }
        });

        
      }
    });
      
     
  }
  
  function approve_surat(params, id, value)
{
    $.ajax({
      url: '<?= base_url() ?>/tendik/approve_surat',
      method: 'post',
      data: {
      id: id,
      value: value,
      params: params
      },
      dataType: 'json',
      success: function(respon){
         if (respon.status) {
            Swal({
              title: "Berhasil",
              text: "data berhasil di update",
              type: "success"
            });
          } 
          setTimeout(() => {
            location.reload();
          }, 500)
      },
       error: function() {
            Swal({
              title: "Gagal",
              text: "Ada data yang sedang digunakan",
              type: "error"
            });
          }

    });
}
  
</script> 