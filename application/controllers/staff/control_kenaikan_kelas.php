<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_kenaikan_kelas extends MY_Controller {
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
 | Split/Explode Data Siswa @field kelas
 | get Number of class
 | and add $i++ to setup
***/


 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/staff/kontrol_kenaikan_kelas_nilai_siswa', $data);
/* End Index ------------------------------------------------------------------*/ }
// Function / Method Index
public function reqNilai() {
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
 | Get Nilai Siswa
 | By Semester dan NIS
 | Select nilai from tabel nilai
***/
if ($_GET['nis'] && $_GET['semester'] !== null ) {

$reqNis       = $_GET['nis'];
$reqSeem      = $_GET['semester'];

$data['eval'] = $this->a_model->getNilaiToEval($reqNis, $reqSeem);


/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
if ($data['eval'] == null) {
$this->load->view('private/staff/result_evaluasi/result_empty');
} else {
$this->load->view('private/staff/result_evaluasi/result_eval', $data);
}

} // END IF
/* End reqNilai ------------------------------------------------------------------*/ }


























/* End of file Data_siswa.php */
/* END Controller ---------------------------------------------------------------------*/  }
/* Location: ./application/controllers/staff/Data_siswa.php */