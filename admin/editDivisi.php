<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Divisi</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiDivisi.php'); 
	$hasil = readDataDivisi($_GET['kode_divisi']);
	
?>
<body>
<form id="form1" name="form1" method="post" action="">
 <div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Divisi </h2>
      <img src="../asset/images/divisi.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Pilih Fields yang akan di update</div>
      
  </div>
  <table width="425" border="0" style="margin-left:85px;">
    <tr>
      <td width="231">Kode Divisi</td>
      <td width="231"><label for="kodedivisi"></label>
      <input name="kodedivisi" type="text" id="kodedivisi" class="inputStyle" size="20" value="<?php echo $hasil['data']['kode_divisi']?>" readonly/></td>
    </tr>
    <tr>
      <td>Nama Divisi</td>
      <td><label for="namadivisi"></label>
      <input name="namadivisi" type="text" id="namadivisi" class="inputStyle"size="40" value="<?php echo $hasil['data']['nama_divisi']?>" placeholder="Nama Divisi"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" class="btnStyle" value="Update" />
      <a href="index.php?pil=view_divisi"><input type="button" name="batal" class="btnStyle" id="batal" value="Batal" /></a></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(updateDataDivisi($_POST['kodedivisi'],$_POST['namadivisi'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_divisi"); </script>';
				//header ('location:index.php?pil=view_divisi');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>