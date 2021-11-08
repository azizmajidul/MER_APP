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

    
    function index_get()
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $id = $this->get('email');
        if ($id == '') {
            $this->db->select('a.schedule_id,c.id as id_toko,c.store_id,c.store_name , b.id, b.email');
            $this->db->from('t_schedule_visit a');
            $this->db->join('user b', 'a.user_id = b.id');
            $this->db->join('t_store c', 'a.store_id = c.id');
            $this->db->where('a.date', $current_date);
            $this->db->order_by('store_name', 'ASC');
            $query = $this->db->get()->result_array();
            $this->response([
                'message' => 'success',
                'status' => true,
                'Data' => $query

            ]);
        } else {
            $this->db->select('a.schedule_id,c.id as id_toko,c.store_id,c.store_name , b.id, b.email');
            $this->db->from('t_schedule_visit a');
            $this->db->join('user b', 'a.user_id = b.id');
            $this->db->join('t_store c', 'a.store_id = c.id');
            $this->db->where('a.date', $current_date);
            $this->db->order_by('store_name', 'ASC');
            $this->db->where('b.email', $id);
            $query = $this->db->get()->result_array();
        }
        $this->response([
            'message' => 'success',
            'status' => true,
            'Data' => $query

        ]);
    }
}
