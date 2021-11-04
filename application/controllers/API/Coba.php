<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Coba extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index_post()
    {

        $data = array(
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
        );

        $insert =  $this->db->insert("coba", $data);

        if ($insert == true) {
            $this->response([
                'message' => 'Berhasil',
                'status' => true,
                'data' => $data
            ]);
        } else {
            $this->response([
                'message' => 'Gagal',
                'status' => false,

            ]);
        }
    }
}
