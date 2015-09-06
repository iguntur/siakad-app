<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class El_model extends CI_Model {

  // ------------------------------------------------------------
  // LOGIN Session
  function user_login ($username, $password) {
    // $query = $this->db-> select ('*')
                      // -> from ('users, tabel_siswa, tabel_pengajar')
    $query = $this->db-> where ('username', $username)
                      -> where ('password', $password)
                      // -> join ('tabel_pengajar', 'tabel_pengajar.id_user = users.id_user', 'left')
                      // -> join ('tabel_siswa', 'tabel_siswa.id_user = users.id_user', 'left')
                      // -> limit (1)
                      -> get ('users');
            if ($query -> num_rows() > 0) {
              foreach ($query->result() as $sess) {
                $sess_data['nama_awal'] = $sess->nama_user;
                $sess_data['username']  = $sess->username;
                $sess_data['hak_akses'] = $sess->hak_akses;
                $this->session->set_userdata($sess_data);
              }
              return $query->row();

            } else {
              return FALSE;
            }
  }

  function login($username, $password) {

    $query = $this -> db ->select('*')
                         ->from('users')
                         ->join('tabel_siswa', 'tabel_siswa.id_user = users.id_user' , 'left')
                         ->join('tabel_pengajar', 'tabel_pengajar.id_user = users.id_user' , 'left')
                         ->join('tabel_admin', 'tabel_admin.id_user = users.id_user' , 'left')
                         ->where('username', $username)
                         ->where('password', $password)
                         ->get();
                         // return $query -> result_array();

            if ($query -> num_rows() > 0) {
              foreach ($query->result() as $sess) {
                $sess_data['nama_awal'] = $sess->nama_user;
                $sess_data['username']  = $sess->username;
                $sess_data['hak_akses'] = $sess->hak_akses;
                $sess_data['nis']       = $sess->nis;
                $sess_data['nip']       = $sess->nip;
                $sess_data['id_admin']  = $sess->id_admin;
                $this->session->set_userdata($sess_data);
              }
              return $query->row();

            } else {
              return FALSE;
            }

  }

}

/* End of file el_model.php */
/* Location: ./application/models/el_model.php */