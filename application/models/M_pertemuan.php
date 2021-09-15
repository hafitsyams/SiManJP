<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pertemuan extends CI_Model{

    public function get($id=null){
        $this->db->from('tabel_pertemuan');
        $this->db->join('tabel_jadwal_kelas','tabel_jadwal_kelas.idjadwalkelas=tabel_pertemuan.idjadwalkelas');
        // $this->db->join('tabel_sekolah','tabel_jadwal_kelas.idsekolah=tabel_pertemuan.idsekolah');
        if($id != null){
            $this->db->where('idpertemuan',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tampil(){
        $data = $this->db->query("SELECT a.idpertemuan, a.pertemuan_ke, a.idjadwalkelas, a.materi, a.tanggal,
        b.namakelas, b.idsekolah, b.iduser1, b.iduser2, b.idmapel,
        c.namasekolah,
        d.namamapel,
        e.namauser AS guru1,
        f.namauser AS guru2
        FROM tabel_pertemuan a
        LEFT JOIN tabel_jadwal_kelas b ON b.idjadwalkelas = a.idjadwalkelas
        LEFT JOIN tabel_sekolah c ON c.idsekolah = b.idsekolah
        LEFT JOIN tabel_mata_pelajaran d ON d.idmapel = b.idmapel
        LEFT JOIN tabel_user e ON e.iduser = b.iduser1
        LEFT JOIN tabel_user f ON f.iduser = b.iduser2");
        return $data;
    }

    public function ambilketerangan($kelas){
        $data = $this->db->query("SELECT 
        a.idjadwalkelas, a.idsekolah, a.idmapel, a.iduser1, a.iduser2, a.namakelas, a.hari, a.waktu, a.idwaktu,
        b.namasekolah,
        c.namamapel,
        d.namauser AS guru1,
        e.namauser AS guru2,
        f.kodehari, f.ketwaktu
        
        FROM tabel_jadwal_kelas a
        LEFT JOIN tabel_sekolah b ON a.idsekolah = b.idsekolah
        LEFT JOIN tabel_mata_pelajaran c ON a.idmapel = c.idmapel
        LEFT JOIN tabel_user d ON d.iduser = a.iduser1
        LEFT JOIN tabel_user e ON e.iduser = a.iduser2
        LEFT JOIN tabel_waktu f ON f.idwaktu = a.idwaktu
        WHERE a.idjadwalkelas='$kelas'");
        return $data;
    }

    public function berita($kelas){
        $data = $this->db->query("SELECT * FROM tabel_pertemuan
        WHERE idjadwalkelas='$kelas'");
        return $data;
    }

    public function filter($filter){
        $data = $this->db->query("SELECT
        a.idpertemuan,
        a.idjadwalkelas,
        a.pertemuan_ke,
        a.materi,
        a.tanggal,
        b.namakelas,
        b.idsekolah,
        b.iduser1,
        b.iduser2,
        b.idmapel,
        c.namasekolah,
        d.namamapel,
        e.namauser AS guru1,
        f.namauser AS guru2
        FROM
        tabel_pertemuan a
        LEFT JOIN tabel_jadwal_kelas b ON b.idjadwalkelas	= a.idjadwalkelas
        LEFT JOIN tabel_sekolah c ON c.idsekolah = b.idsekolah
        LEFT JOIN tabel_mata_pelajaran d ON d.idmapel = b.idmapel
        LEFT JOIN tabel_user e ON e.iduser = b.iduser1
        LEFT JOIN tabel_user f ON f.iduser = b.iduser2
        WHERE a.idjadwalkelas='$filter'");
        return $data;
    }

    public function ambilsekolah(){
        $hasil=$this->db->query("SELECT * FROM tabel_sekolah");
        return $hasil;
    }

    public function ambilkelas($id){
        $hasil=$this->db->query("SELECT * FROM tabel_jadwal_kelas WHERE idsekolah='$id'");
        return $hasil->result();
    }

    public function nextpert($id){
        $hasil=$this->db->query("SELECT 
        COUNT(idpertemuan) AS next 
        FROM `tabel_pertemuan`
        WHERE idjadwalkelas='$id'");
        return $hasil->result();
    }

    public function ambilpengajar($id){
        $hasil = $this->db->query("SELECT
        a.idjadwalkelas,
        a.kodejadwalkelas,
        a.idsekolah,
        a.iduser1,
        a.iduser2,
        a.namakelas,
        a.hari,
        a.waktu,
        b.namauser AS guru1,
        c.namauser AS guru2
        FROM tabel_jadwal_kelas a
        LEFT JOIN tabel_user b ON a.iduser1 = b.iduser
        LEFT JOIN tabel_user c ON a.iduser2 = c.iduser
        WHERE idjadwalkelas='$id'");
        return $hasil->result();
    }

    public function ambilpertemuan($id){
        $hasil=$this->db->query("SELECT * FROM tabel_pertemuan WHERE idjadwalkelas='$id'");
        return $hasil->result();
    }

    public function tambah($post){
        $params = [
            'idjadwalkelas' => $post['kelas'],
            'pertemuan_ke' => $post['pertemuan_ke'],
            'abspgjr1' => $post['absenpengajar1'],
            'abspgjr2' => $post['absenpengajar2'],
            'tanggal' => $post['tanggal'],
            'materi' => $post['materi'],
            'metode' => $post['metode'],
        ];
        $this->db->insert('tabel_pertemuan', $params);
    }

    public function ubah($post){
        $params = [
            'pertemuan_ke' => $post['pertemuan_ke'],
            'tanggal' => $post['tanggal'],
            'materi' => $post['materi'],
            'metode' => $post['metode'],
        ];
        $this->db->where('idpertemuan', $post['idnya']);
        $this->db->update('tabel_pertemuan', $params);
    }
    public function hapus($id){
        $this->db->where('idpertemuan',$id);
        $this->db->delete('tabel_pertemuan');
    }
}