
<!-- Select2 -->
<link href="<?php echo base_url('assets/'); ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Alumni</h1>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
      </div>
    </div>
  </div>
  <!--Row-->
</div>
<!---Container Fluid-->

<?php 

$query = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim NOT IN (SELECT nim from tbl_alumni)  ORDER BY tbl_mahasiswa.nim DESC")->result();


?>
<form class="user" method="post" action="<?= base_url('admin/simpan_alumni'); ?>" enctype="multipart/form-data">
  <div class="container-fluid">

    <div class="col-sm-12 mb-3">
      <label>Nama Mahasiswa</label>            
      <div class="form-group">
        <select class="select2-single form-control" name="nim" id="select2Single" required>
          <option value="" disabled selected>Pilih Mahasiswa</option>
          <?php foreach ($query as $mhs) { ?>
            <option value="<?php echo $mhs->nim; ?>"><?php echo ucwords($mhs->nim.' - '.$mhs->nama); ?></option>
          <?php } ?>
        </select>
      </div>
    </div>


    <div class="col-sm-12 mb-3">
      <label>Tanggal Lulus</label>
      <input type="date" name="tgl_lulus" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Foto Mahasiswa</label>
      <input type="file" name="foto" class="form-control" accept=".jpg,.png" required>
      <small><span style="color: red"> * </span>Pas Foto Ukuran 2x3 Menggunakan Jas</small>
    </div>


  </div>
  <div class="modal-footer">
    <input type="submit" style="float: right;" class="btn btn-primary" value="Tambah">
  </div>
</form>


<!-- Select2 -->
<script src="<?php echo base_url('assets/'); ?>vendor/select2/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function () {

    $('.select2-single').select2();

  });
</script>