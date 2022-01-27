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
          <a class="nav-link" href="<?= base_url('admin/data_tema/'); ?>">
            <i class="fas fa-file-alt"></i>
            <span>Data Pengajuan Tema</span>
          </a>
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
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
              aria-labelledby="searchDropdown">
              <form class="navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                  aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger badge-counter">3+</span>
          </a>
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
          aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Alerts Center
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 12, 2019</div>
              <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 7, 2019</div>
              $290.29 has been deposited into your account!
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-warning">
                <i class="fas fa-exclamation-triangle text-white"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">December 2, 2019</div>
              Spending Alert: We've noticed unusually high spending for your account.
            </div>
          </a>
          <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <span class="badge badge-warning badge-counter">2</span>
      </a>
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
      aria-labelledby="messagesDropdown">
      <h6 class="dropdown-header">
        Message Center
      </h6>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/man.png" style="max-width: 60px" alt="">
          <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
          having.</div>
          <div class="small text-gray-500">Udin Cilok · 58m</div>
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="<?= base_url('assets/'); ?>img/girl.png" style="max-width: 60px" alt="">
          <div class="status-indicator bg-default"></div>
        </div>
        <div>
          <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
          say this to all dogs, even if they aren't good...</div>
          <div class="small text-gray-500">Jaenab · 2w</div>
        </div>
      </a>
      <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
    </div>
  </li>
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-tasks fa-fw"></i>
    <span class="badge badge-success badge-counter">3</span>
  </a>
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
  aria-labelledby="messagesDropdown">
  <h6 class="dropdown-header">
    Task
  </h6>
  <a class="dropdown-item align-items-center" href="#">
    <div class="mb-3">
      <div class="small text-gray-500">Design Button
        <div class="small float-right"><b>50%</b></div>
      </div>
      <div class="progress" style="height: 12px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"
        aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </a>
  <a class="dropdown-item align-items-center" href="#">
    <div class="mb-3">
      <div class="small text-gray-500">Make Beautiful Transitions
        <div class="small float-right"><b>30%</b></div>
      </div>
      <div class="progress" style="height: 12px;">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"
        aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </a>
  <a class="dropdown-item align-items-center" href="#">
    <div class="mb-3">
      <div class="small text-gray-500">Create Pie Chart
        <div class="small float-right"><b>75%</b></div>
      </div>
      <div class="progress" style="height: 12px;">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
        aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </a>
  <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>
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