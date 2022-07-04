<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

  <!-- Row -->
  <div class="row">
    <h1 class="h3 mb-3 text-gray-800">Edit Data Mahasiswa</h1>


    <?php
  //Data Provinsi
    $curl = curl_init();
  //Binderbyte
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $prov = curl_exec($curl); 
    $err = curl_error($curl);
    curl_close($curl); 

    $data = json_decode($prov, true); 
    if ($data != NULL){
      $provinsi = $data["provinsi"];
    }else{
      echo '<h3 style="color: red; text-align: center; margin-top: 10rem;">Koneksi Internet Diperlukan Untuk Mengakses Data Wilayah Indonesia. Mohon Aktifkan Koneksi Internet Anda Terlebih Dahulu!</h3>';
    }


    foreach ($mahasiswa as $m) {
      $nim = $m->nim;
      $nama = $m->nama;
      $jk = $m->jenis_kelamin;
      $tempat_lahir = $m->tempat_lahir;
      $tgl_lahir = $m->tgl_lahir;
      $agama = $m->agama;
      $nama_ayah = $m->nama_ayah;
      $nama_ibu = $m->nama_ibu;
      $pekerjaan_ayah = $m->pekerjaan_ayah;
      $pekerjaan_ibu = $m->pekerjaan_ibu;
      $pekerjaan_mhs = $m->pekerjaan_mhs;
      $alamat_ayah = $m->alamat_ayah;
      $alamat_ibu = $m->alamat_ibu;
      $alamat_mhs = $m->alamat_mhs;
      $kontak_ayah = $m->kontak_ayah;
      $kontak_ibu = $m->kontak_ibu;
      $kontak_mhs = $m->kontak_mhs;
      $email = $m->email;
      $prodi = $m->prodi;
      $pendidikan = $m->pendidikan;
      $tahun_masuk = $m->tahun_masuk;
    }
    ?>

    <form class="user" method="post" action="<?= base_url('admin/update_induk'); ?>" enctype="multipart/form-data">
      <div class="form-group row">

        <div class="col-sm-12 mt-3">
          <label><b>I. Data Mahasiswa</b></label>
        </div>

        <div class="col-sm-12 mb-3">
          <label>NPM Mahasiswa</label>
          <input type="hidden" class="form-control form-control-user" name="nimasli" placeholder="NPM Mahasiswa" value="<?php echo $nim; ?>" required>
          <input type="number" class="form-control form-control-user" name="nim" placeholder="NPM Mahasiswa" value="<?php echo $nim; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Nama Mahasiswa</label>
          <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Mahasiswa" value="<?php echo $nama; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Foto Mahasiswa</label>
          <input type="file" name="foto" class="form-control">
          <small style="color: red;">Biarkan kosong jika tidak ingin mengubah foto</small><br>
          <small><span style="color: red"> * </span>Pas Foto Ukuran 2x3 Menggunakan Almamater</small>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Jenis Kelamin</label>
          <select class="form-control form-control-user" name="jk" required>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki" <?php if ($jk == "Laki-Laki") { echo ' selected'; } ?>>Laki-Laki</option>
            <option value="Perempuan" <?php if ($jk == "Perempuan") { echo ' selected'; } ?>>Perempuan</option>
          </select>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Tempat Lahir</label>
          <input type="text" class="form-control form-control-user" name="tempat_lahir" placeholder="Tempat Lahir Mahasiswa" value="<?php echo $tempat_lahir; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Tanggal Lahir</label>
          <input type="date" class="form-control form-control-user" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Agama</label>
          <select name="agama" class="form-control form-control-user" required>
            <option value="" selected disabled>Pilih Agama..</option>
            <option value="Islam" <?php if ($agama == "Islam") { echo ' selected'; } ?>>Islam</option>
            <option value="Kristen" <?php if ($agama == "Kristen") { echo ' selected'; } ?>>Kristen</option>
            <option value="Protestan" <?php if ($agama == "Protestan") { echo ' selected'; } ?>>Protestan</option>
            <option value="Hindu" <?php if ($agama == "Hindu") { echo ' selected'; } ?>>Hindu</option>
            <option value="Budha" <?php if ($agama == "Budha") { echo ' selected'; } ?>>Budha</option>
            <option value="Konghucu" <?php if ($agama == "Konghucu") { echo ' selected'; } ?>>Konghucu</option>
          </select>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Provinsi</label>
          <select name="prov" class="form-control form-control-user" onchange="getDistrik()">
            <option value="">Pilih Provinsi..</option>
            <?php 
            foreach ($provinsi as $p) { ?>
              <option value="<?php echo $p['nama']; ?>" id_provinsi="<?php echo $p['id']; ?>"><?php echo $p['nama']; ?></option>
            <?php } ?>
          </select>
          <small style="color: red;">Biarkan kosong jika tidak ingin mengubah alamat</small>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kabupaten/Kota</label>
          <select class="form-control form-control-user" name="kab" id="kabupaten">
          </select>
          <small style="color: red;">Biarkan kosong jika tidak ingin mengubah alamat</small>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kecamatan</label>
          <select class="form-control form-control-user" name="kec" id="kecamatan">
          </select>
          <small style="color: red;">Biarkan kosong jika tidak ingin mengubah alamat</small>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kelurahan/Desa</label>
          <select class="form-control form-control-user" name="kel" id="kelurahan">
          </select>
          <small style="color: red;">Biarkan kosong jika tidak ingin mengubah alamat</small>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Alamat Lengkap</label>
          <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Lengkap" value="<?php echo $alamat_mhs; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Pekerjaan</label>
          <input type="text" class="form-control form-control-user" name="pekerjaan" placeholder="Pekerjaan Mahasiswa"value="<?php echo $pekerjaan_mhs; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kontak</label>
          <input type="text" class="form-control form-control-user" name="kontak" placeholder="Kontak Mahasiswa" value="<?php echo $kontak_mhs; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Email</label>
          <input type="text" class="form-control form-control-user" name="email" placeholder="Email Mahasiswa" value="<?php echo $email; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Pendidikan</label>
          <select name="pendidikan" class="form-control form-control-user" required>
            <option value="">Pilih Jenjang Pendidikan..</option>
            <option value="Strata Satu (S1)" <?php if ($pendidikan == "Strata Satu (S1)") { echo ' selected'; } ?>>Strata Satu (S1)</option>
          </select>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Program Studi</label>
          <select name="prodi" class="form-control form-control-user" value="<?php echo $nama; ?>" required>
            <option value="">Pilih Program Studi..</option>
            <option value="Informatika" <?php if ($prodi == "Informatika") { echo ' selected'; } ?>>Informatika</option>
          </select>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Tanggal Masuk</label>
          <input type="date" class="form-control form-control-user" name="tahun_masuk" value="<?php echo $tahun_masuk; ?>" required>
        </div>

        <div class="col-sm-12 mt-3">
          <label><b>II. Data Orang Tua/Wali</b></label>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Nama Ayah</label>
          <input type="text" class="form-control form-control-user" name="ayah" value="<?php echo $nama_ayah; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Nama Ibu</label>
          <input type="text" class="form-control form-control-user" name="ibu" value="<?php echo $nama_ibu; ?>" required>
        </div>

        <div class="col-sm-12 mb-3">
          <label>Pekerjaan Ayah</label>
          <input type="text" class="form-control form-control-user" name="pekerjaan_ayah"value="<?php echo $pekerjaan_ayah; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Pekerjaan Ibu</label>
          <input type="text" class="form-control form-control-user" name="pekerjaan_ibu"value="<?php echo $pekerjaan_ibu; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Alamat Ayah</label>
          <input type="text" class="form-control form-control-user" name="alamat_ayah"value="<?php echo $alamat_ayah; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Alamat Ibu</label>
          <input type="text" class="form-control form-control-user" name="alamat_ibu"value="<?php echo $alamat_ibu; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kontak Ayah</label>
          <input type="text" class="form-control form-control-user" name="kontak_ayah"value="<?php echo $kontak_ayah; ?>" >
        </div>

        <div class="col-sm-12 mb-3">
          <label>Kontak Ibu</label>
          <input type="text" class="form-control form-control-user" name="kontak_ibu"value="<?php echo $kontak_ibu; ?>" >
        </div>

      </div>

      <input type="submit" style="float: right;" class="btn btn-primary" value="Simpan">
    </form>
  </div>
</div>


<script type="text/javascript"> 
  $(document).ready(function(){

    $("select[name=prov]").on("change", function(){
      var id_provinsi = $("option:selected",this).attr("id_provinsi");
      console.log(id_provinsi);

      $.ajax({
        type:'post',
        url:'<?php echo base_url("assets/datakabupaten.php"); ?>',
        data:'id_provinsi='+id_provinsi,
        success:function(hasil_kabupaten)
        {
          $("select[id=kabupaten]").html(hasil_kabupaten);
        }
      });
    }); 


    $("select[name=kab]").on("change", function(){
      var id_kabupaten = $("option:selected",this).attr("id_kabupaten");
      console.log(id_kabupaten);

      $.ajax({
        type:'post',
        url:'<?php echo base_url("assets/datakecamatan.php"); ?>',
        data:'id_kabupaten='+id_kabupaten,
        success:function(hasil_kecamatan)
        {
          $("select[id=kecamatan]").html(hasil_kecamatan);
        }
      });
    }); 


    $("select[name=kec]").on("change", function(){
      var id_kecamatan = $("option:selected",this).attr("id_kecamatan");
      console.log(id_kecamatan);

      $.ajax({
        type:'post',
        url:'<?php echo base_url("assets/datakelurahan.php"); ?>',
        data:'id_kecamatan='+id_kecamatan,
        success:function(hasil_kelurahan)
        {
          $("select[id=kelurahan]").html(hasil_kelurahan);
        }
      });
    }); 

  });
</script>