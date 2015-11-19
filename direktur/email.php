<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php
	include '../koneksi.php';
	//$send_to = $_GET['username'];
	$sql = mysql_query("SELECT tbpegawai.nip,tbpegawai.email,tbjabatan.nama_jab
FROM tbpegawai,tbjabatan
WHERE tbpegawai.kode_jab = tbjabatan.kode_jab AND tbjabatan.kode_jab ='JB014'");
    $admin = mysql_fetch_row($sql);

?>
<body>

<form name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px; width:700px;">
      <h2 class="form-header" style="float:left;">Kirim Email</h2>
      <img src="../asset/images/email.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Silahkan Kirimkan Keluhan Anda</div>
  </div>
  <table width="714" border="0" style="margin-left:85px;">
    <tr>
      <td>Send To </td>
      <td>:</td>
      <td><label for="send_to"></label>
      <input name="send_to" type="text" id="send_to" value= "<?php echo $admin[1];?>"size="40"></td>
    </tr>
    <tr>
      <td>Subject </td>
      <td>:</td>
      <td><label for="subject"></label>
      <input name="subject" type="text" id="subject" size="55"></td>
    </tr>
    <tr>
      <td valign="top">Content</td>
      <td valign="top">:</td>
      <td><label for="isi"></label>
      <textarea name="isi" id="isi" cols="100" rows="10"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Kirim" class="btnStyle"></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
		if($_POST['submit']){
			$subject = $_POST['subject'];
			$sender = "".$_SESSION['user'];
			$tujuan = $_POST['send_to'];
			$isi = $_POST['isi'];
			$pesan = "Hallo, ". $tujuan.",

".$isi."
			
    
		
		
Pengirim : ".
$sender."

Pegawai
PT. Inovasi Sistem Teknologi";
mail($tujuan, $subject, $pesan);
echo '<script language="javascript">alert("Email Terkirim");location.replace("index.php"); </script>';
		}
}