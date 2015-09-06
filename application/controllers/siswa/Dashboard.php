<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 3 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Siswa'); </script>");
      redirect( 'login' );
      }
  }

  public function index() {

    $data['myAccount'] = $this->session->userdata('nama_awal');
    $data['nis'] = $this->session->userdata('nis');
    $this->load->view('private/siswa/dashboard', $data);

  }

}

/* End of file siswa.php */
/* Location: ./application/controllers/dashboard/siswa.php */