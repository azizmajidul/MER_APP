<?php defined('BASEPATH') or exit('No direct script access allowed');
class Report_m extends CI_Model
{
    public function get()


    {
        $this->db->select(
            'a.qty, a.facing, a.price_card, a.fifo_product, a.normal_price, a.promo_price, a.created_date tanggal,
         b.id as id_user, b.name as user_name,b.email,b.area_coverage, 
         c.*, 
         d.*, 
         f.* '
        );
        $this->db->from('t_report a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->join('t_produk d', 'a.product_id = d.product_id');
        $this->db->join('t_category f', 'a.category_id = f.category_id');
       

        $query = $this->db->get();
        return $query;
    }

    // public function tanggal($start_date, $end_date)
    // {
    //     $data = [];

    //     if (isset($start_date) &&  isset($end_date)) {
    //         $query = "SELECT a.*,a.created_date , b.*, c.*, d.*, f.*,g.* FROM t_report a
    //         JOIN user b ON a.user_id = b.id
    //         JOIN t_store c ON a.store_id = c.id
    //         JOIN t_produk d ON a.product_id = d.product_id
    //         JOIN t_category f ON a.category_id = f.category_id
    //         JOIN role_user g ON a.role_id = g.role_id
    //         WHERE a.created_date >= '$start_date' AND a.created_date <= '$end_date'";

    //         if ($sql = $this->db->query($query)) {
    //             while ($data = $sql->result_array()) {
    //                 $data[] = $data;
    //             }
    //         }
    //     }
    //     return $data;
    // }

    public function coba($start_date, $end_date)
    {
        $this->db->select(
            'a.qty, a.facing, a.price_card, a.fifo_product, a.normal_price, a.promo_price, a.created_date tanggal,
         b.id as id_user, b.name as user_name,b.email,b.area_coverage, 
         c.*, 
         d.*, 
         f.*'
        );
        $this->db->from('t_report a');
        $this->db->join('user b', 'a.user_id = b.id');
        $this->db->join('t_store c', 'a.store_id = c.id');
        $this->db->join('t_produk d', 'a.product_id = d.product_id');

        $this->db->join('t_category f', 'a.category_id = f.category_id');
        $this->db->where('a.created_date >=', $start_date);
        $this->db->where('a.created_date <=', $end_date);
        return $this->db->get()->result_array();
    }
}
