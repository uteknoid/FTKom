<?php 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, 'https://api.binderbyte.com/wilayah/provinsi?api_key=aa8b2973a884a612b8794f077a860e4c8144a63c57585444cedcbe11acd1b2ba'); 
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
// curl_setopt($ch, CURLOPT_HEADER, 0); 
// $prov = curl_exec($ch); 

// $err = curl_error($ch);
// curl_close($ch); 

// $data = json_decode($prov, true); 
// print_r($data); 
// echo $data;

$ch = curl_init(); 

    // set url 
curl_setopt($ch, CURLOPT_URL, "https://api.binderbyte.com/wilayah/provinsi?api_key=aa8b2973a884a612b8794f077a860e4c8144a63c57585444cedcbe11acd1b2ba");

    // return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
$output = curl_exec($ch); 

    // tutup curl 
curl_close($ch);      

    // menampilkan hasil curl
echo $output;
?>