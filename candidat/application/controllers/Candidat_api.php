<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidat_api extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("Candidat_model");
        $this->load->model("Experience_model");
        $this->load->model("Tech_model");
    }

    public function index()
    {
        $data = $this->Candidat_model->get();

        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $key =>  $candidat) {
                $result[$key]['candidat'] = $candidat;

                $dataExp = $this->Experience_model->getByCandidatId($candidat['id']);
                
                $result[$key]['exp'] = $dataExp->result_array();

                $dataTech = $this->Tech_model->getByCandidatId($candidat['id']);
                
                $result[$key]['tech'] = $dataTech->result_array();
            }
        
            echo json_encode($result);
        } else {
            header("HTTP/1.0 204 No Content");
            echo json_encode("204: no products in the database");
        }
    }

    public function view($id)
    {
        $data = $this->Model_product->get_one($id);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $result[] = array("id" => intval($row->id), "title" => $row->title);
            }
            echo json_encode($result);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode("404 : Product #$id not found");
        }
    }

}