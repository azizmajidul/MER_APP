<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Audit_c extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('audit_m');
        $this->load->model('store_m');
        $this->load->model('produk_m');
    }
    public function index()
    {


        $data['title'] = "Audit Store ";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->audit_m->getSchedule();
        // var_dump($data['row']);
        // die;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('audit_store/audit_store_data', $data);
        $this->load->view('template/footer');
    }

    public function audit_store($id)
    {
        $data['title'] = "Audit Store ";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['store'] = $this->audit_m->get_data($id)->row_array();
        $data['row'] = $this->produk_m->get();
        $data['schedule'] = $this->audit_m->getSchedule($id)->row_array();
        // var_dump($data['store']);
        // die;
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('audit_store/list_produk', $data);
        $this->load->view('template/footer');
    }




    public function audit($id, $id_produk)
    {
        $data['title'] = "Audit Store ";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['store'] = $this->audit_m->get_data($id)->row_array();
        // var_dump($data['store']);
        // die;
        $data['product'] = $this->audit_m->get_produk($id_produk)->row_array();


        // $models = array(
        //     'store' => $data['store'],
        //     'product' => $data['product']
        // );

        // return json_encode($models);


        // var_dump(json_encode($models));
        // die;


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('audit_store/audit_store_form', $data);
        $this->load->view('template/footer');
    }

    public function add_report()
    {

        $data['title'] = "Audit Store ";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['coba'] = $this->db->get_where('user', ['id' =>
        // $this->session->userdata('id')])->row_array();
        $data['coba'] = $this->session->userdata('id');

        // var_dump($data['coba']);
        // die;
        $data = [
            'user_id' => $this->session->userdata('id'),
            'role_id' => $this->session->userdata('role_id'),
            'store_id' => $this->input->post('id_toko'),
            'product_id' => $this->input->post('product_id'),
            'category_id' => $this->input->post('category_id'),
            'qty' => $this->input->post('qty'),
            'facing' => $this->input->post('facing'),
            'price_card' => $this->input->post('price_card'),
            'fifo_product' => $this->input->post('fifo'),
            'normal_price' => $this->input->post('normal_price'),
            'promo_price' => $this->input->post('promo_price'),
            'created_date' => 'NOW()'
        ];

        $this->db->insert('t_report', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Add SubMenu succes!!!
            </div>');
        redirect('audit_c');
    }
}
