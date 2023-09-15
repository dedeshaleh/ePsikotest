<?php

use phpDocumentor\Reflection\Types\Object_;

 defined('BASEPATH') or exit('No direct script access allowed');

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
class Kandidat extends MY_Controller
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
    public function index()
    {
        // Example
        $data['judul'] = "Data Kandidat";
        $data['control'] = $this;
        $data['jabatan'] = $this->db->query("SELECT * FROM mst_jabatan")->result();
        $data['level'] = $this->db->query("SELECT * FROM mst_leveljabatan")->result();
        $data['divisi'] = $this->db->query("SELECT * FROM mst_divisi")->result();
        $data['Paket'] = $this->db->query("SELECT * FROM mst_paketheader WHERE StatusPaket = '1'")->result();
        // $data['data_level'] = $this->db->query("SELECT * FROM tbl_userlevel")->result();
        $this->template->backend('Kandidat/index',$data);
    }

    public function data_detail()
    {
        // $start = $this->input->post("start");
        // echo $start."test";
        $date_awal = $this->input->post("date_awal");
        $date_akhir = $this->input->post("date_akhir");
        $karyawan = $this->input->post("karyawan");
        
        $nik = $this->session->userdata('username');
        $hasil = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_Kandidat->count_all(),
            'recordsFiltered' => $this->M_Kandidat->count_filtered(),
            "data" => $this->M_Kandidat->get_datatables(),
        );
        echo json_encode($hasil);

    }
    public function GetData()
    {
        $nik = $this->input->post("nik");
        $q = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$nik'")->row();
        echo json_encode($q);
    }
    public function Tambah()
    {

        // $q = $this->db->query("SELECT * FROM tbl_kandidat")->num_rows();
        $nik = $this->input->post('NIK');
        $q2 = $this->db->query("SELECT * FROM tbl_kandidat WHERE NIK = '$nik' AND StatusKandidat = '0'")->num_rows();
        
        $TglTest = $this->input->post("TglTest");
        $q = $this->db->query("SELECT AngkaCount FROM tbl_kandidat WHERE DATE(TglCount) = '$TglTest' ORDER BY AngkaCount DESC")->row();
        $hasil = $q->AngkaCount + 1;
        $data = sprintf("%04d", $hasil);
        $date_fix = date_create($TglTest);
        $valNoPeserta = date_format($date_fix, "Ymd").'-'.$data;
        $data = array(
            'IdKandidat' => uniqid(true),
            'NoPeserta' => $valNoPeserta,
            'TglCount' => $this->input->post('TglTest'),
            'AngkaCount' => $hasil,
            'NamaKandidat' => $this->input->post('NamaKandidat'),
            'TglLahir' => $this->input->post('TglLahir'),
            'Pendidikan' => $this->input->post('Pendidikan'),
            'Kelamin' => $this->input->post('Kelamin'),
            'TglTest' => $this->input->post('TglTest'),
            'NoTelp' => $this->input->post('NoTelp'),
            'Email' => $this->input->post('Email'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_level' => $this->input->post('id_level'),
            'idDivisi' => $this->input->post('idDivisi'),
            'IdPaket' => $this->input->post('IdPaket'),
            'NIK' => $this->input->post('NIK'),
            'CreateDate' => date("Y-m-d H:i:s"),
            'CreateBy' => $this->session->userdata("id_user"),
            'CreateName' => $this->session->userdata("full_name")
        );

        if ($q2 > 0) {
            $this->session->set_flashdata('msg',"<div class='alert alert-danger'>Data Kandidat Gagal Ditambahkan NIK : ".$nik." & Nama : ".$this->input->post('NamaKandidat')."</div>");
        }else{
            $this->session->set_flashdata('msg',"<div class='alert alert-success'>Data Kandidat Berhasil Ditambahkan NIK : ".$nik." & Nama : ".$this->input->post('NamaKandidat')."</div>");
            $this->db->insert("tbl_kandidat", $data);
        }
       
        redirect("Transaksi/Kandidat");


    }

    public function Edit()
    {
        $IdKandidat = $this->input->post("IdKandidat");
        $nik = $this->input->post("NIK");
        $q = $this->db->query("SELECT * FROM tbl_kandidat WHERE IdKandidat = '$IdKandidat' AND NIK = '$nik' AND StatusKandidat = '0'")->num_rows();
        $q2 = $this->db->query("SELECT * FROM tbl_kandidat WHERE NIK = '$nik' AND StatusKandidat = '0'")->num_rows();
        $data = array(
            'NamaKandidat' => $this->input->post('NamaKandidat'),
            'TglLahir' => $this->input->post('TglLahir'),
            'Pendidikan' => $this->input->post('Pendidikan'),
            'Kelamin' => $this->input->post('Kelamin'),
            'TglTest' => $this->input->post('TglTest'),
            'NoTelp' => $this->input->post('NoTelp'),
            'Email' => $this->input->post('Email'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_level' => $this->input->post('id_level'),
            'IdPaket' => $this->input->post('IdPaket'),
            'idDivisi' => $this->input->post('idDivisi'),
            'NIK' => $this->input->post('NIK'),
            'UpdateDate' => date("Y-m-d H:i:s"),
            'UpdateBy' => $this->session->userdata("id_user"),
            'UpdateName' => $this->session->userdata("full_name")
        );
        if ($q2 > 0) {
            if ($q > 0) {
                $this->db->where("IdKandidat", $IdKandidat);
                $this->db->update("tbl_kandidat", $data);
                // echo "Berhasil Save (NIK SUDAH ADA)";
                $this->session->set_flashdata('msg',"<div class='alert alert-success'>Data Kandidat Berhasil Di Update NIK : ".$nik." & Nama : ".$this->input->post('NamaKandidat')."</div>");
            }else{
                // echo "Data Duplikat";
                $this->session->set_flashdata('msg',"<div class='alert alert-danger'>Data Kandidat Gagal Di Update NIK : ".$nik." & Nama : ".$this->input->post('NamaKandidat')."</div>");

            }
        }else{
            // echo "Berhasil Save ( NIK CHANGE )";
            $this->db->where("IdKandidat", $IdKandidat);
            $this->db->update("tbl_kandidat", $data);
            $this->session->set_flashdata('msg',"<div class='alert alert-success'>Data Kandidat Berhasil Di Update NIK : ".$nik." & Nama : ".$this->input->post('NamaKandidat')."</div>");

        }   
        redirect("Transaksi/Kandidat");
    }
    
    public function Delete()
    {
        $IdKandidat = $this->input->post("IdKandidat");
        $q = $this->db->query("SELECT * FROM tbl_kandidat WHERE IdKandidat = '$IdKandidat'")->row();
        $data = array(
            'StatusKandidat' => "1",
            'UpdateDate' => date("Y-m-d"),
            'UpdateBy' => $this->session->userdata("id_user"),
            'UpdateName' => $this->session->userdata("full_name"),
        );
        $this->db->where("IdKandidat", $IdKandidat);
        $this->db->update("tbl_kandidat", $data);
        $this->session->set_flashdata('msg',"<div class='alert alert-danger'>Data Kandidat Berhasil Di Dihapus NIK : ".$q->NIK." & Nama : ".$q->NamaKandidat."</div>");
        redirect("Transaksi/Kandidat");
    }

    public function DataCam($IdKandidat)
    {
        $q = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$IdKandidat' ")->row();
        $data['judul'] = "Data Cam Kandidat $q->NamaKandidat";
        $data['DataCam'] = $this->db->query("SELECT * FROM tbl_kandidat_cam where IdKandidat = '$IdKandidat'")->result();
        $data['IdKandidat'] = $IdKandidat;
        $data['control'] = $this;
        $data['DataSoal'] = $this->db->query("SELECT * FROM mst_soal ")->result();
        $this->template->backend('Kandidat/v_Cam',$data);
    }

    public function GetPrint()
    {
        $IdKandidat = $this->input->post("id");
        $q_form = $this->db->query("SELECT * FROM tbl_kandidat_form_detail WHERE IdKandidat = '$IdKandidat'")->result();
        $q_form_head = $this->db->query("SELECT * FROM tbl_kandidat_form_header WHERE IdKandidat = '$IdKandidat'")->result();
        $q_kandidat = $this->db->query("SELECT a.*, b.NamaJabatan, c.namaLevel, d.NamaDivisi FROM tbl_kandidat a 
                                        LEFT JOIN mst_jabatan b ON b.id_jabatan = a.id_jabatan 
                                        LEFT JOIN mst_leveljabatan c ON c.id_level = a.id_level 
                                        LEFT JOIN mst_divisi d ON d.idDivisi = a.idDivisi 
                                        WHERE a.IdKandidat = '$IdKandidat'")->result();
        $data = array(
            "form" => $q_form,
            "kandidat" => $q_kandidat,
            "formHead" => $q_form_head
        );
        echo json_encode($data);
    }

    public function Print($IdKandidat)
    {
        // $data['judul'] = "Data Cam Kandidat $q->NamaKandidat";
        $data['IdKandidat'] = $IdKandidat;
        $this->load->view('Kandidat/v_print',$data);
    }
    public function getFoto($id_soal, $IdKandidat)
    {
        $dataFoto = $this->db->query("SELECT * FROM tbl_kandidat_cam where id_soal = '$id_soal' AND IdKandidat = '$IdKandidat'")->result();
        return $dataFoto;
    }

    public function EditData($IdKandidat)
    {
        $data['judul'] = "Form Edit";
        $data['IdKandidat'] = $IdKandidat;
        $data['control'] = $this;
        $data['id'] = $IdKandidat;
        $data['Kandidat'] = $this->db->query("SELECT * FROM tbl_kandidat a LEFT JOIN mst_jabatan b ON a.id_jabatan = b.id_jabatan WHERE a.IdKandidat = '$IdKandidat'")->row();

        $this->template->backend('Kandidat/v_edit',$data);
    }

    public function GetLulus()
    {
        $json = file_get_contents("php://input"); // json string
        $object = json_decode($json); // php object
        // echo $object->IdKandidat;

        $q = $this->db->query("SELECT * FROM tbl_kandidat where IdKandidat = '$object->IdKandidat'")->row();
        echo json_encode($q);
    }

    public function GetLulusAdd()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'StatusLulus' => $this->input->post("StatusLulus"),
            'KetLulus' => $this->input->post("KetLulus"),
            'UpdateLulus' => date('Y-m-d H:i:s'),
            'UpdateByLulus' => $this->session->userdata("id_user")
        );
        $this->db->where('IdKandidat', $this->input->post('IdKandidat'));
        $this->db->update('tbl_kandidat', $data);
        $qdat = ($this->db->affected_rows() != 1) ? false : true;

        $dataArr = array('ValReturn' => $qdat);
        echo json_encode($dataArr);
    }

    public function ReturnLulus()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'StatusLulus' => 0,
            'UpdateLulus' => date('Y-m-d H:i:s'),
            'UpdateByLulus' => $this->session->userdata("id_user")
        );
        $this->db->where('IdKandidat', $this->input->post('IdKandidat'));
        $this->db->update('tbl_kandidat', $data);
        $qdat = ($this->db->affected_rows() != 1) ? false : true;

        $dataArr = array('ValReturn' => $qdat);
        echo json_encode($dataArr);
    }
    
    
}
