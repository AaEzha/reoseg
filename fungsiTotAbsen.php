<?php
	include 'koneksi.php';
	
  if(isset($_GET['nip'],$_GET['bulan'],$_GET['tahun'])){
		$bln = $_GET['bulan'];
	    $thn = $_GET['tahun'];
		$nip = $_GET['nip'];
		
	
		$sql = mysql_query("SELECT tbabsen.total_absen,tbabsen.total_absen
		FROM tbabsen
		WHERE (total_absen) = '$bln' AND YEAR(total_absen) = '$thn' AND tbabsen.nip = '$nip'");
				
				$rows = mysql_fetch_array($sql);
				echo $rows['lamakerja'];
	}
?>