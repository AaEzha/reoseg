<?php
	include 'koneksi.php';

  function jamkerja($idnya){
    $qjk = mysql_query ("SELECT  tbjabatan.jam_kerja FROM tbpegawai,tbjabatan WHERE tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.nip = '$idnya'");
      $djk = mysql_fetch_array($qjk);
      return $djk['jam_kerja'];
  }

  function namapeg($nip){
    $q = mysql_query("select nama_pegawai from tbpegawai where nip='$nip'");
    $d = mysql_fetch_array($q);
    return $d['nama_pegawai'];
  }

  function selisihjam($jam_datang,$jam_kerja){
    $q = mysql_query("select time('$jam_datang')-time('$jam_kerja') as selisih");
    $d = mysql_fetch_array($q);
    $selisih = $d['selisih'];
    $hasil = round($selisih / 10000);
    if($hasil>=1){
      return $hasil;
    }else{
      return NULL;
    }
  }
	
	function insertDataabsen($kode_absen, $nip,$bulan,$tahun,$total_absen,$total_lembur){
       global $KoneksiDB;
       $sql="INSERT into tbabsen (kode_absen, nip,bulan,tahun,total_absen,total_lembur)VALUES ('$kode_absen', '$nip','$bulan','$tahun','$total_absen','$total_lembur')";
       $hasil=mysql_query($sql);
       return ($hasil);
      }
      
    function readDataabsen($kode_absen){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT	tbabsen.kode_absen,tbpegawai.nama_pegawai,tbabsen.bulan,tbabsen.tahun,tbabsen.total_absen,tbabsen.total_lembur
			 FROM tbabsen,tbpegawai
			 WHERE tbabsen.nip = tbpegawai.nip AND kode_absen='$kode_absen'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_absen" =>$rows["kode_absen"],
                               "nama_pegawai"=>$rows["nama_pegawai"],
                               "bulan"=>$rows["bulan"],
                               "tahun"=>$rows["tahun"],
                               "total_absen"=>$rows["total_absen"],
                               "total_lembur"=>$rows["total_lembur"]);
               }
           }else{
             $error=2; //jika data tidak ditemukan
           }
         }else{
             $error=1; // jika sql gagal
            } $hasil=array("errorcode"=>$error,
                            "data"=>$data);
              return ($hasil);
         }  
         
    function updateDataabsen($kode_absen,$nip,$bulan,$tahun,$total_absen,$total_lembur){
       global $KoneksiDB;
       $sql="UPDATE tbabsen SET nip='$nip',bulan='$bulan',tahun='$tahun',total_absen='$total_absen',total_lembur='$total_lembur' WHERE kode_absen='$kode_absen' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataabsen($kode_absen){
       global $KoneksiDB;
       $sql="DELETE FROM tbabsen WHERE kode_absen='$kode_absen'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }    
      
      
      
	  
?>