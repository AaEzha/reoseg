<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Divisi</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiDivisi.php'); 
	$hasil=mysql_query("select count(tbdivisi.kode_divisi)+1 as no from tbdivisi");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="DV"."".$tkode;
	
?>
<body>

<form id="form1" name="form1" method="post" action="" class="login-form">
 <div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form Divisi </h2>
      <img src="../asset/images/divisi.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
      
  </div>
      
  <table width="437" border="0" style="margin-left:85px;">

    <tr>
      <td width="105" height="72">Kode Divisi</td>
      <td width="252"><label for="kodedivisi"></label>
      <input name="kodedivisi" type="text" id="kodedivisi" class="inputStyle" size="20" value="<?php echo $kode ?>" readonly/>
     
      </td>
    </tr>
    <tr>
      <td>Nama Divisi</td>
      <td><label for="namadivisi"></label>
      <input name="namadivisi" type="text" id="namadivisi" class="inputStyle" size="40" placeholder="Nama Divisi" required/>
     </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Simpan" class="btnStyle" />
      <input type="submit" name="batal" id="batal" value="Batal" class="btnStyle"/></td>
    </tr>
    </table>
    </div>

</form>
</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(insertDataDivisi($_POST['kodedivisi'],$_POST['namadivisi'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_divisi"); </script>';
				//header ('location:index.php?pil=view_divisi');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>