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
  <?php

                use phpDocumentor\Reflection\DocBlock\Tags\Return_;

   function revass($angka) {
    $reverse = [
        1 => 9,
        2 => 8,
        3 => 7,
        4 => 6,
        5 => 5,
        6 => 4,
        7 => 3,
        8 => 2,
        9 => 1
    ];

    if (isset($reverse[$angka])) {
        return $reverse[$angka];
    } else {
        return $angka; // Mengembalikan angka asli jika tidak ada dalam daftar reverse
    }
} 
function CekConvertMDST($Angka)
{
  if ($Angka >= 0 && $Angka <= 29) {
    $HasilAngka = 0;
  }else if($Angka >= 30 && $Angka <= 31){
    $HasilAngka = 0.6;
  }else if($Angka == 32){
    $HasilAngka = 1.2;
  }else if($Angka == 33){
    $HasilAngka = 1.8;
  }else if($Angka == 34){
    $HasilAngka = 2.4;
  }else if($Angka == 35){
    $HasilAngka = 3;
  }else if($Angka >= 36 && $Angka <= 37){
    $HasilAngka = 3.6;
  }else if($Angka >= 38){
    $HasilAngka = 4;
  }

  return $HasilAngka;
}

function CekConvertPemimpin($To_Cek, $Ro_Cek, $E_Cek)
{
  if ($To_Cek > 2 && $Ro_Cek > 2 && $E_Cek > 2) {
    $Hasil = "Executive";
  } else if ($To_Cek > 2 && $Ro_Cek > 2 && $E_Cek < 2) {
    $Hasil = "Compromiser";
  } else if ($To_Cek > 2 && $Ro_Cek < 2 && $E_Cek > 2) {
    $Hasil = "Benevolent Autocrat";
  } else if ($To_Cek > 2 && $Ro_Cek < 2 && $E_Cek < 2) {
    $Hasil = "Autocrat";
  } else if ($To_Cek < 2 && $Ro_Cek > 2 && $E_Cek > 2) {
    $Hasil = "Developer";
  } else if ($To_Cek < 2 && $Ro_Cek > 2 && $E_Cek < 2) {
    $Hasil = "Missionary";
  } else if ($To_Cek < 2 && $Ro_Cek < 2 && $E_Cek > 2) {
    $Hasil = "Bureaucrat";
  } else if ($To_Cek < 2 && $Ro_Cek < 2 && $E_Cek < 2) {
    $Hasil = "Deserter";
  } 

  return $Hasil;
}

?>
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
      <div class="card no-printme">
        <div class="card-header"><button class="btn btn-sm btn-success" href="javascript:void(0);" onclick="{window.print()}">Print <i class="fas fa-print"></i> </button></div>
      </div>
      <div class="card card-gray printme">
        <div class="card-header">
        IDENTITAS
        </div>
        <div class="card-body">
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
                $birthDate = new DateTime($tanggal_lahir);
                $today = new DateTime("today");
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
                <tr>
                  <td style="width: 20%;">Paket</td>
                  <td style="width: 10px;">:</td>
                  <td><?=$Kandidat->NamaPaket?></td>
                </tr>
                

              </table>
        </div>
      </div>
    <form action="<?=base_url()?>Transaksi/DetailKandidat/SimpanData" method="post">
    <!-- Id = 16458ac58ee43c Adalah ID Paket B -->
    <?php if ($Kandidat->IdPaket == '16458ac58ee43c') { ?>
        <div class="card">
            <div class="card-body printme" >
            <div class="table">
                <table class="table table-bordered table-sm">
                  
                    <?php $no = 1;  foreach ($control->DataSoal($Kandidat->IdKandidat) as $val) { ?>
                  <thead>
                    <tr>
                      <td style="background-color: #99f79e;">Buku Soal <?=$val->nama_soal?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$val->nama_soal?></td>
                    </tr>
                    
                    <tr>
                      <td colspan="2">
                        <?php if ($val->id_soal == '163773219a9094') { ?>
                          <table class="table table-bordered table-sm">
                          
                            <tr>
                              <td style="width: 60%;">
                              <div class="card">
                                <div class="card-header border-0">
                                  <div class="d-flex justify-content-between">
                                  </div>
                                </div>
                                <div class="card-body">

                                  <div class="position-relative mb-4">
                                    <canvas id="cfit_chart" height="350"></canvas>
                                  </div>
                                  

                                </div>
                              </div>
                            </td>
                            <td style="width: 30%;">
                              <table class="table">
                              <thead>
                                <tr>
                                  <td>No</td>
                                  <td>Faktor</td>
                                  <td>Cek Jawaban</td>
                                  <td>Raw</td>
                                  <td>Std</td>
                                </tr>
                            </thead>
                          <tbody>
                                <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                            
                            <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                            <?php }else{ ?>
                            <tr>
                              <td><?=$no2++?></td>
                              <td><?=$ValSub->nama_subsoal?> </td>
                              <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                              <td>
                                  <?= $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat); ?>
                                  <?php $DataSub[$val->id_soal]['RAW'][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);?>
                              </td>
                                <td>
                                  <?php if ($ValSub->Id_subsoal == '1637d96c15ef48') {
                                    $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);

                                    echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                  } else {
                                    $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                    echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                  }
                                  ?>
                                </td>
                            </tr>
                            <?php 
                                  $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                            }
                            ?>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;">Total Hasil</td>
                          <td><?=array_sum($dataCount[$val->id_soal])?></td>
                          <td><?=$control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat);?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="text-align: right;">Hasil IQ</td>
                          <td><?=$control->CheckConvertDetailIST( $control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat), 'IQ', $Kandidat->IdKandidat);?></td>
                          <td></td>
                        </tr>
                      </tfoot>
                                </table>
                              </td>
                            </tr>

                          </table>
                          <script>
            /* global Chart:false */
            $(function () {
              'use strict'
              var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
              }
              var mode = 'index'
              var intersect = true
              var $visitorsChart = $('#cfit_chart')
              // eslint-disable-next-line no-unused-vars
              var visitorsChart = new Chart($visitorsChart, {
                data: {
                  labels: ['SE', 'WA', 'AN', 'GE', 'ME', 'RA', 'ZR', 'FA', 'WU'],
                  datasets: [
                    {
                      type: 'line',
                      label: 'STD',
                      data: [<?=$DataSub['163773219a9094']['STD'][0] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][0]; ?>, <?=$DataSub['163773219a9094']['STD'][1] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][1]; ?>, <?=$DataSub['163773219a9094']['STD'][2] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][2]; ?>, <?=$DataSub['163773219a9094']['STD'][3] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][3]; ?>, <?=$DataSub['163773219a9094']['STD'][8] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][8]; ?>, <?=$DataSub['163773219a9094']['STD'][4] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][4]; ?>, <?=$DataSub['163773219a9094']['STD'][5] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][5]; ?>, <?=$DataSub['163773219a9094']['STD'][6] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][6]; ?>, <?=$DataSub['163773219a9094']['STD'][7] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][7]; ?>],
                      backgroundColor: 'tansparent',
                      borderColor: '#57c7ff',
                      pointBorderColor: '#ced4da',
                      pointBackgroundColor: '#0c6ff0',
                      fill: false,
                      lineTension: 0
                      // pointHoverBackgroundColor: '#ced4da',
                      // pointHoverBorderColor    : '#ced4da'
                    }]
                  },
                  options: {
                    radius: 0,
                    maintainAspectRatio: false,
                    tooltips: {
                      mode: mode,
                      intersect: intersect
                    },
                    hover: {
                      mode: mode,
                      intersect: intersect
                    },
                    legend: {
                      display: false
                    },
                    scales: {
                      yAxes: [{
                        // display: false,
                        gridLines: {
                          display: true,
                          // lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                          beginAtZero: false,
                          stepSize: 10
                          // suggestedMax: 200
                        }, ticksStyle)
                      }],
                      xAxes: [{
                        display: true,
                        gridLines: {
                          display: true
                        },
                        ticks: ticksStyle
                      }]
                    }
                  }
                })
              })
            </script>
                        <?php } else if ($val->id_soal == '1637732266d332') { ?>
                          <table class="table">
                            <tr>
                              <td align="center">
                              <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValS) { ?>
                                <button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValS->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button>
                          <style>
                            .slider {
                              -webkit-appearance: none;
                              width: 100%;
                              height: 15px;
                              border-radius: 5px;  
                              background: #d3d3d3;
                              outline: none;
                              opacity: 0.7;
                              -webkit-transition: .2s;
                              transition: opacity .2s;
                            }

                            .slider::-webkit-slider-thumb {
                              -webkit-appearance: none;
                              appearance: none;
                              width: 25px;
                              height: 25px;
                              border-radius: 50%; 
                              background: #02db11;
                              cursor: pointer;
                            }

                            .slider::-moz-range-thumb {
                              width: 25px;
                              height: 25px;
                              border-radius: 50%;
                              background: #04AA6D;
                              cursor: pointer;
                            }
                          </style>
                          <table class="table table-bordered table-sm" style=" text-align:center;">
                            <thead>
                              <tr>
                                <th colspan="2">Kode</th>
                                <th>Hasil</th>
                                <th style="text-align:right;white-space:nowrap;"><------</th>
                                <th style="min-width:30px;">1</th>
                                <th style="min-width:30px;">2</th>
                                <th style="min-width:30px;">3</th>
                                <th style="min-width:30px;">4</th>
                                <th style="min-width:30px;">5</th>
                                <th style="min-width:30px;">6</th>
                                <th style="min-width:30px;">7</th>
                                <th style="min-width:30px;">8</th>
                                <th style="min-width:30px;">9</th>
                                <th style="text-align:left;white-space:nowrap;">------></th>  
                              </tr>
                            </thead>
                            <tbody class="text-sm" >
                              <tr>
                                <td></td>
                                <td>MD</td>
                                <td><?=$control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'MD')?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap; vertical-align: middle;">Warmth</td>
                                <td style="vertical-align: middle;">A</td>
                                <td style="vertical-align: middle;"><?php $PFA = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'A'); echo $PFA;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penyendiri, Pendiam </b><br> Terpisah, Jaga Jarak, Menyendiri</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFA;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Ramah</b><br> Peduli, Perhatian pada orang lain</td>
                              </tr>

                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Reasoning</td>
                                <td style="vertical-align: middle;">B</td>
                                <td style="vertical-align: middle;"><?php $PFB = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'B'); echo $PFB;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penalaran Konkrit </b><br> Penalaran kurang</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFB;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Penalaran Abstrak</b><br> Penalaran Lebih, Cepat Belajar</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Emotional Stability</td>
                                <td style="vertical-align: middle;">C</td>
                                <td style="vertical-align: middle;"><?php $PFC = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'C'); echo $PFC;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Reaktif </b><br> Dipengaruhi perasaan, Mood Swing</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFC;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Emosi Stabil</b><br> Pengalaman Emosi Yang Stabil</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Dominance</td>
                                <td style="vertical-align: middle;">E</td>
                                <td style="vertical-align: middle;"><?php $PFE = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'E'); echo $PFE?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penurut </b><br> Kooperatif, Menghindari Konflik, Submisif</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFE;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Dominan</b><br> Menuntut, Asertif, Kompetitif</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Liveliness</td>
                                <td style="vertical-align: middle;">F</td>
                                <td style="vertical-align: middle;"><?php $PFF = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'F'); echo $PFF?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Serius </b><br> Terkendali, Hati-hati, Muram</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFF;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Lively</b><br> Antusias, Spontan, Riang</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Rule Consciousness</td>
                                <td style="vertical-align: middle;">G</td>
                                <td style="vertical-align: middle;"><?php $PFG = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'G'); echo $PFG?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Kebijakan Situasional </b><br> Nonkonformis, Tidak Konvensional</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFG;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Sadar-Aturan</b><br> Berbakti, Konvensional</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Social Boldness</td>
                                <td style="vertical-align: middle;">H</td>
                                <td style="vertical-align: middle;"><?php $PFH = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'H'); echo $PFH?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Pemalu </b><br> Pemalu, Sensitif pada ancaman</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFH;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Tebal-sosial</b><br> Berani, Tebal-Kulit, Mencari Perhatian</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Sensitivity</td>
                                <td style="vertical-align: middle;">I</td>
                                <td style="vertical-align: middle;"><?php $PFI = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'I'); echo $PFI?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Utilitarian </b><br> Keras, Objektif, Tidak Sentimentil</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFI;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Sensitif</b><br> Estetis, Halus, Sentimentil</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Vigilance</td>
                                <td style="vertical-align: middle;">L</td>
                                <td style="vertical-align: middle;"><?php $PFL = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'L'); echo $PFL?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Percaya </b><br> Tidak Menaruh curiga, Menerima</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFL;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Waspada</b><br> Curiga, Skeptis, Waspada</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Abstractedness</td>
                                <td style="vertical-align: middle;">M</td>
                                <td style="vertical-align: middle;"><?php $PFM = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'M'); echo $PFM?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Membumi </b><br> Praktis, Turun-ke-bumi, Pragmatis</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFM;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Abstrak</b><br> Imajinatif, Orientasi Ide, Tidak Praktis</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Privateness</td>
                                <td style="vertical-align: middle;">N</td>
                                <td style="vertical-align: middle;"><?php $PFN = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'N'); echo $PFN?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Terus Terang </b><br> Naif, Mengungkap Diri, Asli, Polos</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFN;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Privasi</b><br> Rahasia, Tidak-Mengungkap</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Apprehension</td>
                                <td style="vertical-align: middle;">O</td>
                                <td style="vertical-align: middle;"><?php $PFO = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'O'); echo $PFO?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Yakin Diri </b><br> Tidak Khawatir, Puas Diri, Aman</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFO;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Kuatir</b><br> Peragu, Pencemas, Rawan Rasa Bersalah</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Openess To Change</td>
                                <td style="vertical-align: middle;">Q1</td>
                                <td style="vertical-align: middle;"><?php $PFQ1 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q1'); echo $PFQ1;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Tradisional </b><br> Lekat Pada Kebiasaan, Menolak Perubahan</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ1;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Terbuka Atas Perubahan</b><br> Bereksperimen</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Self Reliance</td>
                                <td style="vertical-align: middle;">Q2</td>
                                <td style="vertical-align: middle;"><?php $PFQ2 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q2'); echo $PFQ2;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Orientasi Kelompok </b><br> Afiliatif, Bergantung pada kelompok sosial</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ2;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Mandiri</b><br> Soliter, Individualis</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Perfectionism</td>
                                <td style="vertical-align: middle;">Q3</td>
                                <td style="vertical-align: middle;"><?php $PFQ3 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q3'); echo $PFQ3?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Toleran Kekacauan </b><br> Tidak Eksak, Fleksibel, Ceroboh</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ3;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Perfeksionis</b><br> Terorganisir, Tertib, Kompulsif</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Tension</td>
                                <td style="vertical-align: middle;">Q4</td>
                                <td style="vertical-align: middle;"><?php $PFQ4 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q4'); echo $PFQ4;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Santai </b><br> Tenang, Sabar</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ4;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Tegang</b><br> Energi Tinggi, Terdorong, Tempo Cepat</td>
                              </tr>
                            </tbody>
                          </table>
                          <?php } ?>
                              </td>
                          
                            </tr>
                            <tr>
                              <td>
                                <table class="table">
                                  <tr>
                                    <td>
                                    High-Order Factor 1
                                      <table class="table table-bordered table-sm" style="text-align: center;">
                                        <tr>
                                          <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                          <td colspan="9">Parameter</td>
                                        </tr>
                                        <tr>
                                          <th style="min-width:30px;">1</th>
                                          <th style="min-width:30px;">2</th>
                                          <th style="min-width:30px;">3</th>
                                          <th style="min-width:30px;">4</th>
                                          <th style="min-width:30px;">5</th>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Interpersonal</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil1 = round((($PFA+(10-$PFE+1)+$PFF+$PFH+$PFI+(10-$PFL+1)+(10-$PFN+1)+$PFQ2)/8), 2) ; ?>
                                          <?php if ($Hasil1<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil1<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil1<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil1<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil1>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew;?></td>
                                          
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Adaptabilty</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil2 = round((($PFC+(10-$PFE+1)+(10-$PFG+1)+$PFH+$PFI+$PFQ1+(10-$PFQ3+1))/7),2);?>
                                          <?php if ($Hasil2<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil2<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil2<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil2<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil2>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Initiative</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil3 = round((($PFQ4+$PFQ2+$PFO+$PFE)/4),2) ;?>
                                          <?php if ($Hasil3<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil3<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil3<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil3<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil3>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"> <?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Manage Emotion</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil4 = round((($PFC+(10-$PFF+1)+(10-$PFI+1)+$PFQ4)/4),2) ; ?>
                                          <?php if ($Hasil4<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil4<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil4<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil4<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil4>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Self-Confidence</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil5 = round((($PFH+(10-$PFN+1)+(10-$PFO+1)+$PFQ2)/4),2) ;?>
                                          <?php if ($Hasil5 <= 2 ) {
                                            $HasilNew = 1;
                                          } else if ($Hasil5 <= 4 ) {
                                            $HasilNew = 2;
                                          } else if ($Hasil5 <= 6 ) {
                                            $HasilNew = 3;
                                          } else if ($Hasil5 <= 8 ) {
                                            $HasilNew = 4;
                                          } else if ($Hasil5 >= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                      </table>
                                    </td>
                                  
                                    <td>
                                    High-Order Factor 2
                                      <table class="table table-bordered table-sm" style="text-align: center;">
                                        <tr>
                                          <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                          <td colspan="9">Parameter</td>
                                        </tr>
                                        <tr>
                                          <th style="min-width:30px;">1</th>
                                          <th style="min-width:30px;">2</th>
                                          <th style="min-width:30px;">3</th>
                                          <th style="min-width:30px;">4</th>
                                          <th style="min-width:30px;">5</th>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Responsibility</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil6Array = array($PFB,$PFE,$PFG,(11-$PFI),(11-$PFO),$PFQ1,$PFQ2,$PFQ3);  $Hasil6 = round((array_sum($Hasil6Array) / count($Hasil6Array)), 2);?>
                                          <?php if ($Hasil6<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil6<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil6<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil6<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil6>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew ?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Relationship</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil7Array = array($PFA,$PFC,(11-$PFE),$PFF,$PFH,$PFI,(11-$PFL),$PFN);  $Hasil7 = round((array_sum($Hasil7Array) / count($Hasil7Array)), 2);?>
                                          <?php if ($Hasil7<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil7<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil7<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil7<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil7>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Personal</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil8Array = array($PFC,$PFG,$PFQ1,$PFQ2,(11-$PFQ4));  $Hasil8 = round((array_sum($Hasil8Array) / count($Hasil8Array)), 2);?>
                                          <?php if ($Hasil8<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil8<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil8<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil8<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil8>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          
                        <?php } else if($val->id_soal == '16458aca066cd2') { ?>
                          <!-- DiSC -->
                          <?php
                          $DataDisc = $control->cekRowDisc($val->id_soal, $Kandidat->IdKandidat); 
                          ?>
                          <div class="table-responsive">
                            <style>
                              .column {
                                display: flex;
                                justify-content: center;
                              }

                              .center-input {
                                text-align: center;
                              }
                            </style>
                            <table class='table table-bordered'>
                            <tr>
                              <td></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>D</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>I</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>S</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>C</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>X</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>Total <?=$Kandidat->StatusDisc?></td>
                            </tr>  
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>MOST</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->D?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->I?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->S?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->C?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->X?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $hasilSum  = $DataDisc['Plus']->D+$DataDisc['Plus']->I+$DataDisc['Plus']->S+$DataDisc['Plus']->C+$DataDisc['Plus']->X; echo $hasilSum;?></td>
                            </tr>
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>LEAST</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->D?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->I?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->S?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->C?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->X?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $hasilSum  = $DataDisc['Minus']->D+$DataDisc['Minus']->I+$DataDisc['Minus']->S+$DataDisc['Minus']->C+$DataDisc['Minus']->X; echo $hasilSum;?></td>
                            </tr>
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>CHANGE</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xD = $DataDisc['Plus']->D-$DataDisc['Minus']->D; echo $xD; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xI = $DataDisc['Plus']->I-$DataDisc['Minus']->I; echo $xI; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xS = $DataDisc['Plus']->S-$DataDisc['Minus']->S; echo $xS; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xC = $DataDisc['Plus']->C-$DataDisc['Minus']->C; echo $xC; ?></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <?php 
                            if ($Kandidat->StatusDisc == 1) { ?>
                            <tr>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'>Hasil</td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->D?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->I?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->S?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->C?></td>
                                <td></td>
                                <td></td>
                              </tr>
                            

                            <?php                              
                            }else{
                              ?>
                              
                              <tr>
                                <td></td>
                                <td>
                                  <div class="column">
                                    <input id="D_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="I_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="S_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="C_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                
                                <td style="width: 80px;"> 
                                
                                  <input type="hidden" name="IdKandidatDisc" id="IdKandidatDisc" value="<?=$Kandidat->IdKandidat?>">
                                  <input type="hidden" name="id_soalDISC" id="id_soalDISC" value="<?=$val->id_soalt?>">
                                </td>
                                <td><div class="column"><button class="btn btn-success btn-sm" type="button" onclick="SimpanDisc()">Simpan DISC</button></div></td>

                              </tr>

                              <script>
                                function SimpanDisc() {
                                  var D_Nilai = document.getElementById('D_Nilai').value
                                  var I_Nilai = document.getElementById('I_Nilai').value
                                  var S_Nilai = document.getElementById('S_Nilai').value
                                  var C_Nilai = document.getElementById('C_Nilai').value
                                  var IdKandidatDisc = document.getElementById('IdKandidatDisc').value
                                  var id_soalDISC = document.getElementById('id_soalDISC').value

                                  const url = "<?=base_url()?>Transaksi/DetailKandidat/SimpanDISC";
                                  const datadisc = {
                                    D_Nilai : D_Nilai,
                                    I_Nilai : I_Nilai,
                                    S_Nilai : S_Nilai,
                                    C_Nilai : C_Nilai,
                                    IdKandidatDisc : IdKandidatDisc,
                                    id_soalDISC : id_soalDISC
                                  }
                                  fetch(url, {
                                    method : "POST",
                                    body : JSON.stringify(datadisc),
                                    headers : {
                                      "Content-Type" : "application/json; charset=UTF-8"
                                    }

                                  })
                                  .then((response) => response.json())
                                  .then((data) => {
                                    console.log(data)
                                    if (data.ValReturn == true) {
                                      location.reload()
                                    }else{

                                    }
                                  })
                                }
                              </script>
                            <?php }
                            ?>
                            
                            
                            </table>
                          </div>
                          <!-- Start Papikostik -->
                        <?php } else if ($val->id_soal == '1645c3f3f1e27b') { ?>
                          <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { 
                            
                            $Z = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'Z')->TotalScore;
                            $E = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'E')->TotalScore;
                            $K = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'K')->TotalScore;
                            $T = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'T')->TotalScore;
                            $V = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'V')->TotalScore;
                            $R = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'R')->TotalScore;
                            $D = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'D')->TotalScore;
                            $C = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'C')->TotalScore;
                            $N = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'N')->TotalScore;
                            $G = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'G')->TotalScore;
                            $A = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'A')->TotalScore;
                            $F = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'F')->TotalScore;
                            $W = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'W')->TotalScore;
                            $X = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'X')->TotalScore;
                            $S = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'S')->TotalScore;
                            $B = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'B')->TotalScore;
                            $O = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'O')->TotalScore;
                            $L = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'L')->TotalScore;
                            $P = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'P')->TotalScore;
                            $I = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'I')->TotalScore;
                            ?>
                          <button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button>
                          <br>
                          <br>
                          <table class="table-bordered table-sm">
                            <tr>
                              <td style="text-align: center; width: 60px"><?=$Z?></td>
                              <td style="text-align: center; width: 60px"><?=$E?></td>
                              <td style="text-align: center; width: 60px"><?=$K?></td>
                              <td style="text-align: center; width: 60px"><?=$T?></td>
                              <td style="text-align: center; width: 60px"><?=$V?></td>
                              <td style="text-align: center; width: 60px"><?=$R?></td>
                              <td style="text-align: center; width: 60px"><?=$D?></td>
                              <td style="text-align: center; width: 60px"><?=$C?></td>
                              <td style="text-align: center; width: 60px"><?=$N?></td>
                              <td style="text-align: center; width: 60px"><?=$G?></td>
                              <td style="text-align: center; width: 60px"><?=$A?></td>
                              <td style="text-align: center; width: 60px"><?=$F?></td>
                              <td style="text-align: center; width: 60px"><?=$W?></td>
                              <td style="text-align: center; width: 60px"><?=$X?></td>
                              <td style="text-align: center; width: 60px"><?=$S?></td>
                              <td style="text-align: center; width: 60px"><?=$B?></td>
                              <td style="text-align: center; width: 60px"><?=$O?></td>
                              <td style="text-align: center; width: 60px"><?=$L?></td>
                              <td style="text-align: center; width: 60px"><?=$P?></td>
                              <td style="text-align: center; width: 60px"><?=$I?></td>
                            </tr>
                            <tr>
                              <td style="text-align: center;">Z</td>
                              <td style="text-align: center;">E</td>
                              <td style="text-align: center;">K</td>
                              <td style="text-align: center;">T</td>
                              <td style="text-align: center;">V</td>
                              <td style="text-align: center;">R</td>
                              <td style="text-align: center;">D</td>
                              <td style="text-align: center;">C</td>
                              <td style="text-align: center;">N</td>
                              <td style="text-align: center;">G</td>
                              <td style="text-align: center;">A</td>
                              <td style="text-align: center;">F</td>
                              <td style="text-align: center;">W</td>
                              <td style="text-align: center;">X</td>
                              <td style="text-align: center;">S</td>
                              <td style="text-align: center;">B</td>
                              <td style="text-align: center;">O</td>
                              <td style="text-align: center;">L</td>
                              <td style="text-align: center;">P</td>
                              <td style="text-align: center;">I</td>
                            </tr>
                            <tr>
                              <td colspan="3" style="text-align: center;">SIFAT</td>
                              <td colspan="2" style="text-align: center;">AKTIVITAS</td>
                              <td colspan="3" style="text-align: center;">CARA KERJA</td>
                              <td colspan="3" style="text-align: center;">ARAH KERJA</td>
                              <td colspan="2" style="text-align: center;">KETAATAN</td>
                              <td colspan="4" style="text-align: center;">INTERAKSI DENGAN REKAN KERJA</td>
                              <td colspan="3" style="text-align: center;">KEPEMIMPINAN</td>
                              
                            </tr>
                           
                           
                          </table>
                          <?php } ?>
                        <?php } else { ?>
                          <table class="table table-bordered table-sm">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Nama Sub Soal</td>
                                <td>Cek Jawaban</td>
                                <td>Score</td>
                              </tr>
                            </thead>
                          <tbody>
                            
                          <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                            
                                <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                                <?php }else{ ?>
                                <tr>
                                  <td><?=$no2++?></td>
                                  <td><?=$ValSub->nama_subsoal?></td>
                                  <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                                  <td>
                                  <?php 
                                      echo $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                                    ?></td>
                                </tr>
                                <?php 
                                    
                                      $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                                }
                                ?>
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            
                            <tr>
                              <td colspan="3" style="text-align: right;">Total Hasil</td>
                              <td><?=array_sum($dataCount[$val->id_soal])?></td>
                            </tr>
                            <?php if ($val->id_soal == '16377320946db8') {
                              
                            } else { ?>
                            <tr>
                              <td colspan="2" style="text-align: right;">Hasil IQ</td>
                              <td><?=$control->CekHasilConvert($val->id_soal, array_sum($dataCount[$val->id_soal]))?></td>
                            </tr>
                            <?php } ?>
                            
                          </tfoot>
                          </table>
                        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                    
                    <?php } ?>

                </table>
                
              </div>
            </div>
            <div class="card-footer no-printme" >
            <input type="hidden" name="IdKandidat" id="" value="<?=$Kandidat->IdKandidat?>">
            <table class="table table-bordered table-sm">
                    <tr>
                      <td style="text-align: center;">No</td>
                      <td style="text-align: center;">Aspek</td>
                      <td style="text-align: center;">Klasifikasi</td>
                      <td style="text-align: center;">Deskripsi</td>
                      <td style="text-align: center;">Saran Pengembangan</td>
                    </tr>
                    <tr>
                      <td>0</td>
                      <td style="text-align: center;">Kecerdasan Umum</td>
                      <td style="text-align: center;"><?php 
                      $total_cfit = floor($control->CekHasilConvert('1636c7fa9ed4ff', array_sum($dataCount['1636c7fa9ed4ff'])));
                        if ($total_cfit >= 130) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($total_cfit >= 120 && $total_cfit <= 129){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($total_cfit >= 90 && $total_cfit <= 119){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($total_cfit >= 80 && $total_cfit <= 89){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($total_cfit <= 79){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kecerdasan Umum')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kecerdasan Umum')->Saran?></td>
                    </tr>
                    <?php 
                    
                    ?>
                    <tr>
                      <td>1</td>
                      <td style="text-align: center;">Kepercayaan Diri</td>
                      <td style="text-align: center;"><?php 
                      $KepercayaanDiri = floor($S + $Kandidat->D);
                        if ($KepercayaanDiri >= 8 && $KepercayaanDiri <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KepercayaanDiri >= 6 && $KepercayaanDiri <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KepercayaanDiri >= 4 && $KepercayaanDiri <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KepercayaanDiri >= 2 && $KepercayaanDiri <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KepercayaanDiri >= 0 && $KepercayaanDiri <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepercayaan Diri')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepercayaan Diri')->Saran?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td style="text-align: center;">Hubungan Interpersonal</td>
                      <td style="text-align: center;"><?php 
                      $HubunganInterpersonal = floor((($S + $O + $B) / 3) + $Kandidat->I);
                        if ($HubunganInterpersonal >= 8 && $HubunganInterpersonal <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($HubunganInterpersonal >= 6 && $HubunganInterpersonal <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($HubunganInterpersonal >= 4 && $HubunganInterpersonal <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($HubunganInterpersonal >= 2 && $HubunganInterpersonal <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($HubunganInterpersonal >= 0 && $HubunganInterpersonal <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hubungan Interpersonal')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hubungan Interpersonal')->Saran?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td style="text-align: center;">Kematangan Emosi</td>
                      <td style="text-align: center;"><?php 
                      $KematanganEmosi = floor(($E + $K) / 2);
                        if ($KematanganEmosi == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KematanganEmosi >= 6 && $KematanganEmosi <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KematanganEmosi >= 4 && $KematanganEmosi <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KematanganEmosi >= 2 && $KematanganEmosi <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KematanganEmosi >= 0 && $KematanganEmosi <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kematangan Emosi')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kematangan Emosi')->Saran?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td style="text-align: center;">Motivasi Kerja</td>
                      <td style="text-align: center;"><?php 
                      $MotivasiKerja = floor(($G + $N) / 2);
                        if ($MotivasiKerja == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($MotivasiKerja >= 6 && $MotivasiKerja <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($MotivasiKerja >= 4 && $MotivasiKerja <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($MotivasiKerja >= 2 && $MotivasiKerja <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($MotivasiKerja >= 0 && $MotivasiKerja <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Motivasi Kerja')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Motivasi Kerja')->Saran?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td style="text-align: center;">Hasrat Berprestasi</td>
                      <td style="text-align: center;"><?php 
                      $HasratBerprestasi = floor($A);
                        if ($HasratBerprestasi == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($HasratBerprestasi >= 6 && $HasratBerprestasi <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($HasratBerprestasi >= 4 && $HasratBerprestasi <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($HasratBerprestasi >= 2 && $HasratBerprestasi <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($HasratBerprestasi >= 0 && $HasratBerprestasi <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hasrat Berprestasi')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hasrat Berprestasi')->Saran?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td style="text-align: center;">Kemandirian</td>
                      <td style="text-align: center;">
                      <?php
                     
                      $Kemandirian = floor((revass($W) + $N) / 2);
                        if ($Kemandirian >= 8 && $Kemandirian <= 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($Kemandirian >= 6 && $Kemandirian <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($Kemandirian >= 4 && $Kemandirian <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($Kemandirian >= 2 && $Kemandirian <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($Kemandirian >= 0 && $Kemandirian <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kemandirian')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kemandirian')->Saran?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td style="text-align: center;">Kepatuhan Terhadap Aturan</td>
                      <td style="text-align: center;">
                      <?php
                     
                      $KepatuhanAturan = floor(($F + $W) / 2) + $Kandidat->C;
                        if ($KepatuhanAturan >= 8 && $KepatuhanAturan <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KepatuhanAturan >= 6 && $KepatuhanAturan <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KepatuhanAturan >= 4 && $KepatuhanAturan <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KepatuhanAturan >= 2 && $KepatuhanAturan <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KepatuhanAturan >= 0 && $KepatuhanAturan <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepatuhan Terhadap Aturan')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepatuhan Terhadap Aturan')->Saran?></td>
                    </tr>
                  </table>
              <?php if ($Kandidat->StatusKoreksi != '1' && ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "4" || $this->session->userdata('id_level') == "5" || $this->session->userdata('id_level') == "6") ) {?>
              
                  
              <?php } ?>
            </div>
          </div>

          
    <?php } else if($Kandidat->IdPaket == '1646f26078b855'){ ?>
      <div class="card">
            <div class="card-body printme" >
            <div class="table">
                <table class="table table-bordered table-sm">
                  
                    <?php $no = 1;  foreach ($control->DataSoal($Kandidat->IdKandidat) as $val) { ?>
                  <thead>
                    <tr>
                      <td style="background-color: #99f79e;">Buku Soal <?=$val->nama_soal?></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=$val->nama_soal?></td>
                    </tr>
                    
                    <tr>
                      <td colspan="2">
                        <?php if ($val->id_soal == '163773219a9094') { ?>
                          <table class="table table-bordered table-sm">
                          
                            <tr>
                              <td style="width: 60%;">
                              <div class="card">
                                <div class="card-header border-0">
                                  <div class="d-flex justify-content-between">
                                  </div>
                                </div>
                                <div class="card-body">

                                  <div class="position-relative mb-4">
                                    <canvas id="cfit_chart" height="350"></canvas>
                                  </div>
                                  

                                </div>
                              </div>
                            </td>
                            <td style="width: 30%;">
                              <table class="table">
                              <thead>
                                <tr>
                                  <td>No</td>
                                  <td>Faktor</td>
                                  <td>Cek Jawaban</td>
                                  <td>Raw</td>
                                  <td>Std</td>
                                </tr>
                            </thead>
                          <tbody>
                                <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                            
                            <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                            <?php }else{ ?>
                            <tr>
                              <td><?=$no2++?></td>
                              <td><?=$ValSub->nama_subsoal?> </td>
                              <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                              <td>
                                  <?= $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat); ?>
                                  <?php $DataSub[$val->id_soal]['RAW'][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);?>
                              </td>
                                <td>
                                  <?php if ($ValSub->Id_subsoal == '1637d96c15ef48') {
                                    $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);

                                    echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                  } else {
                                    $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                    echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                  }
                                  ?>
                                </td>
                            </tr>
                            <?php 
                                  $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                            }
                            ?>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;">Total Hasil</td>
                          <td><?=array_sum($dataCount[$val->id_soal])?></td>
                          <td><?=$control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat);?></td>
                        </tr>
                        <tr>
                          <td colspan="3" style="text-align: right;">Hasil IQ</td>
                          <td><?=$control->CheckConvertDetailIST( $control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat), 'IQ', $Kandidat->IdKandidat);?></td>
                          <td></td>
                        </tr>
                      </tfoot>
                                </table>
                              </td>
                            </tr>

                          </table>
                          <script>
            /* global Chart:false */
            $(function () {
              'use strict'
              var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
              }
              var mode = 'index'
              var intersect = true
              var $visitorsChart = $('#cfit_chart')
              // eslint-disable-next-line no-unused-vars
              var visitorsChart = new Chart($visitorsChart, {
                data: {
                  labels: ['SE', 'WA', 'AN', 'GE', 'ME', 'RA', 'ZR', 'FA', 'WU'],
                  datasets: [
                    {
                      type: 'line',
                      label: 'STD',
                      data: [<?=$DataSub['163773219a9094']['STD'][0] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][0]; ?>, <?=$DataSub['163773219a9094']['STD'][1] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][1]; ?>, <?=$DataSub['163773219a9094']['STD'][2] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][2]; ?>, <?=$DataSub['163773219a9094']['STD'][3] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][3]; ?>, <?=$DataSub['163773219a9094']['STD'][8] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][8]; ?>, <?=$DataSub['163773219a9094']['STD'][4] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][4]; ?>, <?=$DataSub['163773219a9094']['STD'][5] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][5]; ?>, <?=$DataSub['163773219a9094']['STD'][6] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][6]; ?>, <?=$DataSub['163773219a9094']['STD'][7] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][7]; ?>],
                      backgroundColor: 'tansparent',
                      borderColor: '#57c7ff',
                      pointBorderColor: '#ced4da',
                      pointBackgroundColor: '#0c6ff0',
                      fill: false,
                      lineTension: 0
                      // pointHoverBackgroundColor: '#ced4da',
                      // pointHoverBorderColor    : '#ced4da'
                    }]
                  },
                  options: {
                    radius: 0,
                    maintainAspectRatio: false,
                    tooltips: {
                      mode: mode,
                      intersect: intersect
                    },
                    hover: {
                      mode: mode,
                      intersect: intersect
                    },
                    legend: {
                      display: false
                    },
                    scales: {
                      yAxes: [{
                        // display: false,
                        gridLines: {
                          display: true,
                          // lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                          beginAtZero: false,
                          stepSize: 10
                          // suggestedMax: 200
                        }, ticksStyle)
                      }],
                      xAxes: [{
                        display: true,
                        gridLines: {
                          display: true
                        },
                        ticks: ticksStyle
                      }]
                    }
                  }
                })
              })
            </script>
                        <?php } else if ($val->id_soal == '1637732266d332') { ?>
                          <table class="table">
                            <tr>
                              <td align="center">
                              <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValS) { ?>
                                <button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValS->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button>
                          <style>
                            .slider {
                              -webkit-appearance: none;
                              width: 100%;
                              height: 15px;
                              border-radius: 5px;  
                              background: #d3d3d3;
                              outline: none;
                              opacity: 0.7;
                              -webkit-transition: .2s;
                              transition: opacity .2s;
                            }

                            .slider::-webkit-slider-thumb {
                              -webkit-appearance: none;
                              appearance: none;
                              width: 25px;
                              height: 25px;
                              border-radius: 50%; 
                              background: #02db11;
                              cursor: pointer;
                            }

                            .slider::-moz-range-thumb {
                              width: 25px;
                              height: 25px;
                              border-radius: 50%;
                              background: #04AA6D;
                              cursor: pointer;
                            }
                          </style>
                          <table class="table table-bordered table-sm" style=" text-align:center;">
                            <thead>
                              <tr>
                                <th colspan="2">Kode</th>
                                <th>Hasil</th>
                                <th style="text-align:right;white-space:nowrap;"><------</th>
                                <th style="min-width:30px;">1</th>
                                <th style="min-width:30px;">2</th>
                                <th style="min-width:30px;">3</th>
                                <th style="min-width:30px;">4</th>
                                <th style="min-width:30px;">5</th>
                                <th style="min-width:30px;">6</th>
                                <th style="min-width:30px;">7</th>
                                <th style="min-width:30px;">8</th>
                                <th style="min-width:30px;">9</th>
                                <th style="text-align:left;white-space:nowrap;">------></th>  
                              </tr>
                            </thead>
                            <tbody class="text-sm" >
                              <tr>
                                <td></td>
                                <td>MD</td>
                                <td><?=$control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'MD')?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap; vertical-align: middle;">Warmth</td>
                                <td style="vertical-align: middle;">A</td>
                                <td style="vertical-align: middle;"><?php $PFA = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'A'); echo $PFA;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penyendiri, Pendiam </b><br> Terpisah, Jaga Jarak, Menyendiri</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFA;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Ramah</b><br> Peduli, Perhatian pada orang lain</td>
                              </tr>

                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Reasoning</td>
                                <td style="vertical-align: middle;">B</td>
                                <td style="vertical-align: middle;"><?php $PFB = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'B'); echo $PFB;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penalaran Konkrit </b><br> Penalaran kurang</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFB;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Penalaran Abstrak</b><br> Penalaran Lebih, Cepat Belajar</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Emotional Stability</td>
                                <td style="vertical-align: middle;">C</td>
                                <td style="vertical-align: middle;"><?php $PFC = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'C'); echo $PFC;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Reaktif </b><br> Dipengaruhi perasaan, Mood Swing</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFC;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Emosi Stabil</b><br> Pengalaman Emosi Yang Stabil</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Dominance</td>
                                <td style="vertical-align: middle;">E</td>
                                <td style="vertical-align: middle;"><?php $PFE = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'E'); echo $PFE?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Penurut </b><br> Kooperatif, Menghindari Konflik, Submisif</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFE;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Dominan</b><br> Menuntut, Asertif, Kompetitif</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Liveliness</td>
                                <td style="vertical-align: middle;">F</td>
                                <td style="vertical-align: middle;"><?php $PFF = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'F'); echo $PFF?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Serius </b><br> Terkendali, Hati-hati, Muram</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFF;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Lively</b><br> Antusias, Spontan, Riang</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Rule Consciousness</td>
                                <td style="vertical-align: middle;">G</td>
                                <td style="vertical-align: middle;"><?php $PFG = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'G'); echo $PFG?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Kebijakan Situasional </b><br> Nonkonformis, Tidak Konvensional</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFG;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Sadar-Aturan</b><br> Berbakti, Konvensional</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Social Boldness</td>
                                <td style="vertical-align: middle;">H</td>
                                <td style="vertical-align: middle;"><?php $PFH = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'H'); echo $PFH?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Pemalu </b><br> Pemalu, Sensitif pada ancaman</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFH;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Tebal-sosial</b><br> Berani, Tebal-Kulit, Mencari Perhatian</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Sensitivity</td>
                                <td style="vertical-align: middle;">I</td>
                                <td style="vertical-align: middle;"><?php $PFI = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'I'); echo $PFI?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Utilitarian </b><br> Keras, Objektif, Tidak Sentimentil</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFI;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Sensitif</b><br> Estetis, Halus, Sentimentil</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Vigilance</td>
                                <td style="vertical-align: middle;">L</td>
                                <td style="vertical-align: middle;"><?php $PFL = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'L'); echo $PFL?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Percaya </b><br> Tidak Menaruh curiga, Menerima</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFL;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Waspada</b><br> Curiga, Skeptis, Waspada</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Abstractedness</td>
                                <td style="vertical-align: middle;">M</td>
                                <td style="vertical-align: middle;"><?php $PFM = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'M'); echo $PFM?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Membumi </b><br> Praktis, Turun-ke-bumi, Pragmatis</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFM;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Abstrak</b><br> Imajinatif, Orientasi Ide, Tidak Praktis</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Privateness</td>
                                <td style="vertical-align: middle;">N</td>
                                <td style="vertical-align: middle;"><?php $PFN = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'N'); echo $PFN?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Terus Terang </b><br> Naif, Mengungkap Diri, Asli, Polos</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFN;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Privasi</b><br> Rahasia, Tidak-Mengungkap</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Apprehension</td>
                                <td style="vertical-align: middle;">O</td>
                                <td style="vertical-align: middle;"><?php $PFO = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'O'); echo $PFO?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Yakin Diri </b><br> Tidak Khawatir, Puas Diri, Aman</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFO;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Kuatir</b><br> Peragu, Pencemas, Rawan Rasa Bersalah</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Openess To Change</td>
                                <td style="vertical-align: middle;">Q1</td>
                                <td style="vertical-align: middle;"><?php $PFQ1 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q1'); echo $PFQ1;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Tradisional </b><br> Lekat Pada Kebiasaan, Menolak Perubahan</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ1;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Terbuka Atas Perubahan</b><br> Bereksperimen</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Self Reliance</td>
                                <td style="vertical-align: middle;">Q2</td>
                                <td style="vertical-align: middle;"><?php $PFQ2 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q2'); echo $PFQ2;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Orientasi Kelompok </b><br> Afiliatif, Bergantung pada kelompok sosial</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ2;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Mandiri</b><br> Soliter, Individualis</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Perfectionism</td>
                                <td style="vertical-align: middle;">Q3</td>
                                <td style="vertical-align: middle;"><?php $PFQ3 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q3'); echo $PFQ3?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Toleran Kekacauan </b><br> Tidak Eksak, Fleksibel, Ceroboh</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ3;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Perfeksionis</b><br> Terorganisir, Tertib, Kompulsif</td>
                              </tr>
                              <tr>
                                <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Tension</td>
                                <td style="vertical-align: middle;">Q4</td>
                                <td style="vertical-align: middle;"><?php $PFQ4 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q4'); echo $PFQ4;?></td>
                                <td style="text-align:right;white-space:nowrap;"><b>Santai </b><br> Tenang, Sabar</td>
                                <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ4;?>" id="customRange2" width="100%"></div> </td>
                                <td style="text-align:left;white-space:nowrap;"><b>Tegang</b><br> Energi Tinggi, Terdorong, Tempo Cepat</td>
                              </tr>
                            </tbody>
                          </table>
                          <?php } ?>
                              </td>
                          
                            </tr>
                            <tr>
                              <td>
                                <table class="table">
                                  <tr>
                                    <td>
                                    High-Order Factor 1
                                      <table class="table table-bordered table-sm" style="text-align: center;">
                                        <tr>
                                          <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                          <td colspan="9">Parameter</td>
                                        </tr>
                                        <tr>
                                          <th style="min-width:30px;">1</th>
                                          <th style="min-width:30px;">2</th>
                                          <th style="min-width:30px;">3</th>
                                          <th style="min-width:30px;">4</th>
                                          <th style="min-width:30px;">5</th>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Interpersonal</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil1 = round((($PFA+(10-$PFE+1)+$PFF+$PFH+$PFI+(10-$PFL+1)+(10-$PFN+1)+$PFQ2)/8), 2) ; ?>
                                          <?php if ($Hasil1<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil1<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil1<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil1<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil1>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew;?></td>
                                          
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Adaptabilty</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil2 = round((($PFC+(10-$PFE+1)+(10-$PFG+1)+$PFH+$PFI+$PFQ1+(10-$PFQ3+1))/7),2);?>
                                          <?php if ($Hasil2<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil2<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil2<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil2<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil2>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Initiative</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil3 = round((($PFQ4+$PFQ2+$PFO+$PFE)/4),2) ;?>
                                          <?php if ($Hasil3<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil3<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil3<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil3<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil3>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"> <?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Manage Emotion</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil4 = round((($PFC+(10-$PFF+1)+(10-$PFI+1)+$PFQ4)/4),2) ; ?>
                                          <?php if ($Hasil4<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil4<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil4<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil4<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil4>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Self-Confidence</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil5 = round((($PFH+(10-$PFN+1)+(10-$PFO+1)+$PFQ2)/4),2) ;?>
                                          <?php if ($Hasil5 <= 2 ) {
                                            $HasilNew = 1;
                                          } else if ($Hasil5 <= 4 ) {
                                            $HasilNew = 2;
                                          } else if ($Hasil5 <= 6 ) {
                                            $HasilNew = 3;
                                          } else if ($Hasil5 <= 8 ) {
                                            $HasilNew = 4;
                                          } else if ($Hasil5 >= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                      </table>
                                    </td>
                                  
                                    <td>
                                    High-Order Factor 2
                                      <table class="table table-bordered table-sm" style="text-align: center;">
                                        <tr>
                                          <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                          <td colspan="9">Parameter</td>
                                        </tr>
                                        <tr>
                                          <th style="min-width:30px;">1</th>
                                          <th style="min-width:30px;">2</th>
                                          <th style="min-width:30px;">3</th>
                                          <th style="min-width:30px;">4</th>
                                          <th style="min-width:30px;">5</th>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Responsibility</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil6Array = array($PFB,$PFE,$PFG,(11-$PFI),(11-$PFO),$PFQ1,$PFQ2,$PFQ3);  $Hasil6 = round((array_sum($Hasil6Array) / count($Hasil6Array)), 2);?>
                                          <?php if ($Hasil6<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil6<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil6<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil6<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil6>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew ?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Relationship</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil7Array = array($PFA,$PFC,(11-$PFE),$PFF,$PFH,$PFI,(11-$PFL),$PFN);  $Hasil7 = round((array_sum($Hasil7Array) / count($Hasil7Array)), 2);?>
                                          <?php if ($Hasil7<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil7<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil7<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil7<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil7>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        <tr>
                                          <td style="vertical-align: middle;">Personal</td>
                                          <td style="min-width:30px; vertical-align: middle;">:</td>
                                          <?php $Hasil8Array = array($PFC,$PFG,$PFQ1,$PFQ2,(11-$PFQ4));  $Hasil8 = round((array_sum($Hasil8Array) / count($Hasil8Array)), 2);?>
                                          <?php if ($Hasil8<=2) {
                                            $HasilNew = 1;
                                          } else if ($Hasil8<=4) {
                                            $HasilNew = 2;
                                          } else if ($Hasil8<=6) {
                                            $HasilNew = 3;
                                          } else if ($Hasil8<=8) {
                                            $HasilNew = 4;
                                          } else if ($Hasil8>= "8.1") {
                                            $HasilNew = 5;
                                          }
                                          
                                          ?>
                                          <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                          <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                        </tr>
                                        
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          
                        <?php } else if($val->id_soal == '16458aca066cd2') { ?>
                          <!-- DiSC -->
                          <?php
                          $DataDisc = $control->cekRowDisc($val->id_soal, $Kandidat->IdKandidat); 
                          ?>
                          <div class="table-responsive">
                            <style>
                              .column {
                                display: flex;
                                justify-content: center;
                              }

                              .center-input {
                                text-align: center;
                              }
                            </style>
                            <table class='table table-bordered'>
                            <tr>
                              <td></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>D</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>I</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>S</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>C</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>X</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>Total <?=$Kandidat->StatusDisc?></td>
                            </tr>  
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>MOST</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->D?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->I?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->S?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->C?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Plus']->X?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $hasilSum  = $DataDisc['Plus']->D+$DataDisc['Plus']->I+$DataDisc['Plus']->S+$DataDisc['Plus']->C+$DataDisc['Plus']->X; echo $hasilSum;?></td>
                            </tr>
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>LEAST</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->D?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->I?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->S?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->C?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$DataDisc['Minus']->X?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $hasilSum  = $DataDisc['Minus']->D+$DataDisc['Minus']->I+$DataDisc['Minus']->S+$DataDisc['Minus']->C+$DataDisc['Minus']->X; echo $hasilSum;?></td>
                            </tr>
                            <tr>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'>CHANGE</td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xD = $DataDisc['Plus']->D-$DataDisc['Minus']->D; echo $xD; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xI = $DataDisc['Plus']->I-$DataDisc['Minus']->I; echo $xI; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xS = $DataDisc['Plus']->S-$DataDisc['Minus']->S; echo $xS; ?></td>
                              <td style='text-align: center; font-size: 27px; font-weight:bold;'><?php $xC = $DataDisc['Plus']->C-$DataDisc['Minus']->C; echo $xC; ?></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <?php 
                            if ($Kandidat->StatusDisc == 1) { ?>
                            <tr>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'>Hasil</td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->D?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->I?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->S?></td>
                                <td style='text-align: center; font-size: 27px; font-weight:bold;'><?=$Kandidat->C?></td>
                                <td></td>
                                <td></td>
                              </tr>
                            

                            <?php                              
                            }else{
                              ?>
                              
                              <tr>
                                <td></td>
                                <td>
                                  <div class="column">
                                    <input id="D_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="I_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="S_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                <td>
                                  <div class="column">
                                    <input id="C_Nilai" type="text" class="center-input form-control" style="width: 80px;">
                                  </div>  
                                </td>
                                
                                <td style="width: 80px;"> 
                                
                                  <input type="hidden" name="IdKandidatDisc" id="IdKandidatDisc" value="<?=$Kandidat->IdKandidat?>">
                                  <input type="hidden" name="id_soalDISC" id="id_soalDISC" value="<?=$val->id_soalt?>">
                                </td>
                                <td><div class="column"><button class="btn btn-success btn-sm" type="button" onclick="SimpanDisc()">Simpan DISC</button></div></td>

                              </tr>

                              <script>
                                function SimpanDisc() {
                                  var D_Nilai = document.getElementById('D_Nilai').value
                                  var I_Nilai = document.getElementById('I_Nilai').value
                                  var S_Nilai = document.getElementById('S_Nilai').value
                                  var C_Nilai = document.getElementById('C_Nilai').value
                                  var IdKandidatDisc = document.getElementById('IdKandidatDisc').value
                                  var id_soalDISC = document.getElementById('id_soalDISC').value

                                  const url = "<?=base_url()?>Transaksi/DetailKandidat/SimpanDISC";
                                  const datadisc = {
                                    D_Nilai : D_Nilai,
                                    I_Nilai : I_Nilai,
                                    S_Nilai : S_Nilai,
                                    C_Nilai : C_Nilai,
                                    IdKandidatDisc : IdKandidatDisc,
                                    id_soalDISC : id_soalDISC
                                  }
                                  fetch(url, {
                                    method : "POST",
                                    body : JSON.stringify(datadisc),
                                    headers : {
                                      "Content-Type" : "application/json; charset=UTF-8"
                                    }

                                  })
                                  .then((response) => response.json())
                                  .then((data) => {
                                    console.log(data)
                                    if (data.ValReturn == true) {
                                      location.reload()
                                    }else{

                                    }
                                  })
                                }
                              </script>
                            <?php }
                            ?>
                            
                            
                            </table>
                          </div>
                          <!-- Start Papikostik -->
                        <?php } else if ($val->id_soal == '1645c3f3f1e27b') { ?>
                          <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { 
                            
                            $Z = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'Z')->TotalScore;
                            $E = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'E')->TotalScore;
                            $K = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'K')->TotalScore;
                            $T = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'T')->TotalScore;
                            $V = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'V')->TotalScore;
                            $R = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'R')->TotalScore;
                            $D = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'D')->TotalScore;
                            $C = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'C')->TotalScore;
                            $N = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'N')->TotalScore;
                            $G = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'G')->TotalScore;
                            $A = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'A')->TotalScore;
                            $F = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'F')->TotalScore;
                            $W = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'W')->TotalScore;
                            $X = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'X')->TotalScore;
                            $S = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'S')->TotalScore;
                            $B = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'B')->TotalScore;
                            $O = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'O')->TotalScore;
                            $L = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'L')->TotalScore;
                            $P = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'P')->TotalScore;
                            $I = $control->Datapapi($val->id_soal, $Kandidat->IdKandidat, $ValSub->Id_subsoal, 'I')->TotalScore;
                            ?>
                          <button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button>
                          <br>
                          <br>
                          <table class="table-bordered table-sm">
                            <tr>
                              <td style="text-align: center; width: 60px"><?=$Z?></td>
                              <td style="text-align: center; width: 60px"><?=$E?></td>
                              <td style="text-align: center; width: 60px"><?=$K?></td>
                              <td style="text-align: center; width: 60px"><?=$T?></td>
                              <td style="text-align: center; width: 60px"><?=$V?></td>
                              <td style="text-align: center; width: 60px"><?=$R?></td>
                              <td style="text-align: center; width: 60px"><?=$D?></td>
                              <td style="text-align: center; width: 60px"><?=$C?></td>
                              <td style="text-align: center; width: 60px"><?=$N?></td>
                              <td style="text-align: center; width: 60px"><?=$G?></td>
                              <td style="text-align: center; width: 60px"><?=$A?></td>
                              <td style="text-align: center; width: 60px"><?=$F?></td>
                              <td style="text-align: center; width: 60px"><?=$W?></td>
                              <td style="text-align: center; width: 60px"><?=$X?></td>
                              <td style="text-align: center; width: 60px"><?=$S?></td>
                              <td style="text-align: center; width: 60px"><?=$B?></td>
                              <td style="text-align: center; width: 60px"><?=$O?></td>
                              <td style="text-align: center; width: 60px"><?=$L?></td>
                              <td style="text-align: center; width: 60px"><?=$P?></td>
                              <td style="text-align: center; width: 60px"><?=$I?></td>
                            </tr>
                            <tr>
                              <td style="text-align: center;">Z</td>
                              <td style="text-align: center;">E</td>
                              <td style="text-align: center;">K</td>
                              <td style="text-align: center;">T</td>
                              <td style="text-align: center;">V</td>
                              <td style="text-align: center;">R</td>
                              <td style="text-align: center;">D</td>
                              <td style="text-align: center;">C</td>
                              <td style="text-align: center;">N</td>
                              <td style="text-align: center;">G</td>
                              <td style="text-align: center;">A</td>
                              <td style="text-align: center;">F</td>
                              <td style="text-align: center;">W</td>
                              <td style="text-align: center;">X</td>
                              <td style="text-align: center;">S</td>
                              <td style="text-align: center;">B</td>
                              <td style="text-align: center;">O</td>
                              <td style="text-align: center;">L</td>
                              <td style="text-align: center;">P</td>
                              <td style="text-align: center;">I</td>
                            </tr>
                            <tr>
                              <td colspan="3" style="text-align: center;">SIFAT</td>
                              <td colspan="2" style="text-align: center;">AKTIVITAS</td>
                              <td colspan="3" style="text-align: center;">CARA KERJA</td>
                              <td colspan="3" style="text-align: center;">ARAH KERJA</td>
                              <td colspan="2" style="text-align: center;">KETAATAN</td>
                              <td colspan="4" style="text-align: center;">INTERAKSI DENGAN REKAN KERJA</td>
                              <td colspan="3" style="text-align: center;">KEPEMIMPINAN</td>
                              
                            </tr>
                           
                           
                          </table>
                          <?php } ?>
                        <?php }else if ($val->id_soal == '1646489396c670') { ?>
                          <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                            <table class="table table-bordered table-sm">
                            <tr>
                              <td style="text-align: center;">A</td>
                              <td style="text-align: center;"><?php $A1 = $control->GetDataMSDT("A","1", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A1 ?></td></td>
                              <td style="text-align: center;"><?php $A2 = $control->GetDataMSDT("A","2", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A2 ?></td></td>
                              <td style="text-align: center;"><?php $A3 = $control->GetDataMSDT("A","3", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A3 ?></td></td>
                              <td style="text-align: center;"><?php $A4 = $control->GetDataMSDT("A","4", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A4 ?></td></td>
                              <td style="text-align: center;"><?php $A5 = $control->GetDataMSDT("A","5", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A5 ?></td></td>
                              <td style="text-align: center;"><?php $A6 = $control->GetDataMSDT("A","6", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A6 ?></td></td>
                              <td style="text-align: center;"><?php $A7 = $control->GetDataMSDT("A","7", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A7 ?></td></td>
                              <td style="text-align: center;"><?php $A8 = $control->GetDataMSDT("A","8", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A8 ?></td></td>
                              
                            </tr>
                            <tr>
                              <td style="text-align: center;">B</td>
                              <td style="text-align: center;"><?php $B1 = $control->GetDataMSDT("B","1", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B1 ?></td></td>
                              <td style="text-align: center;"><?php $B2 = $control->GetDataMSDT("B","2", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B2 ?></td></td>
                              <td style="text-align: center;"><?php $B3 = $control->GetDataMSDT("B","3", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B3 ?></td></td>
                              <td style="text-align: center;"><?php $B4 = $control->GetDataMSDT("B","4", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B4 ?></td></td>
                              <td style="text-align: center;"><?php $B5 = $control->GetDataMSDT("B","5", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B5 ?></td></td>
                              <td style="text-align: center;"><?php $B6 = $control->GetDataMSDT("B","6", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B6 ?></td></td>
                              <td style="text-align: center;"><?php $B7 = $control->GetDataMSDT("B","7", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B7 ?></td></td>
                              <td style="text-align: center;"><?php $B8 = $control->GetDataMSDT("B","8", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B8 ?></td></td>

                            </tr>
                            <tr>
                              <td style="text-align: center;">Koreksi</td>
                              <td style="text-align: center;">+1</td>
                              <td style="text-align: center;">+2</td>
                              <td style="text-align: center;">+1</td>
                              <td style="text-align: center;">0</td>
                              <td style="text-align: center;">+3</td>
                              <td style="text-align: center;">-1</td>
                              <td style="text-align: center;">0</td>
                              <td style="text-align: center;">-4</td>
                            </tr>
                            <tr>
                              <td style="text-align: center;">Jumlah</td>
                              <td style="text-align: center;"><?php $A_jml = ($A1+$B1) + (1); echo $A_jml; ?></td>
                              <td style="text-align: center;"><?php $B_jml = ($A2+$B2) + (2); echo $B_jml; ?></td>
                              <td style="text-align: center;"><?php $C_jml = ($A3+$B3) + (1); echo $C_jml; ?></td>
                              <td style="text-align: center;"><?php $D_jml = ($A4+$B4) + (0); echo $D_jml; ?></td>
                              <td style="text-align: center;"><?php $E_jml = ($A5+$B5) + (3); echo $E_jml; ?></td>
                              <td style="text-align: center;"><?php $F_jml = ($A6+$B6) + (-1); echo $F_jml; ?></td>
                              <td style="text-align: center;"><?php $G_jml = ($A7+$B7) + (0); echo $G_jml; ?></td>
                              <td style="text-align: center;"><?php $H_jml = ($A8+$B8) + (-4); echo $H_jml; ?></td>
                            </tr>
                            <tr>
                              <td colspan="9" style="height: 70px; border-bottom: 0px;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Ds ----- A</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$A_jml?></td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Mi ----- B</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$B_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Au ----- C</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$C_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Co ----- D</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$D_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black; "><?=$D_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Bu ----- E</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$E_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Dv ----- F</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$F_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$F_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">Ba ----- G</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$G_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$G_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;">E ----- H</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                              <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;"></td>
                              <td style="text-align: center; border: 0px; font-weight: bold;" >RS</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$C_jml + $D_jml + $G_jml + $H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$B_jml + $D_jml + $F_jml + $H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$E_jml + $F_jml + $G_jml + $H_jml?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$A_jml?></td>
                            </tr>
                            <tr>
                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;"></td>
                              <td style="text-align: center; border: 0px; font-weight: bold;" >WS</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $To_WS = CekConvertMDST($C_jml + $D_jml + $G_jml + $H_jml); echo $To_WS;?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $Ro_WS = CekConvertMDST($B_jml + $D_jml + $F_jml + $H_jml); echo $Ro_WS;?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $E_WS = CekConvertMDST($E_jml + $F_jml + $G_jml + $H_jml); echo $E_WS;?></td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?= CekConvertMDST($A_jml)?></td>
                            </tr>
                            <tr>
                              

                              <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                            </tr>
                            <tr>
                              <td style="text-align: center; border: 0px;"></td>
                              <td style="text-align: center; border: 0px; font-weight: bold;" ></td>
                              <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">TO</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">RO</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">E</td>
                              <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                              <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;"></td>
                            </tr>
                            <tr>
                              <td colspan="9" style="border-top: 0px; height: 20px"></td>
                            </tr>
                            
                          </table>
                           
                           <?php } ?>
                          
                         <?php } else { ?>
                          <table class="table table-bordered table-sm">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Nama Sub Soal</td>
                                <td>Cek Jawaban</td>
                                <td>Score</td>
                              </tr>
                            </thead>
                          <tbody>
                            
                          <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                            
                                <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                                <?php }else{ ?>
                                <tr>
                                  <td><?=$no2++?></td>
                                  <td><?=$ValSub->nama_subsoal?></td>
                                  <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                                  <td>
                                  <?php 
                                      echo $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                                    ?></td>
                                </tr>
                                <?php 
                                    
                                      $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                                }
                                ?>
                            <?php } ?>
                          </tbody>
                          <tfoot>
                            
                            <tr>
                              <td colspan="3" style="text-align: right;">Total Hasil</td>
                              <td><?=array_sum($dataCount[$val->id_soal])?></td>
                            </tr>
                            <?php if ($val->id_soal == '16377320946db8') {
                              
                            } else { ?>
                            <tr>
                              <td colspan="2" style="text-align: right;">Hasil IQ</td>
                              <td><?=$control->CekHasilConvert($val->id_soal, array_sum($dataCount[$val->id_soal]))?></td>
                            </tr>
                            <?php } ?>
                            
                          </tfoot>
                          </table>
                        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                    
                    <?php } ?>

                </table>
                
              </div>
            </div>
            <div class="card-footer no-printme" >
            <input type="hidden" name="IdKandidat" id="" value="<?=$Kandidat->IdKandidat?>">
            <table class="table table-bordered table-sm">
                    <tr>
                      <td style="text-align: center;">No</td>
                      <td style="text-align: center;">Aspek</td>
                      <td style="text-align: center;">Klasifikasi</td>
                      <td style="text-align: center;">Deskripsi</td>
                      <td style="text-align: center;">Saran Pengembangan</td>
                    </tr>
                    <tr>
                      <td>0</td>
                      <td style="text-align: center;">Kecerdasan Umum</td>
                      <td style="text-align: center;"><?php 
                      $total_cfit = floor($control->CekHasilConvert('1636c7fa9ed4ff', array_sum($dataCount['1636c7fa9ed4ff'])));
                        if ($total_cfit >= 130) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($total_cfit >= 120 && $total_cfit <= 129){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($total_cfit >= 90 && $total_cfit <= 119){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($total_cfit >= 80 && $total_cfit <= 89){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($total_cfit <= 79){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kecerdasan Umum')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kecerdasan Umum')->Saran?></td>
                    </tr>
                    <?php 
                    
                    ?>
                    <tr>
                      <td>1</td>
                      <td style="text-align: center;">Kepercayaan Diri</td>
                      <td style="text-align: center;"><?php
                      $KepercayaanDiri = $S + $Kandidat->D;
                        if ($KepercayaanDiri >= 8 && $KepercayaanDiri <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KepercayaanDiri >= 6 && $KepercayaanDiri <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KepercayaanDiri >= 4 && $KepercayaanDiri <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KepercayaanDiri >= 2 && $KepercayaanDiri <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KepercayaanDiri >= 0 && $KepercayaanDiri <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepercayaan Diri')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepercayaan Diri')->Saran?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td style="text-align: center;">Hubungan Interpersonal</td>
                      <td style="text-align: center;"><?php 
                      $HubunganInterpersonal = floor((($S + $O + $B) / 3) + $Kandidat->I);
                        if ($HubunganInterpersonal >= 8 && $HubunganInterpersonal <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($HubunganInterpersonal >= 6 && $HubunganInterpersonal <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($HubunganInterpersonal >= 4 && $HubunganInterpersonal <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($HubunganInterpersonal >= 2 && $HubunganInterpersonal <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($HubunganInterpersonal >= 0 && $HubunganInterpersonal <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hubungan Interpersonal')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hubungan Interpersonal')->Saran?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td style="text-align: center;">Kematangan Emosi</td>
                      <td style="text-align: center;"><?php 
                      $KematanganEmosi = floor(($E + $K) / 2);
                        if ($KematanganEmosi == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KematanganEmosi >= 6 && $KematanganEmosi <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KematanganEmosi >= 4 && $KematanganEmosi <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KematanganEmosi >= 2 && $KematanganEmosi <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KematanganEmosi >= 0 && $KematanganEmosi <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kematangan Emosi')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kematangan Emosi')->Saran?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td style="text-align: center;">Motivasi Kerja</td>
                      <td style="text-align: center;"><?php 
                      $MotivasiKerja = floor(($G + $N) / 2);
                        if ($MotivasiKerja == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($MotivasiKerja >= 6 && $MotivasiKerja <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($MotivasiKerja >= 4 && $MotivasiKerja <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($MotivasiKerja >= 2 && $MotivasiKerja <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($MotivasiKerja >= 0 && $MotivasiKerja <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Motivasi Kerja')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Motivasi Kerja')->Saran?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td style="text-align: center;">Hasrat Berprestasi</td>
                      <td style="text-align: center;"><?php 
                      $HasratBerprestasi = floor($A);
                        if ($HasratBerprestasi == 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($HasratBerprestasi >= 6 && $HasratBerprestasi <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($HasratBerprestasi >= 4 && $HasratBerprestasi <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($HasratBerprestasi >= 2 && $HasratBerprestasi <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($HasratBerprestasi >= 0 && $HasratBerprestasi <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hasrat Berprestasi')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Hasrat Berprestasi')->Saran?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td style="text-align: center;">Kemandirian</td>
                      <td style="text-align: center;">
                      <?php
                     
                      $Kemandirian = floor((revass($W) + $N) / 2);
                        if ($Kemandirian >= 8 && $Kemandirian <= 9) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($Kemandirian >= 6 && $Kemandirian <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($Kemandirian >= 4 && $Kemandirian <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($Kemandirian >= 2 && $Kemandirian <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($Kemandirian >= 0 && $Kemandirian <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kemandirian')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kemandirian')->Saran?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td style="text-align: center;">Kepatuhan Terhadap Aturan</td>
                      <td style="text-align: center;">
                      <?php
                     
                      $KepatuhanAturan = floor(($F + $W) / 2) + $Kandidat->C;
                        if ($KepatuhanAturan >= 8 && $KepatuhanAturan <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($KepatuhanAturan >= 6 && $KepatuhanAturan <= 7){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($KepatuhanAturan >= 4 && $KepatuhanAturan <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($KepatuhanAturan >= 2 && $KepatuhanAturan <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($KepatuhanAturan >= 0 && $KepatuhanAturan <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepatuhan Terhadap Aturan')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepatuhan Terhadap Aturan')->Saran?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td style="text-align: center;">Kepemimpinan</td>
                      <td style="text-align: center;">
                      <?php
                     $CekPemimpin = CekConvertPemimpin($To_WS, $Ro_WS, $E_WS);
                     if ($CekPemimpin == 'Bureaucrat' || $CekPemimpin == 'Benevolent Autocrat' || $CekPemimpin == 'Developer') {
                      $HasilPemimpin = 1;
                     }else if ($CekPemimpin == 'Executive'){
                      $HasilPemimpin = 2;
                     }else{
                      $HasilPemimpin = 0;
                     }
                      $Kepemimpinan = floor($L) + $$HasilPemimpin;

                        if ($Kepemimpinan >= 10 && $Kepemimpinan <= 12) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($Kepemimpinan >= 7 && $Kepemimpinan <= 9){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($Kepemimpinan >= 4 && $Kepemimpinan <= 6){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($Kepemimpinan >= 2 && $Kepemimpinan <= 3){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($Kepemimpinan >= 0 && $Kepemimpinan <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepemimpinan')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Kepemimpinan')->Saran?></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td style="text-align: center;">Pengambilan Keputusan</td>
                      <td style="text-align: center;">
                      <?php
                     $CekPemimpin = CekConvertPemimpin($To_WS, $Ro_WS, $E_WS);

                    if ($CekPemimpin == 'Executive'){
                      $HasilPemimpin = 1;
                     }else{
                      $HasilPemimpin = 0;
                     }
                      $PengambilKeputusan = floor($I) + $$HasilPemimpin;

                        if ($PengambilKeputusan >= 9 && $PengambilKeputusan <= 10) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($PengambilKeputusan >= 6 && $PengambilKeputusan <= 8){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($PengambilKeputusan >= 3 && $PengambilKeputusan <= 5){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($PengambilKeputusan == 2){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($PengambilKeputusan >= 0 && $PengambilKeputusan <= 1){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Pengambilan Keputusan')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Pengambilan Keputusan')->Saran?></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td style="text-align: center;">Pengembangan Bawahan</td>
                      <td style="text-align: center;">
                      <?php
                    
                      if ($Ro_WS > 2.4) {
                        $HasilMDST = 1;
                      }else if ($Ro_WS < 0.6){
                        $HasilMDST = -1;
                      }else{
                        $HasilMDST = 0;
                      }

                      if ($P >= 0 && $P <= 4) {
                        $PapiP = 1;
                      }else if ($P >= 5 && $P <= 9){
                        $PapiP = 3;
                      }else {
                        $PapiP = 0;
                      }

                      $HubunganInterpersonal = floor((($S + $O + $B) / 3) + $Kandidat->I);
                        if ($HubunganInterpersonal >= 8 && $HubunganInterpersonal <= 10) {
                          $StatusInterpersonal = 'Tinggi';
                        }else if($HubunganInterpersonal >= 6 && $HubunganInterpersonal <= 7){
                          $StatusInterpersonal = 'Baik';
                        }else if($HubunganInterpersonal >= 4 && $HubunganInterpersonal <= 5){
                          $StatusInterpersonal = 'Cukup';
                        }else if($HubunganInterpersonal >= 2 && $HubunganInterpersonal <= 3){
                          $StatusInterpersonal = 'Kurang';
                        }else if($HubunganInterpersonal >= 0 && $HubunganInterpersonal <= 1){
                          $StatusInterpersonal = 'Rendah';
                        }
                        if ($StatusInterpersonal == 'Baik' || $StatusInterpersonal == 'Tinggi') {
                          $HasilInterpersonal = 1;
                        }else{
                          $HasilInterpersonal = 0;
                        }



                      $PengembanganBawahan = floor($HasilMDST + $PapiP + $HasilInterpersonal);

                        if ($PengembanganBawahan == 5) {
                          $StatusKecerdasan = 'Tinggi';
                          echo "Tinggi";
                        }else if($PengembanganBawahan == 4){
                          $StatusKecerdasan = 'Baik';
                          echo "Baik";
                        }else if($PengembanganBawahan >= 2 && $PengembanganBawahan <= 3){
                          $StatusKecerdasan = 'Cukup';
                          echo "Cukup";
                        }else if($PengembanganBawahan == 1){
                          $StatusKecerdasan = 'Kurang';
                          echo "Kurang";
                        }else if($PengembanganBawahan == 0){
                          $StatusKecerdasan = 'Rendah';
                          echo "Rendah";
                        }
                        
                      ?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Pengembangan Bawahan')->Deskripsi?></td>
                      <td><?=$control->GetAspek($StatusKecerdasan, 'Pengembangan Bawahan')->Saran?></td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td style="text-align: center;">Kepemimpinan</td>
                      <td style="text-align: center;"><?= $CekPemimpin ?></td>
                      <td><?=$control->GetAspek($CekPemimpin, 'KepemimpinanMSDT')->Deskripsi?></td>
                      <td><?=$control->GetAspek($CekPemimpin, 'KepemimpinanMSDT')->Saran?></td>
                    </tr>
                  </table>
              <?php if ($Kandidat->StatusKoreksi != '1' && ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "4" || $this->session->userdata('id_level') == "5" || $this->session->userdata('id_level') == "6") ) {?>
                <?php if ($Kandidat->IdPaket == '1646f26078b855') { ?>
                  
                
                <?php }else{ ?>
                  <button class="btn btn-sm btn-success" type="button" onclick="Confirm()" id="CekPertama">Isi Form Hasil Penilaian</button>
                <?php } ?>
                  
              <?php } ?>
            </div>
          </div>
          
    <?php } else { ?>
        <div class="card">
          <div class="card-body printme" >
          <div class="table">
              <table class="table table-bordered table-sm">
                
                  <?php $no = 1;  foreach ($control->DataSoal($Kandidat->IdKandidat) as $val) { ?>
                <thead>
                  <tr>
                    <td style="background-color: #99f79e;">Buku Soal </td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?=$val->nama_soal?></td>
                  </tr>
                  
                  <tr>
                    <td colspan="2">
                      <?php if ($val->id_soal == '163773219a9094') { ?>
                        <table class="table table-bordered table-sm">
                        
                          <tr>
                            <td style="width: 60%;">
                            <div class="card">
                              <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                </div>
                              </div>
                              <div class="card-body">

                                <div class="position-relative mb-4">
                                  <canvas id="cfit_chart" height="350"></canvas>
                                </div>

                              </div>
                            </div>
                          </td>
                          <td style="width: 30%;">
                            <table class="table">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Faktor</td>
                                <td>Cek Jawaban</td>
                                <td>Raw</td>
                                <td>Std</td>
                              </tr>
                          </thead>
                        <tbody>
                              <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                          
                          <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                          <?php }else{ ?>
                          <tr>
                            <td><?=$no2++?></td>
                            <td><?=$ValSub->nama_subsoal?> </td>
                            <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                            <td>
                                <?= $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat); ?>
                                <?php $DataSub[$val->id_soal]['RAW'][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);?>
                            </td>
                              <td>
                                <?php if ($ValSub->Id_subsoal == '1637d96c15ef48') {
                                  $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);

                                  echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                } else {
                                  $DataSub[$val->id_soal]['STD'][] = $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                  echo $control->CheckConvertDetailIST($control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat), $ValSub->nama_subsoal, $Kandidat->IdKandidat);
                                }
                                ?>
                              </td>
                          </tr>
                          <?php 
                                $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                          }
                          ?>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      
                      <tr>
                        <td colspan="3" style="text-align: right;">Total Hasil</td>
                        <td><?=array_sum($dataCount[$val->id_soal])?></td>
                        <td><?=$control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat);?></td>
                      </tr>
                      <tr>
                        <td colspan="3" style="text-align: right;">Hasil IQ</td>
                        <td><?=$control->CheckConvertDetailIST( $control->CheckConvertDetailIST(array_sum($dataCount[$val->id_soal]), 'Gesamt', $Kandidat->IdKandidat), 'IQ', $Kandidat->IdKandidat);?></td>
                        <td></td>
                      </tr>
                    </tfoot>
                              </table>
                            </td>
                          </tr>

                        </table>
                        <script>
            /* global Chart:false */
            $(function () {
              'use strict'
              var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
              }
              var mode = 'index'
              var intersect = true
              var $visitorsChart = $('#cfit_chart')
              // eslint-disable-next-line no-unused-vars
              var visitorsChart = new Chart($visitorsChart, {
                data: {
                  labels: ['SE', 'WA', 'AN', 'GE', 'ME', 'RA', 'ZR', 'FA', 'WU'],
                  datasets: [
                    {
                      type: 'line',
                      label: 'STD',
                      data: [<?=$DataSub['163773219a9094']['STD'][0] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][0]; ?>, <?=$DataSub['163773219a9094']['STD'][1] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][1]; ?>, <?=$DataSub['163773219a9094']['STD'][2] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][2]; ?>, <?=$DataSub['163773219a9094']['STD'][3] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][3]; ?>, <?=$DataSub['163773219a9094']['STD'][8] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][8]; ?>, <?=$DataSub['163773219a9094']['STD'][4] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][4]; ?>, <?=$DataSub['163773219a9094']['STD'][5] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][5]; ?>, <?=$DataSub['163773219a9094']['STD'][6] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][6]; ?>, <?=$DataSub['163773219a9094']['STD'][7] == 'Data Skoring Tidak Ditemukan' ? 0 : $DataSub['163773219a9094']['STD'][7]; ?>],
                      backgroundColor: 'tansparent',
                      borderColor: '#57c7ff',
                      pointBorderColor: '#ced4da',
                      pointBackgroundColor: '#0c6ff0',
                      fill: false,
                      lineTension: 0
                      // pointHoverBackgroundColor: '#ced4da',
                      // pointHoverBorderColor    : '#ced4da'
                    }]
                  },
                  options: {
                    radius: 0,
                    maintainAspectRatio: false,
                    tooltips: {
                      mode: mode,
                      intersect: intersect
                    },
                    hover: {
                      mode: mode,
                      intersect: intersect
                    },
                    legend: {
                      display: false
                    },
                    scales: {
                      yAxes: [{
                        // display: false,
                        gridLines: {
                          display: true,
                          // lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                          beginAtZero: false,
                          stepSize: 10
                          // suggestedMax: 200
                        }, ticksStyle)
                      }],
                      xAxes: [{
                        display: true,
                        gridLines: {
                          display: true
                        },
                        ticks: ticksStyle
                      }]
                    }
                  }
                })
              })
            </script>
                      <?php } else if ($val->id_soal == '1637732266d332') { ?>
                        <table class="table">
                          <tr>
                            <td align="center">
                            <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValS) { ?>
                              <button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValS->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button>
                        <style>
                          .slider {
                            -webkit-appearance: none;
                            width: 100%;
                            height: 15px;
                            border-radius: 5px;  
                            background: #d3d3d3;
                            outline: none;
                            opacity: 0.7;
                            -webkit-transition: .2s;
                            transition: opacity .2s;
                          }

                          .slider::-webkit-slider-thumb {
                            -webkit-appearance: none;
                            appearance: none;
                            width: 25px;
                            height: 25px;
                            border-radius: 50%; 
                            background: #02db11;
                            cursor: pointer;
                          }

                          .slider::-moz-range-thumb {
                            width: 25px;
                            height: 25px;
                            border-radius: 50%;
                            background: #04AA6D;
                            cursor: pointer;
                          }
                        </style>
                        <table class="table table-bordered table-sm" style=" text-align:center;">
                          <thead>
                            <tr>
                              <th colspan="2">Kode</th>
                              <th>Hasil</th>
                              <th style="text-align:right;white-space:nowrap;"><------</th>
                              <th style="min-width:30px;">1</th>
                              <th style="min-width:30px;">2</th>
                              <th style="min-width:30px;">3</th>
                              <th style="min-width:30px;">4</th>
                              <th style="min-width:30px;">5</th>
                              <th style="min-width:30px;">6</th>
                              <th style="min-width:30px;">7</th>
                              <th style="min-width:30px;">8</th>
                              <th style="min-width:30px;">9</th>
                              <th style="text-align:left;white-space:nowrap;">------></th>  
                            </tr>
                          </thead>
                          <tbody class="text-sm" >
                            <tr>
                              <td></td>
                              <td>MD</td>
                              <td><?=$control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'MD')?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap; vertical-align: middle;">Warmth</td>
                              <td style="vertical-align: middle;">A</td>
                              <td style="vertical-align: middle;"><?php $PFA = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'A'); echo $PFA;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Penyendiri, Pendiam </b><br> Terpisah, Jaga Jarak, Menyendiri</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFA;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Ramah</b><br> Peduli, Perhatian pada orang lain</td>
                            </tr>

                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Reasoning</td>
                              <td style="vertical-align: middle;">B</td>
                              <td style="vertical-align: middle;"><?php $PFB = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'B'); echo $PFB;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Penalaran Konkrit </b><br> Penalaran kurang</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFB;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Penalaran Abstrak</b><br> Penalaran Lebih, Cepat Belajar</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Emotional Stability</td>
                              <td style="vertical-align: middle;">C</td>
                              <td style="vertical-align: middle;"><?php $PFC = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'C'); echo $PFC;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Reaktif </b><br> Dipengaruhi perasaan, Mood Swing</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFC;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Emosi Stabil</b><br> Pengalaman Emosi Yang Stabil</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Dominance</td>
                              <td style="vertical-align: middle;">E</td>
                              <td style="vertical-align: middle;"><?php $PFE = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'E'); echo $PFE?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Penurut </b><br> Kooperatif, Menghindari Konflik, Submisif</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFE;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Dominan</b><br> Menuntut, Asertif, Kompetitif</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Liveliness</td>
                              <td style="vertical-align: middle;">F</td>
                              <td style="vertical-align: middle;"><?php $PFF = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'F'); echo $PFF?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Serius </b><br> Terkendali, Hati-hati, Muram</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFF;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Lively</b><br> Antusias, Spontan, Riang</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Rule Consciousness</td>
                              <td style="vertical-align: middle;">G</td>
                              <td style="vertical-align: middle;"><?php $PFG = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'G'); echo $PFG?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Kebijakan Situasional </b><br> Nonkonformis, Tidak Konvensional</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFG;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Sadar-Aturan</b><br> Berbakti, Konvensional</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Social Boldness</td>
                              <td style="vertical-align: middle;">H</td>
                              <td style="vertical-align: middle;"><?php $PFH = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'H'); echo $PFH?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Pemalu </b><br> Pemalu, Sensitif pada ancaman</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFH;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Tebal-sosial</b><br> Berani, Tebal-Kulit, Mencari Perhatian</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Sensitivity</td>
                              <td style="vertical-align: middle;">I</td>
                              <td style="vertical-align: middle;"><?php $PFI = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'I'); echo $PFI?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Utilitarian </b><br> Keras, Objektif, Tidak Sentimentil</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFI;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Sensitif</b><br> Estetis, Halus, Sentimentil</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Vigilance</td>
                              <td style="vertical-align: middle;">L</td>
                              <td style="vertical-align: middle;"><?php $PFL = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'L'); echo $PFL?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Percaya </b><br> Tidak Menaruh curiga, Menerima</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFL;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Waspada</b><br> Curiga, Skeptis, Waspada</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Abstractedness</td>
                              <td style="vertical-align: middle;">M</td>
                              <td style="vertical-align: middle;"><?php $PFM = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'M'); echo $PFM?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Membumi </b><br> Praktis, Turun-ke-bumi, Pragmatis</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFM;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Abstrak</b><br> Imajinatif, Orientasi Ide, Tidak Praktis</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Privateness</td>
                              <td style="vertical-align: middle;">N</td>
                              <td style="vertical-align: middle;"><?php $PFN = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'N'); echo $PFN?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Terus Terang </b><br> Naif, Mengungkap Diri, Asli, Polos</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFN;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Privasi</b><br> Rahasia, Tidak-Mengungkap</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Apprehension</td>
                              <td style="vertical-align: middle;">O</td>
                              <td style="vertical-align: middle;"><?php $PFO = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'O'); echo $PFO?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Yakin Diri </b><br> Tidak Khawatir, Puas Diri, Aman</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFO;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Kuatir</b><br> Peragu, Pencemas, Rawan Rasa Bersalah</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Openess To Change</td>
                              <td style="vertical-align: middle;">Q1</td>
                              <td style="vertical-align: middle;"><?php $PFQ1 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q1'); echo $PFQ1;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Tradisional </b><br> Lekat Pada Kebiasaan, Menolak Perubahan</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ1;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Terbuka Atas Perubahan</b><br> Bereksperimen</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Self Reliance</td>
                              <td style="vertical-align: middle;">Q2</td>
                              <td style="vertical-align: middle;"><?php $PFQ2 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q2'); echo $PFQ2;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Orientasi Kelompok </b><br> Afiliatif, Bergantung pada kelompok sosial</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ2;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Mandiri</b><br> Soliter, Individualis</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Perfectionism</td>
                              <td style="vertical-align: middle;">Q3</td>
                              <td style="vertical-align: middle;"><?php $PFQ3 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q3'); echo $PFQ3?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Toleran Kekacauan </b><br> Tidak Eksak, Fleksibel, Ceroboh</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ3;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Perfeksionis</b><br> Terorganisir, Tertib, Kompulsif</td>
                            </tr>
                            <tr>
                              <td style="text-align:right;white-space:nowrap;vertical-align: middle;">Tension</td>
                              <td style="vertical-align: middle;">Q4</td>
                              <td style="vertical-align: middle;"><?php $PFQ4 = $control->CheckPF($Kandidat->IdKandidat, $ValS->Id_subsoal, 'Q4'); echo $PFQ4;?></td>
                              <td style="text-align:right;white-space:nowrap;"><b>Santai </b><br> Tenang, Sabar</td>
                              <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="9" value="<?=$PFQ4;?>" id="customRange2" width="100%"></div> </td>
                              <td style="text-align:left;white-space:nowrap;"><b>Tegang</b><br> Energi Tinggi, Terdorong, Tempo Cepat</td>
                            </tr>
                          </tbody>
                        </table>
                        <?php } ?>
                            </td>
                        
                          </tr>
                          <tr>
                            <td>
                              <table class="table">
                                <tr>
                                  <td>
                                  High-Order Factor 1
                                    <table class="table table-bordered table-sm" style="text-align: center;">
                                      <tr>
                                        <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                        <td colspan="9">Parameter</td>
                                      </tr>
                                      <tr>
                                        <th style="min-width:30px;">1</th>
                                        <th style="min-width:30px;">2</th>
                                        <th style="min-width:30px;">3</th>
                                        <th style="min-width:30px;">4</th>
                                        <th style="min-width:30px;">5</th>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Interpersonal</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil1 = round((($PFA+(10-$PFE+1)+$PFF+$PFH+$PFI+(10-$PFL+1)+(10-$PFN+1)+$PFQ2)/8), 2) ; ?>
                                        <?php if ($Hasil1<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil1<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil1<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil1<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil1>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew;?></td>
                                        
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Adaptabilty</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil2 = round((($PFC+(10-$PFE+1)+(10-$PFG+1)+$PFH+$PFI+$PFQ1+(10-$PFQ3+1))/7),2);?>
                                        <?php if ($Hasil2<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil2<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil2<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil2<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil2>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Initiative</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil3 = round((($PFQ4+$PFQ2+$PFO+$PFE)/4),2) ;?>
                                        <?php if ($Hasil3<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil3<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil3<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil3<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil3>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"> <?= $HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Manage Emotion</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil4 = round((($PFC+(10-$PFF+1)+(10-$PFI+1)+$PFQ4)/4),2) ; ?>
                                        <?php if ($Hasil4<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil4<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil4<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil4<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil4>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Self-Confidence</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil5 = round((($PFH+(10-$PFN+1)+(10-$PFO+1)+$PFQ2)/4),2) ;?>
                                        <?php if ($Hasil5 <= 2 ) {
                                          $HasilNew = 1;
                                        } else if ($Hasil5 <= 4 ) {
                                          $HasilNew = 2;
                                        } else if ($Hasil5 <= 6 ) {
                                          $HasilNew = 3;
                                        } else if ($Hasil5 <= 8 ) {
                                          $HasilNew = 4;
                                        } else if ($Hasil5 >= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                    </table>
                                  </td>
                                
                                  <td>
                                  High-Order Factor 2
                                    <table class="table table-bordered table-sm" style="text-align: center;">
                                      <tr>
                                        <td colspan="3" rowspan="2" style="vertical-align: middle;">Data </td>
                                        <td colspan="9">Parameter</td>
                                      </tr>
                                      <tr>
                                        <th style="min-width:30px;">1</th>
                                        <th style="min-width:30px;">2</th>
                                        <th style="min-width:30px;">3</th>
                                        <th style="min-width:30px;">4</th>
                                        <th style="min-width:30px;">5</th>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Responsibility</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil6Array = array($PFB,$PFE,$PFG,(11-$PFI),(11-$PFO),$PFQ1,$PFQ2,$PFQ3);  $Hasil6 = round((array_sum($Hasil6Array) / count($Hasil6Array)), 2);?>
                                        <?php if ($Hasil6<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil6<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil6<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil6<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil6>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?= $HasilNew ?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Relationship</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil7Array = array($PFA,$PFC,(11-$PFE),$PFF,$PFH,$PFI,(11-$PFL),$PFN);  $Hasil7 = round((array_sum($Hasil7Array) / count($Hasil7Array)), 2);?>
                                        <?php if ($Hasil7<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil7<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil7<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil7<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil7>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      <tr>
                                        <td style="vertical-align: middle;">Personal</td>
                                        <td style="min-width:30px; vertical-align: middle;">:</td>
                                        <?php $Hasil8Array = array($PFC,$PFG,$PFQ1,$PFQ2,(11-$PFQ4));  $Hasil8 = round((array_sum($Hasil8Array) / count($Hasil8Array)), 2);?>
                                        <?php if ($Hasil8<=2) {
                                          $HasilNew = 1;
                                        } else if ($Hasil8<=4) {
                                          $HasilNew = 2;
                                        } else if ($Hasil8<=6) {
                                          $HasilNew = 3;
                                        } else if ($Hasil8<=8) {
                                          $HasilNew = 4;
                                        } else if ($Hasil8>= "8.1") {
                                          $HasilNew = 5;
                                        }
                                        
                                        ?>
                                        <td style="min-width:30px; vertical-align: middle;"><?=$HasilNew?></td>
                                        <td colspan="9" style="vertical-align: middle;"><div class="form-group"><input type="range" disabled class="slider" min="1" max="5" value="<?= $HasilNew;?>" id="customRange2" width="100%"></div> </td>
                                      </tr>
                                      
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        
                      <?php } else if ($val->id_soal == '1646489396c670') { ?>
                        <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                          <table class="table table-bordered table-sm">
                          <tr>
                            <td style="text-align: center;">A</td>
                            <td style="text-align: center;"><?php $A1 = $control->GetDataMSDT("A","1", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A1 ?></td></td>
                            <td style="text-align: center;"><?php $A2 = $control->GetDataMSDT("A","2", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A2 ?></td></td>
                            <td style="text-align: center;"><?php $A3 = $control->GetDataMSDT("A","3", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A3 ?></td></td>
                            <td style="text-align: center;"><?php $A4 = $control->GetDataMSDT("A","4", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A4 ?></td></td>
                            <td style="text-align: center;"><?php $A5 = $control->GetDataMSDT("A","5", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A5 ?></td></td>
                            <td style="text-align: center;"><?php $A6 = $control->GetDataMSDT("A","6", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A6 ?></td></td>
                            <td style="text-align: center;"><?php $A7 = $control->GetDataMSDT("A","7", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A7 ?></td></td>
                            <td style="text-align: center;"><?php $A8 = $control->GetDataMSDT("A","8", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $A8 ?></td></td>
                            
                          </tr>
                          <tr>
                            <td style="text-align: center;">B</td>
                            <td style="text-align: center;"><?php $B1 = $control->GetDataMSDT("B","1", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B1 ?></td></td>
                            <td style="text-align: center;"><?php $B2 = $control->GetDataMSDT("B","2", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B2 ?></td></td>
                            <td style="text-align: center;"><?php $B3 = $control->GetDataMSDT("B","3", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B3 ?></td></td>
                            <td style="text-align: center;"><?php $B4 = $control->GetDataMSDT("B","4", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B4 ?></td></td>
                            <td style="text-align: center;"><?php $B5 = $control->GetDataMSDT("B","5", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B5 ?></td></td>
                            <td style="text-align: center;"><?php $B6 = $control->GetDataMSDT("B","6", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B6 ?></td></td>
                            <td style="text-align: center;"><?php $B7 = $control->GetDataMSDT("B","7", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B7 ?></td></td>
                            <td style="text-align: center;"><?php $B8 = $control->GetDataMSDT("B","8", $Kandidat->IdKandidat, $val->id_soal, $ValSub->Id_subsoal); echo $B8 ?></td></td>

                          </tr>
                          <tr>
                            <td style="text-align: center;">Koreksi</td>
                            <td style="text-align: center;">+1</td>
                            <td style="text-align: center;">+2</td>
                            <td style="text-align: center;">+1</td>
                            <td style="text-align: center;">0</td>
                            <td style="text-align: center;">+3</td>
                            <td style="text-align: center;">-1</td>
                            <td style="text-align: center;">0</td>
                            <td style="text-align: center;">-4</td>
                          </tr>
                          <tr>
                            <td style="text-align: center;">Jumlah</td>
                            <td style="text-align: center;"><?php $A_jml = ($A1+$B1) + (1); echo $A_jml; ?></td>
                            <td style="text-align: center;"><?php $B_jml = ($A2+$B2) + (2); echo $B_jml; ?></td>
                            <td style="text-align: center;"><?php $C_jml = ($A3+$B3) + (1); echo $C_jml; ?></td>
                            <td style="text-align: center;"><?php $D_jml = ($A4+$B4) + (0); echo $D_jml; ?></td>
                            <td style="text-align: center;"><?php $E_jml = ($A5+$B5) + (3); echo $E_jml; ?></td>
                            <td style="text-align: center;"><?php $F_jml = ($A6+$B6) + (-1); echo $F_jml; ?></td>
                            <td style="text-align: center;"><?php $G_jml = ($A7+$B7) + (0); echo $G_jml; ?></td>
                            <td style="text-align: center;"><?php $H_jml = ($A8+$B8) + (-4); echo $H_jml; ?></td>
                          </tr>
                          <tr>
                            <td colspan="9" style="height: 70px; border-bottom: 0px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Ds ----- A</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$A_jml?></td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Mi ----- B</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px ; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$B_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Au ----- C</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$C_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Co ----- D</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$D_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black; "><?=$D_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Bu ----- E</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$E_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Dv ----- F</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$F_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$F_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">Ba ----- G</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$G_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$G_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;">E ----- H</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 2px solid black;"  >&nbsp;</td>
                            <td style="text-align: center; border-top: 2px solid black; border-right: 2px solid black; border-left: 2px solid black; border-bottom: 2px solid black;"><?=$H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;"></td>
                            <td style="text-align: center; border: 0px; font-weight: bold;" >RS</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$C_jml + $D_jml + $G_jml + $H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$B_jml + $D_jml + $F_jml + $H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$E_jml + $F_jml + $G_jml + $H_jml?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?=$A_jml?></td>
                          </tr>
                          <tr>
                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;"></td>
                            <td style="text-align: center; border: 0px; font-weight: bold;" >WS</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $To_WS = CekConvertMDST($C_jml + $D_jml + $G_jml + $H_jml); echo $To_WS;?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $Ro_WS = CekConvertMDST($B_jml + $D_jml + $F_jml + $H_jml); echo $Ro_WS;?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?php $E_WS = CekConvertMDST($E_jml + $F_jml + $G_jml + $H_jml); echo $E_WS;?></td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 5px solid black; border-right: 5px solid black; border-left: 5px solid black; border-bottom: 5px solid black;"><?= CekConvertMDST($A_jml)?></td>
                          </tr>
                          <tr>
                            

                            <td colspan="9" style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "></td>
                          </tr>
                          <tr>
                            <td style="text-align: center; border: 0px;"></td>
                            <td style="text-align: center; border: 0px; font-weight: bold;" ></td>
                            <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">TO</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">RO</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;">E</td>
                            <td style="text-align: center; border-top: 0px; border-right: 0px; border-left: 0px; border-bottom: 0px; "  >&nbsp;</td>
                            <td style="text-align: center; border-top: 0px solid black; border-right: 0px solid black; border-left: 0px solid black; border-bottom: 0px solid black;"></td>
                          </tr>
                          <tr>
                            <td colspan="9" style="border-top: 0px; height: 20px"></td>
                          </tr>
                          
                        </table>
                         
                         <?php } ?>
                      <?php } else { ?>
                        <table class="table table-bordered table-sm">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Nama Sub Soal</td>
                              <td>Cek Jawaban</td>
                              <td>Score</td>
                            </tr>
                          </thead>
                        <tbody>
                        <?php $no2 = 1; foreach ($control->DataSubSoal($val->id_soal, $Kandidat->IdKandidat) as $ValSub) { ?>
                          
                              <?php if ($ValSub->Id_subsoal == '163897cc40f4b5') { ?>

                              <?php }else{ ?>
                              <tr>
                                <td><?=$no2++?></td>
                                <td><?=$ValSub->nama_subsoal?></td>
                                <td><button class="btn btn-xs btn-success" type="button" onclick="GetDetailJawaban('<?=$val->id_soal?>', '<?=$Kandidat->IdKandidat?>', '<?=$ValSub->Id_subsoal?>')"><i class="fas fa-eye"></i> Cek Jawaban</button></td>
                                <td>
                                <?php 
                                    echo $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                                  ?></td>
                              </tr>
                              <?php 
                                  
                                    $dataCount[$val->id_soal][] = $control->ScoreSoal($ValSub->Id_subsoal, $Kandidat->IdKandidat);
                              }
                              ?>
                          <?php } ?>
                        </tbody>
                        <tfoot>
                          
                          <tr>
                            <td colspan="3" style="text-align: right;">Total Hasil</td>
                            <td><?=array_sum($dataCount[$val->id_soal])?></td>
                          </tr>
                          <?php if ($val->id_soal == '16377320946db8') {
                            
                          } else { ?>
                          <tr>
                            <td colspan="2" style="text-align: right;">Hasil IQ</td>
                            <td><?=$control->CekHasilConvert($val->id_soal, array_sum($dataCount[$val->id_soal]))?></td>
                          </tr>
                          <?php } ?>
                          
                        </tfoot>
                        </table>
                      <?php } ?>
                    </td>
                  </tr>
                </tbody>
                  
                  <?php } ?>

              </table>
              
            </div>
          </div>
          <div class="card-footer no-printme" >
          <input type="hidden" name="IdKandidat" id="" value="<?=$Kandidat->IdKandidat?>">

            <?php if ($Kandidat->StatusKoreksi != '1' && ($this->session->userdata('id_level') == "1" || $this->session->userdata('id_level') == "4" || $this->session->userdata('id_level') == "5" || $this->session->userdata('id_level') == "6") ) {?>
              
              <button class="btn btn-sm btn-success" type="button" onclick="Confirm()" id="CekPertama">Isi Form Hasil Penilaian</button>
                
            <?php } ?>
          </div>
        </div>
        
    <?php } ?>
      
      <div class="card" id="FormSimpan" hidden>
        <div class="card-header">
          <label for="">Form Pengisian Akhir</label>
        </div>
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

    <?php if ( $Kandidat->StatusKoreksi != 1 && ($Kandidat->IdPaket == "16458ac58ee43c" || $Kandidat->IdPaket == '1646f26078b855')) { ?>
      <form action="<?=base_url()?>Transaksi/DetailKandidat/SimpanDataPaket" method="post">
      <input type="hidden" name="IdKandidat" id="" value="<?=$Kandidat->IdKandidat?>">
      <button class="btn btn-sm btn-success" type="submit" id="CekPertama">Simpan Detail</button>
      </form>
    <?php } ?>
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
              <td>Jawaban Kandidat</td>
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
          <td>`;
          if (data[i].Jawab == null) {
            
          }else{
            html+= data[i].Jawab
          }
          html+=`</td>
          <td>`+data[i].Jawaban+`</td>
          <td>`+data[i].Score+`</td>
        </tr>
        `;      

      }
      $('#DataJawab').html(html);
    }
  })
}




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
</script>