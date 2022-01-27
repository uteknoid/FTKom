<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">

  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Data Mahasiswa</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_mhs; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-graduate fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Data Pengajuan Tema</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_tema; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope-open-text fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Data Yudisium</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jml_yudi; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-tie fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Total Data Alumni</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_alu; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover text-center" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>NPM</th>
                <th>NAMA</th>
                <th>TEMPAT, TANGGAL LAHIR</th>
                <th>FOTO</th>
                <th>NAMA AYAH</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $d) { ?>

                <tr>
                  <td>
                    <?php echo $d->nim; ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->nama); ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->tempat_lahir.', '.date("d-m-Y", strtotime($d->tgl_lahir))); ?>

                  </td>
                  <td>
                    <img style="width: 5rem" src="<?php echo base_url('assets/img/mhs/master/').$d->foto; ?>">

                  </td>
                  <td>
                    <?php echo ucwords($d->nama_ayah); ?>

                  </td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->
