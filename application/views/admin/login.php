<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?= base_url('assets/'); ?>img/logo/logo.png" rel="icon">
  <title>Login Admin Panel | FTKom UNCP</title>
  <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">


  <style type="text/css">
    body {
      background-image: url("<?= base_url('assets/'); ?>img/bg.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
    }

    .btn-color{
      background-color: #26A421;
      color: #fff;

    }

    .profile-image-pic{
      height: 200px;
      width: 200px;
      object-fit: cover;
      background: transparent;
    }



    .cardbody-color{
      background-color: #C9BF52;
      border-radius: 25px;
    }

    a{
      text-decoration: none;
    }
  </style>

</head>

<body class="bg-gradient-login">


  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
        <div class="card cardbody-color my-5">
          <?= $this->session->flashdata('message'); ?>

          <form class="user card-body p-lg-5" action="<?php echo base_url('admin/login/'); ?>" method="post">

            <div class="text-center">
              <img src="<?= base_url('assets/'); ?>img/logo/logo.png" class="img-fluid profile-image-pic my-3 mb-5"
              width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="username" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-lg btn-success btn-color mb-5 w-100">Login</button></div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>