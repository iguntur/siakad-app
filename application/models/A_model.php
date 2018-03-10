<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_model extends CI_Model
{
	public function QueryInsert($tabelname, $data)
	{
		$query = $this->db->insert($tabelname, $data);

		return $query;
	}

	public function QueryUpdate($tabelname, $data, $where)
	{
		$query = $this->db->update($tabelname, $data, $where);

		return $query;
	}

	public function QueryDelete($tabelname, $where)
	{
		$query = $this->db->delete($tabelname, $where);

		return $query;
	}

	public function getUsers()
	{
		$query = $this->db->get('users');

		return $query->result_array();
	}

	public function get_by_Users($param)
	{
		$query = $this->db->where('id_user', $param)
			->limit(1)
			->get('users');

		return $query->result_array();
	}

	public function getPengajar()
	{
		$query = $this->db->get('tabel_pengajar');

		return $query->result_array();
	}

	public function getJabatan()
	{
		$query = $this->db->get('jabatan');

		return $query->result_array();
	}

	public function getByStaff($param)
	{
		$query = $this->db->where('nip', $param)
			->limit(1)
			->get('tabel_pengajar');

		return $query->result_array();
	}

	public function getByWaliKelas()
	{
		$n = 'Wali Kelas'; // Ini Nama Jabatan
		$query = $this->db->where('jabatan', $n)
			->get('tabel_pengajar');

		return $query->result_array();
	}

	public function getSiswa()
	{
		$query = $this->db->query(' SELECT * FROM `tabel_siswa` ORDER BY `tabel_siswa`.`nama_siswa` ASC ');

		return $query->result_array();
	}

	public function getBySiswa($param)
	{
		$query = $this->db->where('nis', $param)
			->limit(1)
			->get('tabel_siswa');

		return $query->result_array();
	}

	public function getKelas()
	{
		$query = $this->db->query('SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC');

		return $query->result_array();
	}

	public function getMyClass($nip)
	{
		$query = $this->db->query("SELECT * FROM `kelas` WHERE wali_kelas = '$nip' ORDER BY `kelas`.`nama_kelas` ASC");

		return $query->result_array();
	}

	public function getTabPengajar_join_kelas()
	{
		// Get Join Tabel Pengajar with tabel kelas
		$query = $this->db->select('*')
			->from('tabel_pengajar')
			->join('kelas', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
			->where('jabatan', 'Wali Kelas')
			->order_by('nama_kelas', 'ASC')
			->get();

		return $query->result_array();
	}

	public function showMydataAsWaliKelas($nip)
	{
		// Get Join Tabel Pengajar with tabel kelas
		$query = $this->db->select('*')
			->from('tabel_pengajar')
			->where('nip', $nip)
			->get();

		return $query->result_array();
	}

	public function getNama_Wali_Kelas($kelas)
	{
		$query = $this->db->where('kelas_jurusan', $kelas)
			->get('kelas');

		return $query->result_array();
	}

	public function getJurusan()
	{
		$query = $this->db->query(' SELECT * FROM `jurusan` ORDER BY `jurusan`.`nama_jurusan` ASC, `jurusan`.`group_jurusan` ASC ');

		return $query->result_array();
	}

	public function getMapel()
	{
		$query = $this->db->query('SELECT * FROM `mata_pelajaran` ORDER BY `mata_pelajaran`.`kode_mapel` ASC');

		return $query->result_array();
	}

	public function getMapel_by_guru($nip = null)
	{
		$query = $this->db->select('*')
			->from('tabel_pengajar')
			->join('mata_pelajaran', 'mata_pelajaran.kode_mapel = tabel_pengajar.guru_bid_studi', 'left')
			->where('tabel_pengajar.nip', $nip)
			->get();

		return $query->result_array();
	}

	public function getJamMengajar()
	{
		$query = $this->db->query('SELECT * FROM `jam_mengajar` ORDER BY `jam_mengajar`.`jam_mengajar` ASC');

		return $query->result_array();
	}

	public function getTahunAjaran()
	{
		$query = $this->db->query('SELECT * FROM `tahun_ajaran` ORDER BY `tahun_ajaran`.`nama_tahun_ajaran` ASC');

		return $query->result_array();
	}

	public function getFilterSiswa($kelas)
	{
		$query = $this->db->select('*')
			->from('tabel_siswa')
			->where('tabel_siswa.kelas', $kelas)
			->get();

		return $query->result_array();
	}

	public function getNilai_to_pengajar($kelas = null, $mapel = null, $tahun_ajaran = null, $semester = null)
	{
		$query = $this->db->select('*')
			->from('tabel_siswa')
			->join('tabel_nilai', 'tabel_nilai.nis = tabel_siswa.nis', 'left')
			->where('tabel_siswa.kelas', $kelas)
			->where('tabel_nilai.mata_pelajaran', $mapel)
			->where('tabel_nilai.tahun_ajaran', $tahun_ajaran)
			->where('tabel_nilai.semester', $semester)
			->get();

		return $query->result_array();
	}

	public function getNilai_to_siswa($nis, $s_ta, $semester)
	{
		$query = $this->db->select('*')
			->from('tabel_nilai')
			->where('nis', $nis)
			->where('tahun_ajaran', $s_ta)
			->where('semester', $semester)
			->get();

		return $query->result_array();
	}

	public function getNilaiToEval($nis, $semester)
	{
		$query = $this->db->select('*')
			->from('tabel_nilai')
			->where('nis', $nis)
			->where('semester', $semester)
			->get();

		return $query->result_array();
	}

	public function getUsers_join_siswa()
	{
		$query = $this->db->select('*')
			->from('tabel_siswa')
			->join('users', 'users.id_user = tabel_siswa.id_user', 'left')
			->get();

		return $query->result_array();
	}

	public function getUsers_join_staff()
	{
		$query = $this->db->select('*')
			->from('tabel_pengajar')
			->join('users', 'users.id_user = tabel_pengajar.id_user', 'left')
			->get();

		return $query->result_array();
	}

	public function getNilai_join_tabPengajar($nis = null, $s_ta = null, $semester = null)
	{
		$query = $this->db->select('*')
			->from('tabel_nilai')
			->join('tabel_pengajar', 'tabel_pengajar.nip = tabel_nilai.nip', 'left')
			->where('tabel_nilai.nis', $nis)
			->where('tabel_nilai.tahun_ajaran', $s_ta)
			->where('tabel_nilai.semester', $semester)
			->get();

		return $query->result_array();
	}

	public function joinKelas_tabSiswa_tabPengajar($filter_tahun_ajaran = null)
	{
		// Report Data Siswa
		$query = $this->db->select('*')
			->from('kelas')
			->join('tabel_siswa', 'tabel_siswa.kelas = kelas.kelas_jurusan', 'left')
			->join('tabel_pengajar', 'tabel_pengajar.nip = kelas.wali_kelas', 'left')
			->where('tabel_pengajar.jabatan', 'Wali Kelas')
			->where('tabel_siswa.angkatan', $filter_tahun_ajaran)
			->get();

		return $query->result_array();
	}

	public function getNilai_for_report($nis, $tahun_ajaran)
	{
		$query = $this->db->select('*')
			->from('tabel_nilai')
			->where('nis', $nis)
			->where('tahun_ajaran', $tahun_ajaran)
			->get();

		return $query->result_array();
	}

	public function getJadwalGlobal($IDKelas, $tahun_ajaran, $semester)
	{
		$query = $this->db->select('*')
			->from('jadwal_global')
			->where('id_kelas', $IDKelas)
			->where('semester', $semester)
			->where('tahun_ajaran', $tahun_ajaran)
			->get();

		return $query->result_array();
	}

	public function getJadwalWeekly($global_ID_Key)
	{
		$query = $this->db->select('*')
			->from('jadwal_weekly')
			->join('jadwal_global', 'jadwal_global.id_key = jadwal_weekly.id_key', 'left')
			->where('jadwal_weekly.id_key', $global_ID_Key)
			->get();

		return $query->result_array();
	}

	public function getKelas10()
	{
		$query = $this->db->select('*')
			->from('kelas')
			->where('nama_kelas', '10')
			->get();

		return $query->result_array();
	}

	public function getKelas11()
	{
		$query = $this->db->select('*')
			->from('kelas')
			->where('nama_kelas', '11')
			->get();

		return $query->result_array();
	}

	public function getKelas12()
	{
		$query = $this->db->select('*')
			->from('kelas')
			->where('nama_kelas', '12')
			->get();

		return $query->result_array();
	}
}
