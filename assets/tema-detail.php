<?php

if($_POST['nim']) {
  $nim = $_POST['nim'];
  echo $nim;

  $query = $this->db->query("SELECT * FROM tbl_mahasiswa where nim = '$nim' ORDER BY nim DESC")->result();

  foreach ($query as $mhs) {
    $nama_mhs = $mhs->nama;
  }
  echo $nama_mhs;
}
?>