<?php
	include ('koneksi.php');
	
	function insertDataJabatan($kode_jab, $nama_jab,$tunj_jab){
       global $KoneksiDB;
       $sql="INSERT into tbjabatan (kode_jab, nama_jab,tunj_jab)VALUES ('$kode_jab', '$nama_jab','$tunj_jab')";
       $hasil=mysql_query($sql);
       return ($hasil);
      }
	  
	function readDataJabatan($kode_jab){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT * FROM tbjabatan WHERE kode_jab='$kode_jab'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_jab"  =>$rows["kode_jab"],
                               "nama_jab"=>$rows["nama_jab"],
                               "tunj_jab"=>$rows["tunj_jab"]);
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
	// edit data jabatan
	function updateDataJabatan($kode_jab, $nama_jab,$tunj_jab){
       global $KoneksiDB;
       $sql="UPDATE tbjabatan SET nama_jab='$nama_jab',tunj_jab='$tunj_jab' WHERE kode_jab='$kode_jab' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	//fungsi delete jabatan
	function deleteDataJabatan($kode_jab){
       global $KoneksiDB;
       $sql="DELETE FROM tbjabatan WHERE kode_jab='$kode_jab'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	
   
?>