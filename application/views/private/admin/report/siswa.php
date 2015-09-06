<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->
<!-- Start Sections -->

<h3>Report Data Siswa</h3>
<hr>

<?php echo form_open('administrator/report/siswa'); ?>

Tahun Angkatan : <?php echo $filter; ?> <br>
      <select name="tahun_angkatan">
          <option value="<?php echo $filter; ?>"><?php echo $filter; ?></option>
          
          <option value="Pilih Angkatan" class="divider">---------------</option>
          <?php foreach ($tahun_angkatan as $value): ?>
          <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
          <?php endforeach; ?>

      </select>

      <button type="submit" class="btn btn-xs btn-primary"> Search </button>
<?php echo form_close(); ?>
<hr>

<table id="siswa_tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Tahun Angkatan</th>
      <th>Nama Siswa</th>
      <th>L/P</th>
      <th>Kelas & Jurusan</th>
    </tr>
  </thead>

  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($siswa as $siswa): ?>
      <tr>

        <td> <?php echo $no; ?> </td>
        <td> <?php echo $siswa ['nis'] ?> </td>
        <td> <?php echo $siswa ['angkatan'] ?> </td>
        <td> <a href="javascript:;" target="popup" onclick="window.open('<?php echo base_url() . 'administrator/report/nilai/'. $siswa ['nis']; ?>','name','width=auto,height=auto')">
              <span class="btn btn-xs btn-primary"> <i class="fa fa-search-plus"></i> </span>
              <?php echo $siswa ['nama_siswa']; ?>
              </a>
        </td>
        <td> <?php echo $siswa ['gender']; ?> </td>
        <td> <?php echo $siswa ['kelas']; ?> </td>

      </tr>
      <?php $no++ ?>

  <?php endforeach; ?>
</tbody>
</table>




<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer