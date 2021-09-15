<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {
    var $table = 'tabel_jadwal_kelas';
        var $pkey = 'id';

    public function get(){
        $data = $this->db->query("SELECT
        a.idsiswa, a.namasiswa,
        b.namakelas, b.idsekolah, b.iduser1, b.iduser2,
        c.namasekolah,
        d.namauser AS guru1,
        e.namauser AS guru2
    FROM
        tabel_siswa	a
        LEFT JOIN tabel_jadwal_kelas b ON b.idjadwalkelas	= a.idjadwalkelas
        LEFT JOIN tabel_sekolah c ON c.idsekolah = b.idsekolah
        LEFT JOIN tabel_user d ON d.iduser = b.iduser1
        LEFT JOIN tabel_user e ON e.iduser = b.iduser2");
        return $data;
    }

    public function filter($filter){
        $data = $this->db->query("SELECT
        a.idsiswa,
        a.idjadwalkelas,
        a.namasiswa,
        b.namakelas,
        b.idsekolah,
        b.iduser1,
        b.iduser2,
        c.namasekolah,
        d.namauser AS guru1,
        e.namauser AS guru2
    FROM
        tabel_siswa	a
        LEFT JOIN tabel_jadwal_kelas b ON b.idjadwalkelas	= a.idjadwalkelas
        LEFT JOIN tabel_sekolah c ON c.idsekolah = b.idsekolah
        LEFT JOIN tabel_user d ON d.iduser = b.iduser1
        LEFT JOIN tabel_user e ON e.iduser = b.iduser2
        WHERE a.idjadwalkelas='$filter'");
        return $data;
    }

    public function hapus($id){
        $this->db->where('idsiswa',$id);
        $this->db->delete('tabel_siswa');
    }

    function ambilkelas($id_sekolah){
        $this->db->from('tabel_jadwal_kelas');
        $this->db->where('idsekolah', $id_sekolah);
        $result = $this->db->get($this->table)->result();
        return $result; 
    }

    public function save_batch($data){
        return $this->db->insert_batch('tabel_siswa', $data);
    }
}
