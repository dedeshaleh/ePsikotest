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
class Jabatan extends MY_Controller
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
        if (!$this->session->userdata('logStatus') == 'PsikotestLogin') {
            redirect();
        }
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->load->model("M_jabatan");
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
        $data['judul'] = "Jabatan Kandidat";
        $data['DataJabatan'] = $this->M_jabatan->GetJabatan();

        $this->template->backend('Jabatan/index',$data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q = $this->db->query("SELECT * FROM mst_jabatan where id_jabatan = '$id'")->row();
        echo json_encode($q);
    }
    public function Tambah()
    {

        $NamaJabatan = $this->input->post('NamaJabatan');
        $q = $this->db->query("SELECT * FROM mst_jabatan where NamaJabatan = '$NamaJabatan' ")->num_rows();
       
        if ($q <= 0) {
                $data = array(
                    'NamaJabatan' => $this->input->post('NamaJabatan'),
                    'CreateDate' => date("Y-m-d H:i:s"),
                    'CreateBy' => $this->session->userdata("id_user"),
                    'CreateName' => $this->session->userdata("full_name")
                );
                $this->db->insert("mst_jabatan", $data);
                redirect("Master/Jabatan");
        }else{
            echo "<script>alert('Jabatan Telah Ada'); window.location.href = '".base_url()."Master/Jabatan';</script>";
        }

    }

    public function Edit()
    {
        $NamaJabatan = $this->input->post("NamaJabatan");
        $id_jabatan = $this->input->post("id_jabatan");
        $q1 = $this->db->query("SELECT * FROM mst_jabatan where NamaJabatan = '$NamaJabatan' AND id_jabatan = '$id_jabatan' ")->num_rows();
        $q2 = $this->db->query("SELECT * FROM mst_jabatan where NamaJabatan = '$NamaJabatan' ")->num_rows();
        if ($q1 > 0) {
            $data = array (
                "StatusJabatan" => $this->input->post("StatusJabatan"),
                "UpdateDate" => date("Y-m-d H:i:s"),
                "UpdateBy" => $this->session->userdata("id_user"),
                'UpdateName' => $this->session->userdata("full_name")
            );
            $this->db->where("id_jabatan", $id_jabatan);
            $this->db->update("mst_jabatan", $data);
            echo "<script>alert('Berhasil Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Jabatan';</script>";
            
        }else{
            if ($q2 > 0) {
                echo "<script>alert('Gagal Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Jabatan';</script>";
            }else{
                $data = array (
                    "NamaJabatan" => $NamaJabatan,
                    "StatusJabatan" => $this->input->post("StatusJabatan"),
                    "UpdateDate" => date("Y-m-d H:i:s"),
                    "UpdateBy" => $this->session->userdata("id_user"),
                    'UpdateName' => $this->session->userdata("full_name")
                );
                $this->db->where("id_jabatan", $id_jabatan);
                $this->db->update("mst_jabatan", $data);
                echo "<script>alert('Berhasil Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Jabatan';</script>";
            }
        }
        

    }

    public function Del()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $this->db->where("id_jabatan", $id_jabatan);
        $this->db->delete('mst_jabatan');
        redirect("Master/Jabatan");
    }
    
    
}
