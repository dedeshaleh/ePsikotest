<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PF extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetPF()
    {
        $this->db->select();
        $this->db->from("mst_pf16_header");
        $q = $this->db->get();
        return $q->result();
    }
    
    public function DeleteHeader($IdPFHeader)
    {
        $this->db->where('IdPFHeader', $IdPFHeader);
        $this->db->delete("mst_pf16_header");
    }
    public function DeleteDetail($IdPFHeader)
    {
        $this->db->where('IdPFHeader', $IdPFHeader);
        $this->db->delete("mst_pf16_detail");
    }

}

/* End of file Mod_login.php */
