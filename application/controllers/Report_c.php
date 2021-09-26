<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //cek_admin();
        $this->load->model('report_m');
        
        $data['title'] = "Report";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function index()
    {
        $data['title'] = "Report ";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['row'] = $this->report_m->get();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('report/report_data', $data);
        $this->load->view('template/footer');
    }
}