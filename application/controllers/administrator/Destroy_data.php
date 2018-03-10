<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Destroy_data extends MY_Controller
{
	public function reset($param = null)
	{
		$table_name = $param;

		$destroy = $this->db->query('TRUNCATE ' . $table_name . '');

		$destroy = ($destroy == true) ? redirect('administrator/setting') : '';
	}
}
