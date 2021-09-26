<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Email', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'MIS | User Login ';
            $this->load->view('auth/header_auth', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer_auth');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {

                //cek password
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {

                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password is wrong!!!
          </div>');
                    redirect('auth_login');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account is not active! Please activated your account!!!
          </div>');
                redirect('auth_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not register! Please cek your email address!!!
          </div>');
            redirect('auth_login');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has registered'
        ]);
        $this->form_validation->set_rules('password_1', 'Password', 'required|trim|min_length[3]|matches[password_2]', [
            'matches' => 'Passworrd dont match !!!', 'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|trim|matches[password_1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'MIS | User Registration ';
            $this->load->view('auth/header_auth', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer_auth');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),

                'role_id' => 2,
                'is_active' => 1,

                'date_created' => time()

            ];
            $this->db->insert('user', $data);

            // $this->_sendEmail();



            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been registered.Welcome to Login
          </div>');
            redirect('auth_login');
        }
    }

    // private function _sendEmail()
    // {

    //     $config = [
    //         'protokol'  => "smtp",
    //         'smtp_host' => "ssl://smtp.googlemail.com",
    //         'smtp_user' => "azizmajidul11@gmail.com",
    //         'smtp_pass' => "yuize411",
    //         'smtp_port' => 465,
    //         'mailtype'  => "html",
    //         'charset '  => "utf-8",
    //         'newline'   => "\r\n"

    //     ];

    //     // $this->load->library('email', $config);
    //     $this->email->initialize($config);

    //     $this->email->from('azizmajidul11@gmail.com', 'SMART MERCHANDISER');
    //     $this->email->to('majidulaziz11@gmail.com');
    //     $this->email->subject('Testing');
    //     $this->email->message('hello test');

    //     if ($this->email->send()) {
    //         return true;
    //     } else {
    //         echo $this->email->print_debugger();
    //         die;
    //     }
    // }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Log out succes!!!
      </div>');
        redirect('auth_login');
    }

    public function user()
    {
        $this->load->view('user/index');
    }


    public function blocked()

    {
        $data['title'] = "Acces Blocked";
        $this->load->view('auth/blocked', $data);
    }
}
