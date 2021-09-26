<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_c extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('category_m');

        $data['title'] = "Master Category Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }


    public function index()
    {
        $data['title'] = "Master Category Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->category_m->get();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/category/category_v', $data);
        $this->load->view('template/footer');
    }


    public function add_action($post)
    {

        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $params = [
            'category_name' => $post['category_name'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_category', $params);
    }


    public function add()
    {

        $data['title'] = "Master Category Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $category = new stdClass();
        $category->category_id = null;
        $category->category_name = null;
        $category->created_date = null;
        $category->created_by = null;


        $data_ = array(
            'page' => 'add',
            'row' => $category
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/category/category_form', $data_);
        $this->load->view('template/footer');
    }



    public function edit($id)
    {
        $data['title'] = "Master Category Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data_ = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/category/category_form', $data_);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            redirect('category_c');
        }
    }





    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Add Category Success !!!
             </div>');
            redirect('category_c');
        }
    }


    public function del($id)
    {
        $this->category_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete category Success !!!
             </div>');
        }
        echo "<script>window.location='" . site_url('category_c') . "';</script>";
    }
}
