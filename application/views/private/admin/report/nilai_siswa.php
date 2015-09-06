<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->
<!-- Start Sections -->

<div class="panel-heading">
<span class="pull-left"><h3>Nilai Siswa</h3></span>
<span class="pull-right" style="margin-top: 15px"> <button class="btn btn-danger" onclick="closeWindow()">Close</button> </span>
</div> <hr>


<div id="windowprint">
<div class="cp-kesiswaan">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title"> Biodata Siswa </h4>
    </div>
    <div style="padding: 10px;" class="row">
<?php foreach ($siswa as $n): ?>
  <div class="col-xs-9 col-sm-9 col-md-9">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> NIS : </label>
          <span> <?php echo $n['nis']; ?> </span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <label class="label-siswa"> Nama : </label>
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
          <label class="label-siswa"> Tahun Angkatan : </label>
          <span> <?php echo $n['angkatan']; ?> </span>
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

    <!-- Tabel Nilai Siswa -->
<div class="cp-kesiswaan">
  <div class="panel panel-primary">
    <div class="panel-heading" style="height: 47px;">
      <span class="pull-left"><h4 class="panel-title"> Nilai Siswa </h4></span>
      <span class="pull-right">
          <div class="filter-get-nilai">
              <select id="filterTa" class="findnilai" name="tahun_ajaran">
                <option value='' selected>Tahun Ajaran</option>
                <?php foreach ($tahun_ajaran as $value): ?>
                <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
                <?php endforeach; ?>
                <input style="display: none" class="tahun_ajaran" type="hidden" value="" name="tahun_ajaran" placeholder="Tahun Ajaran">
              </select>
                  
              <select id="filterSr" class="findnilai" name="semester">
                <option value='' selected>Semester</option>
                <option value="I">I (Pertama)</option>
                <option value="II">II (Ke Dua)</option>
                <input style="display: none" class="semester" type="hidden" value="" name="semester" placeholder="Semester">
              </select>
              <button id="nis" class="btn btn-sm btn-warning" data-nis="<?php echo $nis; ?>"><i class="fa fa-search"></i> Search</button>
          </div>
      </span>
    </div>
    <div style="padding: 10px;" class="row" >
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="result-nilai hide"></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Sections -->
<?php $this->load->view('_templates/private/admin/footer'); ?>


        






