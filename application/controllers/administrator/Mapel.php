<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  //-------------------------------------------------------------------------
  // Function Index

  public function index() {

    $data['mapel']         = $this -> a_model -> getMapel();
    // $data['nama_pengajar'] = $this -> a_model -> getPengajar();
    $data['myAccount']     = $this->session->userdata('nama_awal');

    $this->load->view('private/admin/control_panel/mapel/mapel_panel', $data);

  } /* End Index */


  // -----------------------------------------------------------------------
  // Functions Insert

  function insert() {
    $validations = array (
            array(
              'field'   =>  'nama_mapel',
              'label'   =>  'Nama Bidang Studi',
              'rules'   =>  'required|trim'
            ),

            array(
              'field'   =>  'kode_mapel',
              'label'   =>  'Kode Bidang Studi',
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
            'kode_mapel' => $this -> input -> post ('kode_mapel'),
            'nama_mapel' => $this -> input -> post ('nama_mapel'),
          );

        $insert = $this -> a_model -> QueryInsert ('mata_pelajaran', $data_valid);

        if ($insert == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/mapel');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Insert Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/mapel');
        }
      }
  } /* End Insert */


  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_mapel = NULL ) {
    $data['mapel'] = $this -> a_model -> getMapel();
    $id_to_update = $id_mapel;

    $validations = array (
            array(
              'field'   =>  'nama_mapel',
              'label'   =>  'Nama Bidang Studi',
              'rules'   =>  'required|trim'
            ),

            array(
              'field'   =>  'kode_mapel',
              'label'   =>  'Kode Bidang Studi',
              'rules'   =>  'required|trim'
            )
        );

    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
    $this->load->view('private/admin/control_panel/mapel/mapel_panel', $data);
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'kode_mapel' => $this -> input -> post ('kode_mapel'),
            'nama_mapel' => $this -> input -> post ('nama_mapel'),
          );

        $where = array('id_mapel' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('mata_pelajaran', $data_valid, $where);

        if ($update == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/mapel');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/mapel');
        }
      }

    } /* End Update */

  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_mapel = NULL ) {
    // Validation Data
    $where  = array('id_mapel' => $id_mapel);
    $delete = $this -> a_model -> QueryDelete ('mata_pelajaran', $where);

    if ($delete == TRUE) {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/mapel');
    } else {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Failed!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/mapel');
    }
  } /* End Delete */


}

/* End of file mapel */
/* Location: ./application/controllers/administrator/mapel */
