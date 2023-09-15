<style>
    .input-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    .input-wrapper input {
      width: 100%;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card" id="TerimaKasih" hidden>
          <div class="card-header"></div>
          <div class="card-body">
            <b>Seluruh jawaban Anda sudah terekam.</b>
            <br><br>

          Terima kasih sudah mengerjakan online test ini. Informasi lebih lanjut akan disampaikan dari tim Recruitment kami. 
<br>
<br>
          Salam, <br>
          Human Capital Team <br>
          <b>PT Bethsaida Hospital International</b>

          
          </div>
          <div class="card-footer"></div>
        </div>

        <!-- Instruksi Soal -->

        <div class="card" id="Instruksi">
          <div class="card-header"><label for=""></label>
          <h3 class="card-title">Instruksi Soal</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-success" disabled id="WaktuInstruksi"></button>
                </div>
          </div>
          <div class="card-body">
            <?=$SubSoal->InstruksiSoal?>

            <div class="form-group">
            <table class="table table-sm table-borderless">
                  <tr>
                    <td>No</td>
                    <td>Isi Soal</td>
                  </tr>
              <?php $noa = 1; foreach ($control->GetSoalInstruksi($SubSoal->Id_subsoal) as $vs) { ?>
                  <tr id="Soal_<?=$vs->id_soalinstruksi?>" hidden>
                    
                  </tr>
                  <tr>
                      <td><?=$noa++?> </td>
                      <td><?php if($vs->TypeSoal == 1){ ?>
                        <textarea name="" id="" cols="30" rows="5" class="form-control" disabled <?php if($vs->TypeSoal == '' || $vs->TypeSoal == null) {echo 'Hidden';}?>><?php echo $vs->IsiSoal; ?></textarea>
                        <?php }else if($vs->TypeSoal == 2){ echo "<image style='max-width: 100%; height: 150px;' src='".base_url()."assets/images/soal/".$vs->IsiSoal."'>";}?>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <table>
                        <?php foreach ($control->GetSoalDetailInstruksi($vs->id_soalinstruksi) as $vsd) { ?>
                          <tr>
                          <?php if ($vsd->TypeJawab == 1) { ?>
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input custom-control-input-success <?=$vsd->id_soalinstruksi?>" onclick="getCheckboxInstruksi('<?=$vsd->id_soalinstruksi?>', '<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>', '<?=$vs->TypePilihan?>')" name="JawabanKandidat_<?=$vsd->id_soalinstruksi?>_<?=$vsd->KodeSoal?>" type="checkbox" id="<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>" value='<?=$vsd->KodeSoal?>'>
                              <label for="<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>" class="custom-control-label"><?=$vsd->KodeSoal?>. <?php if($vsd->TypeJawab == 1){echo $vsd->IsiDetailSoal;}else if($vsd->TypeJawab == 2){ echo "<image style='width: 100px; height: 100px;' src='".base_url()."assets/images/soal/".$vsd->IsiDetailSoal."'>";}?></label>
                            </div>
                            <?php }else if ($vsd->TypeJawab == 2){ ?>
                              <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input custom-control-input-success <?=$vsd->id_soalinstruksi?>" onclick="getCheckboxInstruksi('<?=$vsd->id_soalinstruksi?>', '<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>', '<?=$vs->TypePilihan?>')" name="JawabanKandidat_<?=$vsd->id_soalinstruksi?>_<?=$vsd->KodeSoal?>" type="checkbox" id="<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>" value='<?=$vsd->KodeSoal?>'>
                                  <label for="<?=$vsd->KodeSoal?><?=$vsd->id_soalinstruksi?>" class="custom-control-label"><?=$vsd->KodeSoal?>. <?php if($vsd->TypeJawab == 1){echo $vsd->IsiDetailSoal;}else if($vsd->TypeJawab == 2){ echo "<image style='width: 100px; height: 100px;' src='".base_url()."assets/images/soal/".$vsd->IsiDetailSoal."'>";}?></label>
                                </div>
                              </div>
                              <?php }  ?>
                          </tr>
                        <?php } ?>
                        
                      </table>
                    </td>
                    
                  </tr>
              <?php } ?> 
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-sm btn-success" onclick="ShowSoal()" id="btnMulai">Mulai Mengerjakan</button>
          </div>
        </div>


        <!-- Mengerjakan Soal -->
        <div class="card" id="DataSoal" hidden>
        <form action="<?=base_url()?>WebTest/PengerjaanSoal/SimpanPengerjaan" method="post" enctype="multipart/form-data" id="DataSubmit">
        <input type="hidden" name="Id_soal" id="" value="<?=$DataHeader->Id_soal?>">
        <input type="hidden" name="Id_subsoal" id="Id_subsoal" value="<?=$DataHeader->Id_subsoal?>">
        <input type="hidden" name="IdKandidat" id="" value="<?=$this->session->userdata('IdKandidat')?>">
        <input type="hidden" name="NoPeserta" id="" value="<?=$this->session->userdata('NoPeserta')?>">
          <div class="card-body">
            <div class="table">
              <table class="table table-sm table-bordered" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama Soal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($DataSubDetailSoal as $v) { ?>
                    <tr>
                      <td><?=$no++?> </td>
                      <td><?php if($v->TypeSoal == 1 && $v->TypeJawaban != 3){ ?>
                        <textarea name="" id="" cols="30" rows="5" class="form-control" disabled <?php if($v->IsiSoal == '' || $v->IsiSoal == null) {echo 'Hidden';}?>><?php echo $v->IsiSoal; ?></textarea>
                        <?php }else if($v->TypeSoal == 2){ 
                          echo "<image style='max-width: 100%; height: 150px;' src='".base_url()."assets/images/soal/".$v->IsiSoal."'>";}
                          else if($v->TypeJawaban == 3){

                          }
                          ?></td>
                    </tr>
                    <tr>
                      <td colspan="2">
                      <input type="hidden" name="id_subdetail[]" id="id_subdetail" value="<?=$v->id_subdetail?>">
                        <table class="table <?php if($v->TypeJawaban == 3){echo 'table-bordered col-6';}else{echo 'table-borderless';} ?>" >
                        <tr>
                          <td>
                            <div class="row">
                            <input type="hidden" name="TypeJawaban" id="" value="<?=$v->TypeJawaban?>">
                            <?php if ($v->TypeJawaban == 1) { ?>
                              
                              <input type="text" name="JawabanKandidat_<?=$v->id_subdetail?>" id="" class="form-control" <?php if ($v->id_subdetail == '163897d876abad') {echo "hidden";} ?> >
                              <input name="Jawaban[<?=$v->id_subdetail?>][]" type="hidden" value="">
                              <input name="KodeSoal[<?=$v->id_subdetail?>][]" type="hidden" value="">
                              <input name="IsiDetailSoal[<?=$v->id_subdetail?>][]" type="hidden" value="">
                              <input name="TypeJawab[<?=$v->id_subdetail?>][]" type="hidden" value="">
                              <input name="Score[<?=$v->id_subdetail?>][]" type="hidden" value="">
                              <?php } else if($v->TypeJawaban == 2) { ?>
                              
                                <?php foreach ($control->getSubDetail($v->id_subdetail) as $va) { ?>
                                  
                                  <input name="Jawaban[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->Jawaban?>">
                                  <input name="KodeSoal[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->KodeSoal?>">
                                  <input name="IsiDetailSoal[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->IsiDetailSoal?>">
                                  <input name="TypeJawab[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->TypeJawab?>">
                                  <input name="Score[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->Score?>">
                                  
                                    <?php if ($va->TypeJawab == 1) { ?>
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-success <?=$va->id_subdetail?>" onclick="getCheckbox('<?=$va->id_subdetail?>', '<?=$va->KodeSoal?><?=$va->id_subdetail?>', '<?=$v->TypePilihan?>')" name="JawabanKandidat_<?=$va->id_subdetail?>_<?=$va->KodeSoal?>" type="checkbox" id="<?=$va->KodeSoal?><?=$va->id_subdetail?>" value='1'>
                                          <label for="<?=$va->KodeSoal?><?=$va->id_subdetail?>" class="custom-control-label"><?=$va->KodeSoal?>. <?php if($va->TypeJawab == 1){echo $va->IsiDetailSoal;}else if($va->TypeJawab == 2){ echo "<image style='width: 100px; height: 100px;' src='".base_url()."assets/images/soal/".$va->IsiDetailSoal."'>";}?></label>
                                        </div>
                                        <!-- <input type="hidden" name="JawabanKandidat[<?=$v->id_subdetail?>][]" id="" value="0"> -->

                                    <?php }else if ($va->TypeJawab == 2){ ?>
                                      <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input custom-control-input-success <?=$va->id_subdetail?>" onclick="getCheckbox('<?=$va->id_subdetail?>', '<?=$va->KodeSoal?><?=$va->id_subdetail?>', '<?=$v->TypePilihan?>')" name="JawabanKandidat_<?=$va->id_subdetail?>_<?=$va->KodeSoal?>" type="checkbox" id="<?=$va->KodeSoal?><?=$va->id_subdetail?>" value='1'>
                                          <label for="<?=$va->KodeSoal?><?=$va->id_subdetail?>" class="custom-control-label"><?=$va->KodeSoal?>. <?php if($va->TypeJawab == 1){echo $va->IsiDetailSoal;}else if($va->TypeJawab == 2){ echo "<image style='width: 100px; height: 100px;' src='".base_url()."assets/images/soal/".$va->IsiDetailSoal."'>";}?></label>
                                        </div>
                                      </div>
                                    <?php }  ?>
                                    
                         
                                  <script>
                                    var cekLoc = localStorage.getItem('<?=$va->id_subdetail?>');
                                    var cekLoc2 = localStorage.getItem('<?=$va->KodeSoal?><?=$va->id_subdetail?>');
                                    if (cekLoc == '<?=$va->KodeSoal?><?=$va->id_subdetail?>') {
                                      document.getElementById('<?=$va->KodeSoal?><?=$va->id_subdetail?>').checked = true;
                                    }
                                    if (cekLoc2 == '<?=$va->KodeSoal?><?=$va->id_subdetail?>') {
                                      document.getElementById('<?=$va->KodeSoal?><?=$va->id_subdetail?>').checked = true;
                                      
                                    }
                                  </script>
                              &nbsp;&nbsp;&nbsp;&nbsp;

                              <?php } ?>
                            <?php } else if($v->TypeJawaban == 3) {?>
                                  
                                  <thead>
                                    <tr>
                                      <th style="text-align: center;">+</th>
                                      <th style="text-align: center;">Text</th>
                                      <th style="text-align: center;">-</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $ank = 1; foreach ($control->getSubDetail($v->id_subdetail) as $va) { $ank++; ?>
                                      <input name="IsiDetailSoal[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->IsiDetailSoal?>">
                                      <input name="KodeSoal[<?=$v->id_subdetail?>][]" type="hidden" value="<?=$va->KodeSoal?>">
                                      <tr>
                                        <td>
                                          <div class="custom-control custom-checkbox">
                                            <input class="input-wrapper custom-control-input custom-control-input-success <?=$va->KodeSoal?><?=$va->id_subdetail?> Plus<?=$va->id_subdetail?>" onclick="getCheckbox('<?=$va->id_subdetail?>', 'Plus<?=$ank?><?=$va->id_subdetail?>', '<?=$va->KodeSoal?>', '<?=$v->TypeJawaban?>', 'Plus<?=$va->id_subdetail?>')" name="JawabanKandidatPlus_<?=$va->id_subdetail?>_<?=$va->KodeSoal?>" type="checkbox" id="Plus<?=$ank?><?=$va->id_subdetail?>" value='<?=$va->Plus?>'>
                                            <label for="Plus<?=$ank?><?=$va->id_subdetail?>" class="custom-control-label"></label>
                                          </div>
                                        </td>
                                        <td><?=$va->IsiDetailSoal?></td>
                                        <td>
                                          <div class="custom-control custom-checkbox">
                                            <input class="input-wrapper custom-control-input custom-control-input-danger <?=$va->KodeSoal?><?=$va->id_subdetail?> Min<?=$va->id_subdetail?>" onclick="getCheckbox('<?=$va->id_subdetail?>', 'Min<?=$ank?><?=$va->id_subdetail?>', '<?=$va->KodeSoal?>', '<?=$v->TypeJawaban?>', 'Min<?=$va->id_subdetail?>')" name="JawabanKandidatMin_<?=$va->id_subdetail?>_<?=$va->KodeSoal?>" type="checkbox" id="Min<?=$ank?><?=$va->id_subdetail?>" value='<?=$va->Minus?>'>
                                            <label for="Min<?=$ank?><?=$va->id_subdetail?>" class="custom-control-label"></label>
                                          </div>
                                        </td>
                                      </tr>
                                    <?php  } ?>
                                  </tbody>
                            <?php } ?>
                            </div>
                            </td>
                          </tr>
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
Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img id="imageprev" src="'+data_uri+'"/>';
        } );
    }

    function saveSnap(){
      
    var base64image = document.getElementById("imageprev").src;

    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
    // console.log(Id_soal)
    // Get base64 value from <img id='imageprev'> source

    Webcam.upload( base64image, '<?=base_url()?>WebTest/UploadImage/'+Id_soal+'/'+Id_subsoal+'/', function(code, text) {
          // console.log('Save successfully');
        //console.log(text);
    });

  }
    // function SetReloadCam() {
    //   setTimeout(take_snapshot, 50000)
    //   setTimeout(saveSnap, 50000)

    // }

    function WaktuCam() {
      
    $.ajax({
      url : "<?=base_url()?>WebTest/PengerjaanSoal/CekWaktuCam",
      dataType : "JSON",
      type : "POST",
      data : {},
      success : function (data) {
        // console.log(data);
        if (data != null) {
          // Waktu awal
          var waktuAwal = new Date(data.WaktuKandidat.CreateDate);
          // Waktu akhir
          var waktuAkhir = new Date(data.WaktuNormal.WaktuSekarang);

          // Menghitung selisih waktu dalam milidetik
          var selisihWaktu = waktuAkhir - waktuAwal;

          // Menghitung selisih jam, menit, dan detik
          var selisihJam = Math.floor(selisihWaktu / (1000 * 60 * 60));
          var selisihMenit = Math.floor((selisihWaktu / (1000 * 60)) % 60);
          var selisihDetik = Math.floor((selisihWaktu / 1000) % 60);
          


          var Jam = String(selisihJam).padStart(2, '0');
          var Menit = String(selisihMenit).padStart(2, '0');
          var Detik = String(Math.round(selisihDetik)).padStart(2, '0');
          var Waktu = Jam+':'+Menit+':'+Detik;
          if (Waktu >= "00:05:00") {
            take_snapshot()
            saveSnap()
          }
        }else{
          take_snapshot()
          saveSnap()
        }
        setTimeout(WaktuCam, 1000*2)
        // console.log("WaktuCamCheck");
        
      }
    })
  }

  function WaktuTest() {
    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
    $.ajax({
      url : "<?=base_url()?>WebTest/PengerjaanSoal/CekWaktu",
      dataType : "JSON",
      type : "POST",
      data : {Id_subsoal:Id_subsoal},
      success : function (data) {
        // console.log(AngkaTest)
          if (data.WaktuKandidat == null) {
            var SetTimeMulai = localStorage.getItem("Mulai_"+Id_subsoal);
            if (SetTimeMulai == null) {
              
            }else{
              InsertWaktu();
            }
            CekTime(data.WaktuKandidat.WaktuMulai, data.WaktuKandidat.IdKandidat, data.WaktuKandidat.Id_subsoal, data.WaktuNormal.TimeSelesai, data.WaktuSekarang);
          // console.log("Sukses");
          } else {
            // console.log("Gagal");

            CekTime(data.WaktuKandidat.WaktuMulai, data.WaktuKandidat.IdKandidat, data.WaktuKandidat.Id_subsoal, data.WaktuNormal.TimeSelesai, data.WaktuSekarang);
          }
        
      }
    })
  }

  function InsertWaktu() {
    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
    $.ajax({
      url : "<?=base_url()?>WebTest/PengerjaanSoal/InsertWaktu",
      dataType : "JSON",
      type : "POST",
      data : {Id_subsoal:Id_subsoal, Id_soal},
      success : function (data) {
        // console.log(data);
        WaktuTest()
      }
    })
  }



  function CekTime(WaktuMulai, IdKandidat, Id_subsoal, TimeSelesai, WaktuSekarang) {
   
    // Waktu awal
    var waktuAwal = new Date(WaktuMulai);
    // Waktu akhir
    var waktuAkhir = new Date(WaktuSekarang);

    // Menghitung selisih waktu dalam milidetik
    var selisihWaktu = waktuAkhir - waktuAwal;

    // Menghitung selisih jam, menit, dan detik
    var selisihJam = Math.floor(selisihWaktu / (1000 * 60 * 60));
    var selisihMenit = Math.floor((selisihWaktu / (1000 * 60)) % 60);
    var selisihDetik = Math.floor((selisihWaktu / 1000) % 60);
    


    var Jam = String(selisihJam).padStart(2, '0');
    var Menit = String(selisihMenit).padStart(2, '0');
    var Detik = String(selisihDetik).padStart(2, '0');
    var Waktu = Jam+':'+Menit+':'+Detik;

    // console.log(WaktuMulai, WaktuSekarang, Waktu, TimeSelesai);
    if (Waktu >= TimeSelesai) {
      SetLoad();
    } else {
      setTimeout(WaktuTest, 1000*2)
      
    }
  }

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


  function getCheckbox(id_subdetail, id_check, TypePilihan, TypeJawaban, Select) {
    // document.getElementsByClassName(id_subdetail).checked = false;
    if (TypeJawaban == 3) {
        $('.'+TypePilihan+id_subdetail).prop('checked',false);
        $('.'+Select).prop('checked',false);
        $("#"+id_check).prop('checked',true);
        localStorage.setItem(id_subdetail, id_check)
    }else{
      if (TypePilihan == 1) {
        $('.'+id_subdetail).prop('checked',false);
        $("#"+id_check).prop('checked',true);
        localStorage.setItem(id_subdetail, id_check)
      }else{
        ch = document.getElementById(id_check).checked;
        if (ch) {
          localStorage.setItem(id_check, id_check)
        }else{
          localStorage.removeItem(id_check)
        }
        
      }
    }

      
  }
  SetReload();

  function SetReload() {
    var checkIns = localStorage.getItem('<?=$DataHeader->Id_subsoal?>');
    if (checkIns == 1) {
      // document.getElementById('Instruksi').hidden = true;
      document.getElementById('DataSoal').hidden = false
    }else{
      document.getElementById('Instruksi').hidden = false;
      // document.getElementById('DataSoal').hidden = false;
    }
    
  }
  function ShowSoal() {
    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
    localStorage.setItem("Mulai_"+Id_subsoal, '1')
    if (document.getElementById('full').value == 0) {
      
    }else{
      
      document.getElementById('DataSoal').hidden = false;
      document.getElementById('Instruksi').hidden = true;
    }
    
    localStorage.setItem('<?=$DataHeader->Id_subsoal?>', '1');
    WaktuTest()
    WaktuCam()
    take_snapshot()
    saveSnap()
    $.ajax({
      url : "<?=base_url()?>WebTest/PengerjaanSoal/WaktuInstruksiSelesai",
        type : "POST",
        dataType : "JSON",
        data : {Id_subsoal:Id_subsoal, Id_soal:Id_soal},
        success : function (data) {
          // console.log("SUKSES");
        }
    })
  }
  
  function SetLoad() {
    document.getElementById('btnSave').disabled = true;
    document.getElementById('btnSave').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...';

    document.getElementById('DataSubmit').submit();
  }
  CekSoal()
  function CekSoal() {
    var id_subsoal = document.getElementById("Id_subsoal").value;
   
    if (id_subsoal == null || id_subsoal == "") {
      document.getElementById("Instruksi").hidden = true;
      document.getElementById("TerimaKasih").hidden = false;
      setTimeout(BackLogin, 5000)
      // window.location.href = "<?=base_url()?>WebTest/PengerjaanSoal";

    }else{
      WaktuTest()
      setTimeout(WaktuCam, 6000)
      if (document.getElementById('Instruksi').hidden == true) {
        
        setTimeout(ShowSoal, 1000*60*10)
      }else{
        
      }
    }
  }
  // getFull();
  // $(document).keyup(function(e) {
  //    if (e.key === "Escape") { // escape key maps to keycode `27`
  //       console.log("test")
  //   }
  // });
document.addEventListener('fullscreenchange', exitHandler);
document.addEventListener('webkitfullscreenchange', exitHandler);
document.addEventListener('mozfullscreenchange', exitHandler);
document.addEventListener('MSFullscreenChange', exitHandler);

function exitHandler() {
    if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
      document.getElementById('full').value = 0;
      GetButtonSoal()
      
    }
}  
GetButtonSoal()
  function GetButtonSoal() {
    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
    var statusFull = document.getElementById('full').value;
    if (statusFull == '0') {
      if (Id_subsoal == null || Id_subsoal == "") {
        document.getElementById('btnMulai').disabled = true;
        document.getElementById('btnSave').disabled = true;
        document.getElementById('Instruksi').hidden = true;
        document.getElementById('DataSoal').hidden = true;
        document.getElementById('NotFullDetect').hidden = true;
      }else{
        document.getElementById('btnMulai').disabled = true;
        document.getElementById('btnSave').disabled = true;
        document.getElementById('Instruksi').hidden = true;
        document.getElementById('DataSoal').hidden = true;
        document.getElementById('NotFullDetect').hidden = false;
      }
      
    }else{
      SetReload()
      document.getElementById('NotFullDetect').hidden = true;
      document.getElementById('btnMulai').disabled = false;
      document.getElementById('btnSave').disabled = false;
      // document.getElementById('Instruksi').hidden = false;
      if (Id_subsoal == null || Id_subsoal == "") {
      document.getElementById("Instruksi").hidden = true;
      document.getElementById("TerimaKasih").hidden = false;
      document.getElementById('DataSoal').hidden = true;
      }
      // document.getElementById('DataSoal').hidden = true;
      
    }

  }

  function getFull() {
    document.getElementById('full').value = 1;
    GetButtonSoal()
    var CheckClass = document.getElementsByClassName('fa-compress-arrows-alt').length;
      if (CheckClass) {
        // console.log("TRUE");
        // console.log(CheckClass);
        localStorage.setItem('full', CheckClass);
        document.getElementById('full').value = 0;
        GetButtonSoal()
        
      }else{
        // console.log("FALSE");
        localStorage.setItem('full', CheckClass);
        // console.log(CheckClass);
        if (document.getElementById('Instruksi').hidden == true) {
        
      }else{
        setTimeout(ShowSoal, 1000*60*10)
      }
      } 
    }
    
    CheckWaktuInstruksi();
    function CheckWaktuInstruksi() {
    var Id_subsoal = "<?=$DataHeader->Id_subsoal?>";
    var Id_soal = "<?=$DataHeader->Id_soal?>";
      $.ajax({
        url : "<?=base_url()?>WebTest/PengerjaanSoal/WaktuInstruksi",
        type : "POST",
        dataType : "JSON",
        data : {Id_subsoal:Id_subsoal, Id_soal:Id_soal},
        success : function (data) {
          
          // Set the date we're counting down to
          date = new Date(data.WaktuMulai);
          var JamMulai = date.setSeconds(date.getSeconds() + (60*10));
          var countDownDate = new Date(JamMulai).getTime();

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
              
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
              
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
              
            // Output the result in an element with id="demo"
            document.getElementById("WaktuInstruksi").innerHTML = hours + ":"
            + minutes + ":" + seconds;

            // If the count down is over, write some text 
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("WaktuInstruksi").innerHTML = "EXPIRED";
              ShowSoal();
            }
          }, 1000);
          // document.getElementById("WaktuInstruksi").innerHTML = Waktu;
          // setTimeout(CheckWaktuInstruksi, 1000)
        }
      })
    }
    
    function BackLogin() {
      window.location.reload("<?=base_url()?>WebTest")
    }


    function getCheckboxInstruksi(id_soalinstruksi, id_check, TypePilihan) {
      if (TypePilihan == 1) {
      $('.'+id_soalinstruksi).prop('checked',false);
      $("#"+id_check).prop('checked',true);
      localStorage.setItem(id_soalinstruksi, id_check)
    }else{
      ch = document.getElementById(id_check).checked;
      if (ch) {
        localStorage.setItem(id_check, id_check)
      }else{
        localStorage.removeItem(id_check)
      }
      
    }
    // document.getElementsByClassName(id_soalinstruksi).checked = false;
      var checkedValue = ""; 
      var inputElements = document.getElementsByClassName(id_soalinstruksi);
      for(var i=0; inputElements[i]; ++i){
            if(inputElements[i].checked){
                checkedValue += inputElements[i].value
            }
      }
      console.log(checkedValue);
      const data = { id_soalinstruksi: id_soalinstruksi , checkedValue:checkedValue};
      
      fetch('<?=base_url()?>WebTest/PengerjaanSoal/GetDetailInstruksi', {
        method: 'POST', // or 'PUT'
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
        .then((response) => response.json())
        .then((data) => {
          // console.log('Success:', data);
          // Prosses Success
          if (data.Hasil == 1) {
            document.getElementById("Soal_"+id_soalinstruksi).hidden = false
            var var1 = "";

            var1 += `
            <td colspan = "2">
            <div class="alert alert-success">Selamat JaWaban Anda Benar
            <br>
            `+data.Query.Keterangan+`
            </div>
            </td>
            `;
            document.getElementById("Soal_"+id_soalinstruksi).innerHTML = var1;
          }else{
            document.getElementById("Soal_"+id_soalinstruksi).hidden = false
            var var1 = "";

            var1 += `
            <td colspan = "2">
            <div class="alert alert-danger">Mohon Maaf Jawaban Anda Salah Yang Benar Adalah
            <br>
            `+data.Query.JawabanBenar+`
            </div>
            </td>
            `;
            document.getElementById("Soal_"+id_soalinstruksi).innerHTML = var1;
          }
        })
        .catch((error) => {
          console.error('Error:', error);
        });

      // console.log(JSON.stringify(response))
    
      
  }
</script>