<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = "User";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }


    public function edit_profil()
    {
        $data['title'] = "Edit Profil";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit_profil', $data);
            $this->load->view('template/footer');
        } else {
            $name = $this->input->post('name');
            $area_coverage = $this->input->post('area_coverage');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            $email = $this->input->post('email');

            // cek jika pake gambar
            $upload_image = $_FILES['image']['name'];


            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profil';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $default_image = $data['user']['image'];

                    if ($default_image != 'default.jpg') {

                        unlink(FCPATH . 'assets/img/profil/' . $default_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->set('area_coverage', $area_coverage);
            $this->db->set('address', $address);
            $this->db->set('city', $city);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                 Edit Profil Succes!!!
                </div>');
            redirect('user');
        }
    }

    public function change_password()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password_1', 'New Password', 'required|trim|min_length[3]|matches[new_password_2]');
        $this->form_validation->set_rules('new_password_2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password_1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/change_password_v', $data);
            $this->load->view('template/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password_1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Current password is wrong!!!
                </div>');
                redirect('user/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                New password cant be same as current password !!!
                </div>');
                    redirect('user/change_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Change password success!!!
                    </div>');
                    redirect('user/change_password');
                }
            }
        }
    }
}
