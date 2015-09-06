<div class='to-input'>
  Nama Kelas : <?php if (empty($s_kelas)) {echo 'Pilih Kelas'; } else {echo $s_kelas; } ?>
  <br>
  Tahun Ajaran : <?php if (empty($s_ta)) {echo 'Pilih Tahun Ajaran'; } else {echo $s_ta; } ?> |
  Semester : <?php if (empty($semester)) {echo "Pilih Semester"; } else {echo $semester; } ?>
  <br>
  Mata Pelajaran : <?php if (empty($s_mapel)) {echo 'Pilih Mata Pelajaran'; } else {echo $s_mapel; } ?>
  <br> 
</div>

<?php echo form_open('staff/data_nilai/update_nilai'); ?>
<!-- Data Tabel -->
<table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>

                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Absensi</th>
                <th>Norma / Sikap</th>

                <th>Hasil / Rata-Rata</th>
                <th>Tahun Ajaran</th>
            </tr>
        </thead>

 
        <tbody>
              <?php
              if (empty($by_nilai_siswa)) {
                echo "<strong>No Data</strong>";
              } else {

              foreach ($by_nilai_siswa as $field_data): ?>
              <tr>
                  
                  <td hidden readonly> <input name="id_nilai[]" type="text" value="<?php echo $field_data['id_nilai']; ?>"> </td>
                  <td hidden readonly> <input name="nis[]" type="text" value="<?php echo $field_data['nis']; ?>"> </td>
                  <td hidden readonly> <input name="tahun_ajaran[]" type="text" value="<?php echo $field_data['tahun_ajaran']; ?>"> </td>
                  <td hidden readonly> <input name="semester[]" type="text" value="<?php echo $field_data['semester']; ?>"> </td>
                  <td hidden readonly> <input name="mapel[]" type="text" value="<?php echo $field_data['mata_pelajaran']; ?>"> </td>

                  <td> <?php echo $field_data['nis']; ?> </td>
                  <td><?php echo $field_data['nama_siswa']; ?> </td>

                  <td> <input value="<?php echo $field_data['tugas'] ?>" name="tugas[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['uts'] ?>" name="uts[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['uas'] ?>" name="uas[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['absensi'] ?>" name="absensi[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['norma'] ?>" name="norma[]" type="text" class="form-input-nilai"> </td>
                  <td> <?php echo $field_data['hasil'] ?> </td>
                  <td> <?php echo $field_data['tahun_ajaran'] ?> </td>
              </tr>
              <?php endforeach; ?>
              <?php }; ?>
        </tbody>
    </table>



  <input type='submit' class='btn btn-primary' value='Save & Close'>



<!--  -->

<?php echo form_close(); ?>