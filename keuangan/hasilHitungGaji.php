<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hasil Hitung Gaji</title>
<link rel="stylesheet" href="../asset/css/formstyle.css" type="text/css" media="all" />
</head>
<?php 
	include '../koneksi.php';
	include '../fungsiGaji.php';
	$nip = $_POST['nip'];
	$bulan = $_POST['bulan'];
	$no_slip = $_POST['kodegaji'];
	$jam_lembur =$_POST['jamlembur'];
	$upah_lembur =$_POST['upahlembur'];
	
	$sql = mysql_query("SELECT	tbpegawai.nama_pegawai,tbdivisi.nama_divisi,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir, tbpegawai.jk,tbpegawai.status_pernikahan,tbpegawai.gaji_pokok,tbjabatan.tunj_jab,tbpegawai.photo,tbpegawai.email,tbpegawai.hp,
				tbpegawai.pendidikan_terakhir
				FROM tbpegawai,tbdivisi,tbjabatan,tbpekerjaan
				WHERE tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan AND tbpekerjaan.kode_divisi = tbdivisi.kode_divisi
				AND tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.nip = '$nip'");
	$pegawai = mysql_fetch_row($sql);	
	
	$gapok = $pegawai[7];
	$tunj_jab = $pegawai[8];
	$totalinsentive = $jam_lembur * $upah_lembur;
	$gator = $gapok+$tunj_jab+$totalinsentive;
	$pajak = $gator*0.1;
	$gaber = $gator-$pajak;
?>	

<body>
<form name="form1" method="post" action="">
<div class="form-all">
           		
  <div class="form-header-group" style="width:800px;">
      <h2 class="form-header" style="float:left;">Gaji Pegawai</h2>
      <img src="../asset/images/gaji.png" width="75" height="54" style="float:right; margin-top:-10px;">
      <div class="form-subHeader">Hasil perhitungan gaji pegawai</div>
      
  </div>
  <table width="781" height="163" border="0">
    <tr>
      <td width="135">No.Slip </td>
      <td width="231"><input name="kodegaji" type="text" id="kodegaji" size="12" value="<?php echo $no_slip?>" readonly></td>
      <td width="22">&nbsp;</td>
      <td width="137">Gaji Bulan</td>
      <td><input type="text" name="bulan" id="bulan" value="<?php echo $bulan ?>" readonly></td>
      </tr>
    <tr>
      <td>NIP</td>
      <td><input name="nip" type="text" id="nip" size="20" value="<?php echo $nip ?>" readonly></td>
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
      <td><input name="namapegawai" type="text" id="namapegawai" size="30" value="<?php echo $pegawai[0] ?>" readonly></td>
      <td>&nbsp;</td>
      <td>Email</td>
      <td width="234"><input name="email" type="text" id="email" size="30" value="<?php echo $pegawai[10]?>" readonly></td>
      </tr>
    <tr>
      <td>Divisi</td>
      <td><input name="divisi" type="text" id="divisi" size="35" value="<?php echo $pegawai[1]?>" readonly></td>
      <td>&nbsp;</td>
      <td>HP</td>
      <td><input type="text" name="hp" id="hp" value="<?php echo $pegawai[11]?>" readonly></td>
      </tr>
    <tr>
      <td>Jabatan</td>
      <td><input name="jabatan" type="text" id="jabatan" size="35" value="<?php echo $pegawai[2]?>" readonly></td>
      <td>&nbsp;</td>
      <td>Pendidikan</td>
      <td><input name="pendidikan" type="text" id="pendidikan" size="35" value="<?php echo $pegawai[12]?>" readonly></td>
      </tr>
    <tr>
      <td>Tempat Lahir</td>
      <td><input type="text" name="tempatlahir" id="tempatlahir"  value="<?php echo $pegawai[3]?>"  readonly="readonly"></td>
      <td>&nbsp;</td>
      <td rowspan="3" style="border:groove; border-color:#25A6E1; border-radius:3px;"><div align="center"><img src="../asset/images/<?php echo $pegawai[9]?>" alt="alt" width="100"/></div></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><input type="text" name="tgllahir" id="tgllahir" value="<?php echo $pegawai[4]?>" readonly></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><input type="text" name="jk" id="jk"  value="<?php echo $pegawai[5]?>" readonly></td>
      <td style="color:#25A6E1;">&nbsp;</td>
      <td >&nbsp;</td>
      </tr>
    <tr>
      <td>Status Pernikahan</td>
      <td><input type="text" name="status" id="status"  value="<?php echo $pegawai[6]?>" readonly></td>
      <td>&nbsp;</td>
      <td style="color:#25A6E1;"><strong>Data Lembur</strong></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td><input type="text" name="gajipokok" id="gajipokok" value="<?php echo $pegawai[7]?>" readonly></td>
      <td>&nbsp;</td>
      <td>Jumlah Jam Lembur</td>
      <td><input name="jamlembur" type="text" id="jamlembur" size="10" value="<?php echo $jam_lembur?>" readonly></td>
      </tr>
    <tr>
      <td>Tunjangan Jabatan</td>
      <td><input name="tunj_jab" type="text" id="tunj_jab" size="30"  value="<?php echo $pegawai[8]?>" readonly></td>
      <td>&nbsp;</td>
      <td>Upah Lembur 1 Jam</td>
      <td><input type="number" name="upahlembur" id="upahlembur" value="<?php echo $upah_lembur ?>" readonly></td>
      </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>Insentive Lembur</td>
      <td><input type="text" name="insentive" id="insentive" value="<?php echo $totalinsentive?>" readonly></td>
      </tr>
    <tr>
      <td style="color:#25A6E1;"><strong>Detail Gaji </strong></td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>Gaji Kotor</td>
      <td colspan="4"><input type="text" name="gajikotor" id="gajikotor" value="<?php echo $gator?>" readonly></td>
    </tr>
    <tr>
      <td>PPh (10%)</td>
      <td colspan="4"><input type="number" name="pph" id="pph"  value="<?php echo $pajak?>"  readonly="readonly"></td>
    </tr>
    <tr>
      <td>Gaji Bersih</td>
      <td colspan="4"><input type="text" name="gajibersih" id="gajibersih" value="<?php echo $gaber?>" readonly></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4"><input type="submit" name="submit" id="submit" value="Simpan" class="btnStyle">
        <a href="index.php?pil=gaji">
        <input type="button" name="cetak" id="cetak" value="Hitung Baru" class="btnStyle" style="width:100px;">
        </a></td>
      </tr>
  </table>
  </div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		if($_POST['submit']){
            if(insertDataGaji($_POST['kodegaji'],$_POST['nip'],$_POST['gajipokok'],$_POST['insentive'],$_POST['tunj_jab'],$_POST['gajikotor'],$_POST['pph'],$_POST['gajibersih'],$_POST['bulan'])){
				echo '<script language="javascript">alert("Data Berhasil di Simpan");location.replace("index.php?pil=view_gaji"); </script>';
				//header ('location:index.php?pil=view_gaji');
			}else{
				echo "Entry Data Gagal";
			}
		 }
      }
?>