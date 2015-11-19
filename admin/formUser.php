<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form User</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiUser.php'); 
	
?>
<body>
<form id="form1" name="form" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form User</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
  </div>
  <table width="464" border="0" style="margin-left:85px;">
    <tr>
      <td>User Name</td>
      <td><label for="username"></label>
      <input name="username" type="text" id="username" size="40"  placeholder="Masukan Username" required/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input name="password" type="password" id="password" size="40"  placeholder="Masukan Password" required/></td>
    </tr>
     <tr>
      <td>Sure Name</td>
      <td><label for="nama"></label>
      <input name="nama" type="text" id="nama" size="40"  placeholder="Masukan Nama" required/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Simpan" class="btnStyle" />
      <input type="reset" name="batal" id="batal" value="Batal" class="btnStyle"/></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(insertDataUser($_POST['username'],$_POST['password'],$_POST['nama'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_user"); </script>';
				//header ('location:index.php?pil=view_user');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>