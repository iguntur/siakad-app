<div class="cp-program">
<div class="panel panel-danger">

    <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#program" aria-expanded="false" aria-controls="program">
            # Program
          </a>
        </h4>
      </div>

      <div role="tabpanel">
      <div id="program" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
          <div class="panel-body">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#dft_jadwal" aria-controls="dft_jadwal" role="tab" data-toggle="tab"> Jadwal Mengajar </a></li>
            <li role="presentation"><a href="#dft_bid_studi" aria-controls="dft_bid_studi" role="tab" data-toggle="tab"> Bidang Studi </a></li>
            <li role="presentation"><a href="#dft_kelas" aria-controls="dft_kelas" role="tab" data-toggle="tab"> Kelas </a></li>
            <li role="presentation"><a href="#dft_nilai" aria-controls="dft_nilai" role="tab" data-toggle="tab"> Nilai </a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dft_jadwal">
              <?php require ('_daftar_jadwal_mengajar.php'); ?>
                </div>

            <div role="tabpanel" class="tab-pane" id="dft_bid_studi">
              <?php require ('_daftar_bidang_studi.php'); ?>
                </div>

            <div role="tabpanel" class="tab-pane" id="dft_kelas">
              <?php require ('_daftar_kelas.php'); ?>
                </div>

            <div role="tabpanel" class="tab-pane" id="dft_nilai">
              <?php require ('_daftar_nilai.php'); ?>
                </div>
          </div>


          </div>
        </div>
      </div>
    </div>

</div>
<!-- End Sections -->