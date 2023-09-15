<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Test extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    function Auth($NoPeserta, $NoTelp)
    {

        //menggunakan active record . untuk menghindari sql injection
        $this->db->where("NoPeserta", $NoPeserta);
        $this->db->where("NoTelp", $NoTelp);
        return $this->db->get("tbl_kandidat");    
    }

    function check_db($NoPeserta)
    {
        return $this->db->get_where('tbl_kandidat', array('NoPeserta' => $NoPeserta));
    }



}

/* End of file Mod_login.php */
