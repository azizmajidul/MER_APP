<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_data_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();


        $this->load->model('user_data_m');
        $this->load->model('role_m');
    }

    public function index()
    {
        $data['title'] = "User Data";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['data_user'] = $this->db->get('user')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user_data/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {

        $data['title'] = "New User";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['role'] = $this->role_m->get();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has registered'
        ]);
        $this->form_validation->set_rules('password_1', 'Password', 'required|trim|min_length[3]|matches[password_2]', [
            'matches' => 'Passworrd dont match !!!', 'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|trim|matches[password_1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user_data/user_form_add', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => $this->input->post('role'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT),
                'address' => $this->input->post('address'),
                'area_coverage' => $this->input->post('area_coverage'),
                'city' => $this->input->post('city'),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()

            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Add new uer success !!!
             </div>');
            redirect('user_data_c');
        }
    }

    public function edit($id = null)
    {

        $data['title'] = "Edit";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['role'] = $this->user_data_m->getRole();
        //  $data['user'] = $this->userdata->getUser();
        $data['users'] = $this->db->get_where('user', ['id' => $id])->row_array();
        // var_dump($user['users']);
        // die;


        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            // $query = $this->user_data_m->getUser($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user_data/user_form_edit', $data);
            $this->load->view('template/footer');
        } else {

            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $role_id = $this->input->post('role_id');
            $area_coverage = $this->input->post('area_coverage');
            $city = $this->input->post('city');

            $this->user_data_m->edit($id, $name, $email, $address, $role_id, $area_coverage, $city);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Edit data user succes!!!
            </div>');
            redirect('user_data_c');
        }
    }


    public function activated_user($id)
    {
        //     $is_active = $this->input->post('is_active');


        //     $data = [
        //         'is_active' => $is_active
        //     ];

        //     $this->db->select('is_active');
        //     $this->db->from('user');
        //     $query = $this->db->get();
        //     $result = $query;

        //     if ($result == 1) {
        //         $this->db->update('user', 0);
        //     }
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     succes!!!
        //    </div>');

        $user = $this->db->get_where('user', $id)->row_array();
        if ($user['is_active'] == 0) {
            $this->user_data_m->activated_user();
        } else {
            $this->user_data_m->non_activated_user();
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         succes!!!
       </div>');
    }
}
