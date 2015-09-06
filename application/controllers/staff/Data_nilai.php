<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nilai extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 2 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
      redirect( 'login' );
      }
  } 

  public function index() {

    // Select To View
    // Base
    $data['myAccount']    = $this->session->userdata('nama_awal');
    $data['nip']          = $this->session->userdata('nip');
    /*-----------------------*/
    $data['kelas']        = $this -> a_model -> getKelas();
    $data['tahun_ajaran'] = $this -> a_model -> getTahunAjaran();
    // $data['mapel']        = $this -> a_model -> getMapel();

    // Select Mata Pelajaran
    // by guru bidang bidang studi
    $bid_studi_guru       = $this -> a_model -> getMapel_by_guru($data['nip']);
    foreach ($bid_studi_guru as $value) {
      $data['kode_mapel'] = $value['kode_mapel'];
      $data['nama_mapel'] = $value['nama_mapel'];
    }

    $this->load->view('private/staff/control_panel/select_to_view', $data);
    
  }

  /***********************************/

  function nilai_siswa() {
    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
    if ($this->form_validation->run() == FALSE){
        redirect('staff/data_nilai');
        // return false;
     }
    /*************************************************************/
    $data['myAccount']       = $this->session->userdata('nama_awal');
    /*************************************************************/
    $data['s_kelas']         = $this->input->post('kelas');
    $data['s_ta']            = $this->input->post('tahun_ajaran');
    $data['s_mapel']         = $this->input->post('mapel');
    $data['semester']        = $this->input->post('semester');
    $data['by_nilai_siswa']  = $this -> a_model -> getNilai_to_pengajar($data['s_kelas'],
                                                                        // $data['s_jurusan'],
                                                                        $data['s_mapel'],
                                                                        $data['s_ta'],
                                                                        $data['semester']
                                                                        );
    /*************************************************************/
    $this->load->view('private/staff/control_panel/nilai_data_siswa', $data);
  }

  function update_nilai() {
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
      echo validation_errors(); // tampilkan apabila ada error
     } else {
      $nis        = $this->input->post('nis');
      $result     = array();

      foreach ($nis as $key => $value) {
      $result[]   = array (
                      'id_nilai'       => $_POST['id_nilai'][$key],

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

                      'nis'            => $_POST['nis'][$key],
                      'mata_pelajaran' => $_POST['mapel'][$key],
                      'tahun_ajaran'   => $_POST['tahun_ajaran'][$key],
                      'semester'       => $_POST['semester'][$key]
                  );
      }


      $update     = $this -> db -> update_batch('tabel_nilai', $result, 'id_nilai');
      if($update) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
        redirect('staff/data_nilai');
      } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
        redirect('staff/data_nilai');
      }

     }
  }


/* End of file Data_nilai.php */
/* Location: ./application/controllers/staff/Data_nilai.php */
}