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
class Divisi extends MY_Controller
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
        $this->load->model("M_divisi");
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
        $data['judul'] = "Divisi Kandidat";
        $data['DataDivisi'] = $this->M_divisi->GetDivisi();

        $this->template->backend('Divisi/index',$data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q = $this->db->query("SELECT * FROM mst_divisi where idDivisi = '$id'")->row();
        echo json_encode($q);
    }
    public function Tambah()
    {

        $NamaDivisi = $this->input->post('NamaDivisi');
        $q = $this->db->query("SELECT * FROM mst_divisi where NamaDivisi = '$NamaDivisi' ")->num_rows();
       
        if ($q <= 0) {
                $data = array(
                    'NamaDivisi' => $this->input->post('NamaDivisi'),
                    'CreateDate' => date("Y-m-d H:i:s"),
                    'CreateBy' => $this->session->userdata("id_user"),
                    'CreateName' => $this->session->userdata("full_name")
                );
                $this->db->insert("mst_divisi", $data);
                redirect("Master/Divisi");
        }else{
            echo "<script>alert('Divisi Telah Ada'); window.location.href = '".base_url()."Master/Divisi';</script>";
        }

    }

    public function Edit()
    {
        $NamaDivisi = $this->input->post("NamaDivisi");
        $idDivisi = $this->input->post("idDivisi");
        $q1 = $this->db->query("SELECT * FROM mst_divisi where NamaDivisi = '$NamaDivisi' AND idDivisi = '$idDivisi' ")->num_rows();
        $q2 = $this->db->query("SELECT * FROM mst_divisi where NamaDivisi = '$NamaDivisi' ")->num_rows();
        if ($q1 > 0) {
            $data = array (
                "StatusDivisi" => $this->input->post("StatusDivisi"),
                "UpdateDate" => date("Y-m-d H:i:s"),
                "UpdateBy" => $this->session->userdata("id_user"),
                'UpdateName' => $this->session->userdata("full_name")
            );
            $this->db->where("idDivisi", $idDivisi);
            $this->db->update("mst_divisi", $data);
            echo "<script>alert('Berhasil Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Divisi';</script>";
            
        }else{
            if ($q2 > 0) {
                echo "<script>alert('Gagal Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Divisi';</script>";
            }else{
                $data = array (
                    "NamaDivisi" => $NamaDivisi,
                    "StatusDivisi" => $this->input->post("StatusDivisi"),
                    "UpdateDate" => date("Y-m-d H:i:s"),
                    "UpdateBy" => $this->session->userdata("id_user"),
                    'UpdateName' => $this->session->userdata("full_name")
                );
                $this->db->where("idDivisi", $idDivisi);
                $this->db->update("mst_divisi", $data);
                echo "<script>alert('Berhasil Di Edit oleh ".$this->session->userdata('full_name')."'); window.location.href = '".base_url()."Master/Divisi';</script>";
            }
        }
        
        

    }

    public function Del()
    {
        $idDivisi = $this->input->post('idDivisi');
        $this->db->where("idDivisi", $idDivisi);
        $this->db->delete('mst_divisi');
        redirect("Master/Divisi");
    }
    
    
}
