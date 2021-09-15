<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_user');
        $this->load->library('form_validation');
    }

	public function index(){
        $this->load->model('m_user');
        $data['row'] = $this->m_user->user();
		$this->template->load('template','user/data_user',$data);
    }

    public function hapus(){
        $id = $this->input->post('iduser');
        $this->m_user->hapus($id);
        echo "<script>window.location='".site_url('user')."';</script>";
    }

    public function tambah(){
        $user = new stdClass();
        $user->iduser=null;
        $user->namauser=null;
        $user->jk=null;
        $user->nomerhp=null;
        $user->email=null;
        $user->jabatan=null;
        $user->username=null;
        $user->password=null;
        $data = array(
            'page' => 'tambah',
            'row' => $user
        );
        $this->template->load('template','user/form_user',$data);
    }

    public function ubah($id){
        $query = $this->m_user->get($id);
        if($query->num_rows() > 0){
            $user = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $user
            );
            $this->template->load('template','user/form_user',$data);
        }else{ 
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->m_user->tambah($post);
        }else if(isset($_POST['ubah'])){
            $this->m_user->ubah($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('user')."';</script>";
    }
}