<tr class="<?php echo ($id_nilai == 0) ? "danger" : "" ; ?>">
    <td> <input type="hidden" name="nis[]" value="<?php echo $nis; ?>"> <?php echo $nis; ?></td>
    <td> <?php echo $nama_siswa; ?> </td>
    <td> <input value="<?php echo $tugas; ?>" name="tugas[]" type="number" min="0" max="100" class="form-input-nilai"> </td>
    <td> <input value="<?php echo $uts; ?>" name="uts[]" type="number" min="0" max="100" class="form-input-nilai"> </td>
    <td> <input value="<?php echo $uas; ?>" name="uas[]" type="number" min="0" max="100" class="form-input-nilai"> </td>
    <td> <input value="<?php echo $absensi; ?>" name="absensi[]" type="number" min="0" max="100" class="form-input-nilai"> </td>
    <td> <input value="<?php echo $norma; ?>" name="norma[]" type="number" min="0" max="100" class="form-input-nilai"> </td>
    <td> <?php echo $hasil; ?> </td>

    <td hidden="hidden"> <input type="hidden" name="id_nilai[]" value="<?php echo $id_nilai; ?>"> </td>
    <td hidden="hidden"> <input type="hidden" name="tahun_ajaran[]" value="<?php echo $tahun_ajaran; ?>"> </td>
    <td hidden="hidden"> <input type="hidden" name="semester[]" value="<?php echo $semester; ?>"> </td>
    <td hidden="hidden"> <input type="hidden" name="mapel[]" value="<?php echo $mapel; ?>"> </td>
    <td hidden="hidden"> <input type="hidden" name="nip[]" value="<?php echo $nip; ?>"> </td>
</tr>

