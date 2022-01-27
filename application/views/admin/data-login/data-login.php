<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-6 mx-auto">
      <div class="card mb-4 mt-5 p-5">
        <?= $this->session->flashdata('pesan'); ?>
        <a class="btn btn-primary btn-lg mb-5" onclick="return confirm('Yakin ingin mengacak ulang password login mahasiswa?');" href="<?php echo base_url('admin/acak_login'); ?>">ACAK PASSWORD</a>
        <a class="btn btn-info btn-lg" href="<?php echo base_url() . 'admin/data_login_pdf'; ?>">UNDUH DATA</a>
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
        <h4 class="modal-title" id="myModalLabel">Unduh Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <script type="text/javascript">
          function check() {
            var el = document.getElementById("combo");
            var str = el.options[el.selectedIndex].text;
            if (str == "EXCEL") {
              document.getElementById('format').action = '<?php echo base_url() . 'admin/data_login_excel'; ?>';
            }else{
              document.getElementById('format').action = '<?php echo base_url() . 'admin/data_login_pdf'; ?>';
            }
          }

        </script>

        <form id="format" action="<?php echo base_url() . 'admin/data_login_excel'; ?>" target="_blank" method="post">

          <div class="form-group">
            <label>Pilih Format File</label>
            <select class="form-control" name="filter" id="combo" onChange="check();">
              <option value="EXCEL">EXCEL</option>
              <option value="PDF">PDF</option>
            </select>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="submit">Cetak</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>