<div id="edit-<?php echo $n['id_jurusan']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/jurusan/update/'.$n['id_jurusan']); ?>
      <input readonly hidden name="id_jurusan" required="required" value="<?php echo $n ['id_jurusan']; ?>" type="text">

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Jurusan</span>
            <input name="nama_jurusan" required="required" value="<?php echo $n ['nama_jurusan']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
            <input name="group_jurusan" required="required" value="<?php echo $n ['group_jurusan']; ?>" type="text" class="col-sm-10 form-control" placeholder="1/2/3 / or A/B/C" style="border-top: none;">
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