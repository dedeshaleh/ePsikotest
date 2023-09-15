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
              <button class="btn btn-sm btn-success" data-target="#tambah" id="btn_tambah" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Sub Soal</button>
              ||
              <a href="<?=base_url()?>Master/Soal/" class="btn btn-sm btn-warning"><i class="fas fa-backward"></i> Backward</a>
              <br><br>
            <?= $this->session->flashdata('msg');?>

              <div class="table-responsive">
                <table class="table table-sm table-stripped" id="DataSoal">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Sub Soal</th>
                      <th>Status</th>
                      <th>Instruksi Soal</th>
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

<!-- Modal -->
<form action="<?=base_url()?>Master/Soal/SubEdit" method="post" enctype="multipart/form-data">
<div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="">Nama Sub Soal</label>
            <table style="width: 100%;">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                <input type="text" name="nama_subsoal" id="nama_subsoal_edit" class="form-control">
                </td>
              </tr>
            </table>
            <input type="hidden" name="id_soal" id="id_soal_edit" value="">
            <input type="hidden" name="id_subsoal" id="id_subsoal_edit" value="">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Waktu Pengerjaan</label>
            <table style="text-align: center;">
              <tr>
                <td>JAM</td>
                <td style="width: 20px;"></td>
                <td>Menit</td>
              </tr>
              <tr>
                <td>
                <select name="jam" id="jam_edit" class="form-control">
                  <?php for ($i=0; $i <= 24; $i++) { ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php } ?>
                </select>
                </td>
                <td>-</td>
                <td>
                  <select name="menit" id="menit_edit" class="form-control">
                    <?php for ($i=0; $i <= 60; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="">Instruksi Soal</label>
            <textarea name="InstruksiSoal" id="InstruksiSoal_edit" class="form-control InstruksiSoal"></textarea>
          </div>
        </div>
      </div> 
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="<?=base_url()?>Master/Soal/SubTambah" method="post" enctype="multipart/form-data">
<div class="modal fade" id="tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="">Nama Sub Soal</label>
            <table style="width: 100%;">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>
                <input type="text" name="nama_subsoal" id="nama_subsoal" class="form-control">
                </td>
              </tr>
            </table>
            <input type="hidden" name="id_soal" id="id_soal" value="<?=$id_soal?>">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="">Waktu Pengerjaan</label>
            <table style="text-align: center;">
              <tr>
                <td>JAM</td>
                <td style="width: 20px;"></td>
                <td>Menit</td>
              </tr>
              <tr>
                <td>
                <select name="jam" id="jam" class="form-control" value='00'>
                  <?php for ($i=0; $i <= 24; $i++) { ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php } ?>
                </select>
                </td>
                <td>-</td>
                <td>
                  <select name="menit" id="menit" class="form-control" value='00'>
                    <?php for ($i=0; $i <= 60; $i++) { ?>
                      <option value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col-12">
          <div class="form-group">
            <label for="">Instruksi Soal</label>
            <textarea name="InstruksiSoal" id="InstruksiSoal" class="form-control InstruksiSoal"></textarea>
          </div>
        </div>
      </div> 
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>
</form>


<form action="<?=base_url()?>Master/Soal/SubDelete" method="post" enctype="multipart/form-data">
<div class="modal fade" id="modalDel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Apakah anda yakin ingin mendelete Menu ini : <span id="nama_subsoal_del"></span></label>
        <input type="hidden" name="id_subsoal" id="id_subsoal_del">
        <input type="hidden" name="id_soal" value="<?=$id_soal?>">
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</form>


<div class="modal fade" id="InstruksiView" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="InstruksiViewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="InstruksiViewLabel"><?=$judul?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="">Instruksi Soal</label>
       <span id="DataView"></span>
       <div class="table-responsive">
       <style>
      td {
          white-space: nowrap;
      }
     </style>
        <table class="table table-sm table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Soal</td>
            </tr>
          </thead>
          <tbody id="DataSoalView"></tbody>
        </table>
       </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- bs-custom-file-input -->
<script src="<?=base_url()?>assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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
        document.getElementById('btn_tambah').hidden = true;
      }
  $(document).ready(function() {
    var id_soal = "<?=$id_soal?>";
    $('#DataSoal').DataTable( {
		destroy: true,
		ajax: {
            'url'	: "<?=base_url()?>Master/Soal/Data_Sub",
            'type': "POST",
            'data': {id_soal:id_soal}
        },
		columns: [
			{
			  data : "id_soal",
				render: function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				}
			},
			{ data: 'nama_subsoal' },
			{ data: 'StatusSub',
        render : function (data, type, row, meta) {
          if (row.StatusSub == 1) {
            return 'Aktif';
          }else{
            return 'Tidak Aktif';
          }
        }
      },
      { data: 'InstruksiSoal',
        render : function (data, type, row, meta) {
          return "<button onclick='GetView(`"+row.Id_subsoal+"`,`"+row.InstruksiSoal+"`)' class='btn btn-xs btn-success'><i class='fas fa-eye'></i> View</button>"
        }
      },
			{ 
				data: 'Id_subsoal',
				render : function (data, type, row, meta) {
            var data_soal = '<a href="<?=base_url()?>Master/Soal/SubSoalDetail/'+row.Id_subsoal+'" type="button" class="btn btn-xs btn-success"><i class="fa fa-book"></i> Tambah Soal</a> || ';
            var SoalInstruksi = '<a href="<?=base_url()?>Master/Soal/SubSoalInstruksi/'+row.Id_subsoal+'" type="button" class="btn btn-xs btn-success"><i class="fa fa-book"></i> Soal Instruksi</a>';
          if (menu_akses.edit_level == 'Y') {
            var edit = '<button type="button" onclick="GetEdit(`'+row.Id_subsoal+'`)" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
          }else{
            var edit = '';
          }
          if (menu_akses.edit_level == 'Y' || menu_akses.edit_level == 'Y') {
            var pembatas2 = ' || ';
          } else {
            var pembatas2 = '';
          }
          if (menu_akses.edit_level == 'Y' && menu_akses.delete_level == 'Y') {
            var pembatas = ' || ';
          } else {
            var pembatas = '';
          }
          if (menu_akses.delete_level == 'Y') {
            var dele = '<button type="button" onclick="GetDelete(`'+row.Id_subsoal+'`)" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
          }else{
            var dele = ''
          }
					return data_soal + SoalInstruksi + pembatas2 + edit + pembatas + dele;
				}
			}
			]
		})
	});

  function GetEdit(id) {
    $.ajax({
      url : "<?=base_url()?>Master/Soal/GetDataSub",
      type : "POST",
      dataType : "JSON",
      data : {id:id},
      success : function (data) {
        $("#edit").modal("show");
        document.getElementById('id_soal_edit').value = data.Id_soal;
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
                    url: "<?php echo site_url('Master/Soal/upload_image')?>",
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
                    url: "<?php echo site_url('Master/Soal/delete_image')?>",
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
      url : "<?=base_url()?>Master/Soal/GetDataSub",
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
                    url: "<?php echo site_url('Master/Soal/upload_image')?>",
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
                    url: "<?php echo site_url('Master/Soal/delete_image')?>",
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
            url : "<?=base_url()?>Master/Soal/getSoalInstruksi",
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
                    html+= `<img src="<?=base_url()?>assets/images/soal/`+data.data.IsiSoal+`">`;
                  }else{

                  }
                  html+=
                  `</td>
                </tr>
                `;
                html += `<tr><td>`;
                
                html += `<table class='table table-borderless'><tr>`;
                data.dataIns.forEach((value, index) => {
                  if (data.dataIns[index].id_soalinstruksi == data.data[i].id_soalinstruksi) {
                    if (data.dataIns[index].TypeJawab == 1) {
                      html+= `<td>`+data.dataIns[index].KodeSoal+`. `+data.dataIns[index].IsiDetailSoal+`</td>`
                    } else if (data.dataIns[index].TypeJawab == 2) {
                      html+= `<td>`+data.dataIns[index].KodeSoal+`. <img style='max-width: 100px; max-height:100px;' src="<?=base_url()?>assets/images/soal/`+data.dataIns[index].IsiDetailSoal+`"></td>`
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