<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin Panel | FTKom UNCP</title>
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
    .actived{
      background-color: #eec081;
    }
  </style>
</head>

<?php 

$where = array( 
  'dospem1' => '',
  'dospem2' => ''
);

$tema_baru = $this->data_models->edit($where, 'tbl_tema')->num_rows();
$tema_baru_isi = $this->data_models->datalimit('tbl_tema','5','tgl_pengajuan',$where)->result();


?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center bg-warning" href="<?= base_url('admin/'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url('assets/'); ?>img/logo/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">FTKOM UNCP</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?php if($maktif == 'beranda'){ echo ' actived';}else{} ?>">
        <a class="nav-link" href="<?= base_url('admin/'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Data Mahasiswa
        </div>
        <li class="mb-0 nav-item<?php if($maktif == 'induk'){ echo ' actived';}else{} ?>">
          <a class="nav-link" href="<?= base_url('admin/data_induk/'); ?>">
            <i class="fas fa-file-alt"></i>
            <span>Data Induk Mahasiswa</span>
          </a>
        </li>
        <li class="mb-0 nav-item<?php if($maktif == 'tema'){ echo ' actived';}else{} ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-file-alt"></i>
          <span>Data Pengajuan Tema</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded<?php if($maktif == 'tema'){ echo ' actived';}else{} ?>">
            <a class="collapse-item" href="<?= base_url('admin/data_tema_baru/'); ?>">BARU</a>
            <a class="collapse-item" href="<?= base_url('admin/data_tema_acc/'); ?>">ACC</a>
          </div>
        </div>
      </li>
      <li class="mb-0 nav-item<?php if($maktif == 'yudisium'){ echo ' actived';}else{} ?>">
        <a class="nav-link" href="<?= base_url('admin/data_yudisium/'); ?>">
          <i class="fas fa-file-alt"></i>
          <span>Data Yudisium</span>
        </a>
      </li>
      <li class="mb-0 nav-item<?php if($maktif == 'alumni'){ echo ' actived';}else{} ?>">
        <a class="nav-link" href="<?= base_url('admin/data_alumni/'); ?>">
          <i class="fas fa-file-alt"></i>
          <span>Data Alumni</span>
        </a>
      </li>
      <li class="mb-0 nav-item<?php if($maktif == 'login'){ echo ' actived';}else{} ?>">
        <a class="nav-link" href="<?= base_url('admin/data_login/'); ?>">
          <i class="fas fa-file-alt"></i>
          <span>Data Login</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="version">Versi 1.1 by <b><a href="https://uteknoid.website/" target="_blank" class="text-danger">UTeknoID</a></b></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top bg-warning">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <span class="badge badge-danger badge-counter"><?php echo $tema_baru; ?></span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Pengajuan Tema Baru
            </h6>
            <?php foreach ($tema_baru_isi as $t){ ?>

              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('admin/cetak_tema/').$t->nim; ?>" target="_blank">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?php echo date('d / m / Y', strtotime($t->tgl_pengajuan)); ?></div>
                  <span class="font-weight-bold"><?php echo $t->nim.' - '.$t->nama; ?></span>
                </div>
              </a>

            <?php } ?>
            <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('admin/data_tema_baru/'); ?>">Show All Alerts</a>
          </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/boy.png" style="max-width: 60px">
          <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#passModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Ganti Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- Topbar -->

  <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="post" action="<?= base_url('admin/ganti_password'); ?>">
            <div class="form-group row">
              <div class="col-sm-12 mb-3">
                <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password Baru">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
            </div>
            <div class="m-3">
              <a class="btn btn-danger" style="color: white;" data-dismiss="modal">Batal</a>
              <button type="submit" style="float: right;" class="btn btn-primary">
                Ganti
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Logout" untuk mengakhiri sesi anda. Dan Keluar</div>
        <div class="modal-footer">
          <a class="btn btn-danger" href="<?= base_url('admin/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>