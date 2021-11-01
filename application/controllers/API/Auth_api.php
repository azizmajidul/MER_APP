<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use chriskacerguis\RestServer\RestController;
// use Libraries\RestController;

class Auth_api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);
    }

    public function index_POST()
    {

        $this->_login();
    }
    private function _login()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
// var_dump($user); die;
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {

                //cek password
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'id' => $user['id'],
                        'name' =>$user['name'],
                        'password' => $user['password'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $token = AUTHORIZATION::generateToken($data);
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == true) {
                        $this->response([
                            'message' => 'berhasil',
                            'status' => true,
                            'Token' => $token,
                            'data' => $data
                        ], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(
                            [
                                'message' => 'gagal',
                                'status' => false,
                            ],
                            REST_Controller::HTTP_OK
                        );
                    }
                } else {

                    $this->response(
                        [
                            'message' => 'Password is wrong',
                            'status' => false,
                        ],
                        REST_Controller::HTTP_OK
                    );
                }
            } else {

                $this->response(
                    [
                        'message' => 'User Is Not Activated ',
                        'status' => false,
                    ],
                    REST_Controller::HTTP_OK
                );
            }
        } else {
            $this->response(
                [
                    'message' => 'Email is not registered',
                    'status' => false,
                ],
                REST_Controller::HTTP_OK
            );
        }
    }
}
