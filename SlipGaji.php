<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slip Gaji</title>
<link rel="stylesheet" href="asset/css/formstyle.css" type="text/css" media="all" />
<?php 

	include 'koneksi.php';
	$nip = $_POST['nip'];
	$bln = $_POST['bulan'];
	$thn = $_POST['tahun'];
	$hasil=mysql_query("SELECT tbgaji.kode_gaji,tbpegawai.nip,tbpegawai.nama_pegawai,tbjabatan.nama_jab,tbpegawai.tempat_lahir,tbpegawai.tgl_lahir,tbpegawai.jk,tbpegawai.status_pernikahan,
tbpegawai.hp,tbpegawai.email,tbpegawai.photo,tbpegawai.pendidikan_terakhir,tbgaji.gaji_pokok,tbgaji.insentive,tbgaji.tunjangan,tbgaji.pph,tbgaji.gaji_bersih,tbgaji.tgl_hitung_gaji,
MONTHNAME(tbgaji.tgl_hitung_gaji) AS bulan, YEAR(tbgaji.tgl_hitung_gaji) AS tahun
FROM tbpegawai,tbgaji,tbjabatan
WHERE tbpegawai.kode_jab=tbjabatan.kode_jab AND tbgaji.nip = tbpegawai.nip AND tbgaji.bulan = '$bln' AND tbgaji.tahun = '$thn' AND tbpegawai.nip ='$nip'
");
	$gaji = mysql_fetch_array($hasil);
?>
</head>

<body>

<p>&nbsp;</p>
<table width="611" border="0" align="center">

  <tr>
    <td><div align="center">
      <table width="603" border="0" class="form-all" style="font-size:13px;">
        <tr>
          <td width="32" rowspan="6">&nbsp;</td>
          <td width="101" rowspan="6"><div align="center"><img src="asset/images/logo_insist.gif" width="101" height="100"></div></td>
          <td colspan="6">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="6"><div align="center" style="color:#0a3c59;">PT. ROSEG INDO PROPERTIES</div></td>
          </tr>
        <tr>
          <td colspan="6"><div align="center" style="color:#0a3c59;">Jl. Ir.H. Juanda No.12 Tangerang Selatan 15322 </div></td>
          </tr>
        <tr>
          <td colspan="6"><div align="center" style="color:#0a3c59;">Office : (+6221) - 29067232 / 242 Email : <a style="color:#25A6E1;" href="mailto:info@rosegindo.co.id">info@rosegindo.co.id</a></div></td>
          </tr>
        <tr>
          <td colspan="6">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="6"><div align="center"></div></td>
          </tr>
        <tr>
          <td colspan="8"><div align="center">
            <div align="center"><img src="asset/images/garis.png" alt="" width="100%" height="4" /></div>
            </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="7" style="color:#25A6E1;">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="7" style="color:#25A6E1;"><div align="center"><strong>SLIP GAJI PEGAWAI</strong></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td style="color:#0a3c59;"><strong>Bulan</strong></td>
          <td width="10"><div align="center">:</div></td>
          <td width="114" style="color:#25A6E1;"><?php echo $gaji['bulan']?></td>
          <td width="10">&nbsp;</td>
          <td width="189" style="color:#0a3c59;"><div align="right"><strong>Tanggal Hitung</strong></div></td>
          <td width="8"><div align="center">:</div></td>
          <td width="105" style="color:#25A6E1;"><?php echo $gaji['tgl_hitung_gaji']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td style="color:#0a3c59;"><strong>Tahun</strong></td>
          <td><div align="center">:</div></td>
          <td style="color:#25A6E1;"><?php echo $gaji['tahun']?></td>
          <td>&nbsp;</td>
          <td><div align="right" style="color:#0a3c59;"><strong>Jabatan</strong></div></td>
          <td><div align="center">:</div></td>
          <td style="color:#25A6E1;"><?php echo $gaji['nama_jab']?></td>
          </tr>
        <tr>
          <td colspan="8">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="7" style="color:#25A6E1;"><strong>Data Pegawai:</strong></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">No. Slip Gaji</td>
          <td>:</td>
          <td><?php echo $gaji['kode_gaji']?></td>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">NIP</td>
          <td>:</td>
          <td><?php echo $gaji['nip']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Nama Pegawai</td>
          <td>:</td>
          <td><?php echo $gaji['nama_pegawai']?></td>
          </tr>
        <tr>
          <td colspan="8">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" colspan="7" style="color:#25A6E1;"><strong>Pedapatan</strong>
          </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Gaji Pokok</td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['gaji_pokok']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Tunjangan Jabatan </td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
         <tr>
          <td>&nbsp;</td>
          <td colspan="3">Tunjangan Jamsostek</td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">THR </td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Insentive</td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['insentive']?></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td colspan="2" colspan="7" style="color:#25A6E1;"><strong>Potongan</strong>
          </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Jamsostek </td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">BPJS </td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">Pph 21</td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['pph']?></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td colspan="3">Absen </td>
          <td>:</td>
          <td colspan="3"><?php echo "Rp. ".$gaji['tunjangan']?></td>
          </tr>
          <tr>
          <td></td>
          <td colspan="8"><hr color="#333333"</td>
           </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" style="color:#25A6E1;"><strong>Gaji Bersih</strong></td>
          <td style="color:#25A6E1;"><strong>:</strong></td>
          <td colspan="3" style="color:#25A6E1;"><strong><?php echo "Rp. ".$gaji['gaji_bersih']?></strong></td></tr>
          </tr>
           <tr>
          <td></td>
          <td colspan="8"><hr color="#333333"</td>
           </tr>
          <tr>
          <td>&nbsp;</td>
          <td style="color:#0a3c59;"><strong></strong></td>
          <td width="10"><div align="center"></div></td>
          <td width="114"></td>
          <td width="10">&nbsp;</td>
          <td width="189" style= bgcolor="#000000"><div align="right">Tangerang</div></td>
          <td width="8"><div align="center">,</div></td>
          <td width="105"><?php echo $gaji['tgl_hitung_gaji']?></td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center">Penerima</td>
          <td>&nbsp;</td>
          <td colspan="3" align="center">Keuangan</td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          <td>&nbsp;</td>
          <td colspan="3" align="center"></td>
          </tr>
           <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="center"><?php echo $gaji['nama_pegawai']?></td>
          <td>&nbsp;</td>
          <td colspan="3" align="center">Yulia Setiani</td>
          </tr>
      </table>
</body>
</html>