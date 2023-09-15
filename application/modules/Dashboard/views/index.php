
<script type="text/javascript" src="<?=base_url()?>assets/charts/dist/chart.umd.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?=$judul?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?=$TotalKandidat?></h3>

              <p>Total Kandidat Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?=$TotalLulus?></h3>

              <p>Total Kandidat Disarankan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          
          <div class="small-box bg-warning">
          <div class="inner">
              <h3><?=$TotalDipertimbangkan?></h3>

              <p>Total Kandidat Dipertimbangkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?=$TotalTidakLulus?></h3>

              <p>Total Kandidat Tidak Disarankan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Rate Pendaftaran Kandidat  
              </h3>
              <div class="card-tools">
              </div>
            </div><!-- /.card-header -->
            <div class="card-body">
            <div class="row"> 
            <div class="col-sm-3">
              <label for="">Tahun</label>
              <select name="Tahun" id="Tahun" class="form-control">
              <?php
                $now=date('Y');
                for ($a=2020;$a<=$now;$a++)
                {
                    if ($a == $now) {
                      echo "<option value='$a' selected>$a</option>";
                    }else{
                      echo "<option value='$a'>$a</option>";
                    }
                    
                }
                ?>
              </select>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
          </div>
          <br>
          <button class="btn btn-sm btn-success" onclick="getData()">Cari</button>
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart"
                     style="position: relative; height: 300px;">
                     <canvas id="myChart"></canvas>
                 </div>
                
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->


        </section>
        <!-- /.Left col -->
        
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
      const data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
          label: 'Data Pendaftaran',
          data: [0,0,0,0,0,0,0,0,0,0,0,0],
          backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)',
            'rgba(222, 20, 100, 0.2)',
            'rgba(0, 0, 90, 0.2)',
            'rgba(0, 100, 20, 0.2)',
            'rgba(0, 0, 40, 0.2)',
          ],
          borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 100, 30, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)'
          ],
          borderWidth: 1
        }]
      };
      // config 
      const config = {
            type: 'bar',
            data,
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          };

      // render init block
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  // setup 
  getData()
  
  function getData() {
    let chartStatus = Chart.getChart("myChart"); // <canvas> id
    if (chartStatus != undefined) {
      chartStatus.destroy();
    }
    const data = {
      // 'Bulan' : document.getElementById('Bulan').value,
      'Tahun' : document.getElementById('Tahun').value
    }
    const url = "<?=base_url()?>Dashboard/GetDataPerbulan"
    fetch( url, {
      method : "POST",
      body : JSON.stringify(data),
      headers: {
					"Content-Type": "application/json; charset=UTF-8"
				}
    })
    .then((response) => response.json())
    
    .then((DataDet) => {
        const data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
          label: 'Data Pendaftaran',
          data: [DataDet.Jan, DataDet.Feb, DataDet.Mar, DataDet.Apr, DataDet.Mei, DataDet.Jun, DataDet.Jul, DataDet.Aug, DataDet.Sep, DataDet.Okt, DataDet.Nov, DataDet.Des],
          backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)',
            'rgba(222, 20, 100, 0.2)',
            'rgba(0, 0, 90, 0.2)',
            'rgba(0, 100, 20, 0.2)',
            'rgba(0, 0, 40, 0.2)',
          ],
          borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 100, 30, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)'
          ],
          borderWidth: 1
        }]
      };

      // config 
      const config = {
        type: 'bar',
        data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // render init block
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

    
    })
  }

  
  
</script>