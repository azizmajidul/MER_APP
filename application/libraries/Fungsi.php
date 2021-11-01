<?php


class Fungsi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function count_user()
    {
        $this->ci->load->model('count_m');
        return $this->ci->count_m->getUser->num_rows();
    }
}