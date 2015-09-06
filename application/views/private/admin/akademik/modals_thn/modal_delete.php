<div id="delete-<?php echo $n ['id_thn_ajaran']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" > Apakah Anda Yakin Ingin Menghapus Data Ini? </label>
      </div>

      <div class="modal-body">
        <?php echo form_open('administrator/tahun_ajaran/delete/'.$n['id_thn_ajaran']); ?>
        <input readonly hidden name="id_thn_ajaran" required="required" value="<?php echo $n ['id_thn_ajaran']; ?>" type="text">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      <?php echo form_close(); ?>
      </div>
      
  </div>
</div> <!-- End Modal -->
      