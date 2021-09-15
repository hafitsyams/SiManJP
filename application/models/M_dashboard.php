<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{

    public function jumlahpengajar(){   
        $query = $this->db->query("SELECT * FROM tabel_user WHERE jabatan='Pengajar'");
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function jumlahsekolah(){   
        $query = $this->db->query("SELECT * FROM tabel_sekolah");
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function jumlahmapel(){   
        $query = $this->db->query("SELECT * FROM tabel_mata_pelajaran");
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function jumlahjadwal(){   
        $query = $this->db->query("SELECT * FROM tabel_jadwal_kelas");
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }

    public function jumlahpertemuan(){   
        $query = $this->db->query("SELECT * FROM tabel_pertemuan");
        if($query->num_rows()>0){
            return $query->num_rows();
        }else{
            return 0;
        }
    }
}