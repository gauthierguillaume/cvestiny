<?php

class Tech_model extends CI_Model
{
    protected $table ="candidat_competence_technique";
    protected $tableJoin ="competence_technique";

    public function get()
    {
        return $this->db->get($this->table);
    }


    public function getByCandidatId($candidat_id)
    {
        return 
        $this->db->where('candidat_id', $candidat_id)
        ->from($this->table)
        ->join($this->tableJoin, "competence_technique.id=candidat_competence_technique.competence_technique_id")
        ->get();
    }
    
    public function getOne($id)
    {
    }
}