<?php
	include 'koneksi.php';
	
	function insertDataPegawai($nip, $nama_pegawai,$kode_jab,$tempat_lahir,$tgl_lahir,$jk,$agama,$status,$alamat,$hp,$no_telp,$email,$password,$facebook,$website,$photo,$tgl_mulai_kerja,$pendidikan_terakhir,$kode_pekerjaan,$gapok,$uang_makan,$uang_lembur){
       global $KoneksiDB;
       $sql="INSERT into tbpegawai (nip, nama_pegawai,kode_jab,tempat_lahir,tgl_lahir,jk,agama,status_pernikahan,alamat,hp,no_telp,email,password,facebook,website,photo,tgl_mulai_kerja,pendidikan_terakhir,kode_pekerjaan,gaji_pokok) VALUES ('$nip', '$nama_pegawai','$kode_jab','$tempat_lahir','$tgl_lahir','$jk','$agama','$status','$alamat','$hp','$no_telp','$email','$password','$facebook','$website','$photo','$tgl_mulai_kerja','$pendidikan_terakhir','$kode_pekerjaan','$gapok','$uang_makan','$uang_lembur')";
       $hasil=mysql_query($sql);
       return ($hasil);}
      
    function readDataPegawai($nip){
       global $KoneksiDB;
       $data=array();
       $error=0;

       $sql="SELECT tbpegawai.nip,tbpegawai.nama_pegawai,tbjabatan.nama_jab,tbpegawai.tempat_lahir,
             tbpegawai.tgl_lahir,tbpegawai.jk,tbpegawai.agama,tbpegawai.status_pernikahan,
             tbpegawai.alamat,tbpegawai.hp,tbpegawai.no_telp,tbpegawai.email,tbpegawai.password,
             tbpegawai.facebook,tbpegawai.website,tbpegawai.photo,tbpegawai.tgl_mulai_kerja,
             tbpegawai.pendidikan_terakhir,tbpekerjaan.pekerjaan,tbpegawai.gaji_pokok,tbpegawai.uang_makan,tbpegawai.uang_lembur
			 FROM tbpegawai,tbjabatan,tbpekerjaan 
			 WHERE tbpegawai.kode_jab = tbjabatan.kode_jab 
			 AND tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan AND nip='$nip'";

       $hasil=mysql_query($sql);
       if($hasil){
           if (mysql_num_rows($hasil)){
               while($rows=mysql_fetch_assoc($hasil)){
                   $data=array( "nip"  =>$rows["nip"],
                                "nama_pegawai"=>$rows["nama_pegawai"],
                   				"nama_jab"=>$rows["nama_jab"],
                   				"tempat_lahir"=>$rows["tempat_lahir"],
                   				"tgl_lahir"=>$rows["tgl_lahir"],
                   				"jk"=>$rows["jk"],
                   				"agama"=>$rows["agama"],
                   				"status_pernikahan"=>$rows["status_pernikahan"],
                   				"alamat"=>$rows["alamat"],
                   				"hp"=>$rows["hp"],
                   				"no_telp"=>$rows["no_telp"],
                   				"email"=>$rows["email"],
                   				"password"=>$rows["password"],
                   				"facebook"=>$rows["facebook"],
                   				"website"=>$rows["website"],
                   				"photo"=>$rows["photo"],
                   				"tgl_mulai_kerja"=>$rows["tgl_mulai_kerja"],
                   				"pendidikan_terakhir"=>$rows["pendidikan_terakhir"],
                   				"pekerjaan"=>$rows["pekerjaan"],
                   				"gaji_pokok"=>$rows["gaji_pokok"],
								"uang_makan"=>$rows["uang_makan"],
								"uang_lembur"=>$rows["uang_lembur"]);	
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

    function updateDataPegawai($nip, $nama_pegawai,$kode_jab,$tempat_lahir,$tgl_lahir,$jk,$agama,
    $status,$alamat,$hp,$no_telp,$email,$password,$facebook,$website,$photo,$tgl_mulai_kerja,
    $pendidikan_terakhir,$kode_pekerjaan,$gapok,$uang_makan,$uang_lembur){
       global $KoneksiDB;
       $sql="UPDATE tbpegawai SET nama_pegawai='$nama_pegawai',kode_jab='$kode_jab',
       tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',agama='$agama',
       status_pernikahan='$status',alamat='$alamat',hp='$hp',no_telp='$no_telp',
       email='$email',password='$password',facebook='$facebook',website='$website',
       photo='$photo',tgl_mulai_kerja='$tgl_mulai_kerja',pendidikan_terakhir='$pendidikan_terakhir',
       kode_pekerjaan='$kode_pekerjaan',gaji_pokok='$gapok',uang_makan=$uang_makan',uang_lembur=$uang_lembur'
       WHERE nip='$nip'";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function updateDataPegawai1($nip, $nama_pegawai,$kode_jab,$tempat_lahir,$tgl_lahir,$jk,$agama,
	$status,$alamat,$hp,$no_telp,$email,$password,$facebook,$website,$tgl_mulai_kerja,
	$pendidikan_terakhir,$kode_pekerjaan,$gapok,$uang_makan,$uang_lembur){
       global $KoneksiDB;
       $sql="UPDATE tbpegawai SET nama_pegawai='$nama_pegawai',kode_jab='$kode_jab',
       tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jk='$jk',agama='$agama',
       status_pernikahan='$status',alamat='$alamat',hp='$hp',no_telp='$no_telp',
       email='$email',password='$password',facebook='$facebook',website='$website',
       tgl_mulai_kerja='$tgl_mulai_kerja',pendidikan_terakhir='$pendidikan_terakhir',
       kode_pekerjaan='$kode_pekerjaan',gaji_pokok='$gapok',uang_makan=$uang_makan',uang_lembur=$uang_lembur'

       WHERE nip='$nip'";
       $hasil=mysql_query($sql);
       return ($hasil);
    }
	
	function deleteDataPegawai($nip){
       global $KoneksiDB;
       $sql="DELETE FROM tbpegawai WHERE nip='$nip'";
       $hasil=mysql_query($sql);
       return ($hasil);
   }	  