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
class PengerjaanSoal extends MY_Controller
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
        $this->load->model("M_Pengerjaan");
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
        $data["judul"] = "";
        $data['DataWelcome'] = $this->db->query("SELECT * FROM tbl_welcome ORDER BY UpdateDate DESC LIMIT 1")->row();
        $data['DataSoal'] = $this->db->query("SELECT * FROM mst_soal WHERE status_soal = '1'")->result();
        $this->template->Soal('Test/Welcome', $data);
    }
    public function CekSub($id_soal)
    {
        $data["judul"] = "Data Sub Soal";
        $data['Soal'] = $this->db->query("SELECT * FROM mst_soal where id_soal = '$id_soal'")->row();
        $data['DataSubSoal'] = $this->db->query("SELECT * FROM mst_subsoal WHERE StatusSub = '1' AND Id_soal = '$id_soal'")->result();
        $this->template->Soal('Test/V_Sub', $data);
    }
    public function CekDataSub()
    {
        $json = file_get_contents("php://input"); // json string
	    $object = json_decode($json); // php object
        $id_subsoal = $object->id_subsoal;

        $q = $this->db->query("SELECT * FROM mst_subsoal WHERE id_subsoal = '$id_subsoal'")->row();
        echo json_encode($q);
    }

    public function CekSubDetail($id_subsoal)
    {
        $data["judul"] = "Data Sub Soal";
        $data['control'] = $this;
        $data['SubSoal'] = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id_subsoal'")->row();
        $q = $this->db->query("SELECT * FROM mst_subsoal where id_subsoal = '$id_subsoal'")->row();
        $data['Soal'] = $this->db->query("SELECT * FROM mst_soal where id_soal = '$q->Id_soal'")->row();
        $data['DataSubDetailSoal'] = $this->db->query("SELECT * FROM mst_subsoalheader WHERE id_subsoal = '$id_subsoal' ORDER BY UrutanSoal ASC")->result();
        $this->template->Soal('Test/V_SubDetail', $data);
    }
    public function getSubDetail($id_subdetail)
    {
        $q = $this->db->query("SELECT * FROM mst_subsoaldetail WHERE id_subdetail = '$id_subdetail'")->result();
        return $q;
    }
    public function SimpanPengerjaan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $DataHeader = array(
            'id_log' => uniqid(true),
            'Id_soal' => $this->input->post('Id_soal'),
            'Id_subsoal' => $this->input->post('Id_subsoal'),
            'IdKandidat' => $this->input->post('IdKandidat'),
            'NoPeserta' => $this->input->post('NoPeserta'),
            'CreateDate' => date('Y-m-d H:i:s')
        );
        $DataSoalHeader = array();
        $DataSoalDetail = array();
        foreach ($_POST["id_subdetail"] as $k => $v) {
            $DataSoalHeader[] = array(
                'Id_soal' => $this->input->post('Id_soal'),
                'Id_subsoal' => $this->input->post('Id_subsoal'),
                'IdKandidat' => $this->input->post('IdKandidat'),
                'NoPeserta' => $this->input->post('NoPeserta'),
                'id_subdetail' => $_POST["id_subdetail"][$k],
                'CreateDate' => date('Y-m-d H:i:s')
            );
            // $this->db->insert("tbl_jawabanheader", $DataSoalHeader);
            // echo "<script>localStorage.removeItem('".$_POST["id_subdetail"][$k]."')</script>";
            $TypeJawaban = $this->input->post("TypeJawaban");
                if ($TypeJawaban == 2) {
                    foreach ($_POST['KodeSoal'][$_POST["id_subdetail"][$k]] as $k2 => $v2) {
                        $JawabanKandidat = $this->input->post("JawabanKandidat_".$_POST["id_subdetail"][$k]."_".$_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2]."");
                        $DataSoalDetail[] = array(
                            'IdKandidat' => $this->input->post('IdKandidat'),
                            'NoPeserta' => $this->input->post('NoPeserta'),
                            'id_soal' => $this->input->post('Id_soal'),
                            'id_subsoal' => $this->input->post('Id_subsoal'),
                            'id_subdetail' => $_POST["id_subdetail"][$k],
                            'Jawaban' => $_POST['Jawaban'][$_POST["id_subdetail"][$k]][$k2],
                            'KodeSoal' => $_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'IsiDetailSoal' => $_POST['IsiDetailSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'TypeJawab' => $_POST['TypeJawab'][$_POST["id_subdetail"][$k]][$k2],
                            'Score' => $_POST['Score'][$_POST["id_subdetail"][$k]][$k2],
                            'JawabanKandidat' => $JawabanKandidat
                        );
        
                     
                        // $this->db->insert("tbl_jawabandetail", $DataSoalDetail);
                };
            }
                if ($TypeJawaban == 1) {
                    foreach ($_POST['KodeSoal'][$_POST["id_subdetail"][$k]] as $k2 => $v2) {
                        $JawabanKandidat = $this->input->post("JawabanKandidat_".$_POST["id_subdetail"][$k]."");
                        $DataSoalDetail[] = array(
                            'IdKandidat' => $this->input->post('IdKandidat'),
                            'NoPeserta' => $this->input->post('NoPeserta'),
                            'id_soal' => $this->input->post('Id_soal'),
                            'id_subsoal' => $this->input->post('Id_subsoal'),
                            'id_subdetail' => $_POST["id_subdetail"][$k],
                            'Jawaban' => $_POST['Jawaban'][$_POST["id_subdetail"][$k]][$k2],
                            'KodeSoal' => $_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'IsiDetailSoal' => $_POST['IsiDetailSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'TypeJawab' => $_POST['TypeJawab'][$_POST["id_subdetail"][$k]][$k2],
                            'Score' => $_POST['Score'][$_POST["id_subdetail"][$k]][$k2],
                            'JawabanKandidat' => $JawabanKandidat
                        );
        
                     
                        // $this->db->insert("tbl_jawabandetail", $DataSoalDetail);
                    }
                };

                if ($TypeJawaban == 3) {
                    foreach ($_POST['KodeSoal'][$_POST["id_subdetail"][$k]] as $k2 => $v2) {
                        $JawabanKandidatPlus = $this->input->post("JawabanKandidatPlus_".$_POST["id_subdetail"][$k]."_".$_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2]."");
                        $JawabanKandidatMin = $this->input->post("JawabanKandidatMin_".$_POST["id_subdetail"][$k]."_".$_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2]."");
                        $DataSoalDetail[] = array(
                            'IdKandidat' => $this->input->post('IdKandidat'),
                            'NoPeserta' => $this->input->post('NoPeserta'),
                            'id_soal' => $this->input->post('Id_soal'),
                            'id_subsoal' => $this->input->post('Id_subsoal'),
                            'id_subdetail' => $_POST["id_subdetail"][$k],
                            'Jawaban' => $_POST['Jawaban'][$_POST["id_subdetail"][$k]][$k2],
                            'KodeSoal' => $_POST['KodeSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'IsiDetailSoal' => $_POST['IsiDetailSoal'][$_POST["id_subdetail"][$k]][$k2],
                            'TypeJawab' => $_POST['TypeJawab'][$_POST["id_subdetail"][$k]][$k2],
                            'Score' => $_POST['Score'][$_POST["id_subdetail"][$k]][$k2],
                            'JawabanKandidat' => "",
                            'Plus' => $JawabanKandidatPlus,
                            'Minus' => $JawabanKandidatMin
                        );
        
                     
                        // $this->db->insert("tbl_jawabandetail", $DataSoalDetail);
                    }
                };
                
            };
            // var_dump($DataSoalDetail);
            // exit();
            $this->db->insert("tbl_logsoal", $DataHeader);

            $IdKandidat = $this->input->post('IdKandidat');
            $Id_subsoal = $this->input->post('Id_subsoal');
            $DataWaktu = array(
                "WaktuSelesai" => date("Y-m-d H:i:s")
            );
            $this->M_Pengerjaan->UpdateSoal($DataWaktu, $IdKandidat, $Id_subsoal);
            
            $this->M_Pengerjaan->insert_batch_ignore_header("tbl_jawabanheader", $DataSoalHeader);
            $this->M_Pengerjaan->insert_batch_ignore_detail("tbl_jawabandetail", $DataSoalDetail);
            echo "<script>localStorage.clear();</script>";
            // redirect("WebTest/PengerjaanSoal/MulaiPengerjaan");
            echo "<script>window.location.href = '".base_url()."WebTest/PengerjaanSoal/MulaiPengerjaan';</script>";
        }
        

    public function MulaiPengerjaan()
    {
        $IdKandidat = $this->session->userdata('IdKandidat');
        $IdPaket = $this->session->userdata('IdPaket');
        $q = $this->db->query("SELECT a.*, 
                                (SELECT UrutanSoal FROM mst_soal where id_soal = a.Id_soal) AS Urutan 
                                FROM mst_subsoal a 
                                WHERE a.Id_subsoal NOT IN (SELECT id_subsoal FROM tbl_logsoal WHERE tbl_logsoal.IdKandidat = '$IdKandidat') 
                                AND a.Id_soal IN (SELECT c.IdSoal FROM mst_paketdetail c WHERE c.IdPaket = '$IdPaket' AND StatusDelete = '0')
                                ORDER BY Urutan ASC LIMIT 1")->row();
        $data["judul"] = "Data Sub Soal";
        $data['control'] = $this;
        $data['DataHeader'] = $q;
        $data['SubSoal'] = $q;
        $data['DataSubDetailSoal'] = $this->db->query("SELECT * FROM mst_subsoalheader a WHERE a.id_subsoal = '$q->Id_subsoal' ")->result();
        $this->template->Soal('Test/V_SubDetail', $data);
    }
    public function WaktuPengerjaan()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->input->post("IdKandidat");
        $NoPeserta = $this->input->post("NoPeserta");
        $TokenPeserta = $this->input->post("TokenPeserta");
        $q = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$IdKandidat' AND NoPeserta = '$NoPeserta' AND TokenTest = '$TokenPeserta'")->row();
        if ($q->WaktuMengerjakan != null) {
            
        }else{
            $DataWaktu = array(
                'WaktuMengerjakan' => date("Y-m-d H:i:s")
            );
            $this->db->where("IdKandidat", $IdKandidat);
            $this->db->where("NoPeserta", $NoPeserta);
            $this->db->where("TokenTest", $TokenPeserta);
            $this->db->update("tbl_kandidat", $DataWaktu); 
        }
        
        // var_dump($IdKandidat, $NoPeserta, $TokenPeserta);
        echo json_encode($IdKandidat);
    }
    public function CekWaktu()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->session->userdata("IdKandidat");
        $Id_subsoal = $this->input->post("Id_subsoal");
        $WaktuKandidat = $this->db->query("SELECT * FROM tbl_kandidat_soal_time WHERE id_subsoal = '$Id_subsoal' AND IdKandidat = '$IdKandidat' ")->row();
        // var_dump($WaktuKandidat, $IdKandidat, $Id_subsoal);
        // exit();
        $WaktuNormal = $this->db->query("SELECT * FROM mst_subsoal WHERE id_subsoal = '$Id_subsoal' ")->row();
        $data = array("WaktuKandidat" => $WaktuKandidat, "WaktuNormal" => $WaktuNormal, "WaktuSekarang" => date("Y-m-d H:i:s"));
        echo json_encode($data);
    }

    public function InsertWaktu()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->session->userdata("IdKandidat");
        $Id_subsoal = $this->input->post("Id_subsoal");
        $Id_soal = $this->input->post("Id_soal");
        $data = array(
            "IdKandidat" => $IdKandidat,
            "id_subsoal" => $Id_subsoal,
            "id_soal" => $Id_soal,
            "WaktuMulai" => date("Y-m-d H:i:s")
        );
        $this->db->insert("tbl_kandidat_soal_time",$data);

        $DataWaktu = array(
            "WaktuSelesai" => date("Y-m-d H:i:s")
        );
    $this->M_Pengerjaan->UpdateInstruksi($DataWaktu, $IdKandidat, $Id_subsoal);
        echo json_encode($DataWaktu);
    }

    public function CekWaktuCam()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->session->userdata("IdKandidat");
        $WaktuKandidat = $this->db->query("SELECT * FROM tbl_kandidat_cam WHERE IdKandidat = '$IdKandidat' ORDER BY CreateDate DESC ")->row();
        $WaktuNormal = array(
            'WaktuSekarang' => date("Y-m-d H:i:s")
        );
        $data = array("WaktuKandidat" => $WaktuKandidat, "WaktuNormal" => $WaktuNormal);
        echo json_encode($WaktuKandidat);
    }

    public function InsertWaktuCam()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->session->userdata("IdKandidat");
        $Id_subsoal = $this->input->post("Id_subsoal");
        $Id_soal = $this->input->post("Id_soal");
        $data = array(
            "IdKandidat" => $IdKandidat,
            "id_subsoal" => $Id_subsoal,
            "id_soal" => $Id_soal,
            "WaktuMulai" => date("Y-m-d H:i:s")
        );
        $this->db->insert("tbl_kandidat_soal_time",$data);
        echo json_encode($this->db->last_query());
    }

    public function CheckSoal()
    {
        $IdKandidat = $this->session->userdata('IdKandidat');

        $Total = $this->db->query("SELECT * FROM tbl_kandidat_soal_time WHERE IdKandidat = '$IdKandidat'")->num_rows();
        echo json_encode($Total);
    }

    public function WaktuInstruksi()
    {
        date_default_timezone_set("Asia/Jakarta");
        $IdKandidat = $this->session->userdata("IdKandidat");
        $Id_subsoal = $this->input->post("Id_subsoal");
        $Id_soal = $this->input->post("Id_soal");
        $q = $this->db->query("SELECT * FROM tbl_kandidat_instruksi_time WHERE IdKandidat = '$IdKandidat' AND id_soal = '$Id_soal' AND Id_subsoal = '$Id_subsoal'")->row();
        if ($q == null) {
            $data = array(
                'IdKandidat' => $IdKandidat,
                'WaktuMulai' => date("Y-m-d H:i:s"),
                'id_soal' => $Id_soal,
                'id_subsoal' => $Id_subsoal
            );
            $this->db->insert('tbl_kandidat_instruksi_time', $data);
            $q2 = $this->db->query("SELECT * FROM tbl_kandidat_instruksi_time WHERE IdKandidat = '$IdKandidat' AND id_soal = '$Id_soal' AND Id_subsoal = '$Id_subsoal'")->row();
            echo json_encode($q2);
        }else{
            echo json_encode($q);
        }
    }
    public function WaktuInstruksiSelesai()
    {
        date_default_timezone_set("Asia/Jakarta");

        $IdKandidat = $this->session->userdata("IdKandidat");
        $Id_subsoal = $this->input->post("Id_subsoal");
        $Id_soal = $this->input->post("Id_soal");
            $DataWaktu = array(
                "WaktuSelesai" => date("Y-m-d H:i:s")
            );
        $this->M_Pengerjaan->UpdateInstruksi($DataWaktu, $IdKandidat, $Id_subsoal);
        
        $DataWaktuSub = array(
            "WaktuMulai" => date("Y-m-d H:i:s")
        );
        $this->M_Pengerjaan->UpdateSoal($DataWaktuSub, $IdKandidat, $Id_subsoal);
        
        echo json_encode($DataWaktuSub);
    }

    public function GetSoalInstruksi($id_subsoal)
    {

        $q = $this->db->query("SELECT * FROM mst_soalinstruksiheader WHERE id_subsoal = '$id_subsoal' ")->result();
        return $q;
    }

    public function GetSoalDetailInstruksi($id_soalinstruksi)
    {
        $q = $this->db->query("SELECT * FROM mst_soalinstruksidetail WHERE id_soalinstruksi = '$id_soalinstruksi'")->result();
        return $q;
    }

    public function GetDetailInstruksi()
    {
        date_default_timezone_set("Asia/Jakarta");
        // $id_soalinstruksi = $_POST['id_soalinstruksi'];
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));

        $decoded = json_decode($content, true);

        //If json_decode failed, the JSON is invalid.
        if(! is_array($decoded)) {
            
        } else {
            // Send error back to user.
        }
        }
        // var_dump($decoded['id_soalinstruksi']);

        $q = $this->db->query("SELECT  
        REPLACE((SELECT GROUP_CONCAT(b.KodeSoal) FROM mst_soalinstruksidetail b WHERE b.id_soalinstruksi = a.id_soalinstruksi AND Jawaban = 1), ',', '') AS JawabanBenar,
        a.*, (SELECT KetJawaban FROM mst_soalinstruksidetail c WHERE c.id_soalinstruksi = a.id_soalinstruksi AND Jawaban = 1 LIMIT 1) AS Keterangan
        FROM mst_soalinstruksiheader a WHERE a.id_soalinstruksi = '$decoded[id_soalinstruksi]'")->row();

        if($decoded["checkedValue"] == $q->JawabanBenar) {
            $hasil = 1;
        }else{
            $hasil = 0;
        }
        $data = array("Hasil" => $hasil, "Query" => $q);
        echo json_encode($data);
    }
}
