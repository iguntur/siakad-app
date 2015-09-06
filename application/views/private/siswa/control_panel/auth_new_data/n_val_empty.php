<?php echo form_open('staff/input_nilai/form_input'); ?>
<div class='to-input'>

  <div class="form-group">
    <label>Nama Kelas</label>
    <input readonly type='text' class='no-border' name='n_kelas' value='<?php if (empty($s_kelas)) {echo 'Pilih Kelas'; } else {echo $s_kelas; } ?>'>
  </div>

  <div class="form-group">
    <label>Nama Jurusan</label>
    <input readonly type='text' class='no-border' name='n_jurusan' value='<?php if (empty($s_jurusan)) {echo 'Pilih Jurusan'; } else {echo $s_jurusan; } ?>'>
  </div>

  <div class="form-group">
    <label>Tahun Ajaran</label>
    <input readonly type='text' class='no-border' name='n_ta' value='<?php if (empty($s_ta)) {echo 'Pilih Tahun Ajaran'; } else {echo $s_ta; } ?>'>
  </div>
  <div class="form-group">
    <label>Mata Pelajaran</label>
    <input readonly type='text' class='no-border' name='n_mapel' value='<?php if (empty($s_mapel)) {echo 'Pilih Mata Pelajaran'; } else {echo $s_mapel; } ?>'>
  </div>  

</div>
<button type="submit" class="btn btn-sm btn-primary" style="margin-bottom: 20px;">Data Baru</button>

<?php echo form_close(); ?>