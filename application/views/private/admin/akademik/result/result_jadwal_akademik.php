<h1>Jadwal Akademik</h1>
<table class="table">
  <tr>
    <th style="width: 220px">Kelas</th>
    <td><?php echo $kelas; ?></td>
  </tr>
  <tr>
    <th style="width: 220px">Tahun Ajaran</td>
    <td><?php echo $tahun_ajaran; ?></td>
  </tr>
  <tr>
    <th style="width: 220px">Semester</th>
    <td><?php echo $semester; ?></td>
  </tr>
  <tr><th></th><td></td></tr>
</table>

<!-- Result Jadwal Weekly -->
<table class="table">
  <thead>
    <tr>
      <th style="width: 100px">Hari</th>
      <th style="width: 220px">Jam Ke</th>
    </tr>
    <tr>
      <th style="width: 100px">&nbsp;</th>
      <?php foreach ($show_jadwal as $value): ?>
              <th style="width: 220px"><?php echo $value['jam_ke']; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th style="width: 100px">Senin</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['senin']; ?></td>
      <?php endforeach; ?>
    </tr>
    <!--  -->
    <tr>
      <th style="width: 100px">Selasa</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['selasa']; ?></td>
      <?php endforeach; ?>
    </tr>
    <!--  -->
    <tr>
      <th style="width: 100px">Rabu</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['rabu']; ?></td>
      <?php endforeach; ?>
    </tr>
    <!--  -->
    <tr>
      <th style="width: 100px">Kamis</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['kamis']; ?></td>
      <?php endforeach; ?>
    </tr>
    <!--  -->
    <tr>
      <th style="width: 100px">Jumat</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['jumat']; ?></td>
      <?php endforeach; ?>
    </tr>
    <!--  -->
    <tr>
      <th style="width: 100px">Sabtu</th>
      <?php foreach ($show_jadwal as $value): ?>
      <td style="width: 220px"><?php echo $value['sabtu']; ?></td>
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>
