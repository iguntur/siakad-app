<div class='to-input'>
  Nama Kelas : <?php if (empty($s_kelas)) {echo 'Pilih Kelas'; } else {echo $s_kelas; } ?>
  <br>
  Nama Jurusan : <?php if (empty($s_jurusan)) {echo 'Pilih Jurusan'; } else {echo $s_jurusan; } ?>
  <br>
  Tahun Ajaran : <?php if (empty($s_ta)) {echo 'Pilih Tahun Ajaran'; } else {echo $s_ta; } ?>
  <br>
  Mata Pelajaran : <?php if (empty($s_mapel)) {echo 'Pilih Mata Pelajaran'; } else {echo $s_mapel; } ?>
  <br> 
</div>


<!-- Data Tabel -->
<table class="table table-hover">
        <thead>
            <tr>

                <th>NIS</th>
                <th>Nama Lengkap</th>

                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Absensi</th>

                <th>Grade</th>
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
                  <td hidden readonly> <input name="mapel[]" type="text" value="<?php echo $field_data['mata_pelajaran']; ?>"> </td>

                  <td> <?php echo $field_data['nis']; ?> </td>
                  <td> <i class="fa fa-pencil"></i> <?php echo $field_data['nama_lengkap']; ?> </td>

                  <td> <input value="<?php echo $field_data['tugas'] ?>" name="tugas[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['uts'] ?>" name="uts[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['uas'] ?>" name="uas[]" type="text" class="form-input-nilai"> </td>
                  <td> <input value="<?php echo $field_data['absensi'] ?>" name="absensi[]" type="text" class="form-input-nilai"> </td>
                  <td> <select name="grade[]">
                          <option value="<?php echo $field_data['grade'] ?>"><?php echo $field_data['grade'] ?></option> 
                          <option value="">---</option> 
                          <option value="A">A</option> 
                          <option value="B">B</option> 
                          <option value="C">C</option> 
                          <option value="D">D</option> 
                          <option value="E">E</option> 
                       </select>
                  </td>
              </tr>
              <?php endforeach; ?>
              <?php }; ?>
        </tbody>
    </table>




<!--  -->

<?php echo form_close(); ?>