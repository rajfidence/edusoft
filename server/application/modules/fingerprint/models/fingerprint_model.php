<?php

class fingerprint_model extends CI_Model
{

    function saveFingerprint($data){
        $this->db->insert('tbl_fingerprint', $data);
        return $this->db->affected_rows() > 0 ? $this->db->insert_id() : false;
    }

    function get_fingerPrints($u_id){
        $this->db->select('Id,fingertype,BitmapData');
        $this->db->from('tbl_fingerprint');
        $this->db->where('u_id', $u_id);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

}

?>