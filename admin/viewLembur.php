<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../fungsiLembur.php';
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataLembur($_GET['kode_lembur']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_lembur"); </script>';
			//header("location:index.php?pil=view_lembur");
			}
		}
	// query mengambil data lembur dan pegawai
	$hasil = mysql_query("SELECT tblembur.kode_lembur,tbpegawai.nama_pegawai,tblembur.tgl_lembur,
						  tblembur.jam_mulai,tblembur.jam_selesai,tblembur.keterangan
			 			  FROM tblembur,tbpegawai WHERE tblembur.nip = tbpegawai.nip");
?>
<body>
<div class="form-header-group" style="width:700px; margin-left:20px;">
      <h2 class="form-header" style="float:left;">Data Lembur Pegawai</h2>
      <img src="../asset/images/lembur.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List data lembur pegawai</div>
      
  </div>
<table width="726" border="0" class="vtable" style="margin-left:20px;">
  <tr>
    <th width="66" align="center">Kode Lembur</th>
    <th width="109" align="center">Nama Pegawai</th>
    <th width="71" align="center">Tanggal Lembur</th>
    <th width="72" align="center">Jam Mulai</th>
    <th width="95" align="center">Jam Selesai</th>
    <th width="205" align="center">Keterangan Lembur</th>
    <th width="78" align="center">Aksi</th>
  </tr>
  <?php while ($row=mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td align="center"><?php echo $row[2]?></td>
    <td align="center"><?php echo $row[3]?></td>
    <td align="center"><?php echo $row[4]?></td>
    <td align="center"><?php echo $row[5]?></td>
    <td align="center"><a title="Update" href="index.php?pil=edit_lembur&kode_lembur=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="viewLembur.php?pil=delete&kode_lembur=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>