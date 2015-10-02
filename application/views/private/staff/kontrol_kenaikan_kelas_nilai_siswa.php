<!-- Start header -->
<?php $this->load->view('_templates/private/guru/head'); ?>
<!-- End header -->
<!-- Start Sections -->
<h3>Evaluasi Nilai || Kenaikan Kelas</h3> <hr>
<div class="row jumbotron">
    <div class="col-md-4 pull-left">
        <label style="width: 100px">NIP</label>
        <span><?php echo $wali_kelas['nip']; ?></span>
        <br>

        <label style="width: 100px">NAMA</label>
        <span><?php echo $wali_kelas['nama_pengajar']; ?></span>
        <br>

        <label style="width: 100px">Jabatan</label>
        <span><?php echo $wali_kelas['jabatan']; ?></span>
        <br>

        <label style="width: 100px">Bidang Studi</label>
        <span><?php if ($wali_kelas['guru_bid_studi'] == false ) { echo "Bidang Studi Tidak Tersedia"; } else { echo $wali_kelas['guru_bid_studi']; } ?></span>
    </div>

    <div class="col-md-6 alert alert-info pull-right">
        <div class="class-center">
            <button class="btn btn-lg btn-primary">Proses All</button>
        </div> <br>
        <ol class="class-center">            
            <li>Proses semua data jika, semua siswa memenuhi syarat naik kelas.</li>
            <li>Mohon untuk mengecek nilai setiap siswa terlebih dahulu sebelum memproses data.</li>
            <li>Untuk memproses data per siswa, silahkan abaikan tombol di atas dan proses pada kolom siswa masing-masing.</li>
        </ol>
    </div>
<hr>

<div class="alert alert-warning class-center">
    <h2>Fitur Ini Hanya Contoh / Demo <br> & <br> Belum Akan Dikembangkan <br> Sampai Batas Waktu Yang Belum Ditentukan!!! </h2>
</div>

</div>
<hr>


<!-- siswa and nilai loop -->
<?php foreach ($siswa_in_class as $value): ?>
<div class="row panel panel-primary">
    <div class="panel-heading"> <h3 class="panel-title"># <?php echo $value['nama_siswa']; ?> #</h3> </div>
    <div class="panel-body">
    
<!-- KOLOM BIODATA -->
        <div class="col-md-5 col-sm-12">
            <div class="wrapper-profil-siswa row">
                <div class="col-sm-12 photo-siswa"><img src="http://fillmurray.com/250/250" alt="profile"></div>
                <div class="col-sm-12 bio-siswa">
                    <label><?php echo $value['nis']; ?></label>
                    <label for="nama-siswa"><?php echo $value['nama_siswa']; ?></label>
                    <label for="jurusan-siswa"><?php echo $value['kelas']; ?></label>
                    <label for="gender-siswa"><?php echo $value['gender']; ?></label>
                    <label for="phone-siswa">0<?php echo $value['phone']; ?></label>
                </div>

                <div class="col-sm-12">
                    <button class="btn btn-success" title="Klik Jika Memenuhi Syarat"> <i class="fa fa-check"></i> Naik Kelas</button>
                    <button class="btn btn-danger" title="Klik Jika Tidak Memenuhi Syarat"> <i class="fa fa-close"></i> Tidak Naik Kelas</button>
                </div>

            </div>
        </div>
<!-- END KOLOM BIODATA -->
<!-- KOLOM NILAI -->
        <div class="col-md-7 col-sm-12">
            <!-- Semester 1 -->
                    <div class="panel panel-success">
                      <div class="panel-heading select-peer" data-req-nis="<?php echo $value['nis']; ?>" data-req-seems="I">
                      <h3 class="panel-title">Semester I</h3> </div>
                      <div id="<?php echo $value['nis']; ?>_I" class="panel-body result-eval" style="display: none">


                      </div>
                    </div>

            <!-- Semester 2 -->
                    <div class="panel panel-success">
                      <div class="panel-heading select-peer" data-req-nis="<?php echo $value['nis']; ?>" data-req-seems="II">
                      <h3 class="panel-title">Semester II</h3> </div>
                      <div id="<?php echo $value['nis']; ?>_II" class="panel-body result-eval" style="display: none">


                      </div>
                    </div>
        </div>
<!-- END KOLOM NILAI -->

    </div> <!-- END PANEL BODY -->
</div> <!-- END ROW -->
<?php endforeach; ?>
<!-- end loop siswa -->
<div style="margin-bottom: 100px;">&nbsp;</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".panel-heading").css('cursor','pointer');
    var uri = document.baseURI;

    var grabNis = $(".select-peer");
    $(grabNis).click(function() {
        var reqNis  = $(this).attr("data-req-nis");
        var reqSeem = $(this).attr("data-req-seems");
        $.ajax({
            type    : 'GET',
            url     : uri + 'staff/control_kenaikan_kelas/reqNilai',
            data    : { nis: reqNis, semester: reqSeem },
            success : function(result) {
                      // Result
                      if (reqSeem == 'I') {
                            $("#" + reqNis + "_I")
                                .slideToggle(100, function() {
                                    $(this).html(result);
                                });
                            
                      } else {
                            $("#" + reqNis + "_II")
                                .slideToggle(100, function() {
                                    $(this).html(result);
                                });
                      };
            },
            error   : function(result) {
                      // Console Errorr
                      console.log("GAGAL REQUEST");
            }
        });
    });
});
</script>
<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/guru/footer'); ?>
<!-- End Footer
