<div style="padding: 25px 0">
<!--  -->

<table id="siswa_tabel" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Tahun Angkatan</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Kelas & Jurusan</th>
                <th> &nbsp; </th>
                <th>Aktivasi</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>NIS</th>
                <th>Tahun Angkatan</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Kelas & Jurusan</th>
                <th> &nbsp; </th>
                <th>Aktivasi</th>
            </tr>
        </tfoot>
 
        <tbody>
          <?php foreach ($siswa as $siswa): ?>
            <tr>
                <td> <?php echo $siswa ['nis'] ?> </td>
                <td> <?php echo $siswa ['angkatan'] ?> </td>
                <td> <a href=" <?php echo base_url() . 'profile/siswa/' . $siswa ['nis'] ?> " target="_blank">
                        <span class="btn btn-xs btn-primary"> <i class="fa fa-search-plus"></i> </span>
                        <?php echo $siswa ['nama_siswa']; ?>
                     </a>
                </td>
                <td> <?php echo $siswa ['gender'] ?> </td>
                <td> <?php echo $siswa ['kelas'] ?> </td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-<?php echo $siswa['nis']; ?>"> <i class="fa fa-pencil-square-o"></i> </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $siswa['nis']; ?>"> <i class="fa fa-trash-o"></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#set_user-<?php echo $siswa['id_user']; ?>"> <i class="fa fa-key"></i></button>
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