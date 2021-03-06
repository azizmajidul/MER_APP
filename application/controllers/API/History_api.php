<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use chriskacerguis\RestServer\RestController;
// use Libraries\RestController;

class History_api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);

        // // mengambil semua header
        $header = $this->input->request_headers();

        // // mengecek ada header atau tidak
        if (isset($header['Authorization'])) {
            // mengambil token dari header
            $token = $header['Authorization'];
            // jwt liblary throw an exception jika token tidak valid
            try {
                // validasi token
                // validasi yang sukses akan mengembalikan data yang sudah di decode jika tidak akan mengembalikan false
                $data = AUTHORIZATION::validateToken($token);
                if ($data === false) {
                    $response = [
                        "status" => false,
                        "message" => "Unauthorized Token!"
                    ];
                    $this->response($response, parent::HTTP_OK);
                    exit();
                } else {
                    $this->data = $data;
                }
            } catch (Exception $e) {
                // token invalid, mengirim unauthorized message
                $response = [
                    "status" => false,
                    "message" => "Unauthorized Access!"
                ];
                $this->response($response, parent::HTTP_OK);
            }
        } else {
            $response = [
                "status" => false,
                "message" => "authorized tidak ada"
            ];
            $this->response($response, parent::HTTP_OK);
        }
    }
    // public function index_GET()
    // {
    //     // $this->load->model('user_data_m');
    //     // $data = $this->user_data_m->get();

    //     $this->load->model('api_model');
    //     $data = $this->api_model->getHistory();
    //     // var_dump($data); die;
    //     if ($data == true) {
    //         $this->response(
    //             [
    //                 'message' => 'Success',
    //                 'status' => true,
    //                 'Data' => $data
    //             ],
    //             REST_Controller::HTTP_OK

    //         );
    //     } else {
    //         $this->response(
    //             [
    //                 'message' => 'gagal',
    //                 'status' => false,
    //                 'Data' => $data
    //             ],
    //             REST_Controller::HTTP_OK

    //         );
    //     }
    // }



    function index_get()
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $id = $this->get('email');
        if ($id == '') {
            $this->db->select("a.created_date, b.store_id, b.store_name, c.product_name, d.email");
            $this->db->from("t_report a");
            $this->db->join("t_store b", "a.store_id = b.id");
            $this->db->join("t_produk c", "a.product_id = c.product_id");
            $this->db->join("user d", " a.user_id = d.id");
            $this->db->where("a.created_date", $current_date);
            $query =  $this->db->get()->result_array();
            $this->response([
                'message' => 'success',
                'status' => true,
                'Data' => $query

            ]);
        } else {
            $this->db->select("a.created_date, b.store_id, b.store_name, c.product_name, d.email");
            $this->db->from("t_report a");
            $this->db->join("t_store b", "a.store_id = b.id");
            $this->db->join("t_produk c", "a.product_id = c.product_id");
            $this->db->join("user d", " a.user_id = d.id");
            $this->db->where("a.created_date", $current_date);
            $this->db->where('d.email', $id);
            $query =  $this->db->get()->result_array();
        }
        $this->response([
            'message' => 'success',
            'status' => true,
            'Data' => $query

        ]);
    }
}
