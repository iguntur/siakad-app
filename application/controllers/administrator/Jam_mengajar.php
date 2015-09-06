<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_mengajar extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  // -----------------------------------------------------------------------
  // INDEX
  public function index() {

    $data['jam_mengajar'] = $this -> a_model -> getJamMengajar();
    $data['myAccount']    = $this -> session -> userdata('nama_awal');
    $this->load->view('private/admin/akademik/jam_mengajar', $data);

  } /* End Index */

  // -----------------------------------------------------------------------
  // Functions Insert

  function insert() {
    $validations = array (
            array(
              'field'   =>  'jam_ke',
              'label'   =>  'Nama Jurusan',
              'rules'   =>  'required|trim'
            ),

            array(
              'field'   =>  'jam_mengajar',
              'label'   =>  'Nama Jurusan',
              'rules'   =>  'required|trim'
            ),
        );


      $this->form_validation->set_rules($validations);
      if ($this->form_validation -> run() == FALSE) {
        // Jika Ada Kesalahan Buka Ini
        redirect('administrator/jam_mengajar');
      } else {
        // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'jam_ke'       => $this -> input -> post ('jam_ke'),
            'jam_mengajar' => $this -> input -> post ('jam_mengajar'),
          );

        $insert = $this -> a_model -> QueryInsert ('jam_mengajar', $data_valid);

        if ($insert == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jam_mengajar');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jam_mengajar');
        }
      }
  } /* End Insert */


  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_jam_mengajar = NULL ) {
    $data['jam_mengajar'] = $this -> a_model -> getJamMengajar();
    $id_to_update = $id_jam_mengajar;

    $validations = array (
            array(
              'field'   =>  'jam_ke',
              'label'   =>  'Nama Jurusan',
              'rules'   =>  'required|trim'
            ),

            array(
              'field'   =>  'jam_mengajar',
              'label'   =>  'Nama Jurusan',
              'rules'   =>  'required|trim'
            ),
        );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      redirect('administrator/jam_mengajar');
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'jam_ke'       => $this -> input -> post ('jam_ke'),
            'jam_mengajar' => $this -> input -> post ('jam_mengajar'),
          );

        $where = array('id_jam_mengajar' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('jam_mengajar', $data_valid, $where);

        if ($update == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jam_mengajar');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/jam_mengajar');
        }
      }

    } /* End Update */

  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_jam_mengajar = NULL ) {
    // Validation Data
    $where  = array('id_jam_mengajar' => $id_jam_mengajar);
    $delete = $this -> a_model -> QueryDelete ('jam_mengajar', $where);

    if ($delete == TRUE) {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/jam_mengajar');
    } else {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Failed!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/jam_mengajar');
    }
  } /* End Delete */

}

/* End of file jadwal_mengajar.php */
/* Location: ./application/controllers/administrator/akademik/jadwal_mengajar.php */
