<?php

class Register_model extends CI_Model
{

    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $token;

    public function insert_entry($nom, $prenom, $email, $password, $token)
    {
        $candidat = array(

            'cand_nom' => $nom,
            'cand_prenom' => $prenom,
            'cand_email' => $email,
            'cand_mdp' => $password,
            'cand_token' => $token
        );

        $this->db->insert('candidat', $candidat);
    }

}