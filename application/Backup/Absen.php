<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_absen_nilai','m_pertemuan','m_jadwal','m_user','m_sekolah','m_siswa']);
        $this->load->library('form_validation');
    }

	public function index()	{
        $absen = $this->m_absen_nilai->get()->result_array();
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();
        
        $data=array(
            'row' => $absen,
            'sekolah'=>$sekolah,
            'jadwal'=>$jadwal,
        );
		$this->template->load('template','absen/pilih_absen',$data);
    }

    public function ambilpertemuan(){
        $id=$this->input->post('id');
        $data=$this->m_absen_nilai->ambilpertemuan($id);
        echo json_encode($data);
    }

    public function tampil(){
        $sklh = $_POST['sekolah'];
        $kls = $_POST['kelas'];
        $pert = $_POST['pertemuan'];
        $sekolah = $this->m_absen_nilai->ambilsekolah($sklh)->result_array();
        $kelas = $this->m_absen_nilai->ambilkelas($kls)->result_array();
        $absen = $this->m_absen_nilai->tampilabsen($pert)->result_array();
        $tanggal = $this->m_absen_nilai->ambiltanggal($pert)->result_array();
        $siswa = $this->m_absen_nilai->ambilsiswa($kls)->result_array();
        $cek = $this->m_absen_nilai->cekpertemuan($pert)->result_array();

        $data = array (
            'row' => $absen,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'siswa' => $siswa,
            'cek' => $cek,
        );
        if (!empty($cek)) {   
            $this->template->load('template','absen/dataabsen',$data);
        } else {
            $this->template->load('template','absen/absensiswa',$data);
        }      
    }

    public function laporanabsen(){
        $kelas = $this->input->post('id');
        $keterangan = $this->m_absen_nilai->ambilketerangan($kelas)->result_array();
        $laporan = $this->m_absen_nilai->laporanabsen($kelas)->result_array();
        $data = array (
            'keterangan' => $keterangan,
            'laporan' => $laporan,
        );
        $this->template->load('template','absen/laporanabsen',$data);
    }

    public function simpan(){
        $siswa = $this->input->post('idsiswa');
        $data = array();
        foreach($siswa as $key=>$val){
            $data[] = array(
                'idpertemuan'=>$_POST['pertemuan'],
                'idsiswa'=>$_POST['idsiswa'][$key],
                'kehadiran'=>$_POST['kehadiran'][$key],
                'keterangan'=>$_POST['keterangan'][$key]
            );
        }
        // $this->template->load('template','absen/aa',$data);
        $test= $this->db->insert_batch('tabel_absen_nilai', $data);
        if($test){
            echo "Sukses";
            redirect('absen');    
        }else{
            echo "Gagal";
        }
    }
}