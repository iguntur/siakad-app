<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<div class="row col-sm-3">
  <?php echo form_open('administrator/tahun_ajaran/insert', "class='form-horizontal'"); ?>
    <div class="form-group">
      <label class="control-label"> Tahun Ajaran </label>
      <input name="nama_tahun_ajaran" type="text" class="form-control" placeholder=" Tahun Ajaran " style="width: 200px;">
      <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 15px;" >Tambah</button>
    </div>
  <?php echo form_close(); ?>
</div>

<!-- Table -->

<div class="row col-sm-9">
  <table class="table table-striped">
    <thead>
      <td>No</td>
      <td>Tahun Ajaran</td>
      <td>&nbsp;</td>
    </thead>
    <tbody>

      <?php $no = 1; ?>
      <?php foreach ($tahun_ajaran as $n): ?>

      <tr>
        <td> <?php echo $no; ?> </td>
        <td> <?php echo $n['nama_tahun_ajaran']; ?> </td>
        <td>
          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-<?php echo $n['id_thn_ajaran']; ?>" > <span> <i class="fa fa-pencil"></i></span>  Edit </button>
          <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-<?php echo $n['id_thn_ajaran']; ?>" > <span> <i class="fa fa-trash-o"></i></span>  Delete </button>
        </td>
      </tr>


      <?php $no++; ?>

      <!-- modal -->
      <?php require 'modals_thn/modal_update.php'; ?>
      <?php require 'modals_thn/modal_delete.php'; ?>

      <?php endforeach; ?>

    </tbody>
  </table>
</div>
  
    




<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer