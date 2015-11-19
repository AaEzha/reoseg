<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View User</title>
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
	include ('../fungsiUser.php');
	if (isset($_GET['pil'])){
		if($_GET['pil']=='delete'){
			deleteDataUser($_GET['username']);
			echo '<script language="javascript">alert("Data Berhasil di Delete");location.replace("index.php?pil=view_user"); </script>';
			//header("location:index.php?pil=view_user");
			}
		}
	$hasil= mysql_query("select * from tbuser");	
?>
<body>
<div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Data User</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">List Seluruh User</div>
      
  </div>
<table width="620" border="0" class="vtable" style="margin-left:78px;">
  <tr align="center">
    <th width="98">User Name</th>
    <th width="246">Password</th>
    <th width="103">Sure Name</th>
    <th width="124">Opsi</th>
  </tr>
  <?php while ($row=mysql_fetch_row($hasil)){?>
  <tr>
    <td align="center"><?php echo $row['0'];?></td>
    <td align="center"><?php echo $row['1'];?></td>
    <td align="center"><?php echo $row['2'];?></td>
    <td align="center"><a title="Update" href="index.php?pil=edit_user&username=<?php echo $row['0'];?>"><img src="../asset/images/edit.png"/></a> <a title="Delete" href="viewUser.php?pil=delete&username=<?php echo $row['0'];?>"><img src="../asset/images/deleted.png"/></a> </td>
  </tr>
  <?php }?>
</table>
</body>
</html>