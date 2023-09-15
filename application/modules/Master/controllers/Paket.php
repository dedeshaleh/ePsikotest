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
class Paket extends MY_Controller
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
        $this->load->model("M_Paket");
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
       
        $data['judul'] = "Master Paket Soal";
        $data['data_soal'] = $this->M_Paket->GetPaket();
        
        $data['akses'] = $this;
        $this->template->backend('Paket/index',$data);
    }
    public function Data_Detail()
    {
        $q = $this->M_Paket->GetPaket();
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q1 = $this->db->query("SELECT * FROM mst_paketheader where IdPaket = '$id'")->row();
        
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
        date_default_timezone_set("Asia/Jakarta");

        $NamaPaket = $this->input->post('NamaPaket');
        $q = $this->db->query("SELECT * FROM mst_paketheader where NamaPaket = '$NamaPaket'")->num_rows();
        $data = array(
            'IdPaket' => uniqid(true),
            'NamaPaket' => $this->input->post('NamaPaket'),
            'NotePaket' => $this->input->post('NotePaket'),
            'StatusPaket' => 1,
            'DateCreated' => Date('Y-m-d H:i:s'),
            'UserCreated' => $this->session->userdata("id_user"),
            'UsernameCreated' => $this->session->userdata("full_name")
        );
        if ($q > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                Paket Gagal DiBuat Nama Paket Sudah Ada
            </div>');            
        }else{

            $this->db->insert("mst_paketheader", $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                Paket Berhasil DiBuat
            </div>');

        }
        
        redirect("Master/Paket");
    }

    public function Edit()
    {
        date_default_timezone_set("Asia/Jakarta");

        $IdPaket = $this->input->post('IdPaket');
        $NamaPaket = $this->input->post('NamaPaket');
        $q = $this->db->query("SELECT * FROM mst_paketheader where NamaPaket = '$NamaPaket' AND IdPaket = '$IdPaket'")->num_rows();

        if ($q > 0) {
            $data = array(
                'NotePaket' => $this->input->post('NotePaket'),
                'StatusPaket' => $this->input->post('StatusPaket'),
                'DateModified' => Date('Y-m-d H:i:s'),
                'UserModified' => $this->session->userdata("id_user"),
                'UsernameModified' => $this->session->userdata("full_name")
            );
            
        }else{
            $q3 = $this->db->query("SELECT * FROM mst_paketheader where NamaPaket = '$NamaPaket'")->num_rows();
            if ($q3 > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                    Paket Gagal DiBuat Nama Paket Sudah Ada
                </div>');
            }else{
                $data = array(
                    'NamaPaket' => $this->input->post('NamaPaket'),
                    'NotePaket' => $this->input->post('NotePaket'),
                    'StatusPaket' => $this->input->post('StatusPaket'),
                    'DateModified' => Date('Y-m-d H:i:s'),
                    'UserModified' => $this->session->userdata("id_user"),
                    'UsernameModified' => $this->session->userdata("full_name")
                );
            }
        }
        
        $this->db->where('IdPaket', $IdPaket);
        $this->db->update('mst_paketheader',$data);
        redirect("Master/Paket");
    }
    public function Delete()
    {
        date_default_timezone_set("Asia/Jakarta");

        $IdPaket = $this->input->post('IdPaket');
        $data = array(
            'StatusPaket' => 0,
            'DateModified' => Date('Y-m-d H:i:s'),
            'UserModified' => $this->session->userdata("id_user"),
            'UsernameModified' => $this->session->userdata("full_name")
        );
        $this->db->where('IdPaket', $IdPaket);
        $this->db->update('mst_paketheader', $data);
        // $this->M_Paket->delHeaderPaket($IdPaket);
        // $this->M_Paket->delDetailPaket($IdPaket);
        
        redirect("Master/Paket");
        
    }

    // Sub Soal Start //
    public function SubPaket($id)
    {
        $q = $this->db->query("SELECT * FROM mst_paketheader where IdPaket = '$id'")->row();
        $data['judul'] = "Master Paket Soal $q->NamaPaket";
        $data['IdPaket'] = $id;
        $data['Soal'] = $this->db->query("SELECT * FROM mst_soal")->result();
        $this->template->backend('Paket/V_SubPaket',$data);
    }
    public function Data_Sub()
    {
        $IdPaket = $this->input->post('IdPaket');
        $q = $this->M_Paket->GetSubPaket($IdPaket);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    function TambahSub(){
        date_default_timezone_set("Asia/Jakarta");

        $IdSoal = $this->input->post('IdSoal');
        $IdPaket = $this->input->post('IdPaket');
        $q = $this->db->query("SELECT * FROM mst_soal where id_soal = '$IdSoal'")->row();
        $q2 = $this->db->query("SELECT * FROM mst_paketdetail where IdSoal = '$IdSoal' AND IdPaket = '$IdPaket' AND StatusDelete != '1' ")->num_rows();
        $data = array(
            'IdPaketDet' => uniqid(true),
            'IdPaket' => $this->input->post('IdPaket'),
            'IdSoal' => $IdSoal,
            'NamaSoal' => $q->nama_soal,
            'DateCreated' => date('Y-m-d H:i:s'),
            'UserCreated' => $this->session->userdata('full_name')
        );
        if ($q2 > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                Data Gagal ditambahkan Data Sudah Ada
            </div>');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                Data Berhasil ditambahkan
            </div>');
            $this->db->insert('mst_paketdetail', $data);

        }
        
        // $this->M_Paket->insert_post($data);
        
        redirect('Master/Paket/SubPaket/'.$IdPaket);
    }
    public function GetDataSub()
    {
        $id_subsoal = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_subsoal WHERE Id_subsoal = '$id_subsoal'")->row();
        echo json_encode($q);
    }
    public function SubDelete($IdPaketDet, $IdPaket)
    {
            date_default_timezone_set("Asia/Jakarta");
            $data = array(
                'StatusDelete' => 1,
                'DateDelete' => date('Y-m-d H:i:s'),
                'UserDelete' => $this->session->userdata('full_name')

            );
            $this->db->where('IdPaketDet', $IdPaketDet);
            $this->db->update("mst_paketdetail", $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                Data Berhasil Di Hapus
            </div>');
        
        redirect("Master/Paket/SubPaket/".$IdPaket);
        
    }
    // Sub Soal End //

    
}
