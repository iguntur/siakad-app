<div id="edit-<?php echo $siswa['nis']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/panel_siswa/update/'.$siswa['id_siswa']); ?>
      <input readonly hidden name="id_siswa" required="required" value="<?php echo $siswa ['id_siswa']; ?>" type="text">

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">NIS</span>
            <input name="nis" required="required" value="<?php echo $siswa ['nis']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          <span id="inputSuccess2Status" class="sr-only">(success)</span>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Nama</span>
            <input name="nama_siswa" required="required" value="<?php echo $siswa ['nama_siswa']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Ayah</span>
            <input placeholder="Nama Ayah" name="nama_ayah" value="<?php echo $siswa ['nama_ayah']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Ibu</span>
            <input placeholder="Nama Ibu" name="nama_ibu" value="<?php echo $siswa ['nama_ibu']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">TTL</span>
            <input name="ttl_location" value="<?php echo $siswa ['ttl_location']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="wd-addon"> &nbsp; </span>
            <input name="ttl_date" value="<?php echo $siswa ['ttl_date']; ?>" type="date" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" style="  position: relative; top: 0px; left: 70px; width: 198px;">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Agama</span>
                <select name="agama" class="form-control">
                    <option value="<?php echo $siswa['agama']; ?>"><?php echo $siswa['agama']; ?></option>
                    <option class="divider">Pilih Agama </option>
                    <option value="Islam"   >Islam      </option>
                    <option value="Kristen" >Kristen    </option>
                    <option value="Katolik" >Katolik    </option>
                    <option value="Hindu"   >Hindu      </option>
                    <option value="Budha"   >Budha      </option>
                    <option value="Konghucu">Konghucu   </option>
                    <option value="Lainnya" >Lainnya    </option>
                </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Phone</span>
            <input name="phone" value="<?php if($siswa['phone'] == false ) { echo ''; } else { echo '0' . $siswa ['phone']; } ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">L / P</span>
            <select name="gender" class="form-control" required="required">
                <option value="<?php echo $siswa['gender']; ?>"><?php echo $siswa['gender']; ?></option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-Laki">Laki - Laki</option>
            </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Gol Darah</span>
              <select name="golongan_darah" class="form-control">
                  <option value="<?php echo $siswa['golongan_darah']; ?>"><?php echo $siswa['golongan_darah']; ?></option>
                  <option class="divider">Pilih Gol Darah</option>
                  <option value="AB">AB</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="O">O</option>
              </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Kelas</span>
              <select name="kelas" class="form-control" required="required">
                  <option value="<?php echo $siswa['kelas']; ?>"><?php echo $siswa['kelas']; ?></option>
                  <?php foreach ($kelas as $n): ?>
                  <option value="<?php echo $n['kelas_jurusan'];?>">
                    <?php echo $n['kelas_jurusan'];?>
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>
        </div>


        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Angkatan</span>
              <select name="tahun_angkatan" class="form-control" required="required">
                  <option value="<?php echo $siswa['angkatan']; ?>"><?php echo $siswa['angkatan']; ?></option>
                  <option class="divider"></option>
                  <?php foreach ($tahun_ajaran as $ta): ?>
                      <option value="<?php echo $ta['nama_tahun_ajaran'];?>">
                    <?php echo $ta['nama_tahun_ajaran'];?>
                  </option>
                  <?php endforeach; ?>
              </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Email</span>
            <input name="email" value="<?php echo $siswa ['email']; ?>" type="email" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Alamat</span>
            <input name="alamat" value="<?php echo $siswa ['alamat']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
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