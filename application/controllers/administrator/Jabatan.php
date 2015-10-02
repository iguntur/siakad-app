<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  public function index() {
    $data['jabatan']   = $this -> a_model -> getJabatan();
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $this->load->view('private/admin/control_panel/jabatan/jabatan_panel', $data);
  } /* End Index */

  // -----------------------------------------------------------------------
  // Functions Insert

  function insert() {
    $validations = array (
            array(
              'field'   =>  'nama_jabatan',
              'label'   =>  'Nama Jabatan',
              'rules'   =>  'required|trim'
            )
        );

      $this->form_validation->set_rules($validations);
      if ($this->form_validation -> run() == FALSE) {
        // Jika Ada Kesalahan Buka Ini
        $this->index();
      } else {
        // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'nama_jabatan' => $this -> input -> post ('nama_jabatan')
          );

        $insert = $this -> a_model -> QueryInsert ('jabatan', $data_valid);

        if ($insert == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jabatan');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jabatan');
        }
      }
  } /* End Insert */


  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_jabatan = NULL ) {
    $data['jabatan'] = $this -> a_model -> getJabatan();
    $id_to_update = $id_jabatan;

    $validations = array (
            array(
              'field'   =>  'nama_jabatan',
              'label'   =>  'Nama Jabatan',
              'rules'   =>  'required|trim'
            )
      );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      $this->load->view('private/admin/control_panel/jabatan/jabatan_panel', $data);
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'nama_jabatan' => $this -> input -> post ('nama_jabatan')
          );

        $where = array('id_jabatan' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('jabatan', $data_valid, $where);

        if ($update == TRUE) {
          // $this->db->cache_delete('administrator', 'artikel_manager');
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jabatan');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jabatan');
        }
      }

    } /* End Update */

  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_jabatan = NULL ) {
    // Validation Data
    $where  = array('id_jabatan' => $id_jabatan);
    $delete = $this -> a_model -> QueryDelete ('jabatan', $where);

    if ($delete == TRUE) {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/jabatan');
    } else {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Failed!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/jabatan');
    }
  } /* End Delete */



}

/* End of file jabatan.php */
/* Location: ./application/controllers/administrator/jabatan.php */
