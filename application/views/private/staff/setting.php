<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<h3> Updates / Settings </h3>
<hr>

<?php echo form_open('staff/setting/changes'); ?>
<h4><?php echo validation_errors(); ?></h4>

  <?php foreach ($users as $user): ?>

      <input readonly hidden type="text" name="id_user" value="<?php echo $user['id_user']; ?>">

      <div class="input-group" style="margin-bottom : 20px">
        <span class="input-group-addon" id="sizing-addon2" style="width : 50px">Nama Akun/User</span>
        <input type="text" class="form-control" name="account" value="<?php echo $user['nama_user']; ?>" placeholder="Account Name" aria-describedby="sizing-addon2">
      </div>
    
      <div class="input-group" style="margin-bottom : 20px">
        <span class="input-group-addon" id="sizing-addon2" style="width : 50px">Username</span>
        <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" placeholder="Username" aria-describedby="sizing-addon2">
      </div>

      <div class="input-group" style="margin-bottom : 20px">
        <span class="input-group-addon" id="sizing-addon2" style="width : 50px">Password</span>
        <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon2">
      </div>
      <hr>

  <?php endforeach; ?>

  <button type="submit" class="btn btn-primary">Change</button>
<?php echo form_close(); ?>
<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer