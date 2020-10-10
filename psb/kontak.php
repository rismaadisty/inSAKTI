<?php
	include "conf/koneksi.php";

	/* versi PDO */
	$sql = $conn->prepare("SELECT * FROM identitas_web LIMIT 1");
	$sql->execute();
	$r = $sql->fetch();

	echo "<div class='well'>";
		echo "
		<center>
			<h3>$r[nm_sekolah]</h3>
			<p>$r[alamat_sekolah]</p><br>
			<img src='img/tlp.png' width='75' height='75'><p>$r[tlp_sekolah]</p>
			<img src='img/email.png' width='75' height='75'><p>$r[email_sekolah]</p>
		</center>";
	echo "</div>";
?>