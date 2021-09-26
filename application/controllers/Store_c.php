<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store_c extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('store_m');
        $this->load->model('account_m');

        $data['title'] = "Master Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }


    public function index()
    {
        $data['title'] = "Master Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->store_m->get();
        // $data['row'] = $this->store_m->getCategory();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/store/index', $data);
        $this->load->view('template/footer');
    }


    public function add()
    {

        // $data['category'] = $this->store_m->getCategory;
        $data['title'] = "Master Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        // load category di model category
        $account = $this->account_m->get();

        $store = new stdClass();
        $store->id = null;
        $store->store_id = null;
        $store->store_name = null;
        $store->account_id = null;
        $store->dc = null;
        $store->address = null;
        $store->store_type = null;
        $store->created_by = null;


        $data_ = array(
            'page' => 'add',
            'account' => $account,
            'row' => $store
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/store/store_form', $data_);
        $this->load->view('template/footer');
    }



    public function edit($id)
    {
        $data['title'] = "Master store store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $account = $this->account_m->get();

        $query = $this->store_m->getId($id);
        if ($query->num_rows() > 0) {
            $store = $query->row();
            $data_ = array(
                'page' => 'edit',
                'account' => $account,
                'row' => $store
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/store/store_form', $data_);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            redirect('store_c');
        }
    }





    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->store_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->store_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data Berhasil Disimpan
             </div>');
            redirect('store_c');
        }
    }


    public function del($id)
    {
        $this->store_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete store Success !!!
             </div>');
        }
        echo "<script>window.location='" . site_url('store_c') . "';</script>";
    }
}
