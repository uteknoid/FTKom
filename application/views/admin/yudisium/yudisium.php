<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Yudisium</h1>
    <ol class="breadcrumb">
      <a class="btn btn-info mr-2" href="#" data-toggle="modal" data-target="#printlaporan">Cetak Data</a>
      <a class="btn btn-primary" href="<?php echo base_url('admin/tambah_yudisium'); ?>">Tambah Data</a>
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
                <th>TANGGAL UJIAN SKRIPSI</th>
                <th>TOTAL SKS</th>
                <th>IPK</th>
                <th>TINDAKAN</th>
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
                    <?php echo date("d / m / Y", strtotime($d->tgl_ujian_skripsi)); ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->total_sks); ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->ipk); ?>

                  </td>
                  <td>
                    <a href="<?php echo base_url('admin/edit_yudisium/').$d->nim; ?>" class="btn btn-sm btn-warning"> Edit </a>
                    <a href="<?php echo base_url('admin/hapus_yudisium/').$d->nim; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');"> Hapus </a></td>
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

          <form action="<?php echo base_url() . 'admin/cetak_yudisium'; ?>" target="_blank" method="post">

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