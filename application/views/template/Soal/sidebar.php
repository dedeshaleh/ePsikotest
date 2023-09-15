<?php 

$apl = $this->db->get("aplikasi")->row();
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="<?php echo base_url();?>assets/foto/logo/<?php echo $apl->logo; ?>" alt="<?php echo $apl->title; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo  $apl->title; ?></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"> <?=$this->session->userdata('NamaKandidat')?></i>
            <i class="fas fa-arrow-alt-circle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
            <span class="dropdown-header">Data Peserta</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> 
              <?=$this->session->userdata('NoPeserta')?>
              <span class="float-right text-muted text-sm"></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-phone mr-2"></i> <?=$this->session->userdata('NoTelp')?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-calendar mr-2"></i> <?=$this->session->userdata('TglTest')?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?=base_url()?>WebTest/logout" class="dropdown-item dropdown-footer btn btn-warning">Logout</a>
          </div>
        </li>
        <li class="nav-item">
          <button class="btn btn-warning btn-sm" onclick="askPermission()"><i class="fas fa-camera"></i> Check</button>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" onclick="getFull()">
          <i class="fas fa-expand-arrows-alt"></i>
          <input type="hidden" name="" id="full" value="0">
        </a>
      </li>
      </ul>
    </div>
  </nav>
  <div id="NotFullDetect" hidden>
      <div class="card card-danger container-fluid" style="width: 600px;">
        <div class="card-header ">
          <div class="card-title">
            Notice !
          </div>
        </div>
        <div class="card-body">
          Mohon Maaf Tolong Lakukan FullScreen Untuk Lanjut Mengikuti Test Ini
          <br><br>
          <b>Terima Kasih</b>
          <br><br>
          <button class="nav-link btn btn-success btn-sm" data-widget="fullscreen" href="#" role="button" id="EnterFull" onclick="getFull()">
            <i class="fas fa-camera"></i> Full Screen!!
            <input type="hidden" name="" id="full" value="0">
          </button>
        </div>
      </div>
    </div>  
  <!-- /.navbar -->
