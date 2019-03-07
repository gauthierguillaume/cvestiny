<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 26/02/2019
 * Time: 15:47
 */

class User extends CI_Controller
{
    public function insert_cv ()
    {
        $data['title'] = 'insert_cv';
        $this->load->view('includes/header', $data);

        if (isset($_POST['submitted_cv']))
        {

            $this->form_validation->set_rules('cand_prenom', 'Pr&eacute;nom', 'required');
            $this->form_validation->set_rules('cand_nom', 'Nom', 'required');
            $this->form_validation->set_rules('cand_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('cand_adresse', 'Email', 'required');
            $this->form_validation->set_rules('cand_telephone', 'tel', 'required');


//            //                si le formulaire est bon
//            if ($this->form_validation->run() == TRUE)
//            {
//                $this->form_validation->set_data($_POST);
//
//                $this->load->model('Pages_model', '', TRUE);
//
//                $hash = password_hash($this->input->post('cand_mdp'), PASSWORD_DEFAULT);
//                $token = $this->generateRandomString(255);
//
//                $this->Pages_model->insert_entry($this->input->post('cand_nom'), $this->input->post('cand_prenom'), $this->input->post('cand_email'), $hash, $token);
//                $this->form_validation->set_message( 'Votre compte a bien été crée');
//            }
        }

        $this->load->view('pages/insert_cv', $data);
        $this->load->view('includes/footer', $data);
    }
}