  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.css">

  <!-- DataTables  & Plugins -->
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/jszip/jszip.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Summernote -->
  <script src="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?=base_url()?>assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?=$judul?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="#"><?=$judul?></a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
 
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
              <i class="fas fa-folder-open"></i>
                <?=$judul?>
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?=base_url()?>Master/Soal/SubSoalDetail/<?=$id_subsoal?>" class="btn btn-sm btn-warning"  id="btn_tambah" ><i class="fas fa-backward"></i> Kembali</a>
              <br><br>
              <form action="<?=base_url()?>Master/Soal/SimpanSoal" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                  <input type="hidden" name="id_subsoal" id="id_subsoal" value="<?=$id_subsoal?>">
                  <label for="">Nama Soal</label>
                  <textarea name="IsiSoal" id="IsiSoal" cols="30" rows="5" class="form-control"></textarea>
                </div>

              </div>
              <div class="form-group">
                <label for="">Type Soal</label>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-success" name="TypeSoal" type="checkbox" id="CheckText" onclick="GetCheck()" value='1'>
                  <label for="CheckText" class="custom-control-label">Essay</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-warning" name="TypeSoal" type="checkbox" id="CheckMultiChoice" onclick="GetCheckImage()" value='2'>
                  <label for="CheckMultiChoice" class="custom-control-label">Multiple Choice</label>
                </div>
              </div>
              <br>
              <button type="button" class="btn btn-sm btn-success" id="add"><i class="fas fa-plus"></i> Tambah Soal</button>
              <br><br>
              <div class="table-responsive" id="MultiChoice">
                <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <td>Type Soal</td>
                      <td>Kode Soal</td>
                      <td>Isi Soal</td>
                      <td style="max-width: 30px;">Jawaban</td>
                      <td>Aksi</td>
                    </tr>
                  </thead>
                  <tbody id="dynamic_field"></tbody>
                </table>
              </div>
              <button type="submit" class="btn btn-success btn sm">Simpan</button>
              </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

        
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- bs-custom-file-input -->
<script src="<?=base_url()?>assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  var id_menu = localStorage.getItem('GetMenu');
  var id_user = '<?=$this->session->userdata('id_user')?>';
  var menu_akses = $.ajax({
        url : "<?=base_url()?>Master/Soal/getAkses",
        type : "POST",
        dataType : "JSON",
        async : false,
        data : {id_menu:id_menu, id_user:id_user},
        success : function (data) {

        }
      }).responseJSON;
      if (menu_akses.add_level != 'Y') {
        document.getElementById('btn_tambah').hidden = true;
      }
  

  $(document).ready(function(){
  var i=1;  
  $('#add').click(function(){
      i++; 
      html = "";
      html +=
      `
      <tr id="row`+i+`">
        <td>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input custom-control-input-success" name="TypeJawab[]" type="checkbox" id="Check`+i+`" onclick="GetCheck('`+i+`')" value='1'>
            <label for="Check`+i+`" class="custom-control-label">Text</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input custom-control-input-warning" name="TypeJawab[]" type="checkbox" id="CheckImage`+i+`" onclick="GetCheckImage('`+i+`')" value='2'>
            <label for="CheckImage`+i+`" class="custom-control-label">Image</label>
          </div>
        </td>
        <td>
            <div class="input-group ">
                <input required type="text" id="KodeSoal`+i+`" name="KodeSoal[]" class="form-control" style="max-width:100px">
            </div>
        </td>
        <td>
        <span id="IsiSoal`+i+`"></span>
        </td>
        <td style='text-align:center;'>
          <div class="icheck-success d-inline">
            <input type="checkbox" id="checkboxsuccess`+i+`" value="1" name="Jawaban[]">
            <label for="checkboxsuccess`+i+`"></label>
          </div>
        </td>
        
        <td><button type="button" name="remove" id="`+i+`" class="btn btn-danger btn_remove">X</button></td>
    </tr>
      `
       $('#dynamic_field').append(html);
       $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });


  $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
      });
});  

function GetCheck(kolomId) {
  if (kolomId != null) {
    document.getElementById('CheckImage'+kolomId).checked = false;
    document.getElementById('IsiSoal'+kolomId).innerHTML = '<div class="input-group"><input type="text" name="files[]" class="form-control"><input type="file" name="files[]" hidden></div>';
  } else {
    document.getElementById('CheckMultiChoice').checked = false;
    document.getElementById('MultiChoice').hidden = true;
    document.getElementById('add').hidden = true;
    
  }
  
}
function GetCheckImage(kolomId) {
  if (kolomId != null) {
    document.getElementById('Check'+kolomId).checked = false;
    document.getElementById('IsiSoal'+kolomId).innerHTML = '<input type="hidden" name="files[]" class="form-control"><input type="file" name="files[]">';
  } else {
    document.getElementById('CheckText').checked = false;
    document.getElementById('MultiChoice').hidden = false;
    document.getElementById('add').hidden = false;
  }
  
}

        $(document).ready(function(){
            $('#IsiSoal').summernote({
                height: "300px",
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImage(target[0].src);
                    }
                }
            });
 
            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('Master/Soal/upload_soalimage')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#IsiSoal').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
 
            function deleteImage(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('Master/Soal/delete_soalimage')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 
        });
        $(function () {
  bsCustomFileInput.init();
});
</script>