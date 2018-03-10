<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajaran extends MY_Controller
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
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$data['myAccount'] = $this->session->userdata('nama_awal');
		$this->load->view('private/admin/akademik/tahun_ajaran', $data);
	}

	public function insert()
	{
		$validations = [
			[
			  'field' => 'nama_tahun_ajaran',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data_valid = [
			'nama_tahun_ajaran' => $this->input->post('nama_tahun_ajaran'),
		  ];

			$insert = $this->a_model->QueryInsert('tahun_ajaran', $data_valid);

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
				redirect('administrator/tahun_ajaran');
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
				redirect('administrator/tahun_ajaran');
			}
		}
	}

	public function update($id_thn_ajaran = null)
	{
		$data['tahun_ajaran'] = $this->a_model->getTahunAjaran();
		$id_to_update = $id_thn_ajaran;

		$validations = [
			[
			  'field' => 'nama_tahun_ajaran',
			  'label' => 'Nama Jurusan',
			  'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			// Jika Ada Kesalahan Buka Ini
			$this->load->view('private/admin/akademik/tahun_ajaran', $data);
		} else {
			// Jika Tidak ada kesalahan, eksekusi perintah ini...
			$data_valid = [
			'nama_tahun_ajaran' => $this->input->post('nama_tahun_ajaran'),
		  ];

			$where = ['id_thn_ajaran' => $id_to_update];

			$update = $this->a_model->QueryUpdate('tahun_ajaran', $data_valid, $where);

			if ($update == true) {
				$this->session->set_flashdata(
			  'notif_result',
		  "<script type='text/javascript'>
                          $('.result').html('Update Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>"
		  );
				redirect('administrator/tahun_ajaran');
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
				redirect('administrator/tahun_ajaran');
			}
		}
	}

	public function delete($id_thn_ajaran = null)
	{
		// Validation Data
		$where = ['id_thn_ajaran' => $id_thn_ajaran];
		$delete = $this->a_model->QueryDelete('tahun_ajaran', $where);

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
			redirect('administrator/tahun_ajaran');
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
			redirect('administrator/tahun_ajaran');
		}
	}
}
