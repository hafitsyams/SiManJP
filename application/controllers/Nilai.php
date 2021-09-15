<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_absen_nilai','m_pertemuan','m_jadwal','m_user','m_sekolah','m_siswa']);
        $this->load->library('form_validation');
    }

	public function index()	{
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();

        $data=array(
            'sekolah'=>$sekolah,
            'jadwal'=>$jadwal,
        );
		$this->template->load('template','nilai/pilih_nilai',$data);
    }

    public function tampil(){
        $sklh = $_POST['sekolah'];
        $kls = $_POST['kelas'];
        $pert = $_POST['pertemuan'];
        $sekolah = $this->m_absen_nilai->ambilsekolah($sklh)->result_array();
        $kelas = $this->m_absen_nilai->ambilkelas($kls)->result_array();
        $nilai = $this->m_absen_nilai->tampilnilai($pert)->result_array();
        $tanggal = $this->m_absen_nilai->ambiltanggal($pert)->result_array();
        $siswa = $this->m_absen_nilai->ambilsiswa($kls)->result_array();
        $cek = $this->m_absen_nilai->cekpertemuan($pert)->result_array();

        $data = array (
            'row' => $nilai,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'siswa' => $siswa,
            'cek' => $cek,
        );
        if (!empty($cek)) {   
            $this->template->load('template','nilai/datanilai',$data);
        } else {
            $this->template->load('template','nilai/nilaisiswa',$data);
        }   
    }

    public function simpan(){
        $siswa = $this->input->post('idsiswa');
        $pertemuan = $this->input->post('pertemuan');
        $data = array();
        foreach($siswa as $key=>$val){
            $data[] = array(
                'idpertemuan' => $_POST['pertemuan'],
                'idsiswa' => $_POST['idsiswa'][$key],
                'nilai_tugas' => $_POST['nilai_tugas'][$key],
                'nilai_sikap' => $_POST['nilai_sikap'][$key],
                'nilai_tugas_akhir' => $_POST['nilai_tugas_akhir'][$key],
                'keterangan' => $_POST['keterangan'][$key],
            );
        }
        
    }
}