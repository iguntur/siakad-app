<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_akademik extends MY_Controller
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
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['titlebar'] = 'SETUP | Jadwal Akademik';

		// $data['kelas'] = $this->a_model->getTabPengajar_join_kelas();
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$data['kelas10'] = $this->a_model->getKelas10();
		$data['kelas11'] = $this->a_model->getKelas11();
		$data['kelas12'] = $this->a_model->getKelas12();

		$this->load->view('private/admin/akademik/select_kelas_for_setup', $data);
	}

	public function setup()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['titlebar'] = 'SETUP | Jadwal Akademik';
		$data['newsetupbar'] = 'SETUP | New Jadwal Akademik';
		$data['updatebar'] = 'SETUP | Update Jadwal Akademik';

		$data['getMapel'] = $this->a_model->getMapel();
		$data['getJamMengajar'] = $this->a_model->getJamMengajar();

		$this->form_validation->set_rules('id_kelas', 'ID', 'trim|required');
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'trim|required');
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required');

		if ($this->form_validation->run() == false) {
			redirect('administrator/jadwal_akademik');
		}

		$IDKelas = $this->input->post('id_kelas');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$semester = $this->input->post('semester');

		$data['jadwal_akademik'] = $this->a_model->getJadwalGlobal($IDKelas, $tahun_ajaran, $semester);

		if ($data['jadwal_akademik'] == false) {
			$dataInsert = [
				'id_kelas' => $IDKelas,
				'tahun_ajaran' => $tahun_ajaran,
				'semester' => $semester,
			];

			$insert_into_jadwal_global = $this->a_model->QueryInsert('jadwal_global', $dataInsert);  // <- jadwal_global = nama table di database

			// Berikan statement
			// Dari kondisi proses
			if ($insert_into_jadwal_global) {
				$var_dd = $this->a_model->getJadwalGlobal($IDKelas, $tahun_ajaran, $semester);

				foreach ($var_dd as $field) {
					$data['ID_Key'] = $field['id_key'];
					$data['ID_Kelas'] = $field['id_kelas'];
					$data['TahunAjaran'] = $field['tahun_ajaran'];
					$data['Semester'] = $field['semester'];
				}

				$this->load->view('private/admin/akademik/new_setup_jadwal_weekly', $data);
			}
		} else {
			$var_global = $data['jadwal_akademik'];

			foreach ($var_global as $field) {
				$data['ID_Key'] = $field['id_key'];
				$data['ID_Kelas'] = $field['id_kelas'];
				$data['TahunAjaran'] = $field['tahun_ajaran'];
				$data['Semester'] = $field['semester'];
			}

			$data['jadwalWeekly'] = $this->a_model->getJadwalWeekly($data['ID_Key']);

			$this->load->view('private/admin/akademik/update_setup_jadwal_weekly', $data);
		}
	}

	public function insert()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');

		$this->form_validation->set_rules('ID_Key[]', 'ID_KEY', 'trim|required');
		$this->form_validation->set_rules('getJamMengajar[]', 'Jam Mengajar', 'trim');
		$this->form_validation->set_rules('getMapelSenin[]', 'Hari Senin', 'trim');
		$this->form_validation->set_rules('getMapelSelasa[]', 'Hari Selasa', 'trim');
		$this->form_validation->set_rules('getMapelRabu[]', 'Hari Rabu', 'trim');
		$this->form_validation->set_rules('getMapelKamis[]', 'Hari Kamis', 'trim');
		$this->form_validation->set_rules('getMapelJumat[]', 'Hari Jumat', 'trim');
		$this->form_validation->set_rules('getMapelSabtu[]', 'Hari Sabtu', 'trim');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata(
				'notif_result',
				"<script type='text/javascript'>
					$('.result').html('Terjadi Kesalahan Validasi Form!!!')
					.fadeIn(1000)
					.delay(1000)
					.fadeOut(1000)
				</script>"
			);

			redirect('administrator/jadwal_akademik');
		}

		$ID_Key = $this->input->post('ID_Key');
		$result = [];

		foreach ($ID_Key as $key => $value) {
			$result[] = [
				'id_key' => $_POST['ID_Key'][$key],
				'jam_ke' => $_POST['getJamMengajar'][$key],
				'senin' => $_POST['getMapelSenin'][$key],
				'selasa' => $_POST['getMapelSelasa'][$key],
				'rabu' => $_POST['getMapelRabu'][$key],
				'kamis' => $_POST['getMapelKamis'][$key],
				'jumat' => $_POST['getMapelJumat'][$key],
				'sabtu' => $_POST['getMapelSabtu'][$key],
			];
		}

		$insert = $this->db->insert_batch('jadwal_weekly', $result);

		if ($insert) {
			$this->session->set_flashdata(
				'notif_result',
				"<script type='text/javascript'>
				$('.result').html('Insert Success!!!')
					.fadeIn(1000)
					.delay(1000)
					.fadeOut(1000)
				</script>"
			);

			redirect('administrator/jadwal_akademik');
		} else {
			// Jika Proses Insert Gagal
			$this->session->set_flashdata(
				'notif_result',
				"<script type='text/javascript'>
					$('.result').html('Insert Failed!!!')
						.fadeIn(1000)
						.delay(1000)
						.fadeOut(1000)
				</script>"
			);

			redirect('administrator/jadwal_akademik');
		}
	}

	public function update()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');

		$this->form_validation->set_rules('ID_Key[]', 'ID_KEY', 'trim|required');
		$this->form_validation->set_rules('getJamMengajar[]', 'Jam Mengajar', 'trim');
		$this->form_validation->set_rules('getMapelSenin[]', 'Hari Senin', 'trim');
		$this->form_validation->set_rules('getMapelSelasa[]', 'Hari Selasa', 'trim');
		$this->form_validation->set_rules('getMapelRabu[]', 'Hari Rabu', 'trim');
		$this->form_validation->set_rules('getMapelKamis[]', 'Hari Kamis', 'trim');
		$this->form_validation->set_rules('getMapelJumat[]', 'Hari Jumat', 'trim');
		$this->form_validation->set_rules('getMapelSabtu[]', 'Hari Sabtu', 'trim');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata(
		'notif_result',
	"<script type='text/javascript'>
                    $('.result').html('Terjadi Kesalahan Validasi Form!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>"
	);
			redirect('administrator/jadwal_akademik');
		}

		$id_key = $this->input->post('ID_Key');
		$x = $id_key[0];
		$where = ['id_key' => $x];
		// Perintah / eksekusi
		$eks_del = $this->a_model->QueryDelete('jadwal_weekly', $where);

		if ($eks_del == true) {
			$ID_Key = $this->input->post('ID_Key');
			$result = [];

			foreach ($ID_Key as $key => $value) {
				$result[] = [
					  'id_key' => $_POST['ID_Key'][$key],
					  'jam_ke' => $_POST['getJamMengajar'][$key],
					  'senin' => $_POST['getMapelSenin'][$key],
					  'selasa' => $_POST['getMapelSelasa'][$key],
					  'rabu' => $_POST['getMapelRabu'][$key],
					  'kamis' => $_POST['getMapelKamis'][$key],
					  'jumat' => $_POST['getMapelJumat'][$key],
					  'sabtu' => $_POST['getMapelSabtu'][$key],
		  ];
			}

			$update = $this->db->insert_batch('jadwal_weekly', $result);

			if ($update) {
				$this->session->set_flashdata(
					'notif_result',
				"<script type='text/javascript'>
                                $('.result').html('Update Success!!!')
                                    .fadeIn(1000)
                                    .delay(1000)
                                    .fadeOut(1000)
                </script>"
				);
				redirect('administrator/jadwal_akademik');
			} else {
				$this->session->set_flashdata(
					'notif_result',
				"<script type='text/javascript'>
                                $('.result').html('Update Failed!!!')
                                    .fadeIn(1000)
                                    .delay(1000)
                                    .fadeOut(1000)
                </script>"
				);
				redirect('administrator/jadwal_akademik');
			}
		} else {
			$this->session->set_flashdata(
	  'notif_result',
  "<script type='text/javascript'>
                  $('.result').html('Terjadi Kesalahan Proses Update Data!!!')
                      .fadeIn(1000)
                      .delay(1000)
                      .fadeOut(1000)
  </script>"
  );
			redirect('administrator/jadwal_akademik');
		}
	}

	public function delete($id_key)
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');

		$where = ['id_key' => $id_key];
		$delete_jadwal_global = $this->a_model->QueryDelete('jadwal_global', $where);

		if ($delete_jadwal_global) {
			$this->a_model->QueryDelete('jadwal_weekly', $where);
			$this->session->set_flashdata(
		'notif_result',
	"<script type='text/javascript'>
                    $('.result').html('Delete Success!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>"
	);
			redirect('administrator/jadwal_akademik');
		} else {
			$this->session->set_flashdata(
		'notif_result',
	"<script type='text/javascript'>
                    $('.result').html('Delete Failed!!!')
                        .fadeIn(1000)
                        .delay(1000)
                        .fadeOut(1000)
    </script>"
	);
			redirect('administrator/jadwal_akademik');
		}
	}

	public function auth_del()
	{
		if (isset($_GET['id']) === true) {
			$x = $_GET['id'];

			$where = ['id_primary' => $x];
			$tabel_name = 'jadwal_weekly';

			$delete = $this->a_model->QueryDelete($tabel_name, $where);

			if ($delete) {
				echo ' <strong> Delete Success!!! </strong>';
			// $this->session->set_flashdata("notif_update" , "<script> alert('Hapus Jadwal Akademik Sukses'); </script>");
				// redirect('administrator/jadwal_akademik');
			} else {
				echo ' <strong> Delete Failed!!! </strong>';
				// $this->session->set_flashdata("notif_update" , "<script> alert('Gagal Menghapus Jadwal'); </script>");
				// redirect('administrator/jadwal_akademik');
			}
		}

		return false;
	}

	public function showJadwalAkademik()
	{
		if ($_GET['id_kelas'] != null) {
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
				$data['semester'] = "Silahkan Di Setup Terlebih Dahulu &nbsp; || &nbsp;<a href='administrator/jadwal_akademik'>Setup Jadwal</a>";
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
