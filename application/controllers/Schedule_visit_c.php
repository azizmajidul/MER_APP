<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule_visit_c extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('schedule_m');
        $this->load->model('account_m');
        $this->load->model('store_m');
        $this->load->model('role_m');
        $this->load->model('user_data_m');


        $data['title'] = "Schedule Visit";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }


    public function index()
    {
        $data['title'] = "Schedule Visit";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->schedule_m->get();
        // $data['user'] = $this->user_data_m->get();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('visit/schedule/schedule_data', $data);
        $this->load->view('template/footer');
    }


    public function add()
    {

        // $data['category'] = $this->store_m->getCategory;
        $data['title'] = "Schedule Visit";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


       
        $account = $this->account_m->get();
        $store = $this->store_m->get();
        // $role = $this->role_m->get();
        $user_data = $this->user_data_m->get();
        


        $schedule = new stdClass();
        $schedule->schedule_id = null;
        $schedule->store_id = null;
        $schedule->account_id = null;
        $schedule->role_id = null;
        $schedule->user_id = null;
        $schedule->store_name = null;
        $schedule->id_store = null;

        $schedule->store_type = null;
        $schedule->dc = null;
        $schedule->user_name = null;
        $schedule->area_coverage = null;
        $schedule->role = null;
        $schedule->date = null;


        $data_ = array(
            'page' => 'add',
            'account' => $account,
            'store' => $store,
            'user_data' => $user_data,
            'row' => $schedule
        );

        $data__['row'] = $this->store_m->get();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('visit/schedule/schedule_form', $data_);
        $this->load->view('template/footer');
    }



    public function edit($id)
    {
        $data['title'] = "Schedule Visit";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $schedule = $this->schedule_m->get();
        $account = $this->account_m->get();
        $store = $this->store_m->get();
        // $role = $this->role_m->get();
        $user_data = $this->user_data_m->get();

        $query = $this->schedule_m->getId($id);
        if ($query->num_rows() > 0) {
            $schedule = $query->row();
          

            $data_ = array(
                'page' => 'edit',
                'account' => $account,
                'store' => $store,
                'user_data' => $user_data,
                'row' => $schedule
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('visit/schedule/schedule_form', $data_);
            $this->load->view('template/footer');
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            redirect('schedule_visit_c');
        }
    }

    public function test()
    {
        // $data = $this->role_m->get()->result_array;
        // var_dump($data);
        // die;


        // This is a simple array
        $var1 = array(
            'key_name1' => 'value_name1',
            'key_name2' => 'value_name2'
        );

        //We are converting array in encode $var1 array to json using json encode
        $encode_data = json_encode($var1);
        echo $encode_data;
    }





    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->schedule_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->schedule_m->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Data Berhasil Disimpan
             </div>');
            redirect('schedule_visit_c');
        }
    }


    public function del($id)
    {
        $this->schedule_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Delete store Success !!!
             </div>');
        }
        echo "<script>window.location='" . site_url('schedule_visit_c') . "';</script>";
    }
}
