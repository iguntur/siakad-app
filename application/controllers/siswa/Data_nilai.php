<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nilai extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 3 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Siswa'); </script>");
      redirect( 'login' );
      }
  }

  public function index() {

    // Base
    $data['myAccount']    = $this->session->userdata('nama_awal');
    $data['tahun_ajaran'] = $this -> a_model -> getTahunAjaran();

    $this->load->view('private/siswa/control_panel/select_to_view', $data);
    
  }
  /*************************************************************/


  function nilai_siswa() {
    $data['myAccount']      = $this->session->userdata('nama_awal');
    $data['nis']            = $this->session->userdata('nis');
    /*************************************************************/
    $data['s_ta']           = $this->input->post('tahun_ajaran');
    $data['semester']       = $this->input->post('semester');
    $data['profile']        = $this -> a_model -> getBySiswa($data['nis']);
    $data['by_nilai_siswa'] = $this -> a_model -> getNilai_join_tabPengajar($data['nis'],
                                                                            $data['s_ta'],
                                                                            $data['semester']
                                                                          );
    /*************************************************************/
    // Get Nama Wali Kelas
    foreach ($data['profile'] as $value) {
      $key_kelas   = $value['kelas']; // Get Nama Kelas from tabel siswa
    }
    $data_kelas = $this -> a_model -> getNama_Wali_Kelas($key_kelas);
    foreach ($data_kelas as $field) {
      $key_nip_wali_kelas = $field['wali_kelas'];
    }
    $get_nama_wali_kelas = $this -> a_model -> getByStaff($key_nip_wali_kelas);
    foreach ($get_nama_wali_kelas as $field) {
      $data['valid_nip_wali_kelas']  = $field['nip'];
      $data['valid_nama_wali_kelas'] = $field['nama_pengajar'];
    }

    /*************************************************************/
    $this->load->view('private/siswa/control_panel/nilai_data_siswa', $data);
  }



/* End of file Data_nilai.php */
/* Location: ./application/controllers/staff/Data_nilai.php */
}