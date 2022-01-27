<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Induk Mahasiswa</h1>
    <ol class="breadcrumb">
      <a class="btn btn-info mr-2" href="#" data-toggle="modal" data-target="#printlaporan">Cetak Data</a>
      <a class="btn btn-primary" href="javascript:void(0);" data-toggle="modal" data-target="#tambahData">Tambah Data</a>
    </ol>
  </div>

  <!-- Row -->
  <div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover text-center" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>NPM</th>
                <th>NAMA</th>
                <th>TEMPAT, TANGGAL LAHIR</th>
                <th>FOTO</th>
                <th>NAMA AYAH</th>
                <th>TINDAKAN</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $d) { ?>

                <tr>
                  <td>
                    <?php echo $d->nim; ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->nama); ?>

                  </td>
                  <td>
                    <?php echo ucwords($d->tempat_lahir.', '.date("d-m-Y", strtotime($d->tgl_lahir))); ?>

                  </td>
                  <td>
                    <img style="width: 5rem" src="<?php echo base_url('assets/img/mhs/master/').$d->foto; ?>">

                  </td>
                  <td>
                    <?php echo ucwords($d->nama_ayah); ?>

                  </td>
                  <td>
                    <a style="width: 4rem;" href="<?php echo base_url('admin/edit_induk/').$d->nim; ?>" class="btn btn-sm btn-warning mb-2"> Edit </a>

                    <a style="width: 4rem;" href="<?php echo base_url('admin/hapus_induk/').$d->nim; ?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Yakin ingin menghapus data ini?');"> Hapus </a></td>
                  </tr>


                  <!-- <div class="modal fade" id="modalEdit<?php echo $nim; ?>" role="dialog">
                    <div class="modal-dialog">

                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Update Data Mahasiswa <?php echo $nim; ?></h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" action="editmhs.php" method="get">
                            <input type="hidden" name="id_mhs" value="<?php echo $nim; ?>">

                            <div class="modal-footer">  
                              <button type="submit" class="btn btn-success">Update</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div> -->


                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--Row-->
  </div>
  <!---Container Fluid-->

  <?php
  //Data Provinsi
  $curl = curl_init();

  // RajaOngkir
  // curl_setopt_array($curl, array(
  //   CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  //   CURLOPT_RETURNTRANSFER => true,
  //   CURLOPT_ENCODING => "",
  //   CURLOPT_MAXREDIRS => 10,
  //   CURLOPT_TIMEOUT => 30,
  //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //   CURLOPT_CUSTOMREQUEST => "GET",
  //   CURLOPT_HTTPHEADER => array(
  //     "key: 442a3c26f0da2f2a5f2818753b73d1d4"
  //   ),
  // ));
  //$provinsi = $data["rajaongkir"]["results"];


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

  ?>


  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="post" action="<?= base_url('admin/tambah_mhs'); ?>" enctype="multipart/form-data">
            <div class="form-group row">

              <div class="col-sm-12 mt-3">
                <label><b>I. Data Mahasiswa</b></label>
              </div>

              <div class="col-sm-12 mb-3">
                <label>NPM Mahasiswa</label>
                <input type="number" class="form-control form-control-user" name="nim" placeholder="NPM Mahasiswa" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Nama Mahasiswa</label>
                <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Mahasiswa" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Foto Mahasiswa</label>
                <input type="file" name="foto" class="form-control" required>
                <small><span style="color: red"> * </span>Pas Foto Ukuran 2x3 Menggunakan Almamater</small>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-user" name="jk" required>
                  <option value="" selected disabled>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control form-control-user" name="tempat_lahir" placeholder="Tempat Lahir Mahasiswa" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control form-control-user" name="tgl_lahir" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Agama</label>
                <select name="agama" class="form-control form-control-user" required>
                  <option value="" selected disabled>Pilih Agama..</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Provinsi</label>
                <select name="prov" class="form-control form-control-user" onchange="getDistrik()" required>
                  <option value="">Pilih Provinsi..</option>
                  <?php 
                  foreach ($provinsi as $p) { ?>
                    <option value="<?php echo $p['nama']; ?>" id_provinsi="<?php echo $p['id']; ?>"><?php echo $p['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kabupaten/Kota</label>
                <select class="form-control form-control-user" name="kab" id="kabupaten" required>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kecamatan</label>
                <select class="form-control form-control-user" name="kec" id="kecamatan" required>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kelurahan/Desa</label>
                <select class="form-control form-control-user" name="kel" id="kelurahan" required>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Alamat Lengkap</label>
                <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Lengkap" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Pekerjaan</label>
                <input type="text" class="form-control form-control-user" name="pekerjaan" placeholder="Pekerjaan Mahasiswa">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kontak</label>
                <input type="text" class="form-control form-control-user" name="kontak" placeholder="Kontak Mahasiswa" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Email</label>
                <input type="text" class="form-control form-control-user" name="email" placeholder="Email Mahasiswa" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Pendidikan</label>
                <select name="pendidikan" class="form-control form-control-user" required>
                  <option value="">Pilih Jenjang Pendidikan..</option>
                  <option value="Strata Satu (S1)">Strata Satu (S1)</option>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Program Studi</label>
                <select name="prodi" class="form-control form-control-user" required>
                  <option value="">Pilih Program Studi..</option>
                  <option value="Informatika">Informatika</option>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Tanggal Masuk</label>
                <input type="date" class="form-control form-control-user" name="tahun_masuk" required>
              </div>

              <div class="col-sm-12 mt-3">
                <label><b>II. Data Orang Tua/Wali</b></label>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Nama Ayah</label>
                <input type="text" class="form-control form-control-user" name="ayah" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Nama Ibu</label>
                <input type="text" class="form-control form-control-user" name="ibu" required>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Pekerjaan Ayah</label>
                <input type="text" class="form-control form-control-user" name="pekerjaan_ayah">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Pekerjaan Ibu</label>
                <input type="text" class="form-control form-control-user" name="pekerjaan_ibu">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Alamat Ayah</label>
                <input type="text" class="form-control form-control-user" name="alamat_ayah">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Alamat Ibu</label>
                <input type="text" class="form-control form-control-user" name="alamat_ibu">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kontak Ayah</label>
                <input type="text" class="form-control form-control-user" name="kontak_ayah">
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kontak Ibu</label>
                <input type="text" class="form-control form-control-user" name="kontak_ibu">
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" style="float: right;" class="btn btn-primary" value="Tambah">
          </form>
        </div>
      </div>
    </div>
  </div>





  <div class="modal fade" id="printlaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Cetak Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <script type="text/javascript">

            window.addEventListener("load", function(){

              document.getElementById("dummyText").style.display = "none";
              document.getElementById("dummyText1").style.display = "none";
              document.getElementById("dummyKab").style.display = "none";
              document.getElementById("dummyDiv").style.display = "none";

            });

            function check() {
              var el = document.getElementById("combo");
              var str = el.options[el.selectedIndex].text;
              if (str == "Keseluruhan") {
                document.getElementById("dummyText").style.display = "none";
                document.getElementById("dummyText1").style.display = "none";
                document.getElementById("dummyKab").style.display = "none";
                document.getElementById("dummyDiv").style.display = "none";
              }

              var d = new Date();
              var y = d.getFullYear();
              var n = d.getMonth() + 1;

              if (str == "Rentang Tahun Masuk") {
                document.getElementById("dummyText").style.display = "none";
                document.getElementById("dummyText1").style.display = "none";
                document.getElementById("dummyKab").style.display = "none";
                document.getElementById("dummyDiv").style.display = "flex";
                document.getElementById('waktu1').value = y-1;
                document.getElementById('waktu2').value = y;
              } else {}

              if (str == "Tahun Masuk") {
                document.getElementById("dummyText").style.display = "block";
                document.getElementById("dummyText1").style.display = "none";
                document.getElementById("dummyKab").style.display = "none";
                document.getElementById("dummyDiv").style.display = "none";
                document.getElementById('dummyText').type = 'number';
                document.getElementById('dummyText').value = y;
              } else {}

              if (str == "Jenis Kelamin") {
                document.getElementById("dummyText").style.display = "none";
                document.getElementById("dummyText1").style.display = "block";
                document.getElementById("dummyKab").style.display = "none";
                document.getElementById("dummyDiv").style.display = "none";
              } else {}

              if (str == "Kabupaten/Kota") {
                document.getElementById("dummyText").style.display = "none";
                document.getElementById("dummyText1").style.display = "none";
                document.getElementById("dummyKab").style.display = "block";
                document.getElementById("dummyDiv").style.display = "none";
              } else {}
            }

          </script>

          <form action="<?php echo base_url() . 'admin/cetak_induk'; ?>" target="_blank" method="post">

            <div class="form-group">
              <label>Filter Menurut Tanggal Lulus</label>
              <select class="form-control" name="filter" id="combo" onChange="check();">
                <option value="Keseluruhan">Keseluruhan</option>
                <option value="Tahun Masuk">Tahun Masuk</option>
                <option value="Jenis Kelamin">Jenis Kelamin</option>
                <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                <option value="Rentang Tahun Masuk">Rentang Tahun Masuk</option>
              </select>
            </div>




            <input class="form-control" id="dummyText" type="hidden" name="waktu">


            <select id="dummyText1" class="form-control form-control-user" name="jk">
              <option value="" selected disabled>Pilih Jenis Kelamin</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>


            <div class="row" id="dummyDiv">
              <div class="col">
                <input class="form-control" type="number" name="waktu1" id="waktu1">
              </div>
              _ 
              <div class="col">
                <input class="form-control" type="number" name="waktu2" id="waktu2">
              </div>
            </div>



            <div class="row" id="dummyKab">

              <div class="col-sm-12 mb-3">
                <label>Provinsi</label>
                <select name="provcetak" class="form-control form-control-user">
                  <option value="">Pilih Provinsi..</option>
                  <?php 
                  foreach ($provinsi as $p) { ?>
                    <option value="<?php echo $p['nama']; ?>" id_provinsi="<?php echo $p['id']; ?>"><?php echo $p['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-sm-12 mb-3">
                <label>Kabupaten/Kota</label>
                <select class="form-control form-control-user" name="kabcetak" id="kabupatenforcetak">
                </select>
              </div>

            </div>


            <div class="modal-footer">
              <button class="btn btn-default" type="submit" name="submit">Cetak</button>
            </div>
          </form>


        </div>
      </div>
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


      $("select[name=provcetak]").on("change", function(){
        var id_provinsi = $("option:selected",this).attr("id_provinsi");
        console.log(id_provinsi);

        $.ajax({
          type:'post',
          url:'<?php echo base_url("assets/datakabupatenforcetak.php"); ?>',
          data:'id_provinsi='+id_provinsi,
          success:function(hasil_kabupatenforcetak)
          {
            $("select[id=kabupatenforcetak]").html(hasil_kabupatenforcetak);
          }
        });
      });

    });
  </script>