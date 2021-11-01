<?php defined('BASEPATH') or exit('No direct script access allowed');
class Count_m extends CI_Model
{
    public function getUser()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('user a');
        $this->db->join('role_user b', 'a.role_id = b.role_id');
        $this->db->where('a.role_id', 1);
        $query = $this->db->get();
        return $query;
    }
    public function getUser2()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('user a');
        $this->db->join('role_user b', 'a.role_id = b.role_id');
        $this->db->where('a.role_id', 2);
        $query = $this->db->get();
        return $query;
    }
    public function getStore()
    {
        $this->db->select('a.*, b.account_name');
        $this->db->from('t_store a');
        $this->db->join('t_account b', 'a.account_id = b.account_id');

        $query = $this->db->get();
        return $query;
    }
    public function getProduct()
    {
        $this->db->select('a.*, b.category_name');
        $this->db->from('t_produk a');
        $this->db->join('t_category b', 'a.category_id = b.category_id');



        $query = $this->db->get();
        return $query;
    }
}