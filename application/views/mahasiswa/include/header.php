<?php 

$bln = array(
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember'
);

date_default_timezone_set('Asia/Makassar');
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mahasiswa FTKom UNCP</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/css/templatemo-digimedia-v2.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/css/animated.css">
<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
</head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img style="width: 4rem" src="<?= base_url('assets/'); ?>img/logo/logo.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="<?= base_url('mahasiswa/tema'); ?>" class="<?php if($maktif == 'tema'){ echo 'active';}else{} ?>">Pengajuan Tema</a></li>
              <li class="scroll-to-section"><a href="<?= base_url('mahasiswa/profile'); ?>" class="<?php if($maktif == 'profile'){ echo 'active';}else{} ?>">Profile</a></li>
              <li class="scroll-to-section"><a href="<?= base_url('mahasiswa/logout'); ?>">Keluar</a></li> 
            </ul>        
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->