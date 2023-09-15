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
class Level extends MY_Controller
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
        $this->load->model("M_level");
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
        $data['judul'] = "Level";
        $data['DataLevel'] = $this->M_level->GetLevel();

        $this->template->backend('Level/index',$data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q = $this->db->query("SELECT * FROM tbl_userlevel where id_level = '$id'")->row();
        echo json_encode($q);
    }
    public function Tambah()
    {

        $nama_level = $this->input->post('nama_level');
        $q = $this->db->query("SELECT * FROM tbl_userlevel where nama_level = '$nama_level' ")->num_rows();
       
        if ($q <= 0) {
                $data = array(
                    'nama_level' => $this->input->post('nama_level'),
                    'CreateDate' => date("Y-m-d H:i:s"),
                    'CreateBy' => $this->session->userdata("id_user")
                );
                $this->db->insert("tbl_userlevel", $data);
                redirect("Master/level");
        }else{
            echo "<script>alert('Level Telah Ada'); window.location.href = '".base_url()."Master/level';</script>";
        }

    }

    public function Edit()
    {
        $nama_level = $this->input->post("nama_level");
        $id_level = $this->input->post("id_level");
        // $q1 = $this->db->query("SELECT * FROM tbl_userlevel where nama_level = '$nama_level' AND id_level = '$id_level' ")->num_rows();
        $q2 = $this->db->query("SELECT * FROM tbl_userlevel where nama_level = '$nama_level' ")->num_rows();

        if ($q2 > 0) {
            echo "<script>alert('Level Telah Ada'); window.location.href = '".base_url()."Master/level';</script>";
        }else{
            $data = array (
                "nama_level" => $nama_level
            );
            $this->db->where("id_level", $id_level);
            $this->db->update("tbl_userlevel", $data);
            echo "<script>alert('Berhasil Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/level';</script>";
        }
        

    }
    
    
}
