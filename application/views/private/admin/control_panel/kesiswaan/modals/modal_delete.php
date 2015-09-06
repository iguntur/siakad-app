<div id="delete-<?php echo $siswa['nis']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">HAPUS DATA INI ???</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/panel_siswa/delete/'.$siswa['id_siswa']); ?>
      <input readonly hidden name="id_siswa" required="required" value="<?php echo $siswa ['id_siswa']; ?>" type="text">
      <input readonly hidden name="id_user" required="required" value="<?php echo $siswa ['id_user']; ?>" type="text">
      
        <div class="form-group has-error has-feedback">
          <div class="input-group">
            <span class="input-group-addon">ID</span>
            <input readonly="readonly" name="nis" required="required" value="<?php echo $siswa ['nis']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
          <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
          <span id="inputWarning2Status" class="sr-only">(warning)</span>
        </div>

        <div class="form-group has-error has-feedback">
          <div class="input-group">
            <span class="input-group-addon">@</span>
            <input readonly="readonly" name="username" required="required" value="<?php echo $siswa ['nama_siswa']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
          <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
          <span id="inputWarning2Status" class="sr-only">(warning)</span>
        </div>              
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div> <!-- End Modal -->