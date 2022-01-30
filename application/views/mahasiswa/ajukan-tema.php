<?php foreach ($mahasiswa as $m) {
  $nim = $m->nim;
} ?>
<div id="contact" class="contact-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4>PENGAJUAN TEMA</h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" method="post" action="<?= base_url('mahasiswa/tambah_tema'); ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12">
              <div class="fill-form">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="hidden" name="nim" value="<?php echo $nim; ?>">

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

                    <div class="col-sm-12 mb-5">
                      <label>Software/Aplikasi Yang Digunakan</label>
                      <textarea name="software" class="form-control" required rows="5"></textarea>
                    </div>

                    <div class="col-sm-12 mb-3">
                      <input type="submit" class="btn btn-lg btn-warning form-control" value="AJUKAN">
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
