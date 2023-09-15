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
              <div class="table-responsive">
              <table class="table table-sm table-stripped" id="data_user">
                  <thead>
                    <tr>
                      <th>Buku Soal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($DataSoal as $val) { ?>
                      <tr>
                      <td>
                        <label for=""><?=$val->nama_soal?></label>
                        <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                          <tr style="background-color: #b3f1fc;">
                            <th>No</th>
                            <th>Nama Sub Soal</th>
                            <th>Instruksi</th>
                            <th>Waktu Pengerjaan</th>
                          </tr>
                          <?php $no = 1; foreach ($control->GetSubSoal($val->id_soal) as $valSub) { ?>
                            <tr>
                              <td><?=$no++?></td>
                              <td><?=$valSub->nama_subsoal?></td>
                              <td><?=$valSub->InstruksiSoal?></td>
                              <td><?=$valSub->TimeSelesai?></td>
                            </tr>
                            <tr>
                              <td colspan="4">
                                <div class="table-responsive">
                                  <table class="table table-sm table-bordered">
                                    <tr style="background-color: #bbf2dd;">
                                      <th>No</th>
                                      <th>No Urut</th>
                                      <th>Soal</th>
                                      <th>Type Jawaban</th>
                                      <th>Type Pilihan</th>
                                    </tr>
                                    <?php $no2 = 1; foreach ($control->GetDetailSoal($valSub->Id_subsoal) as $valDetail) { ?>
                                      <tr>
                                        <td><?=$no2++?></td>
                                        <td><?=$valDetail->NoUrut?></td>
                                        <td style="white-space:nowrap;">
                                            <?php if($valDetail->TypeSoal == 1){ ?>
                                              <textarea name="" id="" cols="30" rows="10" class="form-control" disabled><?php echo $valDetail->IsiSoal;?></textarea>
                                            <?php }else{?>
                                          <img src="<?=base_url()?>assets/images/soal/<?=$valDetail->IsiSoal?>" alt="">
                                          <?php } ?>
                                        </td>
                                        <td><?php if($valDetail->TypeJawaban == 1){echo "Essay";}else{echo "Pilihan Ganda";}?></td>
                                        <td><?php if($valDetail->TypePilihan == 1){echo "Single Choice";}else{echo "Multi Choice";}?></td>
                                      </tr>
                                    <?php } ?>
                                  </table>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                        </table>
                        </div>
                        
                      </td>
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


<script>
  $(function () {
    $("#data_user2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#data_user').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
 
</script>