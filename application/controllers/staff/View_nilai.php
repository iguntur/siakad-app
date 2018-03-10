<?php

defined('BASEPATH') or exit('No direct script access allowed');

class View_nilai extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 2) {
			$this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
			redirect('login');
		}
	}

	public function index()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['nip'] = $this->session->userdata('nip');

		$this->load->view('private/staff/view_nilai_siswa', $data);
	}
}
