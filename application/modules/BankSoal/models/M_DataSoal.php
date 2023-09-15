<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DataSoal extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetBooks()
    {
        $this->db->select();
        $this->db->from("mst_soal");
        $q = $this->db->get();
        return $q->result();
    }
    public function Get_karyawan_relasi()
    {
        $this->db->select("a.*, b.name");
        $this->db->from("mst_relasi_karyawan_pei a");
        $this->db->join("mst_karyawan_pei b", "b.nik = a.nik");
        $q = $this->db->get();
        return $q->result();
    }

}

/* End of file Mod_login.php */
