<?php

class Pages_model extends CI_Model
{


    public function insertUser(){
        $data =array(
            'cand_prenom' => $_POST['cand_prenom'],
            'cand_nom' => $_POST['cand_nom'],
            'cand_email'=>$_POST['cand_email'],
            'cand_sexe'=>$_POST['cand_sexe'],
            'cand_mdp'=>password_hash($this->input->post('cand_mdp'), PASSWORD_DEFAULT),
            'cand_created_at'=>date('Y-m-d')
        );
        $this->db->insert('candidat', $data);
        $this->session->set_flashdata('success',"Votre compte à bien était crée. Vous pouvez vous connecter");
        redirect("Pages/register","refresh");
        //                            ajouter dans la bdd
    }

    public function can_login($email)
    {
//        $this->db->select('*');
//        $this->db->from('candidat');
//       $this->db->where('cand_email', $email);
//       $query = $this->db->get()->result_array();
    }

}