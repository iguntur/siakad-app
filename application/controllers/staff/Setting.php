<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
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
		$data['users'] = $this->a_model->get_by_Users($data['nip']);

		$this->load->view('private/staff/setting', $data);
	}

	public function changes()
	{
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$data['nip'] = $this->session->userdata('nip');
		$data['users'] = $this->a_model->get_by_Users($data['nip']);
		// -----------------------

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
			$this->load->view('private/staff/setting', $data);
		} else {
			$this->load->model('b_model');
			$username = $this->input->post('username');
			$check_username = $this->b_model->getAvailable_Username($username);

			if ($check_username == false) {
				$this->session->set_flashdata('notif_update', "<script> alert('Username Sudah Terpakai, Silahkan Gunakan Username yang lain!...'); </script>");
				redirect('staff/setting');
			} elseif ($check_username == true) {
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
					redirect('staff/setting');
				} else {
					$this->index();
				}
			}
		}
	}
}
