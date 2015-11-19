<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form absen</title>
	<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../asset/jquery/themes/base/ui.all.css"/>
	<script src="../asset/jquery/jquery-1.3.2.js" type="text/javascript"></script>
	<script src="../asset/jquery/ui.datepicker.js" type="text/javascript"></script>
    
</head>
<?php 
	
	include '../fungsiabsen.php';
	
	$hasil=mysql_query("select count(tbabsen.kode_absen)+1 as no from tbabsen");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="AB"."".$tkode;
	
	// mengambil data pegawai
	$hasil = mysql_query("select * from tbpegawai");
?>
<body>
<form name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form absen</h2>
      <img src="../asset/images/absen.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
      
  </div>
  <table width="490" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode absen</td>
      <td><label for="kodeabsen"></label>
      <input name="kodeabsen" type="text" id="kodeabsen" value="<?php echo $kode ?>" size="10" readonly></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
        <select name="namapegawai" id="namapegawai" class="inputStylelog">
          <option>-- Nama Pegawai --</option>
        <?php while ($row = mysql_fetch_row($hasil)) {?>
          <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
        <?php } ?>
      </select></td>
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
      <td>Total Absen</td>
      <td><label for="totalabsen"></label>
      <input type="number" name="totalabsen" id="totalabsen" placeholder="Total Absen"  required></td>
    </tr>
    <tr>
      <td>Total Lembut</td>
      <td><label for="totalembur"></label>
      <input type="number" name="totalembur" id="totalembur" placeholder="Total Lembur"  required></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Simpan" class="btnStyle">
      <input type="reset" name="batal" id="batal" value="Batal" class="btnStyle"></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
        if(insertDataabsen($_POST['kodeabsen'],$_POST['namapegawai'],$_POST['bulan'],$_POST['tahun'],$_POST['totalabsen'],$_POST['totalembur'])){
  			 echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_absen"); </script>';
  			   //header ('location:index.php?pil=view_absen');
  			}else{
  				echo "Entry Data Gagal";
  			}
		 }
      }
?>