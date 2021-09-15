<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('m_mapel');
        $this->load->library('form_validation');
    }

	public function index()	{
        $this->load->model('m_mapel');
        $data['row'] = $this->m_mapel->getAll();
		$this->template->load('template','mapel/data_mapel',$data);
    }

    public function hapus(){
        $id = $this->input->post('idmapel');
        $this->m_mapel->hapus($id);
        echo "<script>window.location='".site_url('mapel')."';</script>";
    }

    public function ubah($id){
        $query = $this->m_mapel->get($id);
        if($query->num_rows() > 0){
            $mapel = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $mapel
            );
            $this->template->load('template','mapel/form_mapel',$data);
        }else{ 
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('mapel')."';</script>";
        }
    }

    public function tambah(){
        $mapel = new stdClass();
        $mapel->idmapel=null;
        $mapel->namamapel=null;
        $data = array(
            'page' => 'tambah',
            'row' => $mapel
        );
        $this->template->load('template','mapel/form_mapel',$data);
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->m_mapel->tambah($post);
        }else if(isset($_POST['ubah'])){
            $this->m_mapel->ubah($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('mapel')."';</script>";
    }
}