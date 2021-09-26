<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_c extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('account_m');
    }


    public function index()
    {
        $data['title'] = "Master Account Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['row'] = $this->account_m->get();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/account/account_v', $data);
        $this->load->view('template/footer');
    }


    public function add_action($post)
    {

        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $params = [
            'account_name' => $post['account_name'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_account', $params);
    }


    public function add()
    {

        $data['title'] = "Master Account Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // var_dump($data);
        // die;

        $account = new stdClass();
        $account->account_id = null;
        $account->account_name = null;
        $account->created_date = null;
        $account->created_by = null;


        $data_ = array(
            'page' => 'add',
            'row' => $account
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/account/account_form', $data_);
        $this->load->view('template/footer');
    }



    public function edit($id)
    {
        $data['title'] = "Master Account Store";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $query = $this->account_m->get($id);
        if ($query->num_rows() > 0) {
            $account = $query->row();
            $data_ = array(
                'page' => 'edit',
                'row' => $account
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/account/account_form', $data_);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            redirect('account_c');
        }
    }

    public function coba()
    {
        // $data =  $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // // echo $data;

        $data = $this->account_m->coba();
        var_dump($data);
        die;
    }



    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->add_action($post);
        } else if (isset($_POST['edit'])) {
            $this->account_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success!!!
             </div>');
            redirect('account_c');
        }
    }


    public function del($id)
    {
        $this->account_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete Account Success !!!
             </div>');
        }
        echo "<script>window.location='" . site_url('account_c') . "';</script>";
    }
}
