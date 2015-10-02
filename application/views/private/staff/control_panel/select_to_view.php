<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->
<!-- Start Sections -->
  <h3>INPUT NILAI || Controll Data Nilai</h3><hr>
  <div class="jumbotron">
          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Pilih Kelas</label>
            <select id="sKelas" class="form-control" name="kelas">
              <?php foreach ($kelas as $n): ?>
                <option value="<?php echo $n['kelas_jurusan']; ?>"> <?php echo $n['kelas_jurusan']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Tahun Ajaran</label>
            <select id="sTa" class="form-control" name="tahun_ajaran" required="required">
              <?php foreach ($tahun_ajaran as $ta): ?>
                <option value="<?php echo $ta['nama_tahun_ajaran']; ?>"><?php echo $ta['nama_tahun_ajaran']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Semester</label>
            <select id="sSemester" class="form-control" name="semester" required="required">
                <option value="I"> I ( Pertama ) </option>
                <option value="II"> II ( Ke Dua ) </option>
            </select>
          </div>
          <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
            <label for="">Mata Pelajaran</label>
            <select id="sMapel" class="form-control" name="mapel" required="required">
              <!-- <option value="">Mata Pelajaran</option> -->
              <option value="<?php if ($kode_mapel) { echo $kode_mapel; } ?>">
              <?php if (empty($kode_mapel)) { echo 'Bidang Studi Tidak Tersedia'; }  else { echo $kode_mapel . ' | ' . $nama_mapel; } ?> </option>
            </select>
          </div>
        <button id="getRequestNilai" data-nip="<?php echo $nip; ?>" class="btn btn-lg btn-primary" style="margin-bottom: 20px;"><i class="fa fa-check"></i></button>

</div>
<!-- END Select  -->
<hr>
<!-- View Table Nilai -->
<div id="show_dataTable" class="row" style="margin-bottom: 100px; display: none">
    <?php echo form_open('staff/data_nilai/store_nilai'); ?>
    <div class="col-md-12 col-sm-12"><h3>Result Nilai Data Siswa</h3></div>
    <div class="col-md-6 col-sm-6">
        <label style="width: 150px">Nama Kelas :</label>
        <span class="show_nama_kelas"> </span>
        <br>
        <label style="width: 150px">Tahun Ajaran :</label>
        <span class="show_tahun_ajaran"> </span>
        <br>
        <label style="width: 150px">Semester : </label>
        <span class="show_semester"> </span>
        <br>
        <label style="width: 150px">Mata Pelajaran :</label>
        <span class="show_mapel"> </span>
        <br>
    </div>
    <div class="col-md-6 col-sm-6 class-center">
        <input type='submit' class='btn btn-lg btn-primary' value='Simpan Nilai'>
    </div>
    <hr>
    <!-- Data Tabel -->
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
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

                    <th hidden="hidden">ID Nilai</th>
                    <th hidden="hidden">Tahun Ajaran</th>
                    <th hidden="hidden">Semester</th>
                    <th hidden="hidden">Mapel</th>
                </tr>
            </thead>
            <tbody  class="result-nilai-siswa">
            <!-- Result Tbody Nilai -->
            </tbody>
    </table>
    <?php echo form_close(); ?>
</div>
<!-- End View Table Nilai -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
