<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<?php echo form_open('administrator/kelas/insert', "class='form-horizontal'"); ?>
  <div class="form-group">
    <label class="col-sm-2 control-label"> Nama Kelas </label>
    <div class="col-sm-10">
      <input name="nama_kelas" type="text" class="col-sm-10 form-control" placeholder="Nama Kelas" style="width: 200px;">
    </div>
  </div>
      

  <!-- Select Jurusan -->
  <div class="form-group">
    <label class="col-sm-2 control-label"> Nama Jurusan </label>
      <div class="col-sm-10">
          <select name="nama_jurusan" class="form-control control-kelas" required="required">
              <option value="">Pilih Jurusan</option>
              <?php foreach ($jurusan as $n): ?>
              <option value="<?php echo $n['nama_jurusan']; ?> - <?php echo $n['group_jurusan']; ?>"><?php echo $n['nama_jurusan']; ?> - <?php echo $n['group_jurusan']; ?></option>
              <?php endforeach; ?>
          </select>
      </div>              
  </div>

  <!-- Select wali Kelas -->
  <div class="form-group">
    <label class="col-sm-2 control-label"> Wali Kelas </label>
      <div class="col-sm-10">
          <select name="wali_kelas" class="form-control control-kelas" required="required">
              <option value="Belum Ada Wali Kelas">Tentukan Wali Kelas</option>
              <?php foreach ($wali_kelas as $key_w): ?>
              <option value="<?php echo $key_w['nip']; ?>"> <?php echo $key_w['nip']; ?> | <?php echo $key_w['nama_pengajar']; ?> </option>
              <?php endforeach; ?>
          </select>
      </div>              
  </div>
  <input type="submit" class="btn btn-sm btn-primary btn-save-kelas" value="Tambah" style="margin-left: 25px;">

    
<?php echo form_close(); ?>


<table id="kelas_tabel" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <td>No</td>
    <td>Nama Kelas & Jurusan</td>
    <td>Wali Kelas</td>
    <td>&nbsp;</td>
  </thead>
  <tbody>

    <?php $no = 1; ?>
    <?php foreach ($kelas as $n): ?>

    <tr>
      <td> <?php echo $no; ?> </td>
      <td> <?php echo $n['kelas_jurusan']; ?></td>
      <td> <?php echo $n['nip']; ?> | <?php echo $n['nama_pengajar']; ?>  </td>
      <td>
        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-<?php echo $n['id_kelas']; ?>" > <span> <i class="fa fa-pencil"></i></span>  Edit </button>
        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-<?php echo $n['id_kelas']; ?>" > <span> <i class="fa fa-trash-o"></i></span>  Delete </button>
      </td>
    </tr>


    <?php $no++; ?>

    <!-- modal -->
    <?php require 'modals/modal_update.php'; ?>
    <?php require 'modals/modal_delete.php'; ?>

    <?php endforeach; ?>

  </tbody>
</table>
  
  
    
    







<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer