<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
public function __construct() {
parent::__construct();
if ( $this->session->userdata('hak_akses') != 3 ) {
  $this->session->set_flashdata('error', "<script> alert('Anda Bukan Siswa'); </script>");
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
$data['nis']       = $this->session->userdata('nis');
 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/siswa/dashboard', $data);

/* End Index ------------------------------------------------------------------*/ }
public function jadwal_akademik() {
/***
 | Data Session
 | -----------------
 | Account Name
 | Mete Title
 | Parameter
 | -----------------
***/
$data['myAccount'] = $this->session->userdata('nama_awal');
 

/***
 | Load Model 
 | Tahun Ajaran
 | Kelas & Jurusan
 | For Select
 | Get Data jadwal
***/
$data['tahun_ajaran']  = $this->a_model->getTahunAjaran();
$data['kelas_jurusan'] = $this->a_model->getKelas();

/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/siswa/view_jadwal_akademik', $data);
/* End Jadwal Akademik ------------------------------------------------------------------*/ }
// Show Jadwal On Dashboard
public function showJadwalAkademik() {
if ($_GET['id_kelas'] && $_GET['tahun_ajaran'] && $_GET['semester'] !== null) {

$id_kelas     = $_GET['id_kelas'];
$tahun_ajaran = $_GET['tahun_ajaran'];
$semester     = $_GET['semester'];

/***
 | ---------------------
 | A1.
 | Get data bedasarkan id_kelas di tabel kelas
 | ---------------------
 | A2.
 | Get data jadwal bedasarkan tahun ajaran, semester, id_kelas
 | pada tabel jadwal_global
 | A3.
 | dapatkan id_jadwal_global untuk memanggil jadwal weekly
 | ---------------------
***/
// A1
$kelas = $this->db->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'") -> result_array();
foreach ($kelas as $value) {
  $data['kelas'] = $value['kelas_jurusan'];
};

// A2
$jaGlobal = $this->a_model->getJadwalGlobal($id_kelas, $tahun_ajaran, $semester);
if ($jaGlobal == false) {
    $data['tahun_ajaran'] = "Jadwal Ini Belum Tersedia";
    $data['semester']     = "Hubungi Administrator Untuk Konfirmasi";
    $this->load->view('private/admin/akademik/result/result_jadwal_akademik_unvalid', $data);
} else {
    foreach ($jaGlobal as $value) {
            $id_key               = $value['id_key']; // Get Data Jadwal Weekly
            $data['tahun_ajaran'] = $value['tahun_ajaran'];
            $data['semester']     = $value['semester'];
    };

    // A3
    $data['show_jadwal'] = $this->a_model->getJadwalWeekly($id_key);
    $this->load->view('private/admin/akademik/result/result_jadwal_akademik', $data);
}

} // End IF
// Default Return False
return false;
/* End GET VIEW JADWAL ------------------------------------------------------------------*/ }





















/* END Controller ---------------------------------------------------------------------*/  }