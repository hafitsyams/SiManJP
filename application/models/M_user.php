<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

     public function login($post){
          $this->db->select('*');
          $this->db->from('tabel_user');
          $this->db->where('username', $post['username']);
          $this->db->where('password', $post['password']);
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

     public function pengajar(){
          $this->db->from('tabel_user'); 
          $this->db->where('jabatan',"Pengajar");
          $query = $this->db->get();
          return $query;
     }

     public function user(){
          $this->db->from('tabel_user'); 
          $this->db->where('jabatan !=', "Pengajar");
          $query = $this->db->get();
          return $query;
     }

     public function user2(){
          $this->db->from('tabel_user'); 
          $data = $this->db->query("select * from tabel_user ")->result_array();
          // $query = $this->db->get();
          return $data;
     }

     public function profil($id){
          $data = $this->db->query("SELECT * from tabel_user WHERE iduser='$id'")->result_array();
          return $data;
     }

     public function add($post){
          $params['namauser'] = $post['fullname'];
          $params['jabatan'] = 'Pengajar';
          $params['nrp'] = $post['nrp'];
          $params['prodi'] = $post['prodi'];
          $params['jk'] = $post['jk'];
          $params['nomerhp'] = $post['nomerhp'];
          $params['email'] = $post['email'];
          $params['username'] = $post['un'];
          $params['password'] = $post['pw'];
          $this->db->insert('tabel_user', $params);
     }

     public function edit($post){
          $params['iduser'] = $post['idnya'];
          $params['namauser'] = $post['fullname'];
          $params['jabatan'] = 'Pengajar';
          $params['nrp'] = $post['nrp'];
          $params['prodi'] = $post['prodi'];
          $params['jk'] = $post['jk'];
          $params['nomerhp'] = $post['nomerhp'];
          $params['email'] = $post['email'];
          $params['username'] = $post['un'];
          if(!empty($post['password'])){
          $params['password'] = $post['pw'];}
          $this->db->where('iduser', $post['idnya']);
          $this->db->update('tabel_user', $params);
     }

     public function hapus($id){
        $this->db->where('iduser',$id);
        $this->db->delete('tabel_user');
     }

     public function tambah($post){
          $params = [
               'namauser' => $post['namauser'],
               'nrp' => 1,
               'prodi' => 1,
               'jk' => $post['jk'],
               'nomerhp' => $post['nomerhp'],
               'email' => $post['email'],
               'jabatan' => $post['jabatan'],
               'username' => $post['username'],
               'password' => $post['password'],
          ];
          $this->db->insert('tabel_user', $params);
     }

     public function ubah($post){
          $params = [
               'iduser' => $post['idnya'],
               'namauser' => $post['namauser'],
               'nrp' => 1,
               'prodi' => 1,
               'jk' => $post['jk'],
               'nomerhp' => $post['nomerhp'],
               'email' => $post['email'],
               'jabatan' => $post['jabatan'],
               'username' => $post['username'],
               'password' => $post['password'],
          ];
          $this->db->where('iduser', $post['idnya']);
          $this->db->update('tabel_user', $params);
     }
}