

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?=$judul?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>/WebTest/PengerjaanSoal">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>/WebTest/PengerjaanSoal">Data Soal</a></li>
              <li class="breadcrumb-item active"><?=$Soal->nama_soal?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Soal</th>
                    <th>Instruksi</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($DataSubSoal as $v) { ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$v->nama_subsoal?></td>
                      <th><button class="btn btn-success btn-sm" type="button" onclick="GetInstruksi('<?=$v->Id_subsoal?>')"> Cek Instruksi</button></th>
                      <td><a href="<?=base_url()?>WebTest/PengerjaanSoal/CekSubDetail/<?=$v->Id_subsoal?>" type="button" class="btn btn-success btn-sm">Kerjakan</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
<div class="modal fade" id="cekInstruksi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cekInstruksiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="cekInstruksiLabel">Data Instruksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="InstruksiSoalData"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function GetInstruksi(id_subsoal) {
    const url = "<?=base_url()?>WebTest/PengerjaanSoal/CekDataSub";
    const DataCek = {
			'id_subsoal' : id_subsoal
		}
    fetch(url, {
      method : 'POST',
      body : JSON.stringify(DataCek),
      header: {
				"Content-Type": "application/json; charset=UTF-8"
			}
      
    })
    .then((response) => response.json())
    .then((data) => {
      $("#cekInstruksi").modal('show');
      document.getElementById("InstruksiSoalData").innerHTML = data.InstruksiSoal;
    })
    
    
  }
</script>