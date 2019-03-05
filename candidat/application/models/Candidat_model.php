<?php

class Candidat_model extends CI_Model
{
protected $table ="candidat";

    public function get()
    {
        return $this->db->select('id, cand_nom')->get($this->table);
    }
    
    public function getOne($id)
    {
    }
}