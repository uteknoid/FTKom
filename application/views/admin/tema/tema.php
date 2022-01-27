<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Tema</h1>
    <ol class="breadcrumb">
      <a class="btn btn-primary" href="<?php echo base_url('admin/ajukan_tema'); ?>">Tambah Data</a>
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
                <th>NIM</th>
                <th>NAMA</th>
                <th>STATUS MAHASISWA</th>
                <th>KONSENTRASI BIDANG</th>
                <th>TANGGAL PENGAJUAN</th>
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
                    <?php echo ucwords($d->status_mhs); ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->konsentrasi); ?>

                  </td>
                  <td>
                    <?php echo ucwords(date("d / m / Y", strtotime($d->tgl_pengajuan))); ?>

                  </td>
                  <td>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/cetak_tema/').$d->nim; ?>" class="btn btn-sm btn-info mb-2" target="_blank"> Cetak </a>
                    <?php if ($d->dospem1 != '' && $d->dospem2 != ''){ ?>
                      <a style="width: 4rem;" href="<?php echo base_url('admin/batal_setujui_tema/').$d->nim; ?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Yakin ingin membatalkan pengajuan data tema ini?');"> Batal Setujui </a>
                    <?php }else{ ?>
                      <a style="width: 4rem;" href="javascript:void(0);" data-toggle="modal" data-target="#setujuiModal<?php echo $d->nim; ?>" class="btn btn-sm btn-success mb-2"> Setujui </a>
                    <?php } ?>
                    <br>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/edit_tema/').$d->nim; ?>" class="btn btn-sm btn-warning mb-2"> Edit </a>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/hapus_tema/').$d->nim; ?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data ini?');"> Hapus </a>
                  </td>
                </tr>


                <!-- Modal Setujui Tema -->
                <div class="modal fade" id="setujuiModal<?php echo $d->nim; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mohon Tentukan Dospem Untuk Setujui Tema</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body align-items-left text-left">
                        <form class="user" method="post" action="<?= base_url('admin/setujui_tema'); ?>">
                          <div class="form-group row">
                            <input type="hidden" name="nim" class="form-control form-control-user" value="<?php echo $d->nim; ?>" required>

                            <div class="col-sm-12 mb-3">
                              <label>Dosen Pembimbing 1</label>            
                              <div class="form-group">
                                <input type="text" name="dospem1" class="form-control form-control-user" required>
                              </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                              <label>Dosen Pembimbing 2</label>            
                              <div class="form-group">
                                <input type="text" name="dospem2" class="form-control form-control-user" required>
                              </div>
                            </div>

                          </div>
                          <div class="m-3">
                            <a class="btn btn-danger" style="color: white;" data-dismiss="modal">Batal</a>
                            <button type="submit" style="float: right;" class="btn btn-primary" onclick="return confirm('Setujui tema ini?');">
                              Ganti
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


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
        <h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
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
          }

          function hide() {
            document.getElementById('dummyDiv').style.visibility = 'hidden';
          }

          function show() {
            document.getElementById('dummyDiv').style.visibility = 'visible';

          }

        </script>

        <form action="<?php echo base_url() . 'admin/lab_print'; ?>" target="_blank" method="post">

          <div class="form-group">
            <label>Filter</label>
            <select class="form-control" name="filter" id="combo" onChange="check();">
              <option value="Keseluruhan">Keseluruhan</option>
              <option value="Bulanan">Bulanan</option>
              <option value="Tahunan">Tahunan</option>
              <option value="Semester">Semester</option>
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


