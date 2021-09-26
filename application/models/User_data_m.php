<?php defined('BASEPATH') or exit('No direct script access allowed');
class User_data_m extends CI_Model
{
    public function getRole()
    {

        $query = "SELECT *
        FROM role_user ";


        return $this->db->query($query)->result_array();
    }

    public function get()
    {
        $this->db->select('a.*, b.*');
        $this->db->from('user a');
        $this->db->join('role_user b', 'a.role_id = b.role_id');
        $query = $this->db->get()->result_array();
        return $query;
    }





    public function edit($id, $name, $email, $address, $role_id, $area_coverage, $city)
    {

        $params = $this->db->query(
            "UPDATE user SET 
             id = $id,
             name = '$name',
             email = '$email',
             address = '$address',
             role_id = $role_id,
             area_coverage = '$area_coverage',
             city = '$city'
             WHERE id = $id
             "
        );
        return $params;
    }

    public function activated_user($id)
    {
        $params = $this->db->query(
            "UPDATE user SET is_active = 1 WHERE id = $id"
        );
        return $params;
    }

    public function non_activated_user($id)
    {
        $params = $this->db->query(
            "UPDATE user SET is_active = 0 WHERE id = $id"
        );
        return $params;
    }



    public function getId($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
