<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->


<?php echo form_open('staff/input_nilai/insert'); ?>
<!-- Data Tabel -->

<div class="to-input">
  Nama Kelas : <?php if (empty($s_kelas)) {echo "Pilih Kelas"; } else {echo $s_kelas; } ?>
  <br>
  Tahun Ajaran : <?php if (empty($s_ta)) {echo "Pilih Tahun Ajaran"; } else {echo $s_ta; } ?> |
  Semester : <?php if (empty($semester)) {echo "Pilih Semester"; } else {echo $semester; } ?>
  <br>
  Mata Pelajaran : <?php if (empty($s_mapel)) {echo "Pilih Mata Pelajaran"; } else {echo $s_mapel; } ?>
  <hr>

  Penanggungjawab / Guru Bidang Studi :
  <?php echo $nip; ?>
  <br>
  <?php echo $nama_pengajar; ?>



</div>


<table class="table table-hover">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>

                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Absensi</th>

                <th>Norma / Sikap</th>
            </tr>
        </thead>

 
        <tbody>
              <?php foreach ($by_filter_siswa as $filter_siswa): ?>
              <tr>
                  
                  <td readonly hidden> <input name="nis[]" type="text" value="<?php echo $filter_siswa['nis']; ?>"> </td>
                  <td readonly hidden> <input name="tahun_ajaran[]" type="text" value="<?php echo $s_ta; ?>"> </td>
                  <td readonly hidden> <input name="semester[]" type="text" value="<?php echo $semester; ?>"> </td>
                  <td readonly hidden> <input name="mapel[]" type="text" value="<?php echo $s_mapel; ?>"> </td>

                  <td readonly hidden> <input name="nip[]" type="text" value="<?php echo $nip; ?>"> </td>

                  <td> <?php echo $filter_siswa['nis']; ?> </td>
                  <td> <i class="fa fa-pencil"></i> <?php echo $filter_siswa['nama_siswa']; ?> </td>

                  <td> <input name="tugas[]" type="text" class="form-input-nilai" value="0"> </td>
                  <td> <input name="uts[]" type="text" class="form-input-nilai" value="0"> </td>
                  <td> <input name="uas[]" type="text" class="form-input-nilai" value="0"> </td>
                  <td> <input name="absensi[]" type="text" class="form-input-nilai" value="0"> </td>
                  <td> <input name="norma[]" type="text" class="form-input-nilai" value="0"> </td>
              </tr>
              <?php endforeach; ?>


        </tbody>
    </table>


<input type="submit" class="btn btn-primary">

<!--  -->

<?php echo form_close(); ?>




<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer