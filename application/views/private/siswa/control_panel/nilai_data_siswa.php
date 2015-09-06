<!-- Start header -->
<?php $this->load->view('_templates/private/siswa/head'); ?>
<!-- End header -->

<h3>Nilai Data Siswa</h3>

  <?php foreach ($profile as $ds): ?>
    
  NIS : <?php echo $ds['nis']; ?>
  <br>
  Nama : <?php echo $ds['nama_siswa']; ?>
  <br>
  Kelas & Jurusan : <?php echo $ds['kelas']; ?>
  <hr>
  <?php endforeach; ?>

  Tahun Ajaran : <?php echo $s_ta; ?>
  <br>
  Semester : <?php echo $semester; ?>
  <hr>


  <table class="table table-hover">
    <thead>
      <tr>
        <th>Mata Pelajaran</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Absensi</th>
        <th>Norma/Sikap</th>
        <th>Hasil / Rata-Rata</th>
        <th>Grade</th>
        <th>Guru Bidang Studi</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach ($by_nilai_siswa as $field): ?>
      
      <tr>
        <td><?php echo $field['mata_pelajaran']; ?></td>
        <td><?php echo $field['tugas']; ?></td>
        <td><?php echo $field['uts']; ?></td>
        <td><?php echo $field['uas']; ?></td>
        <td><?php echo $field['absensi']; ?></td>
        <td><?php echo $field['norma']; ?></td>
        <td><?php echo $field['hasil']; ?></td>
        <td><?php $grade = $field['hasil'];
            if ($grade >= 90) {echo "A"; }
            elseif ($grade >= 75) {echo "B"; }
            elseif ($grade >= 60) { echo "C"; }
            elseif ($grade >= 55) { echo "D"; }
            else { echo "E"; }
            ?>
        </td>
        <td> <?php echo $field['nip'] ?> | <?php echo $field['nama_pengajar'] ?>
        </td>
      </tr>

    <?php endforeach; ?>
    </tbody>
  </table>


  <hr>
  Wali Kelas : <br>
  - NIP : <?php echo $valid_nip_wali_kelas; ?>
  <br>
  - Nama : <?php echo $valid_nama_wali_kelas; ?>
<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer