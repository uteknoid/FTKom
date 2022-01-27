
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

foreach ($tema as $t) {
  $nim = $t->nim;
  $status_mhs = $t->status_mhs;
  $konsentrasi = $t->konsentrasi;
  $tgl_pengajuan = $t->tgl_pengajuan;
  $dospem1 = $t->dospem1;
  $dospem2 = $t->dospem2;
  $dospem2 = $t->dospem2;
  $masalah = $t->masalah;
  $solusi = $t->solusi;
  $software = $t->software;
}
?>
<form class="user" method="post" action="<?= base_url('admin/update_tema'); ?>" enctype="multipart/form-data">
  <div class="container-fluid">

    <input type="hidden" name="nimpilih" required="" value="<?php echo $nim; ?>">

    <div class="col-sm-12 mb-3">
      <label>Nama Mahasiswa</label>            
      <div class="form-group">
        <select class="select2-single form-control" name="nim" id="select2Single" required>
          <option value="" disabled selected>Pilih Mahasiswa</option>
          <?php foreach ($query as $mhs) { ?>
            <option value="<?php echo $mhs->nim; ?>" <?php if ($mhs->nim == $nim) {echo ' selected';} ?>><?php echo ucwords($mhs->nim.' - '.$mhs->nama); ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanggal Pengajuan</label>            
      <div class="form-group">
        <input type="date" name="tgl_pengajuan" class="form-control form-control-user" value="<?php echo $tgl_pengajuan; ?>" required>
      </div>
    </div>


    <div class="col-sm-12 mb-3">
      <label>Status Mahasiswa</label>
      <select name="status_mhs" class="form-control form-control-user" required>
        <option value="">Pilih Status..</option>
        <option value="Reguler" <?php if ($status_mhs == 'Reguler') {echo ' selected';} ?>>Reguler</option>
        <option value="Konversi" <?php if ($status_mhs == 'Konversi') {echo ' selected';} ?>>Konversi</option>
      </select>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Konsentrasi Bidang</label>
      <select name="konsentrasi" class="form-control form-control-user"required>
        <option value="">Pilih Konsentrasi..</option>
        <option value="Rekayasa Perangkat Lunak" <?php if ($konsentrasi == 'Rekayasa Perangkat Lunak') {echo ' selected';} ?>>Rekayasa Perangkat Lunak</option>
        <option value="Jaringan Komputer" <?php if ($konsentrasi == 'Jaringan Komputer') {echo ' selected';} ?>>Jaringan Komputer</option>
        <option value="Sistem Informasi Geografis" <?php if ($konsentrasi == 'Sistem Informasi Geografis') {echo ' selected';} ?>>Sistem Informasi Geografis</option>
        <option value="Multimedia" <?php if ($konsentrasi == 'Multimedia') {echo ' selected';} ?>>Multimedia</option>
        <option value="Desain Web" <?php if ($konsentrasi == 'Desain Web') {echo ' selected';} ?>>Desain Web</option>
      </select>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Dosen Pembimbing 1</label>            
      <div class="form-group">
        <input type="text" name="dospem1" class="form-control form-control-user" value="<?php echo $dospem1; ?>">
      </div>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Dosen Pembimbing 2</label>            
      <div class="form-group">
        <input type="text" name="dospem2" class="form-control form-control-user" value="<?php echo $dospem2; ?>">
      </div>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Tanda Tangan Mahasiswa</label>
      <input type="file" name="ttd" class="form-control" accept="image/png">
      <small><span style="color: red"> * </span>Jika Belum Memiliki File Tanda Tangan, Silahkan Kunjungi <strong><a href="<?= base_url('ttd/index'); ?>" target="_blank">Link Ini</a></strong>. Simpan Dan Upload Pada Form Ini.</small><br>
      <small><span style="color: red"> * biarkan kosong jika tidak ingin mengubah.</span></small>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Temuan Masalah</label>
      <textarea name="masalah" class="form-control" required rows="5"><?php echo $masalah; ?></textarea>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Usulan Yang Diberikan</label>
      <textarea name="usulan" class="form-control" required rows="5"><?php echo $solusi; ?></textarea>
    </div>

    <div class="col-sm-12 mb-3">
      <label>Software/Aplikasi Yang Digunakan</label>
      <textarea name="software" class="form-control" required rows="5"><?php echo $software; ?></textarea>
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