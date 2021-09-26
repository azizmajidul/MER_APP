<?php defined('BASEPATH') or exit('No direct script access allowed');
class Role_m extends CI_Model
{
    public function edit_role($id, $role)
    {

        $params =  $this->db->query("UPDATE role_user SET role = '$role' WHERE role_id = $id");
        return $params;
    }

    function delete_role($id)
    {
        // $params=$this->db->query("DELETE FROM user_menu WHERE id = $id");
        // return $params;
        $this->db->where('role_id', $id);
        $this->db->delete('role_user');
    }

    public function get($id = null)
    {
        $this->db->from('role_user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
