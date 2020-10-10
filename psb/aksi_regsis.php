<?php
	session_start();
	include "conf/koneksi.php";
	include "conf/library.php";
	
	if($_POST['captcha'] == $_SESSION['captcha']['code']){

  		function antiinjection($data){
  			$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  			return $filter_sql;
		}

		$nisn = antiinjection($_POST['nisn']);
		$nm_siswa = antiinjection($_POST['nm_siswa']);
		$asal_skl = antiinjection($_POST['asal_skl']);
		$email = antiinjection($_POST['email']);
		$password_baru = antiinjection($_POST['password']);
		$kompetensi = antiinjection($_POST['kompetensi']);

		$kode = "USM";

		$today = date("ym");

		$nisn = $nisn;

		$sql1 = $conn->prepare("SELECT max(no_ujian) AS last FROM ujian_masuk
								WHERE no_ujian LIKE '$kode%'
								AND '$today%'");
		$sql1->execute();
		$data = $sql1->fetch();

		$lastTest = $data['last'];

		$lastNoTes = substr($lastTest, 8, 4);

		$nextNo = $lastNoTes + 1;

		$nextTestNo = $kode.$today.sprintf('%04s', $nextNo);

		$kd = "PSB";

		$today = date("ym");

		$nisn = $nisn;

		$sql2 = $conn->prepare("SELECT max(no_reg) AS last FROM psb
								WHERE no_reg LIKE '$kd%'
								AND '$today%'");
		$sql2->execute();
		$data = $sql2->fetch();

		$lastReg = $data['last'];

		$lastReg = substr($lastReg, 8, 4);

		$nextReg = $lastReg + 1;

		$nextRegNo = $kd.$today.sprintf('%04s', $nextReg);
	
		$cek_regsis = $conn->prepare("SELECT nisn, email_siswa FROM psb
									WHERE nisn = :nisn
									OR email_siswa = :email ");
		$cek_regsis->bindParam(":nisn", $nisn);
		$cek_regsis->bindParam(":email", $email);
		$cek_regsis->execute();
		$num_rows = $cek_regsis->fetchColumn();

		if($num_rows > 0){   
			echo" <script>alert('NISN atau email siswa telah terdaftar.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
			exit;
		}

		else{
	
			try{
				$query1 = "INSERT INTO psb (no_reg,
										tgl_daftar,
										jam_daftar,
										password,
										id_kompetensi,
										nisn,
		                                nm_siswa,
										email_siswa,
                                        asal_sekolah)
                                 VALUES('$nextRegNo',
                                 		'$tgl_sekarang',
                                 		'$jam_sekarang',
                                 		'$password_baru',
										'$kompetensi',
										'$nisn',
										'$nm_siswa',
								        '$email',
										'$asal_skl')";
				$conn->exec($query1);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}

			try{
				$query2 = "INSERT INTO ujian_masuk (no_ujian,
			                                  no_reg,
			                                  tgl_ujian)
			                          VALUES ('$nextTestNo',
			                          		  '$nextRegNo',
			                          		  '$tglujian')";
				$conn->exec($query2);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
										
	if($cek_regsis){   
			echo" <script>alert('Terimakasih.. Anda telah terdaftar menjadi calon siswa SMK Sakti Gemolong. Login untuk melanjutkan pendaftaran');</script>";
			echo "<meta http-equiv='refresh' content='0;url=daftar-casis-lolos-ver.html'>";
			exit;
    }	
		}
	} 
	else {
		echo "<script>window.alert('Kode captcha yang Anda isikan tidak cocok..');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
?>