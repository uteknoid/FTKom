
<div id="contact" class="contact-us section" style="min-height: 50rem;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4>PENGAJUAN TEMA</h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-12">
              <div class="fill-form">
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h4 style="font-weight: bold;">
                      <?php foreach ($mahasiswa as $m) {
                        echo 'Selamat Datang, '.$m->nim.' - '.ucwords($m->nama).'<br><br>';
                      } ?>
                    </h4>
                    <?php if ($tema_cek > 0){ 
                      foreach ($tema as $t) {
                        if ($t->status == '0') { ?>
                          <h5>STATUS PENGAJUAN: <em class="text-warning">DITINJAU</em></h5><br>
                          <button class="btn btn-primary btn-lg" disabled>BELUM DAPAT DICETAK</button>
                        <?php } elseif ($t->status == '1') { ?>
                          <h5>STATUS PENGAJUAN: <em class="text-success">ACC</em></h5><br>
                          <a href="<?= base_url('mahasiswa/cetak_tema/').$t->nim; ?>" class="btn btn-primary btn-lg" target="_blank">CETAK</a>
                        <?php } elseif ($t->status == '2') { ?>
                          <h5>STATUS PENGAJUAN: <em class="text-danger">DITOLAK</em></h5><br>
                          <a href="<?= base_url('mahasiswa/ajukan_tema'); ?>" class="btn btn-primary btn-lg">AJUKAN LAGI</a>
                        <?php }
                      } 
                    }else{ ?>
                      <h5>ANDA BELUM MENGAJUKAN TEMA</h5><br>
                      <a href="<?= base_url('mahasiswa/ajukan_tema'); ?>" class="btn btn-primary btn-lg">AJUKAN TEMA</a>
                    <?php } ?>
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
