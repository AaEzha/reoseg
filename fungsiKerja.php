<?php
	
	include 'koneksi.php';
	
	function insertDataKerja($kode_pekerjaan,$kode_divisi,$pekerjaan){
	   global $KoneksiDB;
       $sql="INSERT into tbpekerjaan (kode_pekerjaan, kode_divisi,pekerjaan)VALUES ('$kode_pekerjaan','$kode_divisi','$pekerjaan')";
       $hasil=mysql_query($sql);
       return ($hasil);
	}
	
	function readDataKerja($kode_pekerjaan){
       global $KoneksiDB;
       $data=array();
       $error=0;
		
       $sql= "SELECT tbpekerjaan.kode_pekerjaan,tbdivisi.nama_divisi,tbpekerjaan.pekerjaan
			 FROM tbpekerjaan,tbdivisi 
			 WHERE tbpekerjaan.kode_divisi = tbdivisi.kode_divisi AND kode_pekerjaan='$kode_pekerjaan'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_pekerjaan"=>$rows["kode_pekerjaan"],
                               "nama_divisi"=>$rows["nama_divisi"],
                   			   "pekerjaan"=>$rows["pekerjaan"]);
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

    function updateDataKerja($kode_pekerjaan,$kode_divisi, $pekerjaan){
       global $KoneksiDB;
       $sql="UPDATE tbpekerjaan SET kode_divisi='$kode_divisi',pekerjaan='$pekerjaan' WHERE kode_pekerjaan='$kode_pekerjaan' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataKerja($kode_pekerjaan){
       global $KoneksiDB;
       $sql="DELETE FROM tbpekerjaan WHERE kode_pekerjaan='$kode_pekerjaan'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	
?>