<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
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
		$data['admin'] = $this->session->userdata('id_admin');
		$data['users'] = $this->a_model->get_by_Users($data['admin']);
		$this->load->view('private/admin/setting', $data);
	}

	public function changes()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['admin'] = $this->session->userdata('id_admin');
		$data['users'] = $this->a_model->get_by_Users($data['admin']);

		$id_to_update = $this->input->post('id_user');

		$validations = [
		  [
			'field' => 'id_user',
			'label' => 'ID User',
			'rules' => 'required|trim',
			],

		  [
			'field' => 'account',
			'label' => 'Account Name',
			'rules' => 'required|trim',
			],

		  [
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|trim',
			],

		  [
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|md5',
			],
	  ];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			// Jika Ada Kesalahan Buka Ini
			$this->load->view('private/admin/setting', $data);
		} else {
			// Jika Tidak ada kesalahan, eksekusi perintah ini...
			// Cek username yang tersedia

			$this->load->model('b_model');
			$username = $this->input->post('username');
			$check_username = $this->b_model->getAvailable_Username($username);

			if ($check_username == false) {
				// Jika username telah dipakai
				$this->session->set_flashdata('notif_update', "<script> alert('Username Sudah Terpakai, Silahkan Gunakan Username yang lain!...'); </script>");
				redirect('administrator/setting');
			} elseif ($check_username == true) {
				// Jika username tersedia

				$data_valid = [
					'id_user' => $this->input->post('id_user'),
					'nama_user' => $this->input->post('account'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),

				  ];

				$where = ['id_user' => $id_to_update];

				$update = $this->a_model->QueryUpdate('users', $data_valid, $where);

				if ($update == true) {
					// $this->db->cache_delete('administrator', 'artikel_manager');
					$this->session->set_flashdata('notif_update', "<script> alert('Update Data Sukses'); </script>");
					redirect('administrator/setting');
				} else {
					$this->index();
				}
			}
		}
	}
}
