<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soal extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetSoal()
    {
        $this->db->select();
        $this->db->from("mst_soal");
        $q = $this->db->get();
        return $q->result();
    }
    
    

    public function GetMenu($id=null)
    {
        if ($id!=null) {
            $q = $this->db->query("
            SELECT a.id_menu AS id_menu, a.nama_menu AS nama_menu, a.parent_id, b.view_level, b.add_level, b.edit_level, b.delete_level
            FROM tbl_menu a
            LEFT JOIN tbl_akses_menu b ON a.id_menu=b.id_menu 
            WHERE (b.id_user = '$id' OR (b.id_user = '' OR b.id_user IS NULL))
            AND a.status_menu = '1'
            GROUP BY a.id_menu, a.nama_menu, a.parent_id
            ORDER BY nama_menu ASC
    
            ");
        }else{
            $q = $this->db->query("SELECT a.id_menu, a.nama_menu, a.parent_id 
            FROM tbl_menu a 
             WHERE a.status_menu = '1'");
        }
        
        return $q->result();
    }
    public function GetMenu2($id=null)
    {
        if ($id!=null) {
            $q = $this->db->query("
            SELECT a.id_menu AS id_menu, a.nama_menu AS nama_menu, a.parent_id, b.view_level, b.add_level, b.edit_level, b.delete_level
            FROM tbl_menu a
            LEFT JOIN tbl_akses_menu b ON a.id_menu=b.id_menu 
            WHERE (b.id_user = '$id' OR (b.id_user = '' OR b.id_user IS NULL))
            AND a.status_menu = '2'
            GROUP BY a.id_menu, a.nama_menu, a.parent_id
            ORDER BY nama_menu ASC
    
            ");
        }else{
            $q = $this->db->query("SELECT a.id_menu, a.nama_menu, a.parent_id 
            FROM tbl_menu a 
             WHERE a.status_menu = '2'");
        }
        return $q->result();
    }
    public function GetMenu3($id=null)
    {
        if ($id!=null) {
            $q = $this->db->query("
            SELECT a.id_menu AS id_menu, a.nama_menu AS nama_menu, a.parent_id, b.view_level, b.add_level, b.edit_level, b.delete_level
            FROM tbl_menu a
            LEFT JOIN tbl_akses_menu b ON a.id_menu=b.id_menu 
            WHERE (b.id_user = '$id' OR (b.id_user = '' OR b.id_user IS NULL))
            AND a.status_menu = '3'
            GROUP BY a.id_menu, a.nama_menu, a.parent_id
            ORDER BY nama_menu ASC
    
            "); 
        }else{
            $q = $this->db->query("SELECT a.id_menu, a.nama_menu, a.parent_id 
            FROM tbl_menu a 
             WHERE a.status_menu = '3'");
        }
        return $q->result();
    }
    public function UpdateData($id_user,$id_menu, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_menu', $id_menu);
        $this->db->update('tbl_akses_menu', $data);
    }
    
    //Sub Soal Modal Start //

    public function GetSubSoal($id_soal)
    {
        $this->db->select();
        $this->db->from("mst_subsoal");
        $this->db->where('id_soal', $id_soal);
        $q = $this->db->get();
        return $q->result();
    }
    
    // Sub Soal Modal End //


    // Sub Soal Detail Modal Start //

    public function GetSubSoalDetail($id_subsoal)
    {
        $this->db->select();
        $this->db->from('mst_subsoalheader');
        $this->db->where('id_subsoal', $id_subsoal);
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


    // Soal Instruksi
    public function UpdateHeaderInstruksi($id_subdetail, $data_header)
    {
        $this->db->where('id_soalinstruksi', $id_subdetail);
        $this->db->update("mst_soalinstruksiheader", $data_header);
    }

    public function DeleteDetailInstruksi($id_subdetail)
    {
        $this->db->where('id_soalinstruksi', $id_subdetail);
        $this->db->delete("mst_soalinstruksidetail");
    }

}

/* End of file Mod_login.php */
