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
              <a href="<?=base_url()?>Master/Soal/SubSoalInstruksi/<?=$id_subsoal?>" class="btn btn-sm btn-warning" ><i class="fas fa-backward"></i> Kembali</a>
              <br><br>
              <form action="<?=base_url()?>Master/Soal/SimpanEditSoalInstruksi" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Type Jawaban</label>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-success" name="TypeSoal" type="checkbox" id="CheckSoalText" onclick="CheckJwbText()" value='1' <?php if($data_subsoal->TypeSoal == 1){echo "Checked";}?>>
                  <label for="CheckSoalText" class="custom-control-label">Text</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-warning" name="TypeSoal" type="checkbox" id="CheckSoalImage" onclick="CheckImage()" value='2' <?php if($data_subsoal->TypeSoal == 2){echo "Checked";}?>>
                  <label for="CheckSoalImage" class="custom-control-label">Image</label>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input type="hidden" name="id_subsoal" id="id_subsoal" value="<?=$id_subsoal?>">
                  <input type="hidden" name="id_subdetail" id="id_subdetail" value="<?=$id_subdetail?>">
                  <label for="">Nama Jawaban</label>
                  <span id="IsiSoal">
                  <?php if ($data_subsoal->TypeSoal == 1) { ?>
                    <textarea name="IsiSoal" id="IsiSoal" cols="30" rows="5" class="form-control"><?=$data_subsoal->IsiSoal?></textarea>
                  <?php }else if ($data_subsoal->TypeSoal == 2) { ?>
                    <img src="<?=base_url()?>assets/images/soal/<?=$data_subsoal->IsiSoal?>" alt="" srcset="">
                  <?php }?>
                  </span>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="">Type Jawaban</label>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-success" name="TypeJawaban" type="checkbox" id="CheckText" onclick="GetCheck()" value='1' <?php if($data_subsoal->TypeJawaban == 1){echo "Checked";}?>>
                  <label for="CheckText" class="custom-control-label">Essay</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-warning" name="TypeJawaban" type="checkbox" id="CheckMultiChoice" onclick="GetCheckImage()" value='2' <?php if($data_subsoal->TypeJawaban == 2){echo "Checked";}?>>
                  <label for="CheckMultiChoice" class="custom-control-label">Multiple Choice</label>
                </div>
              </div>
              
              <div class="form-group" id="Pilihan">
                <label for="">Type Pilihan</label>
              <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-success" name="TypePilihan" type="checkbox" id="PilihanSingel" onclick="CheckSingle()" value='1' <?php if($data_subsoal->TypePilihan == 1){echo "Checked";}?>>
                  <label for="PilihanSingel" class="custom-control-label">Singel Choice</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input custom-control-input-warning" name="TypePilihan" type="checkbox" id="PilihanMulti" onclick="CheckMulti()" value='2' <?php if($data_subsoal->TypePilihan == 2){echo "Checked";}?>>
                  <label for="PilihanMulti" class="custom-control-label">Multi Choice</label>
                </div>
              </div>
              <br>
              <button type="button" class="btn btn-sm btn-success" id="add"><i class="fas fa-plus"></i> Tambah Jawaban</button>
              <br><br>
              <div class="table-responsive" id="MultiChoice">
                <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <td>Type Jawaban</td>
                      <td>Kode Jawaban</td>
                      <td>Isi Jawaban</td>
                      <td>Keterangan Jawaban</td>
                      <td style="max-width: 30px;">Jawaban</td>
                      <td>Score</td>
                      <td>Aksi</td>
                    </tr>
                  </thead>
                  <tbody id="dynamic_field">
                    <?php $i = 0; foreach ($data_subsoaldetail as $v) { $i++ ?>
                      
                      <tr id="row<?=$i?>">
                        <td>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-success" name="TypeJawab[]" type="checkbox" id="Check<?=$i?>" onclick="GetCheck('<?=$i?>')" value='1' <?php if($v->TypeJawab == 1){echo "Checked";}?>>
                            <label for="Check<?=$i?>" class="custom-control-label">Text</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-warning" name="TypeJawab[]" type="checkbox" id="CheckImage<?=$i?>" onclick="GetCheckImage('<?=$i?>')" value='2' <?php if($v->TypeJawab == 2){echo "Checked";}?>>
                            <label for="CheckImage<?=$i?>" class="custom-control-label">Image</label>
                          </div>
                        </td>
                        <td>
                            <div class="input-group ">
                                
                                <input type="text" id="KodeSoal<?=$i?>" name="KodeSoal[]" class="form-control" value="<?=$v->KodeSoal?>" style="max-width:100px">
                            </div>
                        </td>
                        <td>
                        <span id="IsiSoal<?=$i?>"></span>
                        
                        </td>
                        <td>
                          <div class="input-group ">
                            <textarea id="KetJawaban<?=$i?>" name="KetJawaban[]" class="form-control"  ><?=$v->KetJawaban?></textarea>
                          </div>
                        </td>
                        <td style='text-align:center;'>
                          <div class="icheck-success d-inline">
                            <input type="checkbox" id="checkboxsuccess<?=$i?>" value="1" name="Jawaban[]" <?php if($v->Jawaban == 1){echo "Checked";}?> onclick="CheckHidden('<?=$i?>')">
                            <input type="hidden" id="hiddenCheck<?=$i?>" value="0" name="Jawaban[]" <?php if($v->Jawaban == 1){echo "Disabled";}?> <?php if($v->Jawaban != 1){echo "Checked";}?>>
                            <label for="checkboxsuccess<?=$i?>"></label>
                          </div>
                        </td>
                        <td>
                          <div class="input-group ">
                              <input type="number" id="Score<?=$i?>" name="Score[]" class="form-control" style="max-width:100px" value="<?=$v->Score?>">
                          </div>
                      </td>
                        <td><button type="button" name="remove" id="<?=$i?>" class="btn btn-danger btn_remove">X</button></td>
                    </tr>
                    <script>
                      
                        if (<?=$v->TypeJawab?> === 2) {
                          document.getElementById('CheckImage'+<?=$i?>).checked = true;
                          document.getElementById('Check'+<?=$i?>).checked = false;
                          document.getElementById('IsiSoal'+<?=$i?>).innerHTML = '<img style="max-height:60px; max-width:60px;" src="<?=base_url()?>assets/images/soal/<?=$v->IsiDetailSoal?>" alt=""> <input type="hidden" name="files[]" class="form-control" value="<?=$v->IsiDetailSoal?>"><input type="file" name="files[]" value="<?=$v->IsiDetailSoal?>" placeholder ="<?=$v->IsiDetailSoal?>"> <br> <span class="span span-danger"><label for="">Note </label>: Jika Gambar Tidak Di Update tidak perlu klik file</span>';
                        } else if (<?=$v->TypeJawab?> === 1) {
                          document.getElementById('Check'+<?=$i?>).checked = true;
                          document.getElementById('CheckImage'+<?=$i?>).checked = false;
                          document.getElementById('IsiSoal'+<?=$i?>).innerHTML = '<div class="input-group"><input value="<?=$v->IsiDetailSoal?>" required type="text" name="files[]" class="form-control"><input type="file" name="files[]" hidden></div>';
                          
                        } else{

                        }
                        
                        
                    </script>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div style="float: right;">
                <button type="submit" class="btn btn-warning btn sm">Simpan</button>
              </div>
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
  var i=<?=$i?>;  
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
                <input type="text" id="KodeSoal`+i+`" name="KodeSoal[]" class="form-control" style="max-width:100px">
            </div>
        </td>
       
        <td>
        <span id="IsiSoal`+i+`"></span>
        </td>
        <td>
          <div class="input-group ">
            <textarea id="KetJawaban`+i+`" name="KetJawaban[]" class="form-control"  ></textarea>
          </div>
        </td>
        <td style='text-align:center;'>
          <div class="icheck-success d-inline">
            
            <input type="checkbox" id="checkboxsuccess`+i+`" value="1" name="Jawaban[]" onclick="CheckHidden('`+i+`')">
            <input type="hidden" id="hiddenCheck`+i+`" value="0" name="Jawaban[]">
            <label for="checkboxsuccess`+i+`"></label>
          </div>
        </td>
        <td>
            <div class="input-group ">
                <input type="number" id="Score`+i+`" name="Score[]" class="form-control" style="max-width:100px">
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
function CheckHidden(KolomId) {
  var checkHid = document.getElementById('checkboxsuccess'+KolomId);
  if (checkHid.checked == true) {
    document.getElementById("hiddenCheck"+KolomId).checked = false;
    document.getElementById("hiddenCheck"+KolomId).disabled = true;
  }else{
    document.getElementById("hiddenCheck"+KolomId).disabled = false;
    document.getElementById("hiddenCheck"+KolomId).checked = true;
  }
}
  <?php if ($data_subsoal->TypeJawaban == 1) { ?>
    console.log('1')
    document.getElementById('MultiChoice').hidden = true;
    document.getElementById('Pilihan').hidden = true;
    document.getElementById('add').hidden = true;
  <?php } ?>
function GetCheck(kolomId) {
  if (kolomId != null) {
    document.getElementById('CheckImage'+kolomId).checked = false;
    document.getElementById('Pilihan').hidden = false;
    document.getElementById('IsiSoal'+kolomId).innerHTML = '<div class="input-group"><input type="text" name="files[]" class="form-control" Required><input type="file" name="files[]" hidden></div>';
  } else {
    document.getElementById('CheckMultiChoice').checked = false;
    document.getElementById('MultiChoice').hidden = true;
    document.getElementById('Pilihan').hidden = true;
    document.getElementById('add').hidden = true;
    
  }
  
}
function GetCheckImage(kolomId) {
  if (kolomId != null) {
    document.getElementById('Check'+kolomId).checked = false;
    document.getElementById('IsiSoal'+kolomId).innerHTML = '<input type="hidden" name="files[]" class="form-control"><input type="file" name="files[]">';
    document.getElementById('Pilihan').hidden = false;  
  } else {
    document.getElementById('CheckText').checked = false;
    document.getElementById('MultiChoice').hidden = false;
    document.getElementById('Pilihan').hidden = false;  
    document.getElementById('add').hidden = false;
  }
  
}
function CheckJwbText() {
  var Text = document.getElementById('CheckSoalText');
  var Img = document.getElementById('CheckSoalImage');
  if (Text.checked) {
    document.getElementById('CheckSoalImage').checked = false;
    document.getElementById('IsiSoal').innerHTML = "<textarea class='form-control' name='IsiSoal' required><?=$data_subsoal->IsiSoal?></textarea>";
    console.log('TRUE');
  } 
 
  
}
function CheckImage() {
  var Text = document.getElementById('CheckSoalText');
  var Img = document.getElementById('CheckSoalImage');
  if (Img.checked) {
    document.getElementById('CheckSoalText').checked = false;
    document.getElementById('IsiSoal').innerHTML = `<input type='file' class='form-control' name='IsiSoal'><img src="<?=base_url()?>assets/images/soal/<?=$data_subsoal->IsiSoal?>" alt="" srcset="">`;
    console.log('TRUE');
  } 
 
  
}

function CheckSingle() {
  var Singel = document.getElementById('PilihanSingel');
  var Multi = document.getElementById('PilihanMulti');
  if (Singel.checked) {
    document.getElementById('PilihanMulti').checked = false;
    console.log('TRUE');
  } 
 
  
}
function CheckMulti() {
  var Text = document.getElementById('PilihanSingel');
  var Multi = document.getElementById('PilihanMulti');
  if (Multi.checked) {
    document.getElementById('PilihanSingel').checked = false;
    console.log('TRUE');
  } 
 
  
}

        
        $(function () {
  bsCustomFileInput.init();
});
</script>