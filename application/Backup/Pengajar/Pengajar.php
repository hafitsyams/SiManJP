<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_user');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->load->model('m_user');
        $data['row'] = $this->m_user->jabat();

		$this->template->load('template','pengajar/data_pengajar',$data);
    }
    
    public function add(){
        
        $this->form_validation->set_rules('idnya','ID','required|is_unique[tabel_user.iduser]');
        $this->form_validation->set_rules('fullname','Nama','required');
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('nomerhp','Nomer HP','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('un','Username','required|is_unique[tabel_user.username]');
        $this->form_validation->set_rules('pw','Password','required');
        $this->form_validation->set_message('required','%s mohon dilengkapi');
        $this->form_validation->set_message('is_unique','%s sudah dipakai');

        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() == FALSE){ 
            $this->template->load('template','pengajar/tambah_pengajar');
        }else{
            $post = $this->input->post(null, TRUE);
            $this->m_user->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script> alert('Data Tersimpan');</script>";
            }
            echo "<script>window.location='".site_url('pengajar')."';</script>";
        }
    }

    public function edit($id){
        
        $this->form_validation->set_rules('idnya','ID','callback_idnya_check');
        $this->form_validation->set_rules('fullname','Nama','required');
        $this->form_validation->set_rules('jk','Jenis Kelamin','required');
        $this->form_validation->set_rules('nomerhp','Nomer HP','required');
        $this->form_validation->set_rules('email','E-mail','required');
        $this->form_validation->set_rules('un','Username','callback_un_check');
        if($this->input->post('password')){
        $this->form_validation->set_rules('pw','Password','');
        }
        $this->form_validation->set_message('required','%s mohon dilengkapi');
        $this->form_validation->set_message('is_unique','%s sudah dipakai');

        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() == FALSE){ 
            $query = $this->m_user->get($id);
            if($query->num_rows() > 0){
                $data['row']=$query->row();
                $this->template->load('template','pengajar/edit_pengajar',$data);
            }else{
                echo "<script> alert('Data Gaada');";
                echo "window.location='".site_url('pengajar')."';</script>";
            }
        }else{
            $post = $this->input->post(null, TRUE);
            $this->m_user->edit($post);
            if($this->db->affected_rows() > 0){
                echo "<script> alert('Data Tersimpan');</script>";
            }
            echo "<script>window.location='".site_url('pengajar')."';</script>";
        }
    }

    function idnya_check(){
        
    }
    function un_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tabel_user WHERE username = '$post[un]' AND iduser != '$post[idnya]'");
    }

    public function hapus()
	{
        $id = $this->input->post('iduser');
        $this->m_user->hapus($id);

        echo "<script>window.location='".site_url('pengajar')."';</script>";
    }

}