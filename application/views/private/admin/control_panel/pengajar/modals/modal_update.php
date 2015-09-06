<div id="edit-<?php echo $staff['id_pengajar']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">EDIT DATA</h3>
      </div>

      <div class="modal-body">
      <?php echo form_open('administrator/staff/update/'.$staff['id_pengajar']); ?>
      <input readonly hidden name="id_pengajar" required="required" value="<?php echo $staff ['id_pengajar']; ?>" type="text">

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">NIP</span>
            <input name="nip" required="required" value="<?php echo $staff ['nip']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          <span id="inputSuccess2Status" class="sr-only">(success)</span>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Nama</span>
            <input name="nama_pengajar" required="required" value="<?php echo $staff ['nama_pengajar']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">TTL</span>
            <input name="ttl_location" value="<?php echo $staff ['ttl_location']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="wd-addon"> &nbsp; </span>
            <input name="ttl_date" value="<?php echo $staff ['ttl_date']; ?>" type="date" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" style="  position: relative; top: 0px; left: 70px; width: 198px;">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Agama</span>
                <select name="agama" class="form-control">
                    <option value="<?php echo $staff ['agama']; ?>"><?php echo $staff ['agama']; ?></option>
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
            <input name="phone" value="<?php if($staff['phone'] == false ) { echo ''; } else { echo '0' . $staff['phone']; } ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">L / P</span>
            <select name="gender" class="form-control" required="required">
                <option value="<?php echo $staff['gender']; ?>"><?php echo $staff['gender']; ?></option>
                <option class="divider">Pilih Jenis Kelamin</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-laki">Laki - Laki</option>
            </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Gol Darah</span>
              <select name="golongan_darah" class="form-control">
                  <option value="<?php echo $staff['golongan_darah']; ?>"><?php echo $staff['golongan_darah']; ?></option>
                  <option class="divider">Pilih Golongan Darah</option>
                  <option value="AB">AB</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="O">O</option>
              </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Email</span>
            <input name="email" value="<?php echo $staff ['email']; ?>" type="email" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Alamat</span>
            <input name="alamat" value="<?php echo $staff ['alamat']; ?>" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
          </div>
        </div>

        <!--  -->

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Jabatan</span>
            <select name="jabatan" class="form-control">
              <option value="<?php echo $staff ['jabatan']; ?>"><?php echo $staff ['jabatan']; ?></option>
              <option class="divider"> Pilih Jabatan </option>
              <?php foreach ($jabatan as $n): ?>
                <option value="<?php echo $n['nama_jabatan']; ?>"> <?php echo $n['nama_jabatan']; ?> </option>
              <?php endforeach; ?>            
            </select>
          </div>
        </div>

        <div class="form-group has-success has-feedback">
          <div class="input-group">
            <span class="input-group-addon wd-addon">Bidang Studi</span>
            <select name="guru_bid_studi" class="form-control">
              <option value="<?php echo $staff ['guru_bid_studi']; ?>"> <?php echo $staff ['guru_bid_studi']; ?> </option>
              <option class="divider">Pilih Bidang Studi</option>
              <?php foreach ($mapel as $n): ?>
                <option value="<?php echo $n['kode_mapel']; ?>">
                  <?php echo $n['kode_mapel']; ?> | <?php echo $n['nama_mapel']; ?>
                </option>
              <?php endforeach; ?>      
            </select>
          </div>
        </div>




        <!--  -->


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
      </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div> <!-- End Modal -->