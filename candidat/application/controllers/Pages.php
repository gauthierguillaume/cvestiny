<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23/01/2019
 * Time: 15:59
 */

class Pages extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('includes/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('includes/footer', $data);

    }
//                                    TODO FONCTION Enregistrement
        public function register ()
        {
            $data['title'] = 'Register';
            $this->load->view('includes/header', $data);
                if (isset($_POST['submitted']))
                {
    //                            TODO regle pour le formulaire
                $this->form_validation->set_rules('cand_prenom', 'Pr&eacute;nom', 'required');
                $this->form_validation->set_rules('cand_nom', 'Nom', 'required');
                $this->form_validation->set_rules('cand_email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('cand_sexe', 'Sexe', 'required');
                $this->form_validation->set_rules('cand_mdp', 'Mot de passe', 'required|min_length[5]');
                $this->form_validation->set_rules('cand_mdp2', 'Confirmer le mot de passe', 'required|min_length[5]|matches[cand_mdp]');
    //                            TODO Si le formulaire est bon
                        if ($this->form_validation->run() == TRUE)
                            {
                                $this->form_validation->set_data($_POST);
                                $this->load->model('Pages_model', '', TRUE);
                                $hash = password_hash($this->input->post('cand_mdp'), PASSWORD_DEFAULT);
                                $token = $this->generateRandomString(255);
                                $this->load->model('Register_model');
                                    $this->Register_model->insert_entry(
                                    $this->input->post('cand_nom'),
                                    $this->input->post('cand_prenom'),
                                    $this->input->post('cand_email'), $hash, $token);

                                $this->session->set_flashdata('success',"Votre compte à bien était crée. Vous pouvez vous connecter");
                                redirect("Pages/register","refresh");
                        }
    //                    TODO Si le formulaire n'est pas bon.
                        else{
                            $this->load->view('pages/register', $data);
                        }
            }

            $this->load->view('pages/register', $data);
            $this->load->view('includes/footer', $data);
        }
//                        TODO: RandomString $token
        private function generateRandomString($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    //                            TODO FONCTION CONNEXION
        public function login()
        {
            $data['title'] = 'Connexion';
            if (isset($_POST['submitted'])) {
                $rules = array(
                    array(
                        'field' => 'cand_email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                    ),
                    array(
                        'field' => 'cand_mdp',
                        'label' => 'Mot de passe',
                        'rules' => 'trim|required'
                    ),
                );
                $this->form_validation->set_rules($rules);
                // TODO: Model_Connexion
                $this->load->model('Login_model');
                $this->Login_model->can_login();
            }
            $this->load->view('includes/header', $data);
            $this->load->view('pages/login', $data);
            $this->load->view('includes/footer', $data);
        }
                                // TODO: Déconnexion
        public function disconnect()
        {
            $this->session->sess_destroy();
            redirect(base_url('Pages/index'));
        }
//                           TODO: Fonction Inserer un CV
        public function insertcv() {
            $data['title'] = 'insert_cv';
            $this->load->view('includes/header', $data);
                if (isset($_POST['submitted']))
                {
                 $regles = array(
                     array(
                         'field' => 'cand_prenom',
                         'label' => 'Pr&eacute;nom',
                         'rules' => 'required'
                     ),
                     array(
                         'field' => 'cand_nom',
                         'label' => 'Nom',
                         'rules' => 'required'
                     ),
                     array(
                         'field' => 'cand_adresse',
                         'label' => 'Adresse',
                         'rules' => 'required'
                     ),
                     array(
                         'field' => 'cand_email',
                         'label' => 'Email',
                         'rules' => 'required'
                     ),
                         array(
                             'field' => 'cand_telephone',
                             'label' => 'Tél',
                             'rules' => 'required'
                         )
                 );
                $this->form_validation->set_rules($regles);
                if ($this->form_validation->run() === TRUE) {
                    echo ' bien jouer';
                }else {
                    echo' echouer';
                }

            }

              $infos =  $this->session->userdata("name");

//                        TODO: Boucle Competence Technique db
            $query = $this->db->query('SELECT competence_tech_nom, id FROM competence_technique');
            $tabTech = $query->result();
//                      TODO: Boucle Competence Organisationnelle db
            $query = $this->db->query('SELECT competence_orga_nom, id FROM competence_organisationnelle');
            $tabOrg = $query->result();
            $this->load->view('pages/insert_cv', array("tech" => $tabTech, "orga" => $tabOrg, "infos" => $infos));
            $this->load->view('includes/footer', $data);
        }


}

