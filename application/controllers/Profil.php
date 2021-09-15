<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_user');
        $this->load->library('form_validation');
    }

	public function q($id){
        $profil = $this->m_user->profil($id);
        $data = array(
            'row'=>$profil,
        );
		$this->template->load('template','profil/data_profil',$data);
    }
}