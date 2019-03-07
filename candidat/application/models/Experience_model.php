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
    
    public function getExperience()
    {
        $idexperience =  $this->session->userdata['candidat']['id'];
        $query = $this->db->query('SELECT exp_nom_travail, exp_entreprise ,exp_description, exp_duree FROM candidat_experience WHERE candidat_id =' . $idexperience );
        return $query->result_array();
    }
}