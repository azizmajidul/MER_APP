<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use chriskacerguis\RestServer\RestController;
// use Libraries\RestController;

class Data_user_api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);

        // // mengambil semua header
        // $header = $this->input->request_headers();

        // // mengecek ada header atau tidak
        // if (isset($header['Authorization'])) {
        //     // mengambil token dari header
        //     $token = $header['Authorization'];
        //     // jwt liblary throw an exception jika token tidak valid
        //     try {
        //         // validasi token
        //         // validasi yang sukses akan mengembalikan data yang sudah di decode jika tidak akan mengembalikan false
        //         $data = AUTHORIZATION::validateToken($token);
        //         if ($data === false) {
        //             $response = [
        //                 "status" => false,
        //                 "message" => "Unauthorized Access!"
        //             ];
        //             $this->response($response, parent::HTTP_OK);
        //             exit();
        //         } else {
        //             $this->data = $data;
        //         }
        //     } catch (Exception $e) {
        //         // token invalid, mengirim unauthorized message
        //         $response = [
        //             "status" => false,
        //             "message" => "Unauthorized Access!"
        //         ];
        //         $this->response($response, parent::HTTP_OK);
        //     }
        // } else {
        //     $response = [
        //         "status" => false,
        //         "message" => "authorized tidak ada"
        //     ];
        //     $this->response($response, parent::HTTP_OK);
        // }
    }
    public function index_GET()
    {
        $email = $this->get('email');
        if ($email == '') {
            $this->db->select("a.id,a.name, a.area_coverage, a.address, a.city, a.email, b.role");
            $this->db->from('user a');
            $this->db->join('role_user b', 'a.role_id = b.role_id');

            $query =  $this->db->get()->result_array();
            $this->response([
                'message' => 'success',
                'status' => true,
                'Data' => $query

            ]);
        } else {
            $this->db->select("a.id,a.name, a.area_coverage, a.address, a.city, a.email, b.role");
            $this->db->from('user a');
            $this->db->join('role_user b', 'a.role_id = b.role_id');
            $this->db->where('a.email', $email);

            $query =  $this->db->get()->result_array();
        }
        // var_dump($data); die;
        if ($query == true) {
            $this->response(
                [
                    'message' => 'Success',
                    'status' => true,
                    'Data' => $query
                ],
                REST_Controller::HTTP_OK

            );
        } else {
            $this->response(
                [
                    'message' => 'gagal',
                    'status' => false,
                    'Data' => $query
                ],
                REST_Controller::HTTP_OK

            );
        }
    }


    // public function index_post(){

    //     $data = [
    //         'name' => $this->post('name'),
    //         'email' => $this->post('email')
    //     ];
    //     // var_dump($data);


    //         $insert = $this->db->insert('user', $data);

    //         if($insert){
    //         $this->response(
    //             [
    //                 'message' => 'Berhasil Input',
    //                 'status' => true,
    //                 'Data' => $data

    //             ], REST_Controller::HTTP_OK
    //         );
    //         }else {
    //             $this->response(
    //                 [
    //                     'message' => 'Gagal Input',
    //                     'status' => false,

    //                 ], REST_Controller::HTTP_OK
    //                 );
    //         }

    // }




}
