 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen_nilai extends CI_Model {
        
    public function get($id = null){
        $this->db->from('tabel_absen_nilai');
        if($id != null){
            $this->db->where('idabsen', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function lap_nilai($kelas){
        $data = $this->db->query("SELECT 
        SUM(a.nilai_tugas) AS nilai_tugas,
        SUM(a.nilai_sikap) AS nilai_sikap,
        SUM(a.nilai_tugas_akhir) AS nilai_tugas_akhir,
        COUNT(a.idpertemuan) AS hitung, 
        SUM(case when a.kehadiran=1 then 1 else 0 end) AS hadir,
        SUM(case when a.kehadiran=2 then 1 else 0 end) AS sakit,
        SUM(case when a.kehadiran=3 then 1 else 0 end) AS izin,
        SUM(case when a.kehadiran=0 then 1 else 0 end) AS absen,
        a.idsiswa,
        b.namasiswa
        FROM tabel_absen_nilai a
        LEFT JOIN tabel_siswa b ON b.idsiswa = a.idsiswa
        WHERE a.idjadwalkelas = '$kelas' GROUP BY idsiswa");
        return $data->result();
    }

    public function tampilabsen($pert){
        $data = $this->db->query("SELECT
        a.idsiswa,
        a.idjadwalkelas,
        a.namasiswa,
        b.idpertemuan,
                b.pertemuan_ke,
        c.kehadiran,
        c.keterangan,
        c.nilai_tugas,
        c.nilai_sikap,
        c.nilai_tugas_akhir,
                d.jmlpert
    FROM
        tabel_siswa a
        LEFT JOIN tabel_pertemuan b ON b.idjadwalkelas = a.idjadwalkelas
        LEFT JOIN tabel_absen_nilai c ON c.idsiswa = a.idsiswa
                LEFT JOIN tabel_jadwal_kelas d ON d.idjadwalkelas = a.idjadwalkelas
    WHERE 
        b.idpertemuan = '$pert'
        GROUP BY idsiswa");
        return $data;
    }

    public function tampilnilai($pert){
        $data = $this->db->query("SELECT
        a.idsiswa,
        a.idjadwalkelas,
        a.namasiswa,
        b.idpertemuan,
        c.nilai_tugas,
        c.nilai_sikap,
        c.nilai_tugas_akhir,
        c.keterangan
    FROM
        tabel_siswa a
        LEFT JOIN tabel_pertemuan b ON b.idjadwalkelas = a.idjadwalkelas
        LEFT JOIN tabel_absen_nilai c ON c.idsiswa = a.idsiswa
    WHERE 
        b.idpertemuan = '$pert'
        GROUP BY idsiswa");
        return $data;
    }

    public function ambilpertemuan($id){
        $hasil=$this->db->query("SELECT * FROM tabel_pertemuan WHERE idjadwalkelas='$id'");
        return $hasil->result();       
    }

    public function ambilsekolah($sklh){
        $data = $this->db->query("SELECT * FROM tabel_sekolah WHERE idsekolah = '$sklh'");
        return $data;
    }

    public function ambiltanggal($pert){
        $data = $this->db->query("SELECT tanggal, pertemuan_ke FROM tabel_pertemuan WHERE idpertemuan = '$pert'");
        return $data;
    }

    public function ambiljmlpert($pert){
        $data = $this->db->query("SELECT
        a.idjadwalkelas, a.idpertemuan, a.pertemuan_ke,
        b.jmlpert   
        FROM tabel_pertemuan a
        LEFT JOIN tabel_jadwal_kelas b ON b.idjadwalkelas = a.idjadwalkelas
        WHERE a.idpertemuan = '$pert'");
        return $data;
    }

    public function ambilkelas($kls){
        $data = $this->db->query("SELECT
        a.idjadwalkelas, a.hari, a.idmapel, a.idsekolah, a.iduser1, a.iduser2, a.namakelas, a.waktu, a.idwaktu,
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
        LEFT JOIN tabel_waktu f ON f.idwaktu = a.idwaktu 
        WHERE idjadwalkelas = '$kls'");
        return $data;
    }

    public function ambilsiswa($kls){
        $data = $this->db->query("SELECT *  FROM tabel_siswa WHERE idjadwalkelas = '$kls'");
        return $data;
    }

    public function cekpertemuan($pert){
        $data = $this->db->query("SELECT idpertemuan
        FROM tabel_absen_nilai
        WHERE idpertemuan = '$pert'");
        return $data;
    }

    public function ambilketerangan($kelas){
        $data = $this->db->query("SELECT 
        a.idjadwalkelas, a.idsekolah, a.idmapel, a.iduser1, a.iduser2, a.namakelas, a.hari, a.waktu, a.idwaktu,
        b.namasekolah,
        c.namamapel,
        d.namauser AS guru1,
        e.namauser AS guru2
        f.ketwaktu, f.kodehari
        FROM tabel_jadwal_kelas a
        LEFT JOIN tabel_sekolah b ON a.idsekolah = b.idsekolah
        LEFT JOIN tabel_mata_pelajaran c ON a.idmapel = c.idmapel
        LEFT JOIN tabel_user d ON d.iduser = a.iduser1
        LEFT JOIN tabel_user e ON e.iduser = a.iduser2
        LEFT JOIN tabel_waktu f ON f.idwaktu = a.idwaktu
        WHERE a.idjadwalkelas='$kelas'");
        return $data;
    }

    public function save_batch($data){
        return $this->db->insert_batch('tabel_absen_nilai', $data);
    }
}