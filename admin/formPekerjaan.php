<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Pekerjaan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiKerja.php'); 
	$hasil=mysql_query("select count(tbpekerjaan.kode_pekerjaan)+1 as no from tbpekerjaan");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="PK"."".$tkode;
	
	// mengambil data Divisi
	$divisi = mysql_query("select * from tbdivisi");
	
?>
<body>

<form id="form1" name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form Pekerjaan</h2>
      <img src="../asset/images/pekerjaan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Fields harus diisi semua</div>
      
  </div>
      
  <table width="526" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Pekerjaan</td>
      <td><label for="kodekerja"></label>
      <input name="kodekerja" type="text" id="kodekerja" size="20" value="<?php echo $kode ?>" readonly/></td>
    </tr>
    <tr>
      <td>Divisi</td>
      <td><label for="kodedivisi"></label>
        <select name="kodedivisi" id="kodedivisi" class="inputStylelog">
          <option value="0">-- Pilih Divisi --</option>
          <?php while($v = mysql_fetch_row($divisi)){?>
         	<option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
          <?php }?>
      </select></td>
    </tr>
    
    <tr>
      <td>Nama Pekerjaan</td>
      <td><label for="kerja"></label>
      <input name="kerja" type="text" id="kerja" size="50"  placeholder="Nama Pekerjaan" required/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Simpan" class="btnStyle"/>
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
            if(insertDataKerja($_POST['kodekerja'],$_POST['kodedivisi'],$_POST['kerja'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_kerja"); </script>';
				//header ('location:index.php?pil=view_kerja');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>
