<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sekolah extends CI_Model {
        
   public function get($id = null){
        $this->db->from('tabel_sekolah');
        if($id != null){
                $this->db->where('idsekolah', $id);
        }

        $query = $this->db->get();
        return $query;
   }

   public function add($post){
        $params['idsekolah'] = $post['idnya'];
        $params['namasekolah'] = $post['namasekolah'];
        $params['penanggungjawab'] = $post['pngjwb'];
        $params['notelpngjwb'] = $post['notelpngjwb'];
        $this->db->insert('tabel_sekolah', $params);
   }

   public function edit($post){
        $params['idsekolah'] = $post['idnya'];
        $params['namasekolah'] = $post['namasekolah'];
        $params['penanggungjawab'] = $post['pngjwb'];
        $params['notelpngjwb'] = $post['notelpngjwb'];
        $this->db->where('idsekolah', $post['idnya']);
        $this->db->update('tabel_sekolah', $params);
   }

   public function hapus($id)
      {
      $this->db->where('idsekolah',$id);
      $this->db->delete('tabel_sekolah');
   }
}