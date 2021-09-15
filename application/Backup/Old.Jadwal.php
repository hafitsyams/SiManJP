<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_jadwal','m_user','m_sekolah','m_mapel']);
    }

	public function index()
	{
        $data['row'] = $this->m_jadwal->get();
		$this->template->load('template','jadwal/data_jadwal',$data);
    }
    
    public function add(){
        
        $jadwal = new stdClass();
        $jadwal->idjadwalkelas = null;
        $jadwal->iduser = null;
        $jadwal->idsekolah = null;
        $jadwal->idmapel = null;
        $jadwal->namakelas = null;
        $jadwal->hari = null;
        $jadwal->waktu = null;
        $jadwal->validasi = null;
        
        $sekolah = $this->m_sekolah->get();
        $mapel = $this->m_mapel->get();

        $data = array(
            'page'=>'add',
            'row'=> $jadwal,
            'sekolah' =>$sekolah,
            'mapel'=>$mapel
        );
        
        // $post = $this->input->post(null, TRUE);
        // $this->m_jadwal->add($post);
        //     if($this->db->affected_rows() > 0){
        //         echo "<script> alert('Data Tersimpan');</script>";
        //     }
        //     echo "<script>window.location='".site_url('jadwal')."';</script>";

        $this->template->load('template','jadwal/tambah_jadwal',$data);  
    }

    public function edit($id){
        
        $query = $this->m_jadwal->get($id);
        if($query->num_rows()>0){
            $jadwal = $query->row();
            $data = array(
                'page'=>'edit',
                'row'=>$jadwal
            );
            $this->template->load('template','jadwal/edit_jadwal',$data);
        }else{
            echo "<script>alert('Data Gaada');";
            echo "window.location='".site_url('jadwal'),"';</script>";
        }
    }

    public function process(){
        $post = $this->input->post(null,TRUE);
        if(isset($_POST['add'])){
            $this->m_jadwal->add($post);
        }else if(isset($_POST['edit'])){
            $this->m_jadwal->edit($post);
        }

        if($this->db->affected_row() > 0){
            $this->session->set_flashdata('success','Data disimpan');
        } redirect('jadawl');    
    }
    
    public function hapus()
	{
        $id = $this->input->post('idjadwalkelas');
        $this->m_jadwal->hapus($id);

        echo "<script>window.location='".site_url('jadwal')."';</script>";
    }

}