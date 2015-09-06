<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->

<h3>Nilai Data Siswa</h3>

  <?php if (empty($by_nilai_siswa)) {
        $this->load->view('private/staff/control_panel/auth_new_data/n_val_empty');
        } else {
        $this->load->view('private/staff/control_panel/auth_new_data/n_val_valid');
        }
  ?>


<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer