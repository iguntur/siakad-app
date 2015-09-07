<!-- Start header -->
<?php $this->load->view('_templates/private/siswa/head'); ?>
<!-- End header -->
<h2>Sistem Informasi Akademik</h2><hr>
<!-- Start Sections -->
<div class="btn-scroll-class jumbotron">
    <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
        <label for="kelas_jurusan">Kelas Jurusan</label>
        <select class="select-kelas_jurusan form-control" name="kelas_jurusan">
            <option value="" selected="selected">Select Option</option>
            <?php foreach ($kelas_jurusan as $value): ?>
                <option value="<?php echo $value['id_kelas'];?>"><?php echo $value['kelas_jurusan']; ?></option>   
            <?php endforeach; ?>
        </select>
        <input id="a1" type="hidden" value="0" name="kelas_jurusan" style="display: none">
    </div>

    <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
        <label for="tahun_ajaran">Tahun Ajaran</label>
        <select class="select-tahun_ajaran form-control" name="tahun_ajaran">
            <option value="" selected="selected">Select Option</option>
            <?php foreach ($tahun_ajaran as $value): ?>
                  <option value="<?php echo $value['nama_tahun_ajaran']; ?>"><?php echo $value['nama_tahun_ajaran']; ?></option>
            <?php endforeach; ?>
        </select>
        <input id="a2" type="hidden" value="0" name="tahun_ajaran" style="display: none">
    </div>
  
    <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
        <label for="semester">Semester</label>
        <select class="select-semester form-control" name="semester">
            <option value="" selected="selected">Select Option</option>
            <option value="I"> I - Pertama </option>
            <option value="II"> II - Kedua </option>
        </select>
        <input id="a3" type="hidden" value="0" name="semester" style="display: none">
    </div>

    <div class="form-horizontal" style="display: inline-block; margin-right: 20px">
        <label for="semester">&nbsp;</label>
        <button class="btn btn-lg btn-success grabSelected">GET</button>
    </div>
</div>

<!-- ============================================================================================= -->
<div class="result-jadwal-akademik"> </div>
<!-- ============================================================================================= -->



<script type="text/javascript">
$(document).ready( function() {


          $(".select-kelas_jurusan").on('change',function() {
              var a1 = $(this).val();
              $("#a1").val(a1);
              // console.log(a1);
          });

          $(".select-tahun_ajaran").on('change',function() {
              var a2 = $(this).val();
              $("#a2").val(a2);
              // console.log(a2);
          });

          $(".select-semester").on('change',function() {
              var a3 = $(this).val();
              $("#a3").val(a3);
              // console.log(a3);
          });


          $(".grabSelected").click(function() {

              $(".result-jadwal-akademik").fadeOut(220);

              var uri = document.baseURI;
              var a1 = $("#a1").val();
              var a2 = $("#a2").val();
              var a3 = $("#a3").val();

              if (a1 == 0) {
                $(".result").html("<strong> Field Kelas Harus Diisi!!! </strong>").fadeIn(300).delay(1500).fadeOut(300);
                $(".select-kelas_jurusan").focus();
              } else if (a2 == 0) {
                $(".result").html("<strong> Pilih Tahun Ajaran !!! </strong>").fadeIn(300).delay(1500).fadeOut(300);
                $(".select-tahun_ajaran").focus();
              } else if (a3 == 0) {
                $(".result").html("<strong> Pilih Semester !!! </strong>").fadeIn(300).delay(1500).fadeOut(300);
                $(".select-semester").focus();
              } else {
                $(".result").html("<strong> Please Wait !!! </strong>").fadeIn(300).delay(1500).fadeOut(300);
                  $.ajax({
                        type    : 'GET',
                        url     : uri + 'siswa/dashboard/showJadwalAkademik',
                        data    : { id_kelas     : a1,
                                    tahun_ajaran : a2,
                                    semester     : a3
                                  },
                        success : function(output) {
                                  // Result Output
                                  $(".result-jadwal-akademik").html(output).fadeIn(500).removeClass('hide');
                        },
                        error   : function() {
                                  // Ouput Error
                                  // console.log("Error Get Data!!");
                        },
                  });
              };
          });

});
</script>

<!-- End Sections -->
<!-- Start Footer -->
<?php $this->load->view('_templates/private/siswa/footer'); ?>
<!-- End Footer

