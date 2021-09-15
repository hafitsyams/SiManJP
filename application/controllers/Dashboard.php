<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_dashboard');
    }

	public function index()
	{
		check_not_login();
		$data['totalpengajar'] = $this->m_dashboard->jumlahpengajar();
		$data['totalsekolah'] = $this->m_dashboard->jumlahsekolah();
		$data['totalmapel'] = $this->m_dashboard->jumlahmapel();
		$data['totaljadwal'] = $this->m_dashboard->jumlahjadwal();
		$data['totalpertemuan'] = $this->m_dashboard->jumlahpertemuan();
		$this->template->load('template','dashboard',$data);
	}
}