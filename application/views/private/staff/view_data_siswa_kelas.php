<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->
<!-- Start Sections -->
<h4>STAFF</h4>
<div style="display: inline-block">
  
    <label style="width: 100px">NIP</label>
    <span><?php echo $wali_kelas['nip']; ?></span>
    <br>

    <label style="width: 100px">NAMA</label>
    <span><?php echo $wali_kelas['nama_pengajar']; ?></span>
    <br>

    <label style="width: 100px">Jabatan</label>
    <span><?php echo $wali_kelas['jabatan']; ?></span>
    <br>

    <label style="width: 100px">Bidang Studi</label>
    <span><?php if ($wali_kelas['guru_bid_studi'] == false ) { echo "Bidang Studi Tidak Tersedia"; } else { echo $wali_kelas['guru_bid_studi']; } ?></span>

</div>
<hr>

<h5>VIEW DATA SISWA</h5>
<table id="DataTable" class="table table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>L / P</th>
      <th>Phone</th>
    </tr>
  </thead>
  <tbody>
  <?php $no = 1; ?>
  <?php foreach ($siswa_in_class as $value): ?>
    <tr>
    
      <td> <?php echo $no; ?> </td>    
      <td> <?php echo $value['nis']; ?> </td>    
      <td> <?php echo $value['nama_siswa']; ?> </td>    
      <td> <?php echo $value['kelas']; ?> </td>    
      <td> <?php echo $value['gender']; ?> </td>
      <td> <?php echo $value['phone']; ?> </td>

    </tr>

  <?php
  $no++;
  endforeach; ?>
  </tbody>
</table>









<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer