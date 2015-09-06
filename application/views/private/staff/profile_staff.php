<!-- Start header -->
<?php $this->load->view('_templates/public/head'); ?>
<!-- End header -->



<!-- Start Sections -->
<div class="cp-kesiswaan">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title"> # Data Staff </h4>
    </div>
    <div style="padding: 10px;" class="row" >

<?php foreach ($staff as $n): ?>
  

  <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> NIP : </label>
          <span> <?php echo $n['nip']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Nama Lengkap : </label>
          <span> <?php echo $n['nama_pengajar']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> TTL : </label>
          <span> <?php echo $n['ttl_location']; ?>, </span>
          <span> <?php echo $n['ttl_date']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Jenis Kelamin : </label>
          <span> <?php echo $n['gender']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Jabatan : </label>
          <span> <?php echo $n['jabatan']; ?> </span>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Pengajar Bidang Studi : </label>
          <span> <?php echo $n['guru_bid_studi']; ?> </span>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> HP : </label>
          <span> +62 <?php echo $n['phone']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Email : </label>
          <span> <?php echo $n['email']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-staff"> Alamat : </label>
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

<?php $this->load->view('_templates/public/footer'); ?>