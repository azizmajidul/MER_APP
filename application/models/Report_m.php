<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report_m extends CI_Model
{
    public function get()


    {
        $this->db->select(
            'a.*,
         b.id as id_user, b.name as user_name,b.email,b.area_coverage, 
         c.*, 
         d.*, 
         f.*, 
         g.*'
        );
        $this->db->from('t_report a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->join('t_produk d', 'a.product_id = d.product_id');

        $this->db->join('t_category f', 'a.category_id = f.category_id');
        $this->db->join('role_user g', 'a.role_id = g.role_id');

        $query = $this->db->get();
        return $query;
    }
}
