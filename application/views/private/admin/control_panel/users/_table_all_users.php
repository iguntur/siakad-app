<!-- Start Sections -->
<h3>All User</h3>
<hr>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Username</th>
      <th>Hak Akses</th>
      <th>Nama Users</th>
      <th> &nbsp; </th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($users as $user): ?>
    
    <tr>
      <td><?php echo $user ['username'] ?></td>
      <td>
        <?php $predikat = $user ['hak_akses'];
          if ( $predikat == 1 ) { echo "Administrator"; }
          elseif ( $predikat == 2 ) { echo "Guru"; }
          else { echo "Siswa"; }
        ?>
      </td>
      <td><?php echo $user ['nama_user'] ?></td>
      <td>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $user ['id_user'] ?>"> <i class="fa fa-pencil-square-o"></i> </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $user ['id_user'] ?>"> <i class="fa fa-trash-o"></i></button>

      </td>
    </tr>

<!-- modal -->
<?php require ('modals/modal_update.php'); ?>
<?php require ('modals/modal_delete.php'); ?>

  <?php endforeach; ?>
  </tbody>
</table>


<!-- End Sections -->