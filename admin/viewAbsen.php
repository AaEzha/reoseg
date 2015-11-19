<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../fungsiabsen.php';
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataabsen($_GET['kode_absen']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_absen"); </script>';
			//header("location:index.php?pil=view_absen");
			}
		}
	// query mengambil data absen dan pegawai
	$hasil = mysql_query("SELECT tbabsen.kode_absen,tbpegawai.nama_pegawai,tbabsen.bulan,
						  tbabsen.tahun,tbabsen.total_absen,tbabsen.total_lembur
			 			  FROM tbabsen,tbpegawai WHERE tbabsen.nip = tbpegawai.nip");
?>
<body>
<div class="form-header-group" style="width:700px; margin-left:20px;">
      <h2 class="form-header" style="float:left;">Data absen Pegawai</h2>
      <img src="../asset/images/absen.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List data absen pegawai</div>
      
  </div>
<table width="726" border="0" class="vtable" style="margin-left:20px;">
  <tr>
    <th width="66" align="center">Kode absen</th>
    <th width="109" align="center">Nama Pegawai</th>
    <th width="71" align="center">Bulan</th>
    <th width="72" align="center">Tahun</th>
    <th width="95" align="center">Total Absen</th>
    <th width="205" align="center">Total Lembur</th>
    <th width="78" align="center">Opsi</th>
  </tr>
  <?php while ($row=mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0]?></td>
    <td align="center"><?php echo $row[1]?></td>
    <td align="center"><?php echo $row[2]?></td>
    <td align="center"><?php echo $row[3]?></td>
    <td align="center"><?php echo $row[4]?></td>
    <td align="center"><?php echo $row[5]?></td>
    <td align="center"><a title="Update" href="index.php?pil=edit_absen&kode_absen=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="view_absen.php?pil=delete&kode_absen=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>