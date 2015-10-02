<div class="container-fluid" style="margin-top: 25px" >
<?php echo
  form_open_multipart('administrator/panel_siswa/insert', "class='form-horizontal col-md-12' autocomplete='off'");
?>
<h4><?php echo validation_errors(); ?></h4>

<div class="container col-md-12" style="margin-bottom: 25px;">
    <button type="submit" class="btn btn-primary"> Save </button>
</div>
  
<div class="col-md-9">
    <div class="form-group">
      <label class="col-sm-2 control-label">N I S</label>
      <div class="col-sm-10">
        <input id="inputNis" required="required" name="nis" type="number" class="form-control" placeholder="NIS" value="">
        <span class="nis-invalid" style="display:none"></span>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-10">
        <input required="required" name="nama_siswa" type="text" class="form-control" placeholder="Nama Lengkap Siswa">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Orang Tua</label>
          <div class="col-sm-10" style="display: flex">
            <input name="nama_ayah" type="text" class="form-control" placeholder="Nama Ayah" style="width: 50%; float: left; margin-right: 2%;">
            <br>
            <input name="nama_ibu" type="text" class="form-control" placeholder="Nama Ibu" style="width: 50%; float: left;">
          </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Kelas - Jurusan</label>
      <div class="col-sm-10">
        <select name="kelas" class="form-control" required="required">
            <option value="">Pilih Kelas - Jurusan</option>
            <?php foreach ($kelas as $n): ?>
            <option value="<?php echo $n['kelas_jurusan'];?>">
              <?php echo $n['kelas_jurusan'];?>
            </option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Tahun Ajaran</label>
      <div class="col-sm-10">
        <select name="tahun_ajaran" class="form-control" required="required">
            <option value="">Tahun Ajaran Baru</option>
            <?php foreach ($tahun_ajaran as $ta): ?>
            <option value="<?php echo $ta['nama_tahun_ajaran'];?>">
              <?php echo $ta['nama_tahun_ajaran'];?>
            </option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">T T L</label>
      <div class="col-sm-10" style="display: flex">
        <input name="ttl_location" type="text" class="form-control" placeholder="TTL" style="width: 50%; float: left; margin-right: 2%;">
        <br>
        <input name="ttl_date" type="date" class="form-control" style="width: 50%; float: left;">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Agama</label>
          <div class="col-sm-10">
                <select name="agama" class="form-control" style="width: 50%;">
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

    <div class="form-group">
      <label class="col-sm-2 control-label">Phone</label>
      <div class="col-sm-10">
        <input name="phone" type="text" class="form-control" placeholder="Phone">
      </div>
    </div>

<!-- -->
    
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                
                <label class="radio-inline">
                    <input required="required" name="gender" type="radio" value="Laki-Laki"> Laki-Laki
                        </label>
                <br>

                <label class="radio-inline">
                    <input required="required" name="gender" type="radio" value="Perempuan"> Perempuan
                        </label>
              </div>
          </div>          

          <div class="form-group">
            <label class="col-sm-2 control-label">Golongan Darah</label>
              <div class="col-sm-10">
                
                <label class="radio-inline">
                    <input name="golongan_darah" type="radio" value="AB"> AB
                        </label> <br>          

                <label class="radio-inline">
                    <input name="golongan_darah" type="radio" value="A"> A
                        </label> <br>

                <label class="radio-inline">
                    <input name="golongan_darah" type="radio" value="B"> B
                        </label> <br>

                <label class="radio-inline">
                    <input name="golongan_darah" type="radio" value="O"> O
                        </label>
              </div>
          </div>
<!--  -->

    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input name="email" type="email" class="form-control" placeholder="Email">
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label">Alamat</label>
      <div class="col-sm-10">
        <textarea name="alamat" class="form-control" rows="3"></textarea>
      </div>
    </div>
</div> <!-- // Col Md 9 -->


<div class="col-md-3">
  <div class="gravatar img-thumbnail"> </div>
  <?php echo form_upload('userfile'); ?>
</div>


<?php echo form_close(); ?>
</div>
