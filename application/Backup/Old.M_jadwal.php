<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
    
    public function get($id = null){
        $this->db->from('tabel_jadwal_kelas');
        if($id != null){
            $this->db->where('idjadwalkelas', $id);
        }
        $query = $this->db->get();
        return $query;
     }

    public function add($post){
        $params['idjadwalkelas'] = $post['idnya'];
        $params['iduser'] = null;
        $params['idsekolah'] = $post['sklh'];
        $params['idmapel'] = $post['mapel'];
        $params['namakelas'] = $post['kls'];
        $params['hari'] = $post['hari'];
        $params['waktu'] = $post['waktu'];
        $params['validasi'] = 0;
        $this->db->insert('tabel_jadwal_kelas', $params);
     }

    public function edit($post){
        $params['idjadwalkelas'] = $post['idnya'];
        $params['iduser'] = null;
        $params['idsekolah'] = $post['sklh'];
        $params['idmapel'] = $post['mapel'];
        $params['namakelas'] = $post['kls'];
        $params['hari'] = $post['hari'];
        $params['waktu'] = $post['waktu'];
        $params['validasi'] = 0;
        $this->db->where('idjadwalkelas', $post['idnya']);
        $this->db->update('tabel_jadwal_kelas', $params);
     }

     public function hapus($id)
	{
        $this->db->where('idjadwalkelas',$id);
        $this->db->delete('tabel_jadwal_kelas');
     }
}