<?php
	include 'koneksi.php';
	// Menampilkan Data Pegawai
	if(isset($_GET['nip'])){
		$nip = $_GET['nip'];
		
	if($nip){
		$query = mysql_query("SELECT tbpegawai.nama_pegawai,tbdivisi.nama_divisi,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir, tbpegawai.jk,tbpegawai.status_pernikahan,
		tbpegawai.gaji_pokok,tbjabatan.tunj_jab,tbpegawai.photo,tbpegawai.email,tbpegawai.hp,tbpegawai.pendidikan_terakhir,tbabsen.total_absen,tbabsen.total_lembur
		FROM tbpegawai,tbdivisi,tbjabatan,tbpekerjaan,tbabsen
		WHERE tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan	AND tbpekerjaan.kode_divisi = tbdivisi.kode_divisi
		AND tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.nip = '$nip'");
				
		$rows = mysql_fetch_array($query);
				echo $rows["nama_pegawai"]. "#" .$rows["nama_divisi"]."#" .$rows["nama_jab"]. "#" .$rows["tempat_lahir"]. 
				"#" .$rows["tgl_lahir"]. "#" .$rows["jk"]."#" .$rows["status_pernikahan"]. "#" .$rows["gaji_pokok"]. 
				"#" .$rows["tunj_jab"]."#" .$rows["photo"]. "#" .$rows["email"]."#" .$rows["hp"]. "#" .$rows["pendidikan_terakhir"]."#" .$rows["total_absen"]."#" .$rows["total_lembur"];
									
	}
	}
	
		
	function insertDataGaji($kode_gaji, $nip,$gapok,$insentive,$tunjangan,$gator,$pph,$gaber,$bulan,$thr,$bonus,$bpjs,$jamsostek,$jamsostek1,$totalabsen,$totalembur,$uangmakan){
       global $KoneksiDB;
       $tgl = Date("Y");
       $sql="INSERT into tbgaji (kode_gaji,nip,gaji_pokok,insentive,tunjangan,gaji_kotor,pph,gaji_bersih,tgl_hitung_gaji,bulan,tahun) VALUES ('$kode_gaji', '$nip','$gapok','$insentive','$tunjangan',$gator,'$pph','$gaber',now(),
       '$bulan','$tgl')";
	   $hasil=mysql_query($sql);
       return ($hasil);
      }
   function deleteDataGaji($kode_gaji){
       global $KoneksiDB;
       $sql="DELETE FROM tbgaji WHERE kode_gaji='$kode_gaji'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	   
?>