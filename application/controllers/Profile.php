<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

  public function index() {
    // 
  }

  // End Index


  // -----------------------------------------------------------------------
  // Functions View Siswa
  public function siswa($param = '') {
    $data['siswa']     = $this -> a_model -> getBySiswa($param);
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $this->load->view('private/siswa/profile_siswa', $data);
  }

  public function staff($param = '') {
    $data['staff']     = $this -> a_model -> getByStaff($param);
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $this->load->view('private/staff/profile_staff', $data);
  }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */