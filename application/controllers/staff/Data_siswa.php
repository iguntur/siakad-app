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
if ($var_a == false) {
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
              $('.result').css('height', '100px').html('Oppss... <br/> Menu Ini Hanya Untuk <br/> Wali Kelas')
                  .fadeIn(1000)
                  .delay(2000)
                  .fadeOut(1000)
    </script>");
    redirect( 'staff/dashboard' );
} else {
    foreach ($var_a as $value) {
      $var_class = $value['kelas_jurusan'];
    }
    // Data As Wali Kelas
    $ndata = $this->a_model->showMydataAsWaliKelas($data['nip']);
    $data['wali_kelas'] = $ndata[0];

    // Get Siswa By $var_class
    $data['siswa_in_class'] = $this->db->query(" SELECT * FROM tabel_siswa WHERE kelas = '$var_class' ") -> result_array();
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