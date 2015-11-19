<?php
	include ('koneksi.php');
	
	function insertDataJabatan($username,$password,$nama){
       global $KoneksiDB;
       $sql="INSERT into tbuser (username,password,nama)VALUES ('$username','$password','$nama')";
       $hasil=mysql_query($sql);
       return ($hasil);
      }
	  
	function readDataJabatan($username){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT * FROM tbuser WHERE username='$username'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("username"=>$rows["username"],
                               "password"=>$rows["password"],
                               "nama"=>$rows["nama"]);
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
	function updateDataUser($username,$password,$nama){
       global $KoneksiDB;
       $sql="UPDATE tbuser SET password='$password',nama='$nama' WHERE username='$username' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	//fungsi delete jabatan
	function deleteDataUser($username){
       global $KoneksiDB;
       $sql="DELETE FROM tbuser WHERE username='$username'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	
   
?>