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
class PengisianSoal extends MY_Controller
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
        if (!$this->session->userdata('logStatus')) {
            redirect();
        };
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->load->model("M_DataSoal");
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
        $data['judul'] = "Data Soal";
        $data['DataSoal'] = $this->M_DataSoal->GetBooks();
        $data['control'] = $this;
        // $data['data_level'] = $this->db->query("SELECT * FROM tbl_userlevel")->result();
        $this->template->backend('DataSoal/index',$data);
    }
    public function GetSubSoal($id_soal)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_soal = '$id_soal'")->result();
        return $q;
    }
    public function GetDetailSoal($id_subsoal)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoalheader where id_subsoal = '$id_subsoal'")->result();
        return $q;
    }
    
}
