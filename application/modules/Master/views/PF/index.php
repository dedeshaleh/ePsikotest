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
              <button class="btn btn-sm btn-success" data-target="#tambah" id="btn_tambah" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Skoring</button>
              <br><br>
              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataPF">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Jenis Kelamin</th>
                      <th>Data</th>
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
<form action="<?=base_url()?>Master/Skoring/Edit" method="post" enctype="multipart/form-data">
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
        <input type="hidden" name="IdPFHeader" id="IdPFHeader_edit">
        <div class="form-group">
          <label for="">Nama Skoring</label>
          <input type="text" name="NamaSkoring" id="NamaSkoring_edit" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="">Status Skoring</label>
          <select name="StatusSkoring" id="StatusSkoring_edit" class="form-control">
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

<form action="<?=base_url()?>Master/PF/Tambah" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <select name="JenisKelamin" id="JenisKelamin" class="form-control" style="width: 200px;">
            <option value="">-Pilih-</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
        <button type="button" class="btn btn-sm btn-success" id="add"><i class="fas fa-plus"></i> Tambah Hasil</button>
        <br><br>
        <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <td>Kode Hasil</td>
                      <td>Angka Hasil</td>
                      <td>Aksi</td>
                    </tr>
                  </thead>
                  <tbody id="dynamic_field"></tbody>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
</form>


<form action="<?=base_url()?>Master/PF/Delete" method="post" enctype="multipart/form-data">
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
        <label for="">Apakah anda yakin ingin mendelete Menu ini : <span id="JenisKelamin_del"></span></label>
        <input type="hidden" name="IdPFHeader" id="IdPFHeader_del">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="modal fade" id="modalView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Data For</label>
          <br>
          <span id="JenisKelamin_view"></span>
        </div>
        <div class="table-responsive">
          <table class="table table-sm table-bordered" >
            <thead>
              <tr>
                <td>Kode Hasil</td>
                <td>Skor Hasil</td>
              </tr>
            </thead>
            <tbody id="DataPFSkoring">

            </tbody>
          </table>
        </div>
       
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
        url : "<?=base_url()?>Master/Skoring/getAkses",
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
    
    $('#DataPF').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/PF/Data_Detail",
            'type': "POST",
            
        },
		columns: [
			{
			  data : "IdPFHeader",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'JenisKelamin',
        render : function (data, type, row, meta) {
          if (row.JenisKelamin == "L") {
            return "Laki - Laki";
          } else if (row.JenisKelamin == "P") {
            return "Perempuan";
          }
        } },
			{ data: 'StatusPF', 
        render : function (data, type, row, meta) {
          return "<button type='button' class='btn btn-sm btn-success' onclick=GetData('"+row.IdPFHeader+"')>Cek Hasil</button>"
        } },
			{ 
				data: 'IdPFHeader',
				render : function (data, type, row, meta) {
          if (menu_akses.edit_level == 'Y') {
            var edit = '<button type="button" onclick="GetEdit(`'+row.IdPFHeader+'`)" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
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
            var dele = '<button type="button" onclick="GetDelete(`'+row.IdPFHeader+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
          }else{
            var dele = ''
          }
					return  edit + pembatas + dele;
				}
			}
			]
		})
	});

  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Skoring/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("IdPFHeader_edit").value = data.IdPFHeader;
        document.getElementById("NamaSkoring_edit").value = data.NamaSkoring;
        document.getElementById("StatusSkoring_edit").value = data.StatusSkoring;
      }
    })
  }
  function GetDelete(id) {
    $.ajax({
      url : "<?=base_url()?>Master/PF/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        if (data[0].JenisKelamin == "L") {
          kelamin = 'Laki - Laki';
        } else if (data[0].JenisKelamin == "P") {
          kelamin = 'Perempuan';
        }
        document.getElementById("JenisKelamin_del").innerHTML = kelamin;
        document.getElementById("IdPFHeader_del").value = data[0].IdPFHeader;

      }
    })
  }

  function GetData(id) {
    console.log(id)
    $.ajax({
      url : "<?=base_url()?>Master/PF/GetData",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalView").modal("show");
        if (data[0].JenisKelamin == "L") {
          kelamin = 'Laki - Laki';
        } else if (data[0].JenisKelamin == "P") {
          kelamin = 'Perempuan';
        }
        document.getElementById("JenisKelamin_view").innerHTML = kelamin;

        var html = ``;
        for (let i = 0; i < data.length; i++) {
          html += 
          `
          <tr>
            <td>`+data[i].KodePF+`</td>
            <td>`+data[i].NilaiPF+`</td>
          </tr>
          `;
          
        }
        $("#DataPFSkoring").html(html);

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
  var i=1;  
  $('#add').click(function(){
      i++; 
      html = "";
      html +=
      `
      <tr id="row`+i+`">
        <td>
            <div class="input-group ">
                <input required type="text" id="KodePF`+i+`" name="KodePF[]" class="form-control" style="max-width:150px">
            </div>
        </td>
        <td>
            <div class="input-group ">
                <input required type="number" id="NilaiPF`+i+`" name="NilaiPF[]" class="form-control" style="max-width:150px">
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
</script>