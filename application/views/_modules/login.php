<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Base Meta Tag -->
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>">
        
    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Internal CSS -->
    <link rel="stylesheet" href="assets/css/main.css">            

  </head>
  <body class="login-land-page">
      
    <header class="navbar navbar-theme01 navbar-fixed-top container-fluid">
      <div class="head-info">
          <h2>Sistem Informasi Akademik</h2>
      </div>
    </header>
        
        
    <div class="row container">
      <div class="col-md-8 col-sm-6 col-sm-12 bftop">      
      
        <h2>Nama Instansi Pendidikan / Sekolah</h2> <hr>

        <h3>Pendidikan</h3>
        <p>Pendidikan adalah pembelajaran pengetahuan, keterampilan, dan kebiasaan sekelompok orang yang diturunkan dari satu generasi ke generasi berikutnya melalui pengajaran, pelatihan, atau penelitian. Pendidikan sering terjadi di bawah bimbingan orang lain, tetapi juga memungkinkan secara otodidak.[1] Setiap pengalaman yang memiliki efek formatif pada cara orang berpikir, merasa, atau tindakan dapat dianggap pendidikan. Pendidikan umumnya dibagi menjadi tahap seperti prasekolah, sekolah dasar, sekolah menengah dan kemudian perguruan tinggi, universitas atau magang.</p>
        
        <h3>Filosofi Pendidikan</h3>
        <p>Pendidikan biasanya berawal saat seorang bayi itu dilahirkan dan berlangsung seumur hidup. Pendidikan bisa saja berawal dari sebelum bayi lahir seperti yang dilakukan oleh banyak orang dengan memainkan musik dan membaca kepada bayi dalam kandungan dengan harapan ia bisa mengajar bayi mereka sebelum kelahiran.</p>
    
      </div> <!-- End Col MD 8 / LEFT -->
      <div class="col-md-4 col-sm-6 col-sm-12">
          <div class="wrap-form-login">
<?php echo form_open('login/validations', "autocomplete='off'"); ?>
              <div class="lb-lgwrap"><label class="lb-login"> LOGIN </label></div>
              <div class="form-horizontal">
                <input name="username" class="form-control form-log" type="text" placeholder="Username">
                <input name="password" class="form-control form-log" type="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-circle"><i id="btnLogin" class="fa fa-2x fa-lock"></i></button>
              <div class="error-check"></div>              
                </div>
      </div> <!-- End Col MD 4 / RIGHT -->
<?php echo form_close(); ?>
      <div class="col-lg-8">
                
              <div class="col-lg-4">
                <h4>Jendela Dunia</h4>
                <img class="img-rounded img-form" src="https://hmipeternakanugm.files.wordpress.com/2014/06/buku31.jpg">
              </div>
                
                
              <div class="col-lg-4">
                <h4>Ayo Belajar</h4>
                <img class="img-rounded img-form" src="assets/images/552c38936ea834aa238b4568.jpeg">
              </div>
              
              <div class="col-lg-4">
                <h4>Info</h4>
                <img class="img-rounded img-form" src="http://www.dbstips.com/assets/img_informasi/PERSIAPAN-PELUNCURAN-PRODUK-BARU-PROGRAM-DBSTIPS-.jpg">
              </div>    
      </div>
      <div class="col-lg-4"></div>
    </div> <!-- End Container-Fluid -->
    <footer class="navbar navbar-default navbar-fixed-bottom footer">
          <!-- 
              Footer Disini
           -->
    </footer>
  <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/functions.js"></script>
  </body>
</html>