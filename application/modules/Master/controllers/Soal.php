<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * CodeIgniter-HMVC
 *
 * @package    CodeIgniter-HMVC
 * @author     N3Cr0N (N3Cr0N@list.ru)
 * @copyright  2019 N3Cr0N
 * @license    https://opensource.org/licenses/MIT  MIT License
 * @link       <URI> (description)
 * @version    GIT: $Id$
 * @since      Version 0.0.1
 * @filesource
 *
 */

// class Webcontrol extends BackendController
class Soal extends MY_Controller
{
    //
    public $CI;

    /**
     * An array of variables to be passed through to the
     * view, layout,....
     */
    protected $data = array();

    /**
     * [__construct description]
     *
     * @method __construct
     */
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        if (!$this->session->userdata('logStatus') == 'PsikotestLogin') {
            redirect();
        }
        parent::__construct();
        $this->load->model("M_soal");
        $this->load->library('upload');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function index()
    {
        // Example
       
        $data['judul'] = "Master Buku Soal";
        $data['data_soal'] = $this->M_soal->GetSoal();
        
        $data['akses'] = $this;
        $this->template->backend('soal/index',$data);
    }
    public function Data_Detail()
    {
        $q = $this->M_soal->GetSoal();
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q1 = $this->db->query("SELECT * FROM mst_soal where id_soal = '$id'")->row();
        
        echo json_encode($q1);
    }
    public function GetAkses()
    {
        $id_user = $this->input->post('id_user');
        $id_menu = $this->input->post('id_menu');
        $q = $this->db->query("SELECT * FROM tbl_akses_menu where id_user = '$id_user' AND id_menu = '$id_menu'")->row();
        echo json_encode($q);
    }
    public function get_menu($id_menu)
    {
        $q = $this->db->query("SELECT * FROM tbl_menu where id_menu = '$id_menu'")->row();
        return $q->nama_menu;
    }
    public function Tambah()
    {
        $data = array(
            'id_soal' => uniqid(true),
            'UrutanSoal' => $this->input->post('UrutanSoal'),
            'nama_soal' => $this->input->post('nama_soal'),
            'status_soal' => 1,
            'CreateDate' => Date('Y-m-d'),
            'CreateBy' => $this->session->userdata("id_user")
        );
        $this->db->insert("mst_soal", $data);
        redirect("Master/Soal");
    }

    public function Edit()
    {
        $id_soal = $this->input->post('id_soal');
        $data = array(
            'nama_soal' => $this->input->post('nama_soal'),
            'UrutanSoal' => $this->input->post('UrutanSoal'),
            'status_soal' => $this->input->post('status_soal'),
        );
        $this->db->where('id_soal', $id_soal);
        $this->db->update('mst_soal',$data);
        redirect("Master/Soal");
    }
    public function Delete()
    {
        $id_soal = $this->input->post('id_soal');
        $this->db->where('id_soal', $id_soal);
        $this->db->delete("mst_soal");
        redirect("Master/Soal");
        
    }

    // Sub Soal Start //
    public function SubSoal($id)
    {
        $q = $this->db->query("SELECT * FROM mst_soal where id_soal = '$id'")->row();
        $data['judul'] = "Master Soal Detail $q->nama_soal";
        $data['id_soal'] = $id;
        $this->template->backend('soal/V_SubSoal',$data);
    }
    public function Data_Sub()
    {
        $id_soal = $this->input->post('id_soal');
        $q = $this->M_soal->GetSubSoal($id_soal);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    function SubTambah(){
        $id_soal = $this->input->post('id_soal');
        $jam = $this->input->post('jam');
        $menit = $this->input->post('menit');
        $data = array(
            'id_subsoal' => uniqid(true),
            'id_soal' => $this->input->post('id_soal'),
            'nama_subsoal' => $this->input->post('nama_subsoal'),
            'InstruksiSoal' => $this->input->post('InstruksiSoal'),
            'StatusSub' => 1,
            'TimeSelesai' => $jam.':'.$menit.':00',
            'CreateDate' => date('Y-m-d H:i:s'),
            'CreateBy' => $this->session->userdata('id_user')
        );
        // $this->M_soal->insert_post($data);
        $this->db->insert('mst_subsoal', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Data Berhasil DiBuat
          </div>');
        redirect('Master/Soal/SubSoal/'.$id_soal);
    }
    function SubEdit(){
        $id_soal = $this->input->post('id_soal');
        $id_subsoal = $this->input->post('id_subsoal');
        $jam = $this->input->post('jam');
        $menit = $this->input->post('menit');
        $data = array(
            'nama_subsoal' => $this->input->post('nama_subsoal'),
            'InstruksiSoal' => $this->input->post('InstruksiSoal'),
            'StatusSub' => 1,
            'TimeSelesai' => $jam.':'.$menit.':00',
            'CreateDate' => date('Y-m-d H:i:s'),
            'CreateBy' => $this->session->userdata('id_user')
        );
        // $this->M_soal->insert_post($data);
        $this->db->where('Id_subsoal', $id_subsoal);
        $this->db->update('mst_subsoal', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Data Berhasil DiBuat
          </div>');
        redirect('Master/Soal/SubSoal/'.$id_soal);
    }
   //Upload image summernote
   function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }
    public function GetDataSub()
    {
        $id_subsoal = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_subsoal WHERE Id_subsoal = '$id_subsoal'")->row();
        echo json_encode($q);
    }
    public function SubDelete()
    {
        $id_soal = $this->input->post('id_soal');
        $id_subsoal = $this->input->post('id_subsoal');
        $q = $this->db->query("SELECT * FROM mst_subsoalheader WHERE id_subsoal = '$id_subsoal'")->num_rows();
        if ($q > 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            Gagal Delete Data Cek Detail Data!!
          </div>');
        }else{
            $this->db->where('Id_subsoal', $id_subsoal);
            $this->db->delete("mst_subsoal");
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Data Berhasil Di Hapus
          </div>');
        }
        
        redirect("Master/Soal/SubSoal/".$id_soal);
        
    }
    // Sub Soal End //

    // Sub Detail Start //

    public function SubSoalDetail($id)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id'")->row();
        $data['judul'] = "Master Sub Soal Detail $q->nama_subsoal";
        $data['id_subsoal'] = $q->Id_soal;
        $data['id_subsoaldetail'] = $id;
        $this->template->backend('soal/V_SubSoalDetail',$data);
    }
    public function Data_SubDetail()
    {
        $id_subsoal = $this->input->post('id_subsoal');
        $q = $this->M_soal->GetSubSoalDetail($id_subsoal);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetDataSubDetail()
    {
        $id_subsoaldetail = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_subsoalheader WHERE id_subdetail = '$id_subsoaldetail'")->row();
        echo json_encode($q);
    }
    public function GetDataSubDetailView()
    {
        $id_subsoaldetail = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_subsoaldetail WHERE id_subdetail = '$id_subsoaldetail'")->result();
        echo json_encode($q);
    }
    public function SubDetailDelete()
    {
        $id_subsoaldetail = $this->input->post('id_subsoaldetail');
        $id_subdetail = $this->input->post('id_subdetail');
        // $this->db->where('id_subdetail', $id_subdetail);
        // $this->db->delete("mst_subsoalheader");
        $this->M_soal->SubSoalHeader($id_subdetail);
        $this->M_soal->SubSoalDetail($id_subdetail);
        redirect("Master/Soal/SubSoalDetail/".$id_subsoaldetail);
        
    }
    // Sub Detail End //

    // Isi Soal Start //

    public function IsiSoal($id)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id'")->row();
        $data['judul'] = "Soal $q->nama_subsoal";
        $data['id_subsoal'] = $id;
        $this->template->backend('soal/V_IsiSoal',$data);
    }

    public function EditSoal($id)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoalheader where id_subdetail = '$id'")->row();
        $data['judul'] = "Soal $q->nama_subsoal";
        $data['id_subsoal'] = $q->id_subsoal;
        $data['id_subdetail'] = $id;
        $data['data_subsoal'] = $this->db->query("SELECT * FROM mst_subsoalheader where id_subdetail = '$id'")->row();
        $data['data_subsoaldetail'] = $this->db->query("SELECT * FROM mst_subsoaldetail where id_subdetail = '$id'")->result();
        $this->template->backend('soal/V_EditSoal',$data);
    }
    public function EditSoalInstruksi($id)
    {
        $q = $this->db->query("SELECT * FROM mst_soalinstruksiheader where id_soalinstruksi = '$id'")->row();
        // var_dump($q, $id);
        $data['judul'] = "Soal $q->nama_subsoal";
        $data['id_subsoal'] = $q->id_subsoal;
        $data['id_subdetail'] = $id;
        $data['data_subsoal'] = $this->db->query("SELECT * FROM mst_soalinstruksiheader where id_soalinstruksi = '$id'")->row();
        $data['data_subsoaldetail'] = $this->db->query("SELECT * FROM mst_soalinstruksidetail where id_soalinstruksi = '$id'")->result();
        $this->template->backend('soal/V_EditSoalInstruksi',$data);
    }
    //Upload image summernote
    function upload_soalimage(){
            if(isset($_FILES["image"]["name"])){
                $config['upload_path'] = './assets/images/soal/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('image')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/soal/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '60%';
                    $config['width']= 800;
                    $config['height']= 800;
                    $config['new_image']= './assets/images/soal/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    echo base_url().'assets/images/soal/'.$data['file_name'];
                }
            }
        }

    //Delete image summernote
    function delete_soalimage(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

    public function SimpanSoal()
    {
        
        $id_subdetail = uniqid(true);
        $id_subsoal = $this->input->post('id_subsoal');
        $TypeJawaban = $this->input->post('TypeJawaban');
        
        if ($TypeJawaban == 3) {
            
            $data_header = array(
                'id_subdetail' => $id_subdetail,
                'id_subsoal' => $this->input->post('id_subsoal'),
                'IsiSoal' => $_POST['IsiSoal'],
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'Baris' => $this->input->post('Baris'),
                'Kolom' => $this->input->post('Kolom'),
                'StatusSoal' => 1,
                'CreateDate' => date('Y-m-d H:i:s'),
                'CreateBy' => $this->session->userdata('id_user')
            );
            $this->db->insert('mst_subsoalheader', $data_header);
            
            
            for ($iz=0; $iz < count($_POST['TypeJawab']); $iz++) { 
                $data_detail = array(
                    'id_subdetail' => $id_subdetail,
                    'TypeJawab' => $_POST['TypeJawab'][$iz],
                    'KodeSoal' => $_POST['KodeSoal'][$iz],
                    'IsiDetailSoal' => $_POST['files'][$iz],
                    'Plus' => $_POST['Plus'][$iz],
                    'Minus' => $_POST['Minus'][$iz]
                );
                $this->db->insert('mst_subsoaldetail', $data_detail);
            }
            

        }else{
            // var_dump($_FILES['IsiSoal']);
            if(isset($_FILES["IsiSoal"]["name"])){
                $config['upload_path'] = './assets/images/soal/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('IsiSoal')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                    //Compress Image
                    
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/soal/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '60%';
                    $config['width']= 800;
                    $config['height']= 300;
                    $config['new_image']= './assets/images/soal/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

            }
            $data_header = array(
                'id_subdetail' => $id_subdetail,
                'id_subsoal' => $this->input->post('id_subsoal'),
                'IsiSoal' => $data['file_name'] != NULL ? $data['file_name'] : $_POST['IsiSoal'],
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'Baris' => $this->input->post('Baris'),
                'Kolom' => $this->input->post('Kolom'),
                'StatusSoal' => 1,
                'CreateDate' => date('Y-m-d H:i:s'),
                'CreateBy' => $this->session->userdata('id_user')
            );
            $this->db->insert('mst_subsoalheader', $data_header);
            // echo json_encode($_FILES["IsiDetailSoal"]['name']);
            if (is_array($_POST['files'])) {
                $ImageCount = count($_POST['files']);
            }else{
                $ImageCount = 0;
            }
            for($i = 0; $i < $ImageCount; $i++){

                $_FILES['file']['name']       = $_FILES['files']['name'][$i];
                $_FILES['file']['type']       = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name']   = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']      = $_FILES['files']['error'][$i];
                $_FILES['file']['size']       = $_FILES['files']['size'][$i];
                // File upload configuration
                $uploadPath = './assets/images/soal/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $imageData = $this->upload->data();
                    $imgname[$i] = $imageData['file_name'];
                }
                $data_detail = array(
                    'id_subdetail' => $id_subdetail,
                    'TypeJawab' => $_POST['TypeJawab'][$i],
                    'KodeSoal' => $_POST['KodeSoal'][$i],
                    'IsiDetailSoal' => isset($imgname[$i]) ? $imgname[$i] : $_POST['files'][$i],
                    'Jawaban' => $_POST['Jawaban'][$i],
                    'Score' => $_POST['Score'][$i]
                );
                $this->db->insert('mst_subsoaldetail', $data_detail);

            }
        }
        
        redirect("Master/Soal/SubSoalDetail/".$id_subsoal);
    }

    public function SimpanEditSoal()
    {
        // var_dump($_POST['Jawaban']);
        // var_dump($_POST['KodeSoal']);
        // exit();
        $id_subdetail = $this->input->post('id_subdetail');
        $id_subsoal = $this->input->post('id_subsoal');
        
        if ($_POST['IsiSoal'] == NULL AND $_FILES['IsiSoal']['name'] == NULL) {
            $data_header = array(
                'id_subdetail' => $id_subdetail,
                'id_subsoal' => $this->input->post('id_subsoal'),
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'Baris' => $this->input->post('Baris'),
                'Kolom' => $this->input->post('Kolom'),
                'StatusSoal' => 1,
                'UpdateDate' => date('Y-m-d H:i:s'),
                'UpdateBy' => $this->session->userdata('id_user')
            );
        }else{
            if(isset($_FILES["IsiSoal"]["name"])){
                $config['upload_path'] = './assets/images/soal/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('IsiSoal')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                    //Compress Image
                    
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/soal/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '60%';
                    $config['width']= 800;
                    $config['height']= 300;
                    $config['new_image']= './assets/images/soal/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
    
            }
            $data_header = array(
                'id_subdetail' => $id_subdetail,
                'id_subsoal' => $this->input->post('id_subsoal'),
                'IsiSoal' => $data['file_name'] != NULL ? $data['file_name'] : $_POST['IsiSoal'],
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'Baris' => $this->input->post('Baris'),
                'Kolom' => $this->input->post('Kolom'),
                'StatusSoal' => 1,
                'UpdateDate' => date('Y-m-d H:i:s'),
                'UpdateBy' => $this->session->userdata('id_user')
            );
        }
        $this->M_soal->UpdateSoalHeader($id_subdetail, $data_header);
        $this->M_soal->SubSoalDetail($id_subdetail);

        if (is_array($_POST['files'])) {
            $ImageCount = count($_POST['files']);
        }else{
            $ImageCount = 0;
        }
        for($i = 0; $i < $ImageCount; $i++){
        
            $_FILES['file']['name']       = $_FILES['files']['name'][$i];
            $_FILES['file']['type']       = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['files']['error'][$i];
            $_FILES['file']['size']       = $_FILES['files']['size'][$i];
            // File upload configuration
            $uploadPath = './assets/images/soal/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $imgname[$i] = $imageData['file_name'];
            }
            $data_detail = array(
                'id_subdetail' => $id_subdetail,
                'TypeJawab' => $_POST['TypeJawab'][$i],
                'KodeSoal' => $_POST['KodeSoal'][$i],
                'IsiDetailSoal' => isset($imgname[$i]) ? $imgname[$i] : $_POST['files'][$i],
                'Jawaban' => $_POST['Jawaban'][$i],
                'Score' => $_POST['Score'][$i],
            );
            $this->db->insert('mst_subsoaldetail', $data_detail);
        
        }

        redirect("Master/Soal/SubSoalDetail/".$id_subsoal);
    }
    // Isi Soal END //
    
    
    // Start Sub Instruksi Soal //

    public function SubSoalInstruksi($id)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id'")->row();
        $data['judul'] = "Master Sub Soal Detail $q->nama_subsoal";
        $data['id_subsoal'] = $q->Id_soal;
        $data['id_subsoaldetail'] = $id;
        $this->template->backend('soal/V_SubSoalInstruksi',$data);
    }
    public function Data_SubSoalInstruksi()
    {
        $id_subsoal = $this->input->post('id_subsoal');
        $q = $this->M_soal->GetSubSoalInstruksi($id_subsoal);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetDataSubInstruksi()
    {
        $id_subsoaldetail = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_soalinstruksiheader WHERE id_soalinstruksi = '$id_subsoaldetail'")->row();
        echo json_encode($q);
    }
    public function IsiInstruksi($id)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id'")->row();
        $data['judul'] = "Soal $q->nama_subsoal";
        $data['id_subsoal'] = $id;
        $this->template->backend('soal/V_IsiInstruksi',$data);
    }
    public function SimpanSoalInstruksi()
    {
        
        $id_subdetail = uniqid(true);
        $id_subsoal = $this->input->post('id_subsoal');
        // var_dump($_FILES['IsiSoal']);
        if(isset($_FILES["IsiSoal"]["name"])){
            $config['upload_path'] = './assets/images/soal/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('IsiSoal')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/soal/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 300;
                $config['new_image']= './assets/images/soal/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            }

        }
        $data_header = array(
            'id_soalinstruksi' => $id_subdetail,
            'id_subsoal' => $this->input->post('id_subsoal'),
            'IsiSoal' => $data['file_name'] != NULL ? $data['file_name'] : $_POST['IsiSoal'],
            'TypeSoal' => $this->input->post('TypeSoal'),
            'TypeJawaban' => $this->input->post('TypeJawaban'),
            'TypePilihan' => $this->input->post('TypePilihan'),
            'StatusSoal' => 1,
            'CreateDate' => date('Y-m-d H:i:s'),
            'CreateBy' => $this->session->userdata('id_user')
        );
        $this->db->insert('mst_soalinstruksiheader', $data_header);
        // echo json_encode($_FILES["IsiDetailSoal"]['name']);
        if (is_array($_POST['files'])) {
            $ImageCount = count($_POST['files']);
        }else{
            $ImageCount = 0;
        }
        for($i = 0; $i < $ImageCount; $i++){
        
            $_FILES['file']['name']       = $_FILES['files']['name'][$i];
            $_FILES['file']['type']       = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['files']['error'][$i];
            $_FILES['file']['size']       = $_FILES['files']['size'][$i];
            // File upload configuration
            $uploadPath = './assets/images/soal/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $imgname[$i] = $imageData['file_name'];
            }
            $data_detail = array(
                'id_soalinstruksi' => $id_subdetail,
                'TypeJawab' => $_POST['TypeJawab'][$i],
                'KodeSoal' => $_POST['KodeSoal'][$i],
                'KetJawaban' => $_POST['KetJawaban'][$i],
                'IsiDetailSoal' => isset($imgname[$i]) ? $imgname[$i] : $_POST['files'][$i],
                'Jawaban' => $_POST['Jawaban'][$i],
                'Score' => $_POST['Score'][$i]
            );
            $this->db->insert('mst_soalinstruksidetail', $data_detail);
        
        }
        redirect("Master/Soal/SubSoalInstruksi/".$id_subsoal);
    }
    public function SimpanEditSoalInstruksi()
    {
        
        $id_subdetail = $this->input->post('id_subdetail');;
        $id_subsoal = $this->input->post('id_subsoal');
        // var_dump($_FILES['IsiSoal']);
        // var_dump($_FILES["IsiSoal"]["name"]);
        // exit();
        if ($_FILES["IsiSoal"]["name"] == null) {
            $data_header = array(
                
                'id_subsoal' => $this->input->post('id_subsoal'),
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'StatusSoal' => 1,
                'UpdateDate' => date('Y-m-d H:i:s'),
                'UpdateBy' => $this->session->userdata('id_user')
            );
        }else{
            if(isset($_FILES["IsiSoal"]["name"])){
                $config['upload_path'] = './assets/images/soal/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('IsiSoal')){
                    $this->upload->display_errors();
                    return FALSE;
                }else{
                    $data = $this->upload->data();
                    //Compress Image
                    
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/soal/'.$data['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= TRUE;
                    $config['quality']= '60%';
                    $config['width']= 800;
                    $config['height']= 300;
                    $config['new_image']= './assets/images/soal/'.$data['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
    
            }
            $data_header = array(
                
                'id_subsoal' => $this->input->post('id_subsoal'),
                'IsiSoal' => $data['file_name'] != NULL ? $data['file_name'] : $_POST['IsiSoal'],
                'TypeSoal' => $this->input->post('TypeSoal'),
                'TypeJawaban' => $this->input->post('TypeJawaban'),
                'TypePilihan' => $this->input->post('TypePilihan'),
                'StatusSoal' => 1,
                'UpdateDate' => date('Y-m-d H:i:s'),
                'UpdateBy' => $this->session->userdata('id_user')
            );
        }
        
        $this->M_soal->UpdateHeaderInstruksi($id_subdetail, $data_header);
        $this->M_soal->DeleteDetailInstruksi($id_subdetail);
        // $this->db->insert('mst_soalinstruksiheader', $data_header);
        // echo json_encode($_FILES["IsiDetailSoal"]['name']);
        if (is_array($_POST['files'])) {
            $ImageCount = count($_POST['files']);
        }else{
            $ImageCount = 0;
        }
        for($i = 0; $i < $ImageCount; $i++){
        
            $_FILES['file']['name']       = $_FILES['files']['name'][$i];
            $_FILES['file']['type']       = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['files']['error'][$i];
            $_FILES['file']['size']       = $_FILES['files']['size'][$i];
            // File upload configuration
            $uploadPath = './assets/images/soal/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $imgname[$i] = $imageData['file_name'];
            }
            $data_detail = array(
                'id_soalinstruksi' => $id_subdetail,
                'TypeJawab' => $_POST['TypeJawab'][$i],
                'KodeSoal' => $_POST['KodeSoal'][$i],
                'IsiDetailSoal' => isset($imgname[$i]) ? $imgname[$i] : $_POST['files'][$i],
                'KetJawaban' => $_POST['KetJawaban'][$i],
                'Jawaban' => $_POST['Jawaban'][$i],
                'Score' => $_POST['Score'][$i]
            );
            $this->db->insert('mst_soalinstruksidetail', $data_detail);
        
        }
        redirect("Master/Soal/SubSoalInstruksi/".$id_subsoal);
    }
    public function getSoalInstruksi()
    {
        $Id_subsoal = $this->input->post("Id_subsoal");
        $q = $this->db->query("SELECT * FROM mst_soalinstruksiheader where id_subsoal = '$Id_subsoal'")->result();
        $q2 = $this->db->query("SELECT * FROM mst_soalinstruksidetail")->result();
        $data = array("data" => $q, "dataIns" => $q2);
        echo json_encode($data);
    }

    public function SubDetailInstruksiDelete()
    {
        $id_soalinstruksi = $this->input->post('id_subdetail');
        $id_subsoal = $this->input->post('id_subsoaldetail');
        $this->db->where('id_soalinstruksi', $id_soalinstruksi);
        $this->db->delete('mst_soalinstruksiheader');
        $this->M_soal->DeleteDetailInstruksi($id_soalinstruksi);
        redirect("Master/Soal/SubSoalInstruksi/".$id_subsoal);
    }
    // Stop Sub Instruksi //
    
}
