<?php defined('BASEPATH') or exit('No direct script access allowed');
class Account_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('t_account');
        if ($id != null) {
            $this->db->where('account_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {

        $data =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'account_name' => $post['account_name'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('name'),
        ];
        $this->db->insert('t_account', $params);
    }


    public function edit($post)
    {
        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'account_name' => $post['account_name'],
            'updated_date' => date('Y-M-D'),
            'updated_by' => $this->session->userdata('email')

        ];
        $this->db->where('account_id', $post['account_id']);
        $this->db->update('t_account', $params);
    }


    public function coba()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }


    public function del($id)
    {
        $this->db->where('account_id', $id);
        $this->db->delete('t_account');
    }
}
