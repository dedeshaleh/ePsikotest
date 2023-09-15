<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_divisi extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function __construct()
    {
         parent::__construct();
    }
    public function GetDivisi()
    {
        $this->db->select();
        $this->db->from("mst_divisi");
        $q = $this->db->get();
        return $q->result();
    }

}

/* End of file Mod_login.php */
