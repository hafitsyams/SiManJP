<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_sekolah extends CI_Model {
        
     public function get($id){
          $this->db->from('tabel_sekolah');
          if($id != null){
               $this->db->where('idsekolah', $id);
          }
          $query = $this->db->get();
          return $query;
     }
     public function get2(){
          $this->db->from('tabel_sekolah');
          $query = $this->db->get();
          return $query;
     }
     public function getAll(){
          $this->db->from('tabel_sekolah');
          // if($id != null){
          //      $this->db->where('idsekolah', $id);
          // }
          $query = $this->db->get();
          return $query;
     }

     public function tambah($post){
          $params = [
               'idsekolah' => $post['idnya'],
               'namasekolah' => $post['namasekolah'],
               'alamatsekolah' => $post['alamatsekolah'],
               'notelsekolah' => $post['notelsekolah'],
               'penanggungjawab' => $post['pngjwb'],
               'notelpngjwb' => $post['notelpngjwb'],
          ];
          $this->db->insert('tabel_sekolah', $params);
     }

     public function ubah($post){
          $params = [
               'idsekolah' => $post['idnya'],
               'namasekolah' => $post['namasekolah'],
               'alamatsekolah' => $post['alamatsekolah'],
               'notelsekolah' => $post['notelsekolah'],
               'penanggungjawab' => $post['pngjwb'],
               'notelpngjwb' => $post['notelpngjwb'],
          ];
          $this->db->where('idsekolah', $post['idnya']);
          $this->db->update('tabel_sekolah', $params);
     }

     public function hapus($id){
          $this->db->where('idsekolah',$id);
          $this->db->delete('tabel_sekolah');
     }
}