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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?=base_url()?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>

  <!-- Summernote -->
  <script src="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

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
 
     
    <form action="<?=base_url()?>Transaksi/DetailKandidat/SimpanData" method="post">
      <input type="hidden" name="IdKandidat" id="" value="<?=$IdKandidat?>">
      <div class="card" id="FormSimpan">
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
                  <td style="width: 20%;">Nama</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->NamaKandidat?></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Jenis Kelamin</td>
                  <td style="width: 10px;">:</td>
                  <td><?php if($Kandidat->Kelamin == 'P'){echo "Perempuan";} if($Kandidat->Kelamin == 'L'){echo "Laki-Laki";}?></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Usia</td>
                  <td style="width: 10px;">:</td>
                  <td>
                    <?php  
                        $tanggal_lahir = date('Y-m-d', strtotime($Kandidat->TglLahir));
                        $birthDate = new \DateTime($tanggal_lahir);
                        $today = new \DateTime("today");
                        $y = $today->diff($birthDate)->y;
                        echo $y;
                    ?> Tahun
                  </td>
                </tr>
                <tr>
                  <td style="width: 20%;">Tempat, Tanggal Lahir</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->TglLahir?></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Pendidikan</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->Pendidikan?></td>
                </tr>
                <tr>
                  <td style="width: 20%;">NIK</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->NIK?></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Jabatan</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->NamaJabatan?></td>
                </tr>
                

              </table>
              <table class="table table-borderless">
                <tr>
                  <td>
                    Telah menjalani proses pemeriksaan psikologis pada hari <?=$Kandidat->TglTest?>, yang terdiri dari pengukuran dengan menggunakan alat ukur psikologis dan observasi.
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
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumRendah')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumRendah" type="checkbox" id="KecerdasanUmumRendah" value='1'>
                        <label for="KecerdasanUmumRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumKurang')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumKurang" type="checkbox" id="KecerdasanUmumKurang" value='1'>
                        <label for="KecerdasanUmumKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumCukup')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumCukup" type="checkbox" id="KecerdasanUmumCukup" value='1'>
                        <label for="KecerdasanUmumCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumBaik')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumBaik" type="checkbox" id="KecerdasanUmumBaik" value='1'>
                        <label for="KecerdasanUmumBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanUmum', 'KecerdasanUmumTinggi')" class="custom-control-input custom-control-input-success KecerdasanUmum" name="KecerdasanUmumTinggi" type="checkbox" id="KecerdasanUmumTinggi" value='1'>
                        <label for="KecerdasanUmumTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Verbal</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalRendah')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalRendah" type="checkbox" id="KecerdasanVerbalRendah" value='1'>
                        <label for="KecerdasanVerbalRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalKurang')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalKurang" type="checkbox" id="KecerdasanVerbalKurang" value='1'>
                        <label for="KecerdasanVerbalKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalCukup')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalCukup" type="checkbox" id="KecerdasanVerbalCukup" value='1'>
                        <label for="KecerdasanVerbalCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalBaik')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalBaik" type="checkbox" id="KecerdasanVerbalBaik" value='1'>
                        <label for="KecerdasanVerbalBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanVerbal', 'KecerdasanVerbalTinggi')" class="custom-control-input custom-control-input-success KecerdasanVerbal" name="KecerdasanVerbalTinggi" type="checkbox" id="KecerdasanVerbalTinggi" value='1'>
                        <label for="KecerdasanVerbalTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Berhitung</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungRendah')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungRendah" type="checkbox" id="KecerdasanBerhitungRendah" value='1'>
                        <label for="KecerdasanBerhitungRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungKurang')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungKurang" type="checkbox" id="KecerdasanBerhitungKurang" value='1'>
                        <label for="KecerdasanBerhitungKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungCukup')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungCukup" type="checkbox" id="KecerdasanBerhitungCukup" value='1'>
                        <label for="KecerdasanBerhitungCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungBaik')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungBaik" type="checkbox" id="KecerdasanBerhitungBaik" value='1'>
                        <label for="KecerdasanBerhitungBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanBerhitung', 'KecerdasanBerhitungTinggi')" class="custom-control-input custom-control-input-success KecerdasanBerhitung" name="KecerdasanBerhitungTinggi" type="checkbox" id="KecerdasanBerhitungTinggi" value='1'>
                        <label for="KecerdasanBerhitungTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kecerdasan Figural</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralRendah')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralRendah" type="checkbox" id="KecerdasanFiguralRendah" value='1'>
                        <label for="KecerdasanFiguralRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralKurang')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralKurang" type="checkbox" id="KecerdasanFiguralKurang" value='1'>
                        <label for="KecerdasanFiguralKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralCukup')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralCukup" type="checkbox" id="KecerdasanFiguralCukup" value='1'>
                        <label for="KecerdasanFiguralCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralBaik')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralBaik" type="checkbox" id="KecerdasanFiguralBaik" value='1'>
                        <label for="KecerdasanFiguralBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KecerdasanFigural', 'KecerdasanFiguralTinggi')" class="custom-control-input custom-control-input-success KecerdasanFigural" name="KecerdasanFiguralTinggi" type="checkbox" id="KecerdasanFiguralTinggi" value='1'>
                        <label for="KecerdasanFiguralTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Daya Ingat</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('DayaIngat', 'DayaIngatRendah')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatRendah" type="checkbox" id="DayaIngatRendah" value='1'>
                        <label for="DayaIngatRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('DayaIngat', 'DayaIngatKurang')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatKurang" type="checkbox" id="DayaIngatKurang" value='1'>
                        <label for="DayaIngatKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('DayaIngat', 'DayaIngatCukup')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatCukup" type="checkbox" id="DayaIngatCukup" value='1'>
                        <label for="DayaIngatCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('DayaIngat', 'DayaIngatBaik')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatBaik" type="checkbox" id="DayaIngatBaik" value='1'>
                        <label for="DayaIngatBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('DayaIngat', 'DayaIngatTinggi')" class="custom-control-input custom-control-input-success DayaIngat" name="DayaIngatTinggi" type="checkbox" id="DayaIngatTinggi" value='1'>
                        <label for="DayaIngatTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Berpikir Komprehensif</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifRendah')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifRendah" type="checkbox" id="KemampuanKomprehensifRendah" value='1'>
                        <label for="KemampuanKomprehensifRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifKurang')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifKurang" type="checkbox" id="KemampuanKomprehensifKurang" value='1'>
                        <label for="KemampuanKomprehensifKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifCukup')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifCukup" type="checkbox" id="KemampuanKomprehensifCukup" value='1'>
                        <label for="KemampuanKomprehensifCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifBaik')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifBaik" type="checkbox" id="KemampuanKomprehensifBaik" value='1'>
                        <label for="KemampuanKomprehensifBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKomprehensif', 'KemampuanKomprehensifTinggi')" class="custom-control-input custom-control-input-success KemampuanKomprehensif" name="KemampuanKomprehensifTinggi" type="checkbox" id="KemampuanKomprehensifTinggi" value='1'>
                        <label for="KemampuanKomprehensifTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Kemampuan Analisis</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisRendah')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisRendah" type="checkbox" id="KemampuanAnalisisRendah" value='1'>
                        <label for="KemampuanAnalisisRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisKurang')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisKurang" type="checkbox" id="KemampuanAnalisisKurang" value='1'>
                        <label for="KemampuanAnalisisKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisCukup')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisCukup" type="checkbox" id="KemampuanAnalisisCukup" value='1'>
                        <label for="KemampuanAnalisisCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisBaik')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisBaik" type="checkbox" id="KemampuanAnalisisBaik" value='1'>
                        <label for="KemampuanAnalisisBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanAnalisis', 'KemampuanAnalisisTinggi')" class="custom-control-input custom-control-input-success KemampuanAnalisis" name="KemampuanAnalisisTinggi" type="checkbox" id="KemampuanAnalisisTinggi" value='1'>
                        <label for="KemampuanAnalisisTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Mengambil Keputusan</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanRendah')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanRendah" type="checkbox" id="KemampuanKeputusanRendah" value='1'>
                        <label for="KemampuanKeputusanRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanKurang')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanKurang" type="checkbox" id="KemampuanKeputusanKurang" value='1'>
                        <label for="KemampuanKeputusanKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanCukup')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanCukup" type="checkbox" id="KemampuanKeputusanCukup" value='1'>
                        <label for="KemampuanKeputusanCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanBaik')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanBaik" type="checkbox" id="KemampuanKeputusanBaik" value='1'>
                        <label for="KemampuanKeputusanBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanKeputusan', 'KemampuanKeputusanTinggi')" class="custom-control-input custom-control-input-success KemampuanKeputusan" name="KemampuanKeputusanTinggi" type="checkbox" id="KemampuanKeputusanTinggi" value='1'>
                        <label for="KemampuanKeputusanTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Berbahasa</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaRendah')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaRendah" type="checkbox" id="KemampuanBerbahasaRendah" value='1'>
                        <label for="KemampuanBerbahasaRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaKurang')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaKurang" type="checkbox" id="KemampuanBerbahasaKurang" value='1'>
                        <label for="KemampuanBerbahasaKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaCukup')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaCukup" type="checkbox" id="KemampuanBerbahasaCukup" value='1'>
                        <label for="KemampuanBerbahasaCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaBaik')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaBaik" type="checkbox" id="KemampuanBerbahasaBaik" value='1'>
                        <label for="KemampuanBerbahasaBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanBerbahasa', 'KemampuanBerbahasaTinggi')" class="custom-control-input custom-control-input-success KemampuanBerbahasa" name="KemampuanBerbahasaTinggi" type="checkbox" id="KemampuanBerbahasaTinggi" value='1'>
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
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriRendah')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriRendah" type="checkbox" id="KepercayaanDiriRendah" value='1'>
                        <label for="KepercayaanDiriRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriKurang')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriKurang" type="checkbox" id="KepercayaanDiriKurang" value='1'>
                        <label for="KepercayaanDiriKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriCukup')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriCukup" type="checkbox" id="KepercayaanDiriCukup" value='1'>
                        <label for="KepercayaanDiriCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriBaik')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriBaik" type="checkbox" id="KepercayaanDiriBaik" value='1'>
                        <label for="KepercayaanDiriBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepercayaanDiri', 'KepercayaanDiriTinggi')" class="custom-control-input custom-control-input-success KepercayaanDiri" name="KepercayaanDiriTinggi" type="checkbox" id="KepercayaanDiriTinggi" value='1'>
                        <label for="KepercayaanDiriTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemampuan Sosialisasi</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiRendah')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiRendah" type="checkbox" id="KemampuanSosialisasiRendah" value='1'>
                        <label for="KemampuanSosialisasiRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiKurang')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiKurang" type="checkbox" id="KemampuanSosialisasiKurang" value='1'>
                        <label for="KemampuanSosialisasiKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiCukup')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiCukup" type="checkbox" id="KemampuanSosialisasiCukup" value='1'>
                        <label for="KemampuanSosialisasiCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiBaik')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiBaik" type="checkbox" id="KemampuanSosialisasiBaik" value='1'>
                        <label for="KemampuanSosialisasiBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KemampuanSosialisasi', 'KemampuanSosialisasiTinggi')" class="custom-control-input custom-control-input-success KemampuanSosialisasi" name="KemampuanSosialisasiTinggi" type="checkbox" id="KemampuanSosialisasiTinggi" value='1'>
                        <label for="KemampuanSosialisasiTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kematangan Emosi</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiRendah')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiRendah" type="checkbox" id="KematanganEmosiRendah" value='1'>
                        <label for="KematanganEmosiRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiKurang')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiKurang" type="checkbox" id="KematanganEmosiKurang" value='1'>
                        <label for="KematanganEmosiKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiCukup')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiCukup" type="checkbox" id="KematanganEmosiCukup" value='1'>
                        <label for="KematanganEmosiCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiBaik')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiBaik" type="checkbox" id="KematanganEmosiBaik" value='1'>
                        <label for="KematanganEmosiBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KematanganEmosi', 'KematanganEmosiTinggi')" class="custom-control-input custom-control-input-success KematanganEmosi" name="KematanganEmosiTinggi" type="checkbox" id="KematanganEmosiTinggi" value='1'>
                        <label for="KematanganEmosiTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Motivasi Kerja</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaRendah')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaRendah" type="checkbox" id="MotivasiKerjaRendah" value='1'>
                        <label for="MotivasiKerjaRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaKurang')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaKurang" type="checkbox" id="MotivasiKerjaKurang" value='1'>
                        <label for="MotivasiKerjaKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaCukup')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaCukup" type="checkbox" id="MotivasiKerjaCukup" value='1'>
                        <label for="MotivasiKerjaCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaBaik')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaBaik" type="checkbox" id="MotivasiKerjaBaik" value='1'>
                        <label for="MotivasiKerjaBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('MotivasiKerja', 'MotivasiKerjaTinggi')" class="custom-control-input custom-control-input-success MotivasiKerja" name="MotivasiKerjaTinggi" type="checkbox" id="MotivasiKerjaTinggi" value='1'>
                        <label for="MotivasiKerjaTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kemandirian</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Kemandirian', 'KemandirianRendah')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianRendah" type="checkbox" id="KemandirianRendah" value='1'>
                        <label for="KemandirianRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Kemandirian', 'KemandirianKurang')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianKurang" type="checkbox" id="KemandirianKurang" value='1'>
                        <label for="KemandirianKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Kemandirian', 'KemandirianCukup')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianCukup" type="checkbox" id="KemandirianCukup" value='1'>
                        <label for="KemandirianCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Kemandirian', 'KemandirianBaik')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianBaik" type="checkbox" id="KemandirianBaik" value='1'>
                        <label for="KemandirianBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Kemandirian', 'KemandirianTinggi')" class="custom-control-input custom-control-input-success Kemandirian" name="KemandirianTinggi" type="checkbox" id="KemandirianTinggi" value='1'>
                        <label for="KemandirianTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Inisiatif</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Inisiatif', 'InisiatifRendah')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifRendah" type="checkbox" id="InisiatifRendah" value='1'>
                        <label for="InisiatifRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Inisiatif', 'InisiatifKurang')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifKurang" type="checkbox" id="InisiatifKurang" value='1'>
                        <label for="InisiatifKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Inisiatif', 'InisiatifCukup')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifCukup" type="checkbox" id="InisiatifCukup" value='1'>
                        <label for="InisiatifCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Inisiatif', 'InisiatifBaik')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifBaik" type="checkbox" id="InisiatifBaik" value='1'>
                        <label for="InisiatifBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('Inisiatif', 'InisiatifTinggi')" class="custom-control-input custom-control-input-success Inisiatif" name="InisiatifTinggi" type="checkbox" id="InisiatifTinggi" value='1'>
                        <label for="InisiatifTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Kepatuhan Terhadap Aturan</td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanRendah')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanRendah" type="checkbox" id="KepatuhanAturanRendah" value='1'>
                        <label for="KepatuhanAturanRendah" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanKurang')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanKurang" type="checkbox" id="KepatuhanAturanKurang" value='1'>
                        <label for="KepatuhanAturanKurang" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanCukup')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanCukup" type="checkbox" id="KepatuhanAturanCukup" value='1'>
                        <label for="KepatuhanAturanCukup" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanBaik')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanBaik" type="checkbox" id="KepatuhanAturanBaik" value='1'>
                        <label for="KepatuhanAturanBaik" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="custom-control custom-checkbox">
                        <input onclick="getCheckbox('KepatuhanAturan', 'KepatuhanAturanTinggi')" class="custom-control-input custom-control-input-success KepatuhanAturan" name="KepatuhanAturanTinggi" type="checkbox" id="KepatuhanAturanTinggi" value='1'>
                        <label for="KepatuhanAturanTinggi" class="custom-control-label"></label>
                      </div>
                    </td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
          <textarea name="KetKandidat" id="FormDetail"></textarea>
        </div>
        <div class="card-footer">
          <button class="btn btn-sm btn-success" type="submit">Simpan Data</button>
        </div>
      </div>
    </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="viewSoal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="viewSoalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewSoalLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Jawaban</td>
              <td>Score</td>
            </tr>
          </thead>
          <tbody id="DataJawab"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function getCheckbox(id_subdetail, id_check, TypePilihan) {
    // document.getElementsByClassName(id_subdetail).checked = false;
      $('.'+id_subdetail).prop('checked',false);
      $("#"+id_check).prop('checked',true);
  }
function GetDetailJawaban(Id_soal, IdKandidat, Id_subsoal) {
  $('#viewSoal').modal("show");
  $.ajax({
    url : "<?=base_url()?>Transaksi/DetailKandidat/GetDetailJawaban",
    dataType : "JSON",
    type : "POST",
    data : {Id_soal:Id_soal, IdKandidat:IdKandidat, Id_subsoal:Id_subsoal},
    success : function (data) {
      html = ``;
      for (let i = 0; i < data.length; i++) {
        html+= 
        `
        <tr>
          <td>`+(i+1)+`</td>
          <td>`+data[i].Jawab+`</td>
          <td>`+data[i].Score+`</td>
        </tr>
        `;      

      }
      $('#DataJawab').html(html);
    }
  })
}
function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
  /* global Chart:false */


function Confirm() {
  // $("#CekConfirm").modal("show");
  document.getElementById("FormSimpan").hidden = false;
}

          $(document).ready(function(){
            $('#FormDetail').summernote({
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
                      console.log(url);
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

        var id = "<?=$IdKandidat?>";
    console.log(id)
    $.ajax({
      url : "<?=base_url()?>Transaksi/Kandidat/GetPrint",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#ModalPrint").modal("show");
        var today = new Date();

        // Data Detail Form
        for (let i = 0; i < data.form.length; i++) {
          if (data.form[i].Aspek == 'KecerdasanUmum') {
            document.getElementsByClassName('KecerdasanUmum').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanUmumRendah').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanUmumRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanUmumKurang').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanUmumKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanUmumCukup').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanUmumCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanUmumBaik').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanUmumBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanUmumTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanUmumTinggi')[0].style.visibility='hidden';
            }
            
          }
         
          if (data.form[i].Aspek == 'KecerdasanVerbal') {
            document.getElementsByClassName('KecerdasanVerbal').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanVerbalRendah').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanVerbalRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanVerbalKurang').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanVerbalKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanVerbalCukup').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanVerbalCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanVerbalBaik').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanVerbalBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanVerbalTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanVerbalTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KecerdasanBerhitung') {
            document.getElementsByClassName('KecerdasanBerhitung').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanBerhitungRendah').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanBerhitungRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanBerhitungKurang').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanBerhitungKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanBerhitungCukup').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanBerhitungCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanBerhitungBaik').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanBerhitungBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanBerhitungTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanBerhitungTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KecerdasanFigural') {
            document.getElementsByClassName('KecerdasanFigural').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KecerdasanFiguralRendah').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanFiguralRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KecerdasanFiguralKurang').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanFiguralKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KecerdasanFiguralCukup').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanFiguralCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KecerdasanFiguralBaik').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanFiguralBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KecerdasanFiguralTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KecerdasanFiguralTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'DayaIngat') {
            document.getElementsByClassName('DayaIngat').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('DayaIngatRendah').checked = true;
            } else {
              // document.getElementsByClassName('DayaIngatRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('DayaIngatKurang').checked = true;
            } else {
              // document.getElementsByClassName('DayaIngatKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('DayaIngatCukup').checked = true;
            } else {
              // document.getElementsByClassName('DayaIngatCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('DayaIngatBaik').checked = true;
            } else {
              // document.getElementsByClassName('DayaIngatBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('DayaIngatTinggi').checked = true;
            } else {
              // document.getElementsByClassName('DayaIngatTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KemampuanAnalisis') {
            document.getElementsByClassName('KemampuanAnalisis').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanAnalisisRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanAnalisisRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanAnalisisKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanAnalisisKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanAnalisisCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanAnalisisCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanAnalisisBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanAnalisisBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanAnalisisTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanAnalisisTinggi')[0].style.visibility='hidden';
            }
            
          }
          
          if (data.form[i].Aspek == 'KemampuanBerbahasa') {
            document.getElementsByClassName('KemampuanBerbahasa').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanBerbahasaRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanBerbahasaRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanBerbahasaKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanBerbahasaKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanBerbahasaCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanBerbahasaCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanBerbahasaBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanBerbahasaBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanBerbahasaTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanBerbahasaTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KepercayaanDiri') {
            document.getElementsByClassName('KepercayaanDiri').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KepercayaanDiriRendah').checked = true;
            } else {
              // document.getElementsByClassName('KepercayaanDiriRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KepercayaanDiriKurang').checked = true;
            } else {
              // document.getElementsByClassName('KepercayaanDiriKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KepercayaanDiriCukup').checked = true;
            } else {
              // document.getElementsByClassName('KepercayaanDiriCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KepercayaanDiriBaik').checked = true;
            } else {
              // document.getElementsByClassName('KepercayaanDiriBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KepercayaanDiriTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KepercayaanDiriTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KemampuanSosialisasi') {
            document.getElementsByClassName('KemampuanSosialisasi').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanSosialisasiRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanSosialisasiRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanSosialisasiKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanSosialisasiKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanSosialisasiCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanSosialisasiCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanSosialisasiBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanSosialisasiBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanSosialisasiTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanSosialisasiTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'KematanganEmosi') {
            document.getElementsByClassName('KematanganEmosi').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KematanganEmosiRendah').checked = true;
            } else {
              // document.getElementsByClassName('KematanganEmosiRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KematanganEmosiKurang').checked = true;
            } else {
              // document.getElementsByClassName('KematanganEmosiKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KematanganEmosiCukup').checked = true;
            } else {
              // document.getElementsByClassName('KematanganEmosiCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KematanganEmosiBaik').checked = true;
            } else {
              // document.getElementsByClassName('KematanganEmosiBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KematanganEmosiTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KematanganEmosiTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'MotivasiKerja') {
            document.getElementsByClassName('MotivasiKerja').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('MotivasiKerjaRendah').checked = true;
            } else {
              // document.getElementsByClassName('MotivasiKerjaRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('MotivasiKerjaKurang').checked = true;
            } else {
              // document.getElementsByClassName('MotivasiKerjaKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('MotivasiKerjaCukup').checked = true;
            } else {
              // document.getElementsByClassName('MotivasiKerjaCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('MotivasiKerjaBaik').checked = true;
            } else {
              // document.getElementsByClassName('MotivasiKerjaBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('MotivasiKerjaTinggi').checked = true;
            } else {
              // document.getElementsByClassName('MotivasiKerjaTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'Kemandirian') {
            document.getElementsByClassName('Kemandirian').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemandirianRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemandirianRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemandirianKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemandirianKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemandirianCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemandirianCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemandirianBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemandirianBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemandirianTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemandirianTinggi')[0].style.visibility='hidden';
            }
            
          }

          if (data.form[i].Aspek == 'Inisiatif') {
            document.getElementsByClassName('Inisiatif').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('InisiatifRendah').checked = true;
            } else {
              // document.getElementsByClassName('InisiatifRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('InisiatifKurang').checked = true;
            } else {
              // document.getElementsByClassName('InisiatifKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('InisiatifCukup').checked = true;
            } else {
              // document.getElementsByClassName('InisiatifCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('InisiatifBaik').checked = true;
            } else {
              // document.getElementsByClassName('InisiatifBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('InisiatifTinggi').checked = true;
            } else {
              // document.getElementsByClassName('InisiatifTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KemampuanKomprehensif') {
            document.getElementsByClassName('KemampuanKomprehensif').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanKomprehensifRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKomprehensifRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanKomprehensifKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKomprehensifKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanKomprehensifCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKomprehensifCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanKomprehensifBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKomprehensifBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanKomprehensifTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKomprehensifTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KemampuanKeputusan') {
            document.getElementsByClassName('KemampuanKeputusan').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KemampuanKeputusanRendah').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKeputusanRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KemampuanKeputusanKurang').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKeputusanKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KemampuanKeputusanCukup').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKeputusanCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KemampuanKeputusanBaik').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKeputusanBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KemampuanKeputusanTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KemampuanKeputusanTinggi')[0].style.visibility='hidden';
            }
            
          }
          if (data.form[i].Aspek == 'KepatuhanAturan') {
            document.getElementsByClassName('KepatuhanAturan').checked = false;
            if (data.form[i].Rendah) {
              document.getElementById('KepatuhanAturanRendah').checked = true;
            } else {
              // document.getElementsByClassName('KepatuhanAturanRendah')[0].style.visibility='hidden';
            }
            if (data.form[i].Kurang) {
              document.getElementById('KepatuhanAturanKurang').checked = true;
            } else {
              // document.getElementsByClassName('KepatuhanAturanKurang')[0].style.visibility='hidden';
            }
            if (data.form[i].Cukup) {
              document.getElementById('KepatuhanAturanCukup').checked = true;
            } else {
              // document.getElementsByClassName('KepatuhanAturanCukup')[0].style.visibility='hidden';
            }
            if (data.form[i].Baik) {
              document.getElementById('KepatuhanAturanBaik').checked = true;
            } else {
              // document.getElementsByClassName('KepatuhanAturanBaik')[0].style.visibility='hidden';
            }
            if (data.form[i].Tinggi) {
              document.getElementById('KepatuhanAturanTinggi').checked = true;
            } else {
              // document.getElementsByClassName('KepatuhanAturanTinggi')[0].style.visibility='hidden';
            }
            
          }

          // document.getElementById("FormDetail").innerHTML = data.formHead[0].KetKandidat
          
        }
        $('#FormDetail').summernote('pasteHTML', data.formHead[0].KetKandidat)
      }

    })
</script>