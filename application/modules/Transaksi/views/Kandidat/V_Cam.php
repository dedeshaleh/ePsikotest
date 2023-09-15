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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

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
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                  </tr>
                  <?php $no = 1; foreach ($DataSoal as $val) { ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$val->nama_soal?></td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <table class="table table-borderless">
                          <tr>
                            <td>Waktu</td>
                            <td>Gambar</td>
                          </tr>
                          <?php foreach ($control->getFoto($val->id_soal, $IdKandidat) as $valDet) {?>
                            <tr>
                              <td><?=$valDet->CreateDate?></td>
                              <td><img src="<?=base_url()?>/uploads/pesertaCam/<?=$valDet->FileCam?>" alt="" style="height: 200px; width: 200px"></td>
                            </tr>
                          <?php } ?>
                          <tr>
                            <td></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  <?php } ?>
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
<form action="<?=base_url()?>Transaksi/Kandidat/Tambah" method="post" enctype="multipart/form-data">
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
            <label for="">Nama Kandidat</label>
            <input type="text" name="NamaKandidat" id="NamaKandidat" class="form-control">
          </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="TglLahir" id="TglLahir" class="form-control" data-date="" data-date-format="DD/MM/YYYY">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Pendidikan</label>
            <input type="text" name="Pendidikan" id="Pendidikan" class="form-control">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Posisi</label>
            <input type="text" name="Posisi" id="Posisi" class="form-control">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Tanggal Test</label>
            <input type="date" name="TglTest" id="TglTest" class="form-control" data-date="" data-date-format="DD/MM/YYYY">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">No Telp</label>
            <input type="text" name="NoTelp" id="NoTelp" class="form-control" >
            <label for="">Isikan Nomor dengan +62 didepannya (+62812345678)</label>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="Email" id="Email" class="form-control" >
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

<!-- Modal Edit-->

<!-- Modal -->
<form action="<?=base_url()?>Master/Karyawan/Edit" method="post" enctype="multipart/form-data">
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
            <label for="">NIK</label>
            <input type="text" name="nik" id="nik_edit" class="form-control" readonly>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="name" id="name_edit" class="form-control">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Bisnis Unit</label>
            <input type="text" name="bisnis_unit" id="bisnis_unit_edit" class="form-control" readonly value="Paramount Enterprise International">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan_edit" class="form-control">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Tanggal Bergabung</label>
            <input type="date" name="tgl_bergabung" id="tgl_bergabung_edit" class="form-control">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Status Karyawan</label>
            <select name="aktif" id="aktif_edit" class="form-control">
              <option value="">-Pilih-</option>
              <option value="Y">Aktif</option>
              <option value="N">Tidak Aktif</option>
            </select>
          </div>
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
        <button type="submit" class="btn btn-warning">Edit</button>
      </div>
    </div>
  </div>
</div>
</form>


<form action="<?=base_url()?>Master/Karyawan/Delete" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalDel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Apakah anda yakin ingin mendelete Menu ini : <span id="nik_name_del"></span></label>
        <input type="hidden" name="nik" id="nik_del">
       
        
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
  
getData();
function getData() {
	$(document).ready(function() {
		
		// date_awal = document.getElementById("date_awal").value;
		// date_akhir = document.getElementById("date_akhir").value;
		// karyawan = document.getElementById("karyawan").value;
        $("#DataKandidat").DataTable({
        "ajax" : {
          'url'	: "<?=base_url()?>Transaksi/Kandidat/data_detail/",
          'type'	: 'POST',
          'dataType' : 'JSON',
          'data'	: {  }
        },
            "processing": true,
            "serverSide": true,
            "destroy": true,
            "responsive": true,
            "paging": true,
            "autoWidth": false,
            "lengthChange": true,
            "lengthMenu": [10, 25, 50, 100, 250, 500, 1000],
            "columns": [
				{
				"data" : "IdKandidat",
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{ "data" : 'NoPeserta' },
				{ "data" : 'NamaKandidat' },
				{ "data" : 'TglLahir' },
				{ "data" : 'NoTelp' },
				{ "data" : 'Pendidikan' },
				{ "data" : 'Posisi' },
				{ "data" : 'TglTest' },
				{ "data" : 'IdKandidat', 
				render: function (data, type, row, meta) {
          var detail = "<a href='<?=base_url()?>Transaksi/DetailKandidat/Data/"+row.IdKandidat+"' target='_blank' class='btn btn-sm btn-success'>View Kandidat</a>"
          var Cam = " || <a href='<?=base_url()?>Transaksi/Kandidat/DataCam/"+row.IdKandidat+"' class='btn btn-sm btn-success'>Cam</a>"
					return detail + Cam;
				}
				}
			],
            "columnDefs": [{
                orderable: false,
                targets: [8]
            }],
            "order": [],
    	});
	});
}

  function GetEdit(nik) {
    $.ajax({
      url : "<?=base_url()?>Master/Karyawan/GetData",
      type : "POST",
      dataType : "JSON",
      data : {nik:nik},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("nik_edit").value = data.nik;
        document.getElementById("name_edit").value = data.name;
        document.getElementById("bisnis_unit_edit").value = data.bisnis_unit;
        document.getElementById("jabatan_edit").value = data.jabatan;
        document.getElementById("tgl_bergabung_edit").value = data.tgl_bergabung;
        document.getElementById("aktif_edit").value = data.aktif;

      }
    })
  }
  function GetDelete(nik) {
    $.ajax({
      url : "<?=base_url()?>Master/Karyawan/GetData",
      type : "POST",
      dataType : "JSON",
      data : {nik:nik},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("nik_name_del").innerHTML = data.nik+" - "+data.name;
        document.getElementById("nik_del").value = data.nik;

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

  $("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")

</script>