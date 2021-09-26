<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_c extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('produk_m');
        $this->load->model('category_m');

        $data['title'] = "Master Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }


    public function index()
    {
        $data['title'] = "Master Product";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->produk_m->get();
        // $data['row'] = $this->produk_m->getCategory();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/produk/produk_v', $data);
        $this->load->view('template/footer');
    }


    public function add()
    {

        // $data['category'] = $this->produk_m->getCategory;
        $data['title'] = "Master Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        // load category di model category
        $category = $this->category_m->get();

        $produk = new stdClass();
        $produk->product_id = null;
        $produk->product_name = null;
        $produk->category_id = null;
        $produk->created_date = null;
        $produk->company = null;
        $produk->created_by = null;


        $data_ = array(
            'page' => 'add',
            'category' => $category,
            'row' => $produk
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/produk/produk_form', $data_);
        $this->load->view('template/footer');
    }



    public function edit($id)
    {
        $data['title'] = "Master produk Produk";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $category = $this->category_m->get();

        $query = $this->produk_m->getId($id);
        if ($query->num_rows() > 0) {
            $produk = $query->row();
            $data_ = array(
                'page' => 'edit',
                'category' => $category,
                'row' => $produk
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/produk/produk_form', $data_);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            redirect('produk_c');
        }
    }





    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->produk_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->produk_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data Berhasil Disimpan
             </div>');
            redirect('produk_c');
        }
    }


    public function del($id)
    {
        $this->produk_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete produk Success !!!
             </div>');
        }
        echo "<script>window.location='" . site_url('produk_c') . "';</script>";
    }
}
