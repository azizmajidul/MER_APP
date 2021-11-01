<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Role_m', 'role_model', 'count_m');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        

$this->load->model('count_m');
        $data['user_count'] = $this->count_m->getUser()->num_rows();
        $data['user_count2'] = $this->count_m->getUser2()->num_rows();
        $data['store_count'] = $this->count_m->getStore()->num_rows();
        $data['product_count'] = $this->count_m->getProduct()->num_rows();
        

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
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


    public function add_role()
    {
        $this->db->insert('role_user', ['role' => $this->input->post('role')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Add Role succes!!!
            </div>');
        redirect('admin/role');
    }

    public function edit_role($post)
    {


        $id = $this->input->post('role_id');
        $role = $this->input->post('role');
        $this->role_model->edit_role($id, $role);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             edit role succes!!!
            </div>');
        redirect('admin/role');
    }

    function delete_role($id)
    {
        // $id = $this->input->post('id');

        $this->role_model->delete_role($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Delete Role succes!!!
            </div>');

        redirect('admin/role');
    }

    public function role_access($role_id)
    {
        $data['title'] = "Role Acces Page";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['role'] = $this->db->get_where('role_user', ['role_id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role_access', $data);
        $this->load->view('template/footer');
    }


    public function change_Access()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];


        $result = $this->db->get_where('user_acces_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access has been change!!!
      </div>');
    }
}
