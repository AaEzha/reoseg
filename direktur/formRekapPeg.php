<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Rekap Pegawai</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../koneksi.php';
	$divisi = mysql_query("select * from tbdivisi");
	
?>
<body>
<form name="form1" method="post" action="../RekapPegawai.php" target="_blank">
<div class="form-all">	
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Rekap Pegawai</h2>
      <img src="../asset/images/rekap_peg.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader" style=" width:230px;">Cetak rekap data seluruh pegawai</div>
  </div>
  <table width="369" border="0" style="margin-left:85px;">
    <tr>
      <td>Nama Divisi</td>
      <td><label for="divisi"></label>
        <select name="divisi" id="divisi" class="inputStylelog">
          <option>-- Pilih Divisi --</option>
           <?php while($v = mysql_fetch_row($divisi)){?>
          <option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
           <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Cetak" class="btnStyle">
      <input type="reset" name="batal" id="batal" value="Batal" class="btnStyle"></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>