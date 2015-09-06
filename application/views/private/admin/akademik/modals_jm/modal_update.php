<div id="edit-<?php echo $n['id_jam_mengajar']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/jam_mengajar/update/'.$n['id_jam_mengajar']); ?>
      <input readonly hidden name="id_jam_mengajar" required="required" value="<?php echo $n ['id_jam_mengajar']; ?>" type="text">

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Jam Ke</span>
              <input value="<?php echo $n['jam_ke']; ?>" name="jam_ke" class="form-control" required="required" style="width: 200px;">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Jam Mengajar</span>
            <input name="jam_mengajar" required="required" value="<?php echo $n ['jam_mengajar']; ?>" type="time" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
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