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

foreach ($mahasiswa as $mhs) {
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
} 

foreach ($yudisium as $yudi) {
	$ipkpredikat = $yudi->ipk.' ('.$yudi->predikat.')';
	$skripsi = $yudi->judul_skripsi;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Data Alumni (<?php echo $nim.' - '.$nama; ?>)</title>
</head>
<style type="text/css">
	/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 12pt "Arial";
	}
	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	.page {
		width: 210mm;
		min-height: 297mm;
		padding: 1.27cm 1.27cm 0 2.25cm;
		margin: 10mm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
		height: 277mm;
		max-width: 100%;
		display: block;
		line-height: 1.5;
		word-wrap: break-word;
	}

	.isi{
		text-align: justify;
	}

	@page {
		size: A4;
		margin: 0;
	}
	@media print {
		html, body {
			width: 210mm;
			height: 297mm;        
		}
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}

	td{
		vertical-align: top;
	}


</style>
<body>
	<?php foreach ($alumni as $a) { ?>

		<div class="page">
			<div class="subpage">
				<?php //include ('kop.php'); ?>
				<br>
				<div class="isi">
					<table width="100%">
						<tr>
							<td rowspan="17" width="13%"><img style="width: 7rem; margin-right: 2rem;" src="<?= base_url('assets/img/mhs/alumni/').$a->foto;?>"></td>
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
						<tr>
							<td width="22%">Tanggal Lulus</td>
							<td width="3%">:</td>
							<td width="75%"><?php echo date("j ", strtotime($a->tgl_lulus)).$bln[date("m", strtotime($a->tgl_lulus))].date(" Y", strtotime($a->tgl_lulus));?></td>
						</tr>
						<tr>
							<td width="22%" style="text-align: left;">Indeks Prestasi dan Predikat Yudisium</td>
							<td width="3%">:</td>
							<td width="75%"><?php echo $ipkpredikat;?></td>
						</tr>
						<tr>
							<td width="22%">Judul Skripsi</td>
							<td width="3%">:</td>
							<td width="75%" style="word-break: break-word;"><?php echo $skripsi;?></td>
						</tr>
					</table>
				</div>
			</div>
		</div> 
	</div>
<?php } ?>
</body>
</html>
<script type="text/javascript">
	window.print();
</script>