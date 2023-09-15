<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Skoring extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetSkoring()
    {
        $this->db->select();
        $this->db->from("mst_skoring");
        $q = $this->db->get();
        return $q->result();
    }
    
    

    public function UpdateData($id_user,$id_menu, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_menu', $id_menu);
        $this->db->update('tbl_akses_menu', $data);
    }
    
    //Sub Soal Modal Start //

    public function GetSubSkor($IdSkoring)
    {
        $this->db->select();
        $this->db->from("mst_skoringheader");
        $this->db->where('IdSkoring', $IdSkoring);
        $q = $this->db->get();
        return $q->result();
    }
    
    // Sub Soal Modal End //


    // Sub Soal Detail Modal Start //

    public function GetSubSkorDetail($IdHeaderSkor)
    {
        $this->db->select();
        $this->db->from('mst_skoringdetail');
        $this->db->where('IdHeaderSkor', $IdHeaderSkor);
        $q = $this->db->get();
        return $q->result();
    }

    public function SubSoalHeader($id_subdetail)
    {
        $this->db->where('id_subdetail', $id_subdetail);
        $this->db->delete('mst_subsoalheader');
    }
    public function SubSoalDetail($id_subdetail)
    {
        $this->db->where('id_subdetail', $id_subdetail);
        $this->db->delete('mst_subsoaldetail');
    }
    public function UpdateSoalHeader($id_subdetail, $data_header)
    {
        $this->db->where('id_subdetail', $id_subdetail);
        $this->db->update('mst_subsoalheader', $data_header);
    }
    // SUb Soal Detail Modal End //

    public function GetSubSoalInstruksi($id_subsoal)
    {
        $this->db->select();
        $this->db->from('mst_soalinstruksiheader');
        $this->db->where('id_subsoal', $id_subsoal);
        $q = $this->db->get();
        return $q->result();
    }

    public function DelSkorHeader($IdHeaderSkor)
    {
        $this->db->where("IdHeaderSkor", $IdHeaderSkor);
        $this->db->delete('mst_skoringheader');
    }
    public function DelSkorDetail($IdHeaderSkor)
    {
        $this->db->where("IdHeaderSkor", $IdHeaderSkor);
        $this->db->delete('mst_skoringdetail');
    }

}

/* End of file Mod_login.php */
