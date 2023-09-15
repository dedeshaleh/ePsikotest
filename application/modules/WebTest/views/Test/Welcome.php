<style>
  pre {
  overflow-x: auto;
  white-space: pre-wrap;
  white-space: -moz-pre-wrap;
  white-space: -pre-wrap;
  white-space: -o-pre-wrap;
  word-wrap: break-word;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
        <div class="card">
          <div class="card-header"><?=$DataWelcome->HeaderPage?></div>
          <div class="card-body"><pre><?=$DataWelcome->WelcomePage?></pre>
          
          </div>
          <div class="card-footer"><?=$DataWelcome->FooterPage?>
        <br>
        <br>
        <!-- <a href="<?=base_url()?>WebTest/PengerjaanSoal/MulaiPengerjaan" class="btn btn-sm btn-success">Mulai Pengerjaan</a> -->
        <button type="button" onclick="SetLoad()" class="btn btn-sm btn-warning" id="btnSave"> Mulai Pengerjaan</button>
      </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
    function SetLoad() {
      var IdKandidat = "<?=$this->session->userdata('IdKandidat')?>";
      var NoPeserta = "<?=$this->session->userdata('NoPeserta')?>";
      var TokenPeserta = "<?=$this->session->userdata('Token')?>";

      $.ajax({
        url : "<?=base_url()?>WebTest/PengerjaanSoal/WaktuPengerjaan",
        dataType : "JSON",
        type : "POST",
        data : {IdKandidat:IdKandidat , NoPeserta:NoPeserta , TokenPeserta:TokenPeserta},
        success : function (data) {
          location.href = "<?=base_url()?>WebTest/PengerjaanSoal/MulaiPengerjaan";
        }
      })
    }
  </script>