<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends MY_Controller
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
		$data['jurusan'] = $this->a_model->getJurusan();
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$this->load->view('private/admin/control_panel/jurusan/jurusan_panel', $data);
	}

	public function insert()
	{
		$validations = [
			[
			  'field' => 'nama_jurusan',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],

			[
			  'field' => 'group_jurusan',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			// Jika Ada Kesalahan Buka Ini
			$this->index();
		} else {
			// Jika Tidak ada kesalahan, eksekusi perintah ini...
			$data_valid = [
			'nama_jurusan' => $this->input->post('nama_jurusan'),
			'group_jurusan' => $this->input->post('group_jurusan'),
		  ];

			$insert = $this->a_model->QueryInsert('jurusan', $data_valid);

			if ($insert == true) {
				// $this->db->cache_delete('administrator', 'artikel_manager');
				$this->session->set_flashdata(
			  'notif_result',
		  "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>"
		  );
				redirect('administrator/jurusan');
			} else {
				$this->session->set_flashdata(
			  'notif_result',
		  "<script type='text/javascript'>
                          $('.result').html('Insert Failed!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>"
		  );
				redirect('administrator/jurusan');
			}
		}
	}

	public function update($id_jurusan = null)
	{
		$data['jurusan'] = $this->a_model->getJurusan();
		$id_to_update = $id_jurusan;

		$validations = [
			[
			  'field' => 'nama_jurusan',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],

			[
			  'field' => 'group_jurusan',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],
	  ];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			// Jika Ada Kesalahan Buka Ini
			$this->load->view('private/admin/control_panel/jurusan/jurusan_panel', $data);
		} else {
			// Jika Tidak ada kesalahan, eksekusi perintah ini...
			$data_valid = [
			'nama_jurusan' => $this->input->post('nama_jurusan'),
			'group_jurusan' => $this->input->post('group_jurusan'),
		  ];

			$where = ['id_jurusan' => $id_to_update];

			$update = $this->a_model->QueryUpdate('jurusan', $data_valid, $where);

			if ($update == true) {
				// $this->db->cache_delete('administrator', 'artikel_manager');
				$this->session->set_flashdata(
			  'notif_result',
		  "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>"
		  );
				redirect('administrator/jurusan');
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
				redirect('administrator/jurusan');
			}
		}
	}

	public function delete($id_jurusan = null)
	{
		// Validation Data
		$where = ['id_jurusan' => $id_jurusan];
		$delete = $this->a_model->QueryDelete('jurusan', $where);

		if ($delete == true) {
			$this->session->set_flashdata(
		  'notif_result',
	  "<script type='text/javascript'>
                      $('.result').html('Delete Success!!!')
                          .fadeIn(1000)
                          .delay(1000)
                          .fadeOut(1000)
      </script>"
	  );
			redirect('administrator/jurusan');
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
			redirect('administrator/jurusan');
		}
	}
}
