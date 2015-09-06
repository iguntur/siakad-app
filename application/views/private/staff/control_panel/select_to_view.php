<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<?php echo form_open('staff/data_nilai/nilai_siswa'); ?>
  <h3>INPUT NILAI || Controll Data Nilai</h3><hr>

  <div class="jumbotron">

          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Pilih Kelas</label>
            <select class="form-control" name="kelas">
              <?php foreach ($kelas as $n): ?>
                <option value="<?php echo $n['kelas_jurusan']; ?>"> <?php echo $n['kelas_jurusan']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>


          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Tahun Ajaran</label>
            <select class="form-control" name="tahun_ajaran" required="required">
            <option value="">Tahun Ajaran</option>
              <?php foreach ($tahun_ajaran as $ta): ?>
                <option value="<?php echo $ta['nama_tahun_ajaran']; ?>"><?php echo $ta['nama_tahun_ajaran']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Semester</label>
            <select class="form-control" name="semester" required="required">
                <option value="">Pilih Semester</option>
                <option value="I"> I ( Pertama ) </option>
                <option value="II"> II ( Ke Dua ) </option>
            </select>
          </div>

          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Mata Pelajaran</label>
            <select class="form-control" name="mapel" required="required">
              <option value="">Mata Pelajaran</option>
              <option value="<?php if ($kode_mapel) { echo $kode_mapel; } ?>">
              <?php if (empty($kode_mapel)) { echo 'Bidang Studi Tidak Tersedia'; }  else { echo $kode_mapel . ' | ' . $nama_mapel; } ?> </option>
            </select>
          </div>
          <?php echo validation_errors(); ?>

          <button type="submit" class="btn btn-lg btn-primary" style="margin-bottom: 20px;"><i class="fa fa-check"></i></button>

</div>
<?php echo form_close(); ?>
<!-- Data Tables -->



<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer