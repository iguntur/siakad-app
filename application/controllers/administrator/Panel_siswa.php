<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_siswa extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( $this->session->userdata('hak_akses') != 1 ) {
      $this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
      redirect( 'login' );
    }
  }

  // -----------------------------------------------------------------------
  // Functions index
  public function index() {
    // $data['siswa']     = $this -> a_model -> getSiswa();
    $data['kelas']        = $this -> a_model -> getKelas();
    $data['jurusan']      = $this -> a_model -> getJurusan();
    $data['tahun_ajaran'] = $this -> a_model -> getTahunAjaran();
    $data['siswa']        = $this -> a_model -> getUsers_join_siswa();
    $data['myAccount']    = $this->session->userdata('nama_awal');
    $this -> load -> view('private/admin/control_panel/kesiswaan/siswa_panel', $data);
  } /* End Index */


  // -----------------------------------------------------------------------
  // Functions Insert
  function insert() {
    $validations = array (
          array (
            'field'   =>  'nis',
            'label'   =>  'NIS',
            'rules'   =>  'required|trim'
            ),        

          array (
            'field'   =>  'nama_siswa',
            'label'   =>  'Nama Siswa',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'nama_ayah',
            'label'   =>  'Nama Ayah',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'nama_ibu',
            'label'   =>  'Nama Ibu',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'kelas',
            'label'   =>  'Kelas',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'tahun_ajaran',
            'label'   =>  'Tahun Ajaran',
            'rules'   =>  'required|trim'
            ),  

          array (
            'field'   =>  'ttl_location',
            'label'   =>  'TTL',
            'rules'   =>  'trim'
            ),      

          array (
            'field'   =>  'ttl_date',
            'label'   =>  'Tanggal Lahir',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'phone',
            'label'   =>  'No. HP',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'gender',
            'label'   =>  'Gender',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'golongan_darah',
            'label'   =>  'Golongan Darah',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'email',
            'label'   =>  'Email',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'agama',
            'label'   =>  'Agama',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'alamat',
            'label'   =>  'Alamat',
            'rules'   =>  'trim'
            )
    );


    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
        // Jika Ada Kesalahan Buka Ini
        redirect('administrator/panel_siswa');
    } else {
        // Cek NIS Jika Tersedia
        $nis_input = $this->input->post('nis');
        $status = $this->b_model->getAvailable_Nis($nis_input);
        if ($status == true) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Terjadi Kesalahan <br/> NIS Sudah Terpakai.')
                              .css('background', '#F1D70E')
                              .css('height', '62px')
                              .fadeIn(1000)
                              .delay(2000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/panel_siswa');
        } elseif ($status == false) {
            // Jika Semua Syarat Sudah Benar
            // Dan Tidak ada kesalahan
            // eksekusi perintah ini.
            $data_siswa = array (
                'nis'            => $this -> input -> post ('nis'),
                'id_user'        => $this -> input -> post ('nis'),
                'nama_siswa'     => $this -> input -> post ('nama_siswa'),
                'nama_ayah'      => $this -> input -> post ('nama_ayah'),
                'nama_ibu'       => $this -> input -> post ('nama_ibu'),
                'kelas'          => $this -> input -> post ('kelas'),
                'angkatan'       => $this -> input -> post ('tahun_ajaran'),
                'ttl_location'   => $this -> input -> post ('ttl_location'),
                'ttl_date'       => $this -> input -> post ('ttl_date'),
                'phone'          => $this -> input -> post ('phone'),
                'gender'         => $this -> input -> post ('gender'),
                'golongan_darah' => $this -> input -> post ('golongan_darah'),
                'email'          => $this -> input -> post ('email'),
                'agama'          => $this -> input -> post ('agama'),
                'alamat'         => $this -> input -> post ('alamat')
            );

            $password_default = md5("admin");
            $hak_akses        = 3;
            $data_user   = array (
                'id_user'      => $this -> input -> post ('nis'),
                'nama_user'    => $this -> input -> post ('nama_siswa'),
                'hak_akses'    => $hak_akses,
                'password'     => $password_default
              );

            $insert_siswa = $this -> a_model -> QueryInsert ('tabel_siswa', $data_siswa);

            if ($insert_siswa == TRUE) {
              $insert_user  = $this -> a_model -> QueryInsert ('users', $data_user);
              $this->session->set_flashdata("notif_result",
              "<script type='text/javascript'>
                              $('.result').html('Insert Success!!!')
                                  .fadeIn(1000)
                                  .delay(1000)
                                  .fadeOut(1000)
              </script>");
              redirect('administrator/panel_siswa');
            } else {
              $this->session->set_flashdata("notif_result",
              "<script type='text/javascript'>
                              $('.result').html('Insert Failed!!!')
                                  .fadeIn(1000)
                                  .delay(1000)
                                  .fadeOut(1000)
              </script>");
              redirect('administrator/panel_siswa');
            }
        }
      }
  } /* End Insert */


  // -----------------------------------------------------------------------
  // Functions Update
  function update( $id_siswa = NULL ) {
    $data['myAccount'] = $this->session->userdata('nama_awal');
    $data['users']    = $this -> a_model -> getUsers();
    $data['pengajar'] = $this -> a_model -> getPengajar();
    $data['siswa']    = $this -> a_model -> getSiswa();
    $id_to_update     = $id_siswa;

    $validations = array (
          array (
            'field'   =>  'nis',
            'label'   =>  'NIS',
            'rules'   =>  'required|trim'
            ),        

          array (
            'field'   =>  'nama_siswa',
            'label'   =>  'Nama Siswa',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'nama_ayah',
            'label'   =>  'Nama Ayah',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'nama_ibu',
            'label'   =>  'Nama Ibu',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'kelas',
            'label'   =>  'Kelas',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'tahun_angkatan',
            'label'   =>  'Tahun Angkatan / Ajaran',
            'rules'   =>  'required|trim'
            ),


          array (
            'field'   =>  'ttl_location',
            'label'   =>  'TTL',
            'rules'   =>  'trim'
            ),      

          array (
            'field'   =>  'ttl_date',
            'label'   =>  'Tanggal Lahir',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'phone',
            'label'   =>  'No. HP',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'gender',
            'label'   =>  'Gender',
            'rules'   =>  'required|trim'
            ),

          array (
            'field'   =>  'golongan_darah',
            'label'   =>  'Golongan Darah',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'email',
            'label'   =>  'Email',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'agama',
            'label'   =>  'Agama',
            'rules'   =>  'trim'
            ),

          array (
            'field'   =>  'alamat',
            'label'   =>  'Alamat',
            'rules'   =>  'trim'
            )
      );
    $this->form_validation->set_rules($validations);
    if ($this->form_validation -> run() == FALSE) {
      // Jika Ada Kesalahan Buka Ini
      redirect('administrator/panel_siswa');
    } else {
      // Jika Tidak ada kesalahan, eksekusi perintah ini...
        $data_valid = array (
            'nis'            => $this -> input -> post ('nis'),
            'nama_siswa'     => $this -> input -> post ('nama_siswa'),
            'nama_ayah'      => $this -> input -> post ('nama_ayah'),
            'nama_ibu'       => $this -> input -> post ('nama_ibu'),
            'kelas'          => $this -> input -> post ('kelas'),
            'angkatan'       => $this -> input -> post ('tahun_angkatan'),
            'ttl_location'   => $this -> input -> post ('ttl_location'),
            'ttl_date'       => $this -> input -> post ('ttl_date'),
            'phone'          => $this -> input -> post ('phone'),
            'gender'         => $this -> input -> post ('gender'),
            'golongan_darah' => $this -> input -> post ('golongan_darah'),
            'email'          => $this -> input -> post ('email'),
            'agama'          => $this -> input -> post ('agama'),
            'alamat'         => $this -> input -> post ('alamat')
          );
        $where = array('id_siswa' => $id_to_update);

        $update = $this -> a_model -> QueryUpdate ('tabel_siswa', $data_valid, $where);
        
        if ($update == TRUE) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/panel_siswa');
        } else {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Update Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/panel_siswa');
        }
      }

    } /* End Update */


  // -----------------------------------------------------------------------
  // Functions Delete
  function delete( $id_siswa = NULL ) {
    // Validation Data
    $id_user        = $this->input->post('id_user');
    $where_id_user  = array('id_user'  => $id_user);

    $where_id_siswa = array('id_siswa' => $id_siswa);
    $delete_from_siswa = $this -> a_model -> QueryDelete ('tabel_siswa', $where_id_siswa);

    if ($delete_from_siswa == TRUE) {
      $delete_from_user = $this -> a_model -> QueryDelete ('users', $where_id_user);
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/panel_siswa');
    } else {
      $this->session->set_flashdata("notif_result",
      "<script type='text/javascript'>
                      $('.result').html('Delete Failed!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>");
      redirect('administrator/panel_siswa');
      // echo "Delete Gagal";
    }
  }

  public function cekNis() {
    $input_nis = $_GET['nis'];
    $status = $this->b_model->getAvailable_Nis($input_nis);
    if ($status == true) {
      // Not Available
      echo "failed";
    } else {
      // Available
      echo "succes";
    }
  }

}
/* End of file panel_siswa.php */
/* Location: ./application/controllers/administrator/panel_siswa.php */
