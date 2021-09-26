<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Menu_m', 'menu');
    }

    public function index()
    {
        $data['title'] = "Menu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Add Menu succes!!!
            </div>');
            redirect('menu');
        }
    }

    public function edit_menu($post)
    {


        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
        $this->menu->edit_menu($id, $menu);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             edit Menu succes!!!
            </div>');
        redirect('menu');
    }

    function delete_menu($id)
    {
        // $id = $this->input->post('id');

        $this->menu->delete_menu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Delete SubMenu succes!!!
            </div>');

        redirect('menu');
    }

    public function submenu()
    {


        $data['title'] = "Submenu Management";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_m', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');



        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Add SubMenu succes!!!
            </div>');
            redirect('menu/submenu');
        }
    }

    public function EditSubMenu()
    {

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $menu_id = $this->input->post('menu_id');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');

        $this->menu->editSubMenu($id, $menu_id, $title, $url, $icon, $is_active);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Edit SubMenu succes!!!
            </div>');
        redirect('menu/submenu');
    }

    function delete_SubMenu($id)
    {
        // $id = $this->input->post('id');

        $this->menu->delete_SubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Delete SubMenu succes!!!
            </div>');

        redirect('menu/submenu');
    }
}
