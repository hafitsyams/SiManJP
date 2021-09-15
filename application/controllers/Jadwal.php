<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_jadwal','m_sekolah','m_user','m_mapel']);
    }

    public function index(){
        $this->load->model('m_jadwal');
        $data['row'] = $this->m_jadwal->jupuk()->result_array();
        $this->template->load('template','jadwal/data_jadwal',$data);
    }

    public function hapus(){
        $id = $this->input->post('idjadwal');
        $this->m_jadwal->hapus($id);
        echo "<script>window.location='".site_url('jadwal')."';</script>";
    }

    public function tambah(){
        $jadwal = new stdClass();
        $jadwal->idjadwalkelas=null;
        $jadwal->kodejadwalkelas=null;
        $jadwal->idsekolah=null;
        $jadwal->tahun=null;
        $jadwal->semester=null;
        $jadwal->idmapel=null;
        $jadwal->namakelas=null;
        $jadwal->idwaktu=null;
        $jadwal->hari=null;
        $jadwal->waktu=null;
        $jadwal->jmlpert=null;

        $sekolah = $this->m_sekolah->get2();
        $mapel = $this->m_mapel->getAll();
        
        $mpl[null] = '- Pilih -';
        foreach($mapel->result() as $matapel){
            $mpl[$matapel->idmapel]=$matapel->namamapel;
        }
        $data=array(
            'page'=>'tambah',
            'row'=>$jadwal,
            'sekolah'=>$sekolah,
            'mapel'=>$mapel,'selectedunit' =>null,
        );
        $this->template->load('template','jadwal/form_jadwal',$data);
    }

    public function ubah($id){
        $query = $this->m_jadwal->get($id);
        if($query->num_rows()>0){
            $jadwal = $query->row();
            $sekolah = $this->m_sekolah->getAll();
            $mapel = $this->m_mapel->getAll($id);
            $mpl[null]='- Pilih -';
            foreach($mapel->result() as $matapel){
                $mpl[$matapel->idmapel] = $matapel->namamapel;
            }
            $data = array(
                'page' => 'ubah',
                'row' => $jadwal,
                'sekolah' => $sekolah,
                'mapel'=> $mapel,
                'selectedunit' =>$jadwal->idmapel,
            );
            $this->template->load('template','jadwal/form_jadwal',$data);
        }else{
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('jadwal')."';</script>";
        }
    }

    public function set($id){
        $query = $this->m_jadwal->get($id);
        if($query->num_rows()>0){
            $jadwal = $query->row();
            $idwaktu = $query->row('idwaktu');
            $buangguru1 = $this->m_jadwal->buangguru1($idwaktu);
            if($buangguru1!=null){
                foreach ($buangguru1 as $value):
                    $a = $value->iduser1;
                    $b = $value->iduser2;
                    $jar = $this->m_jadwal->jar($a,$b);
                endforeach;
            }else{
                $jar = $this->m_jadwal->berguru(); 
            }                   
            $user = $this->m_user->pengajar();
            $usr[null]='- Pilih -';
            foreach($user->result() as $useruser){
                $usr[$useruser->iduser] = $useruser->namauser;
            }
            $data = array(
                'page' => 'set',
                'row' => $jadwal,
                'user'=>$user,
                'idwaktu' => $idwaktu,
                'buangguru1' => $buangguru1,
                'jar' => $jar,
            );
            $this->template->load('template','jadwal/form_jadwal',$data);
        }else{
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('jadwal')."';</script>";
        }
    }

    public function proses(){
        $post = $this->input->post(null,TRUE);
        if(isset($_POST['tambah'])){
            $this->m_jadwal->tambah($post);
        }else if(isset($_POST['ubah'])){
            $this->m_jadwal->ubah($post);
        }else if(isset($_POST['set'])){
            $this->m_jadwal->set($post);
        }

        if($this->db->affected_rows()>0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('jadwal')."';</script>";
    }

    public function ambilketwaktu(){
        $id=$this->input->post('id');
        $data=$this->m_jadwal->ambilketwaktu($id);
        echo json_encode($data);
    }


}