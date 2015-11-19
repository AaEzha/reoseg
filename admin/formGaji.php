<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Hitung Gaji</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../fungsiGaji.php';
	$hasil=mysql_query("select count(tbgaji.kode_gaji)+1 as no from tbgaji");
	$row=mysql_fetch_row($hasil);
	strlen($row[0]);
	$tkode=$row[0];
	if(strlen($row[0])==1){
	  $tkode='00'.$row[0];
	}
	if(strlen($row[0])==2){
	  $tkode='0'.$row[0];
	}
	
	$kode="GJ"."".$tkode;
	// mengambil data pegawai
	$hasil = mysql_query("select * from tbpegawai");
	$hasil1 = mysql_query("select * from tbabsen");
	
?>	
<script type="text/javascript">
var ajaxku;
function addGetNip() {
  var x = document.getElementById('nip');
 // var y = document.getElementById('bulan');
  getNip = x.value;
  //getBln = y.value;
  //thn = Date("Y");
  ajaxku = buatajax();
  
  var url = "../fungsiGaji.php";
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url+"?nip="+getNip,true);
  //ajaxku.open("GET",url+"?bln="+getNip,true);
  //ajaxku.open("GET",url+"?thn="+thn,true);
  //ajaxku.open("GET",url+"?thn="+thn,true);
  ajaxku.send();
  
  //$pegawai = readDataPegawai(getCmb);
  
}

function buatajax(){
	if (window.XMLHttpRequest){
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}
	
function stateChanged(){
	var data, data1;
	if (ajaxku.readyState==4){
		data=ajaxku.responseText;
		data1 = data.split("#");
		//document.getElementById("resultPegawai").innerHTML=data[0];
		document.getElementById("namapegawai").value = data1[0];
		document.getElementById("divisi").value = data1[1];
		document.getElementById("jabatan").value = data1[2];
		document.getElementById("tempatlahir").value = data1[3];
		document.getElementById("tgllahir").value = data1[4];
		document.getElementById("jk").value = data1[5];
		document.getElementById("status").value = data1[6];
		document.getElementById("gajipokok").value = data1[7];
		document.getElementById("tunj_jab").value = data1[8];
		document.getElementById("photo").src = "../asset/images/" + data1[9];
		document.getElementById("email").value = data1[10];
		document.getElementById("hp").value = data1[11];
		document.getElementById("pendidikan").value = data1[12];
		document.getElementById("totalabsen").value = data1[13];
		document.getElementById("totalembur").value = data1[14];	
	}
}

// fungsi untuk menampilkan jumlah jam lembur
function addGetBulan() {
  var x = document.getElementById('bulan');
  var y = document.getElementById('nip');
  getBln = x.value;
  getNip = y.value;
  ajaxku = buatajax();
  var thn = "2015";
  var url = "../fungsiGaji.php";
  ajaxku.onreadystatechange=stateChanged1;
  ajaxku.open("GET",url+"?nip="+getNip+"&bulan="+getBln+"&tahun="+thn,true);
  ajaxku.send();
}

function stateChanged1(){
	var data;
	if (ajaxku.readyState==4){
		data=ajaxku.responseText;
		document.getElementById("totalabsen").value = data1[13];
		document.getElementById("totalembur").value = data1[14];		
	}
}	
	
</script>	

<body>
<form name="form1" method="post" action="index.php?pil=hasil_hitung_gaji">
<div class="form-all">
           		
  <div class="form-header-group" style="width:820px;">
      <h2 class="form-header" style="float:left;">Hitung Gaji Pegawai</h2>
      <img src="../asset/images/gaji.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Fields harus diisi semua</div>
      
  </div>
  <table width="825" height="163" border="0">
    <tr>
      <td width="129">No.Slip </td>
      <td width="231"><input name="kodegaji" type="text" id="kodegaji" size="12" value="<?php echo $kode?>"></td>
      <td width="25">&nbsp;</td>
      <td width="128">Gaji Bulan</td>
      <td><select name="bulan" size="1" id="bulan" onChange="addGetBulan()" class="inputStylelog">
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
      </select></td>
      </tr>
    <tr>
      <td>NIP</td>
      <td><select name="nip" id="nip" onChange="addGetNip()" class="inputStylelog">
        <option value="0">-- Pilih NIP --</option>
        <?php while ($row = mysql_fetch_row($hasil)) {?>
        <option value="<?php echo $row[0]?>"><?php echo $row[0]?></option>
        <?php } ?>
      </select></td>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="5" style="color:#25A6E1;"><strong>Data Pribadi</strong></td>
      </tr>
    <tr>
      <td>Nama Pegawai</td>
      <td><input name="namapegawai" type="text" id="namapegawai" size="30" placeholder="Nama Karyawan" readonly></td>
      <td>&nbsp;</td>
      <td>Email</td>
      <td width="195"><input name="email" type="text" id="email" size="25" placeholder="Email" readonly></td>
      </tr>
    <tr>
      <td>Divisi</td>
      <td><input name="divisi" type="text" id="divisi" size="30" placeholder="Divisi" readonly></td>
      <td>&nbsp;</td>
      <td>HP</td>
      <td><input type="text" name="hp" id="hp" placeholder="No.HP" readonly></td>
      </tr>
    <tr>
      <td>Jabatan</td>
      <td><input name="jabatan" type="text" id="jabatan" size="35" placeholder="Jabatan" readonly></td>
      <td>&nbsp;</td>
      <td>Pendidikan</td>
      <td><input name="pendidikan" type="text" id="pendidikan" size="30" placeholder="Pendidikan Terakhir" readonly></td>
      </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><input type="text" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir" readonly></td>
      <td>&nbsp;</td>
      <td rowspan="3" style="border:groove; border-color:#25A6E1; border-radius:3px;"><div align="center"><img src="" alt="" width="100" height="140" id="photo" placeholder="Photo"/></div></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><input type="text" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir" readonly></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><input type="text" name="jk" id="jk" placeholder="Jenis Kelamin" readonly></td>
      <td style="color:#25A6E1;">&nbsp;</td>
      <td >&nbsp;</td>
      </tr>
    <tr>
      <td>Status Pernikahan</td>
      <td><input type="text" name="status" id="status" placeholder="Status Pernikahan" readonly></td>
      <td>&nbsp;</td>
      <td style="color:#25A6E1;"><strong>Data Absensi</strong></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td><input type="text" name="gajipokok" id="gajipokok" placeholder="Gaji Pokok" readonly></td>
      <td>&nbsp;</td>
      <td>Total Lembur</td>
      <td><input name="totalembur" type="text" id="totalembur" size="10" value="0" placeholder="total lembur" readonly></td>
      </tr>
    <tr>
      <td>Tunjangan Jabatan</td>
      <td><input name="tunj_jab" type="text" id="tunj_jab" size="30" placeholder="Tunjangan Jabatan" readonly></td>
      <td>&nbsp;</td>
      <td>Upah Lembur 1 Jam</td>
      <td><input type="number" name="upahlembur" id="upahlembur" placeholder="Upah Lembur Per Jam" required></td>
      </tr>
       <tr>
      <td>THR</td>
      <td><input name="thr" type="number" id="thr" size="30" placeholder="Masukan THR" required></td>
      <td>&nbsp;</td>
      <td>Total Absen</td>
      <td><input name="totalabsen" type="number" id="totalabsen" size="10" value="0" placeholder="Total Absen" readonly></td>
      <td></td>
      </tr>
      <tr>
      <td>Bonus</td>
      <td><input name="bonus" type="number" id="bonus" size="30" placeholder="Masukan Bonus" required></td>
       <td>&nbsp;</td>
      <td>Uang Makan per hari</td>
      <td><input type="number" name="uangmakan" id="uangmakan" placeholder="Uang Makan Perhari" required></td>
      </tr>
      <td>BPJS</td>
      <td><select name="bpjs" size="1" id="bpjs"class="inputStylelog">
      <option value="0">Pilih Nominal</option>
      <option value="59500" >59500</option>
      <option value="42500" >42500</option>
      </select></td>
       <td>&nbsp;</td>
    <tr>
      <td colspan="5">&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4"><input type="submit" name="hitung_gaji" id="hitung_gaji" value="Hitung Gaji" class="btnStyle" style="width:100px;">
        <input type="reset" name="batal" id="batal" value="Batal" class="btnStyle"></td>
      </tr>
  </table>
  </div>
</form>
</body>
</html>