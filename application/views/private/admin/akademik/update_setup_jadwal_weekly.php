<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->
<!-- Start Sections -->
<h3><?php echo $updatebar; ?></h3> <hr>
<!-- ------------------------------------------------------------------------------- -->
<div class="class-jw-global">
  <label> ID_KEY : </label>
  <span><?php echo $ID_Key; ?></span>
  <br>

  <label> ID_Kelas : </label>
  <span><?php echo $ID_Kelas; ?></span>
  <br>

  <label> Tahun Ajaran : </label>
  <span><?php echo $TahunAjaran; ?></span>
  <br>

  <label> Semester : </label>
  <span><?php echo $Semester; ?></span>
</div>
<hr>



<?php echo form_open('administrator/jadwal_akademik/update', "class='form-horizontal'"); ?>
<div class="pull-left">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
</div>
<table id="updateJadwal" class="table table-hover">
  <thead>
    <tr>
      <th>Jam Ke</th>
      <th>Senin</th>
      <th>Selasa</th>
      <th>Rabu</th>
      <th>Kamis</th>
      <th>Jumat</th>
      <th>Sabtu</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody id="jadwalAkademik">
  <?php foreach ($jadwalWeekly as $row): ?>
    <tr>
      <td readonly hidden><input type="text" name="ID_Key[]" value="<?php echo $row['id_key']; ?>"></td>
      <td>
        <select name="getJamMengajar[]" class="form-control">
          <option value="<?php echo $row['jam_ke'] ?>"><?php echo $row['jam_ke'] ?></option>
          <option value="">Jam &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
          <?php foreach ($getJamMengajar as $jam): ?>
          <option value="<?php echo $jam['jam_ke']; ?>"><?php echo $jam['jam_ke']; ?></option>
          <?php endforeach; ?>
        </select>
      </td>
      <td>
        <select name="getMapelSenin[]" class="form-control">
          <option value="<?php echo $row['senin'] ?>"><?php echo $row['senin'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelSelasa[]" class="form-control">
          <option value="<?php echo $row['selasa'] ?>"><?php echo $row['selasa'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelRabu[]" class="form-control">
          <option value="<?php echo $row['rabu'] ?>"><?php echo $row['rabu'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelKamis[]" class="form-control">
          <option value="<?php echo $row['kamis'] ?>"><?php echo $row['kamis'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelJumat[]" class="form-control">
          <option value="<?php echo $row['jumat'] ?>"><?php echo $row['jumat'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelSabtu[]" class="form-control">
          <option value="<?php echo $row['sabtu'] ?>"><?php echo $row['sabtu'] ?></option>
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <a href="javascript:;" class="btn btn-default btn-delete" data-panel='<?php echo $row['id_primary']; ?>'>Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>

    <tr id="rowFirst" class="upjk">
      <td readonly hidden><input type="text" name="ID_Key[]" value="<?php echo $ID_Key; ?>"></td>
      <td>
        <select name="getJamMengajar[]" class="form-control">
          <option value="">Jam &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</option>
          <?php foreach ($getJamMengajar as $jam): ?>
          <option value="<?php echo $jam['jam_ke']; ?>"><?php echo $jam['jam_ke']; ?></option>
          <?php endforeach; ?>
        </select>
      </td>
      <td>
        <select name="getMapelSenin[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelSelasa[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelRabu[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelKamis[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelJumat[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td>
        <select name="getMapelSabtu[]" class="form-control">
          <option value="-- Tidak Ada --">Mata Pelajaran</option>
          <?php foreach ($getMapel as $mapel): ?>
          <option value="<?php echo $mapel['nama_mapel']; ?>"><?php echo $mapel['nama_mapel']; ?></option>
          <?php endforeach; ?>
          <option value="-- Tidak Ada --">-- Tidak Ada --</option>
        </select>
      </td>
      <td><button id="delRow" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td>
    </tr>


  </tbody>
</table>
<?php echo form_close(); ?>
<div class="pull-right">
<button id="addRowJadwal" class="btn btn-primary btn-show"><i class="fa fa-plus"></i></button>
<a href="administrator/jadwal_akademik/delete/<?php echo $ID_Key; ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Jadwal</button></a>
</div>


<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer
