<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->



<!-- Start Sections -->
<div class="cp-kesiswaan">
<div class="panel panel-warning">

      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#kesiswaan" aria-expanded="false" aria-controls="kesiswaan">
            # Kesiswaan
          </a>
        </h4>
      </div>


      <div role="tabpanel">
        <div id="kesiswaan" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">

            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#allsiswa" aria-controls="allsiswa" role="tab" data-toggle="tab"> Data Siswa </a></li>
              <li role="presentation"><a href="#add_siswa" aria-controls="add_siswa" role="tab" data-toggle="tab"> New </a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="allsiswa">
                <?php require ('_table_all_siswa.php'); ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="add_siswa">
                <?php require ('_form_add_siswa.php'); ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

</div>


<!-- End Sections -->

<?php $this->load->view('_templates/private/admin/footer'); ?>