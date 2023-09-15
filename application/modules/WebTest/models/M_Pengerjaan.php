<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengerjaan extends CI_Model {
    function Aplikasi()
    {
        return $this->db->get('aplikasi');
    }

    public function UpdateSoal($data, $IdKandidat, $Id_subsoal)
    {
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->where('id_subsoal', $Id_subsoal);
        $this->db->update("tbl_kandidat_soal_time", $data);
    }

    public function UpdateInstruksi($data, $IdKandidat, $Id_subsoal)
    {
        $this->db->where('IdKandidat', $IdKandidat);
        $this->db->where('id_subsoal', $Id_subsoal);
        $this->db->update("tbl_kandidat_Instruksi_time", $data);
    }
    

    public function insert_batch_ignore_detail($table, $data) {
        $sql = "INSERT IGNORE INTO " . $table . " (IdKandidat, NoPeserta, id_soal, id_subsoal, id_subdetail, Jawaban, KodeSoal, IsiDetailSoal, TypeJawab, Score, JawabanKandidat, Plus, Minus) VALUES ";
    
        foreach ($data as $row) {
            $sql .= "(" . $this->db->escape($row['IdKandidat']) . ", " . $this->db->escape($row['NoPeserta']) . ", " . $this->db->escape($row['id_soal']) . ", " . $this->db->escape($row['id_subsoal']) . ", " . $this->db->escape($row['id_subdetail']) . ", " . $this->db->escape($row['Jawaban']) . ", " . $this->db->escape($row['KodeSoal']) . ", " . $this->db->escape($row['IsiDetailSoal']) . ", " . $this->db->escape($row['TypeJawab']) . ", " . $this->db->escape($row['Score']) . ", " . $this->db->escape($row['JawabanKandidat']) . ", " . $this->db->escape($row['Plus']) . ", " . $this->db->escape($row['Minus']) . "),";
        }
    
        $sql = rtrim($sql, ","); // menghapus tanda koma terakhir
        //  var_dump($sql);
        // exit();
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    public function insert_batch_ignore_header($table, $data) {
        $sql = "INSERT IGNORE INTO " . $table . " (Id_soal, Id_subsoal, IdKandidat, NoPeserta, id_subdetail, CreateDate) VALUES ";
    
        foreach ($data as $row) {
            $sql .= "(" . $this->db->escape($row['Id_soal']) . ", " . $this->db->escape($row['Id_subsoal']) . ", " . $this->db->escape($row['IdKandidat']) . ", " . $this->db->escape($row['NoPeserta']) . ", " . $this->db->escape($row['id_subdetail']) . ", " . $this->db->escape($row['CreateDate']) . "),";
        }
    
        $sql = rtrim($sql, ","); // menghapus tanda koma terakhir
        // var_dump($sql);
        // exit();
        $this->db->query($sql);
        return $this->db->affected_rows();
    }



}

/* End of file Mod_login.php */
