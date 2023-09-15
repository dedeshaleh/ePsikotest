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
class Dashboard extends MY_Controller
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
        if (!$this->session->userdata('logged_in')) {
            redirect();
        };
        if (!$this->session->userdata('logStatus')) {
            redirect();
        };
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->load->model("M_Dashboard");
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
        $data['judul'] = "Dashboard";
        $data['TotalKandidat'] = $this->db->query("SELECT * FROM tbl_kandidat WHERE StatusKandidat = 0")->num_rows();
        $data['TotalLulus'] = $this->db->query("SELECT * FROM tbl_kandidat WHERE StatusLulus = 1")->num_rows();
        $data['TotalTidakLulus'] = $this->db->query("SELECT * FROM tbl_kandidat WHERE StatusLulus = 2")->num_rows();
        $data['TotalDipertimbangkan'] = $this->db->query("SELECT * FROM tbl_kandidat WHERE StatusLulus = 3")->num_rows();
        $this->template->backend('index', $data);
    }

    public function GetDataPerbulan()
    {
        $json = file_get_contents("php://input"); // json string
        $object = json_decode($json); // php object
        
        $q = $this->db->query("SELECT 
        COUNT(IF(MONTH(a.CreateDate) = 1, 1, NULL)) AS Jan, 
        COUNT(IF(MONTH(a.CreateDate) = 2, 1, NULL)) AS Feb,
        COUNT(IF(MONTH(a.CreateDate) = 3, 1, NULL)) AS Mar,
        COUNT(IF(MONTH(a.CreateDate) = 4, 1, NULL)) AS Apr,
        COUNT(IF(MONTH(a.CreateDate) = 5, 1, NULL)) AS Mei,
        COUNT(IF(MONTH(a.CreateDate) = 6, 1, NULL)) AS Jun,
        COUNT(IF(MONTH(a.CreateDate) = 7, 1, NULL)) AS Jul,
        COUNT(IF(MONTH(a.CreateDate) = 8, 1, NULL)) AS Aug,
        COUNT(IF(MONTH(a.CreateDate) = 9, 1, NULL)) AS Sep,
        COUNT(IF(MONTH(a.CreateDate) = 10, 1, NULL)) AS Okt,
        COUNT(IF(MONTH(a.CreateDate) = 11, 1, NULL)) AS Nov,
        COUNT(IF(MONTH(a.CreateDate) = 12, 1, NULL)) AS Des
        FROM tbl_kandidat a
        WHERE YEAR(a.CreateDate) = $object->Tahun")->row();
        
        echo json_encode($q);
    }
    
}
