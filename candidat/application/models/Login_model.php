<?php

class Login_model extends CI_Model
{
    public function can_login()
    {
        if ($this->form_validation->run() === TRUE) {
            $this->form_validation->set_data($_POST);
            $this->db->select('*');
            $this->db->from('candidat');
            $this->db->where('cand_email', $this->input->post('cand_email'));
            $user = $this->db->get()->result_array();
            if (isset($user)) {
                $password = $user[0]['cand_mdp'];
                if (!password_verify($this->input->post('cand_mdp'), $password)) {
                    $this->form_validation->set_message('cand_mdp', 'Mot de passe erroné');
                } else {

                    $userdata = array(
                        'id'                 => $user[0]['id'],
                        'prenom'             => $user[0]['cand_prenom'],
                        'nom'                => $user[0]['cand_nom'],
                        'email'              => $user[0]['cand_email'],
                        'poste'              => $user[0]['cand_code_postal'],
                        'naissance'          => $user[0]['cand_date_naissance'],
                        'telephone'          => $user[0]['cand_telephone'],
                        'adresse'            => $user[0]['cand_adresse'],
                        'date_naissance'     => $user[0]['cand_date_naissance'],
                        'ip'                 => $_SERVER['REMOTE_ADDR']
                    );
                    $this->session->set_userdata('candidat', $userdata);

                    // TODO: Rediriger vers connexion
                    redirect('Pages/index');
                }
            } else {
                $this->form_validation->set_message('email', 'Veuillez vous inscrire');
            }
        }
    }
}