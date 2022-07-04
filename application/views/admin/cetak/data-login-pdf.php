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
	<title>Data Login Mahasiswa <?php echo $bln[date("m")].date(" Y"); ?></title>

	<link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
</head>
<style type="text/css">
	/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
	thead{
		background-color: #fc544b;
	}
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
		th{
			color: #000;
		}
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
	<div class="page">
		<div class="subpage">
			<br>
			<div class="isi">
				<h4 class="text-center mb-5"><strong>Data Login Mahasiswa <?php echo $bln[date("m")].date(" Y"); ?></strong></h4>
				<table width="100%" class="table table-sm table-striped table-bordered table-info">
					<thead>
						<tr class="text-center bg-danger text-white">
							<th>NO</th>
							<th>NIM</th>
							<th>NAMA</th>
							<th>PASSWORD</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$login = $this->db->query("SELECT * FROM data_login")->result();
						foreach ($login as $l) {
							$nim = $l->nim;
							$pass = $l->password;

							$mahasiswa = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE nim='$nim'")->result();
							foreach ($mahasiswa as $mhs) { 
								$nama = $mhs->nama;
								$no = 1;
							} ?>

							<tr class="font-weight-bold">
								<td class="text-center"><?php echo $no++; ?></td>
								<td><?php echo $nim; ?></td>
								<td><?php echo $nama; ?></td>
								<td><?php echo $pass; ?></td>
							</tr>

						<?php } ?>
					</tbody>
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