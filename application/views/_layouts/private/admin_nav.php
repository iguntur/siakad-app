<nav class="navbar navbar-inverse cs-nav">
  <span class="logo-dp"><img src="assets/images/LOGO-KEMENTERIAN-PENDIDIKAN-NASIONAL.png"></span>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">SIAKAD</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <!-- Left Menu -->
      <ul class="nav navbar-nav">

        <!-- Home Menu -->
        <li><a id="homeBtn" href='<?php echo base_url();?>administrator/dashboard'>Home</a></li>

        <!-- Akademik Menu -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akademik<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href='<?php echo base_url(); ?>administrator/panel_siswa'><span>Data Siswa</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/staff'><span>Data Staff</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/dashboard/jadwal_akademik'><span>Jadwal Akademik</span></a></li>
          </ul>
        </li>

        <!-- Setup Menu -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setup<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href='<?php echo base_url(); ?>administrator/jabatan'><span>Jabatan</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/kelas'><span>Kelas</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/jurusan'><span>Jurusan</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/mapel'><span>Mata Pelajaran </span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/jadwal_akademik'><span>Jadwal Akademik </span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/jam_mengajar'><span>Jam Mengajar</span></a></li>
            <li class="divider"></li>
            <li><a href='<?php echo base_url(); ?>administrator/tahun_ajaran'><span>Tahun Ajaran</span></a></li>
          </ul>
        </li>

        <!-- Report Menu -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Report<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href='<?php echo base_url(); ?>administrator/report/siswa'><span>Report Siswa</span></a></li>
          </ul>
        </li>
      </ul>

      <!-- Right Menu -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $myAccount; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class='has-sub'><a href="<?php echo base_url(); ?>administrator/setting">Setup Admin</a></li>
            <li class="divider"></li>
            <li class='has-sub'><a href="<?php echo base_url(); ?>logout">Log Out</a></li>
          </ul>
        </li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
