<?php 
$id_kecamatan = $_POST["id_kecamatan"];
//Data Distrik 
$curl = curl_init(); 


// curl_setopt_array($curl, array( 
//   CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$id_provinsi, 
//   CURLOPT_RETURNTRANSFER => true, 
//   CURLOPT_ENCODING => "", 
//   CURLOPT_MAXREDIRS => 10, 
//   CURLOPT_TIMEOUT => 30, 
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
//   CURLOPT_CUSTOMREQUEST => "GET", 
//   CURLOPT_HTTPHEADER => array( 
//     "Key: 442a3c26f0da2f2a5f2818753b73d1d4" 
//   ), 
// )); 

// $kab = curl_exec($curl); 
// $err = curl_error($curl); 

// curl_close($curl); 

// $data = json_decode($kab, true); 
// $distrik = $data["rajaongkir"]["results"];

//Binderbyte
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan='.$id_kecamatan,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));
$prov = curl_exec($curl); 
curl_close($curl); 

$data = json_decode($prov, true); 
$kelurahan = $data["kelurahan"];


echo '<option value="" selected disabled>Pilih Kabupaten/Kota..</option>';

foreach ($kelurahan as $d) { ?>
  <option value="<?php echo $d['nama']; ?>" id_kelurahan="<?php echo $d['id']; ?>"><?php echo $d['nama']; ?></option>
  <?php } ?>