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
	$hasil = mysql_query("SELECT sum(telat) as jumtelat, count(nip) as jumpegawai, tanggal from tbabsen where jenis='Datang' group by tanggal order by tanggal desc");
?>
<body>
<div class="form-header-group" style="width:700px; margin-left:20px;">
      <h2 class="form-header" style="float:left;">Data absen Pegawai</h2>
      <img src="../asset/images/absen.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List data absen pegawai</div>
      
  </div>
<table width="726" border="0" class="vtable" style="margin-left:20px;">
  <tr>
    <th width="66" align="center">No</th>
    <th width="72" align="center">Tanggal</th>
    <th width="72" align="center">Bulan</th>
    <th width="72" align="center">Tahun</th>
    <th width="100" align="center">Jumlah Pegawai</th>
    <th width="71" align="center">Jumlah Telat</th>
    <th width="78" align="center">Detail</th>
  </tr>
  <?php $i=1; while ($row=mysql_fetch_array($hasil)){?>
  <?php $tgl = explode("-", $row['tanggal']); ?>
  <tr>
    <td align="center"><?php echo $i++;?></td>
    <td align="center"><?php echo $tgl[2];?></td>
    <td align="center"><?php echo $tgl[1];?></td>
    <td align="center"><?php echo $tgl[0]?></td>
    <td align="center"><?php echo $row['jumpegawai']?></td>
    <td align="center"><?php echo $row['jumtelat']?> jam</td>
    <td align="center"><a title="View" href="index.php?pil=absen&tgl=<?=$row['tanggal'];?>"><img src="../asset/images/edit.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>