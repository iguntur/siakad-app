<div id="edit-<?php echo $user ['id_user'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/users/update/'.$user['id_user']); ?>
        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon">ID</span>
            <input readonly="readonly" name="id_user" required="required" value="<?php echo $user ['id_user']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          <span id="inputSuccess2Status" class="sr-only">(success)</span>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input readonly="readonly" name="username" required="required" value="<?php echo $user ['username']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon">Hak Akses</span>
            <select name="hak_akses" class="form-control" required="required">
                <option value=" <?php echo $user['id_user'] ?> "> <?php $predikat = $user ['hak_akses'];
                                                                  if ( $predikat == 1 ) { echo "Administrator"; }
                                                                  elseif ( $predikat == 2 ) { echo "Guru"; }
                                                                  else { echo "Siswa"; }
                                                                  ?> </option>
                <option value="1">Administrator</option>
                <option value="2">Guru</option>
                <option value="3">Siswa</option>
            </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
        <label> &nbsp; </label>
          <div class="input-group">
            <span class="input-group-addon">Nama User</span>
            <input name="nama_awal" required="required" value="<?php echo $user ['nama_user']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
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