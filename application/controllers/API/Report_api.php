<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class GetProductList extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);
    }

    public function INDEX_POST(){
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
        $insertReport = $this->db->insert('t_report', $data);
        if($insertReport == true){
            $this->response(
                [
                    'message' => 'Success add report',
                    'status' => true,
                ]
            );
        }else {
            $this->response(
                [
                    'message' => ' Add report Fail',
                    'status' => true,
                ]
            );
        }


    }
}