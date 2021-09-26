<?php defined('BASEPATH') or exit('No direct script access allowed');
class Category_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('t_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {

        $data =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'category_name' => $post['category_name'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_category', $params);
    }


    public function edit($post)
    {
        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'category_name' => $post['category_name'],
            'updated_date' => date('Y-M-D'),
            'updated_by' => $this->session->userdata('email')

        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('t_category', $params);
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('t_category');
    }
}
