
<!-- Select2 -->
<link href="<?php echo base_url('assets/'); ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Yudisium</h1>
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

$query = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim NOT IN (SELECT nim from tbl_yudisium)  ORDER BY tbl_mahasiswa.nim DESC")->result();

 
?>
<form class="user" method="post" action="<?= base_url('admin/simpan_yudisium'); ?>" enctype="multipart/form-data">
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
      <label>Tanggal Yudisium</label>
      <input type="date" name="tgl_yudisium" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanggal Ujian Proposal</label>
      <input type="date" name="tgl_sempro" class="form-control form-control-user" required>
    </div><br><hr>

    <div class="col-sm-12 mt-3">
      <label><b>Data Skripsi</b></label>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Judul Skripsi</label>
      <input type="text" name="judul" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 1</label>
      <input type="text" name="penguji1" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 2</label>
      <input type="text" name="penguji2" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 3</label>
      <input type="text" name="penguji3" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 4</label>
      <input type="text" name="penguji4" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanggal Ujian Skripsi</label>
      <input type="date" name="tgl_ujian" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Nilai <small>(A - E)</small></label>
      <input type="text" name="nilai" class="form-control form-control-user" required>
    </div><br><hr>

    <div class="col-sm-12 mb-3">
      <label>Total SKS</label>
      <input type="number" name="total_sks" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>IPK</label>
      <input type="text" name="ipk" class="form-control form-control-user" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Predikat</label>
      <input type="text" name="predikat" class="form-control form-control-user" required>
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