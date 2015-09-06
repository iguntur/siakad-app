<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_nilai extends MY_Controller {
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
 | 
 | 
 | 
***/





 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/staff/view_nilai_siswa', $data);
/* End Index ------------------------------------------------------------------*/ }


/* End of file Data_siswa.php */
/* END Controller ---------------------------------------------------------------------*/  }
/* Location: ./application/controllers/staff/Data_siswa.php */