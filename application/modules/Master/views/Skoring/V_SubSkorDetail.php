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
              <button class="btn btn-sm btn-success" id="btn_tambah" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Skor</button>
              ||
              <a href="<?=base_url()?>Master/Skoring/SubSkoring/<?=$IdSkoring?>" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Backward</a>
              <br><br>
              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataSubSoal">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Type Skoring</th>
                      <th>RW</th>
                      <th>SW</th>
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
<form action="<?=base_url()?>Master/Skoring/DetailEdit" method="post" enctype="multipart/form-data">
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
      <div class="row">
        <div class="col-6">
          <label for="">Tipe Skoring</label>
          <input type="hidden" name="IdSkoring" id="IdSkoring_edit" value="<?=$IdSkoring?>">
          <input type="hidden" name="IdHeaderSkor" id="IdHeaderSkor_edit" value="<?=$IdHeaderSkor?>">
          <input type="hidden" name="IdDetailSkor" id="IdDetailSkor_edit" value="">

          <select name="TypeSkoring" id="TypeSkoring_edit" class="form-control">
            <option value="">-Pilih-</option>
            <option value="1">Range</option>
            <option value="2">Single</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-6">
              <label for="">Skoring 1</label>
              <input type="number" name="AngkaSkor1" id="AngkaSkor1_edit" class="form-control">
            </div>
            <div class="col-6">
              <label for="">Skoring 2</label>
              <input type="number" name="AngkaSkor2" id="AngkaSkor2_edit" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-3">
          <label for="">Hasil Skor</label>
          <input type="number" name="HasilSkor" id="HasilSkor_edit" class="form-control">
        </div>
      </div> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?=base_url()?>Master/Skoring/DetailTambah" method="post" enctype="multipart/form-data">
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
          <label for="">Tipe Skoring</label>
          <input type="hidden" name="IdSkoring" id="IdSkoring" value="<?=$IdSkoring?>">
          <input type="hidden" name="IdHeaderSkor" id="IdHeaderSkor" value="<?=$IdHeaderSkor?>">
          <select name="TypeSkoring" id="TypeSkoring" class="form-control">
            <option value="">-Pilih-</option>
            <option value="1">Range</option>
            <option value="2">Single</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-6">
              <label for="">Skoring 1</label>
              <input type="number" name="AngkaSkor1" id="AngkaSkor1" class="form-control">
            </div>
            <div class="col-6">
              <label for="">Skoring 2</label>
              <input type="number" name="AngkaSkor2" id="AngkaSkor2" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-3">
          <label for="">Hasil Skor</label>
          <input type="number" name="HasilSkor" id="HasilSkor" class="form-control">
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


<form action="<?=base_url()?>Master/Skoring/DetailDelete" method="post" enctype="multipart/form-data">
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
        <label for="">Apakah anda yakin ingin mendelete Menu ini : </label>
        <input type="hidden" name="IdDetailSkor" id="IdDetailSkor_del">
        <input type="hidden" name="IdHeaderSkor" id="IdHeaderSkor" value="<?=$IdHeaderSkor?>">
        
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
    var IdHeaderSkor = "<?=$IdHeaderSkor?>";
    $('#DataSubSoal').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/skoring/DataSkoringDetail",
            'type': "POST",
            'data': {IdHeaderSkor:IdHeaderSkor}
        },
    
		columns: [
			{
			  data : "IdHeaderSkor",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'TypeSkoring',
        render: function (data, type, row, meta) {
          if (row.TypeSkoring == 1) {
            return `Range`;
          }
          if (row.TypeSkoring == 2) {
            return `Single`;
          }
        }
      },
      { data: 'AngkaSkoring', 
        render: function (data, type, row, meta) {

          if (row.AngkaSkor2 == null || row.AngkaSkor2 == "") {
            var pembatas = '';
          }else{
            var pembatas = ' - ';
          }

          return row.AngkaSkor1+ pembatas + row.AngkaSkor2
        }
      },
      { data: 'HasilSkor'},
			{ 
				data: 'IdDetailSkor',
				render : function (data, type, row, meta) {
          if (menu_akses.edit_level == 'Y') {
            var edit = '<button type="button" onclick="GetEdit(`'+row.IdDetailSkor+'`)" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
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
            var dele = '<button type="button" onclick="GetDelete(`'+row.IdDetailSkor+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
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
      url : "<?=base_url()?>Master/Skoring/GetDataSubDetail",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("TypeSkoring_edit").value = data.TypeSkoring;
        document.getElementById("IdDetailSkor_edit").value = data.IdDetailSkor;
        document.getElementById("AngkaSkor1_edit").value = data.AngkaSkor1;
        document.getElementById("AngkaSkor2_edit").value = data.AngkaSkor2;
        document.getElementById("HasilSkor_edit").value = data.HasilSkor;
      }
    })
  }
  function GetDelete(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Skoring/GetDataSubDetail",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("IdDetailSkor_del").value = data.IdDetailSkor;

      }
    })
  }
  function getImg(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetDataSubDetail",
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