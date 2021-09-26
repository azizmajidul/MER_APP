<?php defined('BASEPATH') or exit('No direct script access allowed');
class Store_m extends CI_Model
{

    public function get()
    {
        $this->db->select('a.*, b.account_name');
        $this->db->from('t_store a');
        $this->db->join('t_account b', 'a.account_id = b.account_id');

        $query = $this->db->get();
        return $query;
    }


    public function getId($id = null)
    {
        $this->db->from('t_store');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }



    public function add($post)
    {

        $data =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'store_id' => $post['store_id'],
            'store_name' => $post['store_name'],
            'account_id' => $post['account_id'],
            'dc' => $post['dc'],
            'address' => $post['address'],
            'store_type' => $post['store_type'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_store', $params);
    }


    public function edit($post)
    {
        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'store_id' => $post['store_id'],
            'store_name' => $post['store_name'],
            'account_id' => $post['account_id'],
            'dc' => $post['dc'],
            'address' => $post['address'],
            'store_type' => $post['store_type'],
            'updated_date' => date('Y-M-D'),
            'updated_by' => $this->session->userdata('email')

        ];
        $this->db->where('id', $post['id']);
        $this->db->update('t_store', $params);
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_store');
    }
}
