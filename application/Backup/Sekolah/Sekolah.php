<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_sekolah');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->load->model('m_sekolah');
        $data['row'] = $this->m_sekolah->get();

		$this->template->load('template','sekolah/data_sekolah',$data);
    }
    
    public function add(){
        
        $this->form_validation->set_rules('idnya','ID','required|is_unique[tabel_sekolah.idsekolah]');
        $this->form_validation->set_rules('namasekolah','Nama Sekolah','required');
        $this->form_validation->set_rules('pngjwb','Penanggung Jawab','required');
        $this->form_validation->set_rules('notelpngjwb','No. Telp Png. Jawab','required');
        $this->form_validation->set_message('required','%s mohon dilengkapi');
        $this->form_validation->set_message('is_unique','%s sudah dipakai');

        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() == FALSE){ 
            $this->template->load('template','sekolah/tambah_sekolah');
        }else{
            $post = $this->input->post(null, TRUE);
            $this->m_sekolah->add($post);
            if($this->db->affected_rows() > 0){
                echo "<script> alert('Data Tersimpan');</script>";
            }
            echo "<script>window.location='".site_url('sekolah')."';</script>";
        }
    }

    public function edit($id){
        
        $this->form_validation->set_rules('idnya','ID','callback_idnya_check');
        $this->form_validation->set_rules('namasekolah','Nama Sekolah','required');
        $this->form_validation->set_rules('pngjwb','Penanggung Jawab','required');
        $this->form_validation->set_rules('notelpngjwb','No. Telp Png. Jawab','required');
        $this->form_validation->set_message('required','%s mohon dilengkapi');
    
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() == FALSE){ 
            $query = $this->m_sekolah->get($id);
            if($query->num_rows() > 0){
                $data['row']=$query->row();
                $this->template->load('template','sekolah/edit_sekolah',$data);
            }else{
                echo "<script> alert('Data Gaada');";
                echo "window.location='".site_url('sekolah')."';</script>";
            }
        }else{
            $post = $this->input->post(null, TRUE);
            $this->m_sekolah->edit($post);
            if($this->db->affected_rows() > 0){
                echo "<script> alert('Data Tersimpan');</script>";
            }
            echo "<script>window.location='".site_url('sekolah')."';</script>";
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
        $id = $this->input->post('idsekolah');
        $this->m_sekolah->hapus($id);

        echo "<script>window.location='".site_url('sekolah')."';</script>";
    }

}