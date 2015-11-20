<?php
	include 'koneksi.php';
	include 'fungsiAbsen.php';
	session_start();
	$tgl = $_POST['tgl'];
	$jam = $_POST['jam'];
	$absen = $_POST['absen'];
	$idnya = mysql_real_escape_string($_POST['idnya']);

	if($idnya==""){
		echo '<script language="javascript">alert("Username / Password Salah");
		location.replace("index.php"); </script>';
	}else{
		if($absen=="Datang"){
			$jam_kerja = jamkerja($idnya); // ambil jam kerja jabatannya, 08:00:00
			$selisih = selisihjam($jam,$jam_kerja);

			if($selisih==NULL){
				$telat = "0";
			}else{
				$telat = $selisih;
			}

			mysql_query("INSERT INTO tbabsen(nip,tanggal,jam,jenis,telat) VALUES('$idnya','$tgl','$jam','$absen','$telat')");
			echo '<script language="javascript">alert("Absensi OK! Anda telat '.$telat.' jam.");';
		}else{
			mysql_query("INSERT INTO tbabsen(nip,tanggal,jam,jenis) values('$idnya','$tgl','$jam','$absen')");
			echo '<script language="javascript">alert("Absensi OK!");';
		}
	}
	echo 'location.replace("index.php"); </script>';
	/*		echo '<script language="javascript">alert("Username / Password Salah");
			location.replace("index.php"); </script>';
	*/
?>