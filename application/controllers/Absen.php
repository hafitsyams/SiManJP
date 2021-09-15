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

    public function lap_nilai(){
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $kelas = $this->m_jadwal->jupuk();
        $data = array(
            'sekolah'=>$sekolah,
            'kelas'=>$kelas,
        );
        $this->template->load('template','absen/pilih_lap_nilai',$data);
    }

    public function ambilpertemuan(){
        $id=$this->input->post('id');
        $data=$this->m_absen_nilai->ambilpertemuan($id);
        echo json_encode($data);
    }

    public function tampil_lap_nilai(){
        $kelas = $this->input->post('kelas');
        $keterangan = $this->m_pertemuan->ambilketerangan($kelas)->result_array();
        $laporan = $this->m_absen_nilai->lap_nilai($kelas);
        $data = array(
            'laporan' => $laporan,
            'keterangan' => $keterangan,
        );
        $this->template->load('template','absen/lap_nilai',$data);
    }

    public function pdf($id){
        $this->load->library('dompdf_gen');
        $keterangan = $this->m_pertemuan->ambilketerangan($id)->result_array();
        $laporan = $this->m_absen_nilai->lap_nilai($id);
        $data = array (
            'keterangan' => $keterangan,
            'laporan' => $laporan,
        );
        $this->load->view('absen/lapnilai_pdf',$data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Absen Nilai.pdf", array('Attachment'=>0));
    }

    public function tampil(){
        $sklh = $_POST['sekolah'];
        $kls = $_POST['kelas'];
        $pert = $_POST['pertemuan'];
        $sekolah = $this->m_absen_nilai->ambilsekolah($sklh)->result_array();
        $kelas = $this->m_absen_nilai->ambilkelas($kls)->result_array();
        $absen = $this->m_absen_nilai->tampilabsen($pert)->result_array();
        $jmlpert = $this->m_absen_nilai->ambiljmlpert($pert)->result_array();
        $tanggal = $this->m_absen_nilai->ambiltanggal($pert)->result_array();
        $siswa = $this->m_absen_nilai->ambilsiswa($kls)->result_array();
        $cek = $this->m_absen_nilai->cekpertemuan($pert)->result_array();
        $data = array (
            'row' => $absen,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'tanggal' => $tanggal,
            'jmlpert' => $jmlpert,
            'siswa' => $siswa,
            'cek' => $cek,
        );
        if (!empty($cek)) {   
            $this->template->load('template','absen/dataabsen',$data);
        } else {
            $this->template->load('template','absen/absensiswa',$data);
        }      
    }

    public function simpan(){
        $siswa = $this->input->post('idsiswa');
        $data = array();
        foreach($siswa as $key=>$val){
            $data[] = array(
                'idpertemuan'=>$_POST['pertemuan'],
                'idjadwalkelas'=>$_POST['kelas'],
                'idsiswa'=>$_POST['idsiswa'][$key],
                'kehadiran'=>$_POST['kehadiran'][$key],
                'keterangan'=>$_POST['keterangan'][$key],
                'nilai_tugas'=>$_POST['nilai_tugas'][$key],
                'nilai_sikap'=>$_POST['nilai_sikap'][$key],
                'nilai_tugas_akhir'=>$_POST['nilai_tugas_akhir'][$key]
            );
        }
        $test= $this->db->insert_batch('tabel_absen_nilai', $data);
        if($test){
            echo "Sukses";
            redirect('absen');    
        }else{
            echo "Gagal";
        }
    }
}