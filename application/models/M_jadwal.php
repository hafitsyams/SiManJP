<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model{

    public function get($id){
        $data = $this->db->query("SELECT * FROM tabel_jadwal_kelas where idjadwalkelas = '$id'");
        return $data;
    }

    public function jupuk() {
        $data = $this->db->query("SELECT 
        a.idjadwalkelas, a.namakelas, a.hari, a.waktu, a.iduser1, a.iduser2, a.kodejadwalkelas, a.jmlpert, a.tahun, a.semester, a.idwaktu, 
        b.namauser AS guru1, 
        c.namauser AS guru2, 
        d.namamapel,
        e.namasekolah,
        f.kodehari, f.ketwaktu
        FROM tabel_jadwal_kelas a
        LEFT JOIN tabel_user b ON b.iduser = a.iduser1
        LEFT JOIN tabel_user c ON c.iduser = a.iduser2
        LEFT JOIN tabel_mata_pelajaran d ON d.idmapel = a.idmapel
        LEFT JOIN tabel_sekolah e ON e.idsekolah = a.idsekolah
        LEFT JOIN tabel_waktu f ON f.idwaktu = a.idwaktu");
        return $data;
    }

    public function idwaktu($id){
        $hasil=$this->db->query("SELECT idwaktu FROM tabel_jadwal_kelas WHERE idjadwalkelas='$id'");
        return $hasil->result_array();
    }

    public function hapus($id){
        $this->db->where('idjadwalkelas',$id);
        $this->db->delete('tabel_jadwal_kelas');
    }

    public function tambah($post){
        $params = [
            'kodejadwalkelas' => $post['kodejadwal'],
            'iduser1' => 1,
            'iduser2' => 1,
            'idsekolah' => $post['idsekolah'],
            'idmapel' => $post['idmapel'],
            'namakelas' => $post['namakelas'],
            'tahun' => $post['tahun'],
            'semester' => $post['semester'],
            'idwaktu' => $post['ketwaktu'],
            'hari' => 0,
            'waktu' => 0,
            'jmlpert' => $post['jmlpert'],
        ];
        $this->db->insert('tabel_jadwal_kelas',$params);
    }

    public function ubah($post){
        $params = [
            'idjadwalkelas' => $post['idnya'],
            'kodejadwalkelas' => $post['kodejadwal'],
            'idsekolah' => $post['idsekolah'],
            'idmapel' => $post['idmapel'],
            'namakelas' => $post['namakelas'],
            'tahun' => $post['tahun'],
            'semester' => $post['semester'],
            'idwaktu' => $post['ketwaktu'],
            'hari' => 0,
            'waktu' => 0,
            'jmlpert' => $post['jmlpert'],
        ];
        $this->db->where('idjadwalkelas', $post['idnya']);
        $this->db->update('tabel_jadwal_kelas', $params);
    }

    public function set($post){
        $params = [
            'idjadwalkelas' => $post['idnya'],
            'iduser1' => $post['iduser'],
            'iduser2' => $post['iduserr'],
        ];
        $this->db->where('idjadwalkelas', $post['idnya']);
        $this->db->update('tabel_jadwal_kelas', $params);
    }

    public function ambilketwaktu($id){
        $hasil=$this->db->query("SELECT * FROM tabel_waktu WHERE kodehari='$id'");
        return $hasil->result();
    }

    public function buangguru1($idwaktu){
        $data = $this->db->query("SELECT iduser1, iduser2
        FROM tabel_jadwal_kelas WHERE idwaktu='$idwaktu' && iduser1!=1");
        return $data->result();
    }

    public function jar ($a,$b){
        $data = $this->db->query("SELECT iduser, namauser
        FROM tabel_user
        WHERE iduser!='$a' && iduser!='$b' && jabatan='Pengajar'");
        return $data->result();
    }

    public function berguru (){
        $data = $this->db->query(" SELECT iduser, namauser
        FROM tabel_user
        WHERE jabatan='Pengajar'");
        return $data->result();
    }
}