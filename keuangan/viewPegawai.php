<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php
	include '../fungsiPegawai.php';
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataPegawai($_GET['nip']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_pegawai"); </script>';
			//header("location:index.php?pil=view_pegawai");
			}
		}
	$hasil = mysql_query("SELECT tbpegawai.nip,tbpegawai.nama_pegawai,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir,tbpegawai.jk,tbpegawai.agama,
						tbpegawai.status_pernikahan,tbpegawai.alamat,tbpegawai.hp,tbpegawai.no_telp,tbpegawai.email,tbpegawai.password,tbpegawai.facebook,
						tbpegawai.website,tbpegawai.photo,tbpegawai.tgl_mulai_kerja,tbpegawai.pendidikan_terakhir,tbpekerjaan.pekerjaan,tbpegawai.gaji_pokok 
						FROM tbpegawai,tbjabatan,tbpekerjaan WHERE tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan");	
?>
<body>
<div class="form-header-group" style="width:810px;">
  <h2 class="form-header" style="float:left;">Data Pegawai</h2>
  <img src="../asset/images/allpegawai.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">List Seluruh Pegawai</div>
      
  </div>
<table width="829" border="1" class="vtable" style="margin-left:0px;">
  <tr align="center">
    <th width="90">NIP</th>
    <th width="128">Nama Pegawai</th>
    <th width="121">Jabatan</th>
    <th width="114">Jenis Kelamin</th>
    <th width="93">Email</th>
    <th width="120">Gaji Pokok</th>
    <th width="117">Photo</th>
  </tr>
  <?php while ($row = mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0]?></td>
    <td align="center"><?php echo $row[1]?></td>
    <td align="center"><?php echo $row[2]?></td>
    <td align="center"><?php echo $row[5]?></td>
    <td align="center"><?php echo $row[11]?></td>
    <td align="center"><?php echo "Rp. ".$row[19]?></td>
    <td align="center"><img src="../asset/images/<?php echo $row[15]?>" alt="<?php echo $row[15]?>" width="75"/></td>
  </tr>
  <?php }?>
</table>
</body>
</html>