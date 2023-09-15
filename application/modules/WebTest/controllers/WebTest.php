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
class WebTest extends MY_Controller
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
        parent::__construct();
        $this->load->model("M_login");
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
        $data["judul"] = "Paramount";
        $this->load->view('index', $data);
    }
    function login()
    {
        date_default_timezone_set("Asia/Jakarta");
    //  var_dump('test');die();
        $this->_validate();
        //cek NoPeserta database
        $NoPeserta = anti_injection($this->input->post('NoPeserta'));
        $NoTelp = anti_Injection($this->input->post('NoTelp'));
        $db = $this->M_login->check_db($NoPeserta,$NoTelp)->row();
        if($db==1) {

            
            $Token = hash("sha1",$db->IdKandidat.date("Y-m-d H:i:s"));
            if ($db->TokenTest != null) {
                $DataLogLogin = array(
                    "IdKandidat" => $db->IdKandidat,
                    "WaktuMengerjakan" => $db->WaktuMengerjakan,
                    "NoPeserta" => ucfirst($db->NoPeserta),
                    "NamaKandidat" => ucfirst($db->NamaKandidat),
                    'WaktuLogin' => date("Y-m-d H:i:s"),
                    'Token' => $db->TokenTest
                );
                $this->db->insert("tbl_kandidat_login", $DataLogLogin);
            }else{
                $DataToken = array(
                    'TokenTest' => $Token,
                    "CreateToken" => date("Y-m-d H:i:s")
    
                );
                $this->db->where("IdKandidat", $db->IdKandidat);
                $this->db->update('tbl_kandidat', $DataToken);

                $DataLogLogin = array(
                    "IdKandidat" => $db->IdKandidat,
                    "NoPeserta" => ucfirst($db->NoPeserta),
                    "NamaKandidat" => ucfirst($db->NamaKandidat),
                    'WaktuLogin' => date("Y-m-d H:i:s"),
                    'Token' => $Token
                );
                $this->db->insert("tbl_kandidat_login", $DataLogLogin);
            }
            $apl = $this->M_login->Aplikasi()->row();

            $timeawal = $db->TglTest.' 08:00:00';
            $timeakhir = $db->TglTest.' 17:00:00';
            $finawal = strtotime($timeawal);
            $finakhir = strtotime($timeakhir. ' +2 days');
            $finnow = time();
            
            if (($finawal <= $finnow) && ($finnow <= $finakhir)) {
                if($db) {

                    //cek NoPeserta dan NoTelp yg ada di database
                        $userdata = array(
                            'IdKandidat'  => $db->IdKandidat,
                            'NoPeserta'    => ucfirst($db->NoPeserta),
                            'NamaKandidat'   => ucfirst($db->NamaKandidat),
                            'NoTelp'    => $db->NoTelp,
                            'IdPaket'    => $db->IdPaket,
                            'TglTest'    => $db->TglTest,
                            'aplikasi'    => $apl->nama_aplikasi,
                            'title'       => $apl->title,
                            'logo'        => $apl->logo,
                            'nama_owner'     => $apl->nama_owner,
                            'image'       => $db->image,
                            'Token'       => $db->TokenTest,
                            'logged_in'    => TRUE,
                            'logStatus'    => "PsikotestLogin"
                        );
                        $this->session->set_userdata($userdata);
                        $data['status'] = TRUE;
                        echo json_encode($data);
                    }else{
        
                        $data['pesan'] = "No Peserta atau No Telephone Salah!";
                        $data['error'] = TRUE;
                        echo json_encode($data);
                    }
            }else{
                $data['pesan'] = "Maaf Tanggal Test Anda Sudah Lewat Atau Belum Mulai Testnya, Mohon Contact Admin!";
                $data['error'] = TRUE;
                echo json_encode($data);
                
            }
            
        }else{
            $data['pesan'] = "No Peserta atau No Telephone belum terdaftar!";
            $data['error'] = TRUE;
            echo json_encode($data);
        }
        
    }

    public function logout()
    {

        date_default_timezone_set("Asia/Jakarta");
        $this->session->sess_destroy();
        $this->load->driver('cache');
        $this->cache->clean();
        ob_clean();
        redirect('WebTest');
    }

    private function _validate()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('NoPeserta') == '')
        {
            $data['inputerror'][] = 'NoPeserta';
            $data['error_string'][] = 'No Peserta is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('NoTelp') == '')
        {
            $data['inputerror'][] = 'NoTelp';
            $data['error_string'][] = 'No Telephone is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function UploadImage($Id_soal, $Id_subsoal)
    {
        date_default_timezone_set("Asia/Jakarta");
        // new filename
        $filename = 'pic_'.date('YmdHis') . '.jpeg';

        $url = '';
        if( move_uploaded_file($_FILES['webcam']['tmp_name'],'uploads/pesertaCam/'.$filename) ){
        $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
        }
        $DataArray = array(
            'IdKandidat' => $this->session->userdata("IdKandidat"),
            'IdCam' => uniqid(true),
            'FileCam' => $filename,
            'CreateDate' => date("Y-m-d H-i-s"),
            'id_subsoal' => $Id_subsoal,
            'id_soal' => $Id_soal

        );
        $this->db->insert('tbl_kandidat_cam', $DataArray);
        // Return image url
        // echo $url;
    }
}
