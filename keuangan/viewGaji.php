<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Pegawai</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include ('../fungsiGaji.php');
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataGaji($_GET['kode_gaji']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_gaji"); </script>';
			//header("location:index.php?pil=view_gaji");
			}
		}
	
	$hasil= mysql_query("SELECT tbgaji.kode_gaji,tbpegawai.nip,tbpegawai.nama_pegawai,tbgaji.gaji_pokok,tbgaji.insentive,tbgaji.tunjangan,tbgaji.pph,
tbgaji.gaji_bersih,tbgaji.tgl_hitung_gaji,tbgaji.bulan,tbgaji.tahun
FROM tbpegawai,tbgaji
WHERE tbgaji.nip = tbpegawai.nip");	
?>
<body>
<div class="form-header-group" style="width:820px;">
      <h2 class="form-header" style="float:left;">Data Gaji Pegawai </h2>
      <img src="../asset/images/gaji.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List Gaji Karyawan</div>
      
  </div>
<table width="842" border="0" class="vtable">
  <tr>
    <th width="70">No.Slip</th>
    <th width="50">NIP</th>
    <th width="82">Nama Pegawai</th>
    <th width="75">Gaji Pokok (Rp)</th>
    <th width="84">Insentive (Rp)</th>
    <th width="91">Tunjangan Jabatan (Rp)</th>
    <th width="77">PPh (10%) (Rp)</th>
    <th width="78">Gaji Bersih (Rp)</th>
    <th width="84">Tanggal Hitung</th>
    <th width="64">Bulan</th>
    <th width="57">Tahun</th>
    <th width="57">Aksi</th>
  </tr>
  <?php while ($row = mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row [0]?></td>
    <td align="center"><?php echo $row [1]?></td>
    <td><?php echo $row [2]?></td>
    <td align="center"><?php echo number_format($row [3])?></td>
    <td align="center"><?php echo number_format($row [4])?></td>
    <td align="center"><?php echo number_format($row [5])?></td>
    <td align="center"><?php echo number_format($row [6])?></td>
    <td align="center"><?php echo number_format($row [7])?></td>
    <td align="center"><?php echo $row [8]?></td>
    <td align="center"><?php echo $row [9]?></td>
    <td align="center"><?php echo $row [10]?></td>
     <td align="center"><a title="Delete" href="viewGaji.php?pil=delete&kode_gaji=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>