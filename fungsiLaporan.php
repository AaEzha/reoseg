<?php
	include 'koneksi.php';
	
	function insertDataLap($kode_lap,$nip,$upload_file,$keterangan){
       global $KoneksiDB;
       $sql="INSERT into tblaporan (kode_lap,nip,upload_file,tgl_upload,keterangan)VALUES ('$kode_lap','$nip','$upload_file',now(),'$keterangan')";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
    
    function readDataLap($kode_lap){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT tblaporan.kode_lap,tbpegawai.nama_pegawai,tblaporan.upload_file,tblaporan.tgl_upload,tblaporan.keterangan
			 FROM tblaporan,tbpegawai
			 WHERE tblaporan.nip = tbpegawai.nip AND kode_lap='$kode_lap'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array("kode_lap" =>$rows["kode_lap"],
                               "nama_pegawai"=>$rows["nama_pegawai"],
                               "upload_file"=>$rows["upload_file"],
                               "tgl_upload"=>$rows["tgl_upload"],
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

     function updateDataLap($kode_lap,$nip,$upload_file,$keterangan){
       global $KoneksiDB;
       $sql="UPDATE tblaporan SET nip='$nip',upload_file='$upload_file',tgl_upload= now(),keterangan='$keterangan' WHERE kode_lap='$kode_lap' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	 function updateDataLaporan($kode_lap,$nip,$keterangan){
       global $KoneksiDB;
       $sql="UPDATE tblaporan SET nip='$nip',keterangan='$keterangan' WHERE kode_lap='$kode_lap' ";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataLap($kode_lap){
       global $KoneksiDB;
       $sql="DELETE FROM tblaporan WHERE kode_lap='$kode_lap'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }    
?>