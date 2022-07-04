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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Data Mahasiswa</title>
</head>
<style type="text/css">
	/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 7.5pt "Times New Roman";
	}
	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	.page {
		width: 277mm;
		min-height: 190mm;
		padding: .3cm .5cm 0 .5cm;
		margin: 10mm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
		height: 210mm;
		max-width: 100%;
		display: block;
		line-height: 1.5;
		word-wrap: break-word;
	}

	.isi{
		text-align: justify;
	}

	@page {
		size: landscape A4;
		margin: 0;
	}
	@media print {
		html, body {
			width: 297mm;
			height: 210mm;        
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
	<div class="page">
		<div class="subpage">
			<?php //include ('kop yudisium.php'); ?>
			<div class="isi">
				<table width="100%" style="font-size: 6.8pt; line-height: 1; border:1px solid black;border-collapse:collapse;">
					<tr style="border:1px solid black;border-collapse:collapse;">
						<td colspan="2" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Nomor
						</td>
						<td rowspan="2" width="5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Pas Foto (2x3)
						</td>
						<td rowspan="2" width="10%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							NAMA MAHASISWA
						</td>
						<td rowspan="2" width="1%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							L/P
						</td>
						<td rowspan="2" width="10%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Tempat dan Tanggal Lahir
						</td>
						<td rowspan="2" width="4%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Agama
						</td>
						<td rowspan="2" width="8%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Nama Orang Tua
						</td>
						<td colspan="2" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							PEKERJAAN
						</td>
						<td colspan="2" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							ALAMAT
						</td>
						<td rowspan="2" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Keterangan
						</td>
					</tr>
					<tr>
						<td width="1%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Urut
						</td>
						<td width="5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							NPM
						</td>
						<td width="8%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Orang Tua
						</td>
						<td width="8%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Mahasiswa
						</td>
						<td width="10%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Orang Tua
						</td>
						<td width="18%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Mahasiswa
						</td>
					</tr>
					<?php 
					foreach ($mahasiswa as $mhs) {
						$nim = $mhs->nim;
						$foto = $mhs->foto;
						$nama = $mhs->nama;
						$gender = $mhs->jenis_kelamin;
						$ttl = $mhs->tempat_lahir.', '.date("j ", strtotime($mhs->tgl_lahir)).$bln[date("m", strtotime($mhs->tgl_lahir))].date(" Y", strtotime($mhs->tgl_lahir));
						$agama = $mhs->agama;
						$nama_ayah = $mhs->nama_ayah;
						$nama_ibu = $mhs->nama_ibu;
						$pekerjaan_ayah = $mhs->pekerjaan_ayah;
						$pekerjaan_ibu = $mhs->pekerjaan_ibu;
						$pekerjaan_mhs = $mhs->pekerjaan_mhs;
						$alamat_ayah = $mhs->alamat_ayah;
						$alamat_ibu = $mhs->alamat_ibu;
						$alamat_mhs = $mhs->alamat_mhs.', '.$mhs->kel_mhs.', Kecamatan '.$mhs->kec_mhs.', '.$mhs->kab_mhs.', '.$mhs->prov_mhs;
						$kontak_ayah = $mhs->kontak_ayah;
						$kontak_ibu = $mhs->kontak_ibu;
						$kontak_mhs = $mhs->kontak_mhs;
						?>

						<tr>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; text-align: center; vertical-align: middle;">
								<?php //echo $i++; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; text-align: center; vertical-align: middle;">
								<?php echo $nim; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<img style="width: 2cm;" src="<?php echo base_url('assets/img/mhs/master/').$foto; ?>">
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; text-align: left; vertical-align: middle;">
								<?php echo $nama; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; font-weight: bold; text-align: center;">
								<?php 
								if($gender=='Laki-Laki'){
									echo 'L';
								}else{
									echo 'P';
								} 
								?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $ttl; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $agama; ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $nama_ayah; ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $pekerjaan_ayah; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $pekerjaan_mhs; ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $alamat_ayah; ?>
							</td>
							<td rowspan="2" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: justify;">
								<?php echo $alamat_mhs; ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $kontak_ayah; ?>
							</td>
						</tr>
						<tr>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $nama_ibu ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $pekerjaan_ibu ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $alamat_ibu ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $kontak_mhs ?>
							</td>
						</tr>
					<?php } ?>
				</table>

				<!-- <table width="100%" style="line-height: 0.8; margin-top: 1rem;">
					<tr>
						<td width="80%"></td>
						<td width="6%">Ditetapkan</td>
						<td>:</td>
						<td>Palopo</td>
					</tr>
					<tr>
						<td></td>
						<td>Pada Tanggal</td>
						<td>:</td>
						<td><?php //echo date("j ").$bln[date("m")].date(" Y"); ?></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3">Dekan,</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><img style="width: 9rem; margin-bottom: -40px; margin-top: -20px; mix-blend-mode: multiply;" src="<?php //echo base_url('assets/img/ttd/ttd-dekan.png'); ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3">Nirsal, S.Kom., M.Pd.</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3">NIDN. 1234567890</td>
					</tr>
				</table>

				<table width="100%" style="line-height: 1;">
					<tr>
						<td width="80%">Tembusan disampaikan dengan hormat kepada:</td>
						<td></td>
					</tr>
					<tr>
						<td style="padding-left: 5rem;">
							1. Kepala LLDIKTI Wilayah IX <br>
							2. Rektor Universitas Cokroaminoto Palopo <br>
							3. Direktur Akademik UNCP <br>
							4. Ketua Program Studi <br>
							5. Arsip
						</td>
						<td></td>
					</tr>
				</table> -->

			</div>
		</div>
	</div> 
</div>

</body>
</html>
<script type="text/javascript">
	window.print();
</script>