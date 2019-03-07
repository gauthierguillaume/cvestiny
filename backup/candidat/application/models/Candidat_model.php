<?php

class Candidat_model extends CI_Model
{
protected $table ="candidat";

    public function get()
    {
        return $this->db->get($this->table);
    }
    
    public function getOne($id)
    {
        return $this->db->where('id', $id)->get($this->table);
    }
}