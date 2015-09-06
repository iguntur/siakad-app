<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  public function index() {

    $data['kelas']      = $this -> a_model -> getTabPengajar_join_kelas();

    $data['jurusan']    = $this -> a_model -> getJurusan();
    $data['wali_kelas'] = $this -> a_model -> getByWaliKelas();
    $data['myAccount']  = $this->session->userdata('nama_awal');
    $this->load->view('private/admin/control_panel/kelas/kelas_panel', $data);

  } /* End Index */
  // -----------------------------------------------------------------------
  // Functions Insert

  function insert() {
    $validations = array (
          array (
            'field'   =>  'nama_kelas',
            'label'   =>  'Nama Kelas',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'nama_jurusan',
            'label'   =>  'kelas Jurusan',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'wali_kelas',
            'label'   =>  'Wali Kelas',
            'rules'   =>  'required|trim'
            )
      );

      $this->form_validation->set_rules($validations);
      if ($this->form_validation -> run() == FALSE) {
        // Jika Ada Kesalahan Buka Ini
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Kesalahan Validasi Form!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
      } else {
        // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'nama_kelas'    => $this -> input -> post ('nama_kelas'),
            'nama_jurusan'  => $this -> input -> post ('nama_jurusan'),
            'kelas_jurusan' => $this -> input -> post ('nama_kelas') . " - " . $this -> input -> post ('nama_jurusan'),
            'wali_kelas'    => $this -> input -> post ('wali_kelas')
          );

        $insert = $this -> a_model -> QueryInsert ('kelas', $data_valid);

        if ($insert == TRUE) {
          // $this->db->cache_delete('administrator', 'artikel_manager');
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
        }
      }
  } /* End Insert */


  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_kelas = NULL ) {
    $data['kelas'] = $this -> a_model -> getKelas();
    $id_to_update = $id_kelas;

    $validations = array (
          array (
            'field'   =>  'nama_kelas',
            'label'   =>  'Nama Kelas',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'nama_jurusan',
            'label'   =>  'kelas Jurusan',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'wali_kelas',
            'label'   =>  'Wali Kelas',
            'rules'   =>  'required|trim'
            )
      );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
        // Jika Ada Kesalahan Buka Ini
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Kesalahan Validasi Form!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'nama_kelas'    => $this -> input -> post ('nama_kelas'),
            'nama_jurusan'  => $this -> input -> post ('nama_jurusan'),
            'kelas_jurusan' => $this -> input -> post ('nama_kelas') . " - " . $this -> input -> post ('nama_jurusan'),
            'wali_kelas'    => $this -> input -> post ('wali_kelas')
        );
        $where = array('id_kelas' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('kelas', $data_valid, $where);

        if ($update == TRUE) {
          // $this->db->cache_delete('administrator', 'artikel_manager');
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/kelas');
        }
      }

    } /* End Update */

  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_kelas = NULL ) {
    // Validation Data
    $where  = array('id_kelas' => $id_kelas);
    $delete = $this -> a_model -> QueryDelete ('kelas', $where);

    if ($delete == TRUE) {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/kelas');
    } else {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Failed!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/kelas');
    }
  } /* End Delete */

}
/* End of file kelas.php */
/* Location: ./application/controllers/administrator/kelas.php */
