<?php defined('BASEPATH') or exit('No direct script access allowed');
class Produk_m extends CI_Model
{

    public function get()
    {
        $this->db->select('a.*, b.category_name');
        $this->db->from('t_produk a');
        $this->db->join('t_category b', 'a.category_id = b.category_id');



        $query = $this->db->get();
        return $query;
    }

    public function getId($id = null)
    {
        $this->db->from('t_produk');
        if ($id != null) {
            $this->db->where('product_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }




    public function add($post)
    {

        $data =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'product_name' => $post['product_name'],
            'category_id' => $post['category_id'],
            'company' => $post['company'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_produk', $params);
    }


    public function edit($post)
    {
        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'product_name' => $post['product_name'],
            'category_id' => $post['category_id'],
            'company' => $post['company'],
            'updated_date' => date('Y-M-D'),
            'updated_by' => $this->session->userdata('email')

        ];
        $this->db->where('product_id', $post['product_id']);
        $this->db->update('t_produk', $params);
    }

    public function del($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('t_produk');
    }
}
