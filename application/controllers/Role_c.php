<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_c extends CI_Controller
{

    public function role()
    {
        $data['title'] = "Role Acces Page";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['role'] = $this->db->get('role_user')->result_array();
        

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
}
