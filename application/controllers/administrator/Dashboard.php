<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 1) {
			$this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");

			return redirect('login');
		}
	}

	public function index()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');

		$this->load->view('private/admin/dashboard', $data);
	}

	public function jadwal_akademik()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$data['kelas_jurusan'] = $this->a_model->getKelas();

		$this->load->view('private/admin/akademik/view_jadwal_akademik', $data);
	}
}
