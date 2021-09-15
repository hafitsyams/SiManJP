<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
        
    public function get($id = null){
        $this->db->from('tabel_jadwal_kelas');
        $this->db->join('tabel_sekolah','tabel_sekolah.idsekolah = tabel_jadwal_kelas.idsekolah');
        $this->db->join('tabel_mata_pelajaran','tabel_mata_pelajaran.idmapel = tabel_jadwal_kelas.idmapel');
        $this->db->join('tabel_user','tabel_user.iduser = tabel_jadwal_kelas.iduser');
        if($id != null){
          $this->db->where('idjadwalkelas', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'idjadwalkelas' => $post['idnya'],
            'iduser' => 1,
            'idsekolah' => $post['idsekolah'],
            'idmapel' => $post['idmapel'],
            'namakelas' => $post['namakelas'],
            'hari' => $post['hari'],
            'waktu' => $post['waktu'],
            'validasi' => 0,
        ];
        $this->db->insert('tabel_jadwal_kelas', $params);
    }

    public function edit($post){
        $params = [
            'idjadwalkelas' => $post['idnya'],
            'idsekolah' => $post['idsekolah'],
            'idmapel' => $post['idmapel'],
            'namakelas' => $post['namakelas'],
            'hari' => $post['hari'],
            'waktu' => $post['waktu'],
        ];
        $this->db->where('idjadwalkelas', $post['idnya']);
        $this->db->update('tabel_jadwal_kelas', $params);
    }

    public function hapus($id){
        $this->db->where('idjadwalkelas',$id);
        $this->db->delete('tabel_jadwal_kelas');
    }

    // public function ambilkelas($id){
    //     $params = [
    //         'idjadwalkelas' => $id['idnya'],
    //         'iduser' => $post['sesion'], 
    //     ];
    //     $this->db->where('idjadwalkelas', $id['idnya']);
    //     $this->db->update('tabel_jadwal_kelas', $params);
    // }

    // public function validasi($id){
    //     $params['validasi'] = 1;
    //     $this->db->where('idjadwalkelas',$id);
    //     $this->db->update('tabel_jadwal_kelas', $params);
    // }
}