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
                ->join($this->tableJoin, "$this->tableJoin.id=$this->table.competence_organisationnelle_id")
                ->get();
    }

    public function getAllOrg()
    {
        $query = $this->db->query('SELECT competence_orga_nom, id FROM competence_organisationnelle');
        return $query->result();
    }

    public function getAllCompOrg(){
        $id =  $this->session->userdata['candidat']['id'];
        $query = $this->db->query('SELECT *
                                     FROM candidat_competence_organisationnelle 
                                     JOIN competence_organisationnelle ON competence_organisationnelle.id=candidat_competence_organisationnelle.competence_organisationnelle_id
                                     WHERE candidat_id ='. $id );
        return $query->result_array();

    }
}