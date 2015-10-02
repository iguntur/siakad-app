<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_model extends CI_Model {
    function getAvailable_Username($username) {
          $query = $this -> db -> query ("SELECT username
                                          FROM users
                                          WHERE username = '$username'
                                        ");
          if ($query -> num_rows() == 0 ) {
            return TRUE;
          } elseif ($query -> num_rows() == 1) {
            return FALSE;
          }
    } /* End getAvailable_Username */

    function getAvailable_Nis($nis) {
            $query = $this->db->select('nis')
                            ->from('tabel_siswa')
                            ->where('nis', $nis)
                            ->get();
            return $query -> result_array();
    } /* End getAvailable_Nis */

    function getAvailable_Nip($nip) {
            $query = $this->db->select('nip')
                            ->from('tabel_pengajar')
                            ->where('nip', $nip)
                            ->get();
            return $query -> result_array();
    } /* End getAvailable_Nis */


/* End of file b_model.php */
/* Location: ./application/models/b_model.php */
}
