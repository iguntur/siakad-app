<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {

  // ------------------------------------------------------------
  // Create / Insert Data
  function insertData($tabelname, $data) {
    $query = $this -> db -> insert ($tabelname, $data);
    return $query;
  }

}

/* End of file ajax_model.php */
/* Location: ./application/models/ajax_model.php */
