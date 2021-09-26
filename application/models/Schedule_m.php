<?php defined('BASEPATH') or exit('No direct script access allowed');
class Schedule_m extends CI_Model
{

    public function get()
    {
        $this->db->select('a.*,
         b.account_name, 
         c.store_name, 
         c.id as id_store, 
         c.dc, 
         c. store_type, 
         c.store_id, 
         e.id as user_id,
         e.name as user_name, 
         e.area_coverage ,
         d. role, 
         a.date, 
         e.email');
        $this->db->from('t_schedule_visit a');
        $this->db->join('t_account b', 'a.account_id = b.account_id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->join('role_user d ', 'a.role_id = d.role_id');
        $this->db->join('user e ', 'a.user_id = e.id');


        $query = $this->db->get();
        return $query;
    }


    public function getId($id = null)
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



    public function add($post)
    {

        $data =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'store_id' => $post['id'],
            'account_id' => $post['account_id'],
            'role_id' => $post['role_id'],
            'user_id' => $post['id_user'],
            'date' => $post['date'],
            'created_date' => date('d-m-y'),
            'created_by' => $this->session->userdata('email'),
        ];
        $this->db->insert('t_schedule_visit', $params);
    }


    public function edit($post)
    {
        $data = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $params = [
            'store_id' => $post['id'],
            'account_id' => $post['account_id'],
            'role_id' => $post['role_id'],
            'user_id' => $post['id_user'],
            'date' => $post['date'],
            'updated_date' => date('Y-M-D'),
            'updated_by' => $this->session->userdata('email')

        ];
        $this->db->where('schedule_id', $post['schedule_id']);
        $this->db->update('t_schedule_visit', $params);
    }

    public function del($id)
    {
        $this->db->where('schedule_id', $id);
        $this->db->delete('t_schedule_visit');
    }
}
