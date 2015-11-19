<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Lembur</title>
	<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../asset/jquery/themes/base/ui.all.css"/>
	<script src="../asset/jquery/jquery-1.3.2.js" type="text/javascript"></script>
	<script src="../asset/jquery/ui.datepicker.js" type="text/javascript"></script>
    
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
    
</head>
<?php 
	
	include '../fungsiLembur.php';
	
	$hasil=mysql_query("select count(tblembur.kode_lembur)+1 as no from tblembur");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="LB"."".$tkode;
	
	// mengambil data pegawai
	$hasil = mysql_query("select * from tbpegawai");
?>
<body>
<form name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form Lembur</h2>
      <img src="../asset/images/lembur.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
      
  </div>
  <table width="425" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Lembur</td>
      <td><label for="kodelembur"></label>
      <input name="kodelembur" type="text" id="kodelembur" value="<?php echo $kode ?>" size="10" readonly></td>
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
      <td>Tanggal Lembur</td>
      <td><label for="tgllembur"></label>
      <input name="tgllembur" type="text" id="datepicker" placeholder="Tanggal Lembur" required></td>
    </tr>
    <tr>
      <td>Jam Mulai</td>
      <td><label for="jammasuk"></label>
      <input type="time" name="jammasuk" id="jammasuk" placeholder="Jam Mulai Lembur" required></td>
    </tr>
    <tr>
      <td>Jam Selesai</td>
      <td><label for="jamselesai"></label>
      <input type="time" name="jamselesai" id="jamselesai" placeholder="Jam Selesai Lembur"  required></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><label for="keterangan"></label>
      <textarea name="keterangan" id="keterangan" cols="45" rows="3" placeholder="Keterangan Lembur" required></textarea></td>
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
            if(insertDataLembur($_POST['kodelembur'],$_POST['namapegawai'],$_POST['tgllembur'],$_POST['jammasuk'],$_POST['jamselesai'],$_POST['keterangan'])){
				 echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_lembur"); </script>';
			  // header ('location:index.php?pil=view_lembur');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>