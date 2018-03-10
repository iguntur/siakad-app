<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">

    <!-- Base Meta Tag -->
    <title><?php echo $myAccount; ?> - Sistem Informasi Akademik </title>
    <meta name="description" content="Meta Descriptions Disini">
    <meta name="keyword" keyword="Meta key disini">

    <base href=" <?php echo base_url(); ?> ">


    
    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap.css">
            

    <!-- Internal CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

  <!-- External JS -->
  <script src="assets/js/jquery.min.js"></script>

  </head>
  <body class="container">

  <!-- Start Include Navigations -->
  <?php $this->load->view('_layouts/private/siswa_nav'); ?>
  <div class='result pull-right'></div>
  <!-- End Include Navigations -->