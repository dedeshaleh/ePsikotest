<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
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

    function check_db($NoPeserta, $NoTelp)
    {
        return $this->db->get_where('tbl_kandidat', array('NoPeserta' => $NoPeserta, 'Notelp' => $NoTelp));
    }



}

/* End of file Mod_login.php */
