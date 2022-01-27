<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
    <ol class="breadcrumb">
      <a class="btn btn-info mr-2" href="#" data-toggle="modal" data-target="#printlaporan">Cetak Data</a>
      <a class="btn btn-primary" href="<?php echo base_url('admin/tambah_alumni'); ?>">Tambah Data</a>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover text-center" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>NPM</th>
                <th>NAMA</th>
                <th>PROGRAM STUDI</th>
                <th>FOTO</th>
                <th>TANGGAL LULUS</th>
                <th>TINDAKAN</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $d) { ?>
                <tr>
                  <td>
                    <?php echo $d->nim; ?>

                  </td>
                  <?php $querymhs = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim = '$d->nim'")->result(); ?>
                  <?php foreach ($querymhs as $mhs) {
                    $nama_mhs = $mhs->nama; 
                    $prodi_mhs = $mhs->prodi; 
                  } ?>
                  <td>
                    <?php echo ucwords($nama_mhs); ?>
                  </td>
                  <td>
                    <?php echo ucwords($prodi_mhs); ?>

                  </td>
                  <td>
                    <img style="width: 5rem" src="<?php echo base_url('assets/img/mhs/alumni/').$d->foto; ?>">
                  </td>
                  <td>
                    <?php echo date("d / m / Y", strtotime($d->tgl_lulus)); ?>

                  </td>
                  <td>
                    <a style="width: 8rem;" href="<?php echo base_url('admin/cetak_peralumni/').$d->nim; ?>" class="btn btn-sm btn-info mb-2" target="_blank"> Cetak </a><br>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/edit_alumni//').$d->nim; ?>" class="btn btn-sm btn-warning mb-2"> Edit </a>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/hapus_alumni/').$d->nim; ?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data ini?');"> Hapus </a></td>
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


  <div class="modal fade" id="printlaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cetak Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <script type="text/javascript">
            function check() {
              var el = document.getElementById("combo");
              var str = el.options[el.selectedIndex].text;
              if (str == "Keseluruhan") {
                document.getElementById('dummyText1').type = 'hidden';
                document.getElementById('dummyText2').type = 'hidden';
                document.getElementById('dummyText').type = 'hidden';
                hide();
              }

              var d = new Date();
              var y = d.getFullYear();
              var n = d.getMonth() + 1;
              if (str == "Semester") {
                document.getElementById('dummyText').type = 'hidden';
                document.getElementById('dummyText1').type = 'date';
                document.getElementById('dummyText2').type = 'date';
                show();
              } else {}

              if (str == "Tahunan") {
                document.getElementById('dummyText1').type = 'hidden';
                document.getElementById('dummyText2').type = 'hidden';
                document.getElementById('dummyText').type = 'number';
                document.getElementById('dummyText').value = y;
                hide();
              } else {}

              if (str == "Bulanan") {
                document.getElementById('dummyText1').type = 'hidden';
                document.getElementById('dummyText2').type = 'hidden';
                document.getElementById('dummyText').type = 'month';
                document.getElementById('dummyText').defaultValue = y + '-' + n;
                document.getElementById('dummyText').value = y + '-' + n;
                hide();
              } else {}

              if (str == "Harian") {
                document.getElementById('dummyText1').type = 'hidden';
                document.getElementById('dummyText2').type = 'hidden';
                document.getElementById('dummyText').type = 'date';
                hide();
              } else {}
            }

            function hide() {
              document.getElementById('dummyDiv').style.visibility = 'hidden';
            }

            function show() {
              document.getElementById('dummyDiv').style.visibility = 'visible';

            }

          </script>

          <form action="<?php echo base_url() . 'admin/cetak_alumni'; ?>" target="_blank" method="post">

            <div class="form-group">
              <label>Filter Menurut Tanggal Lulus</label>
              <select class="form-control" name="filter" id="combo" onChange="check();">
                <option value="Keseluruhan">Keseluruhan</option>
                <option value="Harian">Harian</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Tahunan">Tahunan</option>
                <option value="Semester">Rentang Waktu</option>
              </select>
            </div>




            <input class="form-control" id="dummyText" type="hidden" name="waktu">

            <div class="row" id="dummyDiv" style="visibility:hidden">
              <div class="col">
                <input class="form-control" id="dummyText1" type="hidden" name="waktu1">
              </div>
              _ 
              <div class="col">
                <input class="form-control" id="dummyText2" type="hidden" name="waktu2">
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-default" type="submit" name="submit">Cetak</button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>