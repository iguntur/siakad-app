<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->



<div class="cp-guru">
<div class="panel panel-info">

    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#pengajar" aria-expanded="false" aria-controls="pengajar">
            # Data Pengajar
          </a>
        </h4>
      </div>

      <div role="tabpanel">
        <div id="pengajar" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#allpengajar" aria-controls="allpengajar" role="tab" data-toggle="tab"> Data Pengajar </a></li>
              <li role="presentation"><a href="#add_pengajar" aria-controls="add_pengajar" role="tab" data-toggle="tab"> Data Baru </a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="allpengajar">
                <?php require ('_table_all_pengajar.php'); ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="add_pengajar">
                <?php require ('_form_add_pengajar.php'); ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


</div> 


<!-- End Sections -->

<?php $this->load->view('_templates/private/admin/footer'); ?>