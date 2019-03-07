<?php

class Orga_model extends CI_Model
{
    protected $table ="candidat_competence_organisationnelle";
    protected $tableJoin ="competence_organisationnelle";

    public function get()
    {
        return $this->db->get($this->table);
    }


    public function getByCandidatId($candidat_id)
    {
        return
            $this->db->where('candidat_id', $candidat_id)
                ->from($this->table)
                ->join($this->tableJoin, "competence_organisationnelle.id=candidat_competence_organisationnelle.competence_organisationnelle_id")
                ->get();
    }

    public function getOne($id)
    {
    }
}