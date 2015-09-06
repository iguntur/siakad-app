<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->



<!-- Start Sections -->
<div class="cp-kesiswaan">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title"> # Kesiswaan </h4>
    </div>
    <div style="padding: 10px;" class="row" >

<?php foreach ($siswa as $n): ?>
  

  <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> NIS : </label>
          <span> <?php echo $n['nis']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Nama Siswa : </label>
          <span> <?php echo $n['nama_siswa']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> TTL : </label>
          <span> <?php echo $n['ttl_location']; ?>, </span>
          <span> <?php echo $n['ttl_date']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Jenis Kelamin : </label>
          <span> <?php echo $n['gender']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Kelas : </label>
          <span> <?php echo $n['kelas']; ?> </span>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Jurusan : </label>
          <span> <?php echo $n['jurusan']; ?> </span>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> HP : </label>
          <span> +62 <?php echo $n['phone']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Email : </label>
          <span> <?php echo $n['email']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Alamat : </label>
          <span> <?php echo $n['alamat']; ?> </span>
        </div>
  </div>

  <div class="col-xs-3 col-sm-3">
        <a href="#" class="thumbnail">
          <img src="http://placehold.it/300x300">
        </a>
  </div>
      

<?php endforeach; ?>





    </div >
  </div>
</div>
<!-- End Sections -->

<?php $this->load->view('_templates/private/admin/footer'); ?>