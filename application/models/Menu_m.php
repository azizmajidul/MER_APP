<?php defined('BASEPATH') or exit('No direct script access allowed');
class Menu_m extends CI_Model
{

    public function getSubMenu()
    {


        $query = "SELECT a.*, b.menu
                  FROM user_sub_menu a 
                  JOIN user_menu b
                  ON a.menu_id = b.id ";

        return $this->db->query($query)->result_array();
        // $this->db->from('user_menu');
        // if ($id != null) {
        //     $this->db->where('id', $id);
        // }
        // $query = $this->db->get();
        // return $query;
    }

    public function edit_menu($id, $menu)
    {

        $params =  $this->db->query("UPDATE user_menu SET menu = '$menu' WHERE id = $id");
        return $params;
    }

    function delete_menu($id)
    {
        // $params=$this->db->query("DELETE FROM user_menu WHERE id = $id");
        // return $params;
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function editSubMenu(
        $id,
        $menu_id,
        $title,
        $url,
        $icon,
        $is_active
    ) {

        // UPDATE user_sub_menu SET menu_id = 1 ,title = "ADMIN", url = "coba/lagi", icon = "fa fa-user", is_active = 1 WHERE id= 13;
        $params =  $this->db->query("UPDATE user_sub_menu 
                                    SET 
                                    menu_id = $menu_id ,
                                    title = '$title' ,
                                    url = '$url' ,
                                    icon = '$icon',
                                    is_active = $is_active
                                    WHERE id = $id");
        return $params;
    }

    function delete_SubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
