<?php

function cek_login()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth_login');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $query_Menu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $query_Menu['id'];

        $userAcces = $ci->db->get_where('user_acces_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAcces->num_rows() < 1) {
            redirect('auth_login/blocked');
        }
    }
}


function cek_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_acces_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
