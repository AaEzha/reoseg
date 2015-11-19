<?php 
	include ('koneksi.php');
	
	function insertDataDivisi($kode_divisi, $nama_divisi){
	   global $KoneksiDB;
       $sql="INSERT into tbdivisi (kode_divisi, nama_divisi)VALUES ('$kode_divisi','$nama_divisi')";
       $hasil=mysql_query($sql);
       return ($hasil);
	}
	
	function readDataDivisi($kode_divisi){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT * FROM tbdivisi WHERE kode_divisi='$kode_divisi'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_divisi"  =>$rows["kode_divisi"],
                               "nama_divisi"=>$rows["nama_divisi"]);
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
     
    function updateDataDivisi($kode_divisi, $nama_divisi){
       global $KoneksiDB;
       $sql="UPDATE tbdivisi SET nama_divisi='$nama_divisi' WHERE kode_divisi='$kode_divisi' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataDivisi($kode_divisi){
       global $KoneksiDB;
       $sql="DELETE FROM tbdivisi WHERE kode_divisi='$kode_divisi'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	
?>