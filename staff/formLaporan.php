<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Laporan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	
	include '../fungsiLaporan.php';
	$hasil=mysql_query("select count(tblaporan.kode_lap)+1 as no from tblaporan");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="LP"."".$tkode;
	$pegawai = mysql_query("select * from tbpegawai");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Form Laporan</h2>
      <img src="../asset/images/report.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Fields harus diisi semua</div>
      
  </div>
  <table width="464" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Laporan</td>
      <td><label for="kodelap"></label>
      <input name="kodelap" type="text" id="kodelap" size="10" value="<?php echo $kode ?>" readonly></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
        <select name="namapegawai" id="select" class="inputStylelog">
        <option>--- Nama Pegawai ---</option>
         <?php while($v = mysql_fetch_row($pegawai)){?>
          <option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Upload File Laporan</td>
      <td><input type="file" name="uploadfile" id="uploadfile" required></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><label for="keterangan"></label>
      <textarea name="keterangan" id="keterangan" cols="45" rows="3" placeholder="Keterangan Laporan" required></textarea></td>
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
			
			$nama_file = $_FILES['uploadfile']['name'];
			$tmp_file = $_FILES['uploadfile']['tmp_name'];
	
		// upload file
		if(file_exists("../asset/laporan/".$nama_file)){
				echo '<script language="javascript">alert("File Gagal di Upload !!! Coba Ganti Nama File");location.replace("index.php?pil=laporan"); </script>';
				die();
			}else{
					move_uploaded_file($tmp_file,"../asset/laporan/".$nama_file) or die ("Gagal mengupload");
				}
			
            if(insertDataLap($_POST['kodelap'],$_POST['namapegawai'],$nama_file,$_POST['keterangan'])){
				 echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_laporan"); </script>';
				//header ('location:index.php?pil=view_laporan');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>