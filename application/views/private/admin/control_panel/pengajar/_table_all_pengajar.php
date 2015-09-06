<div style="padding: 25px 0">
<!--  -->
<table id="guru_tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Pengajar / Guru</th>
                <th>TTL</th>
                <th>HP</th>
                <th>L/P</th>
                <th>Email</th>
                <th>Alamat</th>
                <th> &nbsp; </th>
                <th>Aktivasi</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>NIP</th>
                <th>Nama Pengajar / Guru</th>
                <th>TTL</th>
                <th>HP</th>
                <th>L/P</th>
                <th>Email</th>
                <th>Alamat</th>
                <th> &nbsp; </th>
                <th>Aktivasi</th>
            </tr>
        </tfoot>
 
        <tbody>
          <?php foreach ($staff as $staff): ?>
            <tr>
                <td> <?php echo $staff ['nip'] ?> </td>
                <td> <a href=" <?php echo base_url() . 'profile/staff/' . $staff['nip'] ?> " target="_blank">
                        <span class="btn btn-xs btn-primary"> <i class="fa fa-search-plus"></i> </span>
                        <?php echo $staff ['nama_pengajar']; ?>
                     </a>
                </td>
                <td> <?php echo $staff ['ttl_location'] ?> </td>
                <td> +62 <?php echo $staff ['phone'] ?> </td>
                <td> <?php echo $staff ['gender'] ?> </td>
                <td> <?php echo $staff ['email'] ?> </td>
                <td> <?php echo $staff ['alamat'] ?> </td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $staff['id_pengajar']; ?>"> <i class="fa fa-pencil-square-o"></i> </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $staff['id_pengajar']; ?>"> <i class="fa fa-trash-o"></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#set_user-<?php echo $staff['id_user']; ?>"> <i class="fa fa-key"></i></button>
                </td>
            </tr>

            <!-- modal -->
            <?php require ('modals/modal_update.php'); ?>
            <?php require ('modals/modal_delete.php'); ?>
            <?php require ('modals/modal_set_user.php'); ?>

          <?php endforeach; ?>
        </tbody>
    </table>
            


<!--  -->
</div>