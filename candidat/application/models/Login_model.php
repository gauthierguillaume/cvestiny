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

                    $_SESSION['candidat'] = array(
                        'id' => $user[0]['id'],
                        'email' => $user[0]['cand_email'],
                        'ip' => $_SERVER['REMOTE_ADDR']
                    );
                    $userdata = array(
                        'name' => $user[0]['cand_prenom'],
                        'email' => $user[0]['cand_email'],
                    );
                    $this->session->set_userdata($userdata);
                    // TODO: Rediriger vers connexion
                    redirect('Pages/index');
                }
            } else {
                $this->form_validation->set_message('email', 'Veuillez vous inscrire');
            }
        }
    }
}