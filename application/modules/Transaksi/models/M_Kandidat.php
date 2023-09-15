<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kandidat extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetKandidat()
    {
        $this->db->select();
        $this->db->from("tbl_kandidat");
        $q = $this->db->get();
        return $q->result();
    }

    public function count_all()
    {
        $this->db->select();
        $this->db->from("tbl_kandidat");
        $this->db->where("StatusKandidat", 0);
        return $this->db->count_all_results();
    }
    function count_filtered()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query($term);
        $query = $this->db->get();
        return $query->num_rows();
    }
    var $order = array('a.CreateDate' => 'DESC'); // default order 
    private function _get_datatables_query($term = '')
    {
        $column = array('', 'a.NoPeserta', 'a.NamaKandidat', 'a.TglLahir', 'a.Pendidikan', 'a.NoTelp', 'b.NamaDivisi', 'c.NamaPaket', 'a.TglTest'); //Sesuaikan dengan field
        $this->db->select("a.IdKandidat, a.NoPeserta, a.NamaKandidat, a.TglLahir, a.Pendidikan, a.NoTelp, b.NamaDivisi, c.NamaPaket, a.TglTest, a.StatusKoreksi, a.StatusKandidat, a.StatusLulus, a.IdPaket");
        $this->db->from("tbl_kandidat a");
        $this->db->join("mst_divisi b", "a.IdDivisi = b.IdDivisi", "LEFT");
        $this->db->join("mst_paketheader c", "a.IdPaket = c.IdPaket", "LEFT");
        // if ($this->session->userdata('level') == '2' OR $this->session->userdata('level') == "karyawan") {
        //     $this->db->where("(peserta.nik = '$nik' OR training.pembicara like '%$karyawan%')");
        // }
        // if ($karyawan != null) {
        //     $this->db->where("(peserta.nik = '$karyawan' OR training.pembicara like '%$karyawan%')");
        // }
        // if ($date_awal != null && $date_akhir != null) {
        //     $this->db->where("(DATE(tgl_training) BETWEEN '$date_awal' AND '$date_akhir')");
        // }else if ($date_awal != null) {
        //     $this->db->where("DATE(tgl_training) = '$date_awal'");
        // }else if ($date_akhir != null) {
        //     $this->db->where("DATE(tgl_training) = '$date_akhir'");
        // }
        $this->db->where("a.StatusKandidat", 0);
        $this->db->where(" (a.NoPeserta LIKE '%$term%' OR a.NamaKandidat LIKE '%$term%' OR a.TglLahir LIKE '%$term%' OR a.Pendidikan LIKE '%$term%' OR a.NoTelp LIKE '%$term%' OR b.NamaDivisi LIKE '%$term%' OR a.TglTest LIKE '%$term%' ) ");
        if (isset($_REQUEST['order'])) {
            $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $term = $_REQUEST['search']['value'];
        $this->_get_datatables_query($term);
        if ($_POST['length'] != -1)
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        
        $query = $this->db->get();
        return $query->result();
    }

    public function UpdateHeader($IdKandidat, $id_subsoal)
    {
        $data = array(
            'StatusText' => '1',
            'DateCheckText' => date("Y-m-d H:i:s")
        );
        $this->db->where('id_subsoal', $id_subsoal);
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->update('tbl_jawabanheader', $data);
    }

    public function DelFormHeader($IdKandidat)
    {
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->delete('tbl_kandidat_form_header');
    }
    public function DelFormDetail($IdKandidat)
    {
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->delete('tbl_kandidat_form_detail');
    }
    public function insert_batch_ignore_detail($table, $data) {
        $sql = "INSERT IGNORE INTO " . $table . " (IdKandidat, NoPeserta, id_soal, id_subsoal, id_subdetail, Score, JawabanKandidat) VALUES ";
    
        foreach ($data as $row) {
            $sql .= "(" . $this->db->escape($row['IdKandidat']) . ", " . $this->db->escape($row['NoPeserta']) . ", " . $this->db->escape($row['id_soal']) . ", " . $this->db->escape($row['id_subsoal']) . ", " . $this->db->escape($row['id_subdetail']) . ", " . $this->db->escape($row['Score']) . ", " . $this->db->escape($row['JawabanKandidat']) . "),";
        }
    
        $sql = rtrim($sql, ","); // menghapus tanda koma terakhir
        //  var_dump($sql);
        // exit();
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function insert_batch_ignore_header($table, $data) {
        $sql = "INSERT IGNORE INTO " . $table . " (id_soal, id_subsoal, IdKandidat, NoPeserta, id_subdetail, CreateDate, StatusCheck, StatusText, DateCheckText, DateCheckSoal) VALUES ";
    
        foreach ($data as $row) {
            $sql .= "(" . $this->db->escape($row['id_soal']) . ", " . $this->db->escape($row['id_subsoal']) . ", " . $this->db->escape($row['IdKandidat']) . ", " . $this->db->escape($row['NoPeserta']) . ", " . $this->db->escape($row['id_subdetail']) . ", " . $this->db->escape($row['CreateDate']) . ", " . $this->db->escape($row['StatusCheck']) . ", " . $this->db->escape($row['StatusText']) . ", " . $this->db->escape($row['DateCheckText']) . ", " . $this->db->escape($row['DateCheckSoal']) . "),";
        }
    
        $sql = rtrim($sql, ","); // menghapus tanda koma terakhir
        // var_dump($sql);
        // exit();
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

}

/* End of file Mod_login.php */
