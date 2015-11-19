<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Divisi</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php
	
	include ('../fungsiDivisi.php');
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataDivisi($_GET['kode_divisi']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_divisi"); </script>';
			//header("location:index.php?pil=view_divisi");
			}
		}
	$hasil= mysql_query("select * from tbdivisi");?>
<body>

  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Data Divisi </h2>
      <img src="../asset/images/divisi.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> List Seluruh Divisi</div>
      
  </div>
<table width="446" border="0" class="vtable" style="margin-left:160px;"">
  <tr align="center">
    <th width="93">Kode Divisi</th>
    <th width="142" >Nama Divisi</th>
  </tr>
  <?php while ($row = mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row[0];?></td>
    <td align="center"><?php echo $row[1];?></td>
  </tr>
  <?php }?>
</table>

</body>
</html>