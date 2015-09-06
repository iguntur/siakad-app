<!-- Start header -->
<?php $this->load->view('_templates/private/admin/head'); ?>
<!-- End header -->


<!-- Start Sections -->


<div class="cp-user">
<div class="panel panel-default" style=" border-color: hotpink;" >
      <div class="panel-heading" role="tab" id="headingOne" style=" background: hotpink;" >
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#users" aria-expanded="false" aria-controls="users">
            # User 
          </a>
        </h4>
      </div>

      <div role="tabpanel">
        <div id="users" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#alluser" aria-controls="alluser" role="tab" data-toggle="tab"> Lihat User </a></li>
              <li role="presentation"><a href="#New" aria-controls="New" role="tab" data-toggle="tab"> New </a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="alluser">
                <?php require ('_table_all_users.php'); ?>
              </div>

              <div role="tabpanel" class="tab-pane" id="New">
                <?php require ('_form_add_user.php'); ?>
              </div>
            </div>

          </div> <!-- End Panel Body -->
        </div>
      </div>
    </div>

</div>

<!-- End Section -->

<?php $this->load->view('_templates/private/admin/footer'); ?>