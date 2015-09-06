<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  // Functions Index
  function index() {
    $data['users']     = $this -> a_model -> getUsers();
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $this -> load -> view('private/admin/control_panel/users/user_panel', $data);
  } /* End index */

  // -----------------------------------------------------------------------
  function aktivasi_siswa($id_user = NULL) {
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $id_to_update = $id_user;

    $validations = array (
          array (
            'field'   =>  'id_user',
            'label'   =>  'ID User',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'username',
            'label'   =>  'Username',
            'rules'   =>  'required|trim'
            )
      );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      redirect('administrator/panel_siswa');
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
      // Cek username yang tersedia

      $this->load->model('b_model');
      $username = $this -> input -> post ('username');
      $check_username = $this -> b_model -> getAvailable_Username($username);
      if ($check_username == FALSE) {
        # Jika username telah dipakai
        $this->session->set_flashdata("notif_update" , "<script> alert('Username Sudah Terpakai, Silahkan Gunakan Username yang lain!...'); </script>");
        redirect('administrator/panel_siswa');

      } elseif ($check_username == TRUE) {
                # Jika username tersedia
                /*-----------------*/

                $data_valid = array (
                    'id_user'   => $this -> input -> post ('id_user'),
                    'username'  => $this -> input -> post ('username')

                  );

                $where = array('id_user' => $id_to_update);

                $update = $this -> a_model -> QueryUpdate ('users', $data_valid, $where);
                
                if ($update == TRUE) {
                  // $this->db->cache_delete('administrator', 'artikel_manager');
                  $this->session->set_flashdata("notif_update" , "<script> alert('Update Data Sukses'); </script>");
                  redirect('administrator/panel_siswa');
                } else {
                  redirect('administrator/panel_siswa');
                }
        }/*-----------------*/

      }
  } /* End Update Siswa */

  // -----------------------------------------------------------------------
  function aktivasi_staff($id_user = NULL) {
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $id_to_update = $id_user;

    $validations = array (
          array (
            'field'   =>  'id_user',
            'label'   =>  'ID User',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'username',
            'label'   =>  'Username',
            'rules'   =>  'required|trim'
            )
      );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      redirect('administrator/staff');
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
      // Cek username yang tersedia

      $this->load->model('b_model');
      $username = $this -> input -> post ('username');
      $check_username = $this -> b_model -> getAvailable_Username($username);
      if ($check_username == FALSE) {
        # Jika username telah dipakai
        $this->session->set_flashdata("notif_update" , "<script> alert('Username Sudah Terpakai, Silahkan Gunakan Username yang lain!...'); </script>");
        redirect('administrator/staff');

      } elseif ($check_username == TRUE) {
                # Jika username tersedia
                /*-----------------*/

                $data_valid = array (
                    'id_user'   => $this -> input -> post ('id_user'),
                    'username'  => $this -> input -> post ('username')

                  );

                $where = array('id_user' => $id_to_update);

                $update = $this -> a_model -> QueryUpdate ('users', $data_valid, $where);
                
                if ($update == TRUE) {
                  // $this->db->cache_delete('administrator', 'artikel_manager');
                  $this->session->set_flashdata("notif_update" , "<script> alert('Update Data Sukses'); </script>");
                  redirect('administrator/staff');
                } else {
                  redirect('administrator/staff');
                }
        }/*-----------------*/

      }
  } /* End Update Guru */

  


  // -----------------------------------------------------------------------
  // Functions Insert
  function insert() {
    $data['users'] = $this -> a_model -> getUsers();

    $validations = array (
          array (
            'field'   =>  'id_user',
            'label'   =>  'ID User',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'hak_akses',
            'label'   =>  'Hak Akses',
            'rules'   =>  'required|trim'
            ),        

          array (
            'field'   =>  'nama_user',
            'label'   =>  'Nama User',
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
        $this->load->view('private/admin/dashboard', $data);
      } else {
        // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'id_user'   => $this -> input -> post ('id_user'),
            'hak_akses' => $this -> input -> post ('hak_akses'),
            'nama_user' => $this -> input -> post ('nama_user'),
            'username'  => $this -> input -> post ('username'),
            'password'  => $this -> input -> post ('password')
          );

        $insert = $this -> a_model -> QueryInsert ('users', $data_valid);
        
        if ($insert == TRUE) {
          // $this->db->cache_delete('administrator', 'artikel_manager');
          $this->session->set_flashdata("notif_insert" , "<script> alert('Insert Data Sukses'); </script>");
          redirect('administrator/users');
        } else {
          $this -> insert();
        }
      }

  } /* End Insert */

  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_user = NULL ) {
    $data['users'] = $this -> a_model -> getUsers();
    $id_to_update = $id_user;

    $validations = array (
          array (
            'field'   =>  'id_user',
            'label'   =>  'ID User',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'hak_akses',
            'label'   =>  'Hak Akses',
            'rules'   =>  'required|trim'
            ),        

          array (
            'field'   =>  'nama_user',
            'label'   =>  'Nama User',
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
      $this->load->view('private/admin/dashboard', $data);
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'id_user'   => $this -> input -> post ('id_user'),
            'hak_akses' => $this -> input -> post ('hak_akses'),
            'nama_user' => $this -> input -> post ('nama_user'),
            'username'  => $this -> input -> post ('username'),
            'password'  => $this -> input -> post ('password')
          );

        $where = array('id_user' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('users', $data_valid, $where);
        
        if ($update == TRUE) {
          // $this->db->cache_delete('administrator', 'artikel_manager');
          $this->session->set_flashdata("notif_update" , "<script> alert('Update Data Sukses'); </script>");
          redirect('administrator/users');
        } else {
          $this -> update();
        }
      }

    } 
    /* End Update */


  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_user = NULL ) {
    // Validation Data
    $where  = array('id_user' => $id_user);
    $delete = $this -> a_model -> QueryDelete ('users', $where);

    if ($delete == TRUE) {
      // echo "Delete Sukses";
      // $this->db->cache_delete_all();
      redirect('administrator/users');
    } else {
      echo "Delete Gagal";
    }
  } /* End Delete */

} /* End Users Class */
