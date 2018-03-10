<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 3) {
			$this->session->set_flashdata('error', "<script> alert('Anda Bukan Siswa'); </script>");
			redirect('login');
		}
	}

	public function index()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['nis'] = $this->session->userdata('nis');

		$this->load->view('private/siswa/dashboard', $data);
	}

	public function jadwal_akademik()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$data['kelas_jurusan'] = $this->a_model->getKelas();

		$this->load->view('private/siswa/view_jadwal_akademik', $data);
	}

	public function showJadwalAkademik()
	{
		if ($_GET['id_kelas'] && $_GET['tahun_ajaran'] && $_GET['semester'] !== null) {
			$id_kelas = $_GET['id_kelas'];
			$tahun_ajaran = $_GET['tahun_ajaran'];
			$semester = $_GET['semester'];

			$kelas = $this->db->query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'")->result_array();

			foreach ($kelas as $value) {
				$data['kelas'] = $value['kelas_jurusan'];
			}

			$jaGlobal = $this->a_model->getJadwalGlobal($id_kelas, $tahun_ajaran, $semester);

			if ($jaGlobal == false) {
				$data['tahun_ajaran'] = 'Jadwal Ini Belum Tersedia';
				$data['semester'] = 'Hubungi Administrator Untuk Konfirmasi';
				$this->load->view('private/admin/akademik/result/result_jadwal_akademik_unvalid', $data);
			} else {
				foreach ($jaGlobal as $value) {
					$id_key = $value['id_key']; // Get Data Jadwal Weekly
					$data['tahun_ajaran'] = $value['tahun_ajaran'];
					$data['semester'] = $value['semester'];
				}

				$data['show_jadwal'] = $this->a_model->getJadwalWeekly($id_key);
				$this->load->view('private/admin/akademik/result/result_jadwal_akademik', $data);
			}
		}

		return false;
	}
}
