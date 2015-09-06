<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
/*------------------------------------------------------------------*/
public function __construct() {
parent::__construct();
if ( $this->session->userdata('hak_akses') != 1 ) {
  $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
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
 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/admin/dashboard', $data);
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
$this->load->view('private/admin/akademik/view_jadwal_akademik', $data);
/* End Jadwal Akademik ------------------------------------------------------------------*/ }






















/* End Dashboard Class Controller ------------------------------------------------------------------*/ }