<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (! $this->session->userdata('username')) {
			$this->session->set_flashdata('error', 'Please, Login!!!');
			redirect('login');
		}

		// Load Libarary and Helper
		$this->load->library('form_validation');
		$this->load->helper(['form', 'url', 'file']);

		// Load Model
		// $this->load->model('el_model');
		$this->load->model('a_model');
		$this->load->model('b_model');
	}
}
