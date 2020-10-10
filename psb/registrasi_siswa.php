<?php
	session_start();
	include("assets/simple-captcha/simple-php-captcha.php");
	$_SESSION['captcha'] = simple_php_captcha();
?>

<script type="text/javascript">
	function validasi(){
		/*--- validasi combo bidang kompetensi ---*/
		var kmpt = (form1.kompetensi.value);
		if(kmpt == 0){
			alert("Pilih bidang kompetensi.");
			document.form1.kompetensi.focus();
			return false;
		}
	}
</script>

<div class="alert alert-info">
    <p>Lengkapi formulir blanko pendaftaran siswa dibawah ini.</p>
<?php if(isset($_GET['status'])): ?>
    <p class="status">
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Selamat !! Anda berhasil mendaftar sebagai calon siswa baru <b>SMK Sakti Gemolong, Silakan Lanjutkan untuk melengkapi formuli pendaftaran</b>. <b><a href='http://localhost/web%20aplikasi/insakti/login/index.php'>Lanjutkan</a></b>";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
<?php endif; ?>
</div>

<div class="well">
	<form role="form1" name="form1" action="aksi-registrasi.html" method="post" onSubmit="return validasi()" >
	<p>
		<div class="form-group">
        	<label for="nisn">NISN*</label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN"  required="required">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="nm_siswa">Nama Siswa*</label>
            <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" placeholder="Masukkan nama siswa"  required="required">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="asal_skl">Asal Sekolah*</label>
            <input type="text" class="form-control" name="asal_skl" id="asal_skl" placeholder="Masukkan asal sekolah"  required="required">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="email">E-mail Siswa*</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="jhon@maildomain.com"  required="required">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="password">Password*</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Kata sandi"  required="required">
        </div>
	</p>

	<p>
		<div class="form-group">
			<label>Bidang Kompetensi*</label>
			<select class="form-control" name="kompetensi">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Bidang Kompetensi -</option>";

						/* versi PDO */
						$aktif = 'Y';
						$sql = $conn->prepare("SELECT * FROM kompetensi 
												WHERE aktif_kompetensi = :aktif_kompetensi 
												ORDER BY id_kompetensi");
						$sql->bindParam(":aktif_kompetensi", $aktif);
						$sql->execute();
						while ($r = $sql->fetch()){
							echo "<option value=$r[id_kompetensi]>$r[bid_kompetensi]</option>";
						} 
				?>
  			</select>
		</div>
	</p>

	<?php
		/* captcha from https://www.abeautifulsite.net/a-simple-php-captcha-script --*/
        echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';
        echo "<br>";
	?>

	<p>
		<div class="form-group">
        	<input type="text" class="form-control" name="captcha" id="captcha" placeholder="Masukkan kode captcha diatas." required="required">
    	</div>
    </p>
	
    <p align="right">
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</p>

	</form>
</div>