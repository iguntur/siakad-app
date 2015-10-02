<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destroy_data extends MY_Controller {

    public function reset($param = null)
    {
        // TRUNCATE TABLE table_name
        $table_name = $param;
        $destroy = $this->db->query("TRUNCATE " . $table_name . "");
        $destroy = ($destroy == true) ? redirect('administrator/setting') : '' ;
    }

}

/* End of file Destroy_data.php */
/* Location: ./application/controllers/administrator/Destroy_data.php */
