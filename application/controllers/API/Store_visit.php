<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use chriskacerguis\RestServer\RestController;
// use Libraries\RestController;

class Store_visit extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);
    }
    public function index_GET()
    {
        $this->load->model('api_model');
        $data = $this->api_model->getStoreVisit();
        // var_dump($data); die;
        if ($data == true) {
            $this->response(
                [
                    'message' => 'Success',
                    'status' => true,
                    'Data' => $data,
                    'totalcount' => count($data)
                ],
                REST_Controller::HTTP_OK

            );
        } else {
            $this->response(
                [
                    'message' => 'gagal',
                    'status' => false,
                    'Data' => $data,
                    
                ],
                REST_Controller::HTTP_OK

            );
        }
    }
}
