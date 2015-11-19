<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Pekerjaan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include ('../fungsiKerja.php');
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataKerja($_GET['kode_pekerjaan']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_kerja"); </script>';
			//header("location:index.php?pil=view_kerja");
			}
		}
	$hasil= mysql_query("SELECT tbpekerjaan.kode_pekerjaan,tbdivisi.nama_divisi,tbpekerjaan.pekerjaan
						 FROM tbpekerjaan,tbdivisi WHERE tbpekerjaan.kode_divisi = tbdivisi.kode_divisi");	
?>
<body>

  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Data Pekerjaan</h2>
      <img src="../asset/images/pekerjaan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List Seluruh Pekerjaan</div>
      
  </div>
<table width="549" border="0" class="vtable" style="margin-left:110px;">
  <tr align="center">
    <th width="92">Kode Pekerjaan</th>
    <th width="165">Divisi</th>
    <th width="177">Nama Pekerjaan</th>
    <th width="87">Aksi</th>
  </tr>
  <?php while($row = mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0]?></td>
    <td><?php echo $row[1]?></td>
    <td><?php echo $row[2]?></td>
     <td align="center"><a title="Update" href="index.php?pil=edit_pekerjaan&kode_pekerjaan=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="viewKerja.php?pil=delete&kode_pekerjaan=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>