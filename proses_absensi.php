<?php
	include 'koneksi.php';
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
			//
		}else{
			$sql = mysql_query("INSERT INTO tbabsen(nip,tanggal,jam,jenis) values('$idnya','$tgl','$jam','$absen')");
		}
		
	}
	$sql = mysql_query ("SELECT	 tbpegawai.email,tbjabatan.kode_jab,tbjabatan.nama_jab
FROM tbpegawai,tbjabatan
WHERE tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.email = '$username' AND tbpegawai.password = '$password'");
    $row = mysql_fetch_row($sql);
	
	if($row){
		
		if($row[2]=='Direktur' or $row[2]=='Komisioner' or $row[2]=='General Manager'){
			$_SESSION['user']=$row[0];
			header("location:direktur/index.php");
		}
		
		if($row[2]=='Manager Divisi Marketing & Sales' or $row[2]=='Manager Divisi Engineering' 
		or $row[2]=='Manager Divisi Konsultan' or $row[2]== 'Supervisor' or $row[2]=='Staf Administrasi' 
		or $row[2]=='Staf Engineering' or $row[2]=='Staf Marketing & Sales' or $row[2]=='Staf Konsultan'){
			$_SESSION['user']=$row[0];
			header("location:staff/index.php");
			}
			
		if($row[2]=='Manager Divisi Administrasi & Keuangan' or $row[2]=='Administrator'){
			$_SESSION['user']=$row[0];
			echo "<script>alert('Welcome Aboard $username!'); window.location ='admin/index.php'</script>";
			}
			
		if($row[2]=='Staf Keuangan'){
			$_SESSION['user']=$row[0];
			header("location:keuangan/index.php");
			}	
			
		}else{
			echo '<script language="javascript">alert("Username / Password Salah");
			location.replace("index.php"); </script>';
			}
?>