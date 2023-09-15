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
class DetailKandidat extends MY_Controller
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
        $this->load->model("M_Kandidat");
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function Data($id)
    {
        // Example
        $data['judul'] = "Detail Kandidat";
        $data['control'] = $this;
        $data['id'] = $id;
        $data['Kandidat'] = $this->db->query("SELECT * FROM tbl_kandidat a 
                                              LEFT JOIN mst_jabatan b ON a.id_jabatan = b.id_jabatan 
                                              LEFT JOIN mst_paketheader c ON c.IdPaket = a.IdPaket
                                              WHERE a.IdKandidat = '$id'")->row();
        // $data['data_level'] = $this->db->query("SELECT * FROM tbl_userlevel")->result();
        $this->template->backend('DetailKandidat/index',$data);
    }

    public function DataSoal($id)
    {
        $q = $this->db->query("SELECT DISTINCT a.id_soal, b.nama_soal FROM tbl_jawabanheader a LEFT JOIN mst_soal b ON b.id_soal = a.id_soal where a.IdKandidat = '$id'")->result();
        return $q;
    }
    public function DataSubSoal($id_soal, $IdKandidat)
    {
        // $DataSubSoal = $this->db->query("SELECT a.*, b.IsiSoal FROM vw_hasil a LEFT JOIN mst_subsoalheader b ON a.id_subdetail = b.id_subdetail where a.id_soal = '$id_soal' AND a.IdKandidat = '$IdKandidat'")->result();
        // $q = $this->db->query("SELECT a.*, b.StatusText FROM mst_subsoal a INNER JOIN tbl_jawabanheader b ON a.Id_soal = b.id_soal where a.Id_soal = '$id_soal' AND b.IdKandidat = '$IdKandidat' ")->result();
        
        $q = $this->db->query("SELECT * FROM mst_subsoal where Id_soal = '$id_soal' ")->result();
        return $q;
    }

    public function ScoreSoal($id_subsoal, $IdKandidat)
    {

        $q2 = $this->db->query("SELECT * FROM mst_subsoal WHERE id_subsoal = '$id_subsoal'")->row();
        $q1 = $this->db->query("SELECT * FROM mst_subsoalheader WHERE id_subsoal = '$id_subsoal'")->result();
        $hasil = array();
        if ($id_subsoal == '1637d96c15ef48' OR $q2->nama_subsoal === 'GE') {
            $q3 = $this->db->query("SELECT * FROM vw_hasil WHERE id_subsoal = '$id_subsoal' AND IdKandidat = '$IdKandidat' AND StatusText ='1'")->num_rows();
            if ($q3 > 1) {
                foreach ($q1 as $v1) {
                    $HasilBenar = $this->db->query("SELECT KodeSoal FROM mst_subsoaldetail WHERE id_subdetail = '$v1->id_subdetail' AND Jawaban = '1'")->num_rows();
                    $HasilJawaban = $this->db->query(" SELECT * FROM vw_hasil WHERE id_subdetail = '$v1->id_subdetail' AND IdKandidat = '$IdKandidat'")->row();
                //    if ($HasilBenar == $HasilJawaban) {
                //     $hasil[] = 1;
                //    }else{
                //     $hasil[] = 0;
                //    }
                   $hasil[] = $HasilJawaban->Score;
                }
                $DataReturn = $this->CheckConvert(array_sum($hasil),$IdKandidat);
                
            }else{
                $DataReturn = '<a href="'.base_url().'Transaksi/DetailKandidat/JawabanText/'.$id_subsoal.'/'.$IdKandidat.'" class="btn btn-sm btn-success" type="button"> Isi Skore</a>';
            }
    
        } else if ($id_subsoal == '1637c40e87bce2' OR $q2->nama_subsoal === 'GHQ') {
            foreach ($q1 as $v1) {
                $HasilBenar = $this->db->query("SELECT KodeSoal FROM mst_subsoaldetail WHERE id_subdetail = '$v1->id_subdetail' AND Jawaban = '1'")->num_rows();
                $HasilJawaban = $this->db->query(" SELECT * FROM vw_hasil WHERE id_subdetail = '$v1->id_subdetail' AND IdKandidat = '$IdKandidat' AND JawabanKandidat = '1' ")->row();
                //    if ($HasilBenar == $HasilJawaban) {
                //     $hasil[] = 1;
                //    }else{
                //     $hasil[] = 0;
                //    }
                $hasil[] = $HasilJawaban->Score;
        
                }
                $DataReturn = array_sum($hasil);
        } else {
            foreach ($q1 as $v1) {
                $HasilBenar = $this->db->query("SELECT KodeSoal FROM mst_subsoaldetail WHERE id_subdetail = '$v1->id_subdetail' AND Jawaban = '1'")->num_rows();
                $HasilJawabanTotal = $this->db->query(" SELECT KodeSoal FROM vw_hasil WHERE id_subdetail = '$v1->id_subdetail' AND IdKandidat = '$IdKandidat'
                AND JawabanKandidat = '1' ")->num_rows();

                $HasilJawaban = $this->db->query(" SELECT KodeSoal FROM vw_hasil WHERE id_subdetail = '$v1->id_subdetail' AND IdKandidat = '$IdKandidat'
                AND JawabanKandidat = '1' AND (KodeSoal IN (SELECT KodeSoal FROM mst_subsoaldetail WHERE id_subdetail = '$v1->id_subdetail' AND Jawaban = '1' ))
                ")->num_rows();
               
               if ($HasilBenar == $HasilJawabanTotal) {
                if ($HasilBenar == $HasilJawaban) {
                    $hasil[] = 1;
                   }else{
                    $hasil[] = 0;
                   }
               }else{
                $hasil[] = 0;
               }
               
            //    $hasil[] = $HasilJawaban;

            // var_dump($HasilBenar);
            // echo $HasilBenar;
            // echo $HasilJawaban;
            // echo "<br>";
            // echo $HasilBenar."<br>".$HasilJawaban;
            // var_dump($HasilJawaban);
            
            }
            $DataReturn = array_sum($hasil);
        }
        // var_dump($DataReturn);
        return $DataReturn;
        // $q = $this->db->query("SELECT SUM(JawabanHasil) AS Total FROM vw_hasil a
        // WHERE a.id_subsoal = '$id_subsoal'")->row();
        // // var_dump($q);
        // return $q;
    }

    public function JawabanText($id_subsoal, $IdKandidat)
    {
        $DataJudul = $this->db->query("SELECT * FROM mst_subsoal WHERE Id_subsoal = '$id_subsoal'")->row();
        $data['DataSoal'] = $this->db->query("SELECT A.*, (SELECT JawabanKandidat FROM vw_hasil B WHERE B.id_subdetail = A.id_subdetail AND B.IdKandidat = '$IdKandidat' ) AS JawabanKandidat FROM mst_subsoalheader A
        WHERE A.id_subsoal = '$id_subsoal'")->result();
        $data['judul'] = "Cek Jawaban Text $DataJudul->nama_subsoal";
        $data['id_subsoal'] = $id_subsoal;
        $data['id_soal'] = $DataJudul->Id_soal;
        $data['DataKandidat'] = $this->db->query("SELECT * FROM tbl_kandidat WHERE IdKandidat = '$IdKandidat'")->row();
        $this->template->backend('DetailKandidat/V_JawabanText',$data);
    }

    public function SimpanText()
    {
        date_default_timezone_set("Asia/Jakarta");
        $id_subsoal = $_POST['id_subsoal'];
        $IdKandidat = $_POST['IdKandidat'];
        $cek = $this->db->query("SELECT * FROM tbl_jawabanheader WHERE id_subsoal = '$id_subsoal' AND IdKandidat = '$IdKandidat' ")->num_rows();
        if ($cek > 0) {
            foreach ($_POST['id_subdetail'] as $key => $value) {
                $data = array(
                    'Score' => $_POST['Score'][$key]
                );
                $this->db->where('id_subdetail', $_POST['id_subdetail'][$key]);
                $this->db->where('IdKandidat', $_POST['IdKandidat']);
                $this->db->update("tbl_jawabandetail", $data);

            }
        }else{

            foreach ($_POST['id_subdetail'] as $key => $value) {
                $DataHeader[] = array(
                    'id_soal' => $_POST['id_soal'],
                    'id_subsoal' => $_POST['id_subsoal'],
                    'IdKandidat' => $_POST['IdKandidat'],
                    'NoPeserta' => $_POST['NoPeserta'],
                    'id_subdetail' => $_POST['id_subdetail'][$key],
                    'CreateDate' => date("Y-m-d H:i:s"),
                    'StatusCheck' => 1,
                    'StatusText' => 1,
                    'DateCheckText' => date("Y-m-d H:i:s"),
                    'DateCheckSoal' => date("Y-m-d H:i:s")
                );
                $DataDetail[] = array(
                    'IdKandidat' => $_POST['IdKandidat'],
                    'NoPeserta' => $_POST['NoPeserta'],
                    'id_subdetail' => $_POST['id_subdetail'][$key],
                    'JawabanKandidat' => '',
                    'Score' => $_POST['Score'][$key],
                    'id_soal' => $_POST['id_soal'],
                    'id_subsoal' => $_POST['id_subsoal']
                );
    
            }
            // $this->db->insert_batch('tbl_jawabanheader', $DataHeader);
            // $this->db->insert_batch('tbl_jawabandetail', $DataDetail);
            $this->M_Kandidat->insert_batch_ignore_header("tbl_jawabanheader", $DataHeader);
            $this->M_Kandidat->insert_batch_ignore_detail("tbl_jawabandetail", $DataDetail);
        }

        
        
        

        $this->M_Kandidat->UpdateHeader($_POST['IdKandidat'], $_POST['id_subsoal']);
        redirect("Transaksi/DetailKandidat/Data/".$_POST['IdKandidat']);

    }

    public function CekHasilConvert($id_soal, $Score)
    {
        if ($id_soal == '1636c7fa9ed4ff') {
            $q = $this->db->query("SELECT * FROM mst_skoringheader a LEFT JOIN mst_skoringdetail b ON b.IdHeaderSkor = a.IdHeaderSkor WHERE a.IdHeaderSkor = '163903e5599ac2' AND b.AngkaSkor1 = '$Score' ")->row();
        }
        // var_dump($q);
        return $q->HasilSkor;
        
        // $q = $this->db->query("SELECT * FROM mst_");
    }

    public function SimpanData()
    {
        $IdKandidat = $this->input->post("IdKandidat");
       
        $this->M_Kandidat->DelFormHeader($IdKandidat);
        $this->M_Kandidat->DelFormDetail($IdKandidat);
        $DataArray = array(
            'StatusKoreksi' => 1,
            'KoreksiDate' => date("Y-m-d H:i:s"),
            'KoreksiBy' => $this->session->userdata('id_user'),
            'KoreksiName' => $this->session->userdata('full_name')
        );
        
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->update('tbl_kandidat', $DataArray);
        $IdHeader = uniqid(true);
        $DataHeader = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "KetKandidat" => $this->input->post("KetKandidat"),
            "CreateDate" => date("Y-m-d H:i:s"),
            'CreateBy' => $this->session->userdata('id_user'),
            'CreateName' => $this->session->userdata('full_name')
        );
        $this->db->insert("tbl_kandidat_form_header", $DataHeader);
        $this->db->insert("tbl_kandidat_form_header_log", $DataHeader);
        // KecerdasanUmum
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KecerdasanUmum",
            "Rendah" => $this->input->post("KecerdasanUmumRendah"),
            "Kurang" => $this->input->post("KecerdasanUmumKurang"),
            "Cukup" => $this->input->post("KecerdasanUmumCukup"),
            "Baik" => $this->input->post("KecerdasanUmumBaik"),
            "Tinggi" => $this->input->post("KecerdasanUmumTinggi")
        );
         // Kecerdasan Verbal
         $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KecerdasanVerbal",
            "Rendah" => $this->input->post("KecerdasanVerbalRendah"),
            "Kurang" => $this->input->post("KecerdasanVerbalKurang"),
            "Cukup" => $this->input->post("KecerdasanVerbalCukup"),
            "Baik" => $this->input->post("KecerdasanVerbalBaik"),
            "Tinggi" => $this->input->post("KecerdasanVerbalTinggi")
        );
        // Kecerdasan Berhitung
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KecerdasanBerhitung",
            "Rendah" => $this->input->post("KecerdasanBerhitungRendah"),
            "Kurang" => $this->input->post("KecerdasanBerhitungKurang"),
            "Cukup" => $this->input->post("KecerdasanBerhitungCukup"),
            "Baik" => $this->input->post("KecerdasanBerhitungBaik"),
            "Tinggi" => $this->input->post("KecerdasanBerhitungTinggi")
        );
        // Kecerdasan Figural
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KecerdasanFigural",
            "Rendah" => $this->input->post("KecerdasanFiguralRendah"),
            "Kurang" => $this->input->post("KecerdasanFiguralKurang"),
            "Cukup" => $this->input->post("KecerdasanFiguralCukup"),
            "Baik" => $this->input->post("KecerdasanFiguralBaik"),
            "Tinggi" => $this->input->post("KecerdasanFiguralTinggi")
        );
        // Daya Ingat
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "DayaIngat",
            "Rendah" => $this->input->post("DayaIngatRendah"),
            "Kurang" => $this->input->post("DayaIngatKurang"),
            "Cukup" => $this->input->post("DayaIngatCukup"),
            "Baik" => $this->input->post("DayaIngatBaik"),
            "Tinggi" => $this->input->post("DayaIngatTinggi")
        );
        // Kemampuan Komprehensif
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KemampuanKomprehensif",
            "Rendah" => $this->input->post("KemampuanKomprehensifRendah"),
            "Kurang" => $this->input->post("KemampuanKomprehensifKurang"),
            "Cukup" => $this->input->post("KemampuanKomprehensifCukup"),
            "Baik" => $this->input->post("KemampuanKomprehensifBaik"),
            "Tinggi" => $this->input->post("KemampuanKomprehensifTinggi")
        );
        // Kemampuan Analisis
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KemampuanAnalisis",
            "Rendah" => $this->input->post("KemampuanAnalisisRendah"),
            "Kurang" => $this->input->post("KemampuanAnalisisKurang"),
            "Cukup" => $this->input->post("KemampuanAnalisisCukup"),
            "Baik" => $this->input->post("KemampuanAnalisisBaik"),
            "Tinggi" => $this->input->post("KemampuanAnalisisTinggi")
        );
        // Kemampuan Keputusan
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KemampuanKeputusan",
            "Rendah" => $this->input->post("KemampuanKeputusanRendah"),
            "Kurang" => $this->input->post("KemampuanKeputusanKurang"),
            "Cukup" => $this->input->post("KemampuanKeputusanCukup"),
            "Baik" => $this->input->post("KemampuanKeputusanBaik"),
            "Tinggi" => $this->input->post("KemampuanKeputusanTinggi")
        );
        // Kemampuan Berbahasa
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KemampuanBerbahasa",
            "Rendah" => $this->input->post("KemampuanBerbahasaRendah"),
            "Kurang" => $this->input->post("KemampuanBerbahasaKurang"),
            "Cukup" => $this->input->post("KemampuanBerbahasaCukup"),
            "Baik" => $this->input->post("KemampuanBerbahasaBaik"),
            "Tinggi" => $this->input->post("KemampuanBerbahasaTinggi")
        );
        // KepercayaanDiri
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KepercayaanDiri",
            "Rendah" => $this->input->post("KepercayaanDiriRendah"),
            "Kurang" => $this->input->post("KepercayaanDiriKurang"),
            "Cukup" => $this->input->post("KepercayaanDiriCukup"),
            "Baik" => $this->input->post("KepercayaanDiriBaik"),
            "Tinggi" => $this->input->post("KepercayaanDiriTinggi")
        );
        // KemampuanSosialisasi
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KemampuanSosialisasi",
            "Rendah" => $this->input->post("KemampuanSosialisasiRendah"),
            "Kurang" => $this->input->post("KemampuanSosialisasiKurang"),
            "Cukup" => $this->input->post("KemampuanSosialisasiCukup"),
            "Baik" => $this->input->post("KemampuanSosialisasiBaik"),
            "Tinggi" => $this->input->post("KemampuanSosialisasiTinggi")
        );
        // KematanganEmosi
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KematanganEmosi",
            "Rendah" => $this->input->post("KematanganEmosiRendah"),
            "Kurang" => $this->input->post("KematanganEmosiKurang"),
            "Cukup" => $this->input->post("KematanganEmosiCukup"),
            "Baik" => $this->input->post("KematanganEmosiBaik"),
            "Tinggi" => $this->input->post("KematanganEmosiTinggi")
        );
        // MotivasiKerja
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "MotivasiKerja",
            "Rendah" => $this->input->post("MotivasiKerjaRendah"),
            "Kurang" => $this->input->post("MotivasiKerjaKurang"),
            "Cukup" => $this->input->post("MotivasiKerjaCukup"),
            "Baik" => $this->input->post("MotivasiKerjaBaik"),
            "Tinggi" => $this->input->post("MotivasiKerjaTinggi")
        );
        // Kemandirian
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "Kemandirian",
            "Rendah" => $this->input->post("KemandirianRendah"),
            "Kurang" => $this->input->post("KemandirianKurang"),
            "Cukup" => $this->input->post("KemandirianCukup"),
            "Baik" => $this->input->post("KemandirianBaik"),
            "Tinggi" => $this->input->post("KemandirianTinggi")
        );
        // Inisiatif
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "Inisiatif",
            "Rendah" => $this->input->post("InisiatifRendah"),
            "Kurang" => $this->input->post("InisiatifKurang"),
            "Cukup" => $this->input->post("InisiatifCukup"),
            "Baik" => $this->input->post("InisiatifBaik"),
            "Tinggi" => $this->input->post("InisiatifTinggi")
        );
        // KepatuhanAturan
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "KepatuhanAturan",
            "Rendah" => $this->input->post("KepatuhanAturanRendah"),
            "Kurang" => $this->input->post("KepatuhanAturanKurang"),
            "Cukup" => $this->input->post("KepatuhanAturanCukup"),
            "Baik" => $this->input->post("KepatuhanAturanBaik"),
            "Tinggi" => $this->input->post("KepatuhanAturanTinggi")
        );
        // DayaStres
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "DayaStres",
            "Rendah" => $this->input->post("DayaStresRendah"),
            "Kurang" => $this->input->post("DayaStresKurang"),
            "Cukup" => $this->input->post("DayaStresCukup"),
            "Baik" => $this->input->post("DayaStresBaik"),
            "Tinggi" => $this->input->post("DayaStresTinggi")
        );
        // Ketekunan
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "Ketekunan",
            "Rendah" => $this->input->post("KetekunanRendah"),
            "Kurang" => $this->input->post("KetekunanKurang"),
            "Cukup" => $this->input->post("KetekunanCukup"),
            "Baik" => $this->input->post("KetekunanBaik"),
            "Tinggi" => $this->input->post("KetekunanTinggi")
        );
        // Ketelitian
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "Ketelitian",
            "Rendah" => $this->input->post("KetelitianRendah"),
            "Kurang" => $this->input->post("KetelitianKurang"),
            "Cukup" => $this->input->post("KetelitianCukup"),
            "Baik" => $this->input->post("KetelitianBaik"),
            "Tinggi" => $this->input->post("KetelitianTinggi")
        );
        // Kecepatan
        $DataDetail[] = array(
            "IdHeader" => $IdHeader,
            "IdKandidat" => $IdKandidat,
            "Aspek" => "Kecepatan",
            "Rendah" => $this->input->post("KecepatanRendah"),
            "Kurang" => $this->input->post("KecepatanKurang"),
            "Cukup" => $this->input->post("KecepatanCukup"),
            "Baik" => $this->input->post("KecepatanBaik"),
            "Tinggi" => $this->input->post("KecepatanTinggi")
        );
        
        $this->db->insert_batch("tbl_kandidat_form_detail", $DataDetail);
        $this->db->insert_batch("tbl_kandidat_form_detail_log", $DataDetail);
        
        redirect("Transaksi/Kandidat");
    }

    public function SimpanDataPaket()
    {
        $IdKandidat = $this->input->post("IdKandidat");
        $DataArray = array(
            'StatusKoreksi' => 1,
            'KoreksiDate' => date("Y-m-d H:i:s"),
            'KoreksiBy' => $this->session->userdata('id_user'),
            'KoreksiName' => $this->session->userdata('full_name')
        );
        
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->update('tbl_kandidat', $DataArray);
        
        redirect("Transaksi/Kandidat");
    }
    public function CheckConvertDetailIST($Scor, $NamaSubSoal, $IdKandidat)
    {
        $q = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$IdKandidat'")->row();
        $tanggal_lahir = date('Y-m-d', strtotime($q->TglLahir));
        $birthDate = new \DateTime($tanggal_lahir);
        $today = new \DateTime("today");
        $y = $today->diff($birthDate)->y;
        // echo $NamaSubSoal;
        if ($NamaSubSoal == 'IQ') {
            $qhasil = $this->db->query("SELECT * FROM vw_hasilskorist where (ABS(AngkaSkor) <= '$Scor' AND AngkaSkor <> '') AND NamaSkorHeader = '$NamaSubSoal'")->row();
        } else {
            $qhasil = $this->db->query("SELECT * FROM vw_hasilskorist WHERE (ABS(AngkaSkor) <= '$Scor' AND AngkaSkor <> '') AND (ABS(UmurMin) <= '$y' AND ABS(UmurMax) >= '$y') AND NamaSkorHeader = '$NamaSubSoal' ORDER BY ABS(AngkaSkor) DESC LIMIT 1 ")->row();
            // $qhasil = $this->db->query("SELECT * FROM vw_hasilskorist where AngkaSkor = '$Scor' AND UmurMax >= $y AND NamaSkorHeader = '$NamaSubSoal'")->row();
        }
        
        if ($qhasil->AngkaSkor == NULL OR $qhasil->AngkaSkor == "") {
            return  "Data Skoring Tidak Ditemukan";    
        } else {
            return  $qhasil->HasilSkor;
        }
        
    }

    public function CheckPF($IdKandidat, $Id_subsoal, $PFJawab)
    {
        $DataKandidat = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$IdKandidat'")->row();
        $q = $this->db->query("SELECT SUM(Score) AS Nilai FROM vw_hasil a LEFT JOIN mst_subsoalheader b ON a.id_subdetail = b.id_subdetail 
        WHERE a.id_subsoal = '$Id_subsoal' AND a.IdKandidat = '$IdKandidat' AND a.JawabanKandidat = '1' AND b.PFJawab = '$PFJawab'")->row();

        $q2 = $this->db->query("SELECT * FROM vw_hasilskorpf where NamaSkorHeader = '$PFJawab' AND AngkaSkor = '$q->Nilai'")->row();

        // echo "SCORE = $q->Nilai </br>";        
        // $qTot = $this->db->query("SELECT * FROM mst_pf16_detail a LEFT JOIN mst_pf16_header b ON a.IdPFHeader = b.IdPFHeader 
        // WHERE b.JenisKelamin = '$DataKandidat->Kelamin' AND a.KodePF = '$PFJawab' ")->row();
        // echo "SCORE PF = $qTot->NilaiPF </br>";        
        $qMD = $this->db->query("SELECT SUM(Score) AS Nilai FROM vw_hasil a LEFT JOIN mst_subsoalheader b ON a.id_subdetail = b.id_subdetail 
        WHERE a.id_subsoal = '$Id_subsoal' AND a.IdKandidat = '$IdKandidat' AND a.JawabanKandidat = '1' AND b.PFJawab = 'MD'")->row();
        $NilaiMD = $qMD->Nilai;
        if ($PFJawab == 'A') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            }
        }
        if ($PFJawab == 'C') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            }
        }
        if ($PFJawab == 'G') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            }
        }
        if ($PFJawab == 'H') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -1;
                }
            }
        }
        if ($PFJawab == 'L') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                }
            }
        }
        if ($PFJawab == 'N') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                }
            }
        }
        if ($PFJawab == 'O') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 2;
                } else if ( $NilaiMD === 9 ) {
                    $NilaiPF = 1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 2;
                } else if ( $NilaiMD === 9 ) {
                    $NilaiPF = 1;
                }
            }
        }
        if ($PFJawab == 'Q2') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                } 
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 1;
                }
            }
        }
        if ($PFJawab == 'Q3') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -2;
                } else if ($NilaiMD === 9) {
                    $NilaiPF = 1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = -1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = -2;
                } else if ($NilaiMD === 9) {
                    $NilaiPF = 1;
                }
            }
        }
        if ($PFJawab == 'Q4') {
            if ($DataKandidat->Kelamin == 'P') {
                if ( ("10" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 2;
                } else if ($NilaiMD === 9) {
                    $NilaiPF = 1;
                }
            } else if ($DataKandidat->Kelamin == 'L') {
                if ( ("11" <= $NilaiMD) && ($NilaiMD <= "12") ) {
                    $NilaiPF = 1;
                } else if ( ("13" <= $NilaiMD) && ($NilaiMD <= "14") ) {
                    $NilaiPF = 2;
                } else if ($NilaiMD === 9) {
                    $NilaiPF = 1;
                }
            }
        }
        

        // $Hasil = $q2->HasilSkor + $NilaiPF;
        if ($PFJawab == 'MD') {
            $Hasil = $q->Nilai;
        }else{
            $Hasil = $q2->HasilSkor + $NilaiPF;
        }
        // echo $q->Nilai;
        // echo $q2->HasilSkor;
        // echo "Nilai Hasil = $NilaiPF </br>";
        // $q2 = $this->db->query("SELECT * FROM vw_hasilskorpf where NamaSkorHeader = '$PFJawab' AND AngkaSkor = '$Hasil'")->row();
        // echo "Nilai Akhir = $q2->HasilSkor </br>";

        return $Hasil;
    }

    public function CheckConvert($Score)
    {
        $q = $this->db->query("SELECT * FROM vw_hasilge WHERE AngkaSkor = '$Score' ")->row();
        // var_dump($q->HasilSkor);
        // foreach ($q as $key => $value) {
        //     if ($value->AngkaSkor == $Score) {
        //         return $value->HasilSkor;
        //     }
        // }
        return $q->HasilSkor;
    }

    public function GetDetailJawaban()
    {
        $id_soal = $this->input->post('Id_soal');
        $IdKandidat = $this->input->post('IdKandidat');
        $id_subsoal = $this->input->post('Id_subsoal');
        // var_dump($id_subsoal);
        if ($id_subsoal == '1637d96c15ef48') {
        $q = $this->db->query("SELECT a.id_subdetail, 
        (SELECT GROUP_CONCAT(b.JawabanKandidat) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat IS NOT NULL) AS Jawab,
        ('') AS Jawaban, 
        (SELECT GROUP_CONCAT(b.Score) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat IS NOT NULL) AS Score 
        FROM tbl_jawabanheader a 
        WHERE a.IdKandidat = '$IdKandidat' AND a.id_subsoal = '$id_subsoal' ")->result();

        }else if($id_subsoal == '1637c40e87bce2'){
            $q = $this->db->query("SELECT a.id_subdetail, 
                                                (SELECT GROUP_CONCAT(b.KodeSoal) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat = '1') AS Jawab,
                                                (SELECT GROUP_CONCAT(CONCAT(c.KodeSoal, '(',c.Score,')')) FROM mst_subsoaldetail c WHERE c.id_subdetail = a.id_subdetail) AS Jawaban,
                                                (SELECT Score FROM mst_subsoaldetail d WHERE d.id_subdetail = a.id_subdetail AND d.KodeSoal =  (SELECT GROUP_CONCAT(b.KodeSoal) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat = '1')) AS Score 
                                                FROM tbl_jawabanheader a 
                                                WHERE a.IdKandidat = '$IdKandidat' AND a.id_subsoal = '$id_subsoal'
                                    ")->result();
        }else{
            $q = $this->db->query("SELECT a.id_subdetail, 
            (SELECT GROUP_CONCAT(b.KodeSoal) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat = '1') AS Jawab,
            (SELECT GROUP_CONCAT(c.KodeSoal) FROM mst_subsoaldetail c WHERE c.id_subdetail = a.id_subdetail AND c.Jawaban = '1') AS Jawaban, 
            (IF((SELECT GROUP_CONCAT(c.KodeSoal) FROM mst_subsoaldetail c WHERE c.id_subdetail = a.id_subdetail AND c.Jawaban = '1')=(SELECT GROUP_CONCAT(b.KodeSoal) FROM tbl_jawabandetail b WHERE b.id_subdetail = a.id_subdetail AND b.IdKandidat = a.IdKandidat AND JawabanKandidat = '1'),1,0)) AS Score 
            FROM tbl_jawabanheader a 
            WHERE a.IdKandidat = '$IdKandidat' AND a.id_subsoal = '$id_subsoal'
")->result();
        }
        
        
        echo json_encode($q);
    }

    // DISC COUNTING
    public function cekRowDisc($id_soal, $IdKandidat)
    {
        $Plus = $this->db->query("SELECT 
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Plus = 'D' ) AS D,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Plus = 'I' ) AS I,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Plus = 'S' ) AS S,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Plus = 'C' ) AS C,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Plus = '*' ) AS X FROM tbl_kandidat WHERE IdKandidat = '$IdKandidat'")->row();
        
        $Minus = $this->db->query("SELECT 
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Minus = 'D' ) AS D,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Minus = 'I' ) AS I,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Minus = 'S' ) AS S,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Minus = 'C' ) AS C,
        (SELECT COUNT(*) FROM tbl_jawabandetail WHERE id_soal = '$id_soal' AND IdKandidat = '$IdKandidat' AND Minus = '*' ) AS X FROM tbl_kandidat WHERE IdKandidat = '$IdKandidat'")->row();
        
        $hasil = array(
            'Plus' => $Plus,
            'Minus' => $Minus
        );

        return $hasil;
    }
    public function SimpanDISC()
    {
        $json = file_get_contents("php://input");
        $object = json_decode($json);

        $data = array(
            'D' => $object->D_Nilai,
            'I' => $object->I_Nilai,
            'S' => $object->S_Nilai,
            'C' => $object->C_Nilai,
            'StatusDisc' => 1
        );
        $this->db->where('IdKandidat', $object->IdKandidatDisc);
        $this->db->update('tbl_kandidat', $data);

        $qdat = ($this->db->affected_rows() != 1) ? false : true;

        $dataArr = array('ValReturn' => $qdat);
        echo json_encode($dataArr);
    }

    public function Datapapi($id_soal, $IdKandidat, $id_subsoal, $kodePapi)
    {
        $data = $this->db->query("SELECT A.Score, COUNT(*) AS TotalScore FROM tbl_jawabandetail A
        LEFT JOIN mst_subsoaldetail B ON B.id_subdetail = A.id_subdetail AND A.KodeSoal = B.KodeSoal where A.IdKandidat = '$IdKandidat' 
        AND A.id_soal = '$id_soal' AND A.id_subsoal = '$id_subsoal' AND A.JawabanKandidat = '1' AND B.Score = '$kodePapi'
        GROUP BY A.Score")->row();

        return $data;
    }

    public function GetAspek($StatusKecerdasan, $Aspek)
    {
        $data = $this->db->query("SELECT * FROM mst_aspek where Aspek = '$Aspek' AND Klasifikasi = '$StatusKecerdasan'")->row();
        return $data;
    }

    public function GetDataMSDT($Kode, $Angka, $IdKandidat, $id_soal, $id_subsoal)
    {
        if ($Kode == 'A') {
            $q = $this->db->query("SELECT A.*, B.Baris, B.Kolom FROM tbl_jawabandetail A 
            LEFT JOIN mst_subsoalheader B ON B.id_subdetail = A.id_subdetail 
            WHERE A.id_soal = '$id_soal' AND A.IdKandidat = '$IdKandidat'
            AND B.Baris = '$Angka' AND A.JawabanKandidat = '1' AND KodeSoal = '$Kode' AND A.Id_subsoal = '$id_subsoal'")->num_rows();
        }else if ($Kode == 'B'){
            $q = $this->db->query("SELECT A.*, B.Baris, B.Kolom FROM tbl_jawabandetail A 
            LEFT JOIN mst_subsoalheader B ON B.id_subdetail = A.id_subdetail 
            WHERE A.id_soal = '$id_soal' AND A.IdKandidat = '$IdKandidat'
            AND B.Kolom = '$Angka' AND A.JawabanKandidat = '1' AND KodeSoal = '$Kode' AND A.Id_subsoal = '$id_subsoal'")->num_rows();
        }
       
        return $q;
    }

    // Print Paket
    public function PrintPaket($id)
    {
        // $data['judul'] = "Data Cam Kandidat $q->NamaKandidat";
        // Example
        $data['judul'] = "Detail Kandidat";
        $data['control'] = $this;
        $data['id'] = $id;
        $data['Kandidat'] = $this->db->query("SELECT * FROM tbl_kandidat a 
                                              LEFT JOIN mst_jabatan b ON a.id_jabatan = b.id_jabatan 
                                              LEFT JOIN mst_paketheader c ON c.IdPaket = a.IdPaket
                                              LEFT JOIN mst_leveljabatan d ON d.id_level = a.id_level
                                              LEFT JOIN mst_divisi e ON e.idDivisi = a.idDivisi
                                              WHERE a.IdKandidat = '$id'")->row();
        // $data['data_level'] = $this->db->query("SELECT * FROM tbl_userlevel")->result();
        $this->load->view('DetailKandidat/v_printpaket',$data);
    }
    
    
}
