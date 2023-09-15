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
              <br><br>
              <?=$this->session->flashdata('msg');?>
              <div class="table-responsive">
              <table class="table table-sm table-stripped" id="DataKandidat">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Peserta</th>
                      <th>Nama Kandidat</th>
                      <th>Tanggal Test</th>
                      <th>Tanggal Selesai Pengisian</th>
                      <th>Tanggal Selesai Konfimasi</th>
                      <th>Status</th>
                      <th>Note</th>
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
      }

getData();
function getData() {
	$(document).ready(function() {
		
		// date_awal = document.getElementById("date_awal").value;
		// date_akhir = document.getElementById("date_akhir").value;
		// karyawan = document.getElementById("karyawan").value;
        $("#DataKandidat").DataTable({
        "ajax" : {
          'url'	: "<?=base_url()?>Reports/LaporanKandidat/data_detail/",
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
				{ "data" : 'TglTest' },
				{ "data" : 'TimeSelesaiIsi' },
				{ "data" : 'UpdateLulus' },
				{ "data" : 'StatusLulus', 
        render: function (data, type, row, meta) {
            if (row.StatusLulus == 0) {
              return "Belum Di Proses"
            }else if (row.StatusLulus == 1) {
              return "Dapat Disarankan"
            }else if (row.StatusLulus == 2) {
              return "Tidak Disarankan"
            }else if (row.StatusLulus == 3) {
              return "Dipertimbangkan"
            }
        } },
				{ "data" : 'KetLulus' },
			],
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