<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Jabatan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiJab.php'); 
	$hasil=mysql_query("select count(tbjabatan.kode_jab)+1 as no from tbjabatan");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="JB"."".$tkode;
	
?>
<body>
<form id="form1" name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form Jabatan</h2>
      <img src="../asset/images/jabatan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
  </div>
  <table width="464" border="0" style="margin-left:85px;">
    <tr>
      <td width="157">Kode Jabatan</td>
      <td width="252"><label for="kodejab"></label>
      <input name="kodejab" type="text" id="kodejab" size="20"  value="<?php echo $kode ?>" readonly/></td>
    </tr>
    <tr>
      <td>Nama Jabatan</td>
      <td><label for="namajab"></label>
      <input name="namajab" type="text" id="namajab" size="40"  placeholder="Nama Jabatan" required/></td>
    </tr>
    <tr>
      <td>Tunjangan Jabatan</td>
      <td><label for="tunjjab"></label>
      <input name="tunjjab" type="number" id="tunjjab" size="40"  placeholder="Tunjangan Jabatan" required/></td>
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
            if(insertDataJabatan($_POST['kodejab'],$_POST['namajab'],$_POST['tunjjab'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_jab"); </script>';
				//header ('location:index.php?pil=view_jab');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>