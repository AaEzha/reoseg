<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Jabatan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
<script src="../asset/js/jquery.min.js" type="text/javascript"></script>
<script src="../asset/js/jsmenu.js" type="text/javascript"></script>
    
<script type="text/javascript">
	 $(document).ready(function () {
            $('td#edit').gips({ 'theme': 'purple', autoHide: true, text: 'Edit Data' });
			$('td#delete').gips({ 'theme': 'purple', autoHide: true, text: 'Delete Data' });
			 });
</script>
</head>
<?php 
	include ('../fungsiJab.php');
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataJabatan($_GET['kode_jab']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_jab"); </script>';
			//header("location:index.php?pil=view_jab");
			}
		}
	$hasil= mysql_query("select * from tbjabatan");	
?>
<body>
<div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Data Jabatan</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">List Seluruh Jabatan</div>
      
  </div>
<table width="90%" border="0" class="vtable">
  <tr align="center">
    <th width="98">Kode Jabatan</th>
    <th width="246">Nama Jabatan</th>
    <th width="103">Tunjangan Jabatan</th>
    <th width="103">Jam Kerja</th>
    <th width="124">Opsi</th>
  </tr>
  <?php while ($row=mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row['0'];?></td>
    <td><?php echo $row['1'];?></td>
    <td align="center"><?php echo "Rp. ".number_format($row['2']);?></td>
    <td align="center"><?php echo $row['3'];?></td>
    <td align="center"><a title="Update" href="index.php?pil=edit_jab&kode_jab=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="viewJab.php?pil=delete&kode_jab=<?php echo $row['0'];?>" onClick="return confirm('Anda yakin akan menghapus data ini?')"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>