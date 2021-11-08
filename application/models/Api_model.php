<?php defined('BASEPATH') or exit('No direct script access allowed');
class Api_model extends CI_Model
{

    public function getDataUser()
    {
        $this->db->select('a.name', 'a.id');
        $this->db->from('user a');
        $this->db->join('role_user b', 'a.role_id = b.role_id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getSchedule_T()
    {
        $date = new DateTime("+ 1 day");
        $current_date = $date->format('Y-m-d');
        $email =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->select('a. schedule_id,c.store_id,c.store_name');
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->where('a.date', ($current_date));
        // $this->db->where('b.email', $this->session->userdata('email'));
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function getId_schedule($id = null)
    {
        $this->db->select('a.*, b.account_name, c.store_name, c.id as id_store, c.dc, c. store_type, c.store_id, e.id as user_id, e.name user_name, e.area_coverage ,d. role, a.date, e.email');
        $this->db->from('t_schedule_visit a');
        $this->db->join('t_account b', 'a.account_id = b.account_id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->join('role_user d ', 'a.role_id = d.role_id');
        $this->db->join('user e ', 'a.user_id = e.id');
        // $this->db->from('t_schedule_visit');
        if ($id != null) {
            $this->db->where('schedule_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function getStoreVisit($email)
    {

        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $email =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->db->select('a.schedule_id,c.id as id_toko,c.store_id,c.store_name , b.id, b.email');
        // $this->db->where('b.email', $this->session->userdata('email'));
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->where('a.date', $current_date);
        $this->db->where('b.email', $email);
        $this->db->order_by('store_name', 'ASC');
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function getListProduct()
    {
        $this->db->select('a.product_id, a.product_name, b.category_id,b.category_name');
        $this->db->from('t_produk a');
        $this->db->join('t_category b', 'a.category_id = b.category_id');
        $this->db->order_by("product_name", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function getUser()
    {
        $this->db->select("a.id,a.name, a.area_coverage, a.address, a.city, a.email, b.role");
        $this->db->from('user a');
        $this->db->join('role_user b', 'a.role_id = b.role_id');
        $this->db->where('email', 'azizmajidul@gmail.com');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function getHistory()
    {
        $date = new DateTime("now");
        $current_date = $date->format('Y-m-d');
        $this->db->select("a.created_date, b.store_id, b.store_name, c.product_name, d.email");
        $this->db->from("t_report a");
        $this->db->join("t_store b", "a.store_id = b.id");
        $this->db->join("t_produk c", "a.product_id = c.product_id");
        $this->db->join("user d", " a.user_id = d.id");
        // $this->db->where("a.created_date", $current_date);
        $query =  $this->db->get()->result_array();
        return  $query;
    }
}
