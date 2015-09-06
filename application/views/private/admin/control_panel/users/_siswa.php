<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->

<!-- Start Sections -->
<h3>Set Data User</h3>
<hr>



<hr>
<div class="row col-sm-12">
  <?php echo form_open('administrator/users/insert', "role='form'"); ?>
  <h4><?php echo validation_errors(); ?></h4>


    <div class="form-group">
      <select name="hak_akses" class="form-control" required="required">
          <option value="">Tentukan Hak Akses</option>
          <option value="1">Administrator</option>
          <option value="2">Guru</option>
          <option value="3">Siswa</option>
      </select>
    </div>
    <hr>

    <div class="form-group col-xs-6">
      <label>Nama Awal</label>
      <input name="nama_awal" type="text" class="form-control" placeholder="Nama Awal">
    </div>

    <div class="form-group col-xs-6">
      <label>Nama Akhir</label>
      <input name="nama_akhir" type="text" class="form-control" placeholder="Nama Akhir">
    </div>

    <div class="form-group col-xs-6">
      <label>Username</label>
      <input name="username" type="text" class="form-control" placeholder="username">
    </div>

    <div class="form-group col-xs-6">
      <label>Password</label>
      <input name="password" type="password" class="form-control" placeholder="password">
    </div>

      <button type="submit" class="btn btn-primary"> Save </button>
      <button class="btn btn-primary"> Batal </button>
    <hr>

  <?php echo form_close(); ?>
</div>

<!-- End Sections -->





<?php $this->load->view('_templates/private/admin/footer'); ?>