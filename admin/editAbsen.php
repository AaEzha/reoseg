<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Data absen</title>
	<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="../asset/jquery/themes/base/ui.all.css"/>
	<script src="../asset/jquery/jquery-1.3.2.js" type="text/javascript"></script>
    
    
</head>
<?php 
	
	include '../fungsiabsen.php';
	
	$hasil = readDataabsen($_GET['kode_absen']);
	
	// mengambil data pegawai
	$pegawai = mysql_query("select * from tbpegawai");
?>
<body>
<form name="form1" method="post" action="">
<div class="form-all">
	<div class="form-header-group" style="margin-left:75px;">
      <h2 class="form-header" style="float:left;">Update Data absen</h2>
      <img src="../asset/images/absen.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Pilih Fields yang akan di update</div>
      
  </div>
  <table width="488" border="0" style="margin-left:85px;">
    <tr>
      <td>Kode absen</td>
      <td><label for="kodeabsen"></label>
      <input name="kodeabsen" type="text" id="kodeabsen" value="<?php echo $hasil['data']['kode_absen']?>" size="10" readonly></td>
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
      <td>Bulan </td>
      <td><select name="bulan" size="1" id="bulan" class="inputStylelog">
        <option value="0">-- Pilih Agama --</option>
          <?php
			$bulan = array('January','February','March','April','May','June','July','August','September','October','Nopember','Desember');
		    for($i=0;$i<12;$i++){
                if($bulan[$i]==$hasil['data']['bulan']){
                    $s="SELECTED";
                   }else{
                     $s="";
                   }
                    echo "<option value='".$bulan[$i]."' $s>".$bulan[$i]."</option>";
               }
		  ?>
       </select></td>
    </tr>
    <tr>
      <td>Tahun</td>
      <td><select name="tahun" size "1" id="tahun" class="inputStylelog">
        <option value="0">-- Pilih Tahun --</option>
        <?php 
		   $now = Date('Y');
		   for ($i = $now; $i > 2004; $i--) {
			    if($tahun[$i]==$hasil['data']['tahun']){
                    $i="SELECTED";
					 }else{
                     $s="";
                   }
  		   echo '<option value="'.$i.'">'.$i.'</option>';
		   }
		?>
      </select></td>
    </tr>
    <tr>
      <td>Total Absen</td>
      <td><label for="totalabsen"></label>
      <input type="number" name="totalabsen" id="totalabsen" value="<?php echo $hasil['data']['total_absen']?>" placeholder="Total Absen"></td>
    </tr>
    <tr>
      <td>Total Lembur</td>
      <td><label for="totalabsen"></label>
      <input type="number" name="totalembur" id="totalembur" value="<?php echo $hasil['data']['total_lembur']?>" placeholder="Total Lembur"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update" class="btnStyle">
      <a href="index.php?pil=view_absen"><input type="button" name="batal" id="batal" value="Batal" class="btnStyle"></a></td>
    </tr>
  </table>
  </div>
</form>

</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(updateDataabsen($_POST['kodeabsen'],$_POST['namapegawai'],$_POST['bulan'],$_POST['tahun'],$_POST['totalabsen'],$_POST['totalembur'])){
			  echo '<script language="javascript">alert("Data Berhasil di Update");location.replace("index.php?pil=view_absen"); </script>';
			   //header ('location:index.php?pil=view_absen');
			}else{
				echo "Update Data Gagal";
			}
		 }
      }
?>