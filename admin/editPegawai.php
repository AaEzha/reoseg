<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Pegawai</title>
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
    
    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#datepicker1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
	  
    </script>
</head>
<?php 
	
	include '../fungsiPegawai.php';
	$hasil = readDataPegawai($_GET['nip']);
	$jab = mysql_query("select * from tbjabatan");
	$kerja = mysql_query("select * from tbpekerjaan");
?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <div class="form-all">
           		
  <div class="form-header-group" style="margin-left:75px; width:740px;">
      <h2 class="form-header" style="float:left;">Update Pegawai</h2>
      <img src="../asset/images/pegawai.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Pilih Fields yang akan di update</div>
      
  </div>
  <table width="803" border="0" style="margin-left:85px;">
    <tr>
      <td>NIP</td>
      <td><label for="nip"></label>
      <input name="nip" type="text" id="nip" size="35" value="<?php echo $hasil['data']['nip']?>" readonly></td>
    </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><label for="namapegawai"></label>
      <input name="namapegawai" type="text" id="namapegawai" size="50" value="<?php echo $hasil['data']['nama_pegawai']?>" placeholder="Nama Pegawai"></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td><select name="kodejab" id="kodejab"class="inputStylelog">
          <option>-- Pilih Jabatan --</option>
           <?php 
         	while($v = mysql_fetch_row($jab)){
         	if($hasil['data']['nama_jab'] == $v[1]){
               echo '<option selected="selected" value="' .$v[0].'">'.$v[1].'</option>';
            }else{
          	   echo '<option value="'.$v[0].'">'.$v[1].'</option>';
  
              }
         	}
           ?>
      </select></td>
    </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><label for="tempatlahir"></label>
      <input name="tempatlahir" type="text" id="tempatlahir" size="30" value="<?php echo $hasil['data']['tempat_lahir']?>" placeholder="Tempat Lahir"></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><label for="tgllahir"></label>
      <input name="tgllahir" type="text"  id="datepicker1" size="30" value="<?php echo $hasil['data']['tgl_lahir']?>" placeholder="Tanggal Lahir"></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><label>
      	<?php
           if($hasil["data"]["jk"]=="Laki-Laki"){
        ?>
               <input name="jk" type="radio" id="radio" value="Laki-Laki" checked="checked" /> 
               Laki-Laki
               <input type="radio" name="jk" id="radio2" value="Perempuan" /> 
               Perempuan
        <?php
            }elseif($hasil["data"]["jk"]=="Perempuan"){
            ?>
               <input name="jk" type="radio" id="radio" value="Laki-Laki"  />  
               Laki-Laki
               <input type="radio" name="jk" id="radio2" value="Perempuan" checked="checked"/> 
               Perempuan
        <?php
            }else{
		?>
			   <input name="jk" type="radio" id="radio" value="Laki-Laki"  /> 
			   Laki-Laki
               <input type="radio" name="jk" id="radio2" value="Perempuan" /> 
               Perempuan
	    <?php
			}
        ?>
      </label></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><select name="agama" id="agama" class="inputStylelog">
          <option value="0">-- Pilih Agama --</option>
          <?php
			$data_agama = array('Islam','Hindu','Budha','Kristen Protestan','Kristen Katolik');
		    for($i=0;$i<5;$i++){
                if($data_agama[$i]==$hasil['data']['agama']){
                    $s="SELECTED";
                   }else{
                     $s="";
                   }
                    echo "<option value='".$data_agama[$i]."' $s>".$data_agama[$i]."</option>";
               }
		  ?>
       </select></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><select name="status" id="status" class="inputStylelog">
          <option value="0">-- Pilih Status --</option>
          <?php
			$status = array('Kawin','Belum Kawin');
		    for($i=0;$i<2;$i++){
                if($status[$i]==$hasil['data']['status_pernikahan']){
                    $s="SELECTED";
                   }else{
                     $s="";
                   }
                    echo "<option value='".$status[$i]."' $s>".$status[$i]."</option>";
               }
		  ?>
      </select></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><label for="alamat"></label>
      <textarea name="alamat" id="alamat" cols="45" rows="3" placeholder="Alamat"><?php echo $hasil['data']['alamat']?></textarea></td>
    </tr>
    <tr>
      <td>HP / No. Telp</td>
      <td><label for="hp"></label>
      <input type="text" name="hp" id="hp" value="<?php echo $hasil['data']['hp']?>" placeholder="HP"> <label for="notelp"></label>
      <input type="text" name="notelp" id="notelp" value="<?php echo $hasil['data']['no_telp']?>" placeholder="No Telp"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
      <input name="email" type="text" id="email" size="35" value="<?php echo $hasil['data']['email']?>" placeholder="Email"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input name="password" type="password" id="password" size="25" value="<?php echo $hasil['data']['password']?>" placeholder="Password"></td>
    </tr>
    <tr>
      <td>Facebook</td>
      <td><label for="facebook"></label>
      <input name="facebook" type="text" id="facebook" size="35" value="<?php echo $hasil['data']['facebook']?>" placeholder="Facebook"></td>
    </tr>
    <tr>
      <td>Website</td>
      <td><label for="website"></label>
      <input name="website" type="text" id="website" size="35" value="<?php echo $hasil['data']['website']?>" placeholder="Website"></td>
    </tr>
    <tr>
      <td>Upload Photo</td>
      <td><input type="file" name="photo" id="photo" value="<?php echo $hasil['data']['photo']?>"></td>
    </tr>
    <tr>
      <td>Mulai Kerja</td>
      <td><label for="tglkerja"></label>
      <input name="tglkerja" type="text" id="datepicker" size="35" value="<?php echo $hasil['data']['tgl_mulai_kerja']?>" placeholder="Tanggal Mulai Kerja"></td>
    </tr>
    <tr>
      <td>Pendidikan</td>
      <td><label for="pdd_terakhir"></label>
      <input name="pdd_terakhir" type="text" id="pdd_terakhir" size="50" value="<?php echo $hasil['data']['pendidikan_terakhir']?>" placeholder="Pendidikan Terakhir"></td>
    </tr>
    <tr>
      <td>Deskripsi Pekerjaan</td>
      <td><select name="kodekerja" id="kodekerja" class="inputStylelog">
          <option>-- Pilih Pekerjaan --</option>
          <?php 
         	while($v = mysql_fetch_row($kerja)){
         	if($hasil['data']['pekerjaan'] == $v[2]){
               echo '<option selected="selected" value="' .$v[0].'">'.$v[2].'</option>';
            }else{
          	   echo '<option value="'.$v[0].'">'.$v[2].'</option>';
  
              }
         	}
           ?>
      </select></td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td><label for="gajipokok"></label>
      <input type="number" name="gajipokok" id="gajipokok" placeholder="Gaji Pokok" value="<?php echo $hasil['data']['gaji_pokok']?>"></td>
    </tr>
    <tr>
      <td>Uang Makan</td>
      <td><label for="uangmakan"></label>
      <input type="number" name="uangmakan" id="uangmakan" placeholder="Uang Makan" value="<?php echo $hasil['data']['uang_makan']?>"></td>
    </tr>
    <tr>
      <td>Uang Lembur</td>
      <td><label for="uanglembur"></label>
      <input type="number" name="uanglembur" id="uanglembur" placeholder="Uang Lembur" value="<?php echo $hasil['data']['uang_lembur']?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" value="Update" class="btnStyle">
      <a href="index.php?pil=view_pegawai"><input type="button" name="batal" id="batal" value="Batal" class="btnStyle"></a></td>
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
	
		// change Photo
		if(empty($tmp_photo)){
			if(updateDataPegawai1($_POST['nip'],$_POST['namapegawai'],$_POST['kodejab'],$_POST['tempatlahir'],
			$_POST['tgllahir'],$_POST['jk'],$_POST['agama'],$_POST['status'],$_POST['alamat'],
			$_POST['hp'],$_POST['notelp'],$_POST['email'],$_POST['password'],$_POST['facebook'],
			$_POST['website'],$_POST['tglkerja'],$_POST['pdd_terakhir'],$_POST['kodekerja'],
			$_POST['gajipokok'])){
	        echo '<script language="javascript">alert("Data Berhasil di Update");
	        location.replace("index.php?pil=view_pegawai"); </script>';
				//header ('location:index.php?pil=view_pegawai');
			}else{
				echo "Update Data Gagal";
			}	
		}else{
			if(file_exists("../asset/images/".$nama_photo)){
			    echo '<script language="javascript">alert("File Gagal di Upload !!! 
			    Coba Ganti Nama File");location.replace("index.php?pil=view_pegawai"); </script>';
				die();
			}else{
					move_uploaded_file($tmp_photo,"../asset/images/".$nama_photo) or die ("Gagal mengupload");
				}
			if(updateDataPegawai($_POST['nip'],$_POST['namapegawai'],$_POST['kodejab'],$_POST['tempatlahir'],
			$_POST['tgllahir'],$_POST['jk'],$_POST['agama'],$_POST['status'],$_POST['alamat'],$_POST['hp'],
			$_POST['notelp'],$_POST['email'],$_POST['password'],$_POST['facebook'],$_POST['website'],
			$nama_photo,$_POST['tglkerja'],$_POST['pdd_terakhir'],$_POST['kodekerja'],$_POST['gajipokok'],$_POST['uangmakan'],$_POST['uanglembur'])){
				echo '<script language="javascript">alert("Data Berhasil di Update");
				location.replace("index.php?pil=view_pegawai"); </script>';
				//header ('location:index.php?pil=view_pegawai');
			}else{
				echo "Update Data Gagal";
			}	
			}            
		 }
      }
?>