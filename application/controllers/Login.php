<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('el_model');

    if ($this->session->userdata('hak_akses') == 1) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Oops, Anda Sudah Login!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('administrator/dashboard');
    } elseif ($this->session->userdata('hak_akses') == 2) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Oops, Anda Sudah Login!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('staff/dashboard');
    } elseif ($this->session->userdata('hak_akses') == 3) {
          $this->session->set_flashdata("notif_result",
          "<script type='text/javascript'>
                          $('.result').html('Oops, Anda Sudah Login!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>");
          redirect('siswa/dashboard');
    }
  }

// ---------------------------------------------------
// Load Login
  
  public function index() {

    $data['title'] = "Login | Sistem Informasi Akademik";
    $this->load->view('_modules/login', $data);   
    
  }


// ---------------------------------------------------
// Validations Username & Password Login

  public function validations() {

    $this -> form_validation -> set_rules('username', 'User Name', 'trim|required');
    $this -> form_validation -> set_rules('password', 'Password', 'trim|required|md5');

    if ($this -> form_validation -> run() == FALSE) { 
          redirect('login');
    }
    
    else {
          $username     = set_value('username');
          $password     = set_value('password');
          $is_loggin    = $this->el_model->login($username, $password);
          if ($is_loggin == FALSE) {
                $this->session->set_flashdata('error', 'Salah Memasukkan Username atau Password');
                redirect ('login');
          }

          elseif($is_loggin == TRUE) {
                if ($this->session->userdata('hak_akses') == 1 ) {
                  redirect ('administrator/dashboard');
                }

                elseif ($this->session->userdata('hak_akses') == 2 ) {
                  redirect ('staff/dashboard');
                }

                elseif ($this->session->userdata('hak_akses') == 3 ) {
                  redirect ('siswa/dashboard');
                }
          }
    }

  } // ========================================================








/* End of file login.php */
/* Location: ./application/controllers/login.php */
}