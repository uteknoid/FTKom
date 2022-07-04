<?php 

$bln = array(
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember'
);

?>
<style type="text/css">
  table tr{
    vertical-align: top;
  }
</style>
<div id="contact" class="contact-us section" style="min-height: 50rem;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4>PROFILE ANDA</h4>
          <div class="line-dec"></div>
        </div>
      </div>
      <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
        <form id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-12">
              <div class="fill-form">
                <div class="row">
                  <div class="col-lg-12 table-responsive">
                    <?php foreach ($mahasiswa as $mhs) { 
                      $nim = $mhs->nim;
                      $nama = $mhs->nama;
                      $gender = $mhs->jenis_kelamin;
                      $ttl = $mhs->tempat_lahir.', '.date("j ", strtotime($mhs->tgl_lahir)).$bln[date("m", strtotime($mhs->tgl_lahir))].date(" Y", strtotime($mhs->tgl_lahir));
                      $agama = $mhs->agama;
                      $alamat = $mhs->alamat_mhs.', '.$mhs->kel_mhs.', Kecamatan '.$mhs->kec_mhs.', '.$mhs->kab_mhs.', '.$mhs->prov_mhs;
                      $kontak = $mhs->kontak_mhs;
                      $email = $mhs->email;
                      $prodi = $mhs->prodi;
                      $pendidikan = $mhs->pendidikan;
                      ?>

                      <table width="100%">
                        <tr>
                          <td rowspan="17" width="13%"><img style="width: 7rem; margin-right: 2rem;" src="<?= base_url('assets/img/mhs/master/').$mhs->foto;?>"></td>
                          <td width="22%">Nama Lengkap</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $nama;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Nim</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $nim;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Jenis Kelamin</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $gender;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Tempat/Tanggal Lahir</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo ucwords($ttl);?></td>
                        </tr>
                        <tr>
                          <td width="22%">Agama</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $agama;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Alamat</td>
                          <td width="3%">:</td>
                          <td width="75%" style="word-break: break-word;"><?php echo $alamat;?></td>
                        </tr>
                        <tr>
                          <td width="22%">No. Kontak</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $kontak;?></td>
                        </tr>
                        <tr>
                          <td width="22%">E-Mail</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $email;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Program Studi</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $prodi;?></td>
                        </tr>
                        <tr>
                          <td width="22%">Program Pendidikan</td>
                          <td width="3%">:</td>
                          <td width="75%"><?php echo $pendidikan;?></td>
                        </tr>
                      </table>

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
