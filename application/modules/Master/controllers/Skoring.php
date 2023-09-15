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
class Skoring extends MY_Controller
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
        $this->load->model("M_Skoring");
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
       
        $data['judul'] = "Master Skoring";
        $data['DataSkoring'] = $this->M_Skoring->GetSkoring();
        
        $data['akses'] = $this;
        $this->template->backend('Skoring/index',$data);
    }
    public function Data_Detail()
    {
        $q = $this->M_Skoring->GetSkoring();
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetData()
    {
        $id = $this->input->post("id");
        $q1 = $this->db->query("SELECT * FROM mst_skoring where IdSkoring = '$id'")->row();
        
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
            'IdSkoring' => uniqid(true),
            'NamaSkoring' => $this->input->post('NamaSkoring'),
            'StatusSkoring' => 1,
            'CreateDate' => Date('Y-m-d'),
            'CreateBy' => $this->session->userdata("id_user"),
            'CreateName' => $this->session->userdata("full_name"),
        );
        $this->db->insert("mst_skoring", $data);
        redirect("Master/Skoring");
    }

    public function Edit()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $data = array(
            'NamaSkoring' => $this->input->post('NamaSkoring'),
            'StatusSkoring' => $this->input->post('StatusSkoring'),
            'UpdateDate' => Date('Y-m-d'),
            'UpdateBy' => $this->session->userdata("id_user"),
            'UpdateName' => $this->session->userdata("full_name"),
        );
        $this->db->where('IdSkoring', $IdSkoring);
        $this->db->update('mst_skoring',$data);
        redirect("Master/Skoring");
    }
    public function Delete()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $this->db->where('IdSkoring', $IdSkoring);
        $this->db->delete("mst_skoring");
        redirect("Master/Skoring");
        
    }

    // Sub Skring Start //
    public function SubSkoring($id)
    {
        $q = $this->db->query("SELECT * FROM mst_skoring where IdSkoring = '$id'")->row();
        $data['judul'] = "Master Skoring Detail $q->NamaSkoring";
        $data['IdSkoring'] = $id;
        $this->template->backend('Skoring/V_SubSkoring',$data);
    }
    public function Data_Skoring()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $q = $this->M_Skoring->GetSubSkor($IdSkoring);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    function SkorTambah(){
        $IdSkoring = $this->input->post('IdSkoring');
        $data = array(
            'IdHeaderSkor' => uniqid(true),
            'IdSkoring' => $this->input->post('IdSkoring'),
            'NamaSkorHeader' => $this->input->post('NamaSkorHeader'),
            'UmurMin' => $this->input->post('UmurMin'),
            'UmurMax' => $this->input->post('UmurMax'),
            'StatusSkorHeader' => $this->input->post('StatusSkorHeader'),
            'CreateDate' => date('Y-m-d H:i:s'),
            'CreateBy' => $this->session->userdata('id_user'),
            'CreateName' => $this->session->userdata('full_name')
        );
        // $this->M_Skoring->insert_post($data);
        $this->db->insert('mst_skoringheader', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            Data Berhasil DiBuat
          </div>');
        redirect('Master/Skoring/SubSkoring/'.$IdSkoring);
    }

    function SkorEdit(){
        $IdSkoring = $this->input->post('IdSkoring');
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $data = array(
            'IdSkoring' => $this->input->post('IdSkoring'),
            'NamaSkorHeader' => $this->input->post('NamaSkorHeader'),
            'UmurMin' => $this->input->post('UmurMin'),
            'UmurMax' => $this->input->post('UmurMax'),
            'StatusSkorHeader' => $this->input->post('StatusSkorHeader'),
            'UpdateDate' => date('Y-m-d H:i:s'),
            'UpdateBy' => $this->session->userdata('id_user'),
            'UpdateName' => $this->session->userdata('full_name')
        );
        // $this->M_Skoring->insert_post($data);
        $this->db->where("IdHeaderSkor", $IdHeaderSkor);
        $this->db->update('mst_skoringheader', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
            Data Berhasil DiEdit
          </div>');
        redirect('Master/Skoring/SubSkoring/'.$IdSkoring);
    }
    
  
    public function GetDataSub()
    {
        $IdHeaderSkor = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_skoringheader WHERE IdHeaderSkor = '$IdHeaderSkor'")->row();
        echo json_encode($q);
    }
    public function SkorDelete()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $this->M_Skoring->DelSkorHeader($IdHeaderSkor);
        $this->M_Skoring->DelSkorDetail($IdHeaderSkor);
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
            Data Berhasil Di Hapus
          </div>');
        
          redirect('Master/Skoring/SubSkoring/'.$IdSkoring);
        
    }
    // Sub Soal End //

    // Sub Detail Start //

    public function SubSkorDetail($id)
    {
        $q = $this->db->query("SELECT * FROM mst_skoringheader where IdHeaderSkor = '$id'")->row();
        $data['judul'] = "Master Sub Skor Detail $q->NamaSkorHeader";
        $data['IdSkoring'] = $q->IdSkoring;
        $data['IdHeaderSkor'] = $id;
        $this->template->backend('Skoring/V_SubSkorDetail',$data);
    }
    public function DataSkoringDetail()
    {
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $q = $this->M_Skoring->GetSubSkorDetail($IdHeaderSkor);
        $data = array(
            'data' => $q,
        );
        echo json_encode($data);
    }
    public function GetDataSubDetail()
    {
        $IdDetailSkor = $this->input->post('id');
        $q = $this->db->query("SELECT * FROM mst_skoringdetail WHERE IdDetailSkor = '$IdDetailSkor'")->row();
        echo json_encode($q);
    }
    public function SubDetailDelete()
    {
        $id_subsoaldetail = $this->input->post('id_subsoaldetail');
        $id_subdetail = $this->input->post('id_subdetail');
        // $this->db->where('id_subdetail', $id_subdetail);
        // $this->db->delete("mst_subsoalheader");
        $this->M_Skoring->SubSoalHeader($id_subdetail);
        $this->M_Skoring->SubSoalDetail($id_subdetail);
        redirect("Master/Soal/SubSoalDetail/".$id_subsoaldetail);
        
    }
    public function DetailTambah()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $data = array(
            'IdSkoring' => $IdSkoring,
            'IdHeaderSkor' => $IdHeaderSkor,
            'IdDetailSkor' => uniqid(true),
            'TypeSkoring' => $this->input->post("TypeSkoring"),
            'AngkaSkor1' => $this->input->post("AngkaSkor1"),
            'AngkaSkor2' => $this->input->post("AngkaSkor2"),
            'HasilSkor' => $this->input->post("HasilSkor"),
            'CreateDate' => date('Y-m-d H:i:s'),
            'CreateBy' => $this->session->userdata('id_user'),
            'CreateName' => $this->session->userdata('full_name')
        );
        $this->db->insert('mst_skoringdetail', $data);
        redirect("Master/Skoring/SubSkorDetail/".$IdHeaderSkor);
    }
    public function DetailEdit()
    {
        $IdSkoring = $this->input->post('IdSkoring');
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $IdDetailSkor = $this->input->post('IdDetailSkor');
        $data = array(
            'IdSkoring' => $IdSkoring,
            'IdHeaderSkor' => $IdHeaderSkor,
            'TypeSkoring' => $this->input->post("TypeSkoring"),
            'AngkaSkor1' => $this->input->post("AngkaSkor1"),
            'AngkaSkor2' => $this->input->post("AngkaSkor2"),
            'HasilSkor' => $this->input->post("HasilSkor"),
            'UpdateDate' => date('Y-m-d H:i:s'),
            'UpdateBy' => $this->session->userdata('id_user'),
            'UpdateName' => $this->session->userdata('full_name')
        );
        $this->db->where('IdDetailSkor', $IdDetailSkor);
        $this->db->update('mst_skoringdetail', $data);
        redirect("Master/Skoring/SubSkorDetail/".$IdHeaderSkor);
    }
    public function DetailDelete()
    {
        $IdHeaderSkor = $this->input->post('IdHeaderSkor');
        $IdDetailSkor = $this->input->post('IdDetailSkor');
        $this->db->where('IdDetailSkor', $IdDetailSkor);
        $this->db->delete('mst_skoringdetail');
        redirect("Master/Skoring/SubSkorDetail/".$IdHeaderSkor);
    }
    // Sub Detail End //

    
}
