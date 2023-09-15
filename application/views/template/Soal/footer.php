</div>

<div id="MobileDetect">
      <div class="card card-danger">
        <div class="card-header ">
          <div class="card-title">
            Notice !!!
          </div>
        </div>
        <div class="card-body">
          Mohon Maaf Aplikasi Ini Hanya Dapat diAkses Via PC / Komputer !!
        </div>
      </div>
    </div>
    <div id="CamDetect" hidden>
      <div class="card card-danger">
        <div class="card-header ">
          <div class="card-title">
            Notice !
          </div>
        </div>
        <div class="card-body">
          Mohon Maaf Aplikasi Ini Hanya Dapat diAkses Jika Browser Memberikan Allow Pada Camera !! <br>

          Jika Page Ini Muncul Berarti Web Cam Telah di Block <br>

          Silahkan Mengikutin Tautan Berikut untuk cara membuka block Pada kamera...
          <br>
          <a href="https://support.onemob.com/hc/en-us/articles/360037342154-How-do-I-grant-permission-for-Camera-and-Microphone-in-my-web-browser-" target="_Blank">Cek Disini</a>
          <br><br>
          <button class="btn btn-success btn-sm" onclick="askPermission()"><i class="fas fa-camera"></i> Check</button>
        </div>
      </div>
    </div>    
    <div id="ContentNotSupport" hidden>
      <div class="card card-danger">
        <div class="card-header ">
          <div class="card-title">
            Notice !
          </div>
        </div>
        <div class="card-body">
          Mohon Maaf Aplikasi Ini Hanya Dapat diAkses Jika Komputer Memiliki Kamera, <br>
          jika tidak ada kamera mohon pindah PC yang menggunakan Kamera <br>
          Terima Kasih
        </div>
      </div>
    </div>    
<?php 

$apl = $this->db->get("aplikasi")->row();
?>
  <footer class="main-footer no-printme">
    <strong>Copyright &copy; <?=$apl->tahun?> <?=$apl->copy_right?>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?=$apl->versi?>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 
</div>

<!-- ./wrapper -->
<!-- <a href="https://adminlte.io">AdminLTE.io</a> -->
<!-- Thanks To AdminLte -->
  <!-- Kamera Add ON -->
  <script>
    // askPermission()
    function askPermission(){
    let All_mediaDevices=navigator.mediaDevices
         if (!All_mediaDevices || !All_mediaDevices.getUserMedia) {
            console.log("getUserMedia() not supported.");
            return;
         }
         All_mediaDevices.getUserMedia({
            audio: true,
            video: true
         })
         .then(function(vidStream) {
            var video = document.getElementById('videoCam');
            if ("srcObject" in video) {
               video.srcObject = vidStream;
            } else {
               video.src = window.URL.createObjectURL(vidStream);
            }
            video.onloadedmetadata = function(e) {
               video.play();
            };
         })
         .catch(function(e) {
          if (e.name == 'NotAllowedError') {
            document.getElementById('CamDetect').hidden = false;
            document.getElementById('ContentTest').hidden = true;
          }else{
            document.getElementById('ContentTest').hidden = false;
            document.getElementById('MobileDetect').hidden = true;
          }
            console.log(e.name);
         });

  }

  askPermissionLoad()
  function askPermissionLoad(){
    let All_mediaDevices=navigator.mediaDevices
         if (!All_mediaDevices || !All_mediaDevices.getUserMedia) {
            console.log("getUserMedia() not supported.");
            document.getElementById('ContentTest').hidden = true;
            document.getElementById('ContentNotSupport').hidden = false;
            return;
         }
         All_mediaDevices.getUserMedia({
            audio: true,
            video: true
         })
         .then(function(vidStream) {
            var video = document.getElementById('videoCam');
            if ("srcObject" in video) {
               video.srcObject = vidStream;
            } else {
               video.src = window.URL.createObjectURL(vidStream);
            }
            video.onloadedmetadata = function(e) {
               video.play();
            };
         })
         .catch(function(e) {
          if (e.name == 'NotAllowedError') {
            document.getElementById('CamDetect').hidden = false;
            document.getElementById('ContentTest').hidden = true;
          }else{
            document.getElementById('ContentTest').hidden = false;
            document.getElementById('MobileDetect').hidden = true;
          }
          if (e.name == 'NotFoundError') {
            document.getElementById('ContentTest').hidden = true;
            document.getElementById('ContentNotSupport').hidden = false;
          }
            console.log(e.name);
         });

  }


    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
if (isMobile) {
  document.getElementById('MobileDetect').hidden = false;
  document.getElementById('ContentTest').hidden = true;

  document.getElementById('MobileDetect').hidden = "false";
}else{
  document.getElementById('ContentTest').hidden = false;
  document.getElementById('MobileDetect').hidden = true;
  document.getElementById('CameraShow').hidden = false;
}
  </script>
</body>
</html>
