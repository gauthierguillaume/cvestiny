<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/03/2019
 * Time: 11:32
 */

class Loisir_model extends CI_Model

{
    protected $table ="candidat_loisir";

    public function get()
    {
        return $this->db->get($this->table);
    }
    public function getByCandidatId($candidat_id)
    {
        return $this->db->where('candidat_id', $candidat_id)->get($this->table);
    }
    public function getLoisir(){
        $idexperience =  $this->session->userdata['candidat']['id'];

        $query = $this->db->query('SELECT cand_loisir_nom FROM candidat_loisir WHERE candidat_id =' . $idexperience );
        return $query->result_array();
    }
}
