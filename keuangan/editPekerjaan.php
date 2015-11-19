<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Pekerjaan</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 

	include ('../fungsiKerja.php'); 
	$hasil = readDataKerja($_GET['kode_pekerjaan']);
	$divisi = mysql_query("select * from tbdivisi");
?>
<body>

<form id="form1" name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Pekerjaan</h2>
      <img src="../asset/images/pekerjaan.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Pilih Fields yang akan di update</div>
      
  </div>
  <table width="494" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode Pekerjaan</td>
      <td><label for="kodekerja"></label>
      <input name="kodekerja" type="text" id="kodekerja" size="20" value="<?php echo $hasil['data']['kode_pekerjaan'] ?>" readonly/></td>
    </tr>
    <tr>
      <td>Divisi</td>
      <td><select name="kodedivisi" id="kodedivisi" class="inputStylelog">
        
        <?php 
         	while($v = mysql_fetch_row($divisi)){
         	if($hasil['data']['nama_divisi'] == $v[1]){
              echo '<option selected="selected" value="' .$v[0].'">'.$v[1].'</option>';
          }else{
          	echo '<option value="'.$v[0].'">'.$v[1].'</option>';
  
          }
         	}?>
      </select></td>
    </tr>
    
    <tr>
      <td>Nama Pekerjaan</td>
      <td><label for="kerja"></label>
      <input name="kerja" type="text" id="kerja" size="50" value="<?php echo $hasil['data']['pekerjaan']?>" placeholder="Pekerjaan"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update" class="btnStyle" />
      <a href="index.php?pil=view_kerja"><input type="button" name="batal" id="batal" value="Batal" c class="btnStyle"/></a></td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(updateDataKerja($_POST['kodekerja'],$_POST['kodedivisi'],$_POST['kerja'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_kerja"); </script>';
				//header ('location:index.php?pil=view_kerja');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>
