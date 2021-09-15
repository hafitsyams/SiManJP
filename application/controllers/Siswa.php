<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model(['m_siswa','m_jadwal','m_sekolah','m_pertemuan']);
    }

    public function index() {
        $siswa = $this->m_siswa->get()->result_array();
        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();
        $data = array(
            'row' => $siswa,
            'sekolah' => $sekolah,
            'jadwal' => $jadwal,
            'selectedunit' => null,
        );
        $this->template->load('template','siswa/data_siswa',$data);
    }

    public function tambah(){
        $namasiswa = $this->input->post('namasiswa');
        $result = array();
        foreach($namasiswa as $key=>$val){
            $result[] = array(
                'idjadwalkelas'=>$_POST['kelas'],
                'namasiswa'=>$_POST['namasiswa'][$key]
            );
        }
        $test= $this->db->insert_batch('tabel_siswa', $result);
        if($test){
            echo "Sukses";
            redirect('siswa');    
        }else{
            echo "Gagal";
        }
    }

    public function form(){
        $siswa = new stdClass();
        $siswa->idsiswa=null;
        $siswa->idjadwalkelas=null;
        $siswa->namasiswa=null;

        $sekolah = $this->m_pertemuan->ambilsekolah();
        $jadwal = $this->m_jadwal->jupuk();     
        $data = array(
            'page' => 'tambah',
            'row' => $siswa,
            'sekolah' => $sekolah,
            'jadwal' => $jadwal,
            'selectedunit' => null,
        );
        $this->template->load('template','siswa/form_siswa',$data);
    }

    public function ubah($id){
        $query = $this->m_siswa->get($id);
        if($query->num_rows() > 0){
            $siswa = $query->row();
            $data = array(
                'page' => 'ubah',
                'row' => $siswa
            );
            $this->template->load('template','siswa/form_siswa',$data);
        }else{ 
            echo "<script>alert('Data Gaada');</script>";
            echo "<script>window.location='".site_url('siswa')."';</script>";
        }
    }

    public function proses(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->m_siswa->save_batch($post);
        }else if(isset($_POST['ubah'])){
            $this->m_siswa->ubah($post);
        }
        if($this->db->affected_rows() > 0){
            echo "<script>alert('Tersimpan');</script>";
        }else{
            echo "<script>alert('Belum Tersimpan');</script>";
        }
        echo "<script>window.location='".site_url('siswa')."';</script>";
    }

    function ambilkelas()
    {
        $id_sekolah = $this->input->post('idsekolah');
        $data = $this->m_siswa->ambilkelas($id_sekolah)->result();
        echo json_encode($data);
    }

    public function hapus(){
        $id = $this->input->post('idsiswa');
        $this->m_siswa->hapus($id);
        echo "<script>window.location='".site_url('siswa')."';</script>";
    }

    public function filter(){
        $filter = $_GET['kelas'];
        if ($filter == 0){
            $data = $this->m_siswa->get()->result_array();
        }else{
            $data = $this->m_siswa->filter($filter)->result_array();
        }
        if(!empty($data)){
             
                        $no=1; foreach ($data as $row){ ?>
                            <tr>
                                <td><?php echo $no++ ; ?></td>
                                <td><?php echo $row['namasiswa']; ?></td>
                                <td><?php echo $row['namasekolah']; ?></td>
                                <td><?php echo $row['namakelas']; ?></td>

                                <td class="text-center" width="160px">
                                    <form action="<?=site_url('siswa/hapus')?>" method="post">
                                        <?php if($this->session->userdata('jabatan')=="Admin" || $this->session->userdata('jabatan')=="Pengajar") {?>
                                            <input type="hidden" name="idsiswa" value="<?php echo $row['idsiswa'];?>">
                                            <button onclick="return confirm('Beneran?')" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i> Hapus</a>
                                            </button>
                                            <a href="<?php echo site_url('siswa/ubah/'.$row['idsiswa'])?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                        <?php }else{echo "Tidak Ada Pilihan";} ?>
                                    </form>
                                </td>
                            </tr>
                        <?php }?>
                     
            <?php    
        }else{ ?>
        <?php
        }
    }
}