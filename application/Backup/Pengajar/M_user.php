<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

   public function login($post)
   {
        $this->db->select('*');
        $this->db->from('tabel_user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
        }
        
     public function get($id = null){
        $this->db->from('tabel_user');
        if($id != null){
                $this->db->where('iduser', $id);
        }

        $query = $this->db->get();
        return $query;
     }

     public function jabat(){
          $this->db->from('tabel_user'); 
          $this->db->where('jabatan',"Pengajar");
          $query = $this->db->get();
          return $query;
     }

     public function add($post){
          $params['iduser'] = $post['idnya'];
          $params['namauser'] = $post['fullname'];
          $params['jabatan'] = 'Pengajar';
          $params['jk'] = $post['jk'];
          $params['nomerhp'] = $post['nomerhp'];
          $params['email'] = $post['email'];
          $params['username'] = $post['un'];
          $params['password'] = sha1($post['pw']);
          $this->db->insert('tabel_user', $params);
     }

     public function edit($post){
          $params['iduser'] = $post['idnya'];
          $params['namauser'] = $post['fullname'];
          $params['jabatan'] = 'Pengajar';
          $params['jk'] = $post['jk'];
          $params['nomerhp'] = $post['nomerhp'];
          $params['email'] = $post['email'];
          $params['username'] = $post['un'];
          if(!empty($post['password'])){
          $params['password'] = sha1($post['pw']);}
          $this->db->where('iduser', $post['idnya']);
          $this->db->update('tabel_user', $params);
     }

     public function hapus($id)
	{
        $this->db->where('iduser',$id);
        $this->db->delete('tabel_user');
     }
}