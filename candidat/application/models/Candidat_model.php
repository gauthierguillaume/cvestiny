<?php

class Candidat_model extends CI_Model
{
protected $table ="candidat";

    public function get()
    {
        return $this->db->get($this->table);
    }
    
    public function getInfo()
    {
        $idcandidat =  $this->session->userdata['candidat']['id'];
        $query = $this->db->query('SELECT  cand_prenom, cand_nom,  cand_adresse, cand_code_postal, cand_telephone, cand_email FROM candidat WHERE id =' . $idcandidat);

        return $query->result_array();
    }

    public function getOne($id)
    {
        return $this->db->where('id', $id)->get($this->table);
    }
}