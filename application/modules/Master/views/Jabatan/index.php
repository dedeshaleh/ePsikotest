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
              <button class="btn btn-sm btn-success" data-target="#tambah" data-toggle="modal" id="btn_tambah"><i class="fas fa-plus"></i> Tambah Jabatan</button>
              <div class="table-responsive">
              <table class="table table-sm table-stripped" id="data_user">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($DataJabatan as $val) { ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$val->NamaJabatan?></td>
                        <td><?php if ($val->StatusJabatan == 1) {
                          echo "Aktif";
                        }else{
                          echo "Tidak Aktif";
                        }?></td>
                        <td><button type="button" onclick="GetEdit('<?=$val->id_jabatan?>')" class="btn btn-xs btn-warning btnEdit" ><i class="fa fa-edit"></i></button> || <button type="button" onclick="GetDelete('<?=$val->id_jabatan?>')" class="btn btn-xs btn-danger btnDelete"><i class="fa fa-trash"></i></button></td>
                      </tr>
                    <?php } ?>
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
<form action="<?=base_url()?>Master/Jabatan/Tambah" method="post" enctype="multipart/form-data">
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
            <label for="">Nama Jabatan</label>
            <input type="text" name="NamaJabatan" id="NamaJabatan" class="form-control">
          </div>
          </div>
          <div class="col-6">
          
          </div>
        </div>
        <div class="row">
          <div class="col-6">
         
          </div>
          <div class="col-6">
          
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

<!-- Modal Edit-->

<!-- Modal -->
<form action="<?=base_url()?>Master/Jabatan/Edit" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Nama Jabatan</label>
            <input type="text" name="NamaJabatan" id="NamaJabatan_edit" class="form-control">
            <input type="hidden" name="id_jabatan" id="id_jabatan_edit" class="form-control">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
              <label for="">Status Jabatan</label>
              <select name="StatusJabatan" id="StatusJabatan_edit" class="form-control">
                <option value="">-Pilih-</option>
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
              </select>
            </div>
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


<form action="<?=base_url()?>Master/Jabatan/Del" method="post" enctype="multipart/form-data">
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
        <label for="">Apakah anda yakin ingin mendelete Jabatan ini : <span id="NamaJabatan_del"></span></label>
        <input type="hidden" name="id_jabatan" id="id_jabatan_del">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
  $(function () {
    $("#data_user").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Jabatan/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("NamaJabatan_edit").value = data.NamaJabatan;
        document.getElementById("id_jabatan_edit").value = data.id_jabatan;
        document.getElementById("StatusJabatan_edit").value = data.StatusJabatan;
        

      }
    })
  }
  function GetDelete(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Jabatan/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("NamaJabatan_del").innerHTML = data.NamaJabatan;
        document.getElementById("id_jabatan_del").value = data.id_jabatan;

      }
    })
  }
  var loadFile = function(event) {
          var output = document.getElementById('logo_img');
          output.src = URL.createObjectURL(event.target.files[0]);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
        var loadFileEdit = function(event) {
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
      console.log(menu_akses)
      if (menu_akses.add_level != 'Y') {
        document.getElementById('btn_tambah').hidden = true;
      }
      if (menu_akses.edit_level != 'Y') {
        var appBanners = document.getElementsByClassName("btnEdit");

        for (var i = 0; i < appBanners.length; i ++) {
            appBanners[i].style.display = 'none';
        }
      }
      if (menu_akses.delete_level != 'Y') {
        var appBanners = document.getElementsByClassName("btnDelete");

        for (var i = 0; i < appBanners.length; i ++) {
            appBanners[i].style.display = 'none';
        }
        // document.getElementsByClassName('btnDelete').hidden = true;
      }
</script>