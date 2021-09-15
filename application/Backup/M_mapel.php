<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mapel extends CI_Model {
        
   public function get($id = null){
        $this->db->from('tabel_mata_pelajaran');
        if($id != null){
          $this->db->where('idmapel', $id);
        }

        $query = $this->db->get();
        return $query;
   }

   public function add($post){
        $params['idmapel'] = $post['idnya'];
        $params['namamapel'] = $post['namamapel'];
        $this->db->insert('tabel_mata_pelajaran', $params);
   }

   public function edit($post){
        $params['idmapel'] = $post['idnya'];
        $params['namamapel'] = $post['namamapel'];
        $this->db->where('idmapel', $post['idnya']);
        $this->db->update('tabel_mata_pelajaran', $params);
   }

   public function hapus($id)
      {
      $this->db->where('idmapel',$id);
      $this->db->delete('tabel_mata_pelajaran');
   }
}