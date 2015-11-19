<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Laporan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../fungsiLaporan.php';
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataLap($_GET['kode_laporan']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_laporan"); </script>';
			//header("location:index.php?pil=view_laporan");
			}
		}
	// query mengambil data lembur dan pegawai
	$hasil = mysql_query("SELECT tblaporan.kode_lap,tbpegawai.nama_pegawai,tblaporan.upload_file,tblaporan.tgl_upload,tblaporan.keterangan
						  FROM tblaporan,tbpegawai
						  WHERE	tblaporan.nip = tbpegawai.nip");
?>
<body>

<div class="form-header-group" style="margin-left:65px;">
      <h2 class="form-header" style="float:left;">Data Report Pegawai</h2>
  <img src="../asset/images/report.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">list report pegawai</div>
      
  </div>
<table width="615" border="0" class="vtable" style="margin-left:65px;">
  <tr>
    <th width="90">Kode Laporan</th>
    <th width="112">Nama Pegawai</th>
    <th width="92">File Laporan</th>
    <th width="93">Tanggal Upload</th>
    <th width="119">Keterangan</th>
    <th width="83">Aksi</th>
  </tr>
  <?php while ($row = mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td align="center"><a href="../asset/laporan/<?php echo $row[2];?>" title="Download">Download</a></td>
    <td align="center"><?php echo $row[3]?></td>
    <td><?php echo $row[4]?></td>
    <td align="center"><a title="Update" href="index.php?pil=edit_laporan&kode_laporan=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="viewLaporan.php?pil=delete&kode_laporan=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
