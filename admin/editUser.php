<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update User</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiUser.php'); 
	$hasil = readDataJabatan($_GET['username']);
	
?>
<body>
<form id="form1" name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update User</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Pilih Fields yang akan di update</div>
  </div>
  <table width="467" border="0" style="margin-left:85px;">
    <tr>
      <td width="224">User Name</td>
      <td width="224"><label for="username"></label>
      <input name="username" type="text" id="username" size="40"  value="<?php echo $hasil['data']['username']?>" readonly/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input name="password" type="password" id="password" size="40"  value="<?php echo $hasil['data']['password']?>" placeholder="Password"/></td>
    </tr>
    <tr>
      <td>Sure Name</td>
      <td><label for="nama"></label>
      <input name="nama" type="text" id="nama" size="40"  value="<?php echo $hasil['data']['nama']?>" placeholder="Masukan nama"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update"  class="btnStyle"/>
      <a href="index.php?pil=view_jab"><input type="button" name="batal" id="batal" value="Batal" class="btnStyle"/></a></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(updateDataUser($_POST['username'],$_POST['password'],$_POST['nama'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_user"); </script>';
				//header ('location:index.php?pil=view_user');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>