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
	<title>Data Yudisium</title>
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
			<?php include ('kop yudisium.php'); ?>
			<div class="isi">
				<table width="100%" style="line-height: 1;">
					<tr>
						<td rowspan="3" width="8%">Lampiran</td>
						<td colspan="3">Keputusan Dekan Fakultas Teknik Komputer Universitas Cokroaminoto Palopo</td>
					</tr>
					<tr>
						<td width="10%">Nomor</td>
						<td width="1%">:</td>
						<td>:</td>
					</tr>
					<tr>
						<td width="10%">Tanggal</td>
						<td width="1%">:</td>
						<td><?php echo date("j ").$bln[date("m")].date(" Y"); ?></td>
					</tr>
				</table>

				<div style="text-align: center; line-height: 1.2;">
					<b>Daftar Nama Mahasiswa Program Sarjana</b><br>
					<b>Program Studi Informatika</b><br>
					<b>Fakultas Teknik Komputer</b><br>
					<b>Yudisium Pada Hari</b><br>
				</div>
				<br>
				<table width="100%" style="font-size: 6.8pt; line-height: 1; border:1px solid black;border-collapse:collapse;">
					<tr style="border:1px solid black;border-collapse:collapse;">
						<td rowspan="2" width="2.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							No
						</td>
						<td rowspan="2" width="5.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							NIM
						</td>
						<td rowspan="2" width="9%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Nama Mahasiswa
						</td>
						<td rowspan="2" width="11%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Tempat, Tanggal Lahir
						</td>
						<td rowspan="2" width="3.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Tahun Masuk
						</td>
						<td rowspan="2" width="8%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Tanggal Ujian Proposal
						</td>
						<td colspan="4" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Skripsi
						</td>
						<td rowspan="2" width="5.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Lama Studi
						</td>
						<td rowspan="2" width="3%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Total SKS
						</td>
						<td rowspan="2" width="2.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							IPK
						</td>
						<td rowspan="2" width="5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Predikat
						</td>
					</tr>
					<tr>
						<td style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Judul
						</td>
						<td width="16%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Nama Penguji
						</td>
						<td width="8%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Tgl Ujian
						</td>
						<td width="2.5%" style="border:1px solid black;border-collapse:collapse;text-align: center; vertical-align: middle; font-weight: bold;">
							Nilai
						</td>
					</tr>
					<?php 
					$yudisium = $this->db->query("SELECT * FROM tbl_yudisium")->result();
					$i=1;
					foreach ($yudisium as $y) { 
						$tgl_yudisium = $y->tgl_yudisium;
						$tgl_ujian_proposal = date("j ", strtotime($y->tgl_ujian_proposal)).$bln[date("m", strtotime($y->tgl_ujian_proposal))].date(" Y", strtotime($y->tgl_ujian_proposal));
						$tgl_ujian_skripsi = date("j ", strtotime($y->tgl_ujian_skripsi)).$bln[date("m", strtotime($y->tgl_ujian_skripsi))].date(" Y", strtotime($y->tgl_ujian_skripsi));
						$querymhs = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim = '$y->nim'")->result();
						foreach ($querymhs as $mhs) {
							$nim = $mhs->nim;
							$nama = $mhs->nama;
							$gender = $mhs->jenis_kelamin;
							$ttl = $mhs->tempat_lahir.', '.date("j ", strtotime($mhs->tgl_lahir)).$bln[date("m", strtotime($mhs->tgl_lahir))].date(" Y", strtotime($mhs->tgl_lahir));
							$thn_masuk = $mhs->tahun_masuk;
							$agama = $mhs->agama;
							$alamat = $mhs->alamat_mhs.', '.$mhs->kel_mhs.', Kecamatan '.$mhs->kec_mhs.', '.$mhs->kab_mhs.', '.$mhs->prov_mhs;
							$kontak = $mhs->kontak_mhs;
							$email = $mhs->email;
							$prodi = $mhs->prodi;
							$pendidikan = $mhs->pendidikan;
						} 
						?>



						<tr>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; text-align: center; vertical-align: middle;">
								<?php echo $i++; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $nim; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; font-weight: bold; text-align: left;">
								<?php echo $nama; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $ttl; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $thn_masuk; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $tgl_ujian_proposal; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->judul_skripsi; ?>
							</td>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $y->penguji_1; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $tgl_ujian_proposal; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->nilai; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->lama_studi; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->total_sks; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->ipk; ?>
							</td>
							<td rowspan="4" style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: center;">
								<?php echo $y->predikat; ?>
							</td>
						</tr>
						<tr>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $y->penguji_2; ?>
							</td>
						</tr>
						<tr>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $y->penguji_3; ?>
							</td>
						</tr>
						<tr>
							<td style="border:1px solid black;border-collapse:collapse; vertical-align: middle; text-align: left;">
								<?php echo $y->penguji_4; ?>
							</td>
						</tr>
					<?php } ?>
				</table>

				<table width="100%" style="line-height: 0.8; margin-top: 1rem;">
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
						<td><?php echo date("j ").$bln[date("m")].date(" Y"); ?></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3">Dekan,</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><img style="width: 9rem; margin-bottom: -40px; margin-top: -20px; mix-blend-mode: multiply;" src="<?php echo base_url('assets/img/ttd/ttd-dekan.png'); ?>"></td>
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
				</table>

			</div>
		</div>
	</div> 
</div>

</body>
</html>
<script type="text/javascript">
	window.print();
</script>