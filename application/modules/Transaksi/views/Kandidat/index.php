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
  <style>
    .printme {
      display: block;
    }
    @media print {
      .no-printme  {
        display: none;
      }
      .printme  {
        display: block;
      }
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
              <button class="btn btn-sm btn-success" data-target="#tambah" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Kandidat</button>
              <br><br>
              <?=$this->session->flashdata('msg');?>
              <div class="table-responsive">
              <table class="table table-sm table-stripped" id="DataKandidat">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Peserta</th>
                      <th>Nama Kandidat</th>
                      <th>Tanggal Lahir</th>
                      <th>No Telephone</th>
                      <th>Pendidikan</th>
                      <th>Posisi</th>
                      <th>Paket</th>
                      <th>Tanggal Test</th>
                      <th>Action</th>
                    </tr>
                  </thead>
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
            <label for="">NIK</label>
            <input type="number" name="NIK" id="nik" class="form-control" data-date="" data-date-format="DD/MM/YYYY">
          </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select name="Kelamin" id="Kelamin" class="form-control">
                <option value="">-Pilih-</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-Laki</option>
              </select>
            </div>
          </div>
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
            <select name="Pendidikan" id="Pendidikan" class="form-control">
              <option value="">-Pilih-</option>
              <option value="SMA/SMK">SMA/SMK</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
            </select>
          </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Jabatan</label>
            <select name="id_jabatan" id="id_jabatan" class="form-control">
              <option value="">-Pilih-</option>
              <?php foreach ($jabatan as $vv) { ?>
                <option value="<?=$vv->id_jabatan?>"><?=$vv->NamaJabatan?></option>
              <?php } ?>
            </select>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Grade</label>
            <select name="id_level" id="id_level" class="form-control">
              <option value="">-Pilih-</option>
              <?php foreach ($level as $vv) { ?>
                <option value="<?=$vv->id_level?>"><?=$vv->namaLevel?></option>
              <?php } ?>
            </select>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Divisi</label>
              <select name="idDivisi" id="idDivisi" class="form-control">
                <option value="">-Pilih-</option>
                <?php foreach ($divisi as $vv) { ?>
                  <option value="<?=$vv->idDivisi?>"><?=$vv->NamaDivisi?></option>
                <?php } ?>
              </select>
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
            <input type="text" name="NoTelp" id="NoTelp" class="form-control" value="62">
            <label for="">Isikan Nomor dengan 62 didepannya (62812345678)</label>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="Email" id="Email" class="form-control" >
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Data Paket</label>
            <select name="IdPaket" id="IdPaket" class="form-control" required>
              <option value="">-Pilih-</option>
              <?php foreach ($Paket as $v) { ?>
                <option value="<?=$v->IdPaket?>"><?=$v->NamaPaket?></option>
              <?php } ?>
            </select>
          </div>
          </div>
          <div class="col-6">
          <!-- <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="Email" id="Email" class="form-control" >
          </div> -->
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

<form action="<?=base_url()?>Transaksi/Kandidat/Edit" method="post" enctype="multipart/form-data">
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
          <div class="form-group">
            <label for="">Nama Kandidat</label>
            <input type="text" name="NamaKandidat" id="NamaKandidat_edit" class="form-control">
            <input type="hidden" name="IdKandidat" id="IdKandidat_edit" class="form-control">
          </div>
          <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">NIK</label>
            <input type="number" name="NIK" id="nik_edit" class="form-control" >
          </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <select name="Kelamin" id="Kelamin_edit" class="form-control">
                <option value="">-Pilih-</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-Laki</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="TglLahir" id="TglLahir_edit" class="form-control" data-date="" data-date-format="DD/MM/YYYY">
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Pendidikan</label>
            <select name="Pendidikan" id="Pendidikan_edit" class="form-control">
              <option value="">-Pilih-</option>
              <option value="SMA/SMK">SMA/SMK</option>
              <option value="D3">D3</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
            </select>
          </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Jabatan</label>
            <select name="id_jabatan" id="id_jabatan_edit" class="form-control">
              <option value="">-Pilih-</option>
              <?php foreach ($jabatan as $vv) { ?>
                <option value="<?=$vv->id_jabatan?>"><?=$vv->NamaJabatan?></option>
              <?php } ?>
            </select>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Grade</label>
            <select name="id_level" id="id_level_edit" class="form-control">
              <option value="">-Pilih-</option>
              <?php foreach ($level as $vv) { ?>
                <option value="<?=$vv->id_level?>"><?=$vv->namaLevel?></option>
              <?php } ?>
            </select>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Divisi</label>
              <select name="idDivisi" id="idDivisi_edit" class="form-control">
                <option value="">-Pilih-</option>
                <?php foreach ($divisi as $vv) { ?>
                  <option value="<?=$vv->idDivisi?>"><?=$vv->NamaDivisi?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Tanggal Test</label>
            <input type="date" name="TglTest" id="TglTest_edit" class="form-control" data-date="" data-date-format="DD/MM/YYYY">
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">No Telp</label>
            <input type="text" name="NoTelp" id="NoTelp_edit" class="form-control" value="62">
            <label for="">Isikan Nomor dengan 62 didepannya (62812345678)</label>
          </div>
          </div>
          <div class="col-6">
          <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="Email" id="Email_edit" class="form-control" >
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <div class="form-group">
            <label for="">Data Paket</label>
            <select name="IdPaket" id="IdPaket_edit" class="form-control" required>
              <option value="">-Pilih-</option>
              <?php foreach ($Paket as $v) { ?>
                <option value="<?=$v->IdPaket?>"><?=$v->NamaPaket?></option>
              <?php } ?>
            </select>
          </div>
          </div>
          <div class="col-6">
          <!-- <div class="form-group">
            <label for="">Email</label>
            <input type="Email" name="Email" id="Email" class="form-control" >
          </div> -->
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


<form action="<?=base_url()?>Transaksi/Kandidat/Delete" method="post" enctype="multipart/form-data">
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
        <label for="">Apakah anda yakin ingin mendelete Kandidat Berikut ini : <span id="NamaKandidat_del"></span></label>
        <input type="hidden" name="nik" id="nik_del">
        <input type="hidden" name="IdKandidat" id="IdKandidat_del">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="modal fade" id="ModalPrint" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  <span id="btnPrint"></span><span id="btnEdit"></span>
      <form id="FormSimpan">
      <div class="card printme" >
        
        <div class="card-body">
          <center> <b><u>LAPORAN HASIL PEMERIKSAAN PSIKOLOGIS</u></b>  </center>
            <br>
              <table class="table table-borderless table-sm">
                <tr>
                  <td colspan="3" style="background-color: #dbd9d9; font-weight: bold;">IDENTITAS</td>
                </tr>
              </table>
              
              <table class="table table-borderless table-sm">
                <tr>
                  <td style="width: 20%;">NIK</td>
                  <td style="width: 10px;">:</td>
                  <td id="NIK_Print"></td>
                  <td style="width: 10px;"></td>
                  <td style="width: 20%;">Grade</td>
                  <td style="width: 10px;">:</td>
                  <td id="Grade_Print"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Nama</td>
                  <td style="width: 10px;">:</td>
                  <td id="NamaKandidat_Print" style="width:30%"></td>
                  <td style="width: 10px;"></td>
                  <td style="width: 20%;">Divisi</td>
                  <td style="width: 10px;">:</td>
                  <td id="Divisi_Print"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Jenis Kelamin</td>
                  <td style="width: 10px;">:</td>
                  <td id="JenisKelamin_Print"></td>
                  <td style="width: 10px;"></td>
                  <td style="width: 20%;">Jabatan</td>
                  <td style="width: 10px;">:</td>
                  <td id="NamaJabatan_Print"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Usia</td>
                  <td style="width: 10px;">:</td>
                  <td id="Umur_Print"></td>
                  <td style="width: 10px;"></td>
                  <td style="width: 20%;">Email</td>
                  <td style="width: 10px;">:</td>
                  <td id="Email_Print"></td>
                 
                </tr>
                <tr>
                  <td style="width: 20%;">Tanggal Lahir</td>
                  <td style="width: 10px;">:</td>
                  <td id="TglLahir_Print"></td>
                  
                </tr>
                <tr>
                  <td style="width: 20%;">Pendidikan</td>
                  <td style="width: 10px;">:</td>
                  <td id="Pendidikan_Print"></td>
                </tr>

              </table>
              <table class="table table-borderless">
                <tr>
                  <td>
                    Telah menjalani proses pemeriksaan psikologis pada hari <span id="TglTest_Print"></span>, yang terdiri dari pengukuran dengan menggunakan alat ukur psikologis dan observasi.
                  </td>
                </tr>
              </table>
            

          <div class="form-group">
            <center> <b><u>HASIL PROSES PEMERIKSAAN PSIKOLOGIS</u></b>  </center>
            <br>
              <table class="table table-borderless table-sm">
                <tr>
                  <td colspan="3" style="background-color: #dbd9d9; font-weight: bold;">TUJUAN PEMERIKSAAN</td>
                </tr>
              </table>
              <table class="table table-borderless table-sm">
                <tr>
                  <td>Tujuan dari proses pemeriksaan psikologis adalah untuk mengetahui faktor-faktor yang menunjang dan yang menghambat kinerja optimal yang dimiliki oleh yang bersangkutan sehingga mampu mendukung proses kerja di posisinya</td>
                </tr>
              </table>
            <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead style="background-color: #aba9a6; font-weight: bold;">
                  <tr>
                    <td rowspan="2" style="text-align: center; vertical-align: middle; width:50%">Aspek</td>
                    <td colspan="5" style="text-align: center;">Penilaian</td>
                  </tr>
                  <tr>
                    <td style="text-align: center;">Rendah</td>
                    <td style="text-align: center;">Kurang</td>
                    <td style="text-align: center;">Cukup</td>
                    <td style="text-align: center;">Baik</td>
                    <td style="text-align: center;">Tinggi</td>
                  </tr>
                  
                </thead>
                <tbody>
                  <tr>
                    <td style="font-weight: bold;" colspan="6">KECERDASAN</td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Umum</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanUmumRendah">
                        <input disabled onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumRendah')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumRendah" type="checkbox" id="KecerdasanUmumRendah" value='1'>
                        <label for="KecerdasanUmumRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanUmumKurang">
                        <input disabled onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumKurang')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumKurang" type="checkbox" id="KecerdasanUmumKurang" value='1'>
                        <label for="KecerdasanUmumKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanUmumCukup">
                        <input disabled onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumCukup')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumCukup" type="checkbox" id="KecerdasanUmumCukup" value='1'>
                        <label for="KecerdasanUmumCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanUmumBaik">
                        <input disabled onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumBaik')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumBaik" type="checkbox" id="KecerdasanUmumBaik" value='1'>
                        <label for="KecerdasanUmumBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanUmumTinggi">
                        <input disabled onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumTinggi')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumTinggi" type="checkbox" id="KecerdasanUmumTinggi" value='1'>
                        <label for="KecerdasanUmumTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Verbal</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanVerbalRendah">
                        <input disabled onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalRendah')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalRendah" type="checkbox" id="KecerdasanVerbalRendah" value='1'>
                        <label for="KecerdasanVerbalRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanVerbalKurang">
                        <input disabled onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalKurang')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalKurang" type="checkbox" id="KecerdasanVerbalKurang" value='1'>
                        <label for="KecerdasanVerbalKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanVerbalCukup">
                        <input disabled onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalCukup')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalCukup" type="checkbox" id="KecerdasanVerbalCukup" value='1'>
                        <label for="KecerdasanVerbalCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanVerbalBaik">
                        <input disabled onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalBaik')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalBaik" type="checkbox" id="KecerdasanVerbalBaik" value='1'>
                        <label for="KecerdasanVerbalBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanVerbalTinggi">
                        <input disabled onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalTinggi')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalTinggi" type="checkbox" id="KecerdasanVerbalTinggi" value='1'>
                        <label for="KecerdasanVerbalTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Berhitung</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanBerhitungRendah">
                        <input disabled onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungRendah')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungRendah" type="checkbox" id="KecerdasanBerhitungRendah" value='1'>
                        <label for="KecerdasanBerhitungRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanBerhitungKurang">
                        <input disabled onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungKurang')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungKurang" type="checkbox" id="KecerdasanBerhitungKurang" value='1'>
                        <label for="KecerdasanBerhitungKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanBerhitungCukup">
                        <input disabled onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungCukup')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungCukup" type="checkbox" id="KecerdasanBerhitungCukup" value='1'>
                        <label for="KecerdasanBerhitungCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanBerhitungBaik">
                        <input disabled onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungBaik')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungBaik" type="checkbox" id="KecerdasanBerhitungBaik" value='1'>
                        <label for="KecerdasanBerhitungBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanBerhitungTinggi">
                        <input disabled onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungTinggi')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungTinggi" type="checkbox" id="KecerdasanBerhitungTinggi" value='1'>
                        <label for="KecerdasanBerhitungTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Figural</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanFiguralRendah">
                        <input disabled onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralRendah')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralRendah" type="checkbox" id="KecerdasanFiguralRendah" value='1'>
                        <label for="KecerdasanFiguralRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanFiguralKurang">
                        <input disabled onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralKurang')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralKurang" type="checkbox" id="KecerdasanFiguralKurang" value='1'>
                        <label for="KecerdasanFiguralKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanFiguralCukup">
                        <input disabled onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralCukup')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralCukup" type="checkbox" id="KecerdasanFiguralCukup" value='1'>
                        <label for="KecerdasanFiguralCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanFiguralBaik">
                        <input disabled onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralBaik')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralBaik" type="checkbox" id="KecerdasanFiguralBaik" value='1'>
                        <label for="KecerdasanFiguralBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KecerdasanFiguralTinggi">
                        <input disabled onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralTinggi')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralTinggi" type="checkbox" id="KecerdasanFiguralTinggi" value='1'>
                        <label for="KecerdasanFiguralTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Daya Ingat</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox DayaIngatRendah">
                        <input disabled onclick="getCheckbox('DayaIngat', 'DayaIngatRendah')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatRendah" type="checkbox" id="DayaIngatRendah" value='1'>
                        <label for="DayaIngatRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox DayaIngatKurang">
                        <input disabled onclick="getCheckbox('DayaIngat', 'DayaIngatKurang')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatKurang" type="checkbox" id="DayaIngatKurang" value='1'>
                        <label for="DayaIngatKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox DayaIngatCukup">
                        <input disabled onclick="getCheckbox('DayaIngat', 'DayaIngatCukup')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatCukup" type="checkbox" id="DayaIngatCukup" value='1'>
                        <label for="DayaIngatCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox DayaIngatBaik">
                        <input disabled onclick="getCheckbox('DayaIngat', 'DayaIngatBaik')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatBaik" type="checkbox" id="DayaIngatBaik" value='1'>
                        <label for="DayaIngatBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox DayaIngatTinggi">
                        <input disabled onclick="getCheckbox('DayaIngat', 'DayaIngatTinggi')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatTinggi" type="checkbox" id="DayaIngatTinggi" value='1'>
                        <label for="DayaIngatTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Terhadap Komprehensif</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKomprehensifRendah">
                        <input disabled onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifRendah')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifRendah" type="checkbox" id="KemampuanKomprehensifRendah" value='1'>
                        <label for="KemampuanKomprehensifRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKomprehensifKurang">
                        <input disabled onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifKurang')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifKurang" type="checkbox" id="KemampuanKomprehensifKurang" value='1'>
                        <label for="KemampuanKomprehensifKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKomprehensifCukup">
                        <input disabled onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifCukup')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifCukup" type="checkbox" id="KemampuanKomprehensifCukup" value='1'>
                        <label for="KemampuanKomprehensifCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKomprehensifBaik">
                        <input disabled onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifBaik')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifBaik" type="checkbox" id="KemampuanKomprehensifBaik" value='1'>
                        <label for="KemampuanKomprehensifBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKomprehensifTinggi">
                        <input disabled onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifTinggi')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifTinggi" type="checkbox" id="KemampuanKomprehensifTinggi" value='1'>
                        <label for="KemampuanKomprehensifTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Analisis</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanAnalisisRendah">
                        <input disabled onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisRendah')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisRendah" type="checkbox" id="KemampuanAnalisisRendah" value='1'>
                        <label for="KemampuanAnalisisRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanAnalisisKurang">
                        <input disabled onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisKurang')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisKurang" type="checkbox" id="KemampuanAnalisisKurang" value='1'>
                        <label for="KemampuanAnalisisKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanAnalisisCukup">
                        <input disabled onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisCukup')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisCukup" type="checkbox" id="KemampuanAnalisisCukup" value='1'>
                        <label for="KemampuanAnalisisCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanAnalisisBaik">
                        <input disabled onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisBaik')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisBaik" type="checkbox" id="KemampuanAnalisisBaik" value='1'>
                        <label for="KemampuanAnalisisBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanAnalisisTinggi">
                        <input disabled onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisTinggi')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisTinggi" type="checkbox" id="KemampuanAnalisisTinggi" value='1'>
                        <label for="KemampuanAnalisisTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Mengambil Keputusan</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKeputusanRendah">
                        <input disabled onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanRendah')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanRendah" type="checkbox" id="KemampuanKeputusanRendah" value='1'>
                        <label for="KemampuanKeputusanRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKeputusanKurang">
                        <input disabled onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanKurang')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanKurang" type="checkbox" id="KemampuanKeputusanKurang" value='1'>
                        <label for="KemampuanKeputusanKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKeputusanCukup">
                        <input disabled onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanCukup')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanCukup" type="checkbox" id="KemampuanKeputusanCukup" value='1'>
                        <label for="KemampuanKeputusanCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKeputusanBaik">
                        <input disabled onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanBaik')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanBaik" type="checkbox" id="KemampuanKeputusanBaik" value='1'>
                        <label for="KemampuanKeputusanBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanKeputusanTinggi">
                        <input disabled onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanTinggi')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanTinggi" type="checkbox" id="KemampuanKeputusanTinggi" value='1'>
                        <label for="KemampuanKeputusanTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Berbahasa</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanBerbahasaRendah">
                        <input disabled onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaRendah')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaRendah" type="checkbox" id="KemampuanBerbahasaRendah" value='1'>
                        <label for="KemampuanBerbahasaRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanBerbahasaKurang">
                        <input disabled onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaKurang')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaKurang" type="checkbox" id="KemampuanBerbahasaKurang" value='1'>
                        <label for="KemampuanBerbahasaKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanBerbahasaCukup">
                        <input disabled onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaCukup')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaCukup" type="checkbox" id="KemampuanBerbahasaCukup" value='1'>
                        <label for="KemampuanBerbahasaCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanBerbahasaBaik">
                        <input disabled onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaBaik')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaBaik" type="checkbox" id="KemampuanBerbahasaBaik" value='1'>
                        <label for="KemampuanBerbahasaBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanBerbahasaTinggi">
                        <input disabled onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaTinggi')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaTinggi" type="checkbox" id="KemampuanBerbahasaTinggi" value='1'>
                        <label for="KemampuanBerbahasaTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6" style="font-weight: bold;">DINAMIKA KEPRIBADIAN</td>
                  </tr>
                  <tr>
                    <td>Kepercayaan Diri</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepercayaanDiriRendah">
                        <input disabled onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriRendah')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriRendah" type="checkbox" id="KepercayaanDiriRendah" value='1'>
                        <label for="KepercayaanDiriRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepercayaanDiriKurang">
                        <input disabled onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriKurang')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriKurang" type="checkbox" id="KepercayaanDiriKurang" value='1'>
                        <label for="KepercayaanDiriKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepercayaanDiriCukup">
                        <input disabled onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriCukup')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriCukup" type="checkbox" id="KepercayaanDiriCukup" value='1'>
                        <label for="KepercayaanDiriCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepercayaanDiriBaik">
                        <input disabled onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriBaik')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriBaik" type="checkbox" id="KepercayaanDiriBaik" value='1'>
                        <label for="KepercayaanDiriBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepercayaanDiriTinggi">
                        <input disabled onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriTinggi')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriTinggi" type="checkbox" id="KepercayaanDiriTinggi" value='1'>
                        <label for="KepercayaanDiriTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Sosialisasi</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanSosialisasiRendah">
                        <input disabled onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiRendah')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiRendah" type="checkbox" id="KemampuanSosialisasiRendah" value='1'>
                        <label for="KemampuanSosialisasiRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanSosialisasiKurang">
                        <input disabled onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiKurang')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiKurang" type="checkbox" id="KemampuanSosialisasiKurang" value='1'>
                        <label for="KemampuanSosialisasiKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanSosialisasiCukup">
                        <input disabled onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiCukup')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiCukup" type="checkbox" id="KemampuanSosialisasiCukup" value='1'>
                        <label for="KemampuanSosialisasiCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanSosialisasiBaik">
                        <input disabled onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiBaik')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiBaik" type="checkbox" id="KemampuanSosialisasiBaik" value='1'>
                        <label for="KemampuanSosialisasiBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemampuanSosialisasiTinggi">
                        <input disabled onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiTinggi')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiTinggi" type="checkbox" id="KemampuanSosialisasiTinggi" value='1'>
                        <label for="KemampuanSosialisasiTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kematangan Emosi</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KematanganEmosiRendah">
                        <input disabled onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiRendah')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiRendah" type="checkbox" id="KematanganEmosiRendah" value='1'>
                        <label for="KematanganEmosiRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KematanganEmosiKurang">
                        <input disabled onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiKurang')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiKurang" type="checkbox" id="KematanganEmosiKurang" value='1'>
                        <label for="KematanganEmosiKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KematanganEmosiCukup">
                        <input disabled onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiCukup')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiCukup" type="checkbox" id="KematanganEmosiCukup" value='1'>
                        <label for="KematanganEmosiCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KematanganEmosiBaik">
                        <input disabled onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiBaik')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiBaik" type="checkbox" id="KematanganEmosiBaik" value='1'>
                        <label for="KematanganEmosiBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KematanganEmosiTinggi">
                        <input disabled onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiTinggi')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiTinggi" type="checkbox" id="KematanganEmosiTinggi" value='1'>
                        <label for="KematanganEmosiTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Motivasi Kerja</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox MotivasiKerjaRendah">
                        <input disabled onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaRendah')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaRendah" type="checkbox" id="MotivasiKerjaRendah" value='1'>
                        <label for="MotivasiKerjaRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox MotivasiKerjaKurang">
                        <input disabled onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaKurang')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaKurang" type="checkbox" id="MotivasiKerjaKurang" value='1'>
                        <label for="MotivasiKerjaKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox MotivasiKerjaCukup">
                        <input disabled onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaCukup')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaCukup" type="checkbox" id="MotivasiKerjaCukup" value='1'>
                        <label for="MotivasiKerjaCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox MotivasiKerjaBaik">
                        <input disabled onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaBaik')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaBaik" type="checkbox" id="MotivasiKerjaBaik" value='1'>
                        <label for="MotivasiKerjaBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox MotivasiKerjaTinggi">
                        <input disabled onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaTinggi')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaTinggi" type="checkbox" id="MotivasiKerjaTinggi" value='1'>
                        <label for="MotivasiKerjaTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemandirian</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemandirianRendah">
                        <input disabled onclick="getCheckbox('Kemandirian', 'KemandirianRendah')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianRendah" type="checkbox" id="KemandirianRendah" value='1'>
                        <label for="KemandirianRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemandirianKurang">
                        <input disabled onclick="getCheckbox('Kemandirian', 'KemandirianKurang')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianKurang" type="checkbox" id="KemandirianKurang" value='1'>
                        <label for="KemandirianKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemandirianCukup">
                        <input disabled onclick="getCheckbox('Kemandirian', 'KemandirianCukup')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianCukup" type="checkbox" id="KemandirianCukup" value='1'>
                        <label for="KemandirianCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemandirianBaik">
                        <input disabled onclick="getCheckbox('Kemandirian', 'KemandirianBaik')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianBaik" type="checkbox" id="KemandirianBaik" value='1'>
                        <label for="KemandirianBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KemandirianTinggi">
                        <input disabled onclick="getCheckbox('Kemandirian', 'KemandirianTinggi')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianTinggi" type="checkbox" id="KemandirianTinggi" value='1'>
                        <label for="KemandirianTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Inisiatif</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox InisiatifRendah">
                        <input disabled onclick="getCheckbox('Inisiatif', 'InisiatifRendah')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifRendah" type="checkbox" id="InisiatifRendah" value='1'>
                        <label for="InisiatifRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox InisiatifKurang">
                        <input disabled onclick="getCheckbox('Inisiatif', 'InisiatifKurang')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifKurang" type="checkbox" id="InisiatifKurang" value='1'>
                        <label for="InisiatifKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox InisiatifCukup">
                        <input disabled onclick="getCheckbox('Inisiatif', 'InisiatifCukup')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifCukup" type="checkbox" id="InisiatifCukup" value='1'>
                        <label for="InisiatifCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox InisiatifBaik">
                        <input disabled onclick="getCheckbox('Inisiatif', 'InisiatifBaik')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifBaik" type="checkbox" id="InisiatifBaik" value='1'>
                        <label for="InisiatifBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox InisiatifTinggi">
                        <input disabled onclick="getCheckbox('Inisiatif', 'InisiatifTinggi')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifTinggi" type="checkbox" id="InisiatifTinggi" value='1'>
                        <label for="InisiatifTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kepatuhan Terhadap Aturan</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepatuhanAturanRendah">
                        <input disabled onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanRendah')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanRendah" type="checkbox" id="KepatuhanAturanRendah" value='1'>
                        <label for="KepatuhanAturanRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepatuhanAturanKurang">
                        <input disabled onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanKurang')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanKurang" type="checkbox" id="KepatuhanAturanKurang" value='1'>
                        <label for="KepatuhanAturanKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepatuhanAturanCukup">
                        <input disabled onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanCukup')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanCukup" type="checkbox" id="KepatuhanAturanCukup" value='1'>
                        <label for="KepatuhanAturanCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepatuhanAturanBaik">
                        <input disabled onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanBaik')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanBaik" type="checkbox" id="KepatuhanAturanBaik" value='1'>
                        <label for="KepatuhanAturanBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox KepatuhanAturanTinggi">
                        <input disabled onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanTinggi')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanTinggi" type="checkbox" id="KepatuhanAturanTinggi" value='1'>
                        <label for="KepatuhanAturanTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <span id="FormDetail"></span>
        </div>
       
      </div>
      </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<form id="SimpanLulus" onsubmit="SimpanLulus(event)" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalLulus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalLulusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLulusLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Data Kandidat</label>
          <table>
            <tr>
              <td>NIK</td>
              <td>:</td>
              <td id="NIKLulus"></td>
            </tr>
            <tr>
              <td>Nama Kandidat</td>
              <td>:</td>
              <td id="NamaKandidatLulus"></td>
              <input type="hidden" name="IdKandidat" id="IdKandidatLulus">
            </tr>
          </table>
        </div>
        <div class="form-group">
          <label for="">Status Kelulusan</label>
          <select name="StatusLulus" id="StatusLulus" class="form-control">
            <option value="">-Pilih-</option>
            <option value="1">Dapat Disarankan</option>
            <option value="2">Tidak Disarankan</option>
            <option value="3">Dipertimbangan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Keterangan Kelulusan</label>
          <textarea name="KetLulus" id="KetLulus" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>
</form>

<form id="SimpanReturn" onsubmit="SimpanReturn(event)" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalReturn" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalReturnLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalReturnLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Data Kandidat</label>
          <table>
            <tr>
              <td>NIK</td>
              <td>:</td>
              <td id="NIKReturn"></td>
            </tr>
            <tr>
              <td>Nama Kandidat</td>
              <td>:</td>
              <td id="NamaKandidatReturn"></td>
              <input type="hidden" name="IdKandidat" id="IdKandidatReturn">
            </tr>
            <tr>
              <td>Keterangan Kelulusan</td>
              <td>:</td>
              <td id="KeteranganKandidatReturn"></td>
            </tr>
          </table>
        </div>
        <div class="form-group">
          Apakah Anda Yakin Ingin Melakukan Return Kelulusan
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>
</form>
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
				{ "data" : 'NamaDivisi' },
				{ "data" : 'NamaPaket' },
				{ "data" : 'TglTest' },
				{ "data" : 'IdKandidat', 
				render: function (data, type, row, meta) {
          dateNew = new Date(row.TglTest);
          DateFix = dateNew.getDate()+'-'+(dateNew.getMonth()+1)+'-'+dateNew.getFullYear();
          console.log(DateFix);
          
          if (row.StatusLulus != 0) {
            // var detail = ""
            var detail = " || <a href='<?=base_url()?>Transaksi/DetailKandidat/Data/"+row.IdKandidat+"' target='_blank' class='btn btn-xs btn-success'>View Kandidat</a>"
            var Cam = ""
            if (row.StatusLulus == 1) {
              var DetKandidat = " <span class='span text-success'>Dapat Disarankan </span>"
            }else if (row.StatusLulus == 2){
                var DetKandidat = "<span class='span text-danger'>Tidak Disarankan </span>"
            }else if (row.StatusLulus == 3){
                var DetKandidat = "<span class='' style='color: #fc9630;'>Dipertimbangkan </span>"
            }else{
              var DetKandidat = ""
            }
          }else{
            var DetKandidat = ""
            var detail = "<a href='<?=base_url()?>Transaksi/DetailKandidat/Data/"+row.IdKandidat+"' target='_blank' class='btn btn-xs btn-success'>View Kandidat</a>"
            var Cam = " || <a href='<?=base_url()?>Transaksi/Kandidat/DataCam/"+row.IdKandidat+"' class='btn btn-xs btn-success'>Cam</a>"
          }
          if (row.StatusKoreksi == null ) {
            var wa = " || <a href='https://api.whatsapp.com/send?phone="+row.NoTelp+"&text=Hai%2C%20"+row.NamaKandidat+"%0A%20%0ATerima%20kasih%20sudah%20meluangkan%20waktu%20untuk%20melamar%20melalui%20Career%20at%20Bethsaida%20Hospital.%20Melalui%20pesan%20ini%20kami%20informasikan%20bahwa%20Anda%20LOLOS%20dalam%20tahap%20seleksi%20Administratif.%20Kami%20mengundang%20Anda%20untuk%20mengikuti%20tahapan%20berikutnya%20yaitu%20Online%20Test.%0A%0ASilakan%20mempersiapkan%20diri%20Anda%20dengan%20memperhatikan%20hal-hal%20berikut%20ini%20%3A%0A1.%20Dalam%20mengikuti%20online%20test%20ini%20pastikan%20Anda%20menggunakan%20perangkat%20komputer%20atau%20laptop%20yang%20memiliki%20kamera%20aktif.%20Tidak%20diperkenankan%20untuk%20menggunakan%20smartphone%20%2F%20tablet%20%2F%20komputer%20dan%20laptop%20tanpa%20kamera%20karena%20nanti%20akan%20mengganggu%20kinerja%20Anda.%20%20%0A2.%20Kegiatan%20online%20test%20ini%20akan%20terekam%20melalui%20kamera%2C%20sehingga%20pastikan%20kamera%20komputer%2Flaptop%20Anda%20dapat%20berfungsi%20dengan%20baik.%20Sistem%20tidak%20akan%20berjalan%20jika%20perangkat%20yang%20digunakan%20tidak%20terhubung%20dengan%20kamera.%0A3.%20Pastikan%20Anda%20berada%20di%20tempat%20yang%20tenang%20dan%20aman%20serta%20memiliki%20koneksi%20internet%20yang%20baik%20agar%20dapat%20mengerjakan%20online%20test%20dengan%20lancar.%0A4.%20Kegiatan%20online%20test%20akan%20berlangsung%20selama%20kurang%20lebih%202%2C5%20jam.%20Silakan%20Anda%20mempersiapkan%20waktu%20yang%20cukup%20untuk%20dapat%20menyelesaikan%20seluruh%20rangkaian%20tes.%0A5.%20Pastikan%20diri%20dalam%20kondisi%20sehat%20dengan%20istirahat%20dan%20makan%20yang%20cukup%20sehingga%20Anda%20dapat%20menjawab%20pertanyaan%20dengan%20fokus%20dan%20teliti.%0A6.%20Periode%20pengerjaan%20online%20test%20ini%20dimulai%20dari%20tanggal%20*"+DateFix+"*%20pkl%2008.00%20WIB%20sampai%20dengan%20tanggal%20*"+DateFix+"*%20pkl%2023.59%20WIB.%20Melewati%20periode%20ini%20Anda%20tidak%20dapat%20mengakses%20sistem%20kami%20kembali.%0A%0ABerikut%20ini%20adalah%20akses%20yang%20dapat%20Anda%20gunakan%20untuk%20mengerjakan%20online%20test%20kami%20%3A%0ALink%20Test%20%3A%20https%3A%2F%2Fextranet.bethsaidahospitals.com%2FePsikotest%2FWebTest%0A%0ASilakan%20melengkapi%20data%20diri%20yang%20kosong%20pada%20halaman%20tes%20sesuai%20dengan%20informasi%20di%20bawah%20ini%20%3A%0ANo.%20Peserta%20%3A%"+row.NoPeserta+"%0ANo.%20Telephone%20%3A%20"+row.NoTelp+"%0A%0AJika%20ada%20pertanyaan%20maupun%20kendala%20dalam%20mengakses%20sistem%20kami%2C%20boleh%20silakan%20menghubungi%20Thania%20(HC%20-%20Recruitment)%20di%20Telp%3A%20(021)%2029309999%20ext.%20930%20atau%20WhatsApp%20ke%20nomor%20%206281294630084.%0A%20%0A%20%0ATerima%20kasih%20dan%20selamat%20mengerjakan.%0A%20%0ASalam%2C%0AHuman%20Capital%0APT%20Bethsaida%20Hospital%C2%A0International' target='_Blank' class='btn btn-xs btn-success'><i class='fab fa-whatsapp'></i></a>";
            var btnTerima = ""
          }else{
            var wa = ""
            if (row.StatusLulus == 0) {
              var btnTerima = " || <button type='button' onclick='GetLulus(`"+row.IdKandidat+"`)' class='btn btn-xs btn-info'><i class='fas fa-check-double'></i></i></button>"
            }else{
              var btnTerima = " || <button type='button' class='btn btn-xs btn-info' onclick='Return(`"+row.IdKandidat+"`)'>Reset Lulus</button> "
            }
          }
          
          var level = "<?=$this->session->userdata('id_level')?>";
          if (menu_akses.edit_level == 'Y' && row.StatusKoreksi == null) {
            var edit = ' || <button type="button" onclick="GetEdit(`'+row.IdKandidat+'`)" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
          }else{
            var edit = '';
          }
         
          if (menu_akses.delete_level == 'Y' && row.StatusKoreksi == null) {
            var dele = ' || <button type="button" onclick="GetDelete(`'+row.IdKandidat+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
          }else{
            var dele = ''
          }
          if (level == '4' || level == '1' || level == '5' || level == '6') {

            if (row.IdPaket == '' || row.IdPaket == null || row.IdPaket == '16458aa15d2829') {
              var Print = ' || <button type="button" onclick="GetPrint(`'+row.IdKandidat+'`)" class="btn btn-xs btn-primary"><i class="fas fa-print"></i></button>'
            }else{
              if (row.StatusKoreksi == '' || row.StatusKoreksi == null) {
                var Print = ''
                
              } else {
                var Print = ' || <a href="<?=base_url()?>Transaksi/DetailKandidat/PrintPaket/'+row.IdKandidat+'/'+row.IdPaket+'" type="button" class="btn btn-xs btn-primary"><i class="fas fa-print"></i></a>'
              }
            }
          } else {
            var Print = ''
          }

					return DetKandidat + detail + Cam + wa + edit + dele + Print + btnTerima;
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
      url : "<?=base_url()?>Transaksi/Kandidat/GetData",
      type : "POST",
      dataType : "JSON",
      data : {nik:nik},
      success : function (data) {
        $("#modalEdit").modal("show");
        document.getElementById("IdKandidat_edit").value = data.IdKandidat
        document.getElementById("NamaKandidat_edit").value = data.NamaKandidat
        document.getElementById("nik_edit").value = data.NIK
        document.getElementById("Kelamin_edit").value = data.Kelamin
        document.getElementById("TglLahir_edit").value = data.TglLahir
        document.getElementById("TglTest_edit").value = data.TglTest
        document.getElementById("Pendidikan_edit").value = data.Pendidikan
        document.getElementById("id_jabatan_edit").value = data.id_jabatan
        document.getElementById("idDivisi_edit").value = data.idDivisi
        document.getElementById("id_level_edit").value = data.id_level
        document.getElementById("NoTelp_edit").value = data.NoTelp
        document.getElementById("Email_edit").value = data.Email
        document.getElementById("IdPaket_edit").value = data.IdPaket

      }
    })
  }
  function GetDelete(nik) {
    $.ajax({
      url : "<?=base_url()?>Transaksi/Kandidat/GetData",
      type : "POST",
      dataType : "JSON",
      data : {nik:nik},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("NamaKandidat_del").innerHTML = data.NIK+" - "+data.NamaKandidat;
        document.getElementById("IdKandidat_del").value = data.IdKandidat;
        document.getElementById("nik_del").value = data.nik;

      }
    })
  }

  function GetPrint(id) {
    document.getElementById("FormSimpan").reset();
    $.ajax({
      url : "<?=base_url()?>Transaksi/Kandidat/GetPrint",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#ModalPrint").modal("show");
        var today = new Date();
        var birthday = new Date(data.kandidat[0].TglLahir);
        var year = 0;
        if (today.getMonth() < birthday.getMonth()) {
            year = 1;
        } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
            year = 1;
        }
        var age = today.getFullYear() - birthday.getFullYear() - year;
 
        if(age < 0){
            age = 0;
        }

        document.getElementById("NamaKandidat_Print").innerHTML = data.kandidat[0].NamaKandidat
        document.getElementById("NIK_Print").innerHTML = data.kandidat[0].NIK
        document.getElementById("TglTest_Print").innerHTML = data.kandidat[0].TglTest
        document.getElementById("TglLahir_Print").innerHTML = data.kandidat[0].TglLahir
        document.getElementById("Pendidikan_Print").innerHTML = data.kandidat[0].Pendidikan
        document.getElementById("NamaJabatan_Print").innerHTML = data.kandidat[0].NamaJabatan
        document.getElementById("Divisi_Print").innerHTML = data.kandidat[0].NamaDivisi
        document.getElementById("Grade_Print").innerHTML = data.kandidat[0].namaLevel
        document.getElementById("Email_Print").innerHTML = data.kandidat[0].Email
        document.getElementById("Umur_Print").innerHTML = age
        if (data.kandidat[0].Kelamin == "P") {
          Kel = "Perempuan";
        }
        if (data.kandidat[0].Kelamin == "L") {
          Kel = "Laki - Laki";
        }
        document.getElementById("JenisKelamin_Print").innerHTML = Kel

        // Data Detail Form
        for (let i = 0; i < data.form.length; i++) {
          if (data.form[i].Aspek == 'KecerdasanUmum') {
            document.getElementsByClassName('KecerdasanUmum').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanUmumRendah').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanUmumRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanUmumKurang').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanUmumKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanUmumCukup').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanUmumCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanUmumBaik').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanUmumBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanUmumTinggi').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanUmumTinggi')[0].style.visibility='hidden';
            }
            
          }
         
          if (data.form[i].Aspek == 'KecerdasanVerbal') {
            document.getElementsByClassName('KecerdasanVerbal').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanVerbalRendah').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanVerbalRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanVerbalKurang').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanVerbalKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanVerbalCukup').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanVerbalCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanVerbalBaik').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanVerbalBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanVerbalTinggi').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanVerbalTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KecerdasanBerhitung') {
            document.getElementsByClassName('KecerdasanBerhitung').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanBerhitungRendah').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanBerhitungRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanBerhitungKurang').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanBerhitungKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanBerhitungCukup').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanBerhitungCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanBerhitungBaik').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanBerhitungBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanBerhitungTinggi').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanBerhitungTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KecerdasanFigural') {
            document.getElementsByClassName('KecerdasanFigural').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanFiguralRendah').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanFiguralRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanFiguralKurang').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanFiguralKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanFiguralCukup').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanFiguralCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanFiguralBaik').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanFiguralBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanFiguralTinggi').checked = true;
            } else {
              document.getElementsByClassName('KecerdasanFiguralTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'DayaIngat') {
            document.getElementsByClassName('DayaIngat').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('DayaIngatRendah').checked = true;
            } else {
              document.getElementsByClassName('DayaIngatRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('DayaIngatKurang').checked = true;
            } else {
              document.getElementsByClassName('DayaIngatKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('DayaIngatCukup').checked = true;
            } else {
              document.getElementsByClassName('DayaIngatCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('DayaIngatBaik').checked = true;
            } else {
              document.getElementsByClassName('DayaIngatBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('DayaIngatTinggi').checked = true;
            } else {
              document.getElementsByClassName('DayaIngatTinggi')[0].style.visibility='hidden';
            }
            
          }

          

          if (data.form[i].Aspek == 'KemampuanAnalisis') {
            document.getElementsByClassName('KemampuanAnalisis').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanAnalisisRendah').checked = true;
            } else {
              document.getElementsByClassName('KemampuanAnalisisRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanAnalisisKurang').checked = true;
            } else {
              document.getElementsByClassName('KemampuanAnalisisKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanAnalisisCukup').checked = true;
            } else {
              document.getElementsByClassName('KemampuanAnalisisCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanAnalisisBaik').checked = true;
            } else {
              document.getElementsByClassName('KemampuanAnalisisBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanAnalisisTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemampuanAnalisisTinggi')[0].style.visibility='hidden';
            }
            
          }

          
          if (data.form[i].Aspek == 'KemampuanBerbahasa') {
            document.getElementsByClassName('KemampuanBerbahasa').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanBerbahasaRendah').checked = true;
            } else {
              document.getElementsByClassName('KemampuanBerbahasaRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanBerbahasaKurang').checked = true;
            } else {
              document.getElementsByClassName('KemampuanBerbahasaKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanBerbahasaCukup').checked = true;
            } else {
              document.getElementsByClassName('KemampuanBerbahasaCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanBerbahasaBaik').checked = true;
            } else {
              document.getElementsByClassName('KemampuanBerbahasaBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanBerbahasaTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemampuanBerbahasaTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KepercayaanDiri') {
            document.getElementsByClassName('KepercayaanDiri').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KepercayaanDiriRendah').checked = true;
            } else {
              document.getElementsByClassName('KepercayaanDiriRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KepercayaanDiriKurang').checked = true;
            } else {
              document.getElementsByClassName('KepercayaanDiriKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KepercayaanDiriCukup').checked = true;
            } else {
              document.getElementsByClassName('KepercayaanDiriCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KepercayaanDiriBaik').checked = true;
            } else {
              document.getElementsByClassName('KepercayaanDiriBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KepercayaanDiriTinggi').checked = true;
            } else {
              document.getElementsByClassName('KepercayaanDiriTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KemampuanSosialisasi') {
            document.getElementsByClassName('KemampuanSosialisasi').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanSosialisasiRendah').checked = true;
            } else {
              document.getElementsByClassName('KemampuanSosialisasiRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanSosialisasiKurang').checked = true;
            } else {
              document.getElementsByClassName('KemampuanSosialisasiKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanSosialisasiCukup').checked = true;
            } else {
              document.getElementsByClassName('KemampuanSosialisasiCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanSosialisasiBaik').checked = true;
            } else {
              document.getElementsByClassName('KemampuanSosialisasiBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanSosialisasiTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemampuanSosialisasiTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KematanganEmosi') {
            document.getElementsByClassName('KematanganEmosi').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KematanganEmosiRendah').checked = true;
            } else {
              document.getElementsByClassName('KematanganEmosiRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KematanganEmosiKurang').checked = true;
            } else {
              document.getElementsByClassName('KematanganEmosiKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KematanganEmosiCukup').checked = true;
            } else {
              document.getElementsByClassName('KematanganEmosiCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KematanganEmosiBaik').checked = true;
            } else {
              document.getElementsByClassName('KematanganEmosiBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KematanganEmosiTinggi').checked = true;
            } else {
              document.getElementsByClassName('KematanganEmosiTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'MotivasiKerja') {
            document.getElementsByClassName('MotivasiKerja').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('MotivasiKerjaRendah').checked = true;
            } else {
              document.getElementsByClassName('MotivasiKerjaRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('MotivasiKerjaKurang').checked = true;
            } else {
              document.getElementsByClassName('MotivasiKerjaKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('MotivasiKerjaCukup').checked = true;
            } else {
              document.getElementsByClassName('MotivasiKerjaCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('MotivasiKerjaBaik').checked = true;
            } else {
              document.getElementsByClassName('MotivasiKerjaBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('MotivasiKerjaTinggi').checked = true;
            } else {
              document.getElementsByClassName('MotivasiKerjaTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'Kemandirian') {
            document.getElementsByClassName('Kemandirian').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemandirianRendah').checked = true;
            } else {
              document.getElementsByClassName('KemandirianRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemandirianKurang').checked = true;
            } else {
              document.getElementsByClassName('KemandirianKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemandirianCukup').checked = true;
            } else {
              document.getElementsByClassName('KemandirianCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemandirianBaik').checked = true;
            } else {
              document.getElementsByClassName('KemandirianBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemandirianTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemandirianTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'Inisiatif') {
            document.getElementsByClassName('Inisiatif').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('InisiatifRendah').checked = true;
            } else {
              document.getElementsByClassName('InisiatifRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('InisiatifKurang').checked = true;
            } else {
              document.getElementsByClassName('InisiatifKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('InisiatifCukup').checked = true;
            } else {
              document.getElementsByClassName('InisiatifCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('InisiatifBaik').checked = true;
            } else {
              document.getElementsByClassName('InisiatifBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('InisiatifTinggi').checked = true;
            } else {
              document.getElementsByClassName('InisiatifTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KemampuanKomprehensif') {
            document.getElementsByClassName('KemampuanKomprehensif').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanKomprehensifRendah').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKomprehensifRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanKomprehensifKurang').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKomprehensifKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanKomprehensifCukup').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKomprehensifCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanKomprehensifBaik').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKomprehensifBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanKomprehensifTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKomprehensifTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KemampuanKeputusan') {
            document.getElementsByClassName('KemampuanKeputusan').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanKeputusanRendah').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKeputusanRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanKeputusanKurang').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKeputusanKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanKeputusanCukup').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKeputusanCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanKeputusanBaik').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKeputusanBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanKeputusanTinggi').checked = true;
            } else {
              document.getElementsByClassName('KemampuanKeputusanTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KepatuhanAturan') {
            document.getElementsByClassName('KepatuhanAturan').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KepatuhanAturanRendah').checked = true;
            } else {
              document.getElementsByClassName('KepatuhanAturanRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KepatuhanAturanKurang').checked = true;
            } else {
              document.getElementsByClassName('KepatuhanAturanKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KepatuhanAturanCukup').checked = true;
            } else {
              document.getElementsByClassName('KepatuhanAturanCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KepatuhanAturanBaik').checked = true;
            } else {
              document.getElementsByClassName('KepatuhanAturanBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KepatuhanAturanTinggi').checked = true;
            } else {
              document.getElementsByClassName('KepatuhanAturanTinggi')[0].style.visibility='hidden';
            }
            
          }


          document.getElementById("FormDetail").innerHTML = data.formHead[0].KetKandidat
        
          document.getElementById("btnPrint").innerHTML = '<a class="btn btn-sm btn-success" href="<?=base_url()?>Transaksi/Kandidat/Print/'+id+'" target="_Blank">Print <i class="fas fa-print"></i> </a>';

        }
        if(data.kandidat[0].StatusKoreksi == 1 && data.kandidat[0].StatusLulus == 0){
          document.getElementById("btnEdit").innerHTML = ' <a class="btn btn-sm btn-warning" href="<?=base_url()?>Transaksi/Kandidat/EditData/'+id+'" target="_Blank">Edit <i class="fas fa-edit"></i> </a>';
        }
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


  function GetLulus(IdKandidat) {
    $("#modalLulus").modal('show')
    const data = {
      IdKandidat : IdKandidat
    }
    const url = "<?=base_url()?>Transaksi/Kandidat/GetLulus";
    fetch( url, {
    method : "POST",
    body : JSON.stringify(data),
    headers : {
      "Content-Type": "application/json; charset=UTF-8"
    }  
    })
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("IdKandidatLulus").value = data.IdKandidat
      document.getElementById("NamaKandidatLulus").innerHTML = data.NamaKandidat
      document.getElementById("NIKLulus").innerHTML = data.NIK
    })
  }

  function SimpanLulus() {
    event.preventDefault();
	
    const url = "<?=base_url()?>Transaksi/Kandidat/GetLulusAdd";
    // console.log(url)
      fetch(url, {
          method: "POST",
          body: new FormData(document.getElementById("SimpanLulus")),
      })
      .then((response) => response.json())
          .then(
              (data) => {
          // console.log(data.ValReturn)
          if (data.ValReturn == true) {
            $('#modalLulus').modal('hide')
            $("#SimpanLulus").trigger("reset");
            getData();
            
          }else{
            console.error("Gagal Update Data")
          }
        } // .json(), etc.
          )
  }
  function Return(IdKandidat) {
    $("#modalReturn").modal('show')
    const data = {
      IdKandidat : IdKandidat
    }
    const url = "<?=base_url()?>Transaksi/Kandidat/GetLulus";
    fetch( url, {
    method : "POST",
    body : JSON.stringify(data),
    headers : {
      "Content-Type": "application/json; charset=UTF-8"
    }  
    })
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("IdKandidatReturn").value = data.IdKandidat
      document.getElementById("NamaKandidatReturn").innerHTML = data.NamaKandidat
      document.getElementById("KeteranganKandidatReturn").innerHTML = data.KetLulus
      document.getElementById("NIKReturn").innerHTML = data.NIK
    })
  }

  function SimpanReturn() {
    event.preventDefault();
	
    const url = "<?=base_url()?>Transaksi/Kandidat/ReturnLulus";
    // console.log(url)
      fetch(url, {
          method: "POST",
          body: new FormData(document.getElementById("SimpanReturn")),
      })
      .then((response) => response.json())
          .then(
              (data) => {
          // console.log(data.ValReturn)
          if (data.ValReturn == true) {
            $('#modalReturn').modal('hide')
            $("#SimpanReturn").trigger("reset");
            getData();
            
          }else{
            console.error("Gagal Update Data")
          }
        } // .json(), etc.
          )
  }

</script>