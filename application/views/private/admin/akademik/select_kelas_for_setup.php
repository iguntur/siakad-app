<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->
<!-- Start Sections -->
<h3><?php echo $titlebar; ?></h3> <hr>
<div class="row col-md-12">

<!-- Tab Panels -->
<div class="getclass">
    <label>KELAS</label><br>
    <button id="btnKelas10" class="btn btn-success btn-theme-kelas">10</button>
    <button id="btnKelas11" class="btn btn-success btn-theme-kelas">11</button>
    <button id="btnKelas12" class="btn btn-success btn-theme-kelas">12</button>
</div>



<!-- Show Active ID Kelas 10 -->
<div role="tabpanel" class="deactivated show animated bounceInRight" id="tabKelas10">
      <?php foreach ($kelas10 as $field): ?>
            <div class="select-kelas">
                <label class="nama-kelas"><span><?php echo $field['nama_kelas']; ?><br></span><?php echo $field['nama_jurusan']; ?></label>
                <p class="nama-wali-kelas"><span><?php echo $field['wali_kelas']; ?></span></p>

                <!-- Pane Select Kelas -->
                <?php echo form_open('administrator/jadwal_akademik/setup', array('id' => 'foobar')); ?>
                    <input readonly hidden type="text" name="id_kelas" value="<?php echo $field['id_kelas']; ?>">
                    <select required="required" name="tahun_ajaran" class="form-control select-foo">
                      <option value="">Tahun Ajaran</option>
                        <?php foreach ($tahun_ajaran as $value): ?>
                        <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select required="required" name="semester" class="form-control select-foo" style="margin-top: 5px;">
                      <option value="">Semester</option>
                      <option value="I">I - Pertama</option>
                      <option value="II">II - Kedua</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-warning btn-foo"><i class="fa fa-check"></i></button>
                <?php echo form_close(); ?>
            </div>
      <?php endforeach; ?>
</div>


<!-- Show Active ID Kelas 11 -->
<div role="tabpanel" class="deactivated" id="tabKelas11">
      <?php foreach ($kelas11 as $field): ?>
            <div class="select-kelas">
                <label class="nama-kelas"><span><?php echo $field['nama_kelas']; ?><br></span><?php echo $field['nama_jurusan']; ?></label>
                <p class="nama-wali-kelas"><span><?php echo $field['wali_kelas']; ?></span></p>

                <!-- Pane Select Kelas -->
                <?php echo form_open('administrator/jadwal_akademik/setup', array('id' => 'foobar')); ?>
                    <input readonly hidden type="text" name="id_kelas" value="<?php echo $field['id_kelas']; ?>">
                    <select required="required" name="tahun_ajaran" class="form-control select-foo">
                      <option value="">Tahun Ajaran</option>
                        <?php foreach ($tahun_ajaran as $value): ?>
                        <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select required="required" name="semester" class="form-control select-foo" style="margin-top: 5px;">
                      <option value="">Semester</option>
                      <option value="I">I - Pertama</option>
                      <option value="II">II - Kedua</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-warning btn-foo"><i class="fa fa-check"></i></button>
                <?php echo form_close(); ?>
            </div>
      <?php endforeach; ?>
</div>

<!-- Show Active ID Kelas 12 -->
<div role="tabpanel" class="deactivated" id="tabKelas12">
      <?php foreach ($kelas12 as $field): ?>
            <div class="select-kelas">
                <label class="nama-kelas"><span><?php echo $field['nama_kelas']; ?><br></span><?php echo $field['nama_jurusan']; ?></label>
                <p class="nama-wali-kelas"><span><?php echo $field['wali_kelas']; ?></span></p>

                <!-- Pane Select Kelas -->
                <?php echo form_open('administrator/jadwal_akademik/setup', array('id' => 'foobar')); ?>
                    <input readonly hidden type="text" name="id_kelas" value="<?php echo $field['id_kelas']; ?>">
                    <select required="required" name="tahun_ajaran" class="form-control select-foo">
                      <option value="">Tahun Ajaran</option>
                        <?php foreach ($tahun_ajaran as $value): ?>
                        <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select required="required" name="semester" class="form-control select-foo" style="margin-top: 5px;">
                      <option value="">Semester</option>
                      <option value="I">I - Pertama</option>
                      <option value="II">II - Kedua</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-warning btn-foo"><i class="fa fa-check"></i></button>
                <?php echo form_close(); ?>
            </div>
      <?php endforeach; ?>
</div>








</div>
<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer
