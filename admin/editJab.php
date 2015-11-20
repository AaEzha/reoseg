<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Jabatan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiJab.php'); 
	$hasil = readDataJabatan($_GET['kode_jab']);
	
?>
<body>
<form id="form1" name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Jabatan</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Pilih Fields yang akan di update</div>
  </div>
  <table width="467" border="0" style="margin-left:85px;">
    <tr>
      <td width="224">Kode Jabatan</td>
      <td width="224"><label for="kodejab"></label>
      <input name="kodejab" type="text" id="kodejab" size="20"  value="<?php echo $hasil['data']['kode_jab']?>" readonly/></td>
    </tr>
    <tr>
      <td>Nama Jabatan</td>
      <td><label for="namajab"></label>
      <input name="namajab" type="text" id="namajab" size="40"  value="<?php echo $hasil['data']['nama_jab']?>" placeholder="Nama Jabatan"/ required></td>
    </tr>
    <tr>
      <td>Tunjangan Jabatan</td>
      <td><label for="tunjjab"></label>
      <input name="tunjjab" type="number" id="tunjjab" size="40"  value="<?php echo $hasil['data']['tunj_jab']?>" placeholder="Tunjangan Jabatan"/ required></td>
    </tr>
    <tr>
      <td>Jam Kerja</td>
      <td><label for="jam_kerja"></label>
      <input name="jam_kerja" type="text" id="jam_kerja" size="40"  value="<?php echo $hasil['data']['jam_kerja']?>" placeholder="misal: 08:00:00"/ pattern="\d{2}[\:]\d{2}[\:]\d{2}" maxlength="8" required></td>
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
            if(updateDataJabatan($_POST['kodejab'],$_POST['namajab'],$_POST['tunjjab'],$_POST['jam_kerja'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_jab"); </script>';
				//header ('location:index.php?pil=view_jab');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>