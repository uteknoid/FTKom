
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

$query = $this->db->query("SELECT * FROM tbl_mahasiswa ORDER BY nim DESC")->result();

foreach ($yudisium as $y) {
  $nim = $y->nim;
  $tgl_yudisium = $y->tgl_yudisium;
  $tgl_ujian_proposal = $y->tgl_ujian_proposal;
  $judul_skripsi = $y->judul_skripsi;
  $penguji1 = $y->penguji_1;
  $penguji2 = $y->penguji_2;
  $penguji3 = $y->penguji_3;
  $penguji4 = $y->penguji_4;
  $tgl_ujian_skripsi = $y->tgl_ujian_skripsi;
  $nilai = $y->nilai;
  $lama_studi = $y->lama_studi;
  $total_sks = $y->total_sks;
  $ipk = $y->ipk;
  $predikat = $y->predikat;
}

?>
<form class="user" method="post" action="<?= base_url('admin/update_yudisium'); ?>" enctype="multipart/form-data">
  <div class="container-fluid">

    <input type="hidden" name="nimpilih" required="" value="<?php echo $nim; ?>">

    <div class="col-sm-12 mb-3">
      <label>Nama Mahasiswa</label>            
      <div class="form-group">
        <select class="select2-single form-control" name="nim" id="select2Single" required>
          <option value="" disabled selected>Pilih Mahasiswa</option>
          <?php foreach ($query as $mhs) { ?>
            <option value="<?php echo $mhs->nim; ?>"<?php if ($mhs->nim == $nim) {echo ' selected';} ?>><?php echo ucwords($mhs->nim.' - '.$mhs->nama); ?></option>
          <?php } ?>
        </select>
      </div>
    </div>


    <div class="col-sm-12 mb-3">
      <label>Tanggal Yudisium</label>
      <input type="date" name="tgl_yudisium" class="form-control form-control-user" value="<?php echo $tgl_yudisium; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanggal Ujian Proposal</label>
      <input type="date" name="tgl_sempro" class="form-control form-control-user" value="<?php echo $tgl_ujian_proposal; ?>" required>
    </div><br><hr>

    <div class="col-sm-12 mt-3">
      <label><b>Data Skripsi</b></label>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Judul Skripsi</label>
      <input type="text" name="judul" class="form-control form-control-user" value="<?php echo $judul_skripsi; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 1</label>
      <input type="text" name="penguji1" class="form-control form-control-user" value="<?php echo $penguji1; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 2</label>
      <input type="text" name="penguji2" class="form-control form-control-user" value="<?php echo $penguji2; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 3</label>
      <input type="text" name="penguji3" class="form-control form-control-user" value="<?php echo $penguji3; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Penguji 4</label>
      <input type="text" name="penguji4" class="form-control form-control-user" value="<?php echo $penguji4; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanggal Ujian Skripsi</label>
      <input type="date" name="tgl_ujian" class="form-control form-control-user" value="<?php echo $tgl_ujian_skripsi; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Nilai <small>(A - E)</small></label>
      <input type="text" name="nilai" class="form-control form-control-user" value="<?php echo $nilai; ?>" required>
    </div><br><hr>

    <div class="col-sm-12 mb-3">
      <label>Total SKS</label>
      <input type="number" name="total_sks" class="form-control form-control-user" value="<?php echo $total_sks; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>IPK</label>
      <input type="text" name="ipk" class="form-control form-control-user" value="<?php echo $ipk; ?>" required>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Predikat</label>
      <input type="text" name="predikat" class="form-control form-control-user" value="<?php echo $predikat; ?>" required>
    </div>


  </div>
  <div class="modal-footer">
    <input type="submit" style="float: right;" class="btn btn-primary" value="Simpan">
  </div>
</form>


<!-- Select2 -->
<script src="<?php echo base_url('assets/'); ?>vendor/select2/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function () {

    $('.select2-single').select2();

  });
</script>