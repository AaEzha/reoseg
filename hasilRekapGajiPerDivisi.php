<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hasil Rekap Gaji Karyawan</title>
<link rel="stylesheet" href="asset/css/formstyle.css" type="text/css" media="all" />
<?php 

	include 'koneksi.php';
	$div = $_POST['divisi'];
	$bln = $_POST['bulan'];
	$thn = $_POST['tahun'];
	$hasil=mysql_query("SELECT tbpegawai.nip,tbpegawai.nama_pegawai,tbjabatan.nama_jab,tbdivisi.nama_divisi,tbgaji.gaji_pokok,tbgaji.insentive,
tbgaji.tunjangan,tbgaji.pph,tbgaji.gaji_bersih
FROM tbpegawai,tbjabatan,tbdivisi,tbgaji,tbpekerjaan
WHERE tbpegawai.nip = tbgaji.nip AND tbpegawai.kode_jab = tbjabatan.kode_jab AND tbpegawai.kode_pekerjaan = tbpekerjaan.kode_pekerjaan
AND tbpekerjaan.kode_divisi = tbdivisi.kode_divisi AND tbgaji.bulan ='$bln' AND tbgaji.tahun = '$thn' AND tbdivisi.kode_divisi = '$div'");
    $sql = mysql_query("select nama_divisi from tbdivisi where kode_divisi = '$div'");
	$divisi = mysql_fetch_row($sql);
	
?>
</head>

<body>
  <table width="795" height="444" border="0" align="center">
     <tr>
    <td height="440"><table width="789" border="0" class="form-all" style="font-size:14px;">
      <tr>
        <td colspan="2" rowspan="5"><div align="center"><img src="asset/images/logo_insist.gif" alt="" width="101" height="100"></div></td>
        <td colspan="9">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" style="color:#0a3c59;"><div align="center">PT. ROSEG INDO PROPERTIES</div></td>
      </tr>
      <tr>
        <td colspan="9" style="color:#0a3c59;"><div align="center">Jl. Ir.H. Juanda No.12 Tangerang Selatan 15322 </div></td>
      </tr>
      <tr>
        <td colspan="9" style="color:#0a3c59;"><div align="center">Office : (+6221) - 29067232 / 242 Email : <a style="color:#25A6E1" href="mailto:info@rosegindo.co.id">info@rosegindo.co.id</a></div></td>
      </tr>
      <tr>
        <td colspan="9" style="color:#0a3c59;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="11"><div align="center"><img src="asset/images/garis.png" alt="" width="100%" height="4" /></div></td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="11" style="color:#25A6E1;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="11" style="color:#25A6E1;"><div align="center"><strong>REKAP </strong></div></td>
      </tr>
      <tr>
        <td colspan="11" style="color:#25A6E1;"><div align="center"><strong>GAJI  KARYAWAN</strong> <strong>PER DIVISI</strong></div></td>
      </tr>
      <tr>
        <td colspan="11" style="color:#25A6E1;"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
      <tr>
        <td width="77" style="color:#0a3c59;"><strong>Bulan</strong></td>
        <td width="23"><div align="center">:</div></td>
        <td colspan="5" style="color:#25A6E1;"><?php echo $bln ?></td>
        <td width="328" style="color:#0a3c59;"><div align="right"><strong>Divisi</strong></div></td>
        <td width="6"><div align="center">:</div></td>
        <td width="112" colspan="2" align="left" style="color:#25A6E1;"><?php echo $divisi[0] ?></td>
      </tr>
      <tr>
        <td style="color:#0a3c59;"><strong>Tahun</strong></td>
        <td><div align="center">:</div></td>
        <td colspan="9" style="color:#25A6E1;"><?php echo $thn?></td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="11">&nbsp;</td>
      </tr>
    </table>
    <div class="CSSTableGenerator">
      <table width="789" border="0">
        <tr>
        <td width="37" ><div align="center">No</div></td>
        <td width="62" ><div align="center">NIP</div></td>
        <td width="146" ><div align="center">Nama Pegawai</div></td>
        <td width="46" ><div align="center">Jabatan</div></td>
        <td width="70" ><div align="center">Gaji Pokok</div></td>
        <td width="55" ><div align="center">Insentive</div></td>
        <td width="63"><div align="center">Tunjangan</div></td>
        <td width="45" ><div align="center">Pph (10%)</div></td>
        <td width="94" ><div align="center">Gaji Bersih</div></td>
      </tr>
      <?php 
	  	$no = 0;
	  	while ($v=mysql_fetch_array($hasil)){
		$no++;
	  ?>
      <tr>
        <td align="center"><?php echo $no ?></td>
        <td align="center"><?php echo $v['nip']?></td>
        <td><?php echo $v['nama_pegawai']?></td>
        <td><?php echo $v['nama_jab']?></td>
        <td><?php echo "Rp. ".$v['gaji_pokok']?></td>
        <td><?php echo "Rp. ".$v['insentive']?></td>
        <td><?php echo "Rp. ".$v['tunjangan']?></td>
        <td><?php echo "Rp. ".$v['pph']?></td>
        <td><?php echo "Rp. ".$v['gaji_bersih']?></td>
      </tr>
      <?php }?>
  </table>
  </div>
</table>

</body>
</html>