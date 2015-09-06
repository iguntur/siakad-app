<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_model extends CI_Model {

  function getAvailable_Username($username) {

          $query = $this -> db -> query ("SELECT username
                                          FROM users
                                          WHERE username = '$username'
                                        ");
          // $check_num_rows = num_rows($query);

          if ($query -> num_rows() == 0 ) {
            return TRUE;
          } elseif ($query -> num_rows() == 1) {
            return FALSE;
          }
  } /* End Check */
    


/* End of file b_model.php */
/* Location: ./application/models/b_model.php */
}