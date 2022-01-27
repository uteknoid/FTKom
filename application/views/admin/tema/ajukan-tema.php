
<!-- Select2 -->
<link href="<?php echo base_url('assets/'); ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Tema</h1>
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

?>
<form class="user" method="post" action="<?= base_url('admin/tambah_tema'); ?>" enctype="multipart/form-data">
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
      <label>Status Mahasiswa</label>
      <select name="status_mhs" class="form-control form-control-user"required>
        <option value="">Pilih Status..</option>
          <option value="Reguler">Reguler</option>
          <option value="Konversi">Konversi</option>
      </select>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Konsentrasi Bidang</label>
      <select name="konsentrasi" class="form-control form-control-user"required>
        <option value="">Pilih Konsentrasi..</option>
          <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
          <option value="Jaringan Komputer">Jaringan Komputer</option>
          <option value="Sistem Informasi Geografis">Sistem Informasi Geografis</option>
          <option value="Multimedia">Multimedia</option>
          <option value="Desain Web">Desain Web</option>
      </select>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanda Tangan Mahasiswa</label>
      <input type="file" name="ttd" class="form-control" accept="image/png" required>
      <small><span style="color: red"> * </span>Jika Belum Memiliki File Tanda Tangan, Silahkan Kunjungi <strong><a href="<?= base_url('ttd/index'); ?>" target="_blank">Link Ini</a></strong>. Simpan Dan Upload Pada Form Ini.</small>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Temuan Masalah</label>
      <textarea name="masalah" class="form-control" required rows="5"></textarea>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Usulan Yang Diberikan</label>
      <textarea name="usulan" class="form-control" required rows="5"></textarea>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Software/Aplikasi Yang Digunakan</label>
      <textarea name="software" class="form-control" required rows="5"></textarea>
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