<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Report_api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['jwt', 'authorization']);
    }

    // public function INDEX_POST(){
    //     $data = [
    //         'user_id' => $this->session->userdata('id'),
    //         'role_id' => $this->session->userdata('role_id'),
    //         'store_id' => $this->input->post('id_toko'),
    //         'product_id' => $this->input->post('product_id'),
    //         'category_id' => $this->input->post('category_id'),
    //         'qty' => $this->input->post('qty'),
    //         'facing' => $this->input->post('facing'),
    //         'price_card' => $this->input->post('price_card'),
    //         'fifo_product' => $this->input->post('fifo'),
    //         'normal_price' => $this->input->post('normal_price'),
    //         'promo_price' => $this->input->post('promo_price'),
    //         'created_date' => 'NOW()'
    //     ];
    //     $insertReport = $this->db->insert('t_report', $data);
    //     if($insertReport == true){
    //         $this->response(
    //             [
    //                 'message' => 'Success add report',
    //                 'status' => true,
    //             ]
    //         );
    //     }else {
    //         $this->response(
    //             [
    //                 'message' => ' Add report Fail',
    //                 'status' => true,
    //             ]
    //         );
    //     }


    // }

    public function index_post()
    {


        // $config['upload_path'] = './assets/img/profil';
        // $config['allowed_type'] = 'png|jpg';
        // $config['max_size'] = '204800';
        // $image_documentation = $_FILES['image_documentation']['name'];
        // $path = "./assets/img/documentation";
        // $this->load->library('upload', $config);
        // if (!$this->upload->do_upload('image_documentation')) 
        // {
        //     $this->response([
        //         'message' => 'Gagal',
        //         'status' => false
        //     ]);
        // } else {
        //     $data = array(
        //         'user_id' => $this->post('user_id'),
        //         'store_id' => $this->post('store_id'),
        //         'product_id' => $this->post('product_id'),
        //         'category_id' => $this->post('category_id'),
        //         'qty' => $this->post('qty'),
        //         'facing' => $this->post('facing'),
        //         'price_card' => $this->post('price_card'),
        //         'fifo_product' => $this->post('fifo_product'),
        //         'normal_price' => $this->post('normal_price'),
        //         'promo_price' => $this->post('promo_price'),
        //         'planogram' => $this->post('planogram'),
        //         'promotion' => $this->post('promotion'),
        //         'image_documenatation' => $image_documentation


        //     );
        //     $insert =  $this->db->insert("t_report", $data);
        //     $this->response([
        //         'message' => 'berhasil',
        //         'status' => true,
        //         'data' => $data
        //     ], REST_Controller::HTTP_OK);
        // }

        // $user_id = $this->post('user_id');
        // $store_id = $this->post('store_id');
        // $product_id = $this->post('product_id');
        // $category_id = $this->post('category_id');
        // $qty = $this->post('qty');
        // $facing = $this->post('facing');
        // $price_card = $this->post('price_card');
        // $fifo_product = $this->post('fifo_product');
        // $normal_price = $this->post('normal_price');
        // $promo_price = $this->post('promo_price');
        // $planogram = $this->post('planogram');
        // $promotion = $this->post('promotion');

        // $upload_image = $_FILES['image_documentation']['name'];

        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']     = '2048';
        //     $config['upload_path'] = './assets/img/documentation';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('image')) {

        //         $default_image = ['t_report']['image'];

        //         if ($default_image != 'default.jpg') {

        //             unlink(FCPATH . 'assets/img/documentation/' . $default_image);
        //         }

        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('image', $new_image);
        //     } else {
        //         $this->response([
        //             'messgae' => 'Gagal',
        //             'status' => true
        //         ]);
        //     }

        //     $this->db->set('user_id', $user_id);
        //     $this->db->set('store_id', $store_id);
        //     $this->db->set('product_id', $product_id);
        //     $this->db->set('category_id', $category_id);
        //     $this->db->set('qty', $qty);
        //     $this->db->set('facing', $facing);
        //     $this->db->set('price_card', $price_card);
        //     $this->db->set('fifo_product', $fifo_product);
        //     $this->db->set('normal_price', $normal_price);
        //     $this->db->set('promo_price', $promo_price);
        //     $this->db->set('planogram', $planogram);
        //     $this->db->set('promotion', $promotion);
        //     $this->db->insert('t_report');

        //     $this->response([
        //         'messgae' => 'Berhasil',
        //         'status' => true
        //     ]);
        // }


        $data = array(
            'user_id' => $this->post('user_id'),
            'store_id' => $this->post('store_id'),
            'product_id' => $this->post('product_id'),
            'category_id' => $this->post('category_id'),
            'qty' => $this->post('qty'),
            'facing' => $this->post('facing'),
            'price_card' => $this->post('price_card'),
            'fifo_product' => $this->post('fifo_product'),
            'normal_price' => $this->post('normal_price'),
            'promo_price' => $this->post('promo_price'),
            'planogram' => $this->post('planogram'),
            'promotion' => $this->post('promotion'),
        );
        $insert =  $this->db->insert("t_report", $data);

        if ($insert == true) {
            $this->response([
                'message' => 'Berhasil',
                'status' => true,
                'data' => $data
            ]);
        } else {
            $this->response([
                'message' => 'gagal',
                'status' => false,

            ]);
        }
    }
}
