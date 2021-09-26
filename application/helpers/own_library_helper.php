<?php
function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '-' . $m . '-' . $y;
}

function cek_active()
{
    $ci = get_instance();

    $ci->db->where('is_active', 1);
   $result =  $ci->db->get('user');
   if($result->num_rows() > 0){
       return "checked= 'checked'";
   }
}
