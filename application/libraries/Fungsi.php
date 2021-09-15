<?php

Class fungsi{
    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('m_user');
        $userid = $this->ci->session->userdata('userid');
        $user_data = $this->ci->m_user->get($userid)->row();
        return $user_data;
    }
}