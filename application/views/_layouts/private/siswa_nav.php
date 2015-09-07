<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo $myAccount; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href='<?php echo base_url();?>siswa/dashboard'>Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akademik <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href='<?php echo base_url();?>siswa/data_nilai'><span>Lihat Nilai</span></a></li>
            <li class="divider"></li>
            <li><a href='siswa/dashboard/jadwal_akademik'><span>Lihat Jadwal</span></a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $myAccount; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class='has-sub'><a href='<?php echo base_url(); ?>siswa/setting/'><span>Setting</span></a></li>
            <li class="divider"></li>
            <li class='has-sub'><a href="<?php echo base_url(); ?>logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>