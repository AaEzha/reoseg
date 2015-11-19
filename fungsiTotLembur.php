<?php
	include 'koneksi.php';
	
  if(isset($_GET['nip'],$_GET['bulan'],$_GET['tahun'])){
		$bln = $_GET['bulan'];
	    $thn = $_GET['tahun'];
		$nip = $_GET['nip'];
		
	
		$sql = mysql_query("SELECT SUM(HOUR(jam_selesai-jam_mulai)) AS lamakerja
		FROM tblembur
		WHERE MONTHNAME(tgl_lembur) = '$bln' AND YEAR(tgl_lembur) = '$thn' AND tblembur.nip = '$nip'");
				
				$rows = mysql_fetch_array($sql);
				echo $rows['lamakerja'];
	}
?>