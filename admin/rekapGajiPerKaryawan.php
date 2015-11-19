<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Rekap Gaji Per Karyawan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
<script type="text/javascript">
function addGetNip() {
  var x = document.getElementById('namapeg');
  var y = document.getElementById('nip');
  getCmb = x.value;
  y.value = getCmb; 
}
</script>
</head>
<?php
	include '../koneksi.php';
	$peg = mysql_query("select * from tbpegawai");
?>
<body>

<form name="form1" method="post" action="../hasilRekapGajiPerkaryawan.php" target="_blank">
<div class="form-all">
   <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Rekap Gaji Pegawai</h2>
      <img src="../asset/images/gaji.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Cetak rekap gaji perkaryawan</div>
	</div>
  <table width="377" border="0" style="margin-left:85px;">
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapeg"></label>
        <select name="namapeg" id="namapeg" onChange="addGetNip()" class="inputStylelog" >
          <option>-- Pilih Pegawai --</option>
          <?php while($v = mysql_fetch_row($peg)){?>
          	<option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>NIP</td>
      <td><label for="nip"></label>
      <input name="nip" type="text" id="nip" size="35" readonly></td>
    </tr>
    <tr>
      <td>Bulan </td>
      <td><select name="bulan" size="1" id="bulan" class="inputStylelog">
        <option value="0">-- Pilih Bulan --</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
      </select> </td>
    </tr>
    <tr>
      <td>Tahun</td>
      <td><label for="tahun"></label>
        <select name="tahun" id="tahun" class="inputStylelog">
        <option value="0">-- Pilih Tahun --</option>
        <?php 
		   $now = Date('Y');
		   for ($x = $now; $x > 1990; $x--) {
  		   echo '<option value="'.$x.'">'.$x.'</option>';
		   }
		?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="cetak" id="cetak" value="Cetak" class="btnStyle">
      <input type="reset" name="batal" id="batal" value="Batal" class="btnStyle"></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
