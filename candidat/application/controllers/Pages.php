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

//         var_dump($this->session->userdata("candidat")['id']);
        $data['infos'] = ($this->session->userdata("candidat"))['prenom'];
        $data['title'] = 'Home';
        $this->load->view('includes/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('includes/footer', $data);

    }

//                                    TODO FONCTION Enregistrement
    public function register()
    {
        $data['title'] = 'Register';
        $this->load->view('includes/header', $data);
        if (isset($_POST['submitted'])) {
            //                            TODO regle pour le formulaire
            $this->form_validation->set_rules('cand_prenom', 'Pr&eacute;nom', 'required');
            $this->form_validation->set_rules('cand_nom', 'Nom', 'required');
            $this->form_validation->set_rules('cand_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('cand_sexe', 'Sexe', 'required');
            $this->form_validation->set_rules('cand_mdp', 'Mot de passe', 'required|min_length[5]');
            $this->form_validation->set_rules('cand_mdp2', 'Confirmer le mot de passe', 'required|min_length[5]|matches[cand_mdp]');
            //                            TODO Si le formulaire est bon
            if ($this->form_validation->run() == TRUE) {
                $this->form_validation->set_data($_POST);
                $hash = password_hash($this->input->post('cand_mdp'), PASSWORD_DEFAULT);
                $token = $this->generateRandomString(255);
                $this->load->model('Register_model');
                $this->Register_model->insert_entry(
                    $this->input->post('cand_nom'),
                    $this->input->post('cand_prenom'),
                    $this->input->post('cand_email'),
                    $this->input->post('cand_sexe'),
                    $hash, $token);

                $this->session->set_flashdata('success', "Votre compte à bien était crée. Vous pouvez vous connecter");
                redirect("Pages/register", "refresh");
            } //                    TODO Si le formulaire n'est pas bon.
            else {
//                $this->load->view('pages/register', $data);
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
    public function insertcv()
    {
        $this->load->model('Orga_model');
        $this->load->model('Tech_model');
        $this->load->model('Insert_cv_model');
        $data['title'] = 'insert_cv';
        $this->load->view('includes/header_cv', $data);
        if (isset($_POST['submitted'])) {
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
                    'label' => 'Email|valid_email',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'cand_telephone',
                    'label' => 'Tél',
                    'rules' => 'required'
                )
            ,
                array(
                    'field' => 'cand_date_naissance',
                    'label' => 'Date de naissance',
                    'rules' => 'required'
                )
            ,
                array(
                    'field' => 'cand_telephone',
                    'label' => 'Tél',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($regles);
            $candId = ($this->session->userdata("candidat"))['id'];
            if ($this->form_validation->run() == TRUE) {
                $this->form_validation->set_data($_POST);
                     $this->Insert_cv_model->insert_cv_db(
                            $this->input->post('cand_adresse'),
                            $this->input->post('cand_telephone'),
                            $this->input->post('cand_date_naissance'),
                            $this->input->post('cand_code_postal'),
                            $this->input->post('competenceorga'),
                            $this->input->post('competencetech'),
                            $this->input->post('dip_nom'),
                            $this->input->post('dip_ecole'),
                            $this->input->post('dip_date_obtention'),
                            $this->input->post('dip_description'),
                            $this->input->post('exp_nom_travail'),
                            $this->input->post('exp_entreprise'),
                            $this->input->post('exp_duree'),
                            $this->input->post('exp_description'),
                            $this->input->post('cand_loisir_nom'),
                            $candId);
                $this->session->set_flashdata('success', "Votre cv à bien était crée. ");
                $this->sendMail;
            } //                    TODO Si le formulaire n'est pas bon.
            else {
                echo 'echouer';
            }
        }
        $infos = $this->session->userdata("name");
//                        TODO: Boucle Competence Technique db
        $tabTech = $this->Tech_model->getAllTech();
//                      TODO: Boucle Competence Organisationnelle db
        $tabOrg = $this->Orga_model->getAllOrg();

        $this->load->view('pages/insert_cv', array("tech" => $tabTech, "orga" => $tabOrg, "infos" => $infos));
        $this->load->view('includes/footer', $data);
    }

    public function cv_profile()
    {
        $data['title'] = 'Home';
        $this->load->view('includes/header', $data);
        $this->load->model('Candidat_model');
        $this->load->model('Diplome_model');
        $this->load->model('Experience_model');
        $this->load->model('Loisir_model');
        $this->load->model('Orga_model');
        $this->load->model('Tech_model');
        $this->load->view('includes/header', $data);

//                    TODO : information candidat
        $candidat = $this->Candidat_model->getInfo();
                    //TODO : information Diplome candidat
        $formation = $this->Diplome_model->getFormation();
//                  TODO : information Experience candidat
        $experience = $this->Experience_model->getExperience();
        //                  TODO : information Competence organisationnelle candidat
        $comp = $this->Orga_model->getAllCompOrg();
        //                  TODO : information technique candidat
        $tech = $this->Tech_model->getAllCompTech();
        //                  TODO : information Loisir candidat
        $loisir = $this->Loisir_model->getLoisir();

        $this->load->view('pages/cv_profil', array("candidat" => $candidat, "formation" => $formation, "experience" => $experience, "loisir" => $loisir, "comp" => $comp, "tech" => $tech ));
        $this->load->view('includes/footer', $data);
    }

    public function cv_profil() {

        $this->load->model("Candidat_model");
        $this->load->model("Experience_model");
        $this->load->model("Tech_model");
        $this->load->model("Orga_model");
        $this->load->model("Loisir_model");
        $this->load->model("Diplome_model");

        $data = $this->Candidat_model->get();

        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $key =>  $candidat) {
                $result[$key]['candidat'] = $candidat;

                $dataExp = $this->Experience_model->getByCandidatId($candidat['id']);

                $result[$key]['exp'] = $dataExp->result_array();

                $dataTech = $this->Tech_model->getByCandidatId($candidat['id']);

                $result[$key]['tech'] = $dataTech->result_array();

                $dataDiplome = $this->Diplome_model->getByCandidatId($candidat['id']);

                $result[$key]['diplome'] = $dataDiplome->result_array();

                $dataLoisir = $this->Loisir_model->getByCandidatId($candidat['id']);

                $result[$key]['loisir'] = $dataLoisir->result_array();

                $dataOrga = $this->Orga_model->getByCandidatId($candidat['id']);

                $result[$key]['orga'] = $dataOrga->result_array();
            }

        } else {
            header("HTTP/1.0 204 No Content");
            echo json_encode("204: no products in the database");
        }
    }
    
    function sendMail()
{
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'jackiechannfactory@gmail.com', // change it to yours
  'smtp_pass' => 'jacki3chan', // change it to yours
  'mailtype' => 'html',
  'charset' => 'UTF-8',
  'wordwrap' => TRUE
);
        $message = 'Votre CV à bien était enregistré sur CVestiny, votre destin vous remerciera !';
        $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('jackiechannfactory@gmail.com'); // change it to yours
      $this->email->to('jackiechannfactory@gmail.com');// change it to yours
      $this->email->subject('Confirmation de la création de votre CV sur CVestiny');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Confirmation de la création de votre CV sur CVestiny.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }
}

}
