<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Data Lembur</title>
	<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../asset/jquery/themes/base/ui.all.css"/>
	<script src="../asset/jquery/jquery-1.3.2.js" type="text/javascript"></script>
	<script src="../asset/jquery/ui.datepicker.js" type="text/javascript"></script>
    
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true,
		  
        });
      });
	  
    </script>
    
</head>
<?php 
	
	include '../fungsiLembur.php';
	
	$hasil = readDataLembur($_GET['kode_lembur']);
	
	// mengambil data pegawai
	$pegawai = mysql_query("select * from tbpegawai");
?>
<body>
<form name="form1" method="post" action="">
<div class="form-all">
	<div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Data Lembur</h2>
      <img src="../asset/images/lembur.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Pilih Fields yang akan di update</div>
      
  </div>
  <table width="488" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Lembur</td>
      <td><label for="kodelembur"></label>
      <input name="kodelembur" type="text" id="kodelembur" value="<?php echo $hasil['data']['kode_lembur']?>" size="10" readonly></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
        <select name="namapegawai" id="namapegawai" class="inputStylelog">
          <option>-- Nama Pegawai --</option>
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
      <td>Tanggal Lembur</td>
      <td><label for="tgllembur"></label>
      <input name="tgllembur" type="text" id="datepicker" value="<?php echo $hasil['data']['tgl_lembur']?>" placeholder="Tanggal Lembur"></td>
    </tr>
    <tr>
      <td>Jam Mulai</td>
      <td><label for="jammasuk"></label>
      <input type="time" name="jammasuk" id="jammasuk" value="<?php echo $hasil['data']['jam_mulai']?>" placeholder="Jam Mulai Lembur"></td>
    </tr>
    <tr>
      <td>Jam Selesai</td>
      <td><label for="jamselesai"></label>
      <input type="time" name="jamselesai" id="jamselesai" value="<?php echo $hasil['data']['jam_selesai']?>" placeholder="Jam Selesai Lembur"></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><label for="keterangan"></label>
      <textarea name="keterangan" id="keterangan" cols="45" rows="3" placeholder="Keterangan Lembur"><?php echo $hasil['data']['keterangan']?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update" class="btnStyle">
      <a href="index.php?pil=view_lembur"><input type="button" name="batal" id="batal" value="Batal" class="btnStyle"></a></td>
    </tr>
  </table>
  </div>
</form>

</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(updateDataLembur($_POST['kodelembur'],$_POST['namapegawai'],$_POST['tgllembur'],$_POST['jammasuk'],$_POST['jamselesai'],$_POST['keterangan'])){
			  echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_lembur"); </script>';
			   //header ('location:index.php?pil=view_lembur');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>