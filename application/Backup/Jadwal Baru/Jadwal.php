<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_jadwal','m_sekolah','m_user','m_mapel']);
    }

	public function index(){
        $data['row'] = $this->m_jadwal->get();
        $this->template->load('template','jadwal/data_jadwal',$data);
    }

    public function add(){
        $jadwal = new stdClass();
        $jadwal->idjadwalkelas = null;
        $jadwal->idsekolah = null;
        $jadwal->idmapel = null;
        $jadwal->namakelas = null;
        $jadwal->hari = null;
        $jadwal->waktu = null;

        $sekolah = $this->m_sekolah->get();
        $mapel = $this->m_mapel->get(); 

        $data = array(
            'page' => 'add',
            'row' => $jadwal,
            'sekolah' => $sekolah,
            'mapel' => $mapel,
        );
        $this->template->load('template','jadwal/form_jadwal',$data);
    }

    public function edit($id){ 
        $query = $this->m_jadwal->get($id);
            if($query->num_rows() > 0){
                $jadwal = $query->row();

                $sekolah = $this->m_sekolah->get();
                $mapel = $this->m_mapel->get();
                $data = array(
                    'page' => 'edit',
                    'row' => $jadwal,
                    'sekolah' => $sekolah,
                    'mapel' => $mapel,'selectedunit' =>$jadwal->idmapel,
                );
                $this->template->load('template','jadwal/form_jadwal',$data);
            }else{ 
                echo "<script>alert('Data Gaada');</script>";
                echo "<script>window.location='".site_url('jadwal')."';</script>";
            }
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->m_jadwal->add($post);
        }else if(isset($_POST['edit'])){
            $this->m_jadwal->edit($post);
        }

        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('jadwal')."';</script>";
    }

    public function hapus(){
        $id = $this->input->post('idjadwalkelas');
        $this->m_jadwal->hapus($id);
        echo "<script>window.location='".site_url('jadwal')."';</script>";
    }

    // public function ambilkelas($id){
    //     $post = $this->input->post(null, TRUE);
    //         $this->m_jadwal->ambilkelas($post);
    //         if($this->db->affected_rows() > 0){
    //             echo "<script> alert('Data Tersimpan');</script>";
    //         }
    //         // echo "<script>window.location='".site_url('jadwal')."';</script>";
    // }

    // public function validasi(){
    //     $id = $this->input->post('idjadwalkelas');
    //     $this->m_jadwal->validasi($id);
    //     echo "<script>window.location='".site_url('jadwal')."';</script>";
    // }
}