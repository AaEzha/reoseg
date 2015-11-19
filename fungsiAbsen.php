<?php
	include 'koneksi.php';
	
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