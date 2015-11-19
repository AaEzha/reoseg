<?php
	include 'koneksi.php';
	
	function insertDataLembur($kode_lembur, $nip,$tgl_lembur,$jam_mulai,$jam_selesai,$keterangan){
       global $KoneksiDB;
       $sql="INSERT into tblembur (kode_lembur, nip,tgl_lembur,jam_mulai,jam_selesai,keterangan)VALUES ('$kode_lembur', '$nip','$tgl_lembur','$jam_mulai','$jam_selesai','$keterangan')";
       $hasil=mysql_query($sql);
       return ($hasil);
      }
      
    function readDataLembur($kode_lembur){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT	tblembur.kode_lembur,tbpegawai.nama_pegawai,tblembur.tgl_lembur,tblembur.jam_mulai,tblembur.jam_selesai,tblembur.keterangan
			 FROM tblembur,tbpegawai
			 WHERE tblembur.nip = tbpegawai.nip AND kode_lembur='$kode_lembur'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_lembur" =>$rows["kode_lembur"],
                               "nama_pegawai"=>$rows["nama_pegawai"],
                               "tgl_lembur"=>$rows["tgl_lembur"],
                               "jam_mulai"=>$rows["jam_mulai"],
                               "jam_selesai"=>$rows["jam_selesai"],
                               "keterangan"=>$rows["keterangan"]);
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
         
    function updateDataLembur($kode_lembur,$nip,$tgl_lembur,$jam_mulai,$jam_selesai,$keterangan){
       global $KoneksiDB;
       $sql="UPDATE tblembur SET nip='$nip',tgl_lembur='$tgl_lembur',jam_mulai='$jam_mulai',jam_selesai='$jam_selesai',keterangan ='$keterangan' WHERE kode_lembur='$kode_lembur' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataLembur($kode_lembur){
       global $KoneksiDB;
       $sql="DELETE FROM tblembur WHERE kode_lembur='$kode_lembur'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }    
      
      
      
	  
?>