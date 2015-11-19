<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Pegawai</title>
<link rel="stylesheet" href="../asset/jquery/themes/base/ui.all.css"/>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
	<script src="../asset/jquery/jquery-1.3.2.js" type="text/javascript"></script>
	<script src="../asset/jquery/ui.datepicker.js" type="text/javascript"></script>
    
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker").datepicker({
		dateFormat  : "dd-mm-yy",
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
    
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker1").datepicker({
		dateFormat  : "dd-mm-yy", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
</head>

<?php 
	
	include '../fungsiPegawai.php';
	
	$hasil=mysql_query("select count(tbpegawai.nip)+1 as no from tbpegawai");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="2014"."".$tkode;
	
	// mengambi data dari tabel lain
	$jab = mysql_query("select * from tbjabatan");
	$kerja = mysql_query("select * from tbpekerjaan");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px; width:740px;">
      <h2 class="form-header" style="float:left;">Form Pegawai</h2>
      <img src="../asset/images/pegawai.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader"> Fields harus diisi semua</div>
      
  </div>
  <table width="804" border="0" style="margin-left:85px;">
    <tr>
      <td>NIP</td>
      <td><label for="nip"></label>
      <input name="nip" type="text" id="nip" id="nip" size="12" value="<?php echo $kode?>"></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
      <input name="namapegawai" type="text" id="namapegawai" size="50" placeholder="Nama Pegawai" required></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td><label for="kodejab"></label>
        <select name="kodejab" id="kodejab" class="inputStylelog">
          <option>-- Pilih Jabatan --</option>
          <?php while($v = mysql_fetch_row($jab)){?>
          <option value="<?php echo $v[0]?>"><?php echo $v[1]?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><label for="tempatlahir"></label>
      <input name="tempatlahir" type="text" id="tempatlahir" size="30" placeholder="Tempat Lahir" required></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><label for="tgllahir"></label>
      <input name="tgllahir" type="text"  id="datepicker1" size="30" placeholder="Tanggal Lahir" required></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><input type="radio" name="jk" id="radio" value="Laki-Laki" required>
      <label for="jk">Laki - Laki 
        <input type="radio" name="jk" id="radio2" value="Perempuan" required>
      Perempuan      </label></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><label for="agama"></label>
        <select name="agama" id="agama" class="inputStylelog">
          <option>-- Pilih Agama --</option>
          <option value="Islam">Islam</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kristen Protestan">Kristen Protestan</option>
          <option value="Kristen Katolik">Kristen Katolik</option>
      </select></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><label for="status"></label>
        <select name="status" id="status" class="inputStylelog">
          <option>-- Pilih Status --</option>
          <option value="Kawin">Kawin</option>
          <option value="Belum Kawin">Belum Kawin</option>
      </select></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><label for="alamat"></label>
      <textarea name="alamat" id="alamat" cols="45" rows="3" placeholder="Alamat" required></textarea></td>
    </tr>
    <tr>
      <td>HP / No.Telp</td>
      <td><label for="hp"></label>
      <input type="text" name="hp" id="hp" placeholder="No. HP" required> <label for="notelp"></label>
      <input type="text" name="notelp" id="notelp" placeholder="No. Telp" required></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
      <input name="email" type="text" id="email" size="35" placeholder="Email" required></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input name="password" type="password" id="password" size="25" placeholder="Password" required></td>
    </tr>
    <tr>
      <td>Facebook</td>
      <td><label for="facebook"></label>
      <input name="facebook" type="text" id="facebook" size="35" placeholder="Facebook" required></td>
    </tr>
    <tr>
      <td>Website</td>
      <td><label for="website"></label>
      <input name="website" type="text" id="website" size="35" placeholder="Website" required></td>
    </tr>
    <tr>
      <td>Upload Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" placeholder="Upload" required></td>
    </tr>
    <tr>
      <td>Mulai Kerja</td>
      <td><label for="tglkerja"></label>
      <input name="tglkerja" type="text" id="datepicker" size="35" placeholder="Tanggal Mulai Kerja" required></td>
    </tr>
    <tr>
      <td>Pendidikan</td>
      <td><label for="pdd_terakhir"></label>
      <input name="pdd_terakhir" type="text" id="pdd_terakhir" size="50" placeholder="Pendidikan Terakhir" required></td>
    </tr>
    <tr>
      <td>Deskripsi Pekerjaan</td>
      <td><label for="kodekerja"></label>
        <select name="kodekerja" id="kodekerja" class="inputStylelog">
          <option>-- Pilih Pekerjaan --</option>
          <?php while($v = mysql_fetch_row($kerja)){?>
          <option value="<?php echo $v[0]?>"><?php echo $v[2]?></option>
          <?php }?>
      </select></td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td><label for="gajipokok"></label>
      <input type="number" name="gajipokok" id="gajipokok" placeholder="Gaji Pokok" required></td>
    </tr>
    <tr>
      <td>Uang Makan</td>
      <td><label for="gajipokok"></label>
      <input type="number" name="uangmakan" id="uangmakan" placeholder="Uang Makan" required></td>
    </tr>
    <tr>
      <td>Uang Lembur</td>
      <td><label for="gajipokok"></label>
      <input type="number" name="uanglembur" id="uanglembur" placeholder="Uang Lembur" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" class="btnStyle" id="submit" value="Simpan" >
      <input type="reset" name="batal" class="btnStyle" id="batal" value="Batal"></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		if($_POST['submit']){
			$nama_photo = $_FILES['photo']['name'];
			$tmp_photo = $_FILES['photo']['tmp_name'];
	
		// upload file
		if(file_exists("../asset/images/".$nama_photo)){
				echo '<script language="javascript">alert("File Gagal di Upload !!! Coba Ganti Nama File");location.replace("index.php?pil=pegawai"); </script>';
				die();
			}else{
					move_uploaded_file($tmp_photo,"../asset/images/".$nama_photo) or die ("Gagal mengupload");
				}
			
            if(insertDataPegawai($_POST['nip'],$_POST['namapegawai'],$_POST['kodejab'],$_POST['tempatlahir'],$_POST['tgllahir'],$_POST['jk'],$_POST['agama'],$_POST['status']
            					,$_POST['alamat'],$_POST['hp'],$_POST['notelp'],$_POST['email'],$_POST['password'],$_POST['facebook'],$_POST['website'],$nama_photo,$_POST['tglkerja']
            					,$_POST['pdd_terakhir'],$_POST['kodekerja'],$_POST['gajipokok'],$_POST['uangmakan'],$_POST['uanglembur'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_pegawai"); </script>';
				//header ('location:index.php?pil=view_pegawai');
			}else{
				echo "Entry Data Gagal";
			}

		 }
      }
?>