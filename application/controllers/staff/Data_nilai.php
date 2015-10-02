<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nilai extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if ( $this->session->userdata('hak_akses') != 2 ) {
            $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
            redirect( 'login' );
        }
    }
    public function index() {

        // Base Sessions
        $data['myAccount']    = $this->session->userdata('nama_awal');
        $data['nip']          = $this->session->userdata('nip');

        // Get Content for filter
        $data['kelas']        = $this -> a_model -> getKelas();
        $data['tahun_ajaran'] = $this -> a_model -> getTahunAjaran();

        // Select Mata Pelajaran
        // by guru bidang bidang studi
        $bid_studi_guru       = $this -> a_model -> getMapel_by_guru($data['nip']);
        foreach ($bid_studi_guru as $value) {
            $data['kode_mapel'] = $value['kode_mapel'];
            $data['nama_mapel'] = $value['nama_mapel'];
        }

        // Data di render ke view sebagai form filter
        $this->load->view('private/staff/control_panel/select_to_view', $data);

    }


    public function store_nilai() {
        $this->form_validation->set_rules('id_nilai[]', 'ID Nilai', 'trim|required');
        $this->form_validation->set_rules('tahun_ajaran[]', 'Tahun Ajaran', 'trim|required');
        $this->form_validation->set_rules('semester[]', 'Semester', 'trim|required');
        $this->form_validation->set_rules('mapel[]', 'Mata Pelajaran', 'trim|required');

        $this->form_validation->set_rules('nis[]', 'NIS', 'trim|required');
        $this->form_validation->set_rules('tugas[]', 'Tugas', 'trim|required');
        $this->form_validation->set_rules('uts[]', 'UTS', 'trim|required');
        $this->form_validation->set_rules('uas[]', 'UAS', 'trim|required');
        $this->form_validation->set_rules('absensi[]', 'Absensi', 'trim|required');
        $this->form_validation->set_rules('norma[]', 'Norma', 'trim|required');


        if ($this->form_validation->run() == FALSE){
            echo validation_errors(); // tampilkan apabila ada error
        } else { /* 01 */

            $nis        = $this->input->post('nis');
            $result     = array();
            foreach ($nis as $key => $value) {
                $result[]   = array (
                            'id_nilai'       => $_POST['id_nilai'][$key],
                            'nis'            => $_POST['nis'][$key],
                            'nip'            => $_POST['nip'][$key],

                            'mata_pelajaran' => $_POST['mapel'][$key],
                            'tahun_ajaran'   => $_POST['tahun_ajaran'][$key],
                            'semester'       => $_POST['semester'][$key],

                            'tugas'          => $_POST['tugas'][$key],
                            'uts'            => $_POST['uts'][$key],
                            'uas'            => $_POST['uas'][$key],
                            'absensi'        => $_POST['absensi'][$key],
                            'norma'          => $_POST['norma'][$key],

                            'hasil'          => ( $_POST['tugas'][$key] * 15/100 ) +
                                                ( $_POST['uts'][$key] * 25/100 ) +
                                                ( $_POST['uas'][$key] * 25/100 ) +
                                                ( $_POST['absensi'][$key] * 20/100 ) +
                                                ( $_POST['norma'][$key] * 15/100 )
                );  /* End Array */
            } /* End Foreach */

            // Eksekusi -> Update Data Nilai
            $update     = $this -> db -> update_batch('tabel_nilai', $result, 'id_nilai');
            if ($update == true) {
                $this->session->set_flashdata("notif_result",
                "<script type='text/javascript'>
                              $('.result').html('Simpan Nilai Success!!!')
                                  .fadeIn(1000)
                                  .delay(1500)
                                  .fadeOut(1000)
                </script>");
                redirect('staff/data_nilai');
            }

        } /* // Else 01 */
    }

    public function reqDataSiswa() {
        $data['nip']          = $this->input->get('nip');
        $data['kelas']        = $this->input->get('kelas');
        $data['tahun_ajaran'] = $this->input->get('tahun_ajaran');
        $data['semester']     = $this->input->get('semester');
        $data['mapel']        = $this->input->get('mapel');
        $data['data_siswa']   = $this->db->select('*')->from('tabel_siswa')
                                                      ->where('kelas', $data['kelas'])
                                                      ->get()->result();
        foreach ($data['data_siswa'] as $x_nilai_by) {
            $resNilai = $this->db->select('*')
                ->from('tabel_nilai')
                ->where('nis', $x_nilai_by->nis)
                ->where('tahun_ajaran', $data['tahun_ajaran'])
                ->where('semester', $data['semester'])
                ->where('mata_pelajaran', $data['mapel'])
                ->where('nip', $data['nip'])
                ->get()
                ->result();

            if($resNilai == true){

                $data['nis']        = $x_nilai_by->nis;
                $data['nama_siswa'] = $x_nilai_by->nama_siswa;

                $data['id_nilai']   = $resNilai[0]->id_nilai;
                $data['tugas']      = $resNilai[0]->tugas;
                $data['uts']        = $resNilai[0]->uts;
                $data['uas']        = $resNilai[0]->uas;
                $data['absensi']    = $resNilai[0]->absensi;
                $data['norma']      = $resNilai[0]->norma;
                $data['hasil']      = $resNilai[0]->hasil;

            } elseif($resNilai == false) {

                $insertNewData = $this->a_model->QueryInsert('tabel_nilai', array(
                                    'nis'            => $x_nilai_by->nis,
                                    'tahun_ajaran'   => $data['tahun_ajaran'],
                                    'semester'       => $data['semester'],
                                    'mata_pelajaran' => $data['mapel'],
                                    'nip'            => $data['nip']
                                ));

                if( $insertNewData == true ) {

                    $data['id_nilai']   = $this->db->select('id_nilai')
                                                   ->from('tabel_nilai')
                                                   ->where('nis', $x_nilai_by->nis)
                                                   ->where('tahun_ajaran', $data['tahun_ajaran'])
                                                   ->where('semester', $data['semester'])
                                                   ->where('mata_pelajaran', $data['mapel'])
                                                   ->where('nip', $data['nip'])
                                                   ->get()
                                                   ->result()[0]->id_nilai;

                    $data['nis']        = $x_nilai_by->nis;
                    $data['nama_siswa'] = $x_nilai_by->nama_siswa;

                    $data['tugas']      = 0;
                    $data['uts']        = 0;
                    $data['uas']        = 0;
                    $data['absensi']    = 0;
                    $data['norma']      = 0;
                    $data['hasil']      = 0;

                }

            }

        $this->load->view('private/staff/control_panel/nilai_data_siswa', $data, FALSE);

        }
    }


/* End of file Data_nilai.php */
/* Location: ./application/controllers/staff/Data_nilai.php */
}
