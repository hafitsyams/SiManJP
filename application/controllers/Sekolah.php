<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_sekolah');
        $this->load->library('form_validation');
    }

	public function index(){
        $this->load->model('m_sekolah');
        $data['row'] = $this->m_sekolah->get2();
		$this->template->load('template','sekolah/data_sekolah',$data);
    }
    
    public function tambah(){
        $sekolah = new stdClass();
        $sekolah->idsekolah=null;
        $sekolah->namasekolah=null;
        $sekolah->alamatsekolah=null;
        $sekolah->notelsekolah=null;
        $sekolah->penanggungjawab=null;
        $sekolah->notelpngjwb=null;
        $data = array(
            'page' => 'tambah',
            'row' => $sekolah
        );
        $this->template->load('template','sekolah/form_sekolah',$data);
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->m_sekolah->tambah($post);
        }else if(isset($_POST['ubah'])){
            $this->m_sekolah->ubah($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('sekolah')."';</script>";
    }

    public function ubah($id){
        $query = $this->m_sekolah->get($id);
        if($query->num_rows() > 0){
            $sekolah = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $sekolah
            );
            $this->template->load('template','sekolah/form_sekolah',$data);
        }else{ 
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('sekolah')."';</script>";
        }
    }

    public function hapus()
	{
        $id = $this->input->post('idsekolah');
        $this->m_sekolah->hapus($id);
        echo "<script>window.location='".site_url('sekolah')."';</script>";
    }
}