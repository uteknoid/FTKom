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
	<title>Data Tema (<?php echo $nim.' - '.$nama; ?>)</title>
</head>
<style type="text/css">
	/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 12pt "Calibri";
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
		margin-top: -17px;
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
		padding-bottom: 1%;
	}


</style>
<body>
	<?php foreach ($tema as $a) { ?>

		<div class="page">
			<div class="subpage">
				<?php $this->load->view('admin/cetak/kop'); ?>
				<h3 style="text-align: center; line-height: 1.2; margin-top: -3px;">FORMULIR PENGUSULAN TEMA SKRIPSI<br>PROGRAM STUDI INFORMATIKA</h3>
				<div class="isi">
					<table width="100%" style="font-weight: bold;">
						<tr>
							<td width="37%"></td>
							<td width="3%"></td>
							<td width="50%"></td>
							<td width="10%"></td>
						</tr>
						<tr>
							<td width="37%">Nama Mahasiswa</td>
							<td width="3%">:</td>
							<td colspan="2"><?php echo $a->nama;?></td>
						</tr>
						<tr>
							<td>NIM</td>
							<td>:</td>
							<td colspan="2"><?php echo $a->nim;?></td>
						</tr>
						<tr>
							<td>NO. HP</td>
							<td>:</td>
							<td colspan="2"><?php echo $a->kontak_mhs;?></td>
						</tr>
						<tr>
							<td rowspan="2">Status Mahasiswa</td>
							<td colspan="2">1. Reguler</td>
							<td>
								<?php if ($a->status_mhs == "Reguler") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">2. Konversi</td>
							<td>
								<?php if ($a->status_mhs == "Konversi") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td rowspan="5">Konsentrasi Bidang</td>
							<td colspan="2">1. Rekayasa Perangkat Lunak</td>
							<td>
								<?php if ($a->konsentrasi == "Rekayasa Perangkat Lunak") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">2. Jaringan Komputer</td>
							<td>
								<?php if ($a->konsentrasi == "Jaringan Komputer") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">3. Sistem Informasi Geografis</td>
							<td>
								<?php if ($a->konsentrasi == "Sistem Informasi Geografis") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">4. Multimedia</td>
							<td>
								<?php if ($a->konsentrasi == "Multimedia") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td colspan="2">5. Desain Web</td>
							<td>
								<?php if ($a->konsentrasi == "Desain Web") { ?>
									<span style="border: 1px solid black; padding: 0 0.8rem; font-size: 1.2rem;">&#10004;</span>
								<?php }else{ ?>
									<span style="border: 1px solid black; padding: 0 1.3rem; font-size: 1.2rem;"></span>
								<?php } ?>
							</td>
						</tr>

						<?php // echo date("j ", strtotime($a->tgl_pengajuan)).$bln[date("m", strtotime($a->tgl_pengajuan))].date(" Y", strtotime($a->tgl_pengajuan));?>
						
						<tr>
							<td style="text-align: left;">Pembimbing Utama (1)</td>
							<td>:</td>
							<td colspan="2"><?php echo $a->dospem1 ?></td>
						</tr>
						<tr>
							<td style="text-align: left;">Pembimbing Pendamping (2)</td>
							<td>:</td>
							<td colspan="2"><?php echo $a->dospem2 ?></td>
						</tr>



						<!-- <tr>
							<td>Judul Skripsi</td>
							<td>:</td>
							<td colspan="2" style="word-break: break-word;"><?php echo $skripsi;?></td>
						</tr> -->
					</table>

					<p>
						CATATAN
						<ul style="margin-top: -17px;">
							<li>Silahkan centang sesuai dengan data sebenarnya.</li>
							<li>Mahasiswa/i membawa/melampirkan hard file (tercetak) jurnal penelitian yang terkait (pendukung) minimal 3 judul.</li>
							<li>Jurnal penelitian terkait minimal keluaran 5 tahun terakhir</li>
							<li>Nama pembimbing diberikan oleh Ketua Program Studi setelah tema disetujui.</li>
						</ul>
					</p>

					<table width="100%" style="line-height: 1;">
						<tr>
							<td width="60%"></td>
							<td width="40%">Mengetahui;</td>
						</tr>
						<tr>
							<td>Mahasiswa,</td>
							<td>Ketua Program Studi</td>
						</tr>
						<tr>
							<td><img style="width: 12rem; margin-bottom: -40px; margin-top: -20px; margin-left: -20px; mix-blend-mode: multiply;" src="<?php echo base_url('assets/img/mhs/ttd/').$a->ttd; ?>"></td>
							<td><img style="width: 12rem; margin-bottom: -40px; margin-top: -20px; margin-left: -20px; mix-blend-mode: multiply;" src="<?php echo base_url('assets/img/ttd/ttd-prodi.png'); ?>"></td>
						</tr>
						<tr>
							<td style="font-weight: bold;">(<?php echo $a->nama;?>)</td>
							<td style="font-weight: bold;">Vicky Bin Djusmin, S.Kom., M.Kom.</td>
						</tr>
						<tr>
							<td style="line-height: .5;">NIM. <?php echo $a->nim;?></td>
							<td style="line-height: .5;">NIDN. 0927119004</td>
						</tr>
					</table>

				</div>
			</div>
		</div> 


		<div class="page">
			<div class="subpage">
				<div class="isi" style="font-weight: bold; line-height: 1.2;">
					<table width="100%">
						<tr>
							<td colspan="3">LAMPIRAN 1.</td>
						</tr>
						<tr>
							<td width="22%">Nama Mahasiswa</td>
							<td width="3%">:</td>
							<td width="75%"><?php echo $a->nama;?></td>
						</tr>
						<tr>
							<td>NIM</td>
							<td>:</td>
							<td><?php echo $a->nim;?></td>
						</tr>
						<tr>
							<td>Konsentrasi Bidang</td>
							<td>:</td>
							<td><?php echo $a->konsentrasi;?></td>
						</tr>
					</table>
					<div style="margin-left: 2%;">
						<div style="margin-top: 10px;">
							1. Temuan Masalah:
						</div>
						<div style="border: 2px solid black; height: 13.5em; padding: 3px; line-height: 1; font-weight: normal; margin-top: 5px;">
							<?php echo $a->masalah;?>
						</div>
						<div style="margin-top: 10px;">
							2. Usulan Solusi yang diberikan<br>Tahapan Peneltian:
						</div>
						<div style="border: 2px solid black; height: 24.5em; padding: 3px; line-height: 1; font-weight: normal; margin-top: 5px;">
							<?php echo $a->solusi;?>
						</div>
						<div style="margin-top: 10px;">
							3. Software/Aplikasi yang digunakan:
						</div>
						<div style="border: 2px solid black; height: 8.5em; padding: 3px; line-height: 1; font-weight: normal; margin-top: 5px;">
							<?php echo $a->software;?>
						</div>
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