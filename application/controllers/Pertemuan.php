<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pertemuan extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_pertemuan','m_jadwal','m_user','m_sekolah']);
    }

    public function index(){
        $pertemuan = $this->m_pertemuan->tampil()->result_array();
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();
        $sklh[null] = '- Pilih -';
        foreach($sekolah->result() as $sekolahan){
            $sklh[$sekolahan->idsekolah]=$sekolahan->namasekolah;
        }
        $data=array(
            'row' => $pertemuan,
            'sekolah'=>$sekolah,
            'jadwal'=>$jadwal,
            'selectedunit' =>null,
        );
        $this->template->load('template','pertemuan/data_pertemuan',$data);
    }

    public function ambilkelas(){
        $id=$this->input->post('id');
        $data=$this->m_pertemuan->ambilkelas($id);
        echo json_encode($data);
    }

    public function ambilpengajar(){
        $id=$this->input->post('id');
        $data=$this->m_pertemuan->ambilpengajar($id);
        echo json_encode($data);
    }

    public function nextpert(){
        $id=$this->input->post('id');
        $data=$this->m_pertemuan->nextpert($id);
        echo json_encode($data);
    }

    public function data(){
        $pertemuan = $this->m_pertemuan->tampil()->result_array();
        $data=array(
            'row' => $pertemuan,
        );
        $this->load->view('pertemuan/data',$data);
    }

    public function pilihberita(){
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $data = array(
            'sekolah' => $sekolah,
        );
        $this->template->load('template','pertemuan/pilihberita',$data);
    }

    public function berita(){
        $kelas = $_GET['kelas'];
        $keterangan = $this->m_pertemuan->ambilketerangan($kelas)->result_array();
        $berita = $this->m_pertemuan->berita($kelas)->result_array();
        $data = array(
            'berita' => $berita,
            'keterangan' => $keterangan,
        );
        $this->template->load('template','pertemuan/beritaacara',$data);
    }

    public function pdf($id){
        $this->load->library('dompdf_gen');
        $keterangan = $this->m_pertemuan->ambilketerangan($id)->result_array();
        $berita = $this->m_pertemuan->berita($id)->result_array();
        $data = array(
            'berita' => $berita,
            'keterangan' => $keterangan,
        );
        $this->load->view('pertemuan/berita_pdf',$data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("berita_acara.pdf", array('Attachment'=>0));

    }

    public function filter(){
        $filter = $_GET['kelas'];
        if ($filter == 0){
            $data = $this->m_pertemuan->tampil()->result_array();
        }else{
            $data = $this->m_pertemuan->filter($filter)->result_array();
        }
        if(!empty($data)){
            foreach ($data as $row){ ?>
                <tr>
                    <td><?php echo $row['namasekolah']; ?></td>
                    <td><?php echo $row['namamapel']; ?></td>
                    <td><?php echo $row['namakelas']; ?></td>
                    <td><?php echo $row['pertemuan_ke']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td class="text-center" width="160px">
                        <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") {}?>
                            <form action="<?=site_url('pertemuan/hapus')?>" method="post">
                                <?php if($this->fungsi->user_login()->iduser == $row['iduser1'] || $this->fungsi->user_login()->iduser == $row['iduser2'] || $this->session->userdata('jabatan')=="Admin"){?>
                                    <input type="hidden" name="idpertemuan" value="<?php echo $row['idpertemuan'];?>">
                                    <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Hapus</a>
                                    </button>
                                    <a href="<?php echo site_url('pertemuan/ubah/'.$row['idpertemuan'])?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                            </form>
                            <form action="<?=site_url('absen/tampil')?>" method="post">
                                <input type="hidden" name="pertemuan" value="<?php echo $row['idpertemuan'];?>">
                                <input type="hidden" name="kelas" value="<?php echo $row['idjadwalkelas'];?>">
                                <input type="hidden" name="sekolah" value="<?php echo $row['idsekolah'];?>">
                                <button onclick="return" class="btn bg-yellow btn-xs">
                                    <i class="fa fa-trophy"></i> Absen Nilai</a>
                                </button>
                            </form>
                        <?php }else{echo "Tidak Ada Pilihan";} ?>
                    </td>
                </tr>
            <?php } ?> <?php    
        }else{ ?>
        <?php
        }
    }

    public function hapus(){
        $id = $this->input->post('idpertemuan');
        $this->m_pertemuan->hapus($id);
        echo "<script>window.location='".site_url('pertemuan')."';</script>";
    }
    
    public function tambah(){
        $pertemuan = new stdClass();
        $pertemuan->idpertemuan=null;
        $pertemuan->idjadwalkelas=null;
        $pertemuan->pertemuan_ke=null;
        $pertemuan->absenpengajar1=null;
        $pertemuan->absenpengajar2=null;
        $pertemuan->tanggal=null;
        $pertemuan->materi=null;
        $pertemuan->metode=null;
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();
        $data = array(
            'page' => 'tambah',
            'row' => $pertemuan,
            'sekolah' => $sekolah,
            'jadwal' => $jadwal,
            'selectedunit' => null,
        );
        $this->template->load('template','pertemuan/form_pertemuan',$data);
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->m_pertemuan->tambah($post);
        }else if(isset($_POST['ubah'])){
            $this->m_pertemuan->ubah($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('pertemuan')."';</script>";
    }

    public function ubah($id){
        $query = $this->m_pertemuan->get($id);
        if($query->num_rows() > 0){
            $pertemuan = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $pertemuan
            );
            $this->template->load('template','pertemuan/form_pertemuan',$data);
        }else{ 
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('pertemuan')."';</script>";
        }
    }

    

    
}