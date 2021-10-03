<?php defined('BASEPATH') or exit('No direct script access allowed');
class Audit_m extends CI_Model
{
    public function getSchedule()
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $email =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->select('a.*, b.*, c.*,c.store_id, c.id as id_toko');
        $this->db->where('b.email', $this->session->userdata('email'));
        $this->db->where('a.date', $current_date);
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $query = $this->db->get();
        return $query;
    }

    public function getId($id = null)
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');


        $this->db->select('a.*, b.*, c.*,c.store_id,c.store_name, c.id as id_toko');
        $this->db->where('b.email', $this->session->userdata('email'));
        $this->db->where('a.date', $current_date);
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $query = $this->db->get();
        return $query;

        if ($id != null) {
            $this->db->where('schedule_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function get_data($id)
    {
        $this->db->select('a.*,b.id as id_toko, b.store_name, b.store_id');
        $this->db->from('t_schedule_visit a');
        $this->db->join('t_store b', 'a.store_id = b.id');
        $this->db->where('schedule_id', $id);
        $query = $this->db->get();
        return $query;
    }

    public function get_produk($id_produk)
    {
        $this->db->select('a.*, b.category_id, b.category_name');
        $this->db->from('t_produk a');
        $this->db->join('t_category b', 'a.category_id = b.category_id');
        $this->db->where('product_id', $id_produk);
        $query = $this->db->get();
        return $query;
    }



    public function getSchedule_T()
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $email =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->select('a.*, b.*, c.*,c.store_id, c.id as id_toko');
        // $this->db->where('b.email', $this->session->userdata('email'));
        $this->db->where('a.date', $current_date);
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $query = $this->db->get()->result_array();
        return $query;
    }
}
