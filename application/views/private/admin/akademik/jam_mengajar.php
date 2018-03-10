<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->


<!-- Start Sections -->
<?php echo form_open('administrator/jam_mengajar/insert', "class='form-horizontal'"); ?>
    <div class="form-group col-sm-3">
      <label class="control-label"> Jam Ke </label>
      <input name="jam_ke" class="form-control" required="required" style="width: 200px;">
    </div>

  <div class="form-group col-sm-3">
    <label class="control-label"> Waktu </label>
    <input name="jam_mengajar" type="time" class="form-control" placeholder=" ... " style="width: 200px;">
  </div>

  <div class="form-group col-sm-12">
    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
  </div>
<?php echo form_close(); ?>

    
<!-- Table -->

<table class="table table-striped">
  <thead>
    <td>No</td>
    <td>Jam Ke</td>
    <td>Waktu</td>
    <td>&nbsp;</td>
  </thead>
  <tbody>

    <?php $no = 1; ?>
    <?php foreach ($jam_mengajar as $n): ?>

    <tr>
      <td> <?php echo $no; ?> </td>
      <td> <?php echo $n['jam_ke']; ?> </td>
      <td> <?php echo $n['jam_mengajar']; ?> </td>
      <td>
        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-<?php echo $n['id_jam_mengajar']; ?>" > <span> <i class="fa fa-pencil"></i></span>  Edit </button>
        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-<?php echo $n['id_jam_mengajar']; ?>" > <span> <i class="fa fa-trash-o"></i></span>  Delete </button>
      </td>
    </tr>


    <?php $no++; ?>

    <!-- modal -->
    <?php require 'modals_jm/modal_update.php'; ?>
    <?php require 'modals_jm/modal_delete.php'; ?>

    <?php endforeach; ?>

  </tbody>
</table>



<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/admin/footer'); ?>
<!-- End Footer