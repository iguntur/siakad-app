<table class="table table-hover">
            <thead>
                <tr>
                    <th>Bidang Studi</th>
                    <th>Absensi</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Norma/Sikap</th>
                    <th>Rata - Rata</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($eval as $value): ?>
    
                <tr>
                        <td> <?php echo $value['mata_pelajaran']; ?> </td>
                        <td> <?php echo $value['absensi']; ?>        </td>
                        <td> <?php echo $value['tugas']; ?>          </td>
                        <td> <?php echo $value['uts']; ?>            </td>
                        <td> <?php echo $value['uas']; ?>            </td>
                        <td> <?php echo $value['norma']; ?>          </td>
                        <td> <?php echo $value['hasil']; ?>          </td>
                        <td class="grade grade-<?php $grade = $value['hasil'];
                                if ($grade >= 90) {echo 'A'; }
                                elseif ($grade >= 75) {echo 'B'; }
                                elseif ($grade >= 60) { echo 'C'; }
                                elseif ($grade >= 55) { echo 'D'; }
                                else { echo 'E'; }
                            ?>"> <span class="span-grade"><?php $grade = $value['hasil'];
                                if ($grade >= 90) {echo "A"; }
                                elseif ($grade >= 75) {echo "B"; }
                                elseif ($grade >= 60) { echo "C"; }
                                elseif ($grade >= 55) { echo "D"; }
                                else { echo "E"; }
                            ?></span>
                        </td>
                </tr>
<?php endforeach; ?>
            </tbody>

</table>