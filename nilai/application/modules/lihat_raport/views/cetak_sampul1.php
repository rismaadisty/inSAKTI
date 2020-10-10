<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<style type="text/css">
		body {font-family: arial; font-size: 12pt; border: solid 3px #000; padding-bottom: 100px}
		.table {border-collapse: collapse; border: solid 1px #999; width:100%}
		.table tr td, .table tr th {border:  solid 1px #999; padding: 3px; font-size: 12px}
		img{max-width: 320px;height: auto;}
		.rgt {text-align: right;}
		.ctr {text-align: center;}
	</style>
</head>
<body>
	<center>
		<br><br><br><br>
		<img src="<?php echo base_url(); ?>aset/img/logo_garuda.jpg"><br><br><br>
		<span style="font-size: 14pt"><b style="font-size: 18pt">LAPORAN</b><br>
		HASIL PENCAPAIAN KOMPETENSI PESERTA DIDIK<br>
		SEKOLAH MENENGAH KEJURUAN<br><br>
		SMK SAKTI GEMOLONG <br>
		Alamat : Jl. Raya Sukowati Km.1 Gemolong Sragen<br>
		Telp 08112654446 fax (0271) 6811607<br>
		<i>e-mail :smksakti1974@gmail.com homepage: www.smksakti.sch.id</i>
		</span>
		<br>
		<br>
		<br>
		<br>
		<br>
		<img src="<?php echo base_url(); ?>aset/img/logo.png"><br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<p>Nama Peserta Didik</p>
		<div style="display: inline-block; font-weight: bold; padding: 15px; width: 300px; border: solid 1px #000"><?php echo $ds['nama']; ?></div><br>
		<p>NIS / NISN</p>
		<div style="display: inline-block; font-weight: bold; padding: 15px; width: 300px; border: solid 1px #000"><?php echo $ds['nis']." / ".$ds['nisn']; ?></div><br>
		<br>
		<br>
		<br>
		KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>
		REPUBLIK INDONESIA




	</center>
	
</body>
</html>