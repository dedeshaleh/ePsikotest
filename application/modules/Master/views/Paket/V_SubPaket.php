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

  <!-- Summernote -->
  <script src="<?=base_url()?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

  
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
              <form action="<?=base_url()?>Master/Paket/TambahSub" method="post">
              <input type="hidden" name="IdPaket" id="IdPaket" value="<?=$IdPaket?>">
              <div class="form-group">
                <label for="">Pilih Soal</label>
                <select name="IdSoal" id="IdSoal" class="form-control" style="max-width: 400px;">
                  <option value="">-Pilih-</option>
                  <?php foreach ($Soal as $v) { ?>
                    <option value="<?=$v->id_soal?>"><?=$v->nama_soal?></option>
                  <?php } ?>
                </select>
              </div>
              <button class="btn btn-sm btn-success" type="submit" id="btn_tambah" ><i class="fas fa-plus"></i> Tambah Sub Soal</button>
              
              ||
              <a href="<?=base_url()?>Master/Paket/" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Backward</a>
              </form>
              <br><br>
            <?= $this->session->flashdata('msg');?>

              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataSoal">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Soal</th>
                      <th>User Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
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


<!-- bs-custom-file-input -->
<script src="<?=base_url()?>assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  var id_menu = localStorage.getItem('GetMenu');
  var id_user = '<?=$this->session->userdata('id_user')?>';
  var menu_akses = $.ajax({
        url : "<?=base_url()?>Master/Paket/getAkses",
        type : "POST",
        dataType : "JSON",
        async : false,
        data : {id_menu:id_menu, id_user:id_user},
        success : function (data) {

        }
      }).responseJSON;
      if (menu_akses.add_level != 'Y') {
        document.getElementById('btn_tambah').hidden = true;
      }
  $(document).ready(function() {
    var IdPaket = "<?=$IdPaket?>";
    $('#DataSoal').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/Paket/Data_Sub",
            'type': "POST",
            'data': {IdPaket:IdPaket}
        },
		columns: [
			{
			  data : "IdPaketDet",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'NamaSoal' },
			{ data: 'UserCreated' },
			
			{ 
				data: 'Id_subsoal',
				render : function (data, type, row, meta) {
         
          if (menu_akses.delete_level == 'Y') {
            var dele = '<a type="button" href="<?=base_url()?>Master/Paket/SubDelete/'+row.IdPaketDet+'/<?=$IdPaket?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
          }else{
            var dele = ''
          }
					return dele;
				}
			}
			]
		})
	});

  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Paket/GetDataSub",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#edit").modal("show");
        document.getElementById('IdPaket_edit').value = data.IdPaket;
        document.getElementById('id_subsoal_edit').value = data.Id_subsoal;
        var time = data.TimeSelesai;
        var myTime = time.split(':');
        console.log(myTime[0]);
        document.getElementById('jam_edit').value = parseInt(myTime[0]);
        document.getElementById('menit_edit').value = parseInt(myTime[1]);
        
        
        $('#InstruksiSoal_edit').summernote({
                height: "300px",
                callbacks: {
                    onImageUpload: function(image) {
                        uploadImageEdit(image[0]);
                    },
                    onMediaDelete : function(target) {
                        deleteImageEdit(target[0].src);
                    }
                }
                
            }).summernote('code', data.InstruksiSoal);
            function uploadImageEdit(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: "<?php echo site_url('Master/Paket/upload_image')?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function(url) {
                      console.log(url);
                        $('#InstruksiSoal_edit').summernote("insertImage", url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
 
            function deleteImageEdit(src) {
                $.ajax({
                    data: {src : src},
                    type: "POST",
                    url: "<?php echo site_url('Master/Paket/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        document.getElementById('nama_subsoal_edit').value = data.nama_subsoal;
      }
    })
  }
  function GetDelete(id) {
    console.log(id)
    $.ajax({
      url : "<?=base_url()?>Master/Paket/GetDataSub",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#modalDel").modal("show");
        document.getElementById("nama_subsoal_del").innerHTML = data.nama_subsoal;
        document.getElementById("id_subsoal_del").value = data.Id_subsoal;

      }
    })
  }
  var loadFile = function(event) {
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
  $(document).ready(function(){
            $('#InstruksiSoal').summernote({
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
                    url: "<?php echo site_url('Master/Paket/upload_image')?>",
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
                    url: "<?php echo site_url('Master/Paket/delete_image')?>",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
 
        });

        function GetView(Id_subsoal ,InstruksiSoal) {
          $('#InstruksiView').modal('show');
          document.getElementById('DataView').innerHTML = InstruksiSoal;
          $.ajax({
            url : "<?=base_url()?>Master/Paket/getSoalInstruksi",
            type : "POST",
            data : {Id_subsoal:Id_subsoal},
            dataType : "JSON",
            success : function (data) {
              html = ``;
              
              for (let i = 0; i < data.data.length; i++) {
                html += 
                `
                <tr >
                  <td rowspan='2'>`+(i+1)+`</td>
                  <td>`;
                  if (data.data[i].TypeSoal == 1) {
                    html+= data.data[i].IsiSoal;
                  }else if(data.data[i].TypeSoal == 2) {
                    html+= `<img src="<?=base_url()?>assets/images/Paket/`+data.data.IsiSoal+`">`;
                  }else{

                  }
                  html+=
                  `</td>
                </tr>
                `;
                html += `<tr><td>`;
                
                html += `<table class='table table-borderless'><tr>`;
                data.dataIns.forEach((value, index) => {
                  if (data.dataIns[index].IdPaketinstruksi == data.data[i].IdPaketinstruksi) {
                    if (data.dataIns[index].TypeJawab == 1) {
                      html+= `<td>`+data.dataIns[index].KodeSoal+`. `+data.dataIns[index].IsiDetailSoal+`</td>`
                    } else if (data.dataIns[index].TypeJawab == 2) {
                      html+= `<td>`+data.dataIns[index].KodeSoal+`. <img style='max-width: 100px; max-height:100px;' src="<?=base_url()?>assets/images/Paket/`+data.dataIns[index].IsiDetailSoal+`"></td>`
                    } else {

                    }
                    
                  }
                });
                html += `</tr></table>`;

                html += `</td></tr>`;


              }
              $("#DataSoalView").html(html);
            }
          })
        }
</script>