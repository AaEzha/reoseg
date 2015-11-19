<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Laporan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	
	include '../fungsiLaporan.php';
	$hasil = readDataLap($_GET['kode_laporan']);
	
	// mengambil data pegawai
	$pegawai = mysql_query("select * from tbpegawai");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Report</h2>
      <img src="../asset/images/report.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Pilih Fields yang akan di update</div>
      
  </div>
  <table width="526" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Report</td>
      <td><label for="kodelap"></label>
      <input name="kodelap" type="text" id="kodelap" size="10" value="<?php echo $hasil['data']['kode_lap'] ?>" readonly></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
        <select name="namapegawai" id="select" class="inputStylelog">
        <option>--- Nama Pegawai ---</option>
         <?php 
         	while($v = mysql_fetch_row($pegawai)){
         	if($hasil['data']['nama_pegawai'] == $v[1]){
             	 echo '<option selected="selected" value="' .$v[0].'">'.$v[1].'</option>';
         	 }else{
          		 echo '<option value="'.$v[0].'">'.$v[1].'</option>';
             }
         }?>
      </select></td>
    </tr>
    <tr>
      <td>Upload File Report</td>
      <td><input type="file" name="uploadfile" id="uploadfile"></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><label for="keterangan"></label>
      <textarea name="keterangan" id="keterangan" cols="45" rows="3" placeholder="Keterangan Laporan"><?php echo $hasil['data']['keterangan']?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update" class="btnStyle">
      <a href="index.php?pil=view_laporan"><input type="button" name="batal" id="batal" value="Batal" class="btnStyle"></a></td>
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
	
		// change upload file
		if(empty($tmp_file)){
			if(updateDataLaporan($_POST['kodelap'],$_POST['namapegawai'],$_POST['keterangan'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_laporan"); </script>';
				//header ('location:index.php?pil=view_laporan');
		}
		}else
		{
			if(file_exists("../asset/laporan/".$nama_file)){
				 echo '<script language="javascript">alert("File Gagal di Upload !!! Coba Ganti Nama File");location.replace("index.php?pil=view_laporan"); </script>';
				die();
			}
			else{
					move_uploaded_file($tmp_file,"../asset/laporan/".$nama_file) or die ("Gagal mengupload");
				}
			 if(updateDataLap($_POST['kodelap'],$_POST['namapegawai'],$nama_file,$_POST['keterangan'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_laporan"); </script>';
				//header ('location:index.php?pil=view_laporan');
			   }else{
				   echo "Update Data Gagal";
			    }
		 }	
           
		 }
       }
	 
?>

