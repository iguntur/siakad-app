<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 2 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
      redirect( 'login' );
      }
  }

  public function index() {

    $data['myAccount'] = $this->session->userdata('nama_awal');
    $data['nip']       = $this->session->userdata('nip');
    $data['users']     = $this -> a_model -> get_by_Users($data['nip']);
    /*-----------------------*/
    $this->load->view('private/staff/setting', $data);        
  }
  /*=============================================================*/

  public function changes() {
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $data['nip']       = $this->session->userdata('nip');
    $data['users']     = $this -> a_model -> get_by_Users($data['nip']);
    /*-----------------------*/

    $id_to_update = $this -> input -> post ('id_user');

    $validations = array (
          array (
            'field'   =>  'id_user',
            'label'   =>  'ID User',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'account',
            'label'   =>  'Account Name',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'username',
            'label'   =>  'Username',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'password',
            'label'   =>  'Password',
            'rules'   =>  'required|md5'
            )
      );


    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      $this->load->view('private/staff/setting', $data);
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
      // Cek username yang tersedia

      $this->load->model('b_model');
      $username = $this -> input -> post ('username');
      $check_username = $this -> b_model -> getAvailable_Username($username);
      if ($check_username == FALSE) {
        # Jika username telah dipakai
        $this->session->set_flashdata("notif_update" , "<script> alert('Username Sudah Terpakai, Silahkan Gunakan Username yang lain!...'); </script>");
        redirect('staff/setting');
      } elseif ($check_username == TRUE) {
                # Jika username tersedia
                /*-----------------*/

                $data_valid = array (
                    'id_user'   => $this -> input -> post ('id_user'),
                    'nama_user' => $this -> input -> post ('account'),
                    'username'  => $this -> input -> post ('username'),
                    'password'  => $this -> input -> post ('password')

                  );

                $where = array('id_user' => $id_to_update);

                $update = $this -> a_model -> QueryUpdate ('users', $data_valid, $where);
                
                if ($update == TRUE) {
                  // $this->db->cache_delete('administrator', 'artikel_manager');
                  $this->session->set_flashdata("notif_update" , "<script> alert('Update Data Sukses'); </script>");
                  redirect('staff/setting');
                } else {
                  $this -> index();
                }
        }/*-----------------*/

      }
  } /* End Changes */


/* End of file Setting.php */
/* Location: ./application/controllers/staff/Setting.php */
}