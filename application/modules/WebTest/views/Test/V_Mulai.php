

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?=$judul?></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card" id="Instruksi">
          <div class="card-header"><label for="">Instruksi Soal</label></div>
          <div class="card-body">
            <?=$SubSoal->InstruksiSoal?>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-sm btn-success" onclick="ShowSoal()">Mulai Mengerjakan</button>
          </div>
        </div>
        <div class="card" id="DataSoal" hidden>
        <form action="<?=base_url()?>WebTest/PengerjaanSoal/SimpanPengerjaan" method="post" enctype="multipart/form-data" id="DataSubmit">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama Soal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($DataSubDetailSoal as $v) { ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?php if($v->TypeSoal == 1){echo $v->IsiSoal;}else if($v->TypeSoal == 2){ echo "<image src='".base_url()."assets/images/soal/'".$v->IsiSoal.">";}?></td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <table class="table table-borderless">
                            <?php if ($v->TypeJawaban == 1) { ?>
                              <input type="text" name="JawabanKandidat" id="" class="form-control">
                              <?php } else if($v->TypeJawaban == 2) { ?>
                                <?php foreach ($control->getSubDetail($v->id_subdetail) as $va) { ?>
                          <tr>
                                <td>
                                <input name="JawabanSystem[]" type="hidden" value="<?=$va->Jawaban?>">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input custom-control-input-success <?=$va->id_subdetail?>" onclick="getCheckbox('<?=$va->id_subdetail?>', '<?=$va->KodeSoal?><?=$va->id_subdetail?>', '<?=$v->TypePilihan?>')" name="JawabanKandidat[]" type="checkbox" id="<?=$va->KodeSoal?><?=$va->id_subdetail?>" value='1'>
                                  <label for="<?=$va->KodeSoal?><?=$va->id_subdetail?>" class="custom-control-label"><?=$va->KodeSoal?>. <?php if($va->TypeJawab == 1){echo $va->IsiDetailSoal;}else if($va->TypeJawab == 2){ echo "<image src='".base_url()."assets/images/soal/'".$va->IsiDetailSoal.">";}?></label>
                                </div>
                                </td>
                          </tr>

                              <?php } ?>
                            <?php } ?>
                          
                       </table>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" onclick="SetLoad()" class="btn btn-sm btn-warning" id="btnSave"> Simpan Pengerjaan</button>
          </div>
          </form>
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

  function getCheckbox(id_subdetail, id_check, TypePilihan) {
    // document.getElementsByClassName(id_subdetail).checked = false;
    if (TypePilihan == 1) {
      $('.'+id_subdetail).prop('checked',false);
      $("#"+id_check).prop('checked',true);
    }else{
      
    }
      
  }

  function ShowSoal() {
    document.getElementById('DataSoal').hidden = false;
    document.getElementById('Instruksi').hidden = true;
  }
  
  function SetLoad() {
    document.getElementById('btnSave').disabled = true;
    document.getElementById('btnSave').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...';

    document.getElementById('DataSubmit').submit();
  }
</script>