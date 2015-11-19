<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biodata Pegawai</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../koneksi.php';
	$hasil = mysql_query("select * from tbpegawai");
?>
<script type="text/javascript">
function addGetNip() {
  var x = document.getElementById('nip');
  var y = document.getElementById('namapeg');
  getCmb = x.value;
  y.value = getCmb;
}
</script>
<body>
<form name="form1" method="post" action="../BiodataPeg.php" target="_blank">
<div class="form-all">	
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Data Pegawai</h2>
      <img src="../asset/images/pegawai.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Cetak data pegawai</div>
  </div>
  <table width="364" border="0" style="margin-left:85px;">
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="nip"></label>
        <select name="nip" id="nip" onChange="addGetNip()" class="inputStylelog">
          <option value="0">-- Pilih Pegawai --</option>
          <?php while($v = mysql_fetch_row($hasil)){?>
          	<option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>NIP</td>
      <td><label for="namapeg"></label>
      <input name="namapeg" type="text" id="namapeg" size="30"></td>
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
