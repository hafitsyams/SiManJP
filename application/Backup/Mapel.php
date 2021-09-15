<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

  function __construct(){
    parent::__construct();
    check_not_login();
    $this->load->model('m_mapel');
    $this->load->library('form_validation');
}

	public function index()
	{
        $this->load->model('m_mapel');
        $data['row'] = $this->m_mapel->get();

		$this->template->load('template','mapel/data_mapel',$data);
    }

    public function add(){
        
      $this->form_validation->set_rules('idnya','ID','required|is_unique[tabel_mata_pelajaran.idmapel]');
      $this->form_validation->set_rules('namamapel','Nama Mapel','required');
      
      $this->form_validation->set_message('required','%s mohon dilengkapi');
      $this->form_validation->set_message('is_unique','%s sudah dipakai');

      $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

      if($this->form_validation->run() == FALSE){ 
          $this->template->load('template','mapel/tambah_mapel');
      }else{
          $post = $this->input->post(null, TRUE);
          $this->m_mapel->add($post);
          if($this->db->affected_rows() > 0){
              echo "<script> alert('Data Tersimpan');</script>";
          }
          echo "<script>window.location='".site_url('mapel')."';</script>";
      }
  }

  public function edit($id){
      
      $this->form_validation->set_rules('idnya','ID','callback_idnya_check');
      $this->form_validation->set_rules('namamapel','Nama Mapel','required');
      
      $this->form_validation->set_message('required','%s mohon dilengkapi');

      $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

      if($this->form_validation->run() == FALSE){ 
          $query = $this->m_mapel->get($id);
          if($query->num_rows() > 0){
              $data['row']=$query->row();
              $this->template->load('template','mapel/edit_mapel',$data);
          }else{
              echo "<script> alert('Data Gaada');";
              echo "window.location='".site_url('mapel')."';</script>";
          }
      }else{
          $post = $this->input->post(null, TRUE);
          $this->m_mapel->edit($post);
          if($this->db->affected_rows() > 0){
              echo "<script> alert('Data Tersimpan');</script>";
          }
          echo "<script>window.location='".site_url('mapel')."';</script>";
      }
  }

  function idnya_check(){
      
  }
  function un_check(){
      $post = $this->input->post(null, TRUE);
      $query = $this->db->query("SELECT * FROM tabel_mata_pelajaran WHERE username = '$post[un]' AND iduser != '$post[idnya]'");
  }

  public function hapus()
{
      $id = $this->input->post('idmapel');
      $this->m_mapel->hapus($id);

      echo "<script>window.location='".site_url('mapel')."';</script>";
  }

}