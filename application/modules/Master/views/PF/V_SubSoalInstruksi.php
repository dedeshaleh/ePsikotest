  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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

<style>
img {
  width: 100% !important;
  height: 70px !important;
}
</style>
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
              <a href="<?=base_url()?>Master/Soal/IsiInstruksi/<?=$id_subsoaldetail?>" class="btn btn-sm btn-success"  id="btn_tambah" ><i class="fas fa-plus"></i> Tambah Soal</a>
              ||
              <a href="<?=base_url()?>Master/Soal/SubSoal/<?=$id_subsoal?>" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Backward</a>
              <br><br>
              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataSubSoal">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Isi Soal</th>
                      <th>Status</th>
                      <th>Type Soal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
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

<!-- Modal -->
<form action="<?=base_url()?>Master/Soal/SubEdit" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_soal" id="id_soal_edit">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Nama Menu</td>
              <td>Akses Menu</td>
              <td>Add</td>
              <td>Edit</td>
              <td>Delete</td>
              
            </tr>
          </thead>
          <tbody id="tbl_menu"></tbody>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?=base_url()?>Master/Soal/SubTambah" method="post" enctype="multipart/form-data">
<div class="modal fade" id="tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="">Nama Sub Soal</label>
            <table style="width: 100%;">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                <input type="text" name="IsiSoal" id="IsiSoal" class="form-control">
                </td>
              </tr>
            </table>
            <input type="hidden" name="id_soal" id="id_soal" value="<?=$id_soal?>">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Waktu Pengerjaan</label>
            <table style="text-align: center;">
              <tr>
                <td>JAM</td>
                <td style="width: 20px;"></td>
                <td>Menit</td>
              </tr>
              <tr>
                <td>
                <select name="jam" id="jam" class="form-control" value='00'>
                  <?php for ($i=0; $i <= 24; $i++) { ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php } ?>
                </select>
                </td>
                <td>-</td>
                <td>
                  <select name="menit" id="menit" class="form-control" value='00'>
                    <?php for ($i=0; $i <= 60; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="">Instruksi Soal</label>
            <textarea name="InstruksiSoal" id="InstruksiSoal" class="form-control"></textarea>
          </div>
        </div>
      </div> 
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
</form>


<form action="<?=base_url()?>Master/Soal/SubDetailDelete" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalDel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Apakah anda yakin ingin mendelete Menu ini : <span id="IsiSoal_del"></span></label>
        <input type="hidden" name="id_subdetail" id="id_subdetail_del">
        <input type="hidden" name="id_subsoaldetail" value="<?=$id_subsoaldetail?>">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>


<div class="modal fade" id="InstruksiView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="InstruksiViewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InstruksiViewLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Instruksi Soal</label>
       <span id="DataView"></span>
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalViewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalViewLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="display: inline-block;">
        <label for="">Data Soal</label>
       <span id="IsiSoal_view" ></span>
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
  $(document).ready(function() {
    var id_subsoal = "<?=$id_subsoaldetail?>";
    $('#DataSubSoal').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/Soal/Data_SubSoalInstruksi",
            'type': "POST",
            'data': {id_subsoal:id_subsoal}
        },
    
		columns: [
			{
			  data : "id_subsoal",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'IsiSoal',
        render: function (data, type, row, meta) {
          if (row.TypeSoal == 1) {
            return row.IsiSoal;
          }
          if (row.TypeSoal == 2) {
            return `<img src='<?=base_url()?>assets/images/soal/`+row.IsiSoal+`'>`;
          }
        }
      },
			{ data: 'StatusSoal',
        render : function (data, type, row, meta) {
          if (row.StatusSoal == 1) {
            return 'Aktif';
          }else{
            return 'Tidak Aktif';
          }
        }
      },
      { data: 'TypeJawaban', 
        render: function (data, type, row, meta) {
          if (row.TypeJawaban == 1) {
            return 'Essay';
          } else if(row.TypeJawaban == 2){
            return 'Choice';
          }
        }
      },
			{ 
				data: 'id_subdetail',
				render : function (data, type, row, meta) {
          if (menu_akses.edit_level == 'Y') {
            // var edit = '<button type="button" onclick="GetEdit('+row.id_subdetail+')" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
            var edit = '<a href="<?=base_url()?>Master/Soal/EditSoal/'+row.id_soalinstruksi+'" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>'
          }else{
            var edit = '';
          }
          if (menu_akses.edit_level == 'Y' || menu_akses.edit_level == 'Y') {
            var pembatas2 = ' || ';
          } else {
            var pembatas2 = '';
          }
          if (menu_akses.edit_level == 'Y' && menu_akses.delete_level == 'Y') {
            var pembatas = ' || ';
          } else {
            var pembatas = '';
          }
          if (menu_akses.delete_level == 'Y') {
            var dele = '<button type="button" onclick="GetDelete(`'+row.id_soalinstruksi+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
          }else{
            var dele = ''
          }
					return pembatas2 + edit + pembatas + dele;
				}
			}
			]
    
		})
	});

  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetDataSubInstruksi",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {

      }
    })
  }
  function GetDelete(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetDataSubInstruksi",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("IsiSoal_del").innerHTML = data.IsiSoal;
        document.getElementById("id_subdetail_del").value = data.id_soalinstruksi;

      }
    })
  }
  function getImg(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetDataSubInstruksi",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalView").modal("show");
        document.getElementById("IsiSoal_view").innerHTML = data.IsiSoal;
      }
    })
  }
  var loadFile = function(event) {
          var output = document.getElementById('output');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
          document.getElementById("logo_pre").hidden = false;
        };
  $(function () {
    bsCustomFileInput.init();
  });
  $(document).ready(function(){
            $('#InstruksiSoal').summernote({
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
                    url: "<?php echo site_url('Master/Soal/upload_image')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                        $('#InstruksiSoal').summernote("insertImage", url);
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
                    url: "<?php echo site_url('Master/Soal/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 
        });

        function GetView(InstruksiSoal) {
          $('#InstruksiView').modal('show');
          document.getElementById('DataView').innerHTML = InstruksiSoal;
        }
</script>