<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax_model extends CI_Model
{
	public function insertData($tabelname, $data)
	{
		$query = $this->db->insert($tabelname, $data);

		return $query;
	}
}
