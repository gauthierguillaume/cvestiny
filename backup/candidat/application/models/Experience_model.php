<?php

class Experience_model extends CI_Model
{
protected $table ="candidat_experience";

    public function get()
    {
        return $this->db->get($this->table);
    }
    public function getByCandidatId($candidat_id)
    {
        return $this->db->where('candidat_id', $candidat_id)->get($this->table);
    }
    
    public function getOne($id)
    {
    }
}