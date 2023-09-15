  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
              <button class="btn btn-sm btn-success" data-target="#tambah" id="btn_tambah" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Buku Soal</button>
              <br><br>
              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataSoal">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Urutan Soal</th>
                      <th>Soal</th>
                      <th>Status</th>
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
<form action="<?=base_url()?>Master/Soal/Edit" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
          <label for="">Nama Soal</label>
          <input type="text" name="nama_soal" id="nama_soal_edit" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Urutan Soal</label>
          <input style="max-width: 100px;" type="number" name="UrutanSoal" id="UrutanSoal_edit" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Status Soal</label>
          <select name="status_soal" id="status_soal_edit" class="form-control">
            <option value="">-Pilih-</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
          </select>
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

<form action="<?=base_url()?>Master/Soal/Tambah" method="post" enctype="multipart/form-data">
<div class="modal fade" id="tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nama Soal</label>
          <input type="text" name="nama_soal" id="nama_soal" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Urutan Soal</label>
          <input style="max-width: 100px;" type="number" name="UrutanSoal" id="" class="form-control">
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


<form action="<?=base_url()?>Master/Soal/Delete" method="post" enctype="multipart/form-data">
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
        <label for="">Apakah anda yakin ingin mendelete Menu ini : <span id="nama_soal_del"></span></label>
        <input type="hidden" name="id_soal" id="id_soal_del">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

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
    
    $('#DataSoal').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/Soal/Data_Detail",
            'type': "POST",
            
        },
		columns: [
			{
			  data : "id_soal",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'UrutanSoal' },
      { data: 'nama_soal' },
			{ data: 'status_soal',
        render : function (data, type, row, meta) {
          if (row.status_soal == 1) {
            return 'Aktif';
          }else{
            return 'Tidak Aktif';
          }
        }
      },
			{ 
				data: 'id_soal',
				render : function (data, type, row, meta) {
            var data_soal = '<a href="<?=base_url()?>Master/Soal/SubSoal/'+row.id_soal+'" type="button" class="btn btn-xs btn-success"><i class="fa fa-book"></i> Tambah Sub Soal</a>';
          if (menu_akses.edit_level == 'Y') {
            var edit = '<button type="button" onclick="GetEdit(`'+row.id_soal+'`)" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
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
            var dele = '<button type="button" onclick="GetDelete(`'+row.id_soal+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
          }else{
            var dele = ''
          }
					return data_soal + pembatas2 + edit + pembatas + dele;
				}
			}
			]
		})
	});

  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("id_soal_edit").value = data.id_soal;
        document.getElementById("nama_soal_edit").value = data.nama_soal;
        document.getElementById("UrutanSoal_edit").value = data.UrutanSoal;
        document.getElementById("status_soal_edit").value = data.status_soal;
      }
    })
  }
  function GetDelete(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("nama_soal_del").innerHTML = data.nama_soal;
        document.getElementById("id_soal_del").value = data.id_soal;

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
</script>