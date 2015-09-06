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
    </tr>
  </thead>

  <tbody>

    <?php foreach ($nilai_siswa as $field): ?>

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
      </tr>

    <?php endforeach; ?>
  </tbody>
</table>

<button class="btn btn-primary" onclick="printWindow('#windowprint')">Print Nilai</button>