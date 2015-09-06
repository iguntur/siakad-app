<!-- Start header -->
<?php $this->load->view('_templates/private/siswa/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<?php echo form_open('siswa/data_nilai/nilai_siswa'); ?>
  <legend>Pilih Data Yang ingin Dilihat</legend>

  <div class="form-group">
    <label for="">Tahun Ajaran</label>
    <select name="tahun_ajaran" required="required">
    <option value="">Tahun Ajaran</option>
      <?php foreach ($tahun_ajaran as $ta): ?>
        <option value="<?php echo $ta['nama_tahun_ajaran']; ?>"><?php echo $ta['nama_tahun_ajaran']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>


  <div class="form-group">
    <label for="">Semester</label>
    <select name="semester" required="required">
      <option value="">Semester</option>
      <option value="I">I (Pertama)</option>
      <option value="II">II (Kedua)</option>
    </select>
  </div>
 


  <button type="submit" class="btn btn-xs btn-primary" style="margin-bottom: 20px;">Submit</button>

<?php echo form_close(); ?>
<!-- Data Tables -->



<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/siswa/footer'); ?>
<!-- End Footer