<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_nilai extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 2 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
      redirect( 'login' );
      }
  } 

  /* --------- End Construct --------- */


  public function index() {

    redirect('staff/data_nilai');
    
  }
  /* --------- End index --------- */

  function form_input() {

    // Base
    $data['myAccount']       = $this->session->userdata('nama_awal');
    $data['nip']             = $this->session->userdata('nip');
    $data['staff_pengajar']  = $this -> a_model -> getByStaff($data['nip']);

    /*************************************************************/
    foreach ($data['staff_pengajar'] as $value) {
          $data['nama_pengajar'] = $value['nama_pengajar'];
    }

    /*************************************************************/
    $data['s_kelas']         = $this->input->post('n_kelas');
    // $data['s_jurusan']       = $this->input->post('n_jurusan');
    $data['s_ta']            = $this->input->post('n_ta');
    $data['semester']        = $this->input->post('n_semester');
    $data['s_mapel']         = $this->input->post('n_mapel');
    $data['by_filter_siswa'] = $this -> a_model -> getFilterSiswa($data['s_kelas']);
    /*************************************************************/

    $this->load->view('private/staff/control_panel/new_input_nilai', $data);
  }
  /* End Form Input */

  function  insert() {

    $this->form_validation->set_rules('nip[]', 'NIP', 'trim|required');

    $this->form_validation->set_rules('tahun_ajaran[]', 'Tahun Ajaran', 'trim|required');
    $this->form_validation->set_rules('semester[]', 'Semester', 'trim|required');
    $this->form_validation->set_rules('mapel[]', 'Mata Pelajaran', 'trim|required');

    $this->form_validation->set_rules('nis[]', 'NIS', 'trim|required');
    
    $this->form_validation->set_rules('tugas[]', 'Tugas', 'trim|required');
    $this->form_validation->set_rules('uts[]', 'UTS', 'trim|required');
    $this->form_validation->set_rules('uas[]', 'UAS', 'trim|required');
    $this->form_validation->set_rules('absensi[]', 'Absensi', 'trim|required');
    $this->form_validation->set_rules('norma[]', 'Norma', 'trim|required');

     if ($this->form_validation->run() == FALSE){
        redirect('staff/data_nilai');
     } else {
      $nis        = $this->input->post('nis');
      $result     = array();

      foreach ($nis as $key => $value) {
      $result[]   = array (
                      // Insert Penanggungjawab / guru bidang studi
                     'nip'            => $_POST['nip'][$key],
                     'nis'            => $_POST['nis'][$key],

                     'tugas'          => $_POST['tugas'][$key],
                     'uts'            => $_POST['uts'][$key],
                     'uas'            => $_POST['uas'][$key],
                     'absensi'        => $_POST['absensi'][$key],
                     'norma'          => $_POST['norma'][$key],

                     'hasil'          => ( $_POST['tugas'][$key] * 15/100 ) +
                                         ( $_POST['uts'][$key] * 25/100 ) +
                                         ( $_POST['uas'][$key] * 25/100 ) +
                                         ( $_POST['absensi'][$key] * 20/100 ) +
                                         ( $_POST['norma'][$key] * 15/100 ),

                     'mata_pelajaran' => $_POST['mapel'][$key],
                     'tahun_ajaran'   => $_POST['tahun_ajaran'][$key],
                     'semester'       => $_POST['semester'][$key]
                  );
      } // Close Foreach

      $insert     = $this -> db -> insert_batch('tabel_nilai', $result);
      if($insert) {
        $this->session->set_flashdata("notif_insert" , "<script> alert('Insert Data Sukses'); </script>");
        redirect('staff/data_nilai');
      } else {
        redirect('staff/data_nilai');
      }

     } // Close Else
  


  }
  /* End Insert */







// ---------------------- END ----------------------------
/* End of file input_data.php */
/* Location: ./application/controllers/staff/input_data.php */
}

