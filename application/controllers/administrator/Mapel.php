<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends MY_Controller
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
		$data['mapel'] = $this->a_model->getMapel();
		// $data['nama_pengajar'] = $this -> a_model -> getPengajar();
		$data['myAccount'] = $this->session->userdata('nama_awal');

		$this->load->view('private/admin/control_panel/mapel/mapel_panel', $data);
	}

	public function insert()
	{
		$validations = [
			[
			  'field' => 'nama_mapel',
			  'label' => 'Nama Bidang Studi',
			  'rules' => 'required|trim',
			],

			[
			  'field' => 'kode_mapel',
			  'label' => 'Kode Bidang Studi',
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
			'kode_mapel' => $this->input->post('kode_mapel'),
			'nama_mapel' => $this->input->post('nama_mapel'),
		  ];

			$insert = $this->a_model->QueryInsert('mata_pelajaran', $data_valid);

			if ($insert == true) {
				$this->session->set_flashdata(
			  'notif_result',
		  "<script type='text/javascript'>
                          $('.result').html('Insert Success!!!')
                              .fadeIn(1000)
                              .delay(1000)
                              .fadeOut(1000)
          </script>"
		  );
				redirect('administrator/mapel');
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
				redirect('administrator/mapel');
			}
		}
	}

	public function update($id_mapel = null)
	{
		$data['mapel'] = $this->a_model->getMapel();
		$id_to_update = $id_mapel;

		$validations = [
			[
			  'field' => 'nama_mapel',
			  'label' => 'Nama Bidang Studi',
			  'rules' => 'required|trim',
			],

			[
			  'field' => 'kode_mapel',
			  'label' => 'Kode Bidang Studi',
			  'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($validations);

		if ($this->form_validation->run() == false) {
			// Jika Ada Kesalahan Buka Ini
			$this->load->view('private/admin/control_panel/mapel/mapel_panel', $data);
		} else {
			// Jika Tidak ada kesalahan, eksekusi perintah ini...
			$data_valid = [
			'kode_mapel' => $this->input->post('kode_mapel'),
			'nama_mapel' => $this->input->post('nama_mapel'),
		  ];

			$where = ['id_mapel' => $id_to_update];

			$update = $this->a_model->QueryUpdate('mata_pelajaran', $data_valid, $where);

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
				redirect('administrator/mapel');
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
				redirect('administrator/mapel');
			}
		}
	}

	public function delete($id_mapel = null)
	{
		// Validation Data
		$where = ['id_mapel' => $id_mapel];
		$delete = $this->a_model->QueryDelete('mata_pelajaran', $where);

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
			redirect('administrator/mapel');
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
			redirect('administrator/mapel');
		}
	}
}
