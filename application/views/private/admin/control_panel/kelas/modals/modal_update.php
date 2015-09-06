<div id="edit-<?php echo $n['id_kelas']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" style="width: 345px;">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/kelas/update/'.$n['id_kelas']); ?>
      <input readonly hidden name="id_kelas" required="required" value="<?php echo $n ['id_kelas']; ?>" type="text">

        <!-- Nama Kelas -->
        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Nama Kelas</span>
            <input name="nama_kelas" required="required" value="<?php echo $n ['nama_kelas']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <!-- Nama Jurusan -->
        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Nama Jurusan</span>
            <select name="nama_jurusan" class="form-control" required="required">

              <option value="<?php echo $n['nama_jurusan'] ?>"><?php echo $n['nama_jurusan'] ?></option>

              <option value="">Pilih Jurusan</option>
              <?php foreach ($jurusan as $key_nj): ?>
              <option value="<?php echo $key_nj['nama_jurusan']; ?> - <?php echo $key_nj['group_jurusan']; ?>"><?php echo $key_nj['nama_jurusan']; ?> - <?php echo $key_nj['group_jurusan']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <!-- Wali Kelas -->
        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Wali Kelas</span>
            <select name="wali_kelas" class="form-control" required="required">

              <option value="<?php echo $n['wali_kelas']; ?>"><?php echo $n['wali_kelas']; ?></option>

              <option value="Belum Ada Wali Kelas">Tentukan Wali Kelas</option>
              <?php foreach ($wali_kelas as $y): ?>
              <option value="<?php echo $y['nip'] ?>"> <?php echo $y['nip'] ?> | <?php echo $y['nama_pengajar'] ?></option>
              <?php endforeach; ?>
            </select>
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