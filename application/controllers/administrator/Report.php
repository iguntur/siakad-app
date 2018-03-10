<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 1) {
			$this->session->set_flashdata('error', "<script> alert('Anda Bukan Adminstrator'); </script> ");
			redirect('login');
		}
	}

	public function index()
	{
		redirect('administrator/report/siswa');
	}

	public function siswa()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['tahun_angkatan'] = $this->a_model->getTahunAjaran();

		if (! isset($_POST['tahun_angkatan'])) {
			$data['filter'] = 'Pilih Angkatan';
			$data['siswa'] = $this->a_model->joinKelas_tabSiswa_tabPengajar($data['filter']);
			$this->load->view('private/admin/report/siswa', $data);
		} else {
			$data['filter'] = $this->input->post('tahun_angkatan');
			$data['siswa'] = $this->a_model->joinKelas_tabSiswa_tabPengajar($data['filter']);

			$this->load->view('private/admin/report/siswa', $data);
		}
	}

	public function nilai($param = null)
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');

		if ($param == null) {
			redirect('administrator/report');
		}

		$data['nis'] = $param;
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$data['siswa'] = $this->a_model->getBySiswa($data['nis']);

		foreach ($data['siswa'] as $value) {
			$no_nis = $value['nis'] . '<br>';
			$tahun_ajaran = $value['angkatan'];
		}

		// Get Data from tabel nilai
		// $data['nilai_siswa'] = $this -> a_model -> getNilai_for_report($no_nis, $tahun_ajaran);

		$this->load->view('private/admin/report/nilai_siswa', $data);
	}

	public function getNilai()
	{
		if (empty($_GET['id'])) {
			echo 'Please Filter!!!';
		} else {
			$id = $_GET['id'];
			$ta = $_GET['ta'];
			$str = $_GET['str'];

			$data['nilai_siswa'] = $this->a_model->getNilai_to_siswa($id, $ta, $str);

			if ($data['nilai_siswa'] == false) {
				$this->load->view('private/admin/report/result/nilai_unavailable');
			} else {
				$this->load->view('private/admin/report/result/nilai_available', $data);
			}
		}
	}
}
