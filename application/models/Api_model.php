<?php defined('BASEPATH') or exit('No direct script access allowed');
class Api_model extends CI_Model
{

    public function getDataUser()
    {
        $this->db->select('a.*, b.*');
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
        $this->db->select('a.*, b.*, c.*,c.store_id, c.id as id_toko');
        // $this->db->where('b.email', $this->session->userdata('email'));
        $this->db->where('a.date', ($current_date));
        $this->db->from('t_schedule_visit a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $query = $this->db->get()->result_array();
        return $query;
    }
}