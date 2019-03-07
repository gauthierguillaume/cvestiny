<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06/03/2019
 * Time: 11:33
 */

class Diplome_model extends CI_Model
{

    protected $table ="candidat_diplome";

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