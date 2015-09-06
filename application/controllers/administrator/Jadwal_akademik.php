<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_akademik extends MY_Controller {
/*------------------------------------------------------------------*/
public function __construct() {
parent::__construct();
if ( $this->session->userdata('hak_akses') != 1 ) {
  $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
  redirect( 'login' );
}
/* End Construct ------------------------------------------------------------------*/ }
// Index Page
public function index() {
/*
 | Data Session
 | -----------------
 | Account Name
 | Mete Title
 | Parameter
 | -----------------
*/
$data['myAccount'] = $this->session->userdata('nama_awal');
$data['titlebar']  = "SETUP | Jadwal Akademik";

/*
 | Call Model Database
 | -----------------
 | Table tahun ajaran
 | Table Kelas
 | -----------------
*/
// $data['kelas']        = $this -> a_model -> getTabPengajar_join_kelas();
$data['tahun_ajaran'] = $this -> a_model -> getTahunAjaran();
$data['kelas10']      = $this -> a_model -> getKelas10();
$data['kelas11']      = $this -> a_model -> getKelas11();
$data['kelas12']      = $this -> a_model -> getKelas12();


/*
 | -----------------
 | Parse All Data To template
 | -----------------
*/
$this->load->view('private/admin/akademik/select_kelas_for_setup', $data);
/* End Index ------------------------------------------------------------------*/ }
// Setup Page
public function setup() {
/*
 | Global Data Session
 | -----------------
 | Account Name
 | Mete Title
 | Parameter
 | -----------------
*/
$data['myAccount']   = $this->session->userdata('nama_awal');
$data['titlebar']    = "SETUP | Jadwal Akademik";
$data['newsetupbar'] = "SETUP | New Jadwal Akademik";
$data['updatebar']   = "SETUP | Update Jadwal Akademik";

/*
 | Global A_Model
 | --------------------
 | Load Mata Pelajaran
 | Load Jam Mengajar
 | --------------------
*/
$data['getMapel']    = $this->a_model->getMapel();
$data['getJamMengajar'] = $this->a_model->getJamMengajar();

/*
 | Validasi Form Input
 | Jika Form Input Kosong
 | Redirect Ke index select jadwal
*/
$this->form_validation->set_rules('id_kelas', 'ID', 'trim|required');
$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'trim|required');
$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
// Statement jika false / kosong
if ($this->form_validation -> run() == FALSE) {
  redirect('administrator/jadwal_akademik');
}

/*
 | Get Data Input Post
 | -----------------
 | Input IDKelas from param
 | Input tahun ajaran
 | Input Kelas
 | -----------------
*/
$IDKelas      = $this->input->post('id_kelas');
$tahun_ajaran = $this->input->post('tahun_ajaran');
$semester     = $this->input->post('semester');

/*
 | Get Data From Database
 | A_model
 | Tabel Jadwal Global
 | -----------------
 | Where = IDKelas
 | Where = tahun_ajaran
 | Where = semester
 | -----------------
*/
$data['jadwal_akademik'] = $this->a_model->getJadwalGlobal($IDKelas, $tahun_ajaran, $semester);
if ($data['jadwal_akademik'] == false) {
  // IF Statement 01
  // Jika Data Belum Tersedia
  // Insert New Data Ke Tabel Jadwal Global
  $dataInsert = array(
                'id_kelas'     => $IDKelas,
                'tahun_ajaran' => $tahun_ajaran,
                'semester'     => $semester
  );

  // Proses insert ke tabel database
  $insert_into_jadwal_global = $this->a_model->QueryInsert('jadwal_global', $dataInsert);  // <- jadwal_global = nama table di database

  // Berikan statement
  // Dari kondisi proses
  if ($insert_into_jadwal_global) {
  /*
   | IF Statement 01.A1
   | Type Boolean, default = true
   | Jika Proses Insert Berhasil
   | Panggil kembali data yang telah
   | di insert ke dalam database
   | sesuai dengan variable yang ditentukan
  */
        $var_dd = $this->a_model->getJadwalGlobal($IDKelas, $tahun_ajaran, $semester);
        /*
         | Dapatkan ID_key dari tabel jadwal_global
         | For Insert to tabel jadwal_weekly
         | for call data jadwal_weekly
        */
        foreach ($var_dd as $field) {
                $data['ID_Key']      = $field['id_key'];
                $data['ID_Kelas']    = $field['id_kelas'];
                $data['TahunAjaran'] = $field['tahun_ajaran'];
                $data['Semester']    = $field['semester'];
        } // End foreach from $var_dd

        /*
         | Load View
         | Parse Variable $data to template view
        */
        $this->load->view('private/admin/akademik/new_setup_jadwal_weekly', $data);
  } // End IF Statement 01.A1 | No Else 01.A1

} else {
  // Else Statement 01
  // Jika Data Telah Tersedia
    // echo "<h3>Tabel Jadwal Global | Akademik</h3><hr>";
    $var_global = $data['jadwal_akademik'];
    foreach ($var_global as $field) {
            $data['ID_Key']      = $field['id_key'];
            $data['ID_Kelas']    = $field['id_kelas'];
            $data['TahunAjaran'] = $field['tahun_ajaran'];
            $data['Semester']    = $field['semester'];
    } // End foreach from $var_global

    // Load A_model and get database jadwal_weekly
    // jadwal_weekly join jadwal_global
    $data['jadwalWeekly'] = $this->a_model->getJadwalWeekly($data['ID_Key']);

    /*
     | -----------------
     | Parse All Data To template
     | -----------------
    */
    $this->load->view('private/admin/akademik/update_setup_jadwal_weekly', $data);

} // ==> End For IF & Else 01

/* End Setup ------------------------------------------------------------------*/ }

// Insert Function
public function insert() {
// Data Session
$data['myAccount'] = $this->session->userdata('nama_awal');

/*
 | --------------------------------
 | Get Data Form Input Post
 | --------------------------------
 | Validation Form Input
 | Kemudian Simpan Ke database
 | --------------------------------
*/
$this->form_validation->set_rules('ID_Key[]'            , 'ID_KEY'       , 'trim|required');
$this->form_validation->set_rules('getJamMengajar[]'    , 'Jam Mengajar' , 'trim');
$this->form_validation->set_rules('getMapelSenin[]'     , 'Hari Senin'   , 'trim');
$this->form_validation->set_rules('getMapelSelasa[]'    , 'Hari Selasa'  , 'trim');
$this->form_validation->set_rules('getMapelRabu[]'      , 'Hari Rabu'    , 'trim');
$this->form_validation->set_rules('getMapelKamis[]'     , 'Hari Kamis'   , 'trim');
$this->form_validation->set_rules('getMapelJumat[]'     , 'Hari Jumat'   , 'trim');
$this->form_validation->set_rules('getMapelSabtu[]'     , 'Hari Sabtu'   , 'trim');

/*
 | Jika ada validasi yang tidak memenuhi syarat
 | Perintah ini akan dieksekusi
 | jika tidak ada kesalahan,
 | perintah ini tidak akan eksekusi
*/
if ($this->form_validation->run() == FALSE) {
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
                    $('.result').html('Terjadi Kesalahan Validasi Form!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>");
    redirect('administrator/jadwal_akademik');
}

/*
 | Proses Insert Into Database
 | Simpan ke dalam tabel jadwal weekly
*/
$ID_Key = $this->input->post('ID_Key');
$result = array();

// Get input post dalam bentuk array
// Untuk disimpan ke dalam database
foreach ($ID_Key as $key => $value) {
        $result[] = array (
                    'id_key' => $_POST['ID_Key'][$key],
                    'jam_ke' => $_POST['getJamMengajar'][$key],
                    'senin'  => $_POST['getMapelSenin'][$key],
                    'selasa' => $_POST['getMapelSelasa'][$key],
                    'rabu'   => $_POST['getMapelRabu'][$key],
                    'kamis'  => $_POST['getMapelKamis'][$key],
                    'jumat'  => $_POST['getMapelJumat'][$key],
                    'sabtu'  => $_POST['getMapelSabtu'][$key]
        );
}

// Eksekusi insert into database
// tabel jadwal weekly
$insert     = $this -> db -> insert_batch('jadwal_weekly', $result);
            // IF Statement
            if($insert) {
              // Jika Proses Insert Berhasil
              $this->session->set_flashdata("notif_result",
              "<script type='text/javascript'>
                              $('.result').html('Insert Success!!!')
                                  .fadeIn(1000)
                                  .delay(1000)
                                  .fadeOut(1000)
              </script>");
              redirect('administrator/jadwal_akademik');
            } else {
              // Jika Proses Insert Gagal
              $this->session->set_flashdata("notif_result",
              "<script type='text/javascript'>
                              $('.result').html('Insert Failed!!!')
                                  .fadeIn(1000)
                                  .delay(1000)
                                  .fadeOut(1000)
              </script>");
              redirect('administrator/jadwal_akademik');
            }
// Proses FIX
/* End Insert ------------------------------------------------------------------*/ }
// Update Function
public function update() {
$data['myAccount'] = $this->session->userdata('nama_awal');

/*
 | --------------------------------
 | Get Data Form Input Post
 | --------------------------------
 | Validation Form Input
 | Kemudian Simpan Ke database
 | --------------------------------
*/
$this->form_validation->set_rules('ID_Key[]'            , 'ID_KEY'       , 'trim|required');
$this->form_validation->set_rules('getJamMengajar[]'    , 'Jam Mengajar' , 'trim');
$this->form_validation->set_rules('getMapelSenin[]'     , 'Hari Senin'   , 'trim');
$this->form_validation->set_rules('getMapelSelasa[]'    , 'Hari Selasa'  , 'trim');
$this->form_validation->set_rules('getMapelRabu[]'      , 'Hari Rabu'    , 'trim');
$this->form_validation->set_rules('getMapelKamis[]'     , 'Hari Kamis'   , 'trim');
$this->form_validation->set_rules('getMapelJumat[]'     , 'Hari Jumat'   , 'trim');
$this->form_validation->set_rules('getMapelSabtu[]'     , 'Hari Sabtu'   , 'trim');

/*
 | Jika ada validasi yang tidak memenuhi syarat
 | Perintah ini akan dieksekusi
 | jika tidak ada kesalahan,
 | perintah ini tidak akan eksekusi
*/
if ($this->form_validation->run() == FALSE) {
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
                    $('.result').html('Terjadi Kesalahan Validasi Form!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>");
    redirect('administrator/jadwal_akademik');
}

/*
 | -----------------------------
 | Hapus row dari tabel jadwal_weekly
 | berdasarkan id_key dan
 | update dengan update yang baru
 | -----------------------------
*/
$id_key = $this->input->post('ID_Key');
$x = $id_key[0];
$where = array('id_key' => $x);
// Perintah / eksekusi
$eks_del = $this->a_model->QueryDelete('jadwal_weekly', $where);

/*
 | Jika proses eksekusi $eks_del berhasil
 | Selanjutnya proses insert ke dalam tabel jadwal_weekly
*/
if($eks_del == true) {
  /*
  | IF Statement jika
  | perintah $eks_del berhasil
  */
  $ID_Key = $this->input->post('ID_Key');
  $result = array();

  // Get input post dalam bentuk array
  // Untuk disimpan ke dalam database
  foreach ($ID_Key as $key => $value) {
          $result[] = array (
                      'id_key' => $_POST['ID_Key'][$key],
                      'jam_ke' => $_POST['getJamMengajar'][$key],
                      'senin'  => $_POST['getMapelSenin'][$key],
                      'selasa' => $_POST['getMapelSelasa'][$key],
                      'rabu'   => $_POST['getMapelRabu'][$key],
                      'kamis'  => $_POST['getMapelKamis'][$key],
                      'jumat'  => $_POST['getMapelJumat'][$key],
                      'sabtu'  => $_POST['getMapelSabtu'][$key]
          );
  }

  // Eksekusi update/insert into database
  // tabel jadwal weekly
  $update     = $this -> db -> insert_batch('jadwal_weekly', $result);
              // IF Statement
              if($update) {
                // Jika Proses Update/Insert Berhasil
                $this->session->set_flashdata("notif_result",
                "<script type='text/javascript'>
                                $('.result').html('Update Success!!!')
                                    .fadeIn(1000)
                                    .delay(1000)
                                    .fadeOut(1000)
                </script>");
                redirect('administrator/jadwal_akademik');
              } else {
                // Jika Proses Update/Insert Gagal
                $this->session->set_flashdata("notif_result",
                "<script type='text/javascript'>
                                $('.result').html('Update Failed!!!')
                                    .fadeIn(1000)
                                    .delay(1000)
                                    .fadeOut(1000)
                </script>");
                redirect('administrator/jadwal_akademik');
              }
} else {
  /*
  | Else Statement jika
  | perintah $eks_del Gagal
  | Maka perintah update data juga tidak akan di proses
  | nilai dari ini dikembalikan ke halaman setup jadwal
  */
  $this->session->set_flashdata("notif_result",
  "<script type='text/javascript'>
                  $('.result').html('Terjadi Kesalahan Proses Update Data!!!')
                      .fadeIn(1000)
                      .delay(1000)
                      .fadeOut(1000)
  </script>");
  redirect('administrator/jadwal_akademik');
}
/* End Update ------------------------------------------------------------------*/ }
// Delete Function
public function delete($id_key) {
$data['myAccount'] = $this->session->userdata('nama_awal');

$where = array('id_key' => $id_key);
$delete_jadwal_global = $this->a_model->QueryDelete('jadwal_global', $where);

if ($delete_jadwal_global) {
    $this->a_model->QueryDelete('jadwal_weekly', $where);
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
                    $('.result').html('Delete Success!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>");
    redirect('administrator/jadwal_akademik');
} else {
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
                    $('.result').html('Delete Failed!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>");
    redirect('administrator/jadwal_akademik');
}
/* End Delete ------------------------------------------------------------------*/ }
// Auth_Delete Function
public function auth_del() {
if (isset($_GET['id']) === true ) {

    $x = $_GET['id'];

    $where = array('id_primary' => $x);
    $tabel_name = 'jadwal_weekly';

    // Proses Delete
    $delete = $this->a_model->QueryDelete($tabel_name, $where);
    // If Statement (Conditional)
    if ($delete) {
      // If - Is true
        echo " <strong> Delete Success!!! </strong>";
        // $this->session->set_flashdata("notif_update" , "<script> alert('Hapus Jadwal Akademik Sukses'); </script>");
        // redirect('administrator/jadwal_akademik');
    } else {
      // If is false
        echo " <strong> Delete Failed!!! </strong>";
        // $this->session->set_flashdata("notif_update" , "<script> alert('Gagal Menghapus Jadwal'); </script>");
        // redirect('administrator/jadwal_akademik');
    }
}
return false;
/* End Delete ------------------------------------------------------------------*/ }
// Show Jadwal On Dashboard
public function showJadwalAkademik() {
if ($_GET['id_kelas'] != null) {

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
    $data['semester']     = "Silahkan Di Setup Terlebih Dahulu &nbsp; || &nbsp;<a href='administrator/jadwal_akademik'>Setup Jadwal</a>";
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





/* End of file Jadwal_akademik.php */
/*------------------------------------------------------------------*/ }
/* Location: ./application/controllers/administrator/Jadwal_akademik.php */
