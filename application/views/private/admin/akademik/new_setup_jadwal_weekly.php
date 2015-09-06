<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->
<!-- Start Sections -->
<h3><?php echo $newsetupbar; ?></h3> <hr>
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


<?php echo form_open('administrator/jadwal_akademik/insert', "class='form-horizontal'"); ?>

<button id="addRowJadwal" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i></button>
<button type="submit" class="btn btn-sm btn-success pull-left"><i class="fa fa-save"></i> Simpan</button>
<table class="table table-hover">
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
    <tr id="rowFirst">
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
<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer