<?php

class Register_model extends CI_Model
{

    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $genre;
    protected $token;

    public function insert_entry($nom, $prenom, $email,$genre, $password, $token)
    {
        $candidat = array(

            'cand_nom'       => $this->security->xss_clean($nom),
            'cand_prenom'    => $this->security->xss_clean($prenom),
            'cand_email'     => $this->security->xss_clean($email),
            'cand_sexe'      => $this->security->xss_clean($genre),
            'cand_mdp'       => $this->security->xss_clean($password),
            'cand_token'     => $token
        );

        $this->db->insert('candidat', $candidat);
    }


}