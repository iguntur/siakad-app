<nav data-session-nip="<?php echo $this->session->userdata('nip'); ?>" class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:;">SIAKAD</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href='<?php echo base_url();?>staff/dashboard'>Home</a></li>


        <!-- Akademik -->
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akademik<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li class="divider"></li>
              <li><a href='staff/data_siswa'>Data Siswa</a></li>
              <li class="divider"></li>
              <li><a href='staff/dashboard/jadwal_akademik'>Jadwal</a></li>
              <li class="divider"></li>
          </ul>
        </li>


        <!-- Controll Data Siswa -->
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Controll Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li class="divider"></li>
              <!-- <li><a href='staff/view_nilai'>View Nilai</a></li> -->
              <!-- <li class="divider"></li> -->
              <li><a href='<?php echo base_url();?>staff/data_nilai'><span>Input Nilai</span></a></li>
              <li class="divider"></li>
              <li><a href='staff/setup-naik-kelas'>Kenaikan Kelas</a></li>
              <li class="divider"></li>
          </ul>
        </li>

        <!-- Report Data Siswa -->
        <li class="dropdown">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Report<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li class="divider"></li>
              <li><a href='javascript:;'>Records Data Siswa</a></li>
              <li class="divider"></li>
          </ul>
        </li>



      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $myAccount; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class='has-sub'><a href='<?php echo base_url(); ?>staff/setting/'><span>Setting</span></a></li>
            <li class="divider"></li>
            <li class='has-sub'><a href="<?php echo base_url(); ?>logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>