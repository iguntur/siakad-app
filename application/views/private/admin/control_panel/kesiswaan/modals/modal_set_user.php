<div id="set_user-<?php echo $siswa['id_user']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Set Username And Password</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/users/aktivasi_siswa/'.$siswa['id_user']); ?>

        <input readonly hidden name="id_user" required="required" value="<?php echo $siswa ['id_user']; ?>" type="text">
        <input readonly hidden name="nama_user" required="required" value="<?php echo $siswa ['nama_user']; ?>" type="text">
        <input readonly hidden name="hak_akses" required="required" value="3" type="text">

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input name="username" placeholder='Choose Username' required="required" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" value="<?php
            $username = $siswa ['username'];
            if (empty($username)) { echo ""; }
            else { echo $username; }
            ?>">

          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input readonly required="required" type="password" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" value="<?php echo $siswa ['password']; ?>">
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
      </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div> <!-- End Modal -->