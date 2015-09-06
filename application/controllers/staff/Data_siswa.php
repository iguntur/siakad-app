<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MY_Controller {
/*------------------------------------------------------------------*/
public function __construct() {
parent::__construct();
if ( $this->session->userdata('hak_akses') != 2 ) {
    $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
    redirect( 'login' );
}
/* End Construct ------------------------------------------------------------------*/ }
// Function / Method Index
public function index() {
/***
 | Data Session
 | -----------------
 | Account Name
 | Mete Title
 | Parameter
 | -----------------
***/
$data['myAccount'] = $this->session->userdata('nama_awal');
$data['nip']       = $this->session->userdata('nip');

/***
 | Get Data Siswa in Kelas
 | By nip wali kelas
 | Select in siswa_table where kelas is same
***/
$var_a = $this->a_model->getMyClass($data['nip']);
if ($var_a == true) {
    foreach ($var_a as $value) {
      $var_class = $value['kelas_jurusan'];
    }
    // Data As Wali Kelas
    $ndata = $this->a_model->showMydataAsWaliKelas($data['nip']);
    $data['wali_kelas'] = $ndata[0];

    // Get Siswa By $var_class
    $data['siswa_in_class'] = $this->db->query(" SELECT * FROM tabel_siswa WHERE kelas = '$var_class' ") -> result_array();
} else {
    $data['siswa_in_class'] = "Tidak Ada Data Siswa || Anda Bukan Wali Kelas";
}




 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/staff/view_data_siswa_kelas', $data);
/* End Index ------------------------------------------------------------------*/ }


/* End of file Data_siswa.php */
/* END Controller ---------------------------------------------------------------------*/  }
/* Location: ./application/controllers/staff/Data_siswa.php */